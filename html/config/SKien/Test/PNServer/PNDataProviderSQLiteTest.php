<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use SKien\PNServer\PNDataProviderSQLite;

/**
 * Fixture for the whole test.
 * - create temp directory for datafile if not exist 
 * - and ensure it is writeable
 * both will be done in self::getTempDataDir
 * - start without existing DB (delete DB file if exists so far)
 * 
 * Clean-Up 
 * - delete created DB-file after last test 
 * 
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class PNDataProviderSQLiteTest extends PNDataProviderTest
{
    use TestHelperTrait;
    
    protected $strTmpDir;
    protected $strFullPath;

    public static function setUpBeforeClass() : void
    {
        // fwrite(STDOUT, __METHOD__ . "\n");
        self::getTempDataDir();
        self::deleteTempDataFile();
    }
    
    public static function tearDownAfterClass() : void
    {
        self::deleteTempDataFile();
    }

    public function setUp() : void
    {
        // each test needs dir/path and a conected DP
        $this->strTmpDir = self::getTempDataDir();
        $this->strFullPath = $this->strTmpDir . DIRECTORY_SEPARATOR . self::$strSQLiteDBFilename;
        $this->dp = new PNDataProviderSQLite($this->strTmpDir, self::$strSQLiteDBFilename);
    }
    
    public function test_constructError1() : void
    {
        // test for invalid directory
        $strInvalidDir = 'invaliddir';
        $dp = new PNDataProviderSQLite($strInvalidDir, self::$strSQLiteDBFilename);
        $this->assertIsObject($dp);
        $this->assertFalse($dp->isConnected());
        $this->assertNotEmpty($dp->getError());
    }
    
    public function test_constructError2() : void
    {
        // test for readonly directory
        chmod($this->strTmpDir, 0444);
        $dp = new PNDataProviderSQLite($this->strTmpDir, self::$strSQLiteDBFilename);
        $this->assertIsObject($dp);
        $this->assertFalse($dp->isConnected());
        $this->assertNotEmpty($dp->getError());
        chmod($this->strTmpDir, 0777);
    }
    
    public function test_constructError3() : void
    {
        // test for readonly db-file
        chmod($this->strFullPath, 0444);
        // for this test we need to create local instance AFTER set the DB-file to readonly ...
        $dp = new PNDataProviderSQLite($this->strTmpDir, self::$strSQLiteDBFilename);
        $this->assertIsObject($dp);
        $this->assertFalse($dp->isConnected());
        $strExpected = 'readonly database file ' . $this->strFullPath . '!';
        $this->assertEquals($strExpected, $dp->getError());
        chmod($this->strFullPath, 0777);
    }
}

