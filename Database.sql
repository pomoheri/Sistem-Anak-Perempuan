-- phpMyAdmin SQL Dump
-- version 4.8.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jun 05, 2020 at 09:59 AM
-- Server version: 10.1.37-MariaDB
-- PHP Version: 5.6.40

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `sus`
--
CREATE DATABASE IF NOT EXISTS `sus` DEFAULT CHARACTER SET latin1 COLLATE latin1_swedish_ci;
USE `sus`;

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `id_bahan` varchar(6) NOT NULL,
  `nmbhn` varchar(40) NOT NULL,
  `kategori` varchar(10) NOT NULL,
  `satuan` varchar(14) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `status` varchar(10) NOT NULL,
  `brand` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`id_bahan`, `nmbhn`, `kategori`, `satuan`, `jumlah`, `status`, `brand`) VALUES
('BB0001', 'pomom', 'o', 'Roll', 2218, 'Tersedia', 'p'),
('BB0002', 'STC Cromo', 'Raw Materi', 'Yrd', 11990, 'Tersedia', 'any'),
('BB0003', 'ELASTIC 6 MM SJ WHITE ', 'Raw Materi', 'PCS', 70, 'Tersedia', 'Any'),
('BB0004', 'ELASTIC 8 MM SJ WHITE ', 'Raw Materi', 'PCS', 85, 'Tersedia', 'Any'),
('BB0005', 'ELASTIC 12 MM SJ WHITE ', 'Raw Materi', 'ROLL', 100, 'Tersedia', 'Any'),
('BB0006', 'ELASTIC 12 MM SJ BLACK ', 'Raw Materi', 'PCS', 330, 'Tersedia', 'Any'),
('BB0007', 'ELASTIC 6 MM GU WHITE ', 'Raw Materi', 'PCS', 233, 'Tersedia', 'Any'),
('BB0008', 'ELASTIC 12 MM GU WHITE ', 'Raw Materi', 'PCS', 180, 'Tersedia', 'Any'),
('BB0009', 'ELASTIC 8 MM MILTON WHITE', 'Raw Materi', 'ROLL', 60, 'Tersedia', 'Any'),
('BB0010', 'TERRYBAND 20 MM WHITE ', 'Raw Materi', 'M', 1200, 'Tersedia', 'Any'),
('BB0011', 'TERRYBAND 25 MM WHITE ', 'Raw Materi', 'M', 5400, 'Tersedia', 'Any'),
('BB0012', 'TERRYBAND 25 MM BLACK ', 'Raw Materi', 'M', 1800, 'Tersedia', 'Any');

-- --------------------------------------------------------

--
-- Table structure for table `bbk_keluar`
--

CREATE TABLE `bbk_keluar` (
  `id_bbkkeluar` varchar(6) NOT NULL,
  `tglkeluar` date NOT NULL,
  `disetujui` varchar(40) NOT NULL,
  `id_order` varchar(8) NOT NULL,
  `id_kar` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bbk_keluar`
--

INSERT INTO `bbk_keluar` (`id_bbkkeluar`, `tglkeluar`, `disetujui`, `id_order`, `id_kar`) VALUES
('BK0001', '2019-04-19', 'Ribut', 'ORbb0001', 'KAR0003'),
('BK0002', '2020-04-27', 'Ribut', 'ORbb0005', 'KAR0003');

-- --------------------------------------------------------

--
-- Table structure for table `bbk_masuk`
--

CREATE TABLE `bbk_masuk` (
  `id_bbkmasuk` varchar(6) NOT NULL,
  `tglmasuk` date NOT NULL,
  `jml` int(11) NOT NULL,
  `id_detpo` varchar(8) NOT NULL,
  `id_kar` varchar(7) NOT NULL,
  `id_bahan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bbk_masuk`
--

INSERT INTO `bbk_masuk` (`id_bbkmasuk`, `tglmasuk`, `jml`, `id_detpo`, `id_kar`, `id_bahan`) VALUES
('BM0001', '2019-04-28', 50, 'DTPO0003', 'KAR0003', 'BB0009'),
('BM0002', '2020-04-28', 100, 'DTPO0002', 'KAR0003', 'BB0007'),
('BM0003', '2020-04-28', 100, 'DTPO0004', 'KAR0003', 'BB0010'),
('BM0004', '2020-04-28', 50, 'DTPO0002', 'KAR0003', 'BB0004');

-- --------------------------------------------------------

--
-- Table structure for table `brg_jadi`
--

CREATE TABLE `brg_jadi` (
  `id_brgjadi` varchar(5) NOT NULL,
  `tgljadi` date NOT NULL,
  `jml` int(8) NOT NULL,
  `id_produksi` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `brg_jadi`
--

INSERT INTO `brg_jadi` (`id_brgjadi`, `tgljadi`, `jml`, `id_produksi`) VALUES
('JD001', '2020-04-27', 1000, 'PROD0001'),
('JD003', '2020-04-28', 31, 'PROD0005'),
('JD004', '2020-04-28', 25, 'PROD0002');

-- --------------------------------------------------------

--
-- Table structure for table `det_bbk_keluar`
--

CREATE TABLE `det_bbk_keluar` (
  `id_detbbkkeluar` varchar(8) NOT NULL,
  `keterangan` varchar(50) NOT NULL,
  `jmlkeluar` int(8) NOT NULL,
  `id_bbkkeluar` varchar(6) NOT NULL,
  `id_bahan` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_bbk_keluar`
--

INSERT INTO `det_bbk_keluar` (`id_detbbkkeluar`, `keterangan`, `jmlkeluar`, `id_bbkkeluar`, `id_bahan`) VALUES
('DTBK0001', 'Buat Susulan', 1000, 'BK0001', 'BB0001'),
('DTBK0002', 'ok', 1500, 'BK0001', 'BB0002'),
('DTBK0003', 'ok', 1000, 'BK0002', 'BB0002'),
('DTBK0004', 'buat produksi aa', 35, 'BK0002', 'BB0003');

-- --------------------------------------------------------

--
-- Table structure for table `det_purchase_order`
--

CREATE TABLE `det_purchase_order` (
  `id_detpo` varchar(8) NOT NULL,
  `jmlpo` int(8) NOT NULL,
  `harga` int(10) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `id_bahan` varchar(6) NOT NULL,
  `id_po` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `det_purchase_order`
--

INSERT INTO `det_purchase_order` (`id_detpo`, `jmlpo`, `harga`, `keterangan`, `id_bahan`, `id_po`) VALUES
('DTPO0001', 20, 3000, 'Buat produksi susulan', 'BB0004', 'PO0001'),
('DTPO0002', 90, 5000, ' ok', 'BB0001', 'PO0001'),
('DTPO0003', 100, 1000, 'ok', 'BB0001', 'PO0002'),
('DTPO0004', 5, 50, 'coba2', 'BB0001', 'PO0003');

-- --------------------------------------------------------

--
-- Table structure for table `karyawan`
--

CREATE TABLE `karyawan` (
  `id_kar` varchar(7) NOT NULL,
  `nm_kar` varchar(40) NOT NULL,
  `alamat` varchar(45) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `jabatan` varchar(50) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `karyawan`
--

INSERT INTO `karyawan` (`id_kar`, `nm_kar`, `alamat`, `telp`, `jabatan`, `username`, `password`) VALUES
('KAR0001', 'Pomo Heri Santoso', 'Klaten', '08575447771', 'Administrator', 'pomo', 'df66801ad38f0fd2994608d9b3be80c9'),
('KAR0003', 'purwo', 'magelanag', '0854887', 'Karyawangudang', 'purwo', '27b288e070d7029531dc05dedb22aa78'),
('KAR0005', 'erda', 'klaten', '098888', 'Karyawanproduksi', 'erda', 'b1914affeb0d5e3530a9f6a990c7ab4d'),
('KAR0006', 'vera', 'klayen', '087777', 'Pimpinan', 'vera', '4341dfaa7259082022147afd371b69c3'),
('KAR0007', 'Pergudangan', 'klaten', '08543727', 'Karyawangudang', 'gudang', '202446dd1d6028084426867365b0c7a1'),
('KAR0008', 'zain', 'madura', '0888', 'Karyawan_biasa', 'zain', '3ed9b95e4b6f2c345836def81e570ef1'),
('KAR0009', 'Putri', 'Klaten', '08928464838', 'Karyawanpembelian', 'putri', '4093fed663717c843bea100d17fb67c8'),
('KAR0010', 'tya', 'Randuarjo, Prambanan, Sleman', '084737362', 'Karyawangudang', 'tya', 'b626b66df044ee336f452bd5d88debb5'),
('KAR0012', 'Administrator', 'Prambanan, Klaten', '0872649276', 'Administrator', 'admin', '21232f297a57a5a743894a0e4a801fc3'),
('KAR0013', 'Pembelian', 'Prambanan, Klaten', '0891817019', 'Karyawanpembelian', 'pembelian', '025b94c9e65037bb7317c8e25389155d'),
('KAR0014', 'asd', ' asd', '445555', 'Karyawan Biasa', 'asd', '3dad9cbf9baaa0360c0f2ba372d25716'),
('KAR0015', 'dsa', 'dsa', '666777', 'Administrator', 'dsa', '5f039b4ef0058a1d652f13d612375a5b');

-- --------------------------------------------------------

--
-- Table structure for table `konsumen`
--

CREATE TABLE `konsumen` (
  `id_kon` varchar(6) NOT NULL,
  `nm_kon` varchar(45) NOT NULL,
  `alamat` varchar(70) NOT NULL,
  `telp` varchar(12) NOT NULL,
  `email` varchar(35) NOT NULL,
  `ket` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konsumen`
--

INSERT INTO `konsumen` (`id_kon`, `nm_kon`, `alamat`, `telp`, `email`, `ket`) VALUES
('KON001', 'PT Gagah Berlian', 'Klaten Selatan, Klaten', '089717777', 'ber@gmail.com', 'perusahaan'),
('KON002', 'Toko Itali', 'Klaten Tengah, Klaten', '0274337', 'itali@gmail.com', 'perusahaan'),
('KON003', 'MPK Internasional', 'South Korea', '07234287', 'mpk@gmail.com', 'perusahaan'),
('KON004', 'PT Eagle Cemerlang', 'Kalasan, Sleman', '027419878', 'eagle@gmail.com', 'perusahaan'),
('KON005', 'Kiswandono', 'Jl.Agil Kusumadya, Kudus', '021568993', '-', 'pribadi'),
('KON006', 'Nojorono', 'Jl. Jula juli 11, Surabaya', '031887342', '-', 'pribadi'),
('KON007', 'Hade Mustika Alam', 'jl. Sukarno hatta, Jakarta', '021568993', 'hade@gmail.com', 'perusahaan'),
('KON008', 'fds', ' fds', '4554445', 'zahh@jjj', 'perusahaan');

-- --------------------------------------------------------

--
-- Table structure for table `order_bbk`
--

CREATE TABLE `order_bbk` (
  `id_order` varchar(8) NOT NULL,
  `tglorder` date NOT NULL,
  `status` varchar(12) NOT NULL,
  `id_kar` varchar(7) NOT NULL,
  `id_rancangan` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `order_bbk`
--

INSERT INTO `order_bbk` (`id_order`, `tglorder`, `status`, `id_kar`, `id_rancangan`) VALUES
('ORbb0001', '2020-04-16', 'mendadak', 'KAR0005', 'RAN0004'),
('ORbb0002', '2020-04-25', 'baru', 'KAR0005', 'RAN0001'),
('ORbb0004', '2020-04-25', 'baru', 'KAR0005', 'RAN0002'),
('ORbb0005', '2020-04-25', 'ok', 'KAR0005', 'RAN0001'),
('ORbb0006', '2020-04-29', 'Usulan Tetap', 'KAR0005', 'RAN0005'),
('ORbb0007', '2020-04-29', 'sIAP PRODUK', 'KAR0005', 'RAN0005');

-- --------------------------------------------------------

--
-- Table structure for table `pesan`
--

CREATE TABLE `pesan` (
  `id_pesan` varchar(7) NOT NULL,
  `tgl_pesan` date NOT NULL,
  `tgl_jadi` date NOT NULL,
  `keterangan` varchar(40) NOT NULL,
  `id_kar` varchar(7) NOT NULL,
  `id_kon` varchar(6) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pesan`
--

INSERT INTO `pesan` (`id_pesan`, `tgl_pesan`, `tgl_jadi`, `keterangan`, `id_kar`, `id_kon`) VALUES
('PSN0004', '2020-04-10', '2020-04-22', 'Barang Sudah Jadi', 'KAR0001', 'KON002'),
('PSN0005', '2020-04-14', '2020-04-30', 'proses rancangan selesai', 'KAR0001', 'KON002'),
('PSN0006', '2019-04-27', '2020-04-06', 'ok', 'KAR0001', 'KON002'),
('PSN0007', '2018-04-27', '2020-04-10', ' proses rancangan selesai', 'KAR0001', 'KON004'),
('PSN0008', '2020-04-27', '2020-04-30', 'ok', 'KAR0001', 'KON002'),
('PSN0009', '2020-04-29', '2020-02-04', 'Proses Rancangan Selesai', 'KAR0012', 'KON008');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `id_produksi` varchar(8) NOT NULL,
  `tglprod` date NOT NULL,
  `jmlprod` int(7) NOT NULL,
  `id_rancangan` varchar(7) NOT NULL,
  `id_bbkkeluar` varchar(8) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`id_produksi`, `tglprod`, `jmlprod`, `id_rancangan`, `id_bbkkeluar`) VALUES
('PROD0002', '2019-04-27', 1000, 'RAN0002', 'BK0001'),
('PROD0003', '2020-04-27', 2000, 'RAN0001', 'BK0002'),
('PROD0004', '2020-04-28', 35, 'RAN0003', 'BK0002'),
('PROD0005', '2020-04-28', 20, 'RAN0002', 'BK0001'),
('PROD0006', '2020-04-28', 90, 'RAN0004', 'BK0002');

-- --------------------------------------------------------

--
-- Table structure for table `purchase_order`
--

CREATE TABLE `purchase_order` (
  `id_po` varchar(6) NOT NULL,
  `tglpo` date NOT NULL,
  `id_kar` varchar(7) NOT NULL,
  `id_rancangan` varchar(7) NOT NULL,
  `id_sup` varchar(4) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `purchase_order`
--

INSERT INTO `purchase_order` (`id_po`, `tglpo`, `id_kar`, `id_rancangan`, `id_sup`) VALUES
('PO0001', '2020-04-28', 'KAR0013', 'RAN0002', 'SP04'),
('PO0002', '2020-04-28', 'KAR0013', 'RAN0004', 'SP01'),
('PO0003', '2020-04-29', 'KAR0013', 'RAN0005', 'SP01');

-- --------------------------------------------------------

--
-- Table structure for table `rancangan`
--

CREATE TABLE `rancangan` (
  `id_rancangan` varchar(7) NOT NULL,
  `nmstyle` varchar(25) NOT NULL,
  `mainmaterial` varchar(25) NOT NULL,
  `quantity` int(11) NOT NULL,
  `machi` varchar(15) NOT NULL,
  `logo` varchar(30) NOT NULL,
  `jnselastic` varchar(25) NOT NULL,
  `jnstb` varchar(40) NOT NULL,
  `herry` int(8) NOT NULL,
  `velcro` varchar(20) NOT NULL,
  `lycra` varchar(30) NOT NULL,
  `label` varchar(30) NOT NULL,
  `envelope` varchar(25) NOT NULL,
  `innerbox` varchar(15) NOT NULL,
  `jnscarton` varchar(35) NOT NULL,
  `patch` varchar(20) NOT NULL,
  `packing` varchar(30) NOT NULL,
  `jnsbenang` varchar(20) NOT NULL,
  `id_pesan` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rancangan`
--

INSERT INTO `rancangan` (`id_rancangan`, `nmstyle`, `mainmaterial`, `quantity`, `machi`, `logo`, `jnselastic`, `jnstb`, `herry`, `velcro`, `lycra`, `label`, `envelope`, `innerbox`, `jnscarton`, `patch`, `packing`, `jnsbenang`, `id_pesan`) VALUES
('RAN0002', 'X GEAR LEATHERs', 'Full Leather', 12, 'Leather', 'X Gear', 'ELASTIC 6 MM SJ WHITE', 'TERRYBAND 20 MM WHITE', 9, 'VELCRO COATS BLACK', 'BLACK', 'MADE IN INDONESIA', 'ENV PVC', 'InnerBox USG', 'CARTON LOTTEMART', 'YES PATCH', '1PCS/POLYBAG', 'BENANG BEIGE', 'PSN0007'),
('RAN0003', 'coba', 'p', 1000, 'p', 'p', 'ELASTIC 6 MM SJ WHITE', 'TERRYBAND 25 MM WHITE', 10, 'VELCRO SAMCRO BLACK', 'putih', 'ok', 'ENV Paper', 'InnerBox USG', 'CARTON BIGTEN', 'NO PATCH', '1PCS/POLYBAG', 'BENANG BEIGE', 'PSN0005'),
('RAN0004', 'coba', 'ttty', 90, 'p', 't', 'ELASTIC 6 MM SJ WHITE', 'TERRYBAND 20 MM WHITE', 10, 'VELCRO SAMCRO BLACK', 'white', 'l', 'ENV Paper', 'InnerBox Bigten', 'CARTON BIGTEN', 'NO PATCH', 'AS3', 'BENANG KHAKY', 'PSN0009'),
('RAN0005', 'X GEAR LEATHER', 'FULL LEATHER', 3, 'LEATHER', 'p', 'ELASTIC 12 MM SJ BLACK', 'TERRYBAND 25 MM WHITE', 2, 'VELCRO SAMCRO RED', 'putih', 'MADE IN INDONESIA', 'ENV PVC', 'InnerBox USG', 'CARTON BIGTEN', 'YES PATCH', 'ok', 'BENANG KHAKY', 'PSN0009');

-- --------------------------------------------------------

--
-- Table structure for table `supplier`
--

CREATE TABLE `supplier` (
  `id_sup` varchar(4) NOT NULL,
  `nmsupplier` varchar(40) NOT NULL,
  `nicksup` varchar(10) NOT NULL,
  `alamatsup` varchar(45) NOT NULL,
  `telpsup` varchar(12) NOT NULL,
  `emailsup` varchar(45) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `supplier`
--

INSERT INTO `supplier` (`id_sup`, `nmsupplier`, `nicksup`, `alamatsup`, `telpsup`, `emailsup`) VALUES
('SP01', 'PT Eagle', 'egl', ' Kalasan, Sleman', '07245566', 'eagle@gmail.com'),
('SP02', 'DUKSUNG CO.,LTD', 'DKS', ' KOREA', '-', 'duk@gmail.com'),
('SP03', 'DONG KWANG TEXTILE CORP', 'DKW', ' KOREA', '-', 'dkw@gmail.com'),
('SP04', 'HAEUN SPORTS CO', 'HAN', 'KOREA', '-', '-'),
('SP06', 'PT ADI SATRIA ABADI', 'ASA', 'INDONESIA', '02187988', '-'),
('SP07', 'AQILLA MEDIA', 'AQM', 'Surabaya, Indonesia', '031879666', 'aqm@gmail.com'),
('SP08', 'CHRISMA GRAFFINDO', 'CG', 'Bantul, DIY', '0274555999', 'chris@gmail.com'),
('SP09', 'PT JIHE JAWA ABADI', 'JJA', 'Kalasan, Sleman', '0274999888', 'Jihe@gmail.com'),
('SP10', 'BERKAT JAYA SEJAHTERA', 'BJY', 'Malang, Indonesia', '031887665', 'bjy@gmail.com');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indexes for table `bbk_keluar`
--
ALTER TABLE `bbk_keluar`
  ADD PRIMARY KEY (`id_bbkkeluar`);

--
-- Indexes for table `bbk_masuk`
--
ALTER TABLE `bbk_masuk`
  ADD PRIMARY KEY (`id_bbkmasuk`);

--
-- Indexes for table `brg_jadi`
--
ALTER TABLE `brg_jadi`
  ADD PRIMARY KEY (`id_brgjadi`);

--
-- Indexes for table `det_bbk_keluar`
--
ALTER TABLE `det_bbk_keluar`
  ADD PRIMARY KEY (`id_detbbkkeluar`);

--
-- Indexes for table `det_purchase_order`
--
ALTER TABLE `det_purchase_order`
  ADD PRIMARY KEY (`id_detpo`);

--
-- Indexes for table `karyawan`
--
ALTER TABLE `karyawan`
  ADD PRIMARY KEY (`id_kar`);

--
-- Indexes for table `konsumen`
--
ALTER TABLE `konsumen`
  ADD PRIMARY KEY (`id_kon`);

--
-- Indexes for table `order_bbk`
--
ALTER TABLE `order_bbk`
  ADD PRIMARY KEY (`id_order`);

--
-- Indexes for table `pesan`
--
ALTER TABLE `pesan`
  ADD PRIMARY KEY (`id_pesan`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`id_produksi`);

--
-- Indexes for table `purchase_order`
--
ALTER TABLE `purchase_order`
  ADD PRIMARY KEY (`id_po`);

--
-- Indexes for table `rancangan`
--
ALTER TABLE `rancangan`
  ADD PRIMARY KEY (`id_rancangan`);

--
-- Indexes for table `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_sup`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
