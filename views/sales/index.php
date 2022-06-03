<?php

use yii\helpers\Html;
use app\models\Clients;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use app\models\Subscription;
use yii\helpers\ArrayHelper;
use app\models\SubscriptionStatus;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Sales */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Продажи';
$this->params['breadcrumbs'][] = $this->title;

$subscription = Subscription::getList();
$statuses = SubscriptionStatus::getList();
$clients = Clients::getList();
?>
<div class="sales-index">

    <p>
        <?= Html::a('Создать продажу', ['create'], ['class' => 'btn btn-success']) ?>
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
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            [
                'attribute' => 'client_id',
                'filter' => $clients,
                'value' => static function ($model) use ($clients) {
                    return ArrayHelper::getValue($clients, $model->client_id);
                }
            ],
            [
                'attribute' => 'subscription_id',
                'filter' => $subscription,
                'value' => static function ($model) use ($subscription) {
                    return ArrayHelper::getValue($subscription, $model->subscription_id);
                }
            ],
            [
                'attribute' => 'status_id',
                'filter' => $statuses,
                'value' => static function ($model) use ($statuses) {
                    return ArrayHelper::getValue($statuses, $model->status_id);
                }
            ],

            'date:datetime',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
