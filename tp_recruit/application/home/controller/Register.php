<?php
namespace app\home\controller;
use app\home\controller\Basd;
use app\home\model\RegisterModel;
use think\Session;
use think\Loader;
use think\Request;
use think\captcha\Captcha;
class Register extends Basd
{
    //手机注册
    public function userRegister()
    {
        $request = Request::instance();
        //获取get的参数
        $callback = $request->get('callback');
        //获取输入的手机号
        $data['phone'] = $request->get('phone');
        //获取输入的密码数字
        $pwd = $request->get('user_pwd');
        //生成一个加密4位数
        $rand = mt_rand('1000', '9999');
        //获取保存到数据库的密码(双重加密)
        $data['user_pwd'] = md5($pwd + $rand);
        //获取IP地址
        $data['user_ip'] = $request->ip();
        //提取当前时间
        $data['user_addtime'] = time();
        //user_rand字段
        $data['user_rand'] = $rand;
        //判断该手机是否注册过
        $model = new RegisterModel();
        $phone = $model->phone($data['phone']);
        if(!$phone){
            $code = $request->get('user_code');
            $phoneCode = Session::get('phoneCode');//调用session
            if($code == $phoneCode){
                //清除Session
                Session::delete('phoneCode');
                $res = $model->sigInsert($data);
                if($res){
                    $row = $model->phone($data['phone']);
                    Session::set("user_id",$row['id']);
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
    public function mailboxRegister()
    {
        $request = Request::instance();
        //获取get的参数
        $callback = $request->get('callback');
        //获取输入的邮箱
        $data['mailbox'] = $request->get('mailbox');
        //获取输入的密码数字
        $pwd = $request->get('user_pwd');
        //生成一个加密4位数
        $rand = mt_rand('1000', '9999');
        //获取保存到数据库的密码(双重加密)
        $data['user_pwd'] = md5($pwd + $rand);
        //获取IP地址
        $data['user_ip'] = $request->ip();
        //提取当前时间
        $data['user_addtime'] = time();
        //user_rand字段
        $data['user_rand'] = $rand;
        //判断该邮箱是否注册过
        $model = new RegisterModel();
        $mailbox = $model->mailbox($data['mailbox']);
        if(!$mailbox){
            $code = $request->get('user_code');
            $phoneCode = Session::get('mailboxCode');//调用session
            if($code == $phoneCode){
                //清除Session
                Session::delete('mailboxCode');
                    $res = $model->sigInsert($data);
                if($res){
                    $row = $model->mailbox($data['mailbox']);
                    Session::set("user_id",$row['id']);
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
        $phone = $request->get('phone');
        //验证码判断
        $Verif = $request->get('code');
        $verification = new Captcha();
        $code = $verification->check($Verif);
        if($code){
            //model查询数据(用户判断)
            $model = new RegisterModel();
            $res = $model->phoneSignIn($phone);
            if($res){
                //密码判断
                $password = $request->get('user_pwd');
                if($res['user_pwd']==md5($password+$res['user_rand'])){
                    Session::set("user_id",$res['id']);
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
        $mailbox = $request->get('mailbox');
        //验证码判断
        $Verif = $request->get('code');
        $verification = new Captcha();
        $code = $verification->check($Verif);
        if($code){
            //model查询数据(用户判断)
            $model = new RegisterModel();
            $res = $model->mailboxSignIn($mailbox);
            if($res){
                //密码判断
                $password = $request->get('user_pwd');
                if($res['user_pwd']==md5($password+$res['user_rand'])){
                    Session::set('user_id',$res['id']);
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
//手机短信登录
    public function phone(){
        $request = Request::instance();
        $callback = $request->get('callback');
        $data = $request->get('phone');
        $Verif = $request->get('code');
        //查询这条数据是否存在
        $model = new RegisterModel();
        $res = $model->phoneSignIn($data);
        if($res){
            //调用Session手机
            $phone_code = $request->get('phone_code');
            $phoneCode = Session::get('phoneCode');
            if($phone_code==$phoneCode){
                //清除Session
                Session::delete('phoneCode');
                //验证验证码
                $verification = new Captcha();
                $code = $verification->check($Verif);
                if($code){
                    Session::set("user_id",$res['id']);
                    echo $callback."(1)";
                }else{
                    echo $callback."(2)";
                }
            }else{
                echo $callback."(3)";
            }
        }else{
            echo $callback."(4)";
        }
  }
    //找回密码
    public function password(){
        $request = Request::instance();
        $callback = $request->get('callback');
        $data = $request->get('phone');
        $Verif = $request->get('code');
        $phone_code = $request->get('phone_code');
        $verification = new Captcha();
        $code = $verification->check($Verif);
        if($code){
            $phoneCode=Session::get('phoneCode');
            if($phone_code==$phoneCode){
                $model = new RegisterModel();
                $res = $model->phoneSignIn($data);
                if($res){
                    echo $callback."(1)";
                }else{
                    echo $callback."(2)";
                }
            }else{
                echo $callback."(3)";
            }
        }else{
            echo $callback."(4)";
        }
    }
    //找回密码(修改)
    public function backPassword(){
        $request = Request::instance();
        $callback = $request->get('callback');
        $phone = $request->get('phone');
        $data['password'] = $request->get('password');
        $rand = mt_rand('1000', '9999');
        $password =md5($data['password'] + $rand);
        $model = new RegisterModel();
        $res =$model->backPassword( $phone,$password,$rand);
        if($res){
            echo $callback."(0)";
        }else{
            echo $callback."(1)";
        }
    }
}

