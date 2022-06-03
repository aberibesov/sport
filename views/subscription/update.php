<?php

/* @var $this yii\web\View */
/* @var $model app\models\Subscription */

$this->title = 'Изменить абонемент: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Абонементы', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="subscription-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
