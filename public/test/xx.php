<?php
set_time_limit(0);
ini_set('memory_limit', '-1');



echo xPowerY(2790,27530)."\r\n";

/**
 * 乘方
 * @param $x
 * @param $y
 * @return int|string
 */
function xPowerY($x, $y)
{
    if($y == 0)
    {
        return 1;
    }
    if($y == 1)
    {
        return $x;
    }
    $product = $x;
    for ($i = 2; $i <= $y; $i++) {
        $product = multiplyDaShu($product,$x);
    }
    return $product;
}


/**
 * 大数相乘 模拟笔算
 * @param $x
 * @param $y
 * @param int $arrL
 * @return string
 */
function multiplyDaShu($x, $y, $arrL = 20000)
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
                $sum = array_sum(array_column($line, $i)) + substr($sum, 0, strlen($sum) - 1);
            }
            $result[$i] = substr($sum, -1);

        } else {
            $sum = array_sum(array_column($line, $i)) + substr($sum, 0, strlen($sum) - 1);
            for ($j = 1; $j <= strlen($sum); $j++) {
                if ($j == strlen($sum) && substr($sum, $j - 1, 1) == 0) {
                    continue;
                }
                $result[$i - $j] = substr($sum, $j - 1, 1);
            }
        }

    }


    ksort($result);
    return join($result);
}


//var_dump($line);
//var_dump($xArr);
//var_dump($yArr);