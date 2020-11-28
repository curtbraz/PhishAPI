<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use PHPUnit\Framework\TestCase;
use SKien\PNServer\Utils\Point;

/**
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class UtilsPointTest extends TestCase
{
    public function test_create() : void
    {
        $pt = Point::create(gmp_init(20, 10), gmp_init(30, 10));
        $this->assertEquals(gmp_cmp($pt->getX(), gmp_init(20, 10)), 0);
        $this->assertEquals(gmp_cmp($pt->getY(), gmp_init(30, 10)), 0);
        $this->assertEquals(gmp_cmp($pt->getOrder(), gmp_init(0, 10)), 0);
        $this->assertFalse($pt->isInfinity());
    }
    
    public function test_infinity() : void
    {
        $pt = Point::infinity();
        $this->assertEquals(gmp_cmp($pt->getX(), gmp_init(0, 10)), 0);
        $this->assertEquals(gmp_cmp($pt->getY(), gmp_init(0, 10)), 0);
        $this->assertTrue($pt->isInfinity());
    }
    
    public function test_csswap() : void
    {
        $ptA = Point::create(gmp_init(20, 10), gmp_init(30, 10));
        $ptB = Point::create(gmp_init(40, 10), gmp_init(50, 10));
        Point::cswap($ptA, $ptB, 1);
        $this->assertEquals(gmp_cmp($ptA->getX(), gmp_init(40, 10)), 0);
        $this->assertEquals(gmp_cmp($ptA->getY(), gmp_init(50, 10)), 0);
        $this->assertEquals(gmp_cmp($ptB->getX(), gmp_init(20, 10)), 0);
        $this->assertEquals(gmp_cmp($ptB->getY(), gmp_init(30, 10)), 0);
    }
}

