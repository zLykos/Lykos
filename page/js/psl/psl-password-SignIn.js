//登录
    $("#btn").click(function(){
        var user_pwd = $("#user_pwd").val();
        var code = $("#code").val();
        if(user_pwd==""){
            layer.msg('...', {icon: 2});
        }
        var user_SignIn = document.getElementById('user_SignIn').value;
        //手机登录
        if((/^1[34578]\d{9}$/.test(user_SignIn))){
            var phone = $("#user_SignIn").val();

            $.ajax({
                //传递方式
                type: "get",
                //ajax跨域的路径
                url: "http://www.text.com/index.php/home/Register/phoneSignIn",
                //数据
                data: {
                    phone: phone,
                    code:code,
                    user_pwd:user_pwd
                },
                //跨域方法
                dataType: "jsonp",
                success: function (data) {
                    // alert("aaa");
                    if( data == 0 ){
                        $.cookie('user', phone);
                         // var login = $.cookie('user');
                         // console.log(login);
                        window.location.href="http://www.lykos.com/pages/serch-job.html";
                    }
                    if( data == 1 ){
                        layer.msg('密码错误...', {icon: 2});
                        //alert("注册失败");
                        return false;
                    }
                    if(data == 2){
                        layer.msg('用户不存在...', {icon: 2});
                        return false;
                    }
                    if( data == 3 ){
                        layer.msg('验证码错误...', {icon: 2});
                        $("#captcha").attr("src","http://www.text.com/index.php/home/Start/verificationCode?a="+Math.random());
                        return false;
                    }
                }
            })

        }else{
            //邮箱登录
            var mailbox = $("#user_SignIn").val();

            $.ajax({
                //传递方式
                type: "get",
                //ajax跨域的路径
                url: "http://www.text.com/index.php/home/Register/mailboxSignIn",
                //数据
                data: {
                    mailbox: mailbox,
                    code:code,
                    user_pwd:user_pwd
                },
                //跨域方法
                dataType: "jsonp",
                success: function (data) {
                    if( data == 0 ){
                        $.cookie('user', mailbox);
                        window.location.href="http://www.lykos.com/pages/serch-job.html";
                    }
                    if( data == 1 ){
                        layer.msg('密码错误...', {icon: 2});
                        //alert("注册失败");
                        return false;
                    }
                    if(data == 2){
                        layer.msg('用户不存在...', {icon: 2});
                        return false;
                    }
                    if( data == 3 ){
                        layer.msg('验证码错误...', {icon: 2});
                        $("#captcha").attr("src","http://www.text.com/index.php/home/Start/verificationCode?a="+Math.random());
                        return false;
                    }
                }
            })
        }

    });
