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

/* @var $this yii\web\View */
/* @var $model frontend\models\Donhang */

$this->title = 'Tạo đơn hàng mới';
$this->params['breadcrumbs'][] = ['label' => 'Đơn hàng', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhang-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <div class="donhang-form">

	    <?php
	        $form = ActiveForm::begin();
	        $customer = Khachhang::find()->where(['loaikhach'=>1])->all();
	        $customer = ArrayHelper::map($customer,'id','tenkhach');
	    ?>
	    <div class="row">
	    <?php
	        // echo Html::button('Add',['class'=>'btn btn-success pull-right','id' => 'modalButton','value'=> '/hapulico/donhang/create?iddvdh=']);
	    ?>
	    </div>
		<div class="row">
			<div class="col-lg-4">
	        	<?= $form->field($model,'iddvdh')->dropDownList(
	        		$customer,
	        		[
	        			'prompt' => 'Lựa chọn khách hàng',
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

	    	if (isset($_POST['idsanpham'])){
	    		echo $_POST['idsanpham'];
	    	}
	    	$dataProvider =  new \yii\data\ArrayDataProvider([
	    		'allModels' => $data,
			]);
			?>
			<div class="panel panel-primary">
				<div class="panel-heading">
					<h3 class="panel-title">Nội dung đơn hàng</h3>
				</div>
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
		        			'width' => '50px',
		        		],
		        	],
		            [
		        		'attribute' => 'gia',
		        		'label' => 'Đơn giá',
		        		'headerOptions' => [
		        			'style' => 'text-align:center',
		        			'width' => '100px',
		        		],
		        	],
		            [
		        		'attribute' => 'tiendo',
		        		'label' => 'Tiến độ',
		        		'headerOptions' => [
		        			'style' => 'text-align:center',
		        			'width' => '100px',
		        		],
		        		'contentOptions' => [
		        			'style' => 'text-align:center',
		        		],
		        	],
		            [
		                'class' => 'yii\grid\ActionColumn',
		                'template' => '{view}{delete}{link}',
		                'contentOptions' => [
		        			'style' => 'text-align:center',
		        		],
		                'buttons' => [
		                    'view' => function ($url,$model){
		                        return Html::a('<span class="glyphicon glyphicon-user"></span>','javascript:void()');
		                    },

		                ]
		            ],
		        ],
		    ]); 
	    	// echo TabularForm::widget([
	    	// 	'dataProvider' => $dataProvider,
	    	// 	'formName' => 'donhangForm',
	    	// 	'attributes' => [
	    	// 		'idsanpham' => [
	    	// 			'type' => TabularForm::INPUT_HIDDEN,
	    	// 			'columnOptions' => ['hidden'=>true]
	    	// 		],
	    	// 		'tensanpham' => [
	    	// 			'label' => 'Tên sản phẩm',
	    	// 			'type' => TabularForm::INPUT_STATIC,
	    	// 			'columnOptions' => ['width'=>'300px'],
	    	// 		],
	    	// 		'soluong' => [
	    	// 			'label' => 'Số lượng',
	    	// 			'type' => TabularForm::INPUT_STATIC,
	    	// 			'columnOptions' => ['width'=>'80px'],
	    	// 		],
	    	// 		'gia' =>[
	    	// 			'label' => 'Đơn giá',
	    	// 			'type' => TabularForm::INPUT_STATIC,
	    	// 		],
	    	// 		'tiendo'=>[
	    	// 			'label' => 'Tiến độ yêu cầu',
	    	// 			'type' => TabularForm::INPUT_STATIC,
	    	// 		],
	    	// 	],
	    	// 	'gridSettings' => [
	    	// 		'panel' => [
	    	// 			'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Nội dung đơn hàng </h3>',
	    	// 			// 'type'
	    	// 			'before' => false,
	    	// 			'footer' => false,
	    	// 			'after' => Html::button('<i class="glyphicon glyphicon-plus"></i> Thêm mới',['type'=>'button','class'=>'btn btn-success','id' => 'modalButton']).' '.
	    	// 						Html::button('<i class="glyphicon glyphicon-remove"></i> Xóa',['type'=>'button','class'=>'btn btn-danger']).' '.
	    	// 						Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Lưu',['type'=>'button','class'=>'btn btn-primary']),
	    	// 		],
	    	// 	],
	    	// ])
	     ?>
	     <?php 
	     	echo Html::button('<i class="glyphicon glyphicon-plus"></i> Thêm mới',['type'=>'button','class'=>'btn btn-success','id' => 'modalButton']).' '.Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Lưu',['type'=>'button','class'=>'btn btn-primary']);
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

	    <?php 
	        echo $form->field($modelDetail, 'idsanpham')->widget(Select2::classname(), [
	            'options' => ['placeholder' => 'Chọn sản phẩm'],
	            'pluginOptions' => [
					'minimumInputLength'=>3,
	                'allowClear' => true,
					'language' => [
						'errorLoading' => new JsExpression("function(){return 'Chờ kết quả';}"),
					],
					'ajax' => [
						'url' => $url,
						'dataType' => 'json',
						'data' => new JsExpression('function(params){return {q:params.term};}'),
					],
					'escapeMarkup' => new JsExpression('function (markup) { return markup; }'),
					'templateResult' => new JsExpression('function(idsanpham) { return idsanpham.text; }'),
					'templateSelection' => new JsExpression('function (idsanpham) { return idsanpham.text; }'),
				
	            ],
	        ]);
	     ?>
    
	    <?= $form->field($modelDetail, 'soluong')->textInput() ?>
		
	    <?= $form->field($modelDetail, 'tiendo')->textInput()->widget(DatePicker::classname(),[
	        'options' => ['placeholder' => 'Nhập tiến độ'],
	        'pluginOptions' => [
	            'autoclose' => true,
<<<<<<< HEAD
	            'format' => 'yyyy-mm-dd',
=======
	            'format' => 'dd-mm-yyyy',
	            'todayHighlight' => true,
>>>>>>> 363bd637cbb618b2210d54ca052b4ac00d9dced4
	        ],
	    ]) ?>
		<input type="hidden" name="row_id" id="hidden_row_id" />
	    <?php
	    	echo Html::button('Thêm mới',['class'=>'btn btn-success','id'=>'save-modal']);
	        Modal::end();
	     ?>
		
	</div>
</div>