<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model frontend\models\Dulieuduan */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="dulieuduan-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'iddv')->hiddenInput(['value'=>Yii::$app->user->donvi])->label(false)?>

    <?= $form->field($model, 'customer')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'provincial')->dropDownList(
            $provincial,
            [
                'prompt' => 'Lựa chọn tỉnh/thành'
            ]
    ) ?>

    <?= $form->field($model, 'project')->textInput(['maxlength' => true]) ?>

    <?php
    $data = [];
    $dataProvider =  new \yii\data\ArrayDataProvider([
        'allModels' => $data,
    ]);
    echo GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => false,
        'columns' => [
            [
                'class' => 'yii\grid\SerialColumn',
                'header' => 'STT',
                'headerOptions' => [
                    'width' => '50px',
                ],
            ],
            [
                'attribute' => 'idsanpham',
                'visible' => false,
            ],
            [
                'attribute' => 'tensanpham',
                'label' => 'Tên sản phẩm',
                'headerOptions' => [
                    'style' => 'text-align:center;',
                ],
            ],
            [
                'attribute' => 'soluong',
                'label' => 'Số lượng',
                'headerOptions' => [
                    'style' => 'text-align:center',
                    'width' => '150px',
                ],
            ],
            [
                'attribute' => 'gia',
                'label' => 'Đơn giá',
                'headerOptions' => [
                    'style' => 'text-align:center',
                    'width' => '150px',
                ],
            ],
            [
                'class' => 'yii\grid\ActionColumn',
            ],
        ],
    ]);
    ?>
    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
