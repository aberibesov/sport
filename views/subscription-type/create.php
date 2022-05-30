<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\SubscriptionType */

$this->title = 'Create Subscription Type';
$this->params['breadcrumbs'][] = ['label' => 'Subscription Types', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscription-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
