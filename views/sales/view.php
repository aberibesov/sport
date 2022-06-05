<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use app\models\Clients;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\Subscription;
use app\models\SubscriptionStatus;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="sales-view">

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
            [
                'attribute' => 'client_id',
                'value' => static function ($model) {
                    return ArrayHelper::getValue(Clients::getList(), $model->client_id);
                }
            ],
            [
                'attribute' => 'subscription_id',
                'value' => static function ($model) {
                    return ArrayHelper::getValue(Subscription::getList(), $model->subscription_id);
                }
            ],
            [
                'attribute' => 'status_id',
                'value' => static function ($model) {
                    return ArrayHelper::getValue(SubscriptionStatus::getList(), $model->status_id);
                }
            ],
            'date:datetime',
        ],
    ]) ?>
</div>
