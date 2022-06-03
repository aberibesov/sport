<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "visit_log".
 *
 * @property int $id
 * @property int $client_id
 * @property int|null $sale_id
 * @property string|null $date_visit
 *
 * @property Clients $client
 * @property Sales $sale
 */
class VisitLog extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'visit_log';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['client_id', 'sale_id', 'date_visit'], 'required'],
            [['client_id', 'sale_id'], 'integer'],
            [['date_visit'], 'safe'],
            [['sale_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sales::class, 'targetAttribute' => ['sale_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::class, 'targetAttribute' => ['client_id' => 'id']],
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
            'sale_id' => 'Продажа',
            'date_visit' => 'Дата визита',
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
     * Gets query for [[Sale]].
     *
     * @return ActiveQuery
     */
    public function getSale()
    {
        return $this->hasOne(Sales::class, ['id' => 'sale_id']);
    }
}
