<?php
/**
 * 快速指数算法 求 a pwoer m  % n  == ???
 */

$a = 2487876514;

$m = 2279660081;

$n = 2567676841;


//m二进制表示
//10000111 11100000 11011010 00110001
$mS2 = base_convert('2279660081', 10, 2);
echo $mS2 . "\r\n";
$mS2Rev = strrev($mS2);
$mS2Len = strlen($mS2Rev);
$mS2Array = [];
for ($i = 0;
     $i < $mS2Len;
     $i++) {
    $mS2Array[] = substr($mS2Rev, $i, 1);
}

//快速指数算法
$ming = 1;
for ($i = $mS2Len - 1; $i >= 0; $i--) {
    $ming = $ming * $ming % $n;

    if ($mS2Array[$i] == 1) {
        $ming = $ming * $a % $n;
    }
}

echo $ming . "\r\n";
//01100001 01100010 01100011 01100100
echo base_convert($ming, 10, 2) . "\r\n";
echo base_convert("01100001", 2, 10) . "\r\n";
echo base_convert("01100010", 2, 10) . "\r\n";
echo base_convert("01100011", 2, 10) . "\r\n";
echo base_convert("01100100", 2, 10) . "\r\n";