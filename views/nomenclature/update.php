<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Nomenclature */

$this->title = 'Update Nomenclature: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Nomenclatures', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="nomenclature-update">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
