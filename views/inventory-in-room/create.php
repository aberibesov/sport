<?php

/* @var $this yii\web\View */
/* @var $model app\models\InventoryInRoom */

$this->title = 'Добавить инвентарь в зал';
$this->params['breadcrumbs'][] = ['label' => 'Инвентарь в залах', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="inventory-in-room-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
