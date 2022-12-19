-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 19 Des 2022 pada 11.27
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 7.4.29

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `inventaris`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(128) DEFAULT NULL,
  `id_penerbit` int(11) DEFAULT NULL,
  `tahun_terbit` char(4) DEFAULT NULL,
  `penulis` varchar(128) DEFAULT NULL,
  `isbn` varchar(20) DEFAULT NULL,
  `id_kategori` int(11) DEFAULT NULL,
  `tgl_input` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `id_penerbit`, `tahun_terbit`, `penulis`, `isbn`, `id_kategori`, `tgl_input`) VALUES
(1, 'Detektif Conan', 1, '2020', 'Aoyama Gosho', '9786230015731', 1, '2020-05-14'),
(2, 'Koleksi Program Web PHP', 1, '2020', 'YUNIAR SUPARDI &amp; IRWAN KURNIAWAN, S.KOM.', '9786230014994', 5, '2020-05-14'),
(3, 'Si Kancil &amp; Teman-Temannya', 2, '2019', 'Mulasih &amp; Nafika', ' 9786237046271', 3, '2020-05-14'),
(7, 'Pintar Microsoft Office', 4, '2020', 'Aladin Isyawan', '9786230014000Y', 5, '2020-05-19'),
(8, 'Jadi Youtuber', 1, '2018', 'Popeye', '9786230014000ZX', 5, '2020-05-19'),
(14, 'aji', 2, '223', 'aji', 'aji', 3, '2022-11-26'),
(17, 'ghj', 3, '12', 'ghjk', 'fghjk', 1, '2022-11-26'),
(18, 'aji', 2, '2022', 'aji', 'aji', 2, '2022-11-27');

-- --------------------------------------------------------

--
-- Struktur dari tabel `data_barang`
--

CREATE TABLE `data_barang` (
  `id` int(5) NOT NULL,
  `kode_barang` varchar(13) NOT NULL,
  `nama_barang` varchar(100) NOT NULL,
  `tipe_barang` varchar(250) NOT NULL,
  `jmlh_stok` int(3) NOT NULL,
  `lokasi` varchar(100) NOT NULL,
  `tgl_regist` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `data_barang`
--

INSERT INTO `data_barang` (`id`, `kode_barang`, `nama_barang`, `tipe_barang`, `jmlh_stok`, `lokasi`, `tgl_regist`) VALUES
(16, 'spm-00001-001', 'aji', 'aji', 4, 'aji', '2022-12-06'),
(17, '13537-301', 'Konklux', '0.3.3', 0, 'SA', '2022-12-09'),
(18, '54575-914', 'Konklux', '0.76', 0, 'EU', '0000-00-00'),
(19, '36987-2382', 'Alpha', '1.3.5', 2, 'NA', '0000-00-00'),
(20, '68791-101', 'Alpha', '8.4.8', 4, 'NA', '0000-00-00'),
(21, '67457-524', 'Asoka', '0.95', 5, 'NA', '0000-00-00'),
(22, '36800-282', 'Stronghold', '0.83', 6, 'AS', '0000-00-00'),
(23, '0187-1824', 'Holdlamis', '0.74', 7, 'NA', '0000-00-00'),
(24, '55154-1458', 'Lotstring', '1.1.1', 8, 'AF', '0000-00-00'),
(25, '66336-602', 'Asoka', '0.49', 9, 'OC', '0000-00-00'),
(26, '50436-3988', 'Fixflex', '0.57', 10, 'OC', '0000-00-00'),
(27, '0143-9716', 'Ronstring', '0.3.9', 11, 'EU', '0000-00-00'),
(28, '54868-4253', 'Y-find', '8.04', 12, 'AS', '0000-00-00'),
(29, '68084-758', 'Konklab', '0.5.8', 13, 'OC', '0000-00-00'),
(30, '36987-2356', 'Tampflex', '0.16', 14, 'AF', '0000-00-00'),
(31, '52584-196', 'Tin', '6.0.0', 15, 'AS', '0000-00-00'),
(32, '64980-306', 'Job', '0.90', 16, 'SA', '0000-00-00'),
(33, '16714-296', 'Cookley', '3.1', 17, 'SA', '0000-00-00'),
(34, '41520-431', 'Flexidy', '7.0.8', 18, 'AS', '0000-00-00'),
(35, '68428-065', 'Vagram', '0.1.4', 19, 'NA', '0000-00-00'),
(36, '60512-1030', 'Asoka', '3.7.3', 20, 'EU', '0000-00-00'),
(37, '49981-023', 'Fix San', '8.7.1', 21, 'AS', '0000-00-00'),
(38, '59886-351', 'Tresom', '5.50', 22, 'SA', '0000-00-00'),
(39, '42192-103', 'Stringtough', '2.1.4', 23, 'NA', '0000-00-00'),
(40, '51079-621', 'Viva', '0.56', 24, 'EU', '0000-00-00'),
(41, '50845-0085', 'Zathin', '3.6', 25, 'NA', '0000-00-00'),
(42, '54118-7188', 'Zoolab', '0.1.2', 26, 'NA', '0000-00-00'),
(43, '55154-2431', 'Hatity', '0.4.5', 27, 'SA', '0000-00-00'),
(44, '29500-9091', 'Tempsoft', '4.82', 28, 'NA', '0000-00-00'),
(45, '55154-2080', 'Viva', '0.8.7', 29, 'EU', '0000-00-00'),
(46, '49035-179', 'Cookley', '9.7', 30, 'AS', '0000-00-00'),
(47, '63187-164', 'Flowdesk', '0.6.9', 31, 'NA', '0000-00-00'),
(48, '14783-246', 'Cookley', '6.7', 32, 'OC', '0000-00-00'),
(49, '98132-155', 'Bigtax', '5.71', 33, 'AF', '0000-00-00'),
(50, '52959-776', 'Asoka', '2.15', 34, 'AF', '0000-00-00'),
(51, '10742-8541', 'Home Ing', '2.4', 35, 'EU', '0000-00-00'),
(52, '44206-310', 'Namfix', '4.21', 36, 'NA', '0000-00-00'),
(53, '67345-6086', 'Tresom', '2.88', 37, 'AF', '0000-00-00'),
(54, '68428-126', 'Latlux', '4.4.9', 38, 'NA', '0000-00-00'),
(55, '10967-584', 'Bigtax', '3.86', 39, 'NA', '0000-00-00'),
(56, '57605-0002', 'Y-Solowarm', '0.3.9', 40, 'SA', '0000-00-00'),
(57, '54868-6407', 'Voyatouch', '6.2', 41, 'OC', '0000-00-00'),
(58, '42002-213', 'Viva', '4.4.9', 42, 'NA', '0000-00-00'),
(59, '59630-074', 'Zamit', '1.4.6', 43, 'EU', '0000-00-00'),
(60, '36987-2882', 'Bigtax', '3.6', 44, 'SA', '0000-00-00'),
(61, '54569-0843', 'Redhold', '2.63', 45, 'AF', '0000-00-00'),
(62, '36987-2226', 'Ventosanzap', '7.1', 46, 'NA', '0000-00-00'),
(63, '43353-827', 'Viva', '6.4.0', 47, 'NA', '0000-00-00'),
(64, '0363-1009', 'Treeflex', '0.5.4', 48, 'AS', '0000-00-00'),
(65, '49288-0058', 'Tin', '4.5', 49, 'EU', '0000-00-00'),
(66, '54569-2655', 'Sonsing', '0.22', 50, 'OC', '0000-00-00'),
(67, '36987-2285', 'Stim', '0.7.1', 51, 'SA', '0000-00-00'),
(68, '37205-855', 'Sub-Ex', '1.31', 52, 'OC', '0000-00-00'),
(69, '51511-514', 'Quo Lux', '0.6.6', 53, 'OC', '0000-00-00'),
(70, '21130-974', 'Transcof', '5.01', 54, 'AS', '0000-00-00'),
(71, '16781-389', 'Transcof', '0.7.3', 55, 'SA', '0000-00-00'),
(72, '49349-890', 'Ronstring', '0.56', 56, 'EU', '0000-00-00'),
(73, '53808-0243', 'Tempsoft', '0.54', 57, 'NA', '0000-00-00'),
(74, '41167-7516', 'Prodder', '5.98', 58, 'OC', '0000-00-00'),
(75, '37012-194', 'Duobam', '0.8.3', 59, 'AF', '0000-00-00'),
(76, '57337-013', 'Lotstring', '0.4.0', 60, 'AS', '0000-00-00'),
(77, '61722-061', 'Asoka', '0.6.2', 61, 'EU', '0000-00-00'),
(78, '21695-235', 'Daltfresh', '4.7', 62, 'AS', '0000-00-00'),
(79, '0093-5552', 'Zamit', '9.82', 63, 'EU', '0000-00-00'),
(80, '55154-0659', 'Opela', '3.3.4', 64, 'NA', '0000-00-00'),
(81, '49738-189', 'Ventosanzap', '9.3.7', 65, 'EU', '0000-00-00'),
(82, '0078-0538', 'Y-find', '7.0.6', 66, 'SA', '0000-00-00'),
(83, '52125-440', 'Latlux', '0.4.8', 67, 'AF', '0000-00-00'),
(84, '37012-089', 'Cookley', '0.7.7', 68, 'SA', '0000-00-00'),
(85, '75878-003', 'Bitchip', '3.6', 69, 'SA', '0000-00-00'),
(86, '10578-044', 'Aerified', '0.2.1', 70, 'AS', '0000-00-00'),
(87, '0052-0602', 'Asoka', '0.99', 71, 'EU', '0000-00-00'),
(88, '63629-1561', 'Greenlam', '6.5.7', 72, 'AS', '0000-00-00'),
(89, '46122-193', 'Keylex', '2.7', 73, 'NA', '0000-00-00'),
(90, '0054-3566', 'Stim', '6.96', 74, 'AF', '0000-00-00'),
(91, '53113-218', 'Flowdesk', '7.5.3', 75, 'AS', '0000-00-00'),
(92, '36800-185', 'Keylex', '0.33', 76, 'AS', '0000-00-00'),
(93, '62032-522', 'Keylex', '3.0', 77, 'OC', '0000-00-00'),
(94, '57337-036', 'Viva', '2.8', 78, 'OC', '0000-00-00'),
(95, '0268-6206', 'Prodder', '1.0', 79, 'OC', '0000-00-00'),
(96, '16590-200', 'Konklux', '0.24', 80, 'NA', '0000-00-00'),
(97, '64679-765', 'Cookley', '2.1.6', 81, 'SA', '0000-00-00'),
(98, '61957-1050', 'Tin', '3.7.0', 82, 'AF', '0000-00-00'),
(99, '11410-044', 'Pannier', '0.2.2', 83, 'EU', '0000-00-00'),
(100, '16590-085', 'Lotlux', '7.89', 84, 'OC', '0000-00-00'),
(101, '55910-806', 'Wrapsafe', '1.28', 85, 'AF', '0000-00-00'),
(102, '49514-076', 'Y-find', '9.72', 86, 'SA', '0000-00-00'),
(103, '49035-836', 'Konklux', '0.67', 87, 'EU', '0000-00-00'),
(104, '37808-291', 'Zaam-Dox', '0.6.0', 88, 'OC', '0000-00-00'),
(105, '41520-336', 'Andalax', '5.9.1', 89, 'AS', '0000-00-00'),
(106, '59623-005', 'Home Ing', '0.45', 90, 'NA', '0000-00-00'),
(107, '61666-001', 'Biodex', '1.58', 91, 'AF', '0000-00-00'),
(108, '53329-676', 'Biodex', '8.2', 92, 'EU', '0000-00-00'),
(109, '51514-0308', 'Kanlam', '0.99', 93, 'AS', '0000-00-00'),
(110, '0781-1683', 'Tampflex', '0.22', 94, 'NA', '0000-00-00'),
(111, '60512-6534', 'Fintone', '9.17', 95, 'AS', '0000-00-00'),
(112, '64058-615', 'Viva', '6.4.6', 96, 'NA', '0000-00-00'),
(113, '42681-0508', 'Fintone', '0.89', 97, 'OC', '0000-00-00'),
(114, '68382-319', 'Bitwolf', '8.4.5', 98, 'NA', '0000-00-00'),
(115, '54868-1871', 'Redhold', '7.3.2', 99, 'OC', '0000-00-00'),
(116, '60512-8011', 'Aerified', '9.9.0', 100, 'NA', '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `departement`
--

CREATE TABLE `departement` (
  `id_departement` int(5) NOT NULL,
  `nama_departement` varchar(100) NOT NULL,
  `no_tlp` int(5) NOT NULL,
  `keterangan` varchar(250) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `departement`
--

INSERT INTO `departement` (`id_departement`, `nama_departement`, `no_tlp`, `keterangan`) VALUES
(7, 'PPIC', 21456789, 'Production Planing Inventory Control - Warehouse'),
(11, 'aji', 34567890, 'dandi'),
(12, 'a', 456, 'a');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategori`
--

CREATE TABLE `kategori` (
  `id` int(11) NOT NULL,
  `nama_kategori` varchar(64) DEFAULT NULL,
  `keterangan` varchar(128) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kategori`
--

INSERT INTO `kategori` (`id`, `nama_kategori`, `keterangan`) VALUES
(1, 'Novel', 'Novel adalah sebuah karya fiksi prosa yang tertulis dan naratif; biasanya dalam bentuk cerita.'),
(2, 'Kamus', 'Kamus adalah buku acuan yg memuat kata dan ungkapan'),
(3, 'Dongeng', 'Dongeng, merupakan suatu kisah yang di angkat dari pemikiran fiktif dan kisah nyata'),
(4, 'Biografi', 'Biografi adalah kisah atau keterangan tentang kehidupan seseorang.'),
(5, 'Komputer', 'Buku yang berhubungan dengan komputer'),
(6, 'Politik', 'Buku tentang politik'),
(10, 'apd', 'beiris apd'),
(11, 'aji', 'aji');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penerbit`
--

CREATE TABLE `penerbit` (
  `id` int(11) NOT NULL,
  `nama_penerbit` varchar(128) DEFAULT NULL,
  `alamat` varchar(128) DEFAULT NULL,
  `no_telp` varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penerbit`
--

INSERT INTO `penerbit` (`id`, `nama_penerbit`, `alamat`, `no_telp`) VALUES
(1, 'Elek Media Komputindo', 'Gedung Kompas-Gramedia Lantai 2, Jl. Palmerah Barat No. 29 – 32', '02153650110'),
(2, 'Andi Publisher', 'Jl. Raya Ceger No. 42', '02184590064'),
(3, 'Gagas Media', 'Jln. H. Montong No. 57, Ciganjur', '02178883030'),
(4, 'Gramedia Widiasarana Indonesia', 'Gd. Kompas Gramedia Unit I, Lt. 3 Jalan Palmerah Barat 33-37', '02153650110'),
(5, 'Erlangga', 'Jl. H. Baping Raya No. 100 Ciracas', '0218717006');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pinjaman`
--

CREATE TABLE `pinjaman` (
  `id_pinjaman` int(11) NOT NULL,
  `id_member` int(11) DEFAULT NULL,
  `tanggal_transaksi` date DEFAULT NULL,
  `tanggal_pinjam` date DEFAULT NULL,
  `lama_pinjam` int(11) DEFAULT NULL,
  `tanggal_kembali` date DEFAULT NULL,
  `denda` int(11) DEFAULT NULL,
  `status_pinjam` enum('Sedang Diproses','Ditolak','Diterima','Selesai') DEFAULT 'Sedang Diproses',
  `catatan_ditolak` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `pinjaman`
--

INSERT INTO `pinjaman` (`id_pinjaman`, `id_member`, `tanggal_transaksi`, `tanggal_pinjam`, `lama_pinjam`, `tanggal_kembali`, `denda`, `status_pinjam`, `catatan_ditolak`) VALUES
(55, 7, '2022-12-19', NULL, 3, NULL, NULL, 'Ditolak', 'salah itu'),
(56, 7, '2022-12-19', '2022-12-19', 3, '2022-12-22', NULL, 'Selesai', NULL),
(57, 23, '2022-12-19', '2022-12-19', 7, '2022-12-26', NULL, 'Selesai', NULL),
(58, 23, '2022-12-19', '2022-12-19', 3, '2022-12-22', NULL, 'Selesai', NULL),
(59, 7, '2022-12-19', '2022-12-19', 3, '2022-12-22', NULL, 'Selesai', NULL);

--
-- Trigger `pinjaman`
--
DELIMITER $$
CREATE TRIGGER `penambahan_stok_statusSelesai` AFTER UPDATE ON `pinjaman` FOR EACH ROW BEGIN
    SET @status_baru = new.status_pinjam;
    
    IF @status_baru='Selesai' THEN
    UPDATE data_barang inner JOIN tb_request_barang on tb_request_barang.id_barang=data_barang.id
    SET data_barang.jmlh_stok = data_barang.jmlh_stok+tb_request_barang.jumlah_brg 
    WHERE tb_request_barang.id_pinjaman = old.id_pinjaman;
    END IF;
    
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_request_barang`
--

CREATE TABLE `tb_request_barang` (
  `id_request` int(11) NOT NULL,
  `id_pinjaman` int(11) DEFAULT NULL,
  `id_barang` int(11) DEFAULT NULL,
  `jumlah_brg` char(11) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_request_barang`
--

INSERT INTO `tb_request_barang` (`id_request`, `id_pinjaman`, `id_barang`, `jumlah_brg`) VALUES
(57, 55, 18, '2'),
(58, 55, 17, '1'),
(59, 56, 19, '1'),
(60, 56, 20, '2'),
(61, 57, 21, '3'),
(62, 57, 20, '1'),
(63, 58, 19, '2'),
(64, 58, 20, '3'),
(65, 59, 21, '3'),
(66, 59, 22, '2');

--
-- Trigger `tb_request_barang`
--
DELIMITER $$
CREATE TRIGGER `penambahan_stok_hapusrequest` BEFORE DELETE ON `tb_request_barang` FOR EACH ROW BEGIN
    SET @stok_pinjam = old.jumlah_brg;
    SET @id_baru = old.id_barang;
    
    UPDATE data_barang SET jmlh_stok=jmlh_stok+@stok_pinjam WHERE id=@id_baru;
    END
$$
DELIMITER ;
DELIMITER $$
CREATE TRIGGER `pengurangan_stok` AFTER INSERT ON `tb_request_barang` FOR EACH ROW BEGIN
    SET @stok_pinjam = new.jumlah_brg;
    SET @id_baru = new.id_barang;
    
    update data_barang set jmlh_stok=jmlh_stok-@stok_pinjam where id=@id_baru;
    END
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(32) NOT NULL,
  `password` varchar(128) NOT NULL,
  `role` char(1) DEFAULT NULL,
  `nama` varchar(64) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id`, `username`, `password`, `role`, `nama`) VALUES
(5, 'andikatedja', '$2y$10$lzy5dqf4pJlglsXnso46u.u9.YsHPbk.tnut7LVEa8HKLL/clJUF.', '2', 'Andika Tedja'),
(7, 'aji', '$2y$10$z8cSbLQsstJeZD9vyoyME.KdUu0TxqUh6djTYskOkKVexhAoiEFnS', '2', 'aji'),
(8, 'wahyu', '$2y$10$fFQnxnyAyLDnjdV8DkzxEeg.0s4UeaADbEuvvs.ay1IDvQMgx5Gba', '2', 'wahyu'),
(9, 'anisa', '$2y$10$MiLWXUUZ12SZkr5HpSYxtuvo742Y1FgSrXUTi/DysnzRxacMt8tbG', '2', 'anisa'),
(17, 'dandi', '$2y$10$atmDQweWYfEuFKK51V4DneXTCs7FosuHVWofxGySRipIAoCOXcyy.', '2', 'dandi'),
(18, 'admin', '$2y$10$Yl/LMhZt0OaHVvWLn/Is3uqdU3/bv2fwaGnJBamfktTlC1Cbg5VyW', '1', 'admin'),
(21, 'cok', '$2y$10$0r04R6b1CvK5orAuzajBUOptz6cQ.UvCVNj0EGMuEBTogs/VPWvFW', '1', 'cok'),
(23, 'verania', '$2y$10$jf/FOhp38L819Y3C0o1.2exK2/teFkhXsI57UltL3ap0eakx1Ecj.', '2', 'vera');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_penerbit` (`id_penerbit`),
  ADD KEY `id_kategori` (`id_kategori`);

--
-- Indeks untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `kode_part` (`kode_barang`);

--
-- Indeks untuk tabel `departement`
--
ALTER TABLE `departement`
  ADD PRIMARY KEY (`id_departement`);

--
-- Indeks untuk tabel `kategori`
--
ALTER TABLE `kategori`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD PRIMARY KEY (`id_pinjaman`),
  ADD KEY `id_member` (`id_member`);

--
-- Indeks untuk tabel `tb_request_barang`
--
ALTER TABLE `tb_request_barang`
  ADD PRIMARY KEY (`id_request`),
  ADD KEY `id_barang` (`id_barang`),
  ADD KEY `id_pinjaman` (`id_pinjaman`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `username` (`username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=20;

--
-- AUTO_INCREMENT untuk tabel `data_barang`
--
ALTER TABLE `data_barang`
  MODIFY `id` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=118;

--
-- AUTO_INCREMENT untuk tabel `departement`
--
ALTER TABLE `departement`
  MODIFY `id_departement` int(5) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `kategori`
--
ALTER TABLE `kategori`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `penerbit`
--
ALTER TABLE `penerbit`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  MODIFY `id_pinjaman` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=60;

--
-- AUTO_INCREMENT untuk tabel `tb_request_barang`
--
ALTER TABLE `tb_request_barang`
  MODIFY `id_request` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=67;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD CONSTRAINT `buku_ibfk_1` FOREIGN KEY (`id_penerbit`) REFERENCES `penerbit` (`id`),
  ADD CONSTRAINT `buku_ibfk_2` FOREIGN KEY (`id_kategori`) REFERENCES `kategori` (`id`);

--
-- Ketidakleluasaan untuk tabel `pinjaman`
--
ALTER TABLE `pinjaman`
  ADD CONSTRAINT `pinjaman_ibfk_2` FOREIGN KEY (`id_member`) REFERENCES `users` (`id`);

--
-- Ketidakleluasaan untuk tabel `tb_request_barang`
--
ALTER TABLE `tb_request_barang`
  ADD CONSTRAINT `tb_request_barang_ibfk_1` FOREIGN KEY (`id_barang`) REFERENCES `data_barang` (`id`),
  ADD CONSTRAINT `tb_request_barang_ibfk_2` FOREIGN KEY (`id_pinjaman`) REFERENCES `pinjaman` (`id_pinjaman`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
