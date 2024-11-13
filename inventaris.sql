-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Nov 13, 2024 at 04:49 AM
-- Server version: 10.4.32-MariaDB
-- PHP Version: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `merek_id` int(11) NOT NULL,
  `kategori_id` int(11) NOT NULL,
  `nama_barang` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `stok` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `merek_id`, `kategori_id`, `nama_barang`, `keterangan`, `stok`) VALUES
(14, 13, 8, 'Kursi Plastik', 'Kursi Untuk Acara/Umum', 100),
(15, 14, 9, 'Kursi kerja', 'Kursi Karyawan RPTRA', 6),
(16, 14, 10, 'Meja Kerja', 'Meja Karyawan RPTRA', 6),
(17, 14, 18, 'Filling Cabinet', 'Lemari Penyimpanan', 1),
(18, 15, 11, 'Digital Projector', 'Digital Projector', 1),
(19, 15, 11, 'Layar Projector', 'Null', 0),
(20, 17, 11, 'Komputer/PC', 'Null', 0),
(21, 16, 11, 'Printer', 'Printer Kantor', 1),
(22, 33, 7, 'Standing White Board', 'Papan Tulis Geser', 3),
(23, 33, 7, 'Papan Tulis', 'Papan Tulis Tetap', 1),
(24, 18, 11, 'AC 1 PK', 'Pendingin Ruangan', 2),
(25, 19, 11, 'Kipas Angin', 'Kipas Angin', 2),
(26, 20, 19, 'Jam Dinding', 'Jam Dinding RPTRA', 1),
(27, 33, 11, 'Kabel Rol', 'Kabel Roll', 3),
(28, 18, 11, 'Standing Dispenser', 'Dispenser Elektrik', 1),
(29, 21, 12, 'Galon', 'Galon Air Mineral', 2),
(30, 22, 11, 'Sound System Portable', 'Sound System', 1),
(31, 23, 11, 'WiFi', 'Internet RPTRA', 1),
(32, 24, 11, 'CCTV', 'CCTV', 0),
(33, 33, 13, 'APAR', 'Alat Pemdam Api Ringan', 1),
(34, 22, 11, 'Kulkas', 'Kulkas Karyawan', 1),
(35, 14, 19, 'Sofa', 'Sofa Umum', 2),
(36, 33, 19, 'Meja Bayi', 'Meja Untuk Bayi', 1),
(37, 26, 19, 'Wastafel', 'Wastafel', 4),
(38, 14, 19, 'Rak Buku', 'Rak Penyimpanan Buku', 2),
(39, 28, 14, 'Lego', 'Lego Anak', 2),
(40, 29, 16, 'Organ/Piano', 'Piano', 1),
(41, 30, 14, 'Ayunan', 'Ayunan', 1),
(42, 30, 14, 'Perosotan', 'Perosotan Anak', 1),
(43, 30, 14, 'Jungkat Jungkit', 'Jungkat Jungkit anak', 0),
(44, 33, 19, 'Bola Dunia', 'Globe', 0),
(45, 30, 14, 'Mangkok Puter', 'Mangkok Puter anak', 0),
(46, 30, 14, 'PlayGround', 'Area Bermain Anak', 6),
(47, 30, 14, 'Jembatan Keseimbangan', 'PlayGround Anak', 0),
(48, 31, 15, 'Alat Olahraga Fitness', 'Gym Umum', 0),
(49, 31, 15, 'Gawang Futsal', 'Gawang Futsal', 2),
(50, 31, 15, 'Gawang Basket', 'Gawang Basket', 0),
(51, 31, 15, 'Tiang Voli/Badminton', 'untuk voli/badminton', 2),
(52, 31, 15, 'Meja Ping Pong', 'Meja Ping Pong', 2),
(53, 32, 17, 'Hidroponik RPTRA', 'Tanaman Hidroponik', 3);

-- --------------------------------------------------------

--
-- Table structure for table `barang_keluar`
--

CREATE TABLE `barang_keluar` (
  `idbarang_keluar` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_keluar`
--

INSERT INTO `barang_keluar` (`idbarang_keluar`, `barang_id`, `jumlah`, `keterangan`, `tanggal`) VALUES
(1, 1, 1, 'Rusak', '2020-11-26'),
(2, 6, 1, 'Ruang Aula', '2024-11-09'),
(3, 21, 1, 'Rusak', '2024-11-12'),
(4, 24, 1, 'Rusak', '2024-11-12'),
(5, 28, 1, 'Rusak', '2024-11-12'),
(6, 29, 2, 'Rusak', '2024-11-12'),
(7, 32, 1, 'Rusak', '2024-11-12'),
(8, 43, 1, 'Rusak', '2024-11-12');

--
-- Triggers `barang_keluar`
--
DELIMITER $$
CREATE TRIGGER `kurang_stok` AFTER INSERT ON `barang_keluar` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok - new.jumlah WHERE idbarang = new.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `idbarang_masuk` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `keterangan` varchar(256) NOT NULL,
  `tanggal` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`idbarang_masuk`, `barang_id`, `jumlah`, `keterangan`, `tanggal`) VALUES
(1, 4, 10, 'Beli Baru', '2020-11-24'),
(2, 1, 3, 'Beli baru', '2020-11-23'),
(3, 3, 2, 'Beli baru', '2020-11-24'),
(4, 6, 1, 'Ruang Perpustakaan', '2024-11-09'),
(5, 6, 2, 'Ruang Aula', '2024-11-09'),
(6, 7, 10, 'Komputer Umum', '2024-11-09'),
(7, 9, 10, 'Kursi Staff', '2024-11-09'),
(9, 53, 3, 'Area Penghijauan Outdoor', '2024-11-12'),
(10, 52, 2, 'Area Olahraga', '2024-11-12'),
(11, 51, 2, 'Area Olahraga', '2024-11-12'),
(12, 49, 2, 'Area Olahraga', '2024-11-12'),
(13, 46, 6, 'Area Bermain', '2024-11-12'),
(14, 43, 1, 'Area Bermain', '2024-11-12'),
(15, 42, 1, 'Area Bermain', '2024-11-12'),
(16, 41, 1, 'Area Bermain', '2024-11-12'),
(17, 40, 1, 'Ruang Serbaguna', '2024-11-12'),
(18, 39, 2, 'Area Bermain', '2024-11-12'),
(19, 38, 2, 'Ruang Baca', '2024-11-12'),
(20, 37, 4, 'Seluruh RPTRA', '2024-11-12'),
(21, 36, 1, 'Ruang Serbaguna', '2024-11-12'),
(22, 35, 2, 'Ruang Serbaguna', '2024-11-12'),
(23, 34, 1, 'Pantry', '2024-11-12'),
(24, 33, 1, 'Ruang Serbaguna', '2024-11-12'),
(25, 32, 1, 'Seluruh RPTRA', '2024-11-12'),
(26, 31, 1, 'Seluruh RPTRA', '2024-11-12'),
(27, 30, 1, 'Ruang Serbaguna', '2024-11-12'),
(28, 29, 4, 'Pantry', '2024-11-12'),
(29, 28, 2, 'Pantry', '2024-11-12'),
(30, 27, 3, 'Ruang Serbaguna', '2024-11-12'),
(31, 26, 1, 'Ruang Serbaguna', '2024-11-12'),
(32, 25, 2, 'Ruang Serbaguna', '2024-11-12'),
(33, 24, 2, 'Ruang Serbaguna', '2024-11-12'),
(34, 24, 1, 'Ruang Sekretariat RPTRA', '2024-11-12'),
(35, 23, 1, 'Ruang Sekretariat RPTRA', '2024-11-12'),
(36, 22, 3, 'Ruang Serbaguna', '2024-11-12'),
(37, 21, 2, 'Ruang Sekretariat RPTRA', '2024-11-12'),
(38, 18, 1, 'Ruang Sekretariat RPTRA', '2024-11-12'),
(39, 17, 1, 'Ruang Sekretariat RPTRA', '2024-11-12'),
(40, 16, 6, 'Ruang Sekretariat RPTRA', '2024-11-12'),
(41, 15, 6, 'Ruang Sekretariat RPTRA', '2024-11-12'),
(42, 14, 100, 'Ruang Serbaguna', '2024-11-12');

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `tambah_stok` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE barang SET stok = stok + new.jumlah WHERE idbarang = new.barang_id;
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `idkategori` int(11) NOT NULL,
  `nama_kategori` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`idkategori`, `nama_kategori`, `keterangan`) VALUES
(7, 'ATK', 'Alat Tulis Kantor'),
(8, 'Kursi Umum', 'Kursi PLastik'),
(9, 'Kursi Kerja', 'Kursi Ikea'),
(10, 'Meja Kerja', 'Meja Pekerja'),
(11, 'Elektronik', 'Barang Elektronik'),
(12, 'Pantry', 'Kebutuhan Pantry Seperti Galon dll'),
(13, 'Safety', 'Alat Kemanan'),
(14, 'Area Bermain', 'Playground'),
(15, 'Area Olahraga', 'Gym Umum'),
(16, 'Alat Musik', 'Gitar dll'),
(17, 'Area Penghijauan', 'Hidroponik'),
(18, 'Penyimpanan', 'Cabinet dll'),
(19, 'Area Umum', 'Untuk Umum');

-- --------------------------------------------------------

--
-- Table structure for table `merek`
--

CREATE TABLE `merek` (
  `idmerek` int(11) NOT NULL,
  `nama_merek` varchar(128) NOT NULL,
  `keterangan` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `merek`
--

INSERT INTO `merek` (`idmerek`, `nama_merek`, `keterangan`) VALUES
(13, 'Napolly', 'Prabot Plastik Seperti Kursi dll'),
(14, 'Ikea', 'Prabot seperti Kursi Kerja dan Meja Kerja'),
(15, 'HP', 'Elektronik'),
(16, 'Canon', 'Elektronik'),
(17, 'Asus', 'Elektronik'),
(18, 'Sharp', 'Elektronik'),
(19, 'Miyako', 'Elektronik'),
(20, 'Seiko', 'Elektronik'),
(21, 'Aqua', 'Galon'),
(22, 'Polytron', 'Elektronik'),
(23, 'Indihome', 'Wifi'),
(24, 'HikVision', 'Elektronik'),
(25, 'Apar', 'Keselamatan'),
(26, 'ToTo', 'Kamar Kecil'),
(27, 'Safety', 'P3K'),
(28, 'Lego', 'Mainan'),
(29, 'Yamaha', 'Alat Musik'),
(30, 'PlayGround', 'Area Bermain'),
(31, 'Alat Olahraga', 'Area Olahraga'),
(32, 'Hidroponik', 'Penghijauan'),
(33, 'Tanpa Merek/Tidak Diketahui', 'Null');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id_users` int(5) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` enum('admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1 COLLATE=latin1_swedish_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id_users`, `nama`, `no_hp`, `username`, `password`, `level`) VALUES
(3, 'Administrator', '082248577297', 'admin', '$2y$10$E33mbIeZc665JZiGOIwCMunuLcI.YnlIzMvGoqgPWflEykvFGFTAK', 'admin'),
(15, 'Said Muhammad Sahal Assegaff', '089661788423', 'sahalassgff', '$2y$10$Ta.tGRFCC4Xi/X/3B4acruvhFqEBWof6wQABjKCYBBjpBSLXQt9gq', 'admin'),
(17, 'RPTRA Cibubur Berseri', '089661788423', 'cibubur_berseri', '$2y$10$exygRo71N5JrMQ.bFzXqmuRX0rJBpLTL7nEjsujRhvewzftAXjhCe', 'admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`);

--
-- Indexes for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  ADD PRIMARY KEY (`idbarang_keluar`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`idbarang_masuk`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indexes for table `merek`
--
ALTER TABLE `merek`
  ADD PRIMARY KEY (`idmerek`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_users`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=54;

--
-- AUTO_INCREMENT for table `barang_keluar`
--
ALTER TABLE `barang_keluar`
  MODIFY `idbarang_keluar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `idbarang_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=43;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `idkategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `merek`
--
ALTER TABLE `merek`
  MODIFY `idmerek` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=34;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id_users` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
