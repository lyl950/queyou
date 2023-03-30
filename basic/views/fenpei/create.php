<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fenpei $model */

$this->title = 'Create Fenpei';
$this->params['breadcrumbs'][] = ['label' => 'Fenpeis', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fenpei-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
