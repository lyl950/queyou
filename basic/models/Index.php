<?php

namespace app\models;

use yii\base\Model;

class Index extends  \yii\db\ActiveRecord
{

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'Order';
    }
    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['orderId', 'name','money','class','saleType','is_area','area','department','time'], 'required'],
//            [['class', 'type', 'surplusnum', 'total', 'drawnum'], 'integer'],
//            [['name', 'money'], 'string', 'max' => 255],
//            [['price', 'drawprice'], 'string', 'max' => 10],
//            [['surplusprice'], 'string', 'max' => 11],
        ];
    }
    /**
     * {@inheritdoc}
     */
    public function scenarios()
    {
        // bypass scenarios() implementation in the parent class
        return Model::scenarios();
    }
    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'orderId' => '订单号',
            'name' => '名字',
            'money' => '金额',
            'class' => '分配类型',
            'saleType' => '销售类型',
            'is_area' => '是否跨区',
            'area' => '区域',
            'department' => '部门',
            'time' => '分配时间',

        ];
    }

    public $grade;
    public $userGrade=[
        '1'=>'等级1',
        '2'=>'等级2',
        '3'=>'等级3',
        '4'=>'等级4',
        '5'=>'等级5',
        '6'=>'等级6',
        '7'=>'等级7',
    ];
    public function getUserGrade(){
        $arr=[];
        foreach ($this->userGrade as $key=>$value){
            $arr[]=['id'=>$key,'name'=>$value];
        }
        return \yii\helpers\ArrayHelper::map($arr,'id','name');
    }


}