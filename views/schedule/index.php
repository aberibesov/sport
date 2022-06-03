<?php

use app\models\Rooms;
use app\models\Users;
use yii\helpers\Html;
use app\models\Services;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Schedule */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Расписание';
$this->params['breadcrumbs'][] = $this->title;

$users = Users::getList();
$rooms = Rooms::getList();
$services = Services::getList();
?>
<div class="schedule-index">

    <p>
        <?= Html::a('Создать расписание', ['create'], ['class' => 'btn btn-success']) ?>
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
            'date_begin:date',
            'date_end:date',
            [
                'attribute' => 'user_id',
                'filter' => $users,
                'value' => static function ($model) use ($users) {
                    return ArrayHelper::getValue($users, $model->user_id);
                }
            ],
            [
                'attribute' => 'service_id',
                'filter' => $services,
                'value' => static function ($model) use ($services) {
                    return ArrayHelper::getValue($services, $model->user_id);
                }
            ],
            [
                'attribute' => 'room_id',
                'filter' => $rooms,
                'value' => static function ($model) use ($rooms) {
                    return ArrayHelper::getValue($rooms, $model->user_id);
                }
            ],
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
