<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "position".
 *
 * @property int $id
 * @property string|null $title
 * @property int|null $salary
 *
 * @property Users[] $users
 */
class Position extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'position';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['salary'], 'integer'],
            [['title'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Должность',
            'salary' => 'Оклад',
        ];
    }

    /**
     * Gets query for [[Users]].
     *
     * @return \yii\db\ActiveQuery
     */
    public function getUsers()
    {
        return $this->hasMany(Users::class, ['position_id' => 'id']);
    }

    /**
     * @return array
     */
    public static function getList()
    {
        return self::find()->select('title')->indexBy('id')->column();
    }
}
