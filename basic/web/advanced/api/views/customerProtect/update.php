<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var api\models\CustomerProtect $model */

$this->title = 'Update Customer Protect: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customer Protects', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="customer-protect-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
