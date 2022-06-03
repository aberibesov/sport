<?php

use yii\bootstrap\Html;
use app\models\Clients;
use kartik\form\ActiveForm;
use app\models\Subscription;
use app\models\SubscriptionStatus;
use kartik\datetime\DateTimePicker;

/* @var $this yii\web\View */
/* @var $model app\models\Sales */
/* @var $form ActiveForm */
?>

<div class="sales-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'client_id', [
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/clients'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(Clients::getList(), ['prompt' => 'Выберите клиента']) ?>

    <?= $form->field($model, 'subscription_id', [
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/subscription'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(Subscription::getList(), ['prompt' => 'Выберите абонемент']) ?>

    <?= $form->field($model, 'status_id', [
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/subscription-status'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(SubscriptionStatus::getList(), ['prompt' => 'Выберите статус']) ?>

    <?= $form->field($model, 'date')->widget(DateTimePicker::class, [
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
