<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DonhangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục đơn hàng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo đơn hàng mới', ['createall'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php 
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            [
                'attribute' => 'dvdh_id',
                'value' => 'congtycon.tenviettat',
                'contentOptions' => [
                    'style' => 'text-align:center',
                ],
            ],
            [
                'attribute' => 'sodh',
                'contentOptions' => [
                    'style' => 'text-align:center',
                ],
            ],
            [
                'attribute' => 'ngay',
                'contentOptions' => [
                    'style' => 'text-align:center',
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-responsive',
            'headerOptions' => [
                'style' => 'text-align:center',
            ],
        ],
    ]);
    Pjax::end();
     ?>
</div>
