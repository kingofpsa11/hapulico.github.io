<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Donhangchitiet */

$this->title = 'Create Donhangchitiet';
$this->params['breadcrumbs'][] = ['label' => 'Donhangchitiets', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhangchitiet-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'models' => $models,
    ]) ?>

</div>
