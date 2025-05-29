-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: May 30, 2025 at 01:01 AM
-- Server version: 10.4.24-MariaDB
-- PHP Version: 8.2.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_absensi`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_absen`
--

CREATE TABLE `tbl_absen` (
  `id_absen` varchar(20) NOT NULL,
  `id_jadwal` varchar(20) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `id_lokasi` varchar(20) DEFAULT NULL,
  `keterangan_absen` enum('masuk','libur') NOT NULL,
  `jam_masuk_absen` time NOT NULL,
  `jam_keluar_absen` time NOT NULL,
  `status` varchar(20) DEFAULT NULL,
  `lokasi_masuk` varchar(255) DEFAULT NULL,
  `lokasi_keluar` varchar(255) DEFAULT NULL,
  `jarak_masuk` int(11) DEFAULT NULL,
  `jarak_keluar` int(11) DEFAULT NULL,
  `foto_masuk` varchar(128) DEFAULT NULL,
  `foto_keluar` varchar(128) DEFAULT NULL,
  `is_delete_absen` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_absen`
--

INSERT INTO `tbl_absen` (`id_absen`, `id_jadwal`, `id_karyawan`, `id_lokasi`, `keterangan_absen`, `jam_masuk_absen`, `jam_keluar_absen`, `status`, `lokasi_masuk`, `lokasi_keluar`, `jarak_masuk`, `jarak_keluar`, `foto_masuk`, `foto_keluar`, `is_delete_absen`, `created_at`, `updated_at`) VALUES
('ABSN2025053000001', 'JDWL2025053000001', 'KRY2025051900002', 'LOK2025053000001', 'masuk', '04:59:56', '05:00:07', 'Hadir', '-6.365035403308147,106.80597819889728', '-6.365035403308147,106.80597819889728', 20, 20, 'MSK-2025-05-30_045956.png', 'KLR-2025-05-30_050007.png', '0', '2025-05-30 04:36:49', '2025-05-30 05:00:07');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji`
--

CREATE TABLE `tbl_gaji` (
  `id_gaji` varchar(20) NOT NULL,
  `id_jabatan` varchar(20) NOT NULL,
  `gaji_pokok` varchar(50) NOT NULL,
  `uang_makan` varchar(50) NOT NULL,
  `tj_kesehatan` varchar(50) NOT NULL,
  `tj_transportasi` varchar(50) NOT NULL,
  `bpjs` varchar(20) NOT NULL,
  `pajak` int(11) NOT NULL,
  `potong_gaji` varchar(30) NOT NULL,
  `is_delete_gaji` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gaji_karyawan`
--

CREATE TABLE `tbl_gaji_karyawan` (
  `id_gaji_karyawan` varchar(20) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `id_gaji` varchar(20) NOT NULL,
  `tgl_gajian` date NOT NULL,
  `bonus_gajian` varchar(20) NOT NULL,
  `total_alpha` varchar(20) NOT NULL,
  `is_delete_gaji_karyawan` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_gambar`
--

CREATE TABLE `tbl_gambar` (
  `id_gambar` varchar(30) NOT NULL,
  `nama_pt` varchar(50) NOT NULL,
  `gambar` varchar(128) NOT NULL,
  `bagian` enum('0','1','2') NOT NULL,
  `is_delete_gambar` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_izin`
--

CREATE TABLE `tbl_izin` (
  `id_izin` varchar(20) NOT NULL,
  `id_karyawan` varchar(20) NOT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_selesai` date DEFAULT NULL,
  `status_izin` enum('Cuti','Izin') NOT NULL,
  `ket_izin` varchar(50) NOT NULL,
  `status_approved` enum('0','1','2') NOT NULL,
  `is_delete_izin` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jabatan`
--

CREATE TABLE `tbl_jabatan` (
  `id_jabatan` varchar(20) NOT NULL,
  `nama_jabatan` varchar(100) NOT NULL,
  `is_delete_jabatan` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jabatan`
--

INSERT INTO `tbl_jabatan` (`id_jabatan`, `nama_jabatan`, `is_delete_jabatan`, `created_at`, `updated_at`) VALUES
('JBT2025051000001', 'HRD', '0', '2025-05-10 21:32:21', '2025-05-15 04:47:50'),
('JBT2025051200002', 'Software Enginering', '0', '2025-05-12 01:53:47', '2025-05-15 04:47:54');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_jadwal`
--

CREATE TABLE `tbl_jadwal` (
  `id_jadwal` varchar(20) NOT NULL,
  `tanggal` date NOT NULL,
  `keterangan` enum('masuk','libur') NOT NULL,
  `jam_masuk` time NOT NULL,
  `jam_keluar` time NOT NULL,
  `absen_dibuka` varchar(20) NOT NULL,
  `absen_telat` varchar(20) NOT NULL,
  `absen_alpha` varchar(20) NOT NULL,
  `is_delete_jadwal` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_jadwal`
--

INSERT INTO `tbl_jadwal` (`id_jadwal`, `tanggal`, `keterangan`, `jam_masuk`, `jam_keluar`, `absen_dibuka`, `absen_telat`, `absen_alpha`, `is_delete_jadwal`, `created_at`, `updated_at`) VALUES
('JDWL2025053000001', '2025-05-30', 'masuk', '04:55:00', '05:00:00', '30', '30', '60', '0', '2025-05-30 04:36:49', '2025-05-30 04:59:05');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` varchar(20) NOT NULL,
  `id_lokasi` varchar(20) NOT NULL,
  `nik_karyawan` varchar(20) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `atas_nama` varchar(30) NOT NULL,
  `id_jabatan` varchar(20) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `foto_karyawan` varchar(255) DEFAULT NULL,
  `is_delete_karyawan` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`id_karyawan`, `id_lokasi`, `nik_karyawan`, `nama_karyawan`, `alamat_rumah`, `no_hp`, `tgl_lahir`, `no_rek`, `nama_bank`, `atas_nama`, `id_jabatan`, `username`, `password`, `foto_karyawan`, `is_delete_karyawan`, `created_at`, `updated_at`) VALUES
('KRY2025051900002', 'LOK2025053000001', '04032002', 'dimas', 'dawda', '087879488650', '2025-05-19', '21312123411', 'BCA', 'Dimas Maulana', 'JBT2025051000001', 'dimas', '$2y$10$meat68qLlu.eperbXxDGy.2WQhRL/Mtvo6SBKlp6yBqDJMES1Zl3.', '-', '0', '2025-05-19 02:38:11', '2025-05-30 04:34:48');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_lokasi`
--

CREATE TABLE `tbl_lokasi` (
  `id_lokasi` varchar(20) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `lokasi` varchar(255) NOT NULL,
  `radius` int(11) NOT NULL,
  `is_delete_lokasi` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_lokasi`
--

INSERT INTO `tbl_lokasi` (`id_lokasi`, `nama_lokasi`, `alamat`, `lokasi`, `radius`, `is_delete_lokasi`, `created_at`, `updated_at`) VALUES
('LOK2025053000001', 'tes', 'tes', '-6.364882766587063, 106.80608486626363', 100, '0', '2025-05-30 04:34:38', '2025-05-30 04:34:38');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` varchar(20) NOT NULL,
  `nama_user` varchar(100) NOT NULL,
  `username` varchar(100) NOT NULL,
  `password` varchar(100) NOT NULL,
  `foto_user` varchar(255) NOT NULL,
  `is_delete_user` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama_user`, `username`, `password`, `foto_user`, `is_delete_user`, `created_at`, `updated_at`) VALUES
('USR001', 'admin', 'admin', '$2y$10$gDdcZRjKpeJsA4hSm9v/XuKdKP0vKUEnjAu8yldYx3BZSjPOH5z3q', 'PP-250514232209.png', '0', '2025-05-14 18:10:33', '2025-05-22 01:12:07');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_absen`
--
ALTER TABLE `tbl_absen`
  ADD PRIMARY KEY (`id_absen`);

--
-- Indexes for table `tbl_gaji`
--
ALTER TABLE `tbl_gaji`
  ADD PRIMARY KEY (`id_gaji`);

--
-- Indexes for table `tbl_gaji_karyawan`
--
ALTER TABLE `tbl_gaji_karyawan`
  ADD PRIMARY KEY (`id_gaji_karyawan`);

--
-- Indexes for table `tbl_gambar`
--
ALTER TABLE `tbl_gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `tbl_izin`
--
ALTER TABLE `tbl_izin`
  ADD PRIMARY KEY (`id_izin`);

--
-- Indexes for table `tbl_jabatan`
--
ALTER TABLE `tbl_jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `tbl_jadwal`
--
ALTER TABLE `tbl_jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`id_karyawan`);

--
-- Indexes for table `tbl_lokasi`
--
ALTER TABLE `tbl_lokasi`
  ADD PRIMARY KEY (`id_lokasi`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
