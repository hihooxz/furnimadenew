-- phpMyAdmin SQL Dump
-- version 4.0.10.14
-- http://www.phpmyadmin.net
--
-- Inang: localhost:3306
-- Waktu pembuatan: 26 Agu 2016 pada 11.02
-- Versi Server: 10.0.26-MariaDB
-- Versi PHP: 5.6.20

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;

--
-- Basis data: `furnimad_fm`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_bahan`
--

CREATE TABLE IF NOT EXISTS `fm_bahan` (
  `id_bahan` int(11) NOT NULL AUTO_INCREMENT,
  `nama_bahan` varchar(200) NOT NULL,
  `keterangan_bahan` longtext NOT NULL,
  `gambar_bahan` varchar(200) NOT NULL,
  PRIMARY KEY (`id_bahan`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `fm_bahan`
--

INSERT INTO `fm_bahan` (`id_bahan`, `nama_bahan`, `keterangan_bahan`, `gambar_bahan`) VALUES
(1, 'Kayu Jati', 'Kayu Jati', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_buat_produk`
--

CREATE TABLE IF NOT EXISTS `fm_buat_produk` (
  `id_buat_produk` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(200) NOT NULL,
  `deskripsi_produk` longtext NOT NULL,
  `id_finishing` int(11) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `kode_pembuatan` int(11) NOT NULL,
  `tanggal_buat` datetime NOT NULL,
  `tanggal_selesai` date NOT NULL,
  PRIMARY KEY (`id_buat_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `fm_buat_produk`
--

INSERT INTO `fm_buat_produk` (`id_buat_produk`, `nama_produk`, `deskripsi_produk`, `id_finishing`, `id_bahan`, `id_user`, `kode_pembuatan`, `tanggal_buat`, `tanggal_selesai`) VALUES
(1, 'kursi custom 1', 'panjang = 4 cm lebar = 5 cm tinggi = 6cm', 1, 1, 2, 0, '2016-05-31 10:29:46', '2016-06-29');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_finishing`
--

CREATE TABLE IF NOT EXISTS `fm_finishing` (
  `id_finishing` int(11) NOT NULL AUTO_INCREMENT,
  `nama_finishing` varchar(200) NOT NULL,
  `keterangan_finishing` longtext NOT NULL,
  `gambar_finishing` varchar(200) NOT NULL,
  PRIMARY KEY (`id_finishing`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=2 ;

--
-- Dumping data untuk tabel `fm_finishing`
--

INSERT INTO `fm_finishing` (`id_finishing`, `nama_finishing`, `keterangan_finishing`, `gambar_finishing`) VALUES
(1, 'pelitur', 'pelitur', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_gambar_buat`
--

CREATE TABLE IF NOT EXISTS `fm_gambar_buat` (
  `id_gambar_buat` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_buat_produk` bigint(20) NOT NULL,
  `id_user` bigint(20) NOT NULL,
  `url_gambar` varchar(200) NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  PRIMARY KEY (`id_gambar_buat`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_gambar_produk`
--

CREATE TABLE IF NOT EXISTS `fm_gambar_produk` (
  `id_gambar_produk` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_produk` bigint(20) NOT NULL,
  `url_gambar` varchar(200) NOT NULL,
  `tanggal_upload` datetime NOT NULL,
  PRIMARY KEY (`id_gambar_produk`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_inspirasi_tersimpan`
--

CREATE TABLE IF NOT EXISTS `fm_inspirasi_tersimpan` (
  `id_inspirasi` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_user` int(11) NOT NULL,
  `tanggal_simpan` datetime NOT NULL,
  `nama_inspirasi` varchar(200) NOT NULL,
  `gambar_inspirasi` varchar(500) NOT NULL,
  PRIMARY KEY (`id_inspirasi`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_kategori`
--

CREATE TABLE IF NOT EXISTS `fm_kategori` (
  `id_kategori` bigint(20) NOT NULL AUTO_INCREMENT,
  `parent_kategori` bigint(20) NOT NULL,
  `nama_kategori` varchar(200) NOT NULL,
  `keterangan_kategori` longtext NOT NULL,
  `gambar_kategori` varchar(200) NOT NULL,
  PRIMARY KEY (`id_kategori`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=21 ;

--
-- Dumping data untuk tabel `fm_kategori`
--

INSERT INTO `fm_kategori` (`id_kategori`, `parent_kategori`, `nama_kategori`, `keterangan_kategori`, `gambar_kategori`) VALUES
(5, 0, 'Kamar Tidur', 'Kamar Tidur', 'asset/gambar/produk/catBeds.jpg'),
(6, 0, 'Ruang Makan', 'Ruang Makan', 'asset/gambar/produk/catDiningTables.jpg'),
(7, 11, 'Sofa', 'Sofa', 'asset/gambar/produk/catSofas.jpg'),
(8, 11, 'Sofa Kasur', 'Sofa Kasur', 'asset/gambar/produk/catSofaBeds.jpg'),
(9, 0, 'Rak', 'Rak', 'asset/gambar/produk/catStorages.jpg'),
(10, 0, 'Kamar Anak', 'Kamar Anak', 'asset/gambar/produk/catKidsRoom.jpg'),
(11, 0, 'Ruang Tamu', 'Ruang Tamu', ''),
(12, 11, 'Bantal', 'Bantal', ''),
(13, 11, 'Hiasan Dinding', 'Hiasan Dinding', ''),
(14, 11, 'Lampu Lantai', 'Lampu Lantai', ''),
(15, 11, 'Lampu Gantung', 'Lampu Gantung', ''),
(16, 11, 'Tirai', 'Tirai', ''),
(17, 11, 'Hiasan Lantai', 'Hiasan Lantai', ''),
(18, 11, 'Lantai', 'Lantai', ''),
(19, 11, 'Wallpaper', 'Wallpaper', ''),
(20, 0, 'Uncategorized', 'Uncategorized', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_order`
--

CREATE TABLE IF NOT EXISTS `fm_order` (
  `id_order` bigint(20) NOT NULL AUTO_INCREMENT,
  `kode_order` varchar(10) NOT NULL,
  `id_user` int(11) NOT NULL,
  `jenis_produk` tinyint(1) NOT NULL COMMENT '1: Produk, 2: Buat Produk (Custom Produk)',
  `id_produk` int(11) NOT NULL,
  `id_buat_produk` int(11) NOT NULL,
  `tanggal_order` date NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `qty` int(11) NOT NULL,
  `status_order` int(11) NOT NULL COMMENT '1: Dipesan, 2: Dibayar, 3: Dibuat, 4: Finishing, 5: Selesai, 6: Dikirim',
  `keterangan` longtext NOT NULL,
  PRIMARY KEY (`id_order`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_produk`
--

CREATE TABLE IF NOT EXISTS `fm_produk` (
  `id_produk` bigint(20) NOT NULL AUTO_INCREMENT,
  `nama_produk` varchar(200) NOT NULL,
  `deskripsi_produk` longtext NOT NULL,
  `gambar_produk` varchar(200) NOT NULL,
  `thumbnail_produk` varchar(200) NOT NULL,
  `tanggal_produk` datetime NOT NULL,
  `harga` decimal(10,0) NOT NULL,
  `harga_promo` decimal(10,0) NOT NULL,
  `kode_produk` varchar(20) NOT NULL,
  `status_produk` int(11) NOT NULL COMMENT '0: Published, 1 : Private, 2: Blocked',
  `id_kategori` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  PRIMARY KEY (`id_produk`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=34 ;

--
-- Dumping data untuk tabel `fm_produk`
--

INSERT INTO `fm_produk` (`id_produk`, `nama_produk`, `deskripsi_produk`, `gambar_produk`, `thumbnail_produk`, `tanggal_produk`, `harga`, `harga_promo`, `kode_produk`, `status_produk`, `id_kategori`, `id_user`) VALUES
(3, 'Sarah', 'Sarah', 'asset/gambar/thumbnail/sarah.png', '', '2016-06-08 05:34:51', '7000000', '5700000', 'KD003', 0, 7, 1),
(4, 'Wesley', 'Wesley', 'asset/gambar/thumbnail/wesley.png', '', '2016-06-08 06:50:28', '10000000', '0', 'KD001', 0, 7, 1),
(5, 'Harold', 'Harold', 'asset/gambar/thumbnail/harold.png', '', '2016-06-08 05:36:05', '6000000', '0', 'KD002', 0, 7, 1),
(6, 'Bantal 5', 'Bantal 5', 'asset/gambar/thumbnail/pillow-5.png', '', '2016-06-08 05:39:31', '50000', '0', 'BT005', 0, 12, 0),
(7, 'Bantal 9', 'Bantal 9', 'asset/gambar/thumbnail/pillow-9.png', '', '2016-06-08 05:40:51', '40000', '0', 'BT009', 0, 12, 0),
(8, 'Bantal 11', 'Bantal 11', 'asset/gambar/thumbnail/pillow-11.png', '', '2016-06-08 05:41:37', '100000', '0', 'BT011', 0, 12, 0),
(9, 'Rak Buku 1', 'Rak Buku 1', 'asset/gambar/thumbnail/book-shelves-1.png', '', '2016-06-08 05:42:28', '1200000', '0', 'HD001', 0, 13, 0),
(10, 'Frame 1', 'Frame 1', 'asset/gambar/thumbnail/frame-8.png', '', '2016-06-08 05:43:39', '400000', '0', 'HD002', 0, 13, 0),
(11, 'Rak Tembok 2', 'Rak Tembok 2', 'asset/gambar/thumbnail/wall-shelves-2.png', '', '2016-06-08 05:44:41', '1400000', '0', 'HD003', 0, 13, 0),
(12, 'Lampu Lantai 9', 'Lampu Lantai 9', 'asset/gambar/thumbnail/floor-lamp-9.png', '', '2016-06-08 07:33:54', '2100000', '2000000', 'LL009', 0, 14, 0),
(13, 'Lampu Lantai 12', 'Lampu Lantai 12', 'asset/gambar/thumbnail/floor-lamp-12.png', '', '2016-06-08 05:46:37', '1800000', '0', 'LL012', 0, 14, 0),
(14, 'Lampu Lantai 16', 'Lampu Lantai 16', 'asset/gambar/thumbnail/floor-lamp-16.png', '', '2016-06-08 05:47:17', '3200000', '0', 'LL016', 0, 14, 0),
(15, 'Lampu Gantung 2', 'Lampu Gantung 2', 'asset/gambar/thumbnail/celing-lamp-2.png', '', '2016-06-08 05:48:09', '500000', '0', 'LG002', 0, 15, 0),
(16, 'Lampu Gantung 5', 'Lampu Gantung 5', 'asset/gambar/thumbnail/celing-lamp-5.png', '', '2016-06-08 05:49:10', '800000', '0', 'LG005', 0, 15, 0),
(17, 'Lampu Gantung 7', 'Lampu Gantung 7', 'asset/gambar/thumbnail/celing-lamp-7.png', '', '2016-06-08 05:50:10', '350000', '0', 'LLG007', 0, 15, 0),
(18, 'Tirai 1', 'Tirai 1', 'asset/gambar/thumbnail/curtain-1.png', '', '2016-06-08 05:50:54', '250000', '0', 'TR001', 0, 16, 0),
(19, 'Tirai 5', 'Tirai 5', 'asset/gambar/thumbnail/curtain-5.png', '', '2016-06-08 05:51:31', '310000', '0', 'TR005', 0, 16, 0),
(20, 'Tirai 8', 'Tirai 8', 'asset/gambar/thumbnail/curtain-8.png', '', '2016-06-08 05:52:11', '330000', '0', 'TR008', 0, 16, 0),
(21, 'Vas Lantai 8', 'Vas Lantai 8', 'asset/gambar/thumbnail/floorvase-8.png', '', '2016-06-08 05:53:47', '380000', '0', 'HL001', 0, 17, 0),
(22, 'Tanaman 5', 'Tanaman 5', 'asset/gambar/thumbnail/plant-5.png', '', '2016-06-08 05:54:43', '150000', '125000', 'HL002', 0, 17, 0),
(23, 'Tanaman 6', 'Tanaman 6', 'asset/gambar/thumbnail/plant-6.png', '', '2016-06-08 05:55:27', '200000', '0', 'HL003', 0, 17, 0),
(24, 'Lantai 1', 'Lantai 1', 'asset/gambar/thumbnail/floor-1.png', '', '2016-06-08 05:56:18', '50000', '0', 'LN001', 0, 18, 0),
(25, 'Lantai 6', 'Lantai 6', 'asset/gambar/thumbnail/floor-6.png', '', '2016-06-08 05:57:06', '30000', '0', 'LN006', 0, 18, 0),
(26, 'Lantai 7', 'Lantai 7', 'asset/gambar/thumbnail/floor-7.png', '', '2016-06-08 05:57:56', '25000', '0', 'LN007', 0, 18, 0),
(27, 'Wallpaper 12', 'Wallpaper 12', 'asset/gambar/thumbnail/wall-12.png', '', '2016-06-08 05:58:55', '400000', '0', 'WL012', 0, 19, 0),
(28, 'Wallpaper 14', 'Wallpaper 14', 'asset/gambar/thumbnail/wall-14.png', '', '2016-06-08 05:59:38', '550000', '0', 'WL014', 0, 19, 0),
(30, 'Wallpaper 28', 'Wallpaper 28', 'asset/gambar/thumbnail/wall-28.png', '', '2016-06-08 06:31:39', '800000', '0', 'WL028', 0, 19, 0),
(32, 'Sofa Ketje', 'Sofa Ketje', 'asset/gambar/produk/supplier1_20160712050346.jpg', '', '2016-07-12 05:03:46', '5000000', '0', 'SK001', 0, 20, 3),
(33, 'Vas Lantai 8', 'Vas Lantai 8', 'asset/gambar/produk/supplier1_20160712050911.png', '', '2016-07-12 05:09:11', '700000', '500000', '', 1, 20, 3);

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_produk_tersimpan`
--

CREATE TABLE IF NOT EXISTS `fm_produk_tersimpan` (
  `id_produk_tersimpan` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_produk` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `tanggal_tersimpan` datetime NOT NULL,
  PRIMARY KEY (`id_produk_tersimpan`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_rating`
--

CREATE TABLE IF NOT EXISTS `fm_rating` (
  `id_rating` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_receiver` bigint(20) NOT NULL,
  `id_sender` bigint(20) NOT NULL,
  `rating` int(11) NOT NULL,
  `tanggal_rating` datetime NOT NULL,
  PRIMARY KEY (`id_rating`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_review`
--

CREATE TABLE IF NOT EXISTS `fm_review` (
  `id_review` bigint(20) NOT NULL AUTO_INCREMENT,
  `id_receiver` bigint(20) NOT NULL,
  `id_sender` bigint(20) NOT NULL,
  `review` longtext NOT NULL,
  `tanggal_review` datetime NOT NULL,
  `status_review` tinyint(1) NOT NULL COMMENT '0 : Pending, 1 : Dimoderasi, 2 : Diblok',
  PRIMARY KEY (`id_review`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_slider`
--

CREATE TABLE IF NOT EXISTS `fm_slider` (
  `id_slider` int(11) NOT NULL AUTO_INCREMENT,
  `url_slider` varchar(300) NOT NULL,
  `nama_slider` varchar(100) NOT NULL,
  `deskripsi_slider` longtext NOT NULL,
  `url_gambar` varchar(300) NOT NULL,
  `urutan` int(11) NOT NULL,
  PRIMARY KEY (`id_slider`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1 AUTO_INCREMENT=1 ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `fm_user`
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
  `jenis_kelamin` tinyint(1) NOT NULL COMMENT '0: Perempuan,1: Laki-laki',
  `hak_akses` tinyint(2) NOT NULL COMMENT '1: Admin, 2: Supplier, 3: Customer',
  `status_user` tinyint(1) NOT NULL COMMENT '1: Aktif, 0: Non Aktif',
  PRIMARY KEY (`id_user`)
) ENGINE=InnoDB  DEFAULT CHARSET=latin1 AUTO_INCREMENT=5 ;

--
-- Dumping data untuk tabel `fm_user`
--

INSERT INTO `fm_user` (`id_user`, `username`, `password`, `email`, `nama_lengkap`, `alamat`, `tentang_user`, `no_hp`, `tanggal_daftar`, `tanggal_login`, `jenis_kelamin`, `hak_akses`, `status_user`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin@furnirmate.com', 'Admin Furnirmate', 'Tangerang', '', '', '2016-05-18 00:00:00', '2016-05-18 08:00:00', 1, 1, 1),
(2, 'burger', 'a8f5f167f44f4964e6c998dee827110c', 'burger@gmail.com', 'Burger Enak Sekali', 'Jalan Burger Penuh Kenangan', 'Cuma Suka Burger', '08123451231', '2016-05-25 10:31:22', '0000-00-00 00:00:00', 1, 3, 1),
(3, 'supplier1', 'a8f5f167f44f4964e6c998dee827110c', 'supplier1@gmail.com', '', '', '', '', '2016-07-12 03:50:58', '0000-00-00 00:00:00', 0, 2, 0),
(4, 'rinaldyfa', 'a152e841783914146e4bcd4f39100686', 'aminullah95@gmail.com', '', '', '', '', '2016-07-18 04:01:07', '0000-00-00 00:00:00', 0, 2, 0);

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
