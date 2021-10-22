-- phpMyAdmin SQL Dump
-- version 5.0.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Oct 22, 2021 at 01:57 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `ceknomorpenipu`
--

-- --------------------------------------------------------

--
-- Table structure for table `bukti`
--

CREATE TABLE `bukti` (
  `id` int(11) NOT NULL,
  `id_bukti` varchar(30) NOT NULL,
  `bukti` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `pelapor`
--

CREATE TABLE `pelapor` (
  `id` int(11) NOT NULL,
  `nomor_telepon` varchar(15) NOT NULL,
  `nama_pelapor` varchar(255) NOT NULL,
  `tgl_kejadian` date NOT NULL,
  `keterangan` text NOT NULL,
  `id_bukti` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bukti`
--
ALTER TABLE `bukti`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_bukti` (`id_bukti`,`bukti`);

--
-- Indexes for table `pelapor`
--
ALTER TABLE `pelapor`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id_bukti` (`id_bukti`),
  ADD KEY `nomor_telepon` (`nomor_telepon`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `bukti`
--
ALTER TABLE `bukti`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=202;

--
-- AUTO_INCREMENT for table `pelapor`
--
ALTER TABLE `pelapor`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=182;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
