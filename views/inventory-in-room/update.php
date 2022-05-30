<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryInRoom */

$this->title = 'Update Inventory In Room: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Inventory In Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="inventory-in-room-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
