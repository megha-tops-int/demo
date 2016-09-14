-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 22, 2016 at 07:32 AM
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
-- Table structure for table `about_us`
--

CREATE TABLE IF NOT EXISTS `about_us` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `pillar_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `pillar_name`, `description`, `slug`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(1, 'Diversity', 'Test Diversity', 'diversity', '2016-02-15 13:41:58', 1, '2016-02-15 13:43:33', 1, 1),
(2, 'Leadership', 'Test Leadership', 'leadership', '2016-02-15 13:43:20', 1, '2016-02-15 13:43:20', 0, 1),
(3, 'Creativity', 'Test Creativity', 'creativity', '2016-02-15 13:43:53', 1, '2016-02-15 13:43:53', 0, 1),
(4, 'Wellbeing', 'Test Wellbeing', 'wellbeing', '2016-02-15 13:44:08', 1, '2016-02-15 17:46:59', 1, 1),
(5, 'About us', 'test about us', 'about-us', '2016-02-15 18:38:37', 1, '2016-02-16 17:06:39', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `admin_users`
--

INSERT INTO `admin_users` (`id`, `user_id`, `name`, `email`, `password`, `createdDate`, `modifiedDate`, `status`) VALUES
(1, 0, 'Administrator', 'tushar.solanki@tops-int.com', 't0CqoakzH/BqS1nJsTP4B2wP0a490EVJaJWaO0/oSMw=', '0000-00-00 00:00:00', '2015-12-11 12:28:23', 1),
(2, 0, 'hardik', 'hardik.devariya@tops-int.com', '2rdYd64B7t1D7JQEQb3xkBrqNsr31kQApF9q71fvk7c=', '2015-12-12 08:36:06', '2015-12-12 08:12:39', 1),
(3, 0, 'parag', 'parag.joshi@tops-int.com', 't0CqoakzH/BqS1nJsTP4B2wP0a490EVJaJWaO0/oSMw=', '2015-12-12 08:36:06', '2016-02-15 17:47:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_master`
--

CREATE TABLE IF NOT EXISTS `content_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `page_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content_master`
--

INSERT INTO `content_master` (`id`, `page_name`, `description`, `slug`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(1, 'Terms & conditions', 'test Terms &amp; conditions', 'terms-conditions', '2016-02-15 18:40:03', 1, '2016-02-15 18:40:03', 0, 1),
(2, 'Privacy & Cookie Policies', 'test Privacy &amp; Cookie Policies', 'privacy-cookie-policies', '2016-02-15 18:40:51', 1, '2016-02-15 18:40:51', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `customer_master`
--

CREATE TABLE IF NOT EXISTS `customer_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `gender` varchar(50) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `event_name` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`id`, `event_name`, `organizer`, `date_time`, `image`, `location`, `description`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(1, 'test', 'test', '2016-02-19 08:00:28', '25989f1-bloggers-121_zpsb8af4a7e.jpg', '1919 Pennsylvania Avenue Northwest, Washington, DC, United States', 'test', '2016-02-19 14:36:01', 1, '2016-02-19 14:36:01', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `field_details`
--

CREATE TABLE IF NOT EXISTS `field_details` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `module_type` tinyint(1) NOT NULL COMMENT '1 about us, 2 project management 3 event management',
  `master_id` int(11) NOT NULL COMMENT 'If module_type = 1 then from table about_us id, If module_type = 2 then from table project_master id, If module_type = 3 then from table event_master id',
  `field_type` tinyint(1) NOT NULL COMMENT '1-URL,2-Text,3-Files',
  `sequence` int(11) NOT NULL,
  `field_value` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `partners_master`
--

CREATE TABLE IF NOT EXISTS `partners_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `partner_name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `project_master`
--

CREATE TABLE IF NOT EXISTS `project_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `project_title` varchar(255) NOT NULL,
  `project_type` varchar(255) NOT NULL,
  `image` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `settings_master`
--

CREATE TABLE IF NOT EXISTS `settings_master` (
`id` int(11) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings_master`
--

INSERT INTO `settings_master` (`id`, `video_url`, `status`) VALUES
(1, 'https://www.test.com/', 1);

-- --------------------------------------------------------

--
-- Table structure for table `slider_master`
--

CREATE TABLE IF NOT EXISTS `slider_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `title` text NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 : Image, 2 : Video URL',
  `field_value` varchar(255) NOT NULL,
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
-- Indexes for table `about_us`
--
ALTER TABLE `about_us`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `admin_users`
--
ALTER TABLE `admin_users`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `content_master`
--
ALTER TABLE `content_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `customer_master`
--
ALTER TABLE `customer_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `event_master`
--
ALTER TABLE `event_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `field_details`
--
ALTER TABLE `field_details`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `partners_master`
--
ALTER TABLE `partners_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `project_master`
--
ALTER TABLE `project_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `settings_master`
--
ALTER TABLE `settings_master`
 ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider_master`
--
ALTER TABLE `slider_master`
 ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `about_us`
--
ALTER TABLE `about_us`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=6;
--
-- AUTO_INCREMENT for table `admin_users`
--
ALTER TABLE `admin_users`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `content_master`
--
ALTER TABLE `content_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=3;
--
-- AUTO_INCREMENT for table `customer_master`
--
ALTER TABLE `customer_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment';
--
-- AUTO_INCREMENT for table `event_master`
--
ALTER TABLE `event_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `field_details`
--
ALTER TABLE `field_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment';
--
-- AUTO_INCREMENT for table `partners_master`
--
ALTER TABLE `partners_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment';
--
-- AUTO_INCREMENT for table `project_master`
--
ALTER TABLE `project_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment';
--
-- AUTO_INCREMENT for table `settings_master`
--
ALTER TABLE `settings_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT,AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `slider_master`
--
ALTER TABLE `slider_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment';
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
