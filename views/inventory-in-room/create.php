<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryInRoom */

$this->title = 'Create Inventory In Room';
$this->params['breadcrumbs'][] = ['label' => 'Inventory In Rooms', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-in-room-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
