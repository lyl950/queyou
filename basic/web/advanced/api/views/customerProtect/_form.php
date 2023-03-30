<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var api\models\CustomerProtect $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="customer-protect-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'customer_id')->textInput() ?>

    <?= $form->field($model, 'protect_id')->textInput() ?>

    <?= $form->field($model, 'level')->dropDownList([ 0 => '0', 1 => '1', 'SSS' => 'SSS', 'S1' => 'S1', 'S2' => 'S2', 'S3' => 'S3', 'N' => 'N', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'process')->dropDownList([ 'CREATED' => 'CREATED', 'CONFIRM_KEY_PEOPLE' => 'CONFIRM KEY PEOPLE', 'CONFIRM_NEEDS' => 'CONFIRM NEEDS', 'CONTACTING' => 'CONTACTING', 'OVER' => 'OVER', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'contact')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'mobile')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'image')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'remark')->textarea(['rows' => 6]) ?>

    <?= $form->field($model, 'brief')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'region_id')->textInput() ?>

    <?= $form->field($model, 'branch_id')->textInput() ?>

    <?= $form->field($model, 'user_id')->textInput() ?>

    <?= $form->field($model, 'username')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'user2_id')->textInput() ?>

    <?= $form->field($model, 'is_over')->textInput() ?>

    <?= $form->field($model, 'over_at')->textInput() ?>

    <?= $form->field($model, 'over_status')->dropDownList([ 'TRADE' => 'TRADE', 'DISCARD' => 'DISCARD', 'LOST' => 'LOST', 'EXPIRED' => 'EXPIRED', ], ['prompt' => '']) ?>

    <?= $form->field($model, 'over_remark')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'is_confirm')->textInput() ?>

    <?= $form->field($model, 'visit_at')->textInput() ?>

    <?= $form->field($model, 'expire_at')->textInput() ?>

    <?= $form->field($model, 'create_at')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton('Save', ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
