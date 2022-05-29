<?php

use yii\db\Migration;

/**
 * Class m220522_103716_create_table_users
 */
class m220522_103716_create_table_users extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%users}}', [
            'id' => $this->primaryKey(),
            'username' => $this->string()->notNull()->unique(),
            'auth_key' => $this->string(32)->notNull(),
            'password_hash' => $this->string()->notNull(),
            'password_reset_token' => $this->string()->unique(),
            'email' => $this->string()->notNull()->unique(),
            'name' => $this->string()->notNull(),
            'address' => $this->string(),
            'date_of_birth' => $this->date(),
            'status' => $this->smallInteger()->notNull()->defaultValue(1),
            'position_id' => $this->integer(),
            'created_by' => $this->integer(),
            'created_at' => $this->integer(),
            'updated_by' => $this->integer(),
            'updated_at' => $this->integer()
        ]);

        $this->createTable('{{%position}}',
            [
                'id' => $this->primaryKey(),
                'title' => $this->string(),
                'salary' => $this->integer()
            ]
        );

        $this->addForeignKey('FK_position_to_users', '{{%users}}', 'position_id', '{{%position}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_position_to_users', '{{%users}}');

        $this->dropTable('{{%position}}');
        $this->dropTable('{{%users}}');
    }
}
