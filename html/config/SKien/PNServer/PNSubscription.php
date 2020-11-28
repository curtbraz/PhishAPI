<?php
declare(strict_types=1);

namespace SKien\PNServer;

/**
 * class representing subscrition
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
class PNSubscription
{
    use PNServerHelper;
    
    /** @var string the endpoint URL for the push notification       */
    protected string $strEndpoint = '';
    /** @var string public key          */
    protected string $strPublicKey = '';
    /** @var string authentification token              */
    protected string $strAuth = '';
    /** @var int unix timesatmp of expiration (0, if no expiration defined)  */
    protected int $timeExpiration = 0;
    /** @var string encoding ('aesgcm' / 'aes128gcm')    */
    protected string $strEncoding = '';
    
    /**
     * Use static method PNSubscription::fromJSON() instead of new-operator
     * if data is available as JSON-string
     * @param string $strEndpoint
     * @param string $strPublicKey
     * @param string $strAuth
     * @param int $timeExpiration
     * @param string $strEncoding
     */
    public function __construct(string $strEndpoint, string $strPublicKey, string $strAuth, int $timeExpiration = 0, string $strEncoding = 'aesgcm') 
    {
        $this->strEndpoint = $strEndpoint;
        $this->strPublicKey = $strPublicKey;
        $this->strAuth = $strAuth;
        $this->timeExpiration = $timeExpiration;
        $this->strEncoding = $strEncoding;
    }

    /**
     * @param string $strJSON   subscription as valid JSON string 
     * @return PNSubscription
     */
    public static function fromJSON(string $strJSON) : PNSubscription 
    {
        $strEndpoint = '';
        $strPublicKey = '';
        $strAuth = '';
        $timeExpiration = 0;
        $aJSON = json_decode($strJSON, true);
        if (isset($aJSON['endpoint'])) {
            $strEndpoint = $aJSON['endpoint'];
        }
        if (isset($aJSON['expirationTime'])) {
            $timeExpiration = intval(bcdiv($aJSON['expirationTime'], '1000'));
        }
        if (isset($aJSON['keys'])) {
            if (isset($aJSON['keys']['p256dh'])) {
                $strPublicKey = $aJSON['keys']['p256dh'];
            }
            if (isset($aJSON['keys']['auth'])) {
                $strAuth = $aJSON['keys']['auth'];
            }
        }
        return new self($strEndpoint, $strPublicKey, $strAuth, $timeExpiration);
    }

    /**
     * basic check if object containing valid data
     * - endpoint, public key and auth token must be set
     * - only encoding 'aesgcm' or 'aes128gcm' supported
     * @return bool
     */
    public function isValid() : bool 
    {
        $bValid = false;
        if (!$this->isExpired()) {
            $bValid = (
                    isset($this->strEndpoint) && strlen($this->strEndpoint) > 0 &&
                    isset($this->strPublicKey) && strlen($this->strPublicKey) > 0 &&
                    isset($this->strAuth) && strlen($this->strAuth) > 0 &&
                    ($this->strEncoding == 'aesgcm' || $this->strEncoding == 'aes128gcm') 
                );
        }
        return $bValid;
    }
    
    /**
     * @return string
     */
    public function getEndpoint() : string 
    {
        return $this->strEndpoint;
    }

    /**
     * @return string
     */
    public function getPublicKey() : string 
    {
        return $this->strPublicKey;
    }

    /**
     * @return string
     */
    public function getAuth() : string 
    {
        return $this->strAuth;
    }

    /**
     * @return string
     */
    public function getEncoding() : string 
    {
        return $this->strEncoding;
    }

    /**
     * @param string $strEndpoint
     */
    public function setEndpoint(string $strEndpoint) : void
    {
        $this->strEndpoint = $strEndpoint;
    }

    /**
     * @param string $strPublicKey
     */
    public function setPublicKey(string $strPublicKey) : void
    {
        $this->strPublicKey = $strPublicKey;
    }

    /**
     * @param string $strAuth
     */
    public function setAuth(string $strAuth) : void
    {
        $this->strAuth = $strAuth;
    }

    /**
     * @param int $timeExpiration
     */
    public function setExpiration(int $timeExpiration) : void
    {
        $this->timeExpiration = $timeExpiration;
    }

    /**
     * @param string $strEncoding
     */
    public function setEncoding(string $strEncoding) : void
    {
        $this->strEncoding = $strEncoding;
    }

    /**
     * @return bool
     */
    public function isExpired() : bool 
    {
        return ($this->timeExpiration != 0 && $this->timeExpiration < time());  
    }
    
    /**
     * extract origin from endpoint
     * @param string $strEndpoint endpoint URL
     * @return string
     */
    public static function getOrigin(string $strEndpoint) : string
    {
        return parse_url($strEndpoint, PHP_URL_SCHEME) . '://' . parse_url($strEndpoint, PHP_URL_HOST);
    }
}
