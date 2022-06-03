<?php

/* @var $this yii\web\View */
/* @var $model app\models\Rooms */

$this->title = 'Изменить зал: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Залы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="rooms-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
