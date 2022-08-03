-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 01 Agu 2022 pada 22.19
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
-- Struktur dari tabel `tb_analisa_pendapatan`
--

CREATE TABLE `tb_analisa_pendapatan` (
  `id_analisa_pendapatan` int(11) NOT NULL,
  `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL,
  `jumlah_tabungan` double NOT NULL,
  `jumlah_hutang` double NOT NULL,
  `penjualan` double NOT NULL,
  `biaya_tenaga_kerja` double NOT NULL,
  `biaya_bahan_baku` double NOT NULL,
  `biaya_overhead` double NOT NULL,
  `harga_pokok_produksi` double NOT NULL,
  `pendapatan_jualan` double NOT NULL,
  `biaya_umum_dan_adm` double NOT NULL,
  `biaya_pemasaran` double NOT NULL,
  `pendapatan_per_bulan` double NOT NULL,
  `pendapatan_lain_lain` double NOT NULL,
  `total_pendapatan_per_bulan` double NOT NULL,
  `biaya_makan` double NOT NULL,
  `biaya_transportasi` double NOT NULL,
  `biaya_sewa` double NOT NULL,
  `biaya_air` double NOT NULL,
  `biaya_listrik` double NOT NULL,
  `biaya_telepon` double NOT NULL,
  `biaya_pendidikan` double NOT NULL,
  `biaya_lain_lain` double NOT NULL,
  `total_biaya_hidup_per_bulan` double NOT NULL,
  `pendapatan_bersih_per_bulan` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_analisa_pendapatan`
--

INSERT INTO `tb_analisa_pendapatan` (`id_analisa_pendapatan`, `id_pemberian_pembiayaan_nasabah`, `jumlah_tabungan`, `jumlah_hutang`, `penjualan`, `biaya_tenaga_kerja`, `biaya_bahan_baku`, `biaya_overhead`, `harga_pokok_produksi`, `pendapatan_jualan`, `biaya_umum_dan_adm`, `biaya_pemasaran`, `pendapatan_per_bulan`, `pendapatan_lain_lain`, `total_pendapatan_per_bulan`, `biaya_makan`, `biaya_transportasi`, `biaya_sewa`, `biaya_air`, `biaya_listrik`, `biaya_telepon`, `biaya_pendidikan`, `biaya_lain_lain`, `total_biaya_hidup_per_bulan`, `pendapatan_bersih_per_bulan`) VALUES
(1, 1, 40000000, 2300000, 5300000, 2000, 1000, 9000, 15000, 5235000, 7000, 31000, 66000, 7000000, 12301000, 1000, 6000, 8000, 2000, 9000, 2000, 1000, 7000, 36000, 9965000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_bukti_survei`
--

CREATE TABLE `tb_bukti_survei` (
  `id_bukti_survei` int(11) NOT NULL,
  `id_hasil` int(11) NOT NULL,
  `bukti_lampiran_survei` varchar(255) NOT NULL,
  `status_validasi_hasil` int(1) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_bukti_survei`
--

INSERT INTO `tb_bukti_survei` (`id_bukti_survei`, `id_hasil`, `bukti_lampiran_survei`, `status_validasi_hasil`) VALUES
(1, 1, '1659370510_bukti2.png', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_jaminan_nasabah`
--

CREATE TABLE `tb_detail_jaminan_nasabah` (
  `id_detail_jaminan` int(11) NOT NULL,
  `id_jaminan_nasabah` int(11) NOT NULL,
  `foto_tampak_depan` varchar(255) NOT NULL,
  `foto_tampak_belakang` varchar(255) NOT NULL,
  `foto_tampak_samping` varchar(255) NOT NULL,
  `nomor_angka` varchar(255) NOT NULL,
  `nomor_mesin` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_detail_jaminan_sertifikat`
--

CREATE TABLE `tb_detail_jaminan_sertifikat` (
  `id_detail_sertifikat` int(11) NOT NULL,
  `id_jaminan_nasabah` int(11) NOT NULL,
  `foto_tampak_depan` varchar(255) NOT NULL,
  `foto_tampak_belakang` varchar(255) NOT NULL,
  `foto_tampak_kiri` varchar(255) NOT NULL,
  `foto_tampak_kanan` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_detail_jaminan_sertifikat`
--

INSERT INTO `tb_detail_jaminan_sertifikat` (`id_detail_sertifikat`, `id_jaminan_nasabah`, `foto_tampak_depan`, `foto_tampak_belakang`, `foto_tampak_kiri`, `foto_tampak_kanan`) VALUES
(1, 1, '72229872462e7f97b1ced66.72509959_bukti4.jpg', '164887484462e7f97b1d2c23.14240608_bukti4.jpg', '84607749862e7f97b1d5bc6.31214947_bb2.png', '143004322862e7f97b1d8297.05959727_bb2.png');

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
(1, 'admin', 'Zahra Novita', 'Bukittinggi', '083161954332'),
(2, 'petugas', 'Dimas', 'Padang', '083161954123'),
(3, 'teller', 'Monica Rahmah', 'Padang', '08316195415'),
(4, 'manajer', 'Dori Muthia', 'Padang', '083180331215');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_faktor_5c`
--

CREATE TABLE `tb_faktor_5c` (
  `id_faktor_5c` int(11) NOT NULL,
  `faktor_5c` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_faktor_5c`
--

INSERT INTO `tb_faktor_5c` (`id_faktor_5c`, `faktor_5c`) VALUES
(1, 'Kepribadian'),
(2, 'Kepekaan Sosial'),
(3, 'Ibadah'),
(6, 'Rasa Sosial'),
(7, 'Ketepatan Angsuran');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_hasil`
--

CREATE TABLE `tb_hasil` (
  `id_hasil` int(11) NOT NULL,
  `id_jaminan_nasabah` int(11) NOT NULL,
  `nik_username` varchar(16) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai_nasabah` varchar(15) NOT NULL,
  `persentase_nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_hasil`
--

INSERT INTO `tb_hasil` (`id_hasil`, `id_jaminan_nasabah`, `nik_username`, `tanggal`, `nilai_nasabah`, `persentase_nilai`) VALUES
(1, 1, '1234567891012341', '2022-08-01', 'Baik', 66);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jaminan_nasabah`
--

CREATE TABLE `tb_jaminan_nasabah` (
  `id_jaminan_nasabah` int(11) NOT NULL,
  `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL,
  `jenis_jaminan` varchar(30) NOT NULL,
  `foto_KK` varchar(124) NOT NULL,
  `foto_BPKP` varchar(124) NOT NULL,
  `foto_sertifikat` varchar(255) NOT NULL,
  `foto_surat_izin_usaha` varchar(124) NOT NULL,
  `foto_STNK` varchar(124) NOT NULL,
  `foto_rekening_listrik` varchar(124) NOT NULL,
  `foto_IMB` varchar(255) NOT NULL,
  `foto_PBB` varchar(255) NOT NULL,
  `status` varchar(30) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jaminan_nasabah`
--

INSERT INTO `tb_jaminan_nasabah` (`id_jaminan_nasabah`, `id_pemberian_pembiayaan_nasabah`, `jenis_jaminan`, `foto_KK`, `foto_BPKP`, `foto_sertifikat`, `foto_surat_izin_usaha`, `foto_STNK`, `foto_rekening_listrik`, `foto_IMB`, `foto_PBB`, `status`) VALUES
(1, 1, 'Sertifikat', '8322014662e7f92c69d905.15049986_b4.jpg', '', '53587836962e7f92c6a7a31.51535568_b4.jpg', '90582790562e7f92c6a1761.33558000_b4.jpg', '', '135451660762e7f92c6a4ce2.83237750_b4.jpg', '80273964262e7f92c6a8589.24618467_b4.jpg', '34130756562e7f92c6a8f37.77566015_b4.jpg', 'Diterima');

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
(2, 'BBA (Bai\' Bitsaman Ajil)', 'Al-bai\' bitsaman ajil(BBA) diartikan sebagai pembelian barang dengan pembayaran cicilan atau angsuran. Prinsipnya merupakan pengembangan dari prinsip murabahah, dimana pihak perbankan membiayai pembelian barang yang diperlukan nasabah dengan sistem pembayaran angsuran'),
(6, 'Mudharabah', 'mudharabah jjj');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_nasabah`
--

CREATE TABLE `tb_nasabah` (
  `id_nasabah` int(11) NOT NULL,
  `nik_username` varchar(16) NOT NULL,
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
(1, '1234567891012341', 'Juni Safitri', 'juni', 'Padang', '6283161953796', '73696435062e7f300242d62.75122001_profil1.png', '35508282262e7f300244d57.68638055_bukti4.jpg', 1);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pemberian_pembiayaan_nasabah`
--

CREATE TABLE `tb_pemberian_pembiayaan_nasabah` (
  `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL,
  `id_jenis_pembiayaan` int(11) NOT NULL,
  `nik_username` varchar(20) NOT NULL,
  `nominal_pinjaman` double NOT NULL,
  `jangka_waktu` int(11) NOT NULL,
  `tanggal_peminjaman` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pemberian_pembiayaan_nasabah`
--

INSERT INTO `tb_pemberian_pembiayaan_nasabah` (`id_pemberian_pembiayaan_nasabah`, `id_jenis_pembiayaan`, `nik_username`, `nominal_pinjaman`, `jangka_waktu`, `tanggal_peminjaman`) VALUES
(1, 2, '1234567891012341', 120000000, 18, '2022-08-01');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_pembiayaan_diterima`
--

CREATE TABLE `tb_pembiayaan_diterima` (
  `id_pembiayaan_diterima` int(11) NOT NULL,
  `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL,
  `biaya_diterima` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_pembiayaan_diterima`
--

INSERT INTO `tb_pembiayaan_diterima` (`id_pembiayaan_diterima`, `id_pemberian_pembiayaan_nasabah`, `biaya_diterima`) VALUES
(1, 1, 52000000);

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rasio_angsuran`
--

CREATE TABLE `tb_rasio_angsuran` (
  `id_rasio_angsuran` int(11) NOT NULL,
  `besar_rasio_angsuran` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rasio_angsuran`
--

INSERT INTO `tb_rasio_angsuran` (`id_rasio_angsuran`, `besar_rasio_angsuran`, `keterangan`) VALUES
(2, 30, 'Besar Rasio ANgsuran 30%');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rentang_pendapatan`
--

CREATE TABLE `tb_rentang_pendapatan` (
  `id_rentang_pendapatan` int(11) NOT NULL,
  `nilai_pendapatan_minimum` double NOT NULL,
  `keterangan` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rentang_pendapatan`
--

INSERT INTO `tb_rentang_pendapatan` (`id_rentang_pendapatan`, `nilai_pendapatan_minimum`, `keterangan`) VALUES
(2, 4500000, 'Nilai Pendapatan Minimum adalah sebsar Rp. 4.500.000');

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_rincian_5c`
--

CREATE TABLE `tb_rincian_5c` (
  `id_rincian_5c` int(11) NOT NULL,
  `id_faktor_5c` int(11) NOT NULL,
  `keterangan` text NOT NULL,
  `bobot` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_rincian_5c`
--

INSERT INTO `tb_rincian_5c` (`id_rincian_5c`, `id_faktor_5c`, `keterangan`, `bobot`) VALUES
(5, 3, 'Mengerjakan Shalat Lima Waktu', 65),
(7, 7, 'Membayar Sesuai waktu', 45),
(8, 1, 'Adaptif', 10),
(9, 1, 'Amanah', 70),
(10, 1, 'Jujur', 20),
(22, 2, 'a', 20),
(23, 2, 'b', 15),
(24, 2, 'c', 15),
(25, 2, 'd', 25),
(26, 2, 'e', 25),
(27, 3, 'Puasa Bulan Ramadhan', 10),
(28, 3, 'Zakat Fitrah', 15),
(30, 6, 'r1', 10),
(31, 6, 'membantu sesama', 30),
(32, 6, 'r3', 40),
(33, 6, 'r4', 20),
(34, 7, 'ka2', 15),
(35, 7, 'Membayar tidak terlambat', 25),
(36, 7, 'Ketepatan Angsuran', 15),
(37, 3, 'Ibadah Sunah', 10);

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
(1, 'admin', 'admin', 'Admin'),
(3, 'petugas', 'petugas', 'Petugas Lapangan'),
(4, 'teller', 'teller', 'Teller'),
(5, 'manajer', 'manajer', 'Manajer'),
(6, '1234567891012341', 'juni', 'nasabah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_analisa_pendapatan`
--
ALTER TABLE `tb_analisa_pendapatan`
  ADD PRIMARY KEY (`id_analisa_pendapatan`);

--
-- Indeks untuk tabel `tb_bukti_survei`
--
ALTER TABLE `tb_bukti_survei`
  ADD PRIMARY KEY (`id_bukti_survei`);

--
-- Indeks untuk tabel `tb_detail_jaminan_nasabah`
--
ALTER TABLE `tb_detail_jaminan_nasabah`
  ADD PRIMARY KEY (`id_detail_jaminan`);

--
-- Indeks untuk tabel `tb_detail_jaminan_sertifikat`
--
ALTER TABLE `tb_detail_jaminan_sertifikat`
  ADD PRIMARY KEY (`id_detail_sertifikat`);

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
  ADD PRIMARY KEY (`id_faktor_5c`);

--
-- Indeks untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  ADD PRIMARY KEY (`id_hasil`);

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
-- Indeks untuk tabel `tb_pembiayaan_diterima`
--
ALTER TABLE `tb_pembiayaan_diterima`
  ADD PRIMARY KEY (`id_pembiayaan_diterima`);

--
-- Indeks untuk tabel `tb_rasio_angsuran`
--
ALTER TABLE `tb_rasio_angsuran`
  ADD PRIMARY KEY (`id_rasio_angsuran`);

--
-- Indeks untuk tabel `tb_rentang_pendapatan`
--
ALTER TABLE `tb_rentang_pendapatan`
  ADD PRIMARY KEY (`id_rentang_pendapatan`);

--
-- Indeks untuk tabel `tb_rincian_5c`
--
ALTER TABLE `tb_rincian_5c`
  ADD PRIMARY KEY (`id_rincian_5c`);

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
-- AUTO_INCREMENT untuk tabel `tb_analisa_pendapatan`
--
ALTER TABLE `tb_analisa_pendapatan`
  MODIFY `id_analisa_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_bukti_survei`
--
ALTER TABLE `tb_bukti_survei`
  MODIFY `id_bukti_survei` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_jaminan_nasabah`
--
ALTER TABLE `tb_detail_jaminan_nasabah`
  MODIFY `id_detail_jaminan` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_jaminan_sertifikat`
--
ALTER TABLE `tb_detail_jaminan_sertifikat`
  MODIFY `id_detail_sertifikat` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_user`
--
ALTER TABLE `tb_detail_user`
  MODIFY `id_detail_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT untuk tabel `tb_faktor_5c`
--
ALTER TABLE `tb_faktor_5c`
  MODIFY `id_faktor_5c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

--
-- AUTO_INCREMENT untuk tabel `tb_hasil`
--
ALTER TABLE `tb_hasil`
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jaminan_nasabah`
--
ALTER TABLE `tb_jaminan_nasabah`
  MODIFY `id_jaminan_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_pembiayaan`
--
ALTER TABLE `tb_jenis_pembiayaan`
  MODIFY `id_jenis_pembiayaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;

--
-- AUTO_INCREMENT untuk tabel `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pemberian_pembiayaan_nasabah`
--
ALTER TABLE `tb_pemberian_pembiayaan_nasabah`
  MODIFY `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_pembiayaan_diterima`
--
ALTER TABLE `tb_pembiayaan_diterima`
  MODIFY `id_pembiayaan_diterima` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT untuk tabel `tb_rasio_angsuran`
--
ALTER TABLE `tb_rasio_angsuran`
  MODIFY `id_rasio_angsuran` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rentang_pendapatan`
--
ALTER TABLE `tb_rentang_pendapatan`
  MODIFY `id_rentang_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rincian_5c`
--
ALTER TABLE `tb_rincian_5c`
  MODIFY `id_rincian_5c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=7;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
