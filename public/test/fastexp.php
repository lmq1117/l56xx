<?php

//加密过程 得到密文 2487876514 即
$a = 1633837924;$m = 65537; $n = 2567676841;


//解密过程
//$a = 2487876514;$m=2279660081;$n=2567676841;
$mod = fastExp($a, $m, $n);
echo $mod . "\r\n";
//01100001 01100010 01100011 01100100
//echo base_convert($mod, 10, 2) . "\r\n";
//echo base_convert("01100001", 2, 10) . "\r\n";
//echo base_convert("01100010", 2, 10) . "\r\n";
//echo base_convert("01100011", 2, 10) . "\r\n";
//echo base_convert("01100100", 2, 10) . "\r\n";


/**
 * 快速指数算法 求 a pwoer m  % n 的值
 * @param int $a 底
 * @param int $m 指数
 * @param int $n 模谁
 * @return int 余数
 */
function fastExp(int $a, int $m, int $n): int
{
    //m二进制表示
    $mS2 = base_convert($m, 10, 2);
    $mS2Rev = strrev($mS2);
    $mS2Len = strlen($mS2Rev);
    $mS2Array = [];
    for ($i = 0;
         $i < $mS2Len;
         $i++) {
        $mS2Array[] = substr($mS2Rev, $i, 1);
    }

    //快速指数算法
    $mod = 1;
    for ($i = $mS2Len - 1; $i >= 0; $i--) {
        $mod = $mod * $mod % $n;

        if ($mS2Array[$i] == 1) {
            $mod = $mod * $a % $n;
        }
    }
    return $mod;
}