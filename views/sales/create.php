<?php

/* @var $this yii\web\View */
/* @var $model app\models\Sales */

$this->title = 'Создать продажу';
$this->params['breadcrumbs'][] = ['label' => 'Продажи', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="sales-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
