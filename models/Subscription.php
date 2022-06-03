<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "subscription".
 *
 * @property int $id
 * @property string $name
 * @property int $type_id
 * @property int $price
 * @property int|null $mount_amount
 * @property int|null $day_amount
 * @property int|null $number_of_visits
 *
 * @property SubscriptionType $type
 */
class Subscription extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'subscription';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['type_id', 'price'], 'required'],
            [['type_id', 'price', 'mount_amount', 'day_amount', 'number_of_visits'], 'integer'],
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubscriptionType::class, 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Тип',
            'price' => 'Цена',
            'mount_amount' => 'Месяц',
            'day_amount' => 'День',
            'number_of_visits' => 'Визиты',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(SubscriptionType::class, ['id' => 'type_id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->select('name')->indexBy('id')->column();
    }
}
