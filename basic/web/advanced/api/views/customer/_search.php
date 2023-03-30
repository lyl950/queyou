<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var api\models\CustomerSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
    ]); ?>

    <?= $form->field($model, 'id') ?>

    <?= $form->field($model, 'title') ?>

    <?= $form->field($model, 'class') ?>

    <?= $form->field($model, 'is_expire') ?>

    <?= $form->field($model, 'is_share') ?>

    <?php // echo $form->field($model, 'branch_id') ?>

    <?php // echo $form->field($model, 'user_id') ?>

    <?php // echo $form->field($model, 'contact_user_id') ?>

    <?php // echo $form->field($model, 'contact_user2_id') ?>

    <?php // echo $form->field($model, 'sale_user_id') ?>

    <?php // echo $form->field($model, 'tracking_state') ?>

    <?php // echo $form->field($model, 'status') ?>

    <?php // echo $form->field($model, 'is_deleted') ?>

    <?php // echo $form->field($model, 'protect_id') ?>

    <?php // echo $form->field($model, 'expire_time') ?>

    <?php // echo $form->field($model, 'save_at') ?>

    <?php // echo $form->field($model, 'last_at') ?>

    <?php // echo $form->field($model, 'company') ?>

    <?php // echo $form->field($model, 'country') ?>

    <?php // echo $form->field($model, 'name') ?>

    <?php // echo $form->field($model, 'mobile') ?>

    <?php // echo $form->field($model, 'province') ?>

    <?php // echo $form->field($model, 'city') ?>

    <?php // echo $form->field($model, 'area') ?>

    <?php // echo $form->field($model, 'address') ?>

    <?php // echo $form->field($model, 'detailed_address') ?>

    <?php // echo $form->field($model, 'longitude') ?>

    <?php // echo $form->field($model, 'latitude') ?>

    <?php // echo $form->field($model, 'type') ?>

    <?php // echo $form->field($model, 'labels') ?>

    <?php // echo $form->field($model, 'related_customer') ?>

    <?php // echo $form->field($model, 'is_require_sign') ?>

    <?php // echo $form->field($model, 'biz_area') ?>

    <?php // echo $form->field($model, 'biz_have_chain') ?>

    <?php // echo $form->field($model, 'biz_holder_num') ?>

    <?php // echo $form->field($model, 'biz_zoom_num') ?>

    <?php // echo $form->field($model, 'biz_level') ?>

    <?php // echo $form->field($model, 'biz_create_date') ?>

    <?php // echo $form->field($model, 'avatar') ?>

    <?php // echo $form->field($model, 'image') ?>

    <?php // echo $form->field($model, 'desc') ?>

    <?php // echo $form->field($model, 'mjj_num') ?>

    <?php // echo $form->field($model, 'last_work_finish_at') ?>

    <?php // echo $form->field($model, 'last_baoyang_finish_at') ?>

    <?php // echo $form->field($model, 'vw_type') ?>

    <?php // echo $form->field($model, 'reassign') ?>

    <?php // echo $form->field($model, 'create_at') ?>

    <div class="form-group">
        <?= Html::submitButton('Search', ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton('Reset', ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
