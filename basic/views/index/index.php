<?php

use app\models\Category;
use yii\helpers\Html;
use yii\helpers\Url;
use yii\grid\ActionColumn;
use yii\grid\GridView;
use yii\widgets\ActiveForm;
use kartik\daterange\DateRangePicker;
/** @var app\models\IndexSearch $model */
/** @var yii\web\View $this */
/** @var app\models\GoodsSearch $searchModel */
/** @var yii\data\SqlDataProvider $dataProvider */

$this->title = 'Goods';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="goods-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <p>
      用户名：  <?= Html::input('text','userName','',['id'=>'username',]) ?>
    </p>
    <p>
        订单号：  <?= Html::input('number','order','',['id'=>'order',]) ?>
    </p>
<!--    <div class="form-group">-->
<!--        --><?php //= Html::submitButton('submit', ['class' => 'btn btn-success']) ?>
<!--    </div>-->
    <p>
    <p>
        区域：
        <select name="area" id="area">
            <option value="null">全部</option>
            <?php  foreach ($area as $k=>$value){
                echo    "  <option value=".$value['id'].">".$value['name']."</option>";
            }   ?>
        </select>
        部门：
        <select name="department" id="department">
            <option value="null">全部</option>
        </select>
    </p>
        <label class="layui-form-label">日期范围</label>
    <div id="test6">
        <input type="text" autocomplete="off" id="test-startDate-1" class="layui-input" placeholder="开始日期" value="">
        <input type="text" autocomplete="off" id="test-endDate-1" class="layui-input" placeholder="结束日期" value="">
    </div>
    <button type="submit" id="test2313" class="btn btn-success">查询</button>
    <button type="submit" id="test3654" class="btn btn-success">重置</button>
    </p>
<!--    --><?php //  // echo $this->render('_search', ['model' => $searchModel]); ?>
    <div class="main-form">

    </div>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
//        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            'orderId:text:订单号',
            'name:text:用户名',
            [
                'attribute'=>'goodsName',
                'label'=>'商品名',
                'value'=>function($data){
                    return $data['goodsName']?$data['goodsName']:'--';
                }
            ],
            [
                'attribute'=>'goodsClass',
                'label'=>'商品类型',
                'value'=>function($data){
                   return $data['goodsClass']?$data['goodsClass']:'--';
                }
            ],
            [
              'attribute'=>'goodsNums',
              'label'=>'商品数量',
              'value'=>function($data){
                return $data['goodsNums']?$data['goodsNums']:'--';
              },
            ],
            'money:text:金额',
            [
               'attribute'=>'class',
                'label'=>'分配类型',
                'value'=>function($data){
                    if($data['class']==1){
                        return  '产品分配' ;
                    }elseif($data['class']==2){
                        return  '金额分配' ;
                    }else{
                        return  '--' ;
                    }
                }
            ],
            [
                'attribute'=>'saleType',
                'label'=>'销售方式',
                'value'=>function($data){
                    return '--';
                }
            ],
            [
                'attribute'=>'is_area',
                'label'=>'是否跨区',
                'value'=>function($data){
                    return '--';
                }
            ],
            'area:text:区域',
            'department:text:部门',
            [
                'attribute'=>'time',
                'label'=>'创建时间',
                'value'=>function($data){
                   return $data['time'];
                }
            ] ,
            [
                'class' => ActionColumn::className(),
                'urlCreator' => function ($action,$model, $key, $index, $column) {
                    return Url::toRoute([$action, 'id' => $model->id]);
                }
            ],
        ],
    ]); ?>
</div>
<script src="/assets/jquery.js"></script>
<script src="/assets/laydate.js"></script>
<script>
    $(document).ready(function(){
        var areaId=getUrlParam('area');
        if (areaId != null){
        $.post('/index.php?r=index/get-area',{'id':areaId},function ($data){
            $("#area option[value='"+areaId+"']").attr("selected", true);
            getdepartment(areaId)
        })
        }
    });
    $("#area").on("change",function () {
       var id= $("#area").val();
        getdepartment(id)
            // window.location.href = '/index.php?r=index%2Flist' + "&area="+id;
    });
    $("#department").on("change",function () {
        var areaId=getUrlParam('area');
        var id= $("#department").val();
        // window.location.href = '/index.php?r=index%2Flist'+"&area="+areaId + "&department="+id;
    });

    //获取url中的参数
    function getUrlParam(name) {
        var reg = new RegExp("(^|&)" + name + "=([^&]*)(&|$)"); //构造一个含有目标参数的正则表达式对象
        var r = window.location.search.substr(1).match(reg);  //匹配目标参数
        if (r != null) return unescape(r[2]); return null; //返回参数值
    }
    function getdepartment(id){
        var department=getUrlParam('department');
        $.post('/index.php?r=index/get-department',{'id':id},function ($data) {
            $('#department').find('option').remove();
            $('#department').append(new Option('全部',null))
            $.each($data,function (index,value){
                if(value['id'] == department ){
                    $('#department').append(new Option(value['name'], value['id'],true,true))
                }else {
                    $('#department').append(new Option(value['name'], value['id']))
                }
            })
        });
    }

    //日期范围
    laydate.render({
        elem: '#test6'
        //设置开始日期、日期日期的 input 选择器
        //数组格式为 5.3.0 开始新增，之前版本直接配置 true 或任意分割字符即可
        ,range: ['#test-startDate-1', '#test-endDate-1']
    });

    $("#test2313").on("click",function () {
        var startDate=$("#test-startDate-1").val();
        var endDate=$("#test-endDate-1").val();
        var username=$("#username").val();
        var areaId=$("#area").val();
        var department=$("#department").val();
        var order=$("#order").val();

         window.location.href ='/index.php?r=index%2Flist' + "&area="+areaId+"&username="+username+"&department="+department+"&startDate="+startDate+"&endDate="+endDate+"&order="+order;

        // $.post('/index.php?r=index/list',{'endDate':endDate,'startDate':startDate,'username':username,'area':areaId,'department':department},function ($data) {
        //     $("body").html($data);
        // });
    });
    $("#test3654").on("click",function () {


        window.location.href='/index.php?r=index%2Flist'

        // $.post('/index.php?r=index/list',{'endDate':endDate,'startDate':startDate,'username':username,'area':areaId,'department':department},function ($data) {
        //     $("body").html($data);
        // });
    });

</script>