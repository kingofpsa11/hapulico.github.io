<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dulieuduan */

$this->title = 'Đăng ký dự án';
$this->params['breadcrumbs'][] = ['label' => 'Danh mục dự án', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dulieuduan-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            // 'id',
            // 'iddv',
            'customer',
            'phone',
            'email:email',
            [
                'attribute' => 'provincial_id',
                'value' => $model->provincial->name,
            ],
            'project',
            // 'product',
            // 'quatity',
            // 'price',
            [
                'attribute' => 'status_id',
                'value' => $model->status->status,
            ],
            // 'nguoitao',
             [
                'attribute' => 'created_at',
                'format' => ['date','php:d/m/Y']
             ]
            // 'updated_at',
            // 'nguoisua',
        ],
    ]) ?>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'headerOptions' => [
                    'style' => 'width:5%'
                ],
            ],
            [
                'attribute' => 'product',
                'headerOptions' => [
                    'style' => 'width:65%'
                ],
            ],
            [
                'attribute' => 'quantity',
                'headerOptions' => [
                    'style' => 'width:10%'
                ],
                'contentOptions' => [
                    'class' => 'table_class',
                    'style' => 'text-align:center;'
                ]

            ],
            [
                'attribute' => 'price',
                'headerOptions' => [
                    'style' => 'width:20%'
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;'
                ]

            ],
            // ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-responsive table-hover',
            'headerOptions' => [
                'style' => 'text-align:center',
            ],
            'contentOptions' => [
                'style' => 'text-align:center',
            ],
        ],
    ]); ?>

</div>
