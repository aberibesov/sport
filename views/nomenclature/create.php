<?php

/* @var $this yii\web\View */
/* @var $model app\models\Nomenclature */

$this->title = 'Создать инвентарь';
$this->params['breadcrumbs'][] = ['label' => 'Инвентарь', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="nomenclature-create">

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
