<?php

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */

$this->title = 'Изменить расписание: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Расписание', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="schedule-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
