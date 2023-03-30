<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Fenpeiclass $model */

$this->title = 'Create Fenpeiclass';
$this->params['breadcrumbs'][] = ['label' => 'Fenpeiclasses', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fenpeiclass-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
