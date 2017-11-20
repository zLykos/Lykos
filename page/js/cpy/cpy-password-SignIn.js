$(document).ready(function(){
    $(".btn").click(function(){
        //alert('xxxxxxxxxxxxx');
        var ent_pwd = $("#ent_pwd").val();
        var code = $("#code").val();
        var ent_mailbox = $("#ent_SignIn").val();
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
           if(!myreg.test(ent_mailbox)) {
               $("#captcha").attr("src","http://www.text.com/index.php/home/Enterprise/verificationCode?a="+Math.random());
               layer.msg('账号格式错误...', {icon: 2});
           }else{
            //邮箱登录
            $.ajax({
                //传递方式
                type: "get",
                //ajax跨域的路径
                url: "http://www.text.com/index.php/home/Enterprise/mailboxSignIn",
                //数据
                data: {
                    ent_mailbox: ent_mailbox,
                    code:code,
                    ent_pwd:ent_pwd
                },
                //跨域方法
                dataType: "jsonp",
                success: function (data) {
                    console.log(data);
                    if( data == 0 ){
                        $.cookie('ent', ent_mailbox);
                        window.location.href="http://www.lykos.com/pages/search-talent.html";
                    }
                    if( data == 1 ){
                        $("#captcha").attr("src","http://www.text.com/index.php/home/Enterprise/verificationCode?a="+Math.random());
                        layer.msg('密码错误...', {icon: 2});
                        //alert("注册失败");
                        return false;
                    }
                    if(data == 2){
                        $("#captcha").attr("src","http://www.text.com/index.php/home/Enterprise/verificationCode?a="+Math.random());
                        layer.msg('用户不存在...', {icon: 2});
                        return false;
                    }
                    if( data == 3 ){
                        $("#captcha").attr("src","http://www.text.com/index.php/home/Enterprise/verificationCode?a="+Math.random());
                        layer.msg('验证码错误...', {icon: 2});
                        return false;
                    }
                }
            })
        }
    })
});