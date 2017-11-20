//公司头像
$(function(){
    $("#file1").change(function(){
        Photo();
    })
});
function Photo(){
    $.ajaxFileUpload({
        url:'http://www.text.com/home/Photo/verificationCode',//请求的地址
        secureuri: false, //是否需要安全协议，一般设置为false
        fileElementId: 'file1', //文件上传域的ID
        dataType: 'jsonp', //返回值类型 一般设置为json
        async : true,
        success:function(data,status){
            var obj = JSON.parse(data);//把json字符串转换为json对象
            $("#img1").attr("src", obj.imgurl);
            if (typeof (data.error) != 'undefined') {
                if (data.error != '') {
                    alert(data.error);
                } else {
                    alert(data.msg);
                }
            }
        },
        error: function (data, status, e)//服务器响应失败处理函数
        {
            alert("e");
        }
    })
}
$(document).ready(function(){
    $(".next1").click(function(){
        var img1=$("#img1").attr('src');
        $.cookie("img",img1);
        var data1 ={};
        data1.ent_portrait =img1;
        data1.ent_name =$("#ent_name").val();
        data1.ent_contacts =$("#ent_contacts").val();
        data1.ent_website =$("#ent_website").val();
        data1.ent_address =$("#ent_address").val();
        data1.ent_info=$("#ent_info").find("option:selected").text();
        data1.ent_scale=$("#ent_scale").find("option:selected").text();
        data1.ent_mailbox =$("#ent_mailbox").val();
        data1.ent_phone =$("#ent_phone").val();
        localStorage.setItem('info1',JSON.stringify(data1));
        window.location.href = "http://www.lykos.com/pages/cpy-introduce.html";
    });
    $(".next2").click(function(){
        var data2 ={};
        data2.ent_introduce = $("#ent_introduce").val();
        localStorage.setItem('info2',JSON.stringify(data2));
        window.location.href = "http://www.lykos.com/pages/cpy-course.html";
    });
    $(".next3").click(function(){
        var data3 = {};
        data3.ent_begintime = $("#ent_begintime").val();
        alert(data3.ent_begintime);
        data3.ent_endtime = $("#ent_endtime").val();
        data3.ent_scale = $("#ent_scale").val();
        data3.ent_honor = $("#ent_honor").val();
        data3.ent_project = $("#ent_project").text();
        localStorage.setItem("info3",JSON.stringify(data3));
        var info3=localStorage.getItem("info3");
        var info1=localStorage.getItem("info1");
        var info2=localStorage.getItem("info2");
        var data={
            data1:info1,
            data2:info2,
            data3:info3
        };
        $.ajax({
            type:"get",
            url:"http://www.text.com/index.php/home/Personal/perfectEnter",
            data:data,
            dataType:"jsonp",
            success:function (data) {
                if(data==0){
                    window.location.href="http://www.lykos.com/pages/search-talent.html"
                }
                if(data==1){
                    layer.msg('信息编写失败.请重新编写...', {icon: 2});
                    return false;
                }
            }
        })
    })
});