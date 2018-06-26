<?php

/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018/4/26
 * Time: 7:23
 */
class Superman
{
    public $sp_name = 'a_dz';
    public $module;//符合接口的模组

    public function __construct(SuperModuleInterface $mod)
    {
        $this->module = $mod;
        //$this->sp_name = $name;
    }

    public function say(){
        return 'Im Super Man!';
    }
}