<?php

use app\models\Rooms;
use yii\bootstrap\Html;
use kartik\form\ActiveForm;
use app\models\Nomenclature;

/* @var $this yii\web\View */
/* @var $model app\models\InventoryInRoom */
/* @var $form ActiveForm */

?>

<div class="inventory-in-room-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'room_id',[
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/rooms'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(Rooms::getList(), ['prompt' => 'Выберите зал']) ?>

    <?= $form->field($model, 'nomenclature_id',[
        'addon' => [
            'append' => [
                'content' => Html::a(Html::icon('plus'), ['/nomenclature'], ['class' => 'btn btn-success category-create']),
                'asButton' => true
            ]
        ]])->dropDownList(Nomenclature::getList(), ['prompt' => 'Выберите инвентарь']) ?>

    <?= $form->field($model, 'count')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Сохранить', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
