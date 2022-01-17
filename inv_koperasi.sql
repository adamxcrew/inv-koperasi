-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Jan 18, 2022 at 12:05 AM
-- Server version: 10.4.14-MariaDB
-- PHP Version: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inv_koperasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `barang`
--

CREATE TABLE `barang` (
  `idbarang` int(11) NOT NULL,
  `satuan_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `barang`
--

INSERT INTO `barang` (`idbarang`, `satuan_id`, `nama`) VALUES
(3, 2, 'BAYAM HIJAU'),
(4, 1, 'CABE RAWIT HIJAU');

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `idcustomer` int(11) NOT NULL,
  `tujuan_id` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`idcustomer`, `tujuan_id`, `nama`) VALUES
(1, 0, 'PT. PANGAN SARI UTAMA (PSU)'),
(3, 1, 'PT. PANGAN SARI UTAMA (PSU)');

-- --------------------------------------------------------

--
-- Table structure for table `invoice`
--

CREATE TABLE `invoice` (
  `idinvoice` int(11) NOT NULL,
  `customer_id` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `no_surat` varchar(64) NOT NULL,
  `no_po` varchar(64) NOT NULL,
  `create_at` int(11) NOT NULL,
  `create_by` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice`
--

INSERT INTO `invoice` (`idinvoice`, `customer_id`, `tanggal`, `no_surat`, `no_po`, `create_at`, `create_by`) VALUES
(1, 1, '2022-01-16', '404/A-B/I/2022', 'FDS/22/00000032', 1642322877, 1),
(3, 1, '2023-01-16', '404/A-B/I/2023', 'FDS/22/00000035', 1642323180, 1),
(4, 3, '2022-01-17', '404/A-B/I/2022', 'FDS/22/00000032', 1642404016, 1),
(5, 3, '2022-01-17', '404/A-B/I/2022', 'FDS/22/00000032', 1642404705, 1),
(6, 1, '2022-01-17', '404/A-B/I/2022', 'FDS/22/00000032', 1642404743, 1),
(7, 3, '2022-01-17', '404/A-B/I/2022', 'FDS/22/00000032', 1642404873, 1),
(8, 3, '2022-01-17', '404/A-B/I/2022', 'FDS/22/00000032', 1642405020, 1);

-- --------------------------------------------------------

--
-- Table structure for table `invoice_detail`
--

CREATE TABLE `invoice_detail` (
  `idinvoice_detail` int(11) NOT NULL,
  `invoice_id` int(11) NOT NULL,
  `barang_id` int(11) NOT NULL,
  `volume` int(11) DEFAULT NULL,
  `harga_satuan` int(11) DEFAULT NULL,
  `sub_total` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `invoice_detail`
--

INSERT INTO `invoice_detail` (`idinvoice_detail`, `invoice_id`, `barang_id`, `volume`, `harga_satuan`, `sub_total`) VALUES
(1, 3, 3, 123, 20000, 2460000),
(2, 3, 4, 12, 25000, 300000),
(3, 1, 4, 12, 25, 300),
(4, 3, 3, 123, 20000, 2460000),
(5, 3, 4, 12, 25000, 300000),
(6, 4, 4, 10, 10000, 100000),
(7, 4, 3, 15, 10000, 150000);

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` enum('super_user','admin') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(1, 'Admin', 'admin', '$2y$10$saTE2WRbUmRmQO1rl5pXheauR12PB73IaNu0V7M52rwCTMauKnDr2', 'super_user');

-- --------------------------------------------------------

--
-- Table structure for table `satuan`
--

CREATE TABLE `satuan` (
  `idsatuan` int(11) NOT NULL,
  `nama` varchar(32) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `satuan`
--

INSERT INTO `satuan` (`idsatuan`, `nama`) VALUES
(1, 'KG'),
(2, 'NOS');

-- --------------------------------------------------------

--
-- Table structure for table `setting`
--

CREATE TABLE `setting` (
  `idsetting` int(11) NOT NULL,
  `name` varchar(128) NOT NULL,
  `email` varchar(64) NOT NULL,
  `no_hp` varchar(15) DEFAULT NULL,
  `address` varchar(255) NOT NULL,
  `admin` varchar(128) DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `setting`
--

INSERT INTO `setting` (`idsetting`, `name`, `email`, `no_hp`, `address`, `admin`, `logo`) VALUES
(1, 'AGROBINTUNI', 'ksu.agrobintuni@gmail.com', '085244484755', 'Kab. Teluk Bintuni - Papua Barat', 'DINA SADAY', '7862a6c3c5708b85f90fdefd4660fafb.png');

-- --------------------------------------------------------

--
-- Table structure for table `tujuan`
--

CREATE TABLE `tujuan` (
  `idtujuan` int(11) NOT NULL,
  `nama` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `tujuan`
--

INSERT INTO `tujuan` (`idtujuan`, `nama`) VALUES
(0, 'Veg To KARYA ABADI'),
(1, 'Veg To SC1');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `barang`
--
ALTER TABLE `barang`
  ADD PRIMARY KEY (`idbarang`),
  ADD KEY `fk_berkas_pegawai1_idx` (`nama`),
  ADD KEY `fk_barang_satuan_idx` (`satuan_id`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`idcustomer`),
  ADD KEY `fk_customer_tujuan1_idx` (`tujuan_id`);

--
-- Indexes for table `invoice`
--
ALTER TABLE `invoice`
  ADD PRIMARY KEY (`idinvoice`),
  ADD KEY `fk_invoice_customer1_idx` (`customer_id`),
  ADD KEY `fk_invoice_pengguna1_idx` (`create_by`);

--
-- Indexes for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD PRIMARY KEY (`idinvoice_detail`),
  ADD KEY `fk_invoice_detail_invoice1_idx` (`invoice_id`),
  ADD KEY `fk_invoice_detail_barang1_idx` (`barang_id`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- Indexes for table `satuan`
--
ALTER TABLE `satuan`
  ADD PRIMARY KEY (`idsatuan`);

--
-- Indexes for table `setting`
--
ALTER TABLE `setting`
  ADD PRIMARY KEY (`idsetting`),
  ADD KEY `fk_pegawai_jabatan_idx` (`name`);

--
-- Indexes for table `tujuan`
--
ALTER TABLE `tujuan`
  ADD PRIMARY KEY (`idtujuan`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `barang`
--
ALTER TABLE `barang`
  MODIFY `idbarang` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `idcustomer` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `invoice`
--
ALTER TABLE `invoice`
  MODIFY `idinvoice` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  MODIFY `idinvoice_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `satuan`
--
ALTER TABLE `satuan`
  MODIFY `idsatuan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `setting`
--
ALTER TABLE `setting`
  MODIFY `idsetting` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `barang`
--
ALTER TABLE `barang`
  ADD CONSTRAINT `fk_barang_satuan` FOREIGN KEY (`satuan_id`) REFERENCES `satuan` (`idsatuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `customer`
--
ALTER TABLE `customer`
  ADD CONSTRAINT `fk_customer_tujuan1` FOREIGN KEY (`tujuan_id`) REFERENCES `tujuan` (`idtujuan`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice`
--
ALTER TABLE `invoice`
  ADD CONSTRAINT `fk_invoice_customer1` FOREIGN KEY (`customer_id`) REFERENCES `customer` (`idcustomer`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_pengguna1` FOREIGN KEY (`create_by`) REFERENCES `pengguna` (`idpengguna`) ON DELETE NO ACTION ON UPDATE NO ACTION;

--
-- Constraints for table `invoice_detail`
--
ALTER TABLE `invoice_detail`
  ADD CONSTRAINT `fk_invoice_detail_barang1` FOREIGN KEY (`barang_id`) REFERENCES `barang` (`idbarang`) ON DELETE NO ACTION ON UPDATE NO ACTION,
  ADD CONSTRAINT `fk_invoice_detail_invoice1` FOREIGN KEY (`invoice_id`) REFERENCES `invoice` (`idinvoice`) ON DELETE NO ACTION ON UPDATE NO ACTION;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
