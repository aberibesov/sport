<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "rooms".
 *
 * @property int $id
 * @property string $name
 *
 * @property InventoryInRoom[] $inventoryInRooms
 * @property Schedule[] $schedules
 */
class Rooms extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'rooms';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['name'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Зал',
        ];
    }

    /**
     * Gets query for [[InventoryInRooms]].
     *
     * @return ActiveQuery
     */
    public function getInventoryInRooms()
    {
        return $this->hasMany(InventoryInRoom::class, ['room_id' => 'id']);
    }

    /**
     * Gets query for [[Schedules]].
     *
     * @return ActiveQuery
     */
    public function getSchedules()
    {
        return $this->hasMany(Schedule::class, ['room_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->select('name')->indexBy('id')->column();
    }
}
