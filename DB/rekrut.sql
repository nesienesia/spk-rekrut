-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jun 26, 2020 at 03:15 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.1

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `rekrut`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_department`
--

CREATE TABLE `tbl_department` (
  `id_dep` int(11) NOT NULL,
  `nm_dep` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_department`
--

INSERT INTO `tbl_department` (`id_dep`, `nm_dep`) VALUES
(1, 'HRD GA'),
(2, 'FIN AND ACT'),
(3, 'PPIC CHAIN'),
(4, 'QUALITY ASSURANCE'),
(5, 'admin'),
(6, 'MARKETING CHAIN'),
(7, 'MARKETING FILTER'),
(8, 'MARKETING INDUSTRIAL CHAIN'),
(9, 'PROCUREMENT CHAIN'),
(10, 'PROCUREMENT FILTER'),
(11, 'PRODUCTION CHAIN'),
(12, 'PROCESS ENGINEERING CHAIN'),
(13, 'PRODUCT DIES AND TOOL ENG'),
(14, 'PRODUCTION INDUSTRIAL CHAIN'),
(15, 'PRODUCTION FILTER'),
(16, 'ENGINEERING FILTER'),
(17, 'PPIC FILTER'),
(18, 'PLANT SERVIS FILTER');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_feedback`
--

CREATE TABLE `tbl_feedback` (
  `id_feedback` int(10) NOT NULL,
  `username` varchar(50) NOT NULL,
  `nilai` varchar(35) NOT NULL,
  `saran` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_info`
--

CREATE TABLE `tbl_info` (
  `id_info` int(11) NOT NULL,
  `judul` varchar(35) NOT NULL,
  `info_penyelenggara` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_karyawan`
--

CREATE TABLE `tbl_karyawan` (
  `nrp` varchar(5) NOT NULL,
  `nm_karyawan` varchar(35) DEFAULT NULL,
  `dept` varchar(35) DEFAULT NULL,
  `seksi` varchar(35) DEFAULT NULL,
  `gol` varchar(35) DEFAULT NULL,
  `subgol` varchar(35) DEFAULT NULL,
  `jab` varchar(35) DEFAULT NULL,
  `pendidikan` varchar(35) NOT NULL,
  `usia` int(2) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`nrp`, `nm_karyawan`, `dept`, `seksi`, `gol`, `subgol`, `jab`, `pendidikan`, `usia`) VALUES
('11101', 'SYAFRUDIN PURBA', 'MARKETING CHAIN', 'Replacement Market', '3', '3B', 'Staff', 'S1', 34),
('11102', 'ROCHIMANTO', 'MARKETING CHAIN', 'Key Account Chain', '3', '3A', 'Staff', 'D4', 23),
('11103', 'DARYANTO', 'PROCUREMENT CHAIN', 'Procurement Engineering', '1', '1B', 'Staff', 'SLTA', 45),
('11104', 'GUNAWAN SUTEJA', 'MARKETING INDUSTRIAL CHAIN', 'Key Account Ind. Chain', '1', '1F', 'Staff', 'SLTA', 33),
('11105', 'NURAINI', 'FIN AND ACT', 'Finance', '2', '2C', 'Staff', 'S1', 21),
('11106', 'ELMIFTA INDRIANI SUWANDI', 'PROCUREMENT FILTER', 'Gen .Purcashing Filter', '3', '3A', 'Staff', 'D4', 32),
('11107', 'TEGUH HARSAYA', 'HRD GA ', 'Filter Operation', '2', '2B', 'Staff', 'S1', 33),
('11108', 'NANDA WAHYU HIDAYAT', 'ENGINEERING FILTER', 'Product Engineering Filter', '3', '3B', 'Staff', 'SLTA', 45),
('11109', 'ABDUL ROHMAN', 'PRODUCTION FILTER', 'Assembling Filter', '1', '1A', 'Staff', 'D3', 26),
('11110', 'LUSIANA EKA PUTRI', 'MARKETING FILTER', 'Key Account Filter', '3', '3E', 'Staff', 'D3', 30);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_kriteria`
--

CREATE TABLE `tbl_kriteria` (
  `id_kriteria` int(11) NOT NULL,
  `nama_kriteria` varchar(100) DEFAULT NULL,
  `jenis_kriteria` varchar(50) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_kriteria`
--

INSERT INTO `tbl_kriteria` (`id_kriteria`, `nama_kriteria`, `jenis_kriteria`) VALUES
(1, 'Penilaian Karyawan', 'Core Factor'),
(2, 'Pendidikan', 'Secondary Factor'),
(3, 'Usia', 'Secondary Factor'),
(4, 'Departemen', 'Core Factor'),
(5, 'Lama Pengalaman', 'Secondary Factor');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_nilai_profil_karyawan`
--

CREATE TABLE `tbl_nilai_profil_karyawan` (
  `id_nilai_profil_karyawan` int(11) NOT NULL,
  `nrp` int(11) DEFAULT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `id_sub_kriteria` int(11) DEFAULT NULL,
  `nilai_profil_karyawan` double DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_nilai_profil_karyawan`
--

INSERT INTO `tbl_nilai_profil_karyawan` (`id_nilai_profil_karyawan`, `nrp`, `id_kriteria`, `id_sub_kriteria`, `nilai_profil_karyawan`) VALUES
(1, 11107, 1, 5, 5),
(2, 11105, 1, 1, 1),
(3, 11101, 1, 5, 5),
(4, 11102, 1, 2, 2),
(5, 11110, 1, 2, 2),
(6, 11104, 1, 5, 5),
(7, 11103, 1, 3, 3),
(8, 11106, 1, 3, 3),
(9, 11109, 1, 1, 1),
(10, 11108, 1, 4, 4),
(11, 11107, 2, 6, 1),
(12, 11105, 2, 6, 1),
(13, 11101, 2, 6, 1),
(14, 11102, 2, 7, 2),
(15, 11110, 2, 8, 3),
(16, 11104, 2, 10, 5),
(17, 11106, 2, 7, 2),
(18, 11109, 2, 8, 3),
(19, 11108, 2, 10, 5),
(20, 11103, 2, 10, 5),
(21, 11107, 3, 14, 4),
(22, 11105, 3, 11, 1),
(23, 11101, 3, 14, 4),
(24, 11102, 3, 12, 2),
(25, 11110, 3, 13, 3),
(26, 11104, 3, 14, 4),
(27, 11103, 3, 15, 5),
(28, 11106, 3, 14, 4),
(29, 11109, 3, 12, 2),
(30, 11108, 3, 15, 5),
(31, 11107, 4, 18, 3),
(32, 11105, 4, 16, 1),
(33, 11101, 4, 16, 1),
(34, 11102, 4, 16, 1),
(35, 11110, 4, 18, 3),
(36, 11104, 4, 16, 1),
(37, 11103, 4, 16, 1),
(38, 11106, 4, 18, 3),
(39, 11109, 4, 19, 4),
(40, 11108, 4, 19, 4),
(41, 11107, 5, 23, 4),
(42, 11105, 5, 23, 4),
(43, 11101, 5, 61, 5),
(44, 11102, 5, 61, 5),
(45, 11110, 5, 61, 5),
(46, 11104, 5, 20, 1),
(47, 11103, 5, 21, 2),
(48, 11106, 5, 22, 3),
(49, 11109, 5, 21, 2),
(50, 11108, 5, 22, 3);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_penilaian`
--

CREATE TABLE `tbl_penilaian` (
  `id_penilaian` int(10) NOT NULL,
  `nrp` int(10) NOT NULL,
  `kualitas` int(10) NOT NULL,
  `kuantitas` int(10) NOT NULL,
  `kerjasama` int(10) NOT NULL,
  `kepemimpinan` int(10) NOT NULL,
  `kemandirian` int(11) NOT NULL,
  `qcc` int(11) NOT NULL,
  `sumbang_saran` int(11) NOT NULL,
  `tanggung_jawab` int(11) NOT NULL,
  `absensi` int(11) NOT NULL,
  `waktu_kerja` int(11) NOT NULL,
  `pelaksanaan_peraturan` int(11) NOT NULL,
  `kehadiran` int(11) NOT NULL,
  `score` decimal(10,0) NOT NULL,
  `rekomendasi` varchar(50) NOT NULL,
  `pj_dephead` varchar(35) NOT NULL,
  `dept` varchar(35) NOT NULL,
  `tgl_pengisian` date NOT NULL,
  `catatan` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_penilaian`
--

INSERT INTO `tbl_penilaian` (`id_penilaian`, `nrp`, `kualitas`, `kuantitas`, `kerjasama`, `kepemimpinan`, `kemandirian`, `qcc`, `sumbang_saran`, `tanggung_jawab`, `absensi`, `waktu_kerja`, `pelaksanaan_peraturan`, `kehadiran`, `score`, `rekomendasi`, `pj_dephead`, `dept`, `tgl_pengisian`, `catatan`) VALUES
(1, 11101, 90, 89, 87, 78, 86, 89, 88, 86, 89, 88, 88, 89, '88', 'Baik Sekali', 'Rifan Amando', 'MARKETING CHAIN', '2020-06-13', 'Kinerja sudah sangat baik'),
(2, 11102, 66, 65, 56, 56, 55, 54, 56, 57, 58, 59, 57, 56, '59', 'Kurang', 'Rifan Amando', 'MARKETING CHAIN', '2020-06-13', 'Tingkatkan lagi kinerjanya'),
(3, 11103, 68, 66, 67, 65, 66, 65, 65, 76, 67, 76, 75, 78, '69', 'Cukup', 'Fandy Irwanto', 'PROCUREMENT CHAIN', '2020-06-13', 'Kinerja sudah cukup, tapi alahkah lebih baik jika ditingkatkan lagi'),
(4, 11104, 89, 87, 90, 90, 87, 87, 89, 87, 78, 76, 75, 78, '86', 'Baik Sekali', 'Herawan Setiyadi', 'MARKETING INDUSTRIAL CHAIN', '2020-06-13', 'Kinerja bagus'),
(5, 11105, 40, 45, 45, 45, 46, 46, 43, 56, 56, 54, 43, 55, '48', 'Kurang Sekali', 'Alvin Christanto Salim', 'FIN AND ACT', '2020-06-13', 'Kinerja Kurang'),
(6, 11106, 64, 67, 67, 66, 64, 65, 64, 67, 77, 78, 79, 79, '69', 'Cukup', 'Yudhi Handoko', 'PROCUREMENT FILTER', '2020-06-13', 'Kinerja sudah cukup'),
(7, 11107, 67, 68, 67, 66, 66, 65, 68, 66, 67, 78, 65, 68, '68', 'Cukup', 'Rudy Andrianto', 'HRD GA', '2020-06-13', 'Kinerja sudah cukup, tapi alangkah baiknya jika ditingkatkan'),
(8, 11108, 78, 77, 76, 78, 76, 80, 80, 76, 76, 78, 78, 77, '78', 'Baik', 'Andy Nugroho', 'ENGINEERING FILTER', '2020-06-13', 'Bagus'),
(9, 11109, 45, 54, 46, 47, 48, 44, 43, 54, 54, 45, 46, 54, '49', 'Kurang Sekali', 'Nelson Tampubolon', 'PRODUCTION FILTER', '2020-06-13', 'Kinerja kurang, tingkatkan lagi'),
(10, 11110, 56, 55, 57, 58, 59, 57, 56, 57, 58, 58, 57, 58, '58', 'Kurang', 'Zurkarnaen Mansur', 'MARKETING FILTER', '2020-06-13', 'kurang, tingkatkan lagi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaan`
--

CREATE TABLE `tbl_permintaan` (
  `id_permintaan` int(10) NOT NULL,
  `departemen` varchar(35) NOT NULL,
  `seksi` varchar(35) NOT NULL,
  `jabatan` varchar(35) NOT NULL,
  `golongan` varchar(35) NOT NULL,
  `jumlah` varchar(5) NOT NULL,
  `sumber_tenaga` varchar(35) NOT NULL,
  `due_date` date NOT NULL,
  `tujuan` varchar(35) NOT NULL,
  `an` text NOT NULL,
  `alasan` text NOT NULL,
  `pendidikan` varchar(35) NOT NULL,
  `jurusan` varchar(35) NOT NULL,
  `pengalaman` varchar(35) NOT NULL,
  `lama_pengalaman` varchar(35) NOT NULL,
  `bidang_pengalaman` varchar(35) NOT NULL,
  `status` varchar(35) NOT NULL,
  `status_kontrak` varchar(35) NOT NULL,
  `usia` varchar(35) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `skill` text NOT NULL,
  `bertanggungjawab` varchar(35) NOT NULL,
  `jml_bawahan` varchar(5) NOT NULL,
  `tgs_pokok` text NOT NULL,
  `nrp_pemohon_ptk` int(5) NOT NULL,
  `pemohon_ptk` varchar(35) NOT NULL,
  `tgl_permintaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_permintaan`
--

INSERT INTO `tbl_permintaan` (`id_permintaan`, `departemen`, `seksi`, `jabatan`, `golongan`, `jumlah`, `sumber_tenaga`, `due_date`, `tujuan`, `an`, `alasan`, `pendidikan`, `jurusan`, `pengalaman`, `lama_pengalaman`, `bidang_pengalaman`, `status`, `status_kontrak`, `usia`, `jk`, `skill`, `bertanggungjawab`, `jml_bawahan`, `tgs_pokok`, `nrp_pemohon_ptk`, `pemohon_ptk`, `tgl_permintaan`) VALUES
(4, 'HRD GA', 'People Development', 'Staff', '2', '1', 'Internal', '2020-03-31', 'Penambahan', '-', 'kekurangan orang', 'D4', 'Sistem Informasi', 'Pengalaman', '5 tahun', 'Administratif', 'Kontrak', '6 bulan', '35', 'P', '-', 'umi', '0', '-', 1234, 'Umi Kuswari', '2020-03-17');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_persetujuan_ptk`
--

CREATE TABLE `tbl_persetujuan_ptk` (
  `id_persetujuan` int(10) NOT NULL,
  `id_permintaan` int(10) NOT NULL,
  `persetujuan_ptk` varchar(35) NOT NULL,
  `ket_stj_ptk` text NOT NULL,
  `pic_ptk` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_persetujuan_ptk`
--

INSERT INTO `tbl_persetujuan_ptk` (`id_persetujuan`, `id_permintaan`, `persetujuan_ptk`, `ket_stj_ptk`, `pic_ptk`) VALUES
(1, 4, 'Setuju', 'coba', 'umi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_realisasi_ptk`
--

CREATE TABLE `tbl_realisasi_ptk` (
  `id_realisasi` int(10) NOT NULL,
  `id_persetujuan` int(10) NOT NULL,
  `mengetahui_ptk` varchar(35) NOT NULL,
  `nama_ptk` text NOT NULL,
  `tgl_ptk` date NOT NULL,
  `ket_ptk` text NOT NULL,
  `pj_ptk` varchar(35) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_realisasi_ptk`
--

INSERT INTO `tbl_realisasi_ptk` (`id_realisasi`, `id_persetujuan`, `mengetahui_ptk`, `nama_ptk`, `tgl_ptk`, `ket_ptk`, `pj_ptk`) VALUES
(1, 1, 'rudy', 'NURAINI', '2020-03-24', 'staff', 'umi');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kriteria`
--

CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nama_sub_kriteria` varchar(50) DEFAULT NULL,
  `nilai_sub_kriteria` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_sub_kriteria`
--

INSERT INTO `tbl_sub_kriteria` (`id_sub_kriteria`, `id_kriteria`, `nama_sub_kriteria`, `nilai_sub_kriteria`) VALUES
(1, 1, 'Kurang Sekali', 1),
(2, 1, 'Kurang', 2),
(3, 1, 'Cukup', 3),
(4, 1, 'Baik', 4),
(5, 1, 'Baik Sekali', 5),
(6, 2, 'S1', 1),
(7, 2, 'D4', 2),
(8, 2, 'D3', 3),
(9, 2, 'D1', 4),
(10, 2, 'SLTA', 5),
(11, 3, '17-21 Tahun', 1),
(12, 3, '22-26 Tahun', 2),
(13, 3, '27-31 Tahun', 3),
(14, 3, '32-36 Tahun', 4),
(15, 3, '> 37 Tahun', 5),
(16, 4, 'Administrasi - Chain', 1),
(17, 4, 'Plant - Chain', 2),
(18, 4, 'Administrasi - Filter', 3),
(19, 4, 'Plant - Filter', 4),
(20, 5, '1 Tahun', 1),
(21, 5, '2-5 Tahun', 2),
(22, 5, '6-10 Tahun', 3),
(23, 5, '11-15 Tahun', 4),
(61, 5, '> 15 Tahun', 5);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `kd_login` int(10) NOT NULL,
  `username` varchar(50) DEFAULT NULL,
  `password` text DEFAULT NULL,
  `level` enum('dephead','hrd','director','admin') DEFAULT NULL,
  `dept` int(10) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`kd_login`, `username`, `password`, `level`, `dept`) VALUES
(1, 'HRD_GA ', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 1),
(2, 'Admin_HRD_1', '4d28b3e41ef8acc1e7901e626f30451c', 'hrd', 5),
(3, 'Director', '14b0d4a6c060e9f2d59714d31805268b', 'director', 5),
(4, 'agnesia', '21232f297a57a5a743894a0e4a801fc3', 'admin', 5),
(5, 'Admin_HRD_2', '4d28b3e41ef8acc1e7901e626f30451c', 'hrd', 5),
(6, 'Admin_HRD_3', '4d28b3e41ef8acc1e7901e626f30451c', 'hrd', 5),
(7, 'Fin_and_Act', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 2),
(8, 'PPIC_Chain', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 3),
(9, 'Quality_Assurance', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 4),
(10, 'Marketing_Chain', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 6),
(11, 'Marketing_Filter', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 7),
(12, 'Marketing_Industrial_Chain', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 8),
(13, 'Procurement_Chain', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 9),
(14, 'Procurement_Filter', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 10),
(15, 'Production_Chain', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 11),
(16, 'Process_Engineering_Chain', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 12),
(17, 'Product_Dies_and_Tool_Eng', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 13),
(18, 'superuser', '54b53072540eeeb8f8e9343e71f28176', 'admin', 5),
(19, 'Production_Chain', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 14),
(20, 'Production_Filter', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 15),
(21, 'Engineering_Filter', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 16),
(22, 'PPIC_Filter', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 17),
(23, 'Plant_Service_Filter', '14b0d4a6c060e9f2d59714d31805268b', 'dephead', 18);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_department`
--
ALTER TABLE `tbl_department`
  ADD PRIMARY KEY (`id_dep`);

--
-- Indexes for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  ADD PRIMARY KEY (`id_feedback`);

--
-- Indexes for table `tbl_info`
--
ALTER TABLE `tbl_info`
  ADD PRIMARY KEY (`id_info`);

--
-- Indexes for table `tbl_karyawan`
--
ALTER TABLE `tbl_karyawan`
  ADD PRIMARY KEY (`nrp`);

--
-- Indexes for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  ADD PRIMARY KEY (`id_kriteria`);

--
-- Indexes for table `tbl_nilai_profil_karyawan`
--
ALTER TABLE `tbl_nilai_profil_karyawan`
  ADD PRIMARY KEY (`id_nilai_profil_karyawan`);

--
-- Indexes for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  ADD PRIMARY KEY (`id_penilaian`),
  ADD UNIQUE KEY `kd_realisasi` (`nrp`);

--
-- Indexes for table `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  ADD PRIMARY KEY (`id_permintaan`);

--
-- Indexes for table `tbl_persetujuan_ptk`
--
ALTER TABLE `tbl_persetujuan_ptk`
  ADD PRIMARY KEY (`id_persetujuan`),
  ADD KEY `id_permintaan` (`id_permintaan`) USING BTREE;

--
-- Indexes for table `tbl_realisasi_ptk`
--
ALTER TABLE `tbl_realisasi_ptk`
  ADD PRIMARY KEY (`id_realisasi`);

--
-- Indexes for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  ADD PRIMARY KEY (`id_sub_kriteria`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`kd_login`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_department`
--
ALTER TABLE `tbl_department`
  MODIFY `id_dep` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `tbl_feedback`
--
ALTER TABLE `tbl_feedback`
  MODIFY `id_feedback` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_info`
--
ALTER TABLE `tbl_info`
  MODIFY `id_info` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_kriteria`
--
ALTER TABLE `tbl_kriteria`
  MODIFY `id_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT for table `tbl_nilai_profil_karyawan`
--
ALTER TABLE `tbl_nilai_profil_karyawan`
  MODIFY `id_nilai_profil_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=51;

--
-- AUTO_INCREMENT for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `id_penilaian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  MODIFY `id_permintaan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `tbl_persetujuan_ptk`
--
ALTER TABLE `tbl_persetujuan_ptk`
  MODIFY `id_persetujuan` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_realisasi_ptk`
--
ALTER TABLE `tbl_realisasi_ptk`
  MODIFY `id_realisasi` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=62;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_login` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
