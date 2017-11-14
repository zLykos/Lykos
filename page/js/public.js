$(document).ready(function(){
    province();
    $("#province").change(function(){
        $('#city').html(' <option>请选择</option>');
        city();
    });
    $("#city").change(function(){
        $('#area').html(' <option>请选择</option>');
        area();
    });
});


//获取省列表
function province() {
    $.ajax({
            type: "post",
            url: "http://www.text.com/index.php/home/Publics/provinces",
            data: { "type": "province" },
            dataType:"jsonp",
            success: function (data) {
                for (var i = 0; i < data.length; i++) {
                    $("#province").append("<option value=" + data[i].provinceid + ">" + data[i].province + "</option>");
                }
            }
        })
}
//根据省id获取市列表
function city() {
    var provinceid = $("#province").val();
    $.ajax({
        type: "post",
        url: "http://www.text.com/index.php/home/Publics/city",
        data: {provinceid: provinceid},
        dataType: "jsonp",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                $("#city").append("<option value=" + data[i].cityid + ">" + data[i].city + "</option>");
            }
        }
    });
}
//根据市id获取区列表
function area() {
    var cityid = $("#city").val();
    $.ajax({
        type: "post",
        url: "http://www.text.com/index.php/home/Publics/areas",
        data: {cityid: cityid},
        dataType: "jsonp",
        success: function (data) {
            for (var i = 0; i < data.length; i++) {
                $("#area").append("<option>" + data[i].area + "</option>");
            }
        }
    });
}