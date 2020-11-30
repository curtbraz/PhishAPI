<?php
require_once 'autoloader.php';
require_once 'MyVapid.php';
require_once 'MyLogger.php';

use SKien\PNServer\PNDataProviderSQLite;
use SKien\PNServer\PNSubscription;
use SKien\PNServer\PNPayload;
use SKien\PNServer\PNServer;

if(isset($argv[1])){$message = strval($argv[1]);}else{$message="You caught a phish!";}
if(isset($argv[2])){$title = strval($argv[2]);}else{$title="PhishAPI";}
if(isset($argv[3])){$icon = strval($argv[3]);}else{$icon="./phishicon.png";}
if(isset($argv[4])){$link = strval($argv[4]);}else{$link="";}
if(isset($argv[5])){$subject = strval($argv[5]);}else{$subject="PhishAPI";}

/**
 * Example to send your push notifications.
 *
 * For easy setup we use the SQLite dataprovider and set the database file
 * located in the same directory as this script.
 *
 * First you should open PNTestClient.html in your browser and click the
 * [Subscribe] button to create a valis subscription in your database.
 * 
 * Needed steps to send notification to all subscriptions stored in our database:
 * 1. Create and init dataprovider for database containing at least one valid subscription
 * 2. Set our VAPID keys (rename MyVapid.php.org to MyVapid.php ans set your own keys)
 * 3. Create and set the payload
 * 4. Load the subscriptions from the dataprovider
 * 5. And push the notification
 * 
 * After the notification was pushed, a summary and/or a detailed log can be
 * retrieved from the server 
 * 
 * If you want to log several events or errors, you can pass any PSR-3 compliant 
 * logger of your choice to the PNDataProvider- and PNServer-object.
 *
 * THIS CODE IS INTENDED ONLY AS EXAMPLE - DONT USE IT DIRECT IN YOU PROJECT
 *
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */

// check, if PHP version is sufficient and all required extensions are installed
$bExit = false;
if (version_compare(phpversion(), '7.4', '<')) {
	trigger_error('At least PHP Version 7.4 is required (current Version is ' . phpversion() . ')!', E_USER_WARNING);
	echo "Version";
	$bExit = true;
}
$aExt = array('curl', 'gmp', 'mbstring', 'openssl', 'bcmath');
foreach ($aExt as $strExt) {
	if (!extension_loaded($strExt)) {
		trigger_error('Extension ' . $strExt . ' must be installed!', E_USER_WARNING);
		echo "Extension".$strExt;
		$bExit = true;
	}
}
if ($bExit) {
	echo "Existing";
	exit();
}

// for this test we use SQLite database
$logger = createLogger();
$oDP = new PNDataProviderSQLite(null, null, null, $logger);
if (!$oDP->isConnected()) {
    echo $oDP->getError();
	exit();
}

//echo 'Count of subscriptions: ' . $oDP->count() . '<br/><br/>' . PHP_EOL;
if (!$oDP->init()) {
	echo $oDP->getError();
	exit();
}

// the server to handle all
$oServer = new PNServer($oDP);
$oServer->setLogger($logger);

// Set our VAPID keys
$oServer->setVapid(getMyVapid());

// create and set payload
// - we don't set a title - so service worker uses default
// - URL to icon can be
//    * relative to the origin location of the service worker
//    * absolute from the homepage (begining with a '/')
//    * complete URL (beginning with https://) 

//$message = "Hello!";
//$icon = "./elephpant.png";
//$title = "news";
//$url = "/where-to-go.php";
//$subject = "Subject";

$oPayload = new PNPayload($subject, $message, $icon);
$oPayload->setTag($title, true);
$oPayload->setURL($link);

$oServer->setPayload($oPayload);

//echo "here?";

// load subscriptions from database 
if (!$oServer->loadSubscriptions()) {
    echo $oDP->getError();
    exit();
}

//echo "are we here?";

// ... and finally push !
if (!$oServer->push()) {
//	echo '<h2>' . $oServer->getError() . '</h2>' . PHP_EOL;
} else {
	$aLog = $oServer->getLog();
//	echo '<h2>Summary:</h2>' . PHP_EOL;
	$summary = $oServer->getSummary();
//	echo 'total:&nbsp;' . $summary['total'] . '<br/>' . PHP_EOL;
//	echo 'pushed:&nbsp;' . $summary['pushed'] . '<br/>' . PHP_EOL;
//	echo 'failed:&nbsp;' . $summary['failed'] . '<br/>' . PHP_EOL;
//	echo 'expired:&nbsp;' . $summary['expired'] . '<br/>' . PHP_EOL;
//	echo 'removed:&nbsp;' . $summary['removed'] . '<br/>' . PHP_EOL;
	
//	echo '<h2>Push - Log:</h2>' . PHP_EOL;
	foreach ($aLog as $strEndpoint => $aMsg ) {
//	    echo PNSubscription::getOrigin($strEndpoint) . ':&nbsp;' .$aMsg['msg'] . '<br/>' . PHP_EOL;	
	}
}
