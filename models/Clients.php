<?php

namespace app\models;

use yii\db\ActiveQuery;
use yii\db\ActiveRecord;

/**
 * This is the model class for table "clients".
 *
 * @property int $id
 * @property string $name
 * @property string|null $date_of_birth
 * @property string $address
 * @property int $passport_series
 * @property int $passport_number
 * @property string $issued_by
 * @property string|null $issued_date
 * @property int $sex
 * @property int|null $phone
 *
 * @property Sales[] $sales
 * @property VisitLog[] $visitLogs
 */
class Clients extends ActiveRecord
{
    const SEX = [
        0 => 'мужской',
        1 => 'женский',
    ];

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'clients';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'passport_series', 'passport_number', 'issued_by', 'sex'], 'required'],
            [['date_of_birth', 'issued_date'], 'safe'],
            [['passport_series', 'passport_number', 'sex', 'phone'], 'integer'],
            [['name', 'address', 'issued_by'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'ФИО',
            'date_of_birth' => 'Дата рождения',
            'address' => 'Адрес',
            'passport_series' => 'Серия',
            'passport_number' => 'Номер',
            'issued_by' => 'Выдан',
            'issued_date' => 'Дата выдачи',
            'sex' => 'Пол',
            'phone' => 'Телефон',
        ];
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[VisitLogs]].
     *
     * @return ActiveQuery
     */
    public function getVisitLogs()
    {
        return $this->hasMany(VisitLog::class, ['client_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->select('name')->indexBy('id')->column();
    }
}
