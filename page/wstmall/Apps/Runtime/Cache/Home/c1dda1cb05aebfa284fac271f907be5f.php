<?php if (!defined('THINK_PATH')) exit();?><!doctype html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
         <title>买家中心 - <?php echo ($CONF['mallTitle']); ?></title>
         <link rel="shortcut icon" href="favicon.ico"/>
         <meta name="keywords" content="<?php echo ($CONF['mallKeywords']); ?>" />
      	 <meta name="description" content="<?php echo ($CONF['mallDesc']); ?>,买家中心" />
         <meta http-equiv="Expires" content="0">
		 <meta http-equiv="Pragma" content="no-cache">
		 <meta http-equiv="Cache-control" content="no-cache">
		 <meta http-equiv="Cache" content="no-cache">
		 <meta http-equiv="X-UA-Compatible" content="IE=edge">
      	<meta name="viewport" content="width=device-width, initial-scale=1">
         <link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/common.css" />
         <link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/user.css">
         <link rel="stylesheet" type="text/css" href="/wstmall/Public/plugins/webuploader/webuploader.css" />
    </head>
	<?php echo WSTLoginTarget(0);?>
    <body>
        <div class="wst-wrap">
          <div class='wst-header'>
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
				<?php if(!$WST_USER['userId']): ?><a href="<?php echo U('Home/users/login');?>">[登录]</a>
				<a href="<?php echo U('Home/users/regist');?>"	class="link-regist">[免费注册]</a><?php endif; ?>
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
				        <a href="<?php echo U('Home/users/index');?>" rel="nofollow">买家中心</a>
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

          <div class='wst-user-top'>
			<div class="wst-user-top-main">
					<div class='wst-user-top-logo'>
						<a href="<?php echo WSTDomain();?>"  title='商城首页'>
						<img class='lazyImg' data-original="<?php echo WSTDomain();?>/<?php echo ($CONF['mallLogo']); ?>" style="max-width: 240px; height: 132px;"/>	
						</a>
					</div>
					<div class='wst-user-top-search'>
						<div class="search-box">
							<input id="wst-search-type" type="hidden" value="1"/>
							<input id="keyword" class="wst-search-ipt" me="q" tabindex="9" placeholder="搜索 商品" autocomplete="off" >
							<div id="btnsch" class="wst-search-btn">搜&nbsp;索</div>
						</div>
					</div>
					<div class="wst-clear"></div>
				</div>
			</div>
			<div class="wst-shop-nav">
				<div class="wst-nav-box">
					<li class="liselect" style="float:left;"><a href="<?php echo U('Home/Orders/queryByPage');?>">买家首页</a></li>
					<div class="wst-clear"></div>
				</div>
			</div>
          </div>
          <div class='wst-nav'></div>
          <div class='wst-main'>
            <div class='wst-menu'>
            	<div><span class='wst-menu-title' style='border-top:0px;'><span></span>交易信息</span></div>
            	<ul>
               		<li onclick="goBack(this)" data="<?php echo U('Home/Orders/queryPayByPage/');?>" <?php if($umark == "queryPayByPage"): ?>class='selected'<?php endif; ?>>待付款订单<span style="display:none;" class="wst-msg-tips-box"></span></li>
               		<li onclick="goBack(this)" data="<?php echo U('Home/Orders/queryDeliveryByPage/');?>" <?php if($umark == "queryDeliveryByPage"): ?>class='selected'<?php endif; ?>>待发货订单<span style="display:none;" class="wst-msg-tips-box"></span></li>
               		<li onclick="goBack(this)" data="<?php echo U('Home/Orders/queryReceiveByPage/');?>" <?php if($umark == "queryReceiveByPage"): ?>class='selected'<?php endif; ?>>待确认收货<span style="display:none;" class="wst-msg-tips-box"></span></li>
               		<li onclick="goBack(this)" data="<?php echo U('Home/Orders/queryAppraiseByPage/');?>" <?php if($umark == "queryAppraiseByPage"): ?>class='selected'<?php endif; ?>>待评价交易<span style="display:none;" class="wst-msg-tips-box"></span></li>
               		<li onclick="goBack(this)" data="<?php echo U('Home/Orders/queryCompleteOrders/');?>" <?php if($umark == "queryCompleteOrders"): ?>class='selected'<?php endif; ?>>已完成订单</a></li>
               		<li onclick="goBack(this)" data="<?php echo U('Home/Orders/queryCancelOrders/');?>" <?php if($umark == "queryCancelOrders"): ?>class='selected'<?php endif; ?>>已取消订单</a></li>
				</ul>
				<div><span class='wst-menu-title'><span></span>交易操作</span></div>
				<ul>
               		<li onclick="goBack(this)" data="<?php echo U('Home/Orders/queryRefundByPage/');?>" <?php if($umark == "queryRefundByPage"): ?>class='selected'<?php endif; ?>>退款订单</li>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/OrderComplains/queryUserComplainByPage/');?>" <?php if($umark == "queryUserComplainByPage"): ?>class='selected'<?php endif; ?>>投诉订单</li>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/GoodsAppraises/getAppraisesList/');?>" <?php if($umark == "getAppraisesList"): ?>class='selected'<?php endif; ?>>评价管理</li>
               	</ul>
               	
               	<?php if($GLOBALS['CONFIG']['isDistribut'] == 1): ?><div><span class='wst-menu-title'><span></span>分销管理</span></div>
               	<ul>
               		<li onclick="goBack(this)" data="<?php echo U('Home/Distributs/queryDistributUsers');?>" <?php if($umark == "queryDistributUsers"): ?>class='selected'<?php endif; ?>>我的推广用户</li>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/Distributs/queryUserDistributMoneys');?>" <?php if($umark == "queryUserDistributMoneys"): ?>class='selected'<?php endif; ?>>我的分成</li>
               	</ul><?php endif; ?>
               	
               	<div><span class='wst-menu-title'><span></span>我的</span></div>
               	<ul>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/UserAddress/queryByPage/');?>" <?php if($umark == "addressQueryByPage"): ?>class='selected'<?php endif; ?>>收货地址</li>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/users/toScoreList/');?>" <?php if($umark == "toScoreList"): ?>class='selected'<?php endif; ?>>积分记录</li>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/LogMoneys/toUserMoneys/');?>" <?php if($umark == "toUserMoneys"): ?>class="selected"<?php endif; ?>>资金管理</li>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/Coupons/mineCoupons/');?>" <?php if($umark == "mineCoupons"): ?>class='selected'<?php endif; ?>>我的优惠券</li>
					<li onclick="goBack(this)" data="<?php echo U('Home/Favorites/queryByPage/');?>" <?php if($umark == "queryFavoritesByPage"): ?>class='selected'<?php endif; ?>>我的关注</li>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/Messages/queryByPage/');?>" id='li_queryMessageByPage' <?php if($umark == "queryMessageByPage"): ?>class='liselect'<?php endif; ?>>商城消息<span style="display:none;" class="wst-msg-tips-box"></span></li>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/users/toEdit/');?>" <?php if($umark == "toEditUser"): ?>class='selected'<?php endif; ?>>个人资料</li>
	               	<li onclick="goBack(this)" data="<?php echo U('Home/users/toEditPass/');?>" <?php if($umark == "toEditPass"): ?>class='selected'<?php endif; ?>>修改密码</li>
               	</ul>
             <?php if($WST_USER["userType"] == 0): ?><div class="wst-appsaler">
				<div>您目前不是卖家，您可以</div>
				<div><a href="<?php echo U('Home/Shops/toOpenShopByUser/');?>"><img class='lazyImg' data-original="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/btn_setshop.png" height="38" width="134" /></a></div>
			 </div><?php endif; ?>
            </div>
            <div class='wst-content'>
            
<link rel="stylesheet" href="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/css/userorder.css" />

    <div class="wst-body"> 
       
	   <div class="wst-order-userinfo-box" style="">
	   		<div class="wst-userimg-box">
	   			<img class='lazyImg' data-original="<?php if(empty($WST_USER['userPhoto'])): ?>/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/logo.png<?php else: echo WSTImgPath($WST_USER['userPhoto']); endif; ?>" height="100" width="100" />
	   		</div>
	   		<div class="wst-userlogin-box">
	   			<div><span style="font-size:16px;">欢迎您：</span><span style="font-weight:bolder;color:#fff100;"><?php echo ($WST_USER["loginName"]); ?></span><?php if($WST_USER["userRank"]["rankName"] != ""): ?>(<?php echo ($WST_USER["userRank"]['rankName']); ?>)<?php endif; ?></div>
	   			<div>上次登录时间：<?php echo ($WST_USER["lastTime"]); ?></div>
	   			<div>上次登录IP：<?php echo ($WST_USER["lastIP"]); ?></div>
	   			<div class="wst-user-adr">
	   				<div>我的积分：<a  href="<?php echo U('Home/users/toScoreList/');?>"><span style="font-weight:bolder;color:#fff100;"><?php echo ($userScore); ?></span></a> 个</div>
	   				<a style="color:#ffffff;" href="<?php echo U('Home/UserAddress/queryByPage/');?>">我的收货地址</a>&nbsp;&nbsp;&nbsp;
	   				<a href="<?php echo U('Home/users/toEdit/');?>" style="color:#ffffff;">编辑个人资料</a>
	   			</div>
	   		</div>
	   		<div class="wst-clear"></div>
	   </div>
	   
       <div class="wst-order-tg">
       		<div class="wst-oinfo-box">
       			<div style="">
       			<div style="float:left;width:110px;">待付款<a href="<?php echo U('Home/Orders/queryPayByPage/');?>"><span><?php echo ($statusList[-2]); ?></span></a></div>
       			<div style="float:left;width:108px;border-left:1px solid #cccccc;border-right:1px solid #cccccc;">待发货<a href="<?php echo U('Home/Orders/queryDeliveryByPage/');?>"><span><?php echo ($statusList[2]); ?></span></a></div>
       			<div style="float:left;width:108px;border-left:1px solid #cccccc;border-right:1px solid #cccccc;">待收货<a href="<?php echo U('Home/Orders/queryReceiveByPage/');?>"><span><?php echo ($statusList[3]); ?></span></a></div>
       			<div style="float:left;width:108px;border-left:1px solid #cccccc;border-right:1px solid #cccccc;">待评价<a href="<?php echo U('Home/Orders/queryAppraiseByPage/');?>"><span><?php echo ($statusList[4]); ?></span></a></div>
       			<div style="float:left;width:110px;">退款<a href="<?php echo U('Home/Orders/queryRefundByPage/');?>"><span><?php echo ($statusList[-3]); ?></span></a></div>
       			<div class="wst-clear"></div>
       			</div>
       		</div>
       </div>
       <div class="wst-mywl">
       		<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/icon_top_03.png"  /><span style="color:#ffffff;">&nbsp;&nbsp;&nbsp;&nbsp;我的订单</span>
       </div>
       <div style="margin-top:10px;padding:5px;">
       		<table class="wst-order-list">
	       <thead>
		      <tr class="head">
		         <th>订单详情</th>
		         <th>支付方式/配送</th>
		         <th>金额</th>
		         <th>操作</th>
		      </tr>
		   </thead>
		   <?php if(is_array($orderList['root'])): $key1 = 0; $__LIST__ = $orderList['root'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$order): $mod = ($key1 % 2 );++$key1;?><tbody class="j-order-row">          
			 	<tr class="empty-row">             
				 	<td colspan="4">&nbsp;</td>          
				 </tr>          
				 <tr class="order-head">             
				 	<td colspan="4" align="right">               
				 	<div class="time"><?php echo ($order["createTime"]); ?></div>               
				 	<div class="orderno">订单号：<?php echo ($order["orderNo"]); ?>
				 		<?php if($order["orderFrom"] == 2): ?><img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/tuan.png" height="30" />
				 		<?php elseif($order["orderFrom"] == 3): ?>
				 		<img src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/images/qian.png" height="30" /><?php endif; ?>
				 	</div>               
				 	<div class="shop"><a href="<?php echo U('Home/Shops/toShopHome/',array('shopId'=>$order['shopId']));?>" target="_blank"><?php echo ($order["shopName"]); ?></a></div>               
				 	<div class="link">
				 		<?php if($order['qqNo'] != ''): ?><a href="tencent://message/?uin=<?php echo ($order['qqNo']); ?>&Site=QQ交谈&Menu=yes">
								<img border="0" src="http://wpa.qq.com/pa?p=1:<?php echo ($order['qqNo']); ?>:7" alt="QQ交谈" width="71" height="24" />
							</a><?php endif; ?>
				 	</div>               
				 	<div>
				 		<?php if($order['isAppraises']==1){ ?>
								已评价
						<?php }else{ ?>
							<?php if(($order["orderStatus"] < 0) and ($order["orderStatus"] != -2)): if($order["payType"] >= 1 && $order["isPay"]==1){ ?>
									<?php if($order["orderStatus"]==-4){ ?>
									已退款
									<?php }else{ ?>
									退款中
									<?php } ?>
								<?php }else{ ?>
									已取消
								<?php } ?>
	       					<?php elseif($order["orderStatus"] == -5): ?>商家不同意退款
			               	<?php elseif($order["orderStatus"] == -2): ?>未付款
			               	<?php elseif($order["orderStatus"] == -11): ?>已关闭
			               	<?php elseif($order["orderStatus"] == 0): ?>未受理
			               	<?php elseif($order["orderStatus"] == 1): ?>已受理
			               	<?php elseif($order["orderStatus"] == 2): ?>打包中
			               	<?php elseif($order["orderStatus"] == 3): ?>配送中
			               	<?php elseif($order["orderStatus"] == 4): ?>已到货<?php endif; ?>
			            <?php } ?>
					</div>             
				 	</td>          
				 </tr>
				 <?php if(is_array($order['goodslist'])): $key2 = 0; $__LIST__ = $order['goodslist'];if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$goods): $mod = ($key2 % 2 );++$key2;?><tr class="goods-box">             
				 	<td>                
				 		<div class="goods-img">
				 			<?php if($order['orderFrom']==2){ ?>
                         		<a href="<?php echo U('Home/Groups/getGoodsDetails/',array('id'=>$order['orderFromId']));?>" target="_blank">
                         	<?php }else if($order['orderFrom']==3){ ?>
                         		<a href="<?php echo U('Home/Panics/getGoodsDetails/',array('id'=>$order['orderFromId']));?>" target="_blank">
                       		<?php }else{ ?>
                           		<a href="<?php echo U('Home/Goods/getGoodsDetails/',array('goodsId'=>$goods['goodsId']));?>">
                         	<?php } ?>
								<img data-original="/wstmall/<?php echo ($goods['goodsThums']); ?>" class='lazyImg' title="<?php echo ($goods['goodsName']); ?>"/>
							</a>
				 		</div>
				 		<div class="goods-name">
					 		<div><?php echo ($goods['goodsName']); ?></div>
					 		<div><?php echo ($goods['goodsAttrName']); ?></div>
				 		</div>                
				 		<div class="goods-extra"><?php echo ($goods['goodsPrice']); ?> x <?php echo ($goods['goodsNums']); ?></div>             
				 	</td>
				 	<?php if($key2==1): ?><td rowspan="<?php echo count($order['goodslist']) ?>">                 
					 	<div><?php echo ($order["payType"]==0?"货到付款":($order["payType"]==2?"钱包支付":"在线支付")); ?></div>                 
					 	<div><?php echo ($order["isSelf"]==1?"自提":"送货上门"); ?></div>
				 	</td>             
				 	<td rowspan="<?php echo count($order['goodslist']) ?>">                 
					 	<div>商品金额：¥<?php echo ($order["totalMoney"]); ?></div>                 
					 	<div class="line">运费：¥<?php echo ($order["deliverMoney"]); ?></div>                 
					 	<div>实付金额：¥<?php echo ($order["realTotalMoney"]); ?></div>             
				 	</td>        
				 	<td rowspan="<?php echo count($order['goodslist']) ?>">                 
					 	<div><a href="javascript:;" onclick="showOrder(<?php echo ($order['orderId']); ?>)">【订单详情】</a></div>
						<?php if($order["orderStatus"] > 3): if($order['isAppraises'] == 0): ?><div><a  href="javascript:;" onclick="appraiseOrder(<?php echo ($order['orderId']); ?>)">【评价】</a></div><?php endif; endif; ?>
       					<?php if($order["payType"] == 1): if($order["orderStatus"] == -2): ?><div><a href="javascript:;" onclick="toPay(<?php echo ($order['orderId']); ?>)">【去支付】</a></div><?php endif; endif; ?>
						<?php if(($order["orderStatus"] == 0) || ($order["orderStatus"] == -2) || ($order["orderStatus"] == 1) || ($order["orderStatus"] == 2) || ($order["orderStatus"] == 3)){ ?> 
							<?php if($order["payType"] >= 1 && $order["isPay"]==1){ ?> 
							<div><a href="javascript:;" onclick="refund(<?php echo ($order['orderId']); ?>)">【退款】</a></div>
							<?php }else{ ?>
							<div><a href="javascript:;" onclick="orderCancel(<?php echo ($order['orderId']); ?>,<?php echo ($order['orderStatus']); ?>)">【取消订单】</a></div>
							<?php } ?>
       					<?php } ?>
						<div><a href='<?php echo U("Home/OrderComplains/complain",array("orderId"=>$order["orderId"]));?>'>【投诉】</a></div>   
				 	</td><?php endif; ?>                    
			 	</tr><?php endforeach; endif; else: echo "" ;endif; ?>                
		 	</tbody><?php endforeach; endif; else: echo "" ;endif; ?>
	       <tbody><tr class="empty-row">
	            <td colspan="4" id="pager" align="center" style="padding:5px 0px 5px 0px">
	            	<div class="wst-page" style="float:right;padding-bottom:10px;">
						<div id="wst-page-items"></div>
					</div>
	            </td>
	       </tr>
	    </tbody>
    </table>
       
       </div>
    </div>
	<script>
	
    <?php if($orderList['totalPage'] > 1): ?>$(document).ready(function(){
    	laypage({
    	    cont: 'wst-page-items',
    	    pages: <?php echo ($orderList['totalPage']); ?>, //总页数
    	    skip: true, //是否开启跳页
    	    skin: '#e23e3d',
    	    groups: 3, //连续显示分页数
    	    curr: function(){ //通过url获取当前页，也可以同上（pages）方式获取
    	        var page = location.search.match(/pcurr=(\d+)/);
    	        return page ? page[1] : 1;
    	    }(), 
    	    jump: function(e, first){ //触发分页后的回调
    	        if(!first){ //一定要加此判断，否则初始时会无限刷新
    	        	var nuewurl = WST.splitURL("pcurr");
    	        	var ulist = nuewurl.split("?");
    	        	if(ulist.length>1){
    	        		location.href = nuewurl+'&pcurr='+e.curr;
    	        	}else{
    	        		location.href = '?pcurr='+e.curr;
    	        	}
    	            
    	        }
    	    }
    	});
    })<?php endif; ?>
	</script>

            </div>
          </div>
          <div style='clear:both;'></div>
          <br/>
           <div class='wst-footer'>
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

          </div>
        </div>
    </body>
    <script src="/wstmall/Public/plugins/formValidator/formValidator-4.1.3.js"></script>
   	<script src="/wstmall/Public/js/common.js"></script>
   	<script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/usercom.js"></script>
   	<script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/head.js"></script>
   	<script src="/wstmall/Public/plugins/layer/layer.min.js"></script>
   	<script type="text/javascript" src="/wstmall/Public/plugins/webuploader/webuploader.js"></script>
  	<script src="/wstmall/Apps/Home/View/<?php echo ($WST_STYLE); ?>/js/common.js"></script>
  	
    <script type="text/javascript">
		var shopId = '<?php echo ($orderInfo["order"]["shopId"]); ?>';
		checkLogin();
		$(function() {
			getUserMsgTips();
			setInterval("getUserMsgTips()",30000);
		});
	</script>
</html>