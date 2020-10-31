<?php
// MySQL Database Information
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "fakesite";

// API Server Info
$APIDomain = "https://YOUR_API_DOMAIN_HERE"; // This API's Domain (ex: https://phishapi.com)

// Slack Info
$SlackIncomingWebhookURL = "https://hooks.slack.com/services/YOUR_SLACK_INCOMING_WEBHOOK_URL_HERE"; // Used for DocBot, PhishBot, & BeEFBot (ex: https://hooks.slack.com/services/...)
$SlackBotOrLegacyToken = "xoxb-YOUR_SLACK_LEGACY_OR_BOT_TOKEN_HERE"; // Used for TrophyBot (ex: xoxb-...)
$BeefHookJSURL = "https://YOUR_BEEF_DOMAIN_HERE"; // Optional - Use API Domain if Same
$BeefToken = ""; // Optional
$slackchannel = "#phishing"; // Slack Channel for the Phishing Bot Notifications
?>

