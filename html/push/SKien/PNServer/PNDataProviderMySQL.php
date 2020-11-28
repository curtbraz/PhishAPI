<?php
declare(strict_types=1);

namespace SKien\PNServer;

use Psr\Log\LoggerInterface;
use Psr\Log\NullLogger;

/**
 * dataprovider for MySQL database
 * uses given Table in specified MySQL database
 * 
 * if not specified in constructor, default table self::TABLE_NAME in 
 * MySQL database is used. 
 * table will be created if not exist so far.
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
class PNDataProviderMySQL implements PNDataProvider 
{
    /** @var string tablename            */
    protected string $strTableName = '';
    /** @var string DB host  */
    protected string $strDBHost = '';
    /** @var string DB user  */
    protected string $strDBUser = '';
    /** @var string Password for DB  */
    protected string $strDBPwd = '';
    /** @var string DB name  */
    protected string $strDBName = '';
    /** @var \mysqli|bool internal MySQL DB  (No type hint, as \mysqli or bool is possible type)  */
    protected $db = false;
    /** @var \mysqli_result|bool result of DB queries  (No type hint, as \mysqli_result or bool is possible type) */
    protected $dbres = false;
    /** @var array last fetched row or null      */
    protected ?array $row = null;
    /** @var string last error                   */
    protected string $strLastError = '';
    /** @var bool does table exist               */
    protected bool $bTableExist = false;
    /** @var LoggerInterface $logger     */
    protected LoggerInterface $logger;
    
    /**
     * @param string $strDBHost     DB Host
     * @param string $strDBUser     DB User
     * @param string $strDBPwd      DB Password
     * @param string $strDBName     DB Name
     * @param string $strTableName  tablename for the subscriptions - if null, self::TABLE_NAME is used and created if not exist
     * @param LoggerInterface $logger
     */
    public function __construct(string $strDBHost, string $strDBUser, string $strDBPwd, string $strDBName, ?string $strTableName = null, ?LoggerInterface $logger = null)
    {
        $this->logger = isset($logger) ? $logger : new NullLogger();
        $this->strDBHost = $strDBHost; 
        $this->strDBUser = $strDBUser; 
        $this->strDBPwd = $strDBPwd; 
        $this->strDBName = $strDBName; 
        $this->strTableName = isset($strTableName) ? $strTableName : self::TABLE_NAME;
        
        $this->db = @mysqli_connect($strDBHost, $strDBUser, $strDBPwd, $strDBName);
        if ($this->db !== false) {
            if (!$this->tableExist()) {
                $this->createTable();
            }
        } else {
            $this->strLastError = 'MySQL: Connect Error ' . mysqli_connect_errno();
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
        if ($this->db) {
            $oSubscription = json_decode($strJSON, true);
            if ($oSubscription) {
                $iExpires = isset($oSubscription['expirationTime']) ? intval(bcdiv($oSubscription['expirationTime'], '1000')) : 0;
                $tsExpires = $iExpires > 0 ? date("'Y-m-d H:i:s'", $iExpires) : 'NULL';
                $strUserAgent = isset($oSubscription['userAgent']) ? $oSubscription['userAgent'] : 'unknown UserAgent';
                                
                $strSQL  = "INSERT INTO " . $this->strTableName . " (";
                $strSQL .= self::COL_ENDPOINT;
                $strSQL .= "," . self::COL_EXPIRES;
                $strSQL .= "," . self::COL_SUBSCRIPTION;
                $strSQL .= "," . self::COL_USERAGENT;
                $strSQL .= ") VALUES(";
                $strSQL .= "'" . $oSubscription['endpoint'] . "'";
                $strSQL .= "," . $tsExpires;
                $strSQL .= ",'" . $strJSON . "'";
                $strSQL .= ",'" . $strUserAgent . "'";
                $strSQL .= ") ";
                $strSQL .= "ON DUPLICATE KEY UPDATE "; // in case of UPDATE UA couldn't have been changed and endpoint is the UNIQUE key!
                $strSQL .= " expires = " . $tsExpires;
                $strSQL .= ",subscription = '" . $strJSON . "'";
                $strSQL .= ";";
                
                $bSucceeded = $this->db->query($strSQL) !== false;
                $this->strLastError = $this->db->error;
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
        if ($this->db) {
            $strSQL  = "DELETE FROM " . $this->strTableName . " WHERE endpoint LIKE ";
            $strSQL .= "'" . $strEndpoint . "'";
        
            $bSucceeded = $this->db->query($strSQL) !== false;
            $this->strLastError = $this->db->error;
            $this->logger->info(__CLASS__ . ': ' . 'Subscription removed', strlen($this->strLastError) > 0 ? ['error' => $this->strLastError] : []);
        }
        return $bSucceeded;
    }
    
    /**
     * Select all subscriptions not expired so far.
     * columns expired and lastupdated are timestamp for better handling and visualization 
     * e.g. in phpMyAdmin. For compatibility reasons with other dataproviders the query 
     * selects the unis_timestamp values  
     * 
     * {@inheritDoc}
     * @see PNDataProvider::init()
     */
    public function init(bool $bAutoRemove = true) : bool 
    {
        $bSucceeded = false;
        $this->dbres = false;
        $this->row = null;
        if ($this->db) {
            $strWhere = '';
            if ($bAutoRemove) {
                // remove expired subscriptions from DB
                $strSQL = "DELETE FROM " . $this->strTableName . " WHERE ";
                $strSQL .= self::COL_EXPIRES . " IS NOT NULL AND ";
                $strSQL .= self::COL_EXPIRES . " < NOW()";
            
                $bSucceeded = $this->db->query($strSQL) !== false;
                if (!$bSucceeded) {
                    $this->strLastError = 'MySQL: ' . $this->db->error;
                    $this->logger->error(__CLASS__ . ': ' . $this->strLastError);
                }
            } else {
                // or just exclude them from query
                $strWhere  = " WHERE ";
                $strWhere .= self::COL_EXPIRES . " IS NULL OR ";
                $strWhere .= self::COL_EXPIRES . " >= NOW()";
                $bSucceeded = true;
            }
            if ($bSucceeded) {
                $strSQL  = "SELECT ";
                $strSQL .= self::COL_ID;
                $strSQL .= "," . self::COL_ENDPOINT;
                $strSQL .= ",UNIX_TIMESTAMP(" . self::COL_EXPIRES . ") AS " . self::COL_EXPIRES;
                $strSQL .= "," . self::COL_SUBSCRIPTION;
                $strSQL .= "," . self::COL_USERAGENT;
                $strSQL .= ",UNIX_TIMESTAMP(" . self::COL_LASTUPDATED . ") AS " . self::COL_LASTUPDATED;
                $strSQL .= " FROM " . $this->strTableName . $strWhere;
    
                $this->dbres = $this->db->query($strSQL);
                if ($this->dbres === false) {
                    // @codeCoverageIgnoreStart
                    // can only occur during development!
                    $this->strLastError = 'MySQL: ' . $this->db->error;
                    $this->logger->error(__CLASS__ . ': ' . $this->strLastError);
                    $bSucceeded = false;
                    // @codeCoverageIgnoreEnd
                }
            }
        }
        return $bSucceeded;
    }

    /**
     * {@inheritDoc}
     * @see PNDataProvider::count()
     */
    public function count() : int 
    {
        $iCount = 0;
        if ($this->db) {
            $dbres = $this->db->query("SELECT count(*) AS iCount FROM " . $this->strTableName);
            $row = $dbres->fetch_array(MYSQLI_ASSOC);
            $iCount = intval($row['iCount']);
        }
        return $iCount;
    }
    
    /**
     * {@inheritDoc}
     * @see PNDataProvider::fetch()
     */
    public function fetch() 
    {
        $strSubJSON = false;
        if ($this->dbres !== false) {
            $this->row = $this->dbres->fetch_array(MYSQLI_ASSOC);
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
            $bSucceeded = $this->db->query("TRUNCATE TABLE " . $this->strTableName);
            $this->logger->info(__CLASS__ . ': ' . 'Subscription table truncated');
        }
        return $bSucceeded;
    }
    
    /**
     * {@inheritDoc}
     * @see PNDataProvider::getColumn()
     */
    public function getColumn(string $strName) : ?string 
    {
        $value = null;
        if ($this->row !== false && isset($this->row[$strName])) {
            $value = $this->row[$strName];
            if ($strName == self::COL_EXPIRES || $strName == self::COL_LASTUPDATED) {
                
            }
        }
        return $value;          
    }

    /**
     * get last error
     * @return string
     */
    public function getError() : string
    {
        return $this->strLastError;
    }
    
    /**
     * check, if table exist
     * @return bool
     */
    private function tableExist() : bool 
    {
        if (!$this->bTableExist) {
            if ($this->db) {
                $dbres = $this->db->query("SHOW TABLES LIKE '" . $this->strTableName . "'");
                $this->bTableExist = $dbres->num_rows > 0;
            }
        }
        return $this->bTableExist;
    }
    
    /**
     * create table if not exist
     */
    private function createTable() : bool 
    {
        $bSucceeded = false;
        if ($this->db) {
            $strSQL  = "CREATE TABLE IF NOT EXISTS " . $this->strTableName . " (";
            $strSQL .= " " . self::COL_ID . " int NOT NULL AUTO_INCREMENT";
            $strSQL .= "," . self::COL_ENDPOINT . " text NOT NULL";
            $strSQL .= "," . self::COL_EXPIRES . " timestamp NULL DEFAULT NULL";
            $strSQL .= "," . self::COL_SUBSCRIPTION . " text NOT NULL";
            $strSQL .= "," . self::COL_USERAGENT . " varchar(255) NOT NULL";
            $strSQL .= "," . self::COL_LASTUPDATED . " timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP";
            $strSQL .= ",PRIMARY KEY (id)";
            $strSQL .= ",UNIQUE (endpoint(500))";
            $strSQL .= ") ENGINE=InnoDB;";
                
            $bSucceeded = $this->db->query($strSQL) !== false;
            $this->strLastError = $this->db->error;
            $this->logger->info(__CLASS__ . ': ' . 'Subscription table created', strlen($this->strLastError) > 0 ? ['error' => $this->strLastError] : []);
        }
        $this->bTableExist = $bSucceeded; 
        return $bSucceeded;
    }
    
    /**
     * @param LoggerInterface $logger
     */
    public function setLogger(LoggerInterface $logger) : void
    {
        $this->logger = $logger;
    }
}
