//头像
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
    //本地存储
    //基本信息
    $(".next1").click(function(){
        var data1 = {};
        data1.user_portrait=$("#img1").attr('src');
        data1.user_name=$("#user_name").val();
        data1.user_age=$("#user_age").val();
        data1.user_phone=$("#user_phone").val();
        data1.user_major=$("#user_major").val();
        //id是province的select中的option
        data1.user_education=$('#user_education option:selected').text();
        data1.user_degree=$('#user_degree option:selected').text();
        data1.user_mailbox=$("#user_mailbox").val();
        data1.user_address=$("#user_address").val();
        data1.user_sex=$("#user_sex").val();
        //把数据压入key中
        localStorage.setItem('info1',JSON.stringify(data1));
       window.location.href = "http://www.lykos.com/pages/psl-education-experience.html";
    });
    //教育经历
    $(".next2").click(function (){
        var info1=localStorage.getItem("info1");
        console.log(info1);
        var data2 = {};
        data2.stu_school=$("#stu_school").val();
        data2.stu_major=$("#stu_major").val();
        data2.stu_address=$("#stu_address").val();
        data2.stu_begintime=$('#stu_begintime option:selected').text();
        data2.stu_endtime=$('#stu_endtime option:selected').text();
        data2.stu_degree=$('#stu_degree option:selected').text();
        localStorage.setItem("info2",JSON.stringify(data2));
        window.location.href = "http://www.lykos.com/pages/psl-work-experience.html";
    });
    //工作经历
    $(".next3").click(function () {
        var data3 = {};
         data3.work_cor_name= $("#work_cor_name").val();
         data3.work_post= $("#work_post").val();
         data3.work_address=$("#work_address").val();
         data3.work_bejintime=$('#work_bejintime option:selected').text();
         data3.work_endtime=$('#work_endtime option:selected').text();
         data3.work_describe=$('#work_describe').val();
         localStorage.setItem("info3",JSON.stringify(data3));
        window.location.href = "http://www.lykos.com/pages/psl-evaluate.html";

    });
    //自我评价和兴趣爱好
    $(".next4").click(function () {
        var info1=localStorage.getItem("info1");
        var info2=localStorage.getItem("info2");
        var info3=localStorage.getItem("info3");

        var data4 = {};
        data4.res_post = $("#res_post").val();
        data4.res_salary= $("#res_salary").val();
        data4.res_evaluate = $("#res_evaluate").val();
        data4.res_Interest = $("#res_Interest").val();
        localStorage.setItem("info4",JSON.stringify(data4));
        var info4=localStorage.getItem("info4");

        var data={
            data1:info1,
            data2:info2,
            data3:info3,
            data4:info4
        };
        console.log(data);
        $.ajax({
            type:"get",
            url:"http://www.text.com/index.php/home/Personal/perfectUser",
            data:data,
            dataType:"jsonp",
            success:function (data) {
                if(data==0){
                    window.location.href="http://www.lykos.com/pages/psl-My-resume.html"
                }
                if(data==1){
                    layer.msg('信息编写失败.请重新编写...', {icon: 2});
                    //alert("注册失败");
                    return false;
                }
            }
        })
    })


});


