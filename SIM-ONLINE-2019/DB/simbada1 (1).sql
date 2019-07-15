-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Jul 15, 2019 at 12:46 PM
-- Server version: 10.1.13-MariaDB
-- PHP Version: 7.0.8

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `simbada1`
--

-- --------------------------------------------------------

--
-- Table structure for table `tb_cetak`
--

CREATE TABLE `tb_cetak` (
  `no_sim` varchar(20) NOT NULL,
  `nip` varchar(30) NOT NULL,
  `tgl_cetak` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `tb_cetakpendaftaran`
--

CREATE TABLE `tb_cetakpendaftaran` (
  `email` varchar(30) NOT NULL,
  `tgl_kedatangan` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_cetakpendaftaran`
--

INSERT INTO `tb_cetakpendaftaran` (`email`, `tgl_kedatangan`) VALUES
('fachriahmad210@gmail.com', '2019-07-28'),
('iqbal@gmail.com', '2019-07-30'),
('iqbal@gmail.com', '0000-00-00');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pemohon`
--

CREATE TABLE `tb_pemohon` (
  `nik` varchar(30) NOT NULL,
  `email` varchar(30) NOT NULL,
  `nama` varchar(30) DEFAULT NULL,
  `jekel` varchar(20) DEFAULT NULL,
  `tgllhr` date DEFAULT NULL,
  `kota` varchar(20) DEFAULT NULL,
  `agama` varchar(30) DEFAULT NULL,
  `tinggibdn` int(11) DEFAULT NULL,
  `pekerjaan` varchar(30) DEFAULT NULL,
  `telepon` varchar(13) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pemohon`
--

INSERT INTO `tb_pemohon` (`nik`, `email`, `nama`, `jekel`, `tgllhr`, `kota`, `agama`, `tinggibdn`, `pekerjaan`, `telepon`) VALUES
('12', 'fachriahmad210@gmail.com', 'Fachri Shofiyyuddin', 'Pria', '2019-07-19', 'Kudus', 'Islam', 170, 'Mahasiswa', '087779903490'),
('12345', 'iqbal@gmail.com', 'iqbal', 'Pria', '2019-07-26', 'Kudus', 'Islam', 90, 'Mahasiswa', '087779903490');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pendaftaran`
--

CREATE TABLE `tb_pendaftaran` (
  `jenis_permohonan` varchar(30) NOT NULL,
  `gol_sim` varchar(20) NOT NULL,
  `email` varchar(30) NOT NULL,
  `polda` varchar(30) NOT NULL,
  `satpas` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pendaftaran`
--

INSERT INTO `tb_pendaftaran` (`jenis_permohonan`, `gol_sim`, `email`, `polda`, `satpas`) VALUES
('Baru', 'C', 'fachriahmad210@gmail.com', 'Polda Jawa Tengah', 'Satpas Jawa Tengah'),
('Baru', 'C', 'iqbal@gmail.com', 'Polda Jawa Barat', 'Satpas Jawa Barat');

-- --------------------------------------------------------

--
-- Table structure for table `tb_pengguna`
--

CREATE TABLE `tb_pengguna` (
  `email` varchar(50) NOT NULL,
  `nama` varchar(20) DEFAULT NULL,
  `password` varchar(20) DEFAULT NULL,
  `status` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_pengguna`
--

INSERT INTO `tb_pengguna` (`email`, `nama`, `password`, `status`) VALUES
('admin@gmail.com', 'admin', 'admin', 'admin'),
('operator@gmail.com', 'operator', 'operator', 'operator');

-- --------------------------------------------------------

--
-- Table structure for table `tb_sim`
--

CREATE TABLE `tb_sim` (
  `no_sim` varchar(20) NOT NULL,
  `nik` varchar(30) NOT NULL,
  `foto` text,
  `berlaku` date DEFAULT NULL,
  `nama` varchar(30) NOT NULL,
  `tgllhr` date NOT NULL,
  `jekel` varchar(20) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `tinggi` int(11) NOT NULL,
  `pekerjaan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tb_cetak`
--
ALTER TABLE `tb_cetak`
  ADD KEY `no_sim` (`no_sim`),
  ADD KEY `nip` (`nip`);

--
-- Indexes for table `tb_cetakpendaftaran`
--
ALTER TABLE `tb_cetakpendaftaran`
  ADD KEY `no_daftar` (`email`);

--
-- Indexes for table `tb_pemohon`
--
ALTER TABLE `tb_pemohon`
  ADD PRIMARY KEY (`nik`),
  ADD KEY `no_daftar` (`email`);

--
-- Indexes for table `tb_pendaftaran`
--
ALTER TABLE `tb_pendaftaran`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tb_pengguna`
--
ALTER TABLE `tb_pengguna`
  ADD PRIMARY KEY (`email`);

--
-- Indexes for table `tb_sim`
--
ALTER TABLE `tb_sim`
  ADD PRIMARY KEY (`no_sim`),
  ADD KEY `nik` (`nik`);

--
-- Constraints for dumped tables
--

--
-- Constraints for table `tb_cetak`
--
ALTER TABLE `tb_cetak`
  ADD CONSTRAINT `tb_cetak_ibfk_1` FOREIGN KEY (`no_sim`) REFERENCES `tb_sim` (`no_sim`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_cetakpendaftaran`
--
ALTER TABLE `tb_cetakpendaftaran`
  ADD CONSTRAINT `tb_cetakpendaftaran_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tb_pendaftaran` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_pemohon`
--
ALTER TABLE `tb_pemohon`
  ADD CONSTRAINT `tb_pemohon_ibfk_1` FOREIGN KEY (`email`) REFERENCES `tb_pendaftaran` (`email`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_sim`
--
ALTER TABLE `tb_sim`
  ADD CONSTRAINT `tb_sim_ibfk_1` FOREIGN KEY (`nik`) REFERENCES `tb_pemohon` (`nik`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
