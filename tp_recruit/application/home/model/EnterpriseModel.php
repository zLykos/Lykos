<?php
namespace app\home\model;
use think\Model;
use think\Db;
class EnterpriseModel extends Model{
    public function sigInsert($data){
        $res = Db::name('mq_enter_register')->insert($data);
        return $res;
    }
    public function mailbox($mailbox){
        $res = Db::table('mq_enter_register')->where("ent_mailbox",$mailbox)->find();
        return $res;
    }
    public function mailboxSignIn($mailbox){
        $res = Db::table('mq_enter_register')->where("ent_mailbox",$mailbox)->find();
//        echo "<pre>";
//        echo RegisterModel::getLastSql($res);
//        var_dump($res);
        return $res;
    }
    public function backPassword($ent_mailbox,$password,$rand){
        $res = Db::table('mq_enter_register')->where('ent_mailbox',$ent_mailbox)->update(['ent_pwd'=>$password,'ent_rand'=>$rand]);
        //        echo "<pre>";
//        echo RegisterModel::getLastSql($res);
//        var_dump($res);
        return $res;
    }
    public function searchTalent(){
//        echo RegisterModel::getLastSql($res);
        $res = Db::table('mq_user_message')
        ->alias('a')
        ->join('mq_user_resume b','a.user_id = b.user_id')
        ->select();
        return $res;
    }
}