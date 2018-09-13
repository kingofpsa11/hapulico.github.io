<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model \common\models\LoginForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;

$this->title = 'Đăng nhập';
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-login">
    <h1><?= Html::encode($this->title) ?></h1>

    <p>Điền đầy đủ những mục dưới đây để đăng nhập:</p>

    <div class="row">
        <div class="col-lg-6 col-md-6 col-sm-6 col-sm-offset-3">
            <?php $form = ActiveForm::begin(['id' => 'login-form']); ?>

                <?= $form->field($model, 'username')->textInput(['autofocus' => true])->label('Tên đăng nhập') ?>
                
                <?= $form->field($model, 'password')->passwordInput()->label('Mật khẩu') ?>
                <?= $form->field($model, 'donvi')->dropDownList($donvi)->label('Đơn vị') ?>
                <?= $form->field($model, 'rememberMe')->checkbox() ?>

                <div style="color:#999;margin:1em 0">
                    Nếu bạn quên mật khẩu, bạn có thể <?= Html::a('khôi phục mật khẩu', ['site/request-password-reset']) ?>.
                </div>

                <div class="form-group">
                    <?= Html::submitButton('Login', ['class' => 'btn btn-primary', 'name' => 'login-button']) ?>
                </div>

            <?php ActiveForm::end(); ?>
        </div>
    </div>
</div>
