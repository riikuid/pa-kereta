-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 08 Jun 2022 pada 17.25
-- Versi server: 10.4.24-MariaDB
-- Versi PHP: 8.1.2

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `kereta`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `jadwal`
--

CREATE TABLE `jadwal` (
  `id` varchar(255) NOT NULL,
  `asal` varchar(255) DEFAULT NULL,
  `tujuan` varchar(255) DEFAULT NULL,
  `kelas` varchar(255) DEFAULT NULL,
  `harga` varchar(255) DEFAULT NULL,
  `tanggal` date DEFAULT NULL,
  `waktu` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `jadwal`
--

INSERT INTO `jadwal` (`id`, `asal`, `tujuan`, `kelas`, `harga`, `tanggal`, `waktu`) VALUES
('066185ec7e', 'Surabaya', 'Malang', 'Ekonomi', '35000', '2022-06-08', '08:00'),
('1485ce4f89', 'Surabaya', 'Jakarta', 'Bisnis', '250000', '2022-06-08', '10:00'),
('ed1249adca', 'Surabaya', 'Kediri', 'Ekonomi', '25000', '2022-06-08', '09:00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `k_tujuan`
--

CREATE TABLE `k_tujuan` (
  `id` int(11) NOT NULL,
  `id_jadwal` varchar(255) NOT NULL,
  `jml_penumpang` int(255) NOT NULL,
  `limit_penumpang` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `k_tujuan`
--

INSERT INTO `k_tujuan` (`id`, `id_jadwal`, `jml_penumpang`, `limit_penumpang`) VALUES
(16, '5442ef1787', 4, '30'),
(17, '795d6e75b4', 0, '30'),
(18, 'be26d1500a', 0, '1'),
(19, '1485ce4f89', 0, '30'),
(20, 'ed1249adca', 1, '30'),
(21, '066185ec7e', 0, '30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `log_order`
--

CREATE TABLE `log_order` (
  `id` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tgl_order` date NOT NULL,
  `jml_penumpang` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `log_order`
--

INSERT INTO `log_order` (`id`, `id_user`, `id_jadwal`, `nama`, `usia`, `no_kk`, `no_hp`, `tgl_order`, `jml_penumpang`, `date_created`) VALUES
('8a33973669afa771a2eb', 9, 0, 'Fahmi Wahyu Alifian', '18', '3266866778', '082232949944', '2022-06-08', 1, '2022-06-08 06:46:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `payment`
--

CREATE TABLE `payment` (
  `id` varchar(255) NOT NULL,
  `id_order` varchar(255) NOT NULL,
  `payment_code` varchar(255) NOT NULL,
  `status` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `payment`
--

INSERT INTO `payment` (`id`, `id_order`, `payment_code`, `status`, `date_created`) VALUES
('4995de20c6', '8a33973669afa771a2eb', 'KAI-e3d6a1cc2b81a023084133a98c7920e859f29bc7', 'sudah', '2022-06-08 06:46:06');

-- --------------------------------------------------------

--
-- Struktur dari tabel `t_order`
--

CREATE TABLE `t_order` (
  `id` varchar(128) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_jadwal` int(11) NOT NULL,
  `nama` varchar(255) NOT NULL,
  `usia` varchar(255) NOT NULL,
  `no_kk` varchar(255) NOT NULL,
  `no_hp` varchar(255) NOT NULL,
  `tgl_order` date NOT NULL,
  `jml_penumpang` int(11) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `users`
--

CREATE TABLE `users` (
  `id_user` int(11) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `level` varchar(255) NOT NULL,
  `date_created` datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `users`
--

INSERT INTO `users` (`id_user`, `email`, `password`, `level`, `date_created`) VALUES
(8, 'admin', '202cb962ac59075b964b07152d234b70', 'admin', '2022-06-07 18:27:40'),
(9, 'user', '202cb962ac59075b964b07152d234b70', 'user', '2022-06-07 18:28:38');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `jadwal`
--
ALTER TABLE `jadwal`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `k_tujuan`
--
ALTER TABLE `k_tujuan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `log_order`
--
ALTER TABLE `log_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `payment`
--
ALTER TABLE `payment`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `t_order`
--
ALTER TABLE `t_order`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `k_tujuan`
--
ALTER TABLE `k_tujuan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `users`
--
ALTER TABLE `users`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
