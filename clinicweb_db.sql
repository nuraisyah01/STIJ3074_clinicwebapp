-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 29, 2024 at 11:59 PM
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
-- Database: `clinicweb_db`
--
CREATE DATABASE IF NOT EXISTS `clinicweb_db` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `clinicweb_db`;

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

DROP TABLE IF EXISTS `users`;
CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `address` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `name`, `email`, `password`, `phone`, `address`) VALUES
(11, 'Siti Nur Aisyah Binti Abdullah', 'nuraisyah.na0409@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '0125926073', 'A7, Kampung Belakan Pekan Junjung, 09000, Kulim, Kedah'),
(12, 'Nik Hanis', 'nik@gmail.com', 'b9427c43b36c92cb06e7b91f106ea06b9877a4b3', '0174407540', 'uum, sintok'),
(13, 'Izzatul', 'izza@gmail.com', 'ca2b059b77ed9e5531686ecf34d7f0c7c202f950', '0112343423', 'pendang, kedah'),
(14, 'Nur Nisha', 'nisha@gmail.com', 'f4686d01675d6d2d095d031a7b85e9362c45a6c5', '0193764523', 'No 12, Jalan A, Taman B'),
(15, 'Farhan Rashid', 'farhan@gmail.com', '76b6aa5a388456c87bfbf513b5d8e4f3c423badd', '0167528653', 'uum, sintok'),
(16, 'Ecah', 'jennie.hardwarex@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '0182783827', 'jalan b, taman s'),
(17, 'Puteri Hanis Binti Mohd Ruduwan', 'puterihaniss19@gmail.com', '0d184253fe35153487c88b802dbd82c87ec85dfe', '0172680927', 'No 32 Jln Sg, Taman Sri Gombak, 68100 Batu Caves, Selangor');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
