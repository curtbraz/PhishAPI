<?php
declare(strict_types=1);

namespace SKien\PNServer;

use SKien\PNServer\Utils\NistCurve;

/**
 * class to perform the encryption of the payload
 * 
 * parts of the code are based on the web-push-php package contributetd by 
 * Louis Lagrange / Minishlink
 *  @link https://github.com/web-push-libs/web-push-php
 * and from package spomky-labs/jose
 *  @link https://github.com/Spomky-Labs/Jose
 *
 * thanks to Matt Gaunt and Mat Scale  
 *  @link https://web-push-book.gauntface.com/downloads/web-push-book.pdf
 *  @link https://developers.google.com/web/updates/2016/03/web-push-encryption
 *
 * #### History
 * - *2020-04-12*   initial version
 * - *2020-08-03*   PHP 7.4 type hint
 *
 * @package SKien/PNServer
 * @version 1.1.0
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class PNEncryption
{
    use PNServerHelper;

    /** max length of the payload                   */
    const MAX_PAYLOAD_LENGTH = 4078;
    /** max compatible length of the payload        */
    const MAX_COMPATIBILITY_PAYLOAD_LENGTH = 3052;
    
    /** @var string public key from subscription        */
    protected string $strSubscrKey = '';
    /** @var string subscription authenthication code   */
    protected string $strSubscrAuth = '';
    /** @var string encoding 'aesgcm' / 'aes128gcm'     */
    protected string $strEncoding = '';
    /** @var string payload to encrypt                  */ 
    protected string $strPayload = '';
    /** @var string local generated public key          */
    protected string $strLocalPublicKey = '';
    /** @var \GMP   local generated private key         */
    protected \GMP $gmpLocalPrivateKey;
    /** @var string generated salt                      */
    protected string $strSalt = '';
    /** @var string last error msg                          */
    protected string $strError = '';
    
    /**
     * @param string $strSubscrKey      public key from subscription
     * @param string $strSubscrAuth     subscription authenthication code
     * @param string $strEncoding       encoding (default: 'aesgcm')
     */
    public function __construct(string $strSubscrKey, string $strSubscrAuth, string $strEncoding = 'aesgcm') 
    {
        $this->strSubscrKey = self::decodeBase64URL($strSubscrKey);
        $this->strSubscrAuth = self::decodeBase64URL($strSubscrAuth);
        $this->strEncoding = $strEncoding;
        $this->strError = '';
    }
    
    /**
     * encrypt the payload.
     * @param string $strPayload
     * @return string|bool encrypted string at success, false on any error
     */
    public function encrypt(string $strPayload) 
    {
        $this->strError = '';
        $this->strPayload = $strPayload;
        $strContent = false;
        
        // there's nothing to encrypt without payload...
        if (strlen($strPayload) == 0) {
            // it's OK - just set content-length of request to 0!
            return '';
        }
        
        if ($this->strEncoding !== 'aesgcm' && $this->strEncoding !== 'aes128gcm') {
            $this->strError = "Encoding '" . $this->strEncoding . "' is not supported!";
            return false;
        }
        
        if (mb_strlen($this->strSubscrKey, '8bit') !== 65) {
            $this->strError = "Invalid client public key length!";
            return false;
        }
        
        try {
            // create random salt and local key pair
            $this->strSalt = \random_bytes(16); 
            if (!$this->createLocalKey()) {
                return false;
            }
            
            // create shared secret between local private key and public subscription key 
            $strSharedSecret = $this->getSharedSecret();
    
            // context and pseudo random key (PRK) to create content encryption key (CEK) and nonce
            /*
             * A nonce is a value that prevents replay attacks as it should only be used once.
             * The content encryption key (CEK) is the key that will ultimately be used toencrypt 
             * our payload.
             * @link https://en.wikipedia.org/wiki/Cryptographic_nonce 
             */         
            $context = $this->createContext();
            $prk = $this->getPRK($strSharedSecret);
                
            // derive the encryption key
            $cekInfo = $this->createInfo($this->strEncoding, $context);
            $cek = self::hkdf($this->strSalt, $prk, $cekInfo, 16);
            
            // and the nonce
            $nonceInfo = $this->createInfo('nonce', $context);
            $nonce = self::hkdf($this->strSalt, $prk, $nonceInfo, 12);
            
            // pad payload ... from now payload converted to binary string
            $strPayload = $this->padPayload($strPayload, self::MAX_COMPATIBILITY_PAYLOAD_LENGTH);
            
            // encrypt
            // "The additional data passed to each invocation of AEAD_AES_128_GCM is a zero-length octet sequence."
            $strTag = '';
            $strEncrypted = openssl_encrypt($strPayload, 'aes-128-gcm', $cek, OPENSSL_RAW_DATA, $nonce, $strTag);
            
            // base64URL encode salt and local public key
            $this->strSalt = self::encodeBase64URL($this->strSalt);
            $this->strLocalPublicKey = self::encodeBase64URL($this->strLocalPublicKey);
            
            $strContent = $this->getContentCodingHeader() . $strEncrypted . $strTag;
        } catch (\RuntimeException $e) {
            $this->strError = $e->getMessage();
            $strContent = false;
        }
        
        return $strContent;
    }
    
    /**
     * Get headers for previous encrypted payload.
     * Already existing headers (e.g. the VAPID-signature) can be passed through the input param
     * and will be merged with the additional headers for the encryption
     * 
     * @param array $aHeaders   existing headers to merge with
     * @return array
     */
    public function getHeaders(?array $aHeaders = null) : array 
    {
        if (!$aHeaders) {
            $aHeaders = array();
        }
        if (strlen($this->strPayload) > 0) {
            $aHeaders['Content-Type'] = 'application/octet-stream';
            $aHeaders['Content-Encoding'] = $this->strEncoding;
            if ($this->strEncoding === "aesgcm") {
                $aHeaders['Encryption'] = 'salt=' . $this->strSalt;
                if (isset($aHeaders['Crypto-Key'])) {
                    $aHeaders['Crypto-Key'] = 'dh=' . $this->strLocalPublicKey . ';' . $aHeaders['Crypto-Key'];
                } else {
                    $aHeaders['Crypto-Key'] = 'dh=' . $this->strLocalPublicKey;
                }
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
    
    /**
     * create local public/private key pair using prime256v1 curve
     * @return bool
     */
    private function createLocalKey() : bool
    {
        $bSucceeded = false;
        $keyResource = \openssl_pkey_new(['curve_name' => 'prime256v1', 'private_key_type' => OPENSSL_KEYTYPE_EC]);
        if ($keyResource !== false) {
            $details = \openssl_pkey_get_details($keyResource);
            \openssl_pkey_free($keyResource);
        
            if ($details !== false) {
                $this->strLocalPublicKey  = '04';
                $this->strLocalPublicKey .= str_pad(gmp_strval(gmp_init(bin2hex($details['ec']['x']), 16), 16), 64, '0', STR_PAD_LEFT);
                $this->strLocalPublicKey .= str_pad(gmp_strval(gmp_init(bin2hex($details['ec']['y']), 16), 16), 64, '0', STR_PAD_LEFT);
                $this->strLocalPublicKey = hex2bin($this->strLocalPublicKey);
                
                $this->gmpLocalPrivateKey = gmp_init(bin2hex($details['ec']['d']), 16);
                $bSucceeded = true;
            }
        }
        if (!$bSucceeded) {
            $this->strError = 'openssl: ' . \openssl_error_string();
        }
        return $bSucceeded;
    }
    
    /**
     * build shared secret from user public key and local private key using prime256v1 curve 
     * @return string
     */
    private function getSharedSecret() : string 
    {

        $curve = NistCurve::curve256();
        
        $x = '';
        $y = '';
        self::getXYFromPublicKey($this->strSubscrKey, $x, $y);
        
        $strSubscrKeyPoint = $curve->getPublicKeyFrom(\gmp_init(bin2hex($x), 16), \gmp_init(bin2hex($y), 16));
        
        // get shared secret from user public key and local private key
        $strSharedSecret = $curve->mul($strSubscrKeyPoint, $this->gmpLocalPrivateKey);
        $strSharedSecret = $strSharedSecret->getX();
        $strSharedSecret = hex2bin(str_pad(\gmp_strval($strSharedSecret, 16), 64, '0', STR_PAD_LEFT));
        
        return $strSharedSecret;
    }
    
    /**
     * get pseudo random key
     * @param string $strSharedSecret
     * @return string
     */
    private function getPRK(string $strSharedSecret) : string
    {
        if (!empty($this->strSubscrAuth)) {
            if ($this->strEncoding === "aesgcm") {
                $info = 'Content-Encoding: auth' . chr(0);
            } else {
                $info = "WebPush: info" . chr(0) . $this->strSubscrKey . $this->strLocalPublicKey;
            }
            $strSharedSecret = self::hkdf($this->strSubscrAuth, $strSharedSecret, $info, 32);
        }
    
        return $strSharedSecret;
    }

    /**
     * Creates a context for deriving encryption parameters.
     * See section 4.2 of
     * {@link https://tools.ietf.org/html/draft-ietf-httpbis-encryption-encoding-00}
     * From {@link https://github.com/GoogleChrome/push-encryption-node/blob/master/src/encrypt.js}.
     *
     * @return null|string
     * @throws \ErrorException
     */
    private function createContext() : ?string
    {
        if ($this->strEncoding === "aes128gcm") {
            return null;
        }

        // This one should never happen, because it's our code that generates the key
        /*
        if (mb_strlen($this->strLocalPublicKey, '8bit') !== 65) {
            throw new \ErrorException('Invalid server public key length');
        }
        */

        $len = chr(0) . 'A'; // 65 as Uint16BE

        return chr(0) . $len . $this->strSubscrKey . $len . $this->strLocalPublicKey;
    }

    /**
     * Returns an info record. See sections 3.2 and 3.3 of
     * {@link https://tools.ietf.org/html/draft-ietf-httpbis-encryption-encoding-00}
     * From {@link https://github.com/GoogleChrome/push-encryption-node/blob/master/src/encrypt.js}.
     *
     * @param string $strType The type of the info record
     * @param string|null $strContext The context for the record
     * @return string
     * @throws \ErrorException
     */
    private function createInfo(string $strType, ?string $strContext) : string
    {
        if ($this->strEncoding === "aesgcm") {
            if (!$strContext) {
                throw new \ErrorException('Context must exist');
            }

            if (mb_strlen($strContext, '8bit') !== 135) {
                throw new \ErrorException('Context argument has invalid size');
            }

            $strInfo = 'Content-Encoding: ' . $strType . chr(0) . 'P-256' . $strContext;
        } else {
            $strInfo = 'Content-Encoding: ' . $strType . chr(0);
        }
        return $strInfo;
    }
    
    /**
     * get the content coding header to add to encrypted payload
     * @return string
     */
    private function getContentCodingHeader() : string
    {
        $strHeader = '';
        if ($this->strEncoding === "aes128gcm") {
            $strHeader = $this->strSalt
                . pack('N*', 4096)
                . pack('C*', mb_strlen($this->strLocalPublicKey, '8bit'))
                . $this->strLocalPublicKey;
        }
        return $strHeader;
    }
    
    /**
     * pad the payload.
     * Before we encrypt our payload, we need to define how much padding we wish toadd to 
     * the front of the payload. The reason we’d want to add padding is that it prevents 
     * the risk of eavesdroppers being able to determine “types” of messagesbased on the 
     * payload size. We must add two bytes of padding to indicate the length of any 
     * additionalpadding.
     * 
     * @param string $strPayload
     * @param int $iMaxLengthToPad
     * @return string
     */
    private function padPayload(string $strPayload, int $iMaxLengthToPad = 0) : string
    {
        $iLen = mb_strlen($strPayload, '8bit');
        $iPad = $iMaxLengthToPad ? $iMaxLengthToPad - $iLen : 0;
    
        if ($this->strEncoding === "aesgcm") {
            $strPayload = pack('n*', $iPad) . str_pad($strPayload, $iPad + $iLen, chr(0), STR_PAD_LEFT);
        } elseif ($this->strEncoding === "aes128gcm") {
            $strPayload = str_pad($strPayload . chr(2), $iPad + $iLen, chr(0), STR_PAD_RIGHT);
        }
        return $strPayload;
    }

    /**
     * HMAC-based Extract-and-Expand Key Derivation Function (HKDF).
     *
     * This is used to derive a secure encryption key from a mostly-secure shared
     * secret.
     *
     * This is a partial implementation of HKDF tailored to our specific purposes.
     * In particular, for us the value of N will always be 1, and thus T always
     * equals HMAC-Hash(PRK, info | 0x01).
     *
     * See {@link https://www.rfc-editor.org/rfc/rfc5869.txt}
     * From {@link https://github.com/GoogleChrome/push-encryption-node/blob/master/src/encrypt.js}
     *
     * @param string $salt   A non-secret random value
     * @param string $ikm    Input keying material
     * @param string $info   Application-specific context
     * @param int    $length The length (in bytes) of the required output key
     *
     * @return string
     */
    private static function hkdf(string $salt, string $ikm, string $info, int $length) : string
    {
        // extract
        $prk = hash_hmac('sha256', $ikm, $salt, true);
    
        // expand
        return mb_substr(hash_hmac('sha256', $info . chr(1), $prk, true), 0, $length, '8bit');
    }
}
