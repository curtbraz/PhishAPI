#!/bin/bash

echo "What is your external domain for the API? (e.g: https://phishapi.com):"

read APIDomain

sed -i -e "s/YOUR_API_DOMAIN_HERE/$APIDomain/g" /var/www/config.txt

echo "What is your Slack incoming webhook URL? (https://hooks.slack.com/services/... or Return Key if No Alerting):"

read SlackWebhook

sed -i -e "s/YOUR_SLACK_INCOMING_WEBHOOK_URL_HERE/$SlackWebhook/g" /var/www/config.txt

echo "Slack Channel to use for alerting? (e.g: #phishing)"

read SlackChannel

sed -i -e "s/YOUR_SLACK_CHANNEL/$SlackChannel/g" /var/www/config.txt
