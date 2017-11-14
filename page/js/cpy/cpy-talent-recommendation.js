$(document).ready(function(){
    //人才推荐
    $.ajax({
        type:"get",
        url:"http://www.text.com/index.php/home/Cpysearch/searchTalent",
        dataType: "jsonp",
        success: function (data1) {
            var data = data1[0];
            for(i=0; i<data.length; i++){
            $("#personnel").append(
                "<div id='groom'>"+
                "<div class='groom-litbox'>"+
               "<div class='groom-name'>"+
               "<div class='circle v-circle'>"+
                    "<img id='user_portrait' src="+data[i]['user_portrait']+">"+
                "</div>"+
               "<div class='room-name-text'>"+
                    "<span>"+data[i]['user_age']+"</span>"+"&nbsp;"+
                    "<span>"+data[i]['user_major']+"</span>"+"&nbsp;"+
                    "<span>"+data[i]['res_salary']+"</span>"+
                "</div>"+
           "</div>"+
           "<div class='groom-name-text2'>"+
           "<span>"+data[i]['user_time']+"&nbsp;&nbsp;"+data[i]['user_education']+"</span>"+"<br>"+
           "<span>"+data[i]['res_nature']+"</span>"+
           "</div>"+
           "</div>"+
           "</div>"+
            "<hr>");
            }
        }
    })
});
function resumeState(){
    var state = event.target.id;
    var user_id = $("#user_id").val();
    alert(user_id);
}
