<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use PHPUnit\Framework\TestCase;
use SKien\PNServer\PNVapid;

/**
 * The constants VALID_SUBJECT, VALID_PUBLIC_KEY, VALID_PRIVATE_KEY are defined
 * in the phpunit.xml configuration file.#
 *   
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class PNVapidTest extends TestCase
{
    const COMPRESSED_PUBLIC_KEY = "ADtOCcUUTYvuUzx9ktgYs3mB6tQCjFLNfOkuiaIi_2LNosLbHQY6P91eMzQ8opTDLK_PjJHsjMSiJ-MUOeSjV8E";
    
    public function test_isValid() : void
    {
        $vapid = new PNVapid(VALID_SUBJECT, VALID_PUBLIC_KEY, VALID_PRIVATE_KEY);
        $this->assertTrue($vapid->isValid());

        $vapid = new PNVapid('', VALID_PUBLIC_KEY . 'XX', VALID_PRIVATE_KEY);
        $this->assertFalse($vapid->isValid());
        $this->assertEquals(PNVapid::ERR_EMPTY_ARGUMENT, $vapid->getError());
        
        $vapid = new PNVapid(VALID_SUBJECT, '', VALID_PRIVATE_KEY);
        $this->assertFalse($vapid->isValid());
        $this->assertEquals(PNVapid::ERR_EMPTY_ARGUMENT, $vapid->getError());
        
        $vapid = new PNVapid(VALID_SUBJECT, VALID_PUBLIC_KEY, '');
        $this->assertFalse($vapid->isValid());
        $this->assertEquals(PNVapid::ERR_EMPTY_ARGUMENT, $vapid->getError());
        
        $vapid = new PNVapid(VALID_SUBJECT, VALID_PUBLIC_KEY . 'XX', VALID_PRIVATE_KEY);
        $this->assertFalse($vapid->isValid());
        $this->assertEquals(PNVapid::ERR_INVALID_PUBLIC_KEY_LENGTH, $vapid->getError());
        
        $vapid = new PNVapid(VALID_SUBJECT, VALID_PUBLIC_KEY, VALID_PRIVATE_KEY . 'XX');
        $this->assertFalse($vapid->isValid());
        $this->assertEquals(PNVapid::ERR_INVALID_PRIVATE_KEY_LENGTH, $vapid->getError());
        
        $vapid = new PNVapid(VALID_SUBJECT, self::COMPRESSED_PUBLIC_KEY, VALID_PRIVATE_KEY);
        $this->assertFalse($vapid->isValid());
        $this->assertEquals(PNVapid::ERR_NO_COMPRESSED_KEY_SUPPORTED, $vapid->getError());
    }
    
    public function test_getHeaders() : void
    {
        $vapid = new PNVapid(VALID_SUBJECT, VALID_PUBLIC_KEY, VALID_PRIVATE_KEY);
        $result = $vapid->getHeaders(VALID_ENDPOINT);
        $this->assertTrue(is_array($result));
        // content of the keys can not be tested - containing processed time() value
        $this->assertArrayHasKey('Authorization', $result);
        $this->assertArrayHasKey('Crypto-Key', $result);
        
        // cause an error 
        $vapid = new PNVapid(VALID_SUBJECT, '', VALID_PRIVATE_KEY);
        $this->expectError();
        $result = $vapid->getHeaders(VALID_ENDPOINT);
    }
}

