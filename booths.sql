-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jan 12, 2023 at 10:33 AM
-- Server version: 10.4.22-MariaDB
-- PHP Version: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `booths`
--

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `detail_booth_id` bigint(20) UNSIGNED NOT NULL,
  `image_file` text DEFAULT NULL,
  `warna_booth` varchar(20) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `hasil_custom` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama_depan` varchar(100) NOT NULL,
  `nama_belakang` varchar(100) NOT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota_id` bigint(20) UNSIGNED DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id`, `nama_depan`, `nama_belakang`, `no_telp`, `alamat`, `kota_id`, `created_at`, `updated_at`) VALUES
(4, 'Aris', 'Pranata', '0818021115', 'Jl Tamiajeng 56', 276, '2022-12-11 11:18:58', '2023-01-12 02:23:50'),
(5, 'Hayday', 'Haymoon', '98888', 'Jl Tenggilisx', 49, '2023-01-11 20:28:46', '2023-01-12 01:40:41');

-- --------------------------------------------------------

--
-- Table structure for table `detail_booth`
--

CREATE TABLE `detail_booth` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `jenis_booth_id` bigint(20) UNSIGNED NOT NULL,
  `ukuran` varchar(50) NOT NULL,
  `harga` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_booth`
--

INSERT INTO `detail_booth` (`id`, `jenis_booth_id`, `ukuran`, `harga`, `created_at`, `updated_at`) VALUES
(1, 1, '10*20*464', 75000, NULL, NULL),
(2, 1, '110*30*450', 150000, NULL, NULL),
(3, 2, '10*20*400', 200000, NULL, NULL),
(4, 2, '10*20*40', 850000, NULL, NULL),
(5, 2, '10*20*50', 1200000, NULL, NULL),
(6, 3, '10*20*70', 600000, NULL, NULL),
(7, 3, '10*20*110', 497000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `detail_order`
--

CREATE TABLE `detail_order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `detail_booth_id` bigint(20) UNSIGNED NOT NULL,
  `image_file` text DEFAULT NULL,
  `warna_booth` varchar(20) NOT NULL,
  `text` varchar(255) DEFAULT NULL,
  `hasil_custom` text NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL,
  `provinsi_id` int(11) DEFAULT NULL,
  `kota` varchar(50) DEFAULT NULL,
  `biaya_kirim` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `detail_order`
--

INSERT INTO `detail_order` (`id`, `order_id`, `detail_booth_id`, `image_file`, `warna_booth`, `text`, `hasil_custom`, `created_at`, `updated_at`, `provinsi_id`, `kota`, `biaya_kirim`) VALUES
(7, 12, 5, '-', 'Biru Tua', 'testing', 'hasil', '2022-12-16 20:04:09', '2022-12-16 20:04:09', NULL, NULL, NULL),
(8, 13, 4, '-', 'Biru Muda', 'testing', 'hasil', '2022-12-16 20:05:39', '2022-12-16 20:05:39', NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `divisi`
--

CREATE TABLE `divisi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `divisi`
--

INSERT INTO `divisi` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Karyawan', NULL, NULL),
(2, 'Owner', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_booth`
--

CREATE TABLE `jenis_booth` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_booth`
--

INSERT INTO `jenis_booth` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Display', NULL, NULL),
(2, 'Outdoor', NULL, NULL),
(3, 'Portable', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `jenis_pengiriman`
--

CREATE TABLE `jenis_pengiriman` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `jenis_pengiriman`
--

INSERT INTO `jenis_pengiriman` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'JNE', NULL, NULL),
(2, 'TIKI', NULL, NULL),
(3, 'Kurin Internal', NULL, NULL),
(4, 'GoBox', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `divisi_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(255) NOT NULL,
  `no_telp` varchar(30) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id`, `divisi_id`, `nama`, `no_telp`, `created_at`, `updated_at`) VALUES
(1, 1, 'Antony Griezman', '021114', NULL, NULL),
(2, 2, 'Benzema', '123483', NULL, NULL),
(3, 2, 'Gareth Bale', '684811', NULL, NULL),
(4, 2, 'Hakimi', '221144', NULL, NULL),
(5, 2, 'Kai Havertz', '541117', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `provinsi_id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `biaya_kirim` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `provinsi_id`, `nama`, `biaya_kirim`, `created_at`, `updated_at`) VALUES
(1, 21, 'Kabupaten Aceh Barat', 25000, NULL, NULL),
(2, 21, 'Kabupaten Aceh Barat Daya', 25000, NULL, NULL),
(3, 21, 'Kabupaten Aceh Besar', 20000, NULL, NULL),
(4, 21, 'Kabupaten Aceh Jaya', 10000, NULL, NULL),
(5, 21, 'Kabupaten Aceh Selatan', 15000, NULL, NULL),
(6, 21, 'Kabupaten Aceh Singkil', 20000, NULL, NULL),
(7, 21, 'Kabupaten Aceh Tamiang', 10000, NULL, NULL),
(8, 21, 'Kabupaten Aceh Tengah', 15000, NULL, NULL),
(9, 21, 'Kabupaten Aceh Tenggara', 20000, NULL, NULL),
(10, 21, 'Kabupaten Aceh Timur', 20000, NULL, NULL),
(11, 21, 'Kabupaten Aceh Utara', 15000, NULL, NULL),
(12, 21, 'Kabupaten Bener Meriah', 10000, NULL, NULL),
(13, 21, 'Kabupaten Bireuen', 15000, NULL, NULL),
(14, 21, 'Kabupaten Gayo Lues', 15000, NULL, NULL),
(15, 21, 'Kabupaten Nagan Raya', 10000, NULL, NULL),
(16, 21, 'Kabupaten Pidie', 25000, NULL, NULL),
(17, 21, 'Kabupaten Pidie Jaya', 20000, NULL, NULL),
(18, 21, 'Kabupaten Simeulue', 25000, NULL, NULL),
(19, 21, 'Kota Banda Aceh', 25000, NULL, NULL),
(20, 21, 'Kota Langsa', 15000, NULL, NULL),
(21, 21, 'Kota Lhokseumawe', 10000, NULL, NULL),
(22, 21, 'Kota Sabang', 20000, NULL, NULL),
(23, 21, 'Kota Subulussalam', 20000, NULL, NULL),
(24, 34, 'Kabupaten Asahan', 25000, NULL, NULL),
(25, 34, 'Kabupaten Batu Bara', 15000, NULL, NULL),
(26, 34, 'Kabupaten Dairi', 10000, NULL, NULL),
(27, 34, 'Kabupaten Deli Serdang', 10000, NULL, NULL),
(28, 34, 'Kabupaten Humbang Hasundutan', 15000, NULL, NULL),
(29, 34, 'Kabupaten Karo', 25000, NULL, NULL),
(30, 34, 'Kabupaten Labuhanbatu', 15000, NULL, NULL),
(31, 34, 'Kabupaten Labuhanbatu Selatan', 25000, NULL, NULL),
(32, 34, 'Kabupaten Labuhanbatu Utara', 15000, NULL, NULL),
(33, 34, 'Kabupaten Langkat', 15000, NULL, NULL),
(34, 34, 'Kabupaten Mandailing Natal', 10000, NULL, NULL),
(35, 34, 'Kabupaten Nias', 20000, NULL, NULL),
(36, 34, 'Kabupaten Nias Barat', 25000, NULL, NULL),
(37, 34, 'Kabupaten Nias Selatan', 10000, NULL, NULL),
(38, 34, 'Kabupaten Nias Utara', 10000, NULL, NULL),
(39, 34, 'Kabupaten Padang Lawas', 15000, NULL, NULL),
(40, 34, 'Kabupaten Padang Lawas Utara', 10000, NULL, NULL),
(41, 34, 'Kabupaten Pakpak Bharat', 15000, NULL, NULL),
(42, 34, 'Kabupaten Samosir', 10000, NULL, NULL),
(43, 34, 'Kabupaten Serdang Bedagai', 25000, NULL, NULL),
(44, 34, 'Kabupaten Simalungun', 10000, NULL, NULL),
(45, 34, 'Kabupaten Tapanuli Selatan', 20000, NULL, NULL),
(46, 34, 'Kabupaten Tapanuli Tengah', 25000, NULL, NULL),
(47, 34, 'Kabupaten Tapanuli Utara', 25000, NULL, NULL),
(48, 34, 'Kabupaten Toba Samosir', 15000, NULL, NULL),
(49, 34, 'Kota Binjai', 15000, NULL, NULL),
(50, 34, 'Kota Gunungsitoli', 25000, NULL, NULL),
(51, 34, 'Kota Medan', 20000, NULL, NULL),
(52, 34, 'Kota Padangsidempuan', 25000, NULL, NULL),
(53, 34, 'Kota Pematangsiantar', 20000, NULL, NULL),
(54, 34, 'Kota Sibolga', 15000, NULL, NULL),
(55, 34, 'Kota Tanjungbalai', 10000, NULL, NULL),
(56, 34, 'Kota Tebing Tinggi', 10000, NULL, NULL),
(57, 32, 'Kabupaten Agam', 20000, NULL, NULL),
(58, 32, 'Kabupaten Dharmasraya', 15000, NULL, NULL),
(59, 32, 'Kabupaten Kepulauan Mentawai', 15000, NULL, NULL),
(60, 32, 'Kabupaten Lima Puluh Kota', 20000, NULL, NULL),
(61, 32, 'Kabupaten Padang Pariaman', 20000, NULL, NULL),
(62, 32, 'Kabupaten Pasaman', 15000, NULL, NULL),
(63, 32, 'Kabupaten Pasaman Barat', 10000, NULL, NULL),
(64, 32, 'Kabupaten Pesisir Selatan', 15000, NULL, NULL),
(65, 32, 'Kabupaten Sijunjung', 25000, NULL, NULL),
(66, 32, 'Kabupaten Solok', 10000, NULL, NULL),
(67, 32, 'Kabupaten Solok Selatan', 20000, NULL, NULL),
(68, 32, 'Kabupaten Tanah Datar', 15000, NULL, NULL),
(69, 32, 'Kota Bukittinggi', 10000, NULL, NULL),
(70, 32, 'Kota Padang', 25000, NULL, NULL),
(71, 32, 'Kota Padangpanjang', 25000, NULL, NULL),
(72, 32, 'Kota Pariaman', 15000, NULL, NULL),
(73, 32, 'Kota Payakumbuh', 15000, NULL, NULL),
(74, 32, 'Kota Sawahlunto', 25000, NULL, NULL),
(75, 32, 'Kota Solok', 10000, NULL, NULL),
(76, 26, 'Kabupaten Bengkalis', 20000, NULL, NULL),
(77, 26, 'Kabupaten Indragiri Hilir', 15000, NULL, NULL),
(78, 26, 'Kabupaten Indragiri Hulu', 15000, NULL, NULL),
(79, 26, 'Kabupaten Kampar', 25000, NULL, NULL),
(80, 26, 'Kabupaten Kepulauan Meranti', 15000, NULL, NULL),
(81, 26, 'Kabupaten Kuantan Singingi', 10000, NULL, NULL),
(82, 26, 'Kabupaten Pelalawan', 10000, NULL, NULL),
(83, 26, 'Kabupaten Rokan Hilir', 25000, NULL, NULL),
(84, 26, 'Kabupaten Rokan Hulu', 25000, NULL, NULL),
(85, 26, 'Kabupaten Siak', 15000, NULL, NULL),
(86, 26, 'Kota Dumai', 10000, NULL, NULL),
(87, 26, 'Kota Pekanbaru', 10000, NULL, NULL),
(88, 17, 'Kabupaten Bintan', 15000, NULL, NULL),
(89, 17, 'Kabupaten Karimun', 20000, NULL, NULL),
(90, 17, 'Kabupaten Kepulauan Anambas', 25000, NULL, NULL),
(91, 17, 'Kabupaten Lingga', 20000, NULL, NULL),
(92, 17, 'Kabupaten Natuna', 15000, NULL, NULL),
(93, 17, 'Kota Batam', 10000, NULL, NULL),
(94, 17, 'Kota Tanjung Pinang', 15000, NULL, NULL),
(95, 8, 'Kabupaten Batanghari', 25000, NULL, NULL),
(96, 8, 'Kabupaten Bungo', 15000, NULL, NULL),
(97, 8, 'Kabupaten Kerinci', 15000, NULL, NULL),
(98, 8, 'Kabupaten Merangin', 20000, NULL, NULL),
(99, 8, 'Kabupaten Muaro Jambi', 10000, NULL, NULL),
(100, 8, 'Kabupaten Sarolangun', 10000, NULL, NULL),
(101, 8, 'Kabupaten Tanjung Jabung Barat', 10000, NULL, NULL),
(102, 8, 'Kabupaten Tanjung Jabung Timur', 25000, NULL, NULL),
(103, 8, 'Kabupaten Tebo', 25000, NULL, NULL),
(104, 8, 'Kota Jambi', 20000, NULL, NULL),
(105, 8, 'Kota Sungaipenuh', 15000, NULL, NULL),
(106, 4, 'Kabupaten Bengkulu Selatan', 20000, NULL, NULL),
(107, 4, 'Kabupaten Bengkulu Tengah', 20000, NULL, NULL),
(108, 4, 'Kabupaten Bengkulu Utara', 25000, NULL, NULL),
(109, 4, 'Kabupaten Kaur', 25000, NULL, NULL),
(110, 4, 'Kabupaten Kepahiang', 10000, NULL, NULL),
(111, 4, 'Kabupaten Lebong', 10000, NULL, NULL),
(112, 4, 'Kabupaten Mukomuko', 20000, NULL, NULL),
(113, 4, 'Kabupaten Rejang Lebong', 20000, NULL, NULL),
(114, 4, 'Kabupaten Seluma', 20000, NULL, NULL),
(115, 4, 'Kota Bengkulu', 20000, NULL, NULL),
(116, 33, 'Kabupaten Banyuasin', 20000, NULL, NULL),
(117, 33, 'Kabupaten Empat Lawang', 10000, NULL, NULL),
(118, 33, 'Kabupaten Lahat', 25000, NULL, NULL),
(119, 33, 'Kabupaten Muara Enim', 15000, NULL, NULL),
(120, 33, 'Kabupaten Musi Banyuasin', 25000, NULL, NULL),
(121, 33, 'Kabupaten Musi Rawas', 15000, NULL, NULL),
(122, 33, 'Kabupaten Musi Rawas Utara', 20000, NULL, NULL),
(123, 33, 'Kabupaten Ogan Ilir', 10000, NULL, NULL),
(124, 33, 'Kabupaten Ogan Komering Ilir', 10000, NULL, NULL),
(125, 33, 'Kabupaten Ogan Komering Ulu', 15000, NULL, NULL),
(126, 33, 'Kabupaten Ogan Komering Ulu Selatan', 20000, NULL, NULL),
(127, 33, 'Kabupaten Ogan Komering Ulu Timur', 10000, NULL, NULL),
(128, 33, 'Kabupaten Penukal Abab Lematang Ilir', 20000, NULL, NULL),
(129, 33, 'Kota Lubuklinggau', 10000, NULL, NULL),
(130, 33, 'Kota Pagar Alam', 25000, NULL, NULL),
(131, 33, 'Kota Palembang', 10000, NULL, NULL),
(132, 33, 'Kota Prabumulih', 25000, NULL, NULL),
(133, 2, 'Kabupaten Bangka', 25000, NULL, NULL),
(134, 2, 'Kabupaten Bangka Barat', 10000, NULL, NULL),
(135, 2, 'Kabupaten Bangka Selatan', 10000, NULL, NULL),
(136, 2, 'Kabupaten Bangka Tengah', 15000, NULL, NULL),
(137, 2, 'Kabupaten Belitung', 10000, NULL, NULL),
(138, 2, 'Kabupaten Belitung Timur', 20000, NULL, NULL),
(139, 2, 'Kota Pangkal Pinang', 10000, NULL, NULL),
(140, 18, 'Kabupaten Lampung Barat', 15000, NULL, NULL),
(141, 18, 'Kabupaten Lampung Selatan', 25000, NULL, NULL),
(142, 18, 'Kabupaten Lampung Tengah', 15000, NULL, NULL),
(143, 18, 'Kabupaten Lampung Timur', 25000, NULL, NULL),
(144, 18, 'Kabupaten Lampung Utara', 25000, NULL, NULL),
(145, 18, 'Kabupaten Mesuji', 10000, NULL, NULL),
(146, 18, 'Kabupaten Pesawaran', 15000, NULL, NULL),
(147, 18, 'Kabupaten Pesisir Barat', 10000, NULL, NULL),
(148, 18, 'Kabupaten Pringsewu', 10000, NULL, NULL),
(149, 18, 'Kabupaten Tanggamus', 25000, NULL, NULL),
(150, 18, 'Kabupaten Tulang Bawang', 25000, NULL, NULL),
(151, 18, 'Kabupaten Tulang Bawang Barat', 10000, NULL, NULL),
(152, 18, 'Kabupaten Way Kanan', 10000, NULL, NULL),
(153, 18, 'Kota Bandar Lampung', 10000, NULL, NULL),
(154, 18, 'Kota Metro', 15000, NULL, NULL),
(155, 3, 'Kabupaten Lebak', 20000, NULL, NULL),
(156, 3, 'Kabupaten Pandeglang', 15000, NULL, NULL),
(157, 3, 'Kabupaten Serang', 15000, NULL, NULL),
(158, 3, 'Kabupaten Tangerang', 15000, NULL, NULL),
(159, 3, 'Kota Cilegon', 20000, NULL, NULL),
(160, 3, 'Kota Serang', 20000, NULL, NULL),
(161, 3, 'Kota Tangerang', 25000, NULL, NULL),
(162, 3, 'Kota Tangerang Selatan', 25000, NULL, NULL),
(163, 9, 'Kabupaten Bandung', 10000, NULL, NULL),
(164, 9, 'Kabupaten Bandung Barat', 10000, NULL, NULL),
(165, 9, 'Kabupaten Bekasi', 25000, NULL, NULL),
(166, 9, 'Kabupaten Bogor', 10000, NULL, NULL),
(167, 9, 'Kabupaten Ciamis', 15000, NULL, NULL),
(168, 9, 'Kabupaten Cianjur', 15000, NULL, NULL),
(169, 9, 'Kabupaten Cirebon', 20000, NULL, NULL),
(170, 9, 'Kabupaten Garut', 15000, NULL, NULL),
(171, 9, 'Kabupaten Indramayu', 25000, NULL, NULL),
(172, 9, 'Kabupaten Karawang', 25000, NULL, NULL),
(173, 9, 'Kabupaten Kuningan', 20000, NULL, NULL),
(174, 9, 'Kabupaten Majalengka', 15000, NULL, NULL),
(175, 9, 'Kabupaten Pangandaran', 15000, NULL, NULL),
(176, 9, 'Kabupaten Purwakarta', 25000, NULL, NULL),
(177, 9, 'Kabupaten Subang', 20000, NULL, NULL),
(178, 9, 'Kabupaten Sukabumi', 10000, NULL, NULL),
(179, 9, 'Kabupaten Sumedang', 10000, NULL, NULL),
(180, 9, 'Kabupaten Tasikmalaya', 20000, NULL, NULL),
(181, 9, 'Kota Bandung', 25000, NULL, NULL),
(182, 9, 'Kota Banjar', 10000, NULL, NULL),
(183, 9, 'Kota Bekasi', 15000, NULL, NULL),
(184, 9, 'Kota Bogor', 25000, NULL, NULL),
(185, 9, 'Kota Cimahi', 10000, NULL, NULL),
(186, 9, 'Kota Cirebon', 10000, NULL, NULL),
(187, 9, 'Kota Depok', 25000, NULL, NULL),
(188, 9, 'Kota Sukabumi', 25000, NULL, NULL),
(189, 9, 'Kota Tasikmalaya', 20000, NULL, NULL),
(190, 6, 'Kabupaten Administrasi Kepulauan Seribu', 10000, NULL, NULL),
(191, 6, 'Kota Administrasi Jakarta Barat', 10000, NULL, NULL),
(192, 6, 'Kota Administrasi Jakarta Pusat', 10000, NULL, NULL),
(193, 6, 'Kota Administrasi Jakarta Selatan', 15000, NULL, NULL),
(194, 6, 'Kota Administrasi Jakarta Timur', 25000, NULL, NULL),
(195, 6, 'Kota Administrasi Jakarta Utara', 15000, NULL, NULL),
(196, 10, 'Kabupaten Banjarnegara', 25000, NULL, NULL),
(197, 10, 'Kabupaten Banyumas', 15000, NULL, NULL),
(198, 10, 'Kabupaten Batang', 15000, NULL, NULL),
(199, 10, 'Kabupaten Blora', 15000, NULL, NULL),
(200, 10, 'Kabupaten Boyolali', 25000, NULL, NULL),
(201, 10, 'Kabupaten Brebes', 25000, NULL, NULL),
(202, 10, 'Kabupaten Cilacap', 25000, NULL, NULL),
(203, 10, 'Kabupaten Demak', 15000, NULL, NULL),
(204, 10, 'Kabupaten Grobogan', 25000, NULL, NULL),
(205, 10, 'Kabupaten Jepara', 10000, NULL, NULL),
(206, 10, 'Kabupaten Karanganyar', 10000, NULL, NULL),
(207, 10, 'Kabupaten Kebumen', 25000, NULL, NULL),
(208, 10, 'Kabupaten Kendal', 20000, NULL, NULL),
(209, 10, 'Kabupaten Klaten', 25000, NULL, NULL),
(210, 10, 'Kabupaten Kudus', 20000, NULL, NULL),
(211, 10, 'Kabupaten Magelang', 25000, NULL, NULL),
(212, 10, 'Kabupaten Pati', 25000, NULL, NULL),
(213, 10, 'Kabupaten Pekalongan', 25000, NULL, NULL),
(214, 10, 'Kabupaten Pemalang', 15000, NULL, NULL),
(215, 10, 'Kabupaten Purbalingga', 10000, NULL, NULL),
(216, 10, 'Kabupaten Purworejo', 10000, NULL, NULL),
(217, 10, 'Kabupaten Rembang', 25000, NULL, NULL),
(218, 10, 'Kabupaten Semarang', 15000, NULL, NULL),
(219, 10, 'Kabupaten Sragen', 10000, NULL, NULL),
(220, 10, 'Kabupaten Sukoharjo', 20000, NULL, NULL),
(221, 10, 'Kabupaten Tegal', 25000, NULL, NULL),
(222, 10, 'Kabupaten Temanggung', 15000, NULL, NULL),
(223, 10, 'Kabupaten Wonogiri', 10000, NULL, NULL),
(224, 10, 'Kabupaten Wonosobo', 15000, NULL, NULL),
(225, 10, 'Kota Magelang', 25000, NULL, NULL),
(226, 10, 'Kota Pekalongan', 20000, NULL, NULL),
(227, 10, 'Kota Salatiga', 20000, NULL, NULL),
(228, 10, 'Kota Semarang', 10000, NULL, NULL),
(229, 10, 'Kota Surakarta', 15000, NULL, NULL),
(230, 10, 'Kota Tegal', 15000, NULL, NULL),
(231, 5, 'Kabupaten Bantul', 10000, NULL, NULL),
(232, 5, 'Kabupaten Gunungkidul', 20000, NULL, NULL),
(233, 5, 'Kabupaten Kulon Progo', 25000, NULL, NULL),
(234, 5, 'Kabupaten Sleman', 15000, NULL, NULL),
(235, 5, 'Kota Yogyakarta', 10000, NULL, NULL),
(236, 11, 'Kabupaten Bangkalan', 25000, NULL, NULL),
(237, 11, 'Kabupaten Banyuwangi', 25000, NULL, NULL),
(238, 11, 'Kabupaten Blitar', 15000, NULL, NULL),
(239, 11, 'Kabupaten Bojonegoro', 20000, NULL, NULL),
(240, 11, 'Kabupaten Bondowoso', 10000, NULL, NULL),
(241, 11, 'Kabupaten Gresik', 25000, NULL, NULL),
(242, 11, 'Kabupaten Jember', 10000, NULL, NULL),
(243, 11, 'Kabupaten Jombang', 15000, NULL, NULL),
(244, 11, 'Kabupaten Kediri', 20000, NULL, NULL),
(245, 11, 'Kabupaten Lamongan', 25000, NULL, NULL),
(246, 11, 'Kabupaten Lumajang', 15000, NULL, NULL),
(247, 11, 'Kabupaten Madiun', 10000, NULL, NULL),
(248, 11, 'Kabupaten Magetan', 25000, NULL, NULL),
(249, 11, 'Kabupaten Malang', 15000, NULL, NULL),
(250, 11, 'Kabupaten Mojokerto', 15000, NULL, NULL),
(251, 11, 'Kabupaten Nganjuk', 25000, NULL, NULL),
(252, 11, 'Kabupaten Ngawi', 25000, NULL, NULL),
(253, 11, 'Kabupaten Pacitan', 15000, NULL, NULL),
(254, 11, 'Kabupaten Pamekasan', 25000, NULL, NULL),
(255, 11, 'Kabupaten Pasuruan', 25000, NULL, NULL),
(256, 11, 'Kabupaten Ponorogo', 20000, NULL, NULL),
(257, 11, 'Kabupaten Probolinggo', 25000, NULL, NULL),
(258, 11, 'Kabupaten Sampang', 25000, NULL, NULL),
(259, 11, 'Kabupaten Sidoarjo', 15000, NULL, NULL),
(260, 11, 'Kabupaten Situbondo', 15000, NULL, NULL),
(261, 11, 'Kabupaten Sumenep', 25000, NULL, NULL),
(262, 11, 'Kabupaten Trenggalek', 15000, NULL, NULL),
(263, 11, 'Kabupaten Tuban', 15000, NULL, NULL),
(264, 11, 'Kabupaten Tulungagung', 15000, NULL, NULL),
(265, 11, 'Kota Batu', 25000, NULL, NULL),
(266, 11, 'Kota Blitar', 10000, NULL, NULL),
(267, 11, 'Kota Kediri', 25000, NULL, NULL),
(268, 11, 'Kota Madiun', 10000, NULL, NULL),
(269, 11, 'Kota Malang', 10000, NULL, NULL),
(270, 11, 'Kota Mojokerto', 10000, NULL, NULL),
(271, 11, 'Kota Pasuruan', 25000, NULL, NULL),
(272, 11, 'Kota Probolinggo', 20000, NULL, NULL),
(273, 11, 'Kota Surabaya', 25000, NULL, NULL),
(274, 1, 'Kabupaten Badung', 20000, NULL, NULL),
(275, 1, 'Kabupaten Bangli', 15000, NULL, NULL),
(276, 1, 'Kabupaten Buleleng', 25000, NULL, NULL),
(277, 1, 'Kabupaten Gianyar', 10000, NULL, NULL),
(278, 1, 'Kabupaten Jembrana', 10000, NULL, NULL),
(279, 1, 'Kabupaten Karangasem', 15000, NULL, NULL),
(280, 1, 'Kabupaten Klungkung', 25000, NULL, NULL),
(281, 1, 'Kabupaten Tabanan', 20000, NULL, NULL),
(282, 1, 'Kota Denpasar', 10000, NULL, NULL),
(283, 22, 'Kabupaten Bima', 15000, NULL, NULL),
(284, 22, 'Kabupaten Dompu', 10000, NULL, NULL),
(285, 22, 'Kabupaten Lombok Barat', 10000, NULL, NULL),
(286, 22, 'Kabupaten Lombok Tengah', 20000, NULL, NULL),
(287, 22, 'Kabupaten Lombok Timur', 10000, NULL, NULL),
(288, 22, 'Kabupaten Lombok Utara', 15000, NULL, NULL),
(289, 22, 'Kabupaten Sumbawa', 25000, NULL, NULL),
(290, 22, 'Kabupaten Sumbawa Barat', 25000, NULL, NULL),
(291, 22, 'Kota Bima', 25000, NULL, NULL),
(292, 22, 'Kota Mataram', 20000, NULL, NULL),
(293, 23, 'Kabupaten Alor', 15000, NULL, NULL),
(294, 23, 'Kabupaten Belu', 15000, NULL, NULL),
(295, 23, 'Kabupaten Ende', 20000, NULL, NULL),
(296, 23, 'Kabupaten Flores Timur', 25000, NULL, NULL),
(297, 23, 'Kabupaten Kupang', 25000, NULL, NULL),
(298, 23, 'Kabupaten Lembata', 25000, NULL, NULL),
(299, 23, 'Kabupaten Malaka', 20000, NULL, NULL),
(300, 23, 'Kabupaten Manggarai', 25000, NULL, NULL),
(301, 23, 'Kabupaten Manggarai Barat', 15000, NULL, NULL),
(302, 23, 'Kabupaten Manggarai Timur', 20000, NULL, NULL),
(303, 23, 'Kabupaten Nagekeo', 15000, NULL, NULL),
(304, 23, 'Kabupaten Ngada', 20000, NULL, NULL),
(305, 23, 'Kabupaten Rote Ndao', 20000, NULL, NULL),
(306, 23, 'Kabupaten Sabu Raijua', 20000, NULL, NULL),
(307, 23, 'Kabupaten Sikka', 25000, NULL, NULL),
(308, 23, 'Kabupaten Sumba Barat', 20000, NULL, NULL),
(309, 23, 'Kabupaten Sumba Barat Daya', 20000, NULL, NULL),
(310, 23, 'Kabupaten Sumba Tengah', 25000, NULL, NULL),
(311, 23, 'Kabupaten Sumba Timur', 10000, NULL, NULL),
(312, 23, 'Kabupaten Timor Tengah Selatan', 25000, NULL, NULL),
(313, 23, 'Kabupaten Timor Tengah Utara', 20000, NULL, NULL),
(314, 23, 'Kota Kupang', 15000, NULL, NULL),
(315, 12, 'Kabupaten Bengkayang', 10000, NULL, NULL),
(316, 12, 'Kabupaten Kapuas Hulu', 10000, NULL, NULL),
(317, 12, 'Kabupaten Kayong Utara', 15000, NULL, NULL),
(318, 12, 'Kabupaten Ketapang', 25000, NULL, NULL),
(319, 12, 'Kabupaten Kubu Raya', 15000, NULL, NULL),
(320, 12, 'Kabupaten Landak', 25000, NULL, NULL),
(321, 12, 'Kabupaten Melawi', 10000, NULL, NULL),
(322, 12, 'Kabupaten Mempawah', 25000, NULL, NULL),
(323, 12, 'Kabupaten Sambas', 20000, NULL, NULL),
(324, 12, 'Kabupaten Sanggau', 10000, NULL, NULL),
(325, 12, 'Kabupaten Sekadau', 15000, NULL, NULL),
(326, 12, 'Kabupaten Sintang', 10000, NULL, NULL),
(327, 12, 'Kota Pontianak', 25000, NULL, NULL),
(328, 12, 'Kota Singkawang', 25000, NULL, NULL),
(329, 13, 'Kabupaten Balangan', 15000, NULL, NULL),
(330, 13, 'Kabupaten Banjar', 15000, NULL, NULL),
(331, 13, 'Kabupaten Barito Kuala', 10000, NULL, NULL),
(332, 13, 'Kabupaten Hulu Sungai Selatan', 20000, NULL, NULL),
(333, 13, 'Kabupaten Hulu Sungai Tengah', 25000, NULL, NULL),
(334, 13, 'Kabupaten Hulu Sungai Utara', 25000, NULL, NULL),
(335, 13, 'Kabupaten Kotabaru', 25000, NULL, NULL),
(336, 13, 'Kabupaten Tabalong', 25000, NULL, NULL),
(337, 13, 'Kabupaten Tanah Bumbu', 10000, NULL, NULL),
(338, 13, 'Kabupaten Tanah Laut', 10000, NULL, NULL),
(339, 13, 'Kabupaten Tapin', 10000, NULL, NULL),
(340, 13, 'Kota Banjarbaru', 25000, NULL, NULL),
(341, 13, 'Kota Banjarmasin', 20000, NULL, NULL),
(342, 14, 'Kabupaten Barito Selatan', 20000, NULL, NULL),
(343, 14, 'Kabupaten Barito Timur', 25000, NULL, NULL),
(344, 14, 'Kabupaten Barito Utara', 10000, NULL, NULL),
(345, 14, 'Kabupaten Gunung Mas', 25000, NULL, NULL),
(346, 14, 'Kabupaten Kapuas', 20000, NULL, NULL),
(347, 14, 'Kabupaten Katingan', 15000, NULL, NULL),
(348, 14, 'Kabupaten Kotawaringin Barat', 10000, NULL, NULL),
(349, 14, 'Kabupaten Kotawaringin Timur', 15000, NULL, NULL),
(350, 14, 'Kabupaten Lamandau', 25000, NULL, NULL),
(351, 14, 'Kabupaten Murung Raya', 10000, NULL, NULL),
(352, 14, 'Kabupaten Pulang Pisau', 15000, NULL, NULL),
(353, 14, 'Kabupaten Sukamara', 25000, NULL, NULL),
(354, 14, 'Kabupaten Seruyan', 15000, NULL, NULL),
(355, 14, 'Kota Palangka Raya', 20000, NULL, NULL),
(356, 15, 'Kabupaten Berau', 15000, NULL, NULL),
(357, 15, 'Kabupaten Kutai Barat', 25000, NULL, NULL),
(358, 15, 'Kabupaten Kutai Kartanegara', 25000, NULL, NULL),
(359, 15, 'Kabupaten Kutai Timur', 25000, NULL, NULL),
(360, 15, 'Kabupaten Mahakam Ulu', 25000, NULL, NULL),
(361, 15, 'Kabupaten Paser', 10000, NULL, NULL),
(362, 15, 'Kabupaten Penajam Paser Utara', 15000, NULL, NULL),
(363, 15, 'Kota Balikpapan', 15000, NULL, NULL),
(364, 15, 'Kota Bontang', 25000, NULL, NULL),
(365, 15, 'Kota Samarinda', 15000, NULL, NULL),
(366, 16, 'Kabupaten Bulungan', 20000, NULL, NULL),
(367, 16, 'Kabupaten Malinau', 10000, NULL, NULL),
(368, 16, 'Kabupaten Nunukan', 25000, NULL, NULL),
(369, 16, 'Kabupaten Tana Tidung', 10000, NULL, NULL),
(370, 16, 'Kota Tarakan', 25000, NULL, NULL),
(371, 24, 'Kabupaten Asmat', 10000, NULL, NULL),
(372, 24, 'Kabupaten Biak Numfor', 15000, NULL, NULL),
(373, 24, 'Kabupaten Boven Digoel', 20000, NULL, NULL),
(374, 24, 'Kabupaten Deiyai', 25000, NULL, NULL),
(375, 24, 'Kabupaten Dogiyai', 15000, NULL, NULL),
(376, 24, 'Kabupaten Intan Jaya', 10000, NULL, NULL),
(377, 24, 'Kabupaten Jayapura', 20000, NULL, NULL),
(378, 24, 'Kabupaten Jayawijaya', 20000, NULL, NULL),
(379, 24, 'Kabupaten Keerom', 20000, NULL, NULL),
(380, 24, 'Kabupaten Kepulauan Yapen', 25000, NULL, NULL),
(381, 24, 'Kabupaten Lanny Jaya', 20000, NULL, NULL),
(382, 24, 'Kabupaten Mamberamo Raya', 10000, NULL, NULL),
(383, 24, 'Kabupaten Mamberamo Tengah', 20000, NULL, NULL),
(384, 24, 'Kabupaten Mappi', 10000, NULL, NULL),
(385, 24, 'Kabupaten Merauke', 25000, NULL, NULL),
(386, 24, 'Kabupaten Mimika', 20000, NULL, NULL),
(387, 24, 'Kabupaten Nabire', 25000, NULL, NULL),
(388, 24, 'Kabupaten Nduga', 10000, NULL, NULL),
(389, 24, 'Kabupaten Paniai', 20000, NULL, NULL),
(390, 24, 'Kabupaten Pegunungan Bintang', 15000, NULL, NULL),
(391, 24, 'Kabupaten Puncak', 10000, NULL, NULL),
(392, 24, 'Kabupaten Puncak Jaya', 15000, NULL, NULL),
(393, 24, 'Kabupaten Sarmi', 25000, NULL, NULL),
(394, 24, 'Kabupaten Supiori', 25000, NULL, NULL),
(395, 24, 'Kabupaten Tolikara', 10000, NULL, NULL),
(396, 24, 'Kabupaten Waropen', 15000, NULL, NULL),
(397, 24, 'Kabupaten Yahukimo', 15000, NULL, NULL),
(398, 24, 'Kabupaten Yalimo', 20000, NULL, NULL),
(399, 24, 'Kota Jayapura', 20000, NULL, NULL),
(400, 25, 'Kabupaten Fakfak', 20000, NULL, NULL),
(401, 25, 'Kabupaten Kaimana', 15000, NULL, NULL),
(402, 25, 'Kabupaten Manokwari', 10000, NULL, NULL),
(403, 25, 'Kabupaten Manokwari Selatan', 15000, NULL, NULL),
(404, 25, 'Kabupaten Maybrat', 20000, NULL, NULL),
(405, 25, 'Kabupaten Pegunungan Arfak', 15000, NULL, NULL),
(406, 25, 'Kabupaten Raja Ampat', 25000, NULL, NULL),
(407, 25, 'Kabupaten Sorong', 15000, NULL, NULL),
(408, 25, 'Kabupaten Sorong Selatan', 10000, NULL, NULL),
(409, 25, 'Kabupaten Tambrauw', 15000, NULL, NULL),
(410, 25, 'Kabupaten Teluk Bintuni', 15000, NULL, NULL),
(411, 25, 'Kabupaten Teluk Wondama', 15000, NULL, NULL),
(412, 25, 'Kota Sorong', 10000, NULL, NULL),
(413, 19, 'Kabupaten Buru', 10000, NULL, NULL),
(414, 19, 'Kabupaten Buru Selatan', 25000, NULL, NULL),
(415, 19, 'Kabupaten Kepulauan Aru', 10000, NULL, NULL),
(416, 19, 'Kabupaten Maluku Barat Daya', 15000, NULL, NULL),
(417, 19, 'Kabupaten Maluku Tengah', 15000, NULL, NULL),
(418, 19, 'Kabupaten Maluku Tenggara', 10000, NULL, NULL),
(419, 19, 'Kabupaten Kepulauan Tanimbar', 20000, NULL, NULL),
(420, 19, 'Kabupaten Seram Bagian Barat', 25000, NULL, NULL),
(421, 19, 'Kabupaten Seram Bagian Timur', 15000, NULL, NULL),
(422, 19, 'Kota Ambon', 10000, NULL, NULL),
(423, 19, 'Kota Tual', 20000, NULL, NULL),
(424, 20, 'Kabupaten Halmahera Barat', 10000, NULL, NULL),
(425, 20, 'Kabupaten Halmahera Tengah', 10000, NULL, NULL),
(426, 20, 'Kabupaten Halmahera Timur', 15000, NULL, NULL),
(427, 20, 'Kabupaten Halmahera Selatan', 20000, NULL, NULL),
(428, 20, 'Kabupaten Halmahera Utara', 20000, NULL, NULL),
(429, 20, 'Kabupaten Kepulauan Sula', 20000, NULL, NULL),
(430, 20, 'Kabupaten Pulau Morotai', 15000, NULL, NULL),
(431, 20, 'Kabupaten Pulau Taliabu', 25000, NULL, NULL),
(432, 20, 'Kota Ternate', 20000, NULL, NULL),
(433, 20, 'Kota Tidore Kepulauan', 10000, NULL, NULL),
(434, 7, 'Kabupaten Boalemo', 25000, NULL, NULL),
(435, 7, 'Kabupaten Bone Bolango', 20000, NULL, NULL),
(436, 7, 'Kabupaten Gorontalo', 15000, NULL, NULL),
(437, 7, 'Kabupaten Gorontalo Utara', 10000, NULL, NULL),
(438, 7, 'Kabupaten Pohuwato', 15000, NULL, NULL),
(439, 7, 'Kota Gorontalo', 20000, NULL, NULL),
(440, 27, 'Kabupaten Majene', 25000, NULL, NULL),
(441, 27, 'Kabupaten Mamasa', 15000, NULL, NULL),
(442, 27, 'Kabupaten Mamuju', 20000, NULL, NULL),
(443, 27, 'Kabupaten Mamuju Tengah', 25000, NULL, NULL),
(444, 27, 'Kabupaten Pasangkayu', 15000, NULL, NULL),
(445, 27, 'Kabupaten Polewali Mandar', 10000, NULL, NULL),
(446, 28, 'Kabupaten Bantaeng', 15000, NULL, NULL),
(447, 28, 'Kabupaten Barru', 20000, NULL, NULL),
(448, 28, 'Kabupaten Bone', 25000, NULL, NULL),
(449, 28, 'Kabupaten Bulukumba', 10000, NULL, NULL),
(450, 28, 'Kabupaten Enrekang', 10000, NULL, NULL),
(451, 28, 'Kabupaten Gowa', 25000, NULL, NULL),
(452, 28, 'Kabupaten Jeneponto', 25000, NULL, NULL),
(453, 28, 'Kabupaten Kepulauan Selayar', 20000, NULL, NULL),
(454, 28, 'Kabupaten Luwu', 10000, NULL, NULL),
(455, 28, 'Kabupaten Luwu Timur', 15000, NULL, NULL),
(456, 28, 'Kabupaten Luwu Utara', 25000, NULL, NULL),
(457, 28, 'Kabupaten Maros', 10000, NULL, NULL),
(458, 28, 'Kabupaten Pangkajene dan Kepulauan', 15000, NULL, NULL),
(459, 28, 'Kabupaten Pinrang', 25000, NULL, NULL),
(460, 28, 'Kabupaten Sidenreng Rappang', 25000, NULL, NULL),
(461, 28, 'Kabupaten Sinjai', 10000, NULL, NULL),
(462, 28, 'Kabupaten Soppeng', 25000, NULL, NULL),
(463, 28, 'Kabupaten Takalar', 25000, NULL, NULL),
(464, 28, 'Kabupaten Tana Toraja', 10000, NULL, NULL),
(465, 28, 'Kabupaten Toraja Utara', 15000, NULL, NULL),
(466, 28, 'Kabupaten Wajo', 10000, NULL, NULL),
(467, 28, 'Kota Makassar', 15000, NULL, NULL),
(468, 28, 'Kota Palopo', 20000, NULL, NULL),
(469, 28, 'Kota Parepare', 20000, NULL, NULL),
(470, 30, 'Kabupaten Bombana', 20000, NULL, NULL),
(471, 30, 'Kabupaten Buton', 15000, NULL, NULL),
(472, 30, 'Kabupaten Buton Selatan', 15000, NULL, NULL),
(473, 30, 'Kabupaten Buton Tengah', 15000, NULL, NULL),
(474, 30, 'Kabupaten Buton Utara', 10000, NULL, NULL),
(475, 30, 'Kabupaten Kolaka', 10000, NULL, NULL),
(476, 30, 'Kabupaten Kolaka Timur', 20000, NULL, NULL),
(477, 30, 'Kabupaten Kolaka Utara', 20000, NULL, NULL),
(478, 30, 'Kabupaten Konawe', 20000, NULL, NULL),
(479, 30, 'Kabupaten Konawe Kepulauan', 20000, NULL, NULL),
(480, 30, 'Kabupaten Konawe Selatan', 20000, NULL, NULL),
(481, 30, 'Kabupaten Konawe Utara', 20000, NULL, NULL),
(482, 30, 'Kabupaten Muna', 10000, NULL, NULL),
(483, 30, 'Kabupaten Muna Barat', 15000, NULL, NULL),
(484, 30, 'Kabupaten Wakatobi', 10000, NULL, NULL),
(485, 30, 'Kota Bau-Bau', 25000, NULL, NULL),
(486, 30, 'Kota Kendari', 15000, NULL, NULL),
(487, 29, 'Kabupaten Banggai', 15000, NULL, NULL),
(488, 29, 'Kabupaten Banggai Kepulauan', 25000, NULL, NULL),
(489, 29, 'Kabupaten Banggai Laut', 25000, NULL, NULL),
(490, 29, 'Kabupaten Buol', 15000, NULL, NULL),
(491, 29, 'Kabupaten Donggala', 25000, NULL, NULL),
(492, 29, 'Kabupaten Morowali', 10000, NULL, NULL),
(493, 29, 'Kabupaten Morowali Utara', 10000, NULL, NULL),
(494, 29, 'Kabupaten Parigi Moutong', 25000, NULL, NULL),
(495, 29, 'Kabupaten Poso', 15000, NULL, NULL),
(496, 29, 'Kabupaten Sigi', 25000, NULL, NULL),
(497, 29, 'Kabupaten Tojo Una-Una', 25000, NULL, NULL),
(498, 29, 'Kabupaten Tolitoli', 25000, NULL, NULL),
(499, 29, 'Kota Palu', 10000, NULL, NULL),
(500, 31, 'Kabupaten Bolaang Mongondow', 15000, NULL, NULL),
(501, 31, 'Kabupaten Bolaang Mongondow Selatan', 10000, NULL, NULL),
(502, 31, 'Kabupaten Bolaang Mongondow Timur', 10000, NULL, NULL),
(503, 31, 'Kabupaten Bolaang Mongondow Utara', 25000, NULL, NULL),
(504, 31, 'Kabupaten Kepulauan Sangihe', 10000, NULL, NULL),
(505, 31, 'Kabupaten Kepulauan Siau Tagulandang Biaro', 15000, NULL, NULL),
(506, 31, 'Kabupaten Kepulauan Talaud', 10000, NULL, NULL),
(507, 31, 'Kabupaten Minahasa', 20000, NULL, NULL),
(508, 31, 'Kabupaten Minahasa Selatan', 10000, NULL, NULL),
(509, 31, 'Kabupaten Minahasa Tenggara', 10000, NULL, NULL),
(510, 31, 'Kabupaten Minahasa Utara', 20000, NULL, NULL),
(511, 31, 'Kota Bitung', 10000, NULL, NULL),
(512, 31, 'Kota Kotamobagu', 25000, NULL, NULL),
(513, 31, 'Kota Manado', 10000, NULL, NULL),
(514, 31, 'Kota Tomohon', 25000, NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `order`
--

CREATE TABLE `order` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `no_order` varchar(30) NOT NULL,
  `tgl_order` date NOT NULL,
  `customer_id` bigint(20) UNSIGNED NOT NULL,
  `total_harga` float DEFAULT NULL,
  `jenis_pengiriman_id` bigint(20) UNSIGNED DEFAULT NULL,
  `tgl_kirim` date DEFAULT NULL,
  `nama` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `kota_id` bigint(20) UNSIGNED DEFAULT NULL,
  `no_telp` varchar(30) DEFAULT NULL,
  `biaya_kirim` float DEFAULT NULL,
  `resi` text DEFAULT NULL,
  `status_id` bigint(20) UNSIGNED NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `order`
--

INSERT INTO `order` (`id`, `no_order`, `tgl_order`, `customer_id`, `total_harga`, `jenis_pengiriman_id`, `tgl_kirim`, `nama`, `alamat`, `kota_id`, `no_telp`, `biaya_kirim`, `resi`, `status_id`, `created_at`, `updated_at`) VALUES
(12, '1/INV/XII/2022', '2022-12-17', 4, 1330000, 1, NULL, 'Aris Pranata', 'Jl Duren Sawit', 135, '0818777222', 10000, NULL, 1, '2022-12-16 20:04:09', '2022-12-16 20:04:09'),
(13, '2/INV/XII/2022', '2022-12-17', 4, 935000, 1, NULL, 'Haji Yoga', 'Jl Kalimantan Barat', 134, '0899444', 0, NULL, 1, '2022-12-16 20:05:39', '2022-12-16 20:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `order_id` bigint(20) UNSIGNED NOT NULL,
  `tanggal` date NOT NULL,
  `total_bayar` float NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `pembayaran`
--

INSERT INTO `pembayaran` (`id`, `order_id`, `tanggal`, `total_bayar`, `created_at`, `updated_at`) VALUES
(2, 12, '2022-12-17', 1330000, '2022-12-16 20:04:09', '2022-12-16 20:04:09'),
(3, 13, '2022-12-17', 785000, '2022-12-16 20:05:39', '2022-12-16 20:05:39');

-- --------------------------------------------------------

--
-- Table structure for table `provinsi`
--

CREATE TABLE `provinsi` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(100) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `provinsi`
--

INSERT INTO `provinsi` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Bali', NULL, NULL),
(2, 'Bangka Belitung', NULL, NULL),
(3, 'Banten', NULL, NULL),
(4, 'Bengkulu', NULL, NULL),
(5, 'DI Yogyakarta', NULL, NULL),
(6, 'DKI Jakarta', NULL, NULL),
(7, 'Gorontalo', NULL, NULL),
(8, 'Jambi', NULL, NULL),
(9, 'Jawa Barat', NULL, NULL),
(10, 'Jawa Tengah', NULL, NULL),
(11, 'Jawa Timur', NULL, NULL),
(12, 'Kalimantan Barat', NULL, NULL),
(13, 'Kalimantan Selatan', NULL, NULL),
(14, 'Kalimantan Tengah', NULL, NULL),
(15, 'Kalimantan Timur', NULL, NULL),
(16, 'Kalimantan Utara', NULL, NULL),
(17, 'Kepulauan Riau', NULL, NULL),
(18, 'Lampung', NULL, NULL),
(19, 'Maluku', NULL, NULL),
(20, 'Maluku Utara', NULL, NULL),
(21, 'Nanggroe Aceh Darussalam (NAD)', NULL, NULL),
(22, 'Nusa Tenggara Barat (NTB)', NULL, NULL),
(23, 'Nusa Tenggara Timur (NTT)', NULL, NULL),
(24, 'Papua', NULL, NULL),
(25, 'Papua Barat', NULL, NULL),
(26, 'Riau', NULL, NULL),
(27, 'Sulawesi Barat', NULL, NULL),
(28, 'Sulawesi Selatan', NULL, NULL),
(29, 'Sulawesi Tengah', NULL, NULL),
(30, 'Sulawesi Tenggara', NULL, NULL),
(31, 'Sulawesi Utara', NULL, NULL),
(32, 'Sumatera Barat', NULL, NULL),
(33, 'Sumatera Selatan', NULL, NULL),
(34, 'Sumatera Utara', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `status`
--

CREATE TABLE `status` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `nama` varchar(50) NOT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `status`
--

INSERT INTO `status` (`id`, `nama`, `created_at`, `updated_at`) VALUES
(1, 'Diproses', NULL, NULL),
(2, 'Diterima', NULL, NULL),
(3, 'Dikirim', NULL, NULL),
(4, 'Selesai', NULL, NULL),
(5, 'Lunas', NULL, NULL),
(6, 'Belum Lunas', NULL, NULL);

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` bigint(20) UNSIGNED NOT NULL,
  `karyawan_id` bigint(20) UNSIGNED DEFAULT NULL,
  `customer_id` bigint(20) UNSIGNED DEFAULT NULL,
  `email` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` text NOT NULL,
  `verified_at` timestamp NULL DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT NULL,
  `updated_at` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `karyawan_id`, `customer_id`, `email`, `username`, `password`, `verified_at`, `created_at`, `updated_at`) VALUES
(2, NULL, 4, 'ariss@gmail.com', 'aris123', '$2y$10$6doyJoIVQeWC9lXpddn1jOLtMz.1saHHUxe9Ixu24XMqP4tDJfy3m', NULL, '2022-12-11 11:18:58', '2023-01-12 02:23:56'),
(3, 1, NULL, 'xxx@gmail.com', 'antony123', '$2y$10$6doyJoIVQeWC9lXpddn1jOLtMz.1saHHUxe9Ixu24XMqP4tDJfy3m', NULL, '2022-12-11 11:18:58', '2022-12-11 11:18:58'),
(4, 2, NULL, 'yyy@gmail.com', 'admin123', '$2y$10$6doyJoIVQeWC9lXpddn1jOLtMz.1saHHUxe9Ixu24XMqP4tDJfy3m', NULL, '2022-12-11 11:18:58', '2022-12-11 11:18:58'),
(5, NULL, 5, 'razza@gmail.com', 'afafa', '$2y$10$HpyS8MsIwfmUVn7b/V/n4uMu2PZrPY9jfXmH2GHlbWJGGauHwAeCq', NULL, '2023-01-11 20:28:46', '2023-01-12 01:41:11');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_cart` (`customer_id`),
  ADD KEY `fk_cart_1` (`detail_booth_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kota_id` (`kota_id`);

--
-- Indexes for table `detail_booth`
--
ALTER TABLE `detail_booth`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_booth` (`jenis_booth_id`);

--
-- Indexes for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_detail_order` (`order_id`),
  ADD KEY `fk_detail_order_1` (`detail_booth_id`);

--
-- Indexes for table `divisi`
--
ALTER TABLE `divisi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_booth`
--
ALTER TABLE `jenis_booth`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `jenis_pengiriman`
--
ALTER TABLE `jenis_pengiriman`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_karyawan` (`divisi_id`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_kota` (`provinsi_id`);

--
-- Indexes for table `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_order` (`customer_id`),
  ADD KEY `fk_order_1` (`kota_id`),
  ADD KEY `fk_order_3` (`status_id`),
  ADD KEY `fk_order_2` (`jenis_pengiriman_id`);

--
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_pembayaran` (`order_id`);

--
-- Indexes for table `provinsi`
--
ALTER TABLE `provinsi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `status`
--
ALTER TABLE `status`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user` (`karyawan_id`),
  ADD KEY `fk_user_1` (`customer_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `cart`
--
ALTER TABLE `cart`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `detail_booth`
--
ALTER TABLE `detail_booth`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT for table `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `divisi`
--
ALTER TABLE `divisi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `jenis_booth`
--
ALTER TABLE `jenis_booth`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `jenis_pengiriman`
--
ALTER TABLE `jenis_pengiriman`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `karyawan`
--
ALTER TABLE `karyawan`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=515;

--
-- AUTO_INCREMENT for table `order`
--
ALTER TABLE `order`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `provinsi`
--
ALTER TABLE `provinsi`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT for table `status`
--
ALTER TABLE `status`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `fk_cart` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_cart_1` FOREIGN KEY (`detail_booth_id`) REFERENCES `detail_booth` (`id`);

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `kota_id` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`);

--
-- Constraints for table `detail_booth`
--
ALTER TABLE `detail_booth`
  ADD CONSTRAINT `fk_detail_booth` FOREIGN KEY (`jenis_booth_id`) REFERENCES `jenis_booth` (`id`);

--
-- Constraints for table `detail_order`
--
ALTER TABLE `detail_order`
  ADD CONSTRAINT `fk_detail_order` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`),
  ADD CONSTRAINT `fk_detail_order_1` FOREIGN KEY (`detail_booth_id`) REFERENCES `detail_booth` (`id`);

--
-- Constraints for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD CONSTRAINT `fk_karyawan` FOREIGN KEY (`divisi_id`) REFERENCES `divisi` (`id`);

--
-- Constraints for table `kota`
--
ALTER TABLE `kota`
  ADD CONSTRAINT `fk_kota` FOREIGN KEY (`provinsi_id`) REFERENCES `provinsi` (`id`);

--
-- Constraints for table `order`
--
ALTER TABLE `order`
  ADD CONSTRAINT `fk_order` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`),
  ADD CONSTRAINT `fk_order_1` FOREIGN KEY (`kota_id`) REFERENCES `kota` (`id`),
  ADD CONSTRAINT `fk_order_2` FOREIGN KEY (`jenis_pengiriman_id`) REFERENCES `jenis_pengiriman` (`id`),
  ADD CONSTRAINT `fk_order_3` FOREIGN KEY (`status_id`) REFERENCES `status` (`id`);

--
-- Constraints for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD CONSTRAINT `fk_pembayaran` FOREIGN KEY (`order_id`) REFERENCES `order` (`id`);

--
-- Constraints for table `user`
--
ALTER TABLE `user`
  ADD CONSTRAINT `fk_user` FOREIGN KEY (`karyawan_id`) REFERENCES `karyawan` (`id`),
  ADD CONSTRAINT `fk_user_1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
