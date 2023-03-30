<?php

use app\models\OrderGoods;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var app\models\OrderGoodsSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Order Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-goods-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order Goods', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'orderId',
            'goodsId',
            'is_over',
            'surplusprice',
            //'drawprice',
            //'price',
            //'drawnum',
            //'surplusnum',
            //'goodstotal',
            //'money',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, OrderGoods $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
