<?php

use app\models\Fenpei;
use app\models\Users;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\Pjax;
/** @var yii\web\View $this */
/** @var app\models\FenpeiSearch $searchModel */
/** @var yii\data\ActiveDataProvider $dataProvider */

$this->title = 'Fenpeis';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="fenpei-index">

    <h1><?= Html::encode($this->title) ?></h1>


    <p>
<!--        --><?php //= Html::a('Create Fenpei', ['create'], ['class' => 'btn btn-success']) ?>
    </p>

    <?php Pjax::begin(); ?>
    <?php  echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
//            'id',
            'orderId',
            'userName.name',
            [
                'attribute'=>'goodsInfo.name',
                'label'=>'商品',
            ] ,
            [
                'attribute'=>'nums',
                'label'=>'数量',
                'value'=>function($data){
                    return $data['nums']?$data['nums']:'--';
                }
            ] ,
            'money',
            'time',
            'class',
//            'status',
            [
                'attribute'=>'status',
                'label'=>'状态',
                'value'=>function($data){
                    return $data['status']==1?'正常':'--';
                }
            ] ,
//            'is_over',
            [
                'attribute'=>'is_over',
                'label'=>'是否完成',
                'value'=>function($data){
                    return $data['is_over']==1?'已完成':'--';
                }
            ] ,
//            'is_area',
            [
                'attribute'=>'is_area',
                'label'=>'是否跨区',
                'value'=>function($data){
                    return '未知';
                }
            ] ,
//            'saleType',
            [
                'attribute'=>'saleType',
                'label'=>'销售类型',
                'value'=>function($data){
                    return '未知';
                }
            ] ,

            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action, Fenpei $model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                 }
            ],
        ],
    ]); ?>

    <?php Pjax::end(); ?>

</div>
