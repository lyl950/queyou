<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "fenpei".
 *
 * @property int $id
 * @property string|null $userId 人员id
 * @property int|null $goodsId 产品id
 * @property string|null $nums 产品数量
 * @property string|null $money 产品价格
 * @property string|null $time 分配时间
 * @property string|null $class 分配类型
 * @property string|null $status 状态1为正常；2为退换货
 * @property int|null $is_over 是否分配完成0未完成1完成
 * @property int|null $is_area 是否跨区域0非跨区域1跨区域
 * @property int|null $saleType 销售类型1批发2零售
 * @property string|null $orderId 订单编号
 */
class Fenpei extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'fenpei';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['goodsId', 'is_over', 'is_area', 'saleType'], 'integer'],
            [['time','name'], 'safe'],
            [['userId'], 'string', 'max' => 11],
            [['nums', 'money', 'class', 'status', 'orderId'], 'string', 'max' => 255],
        ];
    }

    public function getUserName(){
        return $this->hasOne(Users::className(),['id'=>'userId']);
    }

    public function getGoodsInfo(){
        return $this->hasOne(Goods::className(),['id'=>'goodsId']);
    }
    public function getOrder(){
        return $this->hasOne(Order::className(),['orderId'=>'orderId']);
    }


    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'userId' => 'User ID',
            'goodsId' => 'Goods ID',
            'nums' => 'Nums',
            'money' => 'Money',
            'time' => 'Time',
            'class' => 'Class',
            'status' => 'Status',
            'is_over' => 'Is Over',
            'is_area' => 'Is Area',
            'saleType' => 'Sale Type',
            'orderId' => 'Order ID',
            'userName.name'=>'name',
            'goodsInfo'=>'goods'

        ];
    }
}
