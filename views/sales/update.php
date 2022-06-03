<?php

/* @var $this yii\web\View */
/* @var $model app\models\Sales */

$this->title = 'Изменить продажу: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="sales-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
