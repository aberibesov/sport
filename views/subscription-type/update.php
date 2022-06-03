<?php

/* @var $this yii\web\View */
/* @var $model app\models\SubscriptionType */

$this->title = 'Изменить тип абонемента: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Тип абонемента', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="subscription-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
