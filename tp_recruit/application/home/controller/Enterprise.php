<?php
namespace app\home\controller;
use app\home\controller\Basd;
use app\home\model\EnterpriseModel;
use think\Session;
use think\Loader;
use think\Request;
use think\captcha\Captcha;
class Enterprise extends Basd{
    //手机注册
    public function entRegister(){
        $request = Request::instance();
        //获取get的参数
        $callback = $request->get('callback');
        //获取输入的手机号
        $data['ent_phone'] = $request->get('ent_phone');
        //获取输入的密码数字
        $pwd = $request->get('ent_pwd');
        //生成一个加密4位数
        $rand = mt_rand('1000', '9999');
        //获取保存到数据库的密码(双重加密)
        $data['ent_pwd'] = md5($pwd.$rand);
        //获取IP地址
        $data['ent_ip'] = $request->ip();
        //提取当前时间
        $data['ent_time'] = time();
        //user_rand字段
        $data['ent_rand'] = $rand;
        //判断该邮箱是否注册过
        $model = new EnterpriseModel();
        $phone = $model->phone($data['ent_phone']);
        if(!$phone){
            $code = $request->get('ent_code');
            $phoneCode = Session::get('phoneCode');//调用session
            if($code == $phoneCode){
                //清除Session
                Session::delete('phoneCode');
                $res = $model->sigInsert($data);
                if($res){
                    $row = $model->phone($data['ent_phone']);
                    Session::set("ent_id",$row['id']);
                    echo $callback . "(0)";
                }else{
                    echo $callback . "(1)";
                }
            }else{
                echo $callback . "(2)";
            }
        }else{
            echo $callback . "(3)";
        }
    }
    //邮箱注册
    public function mailboxRegister(){
        $request = Request::instance();
        //获取get的参数
        $callback = $request->get('callback');
        //获取输入的邮箱
        $data['ent_mailbox'] = $request->get('ent_mailbox');
        //获取输入的密码数字
        $pwd = $request->get('ent_pwd');
        //生成一个加密4位数
        $rand = mt_rand('1000', '9999');
        //获取保存到数据库的密码(双重加密)
        $data['ent_pwd'] = md5($pwd + $rand);
        //获取IP地址
        $data['ent_ip'] = $request->ip();
        //提取当前时间
        $data['ent_time'] = time();
        //user_rand字段
        $data['ent_rand'] = $rand;
        //判断该邮箱是否注册过
        $model = new EnterpriseModel();
        $mailbox = $model->mailbox($data['ent_mailbox']);
        if(!$mailbox){
            $code = $request->get('ent_code');
            $phoneCode = Session::get('mailboxCode');
            if($code == $phoneCode){
                //清除Session
                Session::delete('mailboxCode');
                $res = $model->sigInsert($data);
                if($res){
                    $row = $model->mailbox($data['ent_mailbox']);
                    Session::set("ent_id",$row['id']);
                    echo $callback . "(0)";
                }else{
                    echo $callback . "(1)";
                }
            }else{
                echo $callback . "(2)";
            }
        }else{
            echo $callback . "(3)";
        }
    }
//密码账号登录（手机）
    public function phoneSignIn(){
        $request = Request::instance();
        $callback = $request->get('callback');
        $phone = $request->get('ent_phone');
        //验证码判断
        $Verif = $request->get('code');
        $verification = new Captcha();
        $code = $verification->check($Verif);
        if($code){
            //model查询数据(用户判断)
            $model = new EnterpriseModel();
            $res = $model->phoneSignIn($phone);
            if($res){
                //密码判断
                $password = $request->get('ent_pwd');
                if($res['ent_pwd']==md5($password+$res['ent_rand'])){
                    Session::set("ent_id",$res['id']);
                    echo $callback."(0)";
                }else{
                    echo $callback."(1)";
                }
            }else{
                echo $callback."(2)";
            }
        }
        else{
            echo $callback."(3)";
        }
    }
//密码账号登录（邮箱）
    public function mailboxSignIn(){
        $request = Request::instance();
        $callback = $request->get('callback');
        $mailbox = $request->get('ent_mailbox');
        //验证码判断
        $Verif = $request->get('code');
        $verification = new Captcha();
        $code = $verification->check($Verif);
        if($code){
            //model查询数据(用户判断)
            $model = new EnterpriseModel();
            $res = $model->phoneSignIn($mailbox);
            if($res){
                //密码判断
                $password = $request->get('ent_pwd');
                if($res['ent_pwd']==md5($password+$res['ent_rand'])){
                    Session::set("ent_id",$res['id']);
                    echo $callback."(0)";
                }else{
                    echo $callback."(1)";
                }
            }else{
                echo $callback."(2)";
            }
        }
        else{
            echo $callback."(3)";
        }
    }
}