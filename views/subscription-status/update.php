<?php

/* @var $this yii\web\View */
/* @var $model app\models\SubscriptionStatus */

$this->title = 'Изменить статус абонемента: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Статус абонемента', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="subscription-status-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
