-- phpMyAdmin SQL Dump
-- version 4.9.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Mar 11, 2021 at 05:32 PM
-- Server version: 5.5.62-cll
-- PHP Version: 7.3.6

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dsouq_genocide_dev`
--

-- --------------------------------------------------------

--
-- Table structure for table `activity_log`
--

CREATE TABLE `activity_log` (
  `activity_log_id` int(11) NOT NULL,
  `order_id` int(11) NOT NULL,
  `activity` varchar(200) NOT NULL,
  `activity_date` datetime NOT NULL,
  `status` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `activity_log`
--

INSERT INTO `activity_log` (`activity_log_id`, `order_id`, `activity`, `activity_date`, `status`) VALUES
(1, 1, 'Another Test', '2020-10-02 18:20:49', 1);

-- --------------------------------------------------------

--
-- Table structure for table `articles`
--

CREATE TABLE `articles` (
  `article_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `tags` text,
  `thumb_image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `articles`
--

INSERT INTO `articles` (`article_id`, `country_id`, `state_id`, `title`, `description`, `tags`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Demo test', '<span style=\"background-color: rgb(0, 255, 0);\">Aranya Sasmal</span>', NULL, NULL, 1, '2021-02-21 11:48:24', '2021-02-21 12:18:41'),
(2, 0, 0, 'Demo', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', NULL, NULL, 1, '2021-02-21 11:49:37', '2021-02-21 12:17:20'),
(3, 0, 0, '2019 Session timeline based on CAC', '<span style=\"background-color: rgb(255, 255, 0);\">2019 Session timeline based on CAC</span><br>\n									', NULL, NULL, 1, '2021-02-23 20:32:43', NULL),
(4, 0, 0, 'Test', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p><p><font color=\"#ffd663\">Demo</font></p>\n                                        									', 'NRC, CAC,Test', '1614192543_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(5, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Plea<span style=\"background-color: rgb(255, 0, 0);\">se try <b>paste some texts</b> here</span></p>\n                                        									', 'NRC, CAC', '1614192765_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(6, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p><font color=\"#ff0000\">Please try <b>paste some texts</b> here</font></p>\n                                        									', 'NRC, CAC', '1614192852_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(7, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p><font color=\"#ff0000\">Please try <b>paste some texts</b> here</font></p>\n                                        									', NULL, '1614192910_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(8, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p><font color=\"#ff0000\">Please try <b>paste some texts</b> here</font></p>\n                                        									', NULL, '1614192941_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(9, 0, 0, 'Term & conditions', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n                                        									', NULL, '1614193024_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(10, 1, 59, 'Term & conditions', '\n Hello there,\n\r\n\n\r\nThe toolbar can be customized and it also supports various callbacks such as\n oninit, onfocus, onpaste and many\n more.\r\n\r\n\n\r\nPlease try paste some texts here\r\n\r\n\n ', NULL, '1614193024_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(11, 1, 36, 'test sss', '<p>The toolbar can be customized The toolbar can be customized The toolbar can be customized The toolbar can be customized <br><br><br><br></p>', NULL, '1614233156_news.png', 1, '2021-02-25 00:00:00', NULL),
(12, 1, 69, 'National Population Registry', 'Demo', NULL, '1614364957_news.jpg', 1, '2021-02-26 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `article_images`
--

CREATE TABLE `article_images` (
  `article_image_id` int(11) NOT NULL,
  `article_id` int(11) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `article_images`
--

INSERT INTO `article_images` (`article_image_id`, `article_id`, `news_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(2, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(3, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(4, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(5, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(6, 14, '2_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(7, 15, '0_1613843815_news.jpeg', 1, NULL, '0000-00-00 00:00:00'),
(8, 16, '0_1614188940_news.jpg', 1, NULL, '0000-00-00 00:00:00'),
(9, 17, '0_1614233277_news.png', 1, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `cms`
--

CREATE TABLE `cms` (
  `cms_id` int(11) NOT NULL,
  `page` varchar(191) NOT NULL,
  `page_slug` varchar(191) NOT NULL,
  `title` text NOT NULL,
  `description` longtext NOT NULL,
  `image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `cms`
--

INSERT INTO `cms` (`cms_id`, `page`, `page_slug`, `title`, `description`, `image`, `status`, `created_at`) VALUES
(1, 'Term & conditions', 'term-&-conditions', 'Term & conditions', '<p>Terms and Conditions Generator</p><p>Every website needs a Terms and Conditions. Even if your website is not for your business or any commercial structure, you will be better off with a Terms and Conditions agreemnent. All websites are advised to have their own agreements for their own protection.</p><p>We will help you by providing this FREE terms and conditions generator. Fill in the blank fields below, and we will email you your personalized terms and conditions just for you and your business. The accuracy of the generated document on this website is not legally binding. Use at your own risk.</p>', '1608889551_.jpg', 1, '0000-00-00 00:00:00'),
(2, 'Overview', 'overview', 'Overview', 'Overview<p>Every website needs a Terms and Conditions. Even if your website is not for your business or any commercial structure, you will be better off with a Terms and Conditions agreemnent. </p>', '1614534214_cms.jpg', 1, '0000-00-00 00:00:00'),
(3, 'AboutUs', 'aboutus', 'aboutus', 'aboutus<p>Every website needs a Terms and Conditions. Even if your website is not for your business or any commercial structure, you will be better off with a Terms and Conditions agreemnent. </p>', '1614534092_cms.jpg', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `gallery_categories`
--

CREATE TABLE `gallery_categories` (
  `gallery_category_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_categories`
--

INSERT INTO `gallery_categories` (`gallery_category_id`, `name`, `status`, `created_at`) VALUES
(1, 'Gallery 2019', 1, '2021-02-20 11:53:01'),
(2, 'Gallery 2020', 1, '2021-02-20 11:57:04'),
(3, 'Gallery 2021', 1, '2021-02-20 11:58:28'),
(4, 'Gallery 2018', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `gallery_master`
--

CREATE TABLE `gallery_master` (
  `gallery_id` int(11) NOT NULL,
  `gallery_category_id` int(11) NOT NULL,
  `name` varchar(191) DEFAULT NULL,
  `thumb_image` varchar(191) NOT NULL,
  `file` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `gallery_master`
--

INSERT INTO `gallery_master` (`gallery_id`, `gallery_category_id`, `name`, `thumb_image`, `file`, `status`, `created_at`, `updated_at`) VALUES
(1, 1, 'Demo', '1614438343_news.jpg', '', 1, '2021-02-27 00:00:00', '0000-00-00 00:00:00'),
(2, 1, 'Demo 2019', '1614438400_news.jpg', '1614438400_gallery.jpg', 0, '2021-02-27 00:00:00', '2021-02-27 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `general_news`
--

CREATE TABLE `general_news` (
  `news_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `tags` text,
  `thumb_image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `general_news`
--

INSERT INTO `general_news` (`news_id`, `title`, `description`, `tags`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Demo test', '<span style=\"background-color: rgb(0, 255, 0);\">Aranya Sasmal</span>', NULL, NULL, 1, '2021-02-21 11:48:24', '2021-02-21 12:18:41'),
(2, 'Demo', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', NULL, NULL, 1, '2021-02-21 11:49:37', '2021-02-21 12:17:20'),
(3, '2019 Session timeline based on CAC', '<span style=\"background-color: rgb(255, 255, 0);\">2019 Session timeline based on CAC</span><br>\n									', NULL, NULL, 1, '2021-02-23 20:32:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genocide_categories`
--

CREATE TABLE `genocide_categories` (
  `genocide_categorie_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genocide_categories`
--

INSERT INTO `genocide_categories` (`genocide_categorie_id`, `name`, `title`, `status`, `created_at`) VALUES
(1, 'genocide Crimes', '', 1, '2021-02-20 11:53:01'),
(2, 'genocide Propaganda', '', 1, '2021-02-20 11:57:04'),
(3, 'genocide on Media', '', 1, '2021-02-20 11:58:28'),
(4, 'Symbolization', 'Symbolization', 1, NULL),
(5, 'Preparation', '', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `genocide_news`
--

CREATE TABLE `genocide_news` (
  `genocide_news_id` int(11) NOT NULL,
  `genocide_categorie_id` int(11) NOT NULL,
  `news_title` text NOT NULL,
  `news_description` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `sub_stage` int(11) NOT NULL,
  `gencode_percentage` float(8,2) NOT NULL,
  `tags` text NOT NULL,
  `thumb_image` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genocide_news`
--

INSERT INTO `genocide_news` (`genocide_news_id`, `genocide_categorie_id`, `news_title`, `news_description`, `state_id`, `stage`, `sub_stage`, `gencode_percentage`, `tags`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'genocidesss Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 0, 1, 0, 50.00, 'NRC, CAC', '1613813869_news.jpg', 3, '2021-02-20 15:07:49', '0000-00-00 00:00:00'),
(2, 0, 'randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p><p><br></p><p>Chayan</p>\n									', 0, 1, 0, 20.00, 'NRC, CAC,Chayan', '1613813971_news.jpg', 3, '2021-02-20 15:09:31', '0000-00-00 00:00:00'),
(3, 3, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 38, 1, 0, 100.00, 'NRC, CAC', '1613817647_news.jpg', 1, '2021-02-20 16:10:47', '0000-00-00 00:00:00'),
(4, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817715_news.jpg', 1, '2021-02-20 16:11:55', '0000-00-00 00:00:00'),
(5, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817802_news.jpg', 1, '2021-02-20 16:13:22', '0000-00-00 00:00:00'),
(16, 4, 'Randomised words even slightly believable', '\n                                        \n                                        										Hello there,\n										<br>\n										<p><font color=\"#ff0000\">The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</font></p>\n										<p>P<font color=\"#0000ff\">lease try <b>paste some texts</b> here</font></p>\n                                        																		', 59, 8, 9, 90.00, 'NRC, CAC,other', '1614188940_other.jpg', 1, '2021-02-24 23:34:37', '2021-02-24 00:00:00'),
(17, 5, 'test 1234', '\r\n                                        \r\n                                        										Hello there,\r\n										<br>\r\n										<p>The toolbar can be customized and it also supports various callbacks such as\r\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\r\n											more.</p>\r\n										<p>Please try <b>paste some texts</b> here</p>\r\n                                        																		', 36, 3, 5, 97.00, 'NRC, CAC', '1614524497_other.png', 1, '2021-02-25 00:00:00', '2021-02-28 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `genocide_news_images`
--

CREATE TABLE `genocide_news_images` (
  `genocide_news_image_id` int(11) NOT NULL,
  `genocide_news_id` int(11) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `genocide_news_images`
--

INSERT INTO `genocide_news_images` (`genocide_news_image_id`, `genocide_news_id`, `news_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(2, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(3, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(4, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(5, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(6, 14, '2_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(7, 15, '0_1613843815_news.jpeg', 1, NULL, '0000-00-00 00:00:00'),
(8, 16, '0_1614188940_news.jpg', 1, NULL, '0000-00-00 00:00:00'),
(9, 17, '0_1614233277_news.png', 1, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `genocide_scale`
--

CREATE TABLE `genocide_scale` (
  `id` int(11) NOT NULL,
  `scale_value` float(2,1) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `updated_at` datetime NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `genocide_scale`
--

INSERT INTO `genocide_scale` (`id`, `scale_value`, `status`, `updated_at`) VALUES
(1, 8.2, 1, '2021-03-03 00:29:19');

-- --------------------------------------------------------

--
-- Table structure for table `hate_categories`
--

CREATE TABLE `hate_categories` (
  `hate_categorie_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hate_categories`
--

INSERT INTO `hate_categories` (`hate_categorie_id`, `name`, `title`, `status`, `created_at`, `updated_at`) VALUES
(1, 'Hate Crimes', '', 1, '2021-02-20 11:53:01', NULL),
(2, 'Hate Propaganda', '', 1, '2021-02-20 11:57:04', NULL),
(3, 'Hate on Media', 'Hate on Media', 1, '2021-02-20 11:58:28', '2021-02-23 21:04:06'),
(4, 'Hate Crimes New Lunch', 'Hate Crimes New Lunch', 1, '2021-02-23 21:03:05', NULL),
(5, 'New section hate', 'Hi ', 1, '2021-02-23 21:23:33', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `hate_news`
--

CREATE TABLE `hate_news` (
  `hate_news_id` int(11) NOT NULL,
  `hate_categorie_id` int(11) NOT NULL,
  `news_title` text NOT NULL,
  `news_description` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `sub_stage` int(11) NOT NULL,
  `gencode_percentage` float(8,2) NOT NULL,
  `tags` text NOT NULL,
  `thumb_image` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hate_news`
--

INSERT INTO `hate_news` (`hate_news_id`, `hate_categorie_id`, `news_title`, `news_description`, `state_id`, `stage`, `sub_stage`, `gencode_percentage`, `tags`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Hatte Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 0, 1, 0, 50.00, 'NRC, CAC', '1613813869_news.jpg', 3, '2021-02-20 15:07:49', '0000-00-00 00:00:00'),
(2, 0, 'randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p><p><br></p><p>Chayan</p>\n									', 0, 1, 0, 20.00, 'NRC, CAC,Chayan', '1613813971_news.jpg', 3, '2021-02-20 15:09:31', '0000-00-00 00:00:00'),
(3, 3, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 38, 1, 0, 100.00, 'NRC, CAC', '1613817647_news.jpg', 1, '2021-02-20 16:10:47', '0000-00-00 00:00:00'),
(4, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817715_news.jpg', 1, '2021-02-20 16:11:55', '0000-00-00 00:00:00'),
(5, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817802_news.jpg', 1, '2021-02-20 16:13:22', '0000-00-00 00:00:00'),
(16, 4, 'Beauty of nature', 'Beauty of nature<br>\n                                        									', 59, 7, 9, 100.00, 'NRC, CAC,hate', '1614103892_news.jpg', 1, '2021-02-23 21:14:14', '0000-00-00 00:00:00'),
(17, 4, 'Beauty of nature', '\n                                        Beauty of nature<br>\n                                        																		', 59, 7, 9, 100.00, 'NRC, CAC,hate', '1614103931_news.jpg', 1, '2021-02-23 21:14:14', '2021-02-23 21:14:14'),
(18, 5, 'Www Test hate news 34949', '\r\n                                        \r\n                                        										Hello there,\r\n										<br>\r\n										<p>The toolbar can be customized and it also supports various callbacks such as\r\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\r\n											more.</p>\r\n										<p>IkaakkaPlease try <b>paste some texts</b> here</p>\r\n                                        																		', 38, 9, 1, 90.00, 'Hello,hisosk', '1614104724_news.jpeg', 1, '2021-02-23 21:25:24', '2021-02-23 21:25:54');

-- --------------------------------------------------------

--
-- Table structure for table `hate_news_images`
--

CREATE TABLE `hate_news_images` (
  `hate_news_image_id` int(11) NOT NULL,
  `hate_news_id` int(11) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `hate_news_images`
--

INSERT INTO `hate_news_images` (`hate_news_image_id`, `hate_news_id`, `news_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(2, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(3, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(4, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(5, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(6, 14, '2_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(7, 15, '0_1613843815_news.jpeg', 1, NULL, '0000-00-00 00:00:00'),
(8, 17, '0_1614103931_hate.jpg', 1, NULL, '0000-00-00 00:00:00'),
(9, 18, '0_1614104724_hate.jpeg', 1, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `legal_categories`
--

CREATE TABLE `legal_categories` (
  `legal_categorie_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `legal_categories`
--

INSERT INTO `legal_categories` (`legal_categorie_id`, `name`, `title`, `status`, `created_at`) VALUES
(1, 'Tribunals', '', 1, '2021-02-20 11:53:01'),
(2, 'Inside Assam', 'Assam', 1, '2021-02-20 11:57:04'),
(3, 'Qurside Assam', '', 1, '2021-02-20 11:58:28'),
(4, 'Test category', 'Is my mother land as well as my dream', 1, NULL),
(5, 'Darjeeling', 'The beauty of North Bengal', 1, NULL),
(6, 'Doors', 'The beauty of Nature', 1, NULL),
(7, 'Test', 'Test legal ', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `legal_news`
--

CREATE TABLE `legal_news` (
  `legal_news_id` int(11) NOT NULL,
  `legal_categorie_id` int(11) NOT NULL,
  `news_title` text NOT NULL,
  `news_description` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `sub_stage` int(11) NOT NULL,
  `gencode_percentage` float(8,2) NOT NULL,
  `tags` text NOT NULL,
  `thumb_image` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `legal_news`
--

INSERT INTO `legal_news` (`legal_news_id`, `legal_categorie_id`, `news_title`, `news_description`, `state_id`, `stage`, `sub_stage`, `gencode_percentage`, `tags`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 0, 1, 0, 50.00, 'NRC, CAC', '1613813869_news.jpg', 3, '2021-02-20 15:07:49', '0000-00-00 00:00:00'),
(2, 0, 'randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p><p><br></p><p>Chayan</p>\n									', 0, 1, 0, 20.00, 'NRC, CAC,Chayan', '1613813971_news.jpg', 3, '2021-02-20 15:09:31', '0000-00-00 00:00:00'),
(3, 3, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 38, 1, 0, 100.00, 'NRC, CAC', '1613817647_news.jpg', 1, '2021-02-20 16:10:47', '0000-00-00 00:00:00'),
(4, 2, 'Randomised words even slightly believable', '\n                                        \n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <span style=\"background-color: rgb(255, 255, 0);\"><b>paste some texts</b> here</span></p>\n																		', 37, 8, 9, 50.00, 'NRC, CAC,assam', '1613817715_news.jpg', 1, '2021-02-20 16:11:55', '0000-00-00 00:00:00'),
(5, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817802_news.jpg', 1, '2021-02-20 16:13:22', '0000-00-00 00:00:00'),
(6, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817927_news.jpg', 1, '2021-02-20 16:15:27', '0000-00-00 00:00:00'),
(16, 3, 'Randomised words even slightly believable', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste <span style=\"background-color: rgb(255, 255, 0);\">some texts</span></b><span style=\"background-color: rgb(255, 255, 0);\"> here</span></p>\n                                        									', 38, 8, 1, 20.00, 'NRC, CAC', '1613919130_news.jpg', 1, '2021-02-23 20:50:52', '0000-00-00 00:00:00'),
(17, 5, 'Beauty of nature', '\n                                        <span style=\"background-color: rgb(255, 255, 0);\"><font color=\"#0000ff\">Beauty of nature</font></span><br>\n                                        																		', 59, 9, 8, 50.00, 'NRC, CAC,Tourist', '1614102531_news.jpg', 1, '2021-02-23 20:50:52', '2021-02-23 20:50:52'),
(18, 7, 'Test news 123', '\r\n                                        										Hello there,\r\n										<br>\r\n										<p>The toolbar can be customized and it also supports various callbacks such as\r\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\r\n											more.</p>\r\n										<p>Please try <b>paste some texts</b> here</p>\r\n                                        									', 36, 8, 5, 80.00, 'Test ,new ,latest ', '1614103102_news.jpeg', 1, '2021-02-23 20:58:22', '0000-00-00 00:00:00'),
(19, 1, 'test 1234', '\r\n                                        										hi Hello there,\r\n										<br>\r\n										<p>The toolbar can be customized and it also supports various callbacks such as\r\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\r\n											more.</p>\r\n										<p>Please try <b>paste some texts</b> here</p>\r\n                                        									', 0, 1, 1, 0.00, 'NRC, CAC', '1615456281_news.png', 1, '2021-03-11 12:51:21', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `legal_news_images`
--

CREATE TABLE `legal_news_images` (
  `legal_news_image_id` int(11) NOT NULL,
  `legal_news_id` int(11) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `legal_news_images`
--

INSERT INTO `legal_news_images` (`legal_news_image_id`, `legal_news_id`, `news_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(2, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(3, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(4, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(5, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(6, 14, '2_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(7, 15, '0_1613843815_news.jpeg', 1, NULL, '0000-00-00 00:00:00'),
(8, 16, '0_1613919130_legal.jpg', 1, NULL, '0000-00-00 00:00:00'),
(9, 17, '0_1614102531_legal.jpg', 1, NULL, '0000-00-00 00:00:00'),
(10, 18, '0_1614103102_legal.jpeg', 1, NULL, '0000-00-00 00:00:00'),
(11, 19, '0_1615456281_legal.png', 1, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `news`
--

CREATE TABLE `news` (
  `news_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `tags` text,
  `thumb_image` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news`
--

INSERT INTO `news` (`news_id`, `country_id`, `state_id`, `title`, `description`, `tags`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Demo test', '<span style=\"background-color: rgb(0, 255, 0);\">Aranya Sasmal</span>', NULL, NULL, 1, '2021-02-21 11:48:24', '2021-02-21 12:18:41'),
(2, 0, 0, 'Demo', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', NULL, NULL, 1, '2021-02-21 11:49:37', '2021-02-21 12:17:20'),
(3, 0, 0, '2019 Session timeline based on CAC', '<span style=\"background-color: rgb(255, 255, 0);\">2019 Session timeline based on CAC</span><br>\n									', NULL, NULL, 1, '2021-02-23 20:32:43', NULL),
(4, 0, 0, 'Test', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p><p><font color=\"#ffd663\">Demo</font></p>\n                                        									', 'NRC, CAC,Test', '1614192543_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(5, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Plea<span style=\"background-color: rgb(255, 0, 0);\">se try <b>paste some texts</b> here</span></p>\n                                        									', 'NRC, CAC', '1614192765_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(6, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p><font color=\"#ff0000\">Please try <b>paste some texts</b> here</font></p>\n                                        									', 'NRC, CAC', '1614192852_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(7, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p><font color=\"#ff0000\">Please try <b>paste some texts</b> here</font></p>\n                                        									', NULL, '1614192910_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(8, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p><font color=\"#ff0000\">Please try <b>paste some texts</b> here</font></p>\n                                        									', NULL, '1614192941_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(9, 0, 0, 'Term & conditions', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n                                        									', NULL, '1614193024_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(10, 1, 59, 'Term & conditions', '\n Hello there,\n\r\n\n\r\nThe toolbar can be customized and it also supports various callbacks such as\n oninit, onfocus, onpaste and many\n more.\r\n\r\n\n\r\nPlease try paste some texts here\r\n\r\n\n ', NULL, '1614193024_news.jpg', 1, '2021-02-24 00:00:00', NULL),
(11, 1, 36, 'test sss', '<p>The toolbar can be customized The toolbar can be customized The toolbar can be customized The toolbar can be customized <br><br><br><br></p>', NULL, '1614233156_news.png', 1, '2021-02-25 00:00:00', NULL),
(12, 1, 40, 'Test', '<span style=\"background-color: rgb(0, 0, 255);\"><font color=\"#ffffff\">\n                                        										Hello there,\n										<br>\n										</font></span><p><span style=\"background-color: rgb(0, 0, 255);\"><font color=\"#ffffff\">The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</font></span></p>\n										<p><span style=\"background-color: rgb(0, 0, 255);\"><font color=\"#ffffff\">Please try <b>paste some texts</b> here</font></span></p>\n                                        									', NULL, '1614364829_news_.jpg', 1, '2021-02-26 00:00:00', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `news_images`
--

CREATE TABLE `news_images` (
  `news_image_id` int(11) NOT NULL,
  `news_id` int(11) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `news_images`
--

INSERT INTO `news_images` (`news_image_id`, `news_id`, `news_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(2, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(3, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(4, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(5, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(6, 14, '2_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(7, 15, '0_1613843815_news.jpeg', 1, NULL, '0000-00-00 00:00:00'),
(8, 16, '0_1614188940_news.jpg', 1, NULL, '0000-00-00 00:00:00'),
(9, 17, '0_1614233277_news.png', 1, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_categories`
--

CREATE TABLE `nrc_categories` (
  `nrc_categorie_id` int(11) NOT NULL,
  `name` varchar(50) NOT NULL,
  `title` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nrc_categories`
--

INSERT INTO `nrc_categories` (`nrc_categorie_id`, `name`, `title`, `status`, `created_at`) VALUES
(1, 'CAA', 'Citizenship Amedment Act', 1, '2021-02-20 11:53:01'),
(2, 'NPR', 'National Population Registry', 1, '2021-02-20 11:57:04'),
(3, 'NRC', 'National Register of Citizen', 1, '2021-02-20 11:58:28'),
(4, 'Test', 'Hi', 1, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `nrc_news`
--

CREATE TABLE `nrc_news` (
  `nrc_news_id` int(11) NOT NULL,
  `nrc_categorie_id` int(11) NOT NULL,
  `news_title` text NOT NULL,
  `news_description` text NOT NULL,
  `state_id` int(11) NOT NULL,
  `stage` int(11) NOT NULL,
  `sub_stage` int(11) NOT NULL,
  `gencode_percentage` float(8,2) NOT NULL,
  `tags` text NOT NULL,
  `thumb_image` varchar(191) NOT NULL,
  `status` int(11) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nrc_news`
--

INSERT INTO `nrc_news` (`nrc_news_id`, `nrc_categorie_id`, `news_title`, `news_description`, `state_id`, `stage`, `sub_stage`, `gencode_percentage`, `tags`, `thumb_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 0, 1, 0, 50.00, 'NRC, CAC', '1613813869_news.jpg', 3, '2021-02-20 15:07:49', '0000-00-00 00:00:00'),
(2, 0, 'randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p><p><br></p><p>Chayan</p>\n									', 0, 1, 0, 20.00, 'NRC, CAC,Chayan', '1613813971_news.jpg', 3, '2021-02-20 15:09:31', '0000-00-00 00:00:00'),
(3, 3, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 38, 1, 0, 100.00, 'NRC, CAC', '1613817647_news.jpg', 1, '2021-02-20 16:10:47', '0000-00-00 00:00:00'),
(4, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817715_news.jpg', 1, '2021-02-20 16:11:55', '0000-00-00 00:00:00'),
(5, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817802_news.jpg', 1, '2021-02-20 16:13:22', '0000-00-00 00:00:00'),
(6, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817927_news.jpg', 1, '2021-02-20 16:15:27', '0000-00-00 00:00:00'),
(7, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613817959_news.jpg', 1, '2021-02-20 16:15:59', '0000-00-00 00:00:00'),
(8, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613818013_news.jpg', 1, '2021-02-20 16:16:53', '0000-00-00 00:00:00'),
(9, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613818074_news.jpg', 1, '2021-02-20 16:17:54', '0000-00-00 00:00:00'),
(10, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613818148_news.jpg', 1, '2021-02-20 16:19:08', '0000-00-00 00:00:00'),
(11, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613818236_news.jpg', 1, '2021-02-20 16:20:36', '0000-00-00 00:00:00'),
(12, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613818297_news.jpg', 1, '2021-02-20 16:21:37', '0000-00-00 00:00:00'),
(13, 1, 'Randomised words even slightly believable', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 36, 1, 0, 50.00, 'NRC, CAC', '1613818373_news.jpg', 1, '2021-02-20 16:22:53', '0000-00-00 00:00:00'),
(14, 1, 'Randomised words even slightly believable', '\r\n                                        \r\n                                        \r\n                                        \r\n                                        \r\n                                        \r\n                                        \r\n                                        \r\n                                        \r\n                                        \r\n										Hello there,\r\n										<br>\r\n										<p>The toolbar can be customized and it also supports various callbacks such as\r\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\r\n											more.</p>\r\n										<p>Please try <b>paste some texts</b> here</p><p><br></p><p><br></p>\r\n																																																																																										', 36, 6, 9, 60.00, 'NRC, CAC,Chayan', '1614781511_news.png', 1, '2021-02-20 16:30:09', '2021-03-03 00:00:00'),
(15, 1, 'Test ', '<font color=\"#e83e8c\" face=\"SFMono-Regular, Menlo, Monaco, Consolas, Liberation Mono, Courier New, monospace\"><span style=\"caret-color: rgb(232, 62, 140); font-size: 12.25px; -webkit-text-size-adjust: 100%;\">Hi&nbsp;</span></font>', 50, 1, 1, 90.00, 'Test ', '1613843815_news.jpeg', 0, NULL, '0000-00-00 00:00:00'),
(16, 1, 'test', '\r\n                                        										Hello there,\r\n										<br>\r\n										<p>The toolbar can be customized and it also supports various callbacks such as\r\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\r\n											more.</p>', 36, 5, 1, 95.00, 'NRC, CAC', '1614781785_news.png', 1, '2021-03-03 00:00:00', '0000-00-00 00:00:00'),
(17, 2, 'test 888', '\r\n                                        										Hello there,\r\n										<br>\r\n										<p>The toolbar can be customized and it also supports various callbacks such as\r\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\r\n											more.</p>\r\n										<p>Please try <b>paste some texts</b> here</p>\r\n                                        									', 0, 1, 1, 0.00, 'NRC, CAC', '1615456334_news.png', 1, '2021-03-11 00:00:00', '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `nrc_news_images`
--

CREATE TABLE `nrc_news_images` (
  `nrc_news_image_id` int(11) NOT NULL,
  `nrc_news_id` int(11) NOT NULL,
  `news_image` varchar(100) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime DEFAULT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `nrc_news_images`
--

INSERT INTO `nrc_news_images` (`nrc_news_image_id`, `nrc_news_id`, `news_image`, `status`, `created_at`, `updated_at`) VALUES
(1, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(2, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(3, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(4, 14, '0_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(5, 14, '1_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(6, 14, '2_1613818809_news.jpg', 1, '2021-02-20 16:30:09', '0000-00-00 00:00:00'),
(7, 15, '0_1613843815_news.jpeg', 1, NULL, '0000-00-00 00:00:00'),
(8, 16, '0_1614781785_news.png', 1, NULL, '0000-00-00 00:00:00'),
(9, 16, '0_1614781785_news.png', 1, NULL, '0000-00-00 00:00:00'),
(10, 16, '1_1614781785_news.png', 1, NULL, '0000-00-00 00:00:00'),
(11, 17, '0_1615456334_news.png', 1, NULL, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `site_settings`
--

CREATE TABLE `site_settings` (
  `id` int(11) NOT NULL,
  `name` varchar(100) DEFAULT NULL,
  `email` varchar(50) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `address` varchar(255) DEFAULT NULL,
  `image` varchar(200) NOT NULL,
  `status` int(11) NOT NULL,
  `secret_key` varchar(255) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `site_settings`
--

INSERT INTO `site_settings` (`id`, `name`, `email`, `phone`, `address`, `image`, `status`, `secret_key`, `created_at`, `updated_at`) VALUES
(1, 'dreamyden', 'info@dreamyden.com', '99999999999', 'Bartlesville, OK 74006, USA', '1563892734-bedsure-sherpa-fleece-blanket-1563892702.jpg', 1, NULL, '2020-09-24 13:21:29', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `states`
--

CREATE TABLE `states` (
  `state_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_name` varchar(50) NOT NULL,
  `tooltip` text,
  `status` int(11) NOT NULL DEFAULT '1'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `states`
--

INSERT INTO `states` (`state_id`, `country_id`, `state_name`, `tooltip`, `status`) VALUES
(36, 1, 'ANDHRA PRADESH', NULL, 1),
(37, 1, 'ASSAM', 'Assam', 1),
(38, 1, 'ARUNACHAL PRADESH', NULL, 1),
(39, 1, 'GUJRAT', NULL, 1),
(40, 1, 'BIHAR', NULL, 1),
(41, 1, 'HARYANA', NULL, 1),
(42, 1, 'HIMACHAL PRADESH', NULL, 1),
(43, 1, 'JAMMU & KASHMIR', 'j & k', 1),
(44, 1, 'KARNATAKA', NULL, 1),
(45, 1, 'KERALA', NULL, 1),
(46, 1, 'MADHYA PRADESH', NULL, 1),
(47, 1, 'MAHARASHTRA', NULL, 1),
(48, 1, 'MANIPUR', NULL, 1),
(49, 1, 'MEGHALAYA', NULL, 1),
(50, 1, 'MIZORAM', NULL, 1),
(51, 1, 'NAGALAND', NULL, 1),
(52, 1, 'ORISSA', NULL, 1),
(53, 1, 'PUNJAB', NULL, 1),
(54, 1, 'RAJASTHAN', NULL, 1),
(55, 1, 'SIKKIM', NULL, 1),
(56, 1, 'TAMIL NADU', NULL, 1),
(57, 1, 'TRIPURA', NULL, 1),
(58, 1, 'UTTAR PRADESH', NULL, 1),
(59, 1, 'WEST BENGAL', 'test west', 1),
(60, 1, 'DELHI', NULL, 1),
(61, 1, 'GOA', NULL, 1),
(62, 1, 'PONDICHERY', NULL, 1),
(63, 1, 'LAKSHDWEEP', NULL, 1),
(64, 1, 'DAMAN & DIU', NULL, 1),
(65, 1, 'DADRA & NAGAR', 'DADRA & NAGAR', 1),
(66, 1, 'CHANDIGARH', NULL, 1),
(67, 1, 'ANDAMAN & NICOBAR', 'testt', 1),
(68, 1, 'UTTARANCHAL', NULL, 1),
(69, 1, 'JHARKHAND', NULL, 1),
(70, 1, 'CHATTISGARH', NULL, 1),
(71, 1, 'UTTARAKHAND', NULL, 1),
(72, 1, 'TELANGANA', NULL, 1),
(73, 1, 'LADAKH', NULL, 1);

-- --------------------------------------------------------

--
-- Table structure for table `subscribe_list`
--

CREATE TABLE `subscribe_list` (
  `id` int(11) NOT NULL,
  `email` varchar(300) NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `subscribe_list`
--

INSERT INTO `subscribe_list` (`id`, `email`, `status`, `created`) VALUES
(1, 'test@hotmail.com', 1, '02/02/2021 14:25:09'),
(2, 'khasim@gmail.com', 1, '19/02/2021 20:23:18'),
(5, 'test@test.com', 1, '2021-02-26'),
(6, 'khas5@gmail.com', 1, '2021-02-26'),
(7, 'testabcd@gmail.com', 1, '2021-02-26');

-- --------------------------------------------------------

--
-- Table structure for table `timelines`
--

CREATE TABLE `timelines` (
  `timeline_id` int(11) NOT NULL,
  `timeline_year` varchar(10) NOT NULL,
  `timeline_title` text NOT NULL,
  `timeline_sub_title` text,
  `timeline_description` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `timelines`
--

INSERT INTO `timelines` (`timeline_id`, `timeline_year`, `timeline_title`, `timeline_sub_title`, `timeline_description`, `status`, `created_at`, `updated_at`) VALUES
(1, '2020', 'Demo test', 'Demo test', '<span style=\"background-color: rgb(0, 255, 0);\">Aranya Sasmal</span>', 1, '2021-02-21 11:48:24', '2021-02-21 12:18:41'),
(2, '2021', 'Demo', 'Demo', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', 1, '2021-02-21 11:49:37', '2021-02-21 12:17:20'),
(3, '2019', '2019 Session timeline based on CAC', '2019 Session timeline based on CAC', '<span style=\"background-color: rgb(255, 255, 0);\">2019 Session timeline based on CAC</span><br>\n									', 1, '2021-02-23 20:32:43', NULL);

-- --------------------------------------------------------

--
-- Table structure for table `todos`
--

CREATE TABLE `todos` (
  `todo_id` int(11) NOT NULL,
  `content` text NOT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `todos`
--

INSERT INTO `todos` (`todo_id`, `content`, `status`, `created_at`) VALUES
(1, 'Test', 0, '0000-00-00 00:00:00'),
(2, 'Genocide', 0, '0000-00-00 00:00:00'),
(3, 'This is my todays task', 1, '0000-00-00 00:00:00'),
(4, 'New Task to me on 07-03-2021', 0, '0000-00-00 00:00:00'),
(5, 'test task', 1, '0000-00-00 00:00:00');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `user_id` int(11) NOT NULL,
  `role_id` int(11) NOT NULL COMMENT '0-admin,1-customer,2-vendor,3-devivery_boy',
  `fname` varchar(100) NOT NULL,
  `lname` varchar(50) NOT NULL,
  `mobile` varchar(20) NOT NULL,
  `email` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `profile_image` varchar(100) DEFAULT NULL,
  `device_id` varchar(255) NOT NULL,
  `_token` varchar(255) DEFAULT NULL,
  `presence_status` tinyint(4) DEFAULT '0',
  `membership_status` tinyint(4) NOT NULL DEFAULT '0' COMMENT '0-false, 1-true',
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`user_id`, `role_id`, `fname`, `lname`, `mobile`, `email`, `password`, `address`, `profile_image`, `device_id`, `_token`, `presence_status`, `membership_status`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 'Super Admin', 'Admin', '9898989898', 'admin@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Manama', 'login_icon.png', '', NULL, NULL, 0, 1, '2020-09-21 17:35:10', '2021-03-06 09:30:02'),
(2, 2, 'Vendor', '1', '8927279789', 'vendor1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Manama', NULL, '123456', NULL, NULL, 0, 1, '2020-09-23 12:09:28', NULL),
(4, 2, 'Vendor', '1', '8927279789', 'vendor1@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Manama', NULL, '', NULL, NULL, 0, 3, '2020-09-23 12:10:23', NULL),
(6, 2, 'Vendor', 'One', '8927279779', 'vendor123@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Manama', NULL, '', NULL, NULL, 0, 1, '2020-09-23 12:27:26', NULL),
(7, 2, 'Jon', 'David', '9876543212', 'jon@gmail.com', '8dcf7ac56dddf916d84dae704a7c9f6b', 'Manama', NULL, '', NULL, NULL, 0, 1, '2020-09-23 13:30:01', NULL),
(8, 0, 'Super Admin', 'Admin', '9898989898', 'bravomediawll@gmail.com', 'e10adc3949ba59abbe56e057f20f883e', 'Manama', 'login_icon.png', '', NULL, NULL, 0, 1, '2020-09-21 17:35:10', '2021-03-06 09:30:02');

-- --------------------------------------------------------

--
-- Table structure for table `videos`
--

CREATE TABLE `videos` (
  `video_id` int(11) NOT NULL,
  `country_id` int(11) NOT NULL,
  `state_id` int(11) NOT NULL,
  `title` text NOT NULL,
  `description` text NOT NULL,
  `tags` text,
  `thumb_image` varchar(191) DEFAULT NULL,
  `video` varchar(191) DEFAULT NULL,
  `videos` varchar(191) DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT '1',
  `created_at` datetime NOT NULL,
  `updated_at` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `videos`
--

INSERT INTO `videos` (`video_id`, `country_id`, `state_id`, `title`, `description`, `tags`, `thumb_image`, `video`, `videos`, `status`, `created_at`, `updated_at`) VALUES
(1, 0, 0, 'Demo test', '<span style=\"background-color: rgb(0, 255, 0);\">Aranya Sasmal</span>', NULL, NULL, NULL, NULL, 1, '2021-02-21 11:48:24', '2021-02-21 12:18:41'),
(2, 0, 0, 'Demo', '\n										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n									', NULL, NULL, NULL, NULL, 1, '2021-02-21 11:49:37', '2021-02-21 12:17:20'),
(3, 0, 0, '2019 Session timeline based on CAC', '<span style=\"background-color: rgb(255, 255, 0);\">2019 Session timeline based on CAC</span><br>\n									', NULL, NULL, NULL, NULL, 1, '2021-02-23 20:32:43', NULL),
(4, 0, 0, 'Test', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p><p><font color=\"#ffd663\">Demo</font></p>\n                                        									', 'NRC, CAC,Test', '1614192543_news.jpg', NULL, NULL, 1, '2021-02-24 00:00:00', NULL),
(5, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Plea<span style=\"background-color: rgb(255, 0, 0);\">se try <b>paste some texts</b> here</span></p>\n                                        									', 'NRC, CAC', '1614192765_news.jpg', NULL, NULL, 1, '2021-02-24 00:00:00', NULL),
(6, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p><font color=\"#ff0000\">Please try <b>paste some texts</b> here</font></p>\n                                        									', 'NRC, CAC', '1614192852_news.jpg', NULL, NULL, 1, '2021-02-24 00:00:00', NULL),
(7, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p><font color=\"#ff0000\">Please try <b>paste some texts</b> here</font></p>\n                                        									', NULL, '1614192910_news.jpg', NULL, NULL, 1, '2021-02-24 00:00:00', NULL),
(8, 0, 0, 'Student Portal Closed(Primary School)', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p><font color=\"#ff0000\">Please try <b>paste some texts</b> here</font></p>\n                                        									', NULL, '1614192941_news.jpg', NULL, NULL, 1, '2021-02-24 00:00:00', NULL),
(9, 0, 0, 'Term & conditions', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Please try <b>paste some texts</b> here</p>\n                                        									', NULL, '1614193024_news.jpg', NULL, NULL, 1, '2021-02-24 00:00:00', NULL),
(10, 0, 0, 'Term & conditions', '\n Hello there,\n\r\n\n\r\nThe toolbar can be customized and it also supports various callbacks such as\n oninit, onfocus, onpaste and many\n more.\r\n\r\n\n\r\nPlease try paste some texts here\r\n\r\n\n ', NULL, '1614193024_news.jpg', NULL, NULL, 1, '2021-02-24 00:00:00', NULL),
(11, 1, 59, 'Demo Video', '\n                                        										Hello there,\n										<br>\n										<p>The toolbar can be customized and it also supports various callbacks such as\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\n											more.</p>\n										<p>Demo Video<br></p>\n                                        									', NULL, '1614275129_news.jpg', '1614275129_video.mp4', NULL, 1, '2021-02-25 00:00:00', NULL),
(12, 1, 37, 'Test Video', '<span style=\"background-color: rgb(255, 0, 0);\">Test Video</span><br>\n                                        									', NULL, '1614275204_news.jpg', '1614275204_video.mp4', NULL, 1, '2021-02-25 00:00:00', NULL),
(13, 1, 61, 'testss', '\r\n                                        										Hello there,\r\n										<br>\r\n										<p>The toolbar can be customized and it also supports various callbacks such as\r\n											<code>oninit</code>, <code>onfocus</code>, <code>onpaste</code> and many\r\n											more.</p>\r\n										<p>Please try <b>paste some texts</b> here</p>\r\n                                        									', NULL, '1614526028_news.png', '1614526028_video.mp4', NULL, 1, '2021-02-28 00:00:00', NULL);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `articles`
--
ALTER TABLE `articles`
  ADD PRIMARY KEY (`article_id`);

--
-- Indexes for table `article_images`
--
ALTER TABLE `article_images`
  ADD PRIMARY KEY (`article_image_id`);

--
-- Indexes for table `cms`
--
ALTER TABLE `cms`
  ADD PRIMARY KEY (`cms_id`);

--
-- Indexes for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  ADD PRIMARY KEY (`gallery_category_id`);

--
-- Indexes for table `gallery_master`
--
ALTER TABLE `gallery_master`
  ADD PRIMARY KEY (`gallery_id`);

--
-- Indexes for table `general_news`
--
ALTER TABLE `general_news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `genocide_categories`
--
ALTER TABLE `genocide_categories`
  ADD PRIMARY KEY (`genocide_categorie_id`);

--
-- Indexes for table `genocide_news`
--
ALTER TABLE `genocide_news`
  ADD PRIMARY KEY (`genocide_news_id`);

--
-- Indexes for table `genocide_news_images`
--
ALTER TABLE `genocide_news_images`
  ADD PRIMARY KEY (`genocide_news_image_id`);

--
-- Indexes for table `genocide_scale`
--
ALTER TABLE `genocide_scale`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `hate_categories`
--
ALTER TABLE `hate_categories`
  ADD PRIMARY KEY (`hate_categorie_id`);

--
-- Indexes for table `hate_news`
--
ALTER TABLE `hate_news`
  ADD PRIMARY KEY (`hate_news_id`);

--
-- Indexes for table `hate_news_images`
--
ALTER TABLE `hate_news_images`
  ADD PRIMARY KEY (`hate_news_image_id`);

--
-- Indexes for table `legal_categories`
--
ALTER TABLE `legal_categories`
  ADD PRIMARY KEY (`legal_categorie_id`);

--
-- Indexes for table `legal_news`
--
ALTER TABLE `legal_news`
  ADD PRIMARY KEY (`legal_news_id`);

--
-- Indexes for table `legal_news_images`
--
ALTER TABLE `legal_news_images`
  ADD PRIMARY KEY (`legal_news_image_id`);

--
-- Indexes for table `news`
--
ALTER TABLE `news`
  ADD PRIMARY KEY (`news_id`);

--
-- Indexes for table `news_images`
--
ALTER TABLE `news_images`
  ADD PRIMARY KEY (`news_image_id`);

--
-- Indexes for table `nrc_categories`
--
ALTER TABLE `nrc_categories`
  ADD PRIMARY KEY (`nrc_categorie_id`);

--
-- Indexes for table `nrc_news`
--
ALTER TABLE `nrc_news`
  ADD PRIMARY KEY (`nrc_news_id`);

--
-- Indexes for table `nrc_news_images`
--
ALTER TABLE `nrc_news_images`
  ADD PRIMARY KEY (`nrc_news_image_id`);

--
-- Indexes for table `states`
--
ALTER TABLE `states`
  ADD PRIMARY KEY (`state_id`);

--
-- Indexes for table `subscribe_list`
--
ALTER TABLE `subscribe_list`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `timelines`
--
ALTER TABLE `timelines`
  ADD PRIMARY KEY (`timeline_id`);

--
-- Indexes for table `todos`
--
ALTER TABLE `todos`
  ADD PRIMARY KEY (`todo_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`user_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `videos`
--
ALTER TABLE `videos`
  ADD PRIMARY KEY (`video_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `articles`
--
ALTER TABLE `articles`
  MODIFY `article_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `article_images`
--
ALTER TABLE `article_images`
  MODIFY `article_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `cms`
--
ALTER TABLE `cms`
  MODIFY `cms_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gallery_categories`
--
ALTER TABLE `gallery_categories`
  MODIFY `gallery_category_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `gallery_master`
--
ALTER TABLE `gallery_master`
  MODIFY `gallery_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `general_news`
--
ALTER TABLE `general_news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `genocide_categories`
--
ALTER TABLE `genocide_categories`
  MODIFY `genocide_categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `genocide_news`
--
ALTER TABLE `genocide_news`
  MODIFY `genocide_news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `genocide_news_images`
--
ALTER TABLE `genocide_news_images`
  MODIFY `genocide_news_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `genocide_scale`
--
ALTER TABLE `genocide_scale`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `hate_categories`
--
ALTER TABLE `hate_categories`
  MODIFY `hate_categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `hate_news`
--
ALTER TABLE `hate_news`
  MODIFY `hate_news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `hate_news_images`
--
ALTER TABLE `hate_news_images`
  MODIFY `hate_news_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `legal_categories`
--
ALTER TABLE `legal_categories`
  MODIFY `legal_categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `legal_news`
--
ALTER TABLE `legal_news`
  MODIFY `legal_news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `legal_news_images`
--
ALTER TABLE `legal_news_images`
  MODIFY `legal_news_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `news`
--
ALTER TABLE `news`
  MODIFY `news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `news_images`
--
ALTER TABLE `news_images`
  MODIFY `news_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `nrc_categories`
--
ALTER TABLE `nrc_categories`
  MODIFY `nrc_categorie_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nrc_news`
--
ALTER TABLE `nrc_news`
  MODIFY `nrc_news_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT for table `nrc_news_images`
--
ALTER TABLE `nrc_news_images`
  MODIFY `nrc_news_image_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `states`
--
ALTER TABLE `states`
  MODIFY `state_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=74;

--
-- AUTO_INCREMENT for table `subscribe_list`
--
ALTER TABLE `subscribe_list`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `timelines`
--
ALTER TABLE `timelines`
  MODIFY `timeline_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `todos`
--
ALTER TABLE `todos`
  MODIFY `todo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `videos`
--
ALTER TABLE `videos`
  MODIFY `video_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
