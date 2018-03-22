-- phpMyAdmin SQL Dump
-- version 4.7.8
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 22, 2018 at 02:42 AM
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
  `petPrice` decimal(10,2) NOT NULL,
  `priceType` varchar(45) NOT NULL,
  `adTitle` varchar(45) NOT NULL,
  `adDescription` varchar(300) DEFAULT NULL,
  `bookingType` varchar(45) NOT NULL,
  `postAdDT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateAdDT` datetime NOT NULL,
  `petID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `createDT` datetime NOT NULL,
  `updateDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblbookings`
--

CREATE TABLE `tblbookings` (
  `bookingsID` int(10) UNSIGNED NOT NULL,
  `dateBooked` varchar(45) NOT NULL,
  `startTimeBooked` varchar(45) NOT NULL,
  `finishTimeBooked` varchar(45) NOT NULL,
  `priceBooked` varchar(45) NOT NULL,
  `petBooked` varchar(45) NOT NULL,
  `isCompleted` varchar(45) NOT NULL,
  `petID` int(10) UNSIGNED NOT NULL,
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblimagespet`
--

CREATE TABLE `tblimagespet` (
  `imagesID` int(10) UNSIGNED NOT NULL,
  `imageURL` varchar(150) NOT NULL,
  `petID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tblimagesuser`
--

CREATE TABLE `tblimagesuser` (
  `imagesUserID` int(10) UNSIGNED NOT NULL,
  `imageURL` varchar(45) NOT NULL,
  `userID` int(10) UNSIGNED DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbllogin`
--

CREATE TABLE `tbllogin` (
  `loginID` int(10) UNSIGNED NOT NULL,
  `loginUsername` varchar(100) NOT NULL,
  `loginPassword` varchar(10) NOT NULL,
  `createDT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDT` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbllogin`
--

INSERT INTO `tbllogin` (`loginID`, `loginUsername`, `loginPassword`, `createDT`, `updateDT`) VALUES
(15, 'jessica.yeoh@outlook.com', 'qwerty', '2018-02-20 16:50:15', '0000-00-00 00:00:00'),
(17, 'j.yo2011@hotmail.com', 'password12', '2018-02-20 16:56:13', '0000-00-00 00:00:00'),
(22, 'jess@outlook.com', 'qwerty123', '2018-03-05 21:58:19', '0000-00-00 00:00:00');

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
  `userID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

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
  `firstName` varchar(100) NOT NULL,
  `lastName` varchar(100) NOT NULL,
  `phone` varchar(10) NOT NULL,
  `userType` varchar(50) NOT NULL,
  `createDT` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `updateDT` datetime NOT NULL,
  `addressID` int(10) UNSIGNED DEFAULT NULL,
  `loginID` int(10) UNSIGNED NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbluser`
--

INSERT INTO `tbluser` (`userID`, `firstName`, `lastName`, `phone`, `userType`, `createDT`, `updateDT`, `addressID`, `loginID`) VALUES
(1, 'Jessica', 'Yeoh', '0491830482', 'Admin', '2018-03-20 15:19:34', '2018-03-20 15:19:15', NULL, 15);

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
  ADD PRIMARY KEY (`addressID`);

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
  ADD KEY `fk_tblImagesUser_tblUser1_idx` (`userID`);

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
  ADD KEY `fk_tblUser_tblAddress1_idx` (`addressID`),
  ADD KEY `fk_tblUser_tbllogin1_idx` (`loginID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tblad`
--
ALTER TABLE `tblad`
  MODIFY `adID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbladdress`
--
ALTER TABLE `tbladdress`
  MODIFY `addressID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblbookings`
--
ALTER TABLE `tblbookings`
  MODIFY `bookingsID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblimagespet`
--
ALTER TABLE `tblimagespet`
  MODIFY `imagesID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblimagesuser`
--
ALTER TABLE `tblimagesuser`
  MODIFY `imagesUserID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbllogin`
--
ALTER TABLE `tbllogin`
  MODIFY `loginID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=37;

--
-- AUTO_INCREMENT for table `tblpet`
--
ALTER TABLE `tblpet`
  MODIFY `petID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tblreviews`
--
ALTER TABLE `tblreviews`
  MODIFY `reviewsID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbluser`
--
ALTER TABLE `tbluser`
  MODIFY `userID` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tblad`
--
ALTER TABLE `tblad`
  ADD CONSTRAINT `fk_tblad_tblpet1` FOREIGN KEY (`petID`) REFERENCES `tblpet` (`petID`) ON DELETE CASCADE ON UPDATE CASCADE;

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
  ADD CONSTRAINT `fk_tblimages_tblpet1` FOREIGN KEY (`petID`) REFERENCES `tblpet` (`petID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblimagesuser`
--
ALTER TABLE `tblimagesuser`
  ADD CONSTRAINT `fk_tblImagesUser_tblUser1` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblpet`
--
ALTER TABLE `tblpet`
  ADD CONSTRAINT `fk_tblpet_tblUser1` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tblreviews`
--
ALTER TABLE `tblreviews`
  ADD CONSTRAINT `fk_tblReviews_tblUser1` FOREIGN KEY (`userID`) REFERENCES `tbluser` (`userID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblReviews_tblpet1` FOREIGN KEY (`petID`) REFERENCES `tblpet` (`petID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `tbluser`
--
ALTER TABLE `tbluser`
  ADD CONSTRAINT `fk_tblUser_tblAddress1` FOREIGN KEY (`addressID`) REFERENCES `tbladdress` (`addressID`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_tblUser_tbllogin1` FOREIGN KEY (`loginID`) REFERENCES `tbllogin` (`loginID`) ON DELETE NO ACTION ON UPDATE NO ACTION;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
