-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 26 Bulan Mei 2023 pada 21.35
-- Versi server: 10.4.19-MariaDB
-- Versi PHP: 8.0.7

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `aprisetiabudi`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `anggota`
--

CREATE TABLE `anggota` (
  `id` int(11) NOT NULL,
  `nmr_anggota` varchar(30) NOT NULL,
  `nama` varchar(200) NOT NULL,
  `alamat` text NOT NULL,
  `handphone` varchar(20) NOT NULL,
  `ttl` varchar(100) NOT NULL,
  `kelas` varchar(50) NOT NULL,
  `status` enum('Y','N') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `anggota`
--

INSERT INTO `anggota` (`id`, `nmr_anggota`, `nama`, `alamat`, `handphone`, `ttl`, `kelas`, `status`) VALUES
(5, 'SAR-001', 'Muhammad Romli', 'Jl.Kenanga no.34', '08125213456', 'Pekanbaru, 3 mei 1999', 'A Teknik informatika IV', 'Y'),
(6, 'SAR-002', 'Andi Prasetyo', 'Jl.Gurindam 52', '08125213456', 'Pekanbaru, 1 mei 1999', 'A Teknik informatika IV', 'Y'),
(7, 'SAR-003', 'Galih Prasetiyo', 'Jl.Purwodadi no.15 Panam', '08125213457', 'Pekanbaru, 1 mei 1991', 'A Teknik informatika IV', 'Y'),
(8, 'SAR-004', 'supriyanto', 'Jl.Kartini no.70', '08125213458', 'Pekanbaru, 1 mei 2000', 'A Teknik informatika IV', 'Y'),
(9, 'SAR-005', 'anto', 'Jl.Gurindam 51', '08125213456', 'Pekanbaru, 1 mei 1999', 'A Teknik informatika IV', 'Y'),
(10, 'SAR-006', 'anto1', 'Jl.Gurindam 51', '08125213456', 'Pekanbaru, 1 mei 1999', 'A Teknik informatika IV', 'Y');

-- --------------------------------------------------------

--
-- Struktur dari tabel `buku`
--

CREATE TABLE `buku` (
  `id` int(11) NOT NULL,
  `judul` varchar(200) NOT NULL,
  `pengarang` varchar(50) NOT NULL,
  `penerbit` varchar(50) NOT NULL,
  `tahun_terbit` int(4) NOT NULL,
  `isbn` varchar(30) NOT NULL,
  `jml_buku` int(3) NOT NULL,
  `lokasi` enum('rak1','rak2') NOT NULL,
  `tgl_input` date NOT NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `buku`
--

INSERT INTO `buku` (`id`, `judul`, `pengarang`, `penerbit`, `tahun_terbit`, `isbn`, `jml_buku`, `lokasi`, `tgl_input`) VALUES
(3, 'Akuntansi Pengantar 1', 'Supardi', 'Gava Media', 2009, '978-979-107-882-5', 9, 'rak1', '2021-05-29'),
(4, 'Metodologi Penelitian Bidang Kesehatan ED. 2', 'Moch. Imron TA', 'Sagung Seto', 2014, '978-602-271-037-0', 2, 'rak2', '2021-05-29'),
(5, 'Quick Reference Windows 8', 'Wahana Komputer', 'Andi Offset', 2013, '978-979-293-499-1', 5, 'rak1', '2021-05-29'),
(6, 'Teori dan aplikasi Program SPSS', 'Nanang Martono', 'Gava Media', 2010, '978-979-107-893-1', 5, 'rak2', '2021-05-29'),
(7, 'Manajemen Penanganan Barang-Barang Berbahaya Pada Angkatan Udara', 'Wynd Riyaldi & M Rifni', 'MITRA WACANA', 2013, '978-602-752-348-7', 7, 'rak1', '2021-05-29'),
(8, 'Penelitian Kualitatif', 'Burhan Bungin', 'PRENADA MEDIA GRUP', 2007, '978-979-392-588-2', 15, 'rak2', '2021-05-29'),
(9, 'Buku Ajar Tumbuh Kembang Remaja & Permasalahanya', 'Soetjiningsih', 'Sagung Seto', 2004, '979-328-808-6', 1, 'rak1', '2021-06-15');

-- --------------------------------------------------------

--
-- Struktur dari tabel `transaksi`
--

CREATE TABLE `transaksi` (
  `id` int(11) NOT NULL,
  `id_anggota` int(11) NOT NULL,
  `id_buku` int(11) NOT NULL,
  `tglpinjam` date NOT NULL,
  `jml` int(4) NOT NULL,
  `tglkembali` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `transaksi`
--

INSERT INTO `transaksi` (`id`, `id_anggota`, `id_buku`, `tglpinjam`, `jml`, `tglkembali`) VALUES
(1, 5, 6, '2021-06-15', 2, '2022-07-13'),
(2, 6, 4, '2021-06-16', 1, '2021-06-17'),
(3, 7, 9, '2021-06-16', 1, '2023-05-26'),
(4, 5, 9, '2021-07-06', 2, '0000-00-00'),
(5, 5, 7, '2021-08-06', 8, '0000-00-00'),
(6, 5, 3, '2021-08-06', 8, '0000-00-00'),
(7, 5, 3, '2022-06-06', 2, '0000-00-00'),
(8, 15, 8, '2022-06-06', 2, '0000-00-00');

-- --------------------------------------------------------

--
-- Struktur dari tabel `user`
--

CREATE TABLE `user` (
  `id_user` int(11) NOT NULL,
  `username` varchar(50) NOT NULL,
  `password` varchar(50) NOT NULL,
  `level` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `user`
--

INSERT INTO `user` (`id_user`, `username`, `password`, `level`) VALUES
(1, 'admin', '21232f297a57a5a743894a0e4a801fc3', 'admin'),
(7, 'user', 'ee11cbb19052e40b07aac0ca060c23ee', 'pengunjung');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `anggota`
--
ALTER TABLE `anggota`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `nmr_anggota` (`nmr_anggota`);

--
-- Indeks untuk tabel `buku`
--
ALTER TABLE `buku`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  ADD PRIMARY KEY (`id`);

--
-- Indeks untuk tabel `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id_user`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `anggota`
--
ALTER TABLE `anggota`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT untuk tabel `buku`
--
ALTER TABLE `buku`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT untuk tabel `transaksi`
--
ALTER TABLE `transaksi`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `user`
--
ALTER TABLE `user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
