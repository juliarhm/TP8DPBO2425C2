-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 18, 2025 at 03:37 PM
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
-- Database: `tp_mvc25`
--

-- --------------------------------------------------------

--
-- Table structure for table `lecturers`
--

CREATE TABLE `lecturers` (
  `id` int(11) NOT NULL,
  `name` varchar(100) NOT NULL,
  `nidn` varchar(20) NOT NULL,
  `phone` varchar(15) DEFAULT NULL,
  `join_date` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `lecturers`
--

INSERT INTO `lecturers` (`id`, `name`, `nidn`, `phone`, `join_date`) VALUES
(1, 'Dr. Budi Santoso, S.Kom., M.T.', '0415058001', '081234567890', '2010-08-17'),
(2, 'Prof. Dr. Irma Sari, M.Sc.', '0420107502', '087765432109', '1998-03-25'),
(3, 'Fajar Ramadhan, Ph.D.', '0405029003', '085898765432', '2019-11-10'),
(4, 'Siti Nurmala, M.Kom.', '0412128504', '081122334455', '2015-01-20'),
(5, 'Ir. Tono Widodo, M.T.', '0418077005', '089900112233', '2005-06-01');

-- --------------------------------------------------------

--
-- Table structure for table `penelitian`
--

CREATE TABLE `penelitian` (
  `id` int(11) NOT NULL,
  `judul_penelitian` varchar(255) NOT NULL,
  `bidang` varchar(100) NOT NULL,
  `tahun` year(4) DEFAULT NULL,
  `id_lecturers` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penelitian`
--

INSERT INTO `penelitian` (`id`, `judul_penelitian`, `bidang`, `tahun`, `id_lecturers`) VALUES
(1, 'Pengembangan Sistem Deteksi Spam Menggunakan Metode Deep Learning', 'Artificial Intelligence', '2023', 1),
(2, 'Analisis Efektivitas Penggunaan Blockchain pada Sektor Ritel', 'Teknologi Informasi', '2024', 3),
(3, 'Perancangan Model Simulasi Gempa Bumi Berbasis IoT', 'Ilmu Komputer', '2022', 2),
(4, 'Studi Komparatif Metode Pengajaran Hybrid Learning di Perguruan Tinggi', 'Pendidikan', '2023', 4),
(5, 'Optimasi Algoritma Penentuan Rute Terpendek untuk Logistik', 'Riset Operasi', '2024', 5),
(6, 'Tinjauan Kualitas Data Citra Satelit Resolusi Tinggi Pasca-Bencana', 'Remote Sensing', '2023', 2),
(7, 'Implementasi Jaringan Syaraf Tiruan untuk Prediksi Harga Saham', 'Fintech', '2024', 1);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `lecturers`
--
ALTER TABLE `lecturers`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_lecturers` (`id_lecturers`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `lecturers`
--
ALTER TABLE `lecturers`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `penelitian`
--
ALTER TABLE `penelitian`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `penelitian`
--
ALTER TABLE `penelitian`
  ADD CONSTRAINT `penelitian_ibfk_1` FOREIGN KEY (`id_lecturers`) REFERENCES `lecturers` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
