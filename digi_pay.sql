-- phpMyAdmin SQL Dump
-- version 5.0.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Generation Time: Feb 11, 2022 at 07:41 AM
-- Server version: 8.0.27
-- PHP Version: 7.4.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `digi_pay`
--

-- --------------------------------------------------------

--
-- Table structure for table `deductions`
--

DROP TABLE IF EXISTS `deductions`;
CREATE TABLE IF NOT EXISTS `deductions` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Health_Insurance` int NOT NULL,
  `Loans` int NOT NULL,
  `Others` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `deductions`
--

INSERT INTO `deductions` (`ID`, `Health_Insurance`, `Loans`, `Others`) VALUES
(1, 1500, 5000, 2000);

-- --------------------------------------------------------

--
-- Table structure for table `employee`
--

DROP TABLE IF EXISTS `employee`;
CREATE TABLE IF NOT EXISTS `employee` (
  `Employee_ID` int NOT NULL AUTO_INCREMENT,
  `FirstName` varchar(16) NOT NULL,
  `LastName` varchar(16) NOT NULL,
  `Gender` varchar(10) NOT NULL,
  `Employee_Type` varchar(30) NOT NULL,
  `Department` varchar(30) NOT NULL,
  `Deduction` int NOT NULL DEFAULT '0',
  `Overtime` int NOT NULL DEFAULT '0',
  `Bonus` int NOT NULL DEFAULT '0',
  `Contact` int NOT NULL,
  `Address` varchar(50) NOT NULL,
  `Email` varchar(50) NOT NULL,
  PRIMARY KEY (`Employee_ID`)
) ENGINE=InnoDB AUTO_INCREMENT=10 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `employee`
--

INSERT INTO `employee` (`Employee_ID`, `FirstName`, `LastName`, `Gender`, `Employee_Type`, `Department`, `Deduction`, `Overtime`, `Bonus`, `Contact`, `Address`, `Email`) VALUES
(6, 'Airon', 'Villaruel', 'Male', 'Full-Time', 'Admin', 5000, 24, 1000, 985475621, 'Parañaque City', 'aironvillaruel123@gmail.com'),
(7, 'Bryant', 'Babac', 'Male', 'Shiftworker', 'Human Resource', 1500, 4, 1000, 912475687, 'Taguig City', 'bryantbabac@gmail.com'),
(8, 'Aaron Chrisopher', 'Ultra', 'Male', 'Casual', 'Personnel', 2000, 5, 5000, 987456325, 'Taguig City', 'christopherultra@yahoo.com'),
(9, 'Bobadilla', 'Mary Jane', 'Female', 'Part-Time', 'Marketing', 5000, 10, 2000, 954753128, 'Taguig City', 'MJ_Bobadilla@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `overtime`
--

DROP TABLE IF EXISTS `overtime`;
CREATE TABLE IF NOT EXISTS `overtime` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Rate` int NOT NULL,
  `None` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `overtime`
--

INSERT INTO `overtime` (`ID`, `Rate`, `None`) VALUES
(1, 100, 0);

-- --------------------------------------------------------

--
-- Table structure for table `salary`
--

DROP TABLE IF EXISTS `salary`;
CREATE TABLE IF NOT EXISTS `salary` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Salary_Rate` int NOT NULL,
  `None` int NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `salary`
--

INSERT INTO `salary` (`ID`, `Salary_Rate`, `None`) VALUES
(1, 26000, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
CREATE TABLE IF NOT EXISTS `user` (
  `ID` int NOT NULL AUTO_INCREMENT,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL,
  `Fullname` varchar(30) NOT NULL,
  `Email` varchar(40) NOT NULL,
  PRIMARY KEY (`ID`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`ID`, `Username`, `Password`, `Fullname`, `Email`) VALUES
(1, 'eyronn', 'pogiako123', 'aironvillaruel', 'airon.v@gmail.com');
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
