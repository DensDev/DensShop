-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Sep 15, 2021 at 11:11 AM
-- Server version: 10.4.20-MariaDB
-- PHP Version: 7.4.21

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `dens`
--

-- --------------------------------------------------------

--
-- Table structure for table `berita`
--

CREATE TABLE `berita` (
  `id_berita` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_berita` varchar(20) NOT NULL,
  `judul_berita` varchar(255) NOT NULL,
  `slug_berita` varchar(255) NOT NULL,
  `keywords` text DEFAULT NULL,
  `status_berita` varchar(20) NOT NULL,
  `keterangan` text NOT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Table structure for table `customer`
--

CREATE TABLE `customer` (
  `id_pelanggan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pelanggan` int(20) NOT NULL,
  `nama_pelanggan` varchar(50) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `customer`
--

INSERT INTO `customer` (`id_pelanggan`, `id_user`, `status_pelanggan`, `nama_pelanggan`, `email`, `password`, `telepon`, `alamat`, `tanggal_daftar`, `tanggal_update`) VALUES
(2, 0, 0, 'Dennis Dahlin', 'dennis_dahlin@yahoo.co.id', '601f1889667efaebb33b8c12572835da3f027f78', '089643741993', 'Jl.Perjuangan No.49 Bekasi', '2019-03-30 20:56:22', '2019-03-31 17:12:33'),
(3, 0, 0, 'islin', 'islinjr45@gmail.com', '601f1889667efaebb33b8c12572835da3f027f78', '089643741993', 'bekasi', '2019-03-31 10:39:19', '2019-03-31 08:39:19');

-- --------------------------------------------------------

--
-- Table structure for table `gambar`
--

CREATE TABLE `gambar` (
  `id_gambar` int(11) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `judul_gambar` varchar(255) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `gambar`
--

INSERT INTO `gambar` (`id_gambar`, `id_produk`, `judul_gambar`, `gambar`, `tanggal_update`) VALUES
(1, 16, 'Tampak Belakang', 'Back-Belakang.jpg', '2019-03-31 11:09:37'),
(2, 17, 'Dragon War Headset Green', 'download_(1)3.jpg', '2019-03-31 11:10:23'),
(3, 17, 'Dragon War Headset Green box', 'images.jpg', '2019-03-31 11:10:43');

-- --------------------------------------------------------

--
-- Table structure for table `header_transaksi`
--

CREATE TABLE `header_transaksi` (
  `id_header_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `nama_pelanggan` varchar(150) DEFAULT NULL,
  `email` varchar(45) DEFAULT NULL,
  `telepon` varchar(20) DEFAULT NULL,
  `alamat` varchar(255) DEFAULT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `jumlah_transaksi` int(11) NOT NULL,
  `status_bayar` varchar(20) NOT NULL,
  `jumlah_bayar` int(11) DEFAULT NULL,
  `rekening_pembayaran` varchar(60) DEFAULT NULL,
  `rekening_pelanggan` varchar(60) DEFAULT NULL,
  `bukti_bayar` varchar(255) DEFAULT NULL,
  `id_rekening` int(11) DEFAULT NULL,
  `tanggal_bayar` varchar(255) DEFAULT NULL,
  `nama_bank` varchar(255) DEFAULT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `header_transaksi`
--

INSERT INTO `header_transaksi` (`id_header_transaksi`, `kode_transaksi`, `id_pelanggan`, `nama_pelanggan`, `email`, `telepon`, `alamat`, `id_user`, `tanggal_transaksi`, `jumlah_transaksi`, `status_bayar`, `jumlah_bayar`, `rekening_pembayaran`, `rekening_pelanggan`, `bukti_bayar`, `id_rekening`, `tanggal_bayar`, `nama_bank`, `tanggal_post`, `tanggal_update`) VALUES
(1, '31032019ATRPJI7N', 3, 'islin', 'islinjr45@gmail.com', '089643741993', 'bekasi', 0, '2019-03-31 00:00:00', 300000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-31 12:39:21', '2019-03-31 10:39:21'),
(2, '31032019ATRPJI7N', 3, 'islin', 'islinjr45@gmail.com', '089643741993', 'bekasi', 0, '2019-03-31 00:00:00', 300000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-31 12:39:42', '2019-03-31 10:39:42'),
(3, '31032019GBXVEGSU', 3, 'islin', 'islinjr45@gmail.com', '089643741993', 'bekasi', 0, '2019-03-31 00:00:00', 450000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-31 12:40:14', '2019-03-31 10:40:14'),
(4, '31032019QUKTE0HM', 3, 'Dennis Dahlin', 'islinjr45@gmail.com', '089643741993', 'bekasi', 0, '2019-03-31 00:00:00', 2800000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-31 12:41:36', '2019-03-31 10:41:36'),
(5, '31032019ISPTDJMM', 2, 'Dennis Dahlin', 'dennis_dahlin@yahoo.co.id', '089643741993', 'Jl.Perjuangan No.49 Bekasi', 0, '2019-03-31 00:00:00', 1650000, 'Belum', NULL, NULL, NULL, NULL, NULL, NULL, NULL, '2019-03-31 16:20:20', '2019-03-31 14:20:20'),
(6, '31032019IGBAFPM8', 2, 'Dennis Dahlin', 'dennis_dahlin@yahoo.co.id', '089643741993', 'Jl.Perjuangan No.49 Bekasi', 0, '2019-03-31 00:00:00', 2000000, 'Konfirmasi', 2000000, '1213415677', 'dennis', 'unnamed.png', 5, '01-04-2019', 'Bank BCA', '2019-03-31 19:16:40', '2019-04-01 09:08:30');

-- --------------------------------------------------------

--
-- Table structure for table `kategori`
--

CREATE TABLE `kategori` (
  `id_kategori` int(11) NOT NULL,
  `slug_kategori` varchar(255) NOT NULL,
  `nama_kategori` varchar(255) NOT NULL,
  `urutan` int(11) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `kategori`
--

INSERT INTO `kategori` (`id_kategori`, `slug_kategori`, `nama_kategori`, `urutan`, `tanggal_update`) VALUES
(1, 'fashion', 'Fashion', 3, '2019-03-30 12:31:01'),
(2, 'gaming', 'Gaming', 2, '2019-03-30 12:30:57'),
(3, 'electronic', 'Electronic', 1, '2019-03-30 12:30:53'),
(4, 'food', 'Food', 4, '2019-03-31 18:12:34'),
(7, 'sports', 'Sports', 6, '2019-03-31 18:26:34'),
(8, 'bags', 'Bags', 5, '2019-03-31 18:30:49'),
(9, 'watches', 'Watches', 7, '2019-04-01 12:13:22');

-- --------------------------------------------------------

--
-- Table structure for table `konfigurasi`
--

CREATE TABLE `konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL,
  `namaweb` varchar(255) NOT NULL,
  `tagline` varchar(255) DEFAULT NULL,
  `email` varchar(255) DEFAULT NULL,
  `website` varchar(255) DEFAULT NULL,
  `keywords` text DEFAULT NULL,
  `metatext` text DEFAULT NULL,
  `telepon` varchar(255) DEFAULT NULL,
  `alamat` text DEFAULT NULL,
  `facebook` varchar(255) DEFAULT NULL,
  `instagram` varchar(255) DEFAULT NULL,
  `deskripsi` text DEFAULT NULL,
  `logo` varchar(255) DEFAULT NULL,
  `icon` text DEFAULT NULL,
  `rekening_pembayaran` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `konfigurasi`
--

INSERT INTO `konfigurasi` (`id_konfigurasi`, `namaweb`, `tagline`, `email`, `website`, `keywords`, `metatext`, `telepon`, `alamat`, `facebook`, `instagram`, `deskripsi`, `logo`, `icon`, `rekening_pembayaran`, `tanggal_update`) VALUES
(2, 'Dens Collection', 'Happy Shopping', 'islinjr45@gmail.com', 'http://denscollection.com', 'asa', 'as', '089643741993', 'Bekasi', 'http://facebook.com/denscollection', 'http://instagram.com/denscolletion', 'as', 'download.png', 'images.png', 'as', '2019-04-01 14:47:14');

-- --------------------------------------------------------

--
-- Table structure for table `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_kategori` int(11) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `slug_produk` varchar(255) NOT NULL,
  `keterangan` text NOT NULL,
  `keywords` text DEFAULT NULL,
  `harga` int(11) NOT NULL,
  `stok` int(11) DEFAULT NULL,
  `gambar` varchar(255) NOT NULL,
  `berat` float DEFAULT NULL,
  `ukuran` varchar(255) DEFAULT NULL,
  `status_produk` varchar(20) NOT NULL,
  `tanggal_post` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `id_kategori`, `kode_produk`, `nama_produk`, `slug_produk`, `keterangan`, `keywords`, `harga`, `stok`, `gambar`, `berat`, `ukuran`, `status_produk`, `tanggal_post`, `tanggal_update`) VALUES
(15, 4, 1, 'FS001', 'Jaket', 'jaket-fs001', '<p>Bloods</p>\r\n', 'Jaket Bloods', 150000, 10, 'download_(1).jpg', 11, 'XL', 'Publish', '2019-03-30 04:15:11', '2019-03-30 03:15:11'),
(16, 4, 1, 'FS002', 'kaos D\'beat 6', 'kaos-dbeat-6-fs002', '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod<br />\r\ntempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,<br />\r\nquis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo<br />\r\nconsequat. Duis aute irure dolor in reprehenderit in voluptate velit esse<br />\r\ncillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non<br />\r\nproident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>\r\n', 'kaos', 150000, 10, 'Front-Depan.jpg', 10, 'XL', 'Publish', '2019-03-30 07:58:08', '2019-04-01 14:49:29'),
(17, 4, 2, 'GM001', 'Dragon War Headset', 'dragon-war-headset-gm001', '<p>Dragon War Headset</p>\r\n', 'Dragon War Headset, Gaming', 500000, 10, 'dragon-war-headset.jpg', 300, '54x73', 'Publish', '2019-03-30 08:09:20', '2019-03-30 07:09:20'),
(18, 4, 2, 'GM002', 'E-Blue Headset', 'e-blue-headset-gm002', '<p>E-Blue Headset</p>\r\n', 'E-Blue Headset,gaming', 500000, 12, 'e-blue-auroza-surround-gaming-headset-2-review.jpg', 300, '54x73', 'Publish', '2019-03-30 08:10:03', '2019-04-01 14:51:12'),
(19, 4, 3, 'E001', 'Televisi DVB T2 32', 'televisi-dvb-t2-32-e001', '<p>LCD</p>\r\n', 'Televisi,LCD', 1500000, 10, 'download.jpg', 300, '54x73', 'Publish', '2019-03-30 13:37:40', '2019-03-30 12:37:40'),
(20, 4, 3, 'E002', 'Televisi DVB T1 32', 'televisi-dvb-t1-32-e002', '<p>tv</p>\r\n', 'tv', 1500000, 10, 'menjawab-salam-di-tv-dan-radio.jpg', 30000, '54x73', 'Publish', '2019-03-30 14:30:04', '2019-03-30 13:30:04');

-- --------------------------------------------------------

--
-- Table structure for table `rekening`
--

CREATE TABLE `rekening` (
  `id_rekening` int(11) NOT NULL,
  `nama_bank` varchar(255) NOT NULL,
  `nomor_rekening` varchar(20) NOT NULL,
  `nama_pemilik` varchar(255) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_post` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `rekening`
--

INSERT INTO `rekening` (`id_rekening`, `nama_bank`, `nomor_rekening`, `nama_pemilik`, `gambar`, `tanggal_post`) VALUES
(5, 'Bank BCA KCP Juanda Bekasi', '2343243523156', 'Dennis', NULL, '2019-03-31 18:37:22');

-- --------------------------------------------------------

--
-- Table structure for table `tbl_customer`
--

CREATE TABLE `tbl_customer` (
  `id_cust` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(20) NOT NULL,
  `nama` varchar(20) NOT NULL,
  `alamat` text NOT NULL,
  `email` varchar(20) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `active` int(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_customer`
--

INSERT INTO `tbl_customer` (`id_cust`, `username`, `password`, `nama`, `alamat`, `email`, `telp`, `active`) VALUES
(25, 'dens07', '4297f44b13955235245b', 'Dennis ', 'bekasi', 'dennis_dahlin@yahoo.', '089643741993', 1);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_inbox`
--

CREATE TABLE `tbl_inbox` (
  `inbox_id` int(11) NOT NULL,
  `inbox_nama` varchar(40) DEFAULT NULL,
  `inbox_email` varchar(60) DEFAULT NULL,
  `inbox_kontak` varchar(20) DEFAULT NULL,
  `inbox_subject` varchar(30) NOT NULL,
  `inbox_pesan` text DEFAULT NULL,
  `inbox_tanggal` timestamp NULL DEFAULT current_timestamp(),
  `inbox_status` int(11) DEFAULT 1 COMMENT '1=Belum dilihat, 0=Telah dilihat'
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_inbox`
--

INSERT INTO `tbl_inbox` (`inbox_id`, `inbox_nama`, `inbox_email`, `inbox_kontak`, `inbox_subject`, `inbox_pesan`, `inbox_tanggal`, `inbox_status`) VALUES
(20, 'dennis', 'dennis@email.com', '089643741993', 'test', 'ha;o', '2019-04-04 12:02:32', 0);

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `id_user` int(11) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(150) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(80) NOT NULL,
  `akses_user` varchar(20) NOT NULL,
  `gambar` varchar(255) DEFAULT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`id_user`, `nama`, `email`, `username`, `password`, `akses_user`, `gambar`, `tanggal_update`) VALUES
(4, 'Dennis Dahlin', 'dennis_dahlin@yahoo.co.id', 'dens07', '601f1889667efaebb33b8c12572835da3f027f78', 'Admin', 'foto2.jpg', '2019-04-03 13:27:38'),
(5, 'Admin', 'islinjr45@gmail.com', 'admin', '601f1889667efaebb33b8c12572835da3f027f78', 'Admin', 'IMG_20151216_092740.jpg', '2021-09-15 09:07:21'),
(6, 'Happy Shop', 'dennisdahlin@yahoo.co.id', 'tokoki', '601f1889667efaebb33b8c12572835da3f027f78', 'Seller', 'IMG_20150803_063607.gif', '2019-04-03 13:33:22');

-- --------------------------------------------------------

--
-- Table structure for table `transaksi`
--

CREATE TABLE `transaksi` (
  `id_transaksi` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_pelanggan` int(11) NOT NULL,
  `kode_transaksi` varchar(255) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga` int(11) NOT NULL,
  `jumlah` int(11) NOT NULL,
  `total_harga` int(11) NOT NULL,
  `tanggal_transaksi` datetime NOT NULL,
  `tanggal_update` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `transaksi`
--

INSERT INTO `transaksi` (`id_transaksi`, `id_user`, `id_pelanggan`, `kode_transaksi`, `id_produk`, `harga`, `jumlah`, `total_harga`, `tanggal_transaksi`, `tanggal_update`) VALUES
(1, 0, 3, '31032019ATRPJI7N', 16, 150000, 1, 150000, '2019-03-31 00:00:00', '2019-03-31 10:39:42'),
(2, 0, 3, '31032019ATRPJI7N', 15, 150000, 1, 150000, '2019-03-31 00:00:00', '2019-03-31 10:39:43'),
(3, 0, 3, '31032019GBXVEGSU', 16, 150000, 2, 300000, '2019-03-31 00:00:00', '2019-03-31 10:40:14'),
(4, 0, 3, '31032019GBXVEGSU', 15, 150000, 1, 150000, '2019-03-31 00:00:00', '2019-03-31 10:40:14'),
(5, 0, 3, '31032019QUKTE0HM', 18, 500000, 2, 1000000, '2019-03-31 00:00:00', '2019-03-31 10:41:36'),
(6, 0, 3, '31032019QUKTE0HM', 20, 1500000, 1, 1500000, '2019-03-31 00:00:00', '2019-03-31 10:41:36'),
(7, 0, 3, '31032019QUKTE0HM', 16, 150000, 2, 300000, '2019-03-31 00:00:00', '2019-03-31 10:41:36'),
(8, 0, 2, '31032019ISPTDJMM', 19, 1500000, 1, 1500000, '2019-03-31 00:00:00', '2019-03-31 14:20:20'),
(9, 0, 2, '31032019ISPTDJMM', 15, 150000, 1, 150000, '2019-03-31 00:00:00', '2019-03-31 14:20:20'),
(10, 0, 2, '31032019IGBAFPM8', 19, 1500000, 1, 1500000, '2019-03-31 00:00:00', '2019-03-31 17:16:41'),
(11, 0, 2, '31032019IGBAFPM8', 18, 500000, 1, 500000, '2019-03-31 00:00:00', '2019-03-31 17:16:41');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `berita`
--
ALTER TABLE `berita`
  ADD PRIMARY KEY (`id_berita`);

--
-- Indexes for table `customer`
--
ALTER TABLE `customer`
  ADD PRIMARY KEY (`id_pelanggan`),
  ADD UNIQUE KEY `email` (`email`);

--
-- Indexes for table `gambar`
--
ALTER TABLE `gambar`
  ADD PRIMARY KEY (`id_gambar`);

--
-- Indexes for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  ADD PRIMARY KEY (`id_header_transaksi`);

--
-- Indexes for table `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id_kategori`);

--
-- Indexes for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  ADD PRIMARY KEY (`id_konfigurasi`);

--
-- Indexes for table `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`),
  ADD UNIQUE KEY `kode_produk` (`kode_produk`);

--
-- Indexes for table `rekening`
--
ALTER TABLE `rekening`
  ADD PRIMARY KEY (`id_rekening`),
  ADD UNIQUE KEY `nomor_rekening` (`nomor_rekening`);

--
-- Indexes for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  ADD PRIMARY KEY (`id_cust`);

--
-- Indexes for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  ADD PRIMARY KEY (`inbox_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `username` (`username`);

--
-- Indexes for table `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id_transaksi`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `berita`
--
ALTER TABLE `berita`
  MODIFY `id_berita` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `customer`
--
ALTER TABLE `customer`
  MODIFY `id_pelanggan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `gambar`
--
ALTER TABLE `gambar`
  MODIFY `id_gambar` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `header_transaksi`
--
ALTER TABLE `header_transaksi`
  MODIFY `id_header_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id_kategori` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT for table `konfigurasi`
--
ALTER TABLE `konfigurasi`
  MODIFY `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `rekening`
--
ALTER TABLE `rekening`
  MODIFY `id_rekening` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT for table `tbl_customer`
--
ALTER TABLE `tbl_customer`
  MODIFY `id_cust` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `tbl_inbox`
--
ALTER TABLE `tbl_inbox`
  MODIFY `inbox_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT for table `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
