<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Dulieuduan */

$this->title = 'Dự án mới';
$this->params['breadcrumbs'][] = ['label' => 'Dự án mới', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dulieuduan-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
        'provincial' => $provincial,
    ]) ?>

</div>
