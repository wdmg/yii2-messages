<?php

namespace wdmg\messages\widgets;

use Yii;
use yii\base\Widget;
use yii\helpers\Html;
use wdmg\messages\MessagesAsset;
use yii\i18n\Formatter;

class ChatWidget  extends Widget
{
    public $data;

    private $_bundle;

    public function init()
    {
        $view = $this->getView();
        $this->_bundle = MessagesAsset::register($view);
        parent::init();
    }

    public function run()
    {

        $output = '<div id="messages-widget" class="panel panel-primary messages-widget">';

            $output .= '<div class="panel-heading">
                <a href="#" class="panel-title" role="button" data-target=".tab-content" data-toggle="collapse" aria-expanded="true">
                    <i class="fa fa-fw fa-comments"></i>
                    ' . Yii::t('app/modules/messages', 'Messages') . '
                </a>
            </div>';

            // Render tabs content
            $output .= '<div class="tab-content collapse in">';

                // Render dialogs tab
                $output .= '<div id="dialogs-list" role="tabpanel" class="tab-pane fade in active">';
                    $output .= '<div class="panel-body">';
                        $output .= '<div class="dialogs-list" tabindex="0">';

                        // Render dialogs list
                        if (is_countable($this->data['messages'])) {
                            $output .= '<ul class="list-unstyled media-list">';

                            $dialogs = [];
                            foreach ($this->data['messages'] as $message) {

                                $sender_id = $message['sender_id'];
                                if (!isset($dialogs[$sender_id]) && $message['is_incoming'])
                                    $dialogs[$sender_id] = $message;

                                $recipient_id = $message['recipient_id'];
                                if (!isset($dialogs[$recipient_id]) && !$message['is_incoming'])
                                    $dialogs[$recipient_id] = $message;

                            }

                            foreach ($dialogs as $dialog) {
                                $output .= '<li class="media">';

                                    // Get info about sender
                                    $user_id = $dialog['sender_id'];
                                    $user = $this->data['users'][$user_id];

                                    $output .= '<div class="media-left' . (($user['is_online']) ? ' user-online' : ' user-offline') . '">';

                                        if ($user['profile']['photo'])
                                            $profile_photo = $user['profile']['photo'];
                                        else
                                            $profile_photo = $this->_bundle->baseUrl . 'images/default-user.png';

                                        $output .= Html::img($profile_photo, [
                                            'class' => "img-circle",
                                            'alt' => ($user['username']) ? $user['username'] : Yii::t('app/modules/messages', 'Profile picture')
                                        ]);

                                    $output .= '</div>';

                                    $output .= '<div class="media-body">';

                                        $message = Html::tag('span',
                                            ($user['profile']['name']) ? $user['profile']['name'] : $user['username'], [
                                                'class' => "media-heading"
                                            ]);
                                        $message .= Html::tag('p', $dialog['message']);

                                        $message .= Html::tag('p', Html::tag('i', '&nbsp;', [
                                                'class' => "fa fa-clock fa-fw"
                                            ]) . \Yii::$app->formatter->asDatetime($dialog['datetime'], 'dd MMMM в HH:mm'), [
                                            'class' => "message-time"
                                        ]);

                                        $output .= Html::a($message, '#messages-list', [
                                            'class' => "message-history",
                                            'aria-controls' => "messages-list",
                                            'role' => "tab",
                                            'data-toggle' => "tab"
                                        ]);

                                    $output .= '</div>';

                                $output .= '</li>';
                            }

                            $output .= '</ul>';
                        }

                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';

                // Render messages tab
                $output .= '<div id="messages-list" role="tabpanel" class="tab-pane fade in">';
                    $output .= '<div class="panel-body">';
                        $output .= '<div class="messages-list" tabindex="0">';

                        // Render messages list
                        if (is_countable($this->data['messages'])) {
                            $output .= '<ul class="list-unstyled media-list">';

                            foreach ($this->data['messages'] as $message) {
                                $output .= '<li class="media">';

                                    // Get info about sender
                                    $user_id = $message['sender_id'];
                                    $user = $this->data['users'][$user_id];

                                    $output .= '<div class="' . (($message['is_incoming']) ? 'media-left' : 'media-right') . (($user['is_online']) ? ' user-online' : ' user-offline') . '">';

                                        if ($user['profile']['photo'])
                                            $profile_photo = $user['profile']['photo'];
                                        else
                                            $profile_photo = $this->_bundle->baseUrl . 'images/default-user.png';

                                        $output .= Html::img($profile_photo, [
                                            'class' => "img-circle",
                                            'alt' => ($user['username']) ? $user['username'] : Yii::t('app/modules/messages', 'Profile picture')
                                        ]);

                                    $output .= '</div>';

                                    $output .= '<div class="media-body">';
                                        $output .= '<div class="message-item">';

                                            $output .= Html::a(($user['profile']['name']) ? $user['profile']['name'] : $user['username'],
                                                '#', [
                                                'class' => "media-heading"
                                            ]);

                                            $output .= Html::tag('p', $message['message']);

                                            $output .= Html::tag('p', Html::tag('i', '&nbsp;', [
                                                    'class' => "fa fa-clock fa-fw"
                                                ]) . \Yii::$app->formatter->asDatetime($message['datetime'], 'dd MMMM в HH:mm'), [
                                                'class' => "message-time"
                                            ]);

                                        $output .= '</div>';
                                    $output .= '</div>';
                                $output .= '</li>';
                            }

                            $output .= '</ul>';
                        }

                        $output .= '</div>';
                    $output .= '</div>';
                $output .= '</div>';
            $output .= '</div>';
        $output .= '</div>';

        echo $output;
    }

}