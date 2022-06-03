<?php

/* @var $this yii\web\View */
/* @var $model app\models\Services */

$this->title = 'Создать занятие';
$this->params['breadcrumbs'][] = ['label' => 'Занятия', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="services-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
