<?php

use yii\helpers\Html;
use yii\helpers\ArrayHelper;
use yii\widgets\ActiveForm;
use kartik\select2\Select2;
use frontend\models\Banggia;
use yii\web\JsExpression;
use kartik\date\DatePicker;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donhang */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donhang-form">
    <?php 
        $banggia = new Banggia();
        $banggia = $banggia->find()->all();
        $banggia = ArrayHelper::map($banggia,'id','tensanpham');
		$url = \yii\helpers\Url::to(['list']);
     ?>

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idsodh')->hiddenInput(['value'=> $iddvdh])->label('');?>

    <?php 
        echo $form->field($model, 'idsanpham')->widget(Select2::classname(), [
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
    
    <?= $form->field($model, 'soluong')->textInput() ?>

    <?= $form->field($model, 'tiendo')->textInput()->widget(DatePicker::classname(),[
        'options' => ['placeholder' => 'Nhập ngày'],
        'pluginOptions' => [
            'autoclose' => true,
        ]
    ]) ?>

    <?= $form->field($model, 'tiendothucte')->textInput() ?>

    <?= $form->field($model, 'giamua')->textInput() ?>

    <?= $form->field($model, 'giaban')->textInput() ?>

    <?= $form->field($model, 'soluongxuat')->textInput() ?>

    <?= $form->field($model, 'trangthai')->textInput() ?>

    <?= $form->field($model, 'nguoitao')->textInput() ?>

    <?= $form->field($model, 'ngaytao')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'nguoisua')->textInput() ?>

    <?= $form->field($model, 'ngaysua')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'iduser')->textInput() ?>

    <div class="form-group">
        <?= Html::Button('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
