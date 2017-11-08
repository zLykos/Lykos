$(document).ready(function () {
    //获取当前时间

    function p(s) {
        return s < 10 ? '0' + s: s;
    }

    var myDate = new Date();
//获取当前年
    var year=myDate.getFullYear();
//获取当前月
    var month=myDate.getMonth()+1;
//获取当前日
    var date=myDate.getDate();
    var h=myDate.getHours();       //获取当前小时数(0-23)
    var m=myDate.getMinutes();     //获取当前分钟数(0-59)
    var s=myDate.getSeconds();

    var now=year+'-'+p(month)+"-"+p(date)+" "+p(h)+':'+p(m)+":"+p(s);
    $("#dataone").append("<p>"+"当前时间:"+now+"<p/>");

    $.ajax({
        //传递方式
        type: "get",
        //ajax跨域的路径
        url: "http://www.text.com/index.php/home/Personal/resumeUser",
        //数据
        dataType: "jsonp",
        success: function (data) {
            //console.log(data);

            var message = data[0];
            var study = data[1];
            var work = data[2];
            var resume = data[3];
             //console.log(study);
            //基本信息
            for(i=0; i<message.length;i++){
                $("#user_portrait").attr('src',message[i]['user_portrait']);
                $("#name").html(message[i]['user_name']);
                $("#user_sex").html(message[i]['user_sex']);
                $("#user_age").html(message[i]['user_age']);
                $("#user_education").html(message[i]['user_education']);
                $("#user_major").html(message[i]['user_major']);
                $("#phone").html(message[i]['user_phone']);
                $("#user_address").html(message[i]['user_address']);
                $("#mailbox").html(message[i]['user_mailbox']);
            }
            //教育经历
            //console.log(study);
            // console.log(study[0]);

            for(i=0; i<study.length;i++){
                $("#study").append("<div id ='page' style='margin-left: 20%;'>" +
                    "<table>"+
                    "<tr>"+"<th>"+"就读学校："+"<th/>"+"<td>"+study[i]['stu_school']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"就读专业："+"<th/>"+"<td>"+study[i]['stu_major']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"入校时间："+"<th/>"+"<td>"+study[i]['stu_begintime']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"离校时间："+"<th/>"+"<td>"+study[i]['stu_endtime']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"当时学位："+"<th/>"+"<td>"+study[i]['stu_degree']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"最高学位："+"<th/>"+"<td>"+study[i]['stu_address']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"<a href=''>"+"删除"+"<a/>"+"<th/>"+"<th>"+"<a href=''>"+"修改"+"<a/>"+"<th/>"+"<tr/>"+
                    "<table/>"+
                    "<div/>"+"<hr/>")
            }
            //工作经历
            for(i=0; i<work.length;i++){
                $("#work").append("<div id ='page' style='margin-left: 20%;'>" +
                    "<table>"+
                    "<tr>"+"<th>"+"起始时间："+"<th/>"+"<td>"+work[i]['work_bejintime']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"结束时间："+"<th/>"+"<td>"+work[i]['work_endtime']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"公司名称："+"<th/>"+"<td>"+work[i]['work_cor_name']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"工作岗位："+"<th/>"+"<td>"+work[i]['work_post']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"岗位描述："+"<th/>"+"<td>"+work[i]['work_describe']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"工作地点："+"<th/>"+"<td>"+work[i]['work_address']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"<a href=''>"+"删除"+"<a/>"+"<th/>"+"<th>"+"<a href=''>"+"修改"+"<a/>"+"<th/>"+"<tr/>"+
                    "<table/>"+
                    "<div/>"+"<hr/>")
            }
            //自我评价
            for(i=0; i<resume.length;i++){
                $("#Expected_work").append("<div id ='page' style='margin-left: 20%;'>" +
                    "<table>"+
                    "<tr>"+"<th>"+"求职岗位："+"<th/>"+"<td>"+resume[i]['res_post']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"期望薪资："+"<th/>"+"<td>"+resume[i]['res_salary']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"期望城市："+"<th/>"+"<td>"+resume[i]['res_city']+"<td/>"+"<tr/>"+
                    "<tr>"+"<th>"+"是否全职："+"<th/>"+"<td>"+resume[i]['res_nature']+"<td/>"+"<tr/>"+
                    "<table/>"+
                    "<div/>"+"<hr/>");
                $("#res_evaluate").append("<div style='word-break:break-all; word-wrap:break-word ; text-align: left;'>" +
                    "<div>"+
                    "<p>"+resume[i]['res_evaluate']+"<p/>"+
                    "<div/>"+
                    "<div/>"+"<hr/>");
                $("#res_Interest").append("<div style='word-break:break-all; word-wrap:break-word ; text-align: left;'>" +
                    "<div>"+
                    "<p>"+resume[i]['res_Interest']+"<p/>"+
                    "<div/>"+
                    "<div/>"+"<hr/>");
                $("#res_state").append("<div style='color: royalblue;'>" +
                    "<div>"+
                    "<p>"+resume[i]['res_state']+"<p/>"+
                    "<div/>"+
                    "<div/>"+"<hr/>")

            }
        }
    })
});
