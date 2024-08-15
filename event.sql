-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 04:49 AM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.1.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `event`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(25) NOT NULL,
  `username_admin` varchar(255) NOT NULL,
  `password_admin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`id_admin`, `username_admin`, `password_admin`) VALUES
(1, 'admin1', '12345'),
(2, 'admin2', '12345'),
(3, 'admin3', 'admin3');

-- --------------------------------------------------------

--
-- Table structure for table `lomba`
--

CREATE TABLE `lomba` (
  `id` int(99) NOT NULL,
  `lomba` varchar(50) NOT NULL,
  `harga` varchar(255) NOT NULL,
  `deadline` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lomba`
--

INSERT INTO `lomba` (`id`, `lomba`, `harga`, `deadline`) VALUES
(1, 'Essay', 'Rp. 50.000', '15 Sep 2022'),
(2, 'Karya Tulis Ilmiah', 'Rp. 65.000', '19 Sep 2022'),
(3, 'Jurnal', 'Rp. 65.000', '19 Sep 2022');

-- --------------------------------------------------------

--
-- Table structure for table `peserta`
--

CREATE TABLE `peserta` (
  `id` int(99) NOT NULL,
  `id_lomba` int(11) NOT NULL,
  `nama_ketua` varchar(99) NOT NULL,
  `nim_ketua` int(10) NOT NULL,
  `nama_anggota1` varchar(99) NOT NULL,
  `nim_anggota1` int(10) NOT NULL,
  `nama_anggota2` varchar(99) NOT NULL,
  `nim_anggota2` int(10) NOT NULL,
  `universitas` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `peserta`
--

INSERT INTO `peserta` (`id`, `id_lomba`, `nama_ketua`, `nim_ketua`, `nama_anggota1`, `nim_anggota1`, `nama_anggota2`, `nim_anggota2`, `universitas`) VALUES
(1, 1, 'Andalanih', 201923122, 'Andalan2', 232103122, 'Andalan3', 152648245, 'Universitas Andalas'),
(3, 3, 'Andri', 23104121, 'Nadin', 53211255, 'Samuel', 2421245, 'Universitas Negeri Jakarta'),
(4, 1, 'Rahma', 20123155, 'Randi', 231241121, 'Adrian', 2312402, 'Universitas Semarang'),
(5, 2, 'Haziqir', 19842141, 'Ikhsan', 1982312, 'Adi', 18723241, 'Universitas Negeri Jakarta'),
(6, 2, 'Arawangsa', 21982123, 'Andira', 221321234, 'Asaka', 210321445, 'Universitas Yogyakarta');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indexes for table `lomba`
--
ALTER TABLE `lomba`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `peserta`
--
ALTER TABLE `peserta`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lomba` (`id_lomba`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(25) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `lomba`
--
ALTER TABLE `lomba`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `peserta`
--
ALTER TABLE `peserta`
  MODIFY `id` int(99) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `peserta`
--
ALTER TABLE `peserta`
  ADD CONSTRAINT `peserta_ibfk_1` FOREIGN KEY (`id_lomba`) REFERENCES `lomba` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
