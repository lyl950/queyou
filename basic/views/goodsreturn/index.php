<?php

use app\models\Goodsreturn;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\GoodsreturnSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Goodsreturns';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goodsreturn-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Goodsreturn', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'fid',
            'time',
            'status',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Goodsreturn $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
