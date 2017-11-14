<?php
namespace app\home\controller;
use app\home\controller\Basd;
use think\Loader;
use think\Session;
use think\captcha\Captcha;
class Start extends Basd{
    public function mailbox(){
        $callback = $_GET['callback'];
        //用input函数来获取input框数据(从ajax中抓取的数据)
        $phone = input('phone');
//        var_dump($phone);
        //生成一个1000到9999之间的一个随机数
        $res = mt_rand('1000','9999');
        //把验证码存入session中
        Session::set('mailboxCode',$res);

        Loader::import("mailbox.PHPMailerAutoload");
        $mail = new \PHPMailer(true); //建立邮件发送类
        $mail->CharSet = "UTF-8";//设置信息的编码类型
        $address = $phone;//收件人地址
        $mail->IsSMTP(); // 使用SMTP方式发送
        $mail->Host = "smtp.163.com"; //使用163邮箱服务器
        $mail->SMTPAuth = true; // 启用SMTP验证功能
        $mail->Username = "Lykos2937@163.com"; //你的163服务器邮箱账号
        $mail->Password = "Lykos2937"; // 163邮箱密码
        $mail->Port = 25;//邮箱服务器端口号
        $mail->From = "Lykos2937@163.com"; //邮件发送者email地址
        $mail->FromName = "四大才子";//发件人名称
        $mail->AddAddress("$address", "困死"); //收件人地址，可以替换成任何想要接收邮件的email信箱,格式是AddAddress("收件人email","收件人姓名")
        // $mail->AddAttachment("D:\abc.txt"); // 添加附件(注意：路径不能有中文)
        $mail->IsHTML(true);//是否使用HTML格式
        $mail->Subject = "哈喽"; //邮件标题
        $mail->Body = $res; //邮件内容，上面设置HTML，则可以是HTML
        if (!$mail->Send()) {
            echo "邮件发送失败. <p>";
            echo "错误原因: " . $mail->ErrorInfo;
            echo $callback."(1)";
            exit;
        }else {
            echo $callback."(0)";
        }
    }

    public function phone(){
        $callback = $_GET['callback'];
        //用input函数来获取input框数据(从ajax中抓取的数据)
        $phone = input('phone');
        //生成一个1000到9999之间的一个随机数验证码
        $res = mt_rand('1000','9999');
        //把验证码存入session中
        Session::set('phoneCode',$res);
        //给指定的手机发送消息
        $row = $this->mobilePhone("$phone", array($res, '5'), "1");
        //执行代码后返回的数据、
        if($row){
            echo $callback."(0)";
        }else{
            echo $callback."(1)";
        }

    }
    public function mobilePhone($to,$datas,$tempId)
    {
//主帐号,对应开官网发者主账号下的 ACCOUNT SID
        $accountSid = '8a216da85f341b69015f38fcfd670306';

//主帐号令牌,对应官网开发者主账号下的 AUTH TOKEN
        $accountToken = '8125cd2181b743429cdea0d2394706ce';

//应用Id，在官网应用列表中点击应用，对应应用详情中的APP ID
//在开发调试的时候，可以使用官网自动为您分配的测试Demo的APP ID
        $appId = '8a216da85f341b69015f38fcfdc0030c';

//请求地址
//沙盒环境（用于应用开发调试）：sandboxapp.cloopen.com
//生产环境（用户应用上线使用）：app.cloopen.com
        $serverIP = 'app.cloopen.com';


//请求端口，生产环境和沙盒环境一致
        $serverPort = '8883';

//REST版本号，在官网文档REST介绍中获得。
        $softVersion = '2013-12-26';
//        global $accountSid, $accountToken, $appId, $serverIP, $serverPort, $softVersion;
//        重点调用的think文件下的Loader中的import方法
        Loader::import("Phone.Rest");
        $rest = new \Rest($serverIP, $serverPort, $softVersion);
        $rest->setAccount($accountSid, $accountToken);
        $rest->setAppId($appId);

        // 发送模板短信
        $result = $rest->sendTemplateSMS($to, $datas, $tempId);
        if ($result == NULL) {
//         break;
            return false;
        }
        if ($result->statusCode != 0) {
            return false;
        } else {
           return true;
        }
    }
    //验证码生成
    public function verificationCode(){
        $config =    [
            // 验证码字体大小
            'fontSize'    =>    16,
            // 验证码位数
            'length'      =>    4,
            // 关闭验证码杂点
            'useNoise'    =>    false,
            //验证码图片高度
            'imageH'      =>   40,
            //验证码图片宽度
            'imageW'      =>  120,
        ];
        $verification = new Captcha($config);
        //check 验证验证码
        //$verification->check();
        //entry生成验证码
        return $verification->entry();
    }
}