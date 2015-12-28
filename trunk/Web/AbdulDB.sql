-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 04, 2011 at 10:39 PM
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
-- Table structure for table `item`
--

CREATE TABLE IF NOT EXISTS `item` (
  `VideoID` int(11) NOT NULL AUTO_INCREMENT,
  `StreamID` varchar(255) DEFAULT NULL,
  `id` int(50) DEFAULT NULL,
  `VideoType` text,
  `Title` text,
  `Description` text,
  `UserName` text,
  `ImageURL` text,
  `VideoPath` text,
  `VideoFileName` text,
  PRIMARY KEY (`VideoID`),
  KEY `id` (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=13358 ;

--
-- Dumping data for table `item`
--

INSERT INTO `item` (`VideoID`, `StreamID`, `id`, `VideoType`, `Title`, `Description`, `UserName`, `ImageURL`, `VideoPath`, `VideoFileName`) VALUES
(1, '{16E85E58-3C2D-45FF-B69A-8DFDA76AA239}', 10, 'live', 'CDex', 'CDex is a CD-Ripper, extracting digital audio data from an Audio CD. The application supports many Audio encoders, like MPEG (MP2,MP3), VQF, AAC encoders and dividers heelloe.', 'user10', '/media/img-1.jpg', '/media', 'video-1.flv'),
(2, NULL, 10, 'live', 'AC3Filter', 'It is DirectShow AC3 Decoder filter used to palyback AVI files with AC3 sound tracks and DVDs. Multichannel and S/PDIF support. Focused at flexible controls during playback: gains, mixer, stream information, levels and other.', 'user10', '/media/img-2.jpg', '/media', 'video-2.flv'),
(3, NULL, 10, 'live', 'Inkscape', 'Inkscape has now pages support. You can create a multiple page document using Inkscape, just like in Corel Draw. Install this extension, restart Inkscape and you''re done. Insert new pages, navigate through pages, print all pages in a single PDF. ', 'user10', '/media/img-3.jpg', '/media', 'video-3.flv'),
(4, NULL, 10, 'live', 'BioTux', 'BioTux is a 2D platformer in it''s early stages of development, being written as a clone of SuperTux and the New Super Mario Bros. It uses the Clanlib libraries and will always be free and Open Source. Developers are needed. See http:/biotuxdev.org. ', 'user10', '/media/img-4.jpg', '/media', 'video-4.flv'),
(5, NULL, 10, 'live', 'FileZilla', 'FileZilla is a cross-platform graphical FTP, FTPS and SFTP client a lot of features, supporting Windows, Linux, Mac OS X and more. FileZilla Server is a reliable FTP server for Windows. ', 'user10', '/media/img-5.jpg', '/media', 'video-5.flv'),
(7, NULL, 9, 'live', 'Celestia', 'Celestia is an application for real-time 3D visualization of space, with a detailed model of the solar system, over 100,000 stars, more than 10,000 galaxies, and an extension mechanism for adding more objects. ', 'user9', '/media/img-7.jpg', '/media', 'video-7.flv'),
(8, NULL, 9, 'not-live', 'Scribus', 'Scribus is an open-source program that brings professional page layout to Linux/Unix, MacOS X, OS/2 and Windows.Scribus supports professional features, such as CMYK color, spot color, separations, ICC color and robust commercial grade PDF. ', 'user9', '/media/img-8.jpg', '/media', 'video-8.flv'),
(10, NULL, 9, 'not-live', 'TeXnicCenter', 'TeXnicCenter is a LaTeX editor on Windows. Navigating LaTeX documents is simple due to the automatically created document outline. Errors of the LaTeX compilation can be reviewed instantly. TXC features autocompletion and comes with LaTeX templates. ', 'user9', '/media/img-10.jpg', '/media', 'video-10.flv'),
(11, NULL, 9, 'not-live', 'Anti-Spam SMTP', 'The Anti-Spam SMTP Proxy (ASSP) Server project aims to create an open source platform-independent SMTP Proxy server which implements auto-whitelists, Bayesian, Greylisting and multiple filter methods. Click ''Browse all files'' for v 2.0.1 3.2.01! ', 'user9', '/media/img-11.jpg', '/media', 'video-11.flv'),
(12, NULL, 101, 'not-live', 'ClamWin Free Antivirus', 'Free Antivirus for Windows. Includes virus scanner, scheduler, virus database updates, context menu integration to MS Windows Explorer and Addin to MS Outlook. Also features easy setup program. Uses a well respected ClamAV scanning engine. ', 'admin1', '/media/img-12.jpg', '/media', 'video-12.flv'),
(13, NULL, 101, 'not-live', 'Notepad++', 'Notepad++, a source code editor and MS Windows Notepad replacement, has the mission to offer a greener environment. By optimizing its routines, it results in reducing CPU power consumption then reducing the world carbon dioxide emissions. ', 'admin1', '/media/img-13.jpg', '/media', 'video-13.flv'),
(14, NULL, 101, 'not-live', 'ScummVM', 'ScummVM is a cross-platform interpreter for several point-and-click adventure engines. This includes all SCUMM-based adventures by LucasArts, Simon the Sorcerer 1&2 by AdventureSoft, Beneath a Steel Sky and Broken Sword 1&2 by Revolution, and many more. ', 'admin1', '/media/img-14.jpg', '/media', 'video-14.flv'),
(13355, '4edbd59e0f27c', NULL, NULL, 'ti tl, e333', 'descrip333 tion', 'admin1', NULL, NULL, NULL),
(13356, '4edbd5a15d749', NULL, NULL, 'ti tl, e333', 'descrip333 tion', 'admin1', NULL, NULL, NULL),
(13357, '4edbd5c4e061e', NULL, NULL, 'ti tl, e333', 'descrip333 tion', 'admin1', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `log`
--

CREATE TABLE IF NOT EXISTS `log` (
  `RecordID` int(15) NOT NULL AUTO_INCREMENT,
  `LogMessage` text NOT NULL,
  `User` text NOT NULL,
  `Item` text NOT NULL,
  `LogTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`RecordID`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=36 ;

--
-- Dumping data for table `log`
--

INSERT INTO `log` (`RecordID`, `LogMessage`, `User`, `Item`, `LogTime`) VALUES
(28, 'log message test', 'admin1', '2', '2011-12-04 01:48:37'),
(29, 'log message test', 'admin2', '9', '2011-12-04 08:50:35'),
(30, 'log message test', 'admin2', '4', '2011-12-04 08:50:45'),
(31, 'log message test', 'user10', '1', '2011-12-04 10:13:12'),
(32, 'log message test', 'user10', '3', '2011-12-04 10:13:21'),
(33, 'log message test', 'admin1', '3', '2011-12-04 10:56:38'),
(34, 'log message test', 'admin1', '10', '2011-12-04 10:56:42'),
(35, 'log message test', 'admin1', '12', '2011-12-04 11:49:58');

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
('4edbd5c49ddbc', 'admin1', '2011-12-04 15:19:16');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE IF NOT EXISTS `user` (
  `id` int(15) NOT NULL AUTO_INCREMENT,
  `firstname` text,
  `lastname` text,
  `email` text,
  `username` text NOT NULL,
  `password` text NOT NULL,
  `role` varchar(50) NOT NULL DEFAULT 'user',
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4001 ;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `email`, `username`, `password`, `role`) VALUES
(7, 'firstname7', 'lastname7', 'email7', 'user7', 'pass7', 'user'),
(8, 'firstname8', 'lastname8', 'email8', 'user8', 'pass8', 'user'),
(9, 'firstname9', 'lastname9', 'email9', 'user9', 'pass9', 'user'),
(10, 'Sam', 'Windows', 'e55mail@hotmail.com', 'user10', '1234', 'user'),
(101, 'Abdulhamid', 'Alsalman', 'abdulhamid.alsalman@gmail.com', 'admin1', 'pass1', 'admin'),
(102, 'adminFirstName2', 'adminLastName2', 'adminEmail2', 'admin2', 'pass2', 'admin'),
(103, 'adminFirstName3', 'adminLastName3', 'adminEmail3', 'admin3', 'pass3', 'admin'),
(104, 'adminFirstName4', 'adminLastName4', 'adminEmail4', 'admin4', 'pass4', 'admin'),
(105, 'adminFirstName5', 'adminLastName5', 'adminEmail5', 'admin5', 'pass5', 'admin'),
(107, 'abdul', 'alsalman', 'hotmail@hotmail.com', 'abdulhamid', '1234', 'user'),
(108, 'abdul', 'alsalman', 'abdul@hotmail.com', 'abdul', 'abdul', 'user'),
(110, 'abc', 'abc', 'abc@hotmail.com', 'shashi', '123', 'user'),
(111, 'tt', 'tt', 'tt@hotmia.com', 'shashi2', '555', 'user'),
(3000, 'Michigan', 'Dearborn', 'otherteams@umich.edu', 'streamclient', 'pass@word1', 'user'),
(4000, 'Michigan', 'Dearborn', 'otherteams@umich.edu', 'streamserver', 'pass@word1', 'user');

--
-- Constraints for dumped tables
--

--
-- Constraints for table `item`
--
ALTER TABLE `item`
  ADD CONSTRAINT `item_ibfk_1` FOREIGN KEY (`id`) REFERENCES `user` (`id`);
