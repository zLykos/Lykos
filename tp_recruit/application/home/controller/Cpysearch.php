<?php
namespace app\home\controller;
use app\home\controller\Company;
use app\home\model\EnterpriseModel;
use think\Session;
use think\Loader;
use think\Request;
class Cpysearch extends Company{
    //人才查询
    public function searchTalent(){
        $req = Request::instance();
        $callback = $req->get('callback');
        $Number = $req->get('Number');
        $page = $req->get('page');
        $Number = empty($Number)?1:$Number;
        $page = empty($page)?1:$page;
        if($Number==0){
            $Number = 5;
        }
        if($page==0){
            $page = 1;
        }
        //查询出来的总条数
        $model = new EnterpriseModel();
        $connt = $model->number();
        //总页数
        $connts = ceil($connt/$Number);
        if($page>$connts){
            $page= 1;
        }
        //每一页最大条数
        $Numbers = floor($connt/$connts);
        if($Numbers>$Number){
            $Number=$Numbers;
        }
        //每页显示的数据条数
        $pages = ($page-1)*$Number;
        //判断每页条数和总页数
        $res = $model->searchTalent($pages,$Number);
//        var_dump($res);
        $data=array($res,$connts,$page);
        return $callback."(".json_encode($data).")";
    }
}