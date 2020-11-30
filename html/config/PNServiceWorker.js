/**
 * Serviceworker for web push notifications
 * @package PNServer
 */

var "https://localhost/config/PNSubscriber.php";
 
// values to be modified for own project
// VAPID appPublic key
const strAppPublicKey  = 'BLCn4Y00pgJc73iH3io5pdKJ0Oqch0-6lCi_GkvZ5TZ7-PSk4SWvXsav7uG0jA-dSfjXMSZmo9xMYV0RoCHYPy8';
// URL to save subscription on server via Fetch API
const strSubscriberURL = URL;
// default Notification Title if not pushed by server
const strDefTitle      = 'Your company or product';
// default Notification Icon if not pushed by server
const strDefIcon       = './elephpant.png';
 
/**
 * encode the public key to Array buffer
 * @param {string} strBase64  -   key to encode
 * @return {Array} - UInt8Array
 */
function encodeToUint8Array(strBase64) {
    var strPadding = '='.repeat((4 - (strBase64.length % 4)) % 4);
    var strBase64 = (strBase64 + strPadding).replace(/\-/g, '+').replace(/_/g, '/');
    var rawData = atob(strBase64);
    var aOutput = new Uint8Array(rawData.length);
    for (i = 0; i < rawData.length; ++i) {
        aOutput[i] = rawData.charCodeAt(i);
    }
    return aOutput;
}

/**
 * event listener to subscribe notifications and save subscription at server
 * @param {ExtendableEvent} event 
 */
async function pnSubscribe(event) {
    console.log('Serviceworker: activate event');
    try {
        var appPublicKey = encodeToUint8Array(strAppPublicKey);
        var opt = {
                applicationServerKey: appPublicKey, 
                userVisibleOnly: true
            };
        
        self.registration.pushManager.subscribe(opt)
            .then((sub) => {
                // subscription succeeded - send to server
                pnSaveSubscription(sub)
                    .then((response) => {
                        console.log(response);
                    }).catch((e) => {
                        // registration failed
                        console.log('SaveSubscription failed with: ' + e);
                    });
            }, ).catch((e) => {
                // registration failed
                console.log('Subscription failed with: ' + e);
            });
        
    } catch (e) {
        console.log('Error subscribing notifications: ' + e);
    }
}

/**
 * event listener handling when subscription change
 * just re-subscribe 
 * @param {PushSubscriptionChangeEvent} event 
 */
async function pnSubscriptionChange(event) {
    console.log('Serviceworker: subscription change event: ' + event);
    try {
        // re-subscribe with old options
        self.registration.pushManager.subscribe(event.oldSubscription.options)
            .then((sub) => {
                // subscription succeeded - send to server
                pnSaveSubscription(sub)
                    .then((response) => {
                        console.log(response);
                    }).catch((e) => {
                        // registration failed
                        console.log('SaveSubscription failed with: ' + e);
                    });
            }, ).catch((e) => {
                // registration failed
                console.log('Subscription failed with: ' + e);
            });
        
    } catch (e) {
        console.log('Error subscribing notifications: ' + e);
    }
}

/**
 * save subscription on server
 * using Fetch API to send subscription infos to the server
 * subscription is encance with the userAgent for internal use on the server
 * @param {object} sub - PushSubscription
 * @return {string} - response of the request
 */
async function pnSaveSubscription(sub) {
    // stringify and parse again to add 'custom' property
    // ... otherwise added property will be ignored when stringify subscription direct to body!
    var body = JSON.parse(JSON.stringify(sub));
    body.userAgent = navigator.userAgent;
    var fetchdata = {
            method: 'post',
            headers: { 'Content-Type': 'application/json' },
            body: JSON.stringify(body),
          };
    // we're using fetch() to post the data to the server
    var response = await fetch(strSubscriberURL, fetchdata);
	// activate following two lines, if any PHP-Error in the subscriber script occurs
	// -> in that case, response won't contain valid JSON data!
	/*
	var cloned = response.clone();
	console.log('Response: ', await cloned.text());
	*/
	return await response.json();
}

/**
 * event listener to show notification
 * @param {PushEvent} event
 */
function pnPushNotification(event) {
    console.log('push event: ' + event);
    var strTitle = strDefTitle;
    var oPayload = null;
    var opt = { icon: strDefIcon };
    if (event.data) {
        // PushMessageData Object containing the pushed payload
        try {
            // try to parse payload JSON-string
            oPayload = JSON.parse(event.data.text());
        } catch (e) {
            // if no valid JSON Data take text as it is...
            // ... comes maybe while testing directly from DevTools
            opt = {
                icon: strDefIcon,
                body: event.data.text(),
            };
        }
        if (oPayload) {
            if (oPayload.title != undefined && oPayload.title != '') {
                strTitle = oPayload.title;
            }
            opt = oPayload.opt;
            if (oPayload.opt.icon == undefined || 
                oPayload.opt.icon == null || 
                oPayload.icon == '') {
                 // if no icon defined, use default
               opt.icon = strDefIcon;
            }
        }
    }
    var promise = self.registration.showNotification(strTitle, opt);
    event.waitUntil(promise);
}

/**
 * event listener to notification click
 * if URL passed, just open the window...
 * @param {NotificationClick} event
 */
function pnNotificationClick(event) {
    console.log('notificationclick event: ' + event);
    if (event.notification.data && event.notification.data.url) {
        const promise = clients.openWindow(event.notification.data.url);
        event.waitUntil(promise);
    }
    if (event.action != "") {
        // add handler for user defined action here...
        // pnNotificationAction(event.action);
        console.log('notificationclick action: ' + event.action);
    }
}

/**
 * event listener to notification close
 * ... if you want to do something for e.g. analytics
 * @param {NotificationClose} event
 */
function pnNotificationClose(event) {
    console.log('notificationclose event: ' + event);
}

/**=========================================================
 * add all needed event-listeners
 * - activate:  subscribe notifications and send to server
 * - push:      show push notification
 * - click:     handle click an notification and/or action 
 *              button
 * - change:    subscription has changed
 * - close:     notification was closed by the user
 *=========================================================*/
// add event listener to subscribe and send subscription to server
self.addEventListener('activate', pnSubscribe);
// and listen to incomming push notifications
self.addEventListener('push', pnPushNotification);
// ... and listen to the click
self.addEventListener('notificationclick', pnNotificationClick);
// subscription has changed
self.addEventListener('pushsubscriptionchange', pnSubscriptionChange);
// notification was closed without further action
self.addEventListener('notificationclose', pnNotificationClose); 
