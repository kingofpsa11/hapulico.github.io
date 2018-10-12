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
<div class="dulieuduan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iddv')->hiddenInput(['value'=>Yii::$app->user->identity->donvi])->label(false)?>

    <?= $form->field($model, 'customer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provincial_id')->dropDownList(
            $provincial,
            [
                'prompt' => '--Lựa chọn tỉnh/thành--'
            ]
    ) ?>

    <?= $form->field($model, 'project')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status_id')->dropDownList(
        $status,
        [
            'prompt' => '--Chọn trạng thái thương thảo--'
        ]  
    ) ?>
   
    <div id="w2" class="grid-view table-responsive form-group">
        <div class="summary">
            Tổng giá trị đơn hàng là: <span id="giatridonhang"></span>
        </div>
    <table class="table table-striped table-hover ">
        <thead>
            <tr>
                <th width="5%">STT</th>
                <th width="55%" style="text-align:center;">Tên sản phẩm</th>
                <th width="10%" style="text-align:center">Số lượng</th>
                <th width="20%" style="text-align:center">Đơn giá</th>
                <th width="5%" class="action-column">Action</th>
            </tr>
        </thead>
        <tbody>
            <?php 
                foreach ($modelDetails as $index => $modelDetail) {
            ?>
            <tr id="row_<?php echo $index; ?>" data-key="0">
                <td data-col-seq="0"><?php echo ($index+1); ?></td>
                <td data-col-seq="1">
                    <?php echo $form->field($modelDetail,"[$index]product")->textInput()->label(false); ?>
                </td>
                <td data-col-seq="2">
                    <?php echo $form->field($modelDetail,"[$index]quantity")->textInput()->label(false)->widget(MaskedInput::className(),[
                        'clientOptions' => [
                            'alias' => 'numeric',
                            'removeMaskOnSubmit' => true,
                            'groupSeparator' => '.',
                            'autoGroup' => true,
                            'autoUnmask' => true,
                            'unmaskAsNumber' => true,
                        ],
                    ]); ?>
                </td>
                <td data-col-seq="3">
                    <?php echo $form->field($modelDetail,"[$index]price")->textInput()->label(false)->widget(MaskedInput::className(),[
                        'clientOptions' => [
                            'alias' => 'integer',
                            'removeMaskOnSubmit' => true,
                            'groupSeparator' => '.',
                            'autoGroup' => true,
                            'autoUnmask' => true,
                            'unmaskAsNumber' => true,
                        ],
                    ]); ?>
                </td>
                <td data-col-seq="4">
                    <button type="button" class="btn btn-danger remove-product" id="<?php echo $index;?>">Xóa <span class="glyphicon glyphicon-trash"></span></button>
                </td>
            </tr>

            <?php } ?>
        </tbody>
    </table>
    </div>
    
    <div class="form-group">
        <?php echo Html::button('Thêm dòng',['class'=>'btn btn-success themmoi','id'=>'themmoi']).' '.Html::submitButton('Lưu', ['class' => 'btn btn-danger']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
