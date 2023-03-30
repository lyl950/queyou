<?php

namespace api\modules\v1\controllers;
use api\models\Customer;
use yii\filters\VerbFilter;
use yii\rest\Controller;


class CustomerController extends Controller
{

    /**
     * @inheritDoc
     */
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
        return 'actionTest';
    }

    public function actionTest(){
        return 'actionTest';
    }

    public function actionList(){
        $modelCustomer=new  Customer();
        $customerList= $modelCustomer::find()
            ->where(['class'=>2,'status'=>1,'is_deleted'=>0])
            ->addSelect('id,title,name,mobile')
            ->asArray()
            ->all();
        return $this->asJson($customerList);
    }


}
