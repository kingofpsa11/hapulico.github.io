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

    <h1><?= Html::encode($this->title) ?></h1>

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
	        			'onchange'=>'
                			$.post("lists?id="+$(this).val(), function( data ) {
                			var value = data.split("+");
                			$( "#donhang-sodh" ).attr("value",value[0]);
                			$( "#donhang-ngay" ).attr("value",value[1]);

                			$("#modalButton").each(function(){
                				$(this).attr("value","/hapulico/donhang/create?iddvdh="+value[2]);
                			});
                		});'
	        		]
	        	);?>
	    	</div>
			<div class="col-lg-4">
				<?= $form->field($model,'sodh')->textInput();?>
			</div>

	    	<div class="col-lg-4">
	        <?= $form->field($model,'ngay')->widget(\yii\widgets\MaskedInput::classname(),['clientOptions' => ['alias' =>  'yyyy-mm-dd']]);?>
	        </div>
	    </div>
	    <?php
	        // echo Form::widget([
	        //     'model' => $model,
	        //     'form'=>$form,
	        //     'columns'=>3,
	        //     'attributes'=>[
	        //         'sodh' => [
	        //         	'type'=>Form::INPUT_RAW,
	        //         	'value'=>function($model,$index,$widget){
	        //         		return $model->find()->select('sodh')->orderBy('sodh')->one()->sodh;
	        //         	}
	        //     	],
	        //         'iddvdh' => [
	        //         	'type'=>Form::INPUT_DROPDOWN_LIST,
         //                'items'=> ArrayHelper::map($customer,'id','tenkhach'),
         //            ],
	        //         'ngay' =>   [
         //                'type'=>Form::INPUT_WIDGET,
         //                'widgetClass'=>'\kartik\date\DatePicker',
         //            ],
	        //     ],
	        // ]);
	     ?>
	    <?php
	    	$data = [
	    		['id'=>1,'tensanpham'=>'Đèn Halumos 150W'],
				['id'=>2,'tensanpham'=>'Đèn Halumos 250W'],
	    	];

	    	echo json_encode($data[0]);
	    	// die;
	    	$dataProvider =  new \yii\data\ArrayDataProvider([
	    		'allModels' => $data,
			]);

	    	echo TabularForm::widget([
	    		'dataProvider' => $dataProvider,
	    		'formName' => 'donhangForm',
	    		'attributes' => [
	    			'tensanpham' => [
	    				'label' => 'Tên sản phẩm',
	    				'type' => TabularForm::INPUT_STATIC,
	    				'columnOptions' => ['width'=>'300px'],
	    			],
	    			'soluong' => [
	    				'label' => 'Số lượng',
	    				'type' => TabularForm::INPUT_STATIC,
	    				'columnOptions' => ['width'=>'80px'],
	    			],
	    			'gia' =>[
	    				'label' => 'Đơn giá',
	    				'type' => TabularForm::INPUT_STATIC,
	    			],
	    			'tiendo'=>[
	    				'label' => 'Tiến độ yêu cầu',
	    				'type' => TabularForm::INPUT_STATIC,
	    			],
	    		],
	    		'gridSettings' => [
	    			'panel' => [
	    				'heading' => '<h3 class="panel-title"><i class="glyphicon glyphicon-book"></i> Nội dung đơn hàng </h3>',
	    				// 'type'
	    				'before' => false,
	    				'footer' => false,
	    				'after' => Html::button('<i class="glyphicon glyphicon-plus"></i> Thêm mới',['type'=>'button','class'=>'btn btn-success','			id' => 'modalButton']).' '.
	    							Html::button('<i class="glyphicon glyphicon-remove"></i> Xóa',['type'=>'button','class'=>'btn btn-danger']).' '.
	    							Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Lưu',['type'=>'button','class'=>'btn btn-primary']),
	    			],
	    		],
	    	])
	     ?>
		<!-- <div class="form-group">
	        <?= Html::submitButton('Tạo đơn hàng', ['class' => 'btn btn-success']) ?>
	    </div> -->
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
	        'options' => ['placeholder' => 'Nhập ngày'],
	        'pluginOptions' => [
	            'autoclose' => true,
	        ],
	    ]) ?>

	    <?= $form->field($modelDetail, 'tiendothucte')->textInput() ?>

	    <?= $form->field($modelDetail, 'giaban')->hiddenInput()->label('') ?>
		
	    <?php
	    	echo Html::button('Thêm mới',['class'=>'btn btn-success','id'=>'save']);
	        Modal::end();
	     ?>
		
	</div>
</div>
<!-- <script type="text/javascript">
	var users = <?php echo json_encode($data);?>;
	console.log(users[0]['id']);
	console.log (users.length);
</script> -->
