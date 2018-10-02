<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dulieuduan */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Dulieuduans', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dulieuduan-view">

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
            'nguoitao',
            'created_at',
            'updated_at',
            'nguoisua',
        ],
    ]) ?>

</div>
