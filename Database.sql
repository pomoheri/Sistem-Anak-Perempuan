-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Waktu pembuatan: 09 Nov 2020 pada 05.38
-- Versi server: 10.1.37-MariaDB
-- Versi PHP: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `satgas`
--
CREATE DATABASE IF NOT EXISTS `satgas` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `satgas`;

-- --------------------------------------------------------

--
-- Struktur dari tabel `datkas`
--

CREATE TABLE `datkas` (
  `idkasus` char(10) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `nik` char(20) NOT NULL,
  `tglkas` date NOT NULL,
  `kejadian` varchar(50) NOT NULL,
  `lambuk` varchar(50) NOT NULL,
  `idpeng` char(5) NOT NULL,
  `jenkas` varchar(10) NOT NULL,
  `statkas` char(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datkas`
--

INSERT INTO `datkas` (`idkasus`, `kategori`, `nik`, `tglkas`, `kejadian`, `lambuk`, `idpeng`, `jenkas`, `statkas`) VALUES
('KASUS00001', 'perempuan', '3310021010990002', '2019-09-19', 'tes', '17240001-FOTO.jpg', 'P0004', 'Aduan', 'T'),
('KASUS00002', 'anak-anak', '3310021210990001', '2020-09-06', 'jjh', '17240001- Lab.jpg', 'P0003', 'aduan', 'D');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datpeng`
--

CREATE TABLE `datpeng` (
  `idpeng` char(5) NOT NULL,
  `namap` varchar(50) NOT NULL,
  `alamatp` varchar(75) NOT NULL,
  `telpp` varchar(12) NOT NULL,
  `nmuser` varchar(255) NOT NULL,
  `passw` varchar(255) NOT NULL,
  `level` varchar(11) NOT NULL,
  `tglcatat` date NOT NULL,
  `statpeng` varchar(9) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datpeng`
--

INSERT INTO `datpeng` (`idpeng`, `namap`, `alamatp`, `telpp`, `nmuser`, `passw`, `level`, `tglcatat`, `statpeng`) VALUES
('P0001', 'Pomo', 'klaten', '087747878', 'pomo', 'df66801ad38f0fd2994608d9b3be80c9', 'admin', '2020-08-24', 'aktif'),
('P0002', 'vera fernanda', '  Klaten City', '0217657', 'kades', '0cfa66469d25bd0d9e55d7ba583f9f2f', 'kepaladesa', '2020-08-31', 'aktif'),
('P0003', 'putri', 'klaten', '0836337', 'satgas', 'bad0e827035564c93512f8b3f7bf4e44', 'satgas', '2020-08-31', 'aktif'),
('P0004', 'ipan', 'klaten', '0874663887', 'masyarakat', 'd9a8c6c010a37fdc9850fe6d8c064880', 'masyarakat', '2020-08-31', 'aktif'),
('P0006', 'antok', 'klaten', '0876257', 'antok', '68048fa2e05395723c96fe672aee3691', 'masyarakat', '2020-09-01', 'nonaktif'),
('P0007', 'Dinsos', 'klaten', '08977366', 'dinsos', '845388911209126f2566e2edeedcbc45', 'dinsos', '2020-09-01', 'aktif');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datrt`
--

CREATE TABLE `datrt` (
  `idrt` char(5) NOT NULL,
  `namart` varchar(50) NOT NULL,
  `idrw` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datrt`
--

INSERT INTO `datrt` (`idrt`, `namart`, `idrw`) VALUES
('RT01', '01', 'RW01'),
('RT02', '02', 'RW03'),
('RT03', '08', 'RW01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datrw`
--

CREATE TABLE `datrw` (
  `idrw` char(5) NOT NULL,
  `namarw` varchar(50) NOT NULL,
  `iddk` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datrw`
--

INSERT INTO `datrw` (`idrw`, `namarw`, `iddk`) VALUES
('RW01', '01', 'dk001'),
('RW02', '01', 'dk003'),
('RW03', '02', 'dk002'),
('RW04', 'RW 16', 'dk005'),
('RW05', '', 'dk004');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dattin`
--

CREATE TABLE `dattin` (
  `idkasus` char(10) NOT NULL,
  `tgltin` date NOT NULL,
  `tindakan` varchar(50) NOT NULL,
  `lamdok` varchar(50) NOT NULL,
  `idpeng` char(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dattin`
--

INSERT INTO `dattin` (`idkasus`, `tgltin`, `tindakan`, `lamdok`, `idpeng`) VALUES
('KASUS00001', '2020-08-20', 'banding', '17240001-lab.jpg', 'P0003'),
('KASUS00002', '2020-09-23', 'adsdf', '17240001-Akta.jpg', 'P0003');

-- --------------------------------------------------------

--
-- Struktur dari tabel `datwg`
--

CREATE TABLE `datwg` (
  `nik` char(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `kelamin` varchar(12) NOT NULL,
  `tglh` date NOT NULL,
  `pendd` varchar(5) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `idrt` char(5) NOT NULL,
  `stkeb` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `datwg`
--

INSERT INTO `datwg` (`nik`, `nama`, `kelamin`, `tglh`, `pendd`, `alamat`, `idrt`, `stkeb`) VALUES
('3310021010990002', 'Vera', 'perempuan', '1999-10-10', 'SMA', 'klaten', 'RT01', 'wali'),
('3310021210990001', 'pomo heri santoso', 'laki-laki', '1999-10-12', 'SMK', 'klaten', 'RT02', 'orangtua'),
('77777', 'hh', 'laki-laki', '2020-08-06', 'sd', 'klaten', 'RT01', 'orangtua');

-- --------------------------------------------------------

--
-- Struktur dari tabel `dukuh`
--

CREATE TABLE `dukuh` (
  `iddk` char(5) NOT NULL,
  `namadk` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `dukuh`
--

INSERT INTO `dukuh` (`iddk`, `namadk`) VALUES
('dk001', 'Candi'),
('dk002', 'Mlese'),
('dk003', 'Birin'),
('dk004', 'Sidodadi'),
('dk005', 'Coba-coba');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `datkas`
--
ALTER TABLE `datkas`
  ADD PRIMARY KEY (`idkasus`);

--
-- Indeks untuk tabel `datpeng`
--
ALTER TABLE `datpeng`
  ADD PRIMARY KEY (`idpeng`);

--
-- Indeks untuk tabel `datrt`
--
ALTER TABLE `datrt`
  ADD PRIMARY KEY (`idrt`);

--
-- Indeks untuk tabel `datrw`
--
ALTER TABLE `datrw`
  ADD PRIMARY KEY (`idrw`);

--
-- Indeks untuk tabel `dattin`
--
ALTER TABLE `dattin`
  ADD PRIMARY KEY (`idkasus`);

--
-- Indeks untuk tabel `datwg`
--
ALTER TABLE `datwg`
  ADD PRIMARY KEY (`nik`);

--
-- Indeks untuk tabel `dukuh`
--
ALTER TABLE `dukuh`
  ADD PRIMARY KEY (`iddk`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
