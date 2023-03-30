<?php

use yii\helpers\ArrayHelper;
use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\FenpeiSearch $model */
/** @var app\models\Area $model1 */

/** @var yii\widgets\ActiveForm $form */
?>

<div class="fenpei-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'name') ?>

    <?= $form->field($model, 'userId') ?>
    <?= $form->field($model1, 'id')->listbox(
        ArrayHelper::map(\app\models\Department::find()->all(),'id','name')
    ) ?>

<!--    --><?php //= $form->field($model, 'goodsId') ?>
<!---->
<!--    --><?php //= $form->field($model, 'nums') ?>
<!---->
<!--    --><?php //= $form->field($model, 'money') ?>

    <?php // echo $form->field($model, 'time') ?>

    <?php // echo $form->field($model, 'class') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_over') ?>

    <?php // echo $form->field($model, 'is_area') ?>

    <?php // echo $form->field($model, 'saleType') ?>

    <?php // echo $form->field($model, 'orderId') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
