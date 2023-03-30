<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "order".
 *
 * @property int $id
 * @property string $orderId
 * @property int $status 1正常，2退货
 * @property string $time
 * @property int $is_over 是否分配完成0未完成，1完成
 * @property string $is_area 是否跨区域0否，1跨
 * @property string $saleType 1批发，0零售
 * @property int|null $userId
 */
class Order extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'order';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'status', 'time'], 'required'],
            [['status', 'is_over', 'userId'], 'integer'],
            [['time'], 'safe'],
            [['orderId', 'is_area', 'saleType'], 'string', 'max' => 255],
        ];
    }

    public function getUserOder(){
       return $this->hasMany(User::className(),['id'=>'userId']);
    }
    public function getFenpeiList(){
        return  $this->hasMany(Fenpei::className(),['orderId'=>'orderId'])->via('order');
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'orderId' => 'Order ID',
            'status' => 'Status',
            'time' => 'Time',
            'is_over' => 'Is Over',
            'is_area' => 'Is Area',
            'saleType' => 'Sale Type',
            'userId' => 'User ID',
            'name'=>'name',
        ];
    }
}
