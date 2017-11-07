SET FOREIGN_KEY_CHECKS=0;

DROP TABLE IF EXISTS `wst_wx_template_params`;
CREATE TABLE `wst_wx_template_params` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `parentId` int(11) NOT NULL,
  `fieldCode` varchar(50) NOT NULL,
  `fieldVal` varchar(255) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;
