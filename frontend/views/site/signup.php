<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \frontend\models\SignupForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng ký thành viên mới';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-signup">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Điền đầy đủ những mục dưới đây:</p>

    <div class="row">
        <div class="col-lg-5">
            <?php $form = ActiveForm::begin(['id' => 'form-signup']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Tên người dùng') ?>

                <?= $form->field($model, 'email') ?>

                <?= $form->field($model, 'password')->passwordInput()->label('Mật khẩu') ?>

                <?= $form->field($model, 'donvi')->dropDownList(
                    $donvi,
                    [
                        'prompt' => 'Chọn đơn vị'
                    ]
                )->label('Đơn vị'); ?>

                <div class="form-group">
                    <?= Html::submitButton('Tạo người dùng mới', ['class' => 'btn btn-primary', 'name' => 'signup-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>

