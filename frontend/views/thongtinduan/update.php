<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model frontend\models\Thongtinduan */

$this->title = 'Update Thongtinduan: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Thongtinduans', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="thongtinduan-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
