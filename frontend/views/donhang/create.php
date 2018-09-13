<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Donhang */

// $this->title = 'Create Donhang';
// $this->params['breadcrumbs'][] = ['label' => 'Donhangs', 'url' => ['index']];
// $this->params['breadcrumbs'][] = $this->title;
?>
<div class="donhang-create">

    <!-- <h1><?= Html::encode($this->title) ?></h1> -->

    <?= $this->render('_form', [
        'model' => $model,
        'iddvdh'=> $iddvdh,
    ]) ?>

</div>
