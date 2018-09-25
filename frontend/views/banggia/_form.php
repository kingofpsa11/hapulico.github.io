<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Banggia */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banggia-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'masanpham')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'tensanpham')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'dvt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'ngayapdung')->textInput() ?>

    <?= $form->field($model, 'giamua')->textInput() ?>

    <?= $form->field($model, 'giabhpl')->textInput() ?>

    <?= $form->field($model, 'gianhpl')->textInput() ?>

    <?= $form->field($model, 'giavtcn')->textInput() ?>

    <?= $form->field($model, 'giacndn')->textInput() ?>

    <?= $form->field($model, 'giaxnvh')->textInput() ?>

    <?= $form->field($model, 'giakhkd')->textInput() ?>

    <?= $form->field($model, 'giactxl')->textInput() ?>

    <?= $form->field($model, 'dvsx')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
