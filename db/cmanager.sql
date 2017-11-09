-- phpMyAdmin SQL Dump
-- version 4.4.15.9
-- https://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 09, 2017 at 04:06 AM
-- Server version: 5.6.36
-- PHP Version: 7.0.16

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cmanager`
--

-- --------------------------------------------------------

--
-- Table structure for table `feedbacks`
--

CREATE TABLE IF NOT EXISTS `feedbacks` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reciever_id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `content` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `feedbacks`
--

INSERT INTO `feedbacks` (`id`, `user_id`, `reciever_id`, `title`, `content`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 10, 8, 'Test Feedback', 'This is just a test feedback', '2017-10-29 07:30:19', '2017-10-29 07:30:19', 10, 10),
(2, 10, 9, 'Tea', 'et', '2017-10-29 07:36:01', '2017-10-29 07:36:01', 10, 10),
(4, 8, 9, 'rrrrrrrr', 'kkkkkkkkkk', '2017-10-29 08:17:18', '2017-10-29 08:17:18', 8, 8),
(5, 10, 8, 'sssss', 'ssssssssssssssss', '2017-10-29 08:18:09', '2017-10-29 08:18:09', 10, 10),
(6, 10, 9, 'ttttttt', 'ttttttttttttttttttttttttt', '2017-10-29 08:18:49', '2017-10-29 08:18:49', 10, 10),
(7, 8, 9, 'ss', 'ddd', '2017-11-04 05:54:20', '2017-11-04 05:54:20', 8, 8),
(8, 8, 9, 'ddddddddddd', 'dddddddddddddddd', '2017-11-04 05:54:41', '2017-11-04 05:54:41', 8, 8),
(9, 8, 9, 'LATEST OONE', 'This is the Latest Feedback you have from me', '2017-11-09 02:53:55', '2017-11-09 02:53:55', 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `menus`
--

CREATE TABLE IF NOT EXISTS `menus` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `lft` int(11) NOT NULL DEFAULT '0',
  `rght` int(11) NOT NULL DEFAULT '0',
  `parent_id` int(11) NOT NULL DEFAULT '0',
  `has_child` tinyint(1) NOT NULL,
  `display` tinyint(1) NOT NULL,
  `menu_order` int(11) NOT NULL,
  `controller` varchar(255) NOT NULL,
  `action` varchar(255) NOT NULL,
  `url` text NOT NULL,
  `class` varchar(255) NOT NULL,
  `tag` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=43 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus`
--

INSERT INTO `menus` (`id`, `name`, `lft`, `rght`, `parent_id`, `has_child`, `display`, `menu_order`, `controller`, `action`, `url`, `class`, `tag`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(32, 'HOME', 1, 2, 0, 0, 1, 1, 'Dashboard', 'index', '/', '', '', '2017-11-08 17:42:31', '2017-11-08 17:42:31', 10, 10),
(38, 'PROJECT DETAILS', 3, 4, 0, 0, 1, 5, 'Projects', 'info', '/projects/info', '', '', '2017-11-08 18:09:29', '2017-11-08 18:09:29', 10, 10),
(39, 'GIVE RATINGS', 5, 6, 0, 0, 1, 5, '', '', '/ratings/add', '', '', '2017-11-08 18:13:25', '2017-11-08 18:13:25', 10, 10),
(40, 'FEEDBACK', 7, 12, 0, 1, 1, 1, '', '', '', '', '', '2017-11-08 18:16:21', '2017-11-08 18:16:21', 8, 8),
(41, 'WRITE FEEDBACK', 8, 9, 40, 0, 1, 4, '', '', '/feedbacks/add', '', '', '2017-11-08 18:18:20', '2017-11-08 18:18:20', 8, 8),
(42, 'REVIEW FEEDBACKS', 10, 11, 40, 0, 1, 6, '', '', '/feedbacks/read', '', '', '2017-11-08 18:19:25', '2017-11-08 18:19:25', 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `menus_types`
--

CREATE TABLE IF NOT EXISTS `menus_types` (
  `id` int(11) NOT NULL,
  `menu_id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=49 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `menus_types`
--

INSERT INTO `menus_types` (`id`, `menu_id`, `type_id`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(22, 32, 1, '2017-11-08 17:42:53', '2017-11-08 17:42:53', 10, 10),
(23, 32, 2, '2017-11-08 17:43:00', '2017-11-08 17:43:00', 10, 10),
(24, 32, 3, '2017-11-08 17:43:05', '2017-11-08 17:43:05', 10, 10),
(25, 32, 4, '2017-11-08 17:43:13', '2017-11-08 17:43:13', 10, 10),
(26, 32, 5, '2017-11-08 17:43:20', '2017-11-08 17:43:20', 10, 10),
(34, 38, 1, '2017-11-08 18:11:48', '2017-11-08 18:11:48', 10, 10),
(35, 38, 2, '2017-11-08 18:11:59', '2017-11-08 18:11:59', 10, 10),
(36, 38, 3, '2017-11-08 18:12:11', '2017-11-08 18:12:11', 10, 10),
(37, 38, 4, '2017-11-08 18:12:22', '2017-11-08 18:12:22', 10, 10),
(38, 38, 5, '2017-11-08 18:12:31', '2017-11-08 18:12:31', 10, 10),
(39, 39, 1, '2017-11-08 18:13:57', '2017-11-08 18:13:57', 10, 10),
(40, 39, 2, '2017-11-08 18:14:05', '2017-11-08 18:14:05', 10, 10),
(41, 39, 3, '2017-11-08 18:14:14', '2017-11-08 18:14:14', 10, 10),
(42, 39, 5, '2017-11-08 18:14:21', '2017-11-08 18:14:48', 10, 10),
(43, 39, 4, '2017-11-08 18:14:29', '2017-11-08 18:14:29', 10, 10),
(44, 40, 2, '2017-11-08 18:16:27', '2017-11-08 18:16:27', 0, 0),
(45, 40, 3, '2017-11-08 18:16:48', '2017-11-08 18:16:48', 8, 8),
(46, 40, 4, '2017-11-08 18:16:58', '2017-11-08 18:16:58', 8, 8),
(47, 40, 5, '2017-11-08 18:17:10', '2017-11-08 18:17:10', 8, 8),
(48, 42, 1, '2017-11-08 18:21:37', '2017-11-08 18:21:37', 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `projects`
--

CREATE TABLE IF NOT EXISTS `projects` (
  `id` int(11) NOT NULL,
  `title` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `projects`
--

INSERT INTO `projects` (`id`, `title`, `description`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'Project -01', 'This is a test project', '2017-10-27 06:10:50', '2017-10-27 06:10:50', 8, 8),
(2, 'Project -02', 'This is a test Project', '2017-10-27 06:11:35', '2017-10-27 06:11:35', 8, 8);

-- --------------------------------------------------------

--
-- Table structure for table `ratings`
--

CREATE TABLE IF NOT EXISTS `ratings` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `reviever_id` int(11) NOT NULL,
  `rating_points` float NOT NULL,
  `note_of_advice` text NOT NULL,
  `created` date NOT NULL,
  `modified` date NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=59 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `ratings`
--

INSERT INTO `ratings` (`id`, `user_id`, `reviever_id`, `rating_points`, `note_of_advice`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(33, 8, 8, 6.9, 'note', '2017-11-07', '2017-11-07', 8, 8),
(34, 9, 9, 6.02, 'u', '2017-11-07', '2017-11-07', 9, 9),
(35, 10, 10, 8.58, 'gg', '2017-11-07', '2017-11-07', 10, 10),
(36, 9, 9, 6.74, 'dddddddddd', '2017-11-06', '2017-11-06', 9, 9),
(37, 8, 8, 6.5, 'cc', '2017-11-06', '2017-11-06', 8, 8),
(38, 10, 10, 8.48, 'd', '2017-11-06', '2017-11-06', 10, 10),
(39, 10, 10, 8.52, 'bbbb', '2017-11-05', '2017-11-05', 10, 10),
(40, 8, 8, 6.62, 'n', '2017-11-05', '2017-11-05', 8, 8),
(41, 9, 9, 6.92, 'dd', '2017-11-05', '2017-11-05', 9, 9),
(42, 9, 9, 7.66, 'ee', '2017-11-04', '2017-11-04', 9, 9),
(43, 8, 8, 6.44, 'nn', '2017-11-04', '2017-11-04', 8, 8),
(44, 10, 10, 7.62, 'u', '2017-11-04', '2017-11-04', 10, 10),
(45, 10, 10, 7.4, 'u', '2017-11-03', '2017-11-03', 10, 10),
(46, 8, 8, 6.72, 'ii', '2017-11-03', '2017-11-03', 8, 8),
(47, 9, 9, 9.6, 'pp', '2017-11-03', '2017-11-03', 9, 9),
(48, 9, 9, 7.48, 'uu', '2017-11-02', '2017-11-02', 9, 9),
(49, 8, 8, 7.26, 'jjj', '2017-11-02', '2017-11-02', 8, 8),
(50, 10, 10, 7.16, 'ww', '2017-11-02', '2017-11-02', 10, 10),
(51, 10, 10, 7.34, 'ee', '2017-11-01', '2017-11-01', 10, 10),
(52, 8, 8, 7.98, 'ee', '2017-11-01', '2017-11-01', 8, 8),
(53, 9, 9, 10, 'uu', '2017-11-01', '2017-11-01', 9, 9),
(54, 8, 8, 6.52, 'iiiiiiii', '2017-10-31', '2017-10-31', 8, 8),
(55, 9, 9, 6.56, 'ga', '2017-10-30', '2017-10-30', 9, 9),
(56, 9, 9, 6.8, 'ee', '2017-10-29', '2017-10-29', 9, 9),
(57, 10, 10, 6.7, 'eeeeeee', '2017-10-29', '2017-10-29', 10, 10),
(58, 9, 9, 9.06, 'ff', '2017-11-08', '2017-11-08', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `teams`
--

CREATE TABLE IF NOT EXISTS `teams` (
  `id` int(11) NOT NULL,
  `leader_id` int(11) NOT NULL,
  `project_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `short_description` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `teams`
--

INSERT INTO `teams` (`id`, `leader_id`, `project_id`, `user_id`, `short_description`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(6, 9, 1, 10, 'Test', '2017-10-28 13:04:27', '2017-10-28 13:04:27', 9, 9),
(7, 9, 1, 8, 'eee', '2017-10-28 13:04:42', '2017-10-28 13:04:42', 9, 9),
(8, 9, 1, 9, 'ssssss', '2017-10-28 13:04:53', '2017-10-28 13:04:53', 9, 9);

-- --------------------------------------------------------

--
-- Table structure for table `teams_users`
--

CREATE TABLE IF NOT EXISTS `teams_users` (
  `id` int(11) NOT NULL,
  `team_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `types`
--

CREATE TABLE IF NOT EXISTS `types` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `types`
--

INSERT INTO `types` (`id`, `name`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(1, 'HR', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(2, 'associate engineer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(3, 'senior engineer', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(4, 'communication associate', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0),
(5, 'other', '0000-00-00 00:00:00', '0000-00-00 00:00:00', 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE IF NOT EXISTS `users` (
  `id` int(11) NOT NULL,
  `type_id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `registeraton_number` int(11) NOT NULL,
  `contact` bigint(11) NOT NULL,
  `address` text NOT NULL,
  `created` datetime NOT NULL,
  `modified` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_by` int(11) NOT NULL
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `type_id`, `username`, `password`, `first_name`, `last_name`, `registeraton_number`, `contact`, `address`, `created`, `modified`, `created_by`, `modified_by`) VALUES
(8, 2, 'admin', '$2y$10$YgfsvSC/l8rwwlCfKLkIJOiw81FsE57M3VLuVWCdS8o1BEA14SOOK', 'user', 'ser', 1111, 11111111, 'none', '2017-10-20 09:28:16', '2017-10-20 09:31:13', 0, 0),
(9, 1, 'user', '$2y$10$J9S7AxW5w9IhOMV8rPyOMuG74T2ZEP3BSTlVnKLyux5mM.urGfRKK', 'qqqqqqqq', 'qqqqqqq', 111111111, 1111111, 'sssssssssssssssssssssssssssss', '2017-10-20 10:00:11', '2017-10-20 10:00:11', 0, 0),
(10, 4, 'adi', '$2y$10$Q6y9fAHtA7AKqYyDzZMw3OvLnmGRwZ8.BRs.gS/V007XHIGIQnAbG', 'aditya', 'soni', 123456, 98765421022, 'ssssssssss', '2017-10-27 05:07:45', '2017-10-27 05:37:06', 8, 9);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `feedbacks`
--
ALTER TABLE `feedbacks`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus`
--
ALTER TABLE `menus`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `menus_types`
--
ALTER TABLE `menus_types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `projects`
--
ALTER TABLE `projects`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ratings`
--
ALTER TABLE `ratings`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- Indexes for table `teams`
--
ALTER TABLE `teams`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `user_id` (`user_id`);

--
-- Indexes for table `teams_users`
--
ALTER TABLE `teams_users`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `types`
--
ALTER TABLE `types`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `registeraton_number` (`registeraton_number`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `feedbacks`
--
ALTER TABLE `feedbacks`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=10;
--
-- AUTO_INCREMENT for table `menus`
--
ALTER TABLE `menus`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=43;
--
-- AUTO_INCREMENT for table `menus_types`
--
ALTER TABLE `menus_types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=49;
--
-- AUTO_INCREMENT for table `projects`
--
ALTER TABLE `projects`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `ratings`
--
ALTER TABLE `ratings`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=59;
--
-- AUTO_INCREMENT for table `teams`
--
ALTER TABLE `teams`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=9;
--
-- AUTO_INCREMENT for table `teams_users`
--
ALTER TABLE `teams_users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
--
-- AUTO_INCREMENT for table `types`
--
ALTER TABLE `types`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=11;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
