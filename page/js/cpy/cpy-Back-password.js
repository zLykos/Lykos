function settime(){
    var phone = $("#mailbox").val();
    var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
    if(!myreg.test(phone)){
        layer.msg('格式不对，请重新输入正确邮箱号...', {icon: 2});
        return false;
    }else{
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
        });
    }
}
$(document).ready(function(){
    $("#btn").click(function(){
        var code = $("#code").val();
        var ent_code= $("#smsCode").val();
        var phone = $("#mailbox").val();
        var myreg = /^([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\_|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/;
        if(!myreg.test(phone)){
            layer.msg('邮箱格式错误.请重新输入...', {icon: 2});
        }else{
            $.ajax({
                //传递方式
                type: "get",
                //ajax跨域的路径
                url: "http://www.text.com/index.php/home/Enterprise/mailbox",
                //数据
                data: {
                    mailbox:phone,
                    code:code,
                    ent_code:ent_code
                },
                //跨域方法
                dataType: "jsonp",
                success: function (data) {
                    if( data == 1 ){
                        $.cookie('phone',phone);
                        window.location.href="http://www.lykos.com/pages/cpy-Reset-password .html";
                    }
                    if( data == 2 ){
                        layer.msg('用户不存在', {icon: 2});
                        $("#captcha").attr("src","http://www.text.com/index.php/home/Enterprise/verificationCode?a="+Math.random());
                        return false;
                    }
                    if(data == 3){
                        $("#captcha").attr("src","http://www.text.com/index.php/home/Enterprise/verificationCode?a="+Math.random());
                        layer.msg('手机验证码错误...', {icon: 2});
                        return false;
                    }
                    if( data == 4 ){
                        $("#captcha").attr("src","http://www.text.com/index.php/home/Enterprise/verificationCode?a="+Math.random());
                        layer.msg('验证码错误...', {icon: 2});
                        return false;
                    }

                }
            })
        }
    })
});
