-- phpMyAdmin SQL Dump
-- version 4.1.12
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jun 20, 2014 at 09:08 AM
-- Server version: 5.5.36
-- PHP Version: 5.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `sina`
--

-- --------------------------------------------------------

--
-- Table structure for table `bobot`
--

CREATE TABLE IF NOT EXISTS `bobot` (
  `bobot` varchar(5) COLLATE latin1_general_ci NOT NULL,
  `nilai` char(5) CHARACTER SET latin1 NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1 COLLATE=latin1_general_ci;

--
-- Dumping data for table `bobot`
--

INSERT INTO `bobot` (`bobot`, `nilai`) VALUES
('4', 'A'),
('3', 'B'),
('2', 'C'),
('1', 'D'),
('0', 'E'),
('0', 'T'),
('3.5', 'AB'),
('2.5', 'BC'),
('1.5', 'CD'),
('0.5', 'DE'),
('4', 'A'),
('3', 'B'),
('2', 'C'),
('1', 'D'),
('0', 'E'),
('0', 'T'),
('3.5', 'AB'),
('2.5', 'BC'),
('1.5', 'CD'),
('0.5', 'DE'),
('4', 'A'),
('3', 'B'),
('2', 'C'),
('1', 'D'),
('0', 'E'),
('0', 'T'),
('3.5', 'AB'),
('2.5', 'BC'),
('1.5', 'CD'),
('0.5', 'DE'),
('4', 'A'),
('3', 'B'),
('2', 'C'),
('1', 'D'),
('0', 'E'),
('0', 'T'),
('3.5', 'AB'),
('2.5', 'BC'),
('1.5', 'CD'),
('0.5', 'DE');

-- --------------------------------------------------------

--
-- Table structure for table `hari`
--

CREATE TABLE IF NOT EXISTS `hari` (
  `nm_hari` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `hari`
--

INSERT INTO `hari` (`nm_hari`) VALUES
('senin'),
('selasa'),
('rabu'),
('kamis'),
('jum''at'),
('sabtu'),
('minggu');

-- --------------------------------------------------------

--
-- Table structure for table `info`
--

CREATE TABLE IF NOT EXISTS `info` (
  `id` int(11) NOT NULL,
  `judul` varchar(100) NOT NULL,
  `info` varchar(200) NOT NULL,
  `tgl_post` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `info`
--

INSERT INTO `info` (`id`, `judul`, `info`, `tgl_post`) VALUES
(0, 'Mahasiswa T. Informatika Semester 8 ', 'Bagi mahasiswa yang belum melakukan pengajuan judul harus menghubungi dosen pembimbingan untuk konsultasi judul\r\nterima kasih', '2014-06-18 02:20:28');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `id_jab` int(11) NOT NULL AUTO_INCREMENT,
  `kd_jab` varchar(20) NOT NULL,
  `n_jab` varchar(20) NOT NULL,
  PRIMARY KEY (`id_jab`),
  UNIQUE KEY `kd_jab` (`kd_jab`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jab`, `kd_jab`, `n_jab`) VALUES
(1, 'KD01', 'admin'),
(2, 'KD02', 'dosen'),
(3, 'KD03', 'SuperAdmin');

-- --------------------------------------------------------

--
-- Table structure for table `jadwal`
--

CREATE TABLE IF NOT EXISTS `jadwal` (
  `kd_jadwal` varchar(50) NOT NULL,
  `id_kelas` int(11) NOT NULL,
  `id_matkul` int(10) NOT NULL,
  `id_smtr` int(10) NOT NULL,
  `nip_dosen` varchar(50) NOT NULL,
  `hari` varchar(10) NOT NULL,
  `mulai` varchar(10) NOT NULL,
  `selesai` varchar(10) NOT NULL,
  `ruang` varchar(10) NOT NULL,
  `thn_akademik` varchar(20) NOT NULL,
  `smtr_tmp` varchar(20) NOT NULL,
  `status` enum('0','1') NOT NULL,
  PRIMARY KEY (`kd_jadwal`),
  UNIQUE KEY `kd_jadwal` (`kd_jadwal`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jadwal`
--

INSERT INTO `jadwal` (`kd_jadwal`, `id_kelas`, `id_matkul`, `id_smtr`, `nip_dosen`, `hari`, `mulai`, `selesai`, `ruang`, `thn_akademik`, `smtr_tmp`, `status`) VALUES
('P2KEB', 1, 6, 1, 'dosen1', 'senin', '16:00', '17:30', 'F-14', '2013-2014', 'genap', '0'),
('P2KERP', 1, 8, 1, 'dosen1', 'minggu', '07:00', '09:00', 'D-18', '2013-2014', 'genap', '0'),
('P2KJAVA1', 1, 3, 1, 'dosen1', 'minggu', '13:00', '16:00', 'F-14', '2013-2014', 'genap', '0'),
('P2KPBO1', 1, 1, 1, 'dosen1', 'minggu', '17:30', '18:30', 'F-18', '2013-2014', 'genap', '0');

-- --------------------------------------------------------

--
-- Table structure for table `kelas`
--

CREATE TABLE IF NOT EXISTS `kelas` (
  `id_kelas` int(11) NOT NULL AUTO_INCREMENT,
  `kd_kelas` varchar(20) NOT NULL,
  `nm_kelas` varchar(50) NOT NULL,
  `thn_masuk` varchar(4) NOT NULL,
  PRIMARY KEY (`id_kelas`),
  UNIQUE KEY `kd_kls` (`id_kelas`),
  UNIQUE KEY `kd_kls_2` (`kd_kelas`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data for table `kelas`
--

INSERT INTO `kelas` (`id_kelas`, `kd_kelas`, `nm_kelas`, `thn_masuk`) VALUES
(1, 'IT/K', 'IT/P2K', '2010'),
(2, 'IT/R', 'IT/RGLR', '2010'),
(3, 'IT/RK', 'IT/KM', '2010');

-- --------------------------------------------------------

--
-- Table structure for table `login`
--

CREATE TABLE IF NOT EXISTS `login` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `userid` varchar(20) NOT NULL,
  `passid` varchar(50) NOT NULL,
  `level_user` tinyint(2) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `userid` (`userid`),
  KEY `userid_2` (`userid`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=17 ;

--
-- Dumping data for table `login`
--

INSERT INTO `login` (`id`, `userid`, `passid`, `level_user`) VALUES
(1, 'superadmin', 'superadmin', 3),
(2, 'admintest1', 'admintest1', 1),
(3, 'dosen1', 'dosen1', 2),
(4, '1055201097', '1055201097', 4),
(5, '1055201090', '1055201090', 4),
(6, '1055201091', '1055201091', 4),
(7, '1055201092', '1055201092', 4),
(8, '1055201093', '1055201093', 4),
(9, '1055201094', '1055201094', 4),
(10, '1055201095', '1055201095', 4),
(11, '1055201096', '1055201096', 4),
(12, '1055201098', '1055201098', 4),
(13, '1055201099', '1055201099', 4),
(14, '10552010100', '10552010100', 4),
(15, '10552010101', '10552010101', 4),
(16, '10552010102', '10552010102', 4);

-- --------------------------------------------------------

--
-- Table structure for table `matkul`
--

CREATE TABLE IF NOT EXISTS `matkul` (
  `id_matkul` int(11) NOT NULL AUTO_INCREMENT,
  `kd_matkul` varchar(50) NOT NULL,
  `nm_matkul` varchar(50) NOT NULL,
  `sks` int(10) NOT NULL,
  PRIMARY KEY (`id_matkul`),
  UNIQUE KEY `kd_matkul` (`id_matkul`),
  UNIQUE KEY `kd_matkul_2` (`kd_matkul`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=11 ;

--
-- Dumping data for table `matkul`
--

INSERT INTO `matkul` (`id_matkul`, `kd_matkul`, `nm_matkul`, `sks`) VALUES
(1, 'KBIT05', 'PEMOGRAMAN BERORIENTASI OBJEK', 3),
(2, 'BBIT01', 'ETIKA PROFESI & BERORGANISASI', 2),
(3, 'KBIT06', 'PEMOGRAMAN JAVA DASAR', 3),
(4, 'KBIT09', 'PEMOGRAMAN WEB DASAR', 3),
(5, 'KKFT07', 'METODELOGI PENELITIAN', 2),
(6, 'KKIT17', 'EBISNIS', 2),
(7, 'KKIT06', 'KEAMANAN SISTEM INFORMASI', 3),
(8, 'KKIT12', 'ENTERPRISE RESOURCE PLANNING', 3),
(9, 'KKIT11', 'SISTEM INFORMASI', 2),
(10, 'BUN02', 'KKN', 4);

-- --------------------------------------------------------

--
-- Table structure for table `mhs`
--

CREATE TABLE IF NOT EXISTS `mhs` (
  `nim` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(30) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `id_prodi` int(4) NOT NULL,
  `id_kelas` int(4) NOT NULL,
  `alamat` text NOT NULL,
  `telpon` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nim`),
  UNIQUE KEY `email` (`email`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mhs`
--

INSERT INTO `mhs` (`nim`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenkel`, `id_prodi`, `id_kelas`, `alamat`, `telpon`, `email`, `foto`) VALUES
('10552010100', 'Yudi Eka', 'tangerang', '2014-06-16', 'P', 1, 1, 'jl. tangerang', '0547885541', 'yudi@gmail.com', ''),
('10552010101', 'Fitria ningsih', 'tangerang', '2014-06-16', 'P', 1, 1, 'jl pasar babakan kota tangerang', '0548744556', 'fitria@gmail.com', ''),
('10552010102', 'Fitri Suwartini', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl. taman cibodas kota tangerang', '054844556', 'suwartini@gmail.com', ''),
('1055201090', 'Didik Suprayogi', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl kotabumi 2 kota tangerang ', '00874555545', 'didik@gmail.com', ''),
('1055201091', 'Indra Darussalam', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl  kosambi tangerang', '08574411222', 'indra@gmail.com', ''),
('1055201092', 'Ilham Edi S', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl.  gondrong cipondoh tangerang', '0888855666', 'ilham@gmail.com', ''),
('1055201093', 'Irwan Rosdiana', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl marganda kabupaten bogor', '0584665544', 'irwan@gmail.com', ''),
('1055201094', 'Didit P', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl. taman cibodas kota tangerang', '08544553322', 'didit@gmail.com', ''),
('1055201095', 'Mus mulyadi', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl. sepatan raya  no 1 kecamatan tangerang', '0789988877', 'mus@gmail.com', ''),
('1055201096', 'Fuadi', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl kebon besar   poris kota tangerang', '0845551122', 'fuad@gmail.com', ''),
('1055201097', 'supri yani', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl asem raya no 22 rt 01/04 panunggangan barat cibodas tangerang', '08355664452', 'soepry@gmail.com', ''),
('1055201098', 'Ahmad Abidin', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl perumnas II  cibodas tangerang', '08744541155', 'abidin@gmail.com', ''),
('1055201099', 'Akrom', 'tangerang', '2014-06-16', 'L', 1, 1, 'jl. selembaran jaya kosambi kabupaten tangerang ', '08745566213', 'akrom@gmail.com', '');

-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `id_jadwal` varchar(20) NOT NULL,
  `nim` varchar(50) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `absen` int(11) NOT NULL,
  `tugas` double NOT NULL,
  `uts` double NOT NULL,
  `uas` double NOT NULL,
  `grade` varchar(5) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=53 ;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`id`, `id_jadwal`, `nim`, `nama`, `absen`, `tugas`, `uts`, `uas`, `grade`) VALUES
(1, 'P2KPBO1', '10552010100', 'Yudi Eka', 11, 20, 20, 20, 'A'),
(2, 'P2KPBO1', '10552010101', 'Fitria ningsih', 11, 20, 20, 20, 'A'),
(3, 'P2KPBO1', '10552010102', 'Fitri Suwartini', 11, 20, 20, 20, 'A'),
(4, 'P2KPBO1', '1055201090', 'Didik Suprayogi', 11, 20, 20, 20, 'A'),
(5, 'P2KPBO1', '1055201091', 'Indra Darussalam', 11, 20, 20, 20, 'A'),
(6, 'P2KPBO1', '1055201092', 'Ilham Edi S', 11, 20, 20, 20, 'A'),
(7, 'P2KPBO1', '1055201093', 'Irwan Rosdiana', 11, 20, 20, 20, 'A'),
(8, 'P2KPBO1', '1055201094', 'Didit P', 11, 20, 20, 20, 'A'),
(9, 'P2KPBO1', '1055201095', 'Mus mulyadi', 11, 20, 20, 20, 'A'),
(10, 'P2KPBO1', '1055201096', 'Fuadi', 11, 20, 20, 20, 'A'),
(11, 'P2KPBO1', '1055201097', 'supri yani', 0, 0, 0, 0, ''),
(12, 'P2KPBO1', '1055201098', 'Ahmad Abidin', 0, 0, 0, 0, ''),
(13, 'P2KPBO1', '1055201099', 'Akrom', 0, 0, 0, 0, ''),
(14, 'P2KJAVA1', '10552010100', 'Yudi Eka', 11, 20, 20, 20, 'A'),
(15, 'P2KJAVA1', '10552010101', 'Fitria ningsih', 11, 20, 20, 20, 'A'),
(16, 'P2KJAVA1', '10552010102', 'Fitri Suwartini', 11, 20, 20, 20, 'A'),
(17, 'P2KJAVA1', '1055201090', 'Didik Suprayogi', 11, 20, 20, 20, 'A'),
(18, 'P2KJAVA1', '1055201091', 'Indra Darussalam', 11, 20, 20, 20, 'A'),
(19, 'P2KJAVA1', '1055201092', 'Ilham Edi S', 11, 20, 20, 20, 'A'),
(20, 'P2KJAVA1', '1055201093', 'Irwan Rosdiana', 11, 20, 20, 20, 'A'),
(21, 'P2KJAVA1', '1055201094', 'Didit P', 11, 20, 20, 20, 'A'),
(22, 'P2KJAVA1', '1055201095', 'Mus mulyadi', 11, 20, 20, 20, 'A'),
(23, 'P2KJAVA1', '1055201096', 'Fuadi', 11, 20, 20, 20, 'A'),
(24, 'P2KJAVA1', '1055201097', 'supri yani', 11, 20, 20, 20, 'A'),
(25, 'P2KJAVA1', '1055201098', 'Ahmad Abidin', 11, 20, 20, 20, 'A'),
(26, 'P2KJAVA1', '1055201099', 'Akrom', 11, 20, 20, 20, 'A'),
(27, 'P2KEB', '10552010100', 'Yudi Eka', 11, 20, 20, 20, 'A'),
(28, 'P2KEB', '10552010101', 'Fitria ningsih', 11, 20, 20, 20, 'A'),
(29, 'P2KEB', '10552010102', 'Fitri Suwartini', 11, 20, 20, 20, 'A'),
(30, 'P2KEB', '1055201090', 'Didik Suprayogi', 11, 20, 20, 20, 'A'),
(31, 'P2KEB', '1055201091', 'Indra Darussalam', 11, 20, 20, 20, 'A'),
(32, 'P2KEB', '1055201092', 'Ilham Edi S', 11, 20, 20, 20, 'A'),
(33, 'P2KEB', '1055201093', 'Irwan Rosdiana', 11, 20, 20, 20, 'A'),
(34, 'P2KEB', '1055201094', 'Didit P', 11, 20, 20, 20, 'A'),
(35, 'P2KEB', '1055201095', 'Mus mulyadi', 11, 20, 20, 20, 'A'),
(36, 'P2KEB', '1055201096', 'Fuadi', 11, 20, 20, 20, 'A'),
(37, 'P2KEB', '1055201097', 'supri yani', 11, 20, 20, 20, 'A'),
(38, 'P2KEB', '1055201098', 'Ahmad Abidin', 11, 20, 20, 20, 'A'),
(39, 'P2KEB', '1055201099', 'Akrom', 11, 20, 20, 20, 'A'),
(40, 'P2KERP', '10552010100', 'Yudi Eka', 11, 20, 20, 20, 'A'),
(41, 'P2KERP', '10552010101', 'Fitria ningsih', 11, 20, 20, 20, 'A'),
(42, 'P2KERP', '10552010102', 'Fitri Suwartini', 11, 20, 20, 20, 'A'),
(43, 'P2KERP', '1055201090', 'Didik Suprayogi', 11, 20, 20, 20, 'A'),
(44, 'P2KERP', '1055201091', 'Indra Darussalam', 11, 20, 20, 20, 'A'),
(45, 'P2KERP', '1055201092', 'Ilham Edi S', 11, 20, 20, 20, 'A'),
(46, 'P2KERP', '1055201093', 'Irwan Rosdiana', 11, 20, 20, 20, 'A'),
(47, 'P2KERP', '1055201094', 'Didit P', 11, 20, 20, 20, 'A'),
(48, 'P2KERP', '1055201095', 'Mus mulyadi', 11, 20, 20, 20, 'A'),
(49, 'P2KERP', '1055201096', 'Fuadi', 11, 20, 20, 20, 'A'),
(50, 'P2KERP', '1055201097', 'supri yani', 11, 20, 20, 20, 'A'),
(51, 'P2KERP', '1055201098', 'Ahmad Abidin', 11, 20, 20, 20, 'A'),
(52, 'P2KERP', '1055201099', 'Akrom', 11, 20, 20, 20, 'A');

-- --------------------------------------------------------

--
-- Table structure for table `pendidikan`
--

CREATE TABLE IF NOT EXISTS `pendidikan` (
  `idp` int(4) NOT NULL AUTO_INCREMENT,
  `pdk_nip` varchar(10) NOT NULL,
  `t_pdk` varchar(20) NOT NULL,
  `d_pdk` text NOT NULL,
  PRIMARY KEY (`idp`)
) ENGINE=MyISAM  DEFAULT CHARSET=latin1 AUTO_INCREMENT=7 ;

-- --------------------------------------------------------

--
-- Table structure for table `prodi`
--

CREATE TABLE IF NOT EXISTS `prodi` (
  `id_prodi` int(11) NOT NULL AUTO_INCREMENT,
  `kd_prodi` varchar(50) NOT NULL,
  `nm_prodi` varchar(50) NOT NULL,
  PRIMARY KEY (`id_prodi`),
  UNIQUE KEY `kd_prodi` (`id_prodi`),
  UNIQUE KEY `nm_prodi` (`nm_prodi`),
  UNIQUE KEY `kd_prodi_2` (`kd_prodi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data for table `prodi`
--

INSERT INTO `prodi` (`id_prodi`, `kd_prodi`, `nm_prodi`) VALUES
(1, 'TKIT', 'Teknik Informatika'),
(2, 'TKE', 'Teknik Elektro');

-- --------------------------------------------------------

--
-- Table structure for table `semester`
--

CREATE TABLE IF NOT EXISTS `semester` (
  `id_smstr` int(11) NOT NULL AUTO_INCREMENT,
  `kd_smstr` varchar(50) NOT NULL,
  `nm_smstr` varchar(50) NOT NULL,
  PRIMARY KEY (`id_smstr`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=9 ;

--
-- Dumping data for table `semester`
--

INSERT INTO `semester` (`id_smstr`, `kd_smstr`, `nm_smstr`) VALUES
(1, 'I', 'semester  I'),
(2, 'II', 'semester II'),
(3, 'III', 'semester  III'),
(4, 'IV', 'semester  IV'),
(5, 'V', 'semester  V'),
(6, 'VI', 'semester  VI'),
(7, 'VII', 'semester  VII'),
(8, 'VIII', 'semester  VIII');

-- --------------------------------------------------------

--
-- Table structure for table `staff`
--

CREATE TABLE IF NOT EXISTS `staff` (
  `nip` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `tmpt_lahir` varchar(20) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `jenkel` enum('L','P') NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `email` varchar(50) NOT NULL,
  `telpon` varchar(15) NOT NULL,
  `id_jab` tinyint(2) NOT NULL,
  `foto` varchar(100) NOT NULL,
  PRIMARY KEY (`nip`),
  UNIQUE KEY `email` (`email`),
  KEY `id_jab` (`id_jab`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `staff`
--

INSERT INTO `staff` (`nip`, `nama`, `tmpt_lahir`, `tgl_lahir`, `jenkel`, `alamat`, `email`, `telpon`, `id_jab`, `foto`) VALUES
('admintest1', 'admintest1', 'tangerang', '2014-06-04', 'L', 'jl tangerang', 'admintest1@gmail.com', '2145557774444', 1, ''),
('dosen1', 'dosen1', 'tangerang', '2014-06-03', 'L', 'jl. perintis kemerdekaan no5 cikokol tangerang ', 'dosen1@gmail.com', '02451144213', 2, ''),
('superadmin', 'superadmin', 'tangerang', '1980-06-03', 'L', 'JL kemerdekaan no 5 cikokol tangerang', 'superadmin@gmail.com', '021555766', 3, '');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
