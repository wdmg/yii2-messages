<?php

namespace wdmg\messages;

/**
 * Yii2 Private messages
 *
 * @category        Module
 * @version         0.0.9
 * @author          Alexsander Vyshnyvetskyy <alex.vyshnyvetskyy@gmail.com>
 * @link            https://github.com/wdmg/yii2-messages
 * @copyright       Copyright (c) 2019 - 2020 W.D.M.Group, Ukraine
 * @license         https://opensource.org/licenses/MIT Massachusetts Institute of Technology (MIT) License
 *
 */

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
    private $version = "0.0.9";

    /**
     * @var integer, priority of initialization
     */
    private $priority = 8;

    /**
     * {@inheritdoc}
     */
    public function dashboardNavItems($createLink = false)
    {
        $items = [
            'label' => $this->name,
            'url' => [$this->routePrefix . '/'. $this->id],
            'icon' => 'fa fa-fw fa-envelope-open-text',
            'active' => in_array(\Yii::$app->controller->module->id, [$this->id])
        ];
        return $items;
    }

    public function bootstrap($app)
    {
        parent::bootstrap($app);

        if ($this->isBackend() && !$this->isConsole()) {
            $view = Yii::$app->getView();
            $bundle = \wdmg\messages\MessagesAsset::register($view);

            $app->view->on($view::EVENT_END_BODY, function () {

                echo '<div class="messages-widget panel panel-primary">
                <!--Heading-->
                <div class="panel-heading">
                    <div class="panel-control">
                        <div class="btn-group">
                            <button type="button" class="btn btn-default" data-toggle="collapse" data-target="#demo-chat-body"><i class="fa fa-chevron-down"></i></button>
                            <button type="button" class="btn btn-default" data-toggle="dropdown"><i class="fa fa-gear"></i></button>
                            <ul class="dropdown-menu dropdown-menu-right">
                                <li><a href="#">Available</a></li>
                                <li><a href="#">Busy</a></li>
                                <li><a href="#">Away</a></li>
                                <li class="divider"></li>
                                <li><a id="demo-connect-chat" href="#" class="disabled-link" data-target="#demo-chat-body">Connect</a></li>
                                <li><a id="demo-disconnect-chat" href="#" data-target="#demo-chat-body">Disconect</a></li>
                            </ul>
                        </div>
                    </div>
                    <h3 class="panel-title">Messages</h3>
                </div>

                <!--Widget body-->
                <div id="demo-chat-body" class="collapse in">
                    <div class="panel-body" style="height:380px">
                        <div class="messages-list" tabindex="0" style="right: -17px;">
                            <ul class="list-unstyled media-block">
                                <li class="mar-btm">
                                    <div class="media-left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle img-sm" alt="Profile Picture">
                                    </div>
                                    <div class="media-body">
                                        <div class="speech">
                                            <a href="#" class="media-heading">John Doe</a>
                                            <p>Hello Lucy, how can I help you today ?</p>
                                            <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i>09:23AM
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <div class="media-right">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-circle img-sm" alt="Profile Picture">
                                    </div>
                                    <div class="media-body">
                                        <div class="speech">
                                            <a href="#" class="media-heading">Lucy Doe</a>
                                            <p>Hi, I want to buy a new shoes.</p>
                                            <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i> 09:23AM
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <div class="media-left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle img-sm" alt="Profile Picture">
                                    </div>
                                    <div class="media-body">
                                        <div class="speech">
                                            <a href="#" class="media-heading">John Doe</a>
                                            <p>Shipment is free. You\'ll get your shoes tomorrow!</p>
                                            <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i> 09:25
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <div class="media-right">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-circle img-sm" alt="Profile Picture">
                                    </div>
                                    <div class="media-body">
                                        <div class="speech">
                                            <a href="#" class="media-heading">Lucy Doe</a>
                                            <p>Wow, that\'s great!</p>
                                            <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i> 09:27
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <div class="media-right">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-circle img-sm" alt="Profile Picture">
                                    </div>
                                    <div class="media-body">
                                        <div class="speech">
                                            <a href="#" class="media-heading">Lucy Doe</a>
                                            <p>Ok. Thanks for the answer. Appreciated.</p>
                                            <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i> 09:28
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <div class="media-left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle img-sm" alt="Profile Picture">
                                    </div>
                                    <div class="media-body">
                                        <div class="speech">
                                            <a href="#" class="media-heading">John Doe</a>
                                            <p>You are welcome! <br> Is there anything else I can do for you today?</p>
                                            <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i> 09:30
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <div class="media-right">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-circle img-sm" alt="Profile Picture">
                                    </div>
                                    <div class="media-body">
                                        <div class="speech">
                                            <a href="#" class="media-heading">Lucy Doe</a>
                                            <p>Nope, That\'s it.</p>
                                            <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i> 09:31
                                            </p>
                                        </div>
                                    </div>
                                </li>
                                <li class="mar-btm">
                                    <div class="media-left">
                                        <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle img-sm" alt="Profile Picture">
                                    </div>
                                    <div class="media-body">
                                        <div class="speech">
                                            <a href="#" class="media-heading">John Doe</a>
                                            <p>Thank you for contacting us today</p>
                                            <p class="speech-time">
                                                <i class="fa fa-clock-o fa-fw"></i> 09:32
                                            </p>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                        <div class="nano-pane"><div class="nano-slider" style="height: 141px; transform: translate(0px, 0px);"></div></div></div>

                    <!--Widget footer-->
                    <div class="panel-footer">
                        <div class="row">
                            <div class="col-xs-9">
                                <input type="text" placeholder="Enter your text" class="form-control chat-input">
                            </div>
                            <div class="col-xs-3">
                                <button class="btn btn-primary btn-block" type="submit">Send</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>';

            });
        }

    }
}