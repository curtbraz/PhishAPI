<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use PHPUnit\Framework\TestCase;
use SKien\PNServer\PNDataProvider;
use SKien\PNServer\PNSubscription;

/**
 * Abstract class providing comprehensive tests for all classes that implement the
 * PNDataProvider Interface.
 * Extending classes have to 
 * - create database fixture for whole testclass in the static setUpBeforeClass() method
 * - create an instance of the class in the setUp() method and assign it to the $dp property
 * - implement tests to verify the creation
 * - implement tests for extended functions not supported by PNDataProvider 
 * - Clean-Up Database after last test in the static tearDownAfterClass() method
 * 
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
abstract class PNDataProviderTest extends TestCase
{
    use TestHelperTrait;
    
    protected ?PNDataProvider $dp = null;
    
    public function test_construct() : void
    {
        $this->assertIsObject($this->dp);
        $this->assertEmpty($this->dp->getError());
        $this->assertTrue($this->dp->isConnected());
    }
    
    public function test_saveSubscription() : string
    {
        $this->assertIsObject($this->dp);
        
        $this->assertEquals(0, $this->dp->count());
        $strSub = $this->loadSubscription('valid_subscription.json');
        $this->assertTrue($this->dp->saveSubscription($strSub));
        $this->assertEmpty($this->dp->getError());
        $this->assertEquals(1, $this->dp->count());
        $sub = PNSubscription::fromJSON($strSub);
        
        // pass to test_remove...
        return $sub->getEndpoint();
    }
    
    /**
     * @depends test_saveSubscription
     */
    public function test_removeSubscription(string $strEndpoint) : void
    {
        $this->assertIsObject($this->dp);
        
        $this->assertEquals(1, $this->dp->count());
        // remove previous inserted subscription by endpoint
        $this->assertTrue($this->dp->removeSubscription($strEndpoint));
        $this->assertEmpty($this->dp->getError());
        $this->assertEquals(0, $this->dp->count());
    }
    
    public function test_fetch() : void
    {
        $this->assertIsObject($this->dp);
        
        // create with valid and expired subscription
        $this->assertTrue($this->dp->isConnected());
        $this->dp->saveSubscription($this->loadSubscription('valid_subscription.json'));
        $this->dp->saveSubscription($this->loadSubscription('expired_subscription.json'));
        $this->assertEquals(2, $this->dp->count());
        
        // init list with autoremove=false - expired record have to be ignored but not deleted
        $this->assertTrue($this->dp->init(false));
        
        $this->assertNotEmpty($this->dp->fetch());
        $this->assertGreaterThan(0, intval($this->dp->getColumn(PNDataProvider::COL_ID)));
        // no more record to fetch
        $this->assertFalse($this->dp->fetch());
    }
    
    public function test_autoremove() : void
    {
        $this->assertIsObject($this->dp);
        
        // create with valid and expired subscription
        $this->assertTrue($this->dp->isConnected());
        $this->dp->saveSubscription($this->loadSubscription('valid_subscription.json'));
        $this->dp->saveSubscription($this->loadSubscription('expired_subscription.json'));
        $this->assertTrue($this->dp->init(true));
        // ... 1 record left
        $this->assertEquals(1, $this->dp->count());
    }
    
    public function test_truncate() : void
    {
        $this->assertIsObject($this->dp);
        
        $this->dp->saveSubscription($this->loadSubscription('valid_subscription.json'));
        $this->assertGreaterThan(0, $this->dp->count());
        $this->assertTrue($this->dp->truncate());
        $this->assertEquals(0, $this->dp->count());
    }
    
    public function test_saveSubscriptionError() : void
    {
        $this->assertIsObject($this->dp);
        
        // causing error by passing invalid JSON string
        $result = $this->dp->saveSubscription('{,');
        $this->assertFalse($result);
        $this->assertNotEmpty($this->dp->getError());
    }
}

