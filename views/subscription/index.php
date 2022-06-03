<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;
use app\models\SubscriptionType;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Subscription */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Абонементы';
$this->params['breadcrumbs'][] = $this->title;

$subscriptionType = SubscriptionType::getList();
?>
<div class="subscription-index">

    <p>
        <?= Html::a('Создать абонементы', ['create'], ['class' => 'btn btn-success']) ?>
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
            [
                'attribute' => 'type_id',
                'filter' => $subscriptionType,
                'value' => static function ($model) use ($subscriptionType) {
                    return ArrayHelper::getValue($subscriptionType, $model->type_id);
                }
            ],
            'price',
            'mount_amount',
            'day_amount',
            'number_of_visits',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
