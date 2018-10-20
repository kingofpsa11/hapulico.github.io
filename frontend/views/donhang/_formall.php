<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;
use kartik\number\NumberControl;
use yii\widgets\MaskedInput;



/* @var $this yii\web\View */
/* @var $model frontend\models\Dulieuduan */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="donhang-form">

    <?php $form = ActiveForm::begin(); ?>
    

    <!-- Tạo 3 input để chứa: tên đơn vị đặt hàng, số đơn hàng, ngày đặt hàng -->
    <div class="row">
        <div class="col-lg-4">
            <?= $form->field($model,'khachhang_id')->dropDownList(
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

    <div id="w2" class="grid-view table-responsive form-group">
        <div class="summary">
            Tổng giá trị đơn hàng là: <span id="giatridonhang"></span>
        </div>
    <table class="table table-striped table-hover table-bordered">
        <thead>
            <tr>
                <th width="5%" data-col-seq="0">STT</th>
                <th width="50%" style="text-align:center;" data-col-seq="1">Tên sản phẩm</th>
                <th width="10%" style="text-align:center" data-col-seq="2">Số lượng</th>
                <th width="15%" style="text-align:center" data-col-seq="3">Đơn giá</th>
                <th width="10%" style="text-align:center" data-col-seq="4">Tiến độ yêu cầu</th>
                <th width="10%" style="text-align:center" data-col-seq="5">Tiến độ thực tế</th>
                <th width="5%" class="column-action">Action</th>
            </tr>
        </thead>

        <tbody>
        </tbody>
    </table>
    </div>
    
    <div class="form-group">
        <?php
            echo    Html::button('<i class="glyphicon glyphicon-plus"></i> Thêm mới',['class'=>'btn btn-success','id' => 'modalButton']).' '.
                    Html::submitButton('<i class="glyphicon glyphicon-floppy-disk"></i> Lưu',['class'=>'btn btn-primary','id'=>'submitButton']);
        ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
