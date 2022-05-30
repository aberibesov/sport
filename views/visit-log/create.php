<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\VisitLog */

$this->title = 'Create Visit Log';
$this->params['breadcrumbs'][] = ['label' => 'Visit Logs', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="visit-log-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
