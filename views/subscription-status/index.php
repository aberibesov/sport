<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\SubscriptionStatus */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Статус абонемента';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscription-status-index">

    <p>
        <?= Html::a('Создать статус абонемента', ['create'], ['class' => 'btn btn-success']) ?>
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
            'name',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
