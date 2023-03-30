<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "site_customer_protect_contact".
 *
 * @property int $id ID
 * @property int $customer_id 客户ID
 * @property int $customer_protect_id 商机客户ID
 * @property int $user_id 用户ID
 * @property int $is_critical 商机关键人
 * @property string $mobile 联系人手机
 * @property string $name 联系人称呼
 * @property string|null $create_at 添加时间
 */
class CustomerProtectContact extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_customer_protect_contact';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'user_id', 'mobile', 'name'], 'required'],
            [['customer_id', 'customer_protect_id', 'user_id', 'is_critical'], 'integer'],
            [['create_at'], 'safe'],
            [['mobile', 'name'], 'string', 'max' => 20],
            [['customer_id', 'mobile'], 'unique', 'targetAttribute' => ['customer_id', 'mobile']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'customer_protect_id' => 'Customer Protect ID',
            'user_id' => 'User ID',
            'is_critical' => 'Is Critical',
            'mobile' => 'Mobile',
            'name' => 'Name',
            'create_at' => 'Create At',
        ];
    }

    public function getLits($customer_id,$protect_id){

     return   $this::find()
            ->where(['customer_id'=>$customer_id,'customer_protect_id'=>$protect_id])
            ->where(['is_critical'=>1])
            ->asArray()
            ->all();

    }

}
