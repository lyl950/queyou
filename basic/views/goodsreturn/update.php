<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Goodsreturn $model */

$this->title = 'Update Goodsreturn: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Goodsreturns', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="goodsreturn-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
