<?php
namespace app\home\controller;
use app\home\model\PublicModel;
use think\Controller;
use think\Session;
use think\Request;
class Publics extends Controller{
    public function provinces(){
        $request = Request::instance();
        $callback = $request->param('callback');
        $index = new PublicModel();
        $rows = $index->provinces();
        return $callback."(".json_encode($rows).")";

    }
    public function city(){
        $request = Request::instance();
        $callback = $request->param('callback');
        $id = $request->param('provinceid');
        $city = new PublicModel();
        $rows = $city->cities($id);
        return $callback."(".json_encode($rows).")";
    }
    public function areas(){
        $request = Request::instance();
        $callback = $request->param('callback');
        $id = $request->param('cityid');
        $areas = new PublicModel();
        $rows = $areas->areas($id);
        return $callback."(".json_encode($rows).")";
    }
}