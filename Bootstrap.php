<?php

namespace wdmg\messages;

/**
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @copyright       Copyright (c) 2019 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 */

use yii\base\BootstrapInterface;
use Yii;


class Bootstrap implements BootstrapInterface
{
    public function bootstrap($app)
    {
        // Get the module instance
        $module = Yii::$app->getModule('messages');

        // Get URL path prefix if exist
        $prefix = (isset($module->routePrefix) ? $module->routePrefix . '/' : '');

        // Add module URL rules
        $app->getUrlManager()->addRules(
            [
                $prefix . '<module:messages>/' => '<module>/messages/index',
                $prefix . '<module:messages>/<controller>/' => '<module>/<controller>',
                $prefix . '<module:messages>/<controller>/<action>' => '<module>/<controller>/<action>',
                $prefix . '<module:messages>/<controller>/<action>' => '<module>/<controller>/<action>',
            ],
            true
        );
    }
}