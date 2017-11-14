$(document).ready(function(){
    search();
       $("#submit").click(function(){
        var $Number = $("#Number").val();
        var $page =$("#text").val();
        search($Number,$page);
    });
});
function search($Number,$page){
    $.ajax({
        type:"get",
        url:"http://www.text.com/index.php/home/Cpysearch/searchTalent",
        data:{
            Number:$Number,
            page:$page
        },
        dataType: "jsonp",
        success: function (data1) {
            $("#biuuu_city_list").empty();
            var data = data1[0];
            for( i=0;i<data.length;i++){
                $("#biuuu_city_list").append("<div id='vaite-conent'>"+
                    "<div class='first-vconent'>"+
                    "<div class='three-btn'>"+
                    "<div class='t-btn' id='1' onclick='resumeState();'>"+"已查看"+"</div>"+
                    "<div class='t-btn' id='2' onclick='resumeState();'>"+"邀面试"+"</div>"+
                    "<div class='t-btn' id='3' onclick='resumeState();'>"+"不合适"+"</div>"+
                    "</div>"+
                    "<div class='v-heade'>"+
                    "<div class='v-circle'>"+
                    "<img id='user_portrait' src="+data[i]['user_portrait']+">"+
                    "</div>"+
                    "<div class='v-heade-text'>"+data[i]['res_salary']+"</div>"+
                    "</div>"+
                    "<div class='vaite-text'>"+
                    "<div class='v-imformation'>"+
                    "<div id="+data[i]['user_id']+">"+data[i]['user_name']+"</div>"+
                    "<div>"+"期望职位:"+data[i]['res_post']+"</div>"+
                    "<div>"+"期望城市:"+data[i]['res_city']+"</div>"+
                    "</div>"+
                    "<div class='v-imformation'>"+
                    "<div>"+data[i]['user_age']+"</div>"+
                    "<div>"+data[i]['user_degree']+"</div>"+
                    "<div>"+data[i]['user_time']+"&nbsp;&nbsp;&nbsp;"+data[i]['user_education']+"</div>"+
                    "</div>"+
                    "<div class='v-imformation'>"+
                    "<div>"+data[i]['user_study']+"</div>"+
                    "<div>"+data[i]['user_major']+"</div>"+
                    "<div>"+data[i]['res_nature'] +"</div>"+
                    "</div>"+
                    "</div>"+
                    "<div class='v-line'>"+"</div>"+
                    "</div>"+
                    "<div id='resume'>"+"</div>"+
                    "</div>"
                );
            }
            var connt = data1[1];
            pagesN='';
            for(i=1; i<=connt;i++){
                  pagesN +="&nbsp;"+"<button onclick='pages();' id="+i+">"+i+"</button>"
            }
            var page = data1[2];
            $("#pages").empty();
            $("#pages").append(
            "<span id='PreviousPage'>"+"<button onclick=pages(); id="+(page-1)+">"+"上一页"+"</button>"+"</span>"+
            pagesN+"&nbsp;"+
            "<span id='nextPage'>"+"<button onclick=pages(); id="+(page*1+1)+">"+"下一页"+"</button>"+"</span>"
            );
            $("#Nun").empty();
            $("#Nun").append("&nbsp;&nbsp;"+"<span>"+"总共"+connt+"页"+"</span>"+"&nbsp;&nbsp;");
        }

    });
}
function pages(){
    var $Number = $("#Number").val();
    var $page = event.target.id;
    search($Number,$page);
}
