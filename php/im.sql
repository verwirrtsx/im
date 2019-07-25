/*
Navicat MySQL Data Transfer

Source Server         : localhost
Source Server Version : 50553
Source Host           : localhost:3306
Source Database       : im

Target Server Type    : MYSQL
Target Server Version : 50553
File Encoding         : 65001

Date: 2019-07-25 16:09:40
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT,
  `num` int(11) NOT NULL,
  `password` varchar(50) NOT NULL,
  `addtime` datetime NOT NULL,
  `face` varchar(100) NOT NULL DEFAULT 'http://localhost/workman/public/uploads/20190725a985c5fbd447be2934dec0b3a4fe0c01.jpg',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES ('1', '520', 'e10adc3949ba59abbe56e057f20f883e', '2019-07-25 10:12:18', 'http://localhost/workman/public/uploads/20190725\\411a811ebc140bf82cf9b32c5681242d.jpg');
INSERT INTO `user` VALUES ('2', '1314', 'e10adc3949ba59abbe56e057f20f883e', '2019-07-25 15:00:43', 'http://localhost/workman/public/uploads/20190725\\a985c5fbd447be2934dec0b3a4fe0c01.jpg');
INSERT INTO `user` VALUES ('3', '666', 'e10adc3949ba59abbe56e057f20f883e', '2019-07-25 15:36:48', 'http://localhost/workman/public/uploads/20190725a985c5fbd447be2934dec0b3a4fe0c01.jpg');
