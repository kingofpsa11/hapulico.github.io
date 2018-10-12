<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DulieuduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục người dùng';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dulieuduan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Đăng ký người dùng mới', ['signup'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php 
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'id',
            'username',
            'donvi',
            'email',
            ['class' => 'yii\grid\ActionColumn'],
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
