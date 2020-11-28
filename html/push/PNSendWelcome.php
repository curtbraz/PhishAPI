<?php
require_once 'MyVapid.php';

use SKien\PNServer\PNServer;
use SKien\PNServer\PNSubscription;
use SKien\PNServer\PNPayload;

/**
 * Example to demonstarte how to send a welcome notification to each 
 * user newly subscribed our service.
 * 
 * This function is called within the Handler for the HTTP-Request send from
 * the ServiceWorker to subscribe. (PNSubscriber.php)
 * After the subscription was saved in the database, this function is called,
 * if the var $bSendWelcome is set to true!
 * 
 * THIS CODE IS INTENDED ONLY AS EXAMPLE - DONT USE IT DIRECT IN YOU PROJECT  
 * 
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */



/**
 * @param PNSubscription $oSubscription
 */
function sendWelcome(PNSubscription $oSubscription)
{
    // create server. Since we are sending to a single subscription that was 
    // passed as argument, we do not need a dataprovider
    $oServer = new PNServer();
    
    // create payload message for welcome...
    $oPayload = new PNPayload('Welcome to PNServer', 'We warmly welcome you to our homepage.', './elephpant.png');
    
    // set VAPID, payload and the passed subscription
    $oServer->setVapid(getMyVapid());
    $oServer->setPayload($oPayload);
    $oServer->addSubscription($oSubscription);
    
    // ... and finally push the notification!
    $oServer->push();
}