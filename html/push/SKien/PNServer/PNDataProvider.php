<?php
declare(strict_types=1);

namespace SKien\PNServer;

use Psr\Log\LoggerInterface;

/**
 * Interface for dataproviders.
 * 
 * Constructor of implementing classes will be different to meet the 
 * needs of the data source.
 * 
 * #### History
 * - *2020-04-02*   initial version
 * - *2020-08-03*   PHP 7.4 type hint
 * 
 * @package SKien/PNServer
 * @version 1.1.0
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
*/
interface PNDataProvider
{
    /** default table name */
    const TABLE_NAME = "tPNSubscription";
    /** internal id     */
    const COL_ID            = "id";
    /** endpoint        */
    const COL_ENDPOINT      = "endpoint";
    /** expiration      */
    const COL_EXPIRES       = "expires";
    /** complete subscription as JSON-string    */
    const COL_SUBSCRIPTION  = "subscription";
    /** user agent at endpoint                  */
    const COL_USERAGENT     = "useragent";
    /** timestamp supscription last updated     */
    const COL_LASTUPDATED   = "lastupdated";

    /**
     * check, if connected to data source
     */
    public function isConnected() : bool;
    
    /**
     * Saves subscription.
     * Inserts new or replaces existing subscription. 
     * UNIQUE identifier alwas is the endpoint!
     * @param string $strJSON   subscription as well formed JSON-string
     * @return bool true on success
     */
    public function saveSubscription(string $strJSON) : bool;
    
    /**
     * Remove subscription for $strEndPoint from DB.
     * @param string $strEndpoint
     * @return bool true on success
     */
    public function removeSubscription(string $strEndpoint) : bool;
    
    /**
     * Initialization for fetching data.
     * @param bool $bAutoRemove     automatic remove of expired subscriptions
     * @return bool true on success
     */
    public function init(bool $bAutoRemove = true) : bool;
    
    /**
     * Get count of subscriptions.
     * @return int
     */
    public function count() : int;
    
    /**
     * Fetch next subscription. 
     * @return string|bool subscription as well formed JSON-string or false at end of list
     */
    public function fetch();
    
    /**
     * Truncate subscription table.
     * (almost only needed while development and for testing/phpunit)
     * @return bool
     */
    public function truncate() : bool;
    
    /**
     * Get column value of last fetched row
     * @param string $strName
     * @return string column value or null, if no row selected or column not exist
     */ 
    public function getColumn(string $strName) : ?string;
    
    /**
     * @return string
     */
    public function getError() : string;
    
    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger) : void;
}
