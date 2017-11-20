$(document).ready(function(){
    $.ajax({
        type:"get",
        url:"http://www.text.com/index.php/home/Cpysearch/comTalent",
        dataType:"jsonp",
        success:function (data) {
            var message = data[0];
            var introduce = data[1];
            var course = data[2];
            console.log(introduce);
            for(i=0; i<message.length;i++){
                $("#user_portrait").attr('src',message[i]['ent_portrait']);
                $("#ent_name").html("公司名："+message[i]['ent_name']);
                $("#ent_scale").html("公司规模："+message[i]['ent_scale']);
                $("#ent_address").html("&nbsp;&nbsp;公司地址："+message[i]['ent_address']);
                $("#ent_website").html("&nbsp;&nbsp;公司网址："+message[i]['ent_website']);
                $("#ent_info").html("&nbsp;&nbsp;公司介绍："+message[i]['ent_info']);
                $("#ent_mailbox").html("&nbsp;&nbsp;公司邮箱："+message[i]['ent_mailbox']);
                $("#ent_phone").html("&nbsp;&nbsp;公司电话："+message[i]['ent_phone']);
            }
            for(i=0; i<introduce.length;i++){
                $("#ent_introduce").html(introduce[i]['ent_introduce']);
            }
        }
    });
});
