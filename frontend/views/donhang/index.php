<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DonhangSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Donhangs';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhang-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Tạo đơn hàng mới', ['createall'], ['class' => 'btn btn-success']) ?>
    </p>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'iddvdh',
            'sodh',
            'ngay',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
