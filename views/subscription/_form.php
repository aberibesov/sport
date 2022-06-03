<?php

use yii\bootstrap\Html;
use kartik\form\ActiveForm;
use app\models\SubscriptionType;

/* @var $this yii\web\View */
/* @var $model app\models\Subscription */
/* @var $form ActiveForm */
?>

<div class="subscription-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'type_id',[
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/subscription-type'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(SubscriptionType::getList(), ['prompt' => 'Выберите тип абонемента']) ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <?= $form->field($model, 'mount_amount')->textInput() ?>

    <?= $form->field($model, 'day_amount')->textInput() ?>

    <?= $form->field($model, 'number_of_visits')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
