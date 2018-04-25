<?php

/**
 * php反射api初探
 *      类实现了哪些方法
 *      创建一个类的实例不用new
 *      调用一个方法 不同于常规调用
 *      传递参数
 *      动态调用类的静态方法
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018/4/2
 * Time: 11:51
 */
class Person
{
    /**
     * 是否允许动态属性
     */
    private $_allowDynamicAttributes = false;

    /** 自增id */
    protected $id = 0;

    /** 姓名 */
    protected $name;

    /** 传记 */
    protected $biography;

    public function getId ()
    {
        return $this->id;
    }

    public function setId ($v)
    {
        $this->id = $v;
    }

    public function getName ()
    {
        return $this->name;
    }

    public function setName ($v)
    {
        $this->name = $v;
    }

    public function getBiography ()
    {
        return $this->biography;
    }

    public function setBiography ($v)
    {
        $this->biography = $v;
    }

}

// 通过反射api实例化类
$class = new ReflectionClass('Person');
$pf = $class->newInstanceArgs();
var_dump($pf);

//$pn = new Person();
//var_dump($pn);
//$class2 = new ReflectionClass('Person');
//$pf2 = $class2->newInstanceArgs();
//var_dump($pf2);

//2 获取属性
$properties = $class->getProperties();
var_dump($properties);
foreach ($properties as $v)
{
    echo $v->getName()."\n";
}



















