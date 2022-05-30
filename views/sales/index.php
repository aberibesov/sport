<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\Sales */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Sales';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-index">

    <p>
        <?= Html::a('Create Sales', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => $this->title
        ],
        'panelPrefix' => 'box box-',
        'panelHeadingTemplate' => '{title}<div class="clearfix"></div>',
        'panelTemplate' => '{panelHeading}{items}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'client_id',
            'subscription_id',
            'status_id',
            'date',
            [
                'class' => ActionColumn::class,
                'urlCreator' => function ($action, Sales $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
