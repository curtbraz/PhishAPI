<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use PHPUnit\Framework\TestCase;
use SKien\PNServer\PNSubscription;

/**
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class PNSubscriptionTest extends TestCase
{
    use TestHelperTrait;
    
    public function test_isValid() : void
    {
        $sub = PNSubscription::fromJSON($this->loadSubscription('expired_subscription.json'));
        $this->assertFalse($sub->isValid());
        $this->assertTrue($sub->isExpired());
        $sub->setExpiration(time() + 3600);
        $this->assertTrue($sub->isValid());
        $this->assertFalse($sub->isExpired());
        
        $sub->setEncoding('aes128gcm');
        $this->assertTrue($sub->isValid());
        $sub->setEncoding('aes256gcm');
        $this->assertFalse($sub->isValid());
    }
    
    public function test_set() : void
    {
        $sub = new PNSubscription('', '', '');

        $sub->setEndpoint(VALID_ENDPOINT);
        $this->assertFalse($sub->isValid());
        $sub->setPublicKey(VALID_P256H);
        $this->assertFalse($sub->isValid());
        $sub->setAuth(VALID_AUTH);
        $this->assertTrue($sub->isValid());
        $this->assertFalse($sub->isExpired());
        $this->assertEquals(VALID_ENDPOINT, $sub->getEndpoint());
        $this->assertEquals(VALID_P256H, $sub->getPublicKey());
        $this->assertEquals(VALID_AUTH, $sub->getAuth());
        $this->assertEquals('aesgcm', $sub->getEncoding());
    }
    
    public function test_getOrigin() : void
    {
        $this->assertEquals('https://fcm.googleapis.com', PNSubscription::getOrigin(VALID_ENDPOINT));
    }
}

