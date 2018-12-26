<?php
set_time_limit(0);
ini_set('memory_limit', '-1');

//echo xPowerY(2790, 2753) . "\r\n";

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
function xMultiplyY($x, $y, $arrL = 40000000000)
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
    //print_r($xArr);
    //print_r($yArr);exit;

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

        }

        if ($i <= $arrL - 1 && $productUp > 0) {
            $res[$i - 1] = $productUp;
            $productUp = 0;
        }
    }

    ksort($res);
    //return ltrim(join($res), '0');
    return ltrim(join($res), '0') == '' ? 0 : ltrim(join($res), '0');

}


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

        //echo $map[substr(strrev($s16), $i, 1)].'---';
        //echo $s10 . '--' . xMultiplyY(xPowerY(16, $i), $map[substr(strrev($s16), $i, 1)]) . '---';
        $s10 = xPlusY($s10, xMultiplyY(xPowerY(16, $i), $map[substr(strrev($s16), $i, 1)]));
        //echo $s10 . '==';
    }
    return $s10;
}


function trans10to16($s10)
{
    return trans2to16(trans10to2($s10));
}


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
        $s2g = substr($s2, 4 * ($i - 1), 4);// ???????
        //echo $s2g . "\r\n";


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


function xRand()
{
    $x = '';
    $timesX = mt_rand(1, 9);
    for ($j = 0; $j <= $timesX; $j++) {
        $x .= mt_rand(111111111, 999999999);
    }
    return $x;
}

file_put_contents('/tmp/1264369199exp2279660081.txt', xPowerY(1264369199, 2279660081));
