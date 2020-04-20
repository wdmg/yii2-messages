<?php

namespace wdmg\messages;
use yii\web\AssetBundle;

class MessagesAsset extends AssetBundle
{
    public $sourcePath = '@vendor/wdmg/yii2-messages/assets';

    public $publishOptions = [
        'forceCopy' => true
    ];

    public $css = [
        'css/messages.css',
    ];

    public $js = [
        'js/messages.js',
    ];

    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];

    public function init()
    {
        parent::init();
    }
}

?>