#!/bin/bash
## THIS SCRIPT WORKS WITH RESPONDER TO ALERT ON CAPTURED HASHES RELATING TO THE PHHISHING CAMPAIGNS
## DEFAULTS IF NOT FROM PHISHING DOCS
QueryConfig=$(mysql -h mysql-server -u root -pPhishAPIDef@ulT Config -se "CALL GetSettings();");

SlackURL=$(echo $QueryConfig | cut -d " " -f 2);
SlackChannel=$(echo $QueryConfig | cut -d " " -f 8);
APIURL=$(echo $QueryConfig | cut -d " " -f 1);

files=$(cd /var/log/Responder && ls *.txt | awk '{print $1}');

## CHECKS IF RESPONDER LOGS EXIST
IFS='
'
count=0
for item in $files
do
  file=$item
  count=$((count+1))
  IP=$(echo $item | cut -d "-" -f 4 | cut -d "." -f 1,2,3,4);
  Module=$(echo $item | cut -d "-" -f 3);
  HashType=$(echo $item | cut -d "-" -f 2);

  Hashes=$(cat /var/log/Responder/$file);

  Query=$(mysql -h mysql-server -u root -pPhishAPIDef@ulT phishingdocs -se "CALL MatchHashes('$IP','$Hashes');");

  Title=$(echo $Query | cut -f 1);
  Target=$(echo $Query | cut -f 2);
  Org=$(echo $Query | cut -f 3);
  Token=$(echo $Query | cut -f 4);
  Channel=$(echo $Query | cut -f 5);
  UUID=$(echo $Query | cut -f 6);

## SEE IF THE IP ADDRESS FOR THE CAPTURED HASH EXISTS IN EITHER CAMPAIGN (phishingdocs or fakesite)

if [ $Title = "PhishingDocs" ]
then
  message=$(echo "> *HIT!!* Captured a" $HashType "hash ("$Module") for" $Target "at" $Org "(<"$APIURL/phishingdocs/results?UUID=$UUID"|"$IP">)");
  link=$(echo "$APIURL/phishingdocs/results?UUID=$UUID");
  messagepush=$(echo "*HIT!!* Captured a" $HashType "hash ("$Module") for" $Target "at" $Org "("$IP")");
  curl -s -X POST --data-urlencode 'payload={"channel": "'$Channel'", "username": "HashBot", "text": "'$message'", "icon_emoji": ":hash:"}' $Token
  ##php /var/www/html/config/push.php -- "$messagepush" "HashBot" "./hash.png" "$link" "HashBot";
  rm /var/log/Responder/$file;
fi

if [ $Title = "FakeSite" ]
then
  message=$(echo "> *HIT!!* Captured a" $HashType "hash ("$Module") for "$Target" at <"$APIURL/results?project=$Target"|"$IP">");
  link=$(echo "$APIURL/results?project=$Target");
  messagepush=$(echo "*HIT!!* Captured a" $HashType "hash ("$Module") for "$Target" at "$IP"");
  curl -s -X POST --data-urlencode 'payload={"channel": "'$SlackChannel'", "username": "HashBot", "text": "'$message'", "icon_emoji": ":hash:"}' $SlackURL
  #php /var/www/html/config/push.php -- "$messagepush" "HashBot" "./hash.png" "$link" "HashBot";
  rm /var/log/Responder/$file;
fi

  if [ -z "$Title" ]
  then
## COMMENT THE NEXT TWO LINES OUT IF YOU DO NOT WISH TO BE NOTIFIED FOR OUT OF SCOPE HASHES
      message=$(echo "> Captured an out of scope" $HashType "hash ("$Module") at" $IP"\r\n> \`\`\`"$Hashes"\`\`\`");
      curl -s -X POST --data-urlencode 'payload={"channel": "'$SlackChannel'", "username": "HashBot", "text": "'$message'", "icon_emoji": ":hash:"}' $SlackURL
      rm /var/log/Responder/$file;
  fi

done
