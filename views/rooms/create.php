<?php

/* @var $this yii\web\View */
/* @var $model app\models\Rooms */

$this->title = 'Создать зал';
$this->params['breadcrumbs'][] = ['label' => 'Залы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="rooms-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
