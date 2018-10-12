<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\ThongtinduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Thongtinduans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="thongtinduan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Thongtinduan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'idduan',
            'product',
            'quantity',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
