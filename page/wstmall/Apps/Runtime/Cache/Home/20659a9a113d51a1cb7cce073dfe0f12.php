<?php if (!defined('THINK_PATH')) exit();?><div class="wst-goods-hotsale-box" style="margin-top: 10px;">		
	<div class="hotsale-title">最近浏览商品</div>
	<?php if(is_array($goodslist)): $k = 0; $__LIST__ = $goodslist;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div class="hotsale-goods-box">
			<div class="hotsale-goods-img">
				<img class='lazyImg2' data-original="/MVC/wstmall/<?php echo ($vo['goodsThums']); ?>" width="68" height="68" />
			</div>
			<div class="hotsale-goods-title">
				<a href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$vo['goodsId']));?>"><?php echo WSTMSubstr($vo['goodsName'],0,18);?></a>
				<div><span class="span1">￥<?php echo ($vo['shopPrice']); ?></span>&nbsp;&nbsp;&nbsp;&nbsp;<span class="span2">￥<?php echo ($vo['marketPrice']); ?></span></div>
				已售出<span class="span1"> <?php echo ($vo['totalnum']); ?> </span>件
			</div>
			
			<div class="wst-clear"></div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
</div>
<script>
$(function() {
	$('.lazyImg2').lazyload({ effect: "fadeIn",failurelimit : 10,threshold: 200,placeholder:WST.DEFAULT_IMG});
});
</script>