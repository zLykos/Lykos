
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `wst_ad_positions`;
CREATE TABLE `wst_ad_positions` (
  `positionId` int(11) NOT NULL AUTO_INCREMENT,
  `positionType` tinyint(4) NOT NULL DEFAULT '0',
  `positionName` varchar(100) NOT NULL,
  `positionWidth` int(11) NOT NULL DEFAULT '0',
  `positionHeight` int(11) NOT NULL DEFAULT '0',
  `positionFlag` tinyint(4) NOT NULL DEFAULT '1',
  PRIMARY KEY (`positionId`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

INSERT INTO `wst_ad_positions` VALUES ('1', '0', '首页主广告', '1400', '600', '1'),
 ('2', '0', '品牌汇广告', '1210', '350', '1'),
 ('3', '0', '店铺街广告', '1210', '350', '1'),
 ('4', '2', '微信广告1', '218', '328', '1'),
 ('5', '2', '微信广告2', '218', '164', '1'),
 ('6', '2', '微信广告3', '218', '164', '1'),
 ('7', '2', '微信广告4', '674', '164', '1'),
 ('8', '0', '团购首页广告', '1400', '300', '1'),
 ('9', '0', '抢购首页广告', '1400', '300', '1'),
 ('10', '1', '首页主广告', '750', '200', '1'),
 ('11', '2', '首页主广告', '750', '200', '1');
