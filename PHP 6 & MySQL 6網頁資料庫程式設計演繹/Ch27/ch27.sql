-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jun 06, 2010, 05:50 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `ch27`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `mail`
-- 

CREATE TABLE `mail` (
  `id` int(11) NOT NULL auto_increment,
  `sendfrom` varchar(40) collate utf8_unicode_ci NOT NULL,
  `sendto` text collate utf8_unicode_ci NOT NULL,
  `cc` text collate utf8_unicode_ci,
  `bcc` text collate utf8_unicode_ci,
  `subject` text collate utf8_unicode_ci NOT NULL,
  `body` text collate utf8_unicode_ci NOT NULL,
  `attachfile` text collate utf8_unicode_ci,
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci AUTO_INCREMENT=187 ;

-- 
-- 列出以下資料庫的數據： `mail`
-- 

INSERT INTO `mail` VALUES (1, 'daniel@derek.com', 'andy@example.com, david@example.com, cindy@example.com', 'mary@example.com', 'bob@example.com', '畢業同學聚會', '各位同學:\r\n\r\n    自從畢業後已經有5年了, 相信大家都很想念在校時的美好時光吧! 趁著這個機會邀請大家來真好吃餐廳聚會. 一方面可以聊聊畢業後的工作經歷, 最主要還是要看看大家的近況. 希望大家都能熱情參與!\r\n\r\n                                      小龍   敬上', '邀請函.txt, 餐廳地圖.jpg');
