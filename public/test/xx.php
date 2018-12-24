<?php
set_time_limit(0);
ini_set('memory_limit', '-1');


//echo xPowerY(2790, 27530) . "\r\n";

/**
 * 乘方
 * @param $x
 * @param $y
 * @return int|string
 */
function xPowerY($x, $y)
{
    if ($y == 0) {
        return 1;
    }
    if ($y == 1) {
        return $x;
    }
    $product = $x;
    for ($i = 2; $i <= $y; $i++) {
        $product = xMultiplyY($product, $x);
    }
    //return ltrim($product, '0');
    return ltrim($product) == '' ? 0 : ltrim($product, '0');


}


/**
 * 大数相乘 模拟笔算
 * @param $x
 * @param $y
 * @param int $arrL
 * @return string
 */
function xMultiplyY($x, $y, $arrL = 20000)
{
    //$arrL = 20000;
    //$x = $_GET['x'] ?? 0;
    //$y = $_GET['y'] ?? 0;
    //$x = '33478071698956898786044169848212690817704794983713768568912431388982883793878002287614711652531743087737814467999489';
    //$y = '36746043666799590428244633799627952632279158164343087642676032283815739666511279233373417143396810270092798736308917';

//交换，保持大数是$x 小数$y
    if (strlen($x) < strlen($y)) {
        $tmp = $y;
        $y = $x;
        $x = $tmp;
    }
    if (strlen($x) > $arrL) {
        die("超过范围");
    }

    for ($i = 0; $i < strlen($x); $i++) {
        $xArr[$arrL - 1 + $i] = substr($x, $i, 1);
        if ($i < strlen($y)) {
            $yArr[$arrL - 1 + $i + strlen($x) - strlen($y)] = substr($y, $i, 1);
        }
    }

//几行
    $line = [];
    $productUp = 0;
    for ($j = 1; $j <= strlen($y); $j++) {
        $iCount = 0;
        for ($i = $arrL + strlen($x) - 2; $i >= $arrL - 1; $i--) {
            $iCount++;

            //一次计算的乘积
            $product = $xArr[$i] * $yArr[$arrL + strlen($x) - 1 - $j];

            //
            if ($productUp == 0) {

                if ($product >= 10) {
                    $productUp = substr($product, 0, 1);
                    $product = substr($product, 1, 1);
                } else {
                    $productUp = 0;
                }

            } else {
                $product = $product + $productUp;
                if ($product >= 10) {
                    $productUp = substr($product, 0, 1);
                    $product = substr($product, 1, 1);
                } else {
                    $productUp = 0;
                }
            }

            $line[$j][$i + 1 - $j] = $product;
            if ($iCount >= strlen($x)) {
                if ($productUp > 0) {
                    $line[$j][$i - $j] = $productUp;
                    $productUp = 0;
                }

            }
        }
    }

    $result = [];
    $sum = 0;
//遍历$line 错位相加
    for ($i = $arrL - 2 + strlen($x); $i >= $arrL - strlen($y) - 1; $i--) {
        if ($i >= $arrL - strlen($y)) {

            if ($sum == 0) {
                $sum = array_sum(array_column($line, $i));
            } else {
                $sum = array_sum(array_column($line, $i)) + (int)substr($sum, 0, strlen($sum) - 1);
            }
            $result[$i] = substr($sum, -1);

        } else {
            $sum = array_sum(array_column($line, $i)) + (int)substr($sum, 0, strlen($sum) - 1);
            for ($j = 1; $j <= strlen($sum); $j++) {
                if ($j == strlen($sum) && substr($sum, $j - 1, 1) == 0) {
                    continue;
                }
                $result[$i - $j] = substr($sum, $j - 1, 1);
            }
        }

    }


    ksort($result);
    //return ltrim(join($result), '0');
    return ltrim(join($result), '0') == '' ? 0 : ltrim(join($result), '0');
}

//echo xMultiplyY('33478071698956898786044169848212690817704794983713768568912431388982883793878002287614711652531743087737814467999489', '36746043666799590428244633799627952632279158164343087642676032283815739666511279233373417143396810270092798736308917'); exit;


function xPlusY($x, $y, $arrL = 20000)
{
    if (strlen($x) < strlen($y)) {
        list($x, $y) = [$y, $x];
    }

    //将x y分别赋给数组
    for ($i = 0; $i < strlen($x); $i++) {
        $xArr[$arrL - 1 + $i] = substr($x, $i, 1);
        if ($i < strlen($y)) {
            $yArr[$arrL - 1 + $i + strlen($x) - strlen($y)] = substr($y, $i, 1);
        }
    }

    $productUp = 0;
    for ($i = $arrL + strlen($x) - 2; $i >= $arrL - 1; $i--) {
        $sum = $xArr[$i] + ($yArr[$i] ?? 0);
        if ($productUp == 0) {
            if ($sum >= 10) {
                $productUp = substr($sum, 0, 1);
                $res[$i] = substr($sum, 1, 1);
            } else {
                $res[$i] = substr($sum, 0, 1);
            }
        } else {
            $sum = $sum + $productUp;
            if ($sum >= 10) {
                $productUp = substr($sum, 0, 1);
                $res[$i] = substr($sum, 1, 1);
            } else {
                $res[$i] = substr($sum, 0, 1);
                $productUp = 0;
            }
            if ($i <= $arrL - 1 && $productUp > 0) {
                $res[$i - 1] = $productUp;
                $productUp = 0;
            }
        }

    }

    ksort($res);
    //return ltrim(join($res), '0');
    return ltrim(join($res), '0') == '' ? 0 : ltrim(join($res), '0');

}

//echo xPlusY(999, 199);

/**
 * 减法
 * @param $x
 * @param $y
 * @param int $arrL
 * @return string
 */
function xSubtractY($x, $y, $arrL = 20000)
{
    if (xCompY($x, $y) == -1) {
        list($x, $y) = [$y, $x];
    }

    //将x y分别赋给数组
    for ($i = 0; $i < strlen($x); $i++) {
        $xArr[$arrL - 1 + $i] = substr($x, $i, 1);
        if ($i < strlen($y)) {
            $yArr[$arrL - 1 + $i + strlen($x) - strlen($y)] = substr($y, $i, 1);
        }
    }

    //逐位相减，个位 十位 百位 ...
    for ($i = $arrL + strlen($x) - 2; $i >= $arrL - 1; $i--) {
//        echo $i, '--';
        if ($xArr[$i] >= ($yArr[$i] ?? 0)) {
            $res[$i] = $xArr[$i] - ($yArr[$i] ?? 0);
        } else {
            $xArr[$i - 1] = $xArr[$i - 1] - 1;
            $xArr[$i] = $xArr[$i] + 10;
            $res[$i] = $xArr[$i] - ($yArr[$i] ?? 0);
        }
    }

    ksort($res);
    return ltrim(join($res), '0') == '' ? 0 : ltrim(join($res), '0');
}

//echo xSubtractY(19887, 887);

/**
 * 除法
 * @param $x
 * @param $y
 * @param int $arrL
 */
function xDivisionY($x, $y, $arrL = 20000)
{
    if (xCompY($x, $y) == 0) {
        return $res = 1;
    }
    if (xCompY($x, $y) == -1) {
        return $res = 0;
    }
    $xLength = strlen($x);
    $yLength = strlen($y);
    $diffLength = $xLength - $yLength;
    $shang = [];

    for ($i = $diffLength; $i >= 0; $i--) {
        $yPad = $y . str_repeat(0, $i);
        $sv = 0;
        while (xCompY($x, $yPad) >= 0) {
            $sv++;
            $x = xSubtractY($x, $yPad, $arrL);
        }
        $shang[$i] = $sv;
    }
    krsort($shang);
    return ltrim(join($shang), '0') == '' ? 0 : ltrim(join($shang), '0');
}

//echo xDivisionY('1230186684530117755130494958384962720772853569595334792197322452151726400507263657518745202199786469389956474942774063845925192557326303453731548268507917026122142913461670429214311602221240479274737794080665351419597459856902143413', '33478071698956898786044169848212690817704794983713768568912431388982883793878002287614711652531743087737814467999489');exit;
//echo xCompY(173, 123);

/**
 * 求余数
 * @param $x
 * @param $y
 * @param int $arrL
 */
function xResidueY($x, $y, $arrL = 20000)
{
    if (xCompY($x, $y) == 0) {
        return $res = 0;
    }
    if (xCompY($x, $y) == -1) {
        return $res = $x;
    }
    $xLength = strlen($x);
    $yLength = strlen($y);
    $diffLength = $xLength - $yLength;

    for ($i = $diffLength; $i >= 0; $i--) {
        $yPad = $y . str_repeat(0, $i);
        $sv = 0;
        while (xCompY($x, $yPad) >= 0) {
            $sv++;
            $x = xSubtractY($x, $yPad, $arrL);
        }
    }
    return $x;

}


/**
 * 十进制大数比较
 * @param $x
 * @param $y
 * @return int
 */
function xCompY($x, $y)
{
    if (strlen($x) > strlen($y)) {
        return $res = 1;
    } elseif (strlen($x) == strlen($y)) {
        for ($i = 0; $i < strlen($x); $i++) {
            $xi = substr($x, $i, 1);
            $yi = substr($y, $i, 1);
            {
                if ($xi > $yi) {
                    return $res = 1;
                } elseif ($xi == $yi) {

                    if ($i == strlen($x) - 1) {

                        if ($xi > $yi) {
                            $res = 1;
                        } elseif ($xi == $yi) {
                            $res = 0;
                        } else {
                            $res = -1;
                        }
                        return $res;
                    }
                    continue;
                } else {
                    return $res = -1;
                }
            }
        }
    } else {
        return $res = -1;
    }
}


function trans16to10($s16)
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

        $s10 = xPlusY($s10, xMultiplyY(xPowerY(16, $i), $map[substr(strrev($s16), $i, 1)]));
    }
    return $s10;
}

function trans10to16($s10)
{
    return trans2to16(trans10to2($s10));
}

//for ($i = 0; $i <= 100; $i++) {
//    echo trans10to16($i) . "\r\n";
//}


function trans10to2($s10)
{
    if ($s10 == 0) {
        return 0;
    }
    if ($s10 == 1) {
        return 1;
    }
    $e = 0;
    while (xCompY($s10, xPowerY(2, $e)) == 1) {
        //echo $e;
        $e++;
    }
    $s2 = '';
    for ($i = $e; $i > 0; $i--) {
        if (xDivisionY($s10, xPowerY(2, $i - 1)) == 2) {
            $s2 .= '10';
        } else {
            $s2 .= xDivisionY($s10, xPowerY(2, $i - 1));
        }
        $s10 = xResidueY($s10, xPowerY(2, $i - 1));

    }
    return $s2;
}

//echo trans10to2(12) . "\r\n";

function trans2to16($s2)
{

    $map = array_flip([
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
    ]);
    //按4位分组 然后
    $s2 = ltrim($s2, '0');
    if ($s2 == '') {
        return 0;
    }
    $s16 = '';
    for ($i = 1; $i <= ceil(strlen($s2) / 4); $i++) {
        //$s2g = substr($s2, $i == 1 ? 0 : min(4, strlen($s2) % 4) + ($i - 2) * 4, $i == 1 && strlen($s2) % 4 != 0 ? min(4, strlen($s2) % 4) : 4);
        $s2g = substr($s2, 4 * $i - 1 > 0 ? 4 * $i - 1 : 0, 4);// ???????
        echo $s2g . "\r\n";


        //echo $s2g . '-';
        //for ($j = 0; $j < strlen($s2g); $j++) {
        switch (strlen($s2g)) {
            //case 1:
            //    $s16 .= $map[substr($s2g, 0, 1)];
            //    break;
            //case 2:
            //    //echo substr($s2g, 0, 1) * 2 + substr($s2g, 1, 1) . '---';
            //    $s16 .= $map[substr($s2g, 0, 1) * 2 + substr($s2g, 1, 1)];
            //    break;
            //case 3:
            //    $s16 .= $map[substr($s2g, 0, 1) * 4 + substr($s2g, 1, 1) * 2 + substr($s2g, 2, 1)];
            //    break;
            case 4:
                $s16 .= $map[substr($s2g, 0, 1) * 8 + substr($s2g, 1, 1) * 4 + substr($s2g, 2, 1) * 2 + substr($s2g, 3, 1)];
                break;
        }
        //$s16 .= ' ';
        //}
        //$s2g = substr($s2,);
    }


    return $s16;
}

//echo trans2to16('0')."\r\n";
//echo trans2to16('1')."\r\n";
//echo trans2to16('10')."\r\n";
//echo trans2to16('11')."\r\n";
//echo trans2to16('100')."\r\n";
//echo trans2to16('101')."\r\n";
//echo trans2to16('110')."\r\n";
//echo trans2to16('111')."\r\n";
//echo trans2to16('1000')."\r\n";
//echo trans2to16('1001')."\r\n";
//echo trans2to16('1010')."\r\n";
//echo trans2to16('1011')."\r\n";
//echo trans2to16('1100')."\r\n";
//echo trans2to16('1101')."\r\n";
//echo trans2to16('1110')."\r\n";
//echo trans2to16('1111')."\r\n";
//
//echo trans2to16('10000')."\r\n";
//echo trans2to16('10001')."\r\n";
//echo trans2to16('10010')."\r\n";
//echo trans2to16('10011')."\r\n";
//echo trans2to16('10100')."\r\n";
//echo trans2to16('10101')."\r\n";
//echo trans2to16('10110')."\r\n";
//echo trans2to16('10111')."\r\n";
//echo trans2to16('11000')."\r\n";
//echo trans2to16('11001')."\r\n";
//echo trans2to16('11010')."\r\n";
//echo trans2to16('11011')."\r\n";
//echo trans2to16('11100')."\r\n";
//echo trans2to16('11101')."\r\n";
//echo trans2to16('11110')."\r\n";
//echo trans2to16('11111')."\r\n";
//echo trans2to16('100000')."\r\n";exit;

//echo ceil(5/4);exit;

//echo trans16to10('f955397') . "\r\n";
//exit;

function trans16to2($s16)
{
    $s16 = ltrim($s16, '0');
    if ($s16 == '') {
        return '0000';
    }
    if ($s16 == '1') {
        return '0001';
    }
    $s2 = '';
    for ($i = 0; $i < strlen($s16); $i++) {
        $s16g = substr($s16, $i, 1);
        $s2g = base_convert($s16g, 16, 2);
        $s2 .= str_pad($s2g, 4, '0', STR_PAD_LEFT);
    }
    return $s2;
}

//for ($i = 0; $i < 16; $i++) {
//    $s16i = base_convert($i, 10, 16);
//    //echo $s16i."\r\n";
//    echo trans16to2($s16i) . "\r\n";
//
//}
//echo trans16to2(10);
//exit;


//echo trans16to10('680678550b08393b6c2e97d9f9c1df177987b2049865ab22c44d10b2e7bd624b4501072dfefda785887ca2268d79d6b248638aaf79dd229f889e15e2469cf2119e2fdfc15279fb1920ca50b877deec0748fd5a9d8fc7265cee557601929b389e3d5959860b8f98bffe4c29bd359a05fa20017f3b68a6e51fdf1911515a4e047a');
//73049031344065262662740018099534449425889139519940514384386457756734965560924894449772095919666441948556453580168254844886398763424038366672613605929352849394680951090942128856399321297764166427210786384367898981233034023005314959099951018893091330644500262861361551461149430853560064241292892266161974019184

//加密公式 m是明文 c是密文
//me ≡ c (mod n)  | 6517 ≡ 2790 (mod 3233)


//解密公式 c是密文 m明文
//cd ≡ m (mod n) | 2790^2753 ≡ 65 (mod 3233)
//echo xResidueY(xPowerY(2790,2753), 3233);


//对字符串 00***001 加密得
//$m16 = '0f955397c50af4d4df8db8a392256bf3e9826f773e88756bfb9979a9a6eb786234d6001d7dcd57c0b5e4b71433e0c6357d4099e598c9537777c777e97800eb3cfadf43d55f670b6a4a405b18fe544dd9b29ea1f04ecaa707a8975b28e1a92ed54238ec366392a86423a8a8f2d6d2c2dfa4b09f531c87f42859b0db6ffb27e553';
////转成10进制
//$m10 = trans16to10($m16);
//409611916313150818014868775742262375126383301158502723857879722635337921775566742730816316223269616485484005845333289526984203775986314333174061055864644501006033238380966444437000949883066875019072776711422911079030193560860972397769571148744029691163998872046601805047141838524788012684767935446808724819
//echo $m10 . "\r\n";


//00c4c9148f586a39fb82dcf278d9e05a2b7f42fb470044a4dc73b455bf31c8e6b6c1b713a8dd6eea88fb8ebd1c90b41150c953eb6885101b0001e406ac6365748566e4ad45ac14d69d444bbeb51dc4c0c51c43b0e5163b9029a4a96530f5e91f8aead21643364c22825c15abe1645a3b5e763aedcc2b26a70eeba9fba6246acfd302
$n16 = str_replace(' ', '', "00c4 c914 8f586a39 fb82 dcf2 78d9 e05a 2b7f 42fb 470044a4 dc73 b455 bf31 c8e6 b6c1 b713 a8dd6eea 88fb 8ebd 1c90 b411 50c9 53eb 6885101b 0001 e406 ac63 6574 8566 e4ad 45ac14d6 9d44 4bbe b51d c4c0 c51c 43b0 e5163b90 29a4 a965 30f5 e91f 8aea d216 43364c22 825c 15ab e164 5a3b 5e76 3aed cc2b26a7 0eeb a9fb a624 6acf d302");
echo '$n16 ' . $n16 . "\r\n";
$n2 = trans16to2($n16);

echo '$n2 ' . $n2 . "\r\n";
$n16t = trans2to16($n2);
echo '$n16t ' . $n16t . "\r\n";
exit;

$d16 = str_replace(' ', '', 'b5aa 000d f90c 4fac cd79 556a9590 950d 74b5 8c2d 56a5 0820 efbb ba31002f bc35 590d bedb 7458 51b1 d5b1 4709d8d8 32e8 0684 2f5d 5501 b23b 4683 90599284 f594 1729 28cf 8d7d 0821 46cf b51699ef 675f c50d ee36 810a 889d 838b 4eb0a1f4 73eb a794 dbc2 6bda a886 974c 0f15dc1c 49ff 1cd1 d4fc 6f8c f63c f69c 90e0195e 9089');

$p16 = str_replace(' ', '', 'e0 a2c3 ed54 bc7f 3285ca9e 7d73 46ce d2f7 7943 80b7 ed51 fa2fb45c 2366 1c4c a207 819a ff7b a30e 451a1484 0822 ccbc c3ab eabc fe34 0c65 8e974f66 399c 619b 0d');
$q16 = str_replace(' ', '', 'e042 d9d9 e51ae31e 0f57 0305 19f7 6abd c54a 6fcf 801f4f76 332b 4c09 06f8 96ce b08b 6e57 44505d00 11b9 f97a 5118 01c0 d057 d77a dd21028d 5201 e7d1 6371 de5f');

echo 'p10 * q10 ' . xMultiplyY(trans16to10($p16), trans16to10($q16)) . "\r\n";
echo 'p10 ' . trans16to10($p16) . "\r\n";
echo 'q10 ' . trans16to10($q16) . "\r\n";


function xRand()
{
    $x = '';
    $timesX = mt_rand(1, 9);
    for ($j = 0; $j <= $timesX; $j++) {
        $x .= mt_rand(111111111, 999999999);
    }
    return $x;
}

//for($i = 0;$i <= 10000;$i++){
//    $x = xRand();
//    $y = xRand();
//    $xy = xMultiplyY($x,$y);
//    if(xCompY(xDivisionY($xy,$x),$y) != 0)
//    {
//        echo '$x '.$x."\r\n";
//        echo '$y '.$y."\r\n";
//        exit($i);
//    }
//}
//exit('10000 times ok');
