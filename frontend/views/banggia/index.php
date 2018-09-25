<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\BanggiaSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Banggias';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banggia-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Banggia', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'masanpham',
            'tensanpham',
            'dvt',
            'ngayapdung',
            //'giamua',
            //'giabhpl',
            //'gianhpl',
            //'giavtcn',
            //'giacndn',
            //'giaxnvh',
            //'giakhkd',
            //'giactxl',
            //'dvsx',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
