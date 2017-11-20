<?php
namespace app\home\model;
use think\Model;
use think\Db;
class RegisterModel extends Model{
    public function sigInsert($data){
        $res = Db::name('mq_user_register')->insert($data);
        return $res;
    }
    public function phone($phone){
        $res = Db::table('mq_user_register')->where("phone",$phone)->find();
        return $res;
    }
    public function mailbox($mailbox){
        $res = Db::table('mq_user_register')->where("mailbox",$mailbox)->find();
        return $res;
    }
    public function phoneSignIn($phone){
        $res = Db::table('mq_user_register')->where("phone",$phone)->find();
//        echo "<pre>";
//        echo RegisterModel::getLastSql($res);
//        var_dump($res);
        return $res;
    }
    public function mailboxSignIn($mailbox){
        $res = Db::table('mq_user_register')->where("mailbox",$mailbox)->find();
//        echo "<pre>";
//        echo RegisterModel::getLastSql($res);
//        var_dump($res);
        return $res;
    }
    public function backPassword($phone,$password,$rand){
        $res = Db::table('mq_user_register')->where('phone',$phone)->update(['user_pwd'=>$password,'user_rand'=>$rand]);
        //        echo "<pre>";
//        echo RegisterModel::getLastSql($res);
//        var_dump($res);
        return $res;
    }
    public function resume($data){
        $res = Db::name('mq_enter_resume')->insert($data);
        return $res;
    }
}