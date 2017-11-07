/*
Navicat MySQL Data Transfer

Source Server         : localhost_3306
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : recruit

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2017-10-31 19:33:19
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `mq_enter_course`
-- ----------------------------
DROP TABLE IF EXISTS `mq_enter_course`;
CREATE TABLE `mq_enter_course` (
  `id` int(11) NOT NULL,
  `ent_id` int(11) DEFAULT NULL COMMENT '公司IP',
  `ent_begintime` varchar(12) DEFAULT '' COMMENT '起始时间',
  `ent_endtime` varchar(12) DEFAULT '' COMMENT '结束时间',
  `ent_scale` varchar(255) DEFAULT '' COMMENT '规模',
  `ent_project` varchar(255) DEFAULT '' COMMENT '介绍这段时间发生的事情',
  `ent_honor` varchar(128) DEFAULT '' COMMENT '获得荣誉'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mq_enter_course
-- ----------------------------

-- ----------------------------
-- Table structure for `mq_enter_message`
-- ----------------------------
DROP TABLE IF EXISTS `mq_enter_message`;
CREATE TABLE `mq_enter_message` (
  `id` int(11) NOT NULL,
  `ent_name` varchar(12) DEFAULT '' COMMENT '公司名称',
  `ent_address` varchar(64) DEFAULT '' COMMENT '公司地址',
  `ent_info` varchar(255) DEFAULT '' COMMENT '公司信息',
  `ent_scale` int(6) DEFAULT NULL COMMENT '公司规模',
  `ent_photo` varchar(64) DEFAULT '' COMMENT '公司招聘',
  `ent_contacts` varchar(6) DEFAULT '' COMMENT '公司联系人',
  `ent_phone` int(11) DEFAULT NULL COMMENT '公司电话'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mq_enter_message
-- ----------------------------

-- ----------------------------
-- Table structure for `mq_enter_recruit`
-- ----------------------------
DROP TABLE IF EXISTS `mq_enter_recruit`;
CREATE TABLE `mq_enter_recruit` (
  `id` int(11) NOT NULL,
  `ent_id` int(11) DEFAULT NULL COMMENT '公司ID',
  `ent_post` varchar(11) DEFAULT '' COMMENT '招聘职位',
  `ent_salsry` int(10) DEFAULT NULL COMMENT '职位薪资',
  `ent_requ` varchar(255) DEFAULT '' COMMENT '岗位要求',
  `ent_work_exp` varchar(12) DEFAULT '' COMMENT '工作经验要求',
  `ent_edu_exp` varchar(12) DEFAULT '' COMMENT '学历要求',
  `ent_duty` varchar(255) DEFAULT '' COMMENT '岗位职责',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mq_enter_recruit
-- ----------------------------

-- ----------------------------
-- Table structure for `mq_enter_register`
-- ----------------------------
DROP TABLE IF EXISTS `mq_enter_register`;
CREATE TABLE `mq_enter_register` (
  `id` int(12) NOT NULL AUTO_INCREMENT,
  `ent_mailbox` varchar(24) DEFAULT '' COMMENT '注册邮箱',
  `ent_pwd` varchar(16) DEFAULT '' COMMENT '注册密码',
  `ent_ip` varchar(16) DEFAULT '' COMMENT '注册地址ip',
  `ent_rand` int(6) DEFAULT NULL COMMENT '随机码',
  `ent_time` varchar(24) DEFAULT '' COMMENT '注册账户时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mq_enter_register
-- ----------------------------

-- ----------------------------
-- Table structure for `mq_enter_resume`
-- ----------------------------
DROP TABLE IF EXISTS `mq_enter_resume`;
CREATE TABLE `mq_enter_resume` (
  `id` int(11) NOT NULL,
  `ent_id` int(11) DEFAULT NULL COMMENT '企业id',
  `resume_id` int(11) DEFAULT NULL COMMENT '简历id',
  `ent_post` varchar(12) DEFAULT '' COMMENT '用户投递的岗位',
  `ent_time` varchar(0) DEFAULT '' COMMENT '用户投递的时间',
  `ent_state` int(2) DEFAULT NULL COMMENT '返回给用户的状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mq_enter_resume
-- ----------------------------

-- ----------------------------
-- Table structure for `mq_user_delivery`
-- ----------------------------
DROP TABLE IF EXISTS `mq_user_delivery`;
CREATE TABLE `mq_user_delivery` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `del_id` int(11) DEFAULT NULL COMMENT '投递的岗位id',
  `del_time` varchar(255) DEFAULT '' COMMENT '投递时间',
  `del_state` int(11) DEFAULT NULL COMMENT '投递返回状态',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of mq_user_delivery
-- ----------------------------

-- ----------------------------
-- Table structure for `mq_user_message`
-- ----------------------------
DROP TABLE IF EXISTS `mq_user_message`;
CREATE TABLE `mq_user_message` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `user_name` varchar(12) CHARACTER SET utf8 DEFAULT '' COMMENT '用户名',
  `user_sex` varchar(2) CHARACTER SET utf8 DEFAULT '' COMMENT '用户性别',
  `user_age` int(3) DEFAULT NULL COMMENT '年龄',
  `user_address` varchar(64) CHARACTER SET utf8 DEFAULT '' COMMENT '用户地址',
  `user_phone` int(11) DEFAULT NULL COMMENT '留存电话',
  `user_mailbox` varchar(24) CHARACTER SET utf8 DEFAULT '' COMMENT '留存邮箱',
  `user_education` varchar(4) CHARACTER SET utf8 DEFAULT '' COMMENT '用户最高学历',
  `user_major` varchar(6) CHARACTER SET utf8 DEFAULT '' COMMENT '用户专业',
  `user_degree` varchar(6) CHARACTER SET utf8 DEFAULT '' COMMENT '用户最高学位',
  `user_state` int(6) DEFAULT NULL COMMENT '信息完善状态（0，1，2，3，4）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mq_user_message
-- ----------------------------

-- ----------------------------
-- Table structure for `mq_user_register`
-- ----------------------------
DROP TABLE IF EXISTS `mq_user_register`;
CREATE TABLE `mq_user_register` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id',
  `phone` varchar(32) DEFAULT NULL COMMENT '手机账号',
  `mailbox` varchar(32) CHARACTER SET utf8 DEFAULT '' COMMENT '邮箱账号',
  `user_pwd` varchar(32) CHARACTER SET utf8 DEFAULT '' COMMENT '用户密码',
  `user_rand` int(6) DEFAULT NULL COMMENT '随机码',
  `user_ip` varchar(20) CHARACTER SET utf8 DEFAULT '' COMMENT '用户ip',
  `user_addtime` varchar(11) CHARACTER SET utf8 DEFAULT '' COMMENT '用户注册时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mq_user_register
-- ----------------------------
INSERT INTO `mq_user_register` VALUES ('1', null, '1609307997@qq.com', '3d387d2612f9027154ed3b99a7427da1', '6367', '127.0.0.1', '1509417561');
INSERT INTO `mq_user_register` VALUES ('9', '18702824781', '', '5921d6c82f8181509c09cdfc0ee84178', '2277', '127.0.0.1', '1509448903');
INSERT INTO `mq_user_register` VALUES ('10', '18702824781', '', '5921d6c82f8181509c09cdfc0ee84178', '2277', '127.0.0.1', '1509448903');

-- ----------------------------
-- Table structure for `mq_user_resume`
-- ----------------------------
DROP TABLE IF EXISTS `mq_user_resume`;
CREATE TABLE `mq_user_resume` (
  `id` int(11) NOT NULL COMMENT '自增ID（自我评价和薪资期望）',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `res_post` varchar(16) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '求职岗位',
  `res_salary` int(10) DEFAULT NULL COMMENT '期望薪资',
  `res_Interest` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '兴趣爱好',
  `res_evaluate` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '自我评价',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mq_user_resume
-- ----------------------------

-- ----------------------------
-- Table structure for `mq_user_study`
-- ----------------------------
DROP TABLE IF EXISTS `mq_user_study`;
CREATE TABLE `mq_user_study` (
  `id` int(11) NOT NULL AUTO_INCREMENT COMMENT '主键id（教育经历）',
  `user_id` int(11) DEFAULT NULL COMMENT '用户id',
  `stu_begintime` varchar(12) CHARACTER SET utf8 DEFAULT '' COMMENT '起始时间',
  `stu_endtime` varchar(12) CHARACTER SET utf8 DEFAULT '' COMMENT '结束时间',
  `stu_school` varchar(20) CHARACTER SET utf8 DEFAULT '' COMMENT '就读院校',
  `stu_major` varchar(6) CHARACTER SET utf8 DEFAULT '' COMMENT '就读专业',
  `stu_degree` varchar(6) CHARACTER SET utf8 DEFAULT '' COMMENT '当时学位',
  `stu_address` varchar(255) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL COMMENT '学校地址',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4;

-- ----------------------------
-- Records of mq_user_study
-- ----------------------------

-- ----------------------------
-- Table structure for `mq_user_work`
-- ----------------------------
DROP TABLE IF EXISTS `mq_user_work`;
CREATE TABLE `mq_user_work` (
  `id` int(11) NOT NULL COMMENT '自增ID（工作经历）',
  `user_id` int(11) DEFAULT NULL COMMENT '用户ID',
  `work_bejintime` int(12) DEFAULT NULL COMMENT '起始时间',
  `work_endtime` int(12) DEFAULT NULL COMMENT '结束时间',
  `work_cor_name` varchar(32) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '公司名称',
  `work_post` varchar(32) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '工作岗位',
  `work_describe` varchar(255) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '岗位描述',
  `work_address` varchar(64) COLLATE utf8_unicode_ci DEFAULT '' COMMENT '工作地点',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of mq_user_work
-- ----------------------------
