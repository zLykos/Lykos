function settime() {
    var phone = document.getElementById('phone').value;
    if(phone==""){
        layer.msg('手机号码不能为空，请重新输入...', {icon: 2});
        return false;
    }
    if(!(/^1[34578]\d{9}$/.test(phone))) {
        layer.msg('手机号码格式不对，请重新输入...', {icon: 2});
        return false;
    }else {
        $.ajax({
            //传递方式
            type: "get",
            //ajax跨域的路径
            url: "http://www.text.com/index.php/home/Start/phone",
            //数据
            data: {
                phone: phone
            },
            //跨域方法
            dataType: "jsonp",
            success: function (data) {
                if(data==0){
                    layer.msg('短信发送成功...', {icon: 1});
                }
                if(data==1){
                    layer.msg('短信发送失败...', {icon: 2});
                }
            }


        })
    }
}
$(document).ready(function(){
    $("#btn").click(function(){
        var phone = document.getElementById('phone').value;
        if(!(/^1[34578]\d{9}$/.test(phone))){
            layer.msg('手机格式错误.请重新输入...', {icon: 2});
        }else{
            $.ajax({
                //传递方式
                type: "get",
                //ajax跨域的路径
                url: "http://www.text.com/index.php/home/Register/phoneSignIn",
                //数据
                data: {
                    phone:phone,
                    code:$("#code").val(),
                    phone_code:$("#phone_code").val()
                },
                //跨域方法
                dataType: "jsonp",
                success: function (data) {
                    if( data == 1 ){
                        $.cookie('user',phone);
                        window.location.href="http://www.lykos.com/pages/serch-job.html";
                    }
                    if( data == 2 ){
                        layer.msg('验证码错误', {icon: 2});
                        $("#captcha").attr("src","http://www.text.com/index.php/home/Start/verificationCode?a="+Math.random());
                        return false;
                    }
                    if(data == 3){
                        layer.msg('手机验证码错误...', {icon: 2});
                        return false;
                    }
                    if( data == 4 ){
                        layer.msg('用户不存在...', {icon: 2});
                        return false;
                    }

                }
            })
        }
    })
});
