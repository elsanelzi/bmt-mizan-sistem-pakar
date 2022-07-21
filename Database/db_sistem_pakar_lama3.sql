-- phpMyAdmin SQL Dump
-- version 5.1.1
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Waktu pembuatan: 20 Jul 2022 pada 03.20
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
  `pendapatan_kotor` double NOT NULL,
  `biaya_umum_dan_adm` double NOT NULL,
  `biaya_pemasaran` double NOT NULL,
  `total_biaya_admin` double NOT NULL,
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

INSERT INTO `tb_analisa_pendapatan` (`id_analisa_pendapatan`, `id_pemberian_pembiayaan_nasabah`, `jumlah_tabungan`, `jumlah_hutang`, `penjualan`, `biaya_tenaga_kerja`, `biaya_bahan_baku`, `biaya_overhead`, `harga_pokok_produksi`, `pendapatan_kotor`, `biaya_umum_dan_adm`, `biaya_pemasaran`, `total_biaya_admin`, `pendapatan_per_bulan`, `pendapatan_lain_lain`, `total_pendapatan_per_bulan`, `biaya_makan`, `biaya_transportasi`, `biaya_sewa`, `biaya_air`, `biaya_listrik`, `biaya_telepon`, `biaya_pendidikan`, `biaya_lain_lain`, `total_biaya_hidup_per_bulan`, `pendapatan_bersih_per_bulan`) VALUES
(1, 2, 150000, 5000, 55000, 10000, 1000, 9000, 15000, 165000, 78000, 21000, 99000, 66000, 7000, 73000, 1000, 6000, 8000, 2000, 9000, 2000, 1000, 7000, 36000, 37000),
(2, 3, 150000, 5000, 55000, 10000, 1000, 9000, 15000, 165000, 78000, 21000, 99000, 66000, 7000, 73000, 1000, 6000, 8000, 2000, 9000, 2000, 1000, 9000, 38000, 35000);

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
  `nik_username` varchar(30) NOT NULL,
  `id_faktor_5c` int(11) NOT NULL,
  `tanggal` date NOT NULL,
  `nilai_nasabah` double NOT NULL,
  `persentase_nilai` double NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- --------------------------------------------------------

--
-- Struktur dari tabel `tb_jaminan_nasabah`
--

CREATE TABLE `tb_jaminan_nasabah` (
  `id_jaminan_nasabah` int(11) NOT NULL,
  `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL,
  `foto_KK` varchar(124) NOT NULL,
  `foto_BPKP` varchar(124) NOT NULL,
  `foto_surat_izin_usaha` varchar(124) NOT NULL,
  `foto_STNK` varchar(124) NOT NULL,
  `foto_rekening_listrik` varchar(124) NOT NULL,
  `status` enum('pending','konfirmasi') NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data untuk tabel `tb_jaminan_nasabah`
--

INSERT INTO `tb_jaminan_nasabah` (`id_jaminan_nasabah`, `id_pemberian_pembiayaan_nasabah`, `foto_KK`, `foto_BPKP`, `foto_surat_izin_usaha`, `foto_STNK`, `foto_rekening_listrik`, `status`) VALUES
(1, 2, '120263902162d265b6809d33.55498460_b3.jpg', '44303160662d265b680dae0.87825155_bukti3.jpg', '146412982862d265b6810a60.61266010_bukti4.jpg', '102155922962d265b6813230.37080726_b4.jpg', '98203163462d265b68162a2.56713232_bb2.png', 'pending'),
(2, 3, '187809084962d2bbf9695098.55478357_bukti4.jpg', '126294067562d2bbf96981e4.85072720_b4.jpg', '134066516862d2bbf969a9c6.81894349_bukti2.png', '70567164262d2bbf969d6c5.46544563_b4.jpg', '97869069462d2bbf96a1223.61258066_bukti4.jpg', 'konfirmasi');

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
(2, 'BBA (Bai\' Bitsaman Ajil)', 'Al-bai\' bitsaman ajil(BBA) diartikan sebagai pembelian barang dengan pembayaran cicilan atau angsuran. Prinsipnya merupakan pengembangan dari prinsip murabahah, dimana pihak perbankan membiayai pembelian barang yang diperlukan nasabah dengan sistem pembayaran angsuran');

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
(1, '1234', 'Juni Safitri', 'juni', 'Pasaman', '083161954321', '3721846662bcc5046ef765.73831849_profil.jpg', '107683562562bcc5046f25b0.90560865_background2.jpg', 1),
(2, '12', 'Rades Saputri', 'rades', 'Bengkulu', '083161951317', '64459511362c6687c4e8eb5.83406984_profil1.png', '25881265962c6687c4eb6a2.40671853_background-1.jpg', 0),
(3, '135', 'benni', 'benni', 'Padang Panjang', '083161954361', '69949583762d62dc4ca4859.04199382_profil1.png', '115176824562d62dc4ca6b20.21134947_b3.jpg', 0);

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
(2, 2, '1234', 120000000, 24, '2022-07-16'),
(3, 2, '1234', 11000000, 18, '2022-07-16');

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
(7, 7, 'Membayar Sesuai waktu', 89),
(8, 1, 'Adaptif', 20),
(9, 1, 'Amanah', 70),
(10, 1, 'Jujur', 10);

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
(6, '12', 'rades', 'nasabah'),
(7, '135', 'benni', 'nasabah');

--
-- Indexes for dumped tables
--

--
-- Indeks untuk tabel `tb_analisa_pendapatan`
--
ALTER TABLE `tb_analisa_pendapatan`
  ADD PRIMARY KEY (`id_analisa_pendapatan`);

--
-- Indeks untuk tabel `tb_detail_jaminan_nasabah`
--
ALTER TABLE `tb_detail_jaminan_nasabah`
  ADD PRIMARY KEY (`id_detail_jaminan`);

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
  MODIFY `id_analisa_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_detail_jaminan_nasabah`
--
ALTER TABLE `tb_detail_jaminan_nasabah`
  MODIFY `id_detail_jaminan` int(11) NOT NULL AUTO_INCREMENT;

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
  MODIFY `id_hasil` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT untuk tabel `tb_jaminan_nasabah`
--
ALTER TABLE `tb_jaminan_nasabah`
  MODIFY `id_jaminan_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_jenis_pembiayaan`
--
ALTER TABLE `tb_jenis_pembiayaan`
  MODIFY `id_jenis_pembiayaan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT untuk tabel `tb_nasabah`
--
ALTER TABLE `tb_nasabah`
  MODIFY `id_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_pemberian_pembiayaan_nasabah`
--
ALTER TABLE `tb_pemberian_pembiayaan_nasabah`
  MODIFY `id_pemberian_pembiayaan_nasabah` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT untuk tabel `tb_rentang_pendapatan`
--
ALTER TABLE `tb_rentang_pendapatan`
  MODIFY `id_rentang_pendapatan` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT untuk tabel `tb_rincian_5c`
--
ALTER TABLE `tb_rincian_5c`
  MODIFY `id_rincian_5c` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=22;

--
-- AUTO_INCREMENT untuk tabel `tb_user`
--
ALTER TABLE `tb_user`
  MODIFY `id_user` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
