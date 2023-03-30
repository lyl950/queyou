<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "site_customer".
 *
 * @property int $id
 * @property string $title 客户名称
 * @property int $class 0未分类,1普通客户,2商机客户
 * @property int $is_expire 是否过保
 * @property int $is_share 是否共享(1是0否)
 * @property int $branch_id 坐落区ID
 * @property int $user_id 建立人ID
 * @property int $contact_user_id 业务联系人
 * @property int|null $contact_user2_id 业务合作人
 * @property int $sale_user_id 售后联系人
 * @property string $tracking_state 跟踪状态
 * @property int $status 0审核中,1正常
 * @property int $is_deleted 1删除,0启用
 * @property int $protect_id 商机申请ID
 * @property string|null $expire_time 过保时间
 * @property string|null $save_at 保护时间
 * @property string|null $last_at 上次联系时间
 * @property string|null $company 单位
 * @property string $country 区域
 * @property string $name 联系人
 * @property string $mobile 联系电话
 * @property string $province 省
 * @property string $city 市
 * @property string $area 区
 * @property string $address 定位地址
 * @property string $detailed_address 详细地址
 * @property string $longitude 经度
 * @property string $latitude 纬度
 * @property string $type 商户类型
 * @property string $labels 标签 多标签 , 隔开
 * @property int|null $related_customer 相关客户
 * @property int $is_require_sign 是否需要签到(0不需要1需要)
 * @property int $biz_area 营业面积
 * @property int $biz_have_chain 是否连锁
 * @property int $biz_holder_num 股东人数
 * @property int $biz_zoom_num 包间数量
 * @property string|null $biz_level 茶楼等级
 * @property string|null $biz_create_date 开业时间
 * @property string $avatar 客户头像
 * @property string|null $image 图片
 * @property string|null $desc 备注
 * @property int $mjj_num 麻将机数
 * @property string $last_work_finish_at 最后工单日
 * @property string $last_baoyang_finish_at 最后保养日
 * @property string $vw_type 状态VW
 * @property int|null $reassign
 * @property string $create_at 添加时间
 */
class Customer extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_customer';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['title', 'user_id', 'contact_user_id', 'sale_user_id', 'tracking_state', 'country', 'name', 'mobile', 'province', 'city', 'area', 'address', 'type', 'labels'], 'required'],
            [['class', 'is_expire', 'is_share', 'branch_id', 'user_id', 'contact_user_id', 'contact_user2_id', 'sale_user_id', 'status', 'is_deleted', 'protect_id', 'related_customer', 'is_require_sign', 'biz_area', 'biz_have_chain', 'biz_holder_num', 'biz_zoom_num', 'mjj_num', 'reassign'], 'integer'],
            [['expire_time', 'save_at', 'last_at', 'biz_create_date', 'last_work_finish_at', 'last_baoyang_finish_at', 'create_at'], 'safe'],
            [['biz_level', 'image', 'desc', 'vw_type'], 'string'],
            [['title', 'country', 'type'], 'string', 'max' => 100],
            [['tracking_state'], 'string', 'max' => 50],
            [['company', 'detailed_address'], 'string', 'max' => 255],
            [['name'], 'string', 'max' => 32],
            [['mobile', 'province', 'city'], 'string', 'max' => 20],
            [['area'], 'string', 'max' => 30],
            [['address'], 'string', 'max' => 200],
            [['longitude', 'latitude'], 'string', 'max' => 40],
            [['labels', 'avatar'], 'string', 'max' => 300],
            [['title'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'title' => 'Title',
            'class' => 'Class',
            'is_expire' => 'Is Expire',
            'is_share' => 'Is Share',
            'branch_id' => 'Branch ID',
            'user_id' => 'User ID',
            'contact_user_id' => 'Contact User ID',
            'contact_user2_id' => 'Contact User2 ID',
            'sale_user_id' => 'Sale User ID',
            'tracking_state' => 'Tracking State',
            'status' => 'Status',
            'is_deleted' => 'Is Deleted',
            'protect_id' => 'Protect ID',
            'expire_time' => 'Expire Time',
            'save_at' => 'Save At',
            'last_at' => 'Last At',
            'company' => 'Company',
            'country' => 'Country',
            'name' => 'Name',
            'mobile' => 'Mobile',
            'province' => 'Province',
            'city' => 'City',
            'area' => 'Area',
            'address' => 'Address',
            'detailed_address' => 'Detailed Address',
            'longitude' => 'Longitude',
            'latitude' => 'Latitude',
            'type' => 'Type',
            'labels' => 'Labels',
            'related_customer' => 'Related Customer',
            'is_require_sign' => 'Is Require Sign',
            'biz_area' => 'Biz Area',
            'biz_have_chain' => 'Biz Have Chain',
            'biz_holder_num' => 'Biz Holder Num',
            'biz_zoom_num' => 'Biz Zoom Num',
            'biz_level' => 'Biz Level',
            'biz_create_date' => 'Biz Create Date',
            'avatar' => 'Avatar',
            'image' => 'Image',
            'desc' => 'Desc',
            'mjj_num' => 'Mjj Num',
            'last_work_finish_at' => 'Last Work Finish At',
            'last_baoyang_finish_at' => 'Last Baoyang Finish At',
            'vw_type' => 'Vw Type',
            'reassign' => 'Reassign',
            'create_at' => 'Create At',
        ];
    }
}
