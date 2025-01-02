-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Jan 2025 pada 17.20
-- Versi server: 10.4.32-MariaDB
-- Versi PHP: 8.0.30

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `workify`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `akun`
--

CREATE TABLE `akun` (
  `id_akun` int(10) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(40) NOT NULL,
  `nama` varchar(50) NOT NULL,
  `role` enum('perusahaan','pengguna','','') NOT NULL,
  `email` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `akun`
--

INSERT INTO `akun` (`id_akun`, `username`, `password`, `nama`, `role`, `email`) VALUES
(1, 'admin', '123', 'ilyas', 'perusahaan', 'ilyas07@gmail.com'),
(2, 'user', '123', 'farel', 'pengguna', 'farel01@gmail.com'),
(4, 'naabil', 'nabiil07', '', 'pengguna', 'naabil@gmail.com'),
(5, 'kevin123', 'kevin123', '', 'pengguna', 'kevin123@gmil.com'),
(6, 'ican', '1234', '', 'pengguna', 'ican@gmail.com');

-- --------------------------------------------------------

--
-- Struktur dari tabel `kategorikerjaan`
--

CREATE TABLE `kategorikerjaan` (
  `idkategori` int(6) NOT NULL,
  `parttime` enum('parttime') NOT NULL,
  `tetap` enum('tetap') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `lamaran`
--

CREATE TABLE `lamaran` (
  `idloker` int(6) NOT NULL,
  `idpelamar` int(6) DEFAULT NULL,
  `idperusahaan` int(6) DEFAULT NULL,
  `tglbuka` date NOT NULL,
  `tglttp` date NOT NULL,
  `almtperusahaan` varchar(50) NOT NULL,
  `gaji` decimal(10,0) NOT NULL,
  `status` enum('dibuka','ditutup','','') NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `jenis_kelamin` enum('pria & wanita','pria','wanita','') NOT NULL,
  `umur` int(3) NOT NULL,
  `tingkat_pendidikan` varchar(20) NOT NULL,
  `pengalaman_kerja` varchar(40) NOT NULL,
  `deskripsi_pekerjaan` text NOT NULL,
  `nama_pekerjaan` varchar(55) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `lamaran`
--

INSERT INTO `lamaran` (`idloker`, `idpelamar`, `idperusahaan`, `tglbuka`, `tglttp`, `almtperusahaan`, `gaji`, `status`, `posisi`, `jenis_kelamin`, `umur`, `tingkat_pendidikan`, `pengalaman_kerja`, `deskripsi_pekerjaan`, `nama_pekerjaan`) VALUES
(2, NULL, NULL, '2016-01-01', '2024-11-22', 'cakung', 10000000, 'ditutup', 'karyawan', 'pria & wanita', 16, 'd3', '2tahun', 'seru gaisss', 'ui ux'),
(6, 0, 0, '2006-05-01', '2008-09-05', 'telkom', 1000000, 'dibuka', 'backend', 'pria & wanita', 17, 's1', '3 tahun dibidang terkait', 'fffffffffffffffffffffff', 'front');

-- --------------------------------------------------------

--
-- Struktur dari tabel `pelamar`
--

CREATE TABLE `pelamar` (
  `idpelamar` int(6) NOT NULL,
  `idpengalaman` int(6) NOT NULL,
  `idwilayah` int(6) NOT NULL,
  `alamat` varchar(50) NOT NULL,
  `nmpelamar` varchar(25) NOT NULL,
  `notlp` int(13) NOT NULL,
  `tgllahir` date NOT NULL,
  `jkelamin` enum('pria','wanita') NOT NULL,
  `status` varchar(20) NOT NULL,
  `posisi` varchar(20) NOT NULL,
  `id_akun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pendidikan`
--

CREATE TABLE `pendidikan` (
  `idpendidikan` int(6) NOT NULL,
  `idpelamar` int(11) NOT NULL,
  `nmpelamar` varchar(20) NOT NULL,
  `thnlulus` date NOT NULL,
  `sd` varchar(20) NOT NULL,
  `smp` varchar(20) NOT NULL,
  `sma` varchar(20) NOT NULL,
  `universitas` varchar(20) NOT NULL,
  `jurusan` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Struktur dari tabel `pengalamankrj`
--

CREATE TABLE `pengalamankrj` (
  `idpengalaman` int(6) NOT NULL,
  `nmperusahaan` varchar(20) NOT NULL,
  `tglmulai` date NOT NULL,
  `tglselesai` date NOT NULL,
  `posisi` varchar(25) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `pengalamankrj`
--

INSERT INTO `pengalamankrj` (`idpengalaman`, `nmperusahaan`, `tglmulai`, `tglselesai`, `posisi`) VALUES
(1, 'TDI', '2023-11-01', '2024-10-01', 'kasir');

-- --------------------------------------------------------

--
-- Struktur dari tabel `perusahaan`
--

CREATE TABLE `perusahaan` (
  `idperusahaan` int(6) NOT NULL,
  `alamat` text NOT NULL,
  `notelp` int(14) NOT NULL,
  `nama_pemilik` varchar(50) NOT NULL,
  `id_akun` int(10) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `perusahaan`
--

INSERT INTO `perusahaan` (`idperusahaan`, `alamat`, `notelp`, `nama_pemilik`, `id_akun`) VALUES
(1, 'sdsdcc', 858727650, 'ilys', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `wilayah`
--

CREATE TABLE `wilayah` (
  `id_wilayah` int(11) NOT NULL,
  `kode_pos` int(11) NOT NULL,
  `kota` varchar(30) NOT NULL,
  `kabupaten` varchar(30) NOT NULL,
  `kecamatan` varchar(30) NOT NULL,
  `desa` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data untuk tabel `wilayah`
--

INSERT INTO `wilayah` (`id_wilayah`, `kode_pos`, `kota`, `kabupaten`, `kecamatan`, `desa`) VALUES
(1, 4555, 'bandung', 'bandung barat', 'bojongsoang', 'gba 1');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `akun`
--
ALTER TABLE `akun`
  ADD PRIMARY KEY (`id_akun`);

--
-- Indeks untuk tabel `kategorikerjaan`
--
ALTER TABLE `kategorikerjaan`
  ADD PRIMARY KEY (`idkategori`);

--
-- Indeks untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  ADD PRIMARY KEY (`idloker`),
  ADD UNIQUE KEY `idpelamar` (`idpelamar`),
  ADD UNIQUE KEY `idperusahaan` (`idperusahaan`);

--
-- Indeks untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD PRIMARY KEY (`idpelamar`),
  ADD UNIQUE KEY `idwilayah` (`idwilayah`),
  ADD UNIQUE KEY `idpengalaman` (`idpengalaman`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  ADD PRIMARY KEY (`idpendidikan`),
  ADD UNIQUE KEY `idpelamar` (`idpelamar`);

--
-- Indeks untuk tabel `pengalamankrj`
--
ALTER TABLE `pengalamankrj`
  ADD PRIMARY KEY (`idpengalaman`);

--
-- Indeks untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD PRIMARY KEY (`idperusahaan`),
  ADD KEY `id_akun` (`id_akun`);

--
-- Indeks untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  ADD PRIMARY KEY (`id_wilayah`),
  ADD UNIQUE KEY `kode_pos` (`kode_pos`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `akun`
--
ALTER TABLE `akun`
  MODIFY `id_akun` int(10) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `lamaran`
--
ALTER TABLE `lamaran`
  MODIFY `idloker` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  MODIFY `idpelamar` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pendidikan`
--
ALTER TABLE `pendidikan`
  MODIFY `idpendidikan` int(6) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `pengalamankrj`
--
ALTER TABLE `pengalamankrj`
  MODIFY `idpengalaman` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  MODIFY `idperusahaan` int(6) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `wilayah`
--
ALTER TABLE `wilayah`
  MODIFY `id_wilayah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- Ketidakleluasaan untuk tabel pelimpahan (Dumped Tables)
--

--
-- Ketidakleluasaan untuk tabel `pelamar`
--
ALTER TABLE `pelamar`
  ADD CONSTRAINT `pelamar_ibfk_1` FOREIGN KEY (`idpelamar`) REFERENCES `pendidikan` (`idpelamar`),
  ADD CONSTRAINT `pelamar_ibfk_2` FOREIGN KEY (`idpengalaman`) REFERENCES `pengalamankrj` (`idpengalaman`),
  ADD CONSTRAINT `pelamar_ibfk_3` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `pelamar_ibfk_4` FOREIGN KEY (`idwilayah`) REFERENCES `wilayah` (`id_wilayah`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ketidakleluasaan untuk tabel `perusahaan`
--
ALTER TABLE `perusahaan`
  ADD CONSTRAINT `perusahaan_ibfk_1` FOREIGN KEY (`id_akun`) REFERENCES `akun` (`id_akun`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
