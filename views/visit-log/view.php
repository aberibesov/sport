<?php

use yii\helpers\Html;
use yii\web\YiiAsset;
use app\models\Clients;
use yii\widgets\DetailView;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\VisitLog */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Посещения', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
YiiAsset::register($this);

$clients = Clients::getList();
?>
<div class="visit-log-view">

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
            [
                'attribute' => 'client_id',
                'filter' => $clients,
                'value' => static function ($model) use ($clients) {
                    return ArrayHelper::getValue($clients, $model->client_id);
                }
            ],
            'sale_id',
            'date_visit',
        ],
    ]) ?>

</div>
