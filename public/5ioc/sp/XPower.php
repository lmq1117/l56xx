<?php

/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018/4/26
 * Time: 7:28
 */
class XPower implements SuperModuleInterface
{
    public $spname = 'xpower';

    public function activate(array $target)
    {
        return 'xpower_activate_result';
    }

}
