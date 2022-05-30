<?php

namespace app\models;

use Yii;

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
class Clients extends \yii\db\ActiveRecord
{
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
            'name' => 'Name',
            'date_of_birth' => 'Date Of Birth',
            'address' => 'Address',
            'passport_series' => 'Passport Series',
            'passport_number' => 'Passport Number',
            'issued_by' => 'Issued By',
            'issued_date' => 'Issued Date',
            'sex' => 'Sex',
            'phone' => 'Phone',
        ];
    }

    /**
     * Gets query for [[Sales]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getSales()
    {
        return $this->hasMany(Sales::class, ['client_id' => 'id']);
    }

    /**
     * Gets query for [[VisitLogs]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getVisitLogs()
    {
        return $this->hasMany(VisitLog::class, ['client_id' => 'id']);
    }
}
