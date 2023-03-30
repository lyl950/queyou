<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var api\models\CustomerProtect $model */

$this->title = $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Customer Protects', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-protect-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Update', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Delete', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            'id',
            'customer_id',
            'protect_id',
            'level',
            'process',
            'name',
            'address',
            'contact',
            'mobile',
            'image',
            'remark:ntext',
            'brief',
            'region_id',
            'branch_id',
            'user_id',
            'username',
            'user2_id',
            'is_over',
            'over_at',
            'over_status',
            'over_remark',
            'is_confirm',
            'visit_at',
            'expire_at',
            'create_at',
        ],
    ]) ?>

</div>
