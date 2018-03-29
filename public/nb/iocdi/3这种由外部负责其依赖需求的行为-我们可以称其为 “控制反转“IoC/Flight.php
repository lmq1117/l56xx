<?php

/**
 * 超能力--飞行，属性有：飞行速度、持续飞行时间
 * User: kevin
 * Date: 2018/3/29
 * Time: 11:29
 */
class Flight
{
    //飞行速度
    protected $speed;

    //持续飞行时间
    protected $holdtime;

    public function __construct($speed, $holdtime)
    {
        $this->speed = $speed;
        $this->holdtime = $holdtime;
    }
}