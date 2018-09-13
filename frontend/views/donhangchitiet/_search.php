<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\DonhangchitietSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="donhangchitiet-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'idsodh') ?>

    <?= $form->field($model, 'idsanpham') ?>

    <?= $form->field($model, 'soluong') ?>

    <?= $form->field($model, 'idsolsx') ?>

    <?php // echo $form->field($model, 'tiendo') ?>

    <?php // echo $form->field($model, 'tiendothucte') ?>

    <?php // echo $form->field($model, 'giamua') ?>

    <?php // echo $form->field($model, 'giaban') ?>

    <?php // echo $form->field($model, 'soluongxuat') ?>

    <?php // echo $form->field($model, 'trangthai') ?>

    <?php // echo $form->field($model, 'nguoitao') ?>

    <?php // echo $form->field($model, 'ngaytao') ?>

    <?php // echo $form->field($model, 'nguoisua') ?>

    <?php // echo $form->field($model, 'ngaysua') ?>

    <?php // echo $form->field($model, 'iduser') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
