<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donhangchitiet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donhangchitiet-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'idsodh')->textInput() ?>

    <?= $form->field($model, 'idsanpham')->textInput() ?>

    <?= $form->field($model, 'soluong')->textInput() ?>

    <?= $form->field($model, 'idsolsx')->textInput() ?>

    <?= $form->field($model, 'tiendo')->textInput() ?>

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
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
