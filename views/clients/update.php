<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\clients */

$this->title = 'Изменить клиента: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Клиенты', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Изменить';
?>
<div class="clients-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
