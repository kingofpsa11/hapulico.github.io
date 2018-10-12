<?php
// use Yii;
use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model frontend\models\Dulieuduan */

$this->title = 'Thông tin dự án';
$this->params['breadcrumbs'][] = ['label' => 'Danh mục dự án', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="dulieuduan-create">

    <h1><?= Html::encode($this->title) ?></h1>
    <?= $this->render('_form', [
        'model' => $model,
        'provincial' => $provincial,
        'modelDetails' => $modelDetails,
        'status' => $status,
    ]) ?>

</div>
