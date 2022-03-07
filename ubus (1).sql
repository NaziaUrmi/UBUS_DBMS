-- phpMyAdmin SQL Dump
-- version 4.8.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 24, 2018 at 02:03 PM
-- Server version: 10.1.32-MariaDB
-- PHP Version: 7.2.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ubus`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `a_id` int(10) NOT NULL,
  `a_name` varchar(255) NOT NULL,
  `a_pass` varchar(255) NOT NULL,
  `a_mail` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`a_id`, `a_name`, `a_pass`, `a_mail`) VALUES
(1, 'urmee', '654321', 'progyaurmee@gmail.com'),
(2, 'mahfuj', '1234', 'mahfujbabu15@gmail.com'),
(3, 'nazia', '2222', 'naziaurmi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `approve`
--

CREATE TABLE `approve` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `date_publish` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `bus`
--

CREATE TABLE `bus` (
  `bus_id` int(11) NOT NULL,
  `bus_name` varchar(255) NOT NULL,
  `bus_licence` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bus`
--

INSERT INTO `bus` (`bus_id`, `bus_name`, `bus_licence`) VALUES
(1, 'agrodut', 'agr1'),
(2, 'bhuiya', 'bhu2'),
(3, 'dhaka_chaka', 'dha3'),
(4, 'bikash', 'bik4'),
(5, 'brtc', 'brt5');

-- --------------------------------------------------------

--
-- Table structure for table `comments`
--

CREATE TABLE `comments` (
  `id` int(10) NOT NULL,
  `name` varchar(255) NOT NULL,
  `comments` text NOT NULL,
  `date_publish` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comments`
--

INSERT INTO `comments` (`id`, `name`, `comments`, `date_publish`) VALUES
(202, 'mahfuj', 'plz', '2018-09-24 04:10:36'),
(203, 'urmee', 'lkk', '2018-09-24 06:59:53');

-- --------------------------------------------------------

--
-- Table structure for table `loc`
--

CREATE TABLE `loc` (
  `ID` int(11) NOT NULL,
  `name` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `loc`
--

INSERT INTO `loc` (`ID`, `name`) VALUES
(1, 'shyamoli'),
(2, 'kakoli'),
(3, 'notunbazar'),
(4, 'linkroad'),
(5, 'airport'),
(6, 'hatirjheel');

-- --------------------------------------------------------

--
-- Table structure for table `routes`
--

CREATE TABLE `routes` (
  `r_id` int(11) NOT NULL,
  `source` int(10) NOT NULL,
  `source_lat` float NOT NULL,
  `source_long` float NOT NULL,
  `destination` int(10) NOT NULL,
  `dest_lat` float NOT NULL,
  `dest_long` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes`
--

INSERT INTO `routes` (`r_id`, `source`, `source_lat`, `source_long`, `destination`, `dest_lat`, `dest_long`) VALUES
(1, 1, 23.7718, 90.3631, 3, 23.7985, 90.4338),
(2, 1, 23.7718, 90.3631, 2, 23.7938, 90.4009),
(3, 1, 23.7718, 90.3631, 4, 23.7805, 90.4267),
(4, 2, 23.7938, 90.4009, 3, 23.7985, 90.4335),
(5, 2, 23.7938, 90.4009, 5, 23.8434, 90.4029),
(6, 4, 23.7805, 90.4267, 3, 23.7985, 90.4338),
(7, 3, 23.7985, 90.4338, 1, 23.7718, 90.3631),
(8, 3, 23.7985, 90.4338, 4, 23.7805, 90.4267),
(9, 3, 23.7985, 90.4338, 2, 23.7938, 90.4009),
(10, 4, 23.7805, 904267, 1, 23.7718, 90.3631),
(11, 2, 23.7938, 90.4009, 1, 23.7718, 90.3631),
(12, 5, 23.8434, 90.4029, 2, 23.7938, 90.4009),
(13, 4, 23, 90, 5, 23.3, 90.1),
(14, 5, 23.8, 90.5, 6, 23.2, 90.1),
(15, 6, 23.568, 90.25, 1, 23.215, 90.556),
(16, 5, 23.56, 90.24, 1, 23.65, 90.879);

-- --------------------------------------------------------

--
-- Table structure for table `routes_buses`
--

CREATE TABLE `routes_buses` (
  `routes_id` int(10) NOT NULL,
  `bus_id` int(10) NOT NULL,
  `amount` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `routes_buses`
--

INSERT INTO `routes_buses` (`routes_id`, `bus_id`, `amount`) VALUES
(1, 1, 40),
(2, 2, 25),
(3, 5, 30),
(4, 3, 20),
(4, 4, 30),
(6, 5, 5),
(7, 1, 40),
(8, 5, 5),
(9, 3, 20),
(10, 5, 30),
(11, 2, 25),
(12, 4, 30);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`) VALUES
(1, 'urmee', 'progyaurmee@gmail.com', 'e10adc3949ba59abbe56e057f20f883e'),
(2, 'nazia', 'naziaurmi22@gmail.com', '202cb962ac59075b964b07152d234b70'),
(3, 'adib', 'adib@gmail.com', 'c65fcfc7b0e015d75a0c184bb2219116'),
(4, 'nazia parvin', 'bnazzia@yahoo.com', '202cb962ac59075b964b07152d234b70'),
(5, 'mahfuj', 'abc@gmail.com', '202cb962ac59075b964b07152d234b70');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`a_id`);

--
-- Indexes for table `approve`
--
ALTER TABLE `approve`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `bus`
--
ALTER TABLE `bus`
  ADD PRIMARY KEY (`bus_id`);

--
-- Indexes for table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `loc`
--
ALTER TABLE `loc`
  ADD PRIMARY KEY (`ID`);

--
-- Indexes for table `routes`
--
ALTER TABLE `routes`
  ADD PRIMARY KEY (`r_id`);

--
-- Indexes for table `routes_buses`
--
ALTER TABLE `routes_buses`
  ADD KEY `CONSTRAINT_name` (`bus_id`),
  ADD KEY `CONSTRAINT_name1` (`routes_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `a_id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `approve`
--
ALTER TABLE `approve`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `bus`
--
ALTER TABLE `bus`
  MODIFY `bus_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=204;

--
-- AUTO_INCREMENT for table `loc`
--
ALTER TABLE `loc`
  MODIFY `ID` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `routes`
--
ALTER TABLE `routes`
  MODIFY `r_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `routes_buses`
--
ALTER TABLE `routes_buses`
  ADD CONSTRAINT `CONSTRAINT_name` FOREIGN KEY (`bus_id`) REFERENCES `bus` (`bus_id`),
  ADD CONSTRAINT `CONSTRAINT_name1` FOREIGN KEY (`routes_id`) REFERENCES `routes` (`r_id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
