<?php
/*
php7 新特性
1标量类型声明
2 返回值类型声明
3 类常量可见性
4 ??
 */
function sumInts(int...$ints) {
	return array_sum($ints);
}

// echo sumInts(2, '3', 4.1);
var_dump(intdiv(27, 2));