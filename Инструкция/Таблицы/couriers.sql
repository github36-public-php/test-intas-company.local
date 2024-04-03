/*
Navicat MySQL Data Transfer

Source Server         : OpenServer  5.4.3 (new) MySql 8.0
Source Server Version : 80030
Source Host           : localhost:3306
Source Database       : intasbase

Target Server Type    : MYSQL
Target Server Version : 80030
File Encoding         : 65001

Date: 2024-04-04 00:33:00
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for couriers
-- ----------------------------
DROP TABLE IF EXISTS `couriers`;
CREATE TABLE `couriers` (
  `id` int NOT NULL AUTO_INCREMENT,
  `courier_fio` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

-- ----------------------------
-- Records of couriers
-- ----------------------------
INSERT INTO `couriers` VALUES ('1', 'Иванов Иван Иванович');
INSERT INTO `couriers` VALUES ('2', 'Петров Петр Петрович');
INSERT INTO `couriers` VALUES ('3', 'Сидоров Сидр Сидорович');
INSERT INTO `couriers` VALUES ('4', 'Кузнецов Иван Петрович');
INSERT INTO `couriers` VALUES ('5', 'Иванов Петр Петрович');
INSERT INTO `couriers` VALUES ('6', 'Петров Иван Сидорович');
INSERT INTO `couriers` VALUES ('7', 'Кузнецов Иван Иванович');
INSERT INTO `couriers` VALUES ('8', 'Иванов Петр Сергеевич');
INSERT INTO `couriers` VALUES ('9', 'Иванов Сергей Петрович');
INSERT INTO `couriers` VALUES ('10', 'Патров Сергей Федорович');
INSERT INTO `couriers` VALUES ('11', 'Федоров Сергей Сергеевич');
INSERT INTO `couriers` VALUES ('12', 'Кузнецов Ренат Максимович');
INSERT INTO `couriers` VALUES ('13', 'Максимов Иван Петрович');
INSERT INTO `couriers` VALUES ('14', 'Иванова Анна Сергеевна');
INSERT INTO `couriers` VALUES ('15', 'Кузнецова Асиса Федоровна');
SET FOREIGN_KEY_CHECKS=1;
