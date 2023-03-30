<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var api\models\CustomerProtect $model */

$this->title = 'Create Customer Protect';
$this->params['breadcrumbs'][] = ['label' => 'Customer Protects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-protect-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
