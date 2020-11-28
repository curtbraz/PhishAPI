<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use PHPUnit\Framework\TestCase;
use SKien\PNServer\PNEncryption;

/**
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class PNEncryptionTest extends TestCase
{
    use TestHelperTrait;
    
    const VALID_P256H = "BEQrfuNX-ZrXPf0Mm-IdVMO1LMpu5N3ifgcyeUD2nYwuUhRUDmn_wVOM3eQyYux5vW2B8-TyTYco4-bFKKR02IA";
    const VALID_AUTH = "jOfywakW_srfHhMF-NiZ3Q";
    const VALID_ENCODING = "aesgcm";
    
    public function test_encrypt1() : void
    {
        $enc = new PNEncryption(self::VALID_P256H, self::VALID_AUTH);
        
        $result = $enc->encrypt('');
        $this->assertTrue(is_string($result));
        $this->assertEquals('', $result);
        
        $result = $enc->encrypt('my payload');
        $this->assertTrue(is_string($result));
        $this->assertTrue(strlen($result) > 0);
    }
    
    public function test_encrypt2() : void
    {
        $enc = new PNEncryption(self::VALID_P256H, self::VALID_AUTH, "aes128gcm");
        $result = $enc->encrypt('my payload');
        $this->assertTrue(is_string($result));
        $this->assertNotEmpty($result);
    }
    
    public function test_encryptError1() : void
    {
        $sub = json_decode($this->loadSubscription('invalid_subscription.json'));
        $enc = new PNEncryption($sub->keys->p256dh, $sub->keys->auth);
        $this->assertFalse($enc->encrypt('my payload'));
        $this->assertNotEmpty($enc->getError());
        $this->assertEquals("Invalid client public key length!", $enc->getError());
    }
    
    public function test_encryptError2() : void
    {
        $enc = new PNEncryption(self::VALID_P256H, self::VALID_AUTH, 'invalidencoding');
        $this->assertFalse($enc->encrypt('my payload'));
        $this->assertNotEmpty($enc->getError());
    }
    
    public function test_getHeaders1() : void
    {
        $enc = new PNEncryption(self::VALID_P256H, self::VALID_AUTH);
        
        $enc->encrypt('');
        $headers = $enc->getHeaders();
        $this->assertTrue(is_array($headers));
        $this->assertEquals(0, count($headers));
        
        $enc->encrypt('my payload');
        $headers = $enc->getHeaders();
        $this->assertTrue(is_array($headers));
        $this->assertArrayHasKey('Content-Type', $headers);
        $this->assertEquals('application/octet-stream', $headers['Content-Type']);
        $this->assertArrayHasKey('Content-Encoding', $headers);
        $this->assertEquals("aesgcm", $headers['Content-Encoding']);
        $this->assertArrayHasKey('Encryption', $headers);
        $this->assertTrue(strlen($headers['Encryption']) > 0);
        $this->assertArrayHasKey('Crypto-Key', $headers);
        $this->assertTrue(strlen($headers['Crypto-Key']) > 0);
    }
    
    public function test_getHeaders2() : void
    {
        $enc = new PNEncryption(self::VALID_P256H, self::VALID_AUTH);
        $enc->encrypt('my payload');
        // with existing header to merge with
        $headers = $enc->getHeaders(['Crypto-Key' => 'testkey']);
        $this->assertEquals(';testkey', substr($headers['Crypto-Key'], -8));
    }
}
