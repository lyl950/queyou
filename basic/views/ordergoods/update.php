<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderGoods $model */

$this->title = 'Update Order Goods: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="order-goods-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
