<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "nomenclature".
 *
 * @property int $id
 * @property string $name
 *
 * @property InventoryInRoom[] $inventoryInRooms
 */
class Nomenclature extends ActiveRecord
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
            'name' => 'Наименование',
        ];
    }

    /**
     * Gets query for [[InventoryInRooms]].
     *
     * @return ActiveQuery
     */
    public function getInventoryInRooms()
    {
        return $this->hasMany(InventoryInRoom::class, ['nomenclature_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->select('name')->indexBy('id')->column();
    }
}
