<?php

/* @var $this yii\web\View */
/* @var $model app\models\VisitLog */

$this->title = 'Изменить посещение: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Посещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="visit-log-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
