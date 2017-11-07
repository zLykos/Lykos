 /** ***********************广告显示 start************************ */
$(function() {
	autoCheckCity();
	var slide = $('#wst-slide'), li = slide.find("li");

	var slidecontrols = $('.wst-slide-controls').eq(0), span = slidecontrols
			.find("span");
	var index = 1, _self = null;
	span.bind("mouseover", function() {
		_self = $(this);
		index = span.index(_self);
		span.removeClass("curr");
		span.eq(index).addClass("curr");
		li.addClass("hide");
		li.css("z-index", -1);
		li.css("display", "none");
		li.eq(index).css("display", "");
		li.eq(index).css("z-index", 1);
		li.eq(index).removeClass("hide");
		clearInterval(timer);
	});
	var timer = setInterval(function() {
		span.removeClass("curr");
		span.eq(index).addClass("curr");
		li.addClass("hide");
		li.css("z-index", -1);
		li.css("display", "none");
		li.eq(index).fadeToggle(500);
		li.eq(index).css("z-index", 1);
		li.eq(index).removeClass("hide");
		index++;
		if (index >= span.length)
			index = 0;
	}, 4000);
	span.bind("mouseout", function() {
		timer = setInterval(function() {
			span.removeClass("curr");
			span.eq(index).addClass("curr");
			li.addClass("hide");
			li.css("z-index", -1);
			li.css("display", "none");
			li.eq(index).fadeToggle(500);
			li.eq(index).css("z-index", 1);
			li.eq(index).removeClass("hide");
			index++;
			if (index >= span.length)
				index = 0;
		}, 4000);
	});

	$(".wst-floor").each(function(){
		var key = $(this).attr("data");
		gpanelOver($("#fl_"+key+"_0"));
	});
});

function gpanelOver(obj){
	var sid = $(obj).attr("id");
	var ids = sid.split("_");
	var preid = ids[0]+"_"+ids[1];

	$("li[id^="+preid+"_]").removeClass("selectli");
	$("#"+sid).addClass("selectli");


	$("span[id^=span_"+preid+"_]").removeClass(preid+"_selectspan");
	$("#span_"+sid).addClass(preid+"_selectspan");

	$("li[id^="+preid+"_] .nvg_triangle").hide();
	$("#"+sid+" .nvg_triangle").show();

	$("div[id^="+preid+"_]").hide();
	$("#"+sid+"_pl").show();
	$("#"+sid+"_pl img").lazyload({effect: "fadeIn",failurelimit : 1000,threshold: 200,placeholder:WST.DEFAULT_IMG});
}

function autoCheckCity(){

	jQuery.post(Think.U('Home/index/autoCheckCity') ,{},function(rsp){
		var json = WST.toJson(rsp);
		if(json.status==1){
			layer.open({
				title: '提示',
				closeBtn: 0,
				offset: '150px',
				area: ['500px', '200px'],
			    content: '检测到您当前的位置在【<span style="color:red;">'+json.area.city+'</span>】，是否切换？',
			    btn: ['切换', '取消'],
			    yes: function(index){
			    	changeCity(json.area.areaId2);
					layer.close(index);
			    },
			    btn2:function(index){
			    	jQuery.post(Think.U('Home/index/saveCurrCity') ,{"areaId2":json.areaId2},function(rsp){})
					layer.close(index);
			    }
			});
		}
	});
}


