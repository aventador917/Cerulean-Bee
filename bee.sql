/*
 Navicat Premium Data Transfer

 Source Server         : aliyun
 Source Server Type    : MySQL
 Source Server Version : 50732
 Source Host           : mysql.yaphp.net:3306
 Source Schema         : company_manage

 Target Server Type    : MySQL
 Target Server Version : 50732
 File Encoding         : 65001

 Date: 04/05/2022 23:47:20
*/

SET NAMES utf8mb4;
SET FOREIGN_KEY_CHECKS = 0;

-- ----------------------------
-- Table structure for art_orders
-- ----------------------------
DROP TABLE IF EXISTS `art_orders`;
CREATE TABLE `art_orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `discount` float(3, 2) NULL DEFAULT NULL,
  `total_price` decimal(10, 2) NULL DEFAULT NULL,
  `order_date` date NULL DEFAULT NULL,
  `date_approved` date NULL DEFAULT NULL,
  `scheduled_print_date` date NULL DEFAULT NULL,
  `apparel_item` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `base_color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `maximum_colors` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `event` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `theme` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `position` json NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 6 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of art_orders
-- ----------------------------
INSERT INTO `art_orders` VALUES (1, 'bill', '131131587', 0.85, 100.00, '2022-05-03', '2022-05-04', '2022-05-06', 't-shirt', 'white', 'white', 'sport', 'health', '[{\"cost\": \"10\", \"colors\": \"red\", \"employee\": \"tom\", \"location\": \"arm\", \"description\": \"red hand\", \"date_complete\": \"2022-05-06\"}, {\"cost\": \"10\", \"colors\": \"yellow\", \"employee\": \"miliy\", \"location\": \"hand\", \"description\": \"red football\", \"date_complete\": \"2022-05-07\"}]');
INSERT INTO `art_orders` VALUES (2, 'bill', '131131587', 0.85, 100.00, '2022-05-03', '2022-05-04', '2022-05-06', 't-shirt', 'white', 'white', 'sport', 'health', '[{\"cost\": \"5\", \"colors\": \"red\", \"employee\": \"tom\", \"location\": \"arm\", \"description\": \"red star\", \"date_complete\": \"2022-05-06\"}, {\"cost\": \"10\", \"colors\": \"yellow\", \"employee\": \"mily\", \"location\": \"hand\", \"description\": \"yellow hand\", \"date_complete\": \"2022-05-07\"}]');
INSERT INTO `art_orders` VALUES (3, 'Paul', '999-888-1234', 0.50, 500.00, '2022-05-03', '2022-05-04', '2022-05-08', 'T-shirt', 'Blue', 'Red', 'nothing', 'peace', '[{\"cost\": \"100\", \"colors\": \"Black\", \"employee\": \"shandy\", \"location\": \"bottom\", \"description\": \"nice\", \"date_complete\": \"2022-05-05\"}]');
INSERT INTO `art_orders` VALUES (4, 'Paul', '909-576-1312', 0.85, 100.00, '2022-05-03', '2022-05-04', '2022-05-07', 't-shirt', 'blue', 'black', 'sport', 'peace', '[{\"cost\": \"200\", \"colors\": \"blue\", \"employee\": \"shandy\", \"location\": \"middle\", \"description\": \"wonderful\", \"date_complete\": \"2022-05-10\"}]');
INSERT INTO `art_orders` VALUES (5, 'Paul', '9493945076', 0.50, 100.00, '2022-05-04', '2022-05-05', '2022-05-07', 'T-shirt', 'blue', 'blue', 'sport', 'health', '[{\"cost\": \"100\", \"colors\": \"white\", \"employee\": \"shandy\", \"location\": \"middle\", \"description\": \"123456\", \"date_complete\": \"2022-05-08\"}]');

-- ----------------------------
-- Table structure for print_orders
-- ----------------------------
DROP TABLE IF EXISTS `print_orders`;
CREATE TABLE `print_orders`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `phone` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `email` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `setup_charge` float(10, 2) NULL DEFAULT NULL,
  `deposit` float(10, 2) NULL DEFAULT NULL,
  `discount` varchar(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total_cost` decimal(10, 2) NULL DEFAULT NULL,
  `order_date` date NULL DEFAULT NULL,
  `art_date` date NULL DEFAULT NULL,
  `due_date` date NULL DEFAULT NULL,
  `apparel_order_date` date NULL DEFAULT NULL,
  `art_film_date` date NULL DEFAULT NULL,
  `print_date` date NULL DEFAULT NULL,
  `date_delivered` date NULL DEFAULT NULL,
  `base_color` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `vendor` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `size` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `per_unit_base_price` decimal(10, 2) NULL DEFAULT NULL,
  `color_charge` decimal(10, 2) NULL DEFAULT NULL,
  `total_blank_price` decimal(10, 2) NULL DEFAULT NULL,
  `location_size` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `colors_charge` decimal(10, 0) NULL DEFAULT NULL,
  `color_list` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `total` decimal(10, 2) NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 94 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of print_orders
-- ----------------------------
INSERT INTO `print_orders` VALUES (93, 'tomas', '11151111', '123@gmail.com', 100.00, 11.00, '0.82', 100.00, '2022-05-05', '2022-05-05', '2022-05-06', '2022-05-05', '2022-05-05', '2022-05-05', '2022-05-05', 'red', 'apple', '[{\"size\":\"X-Small\",\"number\":\"100\",\"add_charge\":\"5\"},{\"size\":\"X-Large\",\"number\":\"200\",\"add_charge\":\"10\"}]', 10.00, 10.00, 100.00, 'big', 10, 'red,white', 100.00);

-- ----------------------------
-- Table structure for user
-- ----------------------------
DROP TABLE IF EXISTS `user`;
CREATE TABLE `user`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `name` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `password` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `salary` decimal(10, 2) NULL DEFAULT NULL,
  `role` int(1) NULL DEFAULT NULL,
  `full_time` int(1) NULL DEFAULT 1,
  `token` varchar(32) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of user
-- ----------------------------
INSERT INTO `user` VALUES (1, 'boss', '202cb962ac59075b964b07152d234b70', NULL, 0, 1, '678b8716baf4e71adf638a5b922ff4cb');
INSERT INTO `user` VALUES (2, 'test', '202cb962ac59075b964b07152d234b70', 200.00, 1, 1, '841bba0660de934d5a932012806fd557');
INSERT INTO `user` VALUES (3, 'shandy', '202cb962ac59075b964b07152d234b70', 150.00, 1, 1, 'ecf153735623a6d42781516317a8efe0');
INSERT INTO `user` VALUES (4, 'dudu', '202cb962ac59075b964b07152d234b70', 200.00, 1, 1, NULL);
INSERT INTO `user` VALUES (5, 'yaya', '4297f44b13955235245b2497399d7a93', 200.00, 1, 1, '43867388356ef76bfe34c17105a1568d');
INSERT INTO `user` VALUES (6, 'Di', 'c0068f08ec3232dffecac744b699333d', 100.00, 1, 1, NULL);

-- ----------------------------
-- Table structure for worklogs
-- ----------------------------
DROP TABLE IF EXISTS `worklogs`;
CREATE TABLE `worklogs`  (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `uid` int(11) NULL DEFAULT NULL,
  `start_time` datetime(0) NULL DEFAULT NULL,
  `end_time` datetime(0) NULL DEFAULT NULL,
  `project_id` varchar(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `art_project` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL DEFAULT NULL,
  `task` text CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NULL,
  `create_date` date NULL DEFAULT NULL,
  PRIMARY KEY (`id`) USING BTREE
) ENGINE = InnoDB AUTO_INCREMENT = 9 CHARACTER SET = utf8mb4 COLLATE = utf8mb4_general_ci ROW_FORMAT = Dynamic;

-- ----------------------------
-- Records of worklogs
-- ----------------------------
INSERT INTO `worklogs` VALUES (3, 3, '2022-04-28 11:52:36', '2022-04-28 14:41:01', '92', '9', 'printer small t-shirt', '2022-04-28');
INSERT INTO `worklogs` VALUES (4, 4, '2022-04-28 11:52:36', '2022-04-28 14:41:01', '93', '9', 'printer xl t-shirt', '2022-04-28');
INSERT INTO `worklogs` VALUES (5, 3, '2022-04-29 14:00:00', '2022-04-29 15:00:00', '93', '9', 'print 92 project shirt', '2022-04-29');

SET FOREIGN_KEY_CHECKS = 1;
