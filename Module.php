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

                echo '<div id="messages-widget" class="panel panel-primary messages-widget">
                    <div class="panel-heading">
                        <a href="#" class="panel-title" role="button" data-target=".tab-content" data-toggle="collapse" aria-expanded="true">
                            <i class="fa fa-fw fa-comments"></i>
                            Messages
                        </a>
                    </div>
                    
                    <div class="tab-content collapse in">
                    
                        <div id="dialogs-list" role="tabpanel" class="tab-pane fade in active">
                            <div class="panel-body">
                                <div class="dialogs-list" tabindex="0">
                                    <ul class="list-unstyled media-list">
                                        <li class="media">
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <a href="#messages-list" class="message-history" aria-controls="messages-list" role="tab" data-toggle="tab">
                                                    <span class="media-heading">John Doe</span>
                                                    <p>Hello Lucy, how can I help you today ?</p>
                                                    <p class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <a href="#messages-list" class="message-history" aria-controls="messages-list" role="tab" data-toggle="tab">
                                                    <span class="media-heading">John Doe</span>
                                                    <p>Hello Lucy, how can I help you today ?</p>
                                                    <p class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <a href="#messages-list" class="message-history" aria-controls="messages-list" role="tab" data-toggle="tab">
                                                    <span class="media-heading">John Doe</span>
                                                    <p>Hello Lucy, how can I help you today ?</p>
                                                    <p class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <a href="#messages-list" class="message-history" aria-controls="messages-list" role="tab" data-toggle="tab">
                                                    <span class="media-heading">John Doe</span>
                                                    <p>Hello Lucy, how can I help you today ?</p>
                                                    <p class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                        <li class="media">
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <a href="#messages-list" class="message-history" aria-controls="messages-list" role="tab" data-toggle="tab">
                                                    <span class="media-heading">John Doe</span>
                                                    <p>Hello Lucy, how can I help you today ?</p>
                                                    <p class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </p>
                                                </a>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        
                        <div id="messages-list" role="tabpanel" class="tab-pane fade in">
                            <ul class="nav navbar-nav" role="tablist">
                                <li role="presentation">
                                    <a href="#dialogs-list" aria-controls="dialogs-list" role="tab" data-toggle="tab">
                                        <i class="fa fa-fw fa-chevron-left"></i>
                                        Dialogs
                                    </a>
                                </li>
                                <li role="presentation" class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false">
                                        Dropdown <span class="caret"></span>
                                    </a>
                                    <ul class="dropdown-menu">
                                        ...
                                    </ul>
                                </li>
                            </ul>
                            <div class="panel-body">
                                <div class="messages-list" tabindex="0">
                                    <ul class="list-unstyled media-list">
                                        <li class="media">
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <div class="message-item">
                                                    <a href="#" class="media-heading">John Doe</a>
                                                    <p>Hello Lucy, how can I help you today ?</p>
                                                    <span class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="devider label-date"> 22 April, 2020</li>
                                        <li>
                                            <div class="media-right user-offline">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <div class="message-item">
                                                    <a href="#" class="media-heading">Lucy Doe</a>
                                                    <p>Hi, I want to buy a new shoes.</p>
                                                    <span class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <div class="message-item">
                                                    <a href="#" class="media-heading">John Doe</a>
                                                    <p>Shipment is free. You`ll get your shoes tomorrow!</p>
                                                    <span class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media-right user-offline">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <div class="message-item">
                                                    <a href="#" class="media-heading">Lucy Doe</a>
                                                    <p>Wow, that`s great!</p>
                                                    <span class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media-right user-offline">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <div class="message-item">
                                                    <a href="#" class="media-heading">Lucy Doe</a>
                                                    <p>Ok. Thanks for the answer. Appreciated.</p>
                                                    <span class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <div class="message-item">
                                                    <a href="#" class="media-heading">John Doe</a>
                                                    <p>You are welcome! <br> Is there anything else I can do for you today?</p>
                                                    <span class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media-right user-offline">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar2.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <div class="message-item">
                                                    <a href="#" class="media-heading">Lucy Doe</a>
                                                    <p>Nope, That`s it.</p>
                                                    <span class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li class="devider label-new">Unread messages</li>
                                        <li>
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <div class="message-item">
                                                    <a href="#" class="media-heading">John Doe</a>
                                                    <p>Thank you for contacting us today</p>
                                                    <span class="message-time">
                                                        <i class="fa fa-clock fa-fw"></i> 09:23AM
                                                    </span>
                                                </div>
                                            </div>
                                        </li>
                                        <li>
                                            <div class="media-left user-online">
                                                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" class="img-circle" alt="Profile Picture">
                                            </div>
                                            <div class="media-body">
                                                <div class="message-item user-typing">Typing</div>
                                            </div>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="panel-footer">
                                <div class="input-group">
                                    <div class="input-group-btn">
                                        <button class="btn btn-default" type="button"><i class="fa fa-paperclip"></i></button>
                                    </div>
                                    <input type="text" placeholder="Type message here…" class="form-control chat-input">
                                    <div class="input-group-btn">
                                        <button class="btn btn-primary" type="submit">Send</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    
                    </div>
                </div>';

            });
        }

    }
}