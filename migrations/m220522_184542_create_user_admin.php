<?php

use yii\db\Migration;

/**
 * Class m220522_184542_create_user_admin
 */
class m220522_184542_create_user_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {

    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        echo "m220522_184542_create_user_admin cannot be reverted.\n";

        return false;
    }

    /*
    // Use up()/down() to run migration code without a transaction.
    public function up()
    {

    }

    public function down()
    {
        echo "m220522_184542_create_user_admin cannot be reverted.\n";

        return false;
    }
    */
}
