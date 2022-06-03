<?php

use app\models\Rooms;
use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;
use app\models\Nomenclature;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryInRoom */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Инвентарь в залах', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

$rooms = Rooms::getList();
$nomenclature = Nomenclature::getList();
?>
<div class="inventory-in-room-view">

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
        ],
    ]) ?>

</div>
