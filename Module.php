<?php

namespace wdmg\messages;

/**
 * Yii2 Private messages
 *
 * @category        Module
 * @version         1.0.0
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-messages
 * @copyright       Copyright (c) 2019 - 2023 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

use wdmg\helpers\ArrayHelper;
use Yii;
use wdmg\base\BaseModule;

/**
 * Messages module definition class
 */
class Module extends BaseModule
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = 'wdmg\messages\controllers';

    /**
     * {@inheritdoc}
     */
    public $defaultRoute = "messages/index";

    /**
     * @var string, the name of module
     */
    public $name = "Messages";

    /**
     * @var string, the description of module
     */
    public $description = "Private messaging system";

    /**
     * @var string the module version
     */
    private $version = "1.0.0";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 8;

    /**
     * {@inheritdoc}
     */
    public function dashboardNavItems($options = null)
    {
        $items = [
            'label' => $this->name,
            'url' => [$this->routePrefix . '/'. $this->id],
            'icon' => 'fa fa-fw fa-envelope-open-text',
            'active' => in_array(\Yii::$app->controller->module->id, [$this->id])
        ];

	    if (!is_null($options)) {

		    if (isset($options['count'])) {
			    $items['label'] .= '<span class="badge badge-default float-right">' . $options['count'] . '</span>';
			    unset($options['count']);
		    }

		    if (is_array($options))
			    $items = ArrayHelper::merge($items, $options);

	    }

	    return $items;
    }

    public function bootstrap($app)
    {
        parent::bootstrap($app);
    }
}