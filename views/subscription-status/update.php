<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubscriptionStatus */

$this->title = 'Update Subscription Status: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subscription Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subscription-status-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
