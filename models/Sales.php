<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "sales".
 *
 * @property int $id
 * @property int $client_id
 * @property int $subscription_id
 * @property int $status_id
 * @property string|null $date
 *
 * @property Clients $client
 * @property SubscriptionStatus $status
 * @property VisitLog[] $visitLogs
 */
class Sales extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'sales';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'subscription_id', 'status_id'], 'required'],
            [['client_id', 'subscription_id', 'status_id'], 'integer'],
            [['date'], 'safe'],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['client_id' => 'id']],
            [['status_id'], 'exist', 'skipOnError' => true, 'targetClass' => SubscriptionStatus::class, 'targetAttribute' => ['status_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'client_id' => 'Клиент',
            'subscription_id' => 'Абонемент',
            'status_id' => 'Статус',
            'date' => 'Дата продажи',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(SubscriptionStatus::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[VisitLogs]].
     *
     * @return ActiveQuery
     */
    public function getVisitLogs()
    {
        return $this->hasMany(VisitLog::class, ['sale_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->select('name')->indexBy('id')->column();
    }
}
