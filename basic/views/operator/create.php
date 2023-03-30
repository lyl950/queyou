<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Operator $model */

$this->title = 'Create Operator';
$this->params['breadcrumbs'][] = ['label' => 'Operators', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="operator-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
