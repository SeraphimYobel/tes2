-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 21, 2023 at 05:23 PM
-- Server version: 10.4.27-MariaDB
-- PHP Version: 8.2.0

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `siakad`
--

-- --------------------------------------------------------

--
-- Table structure for table `ijazah`
--

CREATE TABLE `ijazah` (
  `id` int(11) NOT NULL,
  `taruna` int(11) NOT NULL,
  `program_studi` int(11) NOT NULL,
  `tanggal_ijazah` date NOT NULL,
  `tanggal_pengesahan` date NOT NULL,
  `gelar_akademik` varchar(255) NOT NULL,
  `nomor_sk` varchar(255) NOT NULL,
  `wakil_direktur` int(11) NOT NULL,
  `direktur` int(11) NOT NULL,
  `nomor_ijazah` varchar(255) NOT NULL,
  `nomor_seri` varchar(255) NOT NULL,
  `tanggal_yudisium` date NOT NULL,
  `judul_kkw` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Table structure for table `kota`
--

CREATE TABLE `kota` (
  `id` int(11) NOT NULL,
  `kode_kota` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `kota`
--

INSERT INTO `kota` (`id`, `kode_kota`, `nama`) VALUES
(1, 'BTM', 'Batam'),
(2, 'JKT', 'Jakarta'),
(3, 'BDG', 'Bandung'),
(4, 'MDN', 'Medan'),
(5, 'YGY', 'Yogyakarta'),
(6, 'KDS', 'Kudus'),
(7, 'PLG', 'Palembang'),
(8, 'BWI', 'Banyuwangi'),
(9, 'BKG', 'Bangkinang'),
(10, 'BKS', 'Bekasi');

-- --------------------------------------------------------

--
-- Table structure for table `matakuliah`
--

CREATE TABLE `matakuliah` (
  `id` int(11) NOT NULL,
  `kode` varchar(255) NOT NULL,
  `matakuliah` varchar(255) NOT NULL,
  `sks` int(11) NOT NULL,
  `semester` enum('Semester I','Semester II','Semester III','Semester IV','Semester V','Semester VI') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `matakuliah`
--

INSERT INTO `matakuliah` (`id`, `kode`, `matakuliah`, `sks`, `semester`) VALUES
(2, '200302215', 'Pemrograman Web II', 3, 'Semester IV'),
(3, '200002103', 'Bahasa Indonesia', 2, 'Semester IV'),
(4, '200302214', 'Interaksi Manusia Komputer', 2, 'Semester IV'),
(5, '200302216', 'Analisa Berorientasi Objek', 3, 'Semester IV'),
(6, '200302304', 'Sistem Jaringan I', 3, 'Semester IV'),
(7, '200302305', 'Data Science', 3, 'Semester IV'),
(8, '200302306', 'Komunikasi Data', 3, 'Semester IV'),
(9, '200001104', 'Bahasa Inggris', 2, 'Semester I'),
(10, '200001108', 'ICT Literacy', 2, 'Semester I'),
(11, '200301307', 'Data Mining', 3, 'Semester V'),
(12, '200002101', 'Pendidikan Pancasila', 2, 'Semester II'),
(13, '200002106', 'Estetika Humanisme', 2, 'Semester II'),
(14, '200001105', 'Pendidikan Kewarganegaraan', 2, 'Semester III'),
(15, '200001107', 'Pendidikan Agama', 2, 'Semester III'),
(16, '200301217', 'Pemrograman Berorientasi Objek', 3, 'Semester V'),
(17, '200301307', 'Data Mining', 3, 'Semester V'),
(18, '200002102', 'Pendidikan Kewirausahaan', 2, 'Semester VI'),
(19, '200302218', 'Rekayasa Perangkat Lunak', 3, 'Semester VI');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE `nilai` (
  `id` int(11) NOT NULL,
  `taruna` int(11) NOT NULL,
  `nilai_angka` int(11) NOT NULL,
  `nilai_huruf` varchar(255) NOT NULL,
  `matakuliah` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `taruna`, `nilai_angka`, `nilai_huruf`, `matakuliah`) VALUES
(1, 5, 100, 'A', 2),
(2, 2, 100, 'A', 2),
(3, 3, 100, 'A', 2),
(4, 4, 100, 'A', 2);

-- --------------------------------------------------------

--
-- Table structure for table `pejabat`
--

CREATE TABLE `pejabat` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nidn` varchar(255) NOT NULL,
  `golongan` varchar(255) NOT NULL,
  `jabatan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `pejabat`
--

INSERT INTO `pejabat` (`id`, `nama`, `nidn`, `golongan`, `jabatan`) VALUES
(1, 'RADEN MUHAMAD FIRZATULLAH', '0306049401', '1A', 'Asisten Ahli');

-- --------------------------------------------------------

--
-- Table structure for table `program_studi`
--

CREATE TABLE `program_studi` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `program_pendidikan` enum('Diploma III','Diploma IV','Sarjana') NOT NULL,
  `akreditasi` enum('Baik','Baik Sekali','Unggul') NOT NULL,
  `sk_akreditasi` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `program_studi`
--

INSERT INTO `program_studi` (`id`, `nama`, `program_pendidikan`, `akreditasi`, `sk_akreditasi`) VALUES
(1, 'Informatika', 'Sarjana', 'Baik Sekali', '001/AKRED/TI/UNSIA'),
(2, 'Akuntansi', 'Sarjana', 'Baik Sekali', '001/AKRED/AK/UNSIA'),
(3, 'Manajemen', 'Sarjana', 'Baik Sekali', '001/AKRED/MJ/UNSIA'),
(4, 'Komunikasi', 'Sarjana', 'Baik Sekali', '001/AKRED/KM/UNSIA'),
(5, 'Sistem Informasi', 'Sarjana', 'Baik Sekali', '001/AKRED/SI/UNSIA');

-- --------------------------------------------------------

--
-- Table structure for table `taruna`
--

CREATE TABLE `taruna` (
  `id` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `nomor_taruna` varchar(255) NOT NULL,
  `tempat_lahir` int(11) NOT NULL,
  `tanggal_lahir` date NOT NULL,
  `program_studi` int(11) NOT NULL,
  `foto` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `taruna`
--

INSERT INTO `taruna` (`id`, `nama`, `nomor_taruna`, `tempat_lahir`, `tanggal_lahir`, `program_studi`, `foto`) VALUES
(2, 'Joanne Landy Tantreece', '210401010022', 1, '2003-10-18', 1, 'file'),
(3, 'Iwan Aslich', '210401010043', 6, '1986-01-23', 1, 'file'),
(4, 'Rizki Ramadhan', '220401020003', 7, '1993-02-24', 1, 'file'),
(5, 'Krisna Krisdianto Saputra ', '200401072028', 8, '2002-10-26', 1, 'file'),
(6, 'Nuri Hasanah', ' 200401010021', 9, '2001-11-26', 1, 'file'),
(7, 'Kevin Setiawan', '210401120004', 10, '2003-06-01', 1, 'file'),
(8, 'Ahmad Sofiyullah', '220401020035', 2, '1989-07-17', 1, 'file');

-- --------------------------------------------------------

--
-- Table structure for table `transkip_nilai`
--

CREATE TABLE `transkip_nilai` (
  `id` int(11) NOT NULL,
  `taruna` int(11) NOT NULL,
  `ijazah` int(11) NOT NULL,
  `program_studi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `ijazah`
--
ALTER TABLE `ijazah`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_ijazah_taruna` (`taruna`),
  ADD KEY `fk_ijazah_program_studi` (`program_studi`),
  ADD KEY `fk_ijazah_wakil_direktur` (`wakil_direktur`),
  ADD KEY `fk_ijazah_direktur` (`direktur`);

--
-- Indexes for table `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `matakuliah`
--
ALTER TABLE `matakuliah`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `nilai`
--
ALTER TABLE `nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_nilai_taruna` (`taruna`),
  ADD KEY `fk_nilai_matakuliah` (`matakuliah`);

--
-- Indexes for table `pejabat`
--
ALTER TABLE `pejabat`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `program_studi`
--
ALTER TABLE `program_studi`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `taruna`
--
ALTER TABLE `taruna`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_taruna_kota` (`tempat_lahir`),
  ADD KEY `fk_taruna_program_studi` (`program_studi`);

--
-- Indexes for table `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_transkip_taruna` (`taruna`),
  ADD KEY `fk_transkip_ijazah` (`ijazah`),
  ADD KEY `fk_transkip_program_studi` (`program_studi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `ijazah`
--
ALTER TABLE `ijazah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `kota`
--
ALTER TABLE `kota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `matakuliah`
--
ALTER TABLE `matakuliah`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT for table `nilai`
--
ALTER TABLE `nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `pejabat`
--
ALTER TABLE `pejabat`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `program_studi`
--
ALTER TABLE `program_studi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `taruna`
--
ALTER TABLE `taruna`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `ijazah`
--
ALTER TABLE `ijazah`
  ADD CONSTRAINT `fk_ijazah_direktur` FOREIGN KEY (`direktur`) REFERENCES `pejabat` (`id`),
  ADD CONSTRAINT `fk_ijazah_program_studi` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`),
  ADD CONSTRAINT `fk_ijazah_taruna` FOREIGN KEY (`taruna`) REFERENCES `taruna` (`id`),
  ADD CONSTRAINT `fk_ijazah_wakil_direktur` FOREIGN KEY (`wakil_direktur`) REFERENCES `pejabat` (`id`);

--
-- Constraints for table `nilai`
--
ALTER TABLE `nilai`
  ADD CONSTRAINT `fk_nilai_matakuliah` FOREIGN KEY (`matakuliah`) REFERENCES `matakuliah` (`id`),
  ADD CONSTRAINT `fk_nilai_taruna` FOREIGN KEY (`taruna`) REFERENCES `taruna` (`id`);

--
-- Constraints for table `taruna`
--
ALTER TABLE `taruna`
  ADD CONSTRAINT `fk_taruna_kota` FOREIGN KEY (`tempat_lahir`) REFERENCES `kota` (`id`),
  ADD CONSTRAINT `fk_taruna_program_studi` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`);

--
-- Constraints for table `transkip_nilai`
--
ALTER TABLE `transkip_nilai`
  ADD CONSTRAINT `fk_transkip_ijazah` FOREIGN KEY (`ijazah`) REFERENCES `ijazah` (`id`),
  ADD CONSTRAINT `fk_transkip_program_studi` FOREIGN KEY (`program_studi`) REFERENCES `program_studi` (`id`),
  ADD CONSTRAINT `fk_transkip_taruna` FOREIGN KEY (`taruna`) REFERENCES `taruna` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
