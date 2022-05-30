<?php

use yii\helpers\Html;
use kartik\grid\GridView;
use yii\grid\ActionColumn;

/* @var $this yii\web\View */
/* @var $searchModel app\models\search\clients */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Clients';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="clients-index">

    <p>
        <?= Html::a('Create Clients', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'panel' => [
            'type' => GridView::TYPE_DEFAULT,
            'heading' => $this->title
        ],
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
            'sex',
            'phone',
            [
                'class' => ActionColumn::class
            ],
        ],
    ]); ?>


</div>
