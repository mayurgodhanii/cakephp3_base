-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 09, 2016 at 11:39 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cakephp3`
--

-- --------------------------------------------------------

--
-- Table structure for table `roles`
--

DROP TABLE IF EXISTS `roles`;
CREATE TABLE IF NOT EXISTS `roles` (
`id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=utf8 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `roles`
--

INSERT INTO `roles` (`id`, `name`, `created`, `modified`) VALUES
(1, 'Super admin', '2015-11-27 00:00:00', '2015-11-27 00:00:00'),
(2, 'admin', '2015-12-16 00:00:00', '2015-12-16 00:00:00'),
(3, 'user', '2015-11-27 00:00:00', '2015-11-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `settings`
--

DROP TABLE IF EXISTS `settings`;
CREATE TABLE IF NOT EXISTS `settings` (
`id` int(11) NOT NULL,
  `key` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `input_type` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `settings`
--

INSERT INTO `settings` (`id`, `key`, `value`, `input_type`, `created`, `modified`) VALUES
(1, 'theme', 'skin-blue', 'select', NULL, NULL),
(2, 'fixed', '1', 'checkbox', NULL, NULL),
(3, 'site_title', 'Cakephp 3', 'text', NULL, NULL),
(4, 'site_name', 'Cakephp 3', 'text', NULL, NULL),
(5, 'logo_name', 'Cakephp 3', 'text', NULL, NULL),
(6, 'logo_name_mini', 'CP', 'text', NULL, NULL),
(7, 'copy_right_link', 'http://openxcell.com/', 'url', NULL, NULL),
(8, 'copy_right', 'Openxcell Technolabs @Mayur', 'text', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `themes`
--

DROP TABLE IF EXISTS `themes`;
CREATE TABLE IF NOT EXISTS `themes` (
`id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `value` varchar(255) NOT NULL,
  `theme_color_code` varchar(255) NOT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13 ;

--
-- Dumping data for table `themes`
--

INSERT INTO `themes` (`id`, `name`, `value`, `theme_color_code`, `created`, `modified`) VALUES
(1, 'Skin Blue', 'skin-blue', '#3C8DBC', NULL, NULL),
(2, 'Skin Blue Light', 'skin-blue-light', '#3C8DBC', NULL, NULL),
(3, 'Skin Yellow', 'skin-yellow', '#F39C12', NULL, NULL),
(4, 'Skin Yellow Light', 'skin-yellow-light', '#F39C12', NULL, NULL),
(5, 'Skin Green', 'skin-green', '#00A65A', NULL, NULL),
(6, 'Skin Green Light', 'skin-green-light', '#00A65A', NULL, NULL),
(7, 'Skin Purple', 'skin-purple', '#605CA8', NULL, NULL),
(8, 'Skin Purple Light', 'skin-purple-light', '#605CA8', NULL, NULL),
(9, 'Skin Red', 'skin-red', '#DD4B39', NULL, NULL),
(10, 'Skin Red Light', 'skin-red-light', '#DD4B39', NULL, NULL),
(11, 'Skin Black', 'skin-black', '#0E0E0E', NULL, NULL),
(12, 'Skin Black Light', 'skin-black-light', '#0E0E0E', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
`id` int(10) unsigned NOT NULL,
  `username` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) CHARACTER SET utf8 DEFAULT NULL,
  `role_id` int(11) DEFAULT NULL,
  `active` int(11) DEFAULT '1',
  `name` varchar(255) DEFAULT NULL,
  `bio` text,
  `profile` varchar(255) DEFAULT NULL,
  `created` datetime DEFAULT NULL,
  `modified` datetime DEFAULT NULL
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `role_id`, `active`, `name`, `bio`, `profile`, `created`, `modified`) VALUES
(1, 'admin@openxcell.com', '', '$2y$10$57YqPYIJicV9cXIWs0vnJOGTHaIc5Vk7vTBqjP9OFuhbJ77I1CCJ.', 1, 1, 'Admin Panel', 'Working @Openxcell', '160209100012_5bfe846f38c6526d209c140449d7d6a2.jpg', NULL, '2016-02-09 10:00:12');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `roles`
--
ALTER TABLE `roles`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings`
--
ALTER TABLE `settings`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `themes`
--
ALTER TABLE `themes`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `roles`
--
ALTER TABLE `roles`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `settings`
--
ALTER TABLE `settings`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `themes`
--
ALTER TABLE `themes`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=13;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
MODIFY `id` int(10) unsigned NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
