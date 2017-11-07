SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `wst_wx_menus`;
CREATE TABLE `wst_wx_menus` (
  `menuId` int(11) NOT NULL AUTO_INCREMENT,
  `menuName` varchar(50) NOT NULL,
  `menuKey` varchar(255) DEFAULT NULL,
  `menuUrl` varchar(255) DEFAULT NULL,
  `materialId` int(11) DEFAULT NULL,
  `parentId` int(11) NOT NULL,
  `menuType` tinyint(4) DEFAULT NULL,
  `menuSort` int(11) NOT NULL,
  `dataFlag` tinyint(4) NOT NULL DEFAULT '1',
  `createTime` datetime NOT NULL,
  PRIMARY KEY (`menuId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

