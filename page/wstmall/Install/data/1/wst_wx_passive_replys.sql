
SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `wst_wx_passive_replys`;
CREATE TABLE `wst_wx_passive_replys` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(100) DEFAULT NULL,
  `description` varchar(150) DEFAULT NULL COMMENT '描述',
  `picUrl` varchar(150) DEFAULT NULL COMMENT '封面图片',
  `url` varchar(150) DEFAULT NULL COMMENT '图文链接',
  `msgType` varchar(20) DEFAULT NULL COMMENT '回复的类型 文本:text 图文:news',
  `content` text COMMENT '回复的内容',
  `createTime` datetime DEFAULT NULL,
  `dataFlag` int(11) DEFAULT '1',
  `keyword` varchar(30) DEFAULT NULL COMMENT '关键字',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
