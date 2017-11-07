$(document).ready(function(){
    $("#btn").click(function(){
        var password = $("#password").val();
        var password2 = $("#password2").val();
        var phone = $.cookie('phone');
        if(password != password2 ){
            layer.msg('两次输入的密码不一致，请重新输入...', {icon: 2});
            return false;
        }else{
            $.ajax({
                //传递方式
                type: "get",
                //ajax跨域的路径
                url: "http://www.text.com/index.php/home/Register/backPassword",
                //数据
                data: {
                    phone:phone,
                    password:password
                },
                //跨域方法
                dataType: "jsonp",
                success: function (data) {
                    if(data==0){
                        //window.location.href="http://www.lykos.com/pages/psl-password-SignIn.html"
                    }else if(data==1){
                        layer.msg('修改失败.请重新修改...', {icon: 2});
                        return false;
                    }else{
                        layer.msg('未知错误...', {icon: 2});
                        return false;
                    }
                }
            })
        }
    })
});