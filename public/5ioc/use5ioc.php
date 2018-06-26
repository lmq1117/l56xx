<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018/4/26
 * Time: 7:16
 */
include_once "Container.php";
include_once "Superman.php";
include_once "SuperModuleInterface.php";
include_once "sp/XPower.php";
include_once "sp/Bomb.php";

$container = new Container();

//向ioc容器中增加生产超人的脚本
//$container->bind('superman',function ($container,$moduleName){
//    return new Superman($container->make($moduleName));
//});

//向ioc容器中增加超能力脚本
$container->bind('xpower',function ($container){
    return new XPower();
});


//$xpower = new XPower();
//$sp = new Superman($xpower);

//得到超人对象??
//$spm_xpower = $container->make('superman','xpower');
//var_dump($xpower);
//var_dump($sp);
//var_dump($spm_xpower);
//echo $spm_xpower->say();
$xpower = $container->make('xpower');
var_dump($xpower);