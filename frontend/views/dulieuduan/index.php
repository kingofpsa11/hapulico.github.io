<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DulieuduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Đăng ký dự án';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dulieuduan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Dự án mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'iddv',
            'customer',
            'phone',
            'email:email',
            'provincial',
            'project',
            'product',
            'quatity',
            'price',
            'status',
            // 'nguoitao',
            // 'created_at',
            // 'updated_at',
            // 'nguoisua',

            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-bordered',
            'headerOptions' => [
                'style' => 'text-align:center',
            ]
        ],
    ]); ?>
</div>
