<?php

use yii\helpers\Html;
use app\models\Clients;
use kartik\grid\GridView;
use yii\grid\ActionColumn;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\clients */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Клиенты';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-index">

    <p>
        <?= Html::a('Создать клиента', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => $this->title
        ],
        'pjax' => true,
        'panelPrefix' => 'box box-',
        'panelHeadingTemplate' => '{title}<div class="clearfix"></div>',
        'panelTemplate' => '{panelHeading}{items}',
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            'id',
            'name',
            'date_of_birth',
            'address',
            'passport_series',
            'passport_number',
            'issued_by',
            'issued_date',
            [
                'attribute' => 'sex',
                'filter' => $searchModel::SEX,
                'value' => static function ($model) {
                    return ArrayHelper::getValue(Clients::SEX, $model->sex);
                }
            ],
            'phone',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
