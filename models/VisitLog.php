<?php

namespace app\models;

use Yii;

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
class VisitLog extends \yii\db\ActiveRecord
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
            [['client_id'], 'required'],
            [['client_id', 'sale_id'], 'integer'],
            [['date_visit'], 'safe'],
            [['sale_id'], 'exist', 'skipOnError' => true, 'targetClass' => Sales::className(), 'targetAttribute' => ['sale_id' => 'id']],
            [['client_id'], 'exist', 'skipOnError' => true, 'targetClass' => Clients::className(), 'targetAttribute' => ['client_id' => 'id']],
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
            'sale_id' => 'Sale ID',
            'date_visit' => 'Date Visit',
        ];
    }

    /**
     * Gets query for [[Client]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getClient()
    {
        return $this->hasOne(Clients::className(), ['id' => 'client_id']);
    }

    /**
     * Gets query for [[Sale]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSale()
    {
        return $this->hasOne(Sales::className(), ['id' => 'sale_id']);
    }
}
