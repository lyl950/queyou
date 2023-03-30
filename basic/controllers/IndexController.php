<?php

namespace app\controllers;

use app\models\Area;
use app\models\Category;
use app\models\Department;
use app\models\Fenpei;
use app\models\Goods;
use app\models\GoodsSearch;
use app\models\Index;
use app\models\IndexSearch;
use app\models\Order;
use app\models\OrderGoods;
use app\models\User;
use app\models\Users;
use Exception;
use kartik\daterange\DateRangePicker;
use yii\data\SqlDataProvider;
use yii\filters\VerbFilter;
use yii\web\Controller;
use yii;

class IndexController extends Controller
{
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }
    public function actionIndex()
    {

        $param=$this->request->post();
        if(!empty($param)){
            $is_over=0;
            $over_is_over=0;
            $goodsModel=new OrderGoods();
            $fenpeiModel=new Fenpei();
            $orderModel=new Order();
            $orderInfo=$orderModel::find()->where(['orderId'=>$param['orderId']])->asArray()->one();
            //判断是否完成分配
            if($orderInfo['is_over']==1)return '该订单已完成分配';
            //产品分配
            if($param['class']==1){
                //判断是否完成分配和查看产品信息
                $goodsInfo=$goodsModel::find()->where(['orderId'=>$param['orderId'],'goodsId'=>$param['goodsId']])->asArray()->one();
                if(empty($goodsInfo)) return '产品信息错误';
                if($goodsInfo['is_over']==1)return '该产品已完成分配';
                //判断库存
                $a=$goodsInfo['drawnum']+$param['goodsNum'];
                $b=($param['goodsNum']*$goodsInfo['price']);
                if($a>$goodsInfo['goodstotal'] || $b > $orderInfo['surplusprice'] ) return '订单待分配额不足';
                //开启事务
              $tr = Yii::$app->db->beginTransaction();
              try{
                    //计算分配信息；
                    $drawprice=$orderInfo['drawprice']+($param['goodsNum']*$goodsInfo['price']);//已分配金额
                    $drawnum=$goodsInfo['drawnum']+$param['goodsNum'];//已分配
                    $surplusnum=$goodsInfo['surplusnum']-$param['goodsNum'];//待分配


                  //当此产品全部分配完成修改其状态；
                if($drawnum == $goodsInfo['goodstotal'] || $drawprice == $orderInfo['money']){
                    $is_over=1;
                }
                  //修改订单商品信息
                  $goodsModel::updateAll(['drawnum'=>$drawnum,'surplusnum'=>$surplusnum,'is_over'=>$is_over],['orderId'=>$param['orderId'],'goodsId'=>$param['goodsId']]);
                  $find=$goodsModel::find()->where(['orderId'=>$param['orderId'],'is_over'=>0])->asArray()->one();
                  if($find){//当订单中所有产品都分配完成时修改订单状态
                      $over_is_over=0;
                  }else{
                      $over_is_over=1;
                  }
                 //修改订单商品信息
                 $money=$orderInfo['surplusprice']-($param['goodsNum']*$goodsInfo['price']);
                 $orderModel::updateAll(['drawprice'=>$drawprice,'surplusprice'=>$money,'is_over'=>$over_is_over],['orderId'=>$param['orderId']]);
                  //如果已经分配就修改没有就写入
                 $fenpeiInfo=$fenpeiModel::find()->where(['orderId'=>$param['orderId'],'goodsId'=>$param['goodsId'],'userId'=>$param['userId'],'class'=>$param['class']])->asArray()->one();
                 if($fenpeiInfo){//如果已经分配就修改没有就写入
                     $feinums=$fenpeiInfo['nums']+$param['goodsNum'];
                     $totalMoney=$feinums*$goodsInfo['price'];
                     $fenpeiModel::updateAll(['nums'=>$feinums,'money'=>$totalMoney],['orderId'=>$param['orderId'],'goodsId'=>$param['goodsId'],'userId'=>$param['userId'],'class'=>$param['class']]);
                 }else{
                     //写入分配表
                     $fenpeiModel->userId=$param['userId'];
                     $fenpeiModel->orderId=$param['orderId'];
                     $fenpeiModel->goodsId=$param['goodsId'];
                     $fenpeiModel->nums=$param['goodsNum'];
                     $fenpeiModel->money=$param['goodsNum']*$goodsInfo['price'];
                     $fenpeiModel->time=date("Y-m-d h:i:s",time());
                     $fenpeiModel->class=$param['class'];
                     $fenpeiModel->saleType=$param['saleType'];
                     $fenpeiModel->is_area=$param['is_area'];
                     $fenpeiModel->save();
                 }

                    $tr->commit();
                    return '分配成功';
                }catch (Exception $e){
                    echo 2;
                    $tr->rollBack();
                }
            }
            elseif ($param['class']==2){//按金额分配
                if($param['goodsMoney'] > $orderInfo['surplusprice']) return '分配金额过大';
                $tr = Yii::$app->db->beginTransaction();
                try {
                    //计算数据
                    $drawprice=$orderInfo['drawprice']+$param['goodsMoney'];
                    $surplusprice=$orderInfo['surplusprice']-$param['goodsMoney'];
                    if($drawprice==$orderInfo['money']){
                        $over_is_over=1;
                        $goodsModel::updateAll(['is_over'=>1],['orderId'=>$param['orderId']]);
                    }
                    //修改订单待分配金额以及状态
                    $orderModel::updateAll(['drawprice'=>$drawprice,'surplusprice'=>$surplusprice,'is_over'=>$over_is_over],['orderId'=>$param['orderId']]);
                    //如果已经分配就修改没有就写入
                    $fenpeiInfo=$fenpeiModel::find()->where(['orderId'=>$param['orderId'],'userId'=>$param['userId'],'class'=>$param['class']])->asArray()->one();
                    if($fenpeiInfo){//如果已经分配就修改没有就写入
                        $feinums=$fenpeiInfo['money']+$param['goodsMoney'];
                        $fenpeiModel::updateAll(['money'=>$feinums],['orderId'=>$param['orderId'],'userId'=>$param['userId'],'class'=>$param['class']]);
                    }else{
                        //写入分配表
                        $fenpeiModel->userId=$param['userId'];
                        $fenpeiModel->orderId=$param['orderId'];
                        $fenpeiModel->goodsId=0;
                        $fenpeiModel->nums=0;
                        $fenpeiModel->money=$param['goodsMoney'];
                        $fenpeiModel->time=date("Y-m-d h:i:s",time());
                        $fenpeiModel->class=$param['class'];
                        $fenpeiModel->saleType=$param['saleType'];
                        $fenpeiModel->is_area=$param['is_area'];
                        $fenpeiModel->save();
                    }

                    $tr->commit();
                    return '分配成功';
                }catch (Exception $e){
                    $tr->rollBack();
                    echo 2;
                }
            }else{
                return '缺少分配类型';
            }
        }else{
            return '参数错误';
        }
    }

    public function actionTest(){
        $time=time();
        $round=rand(1000000,9999999);
        return $time.$round;
    }


    public function actionList(){
        $str='';
         $param= $this->request->get();
            if($param['username'] !== 'null'){
                $userModel= new Users();
                $userInfo=$userModel::find()->andFilterWhere(['like', 'name', $param['username']])->asArray()->all();
                if($userInfo){
                    $userId=[];
                    foreach ($userInfo as $k=>$value){
                        array_push($userId,$value['id']);
                    }
                    $userId=implode(',',$userId);
                    $str= ' and b.id in ('.$userId.')';
                }
            }
            if(!empty($param['area']) && $param['area'] != 'null')  $str =$str."and c.id = ".$param['area'];
            if(!empty($param['department']) && $param['department'] != 'null')  $str =$str."  and d.id = ".$param['department'];
            if(!empty($param['order']) && $param['order'] != 'null')  $str =$str."  and a.orderId = ".$param['order'];
            if(!empty($param['startDate']) && $param['startDate'] != 'null'&& !empty($param['endDate']) && $param['endDate'] != 'null')  $str =$str."  and a.time BETWEEN  '".$param['startDate']."' and '".$param['endDate']."'";

         $sql="SELECT t.orderId,a.money,a.time,a.class,a.is_area, a.saleType ,b.`name`, c.name as area ,d.`name`as department ,f.name as goodsClass ,e.name as goodsName ,a.nums as goodsNums FROM `order` AS t
            LEFT JOIN fenpei AS a ON t.orderId = a.orderId
            LEFT JOIN  users AS b	ON b.id = a.userId
            LEFT JOIN  area  AS c ON c.id =b.areaId
            LEFT JOIN  department AS d on d.id=b.dptId
            LEFT JOIN  goods AS e on e.id=a.goodsId 
            LEFT JOIN   goodsclass as f on e.class=f.id                                                                                                                                                                  
            WHERE t.is_over=1  
            ".$str;
        $count = Yii::$app->db->createCommand($sql)->queryAll();;
        $count = count($count);
        $provider = new SqlDataProvider([ 'sql' =>$sql,  'totalCount' => $count, 'pagination' => [ 'pageSize' => 10, ], 'sort' => [ 'attributes' => [ 'orderId', 'money', 'time', ], ] ]); // 返回包含每一行的数组$models = $provider->getModels();
        $area=new Area();
        $areaList=$area::find()->asArray()->all();
        return $this->render('index', [
            'dataProvider' => $provider,
            'area'=>$areaList
        ]);
    }

    public function actionGetDepartment(){
        $param= $this->request->post();
        $department= new  department();
        $departmentList= $department::find()->where(['aid'=>$param['id']])->asArray()->all();
      return  $this->asJson($departmentList);
    }

    public function actionGetArea(){
        $param= $this->request->post();
        $area = new Area();
        $areaList=$area::find($param['id']);
       return $this->asJson($areaList);
    }
}