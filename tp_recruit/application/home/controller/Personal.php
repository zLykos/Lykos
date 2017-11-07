<?php
namespace app\home\controller;
use app\home\controller\Basd;
use app\home\model\ThingModel;
use think\Session;
use think\Loader;
use think\Request;
class Personal extends Basd{
    public function perfectUser(){
        $req = Request::instance();
        $user_id = Session::get('user_id');
        $callback = $req->get('callback');
        $data1 = json_decode($req->get('data1'),1);
        $data2 = json_decode($req->get('data2'),1);
        $data3 = json_decode($req->get('data3'),1);
        $data4 = json_decode($req->get('data4'),1);
        $data1['user_id']=$user_id;
        $data2['user_id']=$user_id;
        $data3['user_id']=$user_id;
        $data4['user_id']=$user_id;
        $model = new ThingModel();
        $res = $model->Thing($data1,$data2,$data3,$data4);
        if($res){
            echo $callback . "(0)";
        }else{
            echo $callback . "(1)";
        }

    }
    public function resumeUser(){
        $req = Request::instance();
        $callback = $req->get('callback');
        $id = Session::get('user_id');
        $model = new ThingModel();
        $res = $model->ThingJoin($id);
        return $callback."(".json_encode($res).")";
    }
}