<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\Donhangchitiet */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donhangchitiet-form">

    <?php $form = ActiveForm::begin(); ?>
    <?php 

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

    <?= $form->field($model, "[$index]idsanpham")->textInput() ?>

    <?= $form->field($model, "[$index]soluong")->textInput() ?>
>>>>>>> parent of edb09c1... 26/09/2018
    </div>
    <?php } ?>
 

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
