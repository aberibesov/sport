<?php

use app\models\Users;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Users */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Пользователи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

$usersList = Users::getList();
?>
<div class="users-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'username',
            'email:email',
            'name',
            'address',
            'date_of_birth:date',
            [
                'attribute' => 'status',
                'value' => static function ($model) {
                    return ArrayHelper::getValue(Users::STATUSES, $model->status);
                }
            ],
            'position.title',
            [
                'attribute' => 'created_by',
                'filter' => $usersList,
                'value' => static function ($model) use ($usersList) {
                    return ArrayHelper::getValue($usersList, $model->created_by);
                }
            ],
            'created_at:datetime',
            [
                'attribute' => 'updated_by',
                'filter' => $usersList,
                'value' => static function ($model) use ($usersList) {
                    return ArrayHelper::getValue($usersList, $model->updated_by);
                }
            ],
            'updated_at:datetime',
        ],
    ]) ?>

</div>
