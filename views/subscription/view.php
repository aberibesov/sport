<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;
use app\models\SubscriptionType;

/* @var $this yii\web\View */
/* @var $model app\models\Subscription */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Абонементы', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);
?>
<div class="subscription-view">

    <p>
        <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены что хотите удалить?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'name',
            [
                'attribute' => 'type_id',
                'value' => static function ($model) {
                    return ArrayHelper::getValue(SubscriptionType::getList(), $model->type_id);
                }
            ],
            'price',
            'mount_amount',
            'day_amount',
            'number_of_visits',
        ],
    ]) ?>

</div>
