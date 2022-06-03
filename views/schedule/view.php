<?php

use app\models\Rooms;
use app\models\Users;
use yii\helpers\Html;
use yii\web\YiiAsset;
use app\models\Services;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Расписание', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

$users = Users::getList();
$rooms = Rooms::getList();
$services = Services::getList();
?>
<div class="schedule-view">

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'date_begin',
            'date_end',
            [
                'attribute' => 'user_id',
                'value' => static function ($model) use ($users) {
                    return ArrayHelper::getValue($users, $model->user_id);
                }
            ],
            [
                'attribute' => 'service_id',
                'value' => static function ($model) use ($services) {
                    return ArrayHelper::getValue($services, $model->user_id);
                }
            ],
            [
                'attribute' => 'room_id',
                'value' => static function ($model) use ($rooms) {
                    return ArrayHelper::getValue($rooms, $model->user_id);
                }
            ],
        ],
    ]) ?>

</div>
