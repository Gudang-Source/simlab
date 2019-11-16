-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 16, 2019 at 09:09 PM
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

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`id`, `matkul_id`, `ruang_id`, `kelas`, `sesi`, `hari`) VALUES
(1, '112233', '1', 'A', 1, 'Senin'),
(2, '112233', '1', 'B', 3, 'Selasa'),
(3, '115566', '1', 'A', 1, 'Senin'),
(4, '123123', '1', 'A', 3, 'Senin'),
(5, '113345', '1', 'C', 2, 'Jum\'at');

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
-- Table structure for table `pembayaran`
--

CREATE TABLE `pembayaran` (
  `id` int(11) NOT NULL,
  `mhs_id` varchar(16) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `tanggal` date DEFAULT NULL,
  `keterangan` varchar(12) DEFAULT NULL
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
(1, 'Pendaftaran praktikum', '2019-11-14', '2019-11-28', 'Dibuka');

-- --------------------------------------------------------

--
-- Table structure for table `praktikum`
--

CREATE TABLE `praktikum` (
  `id` int(11) NOT NULL,
  `mhs_id` varchar(16) NOT NULL,
  `role_id` tinyint(4) NOT NULL,
  `jadwal_id` int(11) NOT NULL,
  `status` varchar(12) NOT NULL,
  `keterangan` varchar(12) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `praktikum`
--

INSERT INTO `praktikum` (`id`, `mhs_id`, `role_id`, `jadwal_id`, `status`, `keterangan`) VALUES
(7, '1500016034', 4, 4, 'belum lulus', 'ambil'),
(8, '1500016034', 4, 1, 'belum lulus', 'ambil'),
(9, '1500016034', 4, 3, 'belum lulus', 'ambil'),
(10, '1500016034', 4, 5, 'belum lulus', 'ambil');

-- --------------------------------------------------------

--
-- Table structure for table `role`
--

CREATE TABLE `role` (
  `id` tinyint(4) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `role`
--

INSERT INTO `role` (`id`, `nama`) VALUES
(1, 'superadmin'),
(2, 'admin'),
(3, 'asisten'),
(4, 'praktikan');

-- --------------------------------------------------------

--
-- Table structure for table `ruang`
--

CREATE TABLE `ruang` (
  `id` varchar(8) NOT NULL,
  `nama` varchar(64) NOT NULL,
  `lokasi` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ruang`
--

INSERT INTO `ruang` (`id`, `nama`, `lokasi`) VALUES
('1', 'Labkom', 'Kampus 4');

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
('03c3b21f8c2cf74e37cf7e2b1554f2f26be99457', '::1', 1573904521, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333930343531333b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('1369245efbe506727111cdf5d687c98fcd6d9664', '::1', 1573825171, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333832353137313b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('20ddcd5d87bd9bb6771abf777e779adbbd7dc165', '::1', 1573825754, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333832353735343b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('2163da90111e8455703a3dc55a9c876f331326cb', '::1', 1573890410, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333839303431303b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('25728d07a620f8c3ff032056e055e5eaea339435', '::1', 1573826176, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333832363137363b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('31f6c7af3860db1d93cbe8aa6de8e514349ede2e', '::1', 1573841565, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333834313536353b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('3677147bc842af1d625d13b1c608ad158259b1ff', '::1', 1573832242, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333833323234323b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('3d577d20fd1e4b43720d5be82370d935ae313133', '::1', 1573837257, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333833373235373b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('3fc54a32e8bb5a5b7e9a0353e6c0ca949d6a31cc', '::1', 1573934600, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333933343630303b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('48bf56cdb8479692d0a0bfce56587d77bd65b303', '::1', 1573931426, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333933313432363b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('59308f46272956834194cf77efb70752ae461267', '::1', 1573835615, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333833353631353b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('5f344290becc21c2ec2858943c494017097ce42c', '::1', 1573890105, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333839303130353b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('600212ec8d333e32a2943b5330a215a0013940e5', '::1', 1573824377, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333832343337373b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('77f7ddbbe455bd7032b8fc22ef46f23799f020d0', '::1', 1573904513, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333930343531333b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('90ce36e70e8885d6d5bb808fc4829ccd07d57c89', '::1', 1573836065, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333833363036353b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('9a5f1495478e2f5798e0e9c90956b2a6b117241c', '::1', 1573890410, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333839303431303b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('9c6d22a0b16b1f5a05d9b3c8d94f48bafcf99e8f', '::1', 1573830744, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333833303734343b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('adad8187a9996d49e160dbc215396bc75e4ad917', '::1', 1573834230, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333833343233303b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('b589c1fdf0117228a2943e020c4c28ba773f55ea', '::1', 1573832556, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333833323535363b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('c3b39d5c6bcc860976db3636b001a58ce9f52669', '::1', 1573903933, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333930333933333b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('c506a02c917b364a8be8b13a164b0b93f540acc9', '::1', 1573841651, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333834313536353b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('e321501f742423beeb43135f37d0e7734bf8ff07', '::1', 1573902484, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333930323438343b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('f498b4f495102b464175aba7688db25763b7e87e', '::1', 1573934749, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333933343630303b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('f80fa645e6877316f80c7dc1ff0e3f7c250646f6', '::1', 1573902137, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333930323133373b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('f87e73836ba46dfb342d8e0e97431e77331e2c00', '::1', 1573901321, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333930313332313b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b),
('ff9914e1280c385db8e6e6d25a6fe6d6718beba0', '::1', 1573829127, 0x5f5f63695f6c6173745f726567656e65726174657c693a313537333832393132373b6964757365727c733a31303a2231353030303136303334223b6e616d617c733a31343a224167756e672047756d696c616e67223b757365726e616d657c733a353a2267756d696c223b726f6c657c733a313a2234223b);

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
  `role_id` tinyint(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `nama`, `prodi`, `username`, `password`, `role_id`) VALUES
('112233', 'arif', 'sistem informasi', 'admin', '$2y$10$IY2c4gX0x31DWxGrY452Yu14RY.XsafJQE8pax1YCOzk7krnuq.Jq', 2),
('1500016034', 'Agung Gumilang', 'Sistem Informasi', 'gumil', '$2y$08$wAo7E81pVxbGFEFARAqKaeB9/JvstZ/UhvzvS1Ww49ztHw1ltL6PW', 4),
('1500016038', 'Johnny Myer', 'Sistem Informasi', 'john', '$2y$08$BRWqUeaG4kC5mM.ADVp4SubMhpLBjecx32WDICBYeHLXCrAQXG5ti', 3);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_jadwal_matkul` (`matkul_id`),
  ADD KEY `fk_jadwal_ruang` (`ruang_id`),
  ADD KEY `kelas` (`kelas`);

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
-- Indexes for table `pembayaran`
--
ALTER TABLE `pembayaran`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `pengaturan`
--
ALTER TABLE `pengaturan`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `praktikum`
--
ALTER TABLE `praktikum`
  ADD PRIMARY KEY (`id`),
  ADD KEY `mhs_id` (`mhs_id`),
  ADD KEY `fk_praktikum_role` (`role_id`),
  ADD KEY `fk_praktikum_jadwal` (`jadwal_id`);

--
-- Indexes for table `role`
--
ALTER TABLE `role`
  ADD PRIMARY KEY (`id`);

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
  ADD UNIQUE KEY `username` (`username`),
  ADD KEY `fk_user_role` (`role_id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

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
-- AUTO_INCREMENT for table `pembayaran`
--
ALTER TABLE `pembayaran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `pengaturan`
--
ALTER TABLE `pengaturan`
  MODIFY `id` int(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `praktikum`
--
ALTER TABLE `praktikum`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `role`
--
ALTER TABLE `role`
  MODIFY `id` tinyint(4) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

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
-- Constraints for table `praktikum`
--
ALTER TABLE `praktikum`
  ADD CONSTRAINT `fk_praktikum_jadwal` FOREIGN KEY (`jadwal_id`) REFERENCES `jadwal` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_praktikum_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_praktikum_user` FOREIGN KEY (`mhs_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `users`
--
ALTER TABLE `users`
  ADD CONSTRAINT `fk_user_role` FOREIGN KEY (`role_id`) REFERENCES `role` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
