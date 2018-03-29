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
        $this->power = new Fight(9,100);//飞行速度9，持续时间100
        $this->power = new Shot(99,50,2);//伤害值99、射击距离50、同时射击个数2

        //同时具有蛮力和能量弹2种超能力
        $this->pwoer = [
            new Force(45),//蛮力45
            new Shot(99,50,2)//伤害值99、射击距离50、同时射击个数2
        ];
    }


}