-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 13, 2016 at 11:13 AM
-- Server version: 5.6.20
-- PHP Version: 5.5.15

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `junction_studio`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_users`
--

CREATE TABLE IF NOT EXISTS `admin_users` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `user_id` int(11) NOT NULL COMMENT 'From user_master',
  `name` varchar(100) NOT NULL,
  `email` varchar(150) NOT NULL,
  `password` varchar(250) NOT NULL,
  `createdDate` datetime NOT NULL,
  `modifiedDate` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_id`, `name`, `email`, `password`, `createdDate`, `modifiedDate`, `status`) VALUES
(1, 0, 'Administrator', 'tushar.solanki@tops-int.com', 't0CqoakzH/BqS1nJsTP4B2wP0a490EVJaJWaO0/oSMw=', '0000-00-00 00:00:00', '2015-12-11 12:28:23', 1),
(2, 0, 'hardik', 'hardik.devariya@tops-int.com', '2rdYd64B7t1D7JQEQb3xkBrqNsr31kQApF9q71fvk7c=', '2015-12-12 08:36:06', '2015-12-12 08:12:39', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tag_master`
--

CREATE TABLE IF NOT EXISTS `tag_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `title` varchar(100) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tag_master`
--
ALTER TABLE `tag_master`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `tag_master`
--
ALTER TABLE `tag_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
