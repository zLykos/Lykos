//邮箱注册
//发送文件
function settime() {
    // if(preg_match("/^1[34578]\d{9}$/",phone)){
    //     alert(66666);
    // }
    var phone = $("#mailbox").val();;
    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if(!myreg.test(phone)){
        layer.msg('提示\n\n请输入有效的E_mail！，请重新输入...', {icon: 2});
        return false;
    }else {
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
                }
                if(data==1){
                    layer.msg('短信发送失败...', {icon: 1});
                }
            }


        })
    }
}
//根据返回的验证码注册；
//第二步注册
function register() {
    var mailbox = $("#mailbox").val();
    var ent_pwd = $("#ent_pwd").val();
    //手机号验证
    if(mailbox==""){
        layer.msg('手机号码不能为空，请输入手机号...', {icon: 2});
        return false;
    }
    //密码验证
    if(ent_pwd==""){
        layer.msg('密码不能为空，请输入密码...', {icon: 2});
        return false;
    }
    //验证码验证

    //ajsx
    //    console.log(code);
    $.ajax({
        type:"get",
        //ajax跨域的路径
        url:"http://www.text.com/index.php/home/Enterprise/mailboxRegister",
        data:{
            mailbox: mailbox,
            ent_pwd:ent_pwd,
            ent_code:$("#ent_code").val()
        },
        dataType: "jsonp",
        success:function (data) {
            if(data == 0 ){
                $.cookie('ent',mailbox, { expires: 1, path: '/' });
                window.location.href="http://www.lykos.com/pages/search-talent.html";
            }
            if(data == 1 ){
                layer.msg('注册失败.请重新输入...', {icon: 2});
                //alert("注册失败");
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
