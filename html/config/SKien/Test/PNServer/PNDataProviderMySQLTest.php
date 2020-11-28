<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use SKien\PNServer\PNDataProviderMySQL;

/**
 * Fixture for the whole test.
 * - connect to MYSQL phpUnit test database and drop subscription table if exist
 * 
 * Clean-Up 
 * - drop created table 
 * 
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class PNDataProviderMySQLTest extends PNDataProviderTest
{
    public static function setUpBeforeClass() : void
    {
        $db = mysqli_connect($GLOBALS['MYSQL_HOST'], $GLOBALS['MYSQL_USER'], $GLOBALS['MYSQL_PASSWD'], $GLOBALS['MYSQL_DBNAME']);
        if (!$db) {
            fwrite(STDOUT, 'MySQL: Connect Error ' . mysqli_connect_errno() . PHP_EOL);
        }
        $db->query("DROP TABLE IF EXISTS " . PNDataProviderMySQL::TABLE_NAME);
    }
    
    public static function tearDownAfterClass() : void
    {
        $db = mysqli_connect($GLOBALS['MYSQL_HOST'], $GLOBALS['MYSQL_USER'], $GLOBALS['MYSQL_PASSWD'], $GLOBALS['MYSQL_DBNAME']);
        $db->query("DROP TABLE IF EXISTS " . PNDataProviderMySQL::TABLE_NAME);
    }

    public function setUp() : void
    {
        // connection params set in the phpunit.xml configuration file
        $strDBHost = $GLOBALS['MYSQL_HOST'];
        $strDBUser = $GLOBALS['MYSQL_USER'];
        $strDBPwd = $GLOBALS['MYSQL_PASSWD'];
        $strDBName = $GLOBALS['MYSQL_DBNAME'];
        $this->dp = new PNDataProviderMySQL($strDBHost, $strDBUser, $strDBPwd, $strDBName);
    }
    
    public function test_constructError()
    {
        $dp = new PNDataProviderMySQL('not', 'a', 'valid', 'connection');
        $this->assertIsObject($dp);
        $this->assertFalse($dp->isConnected());
        $this->assertNotEmpty($dp->getError());
    }
}
