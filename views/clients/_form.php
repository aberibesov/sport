<?php

use yii\helpers\Html;
use kartik\date\DatePicker;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Clients */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="clients-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->widget(DatePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd']
    ]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'passport_series')->textInput() ?>

    <?= $form->field($model, 'passport_number')->textInput() ?>

    <?= $form->field($model, 'issued_by')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'issued_date')->widget(DatePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd']
    ])  ?>

    <?= $form->field($model, 'sex')->dropDownList($model::SEX, ['prompt' => 'Выберите пол']) ?>

    <?= $form->field($model, 'phone')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
