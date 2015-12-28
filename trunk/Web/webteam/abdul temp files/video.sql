-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Dec 10, 2011 at 10:42 AM
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
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=234235 ;

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
(12, 'stream1', 101, 'not-live', 'ClamWin Free Antivirus', 'Free Antivirus for Windows. Includes virus scanner, scheduler, virus database updates, context menu integration to MS Windows Explorer and Addin to MS Outlook. Also features easy setup program. Uses a well respected ClamAV scanning engine. ', 'admin1', '/media/img-12.jpg', '/media', 'video-12.flv', '0000-00-00 00:00:00');
