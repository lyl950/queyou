<?php

namespace api\commons;
use yii\rest\Controller;

class commons
{
   static function returnJson($code=1,$msg='',$data=[]){
        $data=['code'=>$code,'msg'=>$msg,'data'=>$data];
        return json_encode($data);
    }
}