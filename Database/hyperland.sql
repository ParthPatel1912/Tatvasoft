-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 21, 2022 at 07:55 AM
-- Server version: 10.4.21-MariaDB
-- PHP Version: 8.0.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hyperland`
--

-- --------------------------------------------------------

--
-- Table structure for table `address`
--

CREATE TABLE `address` (
  `AddressID` int(32) NOT NULL,
  `StreetName` varchar(500) NOT NULL,
  `HouseNumber` varchar(500) NOT NULL,
  `CityID` int(32) NOT NULL,
  `PostalCode` int(32) NOT NULL,
  `UserID` int(32) NOT NULL,
  `UserTypeID` int(32) NOT NULL,
  `MobileNumber` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `avtar`
--

CREATE TABLE `avtar` (
  `AvtraID` int(32) NOT NULL,
  `Avtar` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `block`
--

CREATE TABLE `block` (
  `BlockID` int(32) NOT NULL,
  `BlockUserID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `cancelservice`
--

CREATE TABLE `cancelservice` (
  `CancelServiceID` int(32) NOT NULL,
  `CancelServiceComment` varchar(1000) NOT NULL,
  `ServiceID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `CityID` int(32) NOT NULL,
  `CityName` varchar(50) NOT NULL,
  `StateID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `citycheckpostal`
--

CREATE TABLE `citycheckpostal` (
  `PostalID` int(32) NOT NULL,
  `CityID` int(32) NOT NULL,
  `CityArea` varchar(50) NOT NULL,
  `PostalCode` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `extraservices`
--

CREATE TABLE `extraservices` (
  `ExtraServiceID` int(32) NOT NULL,
  `ServiceID` int(32) NOT NULL,
  `ExtraServiceTypeID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `extraservicetype`
--

CREATE TABLE `extraservicetype` (
  `ExtraServiceTypeID` int(32) NOT NULL,
  `ExtraServiceTypeName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `favourite`
--

CREATE TABLE `favourite` (
  `FavouriteID` int(32) NOT NULL,
  `FavouriteName` varchar(50) NOT NULL,
  `UserID` int(32) NOT NULL,
  `ServiceProviderID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `gender`
--

CREATE TABLE `gender` (
  `GenderID` int(32) NOT NULL,
  `GenderName` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rating`
--

CREATE TABLE `rating` (
  `RatingID` int(32) NOT NULL,
  `ServiceID` int(32) NOT NULL,
  `UserID` int(32) NOT NULL,
  `ServiceProviderID` int(32) NOT NULL,
  `OnTime` int(32) NOT NULL,
  `Friendly` int(32) NOT NULL,
  `QualityofService` int(32) NOT NULL,
  `Feedback` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `service`
--

CREATE TABLE `service` (
  `ServiceID` int(32) NOT NULL,
  `UserID` int(32) NOT NULL,
  `ServiceDate` date NOT NULL,
  `ServiceTime` time NOT NULL,
  `Payment` varchar(64) NOT NULL,
  `Distance` varchar(32) DEFAULT NULL,
  `StartTime` time NOT NULL,
  `TotalTime` time NOT NULL,
  `AddressID` int(32) NOT NULL,
  `HaveAppartment` int(32) NOT NULL,
  `IsAccept` int(32) NOT NULL,
  `IsCompleted` int(32) NOT NULL,
  `ServiceProviderID` int(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `serviceprovider`
--

CREATE TABLE `serviceprovider` (
  `ServiceProviderID` int(32) NOT NULL,
  `UserID` int(32) NOT NULL,
  `GenderID` int(32) NOT NULL,
  `AvtarID` int(32) NOT NULL,
  `AddressID` int(32) NOT NULL,
  `TaxNo` varchar(50) NOT NULL,
  `IsWorkwithPet` binary(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `StateID` int(32) NOT NULL,
  `StateName` varchar(64) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(32) NOT NULL,
  `FirstName` varchar(50) NOT NULL,
  `LastName` varchar(50) NOT NULL,
  `UserTypeID` int(32) NOT NULL,
  `Password` varchar(100) NOT NULL,
  `Email` varchar(100) NOT NULL,
  `MobileNumber` varchar(50) NOT NULL,
  `BirthDate` date NOT NULL,
  `IsActive` binary(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `usertype`
--

CREATE TABLE `usertype` (
  `UserTypeID` int(32) NOT NULL,
  `UserType` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `address`
--
ALTER TABLE `address`
  ADD PRIMARY KEY (`AddressID`),
  ADD KEY `CityID` (`CityID`),
  ADD KEY `UserID` (`UserID`),
  ADD KEY `UserTypeID` (`UserTypeID`);

--
-- Indexes for table `avtar`
--
ALTER TABLE `avtar`
  ADD PRIMARY KEY (`AvtraID`);

--
-- Indexes for table `block`
--
ALTER TABLE `block`
  ADD PRIMARY KEY (`BlockID`),
  ADD KEY `BlockUserID` (`BlockUserID`);

--
-- Indexes for table `cancelservice`
--
ALTER TABLE `cancelservice`
  ADD PRIMARY KEY (`CancelServiceID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `city`
--
ALTER TABLE `city`
  ADD PRIMARY KEY (`CityID`),
  ADD KEY `StateID` (`StateID`);

--
-- Indexes for table `citycheckpostal`
--
ALTER TABLE `citycheckpostal`
  ADD PRIMARY KEY (`PostalID`),
  ADD KEY `CityID` (`CityID`);

--
-- Indexes for table `extraservices`
--
ALTER TABLE `extraservices`
  ADD PRIMARY KEY (`ExtraServiceID`),
  ADD KEY `ExtraServiceTypeID` (`ExtraServiceTypeID`),
  ADD KEY `ServiceID` (`ServiceID`);

--
-- Indexes for table `extraservicetype`
--
ALTER TABLE `extraservicetype`
  ADD PRIMARY KEY (`ExtraServiceTypeID`);

--
-- Indexes for table `favourite`
--
ALTER TABLE `favourite`
  ADD PRIMARY KEY (`FavouriteID`),
  ADD KEY `ServiceProviderID` (`ServiceProviderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `gender`
--
ALTER TABLE `gender`
  ADD PRIMARY KEY (`GenderID`);

--
-- Indexes for table `rating`
--
ALTER TABLE `rating`
  ADD PRIMARY KEY (`RatingID`),
  ADD KEY `ServiceID` (`ServiceID`),
  ADD KEY `ServiceProviderID` (`ServiceProviderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `service`
--
ALTER TABLE `service`
  ADD PRIMARY KEY (`ServiceID`),
  ADD KEY `AddressID` (`AddressID`),
  ADD KEY `ServiceProviderID` (`ServiceProviderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD PRIMARY KEY (`ServiceProviderID`),
  ADD KEY `AddressID` (`AddressID`),
  ADD KEY `AvtarID` (`AvtarID`),
  ADD KEY `GenderID` (`GenderID`),
  ADD KEY `UserID` (`UserID`);

--
-- Indexes for table `state`
--
ALTER TABLE `state`
  ADD PRIMARY KEY (`StateID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`),
  ADD KEY `UserTypeID` (`UserTypeID`);

--
-- Indexes for table `usertype`
--
ALTER TABLE `usertype`
  ADD PRIMARY KEY (`UserTypeID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `address`
--
ALTER TABLE `address`
  MODIFY `AddressID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `avtar`
--
ALTER TABLE `avtar`
  MODIFY `AvtraID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `block`
--
ALTER TABLE `block`
  MODIFY `BlockID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `cancelservice`
--
ALTER TABLE `cancelservice`
  MODIFY `CancelServiceID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `city`
--
ALTER TABLE `city`
  MODIFY `CityID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `citycheckpostal`
--
ALTER TABLE `citycheckpostal`
  MODIFY `PostalID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extraservices`
--
ALTER TABLE `extraservices`
  MODIFY `ExtraServiceID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `extraservicetype`
--
ALTER TABLE `extraservicetype`
  MODIFY `ExtraServiceTypeID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `favourite`
--
ALTER TABLE `favourite`
  MODIFY `FavouriteID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `gender`
--
ALTER TABLE `gender`
  MODIFY `GenderID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rating`
--
ALTER TABLE `rating`
  MODIFY `RatingID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `service`
--
ALTER TABLE `service`
  MODIFY `ServiceID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  MODIFY `ServiceProviderID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `state`
--
ALTER TABLE `state`
  MODIFY `StateID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(32) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `usertype`
--
ALTER TABLE `usertype`
  MODIFY `UserTypeID` int(32) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `address`
--
ALTER TABLE `address`
  ADD CONSTRAINT `address_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`),
  ADD CONSTRAINT `address_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`),
  ADD CONSTRAINT `address_ibfk_3` FOREIGN KEY (`UserTypeID`) REFERENCES `usertype` (`UserTypeID`);

--
-- Constraints for table `block`
--
ALTER TABLE `block`
  ADD CONSTRAINT `block_ibfk_1` FOREIGN KEY (`BlockUserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `cancelservice`
--
ALTER TABLE `cancelservice`
  ADD CONSTRAINT `cancelservice_ibfk_1` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`);

--
-- Constraints for table `city`
--
ALTER TABLE `city`
  ADD CONSTRAINT `city_ibfk_1` FOREIGN KEY (`StateID`) REFERENCES `state` (`StateID`);

--
-- Constraints for table `citycheckpostal`
--
ALTER TABLE `citycheckpostal`
  ADD CONSTRAINT `citycheckpostal_ibfk_1` FOREIGN KEY (`CityID`) REFERENCES `city` (`CityID`);

--
-- Constraints for table `extraservices`
--
ALTER TABLE `extraservices`
  ADD CONSTRAINT `extraservices_ibfk_1` FOREIGN KEY (`ExtraServiceTypeID`) REFERENCES `extraservicetype` (`ExtraServiceTypeID`),
  ADD CONSTRAINT `extraservices_ibfk_2` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`);

--
-- Constraints for table `favourite`
--
ALTER TABLE `favourite`
  ADD CONSTRAINT `favourite_ibfk_1` FOREIGN KEY (`ServiceProviderID`) REFERENCES `serviceprovider` (`ServiceProviderID`),
  ADD CONSTRAINT `favourite_ibfk_2` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `rating`
--
ALTER TABLE `rating`
  ADD CONSTRAINT `rating_ibfk_1` FOREIGN KEY (`ServiceID`) REFERENCES `service` (`ServiceID`),
  ADD CONSTRAINT `rating_ibfk_2` FOREIGN KEY (`ServiceProviderID`) REFERENCES `serviceprovider` (`ServiceProviderID`),
  ADD CONSTRAINT `rating_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `service`
--
ALTER TABLE `service`
  ADD CONSTRAINT `service_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `address` (`AddressID`),
  ADD CONSTRAINT `service_ibfk_2` FOREIGN KEY (`ServiceProviderID`) REFERENCES `serviceprovider` (`ServiceProviderID`),
  ADD CONSTRAINT `service_ibfk_3` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `serviceprovider`
--
ALTER TABLE `serviceprovider`
  ADD CONSTRAINT `serviceprovider_ibfk_1` FOREIGN KEY (`AddressID`) REFERENCES `address` (`AddressID`),
  ADD CONSTRAINT `serviceprovider_ibfk_2` FOREIGN KEY (`AvtarID`) REFERENCES `avtar` (`AvtraID`),
  ADD CONSTRAINT `serviceprovider_ibfk_3` FOREIGN KEY (`GenderID`) REFERENCES `gender` (`GenderID`),
  ADD CONSTRAINT `serviceprovider_ibfk_4` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `user_ibfk_1` FOREIGN KEY (`UserTypeID`) REFERENCES `usertype` (`UserTypeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
