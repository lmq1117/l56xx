<?php

/**
 * 我们为了给超人制造超能力模组，我们创建了一个工厂，它可以制造各种各样的模组
 * User: kevin
 * Date: 2018/3/29
 * Time: 14:59
 */
class SuperModuleFactory
{
    public function makeModule ($moduleName, $options)
    {
        switch ($moduleName)
        {
            case 'Fight':
                return new Fight($options[0],$options[1]);
                break;
            case 'Force':
                return new Force($options[0]);
                break;
            case 'Shot':
                return new Shot($options[0],$options[1],$options[2]);
                break;
        }
    }
}