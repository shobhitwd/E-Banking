-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2020 at 11:05 AM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 5.6.36

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `info`
--

-- --------------------------------------------------------

--
-- Table structure for table `customers`
--

CREATE TABLE `customers` (
  `ID` int(255) NOT NULL,
  `Name` varchar(255) NOT NULL,
  `Age` int(255) NOT NULL,
  `Email` varchar(255) NOT NULL,
  `Mobile` varchar(255) NOT NULL,
  `BankBalance` varchar(255) NOT NULL,
  `City` varchar(255) NOT NULL,
  `Image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customers`
--

INSERT INTO `customers` (`ID`, `Name`, `Age`, `Email`, `Mobile`, `BankBalance`, `City`, `Image`) VALUES
(1, 'Shobhit Pathak', 19, 'shobhit@gmail.com', '9998885557', '25544000', 'Indore', 'images/shobhit.jpg'),
(2, 'Kamlesh Ujjaini', 25, 'kamlesh@gmail.com', '7778889990', '600000', 'Dewas', 'images/f3.jpg'),
(3, 'Vimlesh Chouhan', 30, 'vimlesh@gmail.com', '8889995550', '700050', 'Indore', 'images/t2.jpg'),
(4, 'Ramesh Kumar', 22, 'ranesh@gmail.com', '8569584748', '200000', 'Indore', 'images/t4.jpg'),
(5, 'Surili Jain', 27, 'suresh@gmail.com', '9321478523', '30500', 'Dewas', 'images/f2.jpg'),
(6, 'Pari Shukla', 19, 'paritosh@gmail.com', '9574815263', '500000', 'Indore', 'images/t1.jpg'),
(7, 'Amiti Kothari', 36, 'amit@yahoo.com', '7015236589', '6000000', 'Ujjain', 'images/t3.jpg'),
(8, 'Prakash D\'Souza', 42, 'prakash@gmail.com', '8563212369', '70000000', 'Indore', 'images/t6.jpg'),
(9, 'Diljit Singh', 26, 'diljit@gmail.com', '8696932145', '5000000', 'Indore', 'images/t5.jpg'),
(10, 'Jayesh Sharma', 26, 'jayesh@yandex.com', '7854125369', '4000000', 'Dewas', 'images/t7.jpg');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `customers`
--
ALTER TABLE `customers`
  ADD PRIMARY KEY (`ID`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `customers`
--
ALTER TABLE `customers`
  MODIFY `ID` int(255) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
