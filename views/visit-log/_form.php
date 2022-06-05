<?php

use yii\bootstrap\Html;
use app\models\Clients;
use kartik\form\ActiveForm;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\VisitLog */
/* @var $form ActiveForm */
?>

<div class="visit-log-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'sale_id', [
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/sales'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->textInput() ?>

    <?= $form->field($model, 'date_visit')->widget(DateTimePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd hh:ii:ss',
            'todayBtn' => true
        ]
    ]) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
