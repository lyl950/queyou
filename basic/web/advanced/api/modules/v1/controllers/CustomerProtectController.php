<?php

namespace api\modules\v1\controllers;

use api\models\CustomerDemand;
use api\models\CustomerProtect;
use api\commons\commons;
use yii\filters\VerbFilter;
use yii\rest\Controller;

class CustomerProtectController extends Controller
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
        $where=[];
        $like=[];
        $limit=10;
        $orderBy='';
        $param=$this->request->get();
        //筛条件
        if(!empty($param)){
            if(!empty($param['region_id'])){
                $where['a.region_id']=$param['region_id'];
            }else{
                return commons::returnJson(0,'缺少参数 region_id');
            }
            if(!empty($param['search_name'])){ // 关键字搜索
            $like=['like','a.name',$param['search_name']];
            }
            if(!empty($param['level'])){// 商机类型类型
                $where['a.level']=$param['level'];
            }
            if(!empty($param['process'])){// 商机阶段
                $where['a.process']=$param['process'];
            }
            if(!empty($param['c_time'])){// 创建时间
                $orderBy .= 'a.create_at '.$param['create_at'];
            }
            if(!empty($param['u_time'])){// 更新时间
                $orderBy .= 'a.update_at '.$param['update_at'];
            }
            if(!empty($param['over_at'])){// 结束时间
                $orderBy .= 'a.over_at '.$param['over_at'];
            }
        $demand=new CustomerDemand();
        $model=new CustomerProtect();
        $list=$model->list($limit,$where,$orderBy,$like);
        foreach ($list as $k=>$val){
                $where=['customer_protect_id'=>$val['customer_protect_id']];
                $list[$k]['demad']=$demand->list($where);
            }
            return commons::returnJson(1,'success',$list);
        }
        return commons::returnJson(0,'error缺少参数');

    }
    public function actionDetail($id){
        $param=$this->request->get();
        $model=new CustomerProtect();
        $list=$model->detail($param['id'],$param['region_id']);
        return commons:: returnJson(1,'success',$list);
    }

}
