<?php
declare(strict_types=1);

namespace SKien\PNServer\Utils;

/*
 * extracted required classes and functions from package
 *		spomky-labs/jose
 *		https://github.com/Spomky-Labs/Jose 
 *
 * @package PNServer
 * @version 1.0.0
 * @copyright MIT License - see the copyright below and LICENSE file for details
 */

/*
 * *********************************************************************
 * Copyright (c) 2014-2016 Spomky-Labs
 *
 * Permission is hereby granted, free of charge, to any person obtaining
 * a copy of this software and associated documentation files (the "Software"),
 * to deal in the Software without restriction, including without limitation
 * the rights to use, copy, modify, merge, publish, distribute, sublicense,
 * and/or sell copies of the Software, and to permit persons to whom the
 * Software is furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included
 * in all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS
 * OR IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL
 * THE AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES
 * OR OTHER LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE,
 * ARISING FROM, OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR
 * OTHER DEALINGS IN THE SOFTWARE.
 * ***********************************************************************
 */

/**
 * @internal
 */
class Math
{
    public static function cmp(\GMP $first, \GMP $other) : int
    {
        return \gmp_cmp($first, $other);
    }

    public static function equals(\GMP $first, \GMP $other) : bool
    {
        return 0 === \gmp_cmp($first, $other);
    }

    public static function mod(\GMP $number, \GMP $modulus) : \GMP
    {
        return \gmp_mod($number, $modulus);
    }

    public static function add(\GMP $augend, \GMP $addend) : \GMP
    {
        return \gmp_add($augend, $addend);
    }

    public static function sub(\GMP $minuend, \GMP $subtrahend) : \GMP
    {
        return \gmp_sub($minuend, $subtrahend);
    }

    public static function mul(\GMP $multiplier, \GMP $multiplicand) : \GMP
    {
        return \gmp_mul($multiplier, $multiplicand);
    }

    public static function pow(\GMP $base, int $exponent) : \GMP 
    {
        return \gmp_pow($base, $exponent);
    }

    public static function bitwiseAnd(\GMP $first, \GMP $other) : \GMP
    {
        return \gmp_and($first, $other);
    }

    public static function bitwiseXor(\GMP $first, \GMP $other) : \GMP
    {
        return \gmp_xor($first, $other);
    }

    public static function toString(\GMP  $value) : string
    {
        return \gmp_strval($value);
    }

    /**
     * @param \GMP $a
     * @param \GMP $m
     * @return \GMP|bool
     */
    public static function inverseMod(\GMP $a, \GMP $m)
    {
        return \gmp_invert($a, $m);
    }

    /**
     * @param int|string $number
     * @param int $from
     * @param int $to
     * @return string
     */
    public static function baseConvert($number, int $from, int $to) : string
    {
        return \gmp_strval(\gmp_init($number, $from), $to);
    }

    public static function rightShift(\GMP $number, int $positions) : \GMP 
    {
        // when using \gmp_div, phpStan says: Method SKien\PNServer\Utils\Math::rightShift() should return GMP but returns resource. ?
        return \gmp_div_q($number, \gmp_pow(\gmp_init(2, 10), $positions));
    }
    
    public static function modSub(\GMP $minuend, \GMP $subtrahend, \GMP $modulus) : \GMP
    {
        return self::mod(self::sub($minuend, $subtrahend), $modulus);
    }
    
    public static function modMul(\GMP $multiplier, \GMP $muliplicand, \GMP $modulus) : \GMP
    {
        return self::mod(self::mul($multiplier, $muliplicand), $modulus);
    }
    
    public static function modDiv(\GMP $dividend, \GMP $divisor, \GMP $modulus) : \GMP
    {
        return self::mul($dividend, self::inverseMod($divisor, $modulus));
    }
}
