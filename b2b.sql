-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 24, 2024 at 03:59 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 7.4.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `b2b`
--

-- --------------------------------------------------------

--
-- Table structure for table `Business`
--

CREATE TABLE `Business` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` text NOT NULL,
  `phone` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Business`
--

INSERT INTO `Business` (`id`, `email`, `username`, `phone`) VALUES
(1, 'rusaka@gmail.com', 'karim', '0791447409'),
(2, 'rusaka@gmail.com', 'Brarudi', '078945684');

-- --------------------------------------------------------

--
-- Table structure for table `Orders`
--

CREATE TABLE `Orders` (
  `rowid` int(11) NOT NULL,
  `businessId` int(11) NOT NULL,
  `agentId` int(11) NOT NULL,
  `productId` int(11) NOT NULL,
  `qty` int(11) NOT NULL,
  `status` text NOT NULL DEFAULT 'PENDING',
  `date` datetime NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Orders`
--

INSERT INTO `Orders` (`rowid`, `businessId`, `agentId`, `productId`, `qty`, `status`, `date`) VALUES
(2, 1, 2, 4, 30, 'PENDING', '2024-01-23 10:36:21'),
(3, 1, 2, 3, 15, 'RETURNED', '2024-01-23 10:37:40'),
(4, 1, 2, 4, 5, 'PENDING', '2024-01-23 10:38:17'),
(5, 1, 2, 1, 10, 'PENDING', '2024-01-23 10:39:53'),
(6, 1, 2, 3, 3, 'PENDING', '2024-01-23 10:40:03'),
(7, 1, 2, 1, 3, 'PENDING', '2024-01-23 10:40:47'),
(8, 1, 2, 1, 6, 'PENDING', '2024-01-23 10:41:13'),
(9, 1, 2, 4, 5, 'RECEIVED', '2024-01-24 01:12:37'),
(10, 1, 2, 1, 15, 'PENDING', '2024-01-24 01:28:41'),
(11, 1, 2, 1, 15, 'SENT', '2024-01-24 01:28:50'),
(12, 1, 2, 1, 15, 'RETURNED', '2024-01-24 01:29:33'),
(13, 1, 2, 1, 15, 'RETURNED', '2024-01-24 01:30:05'),
(14, 1, 2, 1, 15, 'RETURNED', '2024-01-24 01:30:37'),
(15, 1, 2, 3, 5, 'RECEIVED', '2024-01-24 01:31:07'),
(16, 2, 2, 1, 5, 'SENT', '2024-01-24 15:54:00');

-- --------------------------------------------------------

--
-- Table structure for table `Product`
--

CREATE TABLE `Product` (
  `rowid` int(11) NOT NULL,
  `ref` text NOT NULL,
  `label` text NOT NULL,
  `price` text NOT NULL,
  `qty` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Product`
--

INSERT INTO `Product` (`rowid`, `ref`, `label`, `price`, `qty`) VALUES
(1, 'Fanta', 'Fanta', '1500', '25'),
(3, 'Citron', 'Fanta ', '1500', '20'),
(4, 'Orange', 'Fanta ', '2500', '35'),
(5, 'primus', 'beer', '2500', '50'),
(6, 'Primus Petit', 'beer', '2500', '50'),
(7, 'Primus Big', 'beer', '5000', '50');

-- --------------------------------------------------------

--
-- Table structure for table `State`
--

CREATE TABLE `State` (
  `status` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `State`
--

INSERT INTO `State` (`status`) VALUES
('PENDING'),
('SENT'),
('RECEIVED'),
('RETURNED');

-- --------------------------------------------------------

--
-- Table structure for table `Stock`
--

CREATE TABLE `Stock` (
  `rowid` int(11) NOT NULL,
  `date` datetime NOT NULL,
  `prod_id` int(11) NOT NULL,
  `status` text NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `Users`
--

CREATE TABLE `Users` (
  `id` int(11) NOT NULL,
  `email` text NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` text DEFAULT NULL,
  `accountType` tinyint(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `Users`
--

INSERT INTO `Users` (`id`, `email`, `username`, `password`, `phone`, `accountType`) VALUES
(1, 'admin@admin.com', 'admin', 'admin', NULL, 1),
(2, 'karim@gmail.com', 'Karim', '123456', '0791447409', 0),
(3, 'abdoul@gmail.com', 'abdoul', '123456', '0791447409', 0),
(4, 'hakim@gmail.com', 'hakim', '123456', '0791447409', 0),
(5, 'marah@gmail.cm', 'marah', '123456', '0785426431', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `Business`
--
ALTER TABLE `Business`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `Orders`
--
ALTER TABLE `Orders`
  ADD PRIMARY KEY (`rowid`);

--
-- Indexes for table `Product`
--
ALTER TABLE `Product`
  ADD PRIMARY KEY (`rowid`);

--
-- Indexes for table `Stock`
--
ALTER TABLE `Stock`
  ADD PRIMARY KEY (`rowid`);

--
-- Indexes for table `Users`
--
ALTER TABLE `Users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `Business`
--
ALTER TABLE `Business`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `Orders`
--
ALTER TABLE `Orders`
  MODIFY `rowid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `Product`
--
ALTER TABLE `Product`
  MODIFY `rowid` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `Stock`
--
ALTER TABLE `Stock`
  MODIFY `rowid` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `Users`
--
ALTER TABLE `Users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
