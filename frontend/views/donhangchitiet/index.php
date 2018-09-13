<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DonhangchitietSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Donhangchitiets';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhangchitiet-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Donhangchitiet', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header'=>'STT',
            ],

            'id',
            'idsodh',
            'idsanpham',
            'soluong',
            'idsolsx',
            //'tiendo',
            //'tiendothucte',
            //'giamua',
            //'giaban',
            //'soluongxuat',
            //'trangthai',
            //'nguoitao',
            //'ngaytao',
            //'nguoisua',
            //'ngaysua',
            //'iduser',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
