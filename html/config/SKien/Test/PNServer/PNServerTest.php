<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use PHPUnit\Framework\TestCase;
use SKien\PNServer\PNServer;
use SKien\PNServer\PNVapid;
use SKien\PNServer\PNPayload;
use SKien\PNServer\PNSubscription;
use SKien\PNServer\PNDataProviderMySQL;
use SKien\PNServer\PNDataProviderSQLite;

/**
 * Test of the main class.
 * Test works with SQLite dataprovider.
 * (check if it is necessary to test with MySQL dataprovider as well?)
 * 
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class PNServerTest extends TestCase
{
    use TestHelperTrait;
    
    /**
     * Fixture for the test to work with SQLite dp.
     * - create temp directory for datafile if not exist 
     * - and ensure it is writeable
     * both will be done in self::getTempDataDir
     * - start without existing DB (delete DB file if exists so far)
     */
    public static function setUpBeforeClass() : void
    {
        self::getTempDataDir();
        self::deleteTempDataFile();
    }
    
    /**
     * remove created DB-file after last test
     */
    public static function tearDownAfterClass() : void
    {
        self::deleteTempDataFile();
    }
    
    public function test_setPayloadObject() : void
    {
        $srv = new PNServer();
        $pl = new PNPayload('title', 'text', 'icon.png');
        $srv->setPayload($pl);
        $this->assertNotEmpty($srv->getPayload());
    }
    
    public function test_setPayloadPlainText() : void
    {
        $srv = new PNServer();
        $srv->setPayload('plain text');
        $this->assertEquals('plain text', $srv->getPayload());
    }
    
    public function test_addSubscription() : void
    {
        $srv = new PNServer();
        $sub = new PNSubscription(VALID_ENDPOINT, VALID_P256H, VALID_AUTH);
        $srv->addSubscription($sub);
        $this->assertEquals(1, $srv->getSubscriptionCount());
    }
    
    public function test_loadSubscriptions() : void
    {
        $srv = $this->setupValidServer();
        $dp = $srv->getDP();
        // 5 subscriptions created: 'valid', 'notfound', 'expired', 'gone', 'invalid'
        $this->assertEquals(6, $dp->count());   
        // load subscriptions with autoremove true (default)
        $this->assertTrue($srv->loadSubscriptions());
        // 'expired' must not be loaded...
        $this->assertEquals(5, $srv->getSubscriptionCount());
        // ... and have to be removed from DB
        $this->assertEquals(5, $dp->count());
    }
    
    public function test_push() : PNServer
    {
        $srv = $this->setupValidServer();
        $dp = $srv->getDP();
        $srv->loadSubscriptions();
        $this->assertTrue($srv->push());
        // After notifications have been pushed, all entries except the valid one should have been removed from the database!
        $this->assertEquals(1, $dp->count());
        
        return $srv;
    }
    
    public function test_loadSubscriptionsWithError1() : void
    {
        // Test errorhandling if no dataprovider set
        $srv = new PNServer();
        $this->assertFalse($srv->loadSubscriptions());
        $this->assertNotEmpty($srv->getError());
    }
    
    public function test_loadSubscriptionsWithError2() : void
    {
        // Test errorhandling for not conected dataprovider
        $srv = new PNServer(new PNDataProviderMySQL('', '', '', ''));
        $this->assertFalse($srv->loadSubscriptions());
        $this->assertNotEmpty($srv->getError());
    }
    
    public function test_loadSubscriptionsNoAutoremove() : void
    {
        $srv = $this->setupValidServer();
        $dp = $srv->getDP();
        // 5 subscriptions created: 'valid', 'notfound', 'expired', 'gone', 'invalid'
        $this->assertEquals(6, $dp->count());
        $srv->setAutoRemove(false);
        $this->assertTrue($srv->loadSubscriptions());
        // 'expired' must not be loaded...
        $this->assertEquals(5, $srv->getSubscriptionCount());
        // ... but must NOT be removed from DB
        $this->assertEquals(6, $dp->count());
    }
    
    public function test_pushWithError() : void
    {
        $srv = new PNServer();
        // no vapid set
        $this->assertFalse($srv->push());
        $this->assertNotEmpty($srv->getError());
        // invalid vapid
        $srv->setVapid(new PNVapid(VALID_SUBJECT, '', VALID_PRIVATE_KEY));
        $this->assertFalse($srv->push());
        $this->assertNotEmpty($srv->getError());
        // no subscription(s) set
        $srv->setVapid(new PNVapid(VALID_SUBJECT, VALID_PUBLIC_KEY, VALID_PRIVATE_KEY));
        $this->assertFalse($srv->push());
        $this->assertNotEmpty($srv->getError());
    }
    
    /**
     * @depends test_push
     */
    public function test_getLog(PNServer $srv)  : PNServer
    {
        $log = $srv->getLog();
        $this->assertIsArray($log);
        $this->assertEquals(5, count($log));
        $aResponse = [-1, 201, 404, 410, 0]; // Encryption error, OK, Not Found, Gone. inv. Endpoint
        $i = 0;
        foreach ($log as $strEndpoint => $aMsg) {
            $this->assertNotEmpty($strEndpoint);
            $this->assertEquals($aResponse[$i++], $aMsg['curl_response_code']);
            // fwrite(STDOUT, "\n" . $aMsg['msg'] . "\n");
        }
        return $srv;
    }
    
    /**
     * @depends test_getLog
     */
    public function test_getSummary(PNServer $srv)  : void
    {
        $summary = $srv->getSummary();
        $this->assertIsArray($summary);
        $this->assertArrayHasKey('total', $summary);
        $this->assertArrayHasKey('pushed', $summary);
        $this->assertArrayHasKey('failed', $summary);
        $this->assertArrayHasKey('expired', $summary);
        $this->assertArrayHasKey('removed', $summary);
        $this->assertEquals(6, $summary['total']);
        $this->assertEquals(1, $summary['pushed']);
        $this->assertEquals(4, $summary['failed']);
        $this->assertEquals(1, $summary['expired']);
        $this->assertEquals(5, $summary['removed']);
    }
    
    /**
     * NOT implemented in the setUp()-method because not all testmethods needs valid server
     * @return PNServer
     */
    protected function setupValidServer() : PNServer
    {
        $dp = new PNDataProviderSQLite(self::getTempDataDir(), self::$strSQLiteDBFilename);
        $dp->truncate();
        $dp->saveSubscription($this->loadSubscription('valid_subscription.json'));
        $dp->saveSubscription($this->loadSubscription('notfound_subscription.json'));
        $dp->saveSubscription($this->loadSubscription('expired_subscription.json'));
        $dp->saveSubscription($this->loadSubscription('gone_subscription.json'));
        $dp->saveSubscription($this->loadSubscription('invalid_subscription.json'));
        $dp->saveSubscription($this->loadSubscription('inv_endpoint_subscription.json'));
        
        $srv = new PNServer($dp);
        $vapid = new PNVapid(VALID_SUBJECT, VALID_PUBLIC_KEY, VALID_PRIVATE_KEY);
        $srv->setVapid($vapid);
        $srv->setPayload('Greetings from phpUnit .-)');
        $this->assertIsObject($srv);
        
        return $srv;
    }
}

