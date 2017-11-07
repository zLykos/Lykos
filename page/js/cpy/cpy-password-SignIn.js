//登录
//登录
$(document).ready(function(){
    $("#btn").click(function(){
        var ent_pwd = $("#ent_pwd").val();
        var code = $("#code").val();
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        var ent_SignIn = document.getElementById('ent_SignIn').value;
        //手机登录
        if((/^1[34578]\d{9}$/.test(ent_SignIn))){
            var ent_phone = $("#ent_SignIn").val();
            $.ajax({
                //传递方式
                type: "get",
                //ajax跨域的路径
                url: "http://www.text.com/index.php/home/Enterprise/phoneSignIn",
                //数据
                data: {
                    ent_phone: ent_phone,
                    code:code,
                    ent_pwd:ent_pwd
                },
                //跨域方法
                dataType: "jsonp",
                success: function (data) {
                    if( data == 0 ){
                        $.cookie('ent', ent_phone, { expires: 1, path: '/' });
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
                        return false;
                    }
                }
            })

        }else if(!myreg.test(ent_SignIn)){
            //邮箱登录
            var ent_mailbox = $("#ent_SignIn").val();
            $.ajax({
                //传递方式
                type: "get",
                //ajax跨域的路径
                url: "http://www.text.com/index.php/home/Enterprise/mailboxSignIn",
                //数据
                data: {
                    ent_mailbox: ent_mailbox,
                    code:code,
                    ent_SignIn:ent_SignIn
                },
                //跨域方法
                dataType: "jsonp",
                success: function (data) {
                    if( data == 0 ){
                        $.cookie('ent', ent_mailbox, { expires: 1, path: '/' });
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
                        return false;
                    }
                }
            })
        }
    })
});