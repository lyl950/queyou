<?php

use api\models\CustomerProtect;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;

/** @var yii\web\View $this */
/** @var api\models\CustomerProtectSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Customer Protects';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="customer-protect-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Customer Protect', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            'id',
            'customer_id',
            'protect_id',
            'level',
            'process',
            //'name',
            //'address',
            //'contact',
            //'mobile',
            //'image',
            //'remark:ntext',
            //'brief',
            //'region_id',
            //'branch_id',
            //'user_id',
            //'username',
            //'user2_id',
            //'is_over',
            //'over_at',
            //'over_status',
            //'over_remark',
            //'is_confirm',
            //'visit_at',
            //'expire_at',
            //'create_at',
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, CustomerProtect $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>


</div>
