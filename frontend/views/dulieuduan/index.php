<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\widgets\Pjax;

/* @var $this yii\web\View */
/* @var $searchModel frontend\models\DulieuduanSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Danh mục dự án';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dulieuduan-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Đăng ký dự án mới', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    
    <?php 
    Pjax::begin();
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'iddv',
                'value' => 'congtycon.tenviettat',
                'visible' => (Yii::$app->user->identity->donvi == 1),
            ],
            'customer',
            'phone',
            'email:email',
            [
                'attribute' => 'provincial_id',
                'content' => function ($model){
                        if($model->provincial->khuvuc !== $model->congtycon->khuvuc){
                            return '<span class="label label-danger">'.$model->provincial->name.'</span>';
                        }else{
                            return $model->provincial->name;
                        }
                    }
            ],
            'project',
            [
                'attribute' => 'status_id',
                'value' => 'status.status',
            ],

            // 'nguoitao',
            [
                'attribute' => 'created_at',
                'format' => ['date','php:d/m/Y'],
            ],
            ['class' => 'yii\grid\ActionColumn'],
        ],
        'tableOptions' => [
            'class' => 'table table-striped table-bordered table-responsive',
            'headerOptions' => [
                'style' => 'text-align:center',
            ],
        ],
        'rowOptions' => function($model, $key, $index, $grid){
            if($model->provincial->khuvuc !== $model->congtycon->khuvuc){
                $class = 'danger';
                return array('key'=>$key,'index'=>$index,'class'=>$class);
            }
        }
    ]);
    Pjax::end();
     ?>
</div>
