<?php

use yii\db\Migration;

/**
 * Class m220625_083605_add_users_to_sales
 */
class m220625_083605_add_users_to_sales extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->addColumn('{{%sales}}', 'created_by', $this->integer());
        $this->addColumn('{{%sales}}', 'created_at', $this->integer());
        $this->addForeignKey(
            'fk-sales-created_by',
            '{{%sales}}',
            'created_by',
            'users',
            'id',
            'NO ACTION',
            'CASCADE'
        );

        $this->addColumn('{{%sales}}', 'updated_by', $this->integer());
        $this->addColumn('{{%sales}}', 'updated_at', $this->integer());
        $this->addForeignKey(
            'fk-sales-updated_by',
            '{{%sales}}',
            'updated_by',
            'users',
            'id',
            'NO ACTION',
            'CASCADE'
        );
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('fk-sales-updated_by', '{{%sales}}');
        $this->dropColumn('{{%sales}}', 'updated_by');
        $this->dropColumn('{{%sales}}', 'updated_at');

        $this->dropForeignKey('fk-sales-created_by', '{{%sales}}');
        $this->dropColumn('{{%sales}}', 'created_by');
        $this->dropColumn('{{%sales}}', 'created_at');
    }
}
