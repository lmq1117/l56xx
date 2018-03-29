<?php

/**
 * 超人类
 * User: kevin
 * Date: 2018/3/29
 * Time: 10:44
 */
class Superman
{
    //超能力
    protected $power;

    public function __construct()
    {
        $this->power = new Power(999,100);//能力值999，能力返回100
    }


}