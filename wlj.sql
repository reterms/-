-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- 主机： 127.0.0.1
-- 生成日期： 2022-05-29 12:50:45
-- 服务器版本： 10.4.22-MariaDB
-- PHP 版本： 8.0.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 数据库： `wlj`
--
CREATE DATABASE IF NOT EXISTS `wlj` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `wlj`;

-- --------------------------------------------------------

--
-- 表的结构 `account`
--

CREATE TABLE `account` (
  `id` bigint(20) NOT NULL,
  `user` varchar(32) NOT NULL,
  `password` varchar(32) NOT NULL,
  `desc` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `account`
--

INSERT INTO `account` (`id`, `user`, `password`, `desc`) VALUES
(1, 'admin', '12345', '管理员');

-- --------------------------------------------------------

--
-- 表的结构 `student`
--

CREATE TABLE `student` (
  `id` bigint(20) NOT NULL,
  `stuid` varchar(8) NOT NULL,
  `name` varchar(32) DEFAULT NULL,
  `sex` char(2) DEFAULT NULL,
  `birthday` char(10) DEFAULT NULL,
  `classname` varchar(32) DEFAULT NULL,
  `classid` varchar(8) DEFAULT NULL,
  `major` varchar(32) DEFAULT NULL,
  `room` varchar(32) DEFAULT NULL,
  `bedid` varchar(32) DEFAULT NULL,
  `homeaddress` varchar(50) DEFAULT NULL,
  `tel` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- 转存表中的数据 `student`
--

INSERT INTO `student` (`id`, `stuid`, `name`, `sex`, `birthday`, `classname`, `classid`, `major`, `room`, `bedid`, `homeaddress`, `tel`) VALUES
(1, '20210001', '李四', '男', '2003-01-03', '2021级', '2105班', '软件技术', '学二301室', '1号床', '广州市白云区钟落潭镇', '11111111111'),
(2, '20210002', '王五', '男', '2003-10-01', '2021级', '2105班', '软件技术', '学二301室', '2号床', '广州市白云区钟落潭镇', '22222222222'),
(3, '20210003', '张三', '男', '2002-05-01', '2021级', '2105班', '软件技术', '学二301室', '3号床', '广州市白云区钟落潭镇', '33333333333');

--
-- 转储表的索引
--

--
-- 表的索引 `account`
--
ALTER TABLE `account`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user` (`user`);

--
-- 表的索引 `student`
--
ALTER TABLE `student`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `stu_id` (`stuid`);

--
-- 在导出的表使用AUTO_INCREMENT
--

--
-- 使用表AUTO_INCREMENT `account`
--
ALTER TABLE `account`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- 使用表AUTO_INCREMENT `student`
--
ALTER TABLE `student`
  MODIFY `id` bigint(20) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
