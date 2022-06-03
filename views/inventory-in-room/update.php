<?php

/* @var $this yii\web\View */
/* @var $model app\models\InventoryInRoom */

$this->title = 'Изменить инвентарь в зале: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Инвентарь в залах', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="inventory-in-room-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
