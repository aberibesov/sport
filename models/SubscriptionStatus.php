<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "subscription_status".
 *
 * @property int $id
 * @property string $name
 *
 * @property Sales[] $sales
 */
class SubscriptionStatus extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscription_status';
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
            'name' => 'Статус',
        ];
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::class, ['status_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->select('name')->indexBy('id')->column();
    }
}
