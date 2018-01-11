/*
Navicat MySQL Data Transfer

Source Server         : qdm21721154.my3w.com
Source Server Version : 50173
Source Host           : qdm21721154.my3w.com:3306
Source Database       : qdm21721154_db

Target Server Type    : MYSQL
Target Server Version : 50173
File Encoding         : 65001

Date: 2018-01-11 12:54:49
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `my_sendmail`
-- ----------------------------
DROP TABLE IF EXISTS `my_sendmail`;
CREATE TABLE `my_sendmail` (
  `id` smallint(6) NOT NULL AUTO_INCREMENT,
  `appid` varchar(40) COLLATE utf8_unicode_ci NOT NULL,
  `to` varchar(20) COLLATE utf8_unicode_ci NOT NULL,
  `mename` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `subject` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `result` varchar(10) COLLATE utf8_unicode_ci DEFAULT NULL COMMENT 'success=>发送成功,fail=>发送失败',
  `ip` varchar(20) COLLATE utf8_unicode_ci DEFAULT NULL,
  `addtime` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

-- ----------------------------
-- Records of my_sendmail
-- ----------------------------
