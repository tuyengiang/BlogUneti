-- phpMyAdmin SQL Dump
-- version 4.4.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 20, 2018 at 02:43 AM
-- Server version: 5.6.25
-- PHP Version: 5.6.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `blog-uneti`
--

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE IF NOT EXISTS `category` (
  `id` int(11) NOT NULL,
  `title` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `title`, `content`) VALUES
(1, 'Học Html & Css cơ bản', ''),
(2, 'Lập trình Php cơ bản', ''),
(3, 'Lập trình javascript', ''),
(4, 'Học Bootstrap 3', '');

-- --------------------------------------------------------

--
-- Table structure for table `post`
--

CREATE TABLE IF NOT EXISTS `post` (
  `id` int(11) NOT NULL,
  `title` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `content` text COLLATE utf8_unicode_ci NOT NULL,
  `excerpt` varchar(200) COLLATE utf8_unicode_ci NOT NULL,
  `date_time` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `cat_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL DEFAULT 'nen.jpg'
) ENGINE=InnoDB AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `post`
--

INSERT INTO `post` (`id`, `title`, `content`, `excerpt`, `date_time`, `cat_id`, `user_id`, `images`) VALUES
(9, 's', 'sd', 'd', '2018-02-10 23:10:17', 1, 1, '002.png'),
(10, 'ascvbn', 'sdfg', 'sdfgh', '2018-02-10 23:12:40', 1, 2, '002.png'),
(11, 'asdfgh', 'd', 's', '2018-02-10 23:15:30', 1, 2, '002.png'),
(12, 'asdf', 'sd', 'asdfg', '2018-02-10 23:17:20', 1, 2, '002.png'),
(14, 'bài của tuyển giảng', 'ád', 'ád', '2018-02-12 20:44:38', 1, 2, '002.png'),
(17, 'BAI 1', 'TRYUIOP[', 'RETYUIO', '2018-02-17 11:22:56', 4, 1, '9556831a37383939ccab785866795c34.jpg'),
(18, 'Nguyễn tuyển giảng', 'nôi dung của bai là ở đây\r\nnội dung là ở đây\r\nnôi dung của bai là ở đây\r\nnội dung là ở đây\r\nnôi dung của bai là ở đây\r\nnội dung là ở đây\r\nnôi dung của bai là ở đây\r\nnội dung là ở đây\r\nnôi dung của bai là ở đây\r\nnội dung là ở đây\r\n', 'đây kaf nội dung tóm tát cửa bài', '2018-02-19 09:44:11', 4, 1, 'hotgirl-noi-tieng-thai-lan-bat-ngo-qua-viet-nam-du-lich.jpg'),
(19, 'ádfghjk', '<p><img src="images/002.png" alt="" width="400" height="400" /></p>', '<p>hjkl</p>', '2018-02-19 10:30:48', 2, 1, '308d1d93d2ed058fe36b994f284c4cd3.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `taikhoan`
--

CREATE TABLE IF NOT EXISTS `taikhoan` (
  `id` int(11) NOT NULL,
  `username` varchar(30) COLLATE utf8_unicode_ci NOT NULL,
  `password` varchar(32) COLLATE utf8_unicode_ci NOT NULL,
  `images` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `hoten` varchar(50) COLLATE utf8_unicode_ci NOT NULL,
  `gioitinh` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Dumping data for table `taikhoan`
--

INSERT INTO `taikhoan` (`id`, `username`, `password`, `images`, `hoten`, `gioitinh`) VALUES
(1, 'admin', 'e10adc3949ba59abbe56e057f20f883e', '002.png', 'Tuyển Giảng', 1),
(2, 'tuyengiang', 'e10adc3949ba59abbe56e057f20f883e', '002.png', 'Giang', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `post`
--
ALTER TABLE `post`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taikhoan`
--
ALTER TABLE `taikhoan`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=5;
--
-- AUTO_INCREMENT for table `post`
--
ALTER TABLE `post`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `taikhoan`
--
ALTER TABLE `taikhoan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
