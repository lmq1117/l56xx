<?php

/**
 * 超能力--能量弹，属性有：伤害值、射击距离、同时射击个数
 * User: kevin
 * Date: 2018/3/29
 * Time: 11:41
 */
class Shot
{
    //伤害值
    protected $atk;

    //射击距离
    protected $range;

    //同时射击个数
    protected $limit;

    public function __construct($atk, $range, $limit)
    {
        $this->atk = $atk;
        $this->range = $range;
        $this->limit = $limit;
    }
}