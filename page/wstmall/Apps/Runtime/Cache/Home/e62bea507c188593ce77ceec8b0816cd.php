<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE >
<html lang="zh-cn">
<head>
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<link rel="shortcut icon" href="favicon.ico"/>
<title>首页 - <?php echo ($CONF['mallTitle']); ?></title>
<meta name="keywords" content="<?php echo ($CONF['mallKeywords']); ?>" />
<meta name="description" content="<?php echo ($CONF['mallDesc']); ?>" />
<link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/common.css" />
<link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/index.css" />
<link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/base.css" />
<link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/head.css" />
</head>

<body>
	
<script src="/wstmall/Public/js/jquery.min.js"></script>
<script src="/wstmall/Public/plugins/lazyload/jquery.lazyload.min.js?v=1.9.1"></script>
<script src="/wstmall/Public/plugins/layer/layer.min.js"></script>
<script type="text/javascript">
var WST = ThinkPHP = window.Think = {
        "ROOT"   : "/wstmall",
        "APP"    : "/wstmall/index.php",
        "PUBLIC" : "/wstmall/Public",
        "DEEP"   : "<?php echo C('URL_PATHINFO_DEPR');?>",
        "MODEL"  : ["<?php echo C('URL_MODEL');?>", "<?php echo C('URL_CASE_INSENSITIVE');?>", "<?php echo C('URL_HTML_SUFFIX');?>"],
        "VAR"    : ["<?php echo C('VAR_MODULE');?>", "<?php echo C('VAR_CONTROLLER');?>", "<?php echo C('VAR_ACTION');?>"],
        "DOMAIN" : "<?php echo WSTDomain();?>",
        "CITY_ID" : "<?php echo ($currArea['areaId']); ?>",
        "CITY_NAME" : "<?php echo ($currArea['areaName']); ?>",
        "DEFAULT_IMG": "<?php echo WSTDomain();?>/<?php echo ($CONF['goodsImg']); ?>",
        "MALL_NAME" : "<?php echo ($CONF['mallName']); ?>",
        "SMS_VERFY"  : "<?php echo ($CONF['smsVerfy']); ?>",
        "PHONE_VERFY"  : "<?php echo ($CONF['phoneVerfy']); ?>",
        "IS_LOGIN" :"<?php echo ($WST_IS_LOGIN); ?>",
        "WST_STYLE" :"<?php echo ($WST_STYLE); ?>"
}
</script>
<script src="/wstmall/Public/js/think.js"></script>
<div id="wst-shortcut">
	<div class="w">
		<ul class="fl lh" style='float:left;width:700px;'>
			
			<li class="fore4" id="biz-service" data-widget="dropdown" style='padding:0;'>
				所在城市
				【<span class='wst-city'>&nbsp;<?php echo ($currArea["areaName"]); ?>&nbsp;</span>】
				<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/icon_top_03.png"/>	
				&nbsp;&nbsp;<a href="javascript:;" onclick="toChangeCity();">切换城市</a><div class="wst-downicon">&nbsp;▼</div>
			</li>
		</ul>
	
		<ul class="fr lh" style='float:right;'>
			<li class="fore1" id="loginbar"><a href="<?php echo U('Home/Orders/queryByPage');?>"><span style='color:blue'><?php echo ($WST_USER['userName']?$WST_USER['userName']:$WST_USER['loginName']); ?></span></a> 欢迎您来到 <a href='<?php echo WSTDomain();?>'><?php echo ($CONF['mallName']); ?></a>！<s></s>&nbsp;
			<span>
				<?php if(!$WST_USER['userId']): ?><a href="<?php echo U('Home/Users/login');?>">[登录]</a>
				<a href="<?php echo U('Home/Users/regist');?>"	class="link-regist">[免费注册]</a><?php endif; ?>
				<?php if($WST_USER['userId'] > 0): ?><a href="javascript:logout();">[退出]</a><?php endif; ?>
			</span>
			</li>
			<li class="fore2 ld"><s></s>
			<?php if(session('WST_USER.userId')>0){ ?>
				<?php if(session('WST_USER.userType')==0){ ?>
				    <a href="<?php echo U('Home/Shops/toOpenShopByUser');?>" rel="nofollow">我要开店</a>
				<?php }else{ ?>
				    <?php if(session('WST_USER.loginTarget')==0){ ?>
				        <a href="<?php echo U('Home/Shops/index');?>" rel="nofollow">卖家中心</a>
				    <?php }else{ ?>
				        <a href="<?php echo U('Home/Users/index');?>" rel="nofollow">买家中心</a>
				    <?php } ?>
				<?php } ?>
			<?php }else{ ?>
			    <a href="<?php echo U('Home/Shops/toOpenShop');?>" rel="nofollow">我要开店</a>
			<?php } ?>
			</li>
		</ul>
		<span class="clr"></span>
	</div>
</div>

<div style="height:132px;">
<div id="mainsearchbox" style="text-align:center;">
	<div id="wst-search-pbox">
		<div style="" class="wst-header-logo">
		  <a href='<?php echo WSTDomain();?>'>
			<img id="wst-logo" src="<?php echo WSTDomain();?>/<?php echo ($CONF['mallLogo']); ?>"/>
		  </a>	
		</div>
		<div id="wst-search-container">
			<div id="wst-search-type-box">
				<input id="wst-search-type" type="hidden" value="<?php echo ($searchType); ?>"/>
				<div id="wst-panel-goods" class="<?php if($searchType == 1): ?>wst-panel-curr<?php else: ?>wst-panel-notcurr<?php endif; ?>">商品</div>
				<div id="wst-panel-shop" class="<?php if($searchType == 2): ?>wst-panel-curr<?php else: ?>wst-panel-notcurr<?php endif; ?>">店铺</div>
				<div class="wst-clear"></div>
			</div>
			<div id="wst-searchbox">
				<input id="keyword" class="wst-search-keyword" data="wst_key_search" onkeyup="getSearchInfo(this,event);" placeholder="<?php if($searchType == 2): ?>搜索 店铺<?php else: ?>搜索 商品<?php endif; ?>" autocomplete="off"  value="<?php echo ($keyWords); ?>">
				<div id="btnsch" class="wst-search-button">搜&nbsp;索</div>
				<div id="wst_key_search_list"></div>
			</div>
			<div id="wst-hotsearch-keys">
				<?php if(is_array($CONF['hotSearchs'])): $k = 0; $__LIST__ = $CONF['hotSearchs'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a href="<?php echo U('Home/goods/getGoodsList',array('keyWords'=>$vo));?>"><?php echo ($vo); ?></a><?php if($k < count($CONF['hotSearchs'])): ?>&nbsp;&nbsp;|&nbsp;&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
			</div>
		</div>
		<div id="wst-search-des-container">
			<div class="des-box">
				<div class='wst-reach'>
					<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/sadn.jpg"  height="38" width="40"/>
					<div style="float:left;position:absolute;top:0px;left:38px;"><span style="font-weight:bolder;">闪电配送</span><br/><span style="color:#e23c3d;">最快1小时送达</span></div>
				</div>
				<div class='wst-since'>
					<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/sqzt.jpg"  height="38" width="40"/>
					<div style="float:left;position:absolute;top:0px;left:38px;"><span style="font-weight:bolder;">社区自提</span><br/><span style="color:#e23c3d;">330家自提点</span></div>
				</div>
			</div>
		</div>
	</div>
</div>
</div>
<div class="headNav">
		  <div class="navCon w1020">
		    <div class="navCon-cate fl navCon_on" >
		      <div class="navCon-cate-title"> <a href="<?php echo U('Home/goods/getGoodsList');?>">
				  <img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/cate_icon.png" class="wst-cate-img"/>&nbsp;&nbsp;<span class="navCon-allcat">全部商品分类</span></a></div>
		      	<?php if($ishome == 1): ?><div class="wst-cate-menu1" >
		      	<?php else: ?>
		      		<div class="wst-cate-menu2" style="display:none;" ><?php endif; ?>
		        <div id="wst-nvg-cat-box">
		        	<div class="wst-nvgbk" style="diplay:none;"></div>
		        	<?php $_result=WSTGoodsCats();if(is_array($_result)): $k1 = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1; if($k1 < 11): ?><li class="wst-nvg-cat-nlt6" style="border-top: none;" >
				    	<?php else: ?>
				    	<li class="wst-nvg-cat-gt6" style="border-top: none;display:none;" ><?php endif; ?>
				    	<div>
				            <div class="cate-tag"> 
				            <div class="listModel">
				             <p > 
				            	<strong><s class='s<?php echo ($k1); ?>'></s>&nbsp;<a style="font-weight:bold;" href="<?php echo U('Home/goods/getGoodsList',array('c1Id'=>$vo1['catId']));?>"><?php echo ($vo1["catName"]); ?></a></strong>
				             </p> 
				             </div>
				              <div class="listModel">
				                <p> 
				                <?php if(is_array($vo1['catChildren'])): $k2 = 0; $__LIST__ = $vo1['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><a href="<?php echo U('Home/goods/getGoodsList',array('c1Id'=>$vo1['catId'],'c2Id'=>$vo2['catId']));?>"><?php echo ($vo2["catName"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				                </p>
				              </div>
				            </div>
				            <div class="list-item hide">
				              <ul class="itemleft">
				              	<?php if(is_array($vo1['catChildren'])): $k2 = 0; $__LIST__ = $vo1['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><dl>
				                  <dt><a href="<?php echo U('Home/goods/getGoodsList',array('c1Id'=>$vo1['catId'],'c2Id'=>$vo2['catId']));?>"><?php echo ($vo2["catName"]); ?></a></dt>
				                  <dd> 
				                  <?php if(is_array($vo2['catChildren'])): $k3 = 0; $__LIST__ = $vo2['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($k3 % 2 );++$k3;?><a href="<?php echo U('Home/goods/getGoodsList',array('c1Id'=>$vo1['catId'],'c2Id'=>$vo2['catId'],'c3Id'=>$vo3['catId']));?>"><?php echo ($vo3["catName"]); ?></a><?php endforeach; endif; else: echo "" ;endif; ?>
				                  </dd>
				                </dl>
				                <div class="fn-clear"></div><?php endforeach; endif; else: echo "" ;endif; ?>
				              </ul>
				            </div>
				            </div>
				  		</li><?php endforeach; endif; else: echo "" ;endif; ?>
		          	
		          	<li style="display:none;"></li>
		        </div>
		      </div>
		    </div>
		    
		    <div class="navCon-menu fl">
		      <ul class="fl">
		        <?php foreach(WSTNavigation(0) as $k=>$v): ?>
				<li >
				<a href="<?php echo $v['navUrl']?>"  <?php echo (CONTROLLER_NAME.'/'.ACTION_NAME==$v['curUrl'])?'class="curMenu"':'';?>>
					&nbsp;&nbsp;<?php echo $v['navTitle'];?>&nbsp;&nbsp;
				</a>
				</li>
				<?php endforeach;?>
		      </ul>
		    </div>
		  </div>
		</div>
	
	<!----加载广告start----->
	<div class="wst-ad" >
		<div class="wst-slide" id="wst-slide">
			<ul class="wst-slide-items">
				<?php $_result=WSTAds(-1);if(is_array($_result)): $k = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><a target="_blank" onclick="addAccess(<?php echo ($vo['adId']); ?>)" href="<?php echo ($vo['adURL']); ?>">
					<li style="z-index: 1;  background: url(/wstmall/<?php echo ($vo['adFile']); ?>) 50% 0% / cover no-repeat scroll;"></li>
				</a><?php endforeach; endif; else: echo "" ;endif; ?>
			</ul>
			<div class="wst-slide-numbox">
				<div class="wst-slide-controls">
			  		<?php if($ishome == 1){ ?>
			  		<?php $_result=WSTAds(-1);if(is_array($_result)): $k = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k; if($k == 1): ?><span class="curr"><?php echo ($k); ?></span>
			  		  	<?php else: ?>
			  		    	<span class=""><?php echo ($k); ?></span><?php endif; endforeach; endif; else: echo "" ;endif; ?>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
	<div class='wst-clear'></div>
	<!----加载商品楼层start----->
		<!-------------F1层---------------->
		<div class="wst-container">
		<?php if(is_array($catList)): $k1 = 0; $__LIST__ = $catList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1;?><div class="wst-floor" data="<?php echo ($k1); ?>">
			<div class="wst-fl-left wst-fl<?php echo ($k1); ?>" style="position: relative;">
				<div class="wst-fl-catbox">
					<?php if(is_array($catAds[$vo1['catId']])): $kv = 0; $__LIST__ = $catAds[$vo1['catId']];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($kv % 2 );++$kv;?><a onclick="addAccess(<?php echo ($vo['adId']); ?>)" href="<?php echo ($vo['adURL']); ?>" target="_blank">
						<img class='lazyImg' data-original="/wstmall/<?php echo ($vo['adFile']); ?>" height="24" width="210" title="<?php echo ($vo['adName']); ?>" />
					</a><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
				<div class="wst-fl-head">
					<a href="<?php echo U('Home/Goods/getGoodsList/',array('c1Id'=>$vo1['catId']));?>">
						<span style="font-size: 18px;">F<?php echo ($k1); ?></span>&nbsp;<?php echo ($vo1["catName"]); ?>
					</a>
				</div>
				<div class='wst-cat'>
					<?php if(is_array($vo1['catChildren'])): $k2 = 0; $__LIST__ = $vo1['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2; if(is_array($vo2['catChildren'])): $k3 = 0; $__LIST__ = $vo2['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($k3 % 2 );++$k3;?><a href="<?php echo U('Home/Goods/getGoodsList/',array('c1Id'=>$vo1['catId'],'c2Id'=>$vo2['catId'],'c3Id'=>$vo3['catId']));?>">
							<li class="wst-cat-left"><?php echo ($vo3["catName"]); ?></li>
							</a><?php endforeach; endif; else: echo "" ;endif; endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div class="wst-fl-right">
				<div class="wst-fl-nvg<?php echo ($k1); ?>">
					<ul class="wst-fl-nvg-ul">
						<li id="fl_<?php echo ($k1); ?>_0" class="wst-fl-tab" onmouseover="gpanelOver(this);">
						<span id="span_fl_<?php echo ($k1); ?>_0">&nbsp;&nbsp;精品推荐&nbsp;&nbsp;</span>
						<f class="nvg_triangle">▲</f>
						</li>
						<?php if(is_array($vo1['catChildren'])): $k2 = 0; $__LIST__ = $vo1['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><li id="fl_<?php echo ($k1); ?>_<?php echo ($k2); ?>" class="wst-fl-tab" onmouseover="gpanelOver(this);">
							<span id="span_fl_<?php echo ($k1); ?>_<?php echo ($k2); ?>">&nbsp;&nbsp;<?php echo ($vo2["catName"]); ?>&nbsp;&nbsp;</span>
							<f class="nvg_triangle">▲</f>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
					</ul>
				</div>
				<div>
					<div id="fl_<?php echo ($k1); ?>_0_pl" class="wst-goods-container">
						<?php if(is_array($vo1['jpgoods'])): $k2 = 0; $__LIST__ = $vo1['jpgoods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><li class="wst-goodsbox">
							<div class="wst-goods-thumb">
								<a href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$vo2['goodsId']));?>">
									<img class='lazyImg' data-original="/wstmall/<?php echo ($vo2['goodsThums']); ?>" width="180" />
								</a>
							</div>
							<div class="wst-goods-thumb-des">
								<div class="goodsname">
								<a class="wst-goods-name" href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$vo2['goodsId']));?>"><?php echo ($vo2['goodsName']); ?></a>
								</div>
								<div>
									<em class="wst-left wst-goods-price" id='shopGoodsPrice_<?php echo ($vo2["goodsId"]); ?>' dataId='<?php echo ($vo2["goodsAttrId"]); ?>'>￥<?php echo (number_format($vo2['shopPrice'],2)); ?></em>
									<a href="javascript:addCart(<?php echo ($vo2['goodsId']); ?>,0,'<?php echo ($vo2['goodsThums']); ?>')" class="wst-right <?php if(session('WST_USER.userId') > 0 ): ?>btnCart<?php endif; ?>"> 
									<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/btn_addcart.png" width="85" />
									</a>
									<div class='wst-clear'></div>
								</div>
							</div>
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php for($i=0;$i<10-count($vo1['jpgoods']);$i++){ ?>
						<li class="wst-emptybox"></li>
						<?php } ?>
						<div class='wst-clear'></div>
					</div>
					<?php if(is_array($vo1['catChildren'])): $k2 = 0; $__LIST__ = $vo1['catChildren'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><div id="fl_<?php echo ($k1); ?>_<?php echo ($k2); ?>_pl" class="wst-goods-container"
						style="display: none;">
						<?php if(is_array($vo2['goods'])): $k3 = 0; $__LIST__ = $vo2['goods'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo3): $mod = ($k3 % 2 );++$k3;?><li class="wst-goodsbox">
							<div class="wst-goods-thumb">
								<a href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$vo3[goodsId]));?>">
									<img class='lazyImg' data-original="/wstmall/<?php echo ($vo3['goodsThums']); ?>" width="180" />
								</a>
							</div>
							<div class="wst-goods-thumb-des">
								<div class="goodsname">
									<a class="wst-goods-name"
										href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$vo3[goodsId]));?>"><?php echo ($vo3['goodsName']); ?></a>
								</div>
								<div>
									<em class="wst-left wst-goods-price" id='shopGoodsPrice_<?php echo ($vo3["goodsId"]); ?>' dataId='<?php echo ($vo3["goodsAttrId"]); ?>'>￥<?php echo (number_format($vo3['shopPrice'],2)); ?></em>
									<a href="javascript:addCart(<?php echo ($vo3['goodsId']); ?>,0,'<?php echo ($vo3['goodsThums']); ?>')" class="wst-right <?php if(session('WST_USER.userId') > 0 ): ?>btnCart<?php endif; ?>" > 
									<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/btn_addcart.png" width="85" />
									</a>
									<div class='wst-clear'></div>
								</div>
							</div>
							
						</li><?php endforeach; endif; else: echo "" ;endif; ?>
						<?php for($i=0;$i<10-count($vo2['goods']);$i++){ ?>
						<li class="wst-emptybox"></li>
						<?php } ?>
						<div class='wst-clear'></div>
					</div><?php endforeach; endif; else: echo "" ;endif; ?>
				</div>
			</div>
			<div class='wst-clear'></div>
		</div><?php endforeach; endif; else: echo "" ;endif; ?>
	</div>
	<div class="wst-footer-fl-box">
	<div class="wst-footer" >
		<div class="wst-footer-cld-box">
			<div class="wst-footer-fl">友情链接：</div>
			<div style="padding-left:36px;">
				<?php if(is_array($friendLikds)): $k = 0; $__LIST__ = $friendLikds;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($k % 2 );++$k;?><div style="float:left;"><a href="<?php echo ($vo["friendlinkUrl"]); ?>" target="_blank"><?php echo ($vo["friendlinkName"]); ?></a>&nbsp;&nbsp;</div><?php endforeach; endif; else: echo "" ;endif; ?>
				<div class="wst-clear"></div>
			</div>
		</div>
	</div>
</div>

<div class="wst-footer-hp-box">
	<div class="wst-footer">
		<div class="wst-footer-hp-ck1">
			<?php if(is_array($helps)): $k1 = 0; $__LIST__ = $helps;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo1): $mod = ($k1 % 2 );++$k1;?><div class="wst-footer-wz-ca">
				<div class="wst-footer-wz-pt">
					<span class="wst-footer-wz-pn"><?php echo ($vo1["catName"]); ?></span>
					<div>
						<?php if(is_array($vo1['articlecats'])): $k2 = 0; $__LIST__ = $vo1['articlecats'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo2): $mod = ($k2 % 2 );++$k2;?><a href="<?php echo U('Home/Articles/index/',array('articleId'=>$vo2['articleId']));?>"><?php echo ($vo2['articleTitle']); ?></a><br/><?php endforeach; endif; else: echo "" ;endif; ?>
					</div>
				</div>
			</div><?php endforeach; endif; else: echo "" ;endif; ?>
			
			<div class="wst-footer-wz-clt">
				<div style="padding-top:5px;line-height:25px;">
					<div>
						<?php if($CONF['phoneNo'] != ''): ?><img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/phone_icon.png" width="25"/><span class="wst-phone">&nbsp;<?php echo ($CONF['phoneNo']); ?></span><br/><?php endif; ?>
						<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/wst_qr_code.jpg" width="120" />
						
					</div>
				</div>
			</div>
			<div class="wst-clear"></div>
		</div>
	    
		<div class="wst-footer-hp-ck2">
			<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/alipay.jpg" height="40" width="120"/>支付宝签约商家&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<span class="wst-footer-frd">正品保障</span><span >100%原产地</span>&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<span class="wst-footer-frd">7天退货保障</span>购物无忧&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<span class="wst-footer-frd">免费配送</span>满98包邮&nbsp;&nbsp;&nbsp;|&nbsp;&nbsp;&nbsp;
			<span class="wst-footer-frd">货到付款</span>400城市送货上门
		</div>
	    <div class="wst-footer-hp-ck3">
	        <div class="links"> 
	            <?php $_result=WSTNavigation(1);if(is_array($_result)): $i = 0; $__LIST__ = $_result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?><a rel="nofollow" <?php if($vo['isOpen'] == 1): ?>target="_blank"<?php endif; ?> href="<?php echo ($vo['navUrl']); ?>"><?php echo ($vo['navTitle']); ?></a>&nbsp;<?php if($vo['end'] == 0): ?>|&nbsp;<?php endif; endforeach; endif; else: echo "" ;endif; ?>
	        </div>
	        <div class="copyright">
	         <?php if($CONF['mallFooter']!=''){ echo htmlspecialchars_decode($CONF['mallFooter']); } ?>
	      	<?php if($CONF['visitStatistics']!=''){ echo htmlspecialchars_decode($CONF['visitStatistics'])."<br/>"; } ?>
	        <?php if($CONF['mallLicense'] ==''): ?><div>
				Copyright©2015 Powered By <a target="_blank" href="http://www.wstmall.net">WSTMall</a>
			</div>
			<?php else: ?>
				<div id="wst-mallLicense" data='1' style="display:none;">Copyright©2015 Powered By <a target="_blank" href="http://www.wstmall.net">WSTMall</a></div><?php endif; ?>
	        </div>
	    </div>
	</div>
</div>

	<link rel="stylesheet" type="text/css" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/cart.css" />
<script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/userlogin.js"></script>
<script type="text/javascript" src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/cart/common.js?v=725"></script>
<script type="text/javascript" src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/cart/quick_links.js"></script>
<!--[if lte IE 8]>
<script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/cart/ieBetter.js"></script>
<![endif]-->
<script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/cart/parabola.js"></script>
<!--右侧贴边导航quick_links.js控制-->
	<div id="flyItem" class="fly_item" style="display:none;">
		<p class="fly_imgbox">
		<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/item-pic.jpg"
			width="30" height="30">
		</p>
	</div>
	<div class="mui-mbar-tabs">
		<div class="quick_link_mian">
			<div class="quick_links_panel">
				<div id="quick_links" class="quick_links">
					<li id="userHeader"><a href="#" class="my_qlinks" style="margin-top: 5px;"><i class="setting"></i></a>
						<div class="ibar_login_box status_login">
							<?php if($WST_USER['userId'] > 0): ?><div class="avatar_box">
								<p class="avatar_imgbox">
									<?php if($WST_USER['userPhoto']!=''){ ?>
									<img src="/wstmall/<?php echo ($WST_USER['userPhoto']); ?>" />
									<?php }else{ ?>
									<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/no-img_mid_.jpg" />
									<?php } ?>
								</p>
								<?php if($WST_USER['userId'] > 0): ?><ul class="user_info">
									<li>用户名：<?php echo ($WST_USER['loginName']); ?></li>
									<li>级&nbsp;别：普通会员</li>
								</ul><?php endif; ?>
							</div>
							
							<div class="ibar_recharge-btn">
								<input type="button" value="我的订单" onclick="getMyOrders();"/>
							</div>
							<i class="icon_arrow_white"></i>
						</div><?php endif; ?></li>
					<li id="shopCart"><a href="#" class="message_list"><i class="message"></i>
					<div class="span">购物车</div> <span class="cart_num">0</span></a></li>
					<?php if($CONF['qqNo'] != ''): ?><li>
						<a href="tencent://message/?uin=<?php echo ($CONF['qqNo']); ?>&Site=QQ交谈&Menu=yes" style="padding-top:5px;padding-bottom:5px;margin-bottom: 5px;">
						<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/qq.jpg"  height="38" width="40" />
						</a>
					</li><?php endif; ?>
				</div>
				<div class="quick_toggle">
					<li><a href="#none"><i class="mpbtn_qrcode"></i></a>
						<div class="mp_qrcode" style="display: none;">
							<img
								src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/wst_qr_code.jpg"
								width="148"  /><i class="icon_arrow_white"></i>
						</div>
					</li>
					<li><a href="#top" class="return_top"><i class="top"></i></a></li>
				</div>
			</div>
			<div id="quick_links_pop" class="quick_links_pop hide"></div>
		</div>
	</div>
	<script type="text/javascript">
	var numberItem = <?php echo WSTCartNum();?>;
	$('.cart_num').html(numberItem);
	
	<?php if(session('WST_USER.userId')>0){ ?>
	$(".quick_links_panel li").mouseenter(function() {
		getVerify();
		$(this).children(".mp_tooltip").animate({
			left : -92,
			queue : true
		});
		$(this).children(".mp_tooltip").css("visibility", "visible");
		$(this).children(".ibar_login_box").css("display", "block");
	});
	$(".quick_links_panel li").mouseleave(function() {
		$(this).children(".mp_tooltip").css("visibility", "hidden");
		$(this).children(".mp_tooltip").animate({
			left : -121,
			queue : true
		});
		$(this).children(".ibar_login_box").css("display", "none");
	});
	<?php }else{ ?>
	$("#userHeader,#shopCart").click(function() {
		loginWin();
	});
	
	<?php } ?>
	$(".quick_toggle li").mouseover(function() {
		$(this).children(".mp_qrcode").show();
	});
	$(".quick_toggle li").mouseleave(function() {
		$(this).children(".mp_qrcode").hide();
	});

	// 元素以及其他一些变量
	var eleFlyElement = document.querySelector("#flyItem"), eleShopCart = document
			.querySelector("#shopCart");
	eleFlyElement.style.visibility = "hidden";
	
	var numberItem = 0;
	// 抛物线运动
	var myParabola = funParabola(eleFlyElement, eleShopCart, {
		speed : 100, //抛物线速度
		curvature : 0.0012, //控制抛物线弧度
		complete : function() {
			eleFlyElement.style.visibility = "hidden";
			jQuery.post(Think.U('Home/Cart/getCartInfo') ,{"axm":1},function(data) {
				var cart = WST.toJson(data);	
				var totalmoney = 0, chkgoodsnum = 0, goodsnum = 0;
				for(var shopId in cart.cartgoods){
					var shop = cart.cartgoods[shopId];
					for(var goodsId in shop.shopgoods){
						var goods = shop.shopgoods[goodsId];
						goodsnum++;
						if(goods.ischk==1){
							chkgoodsnum++;
							totalmoney = totalmoney + parseFloat(goods.shopPrice * goods.cnt);
							totalmoney = totalmoney.toFixed(2);
						}
						
					}
				}
				$(".cart_num").html(goodsnum);
				$(".cart_gnum_chk").html(chkgoodsnum);
				$(".wst-nvg-cart-price").html(totalmoney);
			});
			
		}
	});
	// 绑定点击事件
	if (eleFlyElement && eleShopCart) {
		[].slice
				.call(document.getElementsByClassName("btnCart"))
				.forEach(
						function(button) {
							button
									.addEventListener(
											"click",
											function(event) {
												// 滚动大小
												var scrollLeft = document.documentElement.scrollLeft
														|| document.body.scrollLeft
														|| 0, scrollTop = document.documentElement.scrollTop
														|| document.body.scrollTop
														|| 0;
												eleFlyElement.style.left = event.clientX
														+ scrollLeft + "px";
												eleFlyElement.style.top = event.clientY
														+ scrollTop + "px";
												eleFlyElement.style.visibility = "visible";
												$(eleFlyElement).show();
												// 需要重定位
												myParabola.position().move();
											});
						});
	}

	function getMyOrders(){
		document.location.href = ThinkPHP.U("Home/Orders/queryByPage");
	}
	
	function removeCartGoods(obj,goodsId,goodsAttrId,isPackage){
		var url = Think.U('Home/Cart/delCartGoods');
		var params = {"goodsId":goodsId,"goodsAttrId":goodsAttrId};
		if(isPackage==1){
			url = Think.U('Home/Cart/delPckCatGoods');
			params = {"packageId":goodsId,"batchNo":goodsAttrId};
		}
		jQuery.post(url ,params,function(data) {
			var cart = WST.toJson(data);	
			var spId = $(obj).attr("spId");
			$(obj).parent().parent().parent().remove();
			if($("input[name='chk_goods_"+spId+"']").length==0){
				$("#cart_shop_li_"+spId).remove();
			}
			var totalmoney = 0, goodsnum = 0;
			for(var shopId in cart.cartgoods){
				var shop = cart.cartgoods[shopId];
				for(var goodsId in shop.shopgoods){
					var goods = shop.shopgoods[goodsId];
					goodsnum++;
					totalmoney = totalmoney + parseFloat(goods.shopPrice * goods.cnt);
					totalmoney = totalmoney.toFixed(2);
				}
			}
			$("#cart_handler_right_totalmoney, .wst-nvg-cart-price").html(totalmoney);
			$('.cart_num, .cart_gnum_chk').html(goodsnum);
			$(".cart_gnum").html(goodsnum);

		});	
	}
	
</script>
	<script src="/wstmall/Public/js/common.js"></script>
    <script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/index.js"></script>
    <script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/common.js"></script>
    <script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/global.js" type="text/javascript"></script>
    <script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/head.js" type="text/javascript"></script>
    <script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/goods.js" type="text/javascript"></script>
</body>

</html>