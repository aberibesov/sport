<?php

/* @var $this yii\web\View */
/* @var $model app\models\SubscriptionStatus */

$this->title = 'Создать статус абонемента';
$this->params['breadcrumbs'][] = ['label' => 'Статус абонемента', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscription-status-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
