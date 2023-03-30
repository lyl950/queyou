<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderGoodsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'orderId') ?>

    <?= $form->field($model, 'goodsId') ?>

    <?= $form->field($model, 'is_over') ?>

    <?= $form->field($model, 'surplusprice') ?>

    <?php // echo $form->field($model, 'drawprice') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'drawnum') ?>

    <?php // echo $form->field($model, 'surplusnum') ?>

    <?php // echo $form->field($model, 'goodstotal') ?>

    <?php // echo $form->field($model, 'money') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
