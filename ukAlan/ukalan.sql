-- phpMyAdmin SQL Dump
-- version 3.2.0.1
-- http://www.phpmyadmin.net
--
-- Host: localhost
-- Generation Time: Feb 21, 2015 at 06:12 AM
-- Server version: 5.1.37
-- PHP Version: 5.3.0

SET SQL_MODE="NO_AUTO_VALUE_ON_ZERO";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `ukalan`
--

-- --------------------------------------------------------

--
-- Table structure for table `admin`
--

CREATE TABLE IF NOT EXISTS `admin` (
  `no` varchar(5) NOT NULL,
  `username` varchar(10) NOT NULL,
  `password` varchar(32) NOT NULL,
  PRIMARY KEY (`no`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `admin`
--

INSERT INTO `admin` (`no`, `username`, `password`) VALUES
('1', 'alan', '02558a70324e7c4f269c69825450cec8');

-- --------------------------------------------------------

--
-- Table structure for table `bidang_studi`
--

CREATE TABLE IF NOT EXISTS `bidang_studi` (
  `bidang_kode` char(10) NOT NULL,
  `bidang_nama` varchar(30) NOT NULL,
  PRIMARY KEY (`bidang_kode`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bidang_studi`
--

INSERT INTO `bidang_studi` (`bidang_kode`, `bidang_nama`) VALUES
('1', 'SQL');

-- --------------------------------------------------------

--
-- Table structure for table `guru`
--

CREATE TABLE IF NOT EXISTS `guru` (
  `Kode_guru` char(5) NOT NULL,
  `Kode_kk` char(5) NOT NULL,
  `Nama_guru` varchar(20) NOT NULL,
  `NIP` char(15) NOT NULL,
  `Alamat_guru` varchar(30) NOT NULL,
  `Telp_guru` varchar(12) NOT NULL,
  PRIMARY KEY (`Kode_guru`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `guru`
--

INSERT INTO `guru` (`Kode_guru`, `Kode_kk`, `Nama_guru`, `NIP`, `Alamat_guru`, `Telp_guru`) VALUES
('1', '1', 'Rudy Hendrayanto', '2147483647', 'Depok', '01842315431'),
('2', '1', 'Benny Novico Zani', '2147483647', 'Depok', '085456123423');

-- --------------------------------------------------------

--
-- Table structure for table `kompetensi_keahlian`
--

CREATE TABLE IF NOT EXISTS `kompetensi_keahlian` (
  `Kode_kk` char(5) NOT NULL,
  `Kode_mata_diklat` char(5) NOT NULL,
  `Nama_kompetensi_keahlian` varchar(25) NOT NULL,
  PRIMARY KEY (`Kode_kk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kompetensi_keahlian`
--

INSERT INTO `kompetensi_keahlian` (`Kode_kk`, `Kode_mata_diklat`, `Nama_kompetensi_keahlian`) VALUES
('1', '20', 'Rekayasa Perangkat Lunak');

-- --------------------------------------------------------

--
-- Table structure for table `mata_diklat`
--

CREATE TABLE IF NOT EXISTS `mata_diklat` (
  `Kode_mata_diklat` char(5) NOT NULL,
  `Nama_mata_diklat` varchar(25) NOT NULL,
  PRIMARY KEY (`Kode_mata_diklat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `mata_diklat`
--


-- --------------------------------------------------------

--
-- Table structure for table `nilai`
--

CREATE TABLE IF NOT EXISTS `nilai` (
  `NISN` char(10) NOT NULL,
  `Kode_guru` char(5) NOT NULL,
  `Kode_sk` char(5) NOT NULL,
  `Nilai_angka` varchar(8) NOT NULL,
  `Nilai_huruf` varchar(8) NOT NULL,
  PRIMARY KEY (`NISN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `nilai`
--

INSERT INTO `nilai` (`NISN`, `Kode_guru`, `Kode_sk`, `Nilai_angka`, `Nilai_huruf`) VALUES
('9976338302', '1', '1', '100', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `siswa`
--

CREATE TABLE IF NOT EXISTS `siswa` (
  `NISN` char(10) NOT NULL,
  `Kode_kk` char(5) NOT NULL,
  `Nama_siswa` varchar(25) NOT NULL,
  `Alamat_siswa` varchar(30) NOT NULL,
  `Tgl_lahir` date NOT NULL,
  `Foto_siswa` varchar(200) NOT NULL,
  PRIMARY KEY (`NISN`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `siswa`
--

INSERT INTO `siswa` (`NISN`, `Kode_kk`, `Nama_siswa`, `Alamat_siswa`, `Tgl_lahir`, `Foto_siswa`) VALUES
('1234483514', '1', 'Eko Winarto', 'Depok', '1997-09-05', '9167_528950307115078_79038653_n.jpg'),
('2345677513', '1', 'M Budi Indra Cahya', 'Depok', '1996-05-05', '17991_596568613687192_1011071342_n.jpg'),
('3514267891', '1', 'M Hafiz Rafsanjani', 'Depok', '1997-04-25', '305904_528950513781724_220526818_n.jpg'),
('4124375349', '1', 'Muhammad Izzuddin', 'Depok', '1997-07-15', '399227_528721897137919_2030475480_n.jpg'),
('5314275159', '1', 'Naufal Bagas Fakhar', 'Depok', '1996-07-06', 'IMG_20131003_075527.jpg'),
('7541341568', '1', 'Fitrah Ramadhan', 'Depok', '1996-02-19', 'IMG_20131003_075453.jpg'),
('993657321', '1', 'Dimas Hendarto', 'Depok', '1996-11-04', 'IMG_20131115_072758.jpg'),
('9976338302', '1', 'Ahmad Maulana', 'Depok', '1997-08-02', '34791_111314832272978_4953063_n.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `standar_kompetensi`
--

CREATE TABLE IF NOT EXISTS `standar_kompetensi` (
  `Kode_sk` char(5) NOT NULL,
  `Kode_kk` char(5) NOT NULL,
  `Nama_sk` varchar(25) NOT NULL,
  `Kelas_sk` varchar(10) NOT NULL,
  PRIMARY KEY (`Kode_sk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `standar_kompetensi`
--

INSERT INTO `standar_kompetensi` (`Kode_sk`, `Kode_kk`, `Nama_sk`, `Kelas_sk`) VALUES
('10', '1', 'Kurtilas', 'A');

-- --------------------------------------------------------

--
-- Table structure for table `wali_murid`
--

CREATE TABLE IF NOT EXISTS `wali_murid` (
  `Kode_wali` char(5) NOT NULL,
  `NISN` char(10) NOT NULL,
  `Nama_ayah` varchar(25) NOT NULL,
  `Pekerjaan_ayah` varchar(25) NOT NULL,
  `Nama_ibu` varchar(25) NOT NULL,
  `Pekerjaan_ibu` varchar(25) NOT NULL,
  `Alamat_wali` varchar(30) NOT NULL,
  `Telp_wali` varchar(12) NOT NULL,
  PRIMARY KEY (`Kode_wali`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `wali_murid`
--


/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
