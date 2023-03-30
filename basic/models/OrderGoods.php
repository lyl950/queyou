<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "odergoods".
 *
 * @property int $id
 * @property string $orderId 订单标号
 * @property int $goodsId 商品Id
 * @property int $is_over 是否完成分配1完成0未完成
 * @property float $surplusprice 未分配数量
 * @property float $drawprice 已分配金额
 * @property float $price 单价
 * @property int $drawnum 已分配数量
 * @property int $surplusnum 剩余数量
 * @property string $goodstotal 产品总数
 * @property string $money 总金额
 */
class OrderGoods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'odergoods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'goodsId'], 'required'],
            [['goodsId', 'is_over', 'drawnum', 'surplusnum'], 'integer'],
            [['surplusprice', 'drawprice', 'price'], 'number'],
            [['orderId', 'goodstotal', 'money'], 'string', 'max' => 255],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderId' => 'Order ID',
            'goodsId' => 'Goods ID',
            'is_over' => 'Is Over',
            'surplusprice' => 'Surplusprice',
            'drawprice' => 'Drawprice',
            'price' => 'Price',
            'drawnum' => 'Drawnum',
            'surplusnum' => 'Surplusnum',
            'goodstotal' => 'Goodstotal',
            'money' => 'Money',
        ];
    }
}
