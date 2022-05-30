<?php

use yii\helpers\Url;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\InventoryInRoom */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Inventory In Rooms';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-in-room-index">
    <p>
        <?= Html::a('Create Inventory In Room', ['create'], ['class' => 'btn btn-success']) ?>
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
            'room_id',
            'nomenclature_id',
            'count',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
