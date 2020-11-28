<?php
declare(strict_types=1);

namespace SKien\PNServer;

/**
 * class representing payload for push notification.
 * 
 * the class provides functions to define the properties of a push 
 * notification. As result, a JSON string is generated to push to the client.
 * 
 * Most properties directly map the showNotification() options and are 
 * passed on directly within the service worker. 
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
class PNPayload
{
    use PNServerHelper;
    
    /** @var array  */
    protected array $aPayload;

    /**
     * Create instance of payload with title, text and icon to display.
     * - title should be short and meaningfull.
     * - The text should not increase 200 characters - the different browsers and 
     *   platforms limit the display differently (partly according to the number of 
     *   lines, others according to the number of characters)
     * - icon should be square (if not, some browsers/platforms cut a square). There 
     *   is no exact specification for the 'optimal' size, 64dp (px * device pixel ratio)
     *   should be a good decision (... 192px for highest device pixel ratio)
     *     
     * @param string $strTitle Title to display
     * @param string $strText A string representing an extra content to display within the notification.
     * @param string $strIcon containing the URL of an image to be used as an icon by the notification.
     */
    public function __construct(string $strTitle, ?string $strText = null, ?string $strIcon = null) 
    {
        $this->aPayload = array(
                'title' => $strTitle,
                'opt' => array(
                        'body' => $strText,
                        'icon' => $strIcon,
                    ),
            );
    }
    
    /**
     * Note: the URL is no part of the JS showNotification() - Options!
     * @param string $strURL    URL to open when user click on the notification.
     */
    public function setURL(string $strURL) : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            if (!isset($this->aPayload['opt']['data']) || !is_array($this->aPayload['opt']['data'])) {
                $this->aPayload['opt']['data'] = array();
            }
            $this->aPayload['opt']['data']['url'] = $strURL;
        }
    }
    
    /**
     * An ID for a given notification that allows you to find, replace, or remove the notification using 
     * a script if necessary. 
     * If set, multiple notifications with the same tag will only reappear if $bReNotify is set to true.
     * Usualy the last notification with same tag is displayed in this case.
     * 
     * @param string $strTag
     * @param bool $bReNotify
     */
    public function setTag(string $strTag, bool $bReNotify = false) : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            $this->aPayload['opt']['tag'] = $strTag;
            $this->aPayload['opt']['renotify'] = $bReNotify;
        }
    }

    /**
     * containing the URL of an larger image to be displayed in the notification.
     * Size, position and cropping vary with the different browsers and platforms
     * @param string $strImage
     */
    public function setImage(string $strImage) : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            $this->aPayload['opt']['image'] = $strImage;
        }
    }

    /**
     * containing the URL of an badge assigend to the notification.
     * The badge is a small monochrome icon that is used to portray a little 
     * more information to the user about where the notification is from.
     * So far I have only found Chrome for Android that supports the badge...
     * ... in most cases the browsers icon is displayed. 
     *  
     * @param string $strBadge
     */
    public function setBadge(string $strBadge) : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            $this->aPayload['opt']['badge'] = $strBadge;
        }
    }
    
    /**
     * Add action to display in the notification.
     * 
     * The count of action that can be displayed vary between browser/platform. On
     * the client it can be detected with javascript: Notification.maxActions 
     * 
     * Appropriate responses have to be implemented within the notificationclick event.
     * the event.action property contains the $strAction clicked on
     * 
     * @param string $strAction     identifying a user action to be displayed on the notification.
     * @param string $strTitle      containing action text to be shown to the user.
     * @param string $strIcon       containing the URL of an icon to display with the action.
     * @param string $strCustom     custom info - not part of the showNotification()- Options!
     */
    public function addAction(string $strAction, string $strTitle, ?string $strIcon = null, string $strCustom = '') : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            if (!isset($this->aPayload['opt']['actions']) || !is_array($this->aPayload['opt']['actions'])) {
                $this->aPayload['opt']['actions'] = array();
            }
            $this->aPayload['opt']['actions'][] = array('action' => $strAction, 'title' => $strTitle, 'icon' => $strIcon, 'custom' => $strCustom);
        }
    }
    
    /**
     * Set the time when the notification was created. 
     * It can be used to indicate the time at which a notification is actual. For example, this could 
     * be in the past when a notification is used for a message that couldn’t immediately be delivered 
     * because the device was offline, or in the future for a meeting that is about to start.
     * 
     * @param mixed $timestamp  DateTime object, UNIX timestamp or English textual datetime description
     */
    public function setTimestamp($timestamp) : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            $iTimestamp = $timestamp;
            if (self::className($timestamp) == 'DateTime') {
                // DateTime -object
                $iTimestamp = $timestamp->getTimestamp();
            } else if (is_string($timestamp)) {
                // string
                $iTimestamp = strtotime($timestamp);
            }
            // timestamp in milliseconds!
            $this->aPayload['opt']['timestamp'] = bcmul((string) $iTimestamp, '1000');
        }
    }
    
    /**
     * Indicates that on devices with sufficiently large screens, a notification should remain active until 
     * the user clicks or dismisses it. If this value is absent or false, the desktop version of Chrome 
     * will auto-minimize notifications after approximately twenty seconds. Implementation depends on
     * browser and plattform. 
     * 
     * @param bool $bSet
     */
    public function requireInteraction(bool $bSet = true) : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            $this->aPayload['opt']['requireInteraction'] = $bSet;
        }
    }

    /**
     * Indicates that no sounds or vibrations should be made. 
     * If this 'mute' function is activated, a previously set vibration is reset to prevent a TypeError exception.
     * @param bool $bSet
     */
    public function setSilent(bool $bSet = true) : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            $this->aPayload['opt']['silent'] = $bSet;
            if ($bSet && isset($this->aPayload['opt']['vibrate'])) {
                // silent=true and defined vibation causes TypeError 
                unset($this->aPayload['opt']['vibrate']);
            }
        }
    }

    /**
     * A vibration pattern to run with the display of the notification. 
     * A vibration pattern can be an array with as few as one member. The values are times in milliseconds 
     * where the even indices (0, 2, 4, etc.) indicate how long to vibrate and the odd indices indicate 
     * how long to pause. For example, [300, 100, 400] would vibrate 300ms, pause 100ms, then vibrate 400ms.
     * 
     * @param array $aPattern
     */
    public function setVibration(array $aPattern) : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            $this->aPayload['opt']['vibrate'] = $aPattern;
            if (isset($this->aPayload['opt']['silent'])) {
                // silent=true and vibation pattern causes TypeError
                $this->aPayload['opt']['silent'] = false;
            }
        }
    }
    
    /**
     * containing the URL of an sound - file (mp3 or wav).
     * currently not found any browser supports sounds
     * @param string $strSound
     */
    public function setSound(string $strSound) : void
    {
        if (is_array($this->aPayload) && isset($this->aPayload['opt']) && is_array($this->aPayload['opt'])) {
            $this->aPayload['opt']['sound'] = $strSound;
        }
    }
    
    /**
     * Get the Payload data as array
     * @return array
     */
    public function getPayload() : array
    {
        return $this->aPayload;
    }
    
    /**
     * Convert payload dasta to JSON string.
     * @return string JSON string representing payloal
     */
    public function toJSON() : string
    {
        return utf8_encode(json_encode($this->aPayload));       
    }
    
    /**
     * @return string JSON string representing payloal
     */
    public function __toString() : string
    {
        return $this->toJSON();
    }
    
}
