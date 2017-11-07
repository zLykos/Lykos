<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html>
<html lang="zh-cn">
	<head>
  		<meta charset="utf-8">
      	<meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<link rel="shortcut icon" href="favicon.ico"/>
      	<title>用户登录 - <?php echo ($CONF['mallTitle']); ?></title>
      	<meta name="keywords" content="<?php echo ($CONF['mallKeywords']); ?>" />
      	<meta name="description" content="<?php echo ($CONF['mallDesc']); ?>,用户登录" />
     	<link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/common.css">
     	<link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/base.css" />
		<link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/head.css" />
     	<link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/login.css">

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
	
   			<div class='wst-login'>
		    	<div class="w1" id="entry">
		        	<div class="mc " id="bgDiv" style="position:relative">
		        	<div><a style="text-decoration: none;font-size:65px;color:red;position:absolute;top:160px;left:60px;" href="<?php echo U('Index/index');?>">用户登录</a></div>
		            <div class="form">
		                <div class="item fore1" style="position:relative;">
		                    <span>用户名/手机号/邮箱</span><span id="errmsg" style="color:red;position:absolute;top:0px;left:100px;"></span>
		                    <div class="item-ifo">
		                        <input id="loginName2" name="loginName" class="text"  tabindex="1" value="<?php echo ($loginName); ?>" autocomplete="off" type="text"/>
		                        <div class="i-name ico"></div>
		                    </div>
		                </div>
		                <div class="item fore2">
		                    <span>密码</span>
		                    <div class="item-ifo">
		                        <input id="loginPwd" name="loginPwd" class="text" tabindex="2" autocomplete="off" type="password"/>
		                        <div class="i-pass ico"></div>
		                    </div>
		                </div>
		                <div class="item fore3 " id="o-authcode">
		                    <span>验证码</span>
		                    <div class="item-ifo">
		                        <input id="verify" style="ime-mode:disabled" name="verify" class="text text-1" tabindex="6" autocomplete="off" maxlength="6" type="text"/>

			                    <div>
			                    <label class="img">
			                		<img class='verifyImg' style="height: 55px;width:175px;" src='<?php echo ($WST_STYLE); ?>/images/clickForVerify.png' title='刷新验证码' onclick='javascript:getVerify()'/>
								</label>
			              		</div>
			              		<div class="wst-clear;"></div>
			              		<label class="ftx23" style="  position: relative;top: -20px;">&nbsp;看不清？<a href="javascript:getVerify()" class="flk13">换一张</a></label>
		                    </div>
		                </div>
		                <div class="wst-clear"></div>
		                <div class="item fore4">
		                    <div class="item-ifo">
		                    	<div>
			                        <input class="checkbox" id="rememberPwd" name="rememberPwd"   type="checkbox"/>
			                        <label class="mar">记住密码</label>
			                        <label class="mar"><a href="<?php echo U('Home/Users/forgetPass');?>">忘记密码?</a></label>
			                        <label><a href="<?php echo U('Home/Users/regist');?>" >免费注册</a></label>
		                        </div>
		                        <div class="wst-clear"></div>
		                        <div style="min-height:10px;">
		                       <label>第三方登录&nbsp;</label></if>
		                        <a id="qqAuthorizationUrl" href="https://graph.qq.com/oauth2.0/authorize?response_type=code&client_id=<?php echo ($CONF['qqAppId']); ?>&redirect_uri=<?php echo ($qqBackUrl); ?>" class="qq">
		                        	<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/qq_logo.png" alt="QQ登录" border="0" height="35">
		                        </a>
		                        <a id="qqAuthorizationUrl" href="https://open.weixin.qq.com/connect/qrconnect?appid=<?php echo ($CONF['wxAppId']); ?>&redirect_uri=<?php echo ($wxBackUrl); ?>&response_type=code&scope=snsapi_login&state=<?php echo time();?>#wechat_redirect" class="qq">
		                        	<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/wx_logo.png" alt="微信登录" border="0" height="35">
		                        </a>
		                        </if>
		                        </div>
		                    </div>
		            	</div>
		                <div class="item login-btn2013">
		                    <input class="btn-img btn-entry" id="loginsubmit" value="登录" tabindex="8" onclick="checkLoginInfo();"/>
		                </div>
		            </div>
		        </div>
		    </div>
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

		<script src="/wstmall/Public/plugins/formValidator/formValidator-4.1.3.js"></script>
      	<script src="/wstmall/Public/js/common.js"></script>
      	<script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/common.js"></script>
      	<script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/userlogin.js"></script>
      	<script>
      	$(function(){getVerify();})
      	</script>
   	</body>
</html>