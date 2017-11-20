//邮箱注册
//发送文件
function settime() {
    var phone = $("#mailbox").val();;
    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if(!myreg.test(phone)){
        layer.msg('暂只支持邮箱登录，请重新输入正确邮箱号...', {icon: 2});
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
                    layer.msg('邮件发送成功...', {icon: 1});
                }
                if(data==1){
                    layer.msg('邮件发送失败...', {icon: 1});
                }
            }
        })
    }
}

//第二步注册
function register() {
    var mailbox = $("#mailbox").val();
    var ent_pwd = $("#ent_pwd").val();
    if(mailbox==""){
        layer.msg('邮箱不能为空，请输入邮箱...', {icon: 2});
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
            ent_mailbox: mailbox,
            ent_pwd:ent_pwd,
            ent_code:$("#ent_code").val()
        },
        dataType: "jsonp",
        success:function (data) {
            if(data == 0 ){
                $.cookie('ent',mailbox);
                window.location.href="http://www.lykos.com/pages/cpy-basic-information.html";
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
