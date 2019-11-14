-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 14, 2019 at 10:01 AM
-- Server version: 10.3.16-MariaDB
-- PHP Version: 7.1.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simlab`
--

-- --------------------------------------------------------

--
-- Table structure for table `asisten_p`
--

CREATE TABLE `asisten_p` (
  `id` int(11) NOT NULL,
  `asisten_nim` varchar(16) NOT NULL,
  `matkul_id` varchar(10) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE `jadwal` (
  `id` int(11) NOT NULL,
  `matkul_id` varchar(10) NOT NULL,
  `ruang_id` varchar(8) NOT NULL,
  `kelas` char(2) NOT NULL,
  `sesi` tinyint(2) NOT NULL,
  `hari` varchar(8) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `latihan`
--

CREATE TABLE `latihan` (
  `id` int(11) NOT NULL,
  `latihan_praktikan` varchar(16) NOT NULL,
  `matkul_id` varchar(10) NOT NULL,
  `nama_file` varchar(128) NOT NULL,
  `pertemuan` char(2) NOT NULL,
  `tipe_file` varchar(16) NOT NULL,
  `size_file` int(10) UNSIGNED NOT NULL,
  `path_file` varchar(255) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE `matkul` (
  `id` varchar(10) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `semester` tinyint(2) NOT NULL,
  `prodi` varchar(64) NOT NULL,
  `pengampu` varchar(64) NOT NULL,
  `biaya_modul` float NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id`, `nama`, `semester`, `prodi`, `pengampu`, `biaya_modul`) VALUES
('112233', 'Teknologi Web', 3, 'Sistem Informasi', 'Fulan bin Fulan', 5000),
('112256', 'Basis Data', 3, 'Sistem Informasi', 'Imam Azhari', 5000),
('113345', 'Jaringan Komputer', 3, 'Sistem Informasi', 'Imam Riadi', 5000),
('115566', 'Teknologi Web Lanjut', 4, 'Sistem Informasi', 'Mursid Wahyu Hananto', 5000),
('123123', 'Bioteknologi', 6, 'Biologi', 'Fulan bin Fulan', 15000),
('223311', 'Sistem Berorientasi Objek', 5, 'Sistem Informasi', 'Arif Hidayat', 5000);

-- --------------------------------------------------------

--
-- Table structure for table `modul`
--

CREATE TABLE `modul` (
  `id` int(11) NOT NULL,
  `matkul_id` varchar(10) NOT NULL,
  `nama_file` varchar(128) NOT NULL,
  `pertemuan` tinyint(2) NOT NULL,
  `tipe` varchar(24) NOT NULL,
  `size` int(11) NOT NULL,
  `path` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `modul`
--

INSERT INTO `modul` (`id`, `matkul_id`, `nama_file`, `pertemuan`, `tipe`, `size`, `path`) VALUES
(4, '112233', 'garuda1041215.pdf', 1, 'application/pdf', 558, '/home/gumil/public_html/simlab/uploads/modul/garuda1041215.pdf');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `praktikan_nim` varchar(16) NOT NULL,
  `matkul_id` varchar(10) NOT NULL,
  `latihan` text CHARACTER SET utf8mb4 COLLATE utf8mb4_bin DEFAULT NULL,
  `responsi` tinyint(3) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `pengaturan`
--

CREATE TABLE `pengaturan` (
  `id` int(4) NOT NULL,
  `nama` varchar(32) DEFAULT NULL,
  `tgl_mulai` date DEFAULT NULL,
  `tgl_akhir` date DEFAULT NULL,
  `value` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `pengaturan`
--

INSERT INTO `pengaturan` (`id`, `nama`, `tgl_mulai`, `tgl_akhir`, `value`) VALUES
(1, 'Pendaftaran praktikum', '2019-11-08', '2019-11-11', 'Dibuka');

-- --------------------------------------------------------

--
-- Table structure for table `praktikan_p`
--

CREATE TABLE `praktikan_p` (
  `id` int(11) NOT NULL,
  `praktikan_nim` varchar(16) NOT NULL,
  `matkul_id` varchar(10) NOT NULL,
  `date_added` datetime NOT NULL DEFAULT current_timestamp(),
  `date_expired` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` varchar(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `lokasi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `sessions`
--

CREATE TABLE `sessions` (
  `id` varchar(128) NOT NULL,
  `ip_address` varchar(45) NOT NULL,
  `timestamp` int(10) UNSIGNED NOT NULL DEFAULT 0,
  `data` blob NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `sessions`
--

INSERT INTO `sessions` (`id`, `ip_address`, `timestamp`, `data`) VALUES
('085f109617396ed16c64c5d6cccf93735d4aac7c', '::1', 1573712861, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333731323830363b6e616d617c733a343a2261726966223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a353a2261646d696e223b),
('311900d1e132e614e7794af88a1ae631f15cbabb', '::1', 1573712296, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333731323239363b),
('82a4abd4ed99f119077f29a57b2d6b68ce46ee8b', '::1', 1573721026, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333732313032363b),
('e7dd7c0be68e3bd5ceabb673d4c9a9ab3d099434', '::1', 1573712806, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333731323830363b6e616d617c733a343a2261726966223b757365726e616d657c733a353a2261646d696e223b726f6c657c733a353a2261646d696e223b);

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` varchar(16) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `prodi` varchar(64) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(64) NOT NULL,
  `role` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `prodi`, `username`, `password`, `role`) VALUES
('112233', 'arif', 'sistem informasi', 'admin', '$2y$10$IY2c4gX0x31DWxGrY452Yu14RY.XsafJQE8pax1YCOzk7krnuq.Jq', 'admin'),
('1500016034', 'Agung Gumilang', 'Sistem Informasi', 'gumil', '$2y$08$wAo7E81pVxbGFEFARAqKaeB9/JvstZ/UhvzvS1Ww49ztHw1ltL6PW', 'praktikan'),
('1500016038', 'Johnny Myer', 'Sistem Informasi', 'john', '$2y$08$BRWqUeaG4kC5mM.ADVp4SubMhpLBjecx32WDICBYeHLXCrAQXG5ti', 'asisten');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `asisten_p`
--
ALTER TABLE `asisten_p`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_asistenP_asisten` (`asisten_nim`),
  ADD KEY `fk_asistenP_matkul` (`matkul_id`);

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_matkul` (`matkul_id`),
  ADD KEY `fk_jadwal_ruang` (`ruang_id`);

--
-- Indexes for table `latihan`
--
ALTER TABLE `latihan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_latihan_praktikan` (`latihan_praktikan`),
  ADD KEY `fk_latihan_matkul` (`matkul_id`);

--
-- Indexes for table `matkul`
--
ALTER TABLE `matkul`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `modul`
--
ALTER TABLE `modul`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_matkul` (`matkul_id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `praktikan_p`
--
ALTER TABLE `praktikan_p`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_praktikanP_praktikan` (`praktikan_nim`),
  ADD KEY `fk_praktikanP_matkul` (`matkul_id`);

--
-- Indexes for table `ruang`
--
ALTER TABLE `ruang`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `sessions`
--
ALTER TABLE `sessions`
  ADD PRIMARY KEY (`id`,`ip_address`),
  ADD KEY `sessions_timestamp` (`timestamp`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `asisten_p`
--
ALTER TABLE `asisten_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `latihan`
--
ALTER TABLE `latihan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `modul`
--
ALTER TABLE `modul`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `praktikan_p`
--
ALTER TABLE `praktikan_p`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `asisten_p`
--
ALTER TABLE `asisten_p`
  ADD CONSTRAINT `fk_asistenP_asisten` FOREIGN KEY (`asisten_nim`) REFERENCES `asisten` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_asistenP_matkul` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD CONSTRAINT `fk_jadwal_matkul` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_jadwal_ruang` FOREIGN KEY (`ruang_id`) REFERENCES `ruang` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `latihan`
--
ALTER TABLE `latihan`
  ADD CONSTRAINT `fk_latihan_matkul` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_latihan_praktikan` FOREIGN KEY (`latihan_praktikan`) REFERENCES `praktikan` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `modul`
--
ALTER TABLE `modul`
  ADD CONSTRAINT `fk_matkul` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `praktikan_p`
--
ALTER TABLE `praktikan_p`
  ADD CONSTRAINT `fk_praktikanP_matkul` FOREIGN KEY (`matkul_id`) REFERENCES `matkul` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_praktikanP_praktikan` FOREIGN KEY (`praktikan_nim`) REFERENCES `praktikan` (`nim`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
