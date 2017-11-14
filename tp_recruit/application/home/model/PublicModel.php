<?php
namespace app\home\model;
use think\Model;
use think\Db;
class PublicModel extends Model{
    //省市区
    public function provinces(){
        $sql = Db::table('rs_pc_provinces')->select();
        return $sql;
    }
    public function cities($id){
        $sql = DB::table('rs_pc_cities')->where("provinceid",$id)->select();
        return $sql;
    }

    public function areas($id){
        $sql = Db::table('rs_pc_areas')->where("cityid",$id)->select();
        return $sql;
    }
}