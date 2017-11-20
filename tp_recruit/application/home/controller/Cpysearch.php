<?php
namespace app\home\controller;
use app\home\controller\Company;
use app\home\model\EnterpriseModel;
use app\home\model\RegisterModel;
use app\home\model\ThingModel;
use think\Session;
use think\Loader;
use think\Request;
class Cpysearch extends Company{
    public function comTalent(){
        $request = Request::instance();
        $callback = $request->get('callback');
        $id = Session::get('ent_id');
        $model = new ThingModel();
        $res = $model->EnterJoin($id);
        if($res){
            return $callback."(".json_encode($res).")";
        }else{
            echo $callback."(0)";
        }

    }
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
//        $ent_id = Session::get('ent_id');
        $res = $model->searchTalent($pages,$Number);
        $data=array($res,$connts,$page);
        return $callback."(".json_encode($data).")";
    }
    //公司简历管理
    public function Talent(){
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
        $ent_id = Session::get('ent_id');
        $res = $model->enterTalent($pages,$Number,$ent_id);
//        var_dump($res);
        $data=array($res,$connts,$page,$ent_id);
        return $callback."(".json_encode($data).")";
    }
    //公司对这份简历是否合适
    public function CompanyInquiry(){
        $request = Request::instance();
        $callback = $request->get('callback');
        $data['user_id'] = $request->get('user_id');
        $data['ent_state'] = $request->get('state');
        $data['ent_post'] = $request->get('ent_post');
        $data['ent_id'] = Session::get('ent_id');
        $data['ent_time'] = time();
        $model = new RegisterModel();
        $sre = $model->resume($data);
        if($sre){
            echo $callback."(0)";
        }else{
            echo $callback."(1)";
        }
    }
}