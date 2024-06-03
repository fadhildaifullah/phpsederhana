-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 03 Jun 2024 pada 07.09
-- Versi server: 10.4.22-MariaDB
-- Versi PHP: 7.4.27

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `metro`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `calon_karyawan`
--

CREATE TABLE `calon_karyawan` (
  `id` int(11) NOT NULL,
  `nama` text NOT NULL,
  `alamat` varchar(100) NOT NULL,
  `tgl_lahir` varchar(50) NOT NULL,
  `email` varchar(100) NOT NULL,
  `foto` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `calon_karyawan`
--

INSERT INTO `calon_karyawan` (`id`, `nama`, `alamat`, `tgl_lahir`, `email`, `foto`) VALUES
(16, 'Fadhil Daifullah ', 'Padang', '21 maret 2001', 'fadhilbljr@gmail.com ', '6656f5a8064b8.png'),
(19, 'Fadhil Daifullah ', 'Padang', '21 maret 2001', 'fadhil@mail.com', '6659b25752c4f.jpg'),
(20, 'Fadhil Daifullah ', 'Padang', '04 maret 2001', 'fadhil@mail.com', '665c80dc34bc4.png'),
(21, 'Fadhil Daifullah ', 'Padang', '04 maret 2001', 'fadhil@mail.com', '665c80fba201f.jpg'),
(22, 'Dimas Harianto', 'Padang', '21 maret 2001', 'fadhil@mail.com', '665c8116ba50e.png'),
(23, 'Fadhil Daifullah ', 'Padang', '21 maret 2001', 'fadhil@mail.com', '665c8152eaa06.png'),
(24, 'Fadhil Daifullah ', 'Padang', '21 maret 2001', 'fadhil@mail.com', '665c816b5f9ec.png');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id` int(11) NOT NULL,
  `username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(1, 'ceo', '$2y$10$3WcWcr828gBlR0HT7dVl1e9uXICc0rTS9G1GQPUBx7N.TiRPbJm52');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `calon_karyawan`
--
ALTER TABLE `calon_karyawan`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=25;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
