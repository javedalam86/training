-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Jun 05, 2020 at 03:59 AM
-- Server version: 5.7.23
-- PHP Version: 7.2.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `trainingdb`
--

-- --------------------------------------------------------

--
-- Table structure for table `audit`
--

DROP TABLE IF EXISTS `audit`;
CREATE TABLE IF NOT EXISTS `audit` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_title` varchar(256) DEFAULT NULL,
  `audit_text` varchar(512) DEFAULT NULL,
  `is_deleted` tinyint(4) NOT NULL DEFAULT '0',
  `auditdate` datetime DEFAULT NULL,
  `added_date` datetime DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `audit`
--

INSERT INTO `audit` (`id`, `audit_title`, `audit_text`, `is_deleted`, `auditdate`, `added_date`, `last_modified_date`) VALUES
(1, 'ffffffffgfgfgg', '<p><br></p><p>fffffffffffgggg</p><p><br></p>', 1, NULL, '2020-05-09 10:38:15', '2020-05-09 11:00:36'),
(2, 'fgfdsg', '<p>fdgfdg</p>', 0, NULL, '2020-05-10 06:47:11', '2020-05-10 06:47:11'),
(3, 'Audit', '<h5 class=\"modal-title\" id=\"exampleModalLabel\" style=\"font-size: 1.3rem; color: rgb(72, 70, 91);\">Audit&nbsp;</h5>', 0, NULL, '2020-05-10 07:03:17', '2020-05-10 07:03:17');

-- --------------------------------------------------------

--
-- Table structure for table `audit_detail`
--

DROP TABLE IF EXISTS `audit_detail`;
CREATE TABLE IF NOT EXISTS `audit_detail` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `audit_id` int(11) DEFAULT NULL,
  `details` varchar(512) DEFAULT NULL,
  `auditdetaildate` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `candidate_courses`
--

DROP TABLE IF EXISTS `candidate_courses`;
CREATE TABLE IF NOT EXISTS `candidate_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) NOT NULL,
  `candidate_id` int(11) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `candidate_courses`
--

INSERT INTO `candidate_courses` (`id`, `course_id`, `candidate_id`, `is_deleted`) VALUES
(1, 1, 21, 0),
(2, 5, 21, 0),
(3, 1, 17, 0),
(4, 7, 17, 0);

-- --------------------------------------------------------

--
-- Table structure for table `cmspages`
--

DROP TABLE IF EXISTS `cmspages`;
CREATE TABLE IF NOT EXISTS `cmspages` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `pagekey` varchar(56) DEFAULT NULL,
  `pagecontent` text,
  `pagetitle` varchar(56) DEFAULT NULL,
  `metaTitle` varchar(512) DEFAULT NULL,
  `metaDesc` varchar(512) DEFAULT NULL,
  `metaKeywords` varchar(512) DEFAULT NULL,
  `canonical` varchar(128) DEFAULT NULL,
  `robots` varchar(56) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT '0',
  `header_display_type` int(11) NOT NULL DEFAULT '0' COMMENT '0->image,1->video',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `cmspages`
--

INSERT INTO `cmspages` (`id`, `pagekey`, `pagecontent`, `pagetitle`, `metaTitle`, `metaDesc`, `metaKeywords`, `canonical`, `robots`, `is_deleted`, `header_display_type`) VALUES
(1, 'TRAINING', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.', 'TRAINING', NULL, NULL, NULL, NULL, NULL, 0, 0),
(2, 'SERVICES', 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br>', 'SERVICES', NULL, NULL, NULL, NULL, NULL, 0, 0),
(3, 'ABOUTUS', 'U2 Marine Services is a multipurpose marine services providing company focused on bringing in the very best skills to clients in the maritime sector and related business areas. Within a very short period, U2 Marine has achieved a broad client base within Oil, Chemical and Gas Industry across the globe. Our consultants are ex – Master Mariners and Chief Engineers who have wide ranging experience in the Oil, Chemical and Gas transportation industries and enjoy over 100 years of combined experience among themselves.', 'ABOUTUS', NULL, NULL, NULL, NULL, NULL, 0, 0),
(4, 'CONTACT', '<p class=\"lead\">\r\n                      Lorem ipsum dolor sit amet consectetur adipisicing elit. Facilis dolorum dolorem soluta quidem\r\n                      expedita aperiam aliquid at.\r\n                      Totam magni ipsum suscipit amet? Autem nemo esse laboriosam ratione nobis\r\n                      mollitia inventore?\r\n                    </p>\r\n                    <ul class=\"list-ico\">\r\n                      <li><span class=\"ion-ios-telephone\"></span> +44 74620 40500</li>\r\n                      <li><span class=\"ion-email\"></span>info@u2marineservices.com</li>\r\n                    </ul>', 'CONTACT', NULL, NULL, NULL, NULL, NULL, 0, 0),
(5, 'Home Page Header', 'Asset Management,Audits and Inspections,LNG Specific,Manuals', 'U2 Marine Services Ltd.', NULL, NULL, NULL, NULL, NULL, 0, 1);

-- --------------------------------------------------------

--
-- Table structure for table `cmspage_images`
--

DROP TABLE IF EXISTS `cmspage_images`;
CREATE TABLE IF NOT EXISTS `cmspage_images` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `cmspage_id` bigint(20) UNSIGNED NOT NULL,
  `url` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `title` varchar(191) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `type` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL DEFAULT 'image',
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `deleted_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=11 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `cmspage_images`
--

INSERT INTO `cmspage_images` (`id`, `cmspage_id`, `url`, `title`, `type`, `created_at`, `updated_at`, `deleted_at`) VALUES
(1, 1, 'training1590422527.jpg', 'test new', 'image', '2020-05-25 06:29:57', '2020-05-25 10:32:07', NULL),
(4, 2, 'audit1590423722.jpg', 'AUDITS & INSPECTIONS', 'image', '2020-05-25 07:36:56', '2020-05-27 02:31:59', NULL),
(5, 2, 'LNGSPECIFIC1590423722.jpg', 'LNG SPECIFIC', 'image', '2020-05-25 07:36:56', '2020-05-27 02:31:59', NULL),
(6, 3, 'mission1590425542.jpg', 'over mission', 'image', '2020-05-25 09:55:11', '2020-05-25 11:22:22', NULL),
(7, 3, 'vision1590425542.jpg', 'our vision', 'image', '2020-05-25 09:55:11', '2020-05-25 11:22:22', NULL),
(8, 3, 'values1590425474.jpg', 'core values', 'image', '2020-05-25 09:55:11', '2020-05-25 11:22:22', NULL),
(9, 5, 'https://ak8.picdn.net/shutterstock/videos/6193928/preview/stock-footage-aerial-view-of-luxury-yacht-navigating-close-to-the-coast.mp4', 'sdfsa', 'video', '2020-05-27 05:44:06', '2020-05-27 06:46:03', NULL),
(10, 5, 'about1590580358.jpg', 'sdfsa', 'image', '2020-05-27 06:22:38', '2020-05-27 06:22:38', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `coupons`
--

DROP TABLE IF EXISTS `coupons`;
CREATE TABLE IF NOT EXISTS `coupons` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `code` varchar(10) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `user_type` varchar(10) DEFAULT NULL,
  `user_id` varchar(10) DEFAULT NULL,
  `uses_allowed` int(11) DEFAULT NULL,
  `discount_type` varchar(28) DEFAULT NULL,
  `discount` decimal(11,2) DEFAULT NULL,
  `description` varchar(256) DEFAULT NULL,
  `is_deleted` int(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `coupons`
--

INSERT INTO `coupons` (`id`, `code`, `start_date`, `end_date`, `user_type`, `user_id`, `uses_allowed`, `discount_type`, `discount`, `description`, `is_deleted`) VALUES
(1, 'rewrwre', NULL, NULL, NULL, NULL, NULL, NULL, NULL, NULL, 1),
(2, '147466', NULL, NULL, NULL, NULL, NULL, 'percent', '21.00', 'sdfgdsfdsfds', 0),
(3, 'ddddddddf', NULL, NULL, NULL, NULL, NULL, 'percent', '45.00', 'ffggggggggggg', 1),
(4, 'sdsds', NULL, NULL, NULL, NULL, NULL, 'percent', '23.00', 'Dormitory', 0),
(5, 'sdsds', NULL, NULL, NULL, NULL, NULL, 'percent', '23.00', 'Dormitory', 0),
(6, 'test1', NULL, NULL, NULL, NULL, NULL, 'fixed', '234.00', 'test coupon test coupon', 0),
(7, 'test1', NULL, NULL, NULL, NULL, NULL, 'fixed', '234.00', 'test coupon test coupon', 0),
(8, 'test1', NULL, NULL, NULL, NULL, NULL, 'fixed', '234.00', 'test coupon test coupon', 0),
(9, 'test1', NULL, NULL, NULL, NULL, NULL, 'fixed', '234.00', 'test coupon test coupon', 0),
(10, 'test1', NULL, NULL, NULL, NULL, NULL, 'fixed', '234.00', 'test coupon test coupon', 0),
(11, 'test1', NULL, NULL, NULL, NULL, NULL, 'fixed', '234.00', 'test coupon test coupon', 0),
(12, 'test1', NULL, NULL, NULL, NULL, NULL, 'fixed', '234.00', 'test coupon test coupon', 0),
(13, 'test1', NULL, NULL, NULL, NULL, NULL, 'fixed', '234.00', 'test coupon test coupon', 0);

-- --------------------------------------------------------

--
-- Table structure for table `courses`
--

DROP TABLE IF EXISTS `courses`;
CREATE TABLE IF NOT EXISTS `courses` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(56) DEFAULT NULL,
  `description` text,
  `is_deleted` tinyint(1) DEFAULT '0',
  `course_type` varchar(56) DEFAULT NULL,
  `cost` float(11,2) DEFAULT NULL,
  `start_date` datetime DEFAULT NULL,
  `end_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `courses`
--

INSERT INTO `courses` (`id`, `name`, `description`, `is_deleted`, `course_type`, `cost`, `start_date`, `end_date`) VALUES
(1, 'AAAAAAAA', 'BBBBBBB', 0, 'Basic', 89.00, '2020-06-01 00:00:00', '2020-06-10 00:00:00'),
(2, 'dfghjk', 'sdfghjklloiure', 1, NULL, NULL, '2020-07-15 00:00:00', '2020-07-17 00:00:00'),
(3, 'abcdefghj', 'sdcefrdscfgt', 1, NULL, 12.00, '2020-05-20 00:00:00', '2020-05-23 00:00:00'),
(4, 'testdmbnfmymj', 'gggggkkkk', 1, 'Advanced', 40.00, '2020-07-08 00:00:00', '2020-07-10 00:00:00'),
(5, 'aaaar', 'bbbbbbb', 0, 'Basic', 555.00, '2020-06-03 00:00:00', '2020-06-17 00:00:00'),
(6, 'aaaaaaaaaaa', 'ssssssssss', 1, 'Basic', 1.00, '2020-06-18 00:00:00', '2020-06-18 00:00:00'),
(7, 'aaaaaa', 'ss4444', 0, 'Basic', 78.00, '2020-06-26 00:00:00', '2020-06-27 00:00:00'),
(8, 'aaaaaaa', 'bbbbbbbb', 0, 'Basic', 12.00, '2020-07-20 00:00:00', '2020-07-23 00:00:00'),
(9, 'course12', 'course12', 1, NULL, 459.00, '2020-07-30 00:00:00', '2020-07-31 00:00:00'),
(10, 'course12', 'course12', 0, 'Advanced', 459.00, '2020-08-06 00:00:00', '2020-08-06 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `course_books`
--

DROP TABLE IF EXISTS `course_books`;
CREATE TABLE IF NOT EXISTS `course_books` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(10) DEFAULT NULL,
  `name` varchar(10) NOT NULL,
  `description` varchar(500) DEFAULT NULL,
  `type` varchar(10) DEFAULT NULL,
  `bookpath` varchar(256) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_books`
--

INSERT INTO `course_books` (`id`, `course_id`, `name`, `description`, `type`, `bookpath`, `is_deleted`) VALUES
(1, NULL, 'aaaaaaaaaa', 'aaaaaaaa', NULL, NULL, 1),
(2, '7', 'aaaaasss', 'aaaaaaaa', NULL, '1579535447.png', 0),
(3, '1', 'aaaaaaaaaa', 'aaaaaaaa', NULL, '1579535350.png', 0),
(4, '7', 'subad11', 'subadddddmi11', NULL, '1591248868.jpg', 0),
(5, '10', 'mathh', 'Dormi', NULL, '1591248840.jpg', 0),
(6, '7', 'sandeejjj', 'Dormitjjjjjjory', NULL, '1579536702.png', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_quize`
--

DROP TABLE IF EXISTS `course_quize`;
CREATE TABLE IF NOT EXISTS `course_quize` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `quize_name` varchar(128) DEFAULT NULL,
  `course_id` int(11) DEFAULT NULL,
  `start_date` date DEFAULT NULL,
  `end_date` date DEFAULT NULL,
  `course_quize_status` tinyint(4) DEFAULT '1',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_quize`
--

INSERT INTO `course_quize` (`id`, `quize_name`, `course_id`, `start_date`, `end_date`, `course_quize_status`) VALUES
(1, 'Quize 1 ', 7, '2020-06-04', '2020-06-06', 1),
(2, 'Quize 2', 7, '2020-06-04', '2020-06-08', 1);

-- --------------------------------------------------------

--
-- Table structure for table `course_quize_sections`
--

DROP TABLE IF EXISTS `course_quize_sections`;
CREATE TABLE IF NOT EXISTS `course_quize_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_quize_id` int(11) DEFAULT NULL,
  `section_id` int(11) DEFAULT NULL,
  `questions` int(11) DEFAULT NULL,
  `question_type` int(1) DEFAULT NULL COMMENT '0->Objective, 1->Subjective',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=3 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_quize_sections`
--

INSERT INTO `course_quize_sections` (`id`, `course_quize_id`, `section_id`, `questions`, `question_type`) VALUES
(1, 2, 1, 4, 0),
(2, 2, 2, 5, 0);

-- --------------------------------------------------------

--
-- Table structure for table `course_sections`
--

DROP TABLE IF EXISTS `course_sections`;
CREATE TABLE IF NOT EXISTS `course_sections` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `section_name` varchar(128) DEFAULT NULL,
  `course_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `course_sections`
--

INSERT INTO `course_sections` (`id`, `section_name`, `course_id`) VALUES
(1, 'section 1', 1),
(2, 'section 2', 1),
(3, 'section 3', 1),
(4, 'section 4', 1),
(5, 'section 2', 2),
(6, 'section 3', 2),
(7, 'section 5', 1),
(8, 'section 1', 2);

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

DROP TABLE IF EXISTS `invoice`;
CREATE TABLE IF NOT EXISTS `invoice` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `assess_id` varchar(10) NOT NULL,
  `invoice_date` date NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `manual`
--

DROP TABLE IF EXISTS `manual`;
CREATE TABLE IF NOT EXISTS `manual` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `manual_title` varchar(256) DEFAULT NULL,
  `manual_text` longblob,
  `section_order` int(5) DEFAULT NULL,
  `is_deleted` tinyint(4) DEFAULT '0',
  `added_date` datetime DEFAULT NULL,
  `last_modified_date` datetime DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `manual`
--

INSERT INTO `manual` (`id`, `manual_title`, `manual_text`, `section_order`, `is_deleted`, `added_date`, `last_modified_date`) VALUES
(3, 'THE PEOPLE AND THEIR RESPONSIBILITIES', 0x3c703e416c6c20776f726b20697320756e64657274616b656e206279204d616e697368202843454f29206f72206279206120736d616c6c206e756d626572206f66207375622d636f6e74726163742041756469746f72732f496e73706563746f72732077686f20776f726b20756e646572204d616e697368e280997320636f6e74726f6c2e266e6273703b204d616e697368206973207468652070726f63657373206f776e657220666f7220616c6c206f757220616374697669746965732e3c2f703e3c703e3c62723e3c2f703e3c703e266e6273703b4d616e69736820697320726573706f6e7369626c6520666f723a3c2f703e3c703e3c62723e3c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e456e737572696e67207468617420746865207175616c69747920706f6c69637920616e64206f626a65637469766573206172652065737461626c697368656420616e642061726520636f6d70617469626c652077697468207468652073747261746567696320646972656374696f6e266e6273703b3c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e456e737572696e6720746865207175616c69747920706f6c69637920697320756e64657273746f6f6420616e6420666f6c6c6f776564266e6273703b3c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e456e737572696e672074686520696e746567726174696f6e206f66207468652073797374656d20726571756972656d656e747320696e746f2074686520627573696e6573732070726f6365737365733c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e456e737572696e672074686174207468652073797374656d2061636869657665732069747320696e74656e646564206f7574707574733c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e50726f6d6f74696e6720696d70726f76656d656e7420616e6420696e6e6f766174696f6e3c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e456e737572696e67207468617420637573746f6d657220616e64206170706c696361626c65207374617475746f727920616e6420726567756c61746f727920726571756972656d656e7473206172652064657465726d696e65642c20756e64657273746f6f6420616e6420636f6e73697374656e746c79206d65743c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e456e737572696e672074686174207269736b7320616e64206f70706f7274756e697469657320746861742063616e20616666656374207365727669636520636f6e666f726d69747920616e6420636c69656e7420736174697366616374696f6e206172652064657465726d696e656420616e64206164647265737365642e3c2f703e3c6469763e3c62723e3c2f6469763e, 3, 0, NULL, '2020-05-08 13:20:46'),
(4, 'QUALITY POLICY ', 0x3c703e266e6273703b7364666867667364682067643c623e68646466206766646820673c2f623e666867666468266e6273703b20266e6273703b6766646820673c623e646668673c2f623e64666866673c2f703e3c703e266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b20266e6273703b206767676767672067676767676767266e6273703b3c2f703e, 4, 0, NULL, NULL),
(2, 'SCOPE OF SERVICE', 0x3c703e3c62723e3c2f703e3c703e266e6273703b496e2064657465726d696e696e67207468652073636f7065206f6620746865207175616c697479206d616e6167656d656e742073797374656d207765206861766520636f6e73696465726564207768617420776520646f2c20776865726520776520646f2069742066726f6d2c207768617420656c656d656e7473206f66206f757220616374697669746965732066616c6c2077697468696e2074686520726571756972656d656e7473206f6620393030313a3230313520616e642074686f7365207468617420646f206e6f742e3c2f703e3c703e3c62723e3c2f703e3c703e5468652073797374656d20636f766572733a3c2f703e3c703e3c62723e3c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e4d6172696e652061756469747320616e6420696e7370656374696f6e733c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e4c4e472053535343266e6273703b3c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e4d6f6f72696e6720616e616c797369733c2f703e3c703e3c62723e3c2f703e3c703e57686963682077652070726f7669646520746f20636c69656e747320696e7465726e6174696f6e616c6c792e20416c74686f75676820776520686176652061207265676973746572656420616464726573732c20776520646f206e6f74206861766520616e79207072656d6973657320617320776520776f726b206f6e206c6f636174696f6e2e266e6273703b204f7572207175616c6974792063656e747265206973207768657265766572207468652043454f206973206f6e206c6f636174696f6e2e266e6273703b2042656c6f77206973206120726570726573656e746174696f6e206f6620746865206172656173206f66207365727669636520616e642074686520696e746572616374696f6e3a3c2f703e3c703e3c62723e3c2f703e3c703e266e6273703b3c2f703e3c703e54686520666f6c6c6f77696e6720686173206265656e206465656d6564206173206e6f74206170706c696361626c6520746f206f75722073797374656d3a3c2f703e3c703e3c62723e3c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e506f73742d64656c697665727920616374697669746965732028636c6175736520382e352e35293c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e5468652064657369676e206f662070726f647563742028776520646f206e6f7420756e64657274616b65207468652064657369676e206f6620616e792070726f64756374293c2f703e3c703ee2a6813c7370616e207374796c653d2277686974652d73706163653a707265223e093c2f7370616e3e4d6f6e69746f72696e672026616d703b206d6561737572696e67207265736f75726365732028776520646f206e6f742072656c79206f6e206d6561737572656d656e742064657669636573292028636c6175736520372e312e35293c2f703e3c703e3c62723e3c2f703e3c703e53636f70653c2f703e3c703e3c62723e3c2f703e3c703e5532204d6172696e65205365727669636573204c696d697465642070726f76696465732049534d2c20495350532c204e617669676174696f6e616c20616e6420436172676f206f7065726174696f6e73206175646974732e266e6273703b205072652d534952452c205072652d707572636861736520696e7370656374696f6e732e2057652070726f76696465204c4e4720737065636966696320736869702d73686f726520636f6d7061746962696c6974792c204d6f6f72696e6720616e616c79736973207573696e67204f7074696d6f6f72c2ae2e3c2f703e3c6469763e3c62723e3c2f6469763e, 2, 0, NULL, '2020-05-08 13:19:44'),
(1, 'INTRODUCTION', 0x3c703e4f7572207175616c697479206d616e6167656d656e742073797374656d20636f6d707269736573206120706f6c696379206d616e75616c2c2070726f6365737365732c20666f726d732c2073707265616473686565747320616e642065787465726e616c207265666572656e6365732e266e6273703b205468697320706f6c696379206d616e75616c206465736372696265732074686520706f6c696369657320776869636820646566696e6520686f77207765206170706c792074686520726571756972656d656e7473206f662049534f20393030313a3230313520746f206f7572206f7267616e69736174696f6e2e266e6273703b2049742073686f756c6420626520726567617264656420617320746865206f766572726964696e672073746174656d656e7420666f7220656e737572696e6720636c69656e7420636f6e666964656e636520696e205532204d6172696e652053657276696365732e266e6273703b266e6273703b3c2f703e3c703e3c62723e3c2f703e3c703e5468652073697a65206f662074686520636f6d70616e7920616e642074686520696e766f6c76656d656e74206f66204d616e697368205479616769202843454f2920696e20616c6c2061737065637473206f662074686520627573696e657373206d65616e7320746861742077652068617665206120676f6f642067656e6572616c20756e6465727374616e64696e67206f662074686520627573696e6573732069747320636f6e746578742c2070726f63657373657320616e64207269736b732e266e6273703b20416c6c20776f726b20697320756e64657274616b656e206279204d616e697368206f72206279206120736d616c6c206e756d626572206f66207375622d636f6e74726163742041756469746f72732f496e73706563746f72732077686f20776f726b20756e646572204d616e697368e280997320636f6e74726f6c2e266e6273703b204d616e697368206973207468652070726f63657373206f776e657220666f7220616c6c206f757220616374697669746965732e3c2f703e3c703e3c62723e3c2f703e3c703e266e6273703b5765206861766520696e20706c61636520612070726f636573732074686174206964656e746966696573207468652065787465726e616c20616e6420696e7465726e616c206973737565732074686174206172652072656c6576616e7420746f2074686520627573696e6573732c2069747320707572706f736520616e64206974732073747261746567696320646972656374696f6e2e266e6273703b20546865206469616772616d2062656c6f7720696c6c7573747261746573207468652066697665206d61696e20666f72636573206f6e2074686520627573696e65737320616e642069747320636f6e746578742e3c2f703e, 1, 0, '2020-05-03 11:15:08', '2020-05-08 13:18:52');

-- --------------------------------------------------------

--
-- Table structure for table `migrations`
--

DROP TABLE IF EXISTS `migrations`;
CREATE TABLE IF NOT EXISTS `migrations` (
  `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT,
  `migration` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `batch` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `migrations`
--

INSERT INTO `migrations` (`id`, `migration`, `batch`) VALUES
(1, '2014_10_12_000000_create_users_table', 1),
(2, '2014_10_12_100000_create_password_resets_table', 1),
(3, '2020_05_25_104105_create_cmspage_images', 2);

-- --------------------------------------------------------

--
-- Table structure for table `modules`
--

DROP TABLE IF EXISTS `modules`;
CREATE TABLE IF NOT EXISTS `modules` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `name` varchar(56) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=11 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `modules`
--

INSERT INTO `modules` (`id`, `name`, `is_deleted`) VALUES
(1, 'Manual', 0),
(2, 'Internal Audit', 0),
(3, 'MoC', 0),
(4, 'Competency List', 0),
(6, 'Form', 0),
(5, 'Management Review Meeting', 0);

-- --------------------------------------------------------

--
-- Table structure for table `module_permission`
--

DROP TABLE IF EXISTS `module_permission`;
CREATE TABLE IF NOT EXISTS `module_permission` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `user_id` int(11) NOT NULL,
  `module_id` int(2) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `module_permission`
--

INSERT INTO `module_permission` (`id`, `user_id`, `module_id`) VALUES
(1, 1, 1);

-- --------------------------------------------------------

--
-- Table structure for table `nation`
--

DROP TABLE IF EXISTS `nation`;
CREATE TABLE IF NOT EXISTS `nation` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `nation_code` varchar(128) DEFAULT NULL,
  `nation_name` varchar(128) DEFAULT NULL,
  `nation_status` tinyint(1) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nation`
--

INSERT INTO `nation` (`id`, `nation_code`, `nation_name`, `nation_status`) VALUES
(1, 'In', 'India', 1);

-- --------------------------------------------------------

--
-- Table structure for table `password_resets`
--

DROP TABLE IF EXISTS `password_resets`;
CREATE TABLE IF NOT EXISTS `password_resets` (
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `token` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  KEY `password_resets_email_index` (`email`)
) ENGINE=MyISAM DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

-- --------------------------------------------------------

--
-- Table structure for table `qms_files`
--

DROP TABLE IF EXISTS `qms_files`;
CREATE TABLE IF NOT EXISTS `qms_files` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `title` varchar(256) DEFAULT NULL,
  `qmsdesc` text,
  `filepath` varchar(128) DEFAULT NULL,
  `qmstype` varchar(28) DEFAULT NULL,
  `is_active` tinyint(1) DEFAULT NULL,
  `is_deleted` tinyint(1) DEFAULT '0',
  `added_date` date DEFAULT NULL,
  `last_modified_date` date DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `qms_files`
--

INSERT INTO `qms_files` (`id`, `title`, `qmsdesc`, `filepath`, `qmstype`, `is_active`, `is_deleted`, `added_date`, `last_modified_date`) VALUES
(1, 'wwwwwwwww', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwww', 'POLICY', NULL, 1, NULL, NULL),
(2, 'wwwwwwwww', 'wwwwwwwwwwwwwwwwwwwwwwwwwwwww', 'wwwwwwwww', 'POLICY', NULL, 1, NULL, NULL),
(3, 'undefined', NULL, NULL, NULL, NULL, 1, NULL, NULL),
(4, '111111222', '222222222233', '1586337435.pdf', NULL, NULL, 1, NULL, NULL),
(5, 'sssssss', 'dddddddd', '1586337555.pdf', NULL, NULL, 1, NULL, NULL),
(6, 'ssssss', 'ssssdff', '1586337589.pdf', NULL, NULL, 1, NULL, NULL),
(7, 'Policy 1 22', 'plociy 1 des333', '1586429509.pdf', NULL, NULL, 1, NULL, NULL),
(8, 'Policy 2', 'Policy 2ss', '1586582314.pdf', 'POLICY', NULL, 0, NULL, NULL),
(9, 'Policy 3', 'Policy 3', '1586604271.pdf', 'POLICY', NULL, 0, NULL, NULL),
(10, 'policy3', 'policy3', '1587895513.pdf', 'POLICY', NULL, 0, NULL, NULL),
(11, 'testfff', 'sssssssssssssss', '1588149867.pdf', 'POLICY', NULL, 0, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `qms_modules`
--

DROP TABLE IF EXISTS `qms_modules`;
CREATE TABLE IF NOT EXISTS `qms_modules` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `module_name` varchar(56) DEFAULT NULL,
  `is_deleted` tinyint(2) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `questions`
--

DROP TABLE IF EXISTS `questions`;
CREATE TABLE IF NOT EXISTS `questions` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `course_id` int(11) DEFAULT NULL,
  `section_id` int(2) NOT NULL DEFAULT '0',
  `question_type` tinyint(1) NOT NULL DEFAULT '0' COMMENT '0->objective, 1-subjective',
  `question` varchar(512) DEFAULT NULL,
  `option_a` varchar(512) DEFAULT NULL,
  `option_b` varchar(512) DEFAULT NULL,
  `option_c` varchar(512) DEFAULT NULL,
  `option_d` varchar(512) DEFAULT NULL,
  `correct_option` varchar(10) DEFAULT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=15 DEFAULT CHARSET=latin1;

--
-- Dumping data for table `questions`
--

INSERT INTO `questions` (`id`, `course_id`, `section_id`, `question_type`, `question`, `option_a`, `option_b`, `option_c`, `option_d`, `correct_option`, `is_deleted`) VALUES
(1, 7, 1, 0, 'question1', 'AAAA', 'bb1', 'cc1', 'ddd1', 'B', 0),
(2, 7, 1, 0, 'question2', 'option_a', 'bb2', 'cc2', 'ddd2', 'C', 0),
(3, 7, 1, 0, 'question', 'AAAA', 'bb3', 'cc3', 'ddd3', 'D', 0),
(4, 7, 1, 1, 'question4 desc', 'option_a', 'bb4', 'cc4', 'ddd4', 'A', 0),
(5, 7, 1, 1, 'question5 desc', 'AAAA', 'bb5', 'cc5', 'ddd5', 'A', 0),
(6, 7, 1, 1, 'jjjjjjjjjjjjjj desc', 'jjj', 'jjjjj', 'jjjjjjjjj', 'jjjjjjjjjjjjj', 'A', 0),
(7, 7, 1, 0, 'sssssssssssssss', NULL, NULL, 'jjjjjjj', NULL, 'A', 0),
(8, 7, 2, 0, 'ttttttttttttttttttt', NULL, NULL, NULL, NULL, NULL, 0),
(9, 7, 2, 0, 'ttttttttttttttttttthhhhhhhhh', NULL, NULL, NULL, NULL, NULL, 0),
(10, 7, 2, 0, 'gggggggggggg', NULL, NULL, NULL, NULL, NULL, 0),
(11, 7, 2, 0, 'ggggggggggggdddddddd', NULL, NULL, NULL, NULL, NULL, 0),
(12, 7, 2, 1, 'dddddddddd desc', NULL, NULL, NULL, NULL, NULL, 0),
(13, 7, 1, 1, 'ddddddddddfffffffffff desc', NULL, NULL, NULL, NULL, NULL, 0),
(14, 7, 2, 1, 'hhhhhhhhhhhhhhhh desc', NULL, NULL, NULL, NULL, NULL, 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE IF NOT EXISTS `users` (
  `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT,
  `name` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `last_name` varchar(258) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `photo_path` varchar(258) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `phone` varchar(12) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `email` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `email_verified_at` timestamp NULL DEFAULT NULL,
  `password` varchar(191) COLLATE utf8mb4_unicode_ci NOT NULL,
  `remember_token` varchar(100) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `user_type` varchar(28) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `parent_company` int(1) NOT NULL DEFAULT '0',
  `is_deleted` int(1) NOT NULL DEFAULT '0',
  `dob` date DEFAULT NULL,
  `rank` varchar(56) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  `nation_code` varchar(28) COLLATE utf8mb4_unicode_ci DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `users_email_unique` (`email`)
) ENGINE=MyISAM AUTO_INCREMENT=55 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `last_name`, `photo_path`, `phone`, `email`, `email_verified_at`, `password`, `remember_token`, `created_at`, `updated_at`, `user_type`, `parent_company`, `is_deleted`, `dob`, `rank`, `nation_code`) VALUES
(1, 'testdev testdev', NULL, '1577881360.jpeg', NULL, 'sandeeptcy@gmail.com', '2019-12-15 02:56:37', '$2y$10$GiA7oYK7i2.WSpW7SBrxYeTmCsE634d51bssHCmFQpobyVXt4nFBq', NULL, '2019-12-15 02:56:37', '2020-01-01 06:52:40', 'admin', 0, 0, NULL, NULL, NULL),
(2, 'testuser111', NULL, NULL, NULL, 'sandeeptcy123@gmail.com', NULL, '$2y$10$KlB9vx9Y/xmCQR0dnj4r0.tOTUKEtw4R1glbX1O9zv8Sg6fmdNecO', NULL, '2019-12-15 03:28:30', '2019-12-15 03:28:30', NULL, 0, 0, NULL, NULL, NULL),
(3, 'deepdev', NULL, NULL, NULL, 'deepdev@gmail.com', NULL, '$2y$10$tAKf75FzuOquQZuGdfFZfOBFhYgllS7iow12eSii.0r0lQozkaQLe', NULL, '2019-12-30 02:22:15', '2019-12-30 02:22:52', NULL, 0, 0, NULL, NULL, NULL),
(4, 'deepdeepdevkkkkkkkkkkkkkk', NULL, NULL, NULL, 'deepkkkkkkkkkkdev@gmail.com', NULL, '$2y$10$nQjv5feQtQagfnwmS4bNHuDiakwO2t3An4M3k1mSVOAr.eSb4t4TW', NULL, '2019-12-30 02:23:50', '2019-12-30 02:23:58', NULL, 0, 1, NULL, NULL, NULL),
(5, 'alpha123', NULL, NULL, NULL, 'alpha1234@gmail.com', NULL, '$2y$10$n1oIdZDVvIazbPgpsU9nieZFHFxENLgTpCBkcrr5JOBcTS92s9Umu', NULL, '2019-12-30 04:59:03', '2019-12-30 04:59:28', NULL, 0, 1, NULL, NULL, NULL),
(6, 'aa123eee', NULL, NULL, NULL, 'dddddddd12@mail.c', NULL, '$2y$10$CO3sajvgZgnXZznhz2cj0OzFoUdhWb8Q00gQvnXT53obx8W0Vgboi', NULL, '2019-12-30 05:00:19', '2019-12-30 05:10:22', NULL, 0, 0, NULL, NULL, NULL),
(7, 'nnnnnnnnnnnnnnnnnn nnnnnnnnnnnn nnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnnn', NULL, NULL, NULL, 'dsfdsfds@gmail.com', NULL, '$2y$10$Gvf/5G7cNbqTxibnO7iGquv/6O4AiyfZew/ybcN82ZUqD5fytEnku', NULL, '2019-12-30 05:13:53', '2019-12-30 06:03:56', NULL, 0, 1, NULL, NULL, NULL),
(10, 'u2marineservices', NULL, NULL, NULL, 'u2marineservicesC@gmail.com', NULL, '$2y$10$uazXxo3ZmLPZMl9SHnfG5url1fVuyCgNB3aHShWO8cluPkCbIgifG', NULL, '2019-12-30 06:19:37', '2020-01-24 20:37:50', 'candidate', 0, 0, NULL, NULL, NULL),
(8, 'pppppppppp pppppppp ppppppppppppppppppppkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkkk', NULL, NULL, NULL, 'jjjjjjjjjjjjjjjjjjjjjjjjjjjj@hmahjhgj.op', NULL, '$2y$10$1TjLnszSbYptKy91Ac2ZpeHB1z3eJqJMHMUC0o62A9pffcPcavYTC', NULL, '2019-12-30 05:15:52', '2019-12-30 06:03:59', NULL, 0, 1, NULL, NULL, NULL),
(9, 'u2marineservices', NULL, NULL, NULL, 'u2marineservicesA@gmail.com', NULL, '$2y$10$ezOb0bmCLSSIazcShwH3wu8hDuxtV7N7IZV/irtltdLgjNScfvyei', NULL, '2019-12-30 06:19:08', '2019-12-30 06:19:08', 'admin', 0, 0, NULL, NULL, NULL),
(11, 'u2marinese', NULL, NULL, NULL, 'u2marineCO@gmail.com', NULL, '$2y$10$yBZMa3JFSHf1c7nTV7WW8e2gMyuO8idto4yX8f9E5XAYG9yNHQrGO', NULL, '2019-12-30 06:30:34', '2020-01-20 01:17:56', 'company', 0, 0, NULL, NULL, NULL),
(12, 'test1fff', NULL, NULL, NULL, 'test1u@gmail.com', NULL, '$2y$10$JpRZPyF9uSvn7Q9UZTb0R.nFUT1GZfjTdOdG70Ue3X0PrewC0Xjfy', NULL, '2019-12-30 06:38:17', '2020-01-20 10:43:02', 'candidate', 0, 0, NULL, NULL, NULL),
(13, 'trainernnnn', NULL, NULL, NULL, 'trainer@gmail.com', NULL, '$2y$10$JAjzp.INY5WY2v5//.aGEO1K1fkqZBZC9fdc8SVhAwJMrOL2jwJyi', NULL, '2019-12-30 06:38:39', '2020-01-20 07:20:57', 'trainer', 0, 0, NULL, NULL, NULL),
(14, 'Combbhhhhh', NULL, NULL, NULL, 'Company1@gmail.comggggggggf', NULL, '$2y$10$nZpNHpHg3stavdTL2H7rfOZs1S25IxTjgK6lOX3eUtwZ48Clhm9Ou', NULL, '2020-01-02 10:57:13', '2020-01-20 10:43:14', 'company', 0, 1, NULL, NULL, NULL),
(15, 'admin123', NULL, NULL, NULL, 'admin123@gmail.com', NULL, '$2y$10$QXMM0NqxVDJq7S2bLXQv6utampDJvC6ZZ6Zu5iMfaY6CssocZ9nLu', NULL, '2020-01-02 10:58:51', '2020-01-02 10:58:51', 'admin', 0, 0, NULL, NULL, NULL),
(16, 'admin', NULL, NULL, NULL, 'admin@u2marineservices.com', NULL, '$2y$10$uwbupNxbtExXuBFHHEOIWO8Vy.uo6wTjROd7OZAaDzBInObYxcSfS', NULL, '2020-01-06 01:48:03', '2020-01-06 01:48:03', 'admin', 0, 0, NULL, NULL, NULL),
(17, 'testdev testdev', NULL, '1591102444.jpg', '1212121212', 'candidate@u2marineservices.com', NULL, '$2y$10$//iUZqPils8AHGf8pW4E/OvSOXP/WJ.0EQBrnvIlBNe3WbmEQIKzG', NULL, '2020-01-06 01:48:42', '2020-06-02 07:24:04', 'candidate', 0, 0, '2020-06-03', NULL, 'In'),
(18, 'dsfdsafdsf', NULL, '1579447289.jpeg', '1212121212', 'company@u2marineservices.com', NULL, '$2y$10$3RgiKyVVObGMIsYhTVdn5eRX1qqxfnqCU8GI.eEjis9x8b2bxc72u', NULL, '2020-01-06 01:49:24', '2020-01-19 09:51:29', 'company', 0, 0, NULL, NULL, NULL),
(19, 'trainertest', NULL, NULL, NULL, 'trainertest@gmail.com', NULL, '$2y$10$IU8Zf4onMZSQfFdi5eizeeVXFVX8OoGXCIsCbyM2dW1gVP68QWOSm', NULL, '2020-01-16 03:05:11', '2020-01-20 10:30:26', 'trainer', 0, 0, NULL, NULL, NULL),
(20, 'trainertestrrrrrrrrrrrrrrrrrrrrrrrrrrrrrrr', NULL, NULL, NULL, 'trainertest@gmail.comuuuuuu', NULL, '$2y$10$fF5I/wClj.aFiCEoswUAjuY6hEIacXOpdJi4cl2wlOw910xT1GYFW', NULL, '2020-01-16 03:06:07', '2020-01-20 10:28:50', 'trainer', 0, 1, NULL, NULL, NULL),
(21, 'testdev testdev', NULL, NULL, '1212121212', 'candidate@gmail.com', NULL, '$2y$10$5u6SVZLAhFQDOs16fnP/iek5daKarzIdPT23CTh8W07X5agnqrmBu', NULL, '2020-01-18 09:11:00', '2020-01-18 09:51:19', 'candidate', 0, 0, NULL, NULL, NULL),
(26, 'testdevjjjjj', NULL, NULL, NULL, 'sandjjjeeptcy@gmail.com', NULL, '$2y$10$sJbnPXIgVOTpBCZffLErtuNA27muoOBvcUvXYGoC1Q9.M7Fy64LJ6', NULL, '2020-01-20 02:03:47', '2020-01-20 10:31:36', 'trainer', 0, 1, NULL, NULL, NULL),
(22, 'testukjj', NULL, NULL, NULL, 'testww321@gmail.com', NULL, '$2y$10$BBbha617HyhEZB70c8IlOeV2ikSUXGBovYT4ilrmMIfpGRW8ZLfdy', NULL, '2020-01-20 01:16:15', '2020-01-20 10:42:51', 'candidate', 0, 1, NULL, NULL, NULL),
(23, 'testdevww', NULL, NULL, NULL, 'sandeeptcy@gmail.comww', NULL, '$2y$10$oDG5JAcK2GAwTnTzkA7xS.FG5gF/sTs.aeLaNz4lTqtNM0z2O5Qei', NULL, '2020-01-20 01:16:59', '2020-01-20 01:16:59', 'company', 0, 0, NULL, NULL, NULL),
(24, 'testdevccc', NULL, NULL, NULL, 'sandeeptcy@gmail.comccc', NULL, '$2y$10$Hp.ob3.gNePb/8/n.TCsuunSxbMBBKnKnt79o4.QXaLoafnDB/yaq', NULL, '2020-01-20 01:42:46', '2020-01-20 01:42:46', 'company', 0, 0, NULL, NULL, NULL),
(25, 'testdevbbbb', NULL, NULL, NULL, 'sandeepbbbtcy@gmail.com', NULL, '$2y$10$pv5z2UPpoHU6mbADlnrkMOz6sE6PtYohxfK309B8FbNRJnDaqYSJ6', NULL, '2020-01-20 01:48:24', '2020-01-20 01:48:24', 'company', 0, 0, NULL, NULL, NULL),
(27, 'fddddddd', NULL, NULL, NULL, 'tescct321@gmail.com', NULL, '$2y$10$/TyROQ7/gGbw8X/tVAn5JudFLxSrYKBki1yTo9FM3yNj3cl9rRjvy', NULL, '2020-01-20 02:12:49', '2020-01-20 02:12:49', 'company', 0, 0, NULL, NULL, NULL),
(28, 'hehehe', NULL, NULL, NULL, 'tesddddt321@gmail.com', NULL, '$2y$10$VzZDtfM/GRw3Frn5HqMIou1ie2/dMqo.MBJRfQkyKcmxsVBdCctQ2', NULL, '2020-01-20 02:28:26', '2020-01-20 10:31:51', 'trainer', 0, 1, NULL, NULL, NULL),
(29, 'hehehekkDD', NULL, NULL, NULL, 'tesddkkddt321@gmail.com', NULL, '$2y$10$F0dvejQMoNQvQTvWHEPdfuMP96ngjMJFL2VHadZakSaRBx3b4Lroy', NULL, '2020-01-20 02:28:37', '2020-01-20 10:29:00', 'trainer', 0, 0, NULL, NULL, NULL),
(30, 'testdtttt', NULL, NULL, NULL, 'sandeettttptcy@gmail.com', NULL, '$2y$10$NRqs0pTGJo6br.j3D4ntq.afRZRK0FqdLt3XaZhLpUw3bO8PUXnhW', NULL, '2020-01-20 02:31:10', '2020-01-20 02:31:10', 'trainer', 0, 0, NULL, NULL, NULL),
(31, 'testde', NULL, NULL, NULL, 'sandtcy@gmail.com', NULL, '$2y$10$ISmSzMu7.97PTsoYuIO7eeGxp9P9Xa0KdDZmGFy3Rm2xkvFNCNH5K', NULL, '2020-01-20 07:07:23', '2020-01-20 07:07:23', 'trainer', 0, 0, NULL, NULL, NULL),
(32, 'testdevbbbbb', NULL, NULL, NULL, 'sanccdeeptcy1@gmail.comxz', NULL, '$2y$10$JKiCtO66c6jyp6D0ZQKvUelXsrJZkA7uF1vfS3SXcFi30f.OTvhj.', NULL, '2020-01-20 07:08:29', '2020-01-20 10:28:28', 'company', 0, 1, NULL, NULL, NULL),
(33, 'gfffffff', NULL, NULL, NULL, 'tefffffffffffst321@gmail.com', NULL, '$2y$10$mSPw.rGh8wf4HQKbUZbwreJ9ABQHY64Jk1UG78RxGQJd7Sry8lUz2', NULL, '2020-01-20 07:10:42', '2020-01-20 07:34:41', 'candidate', 0, 1, NULL, NULL, NULL),
(34, 'fghfhhh', NULL, NULL, NULL, 'test321@gmail.com', NULL, '$2y$10$/nZNibOMnws/H8OZGI81leT7sSmbOvicubOmwu93omcq/wBs.vz2m', NULL, '2020-01-20 07:16:52', '2020-01-20 10:43:51', 'company', 0, 0, NULL, NULL, NULL),
(35, 'testdhhh', NULL, NULL, NULL, 'testdhhh@gmail.com', NULL, '$2y$10$lPzLER2s6nI.Q1S4ZW6g8eU4QDyn3y1L1t19KjW9U9cijho79KsBO', NULL, '2020-01-20 07:20:44', '2020-01-20 07:20:44', 'trainer', 0, 0, NULL, NULL, NULL),
(36, 'sandeephhh', NULL, NULL, NULL, 'deeptest1@gmail.comdd', NULL, '$2y$10$uMrm3dEjMwXLuApY.HS/h.NfG26Wg93gwHYBGsbFlGImThqQp9UB.', NULL, '2020-01-20 07:25:05', '2020-01-20 07:25:05', 'candidate', 0, 0, NULL, NULL, NULL),
(37, 'sandeephhhjjj', NULL, NULL, NULL, 'deeptest1@gmail.comddjj', NULL, '$2y$10$tduE0rios3LrQoi/nKNIRekaWLQyUoq9S6YURScT7wdRSpu3WGkOC', NULL, '2020-01-20 07:25:27', '2020-01-20 07:25:27', 'candidate', 0, 0, NULL, NULL, NULL),
(38, 'tesjjjjtuser1', NULL, NULL, NULL, 'tesjjt1u@gmail.comjj', NULL, '$2y$10$.rqrPpePxT06wmVD73Pct.e5LskYeEMyffrVwsM31aX0Hnelzo4Ja', NULL, '2020-01-20 07:28:23', '2020-01-20 10:33:08', 'candidate', 0, 1, NULL, NULL, NULL),
(39, 'teskkk', NULL, NULL, NULL, 'tesjjt1u@gmail.c', NULL, '$2y$10$M7Hq/Z14Mu78890f99UqJe81vKmW6EYsltFlcbPEOETmyjUy9saFG', NULL, '2020-01-20 07:28:57', '2020-01-24 01:40:24', 'candidate', 0, 0, NULL, NULL, NULL),
(40, 'hjhjjjjjjkkk', NULL, NULL, NULL, 'hjhjjjjjj@gmail.com', NULL, '$2y$10$tFdLvpmPUwrsG.xwf/L1pe.vI2KJn3.n9j1n6Qz6.0lN5zagZDb/q', NULL, '2020-01-20 07:29:55', '2020-01-20 11:06:57', 'candidate', 0, 0, NULL, NULL, NULL),
(41, 'sanyyyyyydeept1', NULL, NULL, NULL, 'sandeffffffffeptcy@gmail.com', NULL, '$2y$10$zqxaJG9Efk6IT5EAqhaLsecsJdSl5r2eNWH/CIHOCaKgCdlRIrmK.', NULL, '2020-01-20 07:32:15', '2020-01-20 11:06:44', 'candidate', 0, 1, NULL, NULL, NULL),
(42, 'testusHHHG', NULL, NULL, NULL, 't321@gmail.com', NULL, '$2y$10$3ixoKhZnT6wFM1.Ix9RvVOqraXemy32F8hCUHtlHL2ZvnBTBnfUrS', NULL, '2020-01-20 07:35:33', '2020-01-20 10:27:48', 'candidate', 0, 0, NULL, NULL, NULL),
(43, 'FFFFFFFFF', NULL, NULL, NULL, 'test3FFF21@gmail.com', NULL, '$2y$10$pjRCWDMv7mk2oDTZaKJjHu.mlMc0oSxfoceYoauRqfLiLeIP7vqPS', NULL, '2020-01-20 10:30:56', '2020-01-20 10:30:56', 'trainer', 0, 0, NULL, NULL, NULL),
(44, 'sandeepddd', NULL, NULL, NULL, 'sandeedddptcy@gmail.com', NULL, '$2y$10$lzYahEJ/P72bFNTf4P0foec6N97MxyEyfw.2TIyLkpOWLpg/Tj/qq', NULL, '2020-01-20 10:42:36', '2020-01-20 10:42:36', 'candidate', 0, 0, NULL, NULL, NULL),
(45, 'testdevddd', NULL, NULL, NULL, 'sandeddddeptcy@gmail.com', NULL, '$2y$10$5O5bhWUo.p3PGEy8jUoBT.ki77HN3qMEq5rkN9m.16sr2yJvHxJ3S', NULL, '2020-01-20 10:44:16', '2020-01-20 10:44:16', 'company', 0, 0, NULL, NULL, NULL),
(46, 'asdfgh', NULL, NULL, NULL, 'test1u@gmail.comasdf', NULL, '$2y$10$7FQVAhbAqMy3CRT.myZvQOGnu2jfBO43HMyYmiF/8NqvYyuIbacNu', NULL, '2020-01-20 11:03:41', '2020-01-20 11:03:41', 'company', 0, 0, NULL, NULL, NULL),
(47, 'sandeepwe', NULL, NULL, NULL, 'sandeeptcy1@gmail.comwe', NULL, '$2y$10$kZJJQGmlXY4c8OvWpDGn/.tPMXYt0HonCyq6wytMFw2u5BJ8Cf1Ui', NULL, '2020-01-20 11:06:25', '2020-01-20 11:06:25', 'candidate', 0, 0, NULL, NULL, NULL),
(48, 'testuser111aaaa', NULL, NULL, NULL, 'testuser111aaaa@gmail.com', NULL, '$2y$10$ChWo8RkokpOvku7SGrfJbeOQmoDEa/1OoluQ.7khZLyXaFh8ioyHu', NULL, '2020-01-24 20:32:54', '2020-01-24 20:32:54', 'candidate', 0, 0, NULL, NULL, NULL),
(49, 'testuser111aaaa', NULL, NULL, NULL, 'tdddd1aaaa@gmail.com', NULL, '$2y$10$I4h0q7PhrtEZjHumDStdO.HtHVY07nUVcTB5NdblGyzRxUjPhW/YK', NULL, '2020-01-24 20:33:10', '2020-01-24 20:33:10', 'candidate', 0, 0, NULL, NULL, NULL),
(50, 'testuser111', NULL, NULL, NULL, 'saffffffeptcy@gmail.com', NULL, '$2y$10$YNBzDi4zZHj412pMG7a3I.RptDsS8CAYPUc8pD31hwPhcZJzmFY0e', NULL, '2020-01-24 20:37:20', '2020-01-24 20:37:20', 'candidate', 0, 0, NULL, NULL, NULL),
(51, 'testuser111', NULL, NULL, NULL, 'skkkkkptcy@gmail.com', NULL, '$2y$10$HMG9yLo3ejYsm/.vEJcVleBe1olMRx0GMqUMHq.W3rRLAs9zyfnha', NULL, '2020-01-24 20:37:30', '2020-01-24 20:38:16', 'candidate', 0, 0, NULL, NULL, NULL),
(52, 'cantest1', NULL, NULL, NULL, 'cantest1@gmail.com', NULL, '$2y$10$7W/.Sezmyz0C76CAnfSMXOjoqctT66mCGxdGS.rmPU.d23x7sXK9K', NULL, '2020-05-31 05:20:45', '2020-05-31 05:20:45', 'candidate', 0, 0, NULL, NULL, NULL),
(53, 'sssssss', NULL, NULL, NULL, 'sssssss@gmail.com', NULL, '$2y$10$z.J0DO4vnlpzjX9IqLaPfeOXO2wNOmQfLaBxvi/UrNXf3yByKqg7i', NULL, '2020-05-31 22:24:54', '2020-05-31 22:24:54', NULL, 0, 0, NULL, NULL, NULL),
(54, 'testuser111', NULL, NULL, NULL, 'sandeeptcssssy@gmail.com', NULL, '$2y$10$PQNKE/OU.w3nmHbMNG/8g.ZsArZTcP6YH/VSb8ZQUUe6u/jJWeIe.', NULL, '2020-05-31 22:30:33', '2020-05-31 22:30:33', 'candidate', 18, 0, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user_answer`
--

DROP TABLE IF EXISTS `user_answer`;
CREATE TABLE IF NOT EXISTS `user_answer` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `assess_id` varchar(10) NOT NULL,
  `question_id` varchar(10) NOT NULL,
  `user_option` varchar(10) NOT NULL,
  `correct_option` varchar(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_courses`
--

DROP TABLE IF EXISTS `user_courses`;
CREATE TABLE IF NOT EXISTS `user_courses` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `course_id` varchar(10) NOT NULL,
  `user_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `payment_mode` varchar(10) NOT NULL,
  `payment_amount` varchar(10) NOT NULL,
  `actual_cost` varchar(10) NOT NULL,
  `coupon` varchar(10) NOT NULL,
  `transaction_status` varchar(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `user_test`
--

DROP TABLE IF EXISTS `user_test`;
CREATE TABLE IF NOT EXISTS `user_test` (
  `id` int(2) NOT NULL AUTO_INCREMENT,
  `user_id` varchar(10) NOT NULL,
  `assess_id` varchar(10) NOT NULL,
  `date` date NOT NULL,
  `pre_feedback` varchar(10) NOT NULL,
  `post_feedback` varchar(10) NOT NULL,
  `score` varchar(10) NOT NULL,
  `is_deleted` tinyint(1) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM DEFAULT CHARSET=latin1;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
