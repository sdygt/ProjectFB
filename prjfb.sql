-- phpMyAdmin SQL Dump
-- version 4.2.11
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 2015-05-27 17:52:44
-- 服务器版本： 5.6.20
-- PHP Version: 5.6.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `prjfb`
--

-- --------------------------------------------------------

--
-- 表的结构 `fb_account`
--

CREATE TABLE IF NOT EXISTS `fb_account` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `password` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `fb_account`
--

TRUNCATE TABLE `fb_account`;
--
-- 转存表中的数据 `fb_account`
--

INSERT INTO `fb_account` (`id`, `name`, `password`) VALUES
(1, 'test', '$2y$10$VGqORcdZHuQy1AQgtp/AlenZJL3GbXGtOjJKlH2KUT.isVcHuAZOC'),
(2, 'test2', '$2y$10$NCFkOVLGoJ1At3GzwTeHjeX2uWOVtP5DC0Vl.CWRUCdr8EW/R2ho.'),
(3, 'test3', '$2y$10$GbTiOVI3ghAgxAWjErDTruMVBZ9SQ9WBoGklmnyULdlKOyYr5fOdu');

-- --------------------------------------------------------

--
-- 表的结构 `fb_department`
--

CREATE TABLE IF NOT EXISTS `fb_department` (
  `id` tinyint(4) NOT NULL,
  `name` text NOT NULL,
  `introduce` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `fb_department`
--

TRUNCATE TABLE `fb_department`;
--
-- 转存表中的数据 `fb_department`
--

INSERT INTO `fb_department` (`id`, `name`, `introduce`) VALUES
(1, '主席团', '主席团的介绍'),
(2, '计算机部', '计算机部'),
(3, '电子部', '电子部介绍'),
(4, '网络部', '网络部介绍'),
(5, '办公室', '办公室介绍'),
(6, '科宣', '科宣介绍'),
(7, '外联部', '外联部介绍'),
(8, '社团发展部', '社团发展部介绍'),
(9, 'SAST工作室', 'SAST工作室介绍');

-- --------------------------------------------------------

--
-- 表的结构 `fb_member`
--

CREATE TABLE IF NOT EXISTS `fb_member` (
`id` int(11) NOT NULL,
  `name` text NOT NULL,
  `year` year(4) NOT NULL,
  `imgurl` text NOT NULL,
  `department` tinyint(4) NOT NULL,
  `introduce` text NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=34 DEFAULT CHARSET=utf8;

--
-- 插入之前先把表清空（truncate） `fb_member`
--

TRUNCATE TABLE `fb_member`;
--
-- 转存表中的数据 `fb_member`
--

INSERT INTO `fb_member` (`id`, `name`, `year`, `imgurl`, `department`, `introduce`) VALUES
(1, '张晓强', 2013, '552e7b111f7ec.jpg', 1, 'iceashiceashiceashiceashiceashiceashiceashiceashiceashiceashiceashiceashiceashiceashiceashiceash'),
(2, '香蕉网', 2012, '552e7b1f85279.png', 2, 'sadsadpigpig121112121'),
(3, '贵阳', 2014, '2.jpg', 3, 'goodgoodyi'),
(4, '天使', 2000, '3.jpg', 4, 'tstststs'),
(28, '黄花岗', 2011, '552be7d04f075.gif', 3, '暗示<br/>让他<br/>与<br/>水电费水电费'),
(30, '氢气球', 1993, '552e2e3dab2de.png', 1, 'qq'),
(31, '呵呵哒', 1990, '5564586e81fba.png', 1, '呵呵哒哈哈哈的'),
(32, '呵呵大啊啊', 2015, '5564599405918.jpg', 4, '方法'),
(33, '张晓强II', 2013, '552e7b111f7ec.jpg', 1, 'iceashiceashiceashiceashiceashiceashiceash22222222222222222');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `fb_account`
--
ALTER TABLE `fb_account`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fb_department`
--
ALTER TABLE `fb_department`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `fb_member`
--
ALTER TABLE `fb_member`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `fb_account`
--
ALTER TABLE `fb_account`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `fb_member`
--
ALTER TABLE `fb_member`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=34;COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
