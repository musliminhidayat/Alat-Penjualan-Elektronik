-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 12 Jan 2022 pada 06.24
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.11

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `database_barang`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_barang`
--

CREATE TABLE `tabel_barang` (
  `id_barang` varchar(11) NOT NULL,
  `nama_barang` varchar(30) NOT NULL,
  `harga_barang` int(11) NOT NULL,
  `stok_barang` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_barang`
--

INSERT INTO `tabel_barang` (`id_barang`, `nama_barang`, `harga_barang`, `stok_barang`) VALUES
('0001', 'Blender Portable Mini  Kapsul', 8, 5),
('0002', 'Panci listrik', 250000, 2600),
('0003', 'Vacum Cleaner', 129000, 300),
('0004', 'Mixer Elextric', 190000, 2988),
('0005', 'Carger Hp', 50000, 4000),
('0006', 'Panggangan BBQ', 350000, 1000),
('13', 'tv digital', 1200000, 12);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tabel_customer`
--

CREATE TABLE `tabel_customer` (
  `id_customer` int(11) NOT NULL,
  `nama_customer` varchar(30) NOT NULL,
  `alamat_customer` varchar(35) NOT NULL,
  `nomor_telepon` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tabel_customer`
--

INSERT INTO `tabel_customer` (`id_customer`, `nama_customer`, `alamat_customer`, `nomor_telepon`) VALUES
(23, 'pto', 'deket', '124546'),
(123, 'Oktavia', 'Pandansari', '08765665421'),
(124, 'O', 'jauh banget', '05121574'),
(125, 'y', 'jauh aja', '002545'),
(126, 'h', 'deket', '124546');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tabel_barang`
--
ALTER TABLE `tabel_barang`
  ADD PRIMARY KEY (`id_barang`);

--
-- Indeks untuk tabel `tabel_customer`
--
ALTER TABLE `tabel_customer`
  ADD PRIMARY KEY (`id_customer`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
