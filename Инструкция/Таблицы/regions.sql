/*
Navicat MySQL Data Transfer

Source Server         : OpenServer  5.4.3 (new) MySql 8.0
Source Server Version : 80030
Source Host           : localhost:3306
Source Database       : intasbase

Target Server Type    : MYSQL
Target Server Version : 80030
File Encoding         : 65001

Date: 2024-04-04 00:33:10
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for regions
-- ----------------------------
DROP TABLE IF EXISTS `regions`;
CREATE TABLE `regions` (
  `id` int NOT NULL AUTO_INCREMENT,
  `region_name` varchar(255) NOT NULL,
  `time_ride_to_region_in_seconds` int DEFAULT NULL,
  `time_ride_from_region_in_seconds` int DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of regions
-- ----------------------------
INSERT INTO `regions` VALUES ('1', 'Санкт-Петербург', '14400', '18000');
INSERT INTO `regions` VALUES ('2', 'Уфа', '72000', '86400');
INSERT INTO `regions` VALUES ('3', 'Нижний Новгород', '10800', '14400');
INSERT INTO `regions` VALUES ('4', 'Владимир', '7200', '10800');
INSERT INTO `regions` VALUES ('5', 'Кострома', '18000', '21600');
INSERT INTO `regions` VALUES ('6', 'Екатеринбург', '93600', '108000');
INSERT INTO `regions` VALUES ('7', 'Ковров', '7200', '10800');
INSERT INTO `regions` VALUES ('8', 'Воронеж', '36000', '43200');
INSERT INTO `regions` VALUES ('9', 'Самара', '50400', '57600');
INSERT INTO `regions` VALUES ('10', 'Астрахань', '86400', '100800');
SET FOREIGN_KEY_CHECKS=1;
