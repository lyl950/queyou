<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Goodsclass $model */

$this->title = 'Update Goodsclass: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Goodsclasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="goodsclass-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
