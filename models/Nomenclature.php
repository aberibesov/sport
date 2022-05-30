<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "nomenclature".
 *
 * @property int $id
 * @property string $name
 *
 * @property InventoryInRoom[] $inventoryInRooms
 */
class Nomenclature extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'nomenclature';
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
            'name' => 'Name',
        ];
    }

    /**
     * Gets query for [[InventoryInRooms]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getInventoryInRooms()
    {
        return $this->hasMany(InventoryInRoom::class, ['nomenclature_id' => 'id']);
    }
}
