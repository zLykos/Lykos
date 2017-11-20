
//发送文件
function settime() {
    //验证码获取倒计时
    // if(preg_match("/^1[34578]\d{9}$/",phone)){
    //     alert(66666);
    // }
    var phone = document.getElementById("mailbox");
    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if(!myreg.test(phone.value)){
        layer.msg('提示\n\n请输入有效的E_mail！，请重新输入...', {icon: 2});
        return false;
    }else {
            var phone = $("#mailbox").val();
        $.ajax({
            type:"get",
            url:"http://www.text.com/index.php/home/Start/mailbox",
            data:{
                phone:phone
            },
            dataType:"jsonp",
            success:function (data) {
                if(data==0){
                    layer.msg('短信发送成功...', {icon: 1});
                     invokeSettime("#getMsgCode");
                }
                if(data==1){
                    layer.msg('短信发送失败...', {icon: 1});
                }
            }


        })
    }
}
function invokeSettime(obj){
    var countdown=6;
    settime(obj);
    function settime(obj) {
        if (countdown == 0) {
            $(obj).attr("disabled",false);
            $(obj).val("获取验证码");
            countdown = 6;
            return;
        } else {
            $(obj).attr("disabled",true);
            $(obj).val("(" + countdown + ") s 重新发送");
            countdown--;
        }
        setTimeout(function() {
                settime(obj) }
            ,1000)
    }
}
//根据返回的验证码注册；
//第二步注册
function register() {
    var mailbox = $("#mailbox").val();
    var user_pwd = $("#user_pwd").val();
    //手机号验证
    if(mailbox==""){
        layer.msg('邮箱号码不能为空，请输入手机号...', {icon: 2});
        return false;
    }
    //密码验证
    if(user_pwd==""){
        layer.msg('密码不能为空，请输入密码...', {icon: 2});
        return false;
    }
    //验证码验证

    //ajsx
    //    console.log(code);
    $.ajax({
        type:"get",
        //ajax跨域的路径
        url:"http://www.text.com/index.php/home/Register/mailboxRegister",
        data:{
            mailbox: mailbox,
            user_pwd:user_pwd,
            user_code:$("#user_code").val()
        },
        dataType: "jsonp",
        success:function (data) {
            if(data == 0 ){
                $.cookie('user',mailbox);
                window.location.href="http://www.lykos.com/pages/psl-basic-information.html";
            }
            if(data == 1 ){
                layer.msg('注册失败.请重新输入...', {icon: 2});
                return false;
            }
            if(data == 2 ){
                layer.msg('验证码错误,请重新注册...', {icon: 2});
                return false;
            }
            if(data == 3){
                layer.msg('该邮箱已经注册过...', {icon: 2});
                return false;
            }
        }
    })
}


