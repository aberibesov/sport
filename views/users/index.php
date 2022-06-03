<?php

use app\models\Users;
use yii\helpers\Html;
use app\models\Position;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Users */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Пользователи';
$this->params['breadcrumbs'][] = $this->title;

$usersList = Users::getList();
$positionsList = Position::getList();
?>
<div class="users-index">

    <p>
        <?= Html::a('Создать пользователя', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => $this->title
        ],
        'pjax' => true,
        'panelPrefix' => 'box box-',
        'panelHeadingTemplate' => '{title}<div class="clearfix"></div>',
        'panelTemplate' => '{panelHeading}{items}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'username',
            'email:email',
            'name',
            'address',
            'date_of_birth',
            [
                'attribute' => 'status',
                'filter' => Users::STATUSES,
                'value' => static function ($model) {
                    return ArrayHelper::getValue(Users::STATUSES, $model->status);
                }
            ],
            [
                'attribute' => 'position_id',
                'filter' => $positionsList,
                'value' => static function ($model) use ($positionsList) {
                    return ArrayHelper::getValue($positionsList, $model->position_id);
                }
            ],
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
            [
                'class' => ActionColumn::class
            ]
        ]
    ]); ?>

</div>
