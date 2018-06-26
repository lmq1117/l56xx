<?php

/**
 * Class Container 容器类
 */
class Container
{
    //容器里拥有的绑定
    protected $binds;

    //容器里所有的实例
    protected $instances;


    public function bind($abstract, $concrete){
        //var_dump($abstract,$concrete);exit;
        //$concrete是闭包 就放到bings成员属性里
        var_dump($concrete instanceof Clource);exit;
        if($concrete instanceof Clource){
            $this->binds[$abstract] = $concrete;
        } else {//$concrete不是闭包|或者说是实例  就放到instance数组中 键为$abstract
            $this->instances[$abstract] = $concrete;
            //var_dump($this->instances[$abstract]);exit;
        }
    }



    public function make($abstract,$parameters = []){

        if(isset($this->instances[$abstract])){
            //有这个实例的话 直接返回
            echo 111;
            var_dump($this->instances[$abstract]);
            return $this->instances[$abstract];
        }
        echo 222;

        //没有这个实例的话 执行这段生成实例的脚本 生成实例
        array_unshift($parameters,$this);
        return call_user_func_array($this->binds[$abstract],$parameters);
    }













}