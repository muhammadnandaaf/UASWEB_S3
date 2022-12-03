-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 15, 2022 at 03:55 AM
-- Server version: 10.4.25-MariaDB
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `uts_pweb`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin_crud`
--

CREATE TABLE `admin_crud` (
  `id` int(11) NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `disease` varchar(25) NOT NULL,
  `descr` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_crud`
--

INSERT INTO `admin_crud` (`id`, `gambar`, `disease`, `descr`) VALUES
(2, 'headicon.png', 'Kepala', 'Penyakit Kepala'),
(6, 'kidneyicon.png', 'Ginjal', 'Penyakit Ginjal');

-- --------------------------------------------------------

--
-- Table structure for table `admin_login`
--

CREATE TABLE `admin_login` (
  `admin_name` varchar(100) NOT NULL,
  `admin_pass` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `admin_login`
--

INSERT INTO `admin_login` (`admin_name`, `admin_pass`) VALUES
('admin', 'admin');

-- --------------------------------------------------------

--
-- Table structure for table `reglog`
--

CREATE TABLE `reglog` (
  `id` int(11) NOT NULL,
  `username` varchar(225) NOT NULL,
  `email` varchar(50) NOT NULL,
  `pass` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `reglog`
--

INSERT INTO `reglog` (`id`, `username`, `email`, `pass`) VALUES
(8, 'user', 'user@gmail.com', 'user'),
(9, 'pengguna', 'pengguna', 'user'),
(10, 'kata', 'kata', '$2y$10$hQCJZ/svNhaLaXUo8ojdSu.UeUSIdIPrTLf5DmzoEgL'),
(11, 'nama', 'winezkey@gmail.com', '$2y$10$auVEPeexNd0plDVxNzD1g.Pn5nymqvj1kbxBbPlpS3gCk.bGHEtLy');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin_crud`
--
ALTER TABLE `admin_crud`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `reglog`
--
ALTER TABLE `reglog`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin_crud`
--
ALTER TABLE `admin_crud`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `reglog`
--
ALTER TABLE `reglog`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
