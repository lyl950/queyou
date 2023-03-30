<?php

namespace api\modules\v1\controllers;
use api\models\CustomerProtectContact;
use api\commons\commons;
use yii\filters\VerbFilter;

class CustomerProtectContactController extends \yii\web\Controller
{


    public function behaviors()
    {
        return [
            'verbs'=>[
                'class' => VerbFilter::className(), //类名
                'actions'=>[ //方法
                    'index' => ['get'], //index方法只能用get请求，如果用post等就会报405,
                ],
            ],
        ];
    }
    public function actionIndex()
    {
        // 关键人列表
        $param=$this->request->get();
        if (!empty($param)){
            $contactModel=new CustomerProtectContact();
            if(empty($param['customer_id'] || $param['protect_id'] ))  return commons::returnJson(0,'error缺少参数');
            $list= $contactModel->getLits($param['customer_id'],$param['protect_id']);
            return commons::returnJson(1,'success',$list);
        }
        return commons::returnJson(0,'error缺少参数');
    }
//添加关键人
    public function actionProtectContactAdd(){
        $param=$this->request->post();
        if(!empty($param)){
            if(empty($param['user_id']))  return commons::returnJson(0,'缺少参数user_id');
            if(empty($param['customer_id']))  return commons::returnJson(0,'缺少参数customer_id');
            if(empty($param['customer_protect_id']))  return commons::returnJson(0,'缺少参数customer_protect_id');
            if(empty($param['mobile']))  return commons::returnJson(0,'缺少参数mobile');
            if(empty($param['name']))  return commons::returnJson(0,'缺少参数name');
            $param['create_at']=date('Y-m-d H:i:s',time());
            $param['is_critical']=1;
            $model=new CustomerProtectContact();
            $model->user_id=$param['user_id'];
            $model->customer_id=$param['customer_id'];
            $model->customer_protect_id=$param['customer_protect_id'];
            $model->mobile=$param['mobile'];
            $model->create_at=$param['create_at'];
            $model->is_critical=$param['is_critical'];
            if($model->save()){
                return commons::returnJson(1,'success');
            }
            return commons::returnJson(0,'error');
        }
        return commons::returnJson(0,'缺少参数mobile');
    }
    function actionProtectContactDelete(){

    }

}
