/*
Navicat MySQL Data Transfer

Source Server         : qdm21721154.my3w.com
Source Server Version : 50173
Source Host           : qdm21721154.my3w.com:3306
Source Database       : qdm21721154_db

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2018-01-11 12:54:41
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `my_email`
-- ----------------------------
DROP TABLE IF EXISTS `my_email`;
CREATE TABLE `my_email` (
  `id` smallint(2) NOT NULL AUTO_INCREMENT,
  `appid` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `key` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `id` (`id`) USING BTREE
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of my_email
-- ----------------------------
INSERT INTO `my_email` VALUES ('2', 'email_a57e9924cbeac5c379676d3f7bd1a34b', '935291958', '1514210360');
