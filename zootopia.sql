-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2018 at 10:37 AM
-- Server version: 10.1.21-MariaDB
-- PHP Version: 5.6.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `zootopia`
--

-- --------------------------------------------------------

--
-- Table structure for table `tblad`
--

CREATE TABLE `tblad` (
  `adID` int(10) UNSIGNED NOT NULL,
  `adTitle` varchar(45) NOT NULL,
  `adDescription` text,
  `location` varchar(200) NOT NULL,
  `petPrice` varchar(50) NOT NULL,
  `priceType` varchar(45) NOT NULL,
  `bookingType` varchar(45) NOT NULL,
  `postAdDT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAdDT` datetime NOT NULL,
  `petID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblad`
--

INSERT INTO `tblad` (`adID`, `adTitle`, `adDescription`, `location`, `petPrice`, `priceType`, `bookingType`, `postAdDT`, `updateAdDT`, `petID`) VALUES
(2, 'jkbh', 'kjlkj', 'test', '$2.34', 'Per Person', 'Private', '2018-05-28 11:00:02', '2018-05-28 11:00:02', 62),
(5, 'asdf', 'sdaasd', 'sdsad', '$9.90', 'Per Person', 'Owner Supervised', '2018-05-28 14:46:51', '2018-05-28 14:46:51', 61);

-- --------------------------------------------------------

--
-- Table structure for table `tbladdress`
--

CREATE TABLE `tbladdress` (
  `addressID` int(10) UNSIGNED NOT NULL,
  `address` varchar(150) DEFAULT NULL,
  `suburb` varchar(100) NOT NULL,
  `postcode` varchar(10) NOT NULL,
  `state` varchar(3) NOT NULL,
  `createDT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDT` datetime NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbladdress`
--

INSERT INTO `tbladdress` (`addressID`, `address`, `suburb`, `postcode`, `state`, `createDT`, `updateDT`, `userID`) VALUES
(8, '', 'Brisbane', '4006', 'QLD', '2018-04-13 22:59:01', '2018-05-28 13:43:45', 8),
(9, '', 'South Bank', '4001', 'ACT', '2018-04-16 16:11:48', '2018-05-25 22:26:12', 9),
(39, NULL, '', '', '', '2018-05-16 17:08:43', '2018-05-16 17:08:43', 39),
(40, NULL, '', '', '', '2018-05-23 00:14:26', '2018-05-23 00:14:26', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tblbookings`
--

CREATE TABLE `tblbookings` (
  `bookingsID` int(10) UNSIGNED NOT NULL,
  `dateBooked` varchar(45) NOT NULL,
  `startTimeBooked` varchar(45) NOT NULL,
  `finishTimeBooked` varchar(45) NOT NULL,
  `priceBooked` varchar(50) NOT NULL,
  `priceType` varchar(50) NOT NULL,
  `petBooked` varchar(45) NOT NULL,
  `isCompleted` varchar(45) NOT NULL,
  `petID` int(10) UNSIGNED NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblbookings`
--

INSERT INTO `tblbookings` (`bookingsID`, `dateBooked`, `startTimeBooked`, `finishTimeBooked`, `priceBooked`, `priceType`, `petBooked`, `isCompleted`, `petID`, `userID`) VALUES
(41, '', '', '', '', 'Hourly', 'Max', '', 60, 8),
(50, '08/05/2018', '08:00 AM', '', '', 'Hourly', 'Max', '', 60, 8),
(51, '31/05/2018', '08:00 AM', '09:00 AM', '$98.76', 'Hourly', 'Max', '', 60, 8),
(52, '24/05/2018', '07:30 AM', '08:00 AM', '$343.45', 'Hourly', 'Angel', '', 40, 8),
(53, '29/05/2018', '08:30 AM', '08:30 AM', '$3.33', 'Hourly', 'Angel', '', 40, 8),
(54, '30/05/2018', '08:00 AM', '09:00 AM', '$12.00', 'Per Person', 'Max', '', 60, 8),
(55, '29/05/2018', '08:30 AM', '09:00 AM', '$3.33', 'Per person', 'Star', '', 61, 8),
(56, '06/06/2018', '09:00 AM', '09:30 AM', '$8.88', 'Per person', 'Sam', '', 62, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblimagespet`
--

CREATE TABLE `tblimagespet` (
  `imagesID` int(10) UNSIGNED NOT NULL,
  `imageURL` varchar(200) NOT NULL,
  `petID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblimagespet`
--

INSERT INTO `tblimagespet` (`imagesID`, `imageURL`, `petID`) VALUES
(12, '../img/border_collie.jpg', 40),
(22, '../img/jap_spitz.jpg', 60),
(23, '../img/horse.jpg', 61),
(24, '../img/lab.jpg', 62),
(25, '../img/test_bookcover.jpg', 63);

-- --------------------------------------------------------

--
-- Table structure for table `tblimagesuser`
--

CREATE TABLE `tblimagesuser` (
  `imagesUserID` int(10) UNSIGNED NOT NULL,
  `imageURL` varchar(500) NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblimagesuser`
--

INSERT INTO `tblimagesuser` (`imagesUserID`, `imageURL`, `userID`) VALUES
(4, '../img/FB_IMG_1512221348275.jpg', 8),
(31, '', 39),
(32, '', 40);

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `loginID` int(10) UNSIGNED NOT NULL,
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `loginUsername` varchar(100) NOT NULL,
  `loginPassword` varchar(100) NOT NULL,
  `createDT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`loginID`, `firstName`, `lastName`, `loginUsername`, `loginPassword`, `createDT`, `updateDT`) VALUES
(8, 'Jessica', 'Yeoh', 'jessica.yeoh@outlook.com', '$2y$10$FokuctNjzCxvEyyWTZzmSOGDdFGJenlMrQxsc9OBxtyhVJXYVsIrC', '2018-04-13 22:59:01', '2018-05-28 13:43:45'),
(9, 'Anne', 'Smith', 'test@email.com', '$2y$10$51qrvgArWLgF8bvZIVdJj.HxHlHwutnzv.BpThkViF6ZoVWdbSvhu', '2018-04-16 16:11:48', '2018-05-25 22:26:12'),
(38, 'test2', 'test2', 'test2@email.com', '$2y$10$w/7M96WL5Wvq04ikqB4VLuBqoL1J3ia7i4VtNDMY2J5mJjVKmQQYC', '2018-05-16 17:08:43', '2018-05-16 17:08:43'),
(39, 'test3', 'test3', 'test3@email.com', '$2y$10$3xLP4dNDcnZFuIn.d7TrG.ABOezRIAenHWOXILalGbjazTRAEsCPK', '2018-05-23 00:14:26', '2018-05-23 00:14:26');

-- --------------------------------------------------------

--
-- Table structure for table `tblpet`
--

CREATE TABLE `tblpet` (
  `petID` int(10) UNSIGNED NOT NULL,
  `petName` varchar(100) NOT NULL,
  `petNickname` varchar(100) DEFAULT NULL,
  `petAnimal` varchar(100) NOT NULL,
  `petBreed` varchar(100) NOT NULL,
  `petAge` varchar(10) NOT NULL,
  `petSize` varchar(50) NOT NULL,
  `createPetDT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updatePetDT` datetime NOT NULL,
  `inactive` int(10) UNSIGNED NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tblpet`
--

INSERT INTO `tblpet` (`petID`, `petName`, `petNickname`, `petAnimal`, `petBreed`, `petAge`, `petSize`, `createPetDT`, `updatePetDT`, `inactive`, `userID`) VALUES
(40, 'Angel', NULL, 'Dog', 'Japanese Spitz', '1', 'Small', '2018-04-29 16:35:40', '2018-05-09 13:19:58', 0, 8),
(44, 'Stealth', NULL, 'Horse', '', '4', 'Large', '2018-05-09 16:44:29', '2018-05-09 16:44:29', 0, 9),
(60, 'Max', NULL, 'German Sheperd', 'Dog', '3', 'Large', '2018-05-14 21:31:32', '2018-05-25 22:39:15', 1, 8),
(61, 'Star', NULL, 'Horse', '', '6', 'Large', '2018-05-24 16:35:25', '2018-05-24 16:35:25', 0, 8),
(62, 'Sam', NULL, 'Dog', 'Labrador', '3', 'Medium', '2018-05-24 16:36:24', '2018-05-24 16:36:24', 0, 8),
(63, 'Test', NULL, 'Test', 'Test', '8', 'Medium', '2018-05-24 16:43:02', '2018-05-24 16:43:02', 0, 8);

-- --------------------------------------------------------

--
-- Table structure for table `tblreviews`
--

CREATE TABLE `tblreviews` (
  `reviewsID` int(10) UNSIGNED NOT NULL,
  `reviewComment` varchar(200) NOT NULL,
  `postDT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `userID` int(10) UNSIGNED NOT NULL,
  `petID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbluser`
--

CREATE TABLE `tbluser` (
  `userID` int(10) UNSIGNED NOT NULL,
  `phone` varchar(10) NOT NULL,
  `isAdmin` varchar(10) DEFAULT NULL,
  `isOwner` varchar(10) DEFAULT NULL,
  `isCustomer` varchar(10) DEFAULT NULL,
  `createDT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDT` datetime NOT NULL,
  `loginID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `phone`, `isAdmin`, `isOwner`, `isCustomer`, `createDT`, `updateDT`, `loginID`) VALUES
(8, '', 'YES', 'YES', 'YES', '2018-04-13 22:59:01', '2018-05-28 13:43:45', 8),
(9, '', '', 'YES', 'YES', '2018-04-16 16:11:48', '2018-05-25 22:26:12', 9),
(39, '', NULL, '', 'YES', '2018-05-16 17:08:43', '2018-05-16 17:08:43', 38),
(40, '', NULL, '', 'YES', '2018-05-23 00:14:26', '2018-05-23 00:14:26', 39);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tblad`
--
ALTER TABLE `tblad`
  ADD PRIMARY KEY (`adID`),
  ADD KEY `fk_tblad_tblpet1_idx` (`petID`);

--
-- Indexes for table `tbladdress`
--
ALTER TABLE `tbladdress`
  ADD PRIMARY KEY (`addressID`),
  ADD KEY `fk_tbladdress_tbluser1_idx` (`userID`);

--
-- Indexes for table `tblbookings`
--
ALTER TABLE `tblbookings`
  ADD PRIMARY KEY (`bookingsID`),
  ADD KEY `fk_tblBookings_tblpet1_idx` (`petID`),
  ADD KEY `userID` (`userID`);

--
-- Indexes for table `tblimagespet`
--
ALTER TABLE `tblimagespet`
  ADD PRIMARY KEY (`imagesID`),
  ADD KEY `fk_tblimages_tblpet1_idx` (`petID`);

--
-- Indexes for table `tblimagesuser`
--
ALTER TABLE `tblimagesuser`
  ADD PRIMARY KEY (`imagesUserID`),
  ADD KEY `fk_tblimagesuser_tbluser1_idx` (`userID`);

--
-- Indexes for table `tbllogin`
--
ALTER TABLE `tbllogin`
  ADD PRIMARY KEY (`loginID`),
  ADD UNIQUE KEY `loginUsername` (`loginUsername`);

--
-- Indexes for table `tblpet`
--
ALTER TABLE `tblpet`
  ADD PRIMARY KEY (`petID`),
  ADD KEY `fk_tblpet_tblUser1_idx` (`userID`);

--
-- Indexes for table `tblreviews`
--
ALTER TABLE `tblreviews`
  ADD PRIMARY KEY (`reviewsID`),
  ADD KEY `fk_tblReviews_tblUser1_idx` (`userID`),
  ADD KEY `fk_tblReviews_tblpet1_idx` (`petID`);

--
-- Indexes for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD PRIMARY KEY (`userID`),
  ADD KEY `fk_tblUser_tbllogin1_idx` (`loginID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblad`
--
ALTER TABLE `tblad`
  MODIFY `adID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbladdress`
--
ALTER TABLE `tbladdress`
  MODIFY `addressID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- AUTO_INCREMENT for table `tblbookings`
--
ALTER TABLE `tblbookings`
  MODIFY `bookingsID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- AUTO_INCREMENT for table `tblimagespet`
--
ALTER TABLE `tblimagespet`
  MODIFY `imagesID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tblimagesuser`
--
ALTER TABLE `tblimagesuser`
  MODIFY `imagesUserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `loginID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

--
-- AUTO_INCREMENT for table `tblpet`
--
ALTER TABLE `tblpet`
  MODIFY `petID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=64;

--
-- AUTO_INCREMENT for table `tblreviews`
--
ALTER TABLE `tblreviews`
  MODIFY `reviewsID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=41;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblad`
--
ALTER TABLE `tblad`
  ADD CONSTRAINT `fk_tblad_tblpet1` FOREIGN KEY (`petID`) REFERENCES `tblpet` (`petID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbladdress`
--
ALTER TABLE `tbladdress`
  ADD CONSTRAINT `fk_tbladdress_tbluser1` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblbookings`
--
ALTER TABLE `tblbookings`
  ADD CONSTRAINT `fk_tblBookings_tblpet1` FOREIGN KEY (`petID`) REFERENCES `tblpet` (`petID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userID` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblimagespet`
--
ALTER TABLE `tblimagespet`
  ADD CONSTRAINT `fk_tblimages_tblpet1` FOREIGN KEY (`petID`) REFERENCES `tblpet` (`petID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblimagesuser`
--
ALTER TABLE `tblimagesuser`
  ADD CONSTRAINT `fk_tblimagesuser_tbluser1` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblpet`
--
ALTER TABLE `tblpet`
  ADD CONSTRAINT `fk_tblpet_tblUser1` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tblreviews`
--
ALTER TABLE `tblreviews`
  ADD CONSTRAINT `fk_tblReviews_tblUser1` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_tblReviews_tblpet1` FOREIGN KEY (`petID`) REFERENCES `tblpet` (`petID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `fk_tblUser_tbllogin1` FOREIGN KEY (`loginID`) REFERENCES `tbllogin` (`loginID`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
