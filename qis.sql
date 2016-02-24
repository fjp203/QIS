/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50508
Source Host           : localhost:3306
Source Database       : qis

Target Server Type    : MYSQL
Target Server Version : 50508
File Encoding         : 65001

Date: 2016-02-24 16:29:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for think_announcement
-- ----------------------------
DROP TABLE IF EXISTS `think_announcement`;
CREATE TABLE `think_announcement` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `text` varchar(200) NOT NULL DEFAULT '',
  `creattime` datetime NOT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_announcement
-- ----------------------------
INSERT INTO `think_announcement` VALUES ('1', '欢迎使用质量信息管理系统！！！', '2015-03-03 15:55:28', '1');

-- ----------------------------
-- Table structure for think_auth_group
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group`;
CREATE TABLE `think_auth_group` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `title` char(100) NOT NULL DEFAULT '',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `rules` char(80) NOT NULL DEFAULT '',
  `ps` varchar(150) NOT NULL DEFAULT '',
  `view` tinyint(1) NOT NULL DEFAULT '0' COMMENT '前台显示',
  `edit` tinyint(1) NOT NULL DEFAULT '0' COMMENT '前台编辑',
  `admin` tinyint(1) NOT NULL DEFAULT '0',
  `value` varchar(5) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=8 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_auth_group
-- ----------------------------
INSERT INTO `think_auth_group` VALUES ('1', '管理员', '1', '', '基本可以查看所有菜单和进行所有操作', '1', '1', '1', '1');
INSERT INTO `think_auth_group` VALUES ('4', '录入者', '1', '', '录入者', '1', '1', '1', '2');
INSERT INTO `think_auth_group` VALUES ('7', '浏览者', '1', '', '浏览者', '1', '1', '1', '3');

-- ----------------------------
-- Table structure for think_auth_group_access
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_group_access`;
CREATE TABLE `think_auth_group_access` (
  `uid` mediumint(8) unsigned NOT NULL,
  `group_id` mediumint(8) unsigned NOT NULL,
  UNIQUE KEY `uid_group_id` (`uid`,`group_id`),
  KEY `uid` (`uid`),
  KEY `group_id` (`group_id`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_auth_group_access
-- ----------------------------
INSERT INTO `think_auth_group_access` VALUES ('1', '1');

-- ----------------------------
-- Table structure for think_auth_rule
-- ----------------------------
DROP TABLE IF EXISTS `think_auth_rule`;
CREATE TABLE `think_auth_rule` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT,
  `name` char(80) NOT NULL DEFAULT '',
  `title` char(20) NOT NULL DEFAULT '',
  `type` tinyint(1) NOT NULL DEFAULT '1',
  `status` tinyint(1) NOT NULL DEFAULT '1',
  `condition` char(100) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`),
  UNIQUE KEY `name` (`name`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_auth_rule
-- ----------------------------
INSERT INTO `think_auth_rule` VALUES ('1', 'Index/index', '后台主页', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('2', 'User/showuser', '用户管理', '1', '1', '');
INSERT INTO `think_auth_rule` VALUES ('3', 'User/userdata', '显示数据', '1', '1', '');

-- ----------------------------
-- Table structure for think_category
-- ----------------------------
DROP TABLE IF EXISTS `think_category`;
CREATE TABLE `think_category` (
  `id` bigint(5) NOT NULL AUTO_INCREMENT,
  `catname` varchar(50) NOT NULL DEFAULT '' COMMENT '栏目名称',
  `catid` varchar(5) NOT NULL DEFAULT '' COMMENT '栏目id',
  `asmenu` varchar(5) NOT NULL DEFAULT '' COMMENT '父级Id，为0为顶级',
  `action` varchar(20) NOT NULL DEFAULT '',
  `ico` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_category
-- ----------------------------
INSERT INTO `think_category` VALUES ('1', '控制台', '1', '0', '', '');
INSERT INTO `think_category` VALUES ('2', '账户管理', '2', '0', '', '');
INSERT INTO `think_category` VALUES ('3', '用户管理', '3', '2', '', '');
INSERT INTO `think_category` VALUES ('4', '用户管理', '4', '3', '', '');
INSERT INTO `think_category` VALUES ('5', '审核用户', '5', '3', '', '');
INSERT INTO `think_category` VALUES ('6', '用户模块配置', '6', '3', '', '');

-- ----------------------------
-- Table structure for think_quality
-- ----------------------------
DROP TABLE IF EXISTS `think_quality`;
CREATE TABLE `think_quality` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `cx` varchar(100) NOT NULL DEFAULT '' COMMENT '车型',
  `creattime` date NOT NULL COMMENT '创建时间',
  `miaoshu` varchar(300) NOT NULL DEFAULT '' COMMENT '问题描述',
  `zrdw` varchar(50) NOT NULL DEFAULT '',
  `laiyuan` varchar(50) NOT NULL DEFAULT '' COMMENT '来源',
  `file_big_img` varchar(100) NOT NULL DEFAULT '' COMMENT '图片',
  `yuanyin` varchar(300) NOT NULL DEFAULT '' COMMENT '原因',
  `zhenggai` varchar(300) NOT NULL DEFAULT '' COMMENT '整改',
  `pinglun` varchar(300) NOT NULL DEFAULT '' COMMENT '评论',
  `userid` varchar(10) NOT NULL DEFAULT '' COMMENT 'userid',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=103 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_quality
-- ----------------------------
INSERT INTO `think_quality` VALUES ('102', 'adasd', '2015-09-01', 'asdasdas', '零部件', '售后反馈', 'upload/2015-09-01/55e56823c0ffa.jpgFdivideupload/2015-09-01/55e56823d54c5.jpg', 'asd', 'sadasd', '', '60');

-- ----------------------------
-- Table structure for think_user
-- ----------------------------
DROP TABLE IF EXISTS `think_user`;
CREATE TABLE `think_user` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL DEFAULT '',
  `creattime` datetime NOT NULL,
  `moditime` datetime NOT NULL,
  `status` int(2) NOT NULL DEFAULT '1',
  `group_id` varchar(5) NOT NULL DEFAULT '',
  `last_login_time` datetime NOT NULL,
  `login_ip` varchar(50) NOT NULL,
  `login_num` int(10) NOT NULL DEFAULT '0',
  `email` varchar(50) NOT NULL DEFAULT '',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=63 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of think_user
-- ----------------------------
INSERT INTO `think_user` VALUES ('59', 'hjw', 'e10adc3949ba59abbe56e057f20f883e', '2015-05-22 04:09:10', '0000-00-00 00:00:00', '1', '1', '2015-08-18 08:58:45', '127.0.0.1', '9', 'hanjianwei@sxqc.com');
INSERT INTO `think_user` VALUES ('61', 'fjp2031', 'b077465609ade3c9c657f4f14c2381c3', '2015-09-01 11:21:42', '0000-00-00 00:00:00', '0', '0', '0000-00-00 00:00:00', '', '0', 'fj2p03@16.com');
INSERT INTO `think_user` VALUES ('62', 'fff', 'b077465609ade3c9c657f4f14c2381c3', '2015-09-06 01:50:16', '0000-00-00 00:00:00', '1', '1', '2015-09-06 03:37:44', '127.0.0.1', '4', 'fjp203@163.com');
INSERT INTO `think_user` VALUES ('60', 'fjp203', 'b077465609ade3c9c657f4f14c2381c3', '2015-08-18 08:59:43', '0000-00-00 00:00:00', '1', '1', '2015-09-09 09:19:58', '127.0.0.1', '25', 'fjp203@163.com');
