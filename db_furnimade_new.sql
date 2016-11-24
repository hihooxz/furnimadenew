-- phpMyAdmin SQL Dump
-- version 4.0.9
-- http://www.phpmyadmin.net
--
-- Host: 127.0.0.1
-- Generation Time: Nov 24, 2016 at 06:05 AM
-- Server version: 5.5.34
-- PHP Version: 5.4.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Database: `db_furnimade_new`
--

-- --------------------------------------------------------

--
-- Table structure for table `fm_blog`
--

CREATE TABLE IF NOT EXISTS `fm_blog` (
  `id_blog` int(11) NOT NULL AUTO_INCREMENT,
  `judul_blog` varchar(100) NOT NULL,
  `artikel` longtext NOT NULL,
  `tanggal_blog` date NOT NULL,
  `id_user` int(11) NOT NULL,
  `gambar_blog` varchar(200) NOT NULL,
  `dilihat` int(11) NOT NULL,
  PRIMARY KEY (`id_blog`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fm_blog`
--

INSERT INTO `fm_blog` (`id_blog`, `judul_blog`, `artikel`, `tanggal_blog`, `id_user`, `gambar_blog`, `dilihat`) VALUES
(1, 'Lorem Ipsum Aja', 'Lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet lorem ipsum dolor sil amet', '2016-11-09', 1, 'asset/gambar/blog/mahogany1.jpg', 6);

-- --------------------------------------------------------

--
-- Table structure for table `fm_desain_produk`
--

CREATE TABLE IF NOT EXISTS `fm_desain_produk` (
  `id_desain_produk` bigint(20) NOT NULL AUTO_INCREMENT,
  `judul_desain` varchar(150) NOT NULL,
  `bahan_desain` varchar(200) NOT NULL,
  `finishing_desain` varchar(200) NOT NULL,
  `deskripsi_desain` longtext NOT NULL,
  `tanggal_desain` datetime NOT NULL,
  `id_pembeli` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  PRIMARY KEY (`id_desain_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fm_detail_pesanan`
--

CREATE TABLE IF NOT EXISTS `fm_detail_pesanan` (
  `id_detail_pesanan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_pesanan` bigint(20) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_beli` bigint(20) NOT NULL,
  `qty` int(11) NOT NULL,
  PRIMARY KEY (`id_detail_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fm_gambar_desain`
--

CREATE TABLE IF NOT EXISTS `fm_gambar_desain` (
  `id_gambar_desain` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_desain_produk` bigint(20) NOT NULL,
  `url_desain_produk` varchar(200) NOT NULL,
  `jenis_desain` tinyint(1) NOT NULL COMMENT '0: Gambar Dimensi Produk, 1: Gambar 3D Produk',
  PRIMARY KEY (`id_gambar_desain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fm_gambar_produk`
--

CREATE TABLE IF NOT EXISTS `fm_gambar_produk` (
  `id_gambar_produk` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `url_gambar` varchar(200) NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  PRIMARY KEY (`id_gambar_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fm_kategori`
--

CREATE TABLE IF NOT EXISTS `fm_kategori` (
  `id_kategori` int(11) NOT NULL AUTO_INCREMENT,
  `id_parent` int(11) NOT NULL,
  `nama_kategori` varchar(100) NOT NULL,
  `keterangan_kategori` longtext NOT NULL,
  `gambar_kategori` varchar(100) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=28 ;

--
-- Dumping data for table `fm_kategori`
--

INSERT INTO `fm_kategori` (`id_kategori`, `id_parent`, `nama_kategori`, `keterangan_kategori`, `gambar_kategori`) VALUES
(1, 0, 'Ruang Tamu', 'kuat', ''),
(2, 0, 'Ruang Makan dan Dapur', '', ''),
(3, 1, 'Sofa & Kursi', '', ''),
(5, 1, 'Rak TV & Solusi media', '', ''),
(6, 1, 'Penyimpanan Ruang Keluarga', '', ''),
(7, 1, 'Meja Tamu & Meja Samping', '', ''),
(8, 0, 'Kamar Tidur', '', ''),
(9, 0, 'Kamar Tidur Anak', '', ''),
(10, 2, 'Meja Makan', '', ''),
(11, 2, 'Meja Samping', '', ''),
(12, 2, 'Set Meja Makan', '', ''),
(13, 2, 'Meja Kerja', '', ''),
(14, 2, 'Kursi', '', ''),
(15, 2, 'Kursi Makan', '', ''),
(16, 2, 'Kursi Gantung', '', ''),
(17, 2, 'Kursi Armchair', '', ''),
(18, 8, 'Meja TV', '', ''),
(19, 8, 'Rak', '', ''),
(20, 8, 'Kabinet', '', ''),
(21, 8, 'Lemari Meja Samping', '', ''),
(22, 8, 'Lemari Pakaian', '', ''),
(23, 8, 'Tempat Tidur Single', '', ''),
(24, 8, 'Tempat Tidur Double', '', ''),
(25, 8, 'Matras', '', ''),
(26, 8, 'Meja Samping Tempat Tidur', '', ''),
(27, 8, 'Lemari Pakaian', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fm_konfigurasi`
--

CREATE TABLE IF NOT EXISTS `fm_konfigurasi` (
  `id_konfigurasi` int(11) NOT NULL AUTO_INCREMENT,
  `judul_website` varchar(100) NOT NULL,
  `faq` longtext NOT NULL,
  `syarat_ketentuan` longtext NOT NULL,
  `tentang_kami` longtext NOT NULL,
  `alamat_kantor` varchar(200) NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `link_facebook` varchar(100) NOT NULL,
  `link_twitter` varchar(100) NOT NULL,
  `link_instagram` varchar(100) NOT NULL,
  `link_gplus` varchar(100) NOT NULL,
  `link_path` varchar(100) NOT NULL,
  PRIMARY KEY (`id_konfigurasi`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fm_konfigurasi`
--

INSERT INTO `fm_konfigurasi` (`id_konfigurasi`, `judul_website`, `faq`, `syarat_ketentuan`, `tentang_kami`, `alamat_kantor`, `no_telp`, `link_facebook`, `link_twitter`, `link_instagram`, `link_gplus`, `link_path`) VALUES
(1, 'Furnimade', 'Pertanyaan?', 'Ini Syarat dan Ketentuan', 'Kami adalah peruashaan furniture gitu lho. Kami adalah peruashaan furniture gitu lho. Kami adalah peruashaan furniture gitu lho.', '', '', '', '', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `fm_konfirmasi_pembayaran`
--

CREATE TABLE IF NOT EXISTS `fm_konfirmasi_pembayaran` (
  `id_konfirmasi_pembayaran` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_pembayaran` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `nominal` int(11) NOT NULL,
  `bank` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `tanggal_transfer` date NOT NULL,
  `tanggal_konfirmasi_pembayaran` datetime NOT NULL,
  PRIMARY KEY (`id_konfirmasi_pembayaran`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fm_konfirmasi_pengerjaan`
--

CREATE TABLE IF NOT EXISTS `fm_konfirmasi_pengerjaan` (
  `id_konfirmasi_pengerjaan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_desain_produk` int(11) NOT NULL,
  `url_gambar_pengerjaan` varchar(200) NOT NULL,
  `keterangan_pengerjaan` longtext NOT NULL,
  `tanggal_konfirmasi_pengerjaan` datetime NOT NULL,
  PRIMARY KEY (`id_konfirmasi_pengerjaan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fm_pembayaran`
--

CREATE TABLE IF NOT EXISTS `fm_pembayaran` (
  `id_pembayaran` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bank` varchar(100) NOT NULL,
  `atas_nama` varchar(100) NOT NULL,
  `no_rekening` varchar(20) NOT NULL,
  `gambar_bank` varchar(200) NOT NULL,
  PRIMARY KEY (`id_pembayaran`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fm_pembayaran`
--

INSERT INTO `fm_pembayaran` (`id_pembayaran`, `nama_bank`, `atas_nama`, `no_rekening`, `gambar_bank`) VALUES
(1, 'BCA', 'Irwinn', '60012930219', 'asset/gambar/pembayaran/bca-bank-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `fm_pesan`
--

CREATE TABLE IF NOT EXISTS `fm_pesan` (
  `id_pesan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_ruangpesan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `pesan` longtext NOT NULL,
  `gambar_pesan` varchar(200) NOT NULL,
  `tanggal_pesan` datetime NOT NULL,
  PRIMARY KEY (`id_pesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fm_pesan`
--

INSERT INTO `fm_pesan` (`id_pesan`, `id_ruangpesan`, `id_user`, `pesan`, `gambar_pesan`, `tanggal_pesan`) VALUES
(1, 1, 1, 'ya!!!!!', 'asset/gambar/pesan/catKidsRoom.jpg', '2016-11-08 07:25:31');

-- --------------------------------------------------------

--
-- Table structure for table `fm_pesanan`
--

CREATE TABLE IF NOT EXISTS `fm_pesanan` (
  `id_pesanan` bigint(20) NOT NULL AUTO_INCREMENT,
  `total_item` int(11) NOT NULL,
  `jumlah_barang` int(11) NOT NULL,
  `total` bigint(20) NOT NULL,
  `id_user` int(11) NOT NULL,
  `status_pesan` int(11) NOT NULL,
  `tanggal_pesan` date NOT NULL,
  PRIMARY KEY (`id_pesanan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fm_produk`
--

CREATE TABLE IF NOT EXISTS `fm_produk` (
  `id_produk` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_kategori` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `nama_produk` varchar(100) NOT NULL,
  `gambar_produk` varchar(200) NOT NULL,
  `harga_produk` int(11) NOT NULL,
  `tanggal_produk` datetime NOT NULL,
  `deskripsi_produk` longtext NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fm_produk`
--

INSERT INTO `fm_produk` (`id_produk`, `id_kategori`, `id_penjual`, `nama_produk`, `gambar_produk`, `harga_produk`, `tanggal_produk`, `deskripsi_produk`) VALUES
(1, 20, 8, 'Meja Mahoni', 'asset/gambar/produk/supplier1_20160805103502.jpg', 1000000, '2016-11-18 09:32:23', 'mejanya kuat');

-- --------------------------------------------------------

--
-- Table structure for table `fm_ruangpesan`
--

CREATE TABLE IF NOT EXISTS `fm_ruangpesan` (
  `id_ruangpesan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_pembeli` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `tanggal_ruangpesan` datetime NOT NULL,
  PRIMARY KEY (`id_ruangpesan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data for table `fm_ruangpesan`
--

INSERT INTO `fm_ruangpesan` (`id_ruangpesan`, `id_pembeli`, `id_penjual`, `tanggal_ruangpesan`) VALUES
(1, 1, 1, '2016-11-08 07:22:24');

-- --------------------------------------------------------

--
-- Table structure for table `fm_tender_desain`
--

CREATE TABLE IF NOT EXISTS `fm_tender_desain` (
  `id_tender_desain` int(11) NOT NULL AUTO_INCREMENT,
  `id_desain_produk` bigint(20) NOT NULL,
  `tanggal_selesai_tender` date NOT NULL,
  `range_harga` varchar(100) NOT NULL,
  `status_tender` tinyint(1) NOT NULL COMMENT '0: Open, 1: Closed',
  PRIMARY KEY (`id_tender_desain`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fm_tender_penjual`
--

CREATE TABLE IF NOT EXISTS `fm_tender_penjual` (
  `id_tender_penjual` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_tender` int(11) NOT NULL,
  `id_penjual` int(11) NOT NULL,
  `lama_pengerjaan` varchar(100) NOT NULL,
  `harga` int(11) NOT NULL,
  `bahan` varchar(200) NOT NULL,
  `keterangan` longtext NOT NULL,
  `tanggal_tender_penjual` datetime NOT NULL,
  PRIMARY KEY (`id_tender_penjual`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Table structure for table `fm_user`
--

CREATE TABLE IF NOT EXISTS `fm_user` (
  `id_user` bigint(20) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) NOT NULL,
  `password` char(32) NOT NULL,
  `email` varchar(100) NOT NULL,
  `nama_lengkap` varchar(200) NOT NULL,
  `alamat` longtext NOT NULL,
  `tentang_user` longtext NOT NULL,
  `no_hp` varchar(15) NOT NULL,
  `tanggal_daftar` datetime NOT NULL,
  `tanggal_login` datetime NOT NULL,
  `jenis_kelamin` tinyint(1) NOT NULL COMMENT '0: Not Set,1: Laki-laki, 2: Perempuan',
  `hak_akses` tinyint(2) NOT NULL COMMENT '1: Admin, 2: Penjual, 3: Pembeli',
  `status_user` tinyint(1) NOT NULL COMMENT '1: Aktif, 0: Non Aktif',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=24 ;

--
-- Dumping data for table `fm_user`
--

INSERT INTO `fm_user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `tentang_user`, `no_hp`, `tanggal_daftar`, `tanggal_login`, `jenis_kelamin`, `hak_akses`, `status_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@furnirmate.com', 'Admin Furnirmate', 'Tangerang', '', '', '2016-05-18 00:00:00', '2016-05-18 08:00:00', 1, 1, 1),
(7, 'jhonnysuryoto', '8db2dcfa9030b542c3e7bd6f112d6832', 'jhonnysuryoto@gmail.com', '', '', '', '', '2016-09-07 12:19:10', '0000-00-00 00:00:00', 0, 3, 0),
(8, 'zuhdirobbani', 'a8f5f167f44f4964e6c998dee827110c', 'zuhdi.robbani@gmail.com', 'Zuhdi Robbani', 'Tangerang', '-', '08123455555', '2016-09-12 07:51:33', '0000-00-00 00:00:00', 1, 2, 1),
(9, 'ghina', '9602d1046580f9e76a6f355eb101f58a', 'ghinafajarshidiq@gmail.com', '', '', '', '', '2016-09-22 04:20:49', '0000-00-00 00:00:00', 0, 3, 0),
(11, 'Albert123', '427ea5b485fe43bdb3cb6e09ee528c31', 'juliusdemetri@gmail.com', 'Albert', 'Gajah 34', 'Laki', '+6287832200024', '2016-09-23 08:35:18', '0000-00-00 00:00:00', 1, 3, 0),
(15, 'asdfgh', '25f3475bad1f6f41afdcf32bb8a58392', 'stupidbrothers6@gmail.com', '', '', '', '', '2016-09-29 19:35:52', '0000-00-00 00:00:00', 0, 3, 0),
(21, 'rinaldy', 'c387a88708ed67ed19bd3af2800bd711', 'aminullah95@gmail.com', '', '', '', '', '2016-10-14 00:41:15', '0000-00-00 00:00:00', 0, 3, 1),
(22, 'rinaldysup', 'c387a88708ed67ed19bd3af2800bd711', 'aminullah95@gmail.com', '', '', '', '', '2016-10-14 00:59:41', '0000-00-00 00:00:00', 0, 2, 0),
(23, 'robbani', 'a8f5f167f44f4964e6c998dee827110c', 'robbani@gmail.com', 'Robbani', 'Jakarta', 'Saya Tampan', '081242412444', '2016-11-17 11:47:59', '0000-00-00 00:00:00', 1, 3, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
