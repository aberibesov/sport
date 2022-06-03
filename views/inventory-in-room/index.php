<?php

use app\models\Rooms;
use yii\helpers\Html;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use app\models\Nomenclature;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\InventoryInRoom */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Инвентарь в залах';
$this->params['breadcrumbs'][] = $this->title;

$rooms = Rooms::getList();
$nomenclature = Nomenclature::getList();
?>
<div class="inventory-in-room-index">
    <p>
        <?= Html::a('Добавить инвентарь в зал', ['create'], ['class' => 'btn btn-success']) ?>
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
                'attribute' => 'room_id',
                'filter' => $rooms,
                'value' => static function ($model) use ($rooms) {
                    return ArrayHelper::getValue($rooms, $model->room_id);
                }
            ],
            [
                'attribute' => 'nomenclature_id',
                'filter' => $nomenclature,
                'value' => static function ($model) use ($nomenclature) {
                    return ArrayHelper::getValue($nomenclature, $model->nomenclature_id);
                }
            ],
            'count',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
