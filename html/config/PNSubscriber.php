<?php
require_once 'autoloader.php';
require_once 'PNSendWelcome.php';
require_once 'MyLogger.php';

use SKien\PNServer\PNDataProviderSQLite;
use SKien\PNServer\PNSubscription;

/**
 * Example to handle the HTTP-Request send from the ServiceWorker to 
 * subscribe our notification service.
 * 
 * For easy setup we use the SQLite dataprovider and set the database file
 * located in the same directory as this script.
 * You may use the MySQL dataprovider, just locate the database in a differnet
 * directory or write your own dataprovider for your project.
 * 
 * Remember to adjust the path and name of the script in the service worker
 * (PNServiceWorker.js) when implementing the requesthandler in your own project.
 * 
 * Set $bSendWelcome=true, to send a welcome notification to each user 
 * newly subscribed our service, after the subscription was saved in 
 * the database.
 * 
 * If you want to log several events or errors, you can pass any PSR-3 compliant 
 * logger of your choice to the dataprovider.
 *
 * THIS CODE IS INTENDED ONLY AS EXAMPLE - DONT USE IT DIRECT IN YOU PROJECT
 *
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */

// set to true, if you will send songle welcome notification to each new subscription
$bSendWelcome = true;

$result = array();
// only serve POST request containing valid json data
if (strtolower($_SERVER['REQUEST_METHOD']) == 'post') {
	if (isset($_SERVER['CONTENT_TYPE'])	&& trim(strtolower($_SERVER['CONTENT_TYPE']) == 'application/json')) {
		// get posted json data
		if (($strJSON = trim(file_get_contents('php://input'))) === false) {
			$result['msg'] = 'invalid JSON data!';
		} else {
		    // create any PSR-3 logger of your choice in MyLogger.php
			$oDP = new PNDataProviderSQLite(null, null, null, createLogger());
			if ($oDP->saveSubscription($strJSON) !== false) {
				$result['msg'] = 'subscription saved on server!';
				if ($bSendWelcome) {
				    sendWelcome(PNSubscription::fromJSON($strJSON));
				}
			} else {
				$result['msg'] = 'error saving subscription!';
			}
		}
	} else {
		$result['msg'] = 'invalid content type!';
	}
} else {
	$result['msg'] = 'no post request!';
}
// let the service-worker know the result
echo json_encode($result);
