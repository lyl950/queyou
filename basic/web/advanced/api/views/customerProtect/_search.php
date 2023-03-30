<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var api\models\CustomerProtectSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-protect-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'customer_id') ?>

    <?= $form->field($model, 'protect_id') ?>

    <?= $form->field($model, 'level') ?>

    <?= $form->field($model, 'process') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'contact') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'remark') ?>

    <?php // echo $form->field($model, 'brief') ?>

    <?php // echo $form->field($model, 'region_id') ?>

    <?php // echo $form->field($model, 'branch_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'username') ?>

    <?php // echo $form->field($model, 'user2_id') ?>

    <?php // echo $form->field($model, 'is_over') ?>

    <?php // echo $form->field($model, 'over_at') ?>

    <?php // echo $form->field($model, 'over_status') ?>

    <?php // echo $form->field($model, 'over_remark') ?>

    <?php // echo $form->field($model, 'is_confirm') ?>

    <?php // echo $form->field($model, 'visit_at') ?>

    <?php // echo $form->field($model, 'expire_at') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
