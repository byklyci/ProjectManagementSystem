-- phpMyAdmin SQL Dump
-- version 4.8.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2018 at 01:00 AM
-- Server version: 10.1.31-MariaDB
-- PHP Version: 7.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `projectmanagement`
--

-- --------------------------------------------------------

--
-- Table structure for table `Admins`
--

CREATE TABLE `Admins` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Admins`
--

INSERT INTO `Admins` (`ID`, `Username`, `Password`) VALUES
(1, 'CEO', 'yusuf');

-- --------------------------------------------------------

--
-- Table structure for table `Employees`
--

CREATE TABLE `Employees` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Project` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Employees`
--

INSERT INTO `Employees` (`ID`, `Name`, `Project`) VALUES
(22, 'sinemsekreter', 'kurs'),
(23, 'mehmetusta', 'kurs');

--
-- Triggers `Employees`
--
DELIMITER $$
CREATE TRIGGER `empDeletion` AFTER DELETE ON `Employees` FOR EACH ROW DELETE Tasks
FROM Employees, Tasks
WHERE
Tasks.Employee=Employees.Name
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `Projects`
--

CREATE TABLE `Projects` (
  `ID` int(11) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Pmanager` varchar(30) NOT NULL,
  `StartDate` date NOT NULL,
  `TotalTaskDay` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Projects`
--

INSERT INTO `Projects` (`ID`, `Name`, `Pmanager`, `StartDate`, `TotalTaskDay`) VALUES
(18, 'kurs', 'PManager', '2018-05-11', '3day'),
(19, 'kurs1', 'PManager3', '2018-05-11', '3day');

-- --------------------------------------------------------

--
-- Table structure for table `Tasks`
--

CREATE TABLE `Tasks` (
  `ID` int(11) NOT NULL,
  `User` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Employee` varchar(30) NOT NULL,
  `Time` datetime NOT NULL,
  `TotalDay` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Tasks`
--

INSERT INTO `Tasks` (`ID`, `User`, `Name`, `Employee`, `Time`, `TotalDay`) VALUES
(14, 'Pmanager', 'eÅŸyatoplama', 'ali', '2019-11-12 10:30:00', '3day'),
(15, 'Pmanager', 'WQE', 'ali', '2017-11-12 11:00:00', '1day'),
(16, 'Pmanager', 'asd', 'ali', '2017-11-12 15:00:00', '1day'),
(17, 'Pmanager', 'afd', 'ali', '2017-11-12 11:30:00', '3'),
(18, 'Pmanager', 'ad', 'ali', '2017-11-12 12:00:00', '3day'),
(19, 'Pmanager5', 'yazÄ±iÅŸleri', 'sinemsekreter', '2017-11-12 11:00:00', '3day');

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `ID` int(11) NOT NULL,
  `Username` varchar(30) NOT NULL,
  `Name` varchar(30) NOT NULL,
  `Password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`ID`, `Username`, `Name`, `Password`) VALUES
(11, 'PManager', 'Headstaff', '123'),
(14, 'PManager2', 'Ali Veli', 'aliveli123'),
(15, 'PManager3', 'yusufk', '123'),
(17, 'Pmanager5', 'Yusuf KalaycÄ±', '123');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Admins`
--
ALTER TABLE `Admins`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Employees`
--
ALTER TABLE `Employees`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Projects`
--
ALTER TABLE `Projects`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Tasks`
--
ALTER TABLE `Tasks`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Admins`
--
ALTER TABLE `Admins`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `Employees`
--
ALTER TABLE `Employees`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `Projects`
--
ALTER TABLE `Projects`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `Tasks`
--
ALTER TABLE `Tasks`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
