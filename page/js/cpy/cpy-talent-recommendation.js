$(document).ready(function() {
    //人才推荐
    $.ajax({
        type: "get",
        url: "http://www.text.com/index.php/home/Cpysearch/Talent",
        dataType: "jsonp",
        success: function (data1) {
            console.log(data);
            var data = data1[0];
            if ($state == 1) {
                $("#biuuu_city_list").append("<div id='vaite-conent'>" +
                    "<div class='first-vconent'>" +
                    "<div class='three-btn'>" +
                    "<div class='t-btn colorpage' id='1'>" + "已查看" + "</div>" +
                    "<div class='t-btn' id='2'>" + "邀面试" + "</div>" +
                    "<div class='t-btn' id='3'>" + "不合适" + "</div>" +
                    "</div>" +
                    "<div class='v-heade'>" +
                    "<div class='v-circle'>" +
                    "<img id='user_portrait' src=" + data[i]['user_portrait'] + ">" +
                    "</div>" +
                    "<div class='v-heade-text'>" + data[i]['res_salary'] + "</div>" +
                    "</div>" +
                    "<div class='vaite-text'>" +
                    "<div class='v-imformation'>" +
                    "<div id=" + data[i]['user_id'] + " class='username'>" + data[i]['user_name'] + "</div>" +
                    "<div>" + "期望职位:" + data[i]['res_post'] + "</div>" +
                    "<div>" + "期望城市:" + data[i]['res_city'] + "</div>" +
                    "</div>" +
                    "<div class='v-imformation'>" +
                    "<div>" + data[i]['user_age'] + "</div>" +
                    "<div>" + data[i]['user_degree'] + "</div>" +
                    "<div>" + data[i]['user_time'] + "&nbsp;&nbsp;&nbsp;" + data[i]['user_education'] + "</div>" +
                    "</div>" +
                    "<div class='v-imformation'>" +
                    "<div>" + data[i]['user_study'] + "</div>" +
                    "<div>" + data[i]['user_major'] + "</div>" +
                    "<div class='res_post' id='res_post'>" + data[i]['res_post'] + "</div>" +
                    "<div>" + data[i]['res_nature'] + "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='v-line'>" + "</div>" +
                    "</div>" +
                    "<div id='resume'>" + "</div>" +
                    "</div>"
                );
            } else if ($state == 2) {
                $("#biuuu_city_list").append("<div id='vaite-conent'>" +
                    "<div class='first-vconent'>" +
                    "<div class='three-btn'>" +
                    "<div class='t-btn' id='1'>" + "已查看" + "</div>" +
                    "<div class='t-btn colorpage' id='2'>" + "邀面试" + "</div>" +
                    "<div class='t-btn' id='3'>" + "不合适" + "</div>" +
                    "</div>" +
                    "<div class='v-heade'>" +
                    "<div class='v-circle'>" +
                    "<img id='user_portrait' src=" + data[i]['user_portrait'] + ">" +
                    "</div>" +
                    "<div class='v-heade-text'>" + data[i]['res_salary'] + "</div>" +
                    "</div>" +
                    "<div class='vaite-text'>" +
                    "<div class='v-imformation'>" +
                    "<div id=" + data[i]['user_id'] + " class='username'>" + data[i]['user_name'] + "</div>" +
                    "<div>" + "期望职位:" + data[i]['res_post'] + "</div>" +
                    "<div>" + "期望城市:" + data[i]['res_city'] + "</div>" +
                    "</div>" +
                    "<div class='v-imformation'>" +
                    "<div>" + data[i]['user_age'] + "</div>" +
                    "<div>" + data[i]['user_degree'] + "</div>" +
                    "<div>" + data[i]['user_time'] + "&nbsp;&nbsp;&nbsp;" + data[i]['user_education'] + "</div>" +
                    "</div>" +
                    "<div class='v-imformation'>" +
                    "<div>" + data[i]['user_study'] + "</div>" +
                    "<div>" + data[i]['user_major'] + "</div>" +
                    "<div class='res_post' id='res_post'>" + data[i]['res_post'] + "</div>" +
                    "<div>" + data[i]['res_nature'] + "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='v-line'>" + "</div>" +
                    "</div>" +
                    "<div id='resume'>" + "</div>" +
                    "</div>"
                );
            } else if ($state == 3) {
                $("#biuuu_city_list").append("<div id='vaite-conent'>" +
                    "<div class='first-vconent'>" +
                    "<div class='three-btn'>" +
                    "<div class='t-btn' id='1'>" + "已查看" + "</div>" +
                    "<div class='t-btn' id='2'>" + "邀面试" + "</div>" +
                    "<div class='t-btn colorpage' id='3'>" + "不合适" + "</div>" +
                    "</div>" +
                    "<div class='v-heade'>" +
                    "<div class='v-circle'>" +
                    "<img id='user_portrait' src=" + data[i]['user_portrait'] + ">" +
                    "</div>" +
                    "<div class='v-heade-text'>" + data[i]['res_salary'] + "</div>" +
                    "</div>" +
                    "<div class='vaite-text'>" +
                    "<div class='v-imformation'>" +
                    "<div id=" + data[i]['user_id'] + " class='username'>" + data[i]['user_name'] + "</div>" +
                    "<div>" + "期望职位:" + data[i]['res_post'] + "</div>" +
                    "<div>" + "期望城市:" + data[i]['res_city'] + "</div>" +
                    "</div>" +
                    "<div class='v-imformation'>" +
                    "<div>" + data[i]['user_age'] + "</div>" +
                    "<div>" + data[i]['user_degree'] + "</div>" +
                    "<div>" + data[i]['user_time'] + "&nbsp;&nbsp;&nbsp;" + data[i]['user_education'] + "</div>" +
                    "</div>" +
                    "<div class='v-imformation'>" +
                    "<div>" + data[i]['user_study'] + "</div>" +
                    "<div>" + data[i]['user_major'] + "</div>" +
                    "<div class='res_post' id='res_post'>" + data[i]['res_post'] + "</div>" +
                    "<div>" + data[i]['res_nature'] + "</div>" +
                    "</div>" +
                    "</div>" +
                    "<div class='v-line'>" + "</div>" +
                    "</div>" +
                    "<div id='resume'>" + "</div>" +
                    "</div>"
                );
            } else {
                for (i = 0; i < data.length; i++) {
                    $("#biuuu_city_list").append("<div id='vaite-conent'>" +
                        "<div class='first-vconent'>" +
                        "<div class='three-btn'>" +
                        "<div class='t-btn' id='state1' onclick='resumeState();'>" + "已查看" + "</div>" +
                        "<div class='t-btn' id='state2' onclick='resumeState();'>" + "邀面试" + "</div>" +
                        "<div class='t-btn' id='state3' onclick='resumeState();'>" + "不合适" + "</div>" +
                        "</div>" +
                        "<div class='v-heade'>" +
                        "<div class='v-circle'>" +
                        "<img id='user_portrait' src=" + data[i]['user_portrait'] + ">" +
                        "</div>" +
                        "<div class='v-heade-text'>" + data[i]['res_salary'] + "</div>" +
                        "</div>" +
                        "<div class='vaite-text'>" +
                        "<div class='v-imformation'>" +
                        "<div id=" + data[i]['user_id'] + " class='username'>" + data[i]['user_name'] + "</div>" +
                        "<div>" + "期望职位:" + data[i]['res_post'] + "</div>" +
                        "<div>" + "期望城市:" + data[i]['res_city'] + "</div>" +
                        "</div>" +
                        "<div class='v-imformation'>" +
                        "<div>" + data[i]['user_age'] + "</div>" +
                        "<div>" + data[i]['user_degree'] + "</div>" +
                        "<div>" + data[i]['user_time'] + "&nbsp;&nbsp;&nbsp;" + data[i]['user_education'] + "</div>" +
                        "</div>" +
                        "<div class='v-imformation'>" +
                        "<div>" + data[i]['user_study'] + "</div>" +
                        "<div>" + data[i]['user_major'] + "</div>" +
                        "<div class='res_post' id='res_post'>" + data[i]['res_post'] + "</div>" +
                        "<div>" + data[i]['res_nature'] + "</div>" +
                        "</div>" +
                        "</div>" +
                        "<div class='v-line'>" + "</div>" +
                        "</div>" +
                        "<div id='resume'>" + "</div>" +
                        "</div>"
                    );
                }
            }
            var connt = data1[1];
            pagesN = '';
            for (i = 1; i <= connt; i++) {
                pagesN += "&nbsp;" + "<button onclick='pages();' id=" + i + ">" + i + "</button>"
            }
            var page = data1[2];

            $("#pages").empty();
            $("#pages").append(
                "<span id='PreviousPage'>" + "<button onclick=pages(); id=" + (page - 1) + ">" + "上一页" + "</button>" + "</span>" +
                pagesN + "&nbsp;" +
                "<span id='nextPage'>" + "<button onclick=pages(); id=" + (page * 1 + 1) + ">" + "下一页" + "</button>" + "</span>"
            );
            $("#Nun").empty();
            $("#Nun").append("&nbsp;&nbsp;" + "<span>" + "总共" + connt + "页" + "</span>" + "&nbsp;&nbsp;");
        }
    });
});
function resumeState() {
    var states = event.target.id;
    document.getElementById(states).style.background = "red";
    var state1 = 'state1';
    var state2 = 'state2';
    var state3 = 'state3';
    var $state = '';
    if (states == state1) {
        $state = 1
    } else if (states == state2) {
        $state = 2
    } else if (states == state3) {
        $state = 3
    }
    alert(state);
    $.cookie("state", $state);
    var user_id = $(".username").attr("id");
    var res_post = $("#res_post").html();
    $.ajax({
        type: "get",
        url: "http://www.text.com/index.php/home/Cpysearch/CompanyInquiry",
        data: {
            ent_post: res_post,
            state: $state,
            user_id: user_id
        },
        dataType: "jsonp",
        success: function (data) {
            console.log(data);
            if (data == 0) {
                if (state == 1) {
                    alert("查看成功")
                } else if (state == 2) {
                    alert("邀请成功")
                }
            }
        }

    });
}

