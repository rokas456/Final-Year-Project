-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Feb 10, 2016 at 09:28 PM
-- Server version: 10.1.9-MariaDB
-- PHP Version: 5.5.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `process_management_db`
--

-- --------------------------------------------------------

--
-- Table structure for table `comment`
--

CREATE TABLE `comment` (
  `id` int(11) NOT NULL,
  `process_name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `user` varchar(255) NOT NULL,
  `title` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `comment`
--

INSERT INTO `comment` (`id`, `process_name`, `description`, `user`, `title`) VALUES
(1, '1st process', 'nice process', 'tom', 'Comment process');

-- --------------------------------------------------------

--
-- Table structure for table `faultypart`
--

CREATE TABLE `faultypart` (
  `id` int(11) NOT NULL,
  `test_id` int(11) NOT NULL,
  `reason` varchar(255) NOT NULL,
  `part_name` varchar(255) NOT NULL,
  `manufacturer` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `faultypart`
--

INSERT INTO `faultypart` (`id`, `test_id`, `reason`, `part_name`, `manufacturer`) VALUES
(1, 1, 'manufacturer', 'door handle', 'sony');

-- --------------------------------------------------------

--
-- Table structure for table `machinery`
--

CREATE TABLE `machinery` (
  `id` int(11) NOT NULL,
  `plant_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL,
  `aquired_date` date NOT NULL,
  `expiry_date` date NOT NULL,
  `maintanance_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `machinery`
--

INSERT INTO `machinery` (`id`, `plant_id`, `name`, `description`, `aquired_date`, `expiry_date`, `maintanance_date`) VALUES
(1, 1, 'centrafuge', 'new centrafuge', '2015-11-11', '2015-11-26', '2015-11-18');

-- --------------------------------------------------------

--
-- Table structure for table `plant`
--

CREATE TABLE `plant` (
  `id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `plant`
--

INSERT INTO `plant` (`id`, `name`, `description`) VALUES
(1, 'Plant1', 'Big big plant');

-- --------------------------------------------------------

--
-- Table structure for table `process`
--

CREATE TABLE `process` (
  `id` int(11) NOT NULL,
  `machinery_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `process`
--

INSERT INTO `process` (`id`, `machinery_id`, `name`, `description`) VALUES
(1, 1, '1st process', 'test process');

-- --------------------------------------------------------

--
-- Table structure for table `subparts`
--

CREATE TABLE `subparts` (
  `id` int(11) NOT NULL,
  `mach_id` int(11) NOT NULL,
  `name` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `manufacturer` varchar(255) NOT NULL,
  `aquired_date` date NOT NULL,
  `expired_date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `subparts`
--

INSERT INTO `subparts` (`id`, `mach_id`, `name`, `description`, `manufacturer`, `aquired_date`, `expired_date`) VALUES
(1, 0, 'firstPart', 'new part', 'sony', '2015-11-05', '2015-11-30');

-- --------------------------------------------------------

--
-- Table structure for table `test`
--

CREATE TABLE `test` (
  `id` int(11) NOT NULL,
  `process_ids` int(11) NOT NULL,
  `process_name` varchar(255) NOT NULL,
  `possible_failure` varchar(255) NOT NULL,
  `comment` text NOT NULL,
  `part_failed` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `test`
--

INSERT INTO `test` (`id`, `process_ids`, `process_name`, `possible_failure`, `comment`, `part_failed`) VALUES
(1, 1, '1st process', 'Training', 'no clue', 'handle');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `email`, `role`) VALUES
(41, 'a', '$2y$10$YzdiZTVhNTYyYTVhYzdlMOxQahKXlOPxPOcu4U5bnBv3MIf8/g6KG', 'rokas.lukosevicius@mycit.ie', 'Admin'),
(42, 'rokas', '$2y$10$Yzg3OGZiY2VlMTkxZDIzNu6y.GONMWAFJaC7ke1If/T2CcjGn5jcG', 'rokas.lukosevicius@mycit.ie', 'Admin'),
(43, 'rokas', '$2y$10$NzU2MDJhNTFjOTJhNDU3NebRkWPhEtaKgmpPs2PtmqsxdnwAb2/ZS', 'rokas.lukosevicius@myct.ie', 'Admin'),
(44, 'rokas', '$2y$10$MzQwNGI5ZWE0MmM2NGMzZOvpNseV1I1..5ppNc4wfn6QeD9YYPaN6', 'rokas.lukosevicius@myct.ie', 'Site Assesor'),
(45, 'peter', '$2y$10$ZjgwMjcyZTAxZjMwY2Y0MOfxRmeIJA6i4o7ni4ZUnxdecX71Ei.ou', 'rokas.lukosevicius@myct.ie', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `comment`
--
ALTER TABLE `comment`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `faultypart`
--
ALTER TABLE `faultypart`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `machinery`
--
ALTER TABLE `machinery`
  ADD PRIMARY KEY (`id`),
  ADD KEY `plant_id` (`plant_id`);

--
-- Indexes for table `plant`
--
ALTER TABLE `plant`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `process`
--
ALTER TABLE `process`
  ADD PRIMARY KEY (`id`),
  ADD KEY `machinery_id` (`machinery_id`);

--
-- Indexes for table `subparts`
--
ALTER TABLE `subparts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mach_id` (`mach_id`);

--
-- Indexes for table `test`
--
ALTER TABLE `test`
  ADD PRIMARY KEY (`id`),
  ADD KEY `process_ids` (`process_ids`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `comment`
--
ALTER TABLE `comment`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `faultypart`
--
ALTER TABLE `faultypart`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `machinery`
--
ALTER TABLE `machinery`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=111;
--
-- AUTO_INCREMENT for table `plant`
--
ALTER TABLE `plant`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=211;
--
-- AUTO_INCREMENT for table `process`
--
ALTER TABLE `process`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;
--
-- AUTO_INCREMENT for table `subparts`
--
ALTER TABLE `subparts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `test`
--
ALTER TABLE `test`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=46;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `test`
--
ALTER TABLE `test`
  ADD CONSTRAINT `test_ibfk_1` FOREIGN KEY (`process_ids`) REFERENCES `process` (`id`);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
