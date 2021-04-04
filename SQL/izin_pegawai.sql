-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Apr 04, 2021 at 07:26 AM
-- Server version: 10.4.17-MariaDB
-- PHP Version: 7.4.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `hrms`
--

-- --------------------------------------------------------

--
-- Table structure for table `izin_pegawai`
--

CREATE TABLE `izin_pegawai` (
  `izin_pegawai_id` int(11) NOT NULL,
  `izin_id` int(11) DEFAULT NULL,
  `pegawai_id` int(11) DEFAULT NULL,
  `tanggal_awal` date DEFAULT NULL,
  `tanggal_akhir` date DEFAULT NULL,
  `keterangan` varchar(100) DEFAULT NULL,
  `file` longtext DEFAULT NULL,
  `status` varchar(10) DEFAULT NULL,
  `created_at` datetime NOT NULL,
  `update_at` timestamp NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `izin_pegawai`
--

INSERT INTO `izin_pegawai` (`izin_pegawai_id`, `izin_id`, `pegawai_id`, `tanggal_awal`, `tanggal_akhir`, `keterangan`, `file`, `status`, `created_at`, `update_at`) VALUES
(1, 2, 14, '2021-04-23', '2021-04-30', 'no', NULL, 'Diterima', '0000-00-00 00:00:00', '2021-04-04 04:42:36');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `izin_pegawai`
--
ALTER TABLE `izin_pegawai`
  ADD PRIMARY KEY (`izin_pegawai_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `izin_pegawai`
--
ALTER TABLE `izin_pegawai`
  MODIFY `izin_pegawai_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
