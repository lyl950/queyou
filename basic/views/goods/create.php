<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Goods $model */

$this->title = 'Create Goods';
$this->params['breadcrumbs'][] = ['label' => 'Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
