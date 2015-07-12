/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : taojiang

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-07-12 23:10:29
*/

SET FOREIGN_KEY_CHECKS=0;
-- ----------------------------
-- Table structure for `admin`
-- ----------------------------
DROP TABLE IF EXISTS `admin`;
CREATE TABLE `admin` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `user` varchar(20) NOT NULL COMMENT '管理员',
  `password` varchar(50) NOT NULL COMMENT '密码',
  `last_login_time` int(10) DEFAULT NULL COMMENT '上次登陆时间',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of admin
-- ----------------------------
INSERT INTO `admin` VALUES ('2', 'admin', '3605be85cff0e8a69141594452fb43d1', '1436693306');

-- ----------------------------
-- Table structure for `appeal`
-- ----------------------------
DROP TABLE IF EXISTS `appeal`;
CREATE TABLE `appeal` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `title` varchar(150) DEFAULT NULL,
  `content` text,
  `image_url` varchar(126) DEFAULT NULL,
  `cid` int(8) DEFAULT NULL,
  `openid` varchar(60) DEFAULT NULL,
  `unionid` varchar(80) DEFAULT NULL,
  `author` varchar(40) DEFAULT NULL COMMENT '作者',
  `read_num` int(8) DEFAULT NULL COMMENT '阅读数',
  `praise_num` int(8) DEFAULT NULL COMMENT '赞',
  `tread_num` int(8) DEFAULT NULL COMMENT '踩',
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appeal
-- ----------------------------
INSERT INTO `appeal` VALUES ('3', '优美的小区环境+绝对超乎想象的舒适+全套家电拎包入住随时看', '关于租房：此房绝对真实房源，照片是本人亲自拍摄，全新精装修，品牌家具家电，房东都没住过，人们都喜欢新的事物，干净整洁的厨房让您煮饭炒菜一路好心情，此小区是树木岭地区最成熟的小区，没有之一！', '', '1', null, '1', '阿畅哥·烽火戏诸侯', null, null, null, '1435721212');

-- ----------------------------
-- Table structure for `appeal_reply`
-- ----------------------------
DROP TABLE IF EXISTS `appeal_reply`;
CREATE TABLE `appeal_reply` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `reply` text,
  `user` varchar(40) DEFAULT NULL,
  `openid` varchar(60) DEFAULT NULL,
  `unionid` varchar(80) DEFAULT NULL,
  `aid` int(10) DEFAULT NULL,
  `is_expert` tinyint(1) DEFAULT NULL COMMENT '是否是专家回复',
  `praise_num` int(8) DEFAULT NULL COMMENT '赞',
  `tread_num` int(8) DEFAULT NULL COMMENT '踩',
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appeal_reply
-- ----------------------------
INSERT INTO `appeal_reply` VALUES ('1', '11111', '阿畅哥·烽火戏诸侯', null, '1', '3', '1', null, null, '1435722411');
INSERT INTO `appeal_reply` VALUES ('2', '好啊', '阿畅哥·烽火戏诸侯', null, null, '3', null, null, null, '1435722635');

-- ----------------------------
-- Table structure for `auth`
-- ----------------------------
DROP TABLE IF EXISTS `auth`;
CREATE TABLE `auth` (
  `id` int(5) NOT NULL AUTO_INCREMENT,
  `wx_name` varchar(40) DEFAULT NULL,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of auth
-- ----------------------------

-- ----------------------------
-- Table structure for `banner`
-- ----------------------------
DROP TABLE IF EXISTS `banner`;
CREATE TABLE `banner` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(40) DEFAULT NULL,
  `image` varchar(80) DEFAULT NULL,
  `url` varchar(255) DEFAULT NULL,
  `intro` varchar(126) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of banner
-- ----------------------------
INSERT INTO `banner` VALUES ('3', '万能朋友圈·桃江帮帮团', 'images/banner/banner.jpg', 'javascript:;', '万能朋友圈·桃江帮帮团', '1', '1435669177');

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `pid` int(8) DEFAULT NULL,
  `name` varchar(20) DEFAULT NULL,
  `intro` varchar(126) DEFAULT NULL,
  `level` tinyint(1) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '0', '房产', '', '1', '1', '1435650168');
INSERT INTO `category` VALUES ('3', '0', '招聘', '', '1', '2', '1435720318');
INSERT INTO `category` VALUES ('4', '0', '二手', '', '1', '3', '1435720339');
INSERT INTO `category` VALUES ('5', '0', '交友', '', '1', '4', '1435720359');
INSERT INTO `category` VALUES ('6', '0', '其他', '', '1', '5', '1435720377');

-- ----------------------------
-- Table structure for `expert`
-- ----------------------------
DROP TABLE IF EXISTS `expert`;
CREATE TABLE `expert` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `name` varchar(30) DEFAULT NULL,
  `intro` varchar(126) DEFAULT NULL,
  `organ` varchar(40) DEFAULT NULL,
  `wx_name` varchar(40) DEFAULT NULL,
  `wx_unionid` varchar(80) DEFAULT NULL,
  `sort` int(5) DEFAULT NULL,
  `avator` varchar(126) DEFAULT NULL,
  `detail` text,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of expert
-- ----------------------------
INSERT INTO `expert` VALUES ('1', '伍洋纯', '我愿意为家乡人民提供全方位的法律咨询服务！', '天剑律师事务所', null, '1', '0', 'avatar/avatar.jpg', '<p>\r\n	我愿意为家乡人民提供全方位的法律咨询服务！</p>\r\n', '1436694302');
INSERT INTO `expert` VALUES ('2', '伍洋纯', '我愿意为家乡人民提供全方位的法律咨询服务！', '天剑律师事务所', '', '', '0', 'avatar/avatar.jpg', '<p>\r\n	我愿意为家乡人民提供全方位的法律咨询服务！</p>\r\n', '1436695478');

-- ----------------------------
-- Table structure for `user`
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) NOT NULL AUTO_INCREMENT,
  `openid` varchar(60) DEFAULT NULL,
  `unionid` varchar(80) DEFAULT NULL,
  `nickname` varchar(40) DEFAULT NULL,
  `sex` tinyint(1) DEFAULT NULL,
  `province` varchar(20) DEFAULT NULL,
  `city` varchar(20) DEFAULT NULL,
  `headimgurl` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
