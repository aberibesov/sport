<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\VisitLog */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Visit Logs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-log-index">

    <p>
        <?= Html::a('Create Visit Log', ['create'], ['class' => 'btn btn-success']) ?>
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
            'id',
            'client_id',
            'sale_id',
            'date_visit',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
