-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 30, 2024 at 11:28 PM
-- Server version: 10.4.28-MariaDB
-- PHP Version: 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `onlinerealestatecommission`
--

-- --------------------------------------------------------

--
-- Table structure for table `payments`
--

CREATE TABLE `payments` (
  `paymentid` int(11) NOT NULL,
  `transactionid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL,
  `method` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `payments`
--

INSERT INTO `payments` (`paymentid`, `transactionid`, `date`, `amount`, `method`) VALUES
(1, 1, '2024-02-17', 50000.00, 'Credit Card'),
(5, 3, '2023-09-05', 5000.00, 'bank');

-- --------------------------------------------------------

--
-- Table structure for table `property`
--

CREATE TABLE `property` (
  `propertyid` int(11) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `price` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `property`
--

INSERT INTO `property` (`propertyid`, `address`, `type`, `price`) VALUES
(1, '123 Main St, Cityville, USA', 'House', 250000.00),
(2, '456 Elm St, Townsville, USA', 'Apartment', 150000.00);

-- --------------------------------------------------------

--
-- Table structure for table `realestateagents`
--

CREATE TABLE `realestateagents` (
  `agentid` int(11) NOT NULL,
  `name` varchar(255) DEFAULT NULL,
  `phone` varchar(20) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `realestateagents`
--

INSERT INTO `realestateagents` (`agentid`, `name`, `phone`, `email`) VALUES
(1, 'John Doe', '123-456-7890', 'john.doe@example.com'),
(2, 'Jane Smith', '987-654-3210', 'jane.smith@example.com'),
(3, 'sderf', '345', 'sdfggsdfhg'),
(4, 'loulou', '07896543', 'lou@gmail.com'),
(5, 'pilo', '89075', 'pi@gmail.com'),
(6, 'sdfgh', '987654', 'srty'),
(7, 'qwefg', '23456', 'asdfg'),
(8, 'abi', '34567', 'abi@gmail.com');

-- --------------------------------------------------------

--
-- Table structure for table `transaction`
--

CREATE TABLE `transaction` (
  `transactionid` int(11) NOT NULL,
  `userid` int(11) DEFAULT NULL,
  `propertyid` int(11) DEFAULT NULL,
  `date` date DEFAULT NULL,
  `amount` decimal(10,2) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `transaction`
--

INSERT INTO `transaction` (`transactionid`, `userid`, `propertyid`, `date`, `amount`) VALUES
(1, 1, 101, '2024-02-16', 150000.00),
(2, 2, 102, '2024-02-17', 200000.00),
(3, 2, 1, '2021-03-06', 1000.00),
(4, 7, 4, '2020-03-04', 2000.00),
(5, 4, 4, '2023-04-05', 34567.00),
(6, 4, 5, '2023-03-02', 2987.00);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `firstname` varchar(50) DEFAULT NULL,
  `lastname` varchar(50) DEFAULT NULL,
  `username` varchar(50) DEFAULT NULL,
  `email` varchar(100) DEFAULT NULL,
  `telephone` varchar(20) DEFAULT NULL,
  `password` varchar(100) DEFAULT NULL,
  `creationdate` timestamp NOT NULL DEFAULT current_timestamp(),
  `activation_code` varchar(50) DEFAULT NULL,
  `is_activated` tinyint(1) DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `firstname`, `lastname`, `username`, `email`, `telephone`, `password`, `creationdate`, `activation_code`, `is_activated`) VALUES
(1, 'Louange', 'Abijuru', '222006680', 'abijurulouange2@gmail.com', '0786309921', '$2y$10$5IsiAhJhPGabOQtm7ZcIUutlUCskqUwFHg/rzNk/BCn2Zz9wcu14O', '2024-04-30 13:58:18', '12345', 0),
(2, 'Joella ', 'Uwineza', '11111', 'joella@gmail.com', '123545', '$2y$10$MBwcA653xdDyx/sFoK0EN.ImtW/npwS0TWRR5XQWKxCoGRNXkborO', '2024-04-30 14:01:30', '2345', 0),
(3, 'Rita', 'Baraka', '22222', 'rita@gmail.com', '4456789', '$2y$10$xf85E/iBCEF6Sn4lZG.J/eWEYS32rU.7GeNMcG0IpNX5dyMCpMNDG', '2024-04-30 14:04:00', '2344', 0),
(4, 'Aline', 'Nshuti', 'aline', 'aline@gmail.com', '456778', '$2y$10$lf4ogjKhlQsbJqf5LEuz9eRnIZg3cGgfgXL6UXwcWKd6k4L78rDka', '2024-04-30 19:58:15', '2345678', 0);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `userid` int(11) NOT NULL,
  `username` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `gender` enum('Male','Female','Other') DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`userid`, `username`, `email`, `gender`) VALUES
(1, 'JohnDoe', 'john.doe@example.com', 'Male'),
(2, 'JaneSmith', 'jane.smith@example.com', 'Female'),
(3, 'jojo', 'jojo@gmail.com', 'Female'),
(4, 'bin', 'bin@gmail.com', 'Male'),
(5, 'jklo', 'kj@gmail.com', 'Female'),
(6, 'ertyu', 'erty', 'Male');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `payments`
--
ALTER TABLE `payments`
  ADD PRIMARY KEY (`paymentid`);

--
-- Indexes for table `property`
--
ALTER TABLE `property`
  ADD PRIMARY KEY (`propertyid`);

--
-- Indexes for table `realestateagents`
--
ALTER TABLE `realestateagents`
  ADD PRIMARY KEY (`agentid`);

--
-- Indexes for table `transaction`
--
ALTER TABLE `transaction`
  ADD PRIMARY KEY (`transactionid`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`userid`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `payments`
--
ALTER TABLE `payments`
  MODIFY `paymentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `property`
--
ALTER TABLE `property`
  MODIFY `propertyid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `realestateagents`
--
ALTER TABLE `realestateagents`
  MODIFY `agentid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transaction`
--
ALTER TABLE `transaction`
  MODIFY `transactionid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `userid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
