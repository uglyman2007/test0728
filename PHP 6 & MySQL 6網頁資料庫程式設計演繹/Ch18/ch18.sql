-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: May 19, 2010, 06:17 AM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `ch18`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `class`
-- 

CREATE TABLE `class` (
  ` id` int(11) NOT NULL auto_increment,
  `name` varchar(10) collate utf8_unicode_ci NOT NULL,
  `address` varchar(120) collate utf8_unicode_ci NOT NULL,
  `birthday` date NOT NULL,
  `math` tinyint(4) NOT NULL,
  `english` tinyint(4) NOT NULL,
  `history` tinyint(4) NOT NULL,
  `total` smallint(6) NOT NULL,
  PRIMARY KEY  (` id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=9 ;

-- 
-- 列出以下資料庫的數據： `class`
-- 

INSERT INTO `class` VALUES (1, '李大華', '台北市忠孝東路100號', '1997-03-07', 90, 94, 92, 276);
INSERT INTO `class` VALUES (2, '陳小明', '台北市信義路23號', '1997-02-01', 82, 88, 90, 260);
INSERT INTO `class` VALUES (3, '劉小珍', '台北市仁愛路332號', '1997-08-03', 89, 87, 78, 254);
INSERT INTO `class` VALUES (4, '廖小敏', '台北市和平路194號', '1997-10-21', 75, 80, 85, 240);
INSERT INTO `class` VALUES (5, '吳大龍', '台北市萬華路90號', '1997-05-17', 63, 71, 68, 202);
INSERT INTO `class` VALUES (6, '辛小君', '台北市辛亥路4號', '1997-06-22', 91, 88, 84, 263);
INSERT INTO `class` VALUES (7, '趙大志', '台北市基隆路211號', '1997-09-13', 83, 92, 88, 263);
INSERT INTO `class` VALUES (8, '賴大平', '台北市松平路112號', '1997-04-30', 96, 98, 95, 289);
