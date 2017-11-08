/**
 * Created by Administrator on 2017/10/24.
 */
//判断是否登录过和注销
$(document).ready(function(){
    var login = $.cookie('user');
    console.log(login);
    $("#hello").html('您好，'+"<a href='http://www.lykos.com/pages/psl-basic-information.html'>"+login+"</a>");
    if(login == 'null' || login == undefined){
        $("#signIn").show();
        $("#gou").hide();
    }else{
        $("#gou").show();
        $("#signIn").hide();
    }
    //注销
    $("#SignOut").click(function(){
        if(confirm("确定退出吗？")){
            $.cookie('user',null);
        }
        $("#signIn").show();
    });
});
//轮播图


