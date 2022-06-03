<?php

use yii\bootstrap\Html;
use app\models\Position;
use kartik\form\ActiveForm;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Users */
/* @var $form ActiveForm */
?>

<div class="users-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'password')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'date_of_birth')->widget(DatePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd']
    ]) ?>

    <?= $form->field($model, 'status')->dropDownList($model::STATUSES, ['prompt' => 'Выберите статус']) ?>

    <?= $form->field($model, 'position_id', [
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/position'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(Position::getList(), ['prompt' => 'Выберите должность']) ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
