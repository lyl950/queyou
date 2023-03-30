<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/** @var yii\web\View $this */
/** @var api\models\Customer $model */

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Customers', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
\yii\web\YiiAsset::register($this);
?>
<div class="customer-view">

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
            'title',
            'class',
            'is_expire',
            'is_share',
            'branch_id',
            'user_id',
            'contact_user_id',
            'contact_user2_id',
            'sale_user_id',
            'tracking_state',
            'status',
            'is_deleted',
            'protect_id',
            'expire_time',
            'save_at',
            'last_at',
            'company',
            'country',
            'name',
            'mobile',
            'province',
            'city',
            'area',
            'address',
            'detailed_address',
            'longitude',
            'latitude',
            'type',
            'labels',
            'related_customer',
            'is_require_sign',
            'biz_area',
            'biz_have_chain',
            'biz_holder_num',
            'biz_zoom_num',
            'biz_level',
            'biz_create_date',
            'avatar',
            'image:ntext',
            'desc:ntext',
            'mjj_num',
            'last_work_finish_at',
            'last_baoyang_finish_at',
            'vw_type',
            'reassign',
            'create_at',
        ],
    ]) ?>

</div>
