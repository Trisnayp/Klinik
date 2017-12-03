-- phpMyAdmin SQL Dump
-- version 4.5.1
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: May 31, 2017 at 12:59 AM
-- Server version: 10.1.19-MariaDB
-- PHP Version: 5.6.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_web`
--

-- --------------------------------------------------------

--
-- Table structure for table `tbl_booking`
--

CREATE TABLE `tbl_booking` (
  `id_user` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `no_tlp` varchar(12) NOT NULL,
  `kode_mobil` varchar(10) NOT NULL,
  `tgl_awal` date NOT NULL,
  `tgl_akhir` date NOT NULL,
  `lama_sewa` int(10) NOT NULL,
  `total_biaya` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_booking`
--

INSERT INTO `tbl_booking` (`id_user`, `nama`, `alamat`, `no_tlp`, `kode_mobil`, `tgl_awal`, `tgl_akhir`, `lama_sewa`, `total_biaya`) VALUES
('B001', 'Nandi Baehaqi', 'Bandung', '089780890007', 'A002', '2017-05-02', '2017-05-04', 2, 600000),
('B002', 'Ajeng Mawardini', 'Sumedang', '089693673509', 'A003', '2017-05-01', '2017-05-02', 1, 350000),
('B003', 'Adinda', 'Tanjungsari', '089980079002', 'A004', '2017-05-01', '2017-05-03', 2, 700000),
('B004', 'Trisna', 'Citali', '085722509706', 'A001', '2017-05-01', '2017-05-03', 2, 500000);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_login`
--

CREATE TABLE `tbl_login` (
  `kode_user` int(11) NOT NULL,
  `username` varchar(40) NOT NULL,
  `password` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_login`
--

INSERT INTO `tbl_login` (`kode_user`, `username`, `password`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_mobil`
--

CREATE TABLE `tbl_mobil` (
  `kode_mobil` varchar(10) NOT NULL,
  `no_pol` varchar(10) NOT NULL,
  `jenis` varchar(20) NOT NULL,
  `tarif` int(20) NOT NULL,
  `keterangan` varchar(30) NOT NULL,
  `gambar` varchar(40) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_mobil`
--

INSERT INTO `tbl_mobil` (`kode_mobil`, `no_pol`, `jenis`, `tarif`, `keterangan`, `gambar`) VALUES
('A001', 'B11089D', 'Avp', 250000, 'Sewa', 'avp2.jpg'),
('A002', 'B1106DF', 'Nissa', 300000, 'Sewa', 'nissan2.jpg'),
('A003', 'B67009A', 'Xenia', 350000, 'Sewa', 'xenia.jpg'),
('A004', 'B1108FA', 'Mitsubishi', 350000, 'Sewa', 'mitsubishi.jpg'),
('A005', 'B67009A', 'Daihatsu', 275000, 'Sewa', 'daihatsu2.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_pengembalian`
--

CREATE TABLE `tbl_pengembalian` (
  `Id` varchar(10) NOT NULL,
  `nama` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `kode_mobil` varchar(30) NOT NULL,
  `status` enum('Kembali','Belum Kembali') NOT NULL,
  `denda` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD PRIMARY KEY (`id_user`),
  ADD KEY `kode_mobil` (`kode_mobil`);

--
-- Indexes for table `tbl_login`
--
ALTER TABLE `tbl_login`
  ADD PRIMARY KEY (`kode_user`);

--
-- Indexes for table `tbl_mobil`
--
ALTER TABLE `tbl_mobil`
  ADD PRIMARY KEY (`kode_mobil`);

--
-- Indexes for table `tbl_pengembalian`
--
ALTER TABLE `tbl_pengembalian`
  ADD PRIMARY KEY (`Id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `tbl_login`
--
ALTER TABLE `tbl_login`
  MODIFY `kode_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;
--
-- Constraints for dumped tables
--

--
-- Constraints for table `tbl_booking`
--
ALTER TABLE `tbl_booking`
  ADD CONSTRAINT `tbl_booking_ibfk_1` FOREIGN KEY (`kode_mobil`) REFERENCES `tbl_mobil` (`kode_mobil`) ON DELETE CASCADE ON UPDATE CASCADE;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
