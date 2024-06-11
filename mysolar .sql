-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 08, 2024 at 09:17 PM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `mysolar`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `nname` varchar(100) NOT NULL,
  `hours` float NOT NULL,
  `llprice` int(50) NOT NULL,
  `reminingamounts` int(11) NOT NULL,
  `continuedamount` int(11) NOT NULL,
  `ddate` date NOT NULL,
  `keyManager` int(10) NOT NULL,
  `id` int(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`nname`, `hours`, `llprice`, `reminingamounts`, `continuedamount`, `ddate`, `keyManager`, `id`) VALUES
('رشيد ', 4, 14000, 0, 14000, '2024-05-08', 1, 85),
('علي الحمري', 5.5, 19250, 2000, 17250, '2024-05-07', 1, 86),
('محمد زين الحمري', 20, 70000, 2000, 68000, '2024-05-01', 1, 87),
('رشيد ', 4, 14000, 0, 14000, '2024-05-14', 3, 91),
('رشيد', 2, 4000, 0, 4000, '2024-05-30', 1, 92);

-- --------------------------------------------------------

--
-- Table structure for table `manager`
--

CREATE TABLE `manager` (
  `mang_id` int(6) NOT NULL,
  `mang_name` varchar(250) NOT NULL,
  `password` varchar(60) NOT NULL,
  `mang_email` varchar(200) NOT NULL,
  `hour` int(9) NOT NULL,
  `active` int(1) NOT NULL DEFAULT 1,
  `inter` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `manager`
--

INSERT INTO `manager` (`mang_id`, `mang_name`, `password`, `mang_email`, `hour`, `active`, `inter`) VALUES
(1, 'محمد زين الحمري', '603780e06e641837ce42d6a2d5812554', 'mohammedzainalhomri@gmail.com', 2000, 1, 'mohammed'),
(2, 'saleh', '5249ee8e0cff02ad6b4cc0ee0e50b7d1', 'mohammed@email.com', 3500, 1, ''),
(3, 'saleh', 'c44e503833b64e9f27197a484f4257c0', 'm2@email.com', 35000, 1, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `manager`
--
ALTER TABLE `manager`
  ADD PRIMARY KEY (`mang_id`),
  ADD UNIQUE KEY `password` (`password`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id` int(50) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=94;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
