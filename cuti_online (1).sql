-- phpMyAdmin SQL Dump
-- version 4.1.6
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: 08 Mei 2016 pada 11.34
-- Versi Server: 5.6.16
-- PHP Version: 5.5.9

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `cuti_online`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `golongan`
--

CREATE TABLE IF NOT EXISTS `golongan` (
  `ID_Golongan` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Golongan` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Golongan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `golongan`
--

INSERT INTO `golongan` (`ID_Golongan`, `Nama_Golongan`) VALUES
(1, '1Cccc');

-- --------------------------------------------------------

--
-- Struktur dari tabel `instansi`
--

CREATE TABLE IF NOT EXISTS `instansi` (
  `ID_Instansi` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Instansi` varchar(40) NOT NULL,
  PRIMARY KEY (`ID_Instansi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=3 ;

--
-- Dumping data untuk tabel `instansi`
--

INSERT INTO `instansi` (`ID_Instansi`, `Nama_Instansi`) VALUES
(1, 'Lurah');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jabatan`
--

CREATE TABLE IF NOT EXISTS `jabatan` (
  `ID_Jabatan` int(11) NOT NULL AUTO_INCREMENT,
  `Nama_Jabatan` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_Jabatan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `jabatan`
--

INSERT INTO `jabatan` (`ID_Jabatan`, `Nama_Jabatan`) VALUES
(3, 'Bagian Kepegawaian'),
(17, 'Camattt'),
(18, 'Admin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `jeniscuti`
--

CREATE TABLE IF NOT EXISTS `jeniscuti` (
  `ID_JCuti` int(11) NOT NULL AUTO_INCREMENT,
  `TahunCuti` char(4) NOT NULL,
  `NamaJenisCuti` varchar(20) NOT NULL,
  PRIMARY KEY (`ID_JCuti`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=4 ;

--
-- Dumping data untuk tabel `jeniscuti`
--

INSERT INTO `jeniscuti` (`ID_JCuti`, `TahunCuti`, `NamaJenisCuti`) VALUES
(1, '', 'Cuti Hamil'),
(2, '', 'Asdasd');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pegawai`
--

CREATE TABLE IF NOT EXISTS `pegawai` (
  `NIP` char(18) NOT NULL,
  `Nama` varchar(100) NOT NULL,
  `Alamat` varchar(100) NOT NULL,
  `Phone` varchar(12) NOT NULL,
  `Jenis_Kelamin` enum('L','P') DEFAULT NULL,
  `Tanggal_Lahir` date DEFAULT NULL,
  `password` varchar(200) DEFAULT NULL,
  `ID_Golongan` int(11) NOT NULL,
  `ID_Instansi` int(11) NOT NULL,
  `ID_Jabatan` int(11) NOT NULL,
  PRIMARY KEY (`NIP`),
  KEY `ID_Golongan` (`ID_Golongan`),
  KEY `ID_Instansi` (`ID_Instansi`),
  KEY `ID_Jabatan` (`ID_Jabatan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `pegawai`
--

INSERT INTO `pegawai` (`NIP`, `Nama`, `Alamat`, `Phone`, `Jenis_Kelamin`, `Tanggal_Lahir`, `password`, `ID_Golongan`, `ID_Instansi`, `ID_Jabatan`) VALUES
('201003192016051001', 'John77', 'surabaya7', '02829187', 'L', '2010-03-19', '21232f297a57a5a743894a0e4a801fc3', 1, 1, 3),
('201605042016051002', 'Yrdy', 'sdfdf', '234234', 'P', '2016-05-04', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1, 3),
('201605102016051005', 'Aku Siapaaaa', 'asdasd', '123213', 'L', '2016-05-10', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1, 17),
('201605102016052004', '123', 'asdsad', '123', 'L', '2016-05-10', 'd41d8cd98f00b204e9800998ecf8427e', 1, 1, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksicutipegawai`
--

CREATE TABLE IF NOT EXISTS `transaksicutipegawai` (
  `ID_TransCuti` int(11) NOT NULL,
  `ID_JCuti` int(11) NOT NULL,
  `NIP` char(18) NOT NULL,
  `Tgl_Aju` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `Tgl_Mulai` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Tgl_Habis` timestamp NOT NULL DEFAULT '0000-00-00 00:00:00',
  `Alamat_Sementara` varchar(100) NOT NULL,
  `Phone_Sementara` varchar(12) NOT NULL,
  `Lampiran` varchar(50) NOT NULL,
  `Alasan_Cuti` varchar(250) NOT NULL,
  `status` enum('V','S','T','B') DEFAULT NULL,
  `alasan_penolakan` text,
  PRIMARY KEY (`ID_TransCuti`),
  KEY `ID_JCuti` (`ID_JCuti`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `transaksicutipegawai`
--

INSERT INTO `transaksicutipegawai` (`ID_TransCuti`, `ID_JCuti`, `NIP`, `Tgl_Aju`, `Tgl_Mulai`, `Tgl_Habis`, `Alamat_Sementara`, `Phone_Sementara`, `Lampiran`, `Alasan_Cuti`, `status`, `alasan_penolakan`) VALUES
(2, 1, '201003192016051001', '2016-05-09 17:00:00', '2016-05-11 17:00:00', '2016-05-25 17:00:00', 'asdas', '213', '12321', 'asdas', NULL, 'asdasd');

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
