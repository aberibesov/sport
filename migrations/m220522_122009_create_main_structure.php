<?php

use yii\db\Migration;

/**
 * Class m220522_122009_create_main_structure
 */
class m220522_122009_create_main_structure extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $this->createTable('{{%services}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->createTable('{{%rooms}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->createTable('{{%nomenclature}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->createTable('{{%inventory_in_room}}', [
            'id' => $this->primaryKey(),
            'room_id' => $this->integer()->notNull(),
            'nomenclature_id' => $this->integer()->notNull(),
            'count' => $this->integer()
        ]);

        $this->addForeignKey('FK_room_inventory', '{{%inventory_in_room}}', 'room_id', '{{%rooms}}', 'id');
        $this->addForeignKey('FK_nomenclature_inventory', '{{%inventory_in_room}}', 'nomenclature_id', '{{%nomenclature}}', 'id');

        $this->createTable('{{%schedule}}', [
            'id' => $this->primaryKey(),
            'date_begin' => $this->date(),
            'date_end' => $this->date(),
            'user_id' => $this->integer()->notNull(),
            'service_id' => $this->integer()->notNull(),
            'room_id' => $this->integer()->notNull()
        ]);

        $this->addForeignKey('FK_schedule_user', '{{%schedule}}', 'user_id', '{{%users}}', 'id');
        $this->addForeignKey('FK_schedule_service', '{{%schedule}}', 'service_id', '{{%services}}', 'id');
        $this->addForeignKey('FK_schedule_room', '{{%schedule}}', 'room_id', '{{%rooms}}', 'id');

        $this->createTable('{{%clients}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull(),
            'date_of_birth' => $this->date(),
            'address' => $this->string()->notNull(),
            'passport_series' => $this->smallInteger()->notNull(),
            'passport_number' => $this->integer()->notNull(),
            'issued_by' => $this->string()->notNull(),
            'issued_date' => $this->date(),
            'sex' => $this->tinyInteger()->notNull()->unsigned(),
            'phone' => $this->bigInteger()
        ]);

        $this->createTable('{{%subscription_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->createTable('{{%subscription_status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->notNull()
        ]);

        $this->createTable('{{%subscription}}', [
            'id' => $this->primaryKey(),
            'type_id' => $this->integer()->notNull(),
            'price' => $this->integer()->notNull(),
            'mount_amount' => $this->tinyInteger()->unsigned(),
            'day_amount' => $this->tinyInteger()->unsigned(),
            'number_of_visits' => $this->tinyInteger()->unsigned()
        ]);

        $this->addForeignKey('FK_subscription_type', '{{%subscription}}', 'type_id', '{{%subscription_type}}', 'id');

        $this->createTable('{{%sales}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'subscription_id' => $this->integer()->notNull(),
            'status_id' => $this->integer()->notNull(),
            'date' => $this->date()
        ]);

        $this->addForeignKey('FK_sales_client', '{{%sales}}', 'client_id', '{{%clients}}', 'id');
        $this->addForeignKey('FK_sales_status', '{{%sales}}', 'status_id', '{{%subscription_status}}', 'id');

        $this->createTable('{{%visit_log}}', [
            'id' => $this->primaryKey(),
            'client_id' => $this->integer()->notNull(),
            'sale_id' => $this->integer(),
            'date_visit' => $this->date()
        ]);

        $this->addForeignKey('FK_visit_user', '{{%visit_log}}', 'client_id', '{{%clients}}', 'id');
        $this->addForeignKey('FK_visit_sale', '{{%visit_log}}', 'sale_id', '{{%sales}}', 'id');
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $this->dropForeignKey('FK_visit_sale', '{{%visit_log}}');
        $this->dropForeignKey('FK_visit_user', '{{%visit_log}}');

        $this->dropTable('{{%visit_log}}');

        $this->dropForeignKey('FK_sales_status', '{{%sales}}');
        $this->dropForeignKey('FK_sales_client', '{{%sales}}');

        $this->dropTable('{{%sales}}');

        $this->dropForeignKey('FK_subscription_type', '{{%subscription}}');

        $this->dropTable('{{%subscription}}');

        $this->dropTable('{{%subscription_status}}');

        $this->dropTable('{{%subscription_type}}');

        $this->dropTable('{{%clients}}');

        $this->dropForeignKey('FK_schedule_room', '{{%schedule}}');
        $this->dropForeignKey('FK_schedule_service', '{{%schedule}}');
        $this->dropForeignKey('FK_schedule_user', '{{%schedule}}');

        $this->dropTable('{{%schedule}}');

        $this->dropForeignKey('FK_nomenclature_inventory', '{{%inventory_in_room}}');
        $this->dropForeignKey('FK_room_inventory', '{{%inventory_in_room}}');

        $this->dropTable('{{%inventory_in_room}}');

        $this->dropTable('{{%nomenclature}}');

        $this->dropTable('{{%rooms}}');

        $this->dropTable('{{%services}}');
    }
}
