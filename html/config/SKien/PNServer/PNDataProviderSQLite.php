<?php
declare(strict_types=1);

namespace SKien\PNServer;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * dataprovider for SqLite database
 * uses given Table in specified SqLite database
 * 
 * if not specified in constructor, default table self::TABLE_NAME in 
 * databasefile 'pnsub.sqlite' in current working directory is used. 
 * DB-file and/or table are created if not exist so far.
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
class PNDataProviderSQLite implements PNDataProvider 
{
    /** @var string tablename                    */
    protected string $strTableName;
    /** @var string name of the DB file          */
    protected string $strDBName; 
    /** @var \SQLite3 internal SqLite DB         */
    protected ?\SQLite3 $db = null;
    /** @var \SQLite3Result|bool result of DB queries (no type hint - \SQLite3::query() returns \SQLite3Result|bool) */
    protected $dbres = false;
    /** @var array|bool last fetched row or false (no type hint - \SQLite3Result::fetchArray() returns array|bool)    */
    protected $row = false;
    /** @var string last error                   */
    protected string $strLastError;
    /** @var bool does table exist               */
    protected bool $bTableExist = false;
    /** @var LoggerInterface $logger     */
    protected LoggerInterface $logger;
    
    /**
     * @param string $strDir        directory -  if null, current working directory assumed
     * @param string $strDBName     name of DB file - if null, file 'pnsub.sqlite' is used and created if not exist
     * @param string $strTableName  tablename for the subscriptions - if null, self::TABLE_NAME is used and created if not exist
     * @param LoggerInterface $logger
     */
    public function __construct(?string $strDir = null, ?string $strDBName = null, ?string $strTableName = null, ?LoggerInterface $logger = null) 
    {
        $this->logger = isset($logger) ? $logger : new NullLogger();
        $this->strTableName = isset($strTableName) ? $strTableName : self::TABLE_NAME;
        $this->strDBName = isset($strDBName) ? $strDBName : 'pnsub.sqlite';
        $this->strLastError = ''; 
        $strDBName = $this->strDBName;
        if (isset($strDir) && strlen($strDir) > 0) {
            $strDBName = rtrim($strDir, DIRECTORY_SEPARATOR) . DIRECTORY_SEPARATOR . $this->strDBName;
        }
        try {
            if (file_exists($strDBName) && !is_writable($strDBName)) {
                $this->strLastError .= 'readonly database file ' . $strDBName . '!';
                $this->logger->error(__CLASS__ . ': ' . $this->strLastError);
            } else {
                $this->db = new \SQLite3($strDBName);
                if (!$this->tableExist()) {
                    $this->createTable();
                }
            }
        } catch (\Exception $e) {
            $this->db = null;
            $this->strLastError = $e->getMessage();
            if (!file_exists($strDBName)) {
                $strDir = pathinfo($strDBName, PATHINFO_DIRNAME) == '' ? __DIR__ : pathinfo($strDBName, PATHINFO_DIRNAME);
                if (!is_writable($strDir)) {
                    $this->strLastError .= ' (no rights to write on directory ' . $strDir . ')';
                }
            }
            $this->logger->error(__CLASS__ . ': ' . $this->strLastError);
        }
    }

    /**
     * {@inheritDoc}
     * @see PNDataProvider::isConnected()
     */
    public function isConnected() : bool 
    {
        if (!$this->db) {
            if (strlen($this->strLastError) == 0) {
                $this->strLastError = 'no database connected!';
            }
            $this->logger->error(__CLASS__ . ': ' . $this->strLastError);
        } else if (!$this->tableExist()) {
            // Condition cannot be forced to test
            // - can only occur during development using invalid SQL-statement for creation!
            // @codeCoverageIgnoreStart
            if (strlen($this->strLastError) == 0) {
                $this->strLastError = 'database table ' . $this->strTableName . ' not exist!';
            }
            $this->logger->error(__CLASS__ . ': ' . $this->strLastError);
            // @codeCoverageIgnoreEnd
        }
        return ($this->db && $this->bTableExist);
    }
    
    /**
     * {@inheritDoc}
     * @see PNDataProvider::saveSubscription()
     */
    public function saveSubscription(string $strJSON) : bool 
    {
        $bSucceeded = false;
        if ($this->isConnected()) {
            $oSubscription = json_decode($strJSON, true);
            if ($oSubscription) {
                $iExpires = isset($oSubscription['expirationTime']) ? bcdiv((string) $oSubscription['expirationTime'], '1000') : 0;
                $strUserAgent = isset($oSubscription['userAgent']) ? $oSubscription['userAgent'] : 'unknown UserAgent';
                
                // insert or update - relevant is the endpoint as unique index 
                $strSQL  = "REPLACE INTO " . $this->strTableName . " (";
                $strSQL .= self::COL_ENDPOINT;
                $strSQL .= "," . self::COL_EXPIRES;
                $strSQL .= "," . self::COL_SUBSCRIPTION;
                $strSQL .= "," . self::COL_USERAGENT;
                $strSQL .= "," . self::COL_LASTUPDATED;
                $strSQL .= ") VALUES(";
                $strSQL .= "'" . $oSubscription['endpoint'] . "'";
                $strSQL .= "," . $iExpires;
                $strSQL .= ",'" . $strJSON . "'";
                $strSQL .= ",'" . $strUserAgent . "'";
                $strSQL .= ',' . time();
                $strSQL .= ");";

                $bSucceeded = $this->db->exec($strSQL);
                $this->setSQLiteError($bSucceeded);
                $this->logger->info(__CLASS__ . ': ' . 'Subscription saved', strlen($this->strLastError) > 0 ? ['error' => $this->strLastError] : []);
            } else {
                $this->strLastError = 'Error json_decode: ' . json_last_error_msg();
                $this->logger->error(__CLASS__ . ': ' . $this->strLastError);
            }
        }
        return $bSucceeded;
    }
    
    /**
     * {@inheritDoc}
     * @see PNDataProvider::removeSubscription()
     */
    public function removeSubscription(string $strEndpoint) : bool 
    {
        $bSucceeded = false;
        if ($this->isConnected()) {
            $strSQL  = "DELETE FROM " . $this->strTableName . " WHERE " . self::COL_ENDPOINT . " LIKE ";
            $strSQL .= "'" . $strEndpoint . "'";
        
            $bSucceeded = $this->db->exec($strSQL);
            $this->setSQLiteError($bSucceeded);
            $this->logger->info(__CLASS__ . ': ' . 'Subscription removed', strlen($this->strLastError) > 0 ? ['error' => $this->strLastError] : []);
        }
        return $bSucceeded;
    }
    
    /**
     * select all subscriptions not expired so far
     * {@inheritDoc}
     * @see PNDataProvider::init()
     */
    public function init(bool $bAutoRemove = true) : bool 
    {
        $bSucceeded = false;
        $this->dbres = false;
        $this->row = false;
        if ($this->isConnected()) {
            if ($bAutoRemove) {
                // remove expired subscriptions from DB
                $strSQL = "DELETE FROM " . $this->strTableName . " WHERE ";
                $strSQL .= self::COL_EXPIRES . " != 0 AND ";
                $strSQL .= self::COL_EXPIRES . " < " . time();
                
                $bSucceeded = $this->db->exec($strSQL);
                $this->setSQLiteError($bSucceeded !== false);
                $strSQL = "SELECT * FROM " . $this->strTableName;
            } else {
                // or just exclude them from query
                $strSQL = "SELECT * FROM " . $this->strTableName . " WHERE ";
                $strSQL .= self::COL_EXPIRES . " = 0 OR ";
                $strSQL .= self::COL_EXPIRES . " >= " . time();
                $bSucceeded = true;
            }
            if ($bSucceeded) {
                $this->dbres = $this->db->query($strSQL);
                $bSucceeded = $this->dbres !== false && $this->dbres->numColumns() > 0;
                $this->setSQLiteError($bSucceeded);
            }
        }
        return (bool) $bSucceeded;
    }

    /**
     * {@inheritDoc}
     * @see PNDataProvider::count()
     */
    public function count() : int 
    {
        $iCount = 0;
        if ($this->isConnected()) {
            $iCount = $this->db->querySingle("SELECT count(*) FROM " . $this->strTableName);
            $this->setSQLiteError($iCount !== false);
        }
        return intval($iCount);
    }
    
    /**
     * {@inheritDoc}
     * @see PNDataProvider::fetch()
     */
    public function fetch()
    {
        $strSubJSON = false;
        $this->row = false;
        if ($this->dbres !== false) {
            $this->row = $this->dbres->fetchArray(SQLITE3_ASSOC);
            $this->setSQLiteError(!is_bool($this->row));
            if ($this->row) {
                $strSubJSON = $this->row[self::COL_SUBSCRIPTION];
            }
        }
        return $strSubJSON;
    }
    
    /**
     * {@inheritDoc}
     * @see PNDataProvider::truncate()
     */
    public function truncate() : bool
    {
        $bSucceeded = false;
        if ($this->isConnected()) {
            $bSucceeded = $this->db->exec("DELETE FROM " . $this->strTableName);
            $this->logger->info(__CLASS__ . ': ' . 'Subscription table truncated');
        }
        return $bSucceeded;
    }
    
    /**
     * {@inheritDoc}
     * @see PNDataProvider::getColumn()
     */
    public function getColumn($strName) : ?string 
    {
        $value = null;
        if ($this->row !== false && isset($this->row[$strName])) {
            $value = $this->row[$strName];
        }
        return strval($value);          
    }

    /**
     * @return string
     */
    public function getError() : string
    {
        return $this->strLastError;
    }
    
    /**
     * @return bool
     */
    private function tableExist() : bool 
    {
        if (!$this->bTableExist) {
            if ($this->db) {
                $this->bTableExist = ($this->db->querySingle("SELECT name FROM sqlite_master WHERE type='table' AND name='" . $this->strTableName . "'") != null);
            }
        }
        return $this->bTableExist;
    }
    
    /**
     * @return bool
     */
    private function createTable() : bool 
    {
        $bSucceeded = false;
        if ($this->db) {
            $strSQL  = "CREATE TABLE " . $this->strTableName . " (";
            $strSQL .= self::COL_ID . " INTEGER PRIMARY KEY";
            $strSQL .= "," . self::COL_ENDPOINT . " TEXT UNIQUE"; 
            $strSQL .= "," . self::COL_EXPIRES . " INTEGER NOT NULL"; 
            $strSQL .= "," . self::COL_SUBSCRIPTION . " TEXT NOT NULL";
            $strSQL .= "," . self::COL_USERAGENT . " TEXT NOT NULL";
            $strSQL .= "," . self::COL_LASTUPDATED . " INTEGER NOT NULL";
            $strSQL .= ");";
                
            $bSucceeded = $this->db->exec($strSQL);
            $this->setSQLiteError($bSucceeded);
            $this->logger->info(__CLASS__ . ': ' . 'Subscription table created', strlen($this->strLastError) > 0 ? ['error' => $this->strLastError] : []);
        }
        $this->bTableExist = $bSucceeded;
        return $bSucceeded;
    }

    /**
     * @param bool $bSucceeded  set error, if last opperation not succeeded
     */
    private function setSQLiteError(bool $bSucceeded) : void 
    {
        // All reasons, with the exception of incorrect SQL statements, are intercepted 
        // beforehand - so this part of the code is no longer run through in the test 
        // anphase. This section is therefore excluded from codecoverage.
        // @codeCoverageIgnoreStart
        if (!$bSucceeded && $this->db) {
            $this->strLastError = 'SQLite3: ' . $this->db->lastErrorMsg();
        }
        // @codeCoverageIgnoreEnd
    }
    
    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger) : void
    {
        $this->logger = $logger;
    }
}
