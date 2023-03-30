<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "site_customer_demand".
 *
 * @property int $id ID
 * @property int $customer_protect_id 商机客户ID
 * @property int $customer_id 客户ID
 * @property int $user_id 用户ID
 * @property string $title 标题
 * @property string|null $product_type 产品类型
 * @property string|null $number 数量范围
 * @property string|null $content 说明
 * @property string $create_at 添加时间
 */
class CustomerDemand extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_customer_demand';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_protect_id', 'customer_id', 'user_id', 'title'], 'required'],
            [['customer_protect_id', 'customer_id', 'user_id'], 'integer'],
            [['product_type'], 'string'],
            [['create_at'], 'safe'],
            [['title'], 'string', 'max' => 200],
            [['number'], 'string', 'max' => 9],
            [['content'], 'string', 'max' => 250],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_protect_id' => 'Customer Protect ID',
            'customer_id' => 'Customer ID',
            'user_id' => 'User ID',
            'title' => 'Title',
            'product_type' => 'Product Type',
            'number' => 'Number',
            'content' => 'Content',
            'create_at' => 'Create At',
        ];
    }

    public function list($where=[]){
        return $this::find()->where($where)->asArray()->all();
    }

}
