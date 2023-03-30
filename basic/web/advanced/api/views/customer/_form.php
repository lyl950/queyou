<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var api\models\Customer $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'class')->textInput() ?>

    <?= $form->field($model, 'is_expire')->textInput() ?>

    <?= $form->field($model, 'is_share')->textInput() ?>

    <?= $form->field($model, 'branch_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'contact_user_id')->textInput() ?>

    <?= $form->field($model, 'contact_user2_id')->textInput() ?>

    <?= $form->field($model, 'sale_user_id')->textInput() ?>

    <?= $form->field($model, 'tracking_state')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'status')->textInput() ?>

    <?= $form->field($model, 'is_deleted')->textInput() ?>

    <?= $form->field($model, 'protect_id')->textInput() ?>

    <?= $form->field($model, 'expire_time')->textInput() ?>

    <?= $form->field($model, 'save_at')->textInput() ?>

    <?= $form->field($model, 'last_at')->textInput() ?>

    <?= $form->field($model, 'company')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'country')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'province')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'city')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'area')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'detailed_address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'longitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'latitude')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'labels')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'related_customer')->textInput() ?>

    <?= $form->field($model, 'is_require_sign')->textInput() ?>

    <?= $form->field($model, 'biz_area')->textInput() ?>

    <?= $form->field($model, 'biz_have_chain')->textInput() ?>

    <?= $form->field($model, 'biz_holder_num')->textInput() ?>

    <?= $form->field($model, 'biz_zoom_num')->textInput() ?>

    <?= $form->field($model, 'biz_level')->dropDownList([ 'LOW' => 'LOW', 'MIDDLE' => 'MIDDLE', 'HIGH' => 'HIGH', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'biz_create_date')->textInput() ?>

    <?= $form->field($model, 'avatar')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'desc')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'mjj_num')->textInput() ?>

    <?= $form->field($model, 'last_work_finish_at')->textInput() ?>

    <?= $form->field($model, 'last_baoyang_finish_at')->textInput() ?>

    <?= $form->field($model, 'vw_type')->dropDownList([ 'NONE' => 'NONE', 'V' => 'V', 'V1' => 'V1', 'V2' => 'V2', 'W' => 'W', 'W1' => 'W1', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'reassign')->textInput() ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
