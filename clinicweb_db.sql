-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 29, 2024 at 01:18 AM
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
-- Table structure for table `tbl_services`
--

DROP TABLE IF EXISTS `tbl_services`;
CREATE TABLE `tbl_services` (
  `service_id` int(11) NOT NULL,
  `service_name` varchar(255) NOT NULL,
  `service_description` text DEFAULT NULL,
  `service_price` decimal(10,2) NOT NULL,
  `service_fulldesc` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `tbl_services`
--

INSERT INTO `tbl_services` (`service_id`, `service_name`, `service_description`, `service_price`, `service_fulldesc`) VALUES
(1, 'General Consultation', 'A basic health consultation to assess your general health.', 50.00, 'Experience thorough medical attention and personalized care with our skilled doctors.\r\nReceive expert medical advice tailored to your health concerns.\r\nAddress routine check-ups, chronic condition management, and preventive care strategies.\r\nAccess comprehensive health assessments and guidance for your well-being.'),
(2, 'Dental Cleaning', 'Professional dental cleaning to maintain oral hygiene.', 30.00, 'Maintain optimal oral health with professional dental cleaning services.\r\nRemove plaque, tartar, and stains for a thorough clean.\r\nPromote gum health and receive personalized oral hygiene education.\r\nEnsure a bright and healthy smile through regular visits to our clinic.'),
(3, 'Vaccination', 'Routine vaccinations are vital for maintaining public health.', 60.00, 'Protect yourself and your family with essential vaccinations.\r\nAdminister a range of vaccines recommended by health authorities.\r\nEnsure immunizations for children, adults, and travelers.\r\nProvide a safe environment for receiving vaccinations with expert guidance.'),
(4, 'Physical Therapy', 'Therapeutic exercises to improve physical health.', 100.00, 'Restore mobility, alleviate pain, and enhance physical function.\r\nReceive personalized treatment plans tailored to your needs and goals.\r\nUtilize evidence-based techniques for effective rehabilitation.\r\nSupport recovery from surgery, chronic conditions, and injuries.'),
(5, 'Blood Test', 'Comprehensive blood tests detect numerous health conditions.', 70.00, 'Gain insights into your health with comprehensive blood testing services.\r\nConduct lipid profiles, glucose levels, and complete blood counts, among others.\r\nEnsure accuracy and reliability in diagnostics for informed medical decisions.\r\nReceive timely interventions based on diagnostic results.'),
(6, 'X-Ray', 'Diagnostic imaging offers detailed internal body views.', 150.00, 'Obtain precise diagnostic imaging with advanced X-ray technology.\r\nCapture detailed images of internal structures for medical diagnosis.\r\nEvaluate bone fractures, joint health, and respiratory conditions.\r\nMaintain high standards of safety and patient comfort during imaging procedures.');

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
(17, 'Puteri Hanis Binti Mohd Ruduwan', 'puterihaniss19@gmail.com', '0d184253fe35153487c88b802dbd82c87ec85dfe', '0172680927', 'No 32 Jln Sg, Taman Sri Gombak, 68100 Batu Caves, Selangor'),
(19, 'Ali bin Abu', 'ali@gmail.com', 'e697ef18d3fa82e0fcd427a989a86c694b547c64', '0193764523', 'No 41, Taman Jelutong, Kulim, Kedah'),
(20, 'Nur Aisyah', 'aisyah@gmail.com', '6367c48dd193d56ea7b0baad25b19455e529f5ee', '0143740904', 'uum, sintok'),
(21, 'Abu bin Ahmad', 'abu@gmail.com', '0b57bbbe6bc57309ce0e273753b947d60ad46b5b', '0112354672', 'uum, sintok');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_services`
--
ALTER TABLE `tbl_services`
  ADD PRIMARY KEY (`service_id`);

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
-- AUTO_INCREMENT for table `tbl_services`
--
ALTER TABLE `tbl_services`
  MODIFY `service_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
