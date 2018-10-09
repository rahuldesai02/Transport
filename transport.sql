-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 09, 2018 at 05:06 PM
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
-- Database: `transport`
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
  `Bus_Manufacturer` varchar(30) DEFAULT NULL COMMENT 'Name of the company that manufactured the bus'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Contains detail information about each bus';

-- --------------------------------------------------------

--
-- Table structure for table `bus_stop`
--

CREATE TABLE `bus_stop` (
  `Bus_Stop_ID` int(11) NOT NULL COMMENT 'Unique ID given to the bus_stop',
  `Place` varchar(30) NOT NULL COMMENT 'Place of the bus_stop',
  `Coordinates` float NOT NULL COMMENT 'Latitude and longitudes of the location'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='Stores data of bus stops';

-- --------------------------------------------------------

--
-- Table structure for table `conductor`
--

CREATE TABLE `conductor` (
  `Name` varchar(30) NOT NULL COMMENT 'Name of the conductor',
  `Conductor_Id` int(11) NOT NULL COMMENT 'Unique ID given to th conductor',
  `Contact_No` int(11) NOT NULL COMMENT 'Phone number of the conductor',
  `Salary` int(11) NOT NULL COMMENT 'Salary of the conductor'
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contains information about the conductors';

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
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COMMENT='This table contains the information about drivers';

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`Bus_Id`),
  ADD UNIQUE KEY `Reg_No` (`Reg_No`);

--
-- Indexes for table `bus_stop`
--
ALTER TABLE `bus_stop`
  ADD PRIMARY KEY (`Bus_Stop_ID`);

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
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
