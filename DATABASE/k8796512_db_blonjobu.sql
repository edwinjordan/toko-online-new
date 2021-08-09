-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 09 Jul 2021 pada 10.09
-- Versi server: 10.4.16-MariaDB
-- Versi PHP: 7.4.12

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `k8796512_db_blonjobu`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `admin`
--

CREATE TABLE `admin` (
  `id_admin` int(11) NOT NULL,
  `admin_nama` varchar(50) DEFAULT NULL,
  `admin_username` varchar(100) DEFAULT NULL,
  `admin_password` varchar(32) DEFAULT NULL,
  `admin_view_password` varchar(32) DEFAULT NULL,
  `admin_level` char(2) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `admin`
--

INSERT INTO `admin` (`id_admin`, `admin_nama`, `admin_username`, `admin_password`, `admin_view_password`, `admin_level`) VALUES
(1, 'ses', 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin', '1');

-- --------------------------------------------------------

--
-- Struktur dari tabel `daerah_kirim`
--

CREATE TABLE `daerah_kirim` (
  `id_daerah_kirim` int(11) NOT NULL,
  `id_kota` int(11) NOT NULL,
  `kota_kirim` varchar(60) NOT NULL,
  `id_kec` int(11) NOT NULL,
  `kec_kirim` varchar(60) NOT NULL,
  `id_kel` int(11) NOT NULL,
  `kel_kirim` varchar(60) NOT NULL,
  `kurir` varchar(60) NOT NULL,
  `ongkir` varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `daerah_kirim`
--

INSERT INTO `daerah_kirim` (`id_daerah_kirim`, `id_kota`, `kota_kirim`, `id_kec`, `kec_kirim`, `id_kel`, `kel_kirim`, `kurir`, `ongkir`) VALUES
(34, 1, 'Magetan', 2, 'Kartoharjo', 2, 'Bayemwetan', 'JNE', '30000'),
(36, 5, 'Kabupaten Malang', 6, 'Sawojajar', 7, 'samaan', 'Go Send', '1000'),
(37, 2, 'Madiun', 4, 'Klegen', 4, 'Mangkujayan', 'JNT atau JNE', '31000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_bank`
--

CREATE TABLE `data_bank` (
  `id_data` int(11) NOT NULL,
  `jenis_bank` varchar(255) NOT NULL,
  `atas_nama_bank` varchar(255) NOT NULL,
  `no_rekening` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `data_bank`
--

INSERT INTO `data_bank` (`id_data`, `jenis_bank`, `atas_nama_bank`, `no_rekening`) VALUES
(1, 'BRI', 'blonjobu', '083747436882'),
(2, 'BNI', 'blonjobu', '3548329012765'),
(3, 'Mandiri', 'blonjobu', '836975162592');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_refund`
--

CREATE TABLE `data_refund` (
  `id_refund` int(11) NOT NULL,
  `id_detail_order` int(11) NOT NULL,
  `no_rekening` varchar(50) NOT NULL,
  `ATM` varchar(50) NOT NULL,
  `nama_penerima` varchar(50) NOT NULL,
  `status_kirim` tinyint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_order`
--

CREATE TABLE `detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` varchar(20) DEFAULT NULL,
  `id_penjual` varchar(50) DEFAULT NULL,
  `id_ongkir_pembeli` int(11) DEFAULT NULL,
  `id_produk` varchar(15) DEFAULT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `jumlah_produk` int(11) DEFAULT NULL,
  `berat_produk` double DEFAULT NULL,
  `harga` double DEFAULT NULL,
  `harga_pajak` double DEFAULT NULL,
  `subtotal` double DEFAULT NULL,
  `subtotal_pajak` double DEFAULT NULL,
  `no_resi` varchar(50) DEFAULT NULL,
  `pembayaran` double DEFAULT NULL,
  `tagihan` double DEFAULT NULL,
  `status_kirim` int(1) DEFAULT NULL,
  `status_detail_komplain` int(11) NOT NULL DEFAULT 0,
  `status_bayar` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_order`
--

INSERT INTO `detail_order` (`id_detail_order`, `id_order`, `id_penjual`, `id_ongkir_pembeli`, `id_produk`, `id_jadwal`, `jumlah_produk`, `berat_produk`, `harga`, `harga_pajak`, `subtotal`, `subtotal_pajak`, `no_resi`, `pembayaran`, `tagihan`, `status_kirim`, `status_detail_komplain`, `status_bayar`) VALUES
(45, 'T210615001', 'Admin', NULL, '2005090117', NULL, 1, 1000, 15200, 15200, 15200, 15200, '0', NULL, NULL, 1, 0, 0),
(46, 'T210616001', 'Admin', NULL, '2005090178', NULL, 1, 500, 4700, 4700, 4700, 4700, '0', NULL, NULL, 1, 0, 0),
(47, 'T210616002', 'Admin', NULL, '2005090112', NULL, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(48, 'T210616003', 'Admin', NULL, '2004280017', NULL, 1, 0, 19000, 19000, 19000, 19000, NULL, NULL, NULL, NULL, 0, 0),
(49, 'T210616004', 'Admin', NULL, '2005090094', NULL, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(50, 'T210616005', 'Admin', NULL, '2004280016', NULL, 1, 0, 16000, 16000, 16000, 16000, '0', NULL, NULL, 1, 0, 0),
(51, 'T210616006', 'Admin', NULL, '2005090112', NULL, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(52, 'T210616007', 'Admin', NULL, '2005090117', NULL, 1, 1000, 15200, 15200, 15200, 15200, NULL, NULL, NULL, NULL, 0, 0),
(53, 'T210616008', 'Admin', NULL, '2005090119', NULL, 1, 1000, 20000, 20000, 20000, 20000, NULL, NULL, NULL, NULL, 0, 0),
(54, 'T210616009', 'Admin', NULL, '2004280006', NULL, 1, 0, 10000, 10000, 10000, 10000, '0', NULL, NULL, 1, 0, 0),
(55, 'T210616010', 'Admin', NULL, '2005090181', NULL, 1, 500, 5200, 5200, 5200, 5200, NULL, NULL, NULL, NULL, 0, 0),
(56, 'T210616011', 'Admin', NULL, '2005090195', NULL, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(57, 'T210616012', 'Admin', NULL, '2004280018', NULL, 1, 0, 37500, 37500, 37500, 37500, NULL, NULL, NULL, NULL, 0, 0),
(58, 'T210616013', 'Admin', NULL, '2005090114', NULL, 1, 5000, 56300, 56300, 56300, 56300, NULL, NULL, NULL, NULL, 0, 0),
(59, 'T210617001', 'Admin', NULL, '2005090121', NULL, 1, 1000, 24500, 24500, 24500, 24500, '0', 1, NULL, 1, 1, 0),
(60, 'T210617002', 'Admin', NULL, '2005090081', NULL, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(61, 'T210617003', 'Admin', NULL, '2005090124', NULL, 1, 1000, 14700, 14700, 14700, 14700, NULL, NULL, NULL, NULL, 0, 0),
(62, 'T210617004', 'Admin', NULL, '2005090120', NULL, 1, 1000, 18700, 18700, 18700, 18700, NULL, NULL, NULL, NULL, 0, 0),
(63, 'T210617005', 'Admin', NULL, '2005090146', NULL, 1, 500, 5200, 5200, 5200, 5200, '0', NULL, NULL, 1, 0, 0),
(64, 'T210621001', 'Admin', NULL, '2004280018', NULL, 3, 0, 37500, 37500, 112500, 112500, '0', 1, NULL, 1, 1, 0),
(65, 'T210703001', 'Admin', NULL, '2005090114', NULL, 1, 5000, 56300, 56300, 56300, 56300, NULL, NULL, NULL, NULL, 0, 0),
(66, 'T210703002', 'Admin', NULL, '2005090114', NULL, 1, 5000, 56300, 56300, 56300, 56300, NULL, NULL, NULL, NULL, 0, 0),
(67, 'T210703003', 'Admin', NULL, '2005090114', NULL, 1, 5000, 56300, 56300, 56300, 56300, NULL, NULL, NULL, NULL, 0, 0),
(68, 'T210703004', 'Admin', NULL, '2005090114', NULL, 1, 5000, 56300, 56300, 56300, 56300, NULL, NULL, NULL, NULL, 0, 0),
(69, 'T210705001', 'Admin', NULL, '2005090132', NULL, 1, 500, 17000, 17000, 17000, 17000, NULL, NULL, NULL, NULL, 0, 0),
(70, 'T210705002', 'Admin', NULL, '2005090132', NULL, 1, 500, 17000, 17000, 17000, 17000, NULL, NULL, NULL, NULL, 0, 0),
(71, 'T210708013', 'Admin', NULL, '2005090103', NULL, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(72, 'T210708014', 'Admin', NULL, '2005090103', NULL, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(73, 'T210708015', 'Admin', NULL, '2005090103', NULL, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(74, 'T210708021', 'Admin', NULL, '2005090103', NULL, 1, 1, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(75, 'T210708026', 'Admin', NULL, '2005090191', NULL, 1, 1000, 1, 1, 1, 1, NULL, NULL, NULL, NULL, 0, 0),
(76, 'T210708027', 'Admin', NULL, '2005090122', NULL, 1, 1000, 24500, 24500, 24500, 24500, NULL, NULL, NULL, NULL, 0, 0),
(77, 'T210708030', 'Admin', NULL, '2005090136', NULL, 1, 100, 2500, 2500, 2500, 2500, NULL, NULL, NULL, NULL, 0, 0),
(78, 'T210708031', 'Admin', NULL, '2005090162', NULL, 1, 500, 9700, 9700, 9700, 9700, NULL, NULL, NULL, NULL, 0, 0),
(79, 'T210708032', 'Admin', NULL, '2005090162', NULL, 1, 500, 9700, NULL, 9700, NULL, NULL, NULL, NULL, NULL, 0, 0),
(80, 'T210708037', 'Admin', NULL, '2005090182', NULL, 1, 500, 5200, NULL, 5200, NULL, NULL, NULL, NULL, NULL, 0, 0),
(81, 'T210708038', 'Admin', NULL, '2005090135', NULL, 1, 100, 1800, NULL, 1800, NULL, NULL, NULL, NULL, NULL, 0, 0),
(82, 'T210708039', 'Admin', NULL, '2004280008', NULL, 1, 0, 7500, NULL, 7500, NULL, NULL, NULL, NULL, NULL, 0, 0),
(83, 'T210708040', 'Admin', NULL, '2005090115', NULL, 1, 1000, 14200, NULL, 14200, NULL, NULL, NULL, NULL, NULL, 0, 0),
(84, 'T210708041', 'Admin', NULL, '2005090081', NULL, 1, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, 0),
(85, 'T210708042', 'Admin', NULL, '2005090081', NULL, 1, 1, 1, NULL, 1, NULL, '0', NULL, NULL, 1, 0, 0),
(86, 'T210709001', 'Admin', NULL, '2005090060', NULL, 1, 1, 1, NULL, 1, NULL, NULL, NULL, NULL, NULL, 0, 0),
(87, 'T210709002', 'Admin', NULL, '2005090138', NULL, 1, 500, 5200, NULL, 5200, NULL, NULL, NULL, NULL, NULL, 0, 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `detail_pengiriman`
--

CREATE TABLE `detail_pengiriman` (
  `id_detail_pengiriman` int(11) NOT NULL,
  `id_detail_order` int(11) NOT NULL,
  `tanggal_konfirmasi` date NOT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `status_kadaluarsa` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `detail_pengiriman`
--

INSERT INTO `detail_pengiriman` (`id_detail_pengiriman`, `id_detail_order`, `tanggal_konfirmasi`, `tanggal_kirim`, `status_kadaluarsa`) VALUES
(10, 59, '2021-06-17', '2021-06-17', 0),
(11, 46, '2021-06-17', '2021-06-17', 0),
(12, 50, '2021-06-17', '2021-06-17', 0),
(13, 63, '2021-06-17', '2021-06-17', 0),
(14, 54, '2021-06-17', '2021-07-08', 1),
(15, 64, '2021-06-21', '2021-06-21', 0),
(16, 45, '2021-07-08', '2021-07-08', 0),
(17, 85, '2021-07-08', '2021-07-08', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id_jadwal` int(11) NOT NULL,
  `tgl_berangkat` varchar(100) NOT NULL,
  `tgl_pulang` varchar(100) NOT NULL,
  `id_produk` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `jam_kirim`
--

CREATE TABLE `jam_kirim` (
  `id_jam` int(11) NOT NULL,
  `jam_kirim` time NOT NULL,
  `keterangan` varchar(225) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jam_kirim`
--

INSERT INTO `jam_kirim` (`id_jam`, `jam_kirim`, `keterangan`) VALUES
(1, '05:00:00', 'Pagi'),
(2, '13:00:00', 'Siang'),
(6, '19:00:00', 'Malam'),
(10, '17:25:00', 'Siang'),
(12, '22:06:00', 'malam');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori_produk`
--

CREATE TABLE `kategori_produk` (
  `id_kategori_produk` int(11) NOT NULL,
  `nama_kategori_produk` varchar(100) NOT NULL,
  `aktif_kategori_produk` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `title_kategori_produk` varchar(50) NOT NULL,
  `meta_description_kategori_produk` varchar(100) NOT NULL,
  `meta_keywords_kategori_produk` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kategori_produk`
--

INSERT INTO `kategori_produk` (`id_kategori_produk`, `nama_kategori_produk`, `aktif_kategori_produk`, `id_menu`, `title_kategori_produk`, `meta_description_kategori_produk`, `meta_keywords_kategori_produk`) VALUES
(6, 'Sayur Segar & Bumbu', 1, 0, 'Sayur Segar & Bumbu', 'Sayur Segar & Bumbu', 'Sayur Segar & Bumbu'),
(8, 'Kue dan daging', 1, 0, 'Kue dan daging', 'Kue dan daging', 'Kue dan daging'),
(9, 'Fashion', 1, 1, 'Fashion', 'Fashion', 'Fashion'),
(10, 'Health Care & Cosmetic', 1, 0, 'Health Care & Cosmetic', 'Health Care & Cosmetic', 'Health Care & Cosmetic'),
(11, 'Makanan dan minuman', 1, 0, 'Makanan dan minuman segar', 'Makanan dan minuman', 'Makanan dan minuman'),
(12, 'sabun dan pembersih', 1, 0, 'sabun dan pembersih', 'sabun dan pembersih', 'sabun dan pembersih'),
(13, 'susu bubuk dan minuman', 0, 0, 'susu bubuk dan minuman', 'susu bubuk dan minuman', 'susu bubuk dan minuman'),
(14, 'skin care', 0, 0, 'skin care', 'skin care', 'skin');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kecamatan`
--

CREATE TABLE `kecamatan` (
  `id_kecamatan` int(11) NOT NULL,
  `id_kota_fk` int(11) NOT NULL,
  `nama_kecamatan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kecamatan`
--

INSERT INTO `kecamatan` (`id_kecamatan`, `id_kota_fk`, `nama_kecamatan`) VALUES
(1, 1, 'Karangrejo'),
(2, 1, 'Kartoharjo'),
(3, 2, 'Manguharjo'),
(4, 2, 'Klegen'),
(5, 1, 'barat'),
(6, 5, 'Sawojajar'),
(7, 9, 'Sumber Rejo');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kelurahan`
--

CREATE TABLE `kelurahan` (
  `id_kelurahan` int(11) NOT NULL,
  `id_kecamatan_fk` int(11) NOT NULL,
  `id_kota_fk` int(11) NOT NULL,
  `nama_kelurahan` varchar(60) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `kelurahan`
--

INSERT INTO `kelurahan` (`id_kelurahan`, `id_kecamatan_fk`, `id_kota_fk`, `nama_kelurahan`) VALUES
(1, 1, 1, 'Grabahan'),
(2, 2, 1, 'Bayemwetan'),
(3, 3, 2, 'Manguharjo'),
(4, 4, 2, 'Mangkujayan'),
(5, 1, 1, 'Gandu'),
(6, 1, 1, 'Maron'),
(7, 6, 5, 'samaan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `keranjang_belanja`
--

CREATE TABLE `keranjang_belanja` (
  `id` int(11) NOT NULL,
  `id_keranjang_belanja` varchar(60) NOT NULL,
  `id_produk` int(11) NOT NULL,
  `harga_produk` double NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `subtotal_belanja` double NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `keranjang_belanja`
--

INSERT INTO `keranjang_belanja` (`id`, `id_keranjang_belanja`, `id_produk`, `harga_produk`, `jumlah_produk`, `subtotal_belanja`, `id_jadwal`) VALUES
(67, '191', 2005090123, 15700, 1, 15700, NULL),
(70, '785', 2005090197, 1, 1, 1, NULL),
(71, '239', 2004280018, 37500, 1, 37500, NULL),
(73, '172', 2005090082, 1, 1, 1, NULL),
(74, '823', 2004280018, 37500, 1, 37500, NULL),
(76, '646', 2106210001, 20000, 1, 20000, NULL),
(77, '889', 2005090109, 1, 1, 1, NULL),
(78, '784', 2004280018, 37500, 2, 75000, NULL),
(79, '608', 2005090082, 1, 1, 1, NULL),
(80, '332', 2005090080, 1, 1, 1, NULL),
(81, '283', 2005090116, 12200, 1, 12200, NULL),
(82, '106', 2005090117, 15200, 1, 15200, NULL),
(83, '408', 2005090112, 1, 1, 1, NULL),
(84, '675', 2005090190, 1, 1, 1, NULL),
(85, '161', 2005090081, 1, 1, 1, NULL),
(86, '406', 2005090107, 1, 1, 1, NULL),
(87, '134', 2005090185, 1, 1, 1, NULL),
(88, '850', 2004280015, 25000, 1, 25000, NULL),
(89, '430', 2005090190, 1, 1, 1, NULL),
(90, '346', 2004280004, 13500, 2, 27000, NULL),
(92, '850', 2004280021, 185000, 1, 185000, NULL),
(93, '590', 2005090180, 5200, 1, 5200, NULL),
(94, '291', 2005090110, 1, 1, 1, NULL),
(95, '569', 2005090151, 6200, 1, 6200, NULL),
(96, '100', 2004280015, 25000, 1, 25000, NULL),
(97, '916', 2005090117, 15200, 1, 15200, NULL),
(100, '205', 2005090121, 24500, 1, 24500, NULL),
(101, '486', 2004280016, 16000, 1, 16000, NULL),
(102, '707', 2005090080, 1, 2, 2, NULL),
(103, '109', 2005090177, 3200, 2, 6400, NULL),
(104, '71588', 2005090169, 16700, 1, 16700, NULL),
(105, '85787', 2005090151, 6200, 1, 6200, NULL),
(106, '35852', 2005090167, 2600, 1, 2600, NULL),
(107, '77282', 2005090081, 1, 2, 2, NULL),
(108, '80196', 2005090080, 1, 1, 1, NULL),
(109, '42550', 2004280018, 37500, 1, 37500, NULL),
(110, '63086', 2005090136, 2500, 1, 2500, NULL),
(117, '63283', 2005090149, 4200, 1, 4200, NULL),
(118, '63283', 2005090108, 1, 1, 1, NULL),
(124, '26775', 2005090157, 6200, 1, 6200, NULL),
(125, '637', 2005090103, 1, 1, 1, NULL),
(126, '67042', 2004280004, 13500, 1, 13500, NULL),
(128, '86668', 2005080009, 1, 1, 1, NULL),
(131, '56462', 2005090151, 6200, 1, 6200, NULL),
(133, '19246', 2004280008, 7500, 1, 7500, NULL),
(134, '94686', 2005090191, 1, 1, 1, NULL),
(135, '21615', 2005090122, 24500, 1, 24500, NULL),
(136, '86116', 2005090031, 1, 1, 1, NULL),
(137, '28030', 2005090204, 18, 1, 18, NULL),
(138, '42736', 2005090136, 2500, 1, 2500, NULL),
(139, '57134', 2005090162, 9700, 1, 9700, NULL),
(140, '87956', 2005090164, 9700, 1, 9700, NULL),
(141, '91064', 2005090049, 1, 1, 1, NULL),
(143, '60767', 2005090135, 1800, 1, 1800, NULL),
(144, '98605', 2004280008, 7500, 1, 7500, NULL),
(147, '83367', 2005090090, 1, 1, 1, NULL),
(150, '66227', 2005090141, 10200, 1, 10200, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `klaim_detail_order`
--

CREATE TABLE `klaim_detail_order` (
  `id_detail_order` int(11) NOT NULL,
  `id_order` varchar(20) NOT NULL,
  `id_penjual` varchar(50) NOT NULL,
  `id_produk` varchar(15) NOT NULL,
  `jumlah_produk` int(11) NOT NULL,
  `berat_produk` double NOT NULL,
  `harga` double NOT NULL,
  `harga_pajak` double NOT NULL,
  `subtotal` double NOT NULL,
  `subtotal_pajak` double NOT NULL,
  `no_resi` varchar(50) NOT NULL,
  `pembayaran` double NOT NULL,
  `tagihan` double NOT NULL,
  `status_kirim` int(1) NOT NULL,
  `keterangan` text NOT NULL,
  `id_ongkir_pembeli` varchar(255) NOT NULL,
  `status_detail_komplain` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `komplain_barang`
--

CREATE TABLE `komplain_barang` (
  `id_komplain` int(11) NOT NULL,
  `id_detail_order` varchar(50) NOT NULL,
  `id_penjual` varchar(50) DEFAULT NULL,
  `pesan_komplain` text NOT NULL,
  `bukti_komplain` varchar(50) NOT NULL,
  `jumlah_produk_komplain` int(11) NOT NULL,
  `jenis_komplain` varchar(255) NOT NULL,
  `status_komplain` varchar(50) NOT NULL DEFAULT 'Belum Ditangani',
  `tgl_komplain` date NOT NULL,
  `status_dana_kembali` int(11) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `komplain_barang`
--

INSERT INTO `komplain_barang` (`id_komplain`, `id_detail_order`, `id_penjual`, `pesan_komplain`, `bukti_komplain`, `jumlah_produk_komplain`, `jenis_komplain`, `status_komplain`, `tgl_komplain`, `status_dana_kembali`) VALUES
(5, '59', NULL, 'Barang tidak sesuai', 'foto_bukti_59_png.png', 1, 'Pergantian Produk', 'Disetujui dan Dalam Proses Pengiriman', '2021-06-17', 0),
(6, '64', NULL, 'Barang tidak sesuai', 'foto_bukti_64_png.png', 1, 'Pergantian Produk', 'Disetujui dan Dalam Proses Pengiriman', '2021-06-21', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_bayar`
--

CREATE TABLE `konfirmasi_bayar` (
  `id_konfirmasi` int(11) NOT NULL,
  `tgl_konfirmasi` date NOT NULL,
  `id_order` varchar(255) NOT NULL,
  `jumlah_bayar` int(11) NOT NULL,
  `bank_bayar` varchar(20) NOT NULL,
  `rekening_bayar` varchar(30) NOT NULL,
  `nama_bayar` varchar(30) NOT NULL,
  `foto` varchar(225) CHARACTER SET utf8mb4 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_bayar`
--

INSERT INTO `konfirmasi_bayar` (`id_konfirmasi`, `tgl_konfirmasi`, `id_order`, `jumlah_bayar`, `bank_bayar`, `rekening_bayar`, `nama_bayar`, `foto`) VALUES
(17, '2021-06-15', 'T210615001', 25200, 'Bank BRI', '987877676', 'dimas', ''),
(18, '2021-06-15', 'T210616001', 14700, 'Bank BRI', '39839898492', 'dimas', ''),
(19, '2021-06-16', 'T210616002', 10001, 'Bank BRI', '7565435456789', 'jghfcgvhbj', ''),
(20, '2021-06-16', 'T210616003', 29000, 'Bank BRI', '083747436882', 'dimas', ''),
(21, '2021-06-16', 'T210616004', 12000, 'Bank BRI', '4234', 'jkdf,s', ''),
(22, '2021-06-16', 'T210616005', 26000, 'Bank BRI', '083747436882', 'hbkasda', ''),
(23, '2021-06-16', 'T210616006', 12000, 'Bank BRI', '083747436882', '33333333333', ''),
(24, '2021-06-16', 'T210616007', 25200, 'Bank BRI', '8732462839439', 'dimas', ''),
(25, '2021-06-16', 'T210616008', 30000, 'Bank BRI', '083747436882', 'dimas', ''),
(26, '2021-06-16', 'T210616009', 20000, 'Bank BRI', '083747436882', 'dimas', 'bukti_transfer_T210616009_'),
(27, '2021-06-16', 'T210616010', 15500, 'Bank BRI', '083747436882', 'dimas', 'bukti_transfer_T210616010_'),
(28, '2021-06-16', 'T210616011', 10001, 'Bank BRI', '083747436882', 'dimas', 'bukti_transfer_T210616011_jpg.jpg'),
(29, '2021-06-17', 'T210617001', 34500, 'Bank BRI', '4363235465', 'dimas', 'bukti_transfer_T210617001_png.png'),
(30, '2021-06-17', 'T210617002', 10001, 'Bank BRI', '45433462564', 'dimas', 'bukti_transfer_T210617002_png.png'),
(31, '2021-06-17', 'T210617005', 15500, 'Bank BRI', '083747436882', 'dimas', 'bukti_transfer_T210617005_png.png'),
(32, '2021-06-21', 'T210621001', 122500, 'BNI', '083747436882', 'dimas', 'bukti_transfer_T210621001_png.png'),
(33, '2021-07-08', 'T210708006', 4201, 'BRI', '326947326', ',dgshfjask', 'bukti_transfer_T210708006_png.png'),
(34, '2021-07-08', 'T210708042', 1001, 'BNI', '13248762137291', 'Dimas', 'bukti_transfer_T210708042_png.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_penerimaan`
--

CREATE TABLE `konfirmasi_penerimaan` (
  `id_penerimaan` int(11) NOT NULL,
  `id_order` int(11) NOT NULL,
  `id_penjual` varchar(50) NOT NULL,
  `tanggal_penerimaan` date NOT NULL,
  `foto_bukti` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `konfirmasi_pengembalian_produk`
--

CREATE TABLE `konfirmasi_pengembalian_produk` (
  `id_konfirmasi_pengembalian_produk` int(11) NOT NULL,
  `id_komplain_barang` int(11) NOT NULL,
  `id_detail_order` int(11) NOT NULL,
  `id_order` varchar(255) NOT NULL,
  `no_resi_pengembalian` varchar(255) DEFAULT NULL,
  `no_rek` varchar(255) NOT NULL,
  `nama_rek` varchar(255) NOT NULL,
  `jenis_bank` varchar(255) NOT NULL,
  `status_sampai` int(11) NOT NULL DEFAULT 0,
  `no_resi_ganti` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konfirmasi_pengembalian_produk`
--

INSERT INTO `konfirmasi_pengembalian_produk` (`id_konfirmasi_pengembalian_produk`, `id_komplain_barang`, `id_detail_order`, `id_order`, `no_resi_pengembalian`, `no_rek`, `nama_rek`, `jenis_bank`, `status_sampai`, `no_resi_ganti`) VALUES
(3, 5, 59, 'T210617001', NULL, '32532132', 'dimas', 'Bank Nasional BRI', 1, NULL),
(4, 6, 64, 'T210621001', NULL, '32532132', 'dimas', 'BRI', 0, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `konten`
--

CREATE TABLE `konten` (
  `id_konten` int(11) NOT NULL,
  `tentang` text NOT NULL,
  `aturan` text NOT NULL,
  `alamat` text NOT NULL,
  `no_telp` varchar(20) NOT NULL,
  `Email` varchar(20) NOT NULL,
  `panduan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `konten`
--

INSERT INTO `konten` (`id_konten`, `tentang`, `aturan`, `alamat`, `no_telp`, `Email`, `panduan`) VALUES
(1, '<article helvetica=\"\" style=\"box-sizing: border-box; color: rgb(128, 128, 128); font-family: \">\r\n	<p style=\"box-sizing: border-box; margin: 0px 0px 15px;\">\r\n		BlonjoBu merupakan salah satu&nbsp;<strong style=\"box-sizing: border-box;\"><em style=\"box-sizing: border-box;\">online marketplace</em>&nbsp;terkemuka di Indonesia</strong>. Seperti halnya situs layanan jual-beli menyediakan sarana jual-beli dari konsumen ke konsumen. Siapa pun dapat membuka toko online di BlonjoBu dan melayani pembeli dari seluruh Indonesia untuk transaksi satuan maupun banyak.</p>\r\n	<p style=\"box-sizing: border-box; margin: 0px 0px 15px;\">\r\n		&nbsp;</p>\r\n	<div>\r\n		&nbsp;</div>\r\n</article>\r\n', '<div class=\"anchor js-instafilta--section\" helvetica=\"\" id=\"general-terms\" style=\"box-sizing: border-box; margin-bottom: 25px; color: rgb(128, 128, 128); font-family: \">\n	<h6 style=\"box-sizing: border-box; margin: 0px 0px 15px; font-size: 14px; line-height: 1.45em;\">\n		&nbsp;<strong style=\"font-size: 12px;\">Informasi Umum</strong></h6>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jevera sebagai sarana penunjang bisnis berusaha menyediakan berbagai fitur dan layanan untuk menjamin keamanan dan kenyamanan para penggunanya.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak berperan sebagai Pelapak barang, melainkan sebagai perantara antara Pelapak dan Pembeli, untuk mengamankan setiap transaksi yang berlangsung di dalam&nbsp;<em>platform</em>&nbsp;Jevera&nbsp;melalui mekanisme BL Payment System. Adanya biaya ekstra (termasuk pajak dan biaya lainnya) atas segala transaksi yang terjadi di Jevera berada di luar kewenangan Jevera sebagai perantara, dan akan diurus oleh pihak-pihak yang bersangkutan (baik Pelapak atau pun Pembeli) sesuai ketentuan yang berlaku di Indonesia.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jevera hanya mengizinkan jual beli barang yang bisa dikirim melalui jasa pengiriman (jasa ekspedisi), sehingga jasa dan kerjasama dagang (<em>franchise</em>) tidak dapat diperdagangkan melalui Jevera terkecuali ada kerja sama resmi dengan pihak Jevera&nbsp;.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Barang-barang yang dapat diperdagangkan di Jevera&nbsp;merupakan barang yang tidak tercantum di daftar &ldquo;Barang Terlarang&rdquo;.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas kualitas barang, proses pengiriman, rusaknya reputasi pihak lain, dan/atau segala bentuk perselisihan yang dapat terjadi antar Pengguna.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jevera memiliki kewenangan untuk mengambil tindakan yang dianggap perlu terhadap akun yang diduga dan/atau terindikasi melakukan penyalahgunaan, memanipulasi, dan/atau melanggar Aturan Penggunaan di Jevera&nbsp;, mulai dari melakukan moderasi, menghentikan layanan &ldquo;Jual Barang&rdquo;, membatasi jumlah pembuatan akun, membatasi atau mengakhiri hak setiap Pengguna untuk menggunakan layanan, maupun menutup akun tersebut tanpa memberikan pemberitahuan atau informasi terlebih dahulu kepada pemilik akun yang bersangkutan.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jevera memiliki kewenangan untuk mengambil tindakan yang dianggap perlu terhadap akun Pengguna, mulai dari melakukan moderasi, menghentikan layanan &ldquo;Jual Barang&rdquo;, membatasi jumlah pembuatan akun, membatasi atau mengakhiri hak setiap Pengguna untuk menggunakan layanan, maupun menutup akun tersebut tanpa memberikan pemberitahuan atau informasi terlebih dahulu kepada pemilik akun yang bersangkutan.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jevera memiliki kewenangan untuk mengambil keputusan atas permasalahan yang terjadi pada setiap transaksi.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jika Pengguna gagal untuk mematuhi setiap ketentuan dalam Aturan Penggunaan di Jevera ini, maka Jevera berhak untuk mengambil tindakan yang dianggap perlu termasuk namun tidak terbatas pada melakukan moderasi, menghentikan layanan &ldquo;Jual Barang&rdquo;, menutup akun dan/atau mengambil langkah hukum selanjutnya.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; BL Payment System bersifat mengikat Pengguna Jevera dan hanya menjamin dana Pembeli tetap aman jika proses transaksi dilakukan dengan Pelapak yang terdaftar di dalam sistem Jevera. Kerugian yang diakibatkan keterlibatan pihak lain di luar Pembeli, Pelapak, dan Jevera, tidak menjadi tanggung jawab Jevera.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Jevera berhak meminta data-data pribadi Pengguna jika diperlukan.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aturan Penggunaan Jevera dapat berubah sewaktu-waktu dan/atau diperbaharui dari waktu ke waktu tanpa pemberitahuan terlebih dahulu. Dengan mengakses Jevera, Pengguna dianggap menyetujui perubahan-perubahan dalam Aturan Penggunaan Jevera.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aturan Penggunaan Jevera pada Situs Jevera berlaku mutatis mutandis untuk penggunaan Aplikasi Jevera.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Hati-hati terhadap penipuan yang mengatasnamakan Jevera. Untuk informasi dan pengaduan, silakan hubungi cs@Jevera.com.</p>\n	<p>\n		<strong>Pengguna</strong></p>\n	<p style=\"margin-left:21.0pt;\">\n		1.&nbsp;&nbsp;&nbsp;&nbsp; Pengguna wajib mengisi data pribadi secara lengkap dan jujur di halaman akun (profil).</p>\n	<p style=\"margin-left:21.0pt;\">\n		2.&nbsp;&nbsp;&nbsp;&nbsp; Pengguna dilarang mencantumkan alamat, nomor kontak, e-mail, situs, forum, dan media sosial di lapak, termasuk di foto profil, foto header lapak, nama akun (<em>username</em>), nama lapak, dan deskripsi lapak.</p>\n	<p style=\"margin-left:21.0pt;\">\n		3.&nbsp;&nbsp;&nbsp;&nbsp; Pengguna bertanggung jawab atas keamanan dari akun termasuk penggunaan e-mail dan&nbsp;<em>password</em>.</p>\n	<p style=\"margin-left:21.0pt;\">\n		4.&nbsp;&nbsp;&nbsp;&nbsp; Pengguna wajib mengisi data bank pribadi (<em>bank account</em>) untuk kepentingan bertransaksi di Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		5.&nbsp;&nbsp;&nbsp;&nbsp; Penggunaan fasilitas apapun yang disediakan oleh Jevera mengindikasikan bahwa Pengguna telah memahami dan menyetujui segala aturan yang diberlakukan oleh Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		6.&nbsp;&nbsp;&nbsp;&nbsp; Selama berada dalam platform Jevera, Pengguna dilarang keras menyampaikan setiap jenis konten apapun yang menyesatkan, memfitnah, atau mencemarkan nama baik, mengandung atau bersinggungan dengan unsur SARA, diskriminasi, dan/atau menyudutkan pihak lain.</p>\n	<p style=\"margin-left:21.0pt;\">\n		7.&nbsp;&nbsp;&nbsp;&nbsp; Pengguna tidak diperbolehkan menggunakan Jevera untuk melanggar peraturan yang ditetapkan oleh hukum di Indonesia maupun di negara lainnya.</p>\n	<p style=\"margin-left:21.0pt;\">\n		8.&nbsp;&nbsp;&nbsp;&nbsp; Pengguna bertanggung jawab atas segala risiko yang timbul di kemudian hari atas informasi yang diberikannya ke dalam Jevera, termasuk namun tidak terbatas pada hal-hal yang berkaitan dengan hak cipta, merek, desain industri, desain tata letak industri dan hak paten atas suatu produk.</p>\n	<p style=\"margin-left:21.0pt;\">\n		9.&nbsp;&nbsp;&nbsp;&nbsp; Pengguna diwajibkan menghargai hak-hak Pengguna lainnya dengan tidak memberikan informasi pribadi ke pihak lain tanpa izin pihak yang bersangkutan.</p>\n	<p style=\"margin-left:21.0pt;\">\n		10.&nbsp;&nbsp; Pengguna tidak diperkenankan mengirimkan e-mail&nbsp;<em>spam</em>&nbsp;dengan merujuk ke bagian apapun dari Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		11.&nbsp;&nbsp; Administrator Jevera berhak menyesuaikan dan/atau menghapus informasi barang, dan menonaktifkan akun Pengguna.</p>\n	<p style=\"margin-left:21.0pt;\">\n		12.&nbsp;&nbsp; Jevera memiliki hak untuk memblokir penggunaan sistem terhadap Pengguna yang melanggar peraturan perundang-undangan yang berlaku di wilayah Indonesia.</p>\n	<p style=\"margin-left:21.0pt;\">\n		13.&nbsp;&nbsp; Pengguna akan mendapatkan beragam informasi promo terbaru dan penawaran eksklusif. Namun, Pengguna dapat berhenti berlangganan (<em>unsubscribe</em>) jika tidak ingin menerima informasi tersebut.</p>\n	<p style=\"margin-left:21.0pt;\">\n		14.&nbsp;&nbsp; Pengguna dilarang menggunakan logo Jevera di foto profil (avatar).</p>\n	<p style=\"margin-left:21.0pt;\">\n		15.&nbsp;&nbsp; Pengguna dilarang menggunakan kata-kata kasar yang tidak sesuai norma, baik saat berdiskusi di fitur kirim pesan atau chat maupun kolom diskusi retur. Jika ditemukan pelanggaran, Jevera berhak memberikan sanksi seperti menonaktifkan sementara fitur pesan, dan membekukan atau menonaktifkan akun Pengguna.</p>\n	<p style=\"margin-left:21.0pt;\">\n		16.&nbsp;&nbsp; Pengguna dilarang menggunakan fitur kirim pesan atau chat sebagai iklan promosi barang dagangan di Jevera maupun di platform atau situs lain yang dapat mengganggu Pengguna lainnya. Jika ditemukan pelanggaran, Jevera berhak memberikan sanksi seperti menonaktifkan fitur pesan dan/atau akun Pengguna.</p>\n	<p style=\"margin-left:21.0pt;\">\n		17.&nbsp;&nbsp; Pengguna dilarang menggunakan fitur kirim pesan atau chat sebagai sarana penelitian, kuesioner, atau&nbsp;<em>survey</em>. Jika ditemukan pelanggaran, Jevera berhak memberikan sanksi seperti menonaktifkan fitur pesan dan/atau akun Pengguna.</p>\n	<p style=\"margin-left:21.0pt;\">\n		18.&nbsp;&nbsp; Pengguna dilarang melakukan transfer atau menjual akun Pengguna ke Pengguna lain atau ke pihak lain tanpa persetujuan dari Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		19.&nbsp;&nbsp; Pengguna dengan ini menyatakan bahwa Pengguna telah mengetahui seluruh peraturan perundang- undangan yang berlaku di wilayah Republik Indonesia dalam setiap transaksi di Jevera, dan tidak akan melakukan tindakan apapun yang mungkin melanggar peraturan perundang-undangan yang berlaku di wilayah Republik Indonesia.</p>\n	<p style=\"margin-left:21.0pt;\">\n		20.&nbsp;&nbsp; Pengguna dilarang membuat salinan, modifikasi, turunan atau distribusi konten atau mempublikasikan tampilan yang berasal dari Jevera yang dapat melanggar Hak Kekayaan Intelektual Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		21.&nbsp;&nbsp; Pengguna dilarang membuat akun Jevera dengan tujuan menghindari batasan pembelian, penyalahgunaan voucher atau konsekuensi kebijakan Aturan Penggunaan Jevera lainnya.</p>\n	<p>\n		<strong>Jual barang</strong></p>\n	<p style=\"margin-left:21.0pt;\">\n		1.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak bertanggung jawab secara penuh atas segala risiko yang timbul di kemudian hari terkait dengan informasi yang dibuatnya, termasuk, namun tidak terbatas pada hal-hal yang berkaitan dengan hak cipta, merek, desain industri, desain tata letak sirkuit, hak paten dan/atau izin lain yang telah ditetapkan atas suatu produk menurut hukum yang berlaku di Indonesia.</p>\n	<p style=\"margin-left:21.0pt;\">\n		2.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak hanya diperbolehkan menjual barang-barang yang tidak tercantum di daftar &ldquo;Barang Terlarang&rdquo;.</p>\n	<p style=\"margin-left:21.0pt;\">\n		3.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak wajib menempatkan barang dagangan sesuai dengan kategori dan subkategorinya.</p>\n	<p style=\"margin-left:21.0pt;\">\n		4.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak wajib mengisi nama atau judul barang dengan jelas, singkat dan padat.</p>\n	<p style=\"margin-left:21.0pt;\">\n		5.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak wajib menampilkan gambar barang yang sesuai dengan deskripsi barang yang dijual dan tidak mencantumkan logo ataupun alamat situs jual-beli lain pada gambar. Dianjurkan foto atau gambar memperlihatkan 3 bagian (depan, samping dan belakang) dengan resolusi minimal 300px.</p>\n	<p style=\"margin-left:21.0pt;\">\n		6.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak wajib mengisi harga yang sesuai dengan harga sebenarnya.</p>\n	<p style=\"margin-left:21.0pt;\">\n		7.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak tidak diperkenankan mencantumkan alamat (e-mail, situs, forum, dan&nbsp;<em>social network</em>), nomor kontak, ID / PIN /&nbsp;<em>username social media</em>, dan nomor rekening bank selain pada kolom yang disediakan.</p>\n	<p style=\"margin-left:21.0pt;\">\n		8.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak dilarang menjual barang yang identik sama (<em>multiple posting</em>) dengan yang sudah ada di lapaknya.</p>\n	<p style=\"margin-left:21.0pt;\">\n		9.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak dilarang melakukan duplikasi penjualan barang dengan menyalin atau menggunakan gambar dari lapak Pelapak lain.</p>\n	<p style=\"margin-left:21.0pt;\">\n		10.&nbsp;&nbsp; Pelapak tidak perkenankan memberikan informasi alamat (e-mail, situs, forum, dan&nbsp;<em>social network</em>), nomor kontak, ID / PIN /&nbsp;<em>username social media</em>&nbsp;melalui fitur pesan.</p>\n	<p style=\"margin-left:21.0pt;\">\n		11.&nbsp;&nbsp; Pelapak wajib memperbarui (<em>update</em>) ketersediaan dan status barang yang dijual.</p>\n	<p style=\"margin-left:21.0pt;\">\n		12.&nbsp;&nbsp; Catatan Pelapak diperuntukkan bagi Pelapak yang ingin memberikan catatan tambahan yang tidak terkait dengan deskripsi barang kepada calon Pembeli. Catatan Pelapak tetap tunduk terhadap Aturan Penggunaan Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		13.&nbsp;&nbsp; Pelapak wajib mengisi kolom Deskripsi Barang sesuai dengan Aturan Penggunaan di Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		14.&nbsp;&nbsp; Pelapak dilarang membuat transaksi fiktif atau palsu demi kepentingan menaikkan&nbsp;<em>feedback</em>. Jevera berhak mengambil tindakan seperti pemblokiran akun atau tindakan lainnya apabila ditemukan tindakan kecurangan.</p>\n	<p style=\"margin-left:21.0pt;\">\n		15.&nbsp;&nbsp; Pelapak wajib mengirimkan barang menggunakan jasa ekspedisi sesuai dengan yang dipilih oleh Pembeli pada saat melakukan transaksi di dalam sistem Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		16.&nbsp;&nbsp; Apabila Pelapak menggunakan jasa ekspedisi yang berbeda dengan jasa dan/atau jenis jasa ekspedisi yang dipilih oleh Pembeli pada saat melakukan transaksi di dalam sistem Jevera maka Pelapak bertanggung jawab atas segala hal selama proses pengiriman yang disebabkan oleh penggunaan jasa dan/atau jenis jasa ekspedisi yang berbeda tersebut.</p>\n	<p style=\"margin-left:21.0pt;\">\n		17.&nbsp;&nbsp; Pelapak memahami dan menyetujui bahwa kekurangan dana biaya kirim yang disebabkan oleh penggunaan jasa dan/atau jenis jasa yang berbeda dari pilihan Pembeli pada saat melakukan transaksi di dalam sistem Jevera merupakan tanggung jawab Pelapak terkecuali perbedaan tersebut atas permintaan Pembeli.</p>\n	<p style=\"margin-left:21.0pt;\">\n		18.&nbsp;&nbsp; Pembeli berhak atas kelebihan dana dari biaya kirim yang diakibatkan perbedaan penggunaan jasa dan/atau jenis jasa ekspedisi oleh Pelapak dari pilihan Pembeli pada saat melakukan transaksi di dalam sistem Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		19.&nbsp;&nbsp; Pelapak wajib memenuhi ketentuan yang sudah ditetapkan oleh pihak jasa ekspedisi berkaitan dengan&nbsp;<em>packing</em>&nbsp;barang yang aman serta menggunakan asuransi dan/atau&nbsp;<em>packing</em>&nbsp;kayu pada barang-barang tertentu sehingga apabila barang rusak atau hilang Pelapak dapat mengajukan klaim ke pihak jasa ekspedisi.</p>\n	<p>\n		<strong>Transaksi</strong></p>\n	<p style=\"margin-left:21.0pt;\">\n		1.&nbsp;&nbsp;&nbsp;&nbsp; Demi keamanan dan kenyamanan para Pengguna, setiap transaksi jual-beli di Jevera diwajibkan untuk menggunakan BL Payment System. Untuk informasi mengenai penggunaan BL Payment System dapat dipelajari di&nbsp;<a href=\"https://panduan.bukalapak.com/\">Panduan Jevera</a></p>\n	<p style=\"margin-left:21.0pt;\">\n		2.&nbsp;&nbsp;&nbsp;&nbsp; Pembeli wajib transfer sesuai dengan nominal total belanja dari transaksi dalam waktu 1x10 jam (dengan asumsi Pembeli telah mempelajari informasi barang yang telah dipesannya). Jika dalam waktu 1x10 jam barang dipesan tetapi Pembeli tidak mentransfer dana maka transaksi akan dibatalkan secara otomatis.</p>\n	<p style=\"margin-left:21.0pt;\">\n		3.&nbsp;&nbsp;&nbsp;&nbsp; Setiap transaksi di Jevera yang menggunakan metode transfer akan dikenakan biaya operasional dalam bentuk kode unik pembayaran yang ditanggung oleh Pembeli.</p>\n	<p style=\"margin-left:21.0pt;\">\n		4.&nbsp;&nbsp;&nbsp;&nbsp; Pembeli tidak dapat membatalkan transaksi setelah melunasi pembayaran.</p>\n	<p style=\"margin-left:21.0pt;\">\n		5.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak wajib mengirimkan barang dan mendaftarkan nomor resi pengiriman yang benar dan asli setelah status transaksi &ldquo;Dibayar&rdquo;. Satu nomor resi hanya berlaku untuk satu nomor transaksi di Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		6.&nbsp;&nbsp;&nbsp;&nbsp; Jika Pelapak tidak mengirimkan barang dalam batas waktu pengiriman sejak pembayaran (2x24 jam kerja untuk biaya pengiriman reguler atau 2x24 jam untuk biaya pengiriman kilat), maka Pelapak dianggap telah menolak pesanan. Sehingga, sistem secara otomatis memberikan&nbsp;<em>feedback</em>&nbsp;negatif dan reputasi tolak pesanan, serta mengembalikan seluruh dana (<em>refund</em>) ke Pembeli.</p>\n	<p style=\"margin-left:21.0pt;\">\n		7.&nbsp;&nbsp;&nbsp;&nbsp; Pengembalian dana transaksi dilakukan dengan menambahkan saldo BukaDompet ke Pembeli. Untuk pembayaran dengan menggunakan kartu kredit, dana transaksi akan dikembalikan langsung ke kartu kredit. Pengembalian dana dilakukan dengan memberikan pengurangan biaya pada kartu kredit Pembeli dalam waktu&nbsp;<strong>maksimal 14 hari kerja</strong>&nbsp;setelah pembayaran.</p>\n	<p style=\"margin-left:21.0pt;\">\n		8.&nbsp;&nbsp;&nbsp;&nbsp; Fitur Item Replacement Jevera akan otomatis mencarikan barang yang sama jika transaksi ditolak oleh Pelapak. Jika barang yang sama tidak ditemukan, maka dana akan dikembalikan ke BukaDompet pembeli.</p>\n	<p style=\"margin-left:21.0pt;\">\n		9.&nbsp;&nbsp;&nbsp;&nbsp; Jevera akan mengirimkan email konfirmasi pencarian barang pengganti melalui fitur Item Replacement jika transaksi diabaikan oleh Pelapak. Apabila Pembeli tidak melakukan konfirmasi dalam waktu 1x6 jam, maka fitur Item Replacement Jevera akan otomatis mencarikan barang pengganti.</p>\n	<p style=\"margin-left:21.0pt;\">\n		10.&nbsp;&nbsp; Jika Pembeli melakukan konfirmasi bahwa tidak berkenan untuk dicarikan barang pengganti melalui email yang dikirim Jevera, maka fitur Item Replacement Jevera akan otomatis mengembalikan dana ke BukaDompet.</p>\n	<p style=\"margin-left:21.0pt;\">\n		11.&nbsp;&nbsp; Untuk Pembeli yang memiliki akun di Jevera, apabila terdapat selisih harga barang pengganti, maka dana selisih akan ditanggung oleh Jevera jika harga barang pengganti lebih mahal dan selisih harga akan dikembalikan ke BukaDompet jika harga barang pengganti lebih murah setelah transaksi selesai.</p>\n	<p style=\"margin-left:21.0pt;\">\n		12.&nbsp;&nbsp; Untuk Pembeli yang tidak memiliki akun di Jevera, apabila terdapat selisih harga barang pengganti, maka dana selisih akan ditanggung oleh Jevera jika harga barang pengganti lebih mahal dan jika harga barang pengganti lebih murah maka selisih harga akan hangus.</p>\n	<p style=\"margin-left:21.0pt;\">\n		13.&nbsp;&nbsp; Transaksi yang menggunakan metode pembayaran kartu kredit dan Kredivo tidak akan diproses oleh fitur Item Replacement apabila transaksi ditolak atau diabaikan oleh Pelapak.</p>\n	<p style=\"margin-left:21.0pt;\">\n		14.&nbsp;&nbsp; Sistem Jevera secara otomatis mengecek status pengiriman barang melalui nomor resi yang diberikan Pelapak. Seluruh dana akan dikembalikan ke Pembeli apabila nomor resi terdeteksi tidak valid dan Pelapak tidak melakukan ubah resi valid dalam 1x24 jam. Jika Pelapak memasukkan nomor resi tidak valid lebih dari satu kali maka Jevera akan mengembalikan seluruh dana transaksi kepada Pembeli dan Pelapak mendapatkan&nbsp;<em>feedback</em>&nbsp;negatif.</p>\n	<p style=\"margin-left:21.0pt;\">\n		15.&nbsp;&nbsp; Jika Pembeli tidak memberikan konfirmasi penerimaan barang dalam waktu 2x24 jam sejak barang diterima yang dinyatakan di sistem&nbsp;<em>tracking</em>&nbsp;jasa pengiriman, Jevera akan mentransfer dana langsung ke BukaDompet Pelapak tanpa memberikan konfirmasi ke Pembeli.</p>\n	<p style=\"margin-left:21.0pt;\">\n		16.&nbsp;&nbsp; Sistem secara otomatis memberikan&nbsp;<em>feedback</em>&nbsp;(rekomendasi) positif dan mentransfer dana pembayaran ke BukaDompet Pelapak jika status resi menunjukkan &lsquo;Barang diterima&rsquo; dan Pembeli telah melewati batas waktu untuk konfirmasi.</p>\n	<p style=\"margin-left:21.0pt;\">\n		17.&nbsp;&nbsp; Pembeli dapat memperbarui&nbsp;<em>feedback</em>&nbsp;maksimal 3x24 jam setelah transaksi dinyatakan selesai oleh sistem Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		18.&nbsp;&nbsp; Retur (pengembalian barang) hanya diperbolehkan jika kesalahan dilakukan oleh Pelapak dan barang tidak sesuai deskripsi.</p>\n	<p style=\"margin-left:21.0pt;\">\n		19.&nbsp;&nbsp; Retur tidak dapat dilakukan setelah transaksi selesai menurut sistem general tracking Jevera atau Pembeli telah melakukan konfirmasi barang diterima dan tidak memilih retur.</p>\n	<p style=\"margin-left:21.0pt;\">\n		20.&nbsp;&nbsp; Langkah-langkah melakukan retur bisa dibaca pada&nbsp;<a href=\"http://www.bukalapak.com/faqs/24\">halaman ini</a></p>\n	<p style=\"margin-left:21.0pt;\">\n		21.&nbsp;&nbsp; Jevera akan menahan dana hingga ada kesepakatan (antara Pembeli dan Pelapak) apakah akan dilakukan pengembalian barang ke Pelapak atau tidak.</p>\n	<p style=\"margin-left:21.0pt;\">\n		22.&nbsp;&nbsp; Jevera akan mengembalikan dana transaksi ke Pembeli jika dalam waktu 5x24 jam Pelapak tidak merespon pesan permintaan retur dari Pembeli di halaman detail transaksi. Selanjutnya, Pembeli wajib mengirimkan barang tersebut ke kantor Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		23.&nbsp;&nbsp; Jevera tidak bertanggung jawab terhadap barang retur di kantor Jevera apabila Pelapak tidak melakukan pengaduan kepemilikan barang dalam waktu 30 hari sejak barang diterima di kantor Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		24.&nbsp;&nbsp; Pembeli wajib mengirimkan barang ke Pelapak dan menginformasikan nomor resi ke Jevera jika ada kesepakatan retur dengan Pelapak.</p>\n	<p style=\"margin-left:21.0pt;\">\n		25.&nbsp;&nbsp; Jevera hanya memantau retur sampai barang diterima kembali oleh Pelapak.</p>\n	<p style=\"margin-left:21.0pt;\">\n		26.&nbsp;&nbsp; Jevera berhak melakukan&nbsp;<em>refund</em>&nbsp;dana ke Pembeli jika barang retur telah sampai di kantor Jevera dan berdasarkan pengecekan sesuai dengan yang dikeluhkan Pembeli.</p>\n	<p style=\"margin-left:21.0pt;\">\n		27.&nbsp;&nbsp; Jevera atas kebijakannya sendiri dapat melakukan penahanan atau pembekuan BukaDompet untuk melakukan perlindungan terhadap segala risiko dan kerugian yang timbul, jika Jevera menyimpulkan bahwa tindakan Pengguna, baik Pelapak maupun Pembeli terindikasi melakukan kecurangan-kecurangan atau penyalahgunaan dalam bertransaksi dan/atau pelanggaran terhadap Aturan Penggunaan Jevera dan jika akun Pengguna diduga atau terindikasi telah diakses oleh pihak lain.</p>\n	<p>\n		<strong>Penggunaan Voucher</strong></p>\n	<p style=\"margin-left:21.0pt;\">\n		1.&nbsp;&nbsp;&nbsp;&nbsp; Voucher hanya berlaku untuk transaksi dengan pengiriman yang menggunakan jasa ekspedisi yang tersedia di Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		2.&nbsp;&nbsp;&nbsp;&nbsp; Jevera berhak melakukan tindakan-tindakan yang diperlukan tanpa pemberitahuan sebelumnya. Tindakan tersebut seperti pembatalan transaksi, pembatalan voucher, pemblokiran akun Pengguna, atau tindakan lainnya apabila ditemukan kecurangan dari Pengguna.</p>\n	<p style=\"margin-left:21.0pt;\">\n		3.&nbsp;&nbsp;&nbsp;&nbsp; Jevera berhak melakukan pembatalan transaksi atau membatalkan penggunaan voucher sewaktu-waktu tanpa pemberitahuan terlebih dahulu kepada Pengguna.</p>\n	<p style=\"margin-left:21.0pt;\">\n		4.&nbsp;&nbsp;&nbsp;&nbsp; Jevera berhak mengubah syarat dan ketentuan sewaktu-waktu tanpa pemberitahuan terlebih dahulu kepada Pengguna.</p>\n	<p>\n		<strong>Barang Terlarang</strong></p>\n	<p>\n		Jevera telah dan akan terus melakukan hal-hal sebagaimana dipersyaratkan oleh peraturan perundang-undangan untuk mencegah terjadinya perdagangan barang-barang yang melanggar ketentuan hukum yang berlaku dan/atau hak pribadi pihak ketiga. Berkenaan dengan hal tersebut, berikut adalah barang-barang yang dilarang untuk diperjualbelikan melalui Jevera:</p>\n	<p style=\"margin-left:21.0pt;\">\n		1.&nbsp;&nbsp;&nbsp;&nbsp; Segala bentuk tulisan yang dapat berpengaruh negatif terhadap Jevera</p>\n	<p style=\"margin-left:21.0pt;\">\n		2.&nbsp;&nbsp;&nbsp;&nbsp; Narkotika, obat-obat tidak terdaftar di Dinkes dan/atau BPOM</p>\n	<p style=\"margin-left:21.0pt;\">\n		3.&nbsp;&nbsp;&nbsp;&nbsp; Senjata api, kelengkapan senjata api, replika senjata api, airsoft gun, air gun, dan peluru atau sejenis peluru, senjata tajam, serta jenis senjata lainnya</p>\n	<p style=\"margin-left:21.0pt;\">\n		4.&nbsp;&nbsp;&nbsp;&nbsp; Dokumen pemerintahan dan perjalanan</p>\n	<p style=\"margin-left:21.0pt;\">\n		5.&nbsp;&nbsp;&nbsp;&nbsp; Bagian/organ manusia</p>\n	<p style=\"margin-left:21.0pt;\">\n		6.&nbsp;&nbsp;&nbsp;&nbsp; Mailing list dan informasi pribadi</p>\n	<p style=\"margin-left:21.0pt;\">\n		7.&nbsp;&nbsp;&nbsp;&nbsp; Barang-barang yang melecehkan pihak/ras tertentu atau dapat menyinggung perasaan orang lain</p>\n	<p style=\"margin-left:21.0pt;\">\n		8.&nbsp;&nbsp;&nbsp;&nbsp; Barang yang berhubungan dengan kepolisian</p>\n	<p style=\"margin-left:21.0pt;\">\n		9.&nbsp;&nbsp;&nbsp;&nbsp; Barang yang belum tersedia (<em>pre order</em>) terkecuali sanggup kirim barang dalam waktu 2x24 jam kerja sejak transaksi terbayar</p>\n	<p style=\"margin-left:21.0pt;\">\n		10.&nbsp;&nbsp; Barang curian</p>\n	<p style=\"margin-left:21.0pt;\">\n		11.&nbsp;&nbsp; Barang mistis</p>\n	<p style=\"margin-left:21.0pt;\">\n		12.&nbsp;&nbsp; Pembuka kunci dan segala aksesori penunjang tindakan perampokan/pencurian</p>\n	<p style=\"margin-left:21.0pt;\">\n		13.&nbsp;&nbsp; Barang yang dapat dan atau mudah meledak, menyala atau terbakar sendiri</p>\n	<p style=\"margin-left:21.0pt;\">\n		14.&nbsp;&nbsp; Pornografi,&nbsp;<em>sex toys</em>, alat untuk memperbesar organ vital pria, maupun barang asusila lainnya</p>\n	<p style=\"margin-left:21.0pt;\">\n		15.&nbsp;&nbsp; Barang cetakan/rekaman yang isinya dapat mengganggu keamanan &amp; ketertiban serta stabilitas nasional</p>\n	<p style=\"margin-left:21.0pt;\">\n		16.&nbsp;&nbsp; <em>E-Book</em>, CD, DVD, dan&nbsp;<em>Software</em>&nbsp;bajakan</p>\n	<p style=\"margin-left:21.0pt;\">\n		17.&nbsp;&nbsp; Segala jenis binatang atau hewan peliharaan</p>\n	<p style=\"margin-left:21.0pt;\">\n		18.&nbsp;&nbsp; Jasa, donasi, sewa menyewa, promo&nbsp;<em>event</em>&nbsp;dan sejenisnya terkecuali ada kerja sama resmi dengan pihak Jevera</p>\n	<p style=\"margin-left:21.0pt;\">\n		19.&nbsp;&nbsp; Merek dagang</p>\n	<p style=\"margin-left:21.0pt;\">\n		20.&nbsp;&nbsp; Otomotif (Mobil dan Motor) terkecuali ada kerja sama resmi dengan pihak Jevera</p>\n	<p style=\"margin-left:21.0pt;\">\n		21.&nbsp;&nbsp; Velg Mobil</p>\n	<p style=\"margin-left:21.0pt;\">\n		22.&nbsp;&nbsp; Properti (Rumah, Tanah, dan lain-lain)</p>\n	<p style=\"margin-left:21.0pt;\">\n		23.&nbsp;&nbsp; Pulsa elektrik maupun pulsa fisik/voucher, voucher kuota internet, voucher game, voucher aplikasi, steam wallet, dan lainnya; terkecuali ada kerja sama resmi dengan pihak Jevera</p>\n	<p style=\"margin-left:21.0pt;\">\n		24.&nbsp;&nbsp; Produk yang bukan produk asli dengan merek, atau berkaitan dengan merek terdaftar.</p>\n	<p style=\"margin-left:21.0pt;\">\n		25.&nbsp;&nbsp; Gadget (ponsel, tablet, phablet,&nbsp;<em>smartwatch</em>, dan sejenisnya) replika atau berasal dari pasar gelap (<em>black market</em>)</p>\n	<p style=\"margin-left:21.0pt;\">\n		26.&nbsp;&nbsp; Barang-barang lain yang dilarang untuk diperjualbelikan secara bebas berdasarkan hukum yang berlaku di Indonesia</p>\n	<p>\n		<strong>Sanksi</strong></p>\n	<p>\n		Segala tindakan yang melanggar peraturan di Jevera akan dikenakan sanksi berupa termasuk namun tidak terbatas pada:</p>\n	<p style=\"margin-left:21.0pt;\">\n		1.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak mendapatkan 1&nbsp;<em>feedback</em>&nbsp;negatif apabila tidak mengirimkan barang dalam batas waktu pengiriman sejak pembayaran (2x24 jam kerja untuk biaya pengiriman reguler atau 2x24 jam untuk biaya pengiriman kilat).</p>\n	<p style=\"margin-left:21.0pt;\">\n		2.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak mendapatkan 1&nbsp;<em>feedback</em>&nbsp;negatif jika sudah 5 kali menolak pesanan.</p>\n	<p style=\"margin-left:21.0pt;\">\n		3.&nbsp;&nbsp;&nbsp;&nbsp; Pelapak mendapatkan 3&nbsp;<em>feedback</em>&nbsp;negatif jika sudah memroses pesanan namun tidak kirim barang dalam batas waktu pengiriman sejak pembayaran (2x24 jam kerja untuk pengiriman reguler atau 2x24 jam untuk pengiriman kilat).</p>\n	<p style=\"margin-left:21.0pt;\">\n		4.&nbsp;&nbsp;&nbsp;&nbsp; Akun dibekukan.</p>\n	<p style=\"margin-left:21.0pt;\">\n		5.&nbsp;&nbsp;&nbsp;&nbsp; Akun dinonaktifkan. Dan jika ada Paket Push di akun maka Paket Push hangus.</p>\n	<p style=\"margin-left:21.0pt;\">\n		6.&nbsp;&nbsp;&nbsp;&nbsp; Pelaporan ke pihak terkait (Kepolisian, dll).</p>\n	<p>\n		<strong>Pembatasan Tanggung Jawab</strong></p>\n	<p style=\"margin-left:21.0pt;\">\n		1.&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala risiko dan kerugian yang timbul dari dan dalam kaitannya dengan informasi yang dituliskan oleh pengguna Jevera.</p>\n	<p style=\"margin-left:21.0pt;\">\n		2.&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala pelanggaran hak cipta, merek, desain industri, desain tata letak sirkuit, hak paten atau hak-hak pribadi lain yang melekat atas suatu barang, berkenaan dengan segala informasi yang dibuat oleh Pelapak. Untuk melaporkan pelanggaran hak cipta, merek, desain industri, desain tata letak sirkuit, hak paten atau hak-hak pribadi lain,&nbsp;<a href=\"https://www.bukalapak.com/supports/contact_us\">klik di sini</a></p>\n	<p style=\"margin-left:21.0pt;\">\n		3.&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala risiko dan kerugian yang timbul berkenaan dengan penggunaan barang yang dibeli melalui Jevera, dalam hal terjadi pelanggaran peraturan perundang-undangan.</p>\n	<p style=\"margin-left:21.0pt;\">\n		4.&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala risiko dan kerugian yang timbul berkenaan dengan diaksesnya akun Pengguna oleh pihak lain.</p>\n	<p style=\"margin-left:21.0pt;\">\n		5.&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala risiko dan kerugian yang timbul akibat transaksi di luar BL Payment System.</p>\n	<p style=\"margin-left:21.0pt;\">\n		6.&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala risiko dan kerugian yang timbul akibat kesalahan atau perbedaan nominal yang seharusnya ditransfer ke rekening atas nama PT.Jevera.com.</p>\n	<p style=\"margin-left:21.0pt;\">\n		7.&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala risiko dan kerugian yang timbul apabila transaksi telah selesai secara sistem (dana telah masuk ke BukaDompet Pelapak ataupun Pembeli).</p>\n	<p style=\"margin-left:21.0pt;\">\n		8.&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala risiko dan kerugian yang timbul akibat kehilangan barang ketika proses transaksi berjalan dan/atau selesai.</p>\n	<p style=\"margin-left:21.0pt;\">\n		9.&nbsp;&nbsp;&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala risiko dan kerugian yang timbul akibat kesalahan Pengguna ataupun pihak lain dalam transfer dana ke rekening PT.Jevera.com.</p>\n	<p style=\"margin-left:21.0pt;\">\n		10.&nbsp;&nbsp; Jevera tidak bertanggung jawab atas segala risiko dan kerugian yang timbul apabila akun dalam keadaan dibekukan dan/atau dinonaktifkan.</p>\n	<p style=\"margin-left:21.0pt;\">\n		11.&nbsp;&nbsp; Dalam keadaan apapun, Pengguna akan membayar kerugian Jevera dan/atau menghindarkan Jevera (termasuk petugas, direktur, karyawan, agen, dan lainnya) dari setiap biaya kerugian apapun, kehilangan, pengeluaran atau kerusakan yang berasal dari tuntutan atau klaim Pihak ke-tiga yang timbul dari pelanggaran Pengguna terhadap Aturan Penggunaan Jevera, dan/atau pelanggaran terhadap hak dari pihak ke-tiga.</p>\n	<p>\n		<strong>Hukum yang Berlaku dan Penyelesaian Sengketa</strong></p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Aturan Penggunaan ini dilaksanakan dan tunduk pada Peraturan Perundang- udangan Republik Indonesia.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Apabila terjadi perselisihan, sebelum beralih ke alternatif lain, Pengguna wajib terlebih dahulu menghubungi Jevera secara langsung agar dapat melakukan perundingan atau musyawarah untuk mencapai resolusi bagi kedua belah pihak.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Sebelum menghubungi Jevera secara langsung untuk melakukan perundingan penyelesaian masalah atau sengketa, Pengguna setuju untuk tidak mengumumkan, membuat tulisan-tulisan di media online maupun cetak terkait permasalahan aquo yang dapat menyudutkan Jevera (termasuk petugas, direktur, karyawan dan agen).</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Apabila dalam waktu 1 (satu) bulan setelah dimulainya perundingan atau musyawarah tidak mencapai resolusi, maka PARA PIHAK akan menyelesaikan perselisihan tersebut melalui Pengadilan Negeri Jakarta Selatan.</p>\n	<p>\n		&middot;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Selama perselisihan dalam proses penyelesaian, Pengguna wajib untuk tetap melaksanakan kewajiban-kewajiban lainnya menurut Aturan Penggunaan Jevera.</p>\n	<p>\n		&nbsp;</p>\n</div>\n<p>\n	&nbsp;</p>\n', 'Jln Blimbing no 34 Malang Jawa Timur', '08994278282', 'mail@jevera.com', '<p>\r\n	1. Pilih produk yang akan dibeli</p>\r\n<p>\r\n	2. Setelah memilih produk yang dibeli lakukan checkout dengan menekan keranjang belanja yang ada di kanan atas</p>\r\n<p>\r\n	3. Lakukan pembayaran</p>\r\n<p>\r\n	3. Kemudian isi form konfirmasi pembayaran</p>\r\n<p>\r\n	&nbsp;</p>\r\n');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kota`
--

CREATE TABLE `kota` (
  `id_kota` int(11) NOT NULL,
  `nama_kota` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kota`
--

INSERT INTO `kota` (`id_kota`, `nama_kota`) VALUES
(5, 'Kabupaten Malang'),
(10, 'Kota Malang'),
(8, 'Kota Nganjuk'),
(2, 'Madiun'),
(9, 'Magelang'),
(1, 'Magetan');

-- --------------------------------------------------------

--
-- Struktur dari tabel `logo`
--

CREATE TABLE `logo` (
  `id_logo` int(11) NOT NULL,
  `logo` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `logo`
--

INSERT INTO `logo` (`id_logo`, `logo`) VALUES
(1, 'logo_1623077498.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_aktivitas`
--

CREATE TABLE `log_aktivitas` (
  `id_log` int(11) NOT NULL,
  `id_user` varchar(255) NOT NULL,
  `aktivitas` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `log_aktivitas`
--

INSERT INTO `log_aktivitas` (`id_log`, `id_user`, `aktivitas`) VALUES
(30, '0', 'Mengkonfirmasi pembayaran order dengan ID order T210617001'),
(31, '0', 'Mengkonfirmasi pembayaran order dengan ID order T210616001'),
(32, '0', 'Mengkonfirmasi pembayaran order dengan ID order T210616005'),
(33, '0', 'Mengkonfirmasi pembayaran order dengan ID order T210617005'),
(34, '0', 'Mengkonfirmasi pembayaran order dengan ID order T210616009'),
(35, '0', 'Mengkonfirmasi pembayaran order dengan ID order T210621001'),
(36, '0', 'Mengkonfirmasi pembayaran order dengan ID order T210708006'),
(37, '0', 'Mengkonfirmasi pembayaran order dengan ID order T210615001'),
(38, '0', 'Mengkonfirmasi pembayaran order dengan ID order T210708042');

-- --------------------------------------------------------

--
-- Struktur dari tabel `mainmenu`
--

CREATE TABLE `mainmenu` (
  `seq` int(11) NOT NULL,
  `idmenu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `active_menu` varchar(50) NOT NULL,
  `icon_class` varchar(50) NOT NULL,
  `link_menu` varchar(50) NOT NULL,
  `menu_akses` varchar(12) NOT NULL,
  `entry_date` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entry_user` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `mainmenu`
--

INSERT INTO `mainmenu` (`seq`, `idmenu`, `nama_menu`, `active_menu`, `icon_class`, `link_menu`, `menu_akses`, `entry_date`, `entry_user`) VALUES
(1, 1, 'Dashboard', '', 'menu-icon fa fa-tachometer', 'Home', '', '2017-10-17 05:28:54', NULL),
(2, 2, 'Produk', '', 'menu-icon fa fa-newspaper-o', 'Produk', '', '2018-09-24 03:17:43', NULL),
(19, 3, 'Order', '', 'menu-icon fa fa-newspaper-o', 'Order', '', '2018-09-24 06:03:55', NULL),
(20, 4, 'About', '', 'menu-icon fa fa-newspaper-o', 'About', '', '2018-09-24 08:26:04', NULL),
(21, 5, 'Kontak', '', 'menu-icon fa fa-newspaper-o', 'Kontak', '', '2018-09-24 08:37:07', NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `menu`
--

CREATE TABLE `menu` (
  `id_menu` int(11) NOT NULL,
  `nama_menu` varchar(50) NOT NULL,
  `foto_menu` varchar(100) NOT NULL,
  `title_menu` varchar(50) NOT NULL,
  `meta_description_menu` varchar(100) NOT NULL,
  `meta_keywords_menu` varchar(100) NOT NULL,
  `aktif_menu` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `menu`
--

INSERT INTO `menu` (`id_menu`, `nama_menu`, `foto_menu`, `title_menu`, `meta_description_menu`, `meta_keywords_menu`, `aktif_menu`) VALUES
(1, 'Umroh', 'Jual_Beli_Property_foto.jpg', 'Umroh', 'Umroh', 'Umroh', 1),
(2, 'Menu Baru', 'Menu_Baru_foto.jpg', 'Baru', 'Baru', 'Baru', 0),
(4, 'Foods', 'Makanan_foto.jpg', 'Foods', 'Foods', 'Foods', 0),
(5, 'Seasoning', 'Seasoning.jpg', 'Seasoning', 'Seasoning', 'Seasoning', 0),
(6, 'Electronics', 'Electronics_foto.jpg', 'Electronics', 'Electronics', 'Electronics', 0),
(7, 'Menu 1002', 'Menu_100_foto.jpg', '001 uneM2', 'Menu 1002', '001 uneM2', 0),
(8, 'Menu 10', 'Menu_10_foto.jpg', '01 uneM', 'Menu 10', '01 uneM', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `ongkir_pembeli`
--

CREATE TABLE `ongkir_pembeli` (
  `id_ongkir` int(11) NOT NULL,
  `ongkir` varchar(50) NOT NULL,
  `id_order` varchar(50) NOT NULL,
  `id_penjual` varchar(50) NOT NULL,
  `tagihan_admin` int(11) NOT NULL DEFAULT 0,
  `pembayaran` int(11) NOT NULL DEFAULT 0,
  `jasa_pengiriman` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `ongkir_pembeli`
--

INSERT INTO `ongkir_pembeli` (`id_ongkir`, `ongkir`, `id_order`, `id_penjual`, `tagihan_admin`, `pembayaran`, `jasa_pengiriman`) VALUES
(89, '0', 'T210615001', 'Admin', 0, 0, '0'),
(90, '0', 'T210616001', 'Admin', 0, 0, '0'),
(91, '0', 'T210616002', 'Admin', 0, 0, '0'),
(92, '0', 'T210616003', 'Admin', 0, 0, '0'),
(93, '0', 'T210616004', 'Admin', 0, 0, '0'),
(94, '0', 'T210616005', 'Admin', 0, 0, '0'),
(95, '0', 'T210616006', 'Admin', 0, 0, '0'),
(96, '0', 'T210616007', 'Admin', 0, 0, '0'),
(97, '0', 'T210616008', 'Admin', 0, 0, '0'),
(98, '0', 'T210616009', 'Admin', 0, 0, '0'),
(99, '0', 'T210616010', 'Admin', 0, 0, '0'),
(100, '0', 'T210616011', 'Admin', 0, 0, '0'),
(101, '0', 'T210616012', 'Admin', 0, 0, '0'),
(102, '0', 'T210616013', 'Admin', 0, 0, '0'),
(103, '0', 'T210617001', 'Admin', 0, 0, '0'),
(104, '0', 'T210617002', 'Admin', 0, 0, '0'),
(105, '0', 'T210617003', 'Admin', 0, 0, '0'),
(106, '0', 'T210617004', 'Admin', 0, 0, '0'),
(107, '0', 'T210617005', 'Admin', 0, 0, '0'),
(108, '0', 'T210621001', 'Admin', 0, 0, '0');

-- --------------------------------------------------------

--
-- Struktur dari tabel `order`
--

CREATE TABLE `order` (
  `id_order` varchar(11) NOT NULL,
  `tgl_order` datetime NOT NULL,
  `total_order` int(11) NOT NULL,
  `jumlah_order` int(11) NOT NULL,
  `id_jadwal` int(11) DEFAULT NULL,
  `status_order` varchar(30) NOT NULL DEFAULT '1' COMMENT 'transaksi belum bayar,menunggu konfirmasi, sudah bayar',
  `nama_order` varchar(30) NOT NULL,
  `alamat_order` text NOT NULL,
  `tlp_order` varchar(20) NOT NULL,
  `kota_order` varchar(50) NOT NULL,
  `kelurahan` varchar(50) NOT NULL,
  `kecamatan` varchar(50) NOT NULL,
  `jam_kirim` varchar(50) NOT NULL,
  `ongkir` varchar(50) DEFAULT NULL,
  `status_bayar` int(11) DEFAULT 0,
  `kurir` varchar(50) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `order`
--

INSERT INTO `order` (`id_order`, `tgl_order`, `total_order`, `jumlah_order`, `id_jadwal`, `status_order`, `nama_order`, `alamat_order`, `tlp_order`, `kota_order`, `kelurahan`, `kecamatan`, `jam_kirim`, `ongkir`, `status_bayar`, `kurir`) VALUES
('T210615001', '2021-06-15 23:48:18', 25200, 1, NULL, '4', 'Dimas Afrilliyan Purnama', 'Malang', '089518824746', 'Malang', '12', '2', '00:00:13', '0', 0, '1'),
('T210616001', '2021-06-16 00:06:12', 14700, 1, NULL, '4', 'Dimas Afrilliyan Purnama', 'malang', '379874832493', 'Malang', '20', '2', '00:00:11', '0', 0, '1'),
('T210616002', '2021-06-16 00:15:45', 10001, 1, NULL, '2', 'Dimas Afrilliyan Purnama', 'hgfhjhk', '86976845346', 'Malang', '12', '2', '00:00:19', '0', 0, '1'),
('T210616003', '2021-06-16 00:18:55', 29000, 1, NULL, '2', 'Dimas Afrilliyan Purnama', 'dfl;sfgsjdfs', '3742934824', 'Malang', '16', '2', '00:00:09', '0', 0, '1'),
('T210616004', '2021-06-16 00:23:35', 10001, 1, NULL, '2', 'dimas', '26defrsdfs', '342', 'Malang', '27', '3', '00:00:07', '0', 0, '1'),
('T210616005', '2021-06-16 00:26:58', 26000, 1, NULL, '4', 'Dimas Afrilliyan Purnama', 'hjdfabda', '37425', 'Malang', '15', '2', '00:00:07', '0', 0, '1'),
('T210616006', '2021-06-16 00:32:42', 10001, 1, NULL, '2', 'Dimas Afrilliyan Purnama', 'gasda', '34234', 'Malang', '21', '2', '00:00:07', '0', 0, '1'),
('T210616007', '2021-06-16 00:42:14', 25200, 1, NULL, '2', 'dimas', 'dsissssssssss', '18731', 'Malang', '35', '4', '00:00:13', '0', 0, '1'),
('T210616008', '2021-06-16 00:46:49', 30000, 1, NULL, '2', 'Dimas Afrilliyan Purnama', 'kdsfjdhfjds', '32780372472', 'Malang', '12', '2', '00:00:13', '0', 0, '1'),
('T210616009', '2021-06-16 09:36:31', 20000, 1, NULL, '4', 'Dimas', 'gads', '32424', 'Malang', '8', '1', '00:00:07', '0', 0, '1'),
('T210616010', '2021-06-16 09:42:48', 15200, 1, NULL, '2', 'Dimas Afrilliyan Purnama', 'adahfs', '4624234', 'Malang', '17', '2', '00:00:07', '0', 0, '1'),
('T210616011', '2021-06-16 09:49:49', 10001, 1, NULL, '2', 'Dimas Afrilliyan Purnama', 'sjgdsahvfs', '93842647612', 'Malang', '12', '2', '00:00:09', '0', 0, '1'),
('T210616012', '2021-06-16 13:30:38', 47500, 1, NULL, '1', 'dimmmmmmmmmmm', 'dfdfd', '32535325', 'Malang', '23', '3', '00:00:11', '0', 0, '1'),
('T210616013', '2021-06-16 16:57:14', 66300, 1, NULL, '1', 'vsdsmfbdsjf32432', 'gfgrggtrg\r\n', '4344', 'Malang', '9', '1', '00:00:19', '0', 0, '1'),
('T210617001', '2021-06-17 09:19:19', 34500, 1, NULL, '5', 'Dimas Afrilliyan Purnama', 'sdsfadsdsadas', '902748217421732', 'Malang', '35', '4', '00:00:13', '0', 1, '0'),
('T210617002', '2021-06-17 09:35:04', 10001, 1, NULL, '2', 'Dimas Afrilliyan Purnama', 'dfhdgfhsadas', '82374892342', 'Malang', '12', '2', '00:00:11', '0', 0, '2'),
('T210617003', '2021-06-17 10:06:25', 24700, 1, NULL, '1', 'Dimas Afrilliyan Purnama', 'hdgfhfjg', '78574', 'Malang', '12', '2', '00:00:15', '0', 0, '1'),
('T210617004', '2021-06-17 10:22:34', 28700, 1, NULL, '1', 'ddd', 'fhsdcfvbhgcv', '75667', 'Malang', '44', '4', '00:00:17', '0', 0, '1'),
('T210617005', '2021-06-17 21:58:40', 15200, 1, NULL, '4', 'Dimas Afrilliyan Purnama', 'gvg', '555', 'Malang', '8', '1', '00:00:09', '0', 0, '1'),
('T210617006', '2021-06-17 22:41:56', 10001, 1, NULL, '1', 's', 's', '2', 'Malang', '12', '2', '00:00:15', '0', 0, '1'),
('T210621001', '2021-06-21 10:05:35', 122500, 3, NULL, '5', 'Dimas Afrilliyan Purnama', 'Ds. Bayemwetan RT 7 RW 2 Kec. Kartoharjo Kab .Magetan', '0972751468245', 'Malang', '9', '1', '00:00:13', '0', 1, '1'),
('T210703001', '2021-07-03 18:57:08', 66300, 1, NULL, '1', 'Dimas', 'Ds. Bayemwetan RT 7 RW 2 Kec. Kartoharjo Kab .Magetan', '1111111111', '2', '4', '4', '', '0', 0, '1'),
('T210703002', '2021-07-03 19:00:40', 56300, 1, NULL, '1', 'Dimas', 'Ds. Bayemwetan RT 7 RW 2 Kec. Kartoharjo Kab .Magetan', '1111111111', '2', '4', '4', '', '0', 0, ''),
('T210703003', '2021-07-03 19:01:09', 56300, 1, NULL, '1', 'Dimas', 'Ds. Bayemwetan RT 7 RW 2 Kec. Kartoharjo Kab .Magetan', '2222222222', '2', '3', '3', '', '0', 0, ''),
('T210703004', '2021-07-03 19:04:18', 56300, 1, NULL, '1', 'Dimas', 'Ds. Bayemwetan RT 7 RW 2 Kec. Kartoharjo Kab .Magetan', '2222222222', '2', '3', '3', '', '0', 0, ''),
('T210705001', '2021-07-05 09:15:03', 7000, 1, NULL, '1', 'Dimas', 'Ds. Bayemwetan RT 7 RW 2 Kec. Kartoharjo Kab .Magetan', '733342846', '1', '2', '2', '', '0', 0, ''),
('T210705002', '2021-07-05 09:28:19', 17000, 1, NULL, '1', 'Dimas Afrilliyan Purnama', '22222222222222', '111111111', '1', '2', '2', ' 07:00 PM', '0', 0, ''),
('T210707001', '2021-07-07 23:36:53', 2500, 1, NULL, '1', 'dimssss', 'wakanda', '232323323', '1', '2', '2', ' 10:06 PM', NULL, 0, NULL),
('T210707002', '2021-07-07 23:38:24', 2500, 1, NULL, '1', 'dimssss', 'wakanda', '232323323', '1', '2', '2', ' 10:06 PM', NULL, 0, NULL),
('T210707003', '2021-07-07 23:40:41', 2500, 1, NULL, '1', 'dimssss', 'wakanda', '232323323', '1', '2', '2', ' 10:06 PM', NULL, 0, NULL),
('T210707004', '2021-07-07 23:42:13', 2500, 1, NULL, '1', 'dimsss', 'wakanda polepel', '231', '1', '2', '2', ' 05:25 PM', NULL, 0, NULL),
('T210707005', '2021-07-07 23:52:23', 2500, 1, NULL, '1', 'dimsss', 'wakanda polepel', '231', '1', '2', '2', ' 05:25 PM', NULL, 0, NULL),
('T210707006', '2021-07-07 23:53:03', 2500, 1, NULL, '1', 'dimsss', 'waku waku japan', '12345', '1', '2', '2', ' 07:00 PM', NULL, 0, NULL),
('T210708001', '2021-07-08 00:00:08', 2500, 1, NULL, '1', 'dimsss', 'waku waku japan', '12345', '1', '2', '2', ' 07:00 PM', NULL, 0, NULL),
('T210708002', '2021-07-08 00:47:09', 19000, 1, NULL, '1', 'jancuk', 'konoha', '450', '5', '7', '6', ' 01:00 PM', '1000', 0, 'dapa'),
('T210708003', '2021-07-08 00:51:39', 19000, 1, NULL, '1', 'asw', 'wkwkwk', '32313213', '2', '4', '4', ' 05:00 AM', '31000', 0, 'JNT atau JNE'),
('T210708004', '2021-07-08 01:18:33', 34200, 2, NULL, '1', 'Dimas', 'ehewdbwdemdednc', '555555555555', '2', '4', '4', ' 05:25 PM', '31000', 0, 'JNT atau JNE'),
('T210708005', '2021-07-08 01:44:12', 27500, 2, NULL, '1', 'dsfhgdsbfjdsn', 'sbafahgsfsf', '39627462172', '2', '4', '4', ' 01:00 PM', '31000', 0, 'JNT atau JNE'),
('T210708006', '2021-07-08 02:14:58', 4201, 2, NULL, '3', 'dnkgsahfdbdsa', 'asfghfba', '375864', '2', '4', '4', ' 07:00 PM', '0', 0, ''),
('T210708007', '2021-07-08 02:29:49', 27500, 2, NULL, '1', 'dsfhgdsbfjdsn', 'sbafahgsfsf', '39627462172', '1', '2', '2', ' 01:00 PM', '30000', 0, 'JNE'),
('T210708008', '2021-07-08 02:36:59', 3201, 2, NULL, '1', 'sngdhs', 'dsbfbsads', '32742', '5', '7', '6', ' 01:00 PM', '0', 0, ''),
('T210708009', '2021-07-08 02:42:20', 4201, 2, NULL, '1', 'ngryhs', 'jgdhfds', '367342', '1', '2', '2', ' 07:00 PM', '0', 0, ''),
('T210708010', '2021-07-08 02:45:56', 4201, 2, NULL, '1', 'ahgdhsdvsad', 'djkfbsf', '32532', '2', '4', '4', ' 07:00 PM', '31000', 0, 'JNT atau JNE'),
('T210708011', '2021-07-08 03:43:15', 1, 1, NULL, '1', 'rdfchgvhj', 'gkffghjk', '789', '1', '2', '2', ' 01:00 PM', '30000', 0, 'JNE'),
('T210708012', '2021-07-08 03:46:12', 36200, 1, NULL, '1', 'nhfgdcgvhb', 'fdcghjvbcfv', '53647890', '1', '2', '2', ' 07:00 PM', '30000', 0, 'JNE'),
('T210708013', '2021-07-08 10:36:59', 23500, 1, NULL, '1', 'djgdhs', 'dimas', '32486245', 'Malang', '2', '2', ' 07:00 PM', '0', 0, '1'),
('T210708014', '2021-07-08 10:42:56', 23500, 1, NULL, '1', 'djgdhs', 'dimas', '32486245', 'Malang', '2', '2', ' 07:00 PM', '0', 0, '1'),
('T210708015', '2021-07-08 10:43:55', 23500, 1, NULL, '1', 'djgdhs', 'dimas', '32486245', 'Malang', '2', '2', ' 07:00 PM', NULL, 0, '1'),
('T210708016', '2021-07-08 10:47:14', 10001, 1, NULL, '1', 'gebdhbasdn', 'cdafas', '3217561', 'Malang', '', '4', '13', '0', 0, '1'),
('T210708017', '2021-07-08 10:55:04', 23500, 1, NULL, '1', 'djgdhs', 'dimas', '32486245', 'Malang', '2', '2', ' 07:00 PM', NULL, 0, '1'),
('T210708018', '2021-07-08 11:06:28', 1, 1, NULL, '1', 'safhsa', 'dsfsf', '322', '1', '2', '2', ' 01:00 PM', '0', 0, ''),
('T210708019', '2021-07-08 11:10:50', 30001, 1, NULL, '1', 'shsjfbsa', 'dhsfhaj', '3242', '1', '2', '2', ' 01:00 PM', '30000', 0, 'JNE'),
('T210708020', '2021-07-08 11:12:23', 30001, 1, NULL, '1', 'dsf', 'dsfg', '333', '1', '2', '2', ' 05:25 PM', '30000', 0, 'JNE'),
('T210708021', '2021-07-08 11:33:29', 32500, 1, NULL, '1', 'jgdfjdhvfjsf35253', 'dgdsg', '4323', '1', '2', '2', ' 05:25 PM', '30000', 0, 'JNE'),
('T210708022', '2021-07-08 11:42:08', 1, 1, NULL, '1', 'sjdghsavdj', 'hgsdfafs', '36428748', '1', '2', '2', ' 01:00 PM', NULL, 0, NULL),
('T210708023', '2021-07-08 11:43:47', 30001, 1, NULL, '1', 'sasahdhsdsa', 'nsgfshaf', '37264', '1', '2', '2', ' 07:00 PM', '30000', 0, 'JNE'),
('T210708024', '2021-07-08 12:22:38', 4700, 1, NULL, '1', 'Dimas Afrilliyan Purnama', 'Wakanda', '083555271863', '2', '4', '4', ' 10:06 PM', '0', 0, ''),
('T210708025', '2021-07-08 12:31:56', 7500, 1, NULL, '1', 'Dimasj', 'hsagdbshbdsc', '73282103', '5', '7', '6', ' 01:00 PM', '0', 0, ''),
('T210708026', '2021-07-08 12:38:16', 1, 1, NULL, '1', 'jancuk', 'bajingan', '450', '1', '2', '2', ' 05:00 AM', '0', 0, 'JNE'),
('T210708027', '2021-07-08 12:41:56', 24500, 1, NULL, '1', 'askjdsadbs', 'jdsgfhsabf', '39264327', '5', '7', '6', ' 10:06 PM', '0', 0, 'Go Send'),
('T210708028', '2021-07-08 12:48:55', 31001, 1, NULL, '1', 'hegefdsahjdskadjsj', 'jancukkk', '893624732', '2', '4', '4', ' 05:25 PM', '31000', 0, 'JNT atau JNE'),
('T210708029', '2021-07-08 12:50:25', 31018, 1, NULL, '1', 'assssssss', 'asbdvsadshajd', '8368237233823', '2', '4', '4', ' 01:00 PM', '31000', 0, 'JNT atau JNE'),
('T210708030', '2021-07-08 12:54:22', 2500, 1, NULL, '1', 'dimas', 'imanan', '837643263525', '2', '4', '4', ' 05:00 AM', NULL, 0, 'JNT atau JNE'),
('T210708031', '2021-07-08 12:58:02', 40700, 1, NULL, '1', 'sigdd', 'ahsdsajdnashdb', '7363626', '2', '4', '4', ' 10:06 PM', '31000', 0, 'JNT atau JNE'),
('T210708032', '2021-07-08 13:01:59', 9700, 1, NULL, '1', 'sigdd', 'ahsdsajdnashdb', '7363626', '2', '4', '4', ' 10:06 PM', '0', 0, 'JNT atau JNE'),
('T210708033', '2021-07-08 13:07:53', 9700, 1, NULL, '1', 'shyrasgfhsab', 'sndgsadvsa', '26371232191873', '2', '4', '4', ' 07:00 PM', '31000', 0, 'JNT atau JNE'),
('T210708034', '2021-07-08 13:23:35', 1, 1, NULL, '1', 'dimas', 'dimana', '123', '1', '2', '2', ' 05:00 AM', '30000', 0, 'JNE'),
('T210708035', '2021-07-08 13:35:01', 1, 1, NULL, '1', 'dimas', 'dimana', '123', '1', '2', '2', ' 05:00 AM', '30000', 0, 'JNE'),
('T210708036', '2021-07-08 13:45:35', 6200, 1, NULL, '1', 'dimas', 'disini', '12345', '5', '7', '6', ' 10:06 PM', '1000', 0, 'Go Send'),
('T210708037', '2021-07-08 13:46:27', 6200, 1, NULL, '1', 'dimas', 'disini', '12345', '5', '7', '6', ' 10:06 PM', '0', 0, 'Go Send'),
('T210708038', '2021-07-08 13:51:48', 32800, 1, NULL, '1', 'anjay', 'jadgsasa', '762817431', '2', '4', '4', ' 05:25 PM', '5000', 0, 'JNT atau JNE'),
('T210708039', '2021-07-08 14:09:55', 8500, 1, NULL, '1', 'wqdwsad', 'sffdfds', '32424', '5', '7', '6', ' 05:00 AM', '0', 0, 'Go Send'),
('T210708040', '2021-07-08 20:59:05', 15200, 1, NULL, '1', 'Dimas Afrilliyan Purnama', 'disana', '089333653842', '5', '7', '6', ' 01:00 PM', NULL, 0, 'Go Send'),
('T210708041', '2021-07-08 21:40:16', 1001, 1, NULL, '1', 'Dimas', 'dimana mana', '1234567', '5', '7', '6', ' 07:00 PM', '1000', 0, 'Go Send'),
('T210708042', '2021-07-08 21:42:22', 1001, 1, NULL, '4', 'Dimas', 'disana sini', '12345678', '5', '7', '6', ' 10:06 PM', '1000', 0, 'Go Send'),
('T210709001', '2021-07-09 14:54:06', 31001, 1, NULL, '1', 'dismsads', 'sdjksdbsa', '32523', '2', '4', '4', ' 07:00 PM', '31000', 0, 'JNT atau JNE'),
('T210709002', '2021-07-09 14:56:37', 36200, 1, NULL, '1', 'dims', 'dfhadvgfvasj', '73264372', '2', '4', '4', ' 01:00 PM', '31000', 0, 'JNT atau JNE');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pemasukan`
--

CREATE TABLE `pemasukan` (
  `id_pemasukan` int(11) NOT NULL,
  `id_detail_order` int(11) NOT NULL,
  `jumlah_pemasukan` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `produk`
--

CREATE TABLE `produk` (
  `id_produk` int(11) NOT NULL,
  `id_user` varchar(50) NOT NULL DEFAULT 'Admin',
  `kode_produk` varchar(20) NOT NULL,
  `nama_produk` varchar(255) NOT NULL,
  `id_menu` int(11) NOT NULL DEFAULT 1,
  `kategori_produk` int(11) NOT NULL,
  `harga` int(255) NOT NULL,
  `berat` int(11) NOT NULL,
  `stok_produk` varchar(20) DEFAULT NULL,
  `ket` text DEFAULT NULL,
  `deskripsi` text NOT NULL,
  `foto_produk1` varchar(50) DEFAULT NULL,
  `foto_produk2` varchar(50) NOT NULL,
  `foto_produk3` varchar(50) NOT NULL,
  `jumlah_stok` int(11) NOT NULL,
  `jumlah_terjual` int(11) DEFAULT NULL,
  `provinsi` int(11) NOT NULL DEFAULT 11,
  `kota` int(11) NOT NULL DEFAULT 255,
  `validasi` tinyint(1) NOT NULL DEFAULT 0,
  `pajak` double NOT NULL DEFAULT 5
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `produk`
--

INSERT INTO `produk` (`id_produk`, `id_user`, `kode_produk`, `nama_produk`, `id_menu`, `kategori_produk`, `harga`, `berat`, `stok_produk`, `ket`, `deskripsi`, `foto_produk1`, `foto_produk2`, `foto_produk3`, `jumlah_stok`, `jumlah_terjual`, `provinsi`, `kota`, `validasi`, `pajak`) VALUES
(2004280004, 'Admin', 'H222', 'Sayur Kol (1 kg)', 1, 6, 13500, 0, 'Ada', '', 'Kubis atau kol merupakan salah satu jenis sayuran yang cukup akrab di lidah masyarakat Indonesia. Memiliki tekstur renyah dan rasa yang ringan. Karena itulah, sayuran yang memiliki nama ilmiah Brassica oleracea var. capitata ini sering diolah menjadi beragam hidangan lezat; seperti sup, bakwan, hingga siomay.', 'sayurkol.jpg', '', '', 99, 1, 11, 255, 1, 0),
(2004280005, 'Admin', '', 'Eden Farm Oyong (500 g)', 1, 6, 6400, 0, '', '', 'Gambas atau oyong (Luffa acutangula, suku labu-labuan atau Cucurbitaceae), adalah komoditas sayuran minor. Penanamannya biasanya dilakukan di pekarangan atau bagian ladang yang tidak digunakan untuk tanaman lain. Gambas dipanen buahnya ketika masih muda dan diolah sebagai sayur.', 'oyong.jpg', '', '', 100, 0, 11, 255, 1, 0),
(2004280006, 'Admin', '', 'Selada Keriting Hijau (500 g)', 1, 6, 10000, 0, 'Kosong', '', 'Selada Keriting Hijau Dapat ditanam di dataran rendah sampai tinggi. Merupakan jenis tanaman sayuran dengan bentuk daun bergelombang berwarna hijau kekuningan. Tekstur daun renyah dan tahan penyakit busuk lunak. Selada sering dikonsumsi mentah sebagai lalapan maupun sebagai bahan pelengkap masakan lain. Umur panen ± 45 hari setelah pindah tanam. Kebutuhan benih 160 – 200 g/Ha.', 'seladakeriting.jpg', '', '', 99, 1, 11, 255, 1, 0),
(2004280007, 'Admin', '', 'Labu Siam Besar (1 kg)', 1, 6, 6000, 0, '', '', 'Labu siam atau jipang (Sechium edule, bahasa Inggris: chayote) adalah tumbuhan suku labu-labuan (Cucurbitaceae) yang dapat dimakan buah dan pucuk mudanya. Tumbuhan ini merambat di tanah atau agak memanjat dan biasa dibudidayakan di pekarangan, biasanya di dekat kolam. Buah menggantung dari tangkai. Daunnya berbentuk mirip segitiga dan permukaannya berbulu.', 'labusiam.jpg', '', '', 100, 0, 11, 255, 1, 0),
(2004280008, 'Admin', '', 'Tomat (500 g)', 1, 6, 7500, 0, 'Kosong', '', 'Tomat (Solanum lycopersicum syn. Lycopersicum esculentum) adalah tumbuhan dari keluarga Solanaceae, tumbuhan asli Amerika Tengah dan Selatan, dari Meksiko sampai Peru. Tomat merupakan tumbuhan siklus hidup singkat, dapat tumbuh setinggi 1 sampai 3 meter. Tumbuhan ini memiliki buah berawarna hijau, kuning, dan merah yang biasa dipakai sebagai sayur dalam masakan atau dimakan secara langsung tanpa diproses. Tomat memiliki batang dan daun yang tidak dapat dikonsumsi karena masih sekeluarga dengan kentang dan Terung yang mengadung Alkaloid.', 'tomat.jpg', '', '', 100, 0, 11, 255, 1, 0),
(2004280009, 'Admin', '', 'Bumbu Racik Nasi Goreng [20 g]', 1, 7, 2125, 0, '', '', 'Sekarang ini urusan dapur pun jadi serba mudah dan praktis karena tidak sedikit ibu memilih masak dengan menggunakan bumbu instan. Terlepas dari aman atau tidaknya cara ini yang jelas proses memasak jelas akan lebih cepat dan ekonomis. Adapun soal rasa juga tidak jauh beda dengan bumbu racikan sendiri, bahkan ada yang menyebutkan jika memasak dengan bumbu instan itu jauh lebih gurih dan berasa.\r\n', 'bumburacik.jpg', '', '', 0, 100, 11, 255, 1, 0),
(2004280010, 'Admin', '', 'Lengkuas Bubuk Bumbu Masak [22 g]\r\n', 1, 7, 3000, 0, '', '', 'Koepoe-koepoe Lengkuas Bubuk Bumbu Masak Instan [22 g], bumbu masak instan yang diproses dan dikemas secara higienis serta tidak mengandung pengawet sehingga dapat bertahan lama. Ideal untuk melengkapi bumbu dapur Anda.\r\n', 'lengkuasbubuk.jpg', '', '', 100, 0, 11, 255, 1, 0),
(2004280011, 'Admin', '', 'Lada Putih Bubuk Bumbu Masak [38 g]\r\n', 1, 7, 10000, 0, '', '', 'Selain dikenal karena kearifan lokalnya ternyata Indonesia juga diperkaya dengan rempah-rempah, serta bumbu-bumbu khas nusantara yang disiap membuat olahan masakan menjadi semakin lezat dan sedap. Karena hal itu, banyak orang berbondong-bondong datang ke tanah air agar bisa mendapatkan rempah-rempah asli Indonesia. Ada banyak macam bumbu yang tentu sering dijadikan resep andalan untuk memasak, seperti halnya Bawang Merah, Bawang Putih, Jahe, Pala, Merica, Kencur, Kunyit, Cengkeh, Lada, Lengkuas, Cabai, Asam Jawa, Kemiri, Kayu Manis, Santan Kelapa, dll. Yang semua jenis bumbu dapur itu belum tentu ditemukan di luar Indonesia.\r\n', 'ladaputihbubuk.jpg', '', '', 100, 0, 11, 255, 1, 0),
(2004280012, 'Admin', '', 'Kencur Super Bumbu Dapur [1 kg]\r\n', 1, 7, 90000, 0, 'Kosong', '', 'Kencur Super Bumbu Dapur [1 kg] adalah salah satu jenis bumbu dapur yang memiliki aroma khas yang segar dan menyeruak. Selain digunakan sebagai penambah cita rasa dalam masakan, manfaat kencur juga sudah lama dikenal sebagai obat alami. Netto 1 kg.\r\n', 'kencursuperbumbudapur.jpg', '', '', 100, 0, 11, 255, 1, 0),
(2004280013, 'Admin', '', 'Italian Grill Bumbu Peredam Daging Khas Italia\r\n', 1, 7, 12500, 0, 'Kosong', '', 'Jay\'s Kitchen Grillmaster Italian Grill Bumbu Peredam Daging Khas Italia merupakan bumbu perendam barbeque dengan paduan bahan  bawang putih, bawang bombay, dan paprika dengan sentuhan rempah-rempah. Cocok untuk semua jenis daging sapi, ayam, dan seafood. Dikemas dalam kemasan yang praktis, Anda kini dapat menyajikan masakan favorit Anda hanya dalam waktu 10 menit. Jay\'s Grill Master dibuat dari bahan-bahan pilihan tanpa MSG, yang tentunya membuat hidangan barbeque Anda lezat.\r\n', 'italiangrillbumbuperedamdagingkhasitalia.jpg', '', '', 100, 0, 11, 255, 1, 0),
(2004280014, 'Admin', '', 'Bagelen Sisir Kue Kering [125 g]\r\n', 1, 8, 15500, 0, '', '', 'Moessy Snack Bagelen Sisir Kue Kering [125 g], kue kering yang terbuat dari bahan pilihan dan berkualitas. Bentuknya lucu, seperti roti tawar dalam bentuk mini. Rasa manis harum enak, gurih, renyah dan nikmat. Sangat cocok untuk acara santai bersama teman dan keluarga. Sudah terdapat ijin PIRT, merk terdaftar.\r\n', 'BagelenSisirKueKering.jpg', '', '', 99, 1, 11, 255, 1, 0),
(2004280015, 'Admin', '', 'Pang Pang Makanan Ringan [500 g]\r\n', 1, 8, 25000, 0, '', '', 'Juara Snack Pang Pang Makanan Ringan [500 g] merupakan pang-pang atau disebut sebagai kue bantal, memiliki ukuran yang kecil dengan rasa yang enak, gurih dan renyah. Pang Pang dibuat dengan cara digoreng. Snack ini sangat disukai oleh masyarakat di Indonesia. Dikemas dengan plastik zipper sehingga mutunya tetap terjaga dengan baik.\r\n', 'PangPangMakananRingan.jpg', '', '', 100, 0, 11, 255, 1, 0),
(2004280016, 'Admin', '', 'Rasa Vanilla Cemilan Kuping Gajah Kue Kering [75 g/ Mini]\r\n', 1, 8, 16000, 0, '', '', 'Josh Food Rasa Vanilla Cemilan Kuping Gajah Kue Kering [75 g/ Mini] merupakan salah satu makanan kering khas Indonesia yang banyak digemari oleh berbagai kalangan. Cemilan dengan nama yang unik ini memiliki rasa yang khas dan begitu nikmat ketika disantap. Kue kuping gajah bisa dinikmati sewaktu santai bersama dengan keluarga atau menjadi cemilan sewaktu menonton televisi. Cemilan yang telah ada sejak dahulu ini telah dihadirkan dengan inovasi baru yang tidak membosankan, yaitu Josh Food Cemilan Kuping Gajah Mini. Varian Rasa yang Menggugah Selera Cemilan tradisional khas Indonesia ini hadir dengan berbagai varian rasa yang menggugah selera, yakni pandan, strawberry, durian, blueberry, cokelat, vanilla, moka dan teh hijau. Memiliki bentuk mini atau bite size menjadikannya semakin terlihat unik. Sementara pembuatannya diproses secara higienis dengan standard mutu dan kualitas terbaik. Kini saatnya sebarkan cinta akan cemilan tradisional dengan sentuhan modern serta rasakan ke ajaiban di setiap gigitan kuping gajah mini josh.\r\n', 'RasaVanillaKupingGajahKueKering.jpg', '', '', 96, 4, 11, 255, 1, 0),
(2004280017, 'Admin', '', 'Gatito Kue Lidah Kucing Sandwich Cokelat [10 Sachet/ Kotak]\r\n', 1, 8, 19000, 0, '', '', 'Gatito merupkan brand makanan ringan berupa kue lidah kucing sandwich pasta cokelat. Dikemas 1 kotak berisi 10 sachet dgn netto 32gr/sachet. Produksi PT. Kaldu Nabati Sari - Bandung, perusahaan multi konsumen produk yang merajai pasar lokal khususnya jawa barat hingga terkenal se nusantara. Nabati sebenarnya sudah sangat merambah lini jualan yang beragam. Mulai dari snack yang utama hingga konsorsium pemilik brand snack sarat penghargaan bergensi nasional hingga jaringan resto. Dan salah satu produk yang mereka punya adalah Gatito.\r\n', 'GatitoKueLidahKucingSandwichCoklat.jpg', '', '', 100, 0, 11, 255, 1, 0),
(2004280018, 'Admin', '', 'Blackmond Camilan Sehat\r\n', 1, 8, 37500, 0, '', '', 'Ladang Lima Blackmond Camilan Sehat, Cemilan sehat tanpa rasa bersalah. Kue kering bebas gluten, perpaduan dark coklat dan kacang almond, buat kamu yang pengen cemilan sehat. \r\n', 'BlackmondCamilanSehat.jpg', '', '', 98, 3, 11, 255, 0, 0),
(2004280019, 'Admin', '', 'Boss Topi Wanita\r\n', 1, 9, 650000, 0, '', '', 'Import Fashion Boss Topi Wanita merupakan topi yang terbuat dari bahan berkualitas yang didesain trendy dengan embroidery pada bagian depan dan adjustrable strap pada bagian belakang sehingga dapat disesuaikan dengan ukuran kepala Anda. Diameter 19cm. Dimensi : 28 x 14 x 15 cm\r\n', 'BossTopiWanita.jpg', '', '', 100, 0, 11, 255, 0, 0),
(2004280020, 'Admin', '', 'Tas Ransel Wanita\r\n', 1, 9, 55000, 0, '', '', 'Tas Ransel Wanita merupakan backpack berbahan kulit sintetis yang didesain trendy. Kompartemen utama berdetail resleting, inner zipper pockets, front pocket, side pockets, handle strap, dan adjustable shoulder strap. Tas bisa digunakan sebagai backpack ataupun shoulder bag. Dimensi : 26 x 14 x 34 cm.\r\n', 'TasRanselWanita.jpg', '', '', 100, 0, 11, 255, 0, 0),
(2004280021, 'Admin', '', 'Casual Sepatu Slip On Pria\r\n', 1, 9, 185000, 0, 'Kosong', '', 'Fashion Casual Sepatu Slip On Pria merupakan slip on shoes berbahan kanvas yang didesain trendy dengan detail neat stitching dan TPR outsole sehingga nyaman ketika digunakan.\r\n', 'CasualSepatuSlipOnPria.jpg', '', '', 100, 0, 11, 255, 0, 0),
(2004280022, 'Admin', '', 'Tas Selempang Pria + Free Kabel USB\r\n', 1, 9, 67500, 0, '', '', 'Fashion Tas Selempang Pria + Free Kabel USB, sling bag berbahan kulit sintetis (water resistant) yang didesain trendy dengan kompartemen utama berdetail zipper opening, front zipper pocket dan adjustable strap. Ukuran : 18 x 9 x 34 cm. Terdapat 2 port USB dan earphone. Free kabel port USB\r\n', 'TasSelempangPria+FreeKabelUSB.jpg', '', '', 100, 0, 11, 255, 0, 0),
(2004280023, 'Admin', '', 'Polos Kaos Polo Pria\r\n', 1, 9, 56000, 0, 'Kosong', '', 'Polos Kaos Polo Pria merupakan short sleeves polo shirt berbahan lacost PE yang didesain trendy dengan pointed collar dan front half button opening, sehingga sangat nyaman pada saat digunakan.\r\n', 'PolosKaosPoloPria.jpg', '', '', 100, 0, 11, 255, 0, 0),
(2004280024, 'Admin', '', 'Care Health Hand Sanitizer\r\n', 1, 10, 45000, 0, 'Kosong', '', 'Care Health Hand Sanitizer, hand sanitizer dengan kadar alkohol 70% jadi sangat efektif membunuh kuman, bakteri dan virus dibanding yg 65%. Walau kadar alkohol tinggi tidak membuat tangan kering, gatal-gatal karena mengandung pelembab. Lebih irit dibandingkan model spray, karna hanya butuh 5 tetes bisa untuk bilas tangan keseluruhan. Bentuknya gel yang mengandung pelembab, sehingga tidak membuat tangan Kering.\r\n', 'CareHealthHandSanitizer.jpg', '', '', 100, 0, 11, 255, 0, 0),
(2004280025, 'Admin', '', 'Hazmat / APD / Alat Pelindung Diri / Coverall - Putih\r\n', 1, 10, 300000, 0, 'Kosong', '', 'ENVIDE Suit Protector yang merupakan produk solusi kesehatan. Bahan yang kami gunakan untuk memproduksi ENVIDE Suit Protector adalah 100% POLYESTER non WOVEN, penggunaan dan klasifikasi bahan tersebut diantaranya digunakan untuk perlengkapan medis dan kesehatan, pakaian bedah, pakaian pelindung dan kain disinfektan\r\n', 'AlatPelindungDiri.jpg', '', '', 100, 0, 11, 255, 0, 0),
(2004280026, 'Admin', '', 'Face shield / APD covid-19\r\n', 1, 10, 10000, 0, 'Kosong', '', 'Dengan memegang masker tersebut khususnya melalui tangan yang kotor, maka risiko terjangkit penyakit pun semakin besar. “Berbeda dengan face shield yang terpasang seperti topi di kepala kita, saat bergerak tidak akan menjadi masalah dan tetap nyaman. Kebiasaan menyentuh wajah pasti jadi terhalang juga lantaran bentuknya yang tidak memungkinkan untuk kita sentuh,” katanya. Meski begitu, face shield lebih baik jika dipakai oleh tenaga medis dan mereka yang intensitas bertemu dengan banyak orangnya tinggi. Misalnya super bus atau kasir di pasar swalayan. “Karena mereka yang paling berisiko untuk berbicara dengan orang sehingga lebih penting untuk memblokir penyebaran tetesan yang dapat mengenai wajah,” katanya.\r\n', 'Faceshield.jpg', '', '', 100, 0, 11, 255, 0, 0),
(2004280027, 'Admin', '', 'Health Care Car Air Ion Counter Tester\r\n', 1, 10, 562000, 0, 'Kosong', '', 'Health Care Car Air Ion Tester adalah alat untuk menguji ion negatif dan positif di suatu ruangan atau di mobil Anda. Memiliki bentuk yang kecil dan ringan.\r\n', 'HealthCareCarAirIonCounterTester.jpg', '', '', 100, 0, 11, 255, 0, 0),
(2005080001, 'Admin', '1', 'AGEO-1134000159', 1, 9, 1, 1, 'Ada', '0', ' -', 'foto_2005080001_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080002, 'Admin', '2', 'ANNABETH MPD-1314090190', 1, 9, 1, 1, 'Ada', '0', ' -', 'foto_2005080002_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080003, 'Admin', '3', 'B508.1-6182020288', 1, 9, 1, 1, 'Ada', '0', ' -', 'foto_2005080003_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080004, 'Admin', '4', 'BEATRICA-1313840170', 1, 9, 1, 1, 'Ada', '0', ' -', 'foto_2005080004_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080005, 'Admin', '5', 'BO 1177 C JEANS HS STRIPES-2220350193', 1, 9, 1, 1, 'Ada', '0', ' -', 'foto_2005080005_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080006, 'Admin', '6', 'CL 3660 JOGGER PWM-2520030963', 1, 9, 1, 1, 'Ada', '0', ' -', 'foto_2005080006_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080007, 'Admin', '7', 'CL 3671 JOGGER HSHL-2520031132', 1, 9, 1, 1, 'Ada', '0', ' -', 'foto_2005080007_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080008, 'Admin', '8', 'CLARINTA DRESS-6024510121', 1, 9, 1, 1, 'Ada', '0', ' -', 'foto_2005080008_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080009, 'Admin', '9', 'CLARINTA DRESS-6024510143', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080009_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080010, 'Admin', '10', 'CODE MALE-4091040620', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080010_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080011, 'Admin', '11', 'CODE MALE-4091050158', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080011_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080012, 'Admin', '12', 'CROSSBROW-4092540106', 1, 9, 1, 1, 'Ada', '0', '-', 'foto_2005080012_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080013, 'Admin', '13', 'DISA-6034060190', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080013_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080014, 'Admin', '14', 'FATHY-8704030101', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080014_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080015, 'Admin', '15', 'HAYDEN-4111610701', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080015_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080016, 'Admin', '16', 'INDITRO ONE-1132980151', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080016_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080017, 'Admin', '17', 'INDRITO TWO-1122970251', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080017_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080018, 'Admin', '18', 'JACEY-5031522970', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080018_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080019, 'Admin', '19', 'JKN 276-4091040572', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080019_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080020, 'Admin', '20', 'LOI-8600050212', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080020_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080021, 'Admin', '21', 'MILENA-1314310129', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080021_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080022, 'Admin', '22', 'NUVARE TWO-1127780339', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080022_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080023, 'Admin', '23', 'PALETTO TWO-6331051872', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080023_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080024, 'Admin', '24', 'PRENOWAR-6172050197', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080024_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080025, 'Admin', '25', 'REZIM-6330520561', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080025_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080026, 'Admin', '26', 'THEODORE-8702220252', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080026_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080027, 'Admin', '27', 'TROSIC-6202230211', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080027_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080028, 'Admin', '28', 'TROSIC-6202230311', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080028_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080029, 'Admin', '29', 'TS 1216 POLO PMW-3620020611', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080029_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080030, 'Admin', '30', 'TS 1221 C OBL HSHL-3721024011', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080030_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080031, 'Admin', '31', 'ZHAFAAR TWO-1024610139', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080031_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080032, 'Admin', '32', 'ZHAFAR TWO-1024630101', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080032_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080033, 'Admin', '33', 'ZHEVOY TWO-1129350195', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080033_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080034, 'Admin', '34', 'AGEO-1134000159', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080034_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080035, 'Admin', '35', 'B507.1-61711120820', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080035_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080036, 'Admin', '36', 'B507.4-6172750135', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080036_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080037, 'Admin', '37', 'B507.4-6172750139', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080037_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080038, 'Admin', '38', 'B508.1-6182020288', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080038_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080039, 'Admin', '39', 'B508B.2-6180520120', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080039_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080040, 'Admin', '40', 'BD 1174 C COTT HSHL-2220830221', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080040_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080041, 'Admin', '41', 'CL 3671 JOGGER HSHL-2520031132', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080041_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080042, 'Admin', '42', 'CONY-4022100157', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080042_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080043, 'Admin', '43', 'FATHY-8704020122', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080043_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080044, 'Admin', '44', 'FATHY-8704030101', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080044_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080045, 'Admin', '45', 'FATHY-8704040143', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080045_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080046, 'Admin', '46', 'FATHY-8704050122', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080046_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080047, 'Admin', '47', 'HARITH-6172260120', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080047_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080048, 'Admin', '48', 'HAYDEN-4111610701', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080048_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080049, 'Admin', '49', 'IDINTRO TWO-1122970251', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080049_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005080050, 'Admin', '50', 'JK 191 C SWEATER PWM-4420030911', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005080050_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090001, 'Admin', '51', 'JK 192 C SWEATER PWM-4420031031', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090001_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090002, 'Admin', '52', 'JKN 276-4091040572', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090002_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090003, 'Admin', '53', 'JONAS GOLD TWO-1121910101', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090003_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090004, 'Admin', '54', 'JOVINO-4021840259', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090004_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090005, 'Admin', '55', 'PHILOES-1133990194', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090005_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090006, 'Admin', '56', 'PJ 2678 DENIM DREAMBIG-1110080592', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090006_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090007, 'Admin', '57', 'PJ 2711 C POLOS HSHL-1121616121', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090007_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090008, 'Admin', '58', 'PRENOWAR-6172050197', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090008_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090009, 'Admin', '59', 'THEODORE-8702220252', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090009_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090010, 'Admin', '60', 'THEODORE-8702260228', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090010_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090011, 'Admin', '61', 'TROSIC-6172130171', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090011_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090012, 'Admin', '62', 'TROSIC-6202230271', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090012_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090013, 'Admin', '63', 'TROSIC-6202230336', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090013_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090014, 'Admin', '64', 'TS 1216 POLO PWM-3620020611', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090014_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090015, 'Admin', '65', 'TS 1218 C OBL PJG HSHL-3720024663', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090015_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090016, 'Admin', '66', 'TS 1230 OBL PJ HSSTRIPES-3720025301', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090016_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090017, 'Admin', '67', 'ZHAFAR TWO-1024630101', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090017_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090018, 'Admin', '68', 'ADISTY-2202270101', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090018_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090019, 'Admin', '69', 'ALBANI-1642100129', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090019_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090020, 'Admin', '70', 'ANINDITA-1314480118', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090020_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090021, 'Admin', '71', 'ANNABETH MPD-1314090190', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090021_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090022, 'Admin', '72', 'B508.2-6180460438', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090022_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090023, 'Admin', '73', 'BEATRICA-1313840118', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090023_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090024, 'Admin', '74', 'BREACHER-1139500150', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090024_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090025, 'Admin', '75', 'CARLEN-1130620401', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090025_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090026, 'Admin', '76', 'CEISYA GAMIS-6020110156', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090026_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090027, 'Admin', '77', 'CHER-1313820116', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090027_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090028, 'Admin', '78', 'CODE MALE-4091050158', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090028_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090029, 'Admin', '79', 'DISSA-6034060190', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090029_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090030, 'Admin', '80', 'ENEAS ONE-1080030131', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090030_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090031, 'Admin', '81', 'ERDO-2070061939', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090031_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090032, 'Admin', '82', 'ESHAL-1314420170', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090032_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090033, 'Admin', '83', 'JACEY-5031522918', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090033_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090034, 'Admin', '84', 'JACEY-5031522970', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090034_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090035, 'Admin', '85', 'JANE-5010110427', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090035_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090036, 'Admin', '86', 'MILENA-1314310129', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090036_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090037, 'Admin', '87', 'NUVARE TWO-1127780339', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090037_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090038, 'Admin', '88', 'PALETTO TWO-6331051872', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090038_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090039, 'Admin', '89', 'PIERO-1640760144', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090039_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090040, 'Admin', '90', 'REBEL-6172060189', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090040_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090041, 'Admin', '91', 'REZIM-6330520561', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090041_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090042, 'Admin', '92', 'SARITA-5033300118', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090042_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090043, 'Admin', '93', 'TROSIC-6202230227', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090043_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090044, 'Admin', '94', 'TROYES-6202100111', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090044_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090045, 'Admin', '95', 'TROYES-6202100130', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090045_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090046, 'Admin', '96', 'ZHEVOY TWO-1129350195', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090046_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090047, 'Admin', '97', 'ZIKON-3010016906', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090047_1.jpg', '', '', 4, NULL, 11, 255, 0, 0),
(2005090048, 'Admin', '98', 'ZION-1640820127', 1, 9, 1, 1, 'Ada', '0', ' ', 'foto_2005090048_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090049, 'Admin', '001', 'Bawang Putih', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090049_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090050, 'Admin', '002', 'Brambang Goreng', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090050_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090051, 'Admin', '003', 'Bumbu Crispy Kobe', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090051_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090052, 'Admin', '004', 'Kentang Goreng', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090052_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090053, 'Admin', '005', 'merk bamboo', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090053_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090054, 'Admin', '006', 'sasa crispy', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090054_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090055, 'Admin', '007', 'sasa pisang goreng', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090055_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090056, 'Admin', '008', 'sasa serbaguna', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090056_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090057, 'Admin', '009', 'tempe sambal goreng', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090057_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090058, 'Admin', '010', 'kecap bango refill', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090058_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090059, 'Admin', '011', 'kecap cap sate', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090059_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090060, 'Admin', '012', 'kecap sedap refill', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090060_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090061, 'Admin', '013', 'mayonese dan tomat refill', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090061_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090062, 'Admin', '014', 'tomat abc,kechup,sambal botol', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090062_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090063, 'Admin', '015', 'beras 5 kg lahap', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090063_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090064, 'Admin', '016', 'beras bintang 5 kg', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090064_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090065, 'Admin', 'E001', 'bodi lotion', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090065_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090066, 'Admin', 'E002', 'Hanasui-Animal-Mask', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090066_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090067, 'Admin', 'E003', 'Hanasui-Anti-Acne', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090067_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090068, 'Admin', 'E004', 'Hanasui-Bar-Soap', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090068_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090069, 'Admin', 'E005', 'Hanasui-Body-Series', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090069_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090070, 'Admin', 'E006', 'Hanasui-Body-Spa', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090070_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090071, 'Admin', 'E007', 'Hanasui-Egg-White', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090071_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090072, 'Admin', 'E008', 'Hanasui-Gold', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090072_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090073, 'Admin', 'E009', 'Hanasui-Gold-Mask', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090073_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090074, 'Admin', 'E010', 'Hanasui-Naturgo', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090074_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090075, 'Admin', 'E011', 'Hanasui-Vitamin-C- gold', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090075_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090076, 'Admin', 'E012', 'Hanasui-Vitamin-CCollagen', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090076_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090077, 'Admin', 'E013', 'Hanasui-Xbeinoi', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090077_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090078, 'Admin', 'E014', 'lightening', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090078_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090079, 'Admin', 'E015', 'masker', 1, 10, 1, 1, 'Ada', '0', ' ', 'foto_2005090079_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090080, 'Admin', 'C001', 'kue lumpur', 1, 8, 1, 1, 'Ada', '0', ' ', 'foto_2005090080_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090081, 'Admin', 'C002', 'kue tok', 1, 8, 1, 1, 'Kosong', '0', ' ', 'foto_2005090081_1.jpg', '', '', 0, NULL, 11, 255, 0, 0),
(2005090082, 'Admin', 'C003', 'onde onde', 1, 8, 1, 1, 'Ada', '0', ' ', 'foto_2005090082_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090083, 'Admin', '001', 'asparagus kaleng', 1, 11, 1, 1, 'Kosong', '0', ' ', 'foto_2005090083_1.jpg', '', '', 0, NULL, 11, 255, 0, 0),
(2005090084, 'Admin', '002', 'bear nestle', 1, 11, 1, 1, 'Kosong', '0', ' ', 'foto_2005090084_1.jpg', '', '', -2, NULL, 11, 255, 0, 0),
(2005090085, 'Admin', '003', 'carnation kaleng', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090085_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090086, 'Admin', '004', 'enak susu coklat', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090086_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090087, 'Admin', '005', 'green feas Ma Ling', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090087_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090088, 'Admin', '006', 'indomilk coklat kaleng', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090088_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090089, 'Admin', '007', 'jagung manis kaleng', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090089_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090090, 'Admin', '008', 'jamur kunci kalengamarcucuss', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090090_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090091, 'Admin', '009', 'kara', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090091_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090092, 'Admin', '010', 'kornet pronas', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090092_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090093, 'Admin', '011', 'kornet sopini', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090093_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090094, 'Admin', '012', 'leci kaleng', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090094_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090095, 'Admin', '013', 'mandarin orange kaleng', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090095_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090096, 'Admin', '014', 'nata decoco kara', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090096_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090097, 'Admin', '015', 'sarden botan', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090097_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090098, 'Admin', '016', 'sosis kimbo', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090098_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090099, 'Admin', '017', 'mi sua', 1, 11, 1, 1, 'Ada', '0', ' ', 'foto_2005090099_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090100, 'Admin', '017', 'minyak gor bimoli reguler dan special', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090100_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090101, 'Admin', '018', 'minyak goreng filma', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090101_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090102, 'Admin', '019', 'minyak goreng tropical botol', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090102_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090103, 'Admin', '020', 'beras bintang 5 kg', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090103_1.jpg', '', '', 3, NULL, 11, 255, 0, 0),
(2005090104, 'Admin', '021', 'beras hitam', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090104_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090105, 'Admin', '022', 'beras jagung', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090105_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090106, 'Admin', '023', 'beras ketan', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090106_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090107, 'Admin', '024', 'beras lahap 5 kg', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090107_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090108, 'Admin', '025', 'beras merah', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090108_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090109, 'Admin', '026', 'energen saset per renteng isi 10', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090109_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090110, 'Admin', '027', 'kacang hijau', 1, 6, 1, 1, 'Ada', '0', ' ', 'foto_2005090110_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090111, 'Admin', '252', 'kacang tanah', 1, 6, 29200, 1000, 'Ada', '0', ' harga per kg', 'foto_2005090111_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090112, 'Admin', '418', 'bayclin galon', 1, 12, 1, 1, 'Ada', '0', ' kosong', 'foto_2005090112_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090113, 'Admin', '417', 'byclin pemutih(botol)', 1, 12, 16000, 1000, 'Ada', '0', ' perbotol plastik', 'foto_2005090113_1.jpg', '', '', 9999, NULL, 11, 255, 0, 0),
(2005090114, 'Admin', '416', 'detergen ekonomi 5. kg', 1, 12, 56300, 5000, 'Ada', '0', ' per kaleng 5 kg', 'foto_2005090114_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090115, 'Admin', '415', 'softener molto', 1, 6, 14200, 1000, 'Ada', '0', ' per sachet isi ulanh', 'foto_2005090115_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090116, 'Admin', '414', 'molto pewangi', 1, 12, 12200, 1000, 'Ada', '0', ' per sachet isi ulang', 'foto_2005090116_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090117, 'Admin', '413', 'pemutih porselen Vixal', 1, 12, 15200, 1000, 'Ada', '0', ' botol plastik', 'foto_2005090117_1.jpg', '', '', 9999, NULL, 11, 255, 0, 0),
(2005090118, 'Admin', '412', 'pemutih porselen Wpo', 1, 6, 1, 1, 'Ada', '0', ' kosong', 'foto_2005090118_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090119, 'Admin', '411', 'pemutih vanish', 1, 12, 20000, 1000, 'Ada', '0', ' harga per sachet', 'foto_2005090119_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090120, 'Admin', '410', 'porsteg', 1, 12, 18700, 1000, 'Ada', '0', 'harga per sachet isi ulang ', 'foto_2005090120_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090121, 'Admin', '409', 'sabun cair lifeboy refill', 1, 12, 24500, 1000, 'Ada', '0', ' per sachet isi ulang', 'foto_2005090121_1.jpg', '', '', 9999, NULL, 11, 255, 0, 0),
(2005090122, 'Admin', '408', 'sabun cair refill lux', 1, 12, 24500, 1000, 'Ada', '0', ' harga per sachet isi ulang', 'foto_2005090122_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090123, 'Admin', '407', 'sabun cuci piring sunlight ', 1, 12, 15700, 1000, 'Ada', '0', ' per sachet isi ulang', 'foto_2005090123_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090124, 'Admin', '406', 'sabun mesin cuci soklin', 1, 12, 14700, 1000, 'Ada', '0', ' persachet isi ulang', 'foto_2005090124_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090125, 'Admin', '405', 'sabun pembersih Mr Muscle', 1, 12, 1, 1, 'Ada', '0', 'barang kosong ', 'foto_2005090125_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090126, 'Admin', '404', 'so klin biomatik serbuk', 1, 12, 1, 1, 'Ada', '0', 'kosong ', 'foto_2005090126_1.jpg', '', '', 1, NULL, 11, 255, 0, 0),
(2005090127, 'Admin', '402', 'softener so klin dan pewangi', 1, 12, 11700, 1000, 'Ada', '0', ' per sachet', 'foto_2005090127_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090128, 'Admin', '401', 'super pell dan wipoll', 1, 12, 16300, 1000, 'Ada', '0', ' per sachet isi ulang', 'foto_2005090128_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090129, 'Admin', '251', 'baby corn', 1, 6, 12200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090129_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090130, 'Admin', '250', 'bawang bombay', 1, 6, 17000, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090130_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090131, 'Admin', '249', 'bawang putih biasa', 1, 6, 15000, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090131_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090132, 'Admin', '249', 'bawang putih kating', 1, 6, 17000, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090132_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090133, 'Admin', '248', 'brokoli', 1, 6, 8700, 500, 'Ada', '0', ' harga persetngah kg', 'foto_2005090133_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090134, 'Admin', '247', 'daun bawang', 1, 6, 2500, 100, 'Ada', '0', ' Harga per ons', 'foto_2005090134_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090135, 'Admin', '246', 'daun prey', 1, 6, 1800, 100, 'Ada', '0', ' harga per ons', 'foto_2005090135_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090136, 'Admin', '245', 'daun sledri', 1, 6, 2500, 100, 'Ada', '0', ' harga per ONS', 'foto_2005090136_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090137, 'Admin', '244', 'ercis', 1, 6, 25000, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090137_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090138, 'Admin', '243', 'gambas', 1, 6, 5200, 500, 'Ada', '0', ' harga persengah kg', 'foto_2005090138_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090139, 'Admin', '242', 'jahe besar', 1, 6, 17300, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090139_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090140, 'Admin', '241', 'jamur kancing fress', 1, 6, 18500, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090140_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090141, 'Admin', '240', 'jamur kuping', 1, 6, 10200, 500, 'Ada', '0', ' harga per etengah kg', 'foto_2005090141_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090142, 'Admin', '239', 'jamur tiram', 1, 6, 8700, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090142_1.jpg', '', '', 5000000, NULL, 11, 255, 0, 0),
(2005090143, 'Admin', '238', 'jeruk lemon', 1, 6, 9000, 500, 'Ada', '0', ' jeruk lemon lokal, harga per setengah kg', 'foto_2005090143_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090144, 'Admin', '0237', 'jeruk nipis', 1, 6, 5200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090144_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090145, 'Admin', '0237', 'kacang bernebun', 1, 6, 21500, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090145_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090146, 'Admin', '0236', 'kacang panjang', 1, 6, 5200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090146_1.jpg', '', '', 49999, NULL, 11, 255, 0, 0),
(2005090147, 'Admin', '0235', 'kacang polong', 1, 6, 10000, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090147_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090148, 'Admin', '0234', 'kangkung', 1, 6, 1500, 250, 'Ada', '0', ' harga perikat', 'foto_2005090148_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090149, 'Admin', '0233', 'kecambah besar', 1, 6, 4200, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090149_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090150, 'Admin', '0232', 'kencur', 1, 6, 37500, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090150_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090151, 'Admin', '0231', 'kentang biasa kecil', 1, 6, 6200, 500, 'Ada', '0', 'harga per setengah kg ', 'foto_2005090151_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090152, 'Admin', '0231', 'kentang merah', 1, 6, 9200, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090152_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090153, 'Admin', '0230', 'kentang', 1, 6, 6200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090153_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090154, 'Admin', '0229', 'kluwek', 1, 6, 13800, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090154_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090155, 'Admin', '0228', 'kubis jepang atau kol ungu', 1, 6, 11300, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090155_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090156, 'Admin', '0227', 'kubis', 1, 6, 4700, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090156_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090157, 'Admin', '0226', 'kunir', 1, 6, 6200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090157_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090158, 'Admin', '0225', 'labu atau manisa', 1, 6, 4200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090158_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090159, 'Admin', '0225', 'labu manis', 1, 6, 7200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090159_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090160, 'Admin', '0224', 'laos', 1, 6, 8700, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090160_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090161, 'Admin', '0223', 'lobak', 1, 6, 12300, 500, 'Ada', '0', ' harga persetengah kg an', 'foto_2005090161_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090162, 'Admin', '0222', 'lombok hijau besar', 1, 6, 9700, 500, 'Ada', '0', 'harga per setengah kg', 'foto_2005090162_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090163, 'Admin', '0221', 'lombok hijau kecil', 1, 6, 2100, 100, 'Ada', '0', ' harga per ons', 'foto_2005090163_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090164, 'Admin', '0220', 'lombok merah besar', 1, 6, 9700, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090164_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090165, 'Admin', '0219', 'lombok merah kerinting', 1, 6, 9700, 500, 'Ada', '0', ' Harga persetengah kg', 'foto_2005090165_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090166, 'Admin', '0219', 'mentimun acar atau salat ', 1, 6, 4200, 500, 'Ada', '0', ' Harga per setengah kg', 'foto_2005090166_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090167, 'Admin', '0219', 'mentimun besar', 1, 6, 2600, 500, 'Ada', '0', ' Harga persetengah kg', 'foto_2005090167_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090168, 'Admin', '0218', 'paprika 3 warna', 1, 6, 15200, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090168_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090169, 'Admin', '0217', 'paprika hijau', 1, 6, 16700, 500, 'Ada', '0', ' harga persetengah kg', 'foto_2005090169_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090170, 'Admin', '0216', 'paprika kuning', 1, 6, 16700, 500, 'Ada', '0', ' harga persetangh kg', 'foto_2005090170_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090171, 'Admin', '0215', 'paprika merah', 1, 6, 16700, 500, 'Ada', '0', ' harga persetegah kg', 'foto_2005090171_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090172, 'Admin', '0214', 'pare', 1, 6, 4700, 500, 'Ada', '0', ' harga persengah kg', 'foto_2005090172_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090173, 'Admin', '0213', 'rawit merah', 1, 6, 2100, 100, 'Ada', '0', ' harga per ons', 'foto_2005090173_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090174, 'Admin', '0212', 'sawi daging', 1, 6, 4200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090174_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090175, 'Admin', '0211', 'sawi', 1, 6, 4200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090175_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090176, 'Admin', '0210', 'slada kriting', 1, 6, 170, 100, 'Ada', '0', ' harga per ons', 'foto_2005090176_1.jpg', '', '', 10000, NULL, 11, 255, 0, 0),
(2005090177, 'Admin', '0209', 'terong hijau', 1, 6, 3200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090177_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090178, 'Admin', '0208', 'terong ungu', 1, 6, 4700, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090178_1.jpg', '', '', 49999, NULL, 11, 255, 0, 0),
(2005090179, 'Admin', '0207', 'tomat buah', 1, 6, 6700, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090179_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090180, 'Admin', '0206', 'tomat kecil hijau', 1, 6, 5200, 500, 'Ada', '0', ' harga per 500 gram', 'foto_2005090180_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090181, 'Admin', '0205', 'tomat sambel (kecil)', 1, 6, 5200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090181_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090182, 'Admin', '0204', 'ucet', 1, 6, 5200, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090182_1.jpg', '', '', 50000, NULL, 11, 255, 0, 0),
(2005090183, 'Admin', '0203', 'wortel manis', 1, 6, 10500, 500, 'Ada', '0', ' harga per setengah kg', 'foto_2005090183_1.jpg', '', '', 5000000, NULL, 11, 255, 0, 0),
(2005090184, 'Admin', '0202', 'wortel lokal', 1, 6, 6600, 500, 'Ada', '0', ' satuan i/2 kg', 'foto_2005090184_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090185, 'Admin', '0314', 'arlene', 1, 13, 1, 1, 'Ada', '0', ' pak', 'foto_2005090185_1.jpg', '', '', 9, NULL, 11, 255, 0, 0),
(2005090186, 'Admin', '0313', 'danco 400 gram', 1, 13, 1, 1, 'Ada', '0', ' pak ', 'foto_2005090186_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090187, 'Admin', '0312', 'danco', 1, 13, 1, 1, 'Ada', '0', ' pak', 'foto_2005090187_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090189, 'Admin', '0311', 'kopimate', 1, 13, 1, 1, 'Ada', '0', ' pak', 'foto_2005090189_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090190, 'Admin', '0310', 'max cream', 1, 13, 1, 1, 'Ada', '0', '1 pak ', 'foto_2005090190_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090191, 'Admin', '0202', 'minyak gorang tropic', 1, 6, 1, 1000, 'Ada', '0', ' minyak goreng botol plastik', 'foto_2005090191_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090192, 'Admin', '0309', 'pudding haan', 1, 13, 1, 1, 'Ada', '0', ' 1 pak pudding mix coklat/ manggo', 'foto_2005090192_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090193, 'Admin', '0308', 'dancow coklat sachet kecil', 1, 13, 1, 1, 'Ada', '0', '1 renteng isi 10 sachet', 'foto_2005090193_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090194, 'Admin', '0307', 'jahe keraton', 1, 13, 1, 1, 'Ada', '0', ' 1 pak isi 8 sachet', 'foto_2005090194_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090195, 'Admin', '0306', 'teh 999', 1, 13, 1, 1, 'Ada', '0', ' ', 'foto_2005090195_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090196, 'Admin', '0305', 'teh bandulan', 1, 13, 1, 1, 'Ada', '0', ' ', 'foto_2005090196_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090197, 'Admin', '0304', 'teh naga rajang', 1, 13, 1, 1, 'Ada', '0', ' ', 'foto_2005090197_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090198, 'Admin', '0303', 'teh satu', 1, 13, 1, 1, 'Ada', '0', ' ', 'foto_2005090198_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090199, 'Admin', '0302', 'torabica capucino ', 1, 13, 1, 200, 'Ada', '0', ' 1 renteng 10 sachet', 'foto_2005090199_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090200, 'Admin', '0201', 'minyak tropical', 1, 6, 1, 1000, 'Ada', '0', ' minyak tropical botol plastik', 'foto_2005090200_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090201, 'Admin', '0301', 'nutrisari saset', 1, 13, 1, 200, 'Ada', '0', ' nutri sari sachet, isi 10', 'foto_2005090201_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090202, 'Admin', '0103', 'chiken rice burger', 1, 6, 10, 170, 'Ada', '0', ' nasi dan daging burger ayam, sayur', 'foto_2005090202_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090203, 'Admin', '0102', 'mie reguler bungkus atau mie reguler cup', 1, 6, 15, 200, 'Ada', '0', 'mie pangsit, ayam ', 'foto_2005090203_1.jpg', '', '', 10, NULL, 11, 255, 0, 0),
(2005090204, 'Admin', '0101', 'nasi goreng hongkong', 1, 6, 18, 200, 'Ada', '0', 'nasi goreng hongkong, sayur mix, telur , daging ayam, udang ', 'foto_2005090204_1.jpg', '', '', 11, NULL, 11, 255, 0, 0),
(2106070001, 'Admin', '20004577684', 'Dress Cantik', 1, 6, 2000, 100, 'Kosong', NULL, 'baju dress wanita cantik', 'foto_2106070001_1.JPG', '', '', 0, NULL, 11, 255, 0, 1000);
INSERT INTO `produk` (`id_produk`, `id_user`, `kode_produk`, `nama_produk`, `id_menu`, `kategori_produk`, `harga`, `berat`, `stok_produk`, `ket`, `deskripsi`, `foto_produk1`, `foto_produk2`, `foto_produk3`, `jumlah_stok`, `jumlah_terjual`, `provinsi`, `kota`, `validasi`, `pajak`) VALUES
(2106210001, 'Admin', '7341642887', 'Slondok Super', 1, 11, 20000, 100, 'Ada', NULL, ' Kripik Slondok Singkong Renyah, Gurih, Nikmat', 'foto_2106210001_1.png', 'foto_2106210001_2.jpg', 'foto_2106210001_3.png', 20, NULL, 11, 255, 0, 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `slider`
--

CREATE TABLE `slider` (
  `id_slider` int(11) NOT NULL,
  `gambar` varchar(256) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `slider`
--

INSERT INTO `slider` (`id_slider`, `gambar`) VALUES
(26, 'slider_1590634804.jpg'),
(27, 'slider_1623077558.jpg'),
(30, 'slider_1623646849.jpg');

-- --------------------------------------------------------

--
-- Struktur dari tabel `status_order`
--

CREATE TABLE `status_order` (
  `id_status` int(11) NOT NULL,
  `desk_status` varchar(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `submenu`
--

CREATE TABLE `submenu` (
  `id_sub` int(11) NOT NULL,
  `nama_sub` varchar(50) NOT NULL,
  `mainmenu_idmenu` int(11) NOT NULL,
  `active_sub` varchar(20) NOT NULL,
  `icon_class` varchar(100) NOT NULL,
  `link_sub` varchar(50) NOT NULL,
  `sub_akses` varchar(12) NOT NULL,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entry_user` varchar(20) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_akses_mainmenu`
--

CREATE TABLE `tab_akses_mainmenu` (
  `id` int(11) NOT NULL,
  `id_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `c` int(11) DEFAULT 0,
  `r` int(11) DEFAULT 0,
  `u` int(11) DEFAULT 0,
  `d` int(11) DEFAULT 0,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entry_user` varchar(50) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tab_akses_mainmenu`
--

INSERT INTO `tab_akses_mainmenu` (`id`, `id_menu`, `id_level`, `c`, `r`, `u`, `d`, `entry_date`, `entry_user`) VALUES
(1, 1, 1, NULL, 1, NULL, NULL, '2017-09-25 04:49:01', 'direktur'),
(2, 2, 1, 0, 1, 0, 0, '2018-09-24 03:18:10', ''),
(23, 3, 1, 0, 1, 0, 0, '2018-09-24 06:04:05', ''),
(24, 4, 1, 0, 1, 0, 0, '2018-09-24 08:27:24', ''),
(25, 5, 1, 0, 1, 0, 0, '2018-09-24 08:37:15', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tab_akses_submenu`
--

CREATE TABLE `tab_akses_submenu` (
  `id` int(11) NOT NULL,
  `id_sub_menu` int(11) NOT NULL,
  `id_level` int(11) NOT NULL,
  `c` int(11) DEFAULT 0,
  `r` int(11) DEFAULT 0,
  `u` int(11) DEFAULT 0,
  `d` int(11) DEFAULT 0,
  `entry_date` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `entry_user` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_about`
--

CREATE TABLE `tb_about` (
  `id_about` int(11) NOT NULL,
  `about_logo` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `about_deskripsi` text CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `about_title_meta` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `about_deskripsi_meta` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `about_keyword_meta` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_about`
--

INSERT INTO `tb_about` (`id_about`, `about_logo`, `about_deskripsi`, `id_admin`, `about_title_meta`, `about_deskripsi_meta`, `about_keyword_meta`) VALUES
(1, 'logo2.png', 'MauGrafika adalah...', 1, '', '', '');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_event`
--

CREATE TABLE `tb_event` (
  `id_event` varchar(20) NOT NULL,
  `value` int(255) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_event`
--

INSERT INTO `tb_event` (`id_event`, `value`) VALUES
('1', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_foto`
--

CREATE TABLE `tb_foto` (
  `id_gallery` int(11) NOT NULL,
  `gallery_nama` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `gallery_gambar` varchar(30) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `id_admin` int(11) DEFAULT NULL,
  `id_album` int(11) DEFAULT NULL,
  `gallery_title_meta` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `gallery_deskripsi_meta` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL,
  `gallery_keyword_meta` varchar(200) CHARACTER SET latin1 COLLATE latin1_general_ci DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_foto`
--

INSERT INTO `tb_foto` (`id_gallery`, `gallery_nama`, `gallery_gambar`, `id_admin`, `id_album`, `gallery_title_meta`, `gallery_deskripsi_meta`, `gallery_keyword_meta`) VALUES
(1, 'Paket', '1.jpg', NULL, 1, NULL, NULL, NULL),
(2, 'Paket', '2.jpg', NULL, 1, NULL, NULL, NULL),
(3, 'Paket', '3.jpg', NULL, 1, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_kontak`
--

CREATE TABLE `tb_kontak` (
  `id_kontak` int(11) NOT NULL,
  `kontak_lat` varchar(100) DEFAULT NULL,
  `kontak_long` varchar(100) DEFAULT NULL,
  `kontak_deskripsi` text DEFAULT NULL,
  `kontak_judul` varchar(30) DEFAULT NULL,
  `kontak_title_meta` varchar(200) DEFAULT NULL,
  `kontak_deskripsi_meta` text DEFAULT NULL,
  `kontak_keyword_meta` varchar(200) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `tb_kontak`
--

INSERT INTO `tb_kontak` (`id_kontak`, `kontak_lat`, `kontak_long`, `kontak_deskripsi`, `kontak_judul`, `kontak_title_meta`, `kontak_deskripsi_meta`, `kontak_keyword_meta`) VALUES
(1, '-7.9735745', '112.658746', 'Mau Grafika Terletak di ......', NULL, NULL, NULL, NULL);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tema`
--

CREATE TABLE `tema` (
  `id_tema` int(11) NOT NULL,
  `tema` varchar(50) NOT NULL,
  `nama_tema` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tema`
--

INSERT INTO `tema` (`id_tema`, `tema`, `nama_tema`) VALUES
(1, '', 'skin-black');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_detail_pengiriman`
--

CREATE TABLE `t_detail_pengiriman` (
  `id_detail_pengiriman` int(11) NOT NULL,
  `id_detail_order` int(11) NOT NULL,
  `tanggal_konfirmasi` date NOT NULL,
  `tanggal_kirim` date DEFAULT NULL,
  `status_kadaluarsa` int(1) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `t_detail_pengiriman`
--

INSERT INTO `t_detail_pengiriman` (`id_detail_pengiriman`, `id_detail_order`, `tanggal_konfirmasi`, `tanggal_kirim`, `status_kadaluarsa`) VALUES
(2, 2, '2017-01-31', '2017-01-31', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` varchar(20) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `email` varchar(30) NOT NULL,
  `level` varchar(30) NOT NULL,
  `status` varchar(1) NOT NULL,
  `foto` text DEFAULT NULL,
  `password` varchar(100) NOT NULL,
  `provinsi` varchar(50) NOT NULL,
  `kota` varchar(50) NOT NULL,
  `id_ongkir` int(11) NOT NULL,
  `aktif_user` tinyint(1) NOT NULL,
  `nama_rek_user` varchar(255) NOT NULL,
  `no_rek_user` varchar(255) NOT NULL,
  `bank_rek_user` varchar(255) NOT NULL,
  `view_password` varchar(100) DEFAULT NULL,
  `admin_level` int(11) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `nama`, `email`, `level`, `status`, `foto`, `password`, `provinsi`, `kota`, `id_ongkir`, `aktif_user`, `nama_rek_user`, `no_rek_user`, `bank_rek_user`, `view_password`, `admin_level`) VALUES
('Jess', 'Jess', 'jess-kun@gmail.com', 'member', '', NULL, '4337fb150cbc24bd1842fb3b8f828a6c', 'Jawa Timur', 'Malang', 255, 1, 'Jess', '0900841', 'BRI', NULL, NULL),
('Yeremia', 'Jess', 'jess', 'member', '', '1', '4337fb150cbc24bd1842fb3b8f828a6c', 'Jawa Timur', 'Malang', 256, 1, 'Yeremia', '021312', 'BRI', NULL, NULL);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_kecamatan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_kecamatan` (
`id_kecamatan` int(11)
,`id_kota_fk` int(11)
,`nama_kecamatan` varchar(60)
,`id_kota` int(11)
,`nama_kota` varchar(50)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `vw_kelurahan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `vw_kelurahan` (
`id_kelurahan` int(11)
,`id_kecamatan_fk` int(11)
,`nama_kelurahan` varchar(60)
,`id_kecamatan` int(11)
,`nama_kecamatan` varchar(60)
);

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_kecamatan`
--
DROP TABLE IF EXISTS `vw_kecamatan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_kecamatan`  AS SELECT `kecamatan`.`id_kecamatan` AS `id_kecamatan`, `kecamatan`.`id_kota_fk` AS `id_kota_fk`, `kecamatan`.`nama_kecamatan` AS `nama_kecamatan`, `kota`.`id_kota` AS `id_kota`, `kota`.`nama_kota` AS `nama_kota` FROM (`kecamatan` join `kota` on(`kecamatan`.`id_kota_fk` = `kota`.`id_kota`)) ;

-- --------------------------------------------------------

--
-- Struktur untuk view `vw_kelurahan`
--
DROP TABLE IF EXISTS `vw_kelurahan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `vw_kelurahan`  AS SELECT `kelurahan`.`id_kelurahan` AS `id_kelurahan`, `kelurahan`.`id_kecamatan_fk` AS `id_kecamatan_fk`, `kelurahan`.`nama_kelurahan` AS `nama_kelurahan`, `kecamatan`.`id_kecamatan` AS `id_kecamatan`, `kecamatan`.`nama_kecamatan` AS `nama_kecamatan` FROM (`kelurahan` join `kecamatan` on(`kelurahan`.`id_kecamatan_fk` = `kecamatan`.`id_kecamatan`)) ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `admin`
--
ALTER TABLE `admin`
  ADD PRIMARY KEY (`id_admin`);

--
-- Indeks untuk tabel `daerah_kirim`
--
ALTER TABLE `daerah_kirim`
  ADD PRIMARY KEY (`id_daerah_kirim`);

--
-- Indeks untuk tabel `data_bank`
--
ALTER TABLE `data_bank`
  ADD PRIMARY KEY (`id_data`);

--
-- Indeks untuk tabel `data_refund`
--
ALTER TABLE `data_refund`
  ADD PRIMARY KEY (`id_refund`);

--
-- Indeks untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indeks untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  ADD PRIMARY KEY (`id_detail_pengiriman`);

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id_jadwal`);

--
-- Indeks untuk tabel `jam_kirim`
--
ALTER TABLE `jam_kirim`
  ADD PRIMARY KEY (`id_jam`);

--
-- Indeks untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  ADD PRIMARY KEY (`id_kategori_produk`);

--
-- Indeks untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD PRIMARY KEY (`id_kecamatan`),
  ADD KEY `id_kota_fk` (`id_kota_fk`);

--
-- Indeks untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD PRIMARY KEY (`id_kelurahan`),
  ADD KEY `id_kecamatan_fk` (`id_kecamatan_fk`),
  ADD KEY `id_kota_fk` (`id_kota_fk`);

--
-- Indeks untuk tabel `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `klaim_detail_order`
--
ALTER TABLE `klaim_detail_order`
  ADD PRIMARY KEY (`id_detail_order`);

--
-- Indeks untuk tabel `komplain_barang`
--
ALTER TABLE `komplain_barang`
  ADD PRIMARY KEY (`id_komplain`);

--
-- Indeks untuk tabel `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
  ADD PRIMARY KEY (`id_konfirmasi`);

--
-- Indeks untuk tabel `konfirmasi_penerimaan`
--
ALTER TABLE `konfirmasi_penerimaan`
  ADD PRIMARY KEY (`id_penerimaan`);

--
-- Indeks untuk tabel `konfirmasi_pengembalian_produk`
--
ALTER TABLE `konfirmasi_pengembalian_produk`
  ADD PRIMARY KEY (`id_konfirmasi_pengembalian_produk`);

--
-- Indeks untuk tabel `konten`
--
ALTER TABLE `konten`
  ADD PRIMARY KEY (`id_konten`);

--
-- Indeks untuk tabel `kota`
--
ALTER TABLE `kota`
  ADD PRIMARY KEY (`id_kota`),
  ADD UNIQUE KEY `nama_kota` (`nama_kota`);

--
-- Indeks untuk tabel `logo`
--
ALTER TABLE `logo`
  ADD PRIMARY KEY (`id_logo`);

--
-- Indeks untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  ADD PRIMARY KEY (`id_log`);

--
-- Indeks untuk tabel `mainmenu`
--
ALTER TABLE `mainmenu`
  ADD PRIMARY KEY (`seq`);

--
-- Indeks untuk tabel `menu`
--
ALTER TABLE `menu`
  ADD PRIMARY KEY (`id_menu`);

--
-- Indeks untuk tabel `ongkir_pembeli`
--
ALTER TABLE `ongkir_pembeli`
  ADD PRIMARY KEY (`id_ongkir`);

--
-- Indeks untuk tabel `order`
--
ALTER TABLE `order`
  ADD PRIMARY KEY (`id_order`);

--
-- Indeks untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  ADD PRIMARY KEY (`id_pemasukan`);

--
-- Indeks untuk tabel `produk`
--
ALTER TABLE `produk`
  ADD PRIMARY KEY (`id_produk`);

--
-- Indeks untuk tabel `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id_slider`);

--
-- Indeks untuk tabel `status_order`
--
ALTER TABLE `status_order`
  ADD PRIMARY KEY (`id_status`);

--
-- Indeks untuk tabel `submenu`
--
ALTER TABLE `submenu`
  ADD PRIMARY KEY (`id_sub`);

--
-- Indeks untuk tabel `tab_akses_mainmenu`
--
ALTER TABLE `tab_akses_mainmenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tab_akses_submenu`
--
ALTER TABLE `tab_akses_submenu`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  ADD PRIMARY KEY (`id_about`);

--
-- Indeks untuk tabel `tb_event`
--
ALTER TABLE `tb_event`
  ADD PRIMARY KEY (`id_event`);

--
-- Indeks untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  ADD PRIMARY KEY (`id_gallery`);

--
-- Indeks untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  ADD PRIMARY KEY (`id_kontak`);

--
-- Indeks untuk tabel `tema`
--
ALTER TABLE `tema`
  ADD PRIMARY KEY (`id_tema`);

--
-- Indeks untuk tabel `t_detail_pengiriman`
--
ALTER TABLE `t_detail_pengiriman`
  ADD PRIMARY KEY (`id_detail_pengiriman`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `admin`
--
ALTER TABLE `admin`
  MODIFY `id_admin` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `daerah_kirim`
--
ALTER TABLE `daerah_kirim`
  MODIFY `id_daerah_kirim` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `data_bank`
--
ALTER TABLE `data_bank`
  MODIFY `id_data` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `data_refund`
--
ALTER TABLE `data_refund`
  MODIFY `id_refund` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `detail_order`
--
ALTER TABLE `detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=88;

--
-- AUTO_INCREMENT untuk tabel `detail_pengiriman`
--
ALTER TABLE `detail_pengiriman`
  MODIFY `id_detail_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- AUTO_INCREMENT untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  MODIFY `id_jadwal` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT untuk tabel `jam_kirim`
--
ALTER TABLE `jam_kirim`
  MODIFY `id_jam` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT untuk tabel `kategori_produk`
--
ALTER TABLE `kategori_produk`
  MODIFY `id_kategori_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  MODIFY `id_kecamatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  MODIFY `id_kelurahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `keranjang_belanja`
--
ALTER TABLE `keranjang_belanja`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=151;

--
-- AUTO_INCREMENT untuk tabel `klaim_detail_order`
--
ALTER TABLE `klaim_detail_order`
  MODIFY `id_detail_order` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `komplain_barang`
--
ALTER TABLE `komplain_barang`
  MODIFY `id_komplain` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_bayar`
--
ALTER TABLE `konfirmasi_bayar`
  MODIFY `id_konfirmasi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=35;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_penerimaan`
--
ALTER TABLE `konfirmasi_penerimaan`
  MODIFY `id_penerimaan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `konfirmasi_pengembalian_produk`
--
ALTER TABLE `konfirmasi_pengembalian_produk`
  MODIFY `id_konfirmasi_pengembalian_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `kota`
--
ALTER TABLE `kota`
  MODIFY `id_kota` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT untuk tabel `logo`
--
ALTER TABLE `logo`
  MODIFY `id_logo` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `log_aktivitas`
--
ALTER TABLE `log_aktivitas`
  MODIFY `id_log` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=39;

--
-- AUTO_INCREMENT untuk tabel `mainmenu`
--
ALTER TABLE `mainmenu`
  MODIFY `seq` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `menu`
--
ALTER TABLE `menu`
  MODIFY `id_menu` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `ongkir_pembeli`
--
ALTER TABLE `ongkir_pembeli`
  MODIFY `id_ongkir` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT untuk tabel `pemasukan`
--
ALTER TABLE `pemasukan`
  MODIFY `id_pemasukan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `produk`
--
ALTER TABLE `produk`
  MODIFY `id_produk` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2106210002;

--
-- AUTO_INCREMENT untuk tabel `slider`
--
ALTER TABLE `slider`
  MODIFY `id_slider` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=31;

--
-- AUTO_INCREMENT untuk tabel `status_order`
--
ALTER TABLE `status_order`
  MODIFY `id_status` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `submenu`
--
ALTER TABLE `submenu`
  MODIFY `id_sub` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tab_akses_mainmenu`
--
ALTER TABLE `tab_akses_mainmenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT untuk tabel `tab_akses_submenu`
--
ALTER TABLE `tab_akses_submenu`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_about`
--
ALTER TABLE `tb_about`
  MODIFY `id_about` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_foto`
--
ALTER TABLE `tb_foto`
  MODIFY `id_gallery` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_kontak`
--
ALTER TABLE `tb_kontak`
  MODIFY `id_kontak` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tema`
--
ALTER TABLE `tema`
  MODIFY `id_tema` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `t_detail_pengiriman`
--
ALTER TABLE `t_detail_pengiriman`
  MODIFY `id_detail_pengiriman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `kecamatan`
--
ALTER TABLE `kecamatan`
  ADD CONSTRAINT `kecamatan_ibfk_1` FOREIGN KEY (`id_kota_fk`) REFERENCES `kota` (`id_kota`) ON DELETE CASCADE;

--
-- Ketidakleluasaan untuk tabel `kelurahan`
--
ALTER TABLE `kelurahan`
  ADD CONSTRAINT `kelurahan_ibfk_1` FOREIGN KEY (`id_kecamatan_fk`) REFERENCES `kecamatan` (`id_kecamatan`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
