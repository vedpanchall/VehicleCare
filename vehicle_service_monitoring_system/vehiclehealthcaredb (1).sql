-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 25, 2024 at 08:38 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `vehiclehealthcaredb`
--

-- --------------------------------------------------------

--
-- Table structure for table `appointments`
--

CREATE TABLE `appointments` (
  `id` int(11) NOT NULL,
  `vehicle_number` varchar(20) NOT NULL,
  `service_type` varchar(50) NOT NULL,
  `preferred_datetime` datetime NOT NULL,
  `state` varchar(50) NOT NULL,
  `additional_comments` text DEFAULT NULL,
  `pickup` enum('Yes','No') DEFAULT NULL,
  `drop_off` enum('Yes','No') DEFAULT NULL,
  `pickup_drop_address` varchar(255) DEFAULT NULL,
  `city` varchar(11) DEFAULT NULL,
  `area` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `appointments`
--

INSERT INTO `appointments` (`id`, `vehicle_number`, `service_type`, `preferred_datetime`, `state`, `additional_comments`, `pickup`, `drop_off`, `pickup_drop_address`, `city`, `area`) VALUES
(12, 'MH 02 ED 0775', 'inspection', '2024-06-29 07:34:00', 'Gujarat', 'gas lekage', 'Yes', 'No', 'near gas station', 'Navsari', 'Jay Jalaram'),
(13, 'MH 02 ED 0775', 'inspection', '2024-06-30 00:32:00', 'Maharashtra', 'shueirt', 'Yes', 'No', 'erwerwe', 'Pune', 'Shaw Toyota'),
(14, 'MH 02 ED 0775', 'repairs', '2024-06-27 07:37:00', 'Rajasthan', 'gas lekage and petrol', 'No', 'Yes', 'asdsff', 'Jodhpur', 'Om S S Car '),
(15, 'GJ 21 AH 2929', 'inspection', '2024-06-28 02:41:00', 'Maharashtra', 'change oil and color of car', 'Yes', 'No', 'near jio plazza', 'Nagpur', 'Modern Tyre'),
(16, 'GJ 21 AH 2929', 'repairs', '2024-06-08 14:46:00', 'Gujarat', 'light change and make a new design of bumper', 'Yes', 'No', 'Near government school', 'Navsari', 'Jay Jalaram');

-- --------------------------------------------------------

--
-- Table structure for table `city`
--

CREATE TABLE `city` (
  `City_ID` text NOT NULL,
  `City_Name` varchar(40) NOT NULL,
  `State_ID` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `city`
--

INSERT INTO `city` (`City_ID`, `City_Name`, `State_ID`) VALUES
('1', 'Navsari', '1'),
('2', 'Surat', '1'),
('3', 'Ahmedabad', '1'),
('4', 'Nagpur', '2'),
('5', 'Pune', '2'),
('6', 'Thane', '2'),
('7', 'Jaisalmer', '3'),
('8', 'Jodhpur', '3'),
('9', 'Udaipur', '3');

-- --------------------------------------------------------

--
-- Table structure for table `service_center`
--

CREATE TABLE `service_center` (
  `ID` int(11) NOT NULL,
  `center_name` varchar(50) NOT NULL,
  `area_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `service_center`
--

INSERT INTO `service_center` (`ID`, `center_name`, `area_id`) VALUES
(1, 'Jay Jalaram Auto Spares', 1),
(2, 'Khodiyar Motors.', 1),
(3, ' Castrol Auto Service - Devi ', 2),
(4, 'Jalaram Automobiles ', 2),
(5, 'G M Motors', 2),
(6, 'Khushi Automobile', 3),
(7, 'Ram Auto Care', 3),
(8, 'Ashok Motors', 3),
(8, 'Nagpur Auto Works and Car Ac', 4),
(9, 'Modern Tyers and Services. ', 4),
(10, 'Unnati Motors', 4),
(11, ' Shaw Toyota. ', 5),
(12, 'Kothari Hyundai.', 5),
(13, 'Shreenath Motors. ', 6),
(14, ' Ritu Nissan PVT Limited', 6),
(15, 'Mahadev Automobiles', 7),
(16, 'Swastik Wheel Alignment And Service Centre.', 7),
(17, 'Shree Krishna Motors', 8),
(18, ' Om S S Car Services.', 8),
(19, 'Shree Ram Motors', 8),
(20, 'Ratan TATA Leyland Automobiles. ', 9),
(21, 'Auto 360', 9);

-- --------------------------------------------------------

--
-- Table structure for table `state`
--

CREATE TABLE `state` (
  `State_ID` text NOT NULL,
  `State_Name` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `state`
--

INSERT INTO `state` (`State_ID`, `State_Name`) VALUES
('1', 'Gujarat'),
('2', 'Maharastra'),
('3', 'Rajasthan');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `First_name` varchar(30) NOT NULL,
  `Last_name` varchar(30) NOT NULL,
  `email` varchar(40) NOT NULL,
  `password` text NOT NULL,
  `state` varchar(50) NOT NULL,
  `city` varchar(25) NOT NULL,
  `Phone_Number` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`First_name`, `Last_name`, `email`, `password`, `state`, `city`, `Phone_Number`) VALUES
('ved', 'pachal', 'dhruvtailor02@gmail.com', '213245679', '2', '5', '5682678264'),
('abc', 'xyz', 'abc@gmail.com', '235689741', '2', '5', '7600110097'),
('ved', 'pachal', 'cse.220843131004@gmail.com', '568923147', '1', '2', '5898984657'),
('ved', 'mistry', 'cse.220843131008@gmail.com', '5478897', '1', '3', '345557569');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `appointments`
--
ALTER TABLE `appointments`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `appointments`
--
ALTER TABLE `appointments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
