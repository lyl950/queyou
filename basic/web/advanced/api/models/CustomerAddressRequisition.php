<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "site_customer_address_requisition".
 *
 * @property int $id ID
 * @property string $username 申请人
 * @property int $user_id 申请人ID
 * @property int $customer_id 客户ID
 * @property int $work_id 工单ID
 * @property float $latitude 纬度
 * @property float $longitude 经度
 * @property string $address 联系地址
 * @property float|null $prev_latitude 原纬度
 * @property float|null $prev_longitude 原经度
 * @property string|null $prev_address 原地址
 * @property string $audit_status 审核状态
 * @property string|null $audit_username 审核人
 * @property int $audit_user_id 审核人ID
 * @property string $create_at 添加时间
 */
class CustomerAddressRequisition extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_customer_address_requisition';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['username', 'user_id', 'customer_id', 'latitude', 'longitude', 'address'], 'required'],
            [['user_id', 'customer_id', 'work_id', 'audit_user_id'], 'integer'],
            [['latitude', 'longitude', 'prev_latitude', 'prev_longitude'], 'number'],
            [['audit_status'], 'string'],
            [['create_at'], 'safe'],
            [['username', 'audit_username'], 'string', 'max' => 8],
            [['address', 'prev_address'], 'string', 'max' => 200],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'user_id' => 'User ID',
            'customer_id' => 'Customer ID',
            'work_id' => 'Work ID',
            'latitude' => 'Latitude',
            'longitude' => 'Longitude',
            'address' => 'Address',
            'prev_latitude' => 'Prev Latitude',
            'prev_longitude' => 'Prev Longitude',
            'prev_address' => 'Prev Address',
            'audit_status' => 'Audit Status',
            'audit_username' => 'Audit Username',
            'audit_user_id' => 'Audit User ID',
            'create_at' => 'Create At',
        ];
    }
}
