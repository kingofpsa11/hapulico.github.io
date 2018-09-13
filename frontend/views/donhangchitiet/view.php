<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donhangchitiet */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Donhangchitiets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhangchitiet-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
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
            'id',
            'idsodh',
            'idsanpham',
            'soluong',
            'idsolsx',
            'tiendo',
            'tiendothucte',
            'giamua',
            'giaban',
            'soluongxuat',
            'trangthai',
            'nguoitao',
            'ngaytao',
            'nguoisua',
            'ngaysua',
            'iduser',
        ],
    ]) ?>

</div>
