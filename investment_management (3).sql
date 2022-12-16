-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 19, 2022 at 04:15 PM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `investment_management`
--

-- --------------------------------------------------------

--
-- Table structure for table `ananlysis`
--

CREATE TABLE `ananlysis` (
  `StockID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `CurrentStatus` float NOT NULL,
  `PredictedStatus` float NOT NULL,
  `Recommendation` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ananlysis`
--

INSERT INTO `ananlysis` (`StockID`, `Name`, `CurrentStatus`, `PredictedStatus`, `Recommendation`) VALUES
(1003, 'RELIANCE INDUSTRIES', -2.25, 10.5, 'Strongly Buy'),
(1004, 'TCS', 40.8, 45.9, 'Buy'),
(1005, 'HDFC BANK', -11.7, 31.45, 'Strongly Buy'),
(1008, 'SBI', -5.5, -8.4, 'Sell');

-- --------------------------------------------------------

--
-- Table structure for table `investmentstatus`
--

CREATE TABLE `investmentstatus` (
  `UserID` int(11) NOT NULL,
  `StockID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `PurchaseDate` date NOT NULL,
  `Holdings` int(11) NOT NULL,
  `Initialinvestment` double NOT NULL,
  `Status` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `investmentstatus`
--

INSERT INTO `investmentstatus` (`UserID`, `StockID`, `Name`, `PurchaseDate`, `Holdings`, `Initialinvestment`, `Status`) VALUES
(101, 1003, 'RELIANCE INDUSTRIES', '2022-03-23', 6, 8012, -2.25),
(101, 1004, 'TCS', '2022-01-29', 6, 3591.4909090908995, 40.8),
(101, 1005, 'HDFC BANK', '2022-02-08', 1, 50, -11.7),
(101, 1006, 'INFOSYS', '2022-04-30', 2, 162, 7.6),
(102, 1003, 'RELIANCE INDUSTRIES', '2022-03-29', 1, 1, -2.25);

-- --------------------------------------------------------

--
-- Table structure for table `stocks`
--

CREATE TABLE `stocks` (
  `StockID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `LastCls` double NOT NULL,
  `WeekHigh` double NOT NULL,
  `WeekLow` double NOT NULL,
  `CurrentStatus` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `stocks`
--

INSERT INTO `stocks` (`StockID`, `Name`, `LastCls`, `WeekHigh`, `WeekLow`, `CurrentStatus`) VALUES
(1003, 'RELIANCE INDUSTRIES', 2335.85, 2375.9, 2328.4, -2.25),
(1004, 'TCS', 3690.05, 3729.8, 3646, 40.8),
(1005, 'HDFC BANK', 1464.25, 1486.7, 1460, -11.7),
(1006, 'INFOSYS', 1686.2, 1727.55, 1675.5, 7.6),
(1007, 'HINDUSTAN UNILEVER', 2283.55, 2318.7, 2278.05, -11.8),
(1008, 'SBI', 523.45, 536.4, 521.4, -5.5);

-- --------------------------------------------------------

--
-- Table structure for table `transactions`
--

CREATE TABLE `transactions` (
  `TransID` int(11) NOT NULL,
  `UserID` int(11) NOT NULL,
  `StockID` int(11) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Sold` int(11) DEFAULT NULL,
  `SoldFor` double DEFAULT NULL,
  `Net Gain` double NOT NULL,
  `Date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `transactions`
--

INSERT INTO `transactions` (`TransID`, `UserID`, `StockID`, `Name`, `Sold`, `SoldFor`, `Net Gain`, `Date`) VALUES
(122, 101, 1004, 'TCS', 1, 3690.5, 0, '2022-01-29'),
(123, 101, 1004, 'TCS', 1, 6000, 2309.5, '2022-01-29'),
(124, 101, 1004, 'TCS', 2, 6908.8, -472.2, '2022-01-29'),
(125, 101, 1003, 'RELIANCE INDUSTRIES', 3, 2456.8, 1649.266, '2022-02-08'),
(126, 101, 1003, 'RELIANCE INDUSTRIES', 1, 578.98, 40.624, '2022-02-08'),
(127, 101, 1005, 'HDFC BANK', 1, 200, 150, '2022-02-08'),
(128, 101, 1004, 'TCS', 5, 3243, 250.09090909091, '2022-03-23'),
(129, 102, 1003, 'RELIANCE INDUSTRIES', 1, 1, 0, '2022-03-29'),
(130, 101, 1007, 'HINDUSTAN UNILEVER', 6, 7653, 3685.3, '2022-03-29'),
(131, 101, 1006, 'INFOSYS', 2, 4545, 4383, '2022-04-30');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `UserID` int(10) NOT NULL,
  `Name` varchar(50) NOT NULL,
  `Password` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`UserID`, `Name`, `Password`) VALUES
(100, 'root', 'manager'),
(101, 'Sujay', '1234'),
(102, 'venka', '1234');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ananlysis`
--
ALTER TABLE `ananlysis`
  ADD PRIMARY KEY (`StockID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `investmentstatus`
--
ALTER TABLE `investmentstatus`
  ADD PRIMARY KEY (`UserID`,`StockID`),
  ADD KEY `SID` (`StockID`);

--
-- Indexes for table `stocks`
--
ALTER TABLE `stocks`
  ADD PRIMARY KEY (`StockID`),
  ADD UNIQUE KEY `Name` (`Name`);

--
-- Indexes for table `transactions`
--
ALTER TABLE `transactions`
  ADD PRIMARY KEY (`TransID`),
  ADD KEY `userid` (`UserID`),
  ADD KEY `stockid` (`StockID`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`UserID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `stocks`
--
ALTER TABLE `stocks`
  MODIFY `StockID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=1009;

--
-- AUTO_INCREMENT for table `transactions`
--
ALTER TABLE `transactions`
  MODIFY `TransID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=132;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `UserID` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=103;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ananlysis`
--
ALTER TABLE `ananlysis`
  ADD CONSTRAINT `Stock` FOREIGN KEY (`StockID`) REFERENCES `stocks` (`StockID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `name` FOREIGN KEY (`Name`) REFERENCES `stocks` (`Name`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `investmentstatus`
--
ALTER TABLE `investmentstatus`
  ADD CONSTRAINT `SID` FOREIGN KEY (`StockID`) REFERENCES `stocks` (`StockID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `UID` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `transactions`
--
ALTER TABLE `transactions`
  ADD CONSTRAINT `stockid` FOREIGN KEY (`StockID`) REFERENCES `stocks` (`StockID`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `userid` FOREIGN KEY (`UserID`) REFERENCES `user` (`UserID`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
