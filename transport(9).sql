-- phpMyAdmin SQL Dump
-- version 4.8.3
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 24, 2018 at 08:57 AM
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
  `Bus_Manufacturer` varchar(30) DEFAULT NULL COMMENT 'Name of the company that manufactured the bus',
  `Driver_Id` int(11) DEFAULT NULL,
  `Conductor_Id` int(11) NOT NULL,
  `Owner_ID` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`Reg_No`, `Bus_Name`, `Bus_Id`, `Bus_Colour`, `Bus_Manufacturer`, `Driver_Id`, `Conductor_Id`, `Owner_ID`) VALUES
('GA-07-1027', 'Sairaj', 1, 'Yellow', 'TATA', 1, 1, 1),
('GA-07-1037', 'Kadamba', 2, 'Blue', 'TATAVolvo', 2, 2, 4),
('GA-07-1022', 'Shantadurga', 3, 'Pink', 'Mazda', 3, 3, 2),
('GA-07-2391', 'Shwet', 4, 'Yellow', 'Eicher', 4, 4, 3);

-- --------------------------------------------------------

--
-- Table structure for table `bus_journey`
--

CREATE TABLE `bus_journey` (
  `bus_Id` int(11) NOT NULL,
  `Source_Id` int(11) NOT NULL,
  `Destination_Id` int(11) NOT NULL,
  `Departure_time` time NOT NULL,
  `Arrival_time` time NOT NULL,
  `Fare` int(11) NOT NULL,
  `Available_seats` int(11) NOT NULL DEFAULT '50'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_journey`
--

INSERT INTO `bus_journey` (`bus_Id`, `Source_Id`, `Destination_Id`, `Departure_time`, `Arrival_time`, `Fare`, `Available_seats`) VALUES
(1, 1, 2, '07:00:00', '08:00:00', 24, 46),
(1, 1, 2, '10:30:00', '12:00:00', 24, 49),
(1, 1, 2, '16:30:00', '17:30:00', 24, 49),
(1, 1, 2, '19:05:00', '20:00:00', 24, 49),
(1, 2, 1, '06:00:00', '07:00:00', 24, 50),
(1, 2, 1, '08:30:00', '10:00:00', 24, 50),
(1, 2, 1, '14:00:00', '16:00:00', 24, 50),
(1, 2, 1, '18:00:00', '19:00:00', 24, 50),
(2, 2, 4, '11:00:00', '12:00:00', 24, 50),
(2, 3, 4, '07:30:00', '09:00:00', 24, 49),
(2, 4, 2, '09:15:00', '10:30:00', 24, 50),
(2, 4, 3, '10:45:00', '11:30:00', 24, 50),
(3, 1, 3, '08:00:00', '09:00:00', 20, 50),
(3, 1, 3, '12:00:00', '13:00:00', 20, 50),
(3, 3, 1, '06:00:00', '07:00:00', 20, 50),
(3, 3, 1, '10:00:00', '11:00:00', 20, 50),
(4, 1, 4, '07:00:00', '08:00:00', 20, 50),
(4, 4, 1, '05:00:00', '06:00:00', 20, 50);

-- --------------------------------------------------------

--
-- Table structure for table `bus_stop`
--

CREATE TABLE `bus_stop` (
  `Bus_Stop_ID` int(11) NOT NULL COMMENT 'Unique ID given to the bus_stop',
  `Place` varchar(30) NOT NULL COMMENT 'Place of the bus_stop'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus_stop`
--

INSERT INTO `bus_stop` (`Bus_Stop_ID`, `Place`) VALUES
(1, 'Margao'),
(2, 'Panjim'),
(3, 'Curchorem'),
(4, 'Ponda');

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
('Shashi', 1, 987654321, 20000),
('Arvind', 2, 2147483647, 20000),
('Pratik', 3, 2147483647, 20000),
('Pratik', 4, 2147483647, 20000),
('Raheel', 5, 2147483647, 20000),
('Sohom', 6, 2147483647, 20000),
('Milind', 7, 1223456789, 15000);

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
('mahesh', 'mahesh'),
('s', '1');

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
('Rahul', 1, 123456789, 15000, 'GA0712328237'),
('Penjo', 2, 2147483647, 15000, 'GA081283944948'),
('Milind', 3, 2147483647, 15000, 'GA081283944950'),
('Evander', 4, 2147483647, 15000, 'GA081283944951'),
('Vassant', 5, 2147483647, 15000, 'GA081283957951'),
('Vinit', 6, 2147483647, 15000, 'GA081283957189'),
('Akash', 7, 123456789, 15000, 'GA081283944952');

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
(1, 'Rahul', 123456789),
(2, 'Ratan', 2147483647),
(3, 'Manohar', 2147483647),
(4, 'KTC', 1928374382),
(5, 'Vassant', 123546789);

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
-- Indexes for table `bus_journey`
--
ALTER TABLE `bus_journey`
  ADD PRIMARY KEY (`bus_Id`,`Source_Id`,`Destination_Id`,`Departure_time`,`Arrival_time`,`Fare`),
  ADD KEY `bus_Id` (`bus_Id`,`Source_Id`,`Destination_Id`),
  ADD KEY `Source_Id` (`Source_Id`),
  ADD KEY `Destination_Id` (`Destination_Id`);

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
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`username`);

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
-- Constraints for table `bus_journey`
--
ALTER TABLE `bus_journey`
  ADD CONSTRAINT `bus_journey_ibfk_1` FOREIGN KEY (`bus_Id`) REFERENCES `bus` (`Bus_Id`),
  ADD CONSTRAINT `bus_journey_ibfk_2` FOREIGN KEY (`Source_Id`) REFERENCES `bus_stop` (`Bus_Stop_ID`),
  ADD CONSTRAINT `bus_journey_ibfk_3` FOREIGN KEY (`Destination_Id`) REFERENCES `bus_stop` (`Bus_Stop_ID`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
