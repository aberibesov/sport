<?php

namespace app\models;

use Yii;

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
class Sales extends \yii\db\ActiveRecord
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
            'client_id' => 'Client ID',
            'subscription_id' => 'Subscription ID',
            'status_id' => 'Status ID',
            'date' => 'Date',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::class, ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Status]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getStatus()
    {
        return $this->hasOne(SubscriptionStatus::class, ['id' => 'status_id']);
    }

    /**
     * Gets query for [[VisitLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVisitLogs()
    {
        return $this->hasMany(VisitLog::class, ['sale_id' => 'id']);
    }
}
