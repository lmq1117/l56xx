<?php
/**
 * Created by PhpStorm.
 * User: limq
 * Date: 2018/12/25
 * Time: 13:46
 */

namespace App\Services\Com;


class Transfer
{
    public function f16t10($s16)
    {
        $map = [
            '0' => '0',
            '1' => '1',
            '2' => '2',
            '3' => '3',
            '4' => '4',
            '5' => '5',
            '6' => '6',
            '7' => '7',
            '8' => '8',
            '9' => '9',
            'a' => '10',
            'b' => '11',
            'c' => '12',
            'd' => '13',
            'e' => '14',
            'f' => '15',
        ];
        $s16 = ltrim($s16, 0);
        $s10 = '0';
        for ($i = 0; $i < strlen($s16); $i++) {
            $s10 = gmp_add($s10, gmp_mul(gmp_pow(16, $i), $map[substr(strrev($s16), $i, 1)]));
        }
        return gmp_intval($s10);
    }
}