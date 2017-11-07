
//个人手机注册.
//第一步向手机发送消息并验证手机格式；
function settime() {
    var phone = document.getElementById('ent_phone').value;
    if(phone==""){
        layer.msg('手机号码不能为空，请重新输入...', {icon: 2});
        return false;
    }
    if(!(/^1[34578]\d{9}$/.test(phone))) {
        layer.msg('手机号码格式不对，请重新输入...', {icon: 2});
        return false;
    }else {
        var phone = $("#ent_phone").val();
        console.log(phone);
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
                    //alert('短信发送失败...')
                }
            }


        })
    }
}
//第二步注册
function register() {
    var ent_phone =$("#ent_phone").val();
    var ent_pwd =$("#ent_pwd").val();
    //手机号验证
    if(ent_phone==""){
        layer.msg('手机号码不能为空，请输入手机号...', {icon: 2});
        return false;
    }
    //密码验证
    if(ent_pwd==""){
        layer.msg('密码不能为空，请输入密码...', {icon: 2});
        return false;
    }
    $.ajax({
        type:"get",
        //ajax跨域的路径
        url:"http://www.text.com/index.php/home/Enterprise/entRegister",
        data:{
            ent_phone:ent_phone ,
            ent_pwd:ent_pwd,
            ent_code:$("#ent_code").val()
        },
        dataType: "jsonp",
        success:function (data) {
            if (data == 0) {
                $.cookie('ent', ent_phone, { expires: 1, path: '/' });
                window.location.href = "http://www.lykos.com/pages/search-talent.html";
            }
            if (data == 1) {
                layer.msg('注册失败.请重新输入...', {icon: 2});
                //alert("注册失败");
                return false;
            }
            if (data == 2) {
                layer.msg('验证码错误,请重新注册...', {icon: 2});
                return false;
            }
            if (data == 3) {
                layer.msg('该手机已经注册过...', {icon: 2});
                return false;
            }
        }
    })
}
