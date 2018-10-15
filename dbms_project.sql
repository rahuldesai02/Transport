-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 15, 2018 at 12:57 PM
-- Server version: 10.1.35-MariaDB
-- PHP Version: 7.2.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dbms_project`
--

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `Reg_No` varchar(10) NOT NULL COMMENT 'Registration number that appears on the number plate',
  `Bus_Name` varchar(30) DEFAULT NULL COMMENT 'Name of the bus',
  `Bus_Id` int(11) NOT NULL COMMENT 'Unique ID given to each bus',
  `Bus_Colour` varchar(30) DEFAULT NULL COMMENT 'Color of the bus',
  `Bus_Manufacturer` varchar(30) DEFAULT NULL COMMENT 'Name of the company that manufactured the bus',
  `Driver_Id` int(11) DEFAULT NULL,
  `Conductor_Id` int(11) NOT NULL,
  `Owner_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus_stop`
--

CREATE TABLE `bus_stop` (
  `Bus_Stop_ID` int(11) NOT NULL COMMENT 'Unique ID given to the bus_stop',
  `Place` varchar(30) NOT NULL COMMENT 'Place of the bus_stop',
  `Coordinates` float NOT NULL COMMENT 'Latitude and longitudes of the location'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_stop`
--

INSERT INTO `bus_stop` (`Bus_Stop_ID`, `Place`, `Coordinates`) VALUES
(1, 'C', 0),
(10, 'C', 1000);

-- --------------------------------------------------------

--
-- Table structure for table `bus_stops_at`
--

CREATE TABLE `bus_stops_at` (
  `Bus_Id` int(11) NOT NULL,
  `Bus_stop_Id` int(11) NOT NULL,
  `Arrival_time` time NOT NULL,
  `Departure_time` time NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `Name` varchar(30) NOT NULL COMMENT 'Name of the conductor',
  `Conductor_Id` int(11) NOT NULL COMMENT 'Unique ID given to th conductor',
  `Contact_No` int(11) NOT NULL COMMENT 'Phone number of the conductor',
  `Salary` int(11) NOT NULL COMMENT 'Salary of the conductor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `conductor`
--

INSERT INTO `conductor` (`Name`, `Conductor_Id`, `Contact_No`, `Salary`) VALUES
('B', 1, 108, 100000);

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `username` varchar(30) NOT NULL,
  `password` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`username`, `password`) VALUES
('shashi', '1');

-- --------------------------------------------------------

--
-- Table structure for table `driver`
--

CREATE TABLE `driver` (
  `Name` varchar(30) NOT NULL COMMENT 'Name of the driver',
  `Driver_Id` int(11) NOT NULL COMMENT 'Unique ID given to each driver',
  `Contact_No` int(11) NOT NULL COMMENT 'Phone number of the driver',
  `Salary` int(11) NOT NULL COMMENT 'Salary of the driver',
  `License_No` varchar(30) NOT NULL COMMENT 'License number of the driver'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `driver`
--

INSERT INTO `driver` (`Name`, `Driver_Id`, `Contact_No`, `Salary`, `License_No`) VALUES
('A', 1, 100, 100000, '1012');

-- --------------------------------------------------------

--
-- Table structure for table `owner`
--

CREATE TABLE `owner` (
  `Owner_ID` int(11) NOT NULL,
  `Owner_Name` varchar(30) NOT NULL,
  `Contact_No` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `owner`
--

INSERT INTO `owner` (`Owner_ID`, `Owner_Name`, `Contact_No`) VALUES
(0, '', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`Bus_Id`),
  ADD UNIQUE KEY `Reg_No` (`Reg_No`),
  ADD UNIQUE KEY `Owner_ID` (`Owner_ID`),
  ADD KEY `Driver_Id_Constraint` (`Driver_Id`),
  ADD KEY `Conductor_Id_Constaint` (`Conductor_Id`);

--
-- Indexes for table `bus_stop`
--
ALTER TABLE `bus_stop`
  ADD PRIMARY KEY (`Bus_Stop_ID`);

--
-- Indexes for table `bus_stops_at`
--
ALTER TABLE `bus_stops_at`
  ADD KEY `Bus_Id` (`Bus_Id`),
  ADD KEY `Bus_stop_Id` (`Bus_stop_Id`);

--
-- Indexes for table `conductor`
--
ALTER TABLE `conductor`
  ADD PRIMARY KEY (`Conductor_Id`);

--
-- Indexes for table `driver`
--
ALTER TABLE `driver`
  ADD PRIMARY KEY (`Driver_Id`),
  ADD UNIQUE KEY `License_No.` (`License_No`);

--
-- Indexes for table `owner`
--
ALTER TABLE `owner`
  ADD PRIMARY KEY (`Owner_ID`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `bus`
--
ALTER TABLE `bus`
  ADD CONSTRAINT `bus_ibfk_1` FOREIGN KEY (`Driver_Id`) REFERENCES `driver` (`Driver_Id`),
  ADD CONSTRAINT `bus_ibfk_2` FOREIGN KEY (`Owner_ID`) REFERENCES `owner` (`Owner_ID`),
  ADD CONSTRAINT `bus_ibfk_3` FOREIGN KEY (`Conductor_Id`) REFERENCES `conductor` (`Conductor_Id`);

--
-- Constraints for table `bus_stops_at`
--
ALTER TABLE `bus_stops_at`
  ADD CONSTRAINT `bus_stops_at_ibfk_1` FOREIGN KEY (`Bus_Id`) REFERENCES `bus` (`Bus_Id`),
  ADD CONSTRAINT `bus_stops_at_ibfk_2` FOREIGN KEY (`Bus_stop_Id`) REFERENCES `bus_stop` (`Bus_Stop_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
