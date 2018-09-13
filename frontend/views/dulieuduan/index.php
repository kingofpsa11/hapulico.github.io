<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DulieuduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Dulieuduans';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dulieuduan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Create Dulieuduan', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'STT',
            ],

            // 'id',
            // 'iddv',
            'customer',
            'phone',
            'email:email',
            'provincial',
            'project',
            'product',
            'quatity',
            'price',
            //'status',
            //'nguoitao',
            //'created_at',
            //'updated_at',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
