-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2011 at 11:40 AM
-- Server version: 5.1.50
-- PHP Version: 5.3.8-ZS5.5.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `webteam`
--

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `RecordID` int(15) NOT NULL AUTO_INCREMENT,
  `LogMessage` text NOT NULL,
  `UserName` text NOT NULL,
  `VideoID` int(50) NOT NULL,
  `LogTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`RecordID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=129 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`RecordID`, `LogMessage`, `UserName`, `VideoID`, `LogTime`) VALUES
(28, 'log message test', 'admin1', 2, '2011-12-04 01:48:37'),
(29, 'log message test', 'admin2', 9, '2011-12-04 08:50:35'),
(30, 'log message test', 'admin2', 4, '2011-12-04 08:50:45'),
(31, 'log message test', 'user10', 1, '2011-12-04 10:13:12'),
(32, 'log message test', 'user10', 3, '2011-12-04 10:13:21'),
(33, 'log message test', 'admin1', 3, '2011-12-04 10:56:38'),
(34, 'log message test', 'admin1', 10, '2011-12-04 10:56:42'),
(35, 'log message test', 'admin1', 12, '2011-12-04 11:49:58'),
(36, 'log message test', 'user7', 10, '2011-12-05 03:07:34'),
(37, 'log message test', 'user7', 2, '2011-12-05 03:07:53'),
(38, 'log message test', 'user7', 14, '2011-12-05 03:07:58'),
(39, 'log message test', 'user7', 13, '2011-12-05 03:08:03'),
(40, 'log message test', 'user7', 11, '2011-12-05 03:08:11'),
(41, 'log message test', 'user7', 2, '2011-12-05 03:08:32'),
(42, 'log message test', 'user7', 1, '2011-12-05 03:08:53'),
(43, 'log message test', 'admin1', 11, '2011-12-05 18:06:14'),
(44, 'log message test', 'admin1', 13, '2011-12-05 18:06:19'),
(45, 'log message test', 'admin1', 10, '2011-12-05 18:06:24'),
(46, 'log message test', 'admin1', 8, '2011-12-05 18:06:36'),
(47, 'log message test', 'admin1', 10, '2011-12-05 18:07:05'),
(48, 'log message test', 'admin1', 1, '2011-12-05 20:07:08'),
(49, 'log message test', 'admin1', 10, '2011-12-05 20:07:14'),
(50, 'log message test', 'admin1', 13355, '2011-12-05 20:33:02'),
(51, 'log message test', 'admin1', 13, '2011-12-05 20:33:10'),
(52, 'log message test', 'admin1', 5, '2011-12-05 20:38:11'),
(53, 'log message test', 'admin1', 8, '2011-12-05 20:42:27'),
(54, 'log message test', 'admin1', 10, '2011-12-05 20:42:37'),
(55, 'log message test', 'admin1', 11, '2011-12-05 20:42:53'),
(56, 'log message test', 'admin1', 12, '2011-12-05 20:43:00'),
(57, 'log message test', 'admin1', 13, '2011-12-05 20:43:08'),
(58, 'log message test', 'admin1', 14, '2011-12-05 20:43:15'),
(59, 'log message test', 'admin1', 7, '2011-12-05 20:43:35'),
(60, 'log message test', 'admin1', 10, '2011-12-05 20:43:42'),
(61, 'log message test', 'admin1', 10, '2011-12-05 20:52:18'),
(62, 'log message test', 'user7', 10, '2011-12-05 20:52:57'),
(63, 'log message test', 'user7', 12, '2011-12-05 20:53:41'),
(64, 'log message test', 'admin1', 8, '2011-12-06 15:02:31'),
(65, 'log message test', 'admin1', 1, '2011-12-06 15:36:39'),
(66, 'log message test', 'admin1', 8, '2011-12-06 15:36:56'),
(67, 'log message test', 'admin1', 8, '2011-12-06 15:39:30'),
(68, 'log message test', 'admin1', 8, '2011-12-06 15:39:57'),
(69, 'log message test', 'admin1', 8, '2011-12-06 15:40:21'),
(70, 'log message test', 'admin1', 8, '2011-12-06 15:40:39'),
(71, 'log message test', 'admin1', 8, '2011-12-06 15:41:15'),
(72, 'log message test', 'admin1', 8, '2011-12-06 15:41:39'),
(73, 'log message test', 'admin1', 8, '2011-12-06 15:41:54'),
(74, 'log message test', 'admin1', 8, '2011-12-06 15:42:05'),
(75, 'log message test', 'admin1', 8, '2011-12-06 15:42:13'),
(76, 'log message test', 'admin1', 11, '2011-12-06 15:42:59'),
(77, 'user trace', 'admin1', 445, '2011-12-06 21:48:32'),
(78, 'user trace', 'admin1', 5, '2011-12-06 21:54:51'),
(79, 'user trace', 'admin1', 12211, '2011-12-06 22:37:42'),
(80, 'user trace', 'admin1', 10, '2011-12-07 01:03:44'),
(81, 'user trace', 'admin1', 8, '2011-12-07 03:10:36'),
(82, 'user trace', 'admin1', 8, '2011-12-07 03:10:39'),
(83, 'user trace', 'admin1', 8, '2011-12-07 03:10:42'),
(84, 'user trace', 'admin1', 8, '2011-12-07 03:10:44'),
(85, 'user trace', 'admin1', 8, '2011-12-07 03:10:47'),
(86, 'user trace', 'admin1', 8, '2011-12-07 03:10:49'),
(87, 'user trace', 'admin1', 8, '2011-12-07 03:10:51'),
(88, 'user trace', 'admin1', 8, '2011-12-07 03:10:53'),
(89, 'user trace', 'admin1', 8, '2011-12-07 03:10:55'),
(90, 'user trace', 'admin1', 8, '2011-12-07 03:10:57'),
(91, 'user trace', 'admin1', 8, '2011-12-07 03:11:00'),
(92, 'user trace', 'admin1', 8, '2011-12-07 03:11:02'),
(93, 'user trace', 'admin1', 8, '2011-12-07 03:11:04'),
(94, 'user trace', 'admin1', 10, '2011-12-09 18:02:06'),
(95, 'user trace', 'admin1', 1, '2011-12-09 18:14:03'),
(96, 'user trace', 'admin1', 1, '2011-12-09 22:44:22'),
(97, 'user trace', 'admin1', 1, '2011-12-09 22:44:28'),
(98, 'user trace', 'admin1', 2, '2011-12-09 22:44:35'),
(99, 'user trace', 'admin1', 3, '2011-12-09 22:44:42'),
(100, 'user trace', 'admin1', 4, '2011-12-09 22:44:46'),
(101, 'user trace', 'admin1', 8, '2011-12-09 22:44:54'),
(102, 'user trace', 'admin1', 11, '2011-12-09 22:45:04'),
(103, 'user trace', 'admin1', 8, '2011-12-09 22:45:21'),
(104, 'user trace', 'admin1', 11, '2011-12-09 22:45:27'),
(105, 'user trace', 'user9', 5, '2011-12-09 23:21:02'),
(106, 'user trace', 'user9', 2, '2011-12-09 23:27:44'),
(107, 'user trace', 'abdulhamidalsalman', 445, '2011-12-10 08:47:05'),
(108, 'user trace', 'abdulhamidalsalman', 12, '2011-12-10 08:47:32'),
(109, 'user trace', 'Shashi', 1, '2011-12-10 09:04:02'),
(110, 'user trace', 'Shashi', 3, '2011-12-10 09:04:07'),
(111, 'user trace', 'Shashi', 8, '2011-12-10 09:04:11'),
(112, 'user trace', 'Shashi', 4, '2011-12-10 09:04:53'),
(113, 'user trace', 'admin1', 1, '2011-12-10 10:02:07'),
(114, 'user trace', 'admin1', 1, '2011-12-10 10:02:25'),
(115, 'user trace', 'admin1', 1, '2011-12-10 10:02:35'),
(116, 'user trace', 'admin1', 5, '2011-12-10 10:05:24'),
(117, 'user trace', 'admin1', 1, '2011-12-10 10:34:32'),
(118, 'user trace', 'admin1', 1, '2011-12-10 10:35:02'),
(119, 'user trace', 'admin1', 1, '2011-12-10 10:35:25'),
(120, 'user trace', 'admin1', 1, '2011-12-10 10:36:31'),
(121, 'user trace', 'admin1', 1, '2011-12-10 10:37:45'),
(122, 'user trace', 'admin1', 1, '2011-12-10 10:38:15'),
(123, 'user trace', 'admin1', 1, '2011-12-10 10:38:49'),
(124, 'user trace', 'admin1', 2, '2011-12-10 10:39:07'),
(125, 'user trace', 'admin1', 3, '2011-12-10 10:39:22'),
(126, 'user trace', 'admin1', 1, '2011-12-10 10:40:23'),
(127, 'user trace', 'admin1', 2, '2011-12-10 10:40:29'),
(128, 'user trace', 'user9', 3, '2011-12-10 10:41:15');

-- --------------------------------------------------------

--
-- Table structure for table `session`
--

CREATE TABLE IF NOT EXISTS `session` (
  `SessionID` varchar(255) NOT NULL,
  `UserName` text NOT NULL,
  `DateCreated` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`SessionID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `session`
--

INSERT INTO `session` (`SessionID`, `UserName`, `DateCreated`) VALUES
('4edbcc428d115', 'admin1', '2011-12-04 14:38:42'),
('4edbcd1fc5f0a', 'admin1', '2011-12-04 14:42:23'),
('4edbcd695daab', 'admin1', '2011-12-04 14:43:37'),
('4edbce294ece2', 'admin1', '2011-12-04 14:46:49'),
('4edbd59db6607', 'admin1', '2011-12-04 15:18:37'),
('4edbd5a11c203', 'admin1', '2011-12-04 15:18:41'),
('4edbd5c49ddbc', 'admin1', '2011-12-04 15:19:16'),
('4ee29c5887982', 'admin1', '2011-12-09 18:40:08'),
('4ee380639b695', 'admin1', '2011-12-10 10:53:07'),
('4ee380ce0c6ed', 'admin1', '2011-12-10 10:54:54');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(15) NOT NULL AUTO_INCREMENT,
  `FirstName` text,
  `LastName` text,
  `Email` text,
  `UserName` text NOT NULL,
  `Password` text NOT NULL,
  `Role` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4003 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `FirstName`, `LastName`, `Email`, `UserName`, `Password`, `Role`) VALUES
(8, 'firstname8', 'lastname8', 'email8', 'user8', 'pass8', 'user'),
(9, 'firstname', 'lastname', 'email@hotmail.com', 'user9', '123', 'user'),
(10, 'Sam', 'Windows', 'e55mail@hotmail.com', 'user10', '1234', 'user'),
(101, 'Ivannp', 'Wonggp', 'ivanp@gmail.com', 'admin1', 'pass1', 'admin'),
(104, 'adminFirstName', 'adminLastName', 'adminemail@hotmail.com', 'admin4', 'pass4', 'admin'),
(3000, 'Michigan', 'Dearborn', 'otherteams@umich.edu', 'streamclient', 'pass@word1', 'user'),
(4000, 'Michigan', 'Dearborn', 'otherteams@umich.edu', 'streamserver', 'pass@word1', 'user'),
(4001, 'abdulhjamid', 'alsulaiman', 'ddd@hotmail.com', 'abdulhamidalsalman', '123', 'user'),
(4002, 'Shashis', 'Shekhars', 'shashis@hotmail.com', 'Shashi', '12345', 'user');

-- --------------------------------------------------------

--
-- Table structure for table `video`
--

CREATE TABLE IF NOT EXISTS `video` (
  `VideoID` int(11) NOT NULL AUTO_INCREMENT,
  `StreamID` varchar(255) DEFAULT NULL,
  `UserID` int(50) DEFAULT NULL,
  `VideoType` text,
  `Title` text,
  `Description` text,
  `UserName` text,
  `ImageURL` text,
  `VideoPath` text,
  `VideoFileName` text,
  `UploadDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  PRIMARY KEY (`VideoID`),
  KEY `id` (`UserID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234237 ;

--
-- Dumping data for table `video`
--

INSERT INTO `video` (`VideoID`, `StreamID`, `UserID`, `VideoType`, `Title`, `Description`, `UserName`, `ImageURL`, `VideoPath`, `VideoFileName`, `UploadDate`) VALUES
(1, '{16E85E58-3C2D-45FF-B69A-8DFDA76AA239}', 10, 'live', 'CDex', 'CDex is a CD-Ripper, extracting digital audio data from an Audio CD. The application supports many Audio encoders, like MPEG (MP2,MP3), VQF, AAC encoders and dividers heelloe3333.ll', 'user10', '/media/img-1.jpg', '/media', 'video-1.flv', '0000-00-00 00:00:00'),
(2, 'stream1', 10, 'live', 'AC3Filter', 'It is DirectShow AC3 Decoder filter used to palyback AVI files with AC3 sound tracks and DVDs. Multichannel and S/PDIF support. Focused at flexible controls during playback: gains, mixer, stream information, levels and other.', 'user10', '/media/img-2.jpg', '/media', 'video-2.flv', '0000-00-00 00:00:00'),
(3, 'stream1', 10, 'live', 'Inkscape', 'Inkscape has now pages support. You can create a multiple page document using Inkscape, just like in Corel Draw. Install this extension, restart Inkscape and you''re done. Insert new pages, navigate through pages, print all pages in a single PDF. ', 'user10', '/media/img-3.jpg', '/media', 'video-3.flv', '0000-00-00 00:00:00'),
(4, 'stream1', 10, 'live', 'BioTux', 'BioTux is a 2D platformer in it''s early stages of development, being written as a clone of SuperTux and the New Super Mario Bros. It uses the Clanlib libraries and will always be free and Open Source. Developers are needed. See http:/biotuxdev.org. ', 'user10', '/media/img-4.jpg', '/media', 'video-4.flv', '0000-00-00 00:00:00'),
(5, 'stream1', 10, 'live', 'FileZilla', 'FileZilla is a cross-platform graphical FTP, FTPS and SFTP client a lot of features, supporting Windows, Linux, Mac OS X and more. FileZilla Server is a reliable FTP server for Windows. ', 'user10', '/media/img-5.jpg', '/media', 'video-5.flv', '0000-00-00 00:00:00'),
(7, 'stream1', 9, 'live', 'Celestia', 'Celestia is an application for real-time 3D visualization of space, with a detailed model of the solar system, over 100,000 stars, more than 10,000 galaxies, and an extension mechanism for adding more objects.', 'user9', '/media/img-7.jpg', '/media', 'video-7.flv', '0000-00-00 00:00:00'),
(8, 'stream1', 9, 'not-live', 'Scribus', 'Scribus is an open-source program that brings professional page layout to Linux/Unix, MacOS X, OS/2 and Windows.Scribus supports professional features, such as CMYK color, spot color, separations, ICC color and robust commercial grade PDF. ', 'user9', '/media/img-8.jpg', '/media', 'video-8.flv', '0000-00-00 00:00:00'),
(10, 'stream1', 9, 'not-live', 'TeXnicCenter', 'TeXnicCenter is a LaTeX editor on Windows. Navigating LaTeX documents is simple due to the automatically created document outline. Errors of the LaTeX compilation can be reviewed instantly. TXC features autocompletion and comes with LaTeX templates. ', 'user9', '/media/img-10.jpg', '/media', 'video-10.flv', '0000-00-00 00:00:00'),
(12, 'stream1', 101, 'not-live', 'ClamWin Free Antivirus', 'Free Antivirus for Windows. Includes virus scanner, scheduler, virus database updates, context menu integration to MS Windows Explorer and Addin to MS Outlook. Also features easy setup program. Uses a well respected ClamAV scanning engine. ', 'admin1', '/media/img-12.jpg', '/media', 'video-12.flv', '0000-00-00 00:00:00'),
(234236, '4ee380ce512ec', NULL, NULL, 'title', 'description', 'admin1', NULL, NULL, NULL, '2011-12-10 10:54:54');
