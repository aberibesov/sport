<?php

/* @var $this yii\web\View */
/* @var $model app\models\SubscriptionType */

$this->title = 'Создать тип абонемента';
$this->params['breadcrumbs'][] = ['label' => 'Тип абонемента', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscription-type-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
