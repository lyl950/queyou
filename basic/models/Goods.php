<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "goods".
 *
 * @property int $id
 * @property string $name 名字
 * @property string $money 总金额
 * @property int $class 产品类型
 * @property int $type 产品状态
 * @property int $surplusnum 剩余数量
 * @property int $total 产品总数
 * @property int $drawnum 已分配数量
 * @property string|null $price 单价
 * @property string $drawprice 已分配金额
 * @property string $surplusprice 剩余金额
 */
class Goods extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'goods';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'money'], 'required'],
            [['class', 'type', 'surplusnum', 'total', 'drawnum'], 'integer'],
            [['name', 'money'], 'string', 'max' => 255],
            [['price', 'drawprice'], 'string', 'max' => 10],
            [['surplusprice'], 'string', 'max' => 11],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'money' => 'Money',
            'class' => 'Class',
            'type' => 'Type',
            'surplusnum' => 'Surplusnum',
            'total' => 'Total',
            'drawnum' => 'Drawnum',
            'price' => 'Price',
            'drawprice' => 'Drawprice',
            'surplusprice' => 'Surplusprice',
        ];
    }
}
