<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "schedule".
 *
 * @property int $id
 * @property string|null $date_begin
 * @property string|null $date_end
 * @property int $user_id
 * @property int $service_id
 * @property int $room_id
 *
 * @property Rooms $room
 * @property Services $service
 * @property Users $user
 */
class Schedule extends ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'schedule';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['date_begin', 'date_end'], 'safe'],
            [['user_id', 'service_id', 'room_id'], 'required'],
            [['user_id', 'service_id', 'room_id'], 'integer'],
            [['room_id'], 'exist', 'skipOnError' => true, 'targetClass' => Rooms::class, 'targetAttribute' => ['room_id' => 'id']],
            [['service_id'], 'exist', 'skipOnError' => true, 'targetClass' => Services::class, 'targetAttribute' => ['service_id' => 'id']],
            [['user_id'], 'exist', 'skipOnError' => true, 'targetClass' => Users::class, 'targetAttribute' => ['user_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'date_begin' => 'Дата начала',
            'date_end' => 'Дата окончания',
            'user_id' => 'Пользователь',
            'service_id' => 'Занятие',
            'room_id' => 'Зал',
        ];
    }

    /**
     * Gets query for [[Room]].
     *
     * @return ActiveQuery
     */
    public function getRoom()
    {
        return $this->hasOne(Rooms::class, ['id' => 'room_id']);
    }

    /**
     * Gets query for [[Service]].
     *
     * @return ActiveQuery
     */
    public function getService()
    {
        return $this->hasOne(Services::class, ['id' => 'service_id']);
    }

    /**
     * Gets query for [[User]].
     *
     * @return ActiveQuery
     */
    public function getUser()
    {
        return $this->hasOne(Users::class, ['id' => 'user_id']);
    }
}
