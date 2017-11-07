SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `wst_wx_users`;
CREATE TABLE `wst_wx_users` (
  `userId` int(11) NOT NULL AUTO_INCREMENT,
  `userName` varchar(20) NOT NULL,
  `userSex` tinyint(4) DEFAULT '0',
  `userAreas` varchar(150) NOT NULL,
  `userPhoto` varchar(150) DEFAULT NULL,
  `subscribeTime` datetime NOT NULL,
  `userRemark` varchar(100) DEFAULT NULL,
  `groupId` int(11) DEFAULT NULL,
  `openId` char(100) DEFAULT NULL,
  `userFill` tinyint(4) NOT NULL,
  PRIMARY KEY (`userId`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
