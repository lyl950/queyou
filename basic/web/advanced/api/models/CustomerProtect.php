<?php

namespace api\models;

use Yii;

/**
 * This is the model class for table "site_customer_protect".
 *
 * @property int $id ID
 * @property int $customer_id 客户ID
 * @property int $protect_id 申请ID
 * @property string $level 级别
 * @property string $process 阶段
 * @property string $name 客户名称
 * @property string $address 客户地址
 * @property string $contact 联系人
 * @property string $mobile 联系电话
 * @property string|null $image 客户图片
 * @property string|null $remark 备注
 * @property string|null $brief 摘要
 * @property int $region_id 大区ID
 * @property int $branch_id 部门ID
 * @property int $user_id 申请人ID
 * @property string $username 申请人
 * @property int $user2_id 合作人/部长
 * @property int $is_over 是否结束
 * @property string|null $over_at 结束时间
 * @property string|null $over_status 失效类型
 * @property string|null $over_remark 失效说明
 * @property int $is_confirm 部长处理
 * @property string|null $visit_at 访问时间
 * @property string|null $expire_at 过保时间
 * @property string $create_at 添加时间
 */
class CustomerProtect extends \yii\db\ActiveRecord
{
    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'site_customer_protect';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['customer_id', 'protect_id', 'region_id', 'branch_id', 'user_id', 'user2_id', 'is_over', 'is_confirm'], 'integer'],
            [['protect_id', 'name', 'address', 'contact', 'mobile', 'region_id', 'branch_id', 'user_id', 'username'], 'required'],
            [['level', 'process', 'remark', 'over_status'], 'string'],
            [['over_at', 'visit_at', 'expire_at', 'create_at'], 'safe'],
            [['name', 'address', 'brief'], 'string', 'max' => 100],
            [['contact'], 'string', 'max' => 16],
            [['mobile', 'username'], 'string', 'max' => 20],
            [['image', 'over_remark'], 'string', 'max' => 200],
        ];
    }

    public function getList(){
        return $this->hasOne(Protect::className(),['id'=>'protect_id']);
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'customer_id' => 'Customer ID',
            'protect_id' => 'Protect ID',
            'level' => 'Level',
            'process' => 'Process',
            'name' => 'Name',
            'address' => 'Address',
            'contact' => 'Contact',
            'mobile' => 'Mobile',
            'image' => 'Image',
            'remark' => 'Remark',
            'brief' => 'Brief',
            'region_id' => 'Region ID',
            'branch_id' => 'Branch ID',
            'user_id' => 'User ID',
            'username' => 'Username',
            'user2_id' => 'User2 ID',
            'is_over' => 'Is Over',
            'over_at' => 'Over At',
            'over_status' => 'Over Status',
            'over_remark' => 'Over Remark',
            'is_confirm' => 'Is Confirm',
            'visit_at' => 'Visit At',
            'expire_at' => 'Expire At',
            'create_at' => 'Create At',
        ];
    }

    public function list($limit=10,$where=[],$orderBy=[],$like=[]){
            return $this::find()
            ->leftJoin('site_protect a','a.id = site_customer_protect.protect_id')
            ->leftJoin('site_customer b','b.id = a.customer_id')
            ->leftJoin('site_user d','a.user_id = d.id')
            ->where("a.audit_status = 'PASS'")
            ->where($where)
            ->where($like)
            ->limit($limit)
            ->asArray()
            ->orderBy($orderBy)
            ->addSelect('a.customer_id,site_customer_protect.level,site_customer_protect.update_at,site_customer_protect.create_at,site_customer_protect.over_at,site_customer_protect.id as customer_protect_id,b.title,d.username,')
            ->all();
    }

    public function  detail($id,$region_id){
       $list['body']=$this::find()//商机主体
            ->leftJoin('site_customer a ','a.id = site_customer_protect.customer_id')
            ->where(['site_customer_protect.id'=>$id,'site_customer_protect.region_id'=>$region_id])
            ->asArray()
            ->one();
       $keyPeopleModel= new CustomerProtectContact();
       $list['keyPeople']=$keyPeopleModel::find()//关键人
           ->where(['customer_protect_id'=>$id,'is_critical'=>1])
           ->asArray()
           ->all();





        return $list;
    }
}
