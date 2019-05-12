-- phpMyAdmin SQL Dump
-- version 4.8.5
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: May 09, 2019 at 06:22 AM
-- Server version: 10.1.38-MariaDB
-- PHP Version: 7.3.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `fuzzy3`
--

-- --------------------------------------------------------

--
-- Table structure for table `data`
--

CREATE TABLE `data` (
  `data_id` int(11) NOT NULL,
  `data_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data`
--

INSERT INTO `data` (`data_id`, `data_nama`) VALUES
(4, 'Alvriyanto'),
(5, 'Azis'),
(6, 'Ratih'),
(7, 'Nur'),
(8, 'Fatimah');

-- --------------------------------------------------------

--
-- Table structure for table `data_relasi`
--

CREATE TABLE `data_relasi` (
  `data_relasi_id` int(11) NOT NULL,
  `data_relasi_data` int(11) NOT NULL,
  `data_relasi_variabel` int(11) NOT NULL,
  `data_relasi_nilai` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `data_relasi`
--

INSERT INTO `data_relasi` (`data_relasi_id`, `data_relasi_data`, `data_relasi_variabel`, `data_relasi_nilai`) VALUES
(12, 4, 8, '45'),
(13, 4, 9, '17'),
(15, 5, 8, '28'),
(16, 5, 9, '23'),
(18, 6, 8, '31'),
(19, 6, 9, '31'),
(21, 7, 8, '40'),
(22, 7, 9, '18'),
(24, 8, 8, '34'),
(25, 8, 9, '27');

-- --------------------------------------------------------

--
-- Table structure for table `derajat`
--

CREATE TABLE `derajat` (
  `derajat_id` int(11) NOT NULL,
  `derajat_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `derajat`
--

INSERT INTO `derajat` (`derajat_id`, `derajat_nama`) VALUES
(1, 'awal'),
(2, 'tengah_awal'),
(3, 'tengah_akhir'),
(4, 'akhir');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `kategori_id` int(11) NOT NULL,
  `kategori_variabel` int(11) NOT NULL,
  `kategori_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`kategori_id`, `kategori_variabel`, `kategori_nama`) VALUES
(10, 8, 'Muda'),
(11, 8, 'Dewasa'),
(12, 8, 'Tua'),
(13, 9, 'Baru'),
(14, 9, 'Sedang'),
(15, 9, 'Lama');

-- --------------------------------------------------------

--
-- Table structure for table `keanggotaan`
--

CREATE TABLE `keanggotaan` (
  `keanggotaan_id` int(11) NOT NULL,
  `keanggotaan_variabel` int(11) NOT NULL,
  `keanggotaan_data` int(11) NOT NULL,
  `keanggotaan_kategori` int(11) NOT NULL,
  `keanggotaan_nilai` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `keanggotaan`
--

INSERT INTO `keanggotaan` (`keanggotaan_id`, `keanggotaan_variabel`, `keanggotaan_data`, `keanggotaan_kategori`, `keanggotaan_nilai`) VALUES
(211, 8, 4, 10, '0'),
(212, 8, 4, 11, '0.6'),
(213, 8, 4, 12, '0.4'),
(214, 8, 5, 10, '0.46'),
(215, 8, 5, 11, '0.53'),
(216, 8, 5, 12, '0'),
(217, 8, 6, 10, '0.26'),
(218, 8, 6, 11, '0.73'),
(219, 8, 6, 12, '0'),
(220, 8, 7, 10, '0'),
(221, 8, 7, 11, '0.8'),
(222, 8, 7, 12, '0.2'),
(223, 8, 8, 10, '0.06'),
(224, 8, 8, 11, '0.93'),
(225, 8, 8, 12, '0'),
(226, 9, 4, 13, '0.37'),
(227, 9, 4, 14, '0.62'),
(228, 9, 4, 15, '0'),
(229, 9, 5, 13, '0'),
(230, 9, 5, 14, '0.8'),
(231, 9, 5, 15, '0.2'),
(232, 9, 6, 13, '0'),
(233, 9, 6, 14, '0.26'),
(234, 9, 6, 15, '0.73'),
(235, 9, 7, 13, '0.25'),
(236, 9, 7, 14, '0.75'),
(237, 9, 7, 15, '0'),
(238, 9, 8, 13, '0'),
(239, 9, 8, 14, '0.53'),
(240, 9, 8, 15, '0.46');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `pengguna_username` varchar(50) NOT NULL,
  `pengguna_password` varchar(32) NOT NULL,
  `pengguna_nama` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`pengguna_username`, `pengguna_password`, `pengguna_nama`) VALUES
('azisalvriyanto', 'dfa3e0429b7f161f0d9551773e9a3765', 'Alvriyanto Azis');

-- --------------------------------------------------------

--
-- Table structure for table `variabel`
--

CREATE TABLE `variabel` (
  `variabel_id` int(11) NOT NULL,
  `variabel_nama` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variabel`
--

INSERT INTO `variabel` (`variabel_id`, `variabel_nama`) VALUES
(9, 'Masa Kerja'),
(8, 'Usia');

-- --------------------------------------------------------

--
-- Table structure for table `variabel_relasi`
--

CREATE TABLE `variabel_relasi` (
  `variabel_relasi_id` int(11) NOT NULL,
  `variabel_relasi_variabel` int(11) NOT NULL,
  `variabel_relasi_kategori` int(11) NOT NULL,
  `variabel_relasi_derajat` int(11) NOT NULL,
  `variabel_relasi_nilai` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `variabel_relasi`
--

INSERT INTO `variabel_relasi` (`variabel_relasi_id`, `variabel_relasi_variabel`, `variabel_relasi_kategori`, `variabel_relasi_derajat`, `variabel_relasi_nilai`) VALUES
(33, 8, 10, 1, ''),
(34, 8, 10, 2, ''),
(35, 8, 10, 3, '20'),
(36, 8, 10, 4, '35'),
(37, 8, 11, 1, '20'),
(38, 8, 11, 2, '35'),
(39, 8, 11, 3, '35'),
(40, 8, 11, 4, '60'),
(41, 8, 12, 1, '35'),
(42, 8, 12, 2, '60'),
(43, 8, 12, 3, ''),
(44, 8, 12, 4, ''),
(45, 9, 13, 1, ''),
(46, 9, 13, 2, ''),
(47, 9, 13, 3, '12'),
(48, 9, 13, 4, '20'),
(49, 9, 14, 1, '12'),
(50, 9, 14, 2, '20'),
(51, 9, 14, 3, '20'),
(52, 9, 14, 4, '35'),
(53, 9, 15, 1, '20'),
(54, 9, 15, 2, '35'),
(55, 9, 15, 3, ''),
(56, 9, 15, 4, '');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `data`
--
ALTER TABLE `data`
  ADD PRIMARY KEY (`data_id`);

--
-- Indexes for table `data_relasi`
--
ALTER TABLE `data_relasi`
  ADD PRIMARY KEY (`data_relasi_id`),
  ADD KEY `data_relasi_data` (`data_relasi_data`),
  ADD KEY `data_relasi_variabel` (`data_relasi_variabel`);

--
-- Indexes for table `derajat`
--
ALTER TABLE `derajat`
  ADD PRIMARY KEY (`derajat_id`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`kategori_id`),
  ADD KEY `kategori_variabel` (`kategori_variabel`);

--
-- Indexes for table `keanggotaan`
--
ALTER TABLE `keanggotaan`
  ADD PRIMARY KEY (`keanggotaan_id`),
  ADD KEY `keanggotaan_data` (`keanggotaan_data`),
  ADD KEY `keanggotaan_kategori` (`keanggotaan_kategori`),
  ADD KEY `keanggotaan_variabel` (`keanggotaan_variabel`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`pengguna_username`);

--
-- Indexes for table `variabel`
--
ALTER TABLE `variabel`
  ADD PRIMARY KEY (`variabel_id`),
  ADD UNIQUE KEY `variabel_nama` (`variabel_nama`);

--
-- Indexes for table `variabel_relasi`
--
ALTER TABLE `variabel_relasi`
  ADD PRIMARY KEY (`variabel_relasi_id`),
  ADD KEY `variabel_relasi_variabel` (`variabel_relasi_variabel`),
  ADD KEY `variabel_relasi_kategori` (`variabel_relasi_kategori`),
  ADD KEY `variabel_relasi_derajat` (`variabel_relasi_derajat`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `data`
--
ALTER TABLE `data`
  MODIFY `data_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `data_relasi`
--
ALTER TABLE `data_relasi`
  MODIFY `data_relasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `derajat`
--
ALTER TABLE `derajat`
  MODIFY `derajat_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `kategori_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT for table `keanggotaan`
--
ALTER TABLE `keanggotaan`
  MODIFY `keanggotaan_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=241;

--
-- AUTO_INCREMENT for table `variabel`
--
ALTER TABLE `variabel`
  MODIFY `variabel_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `variabel_relasi`
--
ALTER TABLE `variabel_relasi`
  MODIFY `variabel_relasi_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=57;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `data_relasi`
--
ALTER TABLE `data_relasi`
  ADD CONSTRAINT `data_relasi_data` FOREIGN KEY (`data_relasi_data`) REFERENCES `data` (`data_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `data_relasi_variabel` FOREIGN KEY (`data_relasi_variabel`) REFERENCES `variabel` (`variabel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `kategori`
--
ALTER TABLE `kategori`
  ADD CONSTRAINT `kategori_variabel` FOREIGN KEY (`kategori_variabel`) REFERENCES `variabel` (`variabel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `keanggotaan`
--
ALTER TABLE `keanggotaan`
  ADD CONSTRAINT `keanggotaan_data` FOREIGN KEY (`keanggotaan_data`) REFERENCES `data` (`data_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keanggotaan_kategori` FOREIGN KEY (`keanggotaan_kategori`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `keanggotaan_variabel` FOREIGN KEY (`keanggotaan_variabel`) REFERENCES `variabel` (`variabel_id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `variabel_relasi`
--
ALTER TABLE `variabel_relasi`
  ADD CONSTRAINT `variabel_relasi_derajat` FOREIGN KEY (`variabel_relasi_derajat`) REFERENCES `derajat` (`derajat_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `variabel_relasi_kategori` FOREIGN KEY (`variabel_relasi_kategori`) REFERENCES `kategori` (`kategori_id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `variabel_relasi_variabel` FOREIGN KEY (`variabel_relasi_variabel`) REFERENCES `variabel` (`variabel_id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
