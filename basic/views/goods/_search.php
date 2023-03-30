<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\GoodsSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="goods-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'money') ?>

    <?= $form->field($model, 'class') ?>

    <?= $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'surplusnum') ?>

    <?php // echo $form->field($model, 'total') ?>

    <?php // echo $form->field($model, 'drawnum') ?>

    <?php // echo $form->field($model, 'price') ?>

    <?php // echo $form->field($model, 'drawprice') ?>

    <?php // echo $form->field($model, 'surplusprice') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
