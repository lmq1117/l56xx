<?php

/**
 * 超能力类
 * User: kevin
 * Date: 2018/3/29
 * Time: 10:45
 */
class Power
{
    //能力值
    protected $ability;

    //能力范围或者距离
    protected $range;

    public function __construct($ability, $range)
    {
        $this->ability = $ability;
        $this->range = $range;
    }

}