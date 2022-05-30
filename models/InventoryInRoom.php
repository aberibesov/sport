<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "inventory_in_room".
 *
 * @property int $id
 * @property int $room_id
 * @property int $nomenclature_id
 * @property int|null $count
 *
 * @property Nomenclature $nomenclature
 * @property Rooms $room
 */
class InventoryInRoom extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'inventory_in_room';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['room_id', 'nomenclature_id'], 'required'],
            [['room_id', 'nomenclature_id', 'count'], 'integer'],
            [['nomenclature_id'], 'exist', 'skipOnError' => true, 'targetClass' => Nomenclature::class, 'targetAttribute' => ['nomenclature_id' => 'id']],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rooms::class, 'targetAttribute' => ['room_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'room_id' => 'Room ID',
            'nomenclature_id' => 'Nomenclature ID',
            'count' => 'Count',
        ];
    }

    /**
     * Gets query for [[Nomenclature]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getNomenclature()
    {
        return $this->hasOne(Nomenclature::class, ['id' => 'nomenclature_id']);
    }

    /**
     * Gets query for [[Room]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Rooms::class, ['id' => 'room_id']);
    }
}
