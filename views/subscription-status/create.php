<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubscriptionStatus */

$this->title = 'Create Subscription Status';
$this->params['breadcrumbs'][] = ['label' => 'Subscription Statuses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscription-status-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
