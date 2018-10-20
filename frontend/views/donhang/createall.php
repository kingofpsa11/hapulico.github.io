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

<<<<<<< HEAD
    <div class="donhang-form">

	    <?php
	        $form = ActiveForm::begin();
	        $customer = Khachhang::find()->where(['loaikhach'=>1])->all();
	        $customer = ArrayHelper::map($customer,'id','tenkhach');
	    ?>

		<div class="row">
			<div class="col-lg-4">
	        	<?= $form->field($model,'dvdh_id')->dropDownList(
	        		$customer,
	        		[
	        			'prompt' => 'Lựa chọn khách hàng',
	        			'onchange'=>'
                			$.post("lists?id="+$(this).val(), function(data) {
                			$( "#donhang-sodh" ).val(data);
                		});'
	        		]
	        	);?>
	    	</div>

			<div class="col-lg-4">
				<?= $form->field($model,'sodh')->textInput();?>
			</div>

	    	<div class="col-lg-4">
	        <?php
	        $date = date('Y-m-d',time());
	        $model->ngay = $date;
	        echo $form->field($model,'ngay')->widget(\kartik\date\DatePicker::classname(),[
	        	'pluginOptions' => [
	        		'autoclose' => true,
	        		'format' => 'yyyy-mm-dd',
	        	]
	        ]);
	        ?>
	        </div>
	    </div>

	    <?php
	    	$data = [];
	    	$dataProvider =  new \yii\data\ArrayDataProvider([
	    		'allModels' => $data,
			]);
		?>

		<div class="panel panel-default">
			<div class="panel-body">
				<?php
			    	echo GridView::widget([
				        'dataProvider' => $dataProvider,
				        'filterModel' => false,
				        'columns' => [
				            [
				            	'class' => 'yii\grid\SerialColumn',
			        			'header' => 'STT',
			        			'headerOptions' => [
			        				'width' => '50px',
			        			],
				            ],
				            [
				            	'attribute' => 'idsanpham',
				            	'visible' => false,
				            ],
				            [
				            	'attribute' => 'tensanpham',
				            	'label' => 'Tên sản phẩm',
				            	'headerOptions' => [
				            		'style' => 'text-align:center;',
				            	],
				        	],
				        	[
				        		'attribute' => 'soluong',
				        		'label' => 'Số lượng',
				        		'headerOptions' => [
				        			'style' => 'text-align:center',
				        		],
				        	],
				            [
				        		'attribute' => 'gia',
				        		'label' => 'Đơn giá',
				        		'headerOptions' => [
				        			'style' => 'text-align:center',
				        		],
				        	],
				            [
				        		'attribute' => 'tiendo',
				        		'label' => 'Tiến độ',
				        		'headerOptions' => [
				        			'style' => 'text-align:center',
				        		],
				        	],
				            [
				                'class' => 'yii\grid\ActionColumn',
				            ],
				        ],
				    ]);
		    	?>

			    <?php 
			     	echo Html::button('<i class="glyphicon glyphicon-plus"></i> Thêm mới',['type'=>'button','class'=>'btn btn-success','id' => 'modalButton']).' '.Html::button('<i class="glyphicon glyphicon-remove"></i> Xoá',['type'=>'button','class'=>'btn btn-danger']).' '.Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Lưu',['type'=>'button','class'=>'btn btn-primary','id'=>'submitButton']);
			    ?>
	    	</div>
		</div>

		<?php ActiveForm::end(); ?>
	
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
		

			<!-- Select2 cho tên sản phẩm -->
		    <?php 
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
		
		<div class="form-group field-donhangchitiet-tiendo">
			<label class="control-label" for="donhangchitiet-tiendo">Tiến độ yêu cầu</label>
			
		    <?php
		    	echo DatePicker::widget([
		    		'name'=>'donhangchitiet-tiendo',
		    		'id'=>'donhangchitiet-tiendo',
		    		'options' => ['placeholder' => 'Nhập ngày'],
			        'pluginOptions' => [
			            'autoclose' => true,
			            'todayHighlight'=>true,
			            'format'=>'yyyy-mm-dd',
			        ],
		    	]);
		    ?>
			<div class="help-block"></div>

	    </div>

	    <?php
	    	echo Html::button('Thêm mới',['class'=>'btn btn-success','id'=>'save-modal']);
	        Modal::end();
	     ?>
=======
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
>>>>>>> ccca6a20fbde74a0a4eac428a67b3fce2bddb388
		
	</div>
</div>