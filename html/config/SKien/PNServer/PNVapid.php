<?php
declare(strict_types=1);

namespace SKien\PNServer;

/**
 * class to create headers from VAPID key
 * 
 * parts of the code are based on the package spomky-labs/jose
 *  @link https://github.com/Spomky-Labs/Jose 
 *
 * #### History
 * - *2020-04-12*   initial version
 * - *2020-08-04*   PHP 7.4 type hint
 *
 * @package SKien/PNServer
 * @version 1.1.0
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class PNVapid
{
    use PNServerHelper;
    
    /** lenght of public key (Base64URL - decoded)  */
    const PUBLIC_KEY_LENGTH = 65;
    /** lenght of private key (Base64URL - decoded) */
    const PRIVATE_KEY_LENGTH = 32;
    
    const ERR_EMPTY_ARGUMENT = 'Empty Argument!';
    const ERR_INVALID_PUBLIC_KEY_LENGTH = 'Invalid public key length!';
    const ERR_INVALID_PRIVATE_KEY_LENGTH = 'Invalid private key length!';
    const ERR_NO_COMPRESSED_KEY_SUPPORTED = 'Invalid public key: only uncompressed keys are supported!';

    /** @var string VAPID subject (email or uri)    */
    protected string $strSubject = '';
    /** @var string public key                      */
    protected string $strPublicKey = '';
    /** @var string private key                     */
    protected string $strPrivateKey = '';
    /** @var string last error msg                  */
    protected string $strError = '';
    
    /**
     * @param string $strSubject usually 'mailto:mymail@mydomain.de'
     * @param string $strPublicKey
     * @param string $strPrivateKey
     */
    public function __construct(string $strSubject, string $strPublicKey, string $strPrivateKey) 
    {
        $this->strSubject = $strSubject;
        $this->strPublicKey = $this->decodeBase64URL($strPublicKey);
        $this->strPrivateKey = $this->decodeBase64URL($strPrivateKey);
    }

    /**
     * Check for valid VAPID.
     * - subject, public key and private key must be set <br>
     * - decoded public key must be 65 bytes long  <br>
     * - no compresed public key supported <br>
     * - decoded private key must be 32 bytes long <br>
     * @return bool
     */
    public function isValid() : bool 
    {
        if (strlen($this->strSubject) == 0 || 
            strlen($this->strPublicKey) == 0 ||
            strlen($this->strPrivateKey) == 0) {
            $this->strError = self::ERR_EMPTY_ARGUMENT;
            return false;
        }
        if (mb_strlen($this->strPublicKey, '8bit') !== self::PUBLIC_KEY_LENGTH) {
            $this->strError = self::ERR_INVALID_PUBLIC_KEY_LENGTH;
            return false;
        }
        $hexPublicKey = bin2hex($this->strPublicKey);
        if (mb_substr($hexPublicKey, 0, 2, '8bit') !== '04') {
            $this->strError = self::ERR_NO_COMPRESSED_KEY_SUPPORTED;
            return false;
        }
        if (mb_strlen($this->strPrivateKey, '8bit') !== self::PRIVATE_KEY_LENGTH) {
            $this->strError = self::ERR_INVALID_PRIVATE_KEY_LENGTH;
            return false;
        }
        return true;
    }
    
    /**
     * Create header for endpoint using current timestamp.
     * @param string $strEndpoint
     * @return array|bool headers if succeeded, false on error
     */
    public function getHeaders(string $strEndpoint)
    {
        $aHeaders = false;
        
        // info 
        $aJwtInfo = array("typ" => "JWT", "alg" => "ES256");
        $strJwtInfo = self::encodeBase64URL(json_encode($aJwtInfo));
        
        // data
        // - origin from endpoint
        // - timeout 12h from now
        // - subject (e-mail or URL to invoker of VAPID-keys)
        // TODO: change param to $strEndPointOrigin to eliminate dependency to PNSubscription!
        $aJwtData = array(
                'aud' => PNSubscription::getOrigin($strEndpoint),
                'exp' => time() + 43200,
                'sub' => $this->strSubject
            );
        $strJwtData = self::encodeBase64URL(json_encode($aJwtData));
        
        // signature
        // ECDSA encrypting "JwtInfo.JwtData" using the P-256 curve and the SHA-256 hash algorithm
        $strData = $strJwtInfo . '.' . $strJwtData;
        $pem = self::getP256PEM($this->strPublicKey, $this->strPrivateKey);
        
        $this->strError = 'Error creating signature!';
        $strSignature = '';
        if (\openssl_sign($strData, $strSignature, $pem, OPENSSL_ALGO_SHA256)) {
            if (($sig = self::signatureFromDER($strSignature)) !== false) {
                $this->strError = '';
                $strSignature = self::encodeBase64URL($sig);            
                $aHeaders = array( 
                        'Authorization' => 'WebPush ' . $strJwtInfo . '.' . $strJwtData . '.' . $strSignature,
                        'Crypto-Key'    => 'p256ecdsa=' . self::encodeBase64URL($this->strPublicKey)
                    );
            }
        }
        return $aHeaders;
    }
    
    /**
     * @return string last error
     */
    public function getError() : string 
    {
        return $this->strError;
    }
}
