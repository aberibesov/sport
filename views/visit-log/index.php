<?php

use yii\bootstrap\Html;
use app\models\Clients;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\VisitLog */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Посещения';
$this->params['breadcrumbs'][] = $this->title;

$clients = Clients::getList();
?>
<div class="visit-log-index">

    <p>
        <?= Html::a('Создать посещение', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'client_id',
                'filter' => $clients,
                'value' => static function ($model) use ($clients) {
                    return ArrayHelper::getValue($clients, $model->client_id);
                }
            ],
            [
                'attribute' => 'sale_id',
                'format' => 'raw',
                'value' => static function ($model) {
                    return Html::a($model->sale_id, ['sales/view', 'id' => $model->sale_id]);
                }
            ],
            'date_visit:datetime',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
