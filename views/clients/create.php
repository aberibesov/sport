<?php

/* @var $this yii\web\View */
/* @var $model app\models\clients */

$this->title = 'Создание клиента';
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
