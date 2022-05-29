<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "subscription".
 *
 * @property int $id
 * @property int $type_id
 * @property int $price
 * @property int|null $mount_amount
 * @property int|null $day_amount
 * @property int|null $number_of_visits
 *
 * @property SubscriptionType $type
 */
class Subscription extends \yii\db\ActiveRecord
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
            [['type_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubscriptionType::className(), 'targetAttribute' => ['type_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type_id' => 'Type ID',
            'price' => 'Price',
            'mount_amount' => 'Mount Amount',
            'day_amount' => 'Day Amount',
            'number_of_visits' => 'Number Of Visits',
        ];
    }

    /**
     * Gets query for [[Type]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getType()
    {
        return $this->hasOne(SubscriptionType::className(), ['id' => 'type_id']);
    }
}