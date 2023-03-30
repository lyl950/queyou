<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "site_protect".
 *
 * @property int $id ID
 * @property string $name 客户名称
 * @property string $address 客户地址
 * @property string $contact 联系人
 * @property string $mobile 联系电话
 * @property string|null $image 客户图片
 * @property string|null $detail 详细信息
 * @property int $customer_id 客户ID
 * @property int $branch_id 部门ID
 * @property int $user_id 申请人
 * @property int $user2_id 合作人/部长
 * @property int|null $admin_id 审核人
 * @property string $audit_status 审核状态
 * @property string|null $audit_remark 审核说明
 * @property string|null $audit_at 审核时间
 * @property int $is_over 是否结束
 * @property string|null $over_at 结束时间
 * @property string|null $over_status 失效类型
 * @property string|null $over_remark 失效说明
 * @property string $level 级别
 * @property int $is_confirm 部长处理
 * @property string $create_at 添加时间
 */
class Protect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_protect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['name', 'address', 'contact', 'mobile', 'user_id'], 'required'],
            [['detail', 'audit_status', 'over_status', 'level'], 'string'],
            [['customer_id', 'branch_id', 'user_id', 'user2_id', 'admin_id', 'is_over', 'is_confirm'], 'integer'],
            [['audit_at', 'over_at', 'create_at'], 'safe'],
            [['name', 'address'], 'string', 'max' => 100],
            [['contact'], 'string', 'max' => 16],
            [['mobile'], 'string', 'max' => 20],
            [['image', 'audit_remark', 'over_remark'], 'string', 'max' => 200],
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
            'address' => 'Address',
            'contact' => 'Contact',
            'mobile' => 'Mobile',
            'image' => 'Image',
            'detail' => 'Detail',
            'customer_id' => 'Customer ID',
            'branch_id' => 'Branch ID',
            'user_id' => 'User ID',
            'user2_id' => 'User2 ID',
            'admin_id' => 'Admin ID',
            'audit_status' => 'Audit Status',
            'audit_remark' => 'Audit Remark',
            'audit_at' => 'Audit At',
            'is_over' => 'Is Over',
            'over_at' => 'Over At',
            'over_status' => 'Over Status',
            'over_remark' => 'Over Remark',
            'level' => 'Level',
            'is_confirm' => 'Is Confirm',
            'create_at' => 'Create At',
        ];
    }
}
