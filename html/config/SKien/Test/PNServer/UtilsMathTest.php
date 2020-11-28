<?php
declare(strict_types=1);

namespace SKien\Test\PNServer;

use PHPUnit\Framework\TestCase;
use SKien\PNServer\Utils\Math;

/**
 * @author Stefanius <s.kien@online.de>
 * @copyright MIT License - see the LICENSE file for details
 */
class UtilsMathTest extends TestCase
{
    /**
     * @dataProvider cmpProvider
     */
    public function test_cmp(\GMP $a, \GMP $b, int $expected) : void
    {
        $this->assertEquals($expected, Math::cmp($a, $b));
    }
    
    public function cmpProvider() : array
    {
        return [
            [gmp_init(2), gmp_init(2), 0],
            [gmp_init(3), gmp_init(2), 1],
            [gmp_init(2), gmp_init(3), -1],
            [gmp_init(5), gmp_init(0), 1],
            [gmp_init(0), gmp_init(3), -1],
            [gmp_init(-2), gmp_init(2), -2],
            [gmp_init(2), gmp_init(-2), 2],
            [gmp_init(-5), gmp_init(2), -2],
            [gmp_init(5), gmp_init(-2), 2]
        ];
    }
    
    /**
     * @dataProvider equalsProvider
     */
    public function test_equals(\GMP $a, \GMP $b, bool $expected) : void
    {
        $this->assertEquals($expected, Math::equals($a, $b));
    }
    
    public function equalsProvider() : array
    {
        return [
            '2 == 2' => [gmp_init(2), gmp_init(2), true],
            '2 == 3' => [gmp_init(2), gmp_init(3), false],
            '2 == -2' => [gmp_init(2), gmp_init(-2), false]
        ];
    }
    
    public function test_mod() : void
    {
        $this->assertEquals((int) Math::mod(gmp_init(7), gmp_init(2)), 1);
    }
    
    public function test_add() : void
    {
        $this->assertEquals((int) Math::add(gmp_init(2), gmp_init(3)), 5);
    }
    
    public function test_sub() : void
    {
        $this->assertEquals((int) Math::sub(gmp_init(2), gmp_init(3)), -1);
    }
    
    /**
     * @dataProvider mulProvider
     */
    public function test_mul(\GMP $a, \GMP $b, int $expected) : void
    {
        $this->assertEquals($expected, (int) Math::mul($a, $b));
    }
    
    public function mulProvider() : array
    {
        return [
            [gmp_init(5), gmp_init(11), 55],
            [gmp_init(-5), gmp_init(-3), 15],
            [gmp_init(4), gmp_init(-15), -60],
            [gmp_init(-4), gmp_init(15), -60]
        ];
    }
    
    /**
     * @dataProvider powProvider
     */
    public function test_pow(\GMP $a, int $b, int $expected) : void
    {
        $this->assertEquals($expected, (int) Math::pow($a, $b));
    }
    
    public function powProvider() : array
    {
        return [
            [gmp_init(5), 2, 25],
            [gmp_init(-5), 2, 25],
            [gmp_init(2), 3, 8],
            [gmp_init(-2), 3, -8]
        ];
    }
    
    public function test_bitwiseAnd() : void
    {
        $this->assertEquals((int) Math::bitwiseAnd(gmp_init('110011', 2), gmp_init('011110', 2)), (int)gmp_init('010010', 2));
    }
    
    public function test_bitwiseXor() : void
    {
        $this->assertEquals((int) Math::bitwiseXor(gmp_init('110011', 2), gmp_init('011110', 2)), (int)gmp_init('101101', 2));
    }
    
    public function test_rightShift() : void
    {
        $this->assertEquals((int) Math::rightShift(gmp_init('110011', 2), 3), (int)gmp_init('110', 2));
    }
    
    public function test_toString() : void
    {
        $this->assertEquals(Math::toString(gmp_init('100', 16)), '256');
    }
    
    public function test_baseConvert() : void
    {
        $this->assertEquals(Math::baseConvert('0x1B', 16, 2), '11011');
    }
    
    public function test_inverseMod() : void
    {
        $this->assertEquals(9, (int) Math::inverseMod(gmp_init(5), gmp_init(11)));
        $this->assertEquals(11, (int) Math::inverseMod(gmp_init(-4), gmp_init(15)));
        $this->assertFalse(Math::inverseMod(gmp_init(5), gmp_init(10)));
    }
    
    public function test_modSub() : void
    {
        $this->assertEquals((int) Math::modSub(gmp_init(12), gmp_init(4), gmp_init(5)), 3);
    }
    
    public function test_modMul() : void
    {
        $this->assertEquals((int) Math::modMul(gmp_init(3), gmp_init(4), gmp_init(5)), 2);
    }
    
    public function test_modDiv() : void
    {
        $this->assertEquals((int) Math::modDiv(gmp_init(12), gmp_init(2), gmp_init(5)), 36);
    }
}

