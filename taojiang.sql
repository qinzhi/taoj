/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50617
Source Host           : localhost:3306
Source Database       : taojiang

Target Server Type    : MYSQL
Target Server Version : 50617
File Encoding         : 65001

Date: 2015-06-30 23:26:09
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
INSERT INTO `admin` VALUES ('2', 'admin', '3605be85cff0e8a69141594452fb43d1', '1435636181');

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
  `author` varchar(40) DEFAULT NULL,
  `read_num` int(8) DEFAULT NULL,
  `praise_num` int(8) DEFAULT NULL,
  `tread_num` int(8) DEFAULT NULL,
  `post_time` int(10) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of appeal
-- ----------------------------
INSERT INTO `appeal` VALUES ('1', '11111', '11', '2015-06-30/1435677932_9447.jpg', null, '阿畅哥·烽火戏诸侯', null, null, null, '1435677932');

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
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of category
-- ----------------------------
INSERT INTO `category` VALUES ('1', '0', '法律', '', '1', '1', '1435650168');
