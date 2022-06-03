<?php

/* @var $this yii\web\View */
/* @var $model app\models\VisitLog */

$this->title = 'Создать посещение';
$this->params['breadcrumbs'][] = ['label' => 'Посещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-log-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
