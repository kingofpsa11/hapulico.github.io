<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model frontend\models\BanggiaSearch */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="banggia-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'masanpham') ?>

    <?= $form->field($model, 'tensanpham') ?>

    <?= $form->field($model, 'dvt') ?>

    <?= $form->field($model, 'ngayapdung') ?>

    <?php // echo $form->field($model, 'giamua') ?>

    <?php // echo $form->field($model, 'giabhpl') ?>

    <?php // echo $form->field($model, 'gianhpl') ?>

    <?php // echo $form->field($model, 'giavtcn') ?>

    <?php // echo $form->field($model, 'giacndn') ?>

    <?php // echo $form->field($model, 'giaxnvh') ?>

    <?php // echo $form->field($model, 'giakhkd') ?>

    <?php // echo $form->field($model, 'giactxl') ?>

    <?php // echo $form->field($model, 'dvsx') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-default']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
