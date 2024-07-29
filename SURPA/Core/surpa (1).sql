-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Jul 27, 2024 at 12:36 PM
-- Server version: 8.0.30
-- PHP Version: 8.1.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `surpa`
--

-- --------------------------------------------------------

--
-- Table structure for table `histpaket`
--

CREATE TABLE `histpaket` (
  `idHistP` int NOT NULL,
  `no_resi` char(30) DEFAULT NULL,
  `nama_penerima` varchar(200) DEFAULT NULL,
  `ekspedisi` varchar(50) DEFAULT NULL,
  `jenis` enum('paket','surat','berkas') DEFAULT NULL,
  `status` enum('belum diambil','sudah diambil') DEFAULT NULL,
  `tanggal_diterima` timestamp NULL DEFAULT NULL,
  `tanggal_diambil` timestamp NULL DEFAULT NULL,
  `id_security` char(10) DEFAULT NULL,
  `id_penerima` char(50) DEFAULT NULL,
  `tanggal_dihapus` timestamp NULL DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `histpaket`
--

INSERT INTO `histpaket` (`idHistP`, `no_resi`, `nama_penerima`, `ekspedisi`, `jenis`, `status`, `tanggal_diterima`, `tanggal_diambil`, `id_security`, `id_penerima`, `tanggal_dihapus`) VALUES
(1, '1672898', 'M. Ikhsan Kurniawan', 'JNE', 'paket', 'sudah diambil', '2024-07-21 17:02:00', '2024-07-22 14:24:00', 'ARS', 'ID001', '2024-07-24 02:38:51'),
(2, '162738095', 'Ariansyah', 'J&T', 'paket', 'sudah diambil', '2024-06-25 07:58:06', '2024-07-19 14:21:59', 'ARS', 'ID003', '2024-07-24 02:40:33'),
(3, '162738093', 'Agus Pratama', 'JNE', 'paket', 'sudah diambil', '2024-06-25 07:49:33', '2024-07-19 14:21:59', 'AMD', 'ID001', '2024-07-24 02:41:02'),
(4, '162738099', 'M. Ikhsan Kurniawan', 'Wahana', 'paket', 'sudah diambil', '2024-06-25 07:58:06', '2024-07-19 14:21:59', 'MIK', 'ID007', '2024-07-24 08:18:01');

-- --------------------------------------------------------

--
-- Table structure for table `histpenerima`
--

CREATE TABLE `histpenerima` (
  `idHistPemilik` int NOT NULL,
  `idPenerima` char(50) NOT NULL,
  `nama_penerima` varchar(100) NOT NULL,
  `tanggal_dihapus` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_0900_ai_ci;

--
-- Dumping data for table `histpenerima`
--

INSERT INTO `histpenerima` (`idHistPemilik`, `idPenerima`, `nama_penerima`, `tanggal_dihapus`) VALUES
(1, 'ID007', 'Gita Permata', '2024-07-27 12:06:00'),
(2, 'ID003', 'Hadid Zarid Nawfal', '2024-07-27 12:06:18');

-- --------------------------------------------------------

--
-- Table structure for table `paket`
--

CREATE TABLE `paket` (
  `no_resi` char(30) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penerima` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `ekspedisi` varchar(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `jenis` enum('paket','surat','berkas') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `status` enum('belum diambil','sudah diambil') CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `tanggal_diterima` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `tanggal_diambil` timestamp NULL DEFAULT NULL ON UPDATE CURRENT_TIMESTAMP,
  `id_security` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `id_penerima` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `paket`
--

INSERT INTO `paket` (`no_resi`, `nama_penerima`, `ekspedisi`, `jenis`, `status`, `tanggal_diterima`, `tanggal_diambil`, `id_security`, `id_penerima`) VALUES
('126373', 'M. Ikhsan Kurniawan', 'JNT', 'berkas', 'sudah diambil', '2024-07-22 07:25:00', '2024-07-22 14:22:00', 'AMD', 'ID001'),
('162738087', 'Jessica Nathania', 'JNT', 'berkas', 'belum diambil', '2024-07-21 16:50:00', NULL, 'AMD', 'ID012'),
('162738096', 'Bima Ali', 'Pos Indonesia', 'paket', 'sudah diambil', '2024-06-25 07:58:06', '2024-07-19 14:21:59', 'BMA', 'ID004'),
('162738097', 'Khairullah Hafidz Azany', 'Tiki', 'paket', 'sudah diambil', '2024-06-25 07:58:06', '2024-07-19 14:21:59', 'KHA', 'ID005'),
('162738098', 'Kevin Apiron', 'SiCepat', 'paket', 'sudah diambil', '2024-06-25 07:58:06', '2024-07-19 14:21:59', 'KVA', 'ID006'),
('162738101', 'Selvina', 'Anteraja', 'paket', 'sudah diambil', '2024-06-25 07:58:06', '2024-07-19 14:21:59', 'SEL', 'ID009'),
('162738102', 'Sandi Subroto', 'ID Express', 'paket', 'sudah diambil', '2024-06-25 07:58:06', '2024-07-19 14:21:59', 'SSB', 'ID010'),
('1822928', 'Nita Efri', 'JNT', 'surat', 'belum diambil', '2024-07-27 07:26:00', NULL, 'SSB', 'ID011'),
('19828363', 'M. Ikhsan Kurniawan', 'JNT', 'surat', 'belum diambil', '2024-07-27 07:05:00', NULL, 'RND', 'ID001'),
('2193122376', 'Nita Efri', 'JNE', 'paket', 'belum diambil', '2024-07-27 07:35:00', NULL, 'TFR', 'ID011'),
('23298132', 'M. Ikhsan Kurniawan', 'JNE', 'berkas', 'belum diambil', '2024-07-27 07:36:00', NULL, 'SEL', 'ID001');

--
-- Triggers `paket`
--
DELIMITER $$
CREATE TRIGGER `tDELHistP` BEFORE DELETE ON `paket` FOR EACH ROW BEGIN
    INSERT INTO histpaket (
        idHistP, 
        no_resi, 
        nama_penerima, 
        ekspedisi, 
        jenis, 
        status, 
        tanggal_diterima, 
        tanggal_diambil, 
        id_security, 
        id_penerima, 
        tanggal_dihapus
    ) VALUES (
        NULL,  -- idHistP is auto-increment
        OLD.no_resi, 
        OLD.nama_penerima, 
        OLD.ekspedisi, 
        OLD.jenis, 
        OLD.status, 
        OLD.tanggal_diterima, 
        OLD.tanggal_diambil, 
        OLD.id_security, 
        OLD.id_penerima, 
        CURRENT_TIMESTAMP  -- For MySQL, use CURRENT_TIMESTAMP
    );
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `penerima`
--

CREATE TABLE `penerima` (
  `id_penerima` char(50) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama_penerima` varchar(100) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `penerima`
--

INSERT INTO `penerima` (`id_penerima`, `nama_penerima`) VALUES
('ID001', 'M. Ikhsan Kurniawan'),
('ID004', 'Dewi Lesti'),
('ID005', 'Eko Nugroho'),
('ID006', 'Fajar Setiawan'),
('ID009', 'Indra Gunawan'),
('ID010', 'Joko Susilo'),
('ID011', 'Nita Efri'),
('ID012', 'Jessica Nathania');

--
-- Triggers `penerima`
--
DELIMITER $$
CREATE TRIGGER `tdelPemilik` BEFORE DELETE ON `penerima` FOR EACH ROW BEGIN
    INSERT INTO histpenerima (idPenerima, nama_penerima, tanggal_dihapus)
    VALUES (OLD.id_penerima, OLD.nama_penerima, NOW());
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `security`
--

CREATE TABLE `security` (
  `id_security` char(10) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `nama` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_general_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `security`
--

INSERT INTO `security` (`id_security`, `nama`, `password`) VALUES
('AMD', 'Amelia Devira', 'a2a4d4bdb2fb588c32dffaf48568b246a7bd31df98fe11b917d45562e6650819'),
('ARS', 'Ariansyah', '1c9734ef21c140382a3776a7974a1f7c474a6f3e8daed560d3bfccd3386e4f32'),
('BMA', 'Bima Ali', '99f23af8c6b6689f60baabdae90f577ec32c26693c9248490380185eeeec56d5'),
('KHA', 'Khairullah Hafidz Azany', '540f44bce797250377a98e818cd15e4d6d5303899f66814cd28b75611631ecc1'),
('KVA', 'Kevin Apiron', '85f5e10431f69bc2a14046a13aabaefc660103b6de7a84f75c4b96181d03f0b5'),
('MIK', 'M. Ikhsan Kurniawan', '04e430c5e494468ee23d7011b94a9477735b495327e6ba57358ded92a7e0f4e5'),
('RND', 'Ronald Damian', 'dcd79ebce907b98a97ac818318c9e467731e44068412590ea34280dcadcf02d9'),
('SEL', 'Selvina', 'cec0247ac78c9c4782e53eba7242e5e4156a7264e122d803adb244b2652cb1bb'),
('SSB', 'Sandi Subroto', 'c741a75319e5724ca59a9fa2f69ae714cf13d39f6d7f6aaeba839bb599b4cf4d'),
('TFR', 'Taufik Rinaldi', '10298078a6ae732a85e8715aa0405c3c622a0ab0e24cabd0a97e333174c70577');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `histpaket`
--
ALTER TABLE `histpaket`
  ADD PRIMARY KEY (`idHistP`);

--
-- Indexes for table `histpenerima`
--
ALTER TABLE `histpenerima`
  ADD PRIMARY KEY (`idHistPemilik`);

--
-- Indexes for table `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`no_resi`),
  ADD KEY `FK_AmbilPaket` (`id_penerima`),
  ADD KEY `FK_PersonOrder` (`id_security`);

--
-- Indexes for table `penerima`
--
ALTER TABLE `penerima`
  ADD PRIMARY KEY (`id_penerima`);

--
-- Indexes for table `security`
--
ALTER TABLE `security`
  ADD PRIMARY KEY (`id_security`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `histpaket`
--
ALTER TABLE `histpaket`
  MODIFY `idHistP` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `histpenerima`
--
ALTER TABLE `histpenerima`
  MODIFY `idHistPemilik` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `paket`
--
ALTER TABLE `paket`
  ADD CONSTRAINT `FK_PenerimaPaket` FOREIGN KEY (`id_penerima`) REFERENCES `penerima` (`id_penerima`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_Satpam` FOREIGN KEY (`id_security`) REFERENCES `security` (`id_security`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `FK_TerimaPaket` FOREIGN KEY (`id_security`) REFERENCES `security` (`id_security`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
