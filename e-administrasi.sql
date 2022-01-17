-- phpMyAdmin SQL Dump
-- version 5.0.3
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Nov 29, 2021 at 05:35 AM
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
-- Database: `e-administrasi`
--

-- --------------------------------------------------------

--
-- Table structure for table `berkas`
--

CREATE TABLE `berkas` (
  `id_berkas` int(11) NOT NULL,
  `id_pegawai` int(11) NOT NULL,
  `keterangan` varchar(128) NOT NULL,
  `nama_berkas` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `berkas`
--

INSERT INTO `berkas` (`id_berkas`, `id_pegawai`, `keterangan`, `nama_berkas`) VALUES
(1, 3, 'sdsds', '5381f9ac3fe919db44169642f4697610.jpg'),
(2, 3, 'Sertifikat', '910b0afc00602cefb5bd9ab626ba21f3.jpg'),
(3, 3, 'akgsdjkgasjld', 'c94bda617562920fced766b2f81cc254.jpg'),
(4, 1, 'Sertifikat', 'ba1d092a4bf759cebcda93779151c9eb.jpg'),
(7, 8, 'Sertifikat', '86d686bf0e9d254f848873d72c6059f3.png'),
(8, 8, 'Ijazah', '722529f4975d3bbac1c544140f01ac33.png'),
(9, 8, 'SK', '2d80e7bac2bb8c8d08ae13e1e9752e7a.png'),
(12, 8, 'Ijazah SMA', 'db0d5ccf55622a9cd5601732f625568c.png'),
(17, 22, 'KTP', 'f93c76e4674ec27965d6480e2a2433ab.png');

-- --------------------------------------------------------

--
-- Table structure for table `honor`
--

CREATE TABLE `honor` (
  `id_honor` int(11) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` enum('Islam','K.Protestan','K.Katolik','Hindu','Budha','Konghucu') NOT NULL,
  `unit_kerja` varchar(25) NOT NULL,
  `sk` enum('ada','belum ada') NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `honor`
--

INSERT INTO `honor` (`id_honor`, `nama`, `tempat_lahir`, `tgl_lahir`, `agama`, `unit_kerja`, `sk`, `status`) VALUES
(5, 'Henny Julia Mandacan, SE', 'Manokwari', '1987-07-27', 'K.Protestan', 'Dinkes', 'ada', 'Aktif'),
(6, 'Nataniel Rumadas', 'Manokwari', '1976-01-16', 'K.Protestan', 'Dinkes', 'ada', 'Aktif'),
(7, 'Liberti Margareta, A.Md.Gizi', 'Bakka', '1986-03-28', 'K.Protestan', 'PKM. Amban', 'ada', 'Aktif'),
(9, 'Andi Mardiana, A.Md.Kep', 'Dili', '1990-01-12', 'Islam', 'PKM. Sanggeng', 'ada', 'Aktif');

-- --------------------------------------------------------

--
-- Table structure for table `jabatan`
--

CREATE TABLE `jabatan` (
  `id_jabatan` int(11) NOT NULL,
  `pangkat` varchar(20) NOT NULL,
  `golongan` varchar(7) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `jabatan`
--

INSERT INTO `jabatan` (`id_jabatan`, `pangkat`, `golongan`) VALUES
(10, 'Pengatur Muda (CPNS)', 'II/a'),
(11, 'Pengatur Muda (PNS)', 'II/a'),
(12, 'Pengatur Muda Tk. I', 'II/b'),
(13, 'Pengatur', 'II/c'),
(14, 'Penata Muda', 'III/a'),
(15, 'Penata Muda Tk. I', 'III/b'),
(16, 'Penata', 'III/c'),
(17, 'Penata Tk. I', 'III/d'),
(18, 'Pembina Tk. I', 'IV/b'),
(19, 'Pembina', 'IV/a');

-- --------------------------------------------------------

--
-- Table structure for table `pegawai`
--

CREATE TABLE `pegawai` (
  `id_pegawai` int(11) NOT NULL,
  `id_jabatan` int(11) NOT NULL,
  `nip` varchar(20) NOT NULL,
  `nama` varchar(128) NOT NULL,
  `tempat_lahir` varchar(128) NOT NULL,
  `tgl_lahir` date NOT NULL,
  `agama` enum('Islam','K.Protestan','K.Katolik','Hindu','Budha','Konghucu') NOT NULL,
  `karpeg` varchar(20) NOT NULL,
  `tmtcpns` date NOT NULL,
  `noskcp` varchar(20) NOT NULL,
  `tgl_skcp` date NOT NULL,
  `tmtpns` date NOT NULL,
  `noskpn` varchar(20) NOT NULL,
  `tgl_pns` date NOT NULL,
  `profesi` varchar(50) NOT NULL,
  `unit_kerja` varchar(50) NOT NULL,
  `tgl_jabatan` date NOT NULL,
  `jenis_jabatan` enum('fungsional','struktural') NOT NULL,
  `status` enum('Aktif','Non Aktif') NOT NULL,
  `password` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pegawai`
--

INSERT INTO `pegawai` (`id_pegawai`, `id_jabatan`, `nip`, `nama`, `tempat_lahir`, `tgl_lahir`, `agama`, `karpeg`, `tmtcpns`, `noskcp`, `tgl_skcp`, `tmtpns`, `noskpn`, `tgl_pns`, `profesi`, `unit_kerja`, `tgl_jabatan`, `jenis_jabatan`, `status`, `password`) VALUES
(8, 10, '123456789098765432', 'Bambang', 'Ambon', '2020-07-08', 'K.Protestan', '67', '2020-07-22', '88', '2020-07-13', '2018-07-16', '999', '2018-07-23', 'Pegawai', 'Dinas Kesehatan', '2018-07-20', 'struktural', 'Aktif', '$2y$10$MzGc0StpdBLpoDR5EQ.g0uetIbu9/MCNnAoS0fPv2C8tcxXAcVX.e'),
(9, 10, '987654322123456784', 'Maya', 'Ambon', '2020-07-08', 'K.Protestan', '67', '2020-07-22', '88', '2020-07-13', '2019-07-16', '999', '2020-07-23', 'Pegawai', 'Dinas Kesehatan', '2020-07-20', 'fungsional', 'Aktif', '$2y$10$RRlgyEf5AvmDYoHnhHRfMuZAsZBEWDa8NYEg9ZXZ4F42YjNX.VgE2'),
(18, 13, '196303231999031006', 'dr. Alfred Bandaso', 'Rantepao', '1983-03-23', 'K.Protestan', 'L.011367', '1999-03-01', 'KP.00.02.2.4.3383', '1999-05-18', '2018-01-03', 'KP.00.03.1.3.224', '2000-06-26', 'Dokter Umum', 'Dinas Kesehatan', '2018-12-14', 'fungsional', 'Aktif', '$2y$10$Vy5Fn4W3KIDUVBGrzf2I5OGQGuuzR1WHljL9B8rHQblIYkNPOocC2'),
(19, 18, '196606071988032014', 'Yosina Orboi, SKM.', 'Manokwari', '1966-06-07', 'K.Protestan', 'E.685512', '1988-03-01', '2560/KANWIL/SK/TU-1/', '1988-07-06', '1990-01-01', '4483/KANWIL/SK/TU-1/', '1989-12-12', 'Kesmas', 'Dinas Kesehatan', '2019-10-01', 'fungsional', 'Aktif', '$2y$10$Vy5Fn4W3KIDUVBGrzf2I5OGQGuuzR1WHljL9B8rHQblIYkNPOocC2'),
(20, 19, '197003121993021005', 'Marthen Lallo Rantetampang, SKM, M.Si', 'Bibang Desa Bulo', '1970-03-12', 'K.Protestan', 'G.106764', '1993-02-01', 'KP.00.02.1.2441', '1993-05-15', '1995-02-01', 'KP.00.03.1.5640', '1994-12-21', 'Kesmas', 'Dinas Kesehatan', '2016-10-01', 'fungsional', 'Aktif', '$2y$10$Vy5Fn4W3KIDUVBGrzf2I5OGQGuuzR1WHljL9B8rHQblIYkNPOocC2'),
(21, 17, '197312301997122001', 'Regina Ester Paririe, AMK', 'Jayapura', '1973-12-30', 'K.Protestan', 'J.153248   ', '1997-12-01', 'KP.00.02.2.4.05176', '1998-03-09', '1999-08-01', 'KP.00.03.1.2287', '2020-08-17', 'Perawat', 'Dinas Kesehatan', '2017-05-19', 'fungsional', 'Aktif', '$2y$10$Vy5Fn4W3KIDUVBGrzf2I5OGQGuuzR1WHljL9B8rHQblIYkNPOocC2'),
(22, 19, '196411301989031011', 'Suharso, SKM, M.Si', 'Semarang', '1964-11-30', 'Islam', 'E.737373', '1989-03-01', 'KP. 00.02.2.47173', '1989-06-01', '1990-09-01', '3231/KANWIL/SK/TU-1V', '1990-08-04', 'Kesmas', 'Dinas Kesehatan', '2014-10-01', 'fungsional', 'Aktif', '$2y$10$m3yYhXEaurhWwO0pDINOROdOd.n3T/fcXELXHzRRt9UWi1RS1V6E2');

-- --------------------------------------------------------

--
-- Table structure for table `pengguna`
--

CREATE TABLE `pengguna` (
  `idpengguna` int(11) NOT NULL,
  `nama_lengkap` varchar(128) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(128) NOT NULL,
  `level` enum('admin','staf','kasubag') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `pengguna`
--

INSERT INTO `pengguna` (`idpengguna`, `nama_lengkap`, `username`, `password`, `level`) VALUES
(4, 'Admin', 'admin', '$2y$10$saTE2WRbUmRmQO1rl5pXheauR12PB73IaNu0V7M52rwCTMauKnDr2', 'admin'),
(6, 'kasubag', 'kasubag', '$2y$10$MzGc0StpdBLpoDR5EQ.g0uetIbu9/MCNnAoS0fPv2C8tcxXAcVX.e', 'kasubag'),
(7, 'Staf', 'staf', '$2y$10$MzGc0StpdBLpoDR5EQ.g0uetIbu9/MCNnAoS0fPv2C8tcxXAcVX.e', 'staf');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berkas`
--
ALTER TABLE `berkas`
  ADD PRIMARY KEY (`id_berkas`),
  ADD KEY `fk_berkas_pegawai1_idx` (`id_pegawai`);

--
-- Indexes for table `honor`
--
ALTER TABLE `honor`
  ADD PRIMARY KEY (`id_honor`);

--
-- Indexes for table `jabatan`
--
ALTER TABLE `jabatan`
  ADD PRIMARY KEY (`id_jabatan`);

--
-- Indexes for table `pegawai`
--
ALTER TABLE `pegawai`
  ADD PRIMARY KEY (`id_pegawai`),
  ADD KEY `fk_pegawai_jabatan_idx` (`id_jabatan`);

--
-- Indexes for table `pengguna`
--
ALTER TABLE `pengguna`
  ADD PRIMARY KEY (`idpengguna`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berkas`
--
ALTER TABLE `berkas`
  MODIFY `id_berkas` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `honor`
--
ALTER TABLE `honor`
  MODIFY `id_honor` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `jabatan`
--
ALTER TABLE `jabatan`
  MODIFY `id_jabatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT for table `pegawai`
--
ALTER TABLE `pegawai`
  MODIFY `id_pegawai` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=28;

--
-- AUTO_INCREMENT for table `pengguna`
--
ALTER TABLE `pengguna`
  MODIFY `idpengguna` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
