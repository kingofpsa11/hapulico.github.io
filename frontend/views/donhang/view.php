<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dulieuduan */

$this->title = 'Đơn hàng';
$this->params['breadcrumbs'][] = ['label' => 'Danh mục đơn hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhang-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Sửa', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Xóa', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Chắc chắn xóa đơn hàng này?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'khachhang_id',
                'value' => $model->congtycon->tenviettat,
            ],
            'ngay',
            'solsx',
            [
                'attribute' => 'status',
                'value' => $model->status->name,
            ],
            // [
            //     'attribute' => 'created_at',
            //     'format' => ['date','php:d/m/Y']
            // ],
            'user_id_created',
            'created_at',
            'user_id_updated',
            'updated_at',
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
                'attribute' => 'product_id',
                'headerOptions' => [
                    'style' => 'width:50%'
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
            [
                'attribute' => 'tiendoyeucau',
                'headerOptions' => [
                    'style' => 'width:10%'
                ],
                'contentOptions' => [
                    'style' => 'text-align:center;'
                ]

            ],
            [
                'attribute' => 'tiendothucte',
                'headerOptions' => [
                    'style' => 'width:10%'
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
