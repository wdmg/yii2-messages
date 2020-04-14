<?php

use yii\db\Migration;

/**
 * Class m190328_235559_messages
 */
class m190328_235559_messages extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

        $tableOptions = null;
        if ($this->db->driverName === 'mysql') {
            $tableOptions = 'CHARACTER SET utf8 COLLATE utf8_unicode_ci ENGINE=InnoDB';
        }

        $this->createTable('{{%messages}}', [
            'id'=> $this->bigPrimaryKey(20),
            'sender_id' => $this->integer()->null(),
            'receiver_id' => $this->integer()->notNull(),

            'subject' => $this->string(64)->null(),
            'message'=> $this->text()->notNull(),

            'status' => $this->tinyInteger(1)->null()->defaultValue(0), // 0 - draft, 1 - sent, 2 - delivered, 3 - read, 4 - deleted
            'session' => $this->string(32)->notNull(),

            'created_at' => $this->dateTime()->defaultExpression('CURRENT_TIMESTAMP'),
            'updated_at' => $this->datetime()->defaultExpression('CURRENT_TIMESTAMP'),

        ], $tableOptions);

        $this->createIndex('idx_messages_user','{{%messages}}', ['sender_id', 'receiver_id'],false);

        if ($this->db->driverName === 'mysql')
            $this->createIndex('idx_messages_text','{{%messages}}', ['subject', 'message(250)'],false);
        else
            $this->createIndex('idx_messages_text','{{%messages}}', ['subject', 'message'],false);

        $this->createIndex('idx_messages_status','{{%messages}}', ['status'],false);
        $this->createIndex('idx_messages_session','{{%messages}}', ['session'],false);

        // If exist module `Users` set foreign key `user_id` to `users.id`
        if(class_exists('\wdmg\users\models\Users') && isset(Yii::$app->modules['users'])) {
            $userTable = \wdmg\users\models\Users::tableName();
            $this->addForeignKey(
                'fk_messages_to_users',
                '{{%messages}}',
                'sender_id, receiver_id',
                $userTable,
                'id',
                'NO ACTION',
                'CASCADE'
            );
        }

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropIndex('idx_messages_user', '{{%messages}}');
        $this->dropIndex('idx_messages_text', '{{%messages}}');
        $this->dropIndex('idx_messages_status', '{{%messages}}');
        $this->dropIndex('idx_messages_session', '{{%messages}}');

        if(class_exists('\wdmg\users\models\Users') && isset(Yii::$app->modules['users'])) {
            $userTable = \wdmg\users\models\Users::tableName();
            if (!(Yii::$app->db->getTableSchema($userTable, true) === null)) {
                $this->dropForeignKey(
                    'fk_messages_to_users',
                    '{{%messages}}'
                );
            }
        }

        $this->truncateTable('{{%messages}}');
        $this->dropTable('{{%messages}}');
    }

}
