<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Banggia */

$this->title = 'Create Banggia';
$this->params['breadcrumbs'][] = ['label' => 'Banggias', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="banggia-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
