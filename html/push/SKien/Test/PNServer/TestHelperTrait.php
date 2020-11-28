<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

/**
 * Various auxiliary functions and values ​​required by some tests to set up 
 * the necessary test conditions.
 * 
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
trait TestHelperTrait
{
    protected static string $strSQLiteDBFilename = 'testdb.sqlite';
        
    protected function loadSubscription(string $strFilename) : string
    {
        return file_get_contents(__DIR__ . DIRECTORY_SEPARATOR . 'testdata' . DIRECTORY_SEPARATOR . $strFilename);
    }
    
    protected static function getTempDataDir() : string
    {
        $strTmpDir = __DIR__ . DIRECTORY_SEPARATOR . 'tempdata';
        if (!file_exists($strTmpDir)) {
            mkdir($strTmpDir);
        }
        chmod($strTmpDir, 0777);
        return $strTmpDir;
    }
    
    protected static function deleteTempDataFile() : void
    {
        $strFullPath = self::getTempDataDir() . DIRECTORY_SEPARATOR . self::$strSQLiteDBFilename;
        if (file_exists($strFullPath)) {
            unlink($strFullPath);
        }
    }
}