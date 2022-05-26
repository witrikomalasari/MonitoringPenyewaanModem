-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Dec 19, 2017 at 02:26 PM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 7.0.13

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `monitoring`
--

-- --------------------------------------------------------

--
-- Table structure for table `bahan_baku`
--

CREATE TABLE `bahan_baku` (
  `kdbarang` varchar(255) NOT NULL,
  `namabarang` varchar(255) NOT NULL,
  `stokbahanbaku` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `bahan_baku`
--

INSERT INTO `bahan_baku` (`kdbarang`, `namabarang`, `stokbahanbaku`) VALUES
('BBADP', 'ADAPTOR', 97),
('BBANT', 'ANTENNA', 98),
('BBMODHW', 'MODEM HUAWEI', 98),
('BBMODSIE', 'MODEM SIERRA', 96),
('BBROUT', 'ROOUTER MIKROTIK', 95),
('BBTPL', 'TP LINK', 95),
('BBUSB', 'MODEM USB', 97);

-- --------------------------------------------------------

--
-- Table structure for table `barang_masuk`
--

CREATE TABLE `barang_masuk` (
  `id_masuk` int(11) NOT NULL,
  `tglmasuk` date DEFAULT NULL,
  `kdbarang` varchar(255) NOT NULL,
  `jml_masuk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang_masuk`
--

INSERT INTO `barang_masuk` (`id_masuk`, `tglmasuk`, `kdbarang`, `jml_masuk`) VALUES
(1, '2017-12-08', 'BBADP', 100),
(2, '2017-12-12', 'BBANT', 100),
(3, '2017-12-14', 'BBMODHW', 100),
(4, '2017-12-14', 'BBMODSIE', 100),
(5, '2017-12-14', 'BBROUT', 100),
(6, '2017-12-15', 'BBTPL', 100),
(7, '2017-12-16', 'BBUSB', 100),
(8, '2017-12-11', 'BBADP', 33),
(9, '2017-12-17', 'BBANT', 6),
(10, '2017-12-17', 'BBMODSIE', 4);

--
-- Triggers `barang_masuk`
--
DELIMITER $$
CREATE TRIGGER `barangmasuk` AFTER INSERT ON `barang_masuk` FOR EACH ROW BEGIN
	UPDATE bahan_baku SET stokbahanbaku=stokbahanbaku+NEW.jml_masuk
    WHERE kdbarang = NEW.kdbarang; 
END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Table structure for table `produkdetail`
--

CREATE TABLE `produkdetail` (
  `idproduk` varchar(255) NOT NULL,
  `kdbarang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produkdetail`
--

INSERT INTO `produkdetail` (`idproduk`, `kdbarang`) VALUES
('MD02GBSIN', 'BBANT'),
('MD02GBSIN', 'BBMODHW'),
('MD02GBSIN', 'BBMODSIE'),
('MD04SIN', 'BBMODSIE'),
('MD04SIN', 'BBROUT'),
('MD04SIN', 'BBTPL'),
('MD08DUAL', 'BBADP'),
('MD08DUAL', 'BBROUT'),
('MD08DUAL', 'BBTPL'),
('MD08DUAL', 'BBUSB'),
('MOD04DUA', 'BBADP'),
('MOD04DUA', 'BBANT'),
('MOD04DUA', 'BBUSB');

-- --------------------------------------------------------

--
-- Table structure for table `produksi`
--

CREATE TABLE `produksi` (
  `noproduksi` varchar(255) NOT NULL,
  `nopo` varchar(255) NOT NULL,
  `idproduk` varchar(255) NOT NULL,
  `jumlahproduksi` int(11) NOT NULL,
  `statusprod` varchar(255) NOT NULL,
  `tglmulaiproduksi` varchar(255) DEFAULT NULL,
  `tglselesaiproduksi` date DEFAULT NULL,
  `tgldateline` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi`
--

INSERT INTO `produksi` (`noproduksi`, `nopo`, `idproduk`, `jumlahproduksi`, `statusprod`, `tglmulaiproduksi`, `tglselesaiproduksi`, `tgldateline`) VALUES
('SMSPROD20171219001', '231/SMSSS/DAR/DI', 'MD02GBSIN', 2, 'done', '2017-12-19', '2017-12-21', '2017-12-26'),
('SMSPROD20171219002', '232/SMSSS/DAR/DI', 'MD04SIN', 2, 'inprocess', '2017-12-19', NULL, '2017-12-26'),
('SMSPROD20171219003', '233/SMSSS/DAR/DI', 'MD08DUAL', 3, 'inprocess', '2017-12-19', NULL, '2017-12-26');

-- --------------------------------------------------------

--
-- Table structure for table `produksi_dt`
--

CREATE TABLE `produksi_dt` (
  `noproduksi` varchar(255) NOT NULL,
  `kdbarang` varchar(255) NOT NULL,
  `jumlahproduksi` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produksi_dt`
--

INSERT INTO `produksi_dt` (`noproduksi`, `kdbarang`, `jumlahproduksi`) VALUES
('SMSPROD20171219002', 'BBMODSIE', 2),
('SMSPROD20171219002', 'BBROUT', 2),
('SMSPROD20171219002', 'BBTPL', 2),
('SMSPROD20171219003', 'BBADP', 3),
('SMSPROD20171219003', 'BBROUT', 3),
('SMSPROD20171219003', 'BBTPL', 3),
('SMSPROD20171219003', 'BBUSB', 3);

-- --------------------------------------------------------

--
-- Table structure for table `tb_customer`
--

CREATE TABLE `tb_customer` (
  `kdcustomer` varchar(255) NOT NULL,
  `namacustomer` varchar(255) NOT NULL,
  `telepon` int(30) NOT NULL,
  `email` varchar(255) NOT NULL,
  `alamat` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_customer`
--

INSERT INTO `tb_customer` (`kdcustomer`, `namacustomer`, `telepon`, `email`, `alamat`) VALUES
('SMSCUST01', 'PT FORTA', 2134242342, 'dede@gmail.com', ' sdsrawera');

-- --------------------------------------------------------

--
-- Table structure for table `tb_datapesan`
--

CREATE TABLE `tb_datapesan` (
  `nopo` varchar(255) NOT NULL,
  `tglorder` date DEFAULT NULL,
  `kdcustomer` varchar(255) NOT NULL,
  `idproduk` varchar(255) NOT NULL,
  `jumlahproduk` int(11) NOT NULL,
  `proses` varchar(18) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_datapesan`
--

INSERT INTO `tb_datapesan` (`nopo`, `tglorder`, `kdcustomer`, `idproduk`, `jumlahproduk`, `proses`) VALUES
('231/SMSSS/DAR/DI', '2017-12-01', 'SMSCUST01', 'MD02GBSIN', 2, 'inprocess'),
('232/SMSSS/DAR/DI', '2017-12-16', 'SMSCUST01', 'MD04SIN', 2, 'inprocess'),
('233/SMSSS/DAR/DI', '2017-12-17', 'SMSCUST01', 'MD08DUAL', 3, 'inprocess'),
('234/SMSSS/DAR/DI', '2017-12-18', 'SMSCUST01', 'MOD04DUA', 4, 'unprocess');

-- --------------------------------------------------------

--
-- Table structure for table `tb_namaproduk`
--

CREATE TABLE `tb_namaproduk` (
  `idproduk` varchar(255) NOT NULL,
  `namaproduk` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_namaproduk`
--

INSERT INTO `tb_namaproduk` (`idproduk`, `namaproduk`) VALUES
('MD02GBSIN', 'MODEM 2 GB SINGLE SLOT 1 SIMCARD'),
('MD04SIN', 'MODEM 4 GB SINGLE SLOT 1 SIMCARD'),
('MD08DUAL', 'MODEM 8 GB DUAL SLOT 2 SIMCARD'),
('MOD04DUA', 'MODEM 4 GB DUAL SLOT 1 SIMCARD');

-- --------------------------------------------------------

--
-- Table structure for table `tb_user`
--

CREATE TABLE `tb_user` (
  `nik` varchar(255) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `username` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `bagian` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tb_user`
--

INSERT INTO `tb_user` (`nik`, `nama`, `username`, `password`, `bagian`) VALUES
('SMSKARY01', 'dwi', 'dwi', '7aa2602c588c05a93baf10128861aeb9', 'Admin');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `bahan_baku`
--
ALTER TABLE `bahan_baku`
  ADD PRIMARY KEY (`kdbarang`);

--
-- Indexes for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD PRIMARY KEY (`id_masuk`),
  ADD KEY `fk_kdbarang` (`kdbarang`);

--
-- Indexes for table `produkdetail`
--
ALTER TABLE `produkdetail`
  ADD KEY `fk_idpro` (`idproduk`),
  ADD KEY `fk_kdbarng` (`kdbarang`);

--
-- Indexes for table `produksi`
--
ALTER TABLE `produksi`
  ADD PRIMARY KEY (`noproduksi`),
  ADD KEY `fk_nopur` (`nopo`),
  ADD KEY `fk_idproduks` (`idproduk`);

--
-- Indexes for table `produksi_dt`
--
ALTER TABLE `produksi_dt`
  ADD KEY `noproduksi` (`noproduksi`,`kdbarang`),
  ADD KEY `fk_kdbr` (`kdbarang`);

--
-- Indexes for table `tb_customer`
--
ALTER TABLE `tb_customer`
  ADD PRIMARY KEY (`kdcustomer`);

--
-- Indexes for table `tb_datapesan`
--
ALTER TABLE `tb_datapesan`
  ADD PRIMARY KEY (`nopo`),
  ADD KEY `fk_kdcustomer` (`kdcustomer`),
  ADD KEY `fk_idproduk` (`idproduk`);

--
-- Indexes for table `tb_namaproduk`
--
ALTER TABLE `tb_namaproduk`
  ADD PRIMARY KEY (`idproduk`);

--
-- Indexes for table `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`nik`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  MODIFY `id_masuk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang_masuk`
--
ALTER TABLE `barang_masuk`
  ADD CONSTRAINT `fk_kdbarang` FOREIGN KEY (`kdbarang`) REFERENCES `bahan_baku` (`kdbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produkdetail`
--
ALTER TABLE `produkdetail`
  ADD CONSTRAINT `fk_idpro` FOREIGN KEY (`idproduk`) REFERENCES `tb_namaproduk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kdbarng` FOREIGN KEY (`kdbarang`) REFERENCES `bahan_baku` (`kdbarang`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produksi`
--
ALTER TABLE `produksi`
  ADD CONSTRAINT `fk_idproduks` FOREIGN KEY (`idproduk`) REFERENCES `tb_namaproduk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `produksi_dt`
--
ALTER TABLE `produksi_dt`
  ADD CONSTRAINT `fk_kdbr` FOREIGN KEY (`kdbarang`) REFERENCES `produkdetail` (`kdbarang`),
  ADD CONSTRAINT `fk_nopro` FOREIGN KEY (`noproduksi`) REFERENCES `produksi` (`noproduksi`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `tb_datapesan`
--
ALTER TABLE `tb_datapesan`
  ADD CONSTRAINT `fk_idproduk` FOREIGN KEY (`idproduk`) REFERENCES `tb_namaproduk` (`idproduk`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_kdcustomer` FOREIGN KEY (`kdcustomer`) REFERENCES `tb_customer` (`kdcustomer`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
