-- phpMyAdmin SQL Dump
-- version 4.9.2
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Mar 06, 2020 at 07:08 AM
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
  `pengalaman` varchar(35) NOT NULL,
  `status` varchar(35) NOT NULL,
  `usia` int(2) NOT NULL,
  `jk` varchar(35) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_karyawan`
--

INSERT INTO `tbl_karyawan` (`nrp`, `nm_karyawan`, `dept`, `seksi`, `gol`, `subgol`, `jab`, `pendidikan`, `pengalaman`, `status`, `usia`, `jk`) VALUES
('470', 'THOHARI', 'PROCESS ENGINEERING CHAIN', 'MAINTENANCE P.3', '2', '2E', 'TEKNISI', 'S1', 'Berpengalaman', 'Kontrak', 45, 'Pria'),
('491', 'SUSILO MURTI', 'HRD GA', 'IR, GA &amp; SECURITY (P3)', '2', '2B', 'DANRU', '', '', '', 0, ''),
('547', 'RONI WIJOYO', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE P1 & 2', '2', '2E', 'OPERATOR', '', '', '', 0, ''),
('551', 'ARIF MURSANTO', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '2', '2D', 'OPERATOR', '', '', '', 0, ''),
('562', 'ZULKARNAEN MANSUR', 'MARKETING FILTER', 'MARKETING FILTER', '4', '4E', 'DEPARTMENT HEAD', '', '', '', 0, ''),
('705', 'ANDY NUGROHO', 'ENGINEERING FILTER', 'ENGINEERING FILTER P5', '4', '4F', 'DEPARTMENT HEAD', '', '', '', 0, ''),
('707', 'ANANG SULISTIYONO', 'PROCESS ENGINEERING CHAIN', 'MAINTENANCE P.3', '2', '2D', 'TEKNISI', '', '', '', 0, ''),
('710', 'AGUS BUDIANTO', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('711', 'BANGUN P. SIMANGUNSONG', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('712', 'YULI SISWANTO', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3 (P3)', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('713', 'HERRY RUSMANA', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3 (P3)', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('714', 'JAINIH', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '2', '2A', 'LEADER', '', '', '', 0, ''),
('715', 'AMIRRULLAH', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3 (P3)', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('716', 'ALIF RUSAMSI', 'PRODUCTION CHAIN', 'ASSY CC', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('717', 'NANA SUKATMA', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('722', 'SYAEFUL BAHRI', 'PRODUCTION CHAIN', 'ASSY DC', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('723', 'SURADI', 'PRODUCTION CHAIN', 'ASSY DC', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('725', 'SURYANA', 'PRODUCTION CHAIN', 'ASSY DC', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('726', 'FAOZAN', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('728', 'EDI SUSANTO', 'PPIC CHAIN', 'PC & DELIVERY FG', '2', '2B', 'STAFF', '', '', '', 0, ''),
('731', 'ASDINERI', 'PRODUCTION CHAIN', 'ASSY DC', '2', '2B', 'OPERATOR', '', '', '', 0, ''),
('732', 'ZAINAL ABIDIN   ', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('733', 'M. YUSUF SUKMA ATMAJA', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3 (P3)', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('737', 'AAN SETIYONO', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('738', 'ASRI BASIR', 'PRODUCTION CHAIN', 'ASSY CC', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('739', 'BAHRUDIN', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('740', 'FAHRURROZI', 'PRODUCTION CHAIN', 'ASSY CC', '2', '2B', 'OPERATOR', '', '', '', 0, ''),
('741', 'I. GUSTI BAGUS SUJANA', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('744', 'RIANTO', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3 (P3)', '2', '2C', 'OPERATOR', '', '', '', 0, ''),
('745', 'SUDARTO', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('746', 'AHMADI', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '2', '2A', 'OPERATOR', '', '', '', 0, ''),
('749', 'M. ALAMSYAH', 'PRODUCTION INDUSTRIAL CHAIN', 'PRODUCTION & PROJECT MGT', '2', '2A', 'TEKNISI', '', '', '', 0, ''),
('750', 'M. SOLEH', 'PRODUCT, DIES & TOOL ENG', 'TOOLS ENGINEERING P3', '2', '2B', 'TEKNISI', '', '', '', 0, ''),
('751', 'MARTINUS ONIE WIDIYANTO', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '2', '2B', 'OPERATOR', '', '', '', 0, ''),
('753', 'RACHMAN SETIADY', 'PPIC CHAIN', 'PP & INVENTORY MATERIAL', '2', '2B', 'STAFF', '', '', '', 0, ''),
('754', 'SUPRIYATNO', 'PRODUCT, DIES & TOOL ENG', 'TOOLS ENGINEERING P3', '2', '2B', 'TEKNISI', '', '', '', 0, ''),
('756', 'SUPRIYANTO', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('757', 'SUWARYO', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE P1 & 2', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('759', 'AHMAD GUNAWAN', 'HRD GA ', 'RISK MGNT &amp; PERSONEL', '2', '2C', 'STAFF', '', '', '', 0, ''),
('768', 'AGUNG PUTRANTO', 'PRODUCTION CHAIN', 'PRODUCTION CHAIN P.1 , 2, & 3', '5', '5A', 'DEPARTMENT HEAD', '', '', '', 0, ''),
('771', 'IRFAN ZULKARNAEN', 'PROCESS ENGINEERING CHAIN', 'PROCESS ENGINEERING CHAIN', '4', '4E', 'DEPARTMENT HEAD', '', '', '', 0, ''),
('772', 'SULISNO', 'PLANT SERVIS FILTER', 'PLANT SERVIS FILTER P5', '4', '4D', 'SECTION HEAD', '', '', '', 0, ''),
('777', 'HARIYADI', 'QUALITY ASSURANCE', 'QUALITY ASSURANCE P1 & 2', '3', '3F', 'STAFF', '', '', '', 0, ''),
('779', 'LUSIANA EKA PUTRI', 'MARKETING FILTER', 'KEY ACCOUNT FILTER', '3', '3E', 'STAFF', '', '', '', 0, ''),
('781', 'SUMARNO', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3 (P3)', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('782', 'KUSWANTO', 'PRODUCTION CHAIN', 'ASSY CC', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('783', 'SUHARTO', 'PRODUCTION CHAIN', 'ASSY DC', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('785', 'MUHAMAD ALI', 'PRODUCTION CHAIN', 'ASSY CC', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('786', 'ABDULLAH', 'PRODUCTION CHAIN', 'ASSY DC', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('988', 'GALIH SETIAJIE', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('989', 'ASEP SUMARNA', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('990', 'RIHANTO', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '2', '2B', 'LEADER', '', '', '', 0, ''),
('996', 'WAHYU SUNEDI', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '2', '2A', 'STAFF ADMINISTRASI', '', '', '', 0, ''),
('1007', 'NURAINI', 'FIN & ACCT', 'FINANCE', '2', '2C', 'STAFF', '', '', '', 0, ''),
('1011', 'YOTAM FINA', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1014', 'INDRI OKTAVIANA', 'FIN & ACCT', 'FINANCE', '2', '2C', 'STAFF', '', '', '', 0, ''),
('1018', 'AHMAD NASHIRULHAQ', 'PRODUCT, DIES & TOOL ENG', 'PRODUCT, DIES & TOOL ENG', '4', '4D', 'PJS.DEPARTMENT HEAD', '', '', '', 0, ''),
('1024', 'HERAWAN SETYADI', 'MARKETING IND. CHAIN', 'MARKETING IND. CHAIN', '5', '5B', 'DEPARTMENT HEAD', '', '', '', 0, ''),
('1027', 'IWAN PURWANTO', 'PRODUCTION INDUSTRIAL CHAIN', 'PRODUCTION INDUSTRIAL CHAIN', '4', '4D', 'SECTION HEAD', '', '', '', 0, ''),
('1029', 'SURYANA ADI SAPUTRA', 'FIN & ACCT', 'GEN. ACCT. TAX & INT. AUDIT', '2', '2C', 'STAFF', '', '', '', 0, ''),
('1033', 'RONY AFFANDI', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3 (P3)', '1', '1D', 'STAFF', '', '', '', 0, ''),
('1037', 'PIPIT DWI AGUSTINA SUTEJA', 'PRODUCT, DIES & TOOL ENG', 'PRODUCT DEVELOPMENT', '1', '1F', 'TEKNISI', '', '', '', 0, ''),
('1038', 'DEVIT SETIAWAN', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('1042', 'SUTRIYANTO', 'PRODUCTION INDUSTRIAL CHAIN', 'PRODUCTION & PROJECT MGT', '2', '2C', 'TEKNISI', '', '', '', 0, ''),
('1044', 'WIYONO', 'HRD GA ', 'IR, GA &amp; SECURITY ', '2', '2A', 'DANRU', '', '', '', 0, ''),
('1046', 'MAWAN NURBIYANTO', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('1047', 'MUHAMAD SHOLEH', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1050', 'BUDI KURNIADI', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1057', 'SUGIYARTI', 'HRD GA ', 'RISK MGNT &amp; PERSONEL (P3)', '2', '2A', 'STAFF', '', '', '', 0, ''),
('1058', 'STEVANUS TRI SANTOSO', 'PROCESS ENGINEERING CHAIN', 'MAINTENANCE P.3', '2', '2A', 'TEKNISI', '', '', '', 0, ''),
('1059', 'SRI SUNARSIH', 'PROCESS ENGINEERING CHAIN', 'MAINTENANCE P.3', '1', '1E', 'STAFF ADMINISTRASI', '', '', '', 0, ''),
('1061', 'HIMAWAN KABUL LIYONO', 'PPIC CHAIN', 'PC &amp; DELIVERY FG (P3)', '2', '2A', 'STAFF', '', '', '', 0, ''),
('1062', 'ARI MARTINI', 'PPIC CHAIN', 'PP &amp; INVENTORY MATERIAL (P3)', '1', '1E', 'STAFF', '', '', '', 0, ''),
('1063', 'SITI WAGINAH', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1F', 'STAFF ADMINISTRASI', '', '', '', 0, ''),
('1124', 'IRWAN BUDI LEKSONO', 'MARKETING CHAIN', 'REPLACEMENT MARKET', '1', '1F', 'STAFF', '', '', '', 0, ''),
('1127', 'MARDIYONO', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1128', 'FERRY', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('1129', 'ASMU\'I', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1131', 'JURIANDI SITOHANG', 'PPIC CHAIN', 'PP &amp; INVENTORY MATERIAL (P3)', '1', '1E', 'STAFF', '', '', '', 0, ''),
('1133', 'AGUS SALIM', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1135', 'IKHSAN BUKHARI', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3 (P3)', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1136', 'BOWO SANTOSO', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('1138', 'TURINO', 'PPIC CHAIN', 'PP &amp; INVENTORY MATERIAL (P3)', '2', '2B', 'STAFF', '', '', '', 0, ''),
('1141', 'DJAMALUDIN', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1142', 'AGUS TRIONO', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3 (P3)', '1', '1F', 'OPERATOR', '', '', '', 0, ''),
('1143', 'NUROCHMAN', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1147', 'TONY ISWANTO', 'PRODUCTION CHAIN', 'PARTS MFG & HEAT TREATMENT P3', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1148', 'TULUS PERWITO ADI', 'HRD GA', 'EHS', '1', '1F', 'STAFF', '', '', '', 0, ''),
('1150', 'TRIYONO', 'PROCESS ENGINEERING CHAIN', 'MAINTENANCE P.1 & 2', '2', '2A', 'TEKNISI', '', '', '', 0, ''),
('1151', 'SUJITO', 'QUALITY ASSURANCE', 'QUALITY CONTROL P 1-2-3', '1', '1F', 'STAFF', '', '', '', 0, ''),
('1155', 'ROJIKIN', 'PRODUCTION CHAIN', 'ASSEMBLING PLANT 3', '1', '1E', 'OPERATOR', '', '', '', 0, ''),
('1156', 'YUDHI HANDOKO', 'PROCUREMENT FILTER', 'PROCUREMENT FILTER P5', '4', '4D', 'SECTION HEAD', '', '', '', 0, ''),
('1165', 'RUDY ANDRIYANTO', 'HRD GA', 'DEPARTMENT HEAD HRD GA', '5', '5B', 'DEPARTMENT HEAD', '', '', '', 0, ''),
('1190', 'MARIA PRATIWI UTARI', 'FIN & ACCT', 'FINANCE', '4', '4C', 'SECTION HEAD', '', '', '', 0, ''),
('1192', 'FANDY IRWANTO', 'PROCUREMENT CHAIN', 'PROCUREMENT CHAIN', '4', '4E', 'DEPARTMENT HEAD', '', '', '', 0, ''),
('1195', 'M. ASYHAR MAULIDI', 'PRODUCTION CHAIN', 'ASSEMBLING P.1 , 2, & 3', '4', '4C', 'SECTION HEAD', '', '', '', 0, ''),
('1196', 'DEWI LESTARI', 'FIN & ACCT', 'GEN. ACCT. TAX & INT. AUDIT', '1', '1E', 'STAFF', '', '', '', 0, ''),
('1198', 'WINARTI', 'HRD GA', 'EHS &amp; CSR', '3', '3D', 'STAFF', '', '', '', 0, ''),
('1199', 'ARYANA DIAH RENI CHRISTANTRI', 'PROCUREMENT CHAIN', 'GEN. PURCHASING', '4', '4C', 'SECTION HEAD', '', '', '', 0, ''),
('3006', 'Agnesia Indah', 'QUALITY ASSURANCE', 'QUALITY CONTROL CHAIN (P3)', '0', '0A', 'OPERATOR', 'D4', 'Fresh Graduate', 'Magang', 21, 'Pria');

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
(1, 'Kualitas', 'Core Factor'),
(2, 'Kuantitas', 'Core Factor'),
(3, 'Kerjasama', 'Core Factor'),
(4, 'Kepemimpinan', 'Core Factor'),
(5, 'Kemandirian', 'Secondary Factor'),
(6, 'QCC', 'Secondary Factor'),
(7, 'Sumbang Saran', 'Secondary Factor'),
(8, 'Keandalan dan Tanggung Jawab', 'Core Factor'),
(9, 'Absensi', 'Core Factor'),
(10, 'Penggunaan Waktu Kerja', 'Secondary Factor'),
(11, 'Pelaksanaan Peraturan Perusahaan', 'Secondary Factor'),
(12, 'Kehadiran', 'Secondary Factor');

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
(1, 470, 1, 5, 5),
(2, 470, 2, 9, 4),
(3, 470, 3, 32, 2),
(4, 470, 4, 18, 3),
(5, 470, 5, 23, 3),
(6, 470, 6, 29, 4),
(7, 470, 7, 32, 2),
(8, 470, 8, 38, 3),
(9, 470, 9, 44, 4),
(10, 470, 10, 48, 3),
(11, 470, 12, 59, 4),
(13, 3006, 1, 3, 3),
(14, 3006, 2, 8, 3),
(15, 3006, 3, 14, 4),
(16, 3006, 4, 19, 4),
(17, 3006, 5, 24, 4),
(18, 3006, 6, 28, 3),
(19, 3006, 7, 35, 5),
(20, 3006, 8, 39, 4),
(21, 3006, 9, 44, 4),
(22, 3006, 10, 49, 4),
(23, 3006, 11, 53, 3),
(24, 3006, 12, 58, 3),
(26, 1, 11, 54, 4);

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
(1, 470, 66, 78, 67, 89, 87, 88, 89, 87, 56, 78, 67, 56, '76', 'Baik', 'Umi', 'PROCESS ENGINEERING CHAIN', '2020-02-29', 'test');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_permintaan`
--

CREATE TABLE `tbl_permintaan` (
  `id_permintaan` int(10) NOT NULL,
  `departement` varchar(35) NOT NULL,
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
  `lama_kontrak` varchar(35) NOT NULL,
  `batas_usia` varchar(35) NOT NULL,
  `jk` varchar(15) NOT NULL,
  `skill` text NOT NULL,
  `bertanggungjawab` varchar(35) NOT NULL,
  `bawahan` varchar(10) NOT NULL,
  `jml_bawahan` varchar(5) NOT NULL,
  `tgs_pokok` text NOT NULL,
  `nrp_pemohon_ptk` int(5) NOT NULL,
  `dept_pemohon` int(11) NOT NULL,
  `tgl_permintaan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_sub_kriteria`
--

CREATE TABLE `tbl_sub_kriteria` (
  `id_sub_kriteria` int(11) NOT NULL,
  `id_kriteria` int(11) DEFAULT NULL,
  `nama_sub_kriteria` varchar(50) DEFAULT NULL,
  `nilai_sub_kriteria` double DEFAULT NULL
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
(6, 2, 'Kurang Sekali', 1),
(7, 2, 'Kurang', 2),
(8, 2, 'Cukup', 3),
(9, 2, 'Baik', 4),
(10, 2, 'Baik Sekali', 5),
(11, 3, 'Kurang Sekali', 1),
(12, 3, 'Kurang', 2),
(13, 3, 'Cukup', 3),
(14, 3, 'Baik', 4),
(15, 3, 'Baik Sekali', 5),
(16, 4, 'Kurang Sekali', 1),
(17, 4, 'Kurang', 2),
(18, 4, 'Cukup', 3),
(19, 4, 'Baik', 4),
(20, 4, 'Baik Sekali', 5),
(21, 5, 'Kurang Sekali', 1),
(22, 5, 'Kurang', 2),
(23, 5, 'Cukup', 3),
(24, 5, 'Baik', 4),
(25, 5, 'Baik Sekali', 5),
(26, 6, 'Kurang Sekali', 1),
(27, 6, 'Kurang', 2),
(28, 6, 'Cukup', 3),
(29, 6, 'Baik', 4),
(30, 6, 'Baik Sekali', 5),
(31, 7, 'Kurang Sekali', 1),
(32, 7, 'Kurang', 2),
(33, 7, 'Cukup', 3),
(34, 7, 'Baik', 4),
(35, 7, 'Baik Sekali', 5),
(36, 8, 'Kurang Sekali', 1),
(37, 8, 'Kurang', 2),
(38, 8, 'Cukup', 3),
(39, 8, 'Baik', 4),
(40, 8, 'Baik Sekali', 5),
(41, 9, 'Kurang Sekali', 1),
(42, 9, 'Kurang', 2),
(43, 9, 'Cukup', 3),
(44, 9, 'Baik', 4),
(45, 9, 'Baik Sekali', 5),
(46, 10, 'Kurang Sekali', 1),
(47, 10, 'Kurang', 2),
(48, 10, 'Cukup', 3),
(49, 10, 'Baik', 4),
(50, 10, 'Baik Sekali', 5),
(51, 11, 'Kurang Sekali', 1),
(52, 11, 'Kurang', 2),
(53, 11, 'Cukup', 3),
(54, 11, 'Baik', 4),
(55, 11, 'Baik Sekali', 5),
(56, 12, 'Kurang Sekali', 1),
(57, 12, 'Kurang', 2),
(58, 12, 'Cukup', 3),
(59, 12, 'Baik', 4),
(60, 12, 'Baik Sekali', 5),
(61, 13, 'Operator dan Staff Golongan 1', 1),
(62, 13, 'Staff Golongan 2', 2),
(63, 13, 'Staff Golongan 3', 3),
(64, 13, 'Leader', 4),
(65, 13, 'Foreman', 5);

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
  MODIFY `id_nilai_profil_karyawan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `tbl_penilaian`
--
ALTER TABLE `tbl_penilaian`
  MODIFY `id_penilaian` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tbl_permintaan`
--
ALTER TABLE `tbl_permintaan`
  MODIFY `id_permintaan` int(10) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_sub_kriteria`
--
ALTER TABLE `tbl_sub_kriteria`
  MODIFY `id_sub_kriteria` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `kd_login` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
