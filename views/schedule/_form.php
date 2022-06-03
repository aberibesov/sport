<?php

use app\models\Rooms;
use app\models\Users;
use kartik\date\DatePicker;
use yii\bootstrap\Html;
use app\models\Services;
use kartik\form\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\Schedule */
/* @var $form ActiveForm */
?>

<div class="schedule-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'date_begin')->widget(DatePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd']
    ]) ?>

    <?= $form->field($model, 'date_end')->widget(DatePicker::class, [
        'pluginOptions' => [
            'format' => 'yyyy-mm-dd']
    ]) ?>

    <?= $form->field($model, 'user_id', [
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/users'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(Users::getList(), ['prompt' => 'Выберите сотрудника']) ?>

    <?= $form->field($model, 'service_id', [
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/services'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(Services::getList(), ['prompt' => 'Выберите занятие']) ?>

    <?= $form->field($model, 'room_id', [
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/rooms'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(Rooms::getList(), ['prompt' => 'Выберите зал']) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
