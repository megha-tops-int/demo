-- phpMyAdmin SQL Dump
-- version 4.2.7.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Mar 08, 2016 at 07:08 AM
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
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=6 ;

--
-- Dumping data for table `about_us`
--

INSERT INTO `about_us` (`id`, `pillar_name`, `description`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(1, 'Diversity1', 'Test Diversity', 'diversity', '', '', '', '2016-02-15 13:41:58', 1, '2016-02-24 13:42:11', 1, 1),
(2, 'Leadership', 'Test Leadership', 'leadership', '', '', '', '2016-02-15 13:43:20', 1, '2016-02-15 13:43:20', 0, 1),
(3, 'Creativity', 'Test Creativity', 'creativity', '', '', '', '2016-02-15 13:43:53', 1, '2016-02-15 13:43:53', 0, 1),
(4, 'Wellbeing2', 'Test Wellbeing', 'wellbeing', '', '', '', '2016-02-15 13:44:08', 1, '2016-02-24 13:41:31', 1, 1),
(5, 'About us', '<strong><span style="font-family:lucida sans unicode,lucida grande,sans-serif;">Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32</span></strong>', 'about', '', '', '', '2016-02-15 18:38:37', 1, '2016-02-29 14:21:03', 1, 1);

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
(1, 0, 'Administrator', 'tushar.solanki@tops-int.com', 'NN1avASBC0Kd8lvoAXe7yNzFzyvpY3XeIq0/Tjbq0tE=', '0000-00-00 00:00:00', '2015-12-11 12:28:23', 1),
(2, 0, 'hardik', 'hardik.devariya@tops-int.com', 'NN1avASBC0Kd8lvoAXe7yNzFzyvpY3XeIq0/Tjbq0tE=', '2015-12-12 08:36:06', '2016-02-29 15:02:09', 1),
(3, 0, 'parag', 'parag.joshi@tops-int.com', 'NN1avASBC0Kd8lvoAXe7yNzFzyvpY3XeIq0/Tjbq0tE=', '2015-12-12 08:36:06', '2016-02-15 17:47:11', 1);

-- --------------------------------------------------------

--
-- Table structure for table `contact_us`
--

CREATE TABLE IF NOT EXISTS `contact_us` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `contact_no` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `type` tinyint(1) NOT NULL COMMENT '1 event 2 project 3 other',
  `title` varchar(255) NOT NULL,
  `feedback_for_id` int(11) NOT NULL COMMENT 'If type = 1 or 2',
  `message` text NOT NULL,
  `be_volunteer` tinyint(1) NOT NULL COMMENT '0 not volunteer,1 be volunteer',
  `created_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `contact_us`
--

INSERT INTO `contact_us` (`id`, `first_name`, `last_name`, `contact_no`, `email`, `type`, `title`, `feedback_for_id`, `message`, `be_volunteer`, `created_date`, `status`) VALUES
(2, 'hardik', 'Makwana', '1231231231', 'hardik.devariya@tops-int.com', 1, 'test', 1, 'test', 1, '0000-00-00 00:00:00', 1),
(3, 'Tushar', 'Solanki', '1234567890', 'me@hepah.io', 3, '', 0, 'Acaihile gel ro duzpus opu ekuho uka ore ageri ze uhtukto mijicbal unabute massaku sa livnurul tuw miheup. Ackopir iji jezodut arkafo zoj pukev do imug taka sidrem lat jonatman ul gihep ga luunfel ej ode. Ojhodkan ros bah li igigafuj rocen waf zogsu hetoosi utaru banuda usi narfaab. Ral ta wihwek uka sekvuv epared libdefvow suwlahwu livos ik ha obebelep ulu.', 1, '0000-00-00 00:00:00', 1),
(4, 'Anand ', 'Patel', '123123123', 'anand.patel@tops-int.com', 2, 'Tushat Test', 5, 'Test', 1, '0000-00-00 00:00:00', 1),
(5, 'Yrn''npgglggDte', 'Ghhs eoant', '1234567890', 'fozifuv@tacgehja.gov', 1, 'Tushar Testtt', 2, 'Jub bihaoze juw hi bivesa ograpu su ufhidlem his baasuku vi pezboogu tubih antozcev vuduvo somju ajuocib ha. Sopdik zucek zonodimi zuznubmar nicdoj kemuj zew nabunuzi zipkizva vunlegoj kocgo cej zagmook nera rul. Agtipus na opiiz norfooc lealmiw semra zaf huh af sebaj nu kas.', 1, '0000-00-00 00:00:00', 1),
(6, 'Hirva', 'Event', '1234567890', 'hirva.shah@tops-int.com', 1, 'Hirva Event', 3, 'Test', 1, '0000-00-00 00:00:00', 1),
(7, 'Hirva', 'Project', '1234567890', 'hirva.shah@tops-int.com', 2, 'Hirva Test', 6, 'Test', 1, '0000-00-00 00:00:00', 1),
(8, 'Hirva', 'Other', '1234567890', 'hirva.shah@tops-int.com', 3, '', 0, 'test', 0, '0000-00-00 00:00:00', 1);

-- --------------------------------------------------------

--
-- Table structure for table `content_master`
--

CREATE TABLE IF NOT EXISTS `content_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `page_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `slug` varchar(255) NOT NULL,
  `meta_title` varchar(255) NOT NULL,
  `meta_keyword` text NOT NULL,
  `meta_description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `content_master`
--

INSERT INTO `content_master` (`id`, `page_name`, `description`, `slug`, `meta_title`, `meta_keyword`, `meta_description`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(1, 'Terms & conditions', '<p>Everywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Perhaps Shoes Hey Race As Thankful Lag Buildings Bet Us Three Percent Toenails Low Rattled Shirking Afternoon A Indeed Ruckus Amounts Barley.</p>\r\n\r\n<p>Or Splashing Sneakers Somewhere Kettle Lighted A Begged Left Am Moo Clearly Own Someone Watching Hullabaloo Seemed Sort Hustled Biggest I Everywhere Nonsense Stones Yourselves Yipp My Wonderfully Kangaroo Beeping Kinds Starting Congratulations Guaranteed Along Bad Enjoying Elephant Everyone Remember Dexterous Is Kangaroos&#39; Bit Oh.</p>\r\n\r\n<p>Everywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Perhaps Shoes Hey Race As Thankful Lag Buildings Bet Us Three Percent Toenails Low Rattled Shirking Afternoon A Indeed Ruckus Amounts Barley.</p>\r\n\r\n<p>Or Splashing Sneakers Somewhere Kettle Lighted A Begged Left Am Moo Clearly Own Someone Watching Hullabaloo Seemed Sort Hustled Biggest I Everywhere Nonsense Stones Yourselves Yipp My Wonderfully Kangaroo Beeping Kinds Starting Congratulations Guaranteed Along Bad Enjoying Elephant Everyone Remember Dexterous Is Kangaroos&#39; Bit Oh.</p>\r\n', 'terms-and-conditions', '', '', '', '2016-02-15 18:40:03', 1, '2016-02-24 09:14:22', 1, 1),
(2, 'Privacy Policiess', 'Privacy Policies', 'privacy-policies', '', '', '', '2016-02-15 18:40:51', 1, '2016-02-26 12:44:54', 1, 1);

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
-- Table structure for table `donation_master`
--

CREATE TABLE IF NOT EXISTS `donation_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `saints_member_no` varchar(255) NOT NULL,
  `saints_applicable` tinyint(1) NOT NULL COMMENT '1 Not Applicable ',
  `organization_name` varchar(255) NOT NULL,
  `organisation_applicable` tinyint(1) NOT NULL COMMENT '1 Not Applicable ',
  `email` varchar(255) NOT NULL,
  `phone_no` varchar(255) NOT NULL,
  `address` text NOT NULL,
  `registered_charity` tinyint(1) NOT NULL COMMENT '1 Yes 2 No',
  `your_event_date` date NOT NULL COMMENT 'Event Date',
  `event_calander` tinyint(1) NOT NULL COMMENT '1 Not Applicable',
  `applicant_type` tinyint(2) NOT NULL COMMENT '1 Not for Profit Organisation. 2 Community Organisation 3 For Profit Organisation 4 Individual 5 Other',
  `applicant_title` varchar(250) NOT NULL COMMENT 'IF applicant_type = 5 then application info',
  `requesting` tinyint(1) NOT NULL COMMENT '1 Game day tickets 2 Giveaways 3 Fundraising items 4 Personalised letter, card or certificate 5 Other',
  `game_ur_request_related_to` int(11) NOT NULL COMMENT 'If requesting = 1 then From game_request',
  `type_of_ur_request` varchar(50) NOT NULL COMMENT 'If requesting = 1 then 1 Reserved seating tickets (maximum group size is 10) 2 General administration tickets',
  `people_number` int(50) NOT NULL COMMENT 'If requesting = 1 then ',
  `game_anything_want_to_add` text NOT NULL COMMENT 'If requesting = 1',
  `describe_ur_event` text NOT NULL COMMENT 'If requesting = 2',
  `how_many_people_attending_event` varchar(50) NOT NULL COMMENT 'If requesting = 2 ',
  `wish_item_receive` varchar(250) NOT NULL COMMENT 'If requesting = 2 then comma separated values',
  `wish_item_receive_value` varchar(250) NOT NULL COMMENT 'If requesting = 2 AND wish_item_receive = 6(Other)',
  `giveaways_anything_want_to_add` text NOT NULL COMMENT 'If requesting = 2',
  `merchandise_do_u_wish_receive` varchar(50) NOT NULL COMMENT 'IF requesting = 3',
  `what_case_raising_money` text NOT NULL COMMENT 'IF requesting = 3',
  `merchandise_anything_want_to_add` text NOT NULL COMMENT 'IF requesting = 3',
  `occasion` varchar(50) NOT NULL COMMENT 'IF requesting = 3',
  `occasion_count` varchar(250) NOT NULL COMMENT 'IF requesting = 4 AND occasion = Other',
  `occasion_first_name` varchar(250) NOT NULL COMMENT 'IF requesting = 4',
  `occasion_last_name` varchar(250) NOT NULL COMMENT 'IF requesting = 4',
  `occasion_age` int(11) NOT NULL COMMENT 'IF requesting = 4',
  `card_signed_by` varchar(50) NOT NULL COMMENT 'IF requesting = 4',
  `personalised_anything_want_to_add` text NOT NULL COMMENT 'IF requesting = 4',
  `other_type_anything_want_to_add` text NOT NULL COMMENT 'IF requesting = 5',
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '1.Received(Default), 2.Approved, 3.Rejected',
  `reason` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `event_master`
--

CREATE TABLE IF NOT EXISTS `event_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `event_name` varchar(255) NOT NULL,
  `event_type` varchar(255) NOT NULL,
  `organizer` varchar(255) NOT NULL,
  `date_time` datetime NOT NULL,
  `image` varchar(255) NOT NULL,
  `logo` varchar(255) NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `event_master`
--

INSERT INTO `event_master` (`id`, `event_name`, `event_type`, `organizer`, `date_time`, `image`, `logo`, `location`, `description`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(1, 'test', 'Diversity', 'test', '2016-02-19 08:00:28', '25989f1-bloggers-121_zpsb8af4a7e.jpg', '265e5f9-96fbd78-vue-entertainment-logo.jpg', '1919 Pennsylvania Avenue Northwest, Washington, DC, United States', 'test', '2016-02-19 14:36:01', 1, '2016-02-29 11:01:25', 1, 1),
(2, 'Tushar Testtt', 'Leadership', 'Amehohkt aa h', '2016-03-16 11:59:30', '2227d75-penguins.jpg', '0189caa-tulips.jpg', 'Ctu', 'Test', '2016-03-01 07:30:37', 1, '2016-03-01 07:30:37', 0, 1),
(3, 'Hirva Eventd', 'Diversity', 'Test', '2016-03-11 05:15:48', 'd6aa56c-jellyfish.jpg', 'b7a8486-lighthouse.jpg', '1250 Broadway, Brooklyn, New York, NY, United States', 'Test', '2016-03-02 12:45:53', 1, '2016-03-04 07:14:34', 1, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=272 ;

--
-- Dumping data for table `field_details`
--

INSERT INTO `field_details` (`id`, `module_type`, `master_id`, `field_type`, `sequence`, `field_value`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(27, 3, 1, 1, 1, 'https://www.youtube.com/?v=tFad5gHoBjY', '0000-00-00 00:00:00', 0, '2016-02-29 11:01:25', 1, 1),
(28, 3, 1, 3, 2, '408c43f7f18fd6b4f50bf3857aecbd3f_160229102502.jpg', '2016-02-29 11:01:25', 1, '0000-00-00 00:00:00', 0, 1),
(29, 3, 1, 3, 3, '46f6215956d7c46255d00263c715c9d4_160229102602.jpg', '2016-02-29 11:01:25', 1, '0000-00-00 00:00:00', 0, 1),
(213, 2, 4, 1, 3, 'https://www.youtube.com/watch?v=yAoLSRbwxL8', '0000-00-00 00:00:00', 0, '2016-02-29 14:16:47', 1, 1),
(214, 2, 4, 2, 1, 'To get best resolution preferred image size is 360 X 150. To get best resolution preferred image size is 360 X 150. To get best resolution preferred image size is 360 X 150. ', '0000-00-00 00:00:00', 0, '2016-02-29 14:16:47', 1, 1),
(215, 2, 4, 3, 9, '7c13123185ca0374cc6914d2a14c9ccc_160229024702.jpg', '0000-00-00 00:00:00', 0, '2016-02-29 14:16:47', 1, 1),
(238, 2, 5, 1, 1, 'http://youtube.com/?v=tFad5gHoBjY', '0000-00-00 00:00:00', 0, '2016-03-01 07:27:28', 1, 1),
(239, 2, 5, 1, 6, 'http://youtube.com/?v=tFad5gHoBjY', '0000-00-00 00:00:00', 0, '2016-03-01 07:27:28', 1, 1),
(240, 2, 5, 2, 2, 'Tushar Test', '0000-00-00 00:00:00', 0, '2016-03-01 07:27:28', 1, 1),
(241, 2, 5, 3, 3, '09d565939e10290bb5cb27596845f186_160229012102.jpg', '2016-03-01 07:27:28', 1, '0000-00-00 00:00:00', 0, 1),
(242, 2, 5, 3, 4, 'dbf32ab25d093aacdd59dd74587bc0b2_160229013602.jpg', '2016-03-01 07:27:28', 1, '0000-00-00 00:00:00', 0, 1),
(243, 2, 5, 3, 5, '4317fd49a21384c85f6b405cba038e21_160229013702.jpg', '2016-03-01 07:27:28', 1, '0000-00-00 00:00:00', 0, 1),
(244, 3, 2, 1, 1, 'https://www.youtube.com/watch?v=UFKL178IaRM&ebc=ANyPxKobkcUHjHvJG05ipiUvURTzWhI4FRV-5Fu87pVp9-4VWITfc1j1KAo6cDAjx_lIXqoxZTG6ewBnX-vD7fnZ_DWPKTDpdA', '2016-03-01 07:30:37', 1, '0000-00-00 00:00:00', 0, 1),
(245, 3, 2, 1, 2, 'https://www.youtube.com/watch?v=UFKL178IaRM&ebc=ANyPxKobkcUHjHvJG05ipiUvURTzWhI4FRV-5Fu87pVp9-4VWITfc1j1KAo6cDAjx_lIXqoxZTG6ewBnX-vD7fnZ_DWPKTDpdA', '2016-03-01 07:30:37', 1, '0000-00-00 00:00:00', 0, 1),
(246, 3, 2, 2, 4, 'Test 2', '2016-03-01 07:30:37', 1, '0000-00-00 00:00:00', 0, 1),
(247, 3, 2, 2, 8, 'Test 1', '2016-03-01 07:30:37', 1, '0000-00-00 00:00:00', 0, 1),
(248, 3, 2, 3, 5, 'd51c43b88fceb9f8c8cc37be2f550139_160301073803.jpg', '2016-03-01 07:30:38', 1, '0000-00-00 00:00:00', 0, 1),
(249, 3, 2, 3, 6, '3341f6f048384ec73a7ba2e77d2db48b_160301073803.jpg', '2016-03-01 07:30:38', 1, '0000-00-00 00:00:00', 0, 1),
(250, 3, 2, 3, 7, '71dd9b48ff8928e726d4d21a5af243f3_160301073803.jpg', '2016-03-01 07:30:38', 1, '0000-00-00 00:00:00', 0, 1),
(260, 2, 6, 1, 1, 'https://www.youtube.com/watch?v=B5_6jfGsyjA', '0000-00-00 00:00:00', 0, '2016-03-04 06:10:04', 1, 1),
(261, 2, 6, 2, 2, 'Hello this is text message', '0000-00-00 00:00:00', 0, '2016-03-04 06:10:04', 1, 1),
(262, 2, 6, 3, 3, 'c1619d2ad66f7629c12c87fe21d32a58_160302120303.jpg', '2016-03-04 06:10:05', 1, '0000-00-00 00:00:00', 0, 1),
(269, 3, 3, 1, 1, 'https://www.youtube.com/watch?v=B5_6jfGsyjA', '0000-00-00 00:00:00', 0, '2016-03-04 07:14:34', 1, 1),
(270, 3, 3, 2, 2, 'Test', '0000-00-00 00:00:00', 0, '2016-03-04 07:14:34', 1, 1),
(271, 3, 3, 3, 3, '274231193c4e40abc64d2f2d8cb6b415_160302120103.jpg', '2016-03-04 07:14:34', 1, '0000-00-00 00:00:00', 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `game_request`
--

CREATE TABLE IF NOT EXISTS `game_request` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `title` varchar(250) NOT NULL,
  `start_date` date NOT NULL,
  `created_date` datetime NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0 active 1 inactive'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `partners_master`
--

CREATE TABLE IF NOT EXISTS `partners_master` (
`id` int(11) NOT NULL COMMENT 'Primary key, Auto increment',
  `partner_name` varchar(255) NOT NULL,
  `website` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `logo` varchar(255) NOT NULL,
  `created_date` datetime NOT NULL,
  `created_by` int(11) NOT NULL,
  `modified_date` datetime NOT NULL,
  `modified_by` int(11) NOT NULL,
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `partners_master`
--

INSERT INTO `partners_master` (`id`, `partner_name`, `website`, `description`, `logo`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(1, 'test', 'http://apple.com', 'Contrary to popular belief, Lorem Ipsum is not simply random text. It has roots in a piece of classical Latin literature from 45 BC, making it over 2000 years old. Richard McClintock, a Latin professor at Hampden-Sydney College in Virginia, looked up one of the more obscure Latin words, consectetur, from a Lorem Ipsum passage, and going through the cites of the word in classical literature, discovered the undoubtable source. Lorem Ipsum comes from sections 1.10.32 and 1.10.33 of &quot;de Finibus Bonorum et Malorum&quot; (The Extremes of Good and Evil) by Cicero, written in 45 BC. This book is a treatise on the theory of ethics, very popular during the Renaissance. The first line of Lorem Ipsum, &quot;Lorem ipsum dolor sit amet..&quot;, comes from a line in section 1.10.32', 'a522566-hero-bh-l.jpg', '2016-02-27 12:05:42', 1, '2016-02-29 06:33:55', 1, 1),
(2, 'Tushar Solanki', 'http://192.168.0.22/junction_studio/trunk/admin/partners_management/add_record', 'Test Desc', '4de81d9-jellyfish.jpg', '2016-03-01 07:32:45', 1, '2016-03-01 07:32:45', 0, 1),
(3, 'Hirva Partner', 'https://www.google.co.in/', 'Test', '366ce3d-penguins.jpg', '2016-03-02 12:48:04', 1, '2016-03-02 12:48:04', 0, 1);

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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

--
-- Dumping data for table `project_master`
--

INSERT INTO `project_master` (`id`, `project_title`, `project_type`, `image`, `location`, `description`, `created_date`, `created_by`, `modified_date`, `modified_by`, `status`) VALUES
(1, 'Test new project', 'Diversity', '0623815-dilwale-2015-02714.jpg', '389 5th Avenue, New York, NY, United States', '<p><span style="color: rgb(74, 74, 74); font-family: Lato, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">Everywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Perhaps Shoes Hey Race As Thankful Lag Buildings Bet Us Three Percent Toenails Low Rattled Shirking Afternoon A Indeed Ruckus Amounts Barley.</span></p>\r\n\r\n<p>Everywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Perhaps Shoes Hey Race As Thankful Lag Buildings Bet Us Three Percent Toenails Low Rattled Shirking Afternoon A Indeed Ruckus Amounts Barley.</p>\r\n\r\n<p>Or Splashing Sneakers Somewhere Kettle Lighted A Begged Left Am Moo Clearly Own Someone Watching Hullabaloo Seemed Sort Hustled Biggest I Everywhere Nonsense Stones Yourselves Yipp My Wonderfully Kangaroo Beeping Kinds Starting Congratulations Guaranteed Along Bad Enjoying Elephant Everyone Remember Dexterous Is Kangaroos&#39; Bit Oh.</p>\r\n\r\n<p>Or Splashing Sneakers Somewhere Kettle Lighted A Begged Left Am Moo Clearly Own Someone Watching Hullabaloo Seemed Sort Hustled Biggest I Everywhere Nonsense Stones Yourselves Yipp My Wonderfully Kangaroo Beeping Kinds Starting Congratulations Guaranteed Along Bad Enjoying Elephant Everyone Remember Dexterous Is Kangaroos&#39; Bit Oh.</p>\r\n\r\n<p>Or Splashing Sneakers Somewhere Kettle Lighted A Begged Left Am Moo Clearly Own Someone Watching Hullabaloo Seemed Sort Hustled Biggest I Everywhere Nonsense Stones Yourselves Yipp My Wonderfully Kangaroo Beeping Kinds Starting Congratulations Guaranteed Along Bad Enjoying Elephant Everyone Remember Dexterous Is Kangaroos&#39; Bit Oh.</p>\r\n', '2016-02-23 11:55:02', 1, '2016-02-23 14:57:33', 1, 1),
(2, 'Test new project 1 Test new project 1 Test new project 1 Done Test new project 1 Test new project 1 Test new project 1 Done', 'Diversity', '0b774de-chhellodivas_team.jpg', '55 5th Avenue, New York, NY, United States', '<span style="color: rgb(74, 74, 74); font-family: Lato, sans-serif; font-size: 16px; font-style: normal; font-variant: normal; font-weight: normal; letter-spacing: normal; line-height: 24px; orphans: auto; text-align: start; text-indent: 0px; text-transform: none; white-space: normal; widows: 1; word-spacing: 0px; -webkit-text-stroke-width: 0px; display: inline !important; float: none; background-color: rgb(255, 255, 255);">Everywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Perhaps Shoes Hey Race As Thankful Lag Buildings Bet Us Three Percent Toenails Low Rattled Shirking Afternoon A Indeed Ruckus Amounts Barley.</span>', '2016-02-23 11:55:30', 1, '2016-02-27 11:10:06', 1, 1),
(3, 'Test new project 2', 'Leadership', '991a05e-neendein-khul-jaati-lyrics-hain-hate-story-3.jpg', 'Rua Major João Luís de Moura AM, Odivelas, Portugal', 'Everywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Per<br />\r\nEverywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Per<br />\r\nEverywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Per', '2016-02-24 08:30:34', 1, '2016-02-24 08:30:34', 0, 1),
(4, 'Test new project 3', 'Creativity', '14491b7-hero-story_647_091215101402.jpg', 'Victoria, Australia', 'Everywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kan', '2016-02-24 08:30:53', 1, '2016-02-29 14:16:47', 1, 1),
(5, 'Tushat Test', 'Diversity', '8de4aa6-penguins.jpg', 'Atlantic City Blvd U.S. 9, NJ, United States', 'Birds I Playingae &amp; Title<br />\r\n<br />\r\nEverywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Perhaps Shoes Hey Race As Thankful Lag Buildings Bet Us Three Percent Toenails Low Rattled Shirking Afternoon A Indeed Ruckus Amounts Barley.<br />\r\n<br />\r\nOr Splashing Sneakers Somewhere Kettle Lighted A Begged Left Am Moo Clearly Own Someone Watching Hullabaloo Seemed Sort Hustled Biggest I Everywhere Nonsense Stones Yourselves Yipp My Wonderfully Kangaroo Beeping Kinds Starting Congratulations Guaranteed Along Bad Enjoying Elephant Everyone Remember Dexterous Is Kangaroos&#39; Bit Oh.<br />\r\n<br />\r\nBirds I Playingae &amp; Title<br />\r\n<br />\r\nEverywhere Near Elephant&#39;s Congratulations Terrible Talking I Mountains Anywhere Wherever Blackbottomed Kangaroos&#39; Placed Toward Murmured How&#39;s Splashing To Frequently Roar Asked Dozens Tattered Perhaps Shoes Hey Race As Thankful Lag Buildings Bet Us Three Percent Toenails Low Rattled Shirking Afternoon A Indeed Ruckus Amounts Barley.<br />\r\n<br />\r\nOr Splashing Sneakers Somewhere Kettle Lighted A Begged Left Am Moo Clearly Own Someone Watching Hullabaloo Seemed Sort Hustled Biggest I Everywhere Nonsense Stones Yourselves Yipp My Wonderfully Kangaroo Beeping Kinds Starting Congratulations Guaranteed Along Bad Enjoying Elephant Everyone Remember Dexterous Is Kangaroos&#39; Bit Oh.<br />\r\n<br />\r\nOr Splashing Sneakers Somewhere Kettle Lighted A Begged Left Am Moo Clearly Own Someone Watching Hullabaloo Seemed Sort Hustled Biggest I Everywhere Nonsense Stones Yourselves Yipp My Wonderfully Kangaroo Beeping Kinds Starting Congratulations Guaranteed Along Bad Enjoying Elephant Everyone Remember Dexterous Is Kangaroos&#39; Bit Oh.<br />\r\n<br />\r\nOr Splashing Sneakers Somewhere Kettle Lighted A Begged Left Am Moo Clearly Own Someone Watching Hullabaloo Seemed Sort Hustled Biggest I Everywhere Nonsense Stones Yourselves Yipp My Wonderfully Kangaroo Beeping Kinds Starting Congratulations Guaranteed Along Bad Enjoying Elephant Everyone Remember Dexterous Is Kangaroos&#39; Bit Oh.', '2016-02-29 13:42:20', 1, '2016-03-01 07:27:28', 1, 1),
(6, 'Hirva Test d', 'Diversity', 'fe10335-penguins.jpg', '2555 Pennsylvania Avenue Northwest, Washington, DC, United States', 'Test Desc', '2016-03-02 12:44:08', 1, '2016-03-04 06:10:04', 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `settings_master`
--

CREATE TABLE IF NOT EXISTS `settings_master` (
`id` int(11) NOT NULL,
  `video_url` varchar(255) NOT NULL,
  `instagram_link` varchar(250) NOT NULL COMMENT 'link',
  `twitter_link` varchar(250) NOT NULL COMMENT 'link',
  `address_line_1` text NOT NULL,
  `address_line_2` varchar(250) NOT NULL,
  `contact_no` varchar(250) NOT NULL,
  `email` varchar(250) NOT NULL,
  `site_logo` varchar(250) NOT NULL COMMENT 'site logo',
  `status` tinyint(1) NOT NULL COMMENT '0.Deactive, 1.Active(Default)'
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `settings_master`
--

INSERT INTO `settings_master` (`id`, `video_url`, `instagram_link`, `twitter_link`, `address_line_1`, `address_line_2`, `contact_no`, `email`, `site_logo`, `status`) VALUES
(1, 'http://youtube.com/?v=tFad5gHoBjY', 'https://www.instagram.com/junctionstudio/', 'https://twitter.com/junctionstudio', '151 East Road', 'Seaford VIC 3198', '(03) 8765 4329', 'connect@junctionstudio.com.au', 'c9d9edb-logo.png', 1);

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
-- Indexes for table `contact_us`
--
ALTER TABLE `contact_us`
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
-- Indexes for table `donation_master`
--
ALTER TABLE `donation_master`
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
-- Indexes for table `game_request`
--
ALTER TABLE `game_request`
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
-- AUTO_INCREMENT for table `contact_us`
--
ALTER TABLE `contact_us`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=9;
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
-- AUTO_INCREMENT for table `donation_master`
--
ALTER TABLE `donation_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment';
--
-- AUTO_INCREMENT for table `event_master`
--
ALTER TABLE `event_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `field_details`
--
ALTER TABLE `field_details`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=272;
--
-- AUTO_INCREMENT for table `game_request`
--
ALTER TABLE `game_request`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment';
--
-- AUTO_INCREMENT for table `partners_master`
--
ALTER TABLE `partners_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=4;
--
-- AUTO_INCREMENT for table `project_master`
--
ALTER TABLE `project_master`
MODIFY `id` int(11) NOT NULL AUTO_INCREMENT COMMENT 'Primary key, Auto increment',AUTO_INCREMENT=7;
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
