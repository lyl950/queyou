<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Goodsreturn $model */

$this->title = 'Create Goodsreturn';
$this->params['breadcrumbs'][] = ['label' => 'Goodsreturns', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goodsreturn-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
