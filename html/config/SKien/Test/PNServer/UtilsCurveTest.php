<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use PHPUnit\Framework\TestCase;
use SKien\PNServer\Utils\Curve;
use SKien\PNServer\Utils\NistCurve;
use SKien\PNServer\Utils\Point;

/**
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class UtilsCurveTest extends TestCase
{
    const VALID_X = '47106871675546646998941975368965491997260522375820007229838508869987366040004';
    const VALID_Y = '52376802520912566842951846993469970345548560339531881043822207040165842947197';
    const VALID_2X = '98427826524936846061109340525176511327555564326016491717443420300780106750337';
    const VALID_2Y = '84323609886562361330352263233225787919964540102923882392673776457782612785828';
    const CURVE256 = 'curve(115792089210356248762697446949407573530086143415290314195533631308867097853948, 41058363725152142129326129780047268409114441015993725554835256314039467401291, 115792089210356248762697446949407573530086143415290314195533631308867097853951)';
    
    protected Curve $cv;
    
    public function setUp() : void
    {
        $this->cv = NistCurve::curve256();
    }
    
    public function test_create() : void
    {
        $this->assertEquals($this->cv->getSize(), 256);
        $this->assertEquals((int) $this->cv->getA(), 9223372036854775804);
        $this->assertEquals((int) $this->cv->getB(), 4309448131093880907);
        $this->assertEquals((int) $this->cv->getPrime(), 9223372036854775807);
    }
    
    public function test_getPoint() : void
    {
        $pt = $this->cv->getPoint(gmp_init(self::VALID_X), gmp_init(self::VALID_Y));
        $this->assertEquals(self::VALID_X, gmp_strval($pt->getX()));
        $this->assertEquals(self::VALID_Y, gmp_strval($pt->getY()));

        // don't realy know what affect the $order param should bring...
        $pt = $this->cv->getPoint(gmp_init(self::VALID_X), gmp_init(self::VALID_Y), gmp_init('23874367496743855'));
        $this->assertEquals(self::VALID_X, gmp_strval($pt->getX()));
        $this->assertEquals(self::VALID_Y, gmp_strval($pt->getY()));
        
        $this->expectException('RuntimeException');
        $pt = $this->cv->getPoint(gmp_init(0), gmp_init(0));
    }
    
    public function test_getPublicKeyFrom() : void
    {
        $pt = $this->cv->getPublicKeyFrom(gmp_init(self::VALID_X), gmp_init(self::VALID_Y));
        $this->assertEquals(self::VALID_X, gmp_strval($pt->getX()));
        $this->assertEquals(self::VALID_Y, gmp_strval($pt->getY()));
        
        $this->expectException('RuntimeException');
        $pt = $this->cv->getPublicKeyFrom(gmp_init(-1), gmp_init(0));
    }
    
    public function test_contains() : void
    {
        $this->assertTrue($this->cv->contains(gmp_init(self::VALID_X), gmp_init(self::VALID_Y)));
    }
    
    public function test_add() : void
    {
        $pt1 = Point::create(gmp_init(10), gmp_init(20));
        $pt2 = Point::create(gmp_init(10), gmp_init(40));
        // result must be $pt1
        $pt = $this->cv->add($pt1, Point::infinity());
        $this->assertSame((int) $pt1->getX(), (int) $pt->getX());
        $this->assertSame((int) $pt1->getY(), (int) $pt->getY());
        // result must be $pt2
        $pt = $this->cv->add(Point::infinity(), $pt2);
        $this->assertSame((int) $pt2->getX(), (int) $pt->getX());
        $this->assertSame((int) $pt2->getY(), (int) $pt->getY());
        // result must be infinity
        $pt = $this->cv->add($pt1, $pt2);
        $this->assertTrue($pt->isInfinity());

        $pt = $this->cv->add(Point::create(gmp_init(self::VALID_X), gmp_init(self::VALID_Y)), Point::create(gmp_init(self::VALID_X), gmp_init(self::VALID_Y)));
        $this->assertEquals(self::VALID_2X, gmp_strval($pt->getX()));
        $this->assertEquals(self::VALID_2Y, gmp_strval($pt->getY()));
    }
    
    public function test_mul() : void
    {
        $pt = $this->cv->mul(Point::create(gmp_init(self::VALID_X), gmp_init(self::VALID_Y)), gmp_init(2));
        $this->assertEquals(self::VALID_2X, gmp_strval($pt->getX()));
        $this->assertEquals(self::VALID_2Y, gmp_strval($pt->getY()));
        $pt = $this->cv->mul(Point::infinity(), gmp_init(2));
        $this->assertTrue($pt->isInfinity());
    }
    
    public function test_toString() : void
    {
        $this->assertEquals(self::CURVE256, $this->cv->__toString());
    }
    
    public function test_getDouble() : void
    {
        $pt = $this->cv->getDouble(Point::create(gmp_init(self::VALID_X), gmp_init(self::VALID_Y)));
        $this->assertEquals(self::VALID_2X, gmp_strval($pt->getX()));
        $this->assertEquals(self::VALID_2Y, gmp_strval($pt->getY()));
    }
}

