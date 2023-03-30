<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fenpei $model */

$this->title = 'Update Fenpei: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Fenpeis', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fenpei-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
