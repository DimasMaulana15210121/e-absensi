-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 11, 2025 at 12:26 PM
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
('ABSN2025061100001', 'JDWL2025061100001', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100002', 'JDWL2025061100001', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100003', 'JDWL2025061100001', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100004', 'JDWL2025061100002', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100005', 'JDWL2025061100002', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', 'Izin', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100006', 'JDWL2025061100002', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100007', 'JDWL2025061100003', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100008', 'JDWL2025061100003', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', 'Izin', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100009', 'JDWL2025061100003', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', 'Izin', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100010', 'JDWL2025061100004', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100011', 'JDWL2025061100004', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', 'Izin', NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100012', 'JDWL2025061100004', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100013', 'JDWL2025061100005', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100014', 'JDWL2025061100005', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100015', 'JDWL2025061100005', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100016', 'JDWL2025061100006', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100017', 'JDWL2025061100006', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100018', 'JDWL2025061100006', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100019', 'JDWL2025061100007', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100020', 'JDWL2025061100007', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100021', 'JDWL2025061100007', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100022', 'JDWL2025061100008', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100023', 'JDWL2025061100008', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100024', 'JDWL2025061100008', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100025', 'JDWL2025061100009', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100026', 'JDWL2025061100009', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100027', 'JDWL2025061100009', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100028', 'JDWL2025061100010', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100029', 'JDWL2025061100010', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100030', 'JDWL2025061100010', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100031', 'JDWL2025061100011', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100032', 'JDWL2025061100011', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100033', 'JDWL2025061100011', 'KRY2025060200004', 'LOK2025053000001', 'masuk', '17:20:36', '00:00:00', 'Terlambat', '-6.368188422582521,106.80597283993282', NULL, 367, NULL, 'MSK-2025-06-11_172036.png', NULL, '0', '2025-06-11 16:52:34', '2025-06-11 17:20:36'),
('ABSN2025061100034', 'JDWL2025061100012', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100035', 'JDWL2025061100012', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100036', 'JDWL2025061100012', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100037', 'JDWL2025061100013', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100038', 'JDWL2025061100013', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100039', 'JDWL2025061100013', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100040', 'JDWL2025061100014', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100041', 'JDWL2025061100014', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100042', 'JDWL2025061100014', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100043', 'JDWL2025061100015', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100044', 'JDWL2025061100015', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100045', 'JDWL2025061100015', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100046', 'JDWL2025061100016', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100047', 'JDWL2025061100016', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100048', 'JDWL2025061100016', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100049', 'JDWL2025061100017', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100050', 'JDWL2025061100017', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100051', 'JDWL2025061100017', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100052', 'JDWL2025061100018', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100053', 'JDWL2025061100018', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100054', 'JDWL2025061100018', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100055', 'JDWL2025061100019', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100056', 'JDWL2025061100019', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100057', 'JDWL2025061100019', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100058', 'JDWL2025061100020', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100059', 'JDWL2025061100020', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100060', 'JDWL2025061100020', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100061', 'JDWL2025061100021', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100062', 'JDWL2025061100021', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100063', 'JDWL2025061100021', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100064', 'JDWL2025061100022', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100065', 'JDWL2025061100022', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100066', 'JDWL2025061100022', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100067', 'JDWL2025061100023', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100068', 'JDWL2025061100023', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100069', 'JDWL2025061100023', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100070', 'JDWL2025061100024', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100071', 'JDWL2025061100024', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100072', 'JDWL2025061100024', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100073', 'JDWL2025061100025', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100074', 'JDWL2025061100025', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100075', 'JDWL2025061100025', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100076', 'JDWL2025061100026', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100077', 'JDWL2025061100026', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100078', 'JDWL2025061100026', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100079', 'JDWL2025061100027', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100080', 'JDWL2025061100027', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100081', 'JDWL2025061100027', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100082', 'JDWL2025061100028', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100083', 'JDWL2025061100028', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100084', 'JDWL2025061100028', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100085', 'JDWL2025061100029', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100086', 'JDWL2025061100029', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100087', 'JDWL2025061100029', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100088', 'JDWL2025061100030', 'KRY2025051900002', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100089', 'JDWL2025061100030', 'KRY2025060200003', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('ABSN2025061100090', 'JDWL2025061100030', 'KRY2025060200004', NULL, 'masuk', '00:00:00', '00:00:00', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34');

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

--
-- Dumping data for table `tbl_gaji`
--

INSERT INTO `tbl_gaji` (`id_gaji`, `id_jabatan`, `gaji_pokok`, `uang_makan`, `tj_kesehatan`, `tj_transportasi`, `bpjs`, `pajak`, `potong_gaji`, `is_delete_gaji`, `created_at`, `updated_at`) VALUES
('GJI2025060100001', 'JBT2025051000001', '10000000', '100000', '150000', '120000', '200000', 5, '100000', '0', '2025-06-01 20:35:48', '2025-06-02 14:30:02'),
('GJI2025060200002', 'JBT2025051200002', '6000000', '50000', '150000', '100000', '400000', 5, '100000', '0', '2025-06-02 00:32:20', '2025-06-02 00:32:20');

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

--
-- Dumping data for table `tbl_gaji_karyawan`
--

INSERT INTO `tbl_gaji_karyawan` (`id_gaji_karyawan`, `id_karyawan`, `id_gaji`, `tgl_gajian`, `bonus_gajian`, `total_alpha`, `is_delete_gaji_karyawan`, `created_at`, `updated_at`) VALUES
('GJK2025060200001', 'KRY2025051900002', 'GJI2025060100001', '2025-06-30', '1100000', '0', '0', '2025-06-02 01:08:23', '2025-06-02 01:08:23'),
('GJK2025060200002', 'KRY2025060200003', 'GJI2025060200002', '2025-06-30', '500000', '0', '0', '2025-06-02 01:08:39', '2025-06-02 01:08:39'),
('GJK2025060200003', 'KRY2025060200004', 'GJI2025060200002', '2025-06-30', '1000000', '26', '0', '2025-06-02 14:35:10', '2025-06-02 14:35:10');

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

--
-- Dumping data for table `tbl_gambar`
--

INSERT INTO `tbl_gambar` (`id_gambar`, `nama_pt`, `gambar`, `bagian`, `is_delete_gambar`, `created_at`, `updated_at`) VALUES
('GMB2025060200001', 'PT. Kostzy', 'LOGO-250602140823.png', '0', '0', '2025-06-02 14:08:23', '2025-06-02 14:11:36'),
('GMB2025060200002', 'PT. Kostzy', 'LOGO-250602144710.png', '2', '0', '2025-06-02 14:47:10', '2025-06-02 14:47:10'),
('GMB2025060200003', 'PT. Kostzy', 'LOGO-250602151125.png', '1', '0', '2025-06-02 15:11:25', '2025-06-02 15:11:25');

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
  `ket_pengajuan` varchar(50) NOT NULL,
  `status_approved` enum('0','1','2') NOT NULL,
  `is_delete_izin` enum('0','1') NOT NULL,
  `created_at` datetime NOT NULL,
  `updated_at` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tbl_izin`
--

INSERT INTO `tbl_izin` (`id_izin`, `id_karyawan`, `tgl_mulai`, `tgl_selesai`, `status_izin`, `ket_izin`, `ket_pengajuan`, `status_approved`, `is_delete_izin`, `created_at`, `updated_at`) VALUES
('IZN2025060200001', 'KRY2025060200003', '2025-06-02', '2025-06-04', 'Izin', 'Kondangan', '', '1', '0', '2025-06-02 00:54:01', '2025-06-02 00:58:14'),
('IZN2025060200002', 'KRY2025060200004', '2025-06-03', '2025-06-03', 'Izin', 'Sakit', 'Pengajuan Diterima', '1', '0', '2025-06-02 14:54:39', '2025-06-02 14:57:55'),
('IZN2025060200003', 'KRY2025060200004', '2025-06-04', '2025-06-04', 'Cuti', 'abc', 'Anda sudah menggunakan jatah cuti anda bulan ini', '2', '0', '2025-06-02 15:00:43', '2025-06-02 15:01:07');

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
('JBT2025051000001', 'HRD', '0', '2025-05-10 21:32:21', '2025-06-01 17:59:43'),
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
('JDWL2025061100001', '2025-06-01', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100002', '2025-06-02', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100003', '2025-06-03', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100004', '2025-06-04', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100005', '2025-06-05', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100006', '2025-06-06', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100007', '2025-06-07', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100008', '2025-06-08', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100009', '2025-06-09', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100010', '2025-06-10', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100011', '2025-06-11', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100012', '2025-06-12', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100013', '2025-06-13', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100014', '2025-06-14', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100015', '2025-06-15', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100016', '2025-06-16', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100017', '2025-06-17', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100018', '2025-06-18', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100019', '2025-06-19', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100020', '2025-06-20', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100021', '2025-06-21', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100022', '2025-06-22', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100023', '2025-06-23', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100024', '2025-06-24', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100025', '2025-06-25', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100026', '2025-06-26', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100027', '2025-06-27', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100028', '2025-06-28', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100029', '2025-06-29', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34'),
('JDWL2025061100030', '2025-06-30', 'masuk', '16:50:00', '18:00:00', '30', '10', '300', '0', '2025-06-11 16:52:34', '2025-06-11 16:52:34');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `id_karyawan` varchar(20) NOT NULL,
  `id_lokasi` varchar(20) NOT NULL,
  `id_jabatan` varchar(20) NOT NULL,
  `nik_karyawan` varchar(20) NOT NULL,
  `nama_karyawan` varchar(100) NOT NULL,
  `alamat_rumah` text NOT NULL,
  `no_hp` varchar(30) NOT NULL,
  `tgl_lahir` varchar(20) NOT NULL,
  `no_rek` varchar(30) NOT NULL,
  `nama_bank` varchar(30) NOT NULL,
  `atas_nama` varchar(30) NOT NULL,
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

INSERT INTO `tbl_karyawan` (`id_karyawan`, `id_lokasi`, `id_jabatan`, `nik_karyawan`, `nama_karyawan`, `alamat_rumah`, `no_hp`, `tgl_lahir`, `no_rek`, `nama_bank`, `atas_nama`, `username`, `password`, `foto_karyawan`, `is_delete_karyawan`, `created_at`, `updated_at`) VALUES
('KRY2025051900002', 'LOK2025060200002', 'JBT2025051000001', '04032002', 'Dimas Maulana', 'dawda', '087879488650', '2025-05-19', '21312123412', 'BCA', 'Dimas Maulana', 'dimas', '$2y$10$meat68qLlu.eperbXxDGy.2WQhRL/Mtvo6SBKlp6yBqDJMES1Zl3.', 'PP-250601123552.png', '0', '2020-05-19 02:38:11', '2025-06-02 00:42:13'),
('KRY2025060200003', 'LOK2025053000001', 'JBT2025051200002', '7210371289', 'Karyawan Baru', 'abudbawubudhaw', '0878231213', '2003-10-11', '089721782312', 'BCA', 'tes', 'tes', '$2y$10$y/ioiVmq6FzPyKPwcfifHuumhZppjTZAf/./4zsDzFheZBndby0x6', '-', '0', '2025-06-02 00:37:16', '2025-06-02 00:53:15'),
('KRY2025060200004', 'LOK2025053000001', 'JBT2025051200002', '2121312', 'Dimas', 'alamat', '0878231213', '2025-06-02', '0897217823', 'BCA', 'dimas', 'dimasm', '$2y$10$/9jda3bcAPNl7g383uHZeeE8oa0LUq2ybiP/h.OvcVa.wUvGOIklO', '-', '0', '2010-06-02 14:15:25', '2025-06-02 14:15:25');

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
('LOK2025053000001', 'Lokasi 1', 'Jl. Moh. Kafi II No.77, RT.4/RW.7, Tanah Baru, Kecamatan Beji, Kota Depok, Jawa Barat 16426', '-6.364882766587063, 106.80608486626363', 1000, '0', '2025-05-30 04:34:38', '2025-06-11 17:20:24'),
('LOK2025060200002', 'Kantor Pusat', 'JL.Tugu Tanah Baru', '-6.366513139578313, 106.80746210752788', 100, '0', '2025-06-02 00:41:35', '2025-06-02 00:41:58');

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
('USR001', 'Admin', 'admin', '$2y$10$gDdcZRjKpeJsA4hSm9v/XuKdKP0vKUEnjAu8yldYx3BZSjPOH5z3q', 'PP-250514232209.png', '0', '2025-05-14 18:10:33', '2025-06-02 13:39:54');

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
