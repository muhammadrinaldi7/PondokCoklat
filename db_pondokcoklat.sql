-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1:3306
-- Waktu pembuatan: 06 Des 2023 pada 09.19
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
-- Database: `db_pondokcoklat`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan`
--

CREATE TABLE `bahan` (
  `id_bahan` int(11) NOT NULL,
  `kode_bahan` varchar(10) NOT NULL,
  `nama_bahan` varchar(25) NOT NULL,
  `satuan` varchar(15) NOT NULL,
  `harga` varchar(20) NOT NULL,
  `harga_jual` int(11) NOT NULL,
  `stok` varchar(5) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan`
--

INSERT INTO `bahan` (`id_bahan`, `kode_bahan`, `nama_bahan`, `satuan`, `harga`, `harga_jual`, `stok`) VALUES
(2, 'BRG001', 'Coklat Breze', 'PCS', '7000', 10000, '0'),
(3, 'BRG002', 'Coklat Paradise', 'PCS', '7000', 10000, '0'),
(4, 'BRG003', 'Coklat Mint', 'PCS', '7000', 10000, '0'),
(5, 'BRG004', 'Coklat Latte', 'PCS', '7000', 10000, '-27'),
(6, 'BRG005', 'Coklat Orginal', 'PCS', '7000', 11000, '0'),
(7, 'BRG006', 'Coklat Milko', 'PCS', '7000', 7000, '34'),
(8, 'BRG007', 'Coklat Melted', 'PCS', '7000', 7000, '25'),
(9, 'BRG008', 'Coklat Black Cookies', 'PCS', '7000', 7000, '37'),
(10, 'BRG009', 'Choco Sweet Caramel', 'PCS', '7000', 7000, '17'),
(11, 'BRG010', 'Caramel Crumble', 'PCS', '7000', 10000, '17');

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_keluar`
--

CREATE TABLE `bahan_keluar` (
  `id` int(11) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `nama_bahan` varchar(20) NOT NULL,
  `permintaan` varchar(10) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL,
  `kode_outlet` varchar(10) NOT NULL,
  `total` varchar(10) NOT NULL,
  `tgl_estimasi` datetime DEFAULT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan_keluar`
--

INSERT INTO `bahan_keluar` (`id`, `kode_transaksi`, `id_bahan`, `nama_bahan`, `permintaan`, `tgl_transaksi`, `kode_outlet`, `total`, `tgl_estimasi`, `status`) VALUES
(12, 'TRK001', 2, 'Coklat Breze', '5', '2023-01-24 00:00:00', 'PCH001', '20000', NULL, 'Dikirim'),
(13, 'TRK002', 5, 'Coklat Latte', '5', '2023-03-02 00:00:00', 'PCH001', '35000', NULL, 'Dikirim'),
(14, 'TRK003', 7, 'Coklat Milko', '3', '2023-03-02 00:00:00', 'PCH001', '21000', NULL, 'Dikirim'),
(15, 'TRK004', 7, 'Coklat Milko', '3', '2023-03-02 00:00:00', 'PCH001', '21000', NULL, 'Dikirim'),
(16, 'TRK005', 11, 'Caramel Crumble', '3', '2023-03-02 00:00:00', 'PCH001', '21000', NULL, 'Dikirim'),
(17, 'TRK006', 10, 'Choco Sweet Caramel', '3', '2023-03-02 00:00:00', 'PCH001', '21000', NULL, 'Dikirim'),
(18, 'TRK007', 9, 'Coklat Black Cookies', '3', '2023-03-02 00:00:00', 'PCH001', '21000', NULL, 'Dikirim'),
(19, 'TRK008', 8, 'Coklat Melted', '4', '2023-03-02 00:00:00', 'PCH001', '28000', NULL, 'Dikirim'),
(20, 'TRK009', 5, 'Coklat Latte', '2', '2023-03-02 00:00:00', 'PCH001', '14000', NULL, 'Dikirim'),
(21, 'TRK010', 5, 'Coklat Latte', '2', '2023-03-02 00:00:00', 'PCH001', '14000', NULL, 'Dikirim'),
(22, 'TRK011', 8, 'Coklat Melted', '11', '2023-11-09 00:00:00', 'PCH001', '77000', '2023-11-23 18:37:00', 'Dikirim'),
(23, 'TRK012', 2, 'Coklat Breze', '100', '2023-11-16 00:00:00', 'PCH002', '700000', NULL, 'Dikirim'),
(24, 'TRK013', 6, 'Coklat Orginal', '70', '2023-11-16 00:00:00', 'PCH002', '490000', NULL, 'Dikirim'),
(25, 'TRK014', 4, 'Coklat Mint', '60', '2023-11-16 00:00:00', 'PCH002', '420000', NULL, 'Dikirim'),
(26, 'TRK015', 2, 'Coklat Breze', '13', '2023-11-16 00:00:00', 'PCH002', '91000', NULL, 'Dikirim'),
(27, 'TRK016', 5, 'Coklat Latte', '50', '2023-11-16 00:00:00', 'PCH002', '350000', NULL, 'Dikirim'),
(31, 'TRK017', 2, 'Coklat Breze', '75', '2023-11-16 00:00:00', 'PCH002', '525000', NULL, 'Dikirim'),
(32, 'TRK018', 3, 'Coklat Paradise', '75', '2023-11-16 00:00:00', 'PCH002', '525000', NULL, 'Dikirim'),
(33, 'TRK019', 4, 'Coklat Mint', '75', '2023-11-16 00:00:00', 'PCH002', '525000', NULL, 'Dikirim'),
(34, 'TRK020', 2, 'Coklat Breze', '4', '2023-11-16 00:00:00', 'PCH002', '28000', NULL, 'Dikirim'),
(35, 'TRK021', 5, 'Coklat Latte', '100', '2023-11-16 00:00:00', 'PCH001', '700000', NULL, 'Dikirim'),
(36, 'TRK022', 5, 'Coklat Latte', '30', '2023-11-16 00:00:00', 'PCH001', '210000', NULL, 'Dikirim'),
(37, 'TRK023', 5, 'Coklat Latte', '27', '2023-11-21 00:00:00', 'PCH001', '189000', '2023-12-07 20:00:00', 'Dikirim');

--
-- Trigger `bahan_keluar`
--
DELIMITER $$
CREATE TRIGGER `kurangibahan` AFTER UPDATE ON `bahan_keluar` FOR EACH ROW BEGIN
UPDATE bahan SET stok = stok - NEW.permintaan
WHERE id_bahan = NEW.id_bahan;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `bahan_masuk`
--

CREATE TABLE `bahan_masuk` (
  `id_transaksi` int(11) NOT NULL,
  `kode_transaksi` varchar(10) NOT NULL,
  `id_bahan` int(11) NOT NULL,
  `permintaan` varchar(20) NOT NULL,
  `id_supplier` int(11) NOT NULL,
  `tgl_transaksi` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `bahan_masuk`
--

INSERT INTO `bahan_masuk` (`id_transaksi`, `kode_transaksi`, `id_bahan`, `permintaan`, `id_supplier`, `tgl_transaksi`) VALUES
(48, 'TRK001', 2, '10', 3, '2023-01-24'),
(49, 'TRK002', 2, '10', 3, '2023-03-02'),
(50, 'TRK003', 3, '20', 4, '2023-03-02'),
(51, 'TRK004', 4, '20', 7, '2023-03-02'),
(52, 'TRK005', 5, '20', 8, '2023-03-02'),
(53, 'TRK006', 6, '20', 9, '2023-03-02'),
(54, 'TRK007', 7, '20', 10, '2023-03-02'),
(55, 'TRK008', 8, '20', 10, '2023-03-02'),
(56, 'TRK009', 9, '20', 10, '2023-03-02'),
(57, 'TRK010', 11, '20', 11, '2023-03-02');

--
-- Trigger `bahan_masuk`
--
DELIMITER $$
CREATE TRIGGER `tambahbahan` AFTER INSERT ON `bahan_masuk` FOR EACH ROW BEGIN
UPDATE bahan SET stok = stok + NEW.permintaan
WHERE id_bahan = NEW.id_bahan;
end
$$
DELIMITER ;

-- --------------------------------------------------------

--
-- Struktur dari tabel `dpenjualanoutlet`
--

CREATE TABLE `dpenjualanoutlet` (
  `id_detail` int(11) NOT NULL,
  `id_penjualan` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `kode_bahan` varchar(15) NOT NULL,
  `qty` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `dpenjualanoutlet`
--

INSERT INTO `dpenjualanoutlet` (`id_detail`, `id_penjualan`, `kode_transaksi`, `kode_bahan`, `qty`) VALUES
(24, 13, 2023001, 'BRG001', 3),
(25, 13, 2023001, 'BRG002', 2),
(26, 13, 2023001, 'BRG004', 1),
(29, 15, 2023002, 'BRG004', 3),
(30, 15, 2023002, 'BRG005', 2),
(31, 15, 2023002, 'BRG003', 5);

-- --------------------------------------------------------

--
-- Struktur dari tabel `kemitraan`
--

CREATE TABLE `kemitraan` (
  `id` int(11) NOT NULL,
  `no_ktp` varchar(20) NOT NULL,
  `nama_lengkap` varchar(35) NOT NULL,
  `alamat_lengkap` varchar(50) NOT NULL,
  `email` varchar(50) NOT NULL,
  `kode_outlet` varchar(10) NOT NULL,
  `nama_outlet` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `tgl_bergabung` date DEFAULT NULL,
  `paket` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `kemitraan`
--

INSERT INTO `kemitraan` (`id`, `no_ktp`, `nama_lengkap`, `alamat_lengkap`, `email`, `kode_outlet`, `nama_outlet`, `alamat`, `telp`, `tgl_bergabung`, `paket`) VALUES
(12, '63745508047545', 'Muhammad Rinaldi', 'Jl. Kelurahan Gg. Keruing 2', 'muhammad.rinaldi007.mr@gmail.c', 'PCH001', 'Outlet NR', 'Jl. Kelurahan Gg. Keruing 2', '085555696620', '2023-05-15', 'COK001'),
(14, '6372050807000001', 'Nurdinah', 'Jl. Kelurahan Gg. Keruing 2', 'dinah.saja.bjb@gmail.com', 'PCH002', 'Outlet Sungai Besar', 'Jl. Kelurahan Gg. Keruing 2', '089523196044', '2023-01-06', 'COK002');

-- --------------------------------------------------------

--
-- Struktur dari tabel `lokasi`
--

CREATE TABLE `lokasi` (
  `kode_outlet` varchar(15) NOT NULL,
  `nama_lokasi` varchar(50) NOT NULL,
  `koordinat` varchar(50) NOT NULL,
  `keterangan` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `lokasi`
--

INSERT INTO `lokasi` (`kode_outlet`, `nama_lokasi`, `koordinat`, `keterangan`) VALUES
('PCH001', 'Outlet NR', 'LatLng(-3.454749, 114.700124)', 'YA'),
('PCH002', 'Outlet Panglima Batur', '-3.439211, 114.832417', 'YA'),
('PCH003', 'Outlet Sungai Besar', 'LatLng(-3.454518, 114.840572)', 'YA'),
('PCH004', 'Outlet Pramuka', 'LatLng(-3.347574, 114.627888)', 'YA'),
('PCH005', 'Outlet Sultan Adam', 'LatLng(-3.299685, 114.604768)', 'YA'),
('PCH006', 'Outlet Gatot', 'LatLng(-3.330355, 114.61588)', 'YA');

-- --------------------------------------------------------

--
-- Struktur dari tabel `outlet`
--

CREATE TABLE `outlet` (
  `id_outlet` int(11) NOT NULL,
  `kode_outlet` varchar(10) NOT NULL,
  `nama_outlet` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(16) NOT NULL,
  `tgl_bergabung` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `outlet`
--

INSERT INTO `outlet` (`id_outlet`, `kode_outlet`, `nama_outlet`, `alamat`, `telp`, `tgl_bergabung`) VALUES
(7, 'PCH002', 'Outlet Panglima Batur', 'Jl. Panglima Batur', '089531778418', '2019-03-02'),
(8, 'PCH003', 'Outlet Sungai Besar', 'Jl. Sungai Besar', '085791555506', '2019-12-12'),
(9, 'PCH004', 'Outlet Pramuka', 'Jl. Pramuka', '085469558787', '2022-12-05'),
(10, 'PCH005', 'Outlet Sultan Adam', 'Jl. Sultan Adam', '085555696620', '2022-12-09'),
(11, 'PCH006', 'Outlet Gatot', 'Jl. Gatot Subroto', '085745556987', '2022-09-09'),
(13, 'PCH001', 'Outlet NR', 'Jl. Kelurahan Gg. Keruing 2', '085555696620', '2023-05-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `paket`
--

CREATE TABLE `paket` (
  `id_paket` int(11) NOT NULL,
  `kode_paket` varchar(12) NOT NULL,
  `nama_paket` varchar(30) NOT NULL,
  `deskripsi` varchar(50) NOT NULL,
  `harga` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `paket`
--

INSERT INTO `paket` (`id_paket`, `kode_paket`, `nama_paket`, `deskripsi`, `harga`) VALUES
(1, 'COK001', 'PAKET SILVER', 'Franchise + Bahan + Blender', 15000000),
(2, 'COK002', 'PAKET BRONZE', 'Frenchise+Bahan', 10000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualan`
--

CREATE TABLE `penjualan` (
  `id` int(11) NOT NULL,
  `kode_outlet` varchar(10) DEFAULT NULL,
  `kode_bahan` varchar(100) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `total` int(11) DEFAULT NULL,
  `tanggal` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualan`
--

INSERT INTO `penjualan` (`id`, `kode_outlet`, `kode_bahan`, `qty`, `total`, `tanggal`) VALUES
(1, 'PCH001', 'BRG001', 30, 330000, '2023-02-24'),
(2, 'PCH001', 'BRG002', 20, 200000, '2023-02-24'),
(3, 'PCH002', 'BRG001', 45, 450000, '2023-02-24'),
(4, 'PCH002', 'BRG002', 35, 420000, '2023-02-24'),
(5, 'PCH001', 'BRG002', 1, 10000, '2023-03-02'),
(6, 'PCH001', 'BRG003', 2, 20000, '2023-03-02'),
(7, 'PCH001', 'BRG004', 1, 10000, '2023-03-02'),
(8, 'PCH001', 'BRG005', 5, 50000, '2023-03-02'),
(9, 'PCH001', 'BRG008', 2, 20000, '2023-03-02'),
(10, 'PCH001', 'BRG006', 2, 20000, '2023-03-02'),
(11, 'PCH001', 'BRG005', 2, 20000, '2023-03-02'),
(12, 'PCH001', 'BRG004', 2, 20000, '2023-03-02'),
(13, 'PCH001', 'BRG001', 1, 10000, '2023-03-02'),
(14, 'PCH001', 'BRG002', 2, 20000, '2023-03-02'),
(15, 'PCH001', 'BRG003', 25, 250000, '2023-05-18'),
(18, 'PCH001', 'BRG004', 25, 300000, '2023-11-21');

-- --------------------------------------------------------

--
-- Struktur dari tabel `penjualanoutlet`
--

CREATE TABLE `penjualanoutlet` (
  `id_penjualan` int(11) NOT NULL,
  `kode_transaksi` int(11) NOT NULL,
  `kode_outlet` varchar(15) NOT NULL,
  `tgl_transaksi` datetime DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `penjualanoutlet`
--

INSERT INTO `penjualanoutlet` (`id_penjualan`, `kode_transaksi`, `kode_outlet`, `tgl_transaksi`) VALUES
(13, 2023001, 'PCH002', '2023-12-04 00:00:00'),
(15, 2023002, 'PCH002', '2023-12-05 00:00:00');

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `rekappenjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `rekappenjualan` (
`kode_transaksi` int(11)
,`tgl_transaksi` datetime
,`kode_outlet` varchar(15)
,`nama_outlet` varchar(30)
,`nama_bahan` varchar(25)
,`harga_jual` int(11)
,`jumlah` decimal(32,0)
,`total` decimal(42,0)
);

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `riwayatpenjualan`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `riwayatpenjualan` (
`id_penjualan` int(11)
,`kode_outlet` varchar(15)
,`kode_transaksi` int(11)
,`tgl_transaksi` datetime
,`kode_bahan` varchar(15)
,`nama_bahan` varchar(25)
,`qty` int(11)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `saran`
--

CREATE TABLE `saran` (
  `id` int(11) NOT NULL,
  `kode_outlet` varchar(15) NOT NULL,
  `nama_lokasi` varchar(30) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `koordinat` varchar(50) NOT NULL,
  `keterangan` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `saran`
--

INSERT INTO `saran` (`id`, `kode_outlet`, `nama_lokasi`, `alamat`, `koordinat`, `keterangan`) VALUES
(1, 'BDJ-001', 'KM 5', 'Jl. A. Yani Km. 5', 'LatLng(-3.349641, 114.624516)', 'Tengah-tengah ciputra dan hbi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `stokbahan`
--

CREATE TABLE `stokbahan` (
  `id` int(11) NOT NULL,
  `kode_bahan` varchar(20) NOT NULL,
  `stok` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Stand-in struktur untuk tampilan `stokoutlet`
-- (Lihat di bawah untuk tampilan aktual)
--
CREATE TABLE `stokoutlet` (
`id` int(11)
,`kode_outlet` varchar(15)
,`nama_bahan` varchar(50)
,`qty` int(11)
,`status` varchar(10)
);

-- --------------------------------------------------------

--
-- Struktur dari tabel `stok_outlet`
--

CREATE TABLE `stok_outlet` (
  `id` int(11) NOT NULL,
  `kode_outlet` varchar(15) DEFAULT NULL,
  `nama_bahan` varchar(50) DEFAULT NULL,
  `qty` int(11) DEFAULT NULL,
  `status` varchar(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `stok_outlet`
--

INSERT INTO `stok_outlet` (`id`, `kode_outlet`, `nama_bahan`, `qty`, `status`) VALUES
(3, 'PCH002', 'Coklat Breze', 75, 'Pending'),
(4, 'PCH002', 'Coklat Paradise', 75, 'Pending'),
(5, 'PCH002', 'Coklat Mint', 75, 'In'),
(6, 'PCH002', 'Coklat Breze', 80, 'In'),
(7, 'PCH001', 'Coklat Latte', 157, 'In'),
(8, 'PCH001', 'Coklat Latte', 30, 'Pending'),
(9, 'PCH001', 'Coklat Latte', 27, 'Pending');

-- --------------------------------------------------------

--
-- Struktur dari tabel `supplier`
--

CREATE TABLE `supplier` (
  `id_supplier` int(11) NOT NULL,
  `kode_supplier` varchar(10) NOT NULL,
  `nama_supplier` varchar(25) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `telp` varchar(15) NOT NULL,
  `tgl_kerjasama` date DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `supplier`
--

INSERT INTO `supplier` (`id_supplier`, `kode_supplier`, `nama_supplier`, `alamat`, `telp`, `tgl_kerjasama`) VALUES
(3, 'SUP001', 'PT. Chokolatos', 'Jl. Cokorato', '0895405075582', '2022-12-30'),
(4, 'SUP002', 'PT. Insan Bersaudara', 'Jl. Amaco', '087554139788', '2022-03-02'),
(7, 'SUP004', 'PT. Kembar', 'Jl. Panglima Batur', '089531778418', '2018-05-05'),
(8, 'SUP005', 'PT. Mahligai', 'Jl. Sungai Besar', '085791555506', '2019-12-12'),
(9, 'SUP006', 'PT. Kembar Saudara', 'Jl. Pramuka', '085469558787', '2022-12-05'),
(10, 'SUP007', 'PT. Adam', 'Jl. Sultan Adam', '085555696620', '2022-12-09'),
(11, 'SUP008', 'PT. Mas', 'Jl. Gatot Subroto', '085745556987', '2022-09-09');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(25) NOT NULL,
  `password` varchar(20) NOT NULL,
  `hak_akses` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`, `hak_akses`) VALUES
(8, 'admin', 'admin', 1),
(9, 'PCH002', '123', 2),
(10, 'PCH003', '123', 2),
(11, 'PCH004', '123', 2),
(12, 'PCH005', '123', 2),
(13, 'PCH006', '123', 2),
(16, 'PCH001', '123', 2),
(17, 'PCH002', '123', 2);

-- --------------------------------------------------------

--
-- Struktur untuk view `rekappenjualan`
--
DROP TABLE IF EXISTS `rekappenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `rekappenjualan`  AS SELECT `p`.`kode_transaksi` AS `kode_transaksi`, `p`.`tgl_transaksi` AS `tgl_transaksi`, `p`.`kode_outlet` AS `kode_outlet`, `o`.`nama_outlet` AS `nama_outlet`, `b`.`nama_bahan` AS `nama_bahan`, `b`.`harga_jual` AS `harga_jual`, sum(`dp`.`qty`) AS `jumlah`, `b`.`harga_jual`* sum(`dp`.`qty`) AS `total` FROM (((`penjualanoutlet` `p` left join `dpenjualanoutlet` `dp` on(`dp`.`id_penjualan` = `p`.`id_penjualan`)) left join `bahan` `b` on(`b`.`kode_bahan` = `dp`.`kode_bahan`)) left join `outlet` `o` on(`o`.`kode_outlet` = `p`.`kode_outlet`)) GROUP BY `p`.`kode_outlet`, `b`.`kode_bahan``kode_bahan`  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `riwayatpenjualan`
--
DROP TABLE IF EXISTS `riwayatpenjualan`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `riwayatpenjualan`  AS SELECT `p`.`id_penjualan` AS `id_penjualan`, `p`.`kode_outlet` AS `kode_outlet`, `p`.`kode_transaksi` AS `kode_transaksi`, `p`.`tgl_transaksi` AS `tgl_transaksi`, `dp`.`kode_bahan` AS `kode_bahan`, `b`.`nama_bahan` AS `nama_bahan`, `dp`.`qty` AS `qty` FROM ((`penjualanoutlet` `p` left join `dpenjualanoutlet` `dp` on(`p`.`id_penjualan` = `dp`.`id_penjualan`)) left join `bahan` `b` on(`b`.`kode_bahan` = `dp`.`kode_bahan`))  ;

-- --------------------------------------------------------

--
-- Struktur untuk view `stokoutlet`
--
DROP TABLE IF EXISTS `stokoutlet`;

CREATE ALGORITHM=UNDEFINED DEFINER=`root`@`localhost` SQL SECURITY DEFINER VIEW `stokoutlet`  AS SELECT `stok_outlet`.`id` AS `id`, `stok_outlet`.`kode_outlet` AS `kode_outlet`, `stok_outlet`.`nama_bahan` AS `nama_bahan`, `stok_outlet`.`qty` AS `qty`, `stok_outlet`.`status` AS `status` FROM `stok_outlet` WHERE `stok_outlet`.`status` = 'In''In'  ;

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `bahan`
--
ALTER TABLE `bahan`
  ADD PRIMARY KEY (`id_bahan`);

--
-- Indeks untuk tabel `bahan_keluar`
--
ALTER TABLE `bahan_keluar`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_outlet` (`kode_outlet`);

--
-- Indeks untuk tabel `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  ADD PRIMARY KEY (`id_transaksi`),
  ADD KEY `id_bahan` (`id_bahan`),
  ADD KEY `id_supplier` (`id_supplier`);

--
-- Indeks untuk tabel `dpenjualanoutlet`
--
ALTER TABLE `dpenjualanoutlet`
  ADD PRIMARY KEY (`id_detail`),
  ADD KEY `id_penjualan` (`id_penjualan`);

--
-- Indeks untuk tabel `kemitraan`
--
ALTER TABLE `kemitraan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `lokasi`
--
ALTER TABLE `lokasi`
  ADD PRIMARY KEY (`kode_outlet`);

--
-- Indeks untuk tabel `outlet`
--
ALTER TABLE `outlet`
  ADD PRIMARY KEY (`id_outlet`);

--
-- Indeks untuk tabel `paket`
--
ALTER TABLE `paket`
  ADD PRIMARY KEY (`id_paket`);

--
-- Indeks untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `penjualanoutlet`
--
ALTER TABLE `penjualanoutlet`
  ADD PRIMARY KEY (`id_penjualan`);

--
-- Indeks untuk tabel `saran`
--
ALTER TABLE `saran`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `stokbahan`
--
ALTER TABLE `stokbahan`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kode_bahan` (`kode_bahan`);

--
-- Indeks untuk tabel `stok_outlet`
--
ALTER TABLE `stok_outlet`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `supplier`
--
ALTER TABLE `supplier`
  ADD PRIMARY KEY (`id_supplier`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `bahan`
--
ALTER TABLE `bahan`
  MODIFY `id_bahan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `bahan_keluar`
--
ALTER TABLE `bahan_keluar`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `bahan_masuk`
--
ALTER TABLE `bahan_masuk`
  MODIFY `id_transaksi` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=58;

--
-- AUTO_INCREMENT untuk tabel `dpenjualanoutlet`
--
ALTER TABLE `dpenjualanoutlet`
  MODIFY `id_detail` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=32;

--
-- AUTO_INCREMENT untuk tabel `kemitraan`
--
ALTER TABLE `kemitraan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

--
-- AUTO_INCREMENT untuk tabel `outlet`
--
ALTER TABLE `outlet`
  MODIFY `id_outlet` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT untuk tabel `paket`
--
ALTER TABLE `paket`
  MODIFY `id_paket` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `penjualan`
--
ALTER TABLE `penjualan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT untuk tabel `penjualanoutlet`
--
ALTER TABLE `penjualanoutlet`
  MODIFY `id_penjualan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;

--
-- AUTO_INCREMENT untuk tabel `saran`
--
ALTER TABLE `saran`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `stokbahan`
--
ALTER TABLE `stokbahan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `stok_outlet`
--
ALTER TABLE `stok_outlet`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `supplier`
--
ALTER TABLE `supplier`
  MODIFY `id_supplier` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `dpenjualanoutlet`
--
ALTER TABLE `dpenjualanoutlet`
  ADD CONSTRAINT `dpenjualanoutlet_ibfk_1` FOREIGN KEY (`id_penjualan`) REFERENCES `penjualanoutlet` (`id_penjualan`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
