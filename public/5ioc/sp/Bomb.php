<?php
/**
 * Created by PhpStorm.
 * User: kevin
 * Date: 2018/4/26
 * Time: 7:29
 */
class Bomb implements SuperModuleInterface
{
    public $spname = 'bomb';
    public function activate(array $target)
    {
        // TODO: Implement activate() method.
        return 'bomb_activate_result';
    }
}