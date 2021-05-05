-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 05, 2021 at 11:08 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `pabw`
--

-- --------------------------------------------------------

--
-- Table structure for table `ipk`
--

CREATE TABLE `ipk` (
  `semester` bigint(20) NOT NULL,
  `ip` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `ipk`
--

INSERT INTO `ipk` (`semester`, `ip`) VALUES
(1, '3.85'),
(2, '3.80'),
(3, '3.89');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `email` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `nama` text NOT NULL,
  `nim` text NOT NULL,
  `kelas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`email`, `password`, `nama`, `nim`, `kelas`) VALUES
('frhchika@gmail.com', '$2y$10$HjGAg6LW1Y/3k31FKHw.wuHYgNGJ1qllF1MaABofkCcc4xVhKSEB.', 'Farah Chika Audina', '6701190012', 'D3SI-43-03');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ipk`
--
ALTER TABLE `ipk`
  ADD PRIMARY KEY (`semester`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`email`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
