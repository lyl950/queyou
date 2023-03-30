<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\OrderGoods $model */

$this->title = 'Create Order Goods';
$this->params['breadcrumbs'][] = ['label' => 'Order Goods', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-goods-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
