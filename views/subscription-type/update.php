<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubscriptionType */

$this->title = 'Update Subscription Type: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Subscription Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="subscription-type-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
