<?php

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */

$this->title = 'Создать расписание';
$this->params['breadcrumbs'][] = ['label' => 'Расписание', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="schedule-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
