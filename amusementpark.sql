-- phpMyAdmin SQL Dump
-- version 5.1.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2021 at 05:52 PM
-- Server version: 10.4.18-MariaDB
-- PHP Version: 8.0.3

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `amusementpark`
--

-- --------------------------------------------------------

--
-- Table structure for table `concessions`
--

CREATE TABLE `concessions` (
  `location` int(11) NOT NULL,
  `concessionName` varchar(100) NOT NULL,
  `concessionID` int(11) NOT NULL,
  `operationCost` float NOT NULL DEFAULT 0,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `employees`
--

CREATE TABLE `employees` (
  `employeeID` int(11) NOT NULL,
  `salary` float NOT NULL DEFAULT 0,
  `employeeName` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `location`
--

CREATE TABLE `location` (
  `locationID` int(11) NOT NULL,
  `name` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `productamountsold`
--

CREATE TABLE `productamountsold` (
  `concessionID` int(11) NOT NULL,
  `productID` int(11) NOT NULL,
  `numSold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `productID` int(11) NOT NULL,
  `productName` varchar(100) NOT NULL,
  `price` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `profits`
--

CREATE TABLE `profits` (
  `date` date NOT NULL,
  `earnings` float NOT NULL DEFAULT 0,
  `totalTicketsSold` int(11) NOT NULL DEFAULT 0,
  `totalProductsSold` int(11) NOT NULL DEFAULT 0,
  `totalOperationCost` float NOT NULL DEFAULT 0,
  `netProfit` float NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `rides`
--

CREATE TABLE `rides` (
  `rideName` varchar(100) NOT NULL,
  `capacity` int(11) NOT NULL DEFAULT 0,
  `numTrains` int(11) NOT NULL DEFAULT 0,
  `heightRequirement` int(11) DEFAULT NULL,
  `requiresMaintenance` tinyint(1) NOT NULL,
  `location` int(11) NOT NULL,
  `rideID` int(11) NOT NULL,
  `operationCost` float NOT NULL DEFAULT 0,
  `totalRiders` int(11) NOT NULL DEFAULT 0,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticketamountsold`
--

CREATE TABLE `ticketamountsold` (
  `boothID` int(11) NOT NULL,
  `ticketType` varchar(25) NOT NULL,
  `numSold` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `ticketbooths`
--

CREATE TABLE `ticketbooths` (
  `boothID` int(11) NOT NULL,
  `location` int(11) NOT NULL,
  `employeeID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tickets`
--

CREATE TABLE `tickets` (
  `ticketType` varchar(32) NOT NULL,
  `price` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `concessions`
--
ALTER TABLE `concessions`
  ADD PRIMARY KEY (`concessionID`),
  ADD KEY `location` (`location`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `employees`
--
ALTER TABLE `employees`
  ADD PRIMARY KEY (`employeeID`);

--
-- Indexes for table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`locationID`);

--
-- Indexes for table `productamountsold`
--
ALTER TABLE `productamountsold`
  ADD PRIMARY KEY (`concessionID`,`productID`),
  ADD KEY `productID` (`productID`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`productID`);

--
-- Indexes for table `profits`
--
ALTER TABLE `profits`
  ADD PRIMARY KEY (`date`);

--
-- Indexes for table `rides`
--
ALTER TABLE `rides`
  ADD PRIMARY KEY (`rideID`),
  ADD KEY `location` (`location`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `ticketamountsold`
--
ALTER TABLE `ticketamountsold`
  ADD PRIMARY KEY (`boothID`,`ticketType`),
  ADD KEY `ticketType` (`ticketType`);

--
-- Indexes for table `ticketbooths`
--
ALTER TABLE `ticketbooths`
  ADD PRIMARY KEY (`boothID`),
  ADD KEY `location` (`location`),
  ADD KEY `employeeID` (`employeeID`);

--
-- Indexes for table `tickets`
--
ALTER TABLE `tickets`
  ADD PRIMARY KEY (`ticketType`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `concessions`
--
ALTER TABLE `concessions`
  MODIFY `concessionID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `employees`
--
ALTER TABLE `employees`
  MODIFY `employeeID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `location`
--
ALTER TABLE `location`
  MODIFY `locationID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `productID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `rides`
--
ALTER TABLE `rides`
  MODIFY `rideID` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `ticketbooths`
--
ALTER TABLE `ticketbooths`
  MODIFY `boothID` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `concessions`
--
ALTER TABLE `concessions`
  ADD CONSTRAINT `concessions_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `concessions_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);

--
-- Constraints for table `productamountsold`
--
ALTER TABLE `productamountsold`
  ADD CONSTRAINT `productamountsold_ibfk_1` FOREIGN KEY (`concessionID`) REFERENCES `concessions` (`concessionID`),
  ADD CONSTRAINT `productamountsold_ibfk_2` FOREIGN KEY (`productID`) REFERENCES `products` (`productID`),
  ADD CONSTRAINT `productamountsold_ibfk_3` FOREIGN KEY (`concessionID`) REFERENCES `concessions` (`concessionID`);

--
-- Constraints for table `rides`
--
ALTER TABLE `rides`
  ADD CONSTRAINT `rides_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `rides_ibfk_2` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);

--
-- Constraints for table `ticketamountsold`
--
ALTER TABLE `ticketamountsold`
  ADD CONSTRAINT `ticketamountsold_ibfk_1` FOREIGN KEY (`boothID`) REFERENCES `ticketbooths` (`boothID`),
  ADD CONSTRAINT `ticketamountsold_ibfk_2` FOREIGN KEY (`ticketType`) REFERENCES `tickets` (`ticketType`);

--
-- Constraints for table `ticketbooths`
--
ALTER TABLE `ticketbooths`
  ADD CONSTRAINT `ticketbooths_ibfk_1` FOREIGN KEY (`location`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `ticketbooths_ibfk_2` FOREIGN KEY (`location`) REFERENCES `location` (`locationID`),
  ADD CONSTRAINT `ticketbooths_ibfk_3` FOREIGN KEY (`employeeID`) REFERENCES `employees` (`employeeID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
