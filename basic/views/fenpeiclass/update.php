<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fenpeiclass $model */

$this->title = 'Update Fenpeiclass: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Fenpeiclasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="fenpeiclass-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
