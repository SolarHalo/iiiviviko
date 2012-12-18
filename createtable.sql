/*
Navicat MySQL Data Transfer

Source Server         : iiivivi
Source Server Version : 50148
Source Host           : hdm-059.hichina.com:3306
Source Database       : hdm0590365_db

Target Server Type    : MYSQL
Target Server Version : 50148
File Encoding         : 65001

Date: 2012-12-14 11:32:06
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for `category`
-- ----------------------------
DROP TABLE IF EXISTS `category`;
CREATE TABLE `category` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `desc` varchar(255) DEFAULT NULL,
  `rank` int(11) DEFAULT NULL,
  `link` varchar(255) DEFAULT NULL,
  `img` varchar(255) DEFAULT NULL,
  `pid` int(8) DEFAULT NULL,
  `menu` int(1) unsigned zerofill DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=30 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of category
-- ----------------------------

-- ----------------------------
-- Table structure for `pages`
-- ----------------------------
DROP TABLE IF EXISTS `pages`;
CREATE TABLE `pages` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `pid` int(8) DEFAULT NULL,
  `name` varchar(255) DEFAULT NULL,
  `imgbig` varchar(255) DEFAULT NULL,
  `imgsmall` varchar(255) DEFAULT NULL,
  `createtime` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=24 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of pages
-- ----------------------------

-- ----------------------------
-- Table structure for `storeaddress`
-- ----------------------------
DROP TABLE IF EXISTS `storeaddress`;
CREATE TABLE `storeaddress` (
  `id` int(8) NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `area` varchar(255) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 ROW_FORMAT=COMPACT;

-- ----------------------------
-- Records of storeaddress
-- ----------------------------
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (1, 'COLLECTION', NULL, 1, NULL, NULL, NULL, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (2, 'LOOKBOOK', NULL, 2, NULL, NULL, NULL, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (3, 'DESIGN BY III VIVINIKO', NULL, 3, NULL, NULL, NULL, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (4, 'EXHIBITION', NULL, 4, '/imagelist.php', NULL, NULL, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (5, 'ACTIVITY', NULL, 5, '/activity.php', NULL, NULL, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (6, 'STORE', NULL, 6, NULL, NULL, NULL, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (7, 'ABOUT US', NULL, 7, '/aboutus.php', NULL, NULL, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (8, 'WORK', NULL, 8, '/work.php', NULL, NULL, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (9, '2012AW', NULL, 9, '/contentlist.php', NULL, 1, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (10, '2012AW', NULL, 10, '/contentlist.php', NULL, 2, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (11, '2012SS', NULL, 11, '/contentlist.php', NULL, 2, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (12, '2011AW', NULL, 12, '/contentlist.php', NULL, 2, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (13, '2011SS', NULL, 13, '/contentlist.php', NULL, 2, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (14, 'III VIVINIKO LETTER', NULL, 14, '/contentlist.php', NULL, 3, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (15, 'ACC', NULL, 15, '/imagelist.php', NULL, 3, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (16, 'STORE IMAGE', NULL, 16, '/contentlist.php', NULL, 6, 1);
INSERT INTO `category` (`id`, `name`, `desc`, `rank`, `link`, `img`, `pid`, `menu`) VALUES (17, 'STORE LOCATION', NULL, 17, '/storeslocation.php', NULL, 6, 1);
