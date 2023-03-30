<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Goodsclass $model */

$this->title = 'Create Goodsclass';
$this->params['breadcrumbs'][] = ['label' => 'Goodsclasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goodsclass-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
