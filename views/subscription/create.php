<?php

/* @var $this yii\web\View */
/* @var $model app\models\Subscription */

$this->title = 'Создать абонемент';
$this->params['breadcrumbs'][] = ['label' => 'Абонементы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="subscription-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
