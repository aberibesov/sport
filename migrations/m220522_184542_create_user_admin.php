<?php

use app\models\Users;
use yii\db\Migration;
use yii\helpers\Console;

/**
 * Class m220522_184542_create_user_admin
 */
class m220522_184542_create_user_admin extends Migration
{
    /**
     * {@inheritdoc}
     */
    public function safeUp()
    {
        $model = Users::find()->where(['username' => 'admin'])->one();
        if (empty($model)) {
            $user = new Users();
            $user->username = 'admin';
            $user->email = 'admin@fresh-fitness.ru';
            $user->name = 'admin';
            $user->setPassword('admin');
            $user->generateAuthKey();
            $user->created_by = 1;
            $user->updated_by = 1;
            if (!$user->save()) {
                Console::stdout(print_r($user->errors, true) . PHP_EOL);
                return false;
            }
        }
    }

    /**
     * {@inheritdoc}
     */
    public function safeDown()
    {
        $user = Users::find()->where(['username' => 'admin'])->one();

        if ($user !== null) {
            $user->delete();
        }
    }
}
