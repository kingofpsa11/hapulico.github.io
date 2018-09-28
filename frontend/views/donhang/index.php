<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DonhangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Donhangs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo đơn hàng mới', ['createall'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php
        $data = [
                    [
                        'id' => '1',
                        'iddvdh'=>'123456',
                        'sodh' => 'BHPL.18.105',
                        'ngay' => '2018-12-30',
                    ],
                    [
                        'id' => '1',
                        'iddvdh'=>'123456',
                        'sodh' => 'BHPL.18.105',
                        'ngay' => '2018-12-30',
                    ],
                ];

        $dataProvider =  new \yii\data\ArrayDataProvider([
            'allModels' => $data,
        ]);
            
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddvdh',
            'sodh',
            'ngay',

            [
                'class' => 'yii\grid\ActionColumn',
                'template' => '{view}{delete}{link}',
                'buttons' => [
                    'view' => function ($url,$model){
                        return Html::a('<span class="glyphicon glyphicon-user"></span>','javascript:void()');
                    },
                ]
            ],
        ],
    ]); ?>
</div>
