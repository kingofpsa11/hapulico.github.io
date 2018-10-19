<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
// use kartik\form\ActiveForm;
use kartik\builder\Form;
use kartik\builder\TabularForm;
use kartik\grid\GridView;
use yii\bootstrap\Modal;
use yii\helpers\Url;
use frontend\models\Khachhang;
use yii\helpers\ArrayHelper;
use frontend\models\Banggia;
use kartik\select2\Select2;
use yii\web\JsExpression;
use kartik\date\DatePicker;
use yii\web\View;


/* @var $this yii\web\View */
/* @var $model frontend\models\Donhang */

$this->title = 'Tạo đơn hàng mới';
$this->params['breadcrumbs'][] = ['label' => 'Đơn hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhang-create">

    <h1><?= Html::encode($this->title) ?></h1>
	 
	 <?= $this->render('_formall', [
        'model' => $model,
        'modelDetails' => $modelDetails,
        'customer'=>$customer,
    ]) ?>

    <?php 
        Modal::begin([
            'header'=>'<h4>Thêm mới sản phẩm</h4>',
            'id'=>'modal',
            'size'=>'modal-lg',
            'options' => [
            	'tabindex' => false,
            ],
        ]);

    ?>

    <?php 
        $banggia = new Banggia();
        $banggia = $banggia->find()->all();
        $banggia = ArrayHelper::map($banggia,'id','tensanpham');
		$url = \yii\helpers\Url::to(['list']);
    ?>

    <div class="form-group field-donhangchitiet-soluong">
	    <label class="control-label" for="donhangchitiet-soluong">Tên sản phẩm</label>

	    <?php 
		// render your widget
			echo Select2::widget([
			    'name' => 'kv-repo-template',
			    'options' => ['placeholder' => 'Nhập tên sản phẩm'],
			    'pluginOptions' => [
			        'allowClear' => true,
			        'minimumInputLength' => 3,
			        'ajax' => [
			            'url' => $url,
			            'dataType' => 'json',
			            'data' => new JsExpression('function(params) { return {q:params.term, page: params.page}; }'),
			            'cache' => true
			        ],
			        'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
			        'templateResult' => new JsExpression('function(idsanpham) { return idsanpham.text; }'),
					'templateSelection' => new JsExpression('function (idsanpham) { return idsanpham.text; }'),
			    ],
			]);
	    ?>
	</div>
	
	<div class="form-group field-donhangchitiet-soluong">
		<label class="control-label" for="donhangchitiet-soluong">Số lượng</label>
		<input type="text" id="donhangchitiet-soluong" name="donhangchitiet-soluong" class="form-control">
		<div class="help-block"></div>
    </div>

	<!-- Input dùng để lưu id của row -->
	<input type="hidden" name="row_id" id="hidden_row_id" />

    <?php 
    	echo DatePicker::widget([
    		'name'=>'datepicker',
    		'id'=>'donhangchitiet-tiendoyeucau',
    		'options' => ['placeholder' => 'Nhập ngày'],
	        'pluginOptions' => [
	            'autoclose' => true,
	            'todayHighlight'=>true,
	            'format'=>'yyyy-mm-dd',
	        ],
    	]);
    ?>
		
    <?php
    	echo Html::button('Thêm mới',['class'=>'btn btn-success','id'=>'save-modal']);
        Modal::end();
     ?>
		
	</div>
</div>