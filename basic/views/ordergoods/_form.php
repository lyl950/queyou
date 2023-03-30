<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\OrderGoods $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="order-goods-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'orderId')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'goodsId')->textInput() ?>

    <?= $form->field($model, 'is_over')->textInput() ?>

    <?= $form->field($model, 'surplusprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drawprice')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'price')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'drawnum')->textInput() ?>

    <?= $form->field($model, 'surplusnum')->textInput() ?>

    <?= $form->field($model, 'goodstotal')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'money')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
