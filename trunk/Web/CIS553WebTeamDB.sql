-- phpMyAdmin SQL Dump
-- version 3.3.3
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Nov 24, 2011 at 09:26 PM
-- Server version: 5.1.50
-- PHP Version: 5.3.8-ZS5.5.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cis553webteamdb`
--
CREATE DATABASE `cis553webteamdb` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `cis553webteamdb`;

-- --------------------------------------------------------

--
-- Table structure for table `eventtype`
--

DROP TABLE IF EXISTS `eventtype`;
CREATE TABLE IF NOT EXISTS `eventtype` (
  `EventTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`EventTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `eventtype`
--


-- --------------------------------------------------------

--
-- Table structure for table `log`
--

DROP TABLE IF EXISTS `log`;
CREATE TABLE IF NOT EXISTS `log` (
  `EventID` int(11) NOT NULL AUTO_INCREMENT,
  `EventDateTime` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `EventTypeID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `VideoID` int(11) NOT NULL,
  PRIMARY KEY (`EventID`),
  KEY `FK_Log_EventType` (`EventTypeID`),
  KEY `FK_Log_User` (`UserID`),
  KEY `FK_Log_Video` (`VideoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `log`
--


-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `UserID` int(11) NOT NULL AUTO_INCREMENT,
  `UserName` varchar(20) NOT NULL,
  `Password` varchar(120) NOT NULL,
  `First_Name` varchar(30) NOT NULL,
  `Middle_Initial` varchar(1) DEFAULT NULL,
  `Last_Name` varchar(30) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `Location` varchar(50) NOT NULL,
  `CreatedDate` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `UserTypeID` int(11) NOT NULL,
  PRIMARY KEY (`UserID`),
  KEY `FK_User_UserType` (`UserTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `user`
--


-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

DROP TABLE IF EXISTS `usertype`;
CREATE TABLE IF NOT EXISTS `usertype` (
  `UserTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`UserTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `usertype`
--


-- --------------------------------------------------------

--
-- Table structure for table `video`
--

DROP TABLE IF EXISTS `video`;
CREATE TABLE IF NOT EXISTS `video` (
  `VideoID` int(11) NOT NULL AUTO_INCREMENT,
  `StreamID` varchar(36) NOT NULL,
  `Title` varchar(120) NOT NULL,
  `Length` int(11) NOT NULL,
  `Middle_Initial` varchar(1) DEFAULT NULL,
  `Upload_Date` datetime NOT NULL,
  `VideoTypeID` int(11) NOT NULL,
  PRIMARY KEY (`VideoID`),
  KEY `FK_Video_VideoType` (`VideoTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `video`
--


-- --------------------------------------------------------

--
-- Table structure for table `videokeywords`
--

DROP TABLE IF EXISTS `videokeywords`;
CREATE TABLE IF NOT EXISTS `videokeywords` (
  `VideoKeywordsID` int(11) NOT NULL AUTO_INCREMENT,
  `Keyword` varchar(30) NOT NULL,
  `VideoID` int(11) NOT NULL,
  PRIMARY KEY (`VideoKeywordsID`),
  KEY `FK_VideoKeywords_Video` (`VideoID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videokeywords`
--


-- --------------------------------------------------------

--
-- Table structure for table `videotype`
--

DROP TABLE IF EXISTS `videotype`;
CREATE TABLE IF NOT EXISTS `videotype` (
  `VideoTypeID` int(11) NOT NULL AUTO_INCREMENT,
  `Description` varchar(50) NOT NULL,
  PRIMARY KEY (`VideoTypeID`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

--
-- Dumping data for table `videotype`
--


--
-- Constraints for dumped tables
--

--
-- Constraints for table `log`
--
ALTER TABLE `log`
  ADD CONSTRAINT `FK_Log_Video` FOREIGN KEY (`VideoID`) REFERENCES `video` (`VideoID`),
  ADD CONSTRAINT `FK_Log_EventType` FOREIGN KEY (`EventTypeID`) REFERENCES `eventtype` (`EventTypeID`),
  ADD CONSTRAINT `FK_Log_User` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `FK_User_UserType` FOREIGN KEY (`UserTypeID`) REFERENCES `usertype` (`UserTypeID`);

--
-- Constraints for table `video`
--
ALTER TABLE `video`
  ADD CONSTRAINT `FK_Video_VideoType` FOREIGN KEY (`VideoTypeID`) REFERENCES `videotype` (`VideoTypeID`);

--
-- Constraints for table `videokeywords`
--
ALTER TABLE `videokeywords`
  ADD CONSTRAINT `FK_VideoKeywords_Video` FOREIGN KEY (`VideoID`) REFERENCES `video` (`VideoID`);
