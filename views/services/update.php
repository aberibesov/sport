<?php

/* @var $this yii\web\View */
/* @var $model app\models\Services */

$this->title = 'Изменить занятие: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Занятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="services-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
