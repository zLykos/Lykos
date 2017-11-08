<?php
namespace app\home\model;
use think\Model;
use think\Db;
class EnterpriseModel extends Model{
    public function sigInsert($data){
        $res = Db::name('mq_enter_register')->insert($data);
        return $res;
    }
    public function phone($phone){
        $res = Db::table('mq_enter_register')->where("phone",$phone)->find();
        return $res;
    }
    public function mailbox($mailbox){
        $res = Db::table('mq_enter_register')->where("ent_mailbox",$mailbox)->find();
        return $res;
    }
    public function phoneSignIn($phone){
        $res = Db::table('mq_enter_register')->where("phone",$phone)->find();
//        echo "<pre>";
//        echo RegisterModel::getLastSql($res);
//        var_dump($res);
        return $res;
    }
    public function mailboxSignIn($mailbox){
        $res = Db::table('mq_enter_register')->where("ent_mailbox",$mailbox)->find();
//        echo "<pre>";
//        echo RegisterModel::getLastSql($res);
//        var_dump($res);
        return $res;
    }
}