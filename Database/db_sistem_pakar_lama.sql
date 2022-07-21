-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 07 Jul 2022 pada 14.23
-- Versi server: 10.4.21-MariaDB
-- Versi PHP: 8.0.10

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `db_sistem_pakar`
--

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_user`
--

CREATE TABLE `tb_detail_user` (
  `id_detail_user` int(11) NOT NULL,
  `nik_username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_user`
--

INSERT INTO `tb_detail_user` (`id_detail_user`, `nik_username`, `nama_lengkap`, `alamat`, `no_telepon`) VALUES
(1, '12345', 'Zahra Novita', 'Bukittinggi', '083161954332'),
(2, '123', 'Dimas', 'Padang', '083161954123'),
(3, '123456', 'Monica Rahmah', 'Padang', '08316195415'),
(4, '123451', 'Dori Muthia', 'Padang', '083180331215');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_faktor_5c`
--

CREATE TABLE `tb_faktor_5c` (
  `id_faktor_5C` int(11) NOT NULL,
  `faktor_5C` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_faktor_5c`
--

INSERT INTO `tb_faktor_5c` (`id_faktor_5C`, `faktor_5C`) VALUES
(1, 'Kepribadian'),
(2, 'Kepekaan Sosial'),
(3, 'Ibadah'),
(6, 'Rasa Sosial'),
(7, 'Ketepatan Angsuran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jaminan_nasabah`
--

CREATE TABLE `tb_jaminan_nasabah` (
  `id_jaminan_nasabah` int(11) NOT NULL,
  `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL,
  `foto_KTP` varchar(124) NOT NULL,
  `foto_KK` varchar(124) NOT NULL,
  `foto_BPKP` varchar(124) NOT NULL,
  `foto_surat_izin_usaha` varchar(124) NOT NULL,
  `foto_kendara` varchar(124) NOT NULL,
  `foto_rekening_listrik` varchar(124) NOT NULL,
  `denah_lokasi` varchar(255) NOT NULL,
  `status` enum('pending','konfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jaminan_nasabah`
--

INSERT INTO `tb_jaminan_nasabah` (`id_jaminan_nasabah`, `id_pemberian_pembiayaan_nasabah`, `foto_KTP`, `foto_KK`, `foto_BPKP`, `foto_surat_izin_usaha`, `foto_kendara`, `foto_rekening_listrik`, `denah_lokasi`, `status`) VALUES
(1, 1, '7645787862bcc7c15a00f0.78335718_background-1.jpg', '213838282862bcc7c15a27e0.08596908_background2.jpg', '152173367662bcc7c15a4eb8.02859690_background2.jpg', '168165169362bcc7c15a7385.84771314_background2.jpg', '204624869562bcc7c15a95a5.61454506_background2.jpg', '58475945362bcc7c15ab861.54154415_background-1.jpg', '41095581162bcc7c15ae894.62332241_background2.jpg', 'konfirmasi');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jenis_pembiayaan`
--

CREATE TABLE `tb_jenis_pembiayaan` (
  `id_jenis_pembiayaan` int(11) NOT NULL,
  `jenis_pembiayaan` varchar(124) NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jenis_pembiayaan`
--

INSERT INTO `tb_jenis_pembiayaan` (`id_jenis_pembiayaan`, `jenis_pembiayaan`, `keterangan`) VALUES
(1, 'Pembiayaan Skema Jual Beli', 'Pembiayaan dengan Skema Jual Beli'),
(2, 'Pembiayaan Modal Kerja', 'Pembiayaan Modal Kerja adalah pembiayaan dengan periode waktu pendek atau panjang');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nasabah`
--

CREATE TABLE `tb_nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `nik_username` varchar(20) NOT NULL,
  `nama_lengkap` varchar(100) NOT NULL,
  `password` varchar(124) NOT NULL,
  `alamat` text NOT NULL,
  `no_telepon` varchar(15) NOT NULL,
  `foto_nasabah` varchar(124) NOT NULL,
  `foto_ktp_nasabah` varchar(124) NOT NULL,
  `status_validasi` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_nasabah`
--

INSERT INTO `tb_nasabah` (`id_nasabah`, `nik_username`, `nama_lengkap`, `password`, `alamat`, `no_telepon`, `foto_nasabah`, `foto_ktp_nasabah`, `status_validasi`) VALUES
(1, '1234', 'Juni Safitri', 'juni', 'Pasaman', '083161954321', '3721846662bcc5046ef765.73831849_profil.jpg', '107683562562bcc5046f25b0.90560865_background2.jpg', 1),
(2, '12', 'Rades Saputri', 'rades', 'Bengkulu', '083161951317', '64459511362c6687c4e8eb5.83406984_profil1.png', '25881265962c6687c4eb6a2.40671853_background-1.jpg', 0);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemberian_pembiayaan_nasabah`
--

CREATE TABLE `tb_pemberian_pembiayaan_nasabah` (
  `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL,
  `nik_username` varchar(20) NOT NULL,
  `nominal_pinjaman` double NOT NULL,
  `pendapatan_bersih` double NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemberian_pembiayaan_nasabah`
--

INSERT INTO `tb_pemberian_pembiayaan_nasabah` (`id_pemberian_pembiayaan_nasabah`, `nik_username`, `nominal_pinjaman`, `pendapatan_bersih`, `jangka_waktu`, `tanggal_peminjaman`) VALUES
(1, '1234', 2000000, 3500000, 12, '2022-06-30');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rincian_5c`
--

CREATE TABLE `tb_rincian_5c` (
  `id_rincian_5C` int(11) NOT NULL,
  `id_faktor_5C` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rincian_5c`
--

INSERT INTO `tb_rincian_5c` (`id_rincian_5C`, `id_faktor_5C`, `keterangan`, `bobot`) VALUES
(1, 1, 'Amanah, Disiplin, Jujur', 25),
(2, 2, 'Mengerjakan sholat 5 Waktu', 30);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_user`
--

CREATE TABLE `tb_user` (
  `id_user` int(11) NOT NULL,
  `nik_username` varchar(20) NOT NULL,
  `password` varchar(255) NOT NULL,
  `status` varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_user`
--

INSERT INTO `tb_user` (`id_user`, `nik_username`, `password`, `status`) VALUES
(1, '12345', 'zahra', 'Admin'),
(2, '1234', 'juni', 'nasabah'),
(3, '123', 'dimas', 'Petugas Lapangan'),
(4, '123456', 'monica', 'Teller'),
(5, '123451', 'dori', 'Manajer'),
(6, '12', 'rades', 'nasabah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_detail_user`
--
ALTER TABLE `tb_detail_user`
  ADD PRIMARY KEY (`id_detail_user`),
  ADD UNIQUE KEY `tb_detail_user` (`nik_username`);

--
-- Indeks untuk tabel `tb_faktor_5c`
--
ALTER TABLE `tb_faktor_5c`
  ADD PRIMARY KEY (`id_faktor_5C`);

--
-- Indeks untuk tabel `tb_jaminan_nasabah`
--
ALTER TABLE `tb_jaminan_nasabah`
  ADD PRIMARY KEY (`id_jaminan_nasabah`);

--
-- Indeks untuk tabel `tb_jenis_pembiayaan`
--
ALTER TABLE `tb_jenis_pembiayaan`
  ADD PRIMARY KEY (`id_jenis_pembiayaan`);

--
-- Indeks untuk tabel `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  ADD PRIMARY KEY (`id_nasabah`),
  ADD UNIQUE KEY `tb_nasabah` (`nik_username`);

--
-- Indeks untuk tabel `tb_pemberian_pembiayaan_nasabah`
--
ALTER TABLE `tb_pemberian_pembiayaan_nasabah`
  ADD PRIMARY KEY (`id_pemberian_pembiayaan_nasabah`);

--
-- Indeks untuk tabel `tb_rincian_5c`
--
ALTER TABLE `tb_rincian_5c`
  ADD PRIMARY KEY (`id_rincian_5C`);

--
-- Indeks untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  ADD PRIMARY KEY (`id_user`),
  ADD UNIQUE KEY `tb_user` (`nik_username`);

--
-- AUTO_INCREMENT untuk tabel yang dibuang
--

--
-- AUTO_INCREMENT untuk tabel `tb_detail_user`
--
ALTER TABLE `tb_detail_user`
  MODIFY `id_detail_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_faktor_5c`
--
ALTER TABLE `tb_faktor_5c`
  MODIFY `id_faktor_5C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT untuk tabel `tb_jaminan_nasabah`
--
ALTER TABLE `tb_jaminan_nasabah`
  MODIFY `id_jaminan_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_pembiayaan`
--
ALTER TABLE `tb_jenis_pembiayaan`
  MODIFY `id_jenis_pembiayaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_pemberian_pembiayaan_nasabah`
--
ALTER TABLE `tb_pemberian_pembiayaan_nasabah`
  MODIFY `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_rincian_5c`
--
ALTER TABLE `tb_rincian_5c`
  MODIFY `id_rincian_5C` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
