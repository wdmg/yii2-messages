<?php

namespace wdmg\messages;

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