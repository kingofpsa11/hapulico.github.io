<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dulieuduan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dulieuduan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provincial')->dropDownList(['1'=>'123'],['prompt'=> 'Chọn tỉnh thành']) ?>

    <?= $form->field($model, 'project')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'quatity')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <!-- <?= $form->field($model, 'status')->textInput() ?> -->



    <div class="form-group">
        <?= Html::submitButton('Lưu', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
