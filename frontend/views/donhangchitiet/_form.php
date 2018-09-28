<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donhangchitiet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donhangchitiet-form">

    <?php $form = ActiveForm::begin(); ?>

<<<<<<< HEAD
        foreach ($models as $index => $model) {
     ?>

     <div class="row">
<<<<<<< HEAD
        <div class="col-md-4">
            <?php
            echo $form->field($model, "[$index]idsodh")->textInput(['placeholder'=>'Nhập'])->label("");
             ?>
        </div>
        <div class="col-md-4">
            <?php
            echo $form->field($model, "[$index]idsanpham")->textInput()->label("");
             ?>
        </div>
        <div class="col-md-4">
            <?php 
            echo $form->field($model, "[$index]soluong")->textInput()->label("");
             ?>
        </div>
=======
    <?= $form->field($model, "[$index]idsodh")->textInput() ?>
=======
    <?= $form->field($model, 'idsodh')->textInput() ?>
>>>>>>> parent of 363bd63... 25/09/2018

    <?= $form->field($model, 'idsanpham')->textInput() ?>

<<<<<<< HEAD
    <?= $form->field($model, "[$index]soluong")->textInput() ?>
>>>>>>> parent of edb09c1... 26/09/2018
    </div>
    <?php } ?>
 
=======
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
>>>>>>> parent of 363bd63... 25/09/2018

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
