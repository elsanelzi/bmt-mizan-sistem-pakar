<style>
    th,
    td {
        font-size: 18px;
        margin-bottom: 5px;
        margin-top: 5px;
        ;
    }

    th {
        margin-bottom: 10px;
    }
</style>

<?php
include "koneksi.php";

session_start();

if (!isset($_SESSION['status'])) {
    header("location: halaman_awal/login/login.php");
    die();
}

$id = $_GET['id'];
$nik_username = $_SESSION['username'];
// Query menampilkan data hasil pembiayaan nasabah
$dataHasilPembiayaan = mysqli_query($koneksi, "SELECT *, n.nik_username as nik_username FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_jenis_pembiayaan jp ON jp.id_jenis_pembiayaan=ppn.id_jenis_pembiayaan LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah WHERE n.nik_username='$nik_username' AND ppn.id_pemberian_pembiayaan_nasabah=$id AND jn.status='Diterima' || status='Ditolak' ORDER BY id_hasil ASC");

$dataRasioAngsuran = mysqli_query($koneksi, "SELECT * FROM tb_rasio_angsuran")->fetch_array();
$dataRentangPendapatan = mysqli_query($koneksi, "SELECT * FROM tb_rentang_pendapatan")->fetch_array();

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title class="text-center">Laporan Hasil Pemberian Pembiayaan Nasabah</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
    <?php include "halaman_backend/components/head.php" ?>
</head>

<body onload="window.print()">

    <div class="container-fluid">
        <!-- judul laporan -->
        <div class="row mb-6 mt-8">
            <!-- <div class="col-md-12">
                <h2 style="text-align: center;">Laporan Hasil Pemberian Pembiayaan Nasabah</h2>
                <hr style="border-bottom: 2px; color:black">
            </div> -->
        </div>

        <br><br>
        <div class="row">
            <h3 colspan="3" style="text-align:center; color:red; margin-bottom:30px; font-size:23px;">HASIL PEMBERIAN PEMBIAYAAN NASABAH</h3>
        </div>
        <div class="row">
            <div class="col-md-12">
                <table class="table table-striped table-hover">
                    <thead style="background-color:aquamarine;">
                        <!-- <tr>
                            <th colspan="3" style="text-align:center; color:red; margin-bottom:30px; font-size:23px;">HASIL PEMBERIAN PEMBIAYAAN NASABAH</th>
                        </tr> -->
                    </thead>
                    <tbody>
                        <?php
                        $no = 1;
                        foreach ($dataHasilPembiayaan as $key => $value) : ?>
                            <tr style="border-bottom:2px;">
                                <td colspan="3" style="text-align:left; font-weight:bold">DATA NASABAH : </td>
                            </tr>
                            <tr>
                                <td width="35%">Nama</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td><?= $value['nama_lengkap']; ?></td>
                            </tr>
                            <tr>
                                <td width="35%">NIK</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td><?= $value['nik_username']; ?></td>
                            </tr>
                            <tr>
                                <td width="35%">Alamat</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td><?= $value['alamat']; ?></td>
                            </tr>
                            <tr>
                                <td width="35%">No. Telepon</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td><?= $value['no_telepon']; ?></td>
                            </tr>
                            <tr style="border-bottom:2px;">
                                <td colspan="3" style="text-align:left; font-weight:bold">DATA PEMINJAMAN NASABAH : </td>
                            </tr>
                            <tr>
                                <td width="35%">Jenis Pembiayaan</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td><?= $value['jenis_pembiayaan']; ?></td>
                            </tr>
                            <tr>
                                <td width="35%">Nominal Pinjaman</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td class="text-danger">Rp. <?= number_format($value['nominal_pinjaman'], 0, '.', '.'); ?></td>
                            </tr>
                            <tr>
                                <td width="35%">Jangka Waktu</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td><?= $value['jangka_waktu']; ?> bulan</td>
                            </tr>
                            <tr>
                                <td width="35%">Tanggal Peminjaman</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td><?= $value['tanggal_peminjaman']; ?></td>
                            </tr>
                            <tr style="border-bottom:2px;">
                                <td colspan="3" style="text-align:left; font-weight:bold">RASIO ANGSURAN DAN RENTANG PENDAPATAN : </td>
                            </tr>
                            <tr>
                                <td width="35%">Rasio Angsuran</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td class="text-success"><?= $dataRasioAngsuran['besar_rasio_angsuran']; ?> %</td>
                            </tr>
                            <tr>
                                <td width="35%">Pendapatan Minimum</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td class="text-danger">Rp. <?= number_format($dataRentangPendapatan['nilai_pendapatan_minimum'], 0, '.', '.'); ?></td>
                            </tr>
                            <tr style="border-bottom:2px;">
                                <td colspan="3" style="text-align:left; font-weight:bold">HASIL PEMBERIAN PEMBIAYAAN NASABAH : </td>
                            </tr>
                            <tr class="fw-bold text-success">
                                <td width="20%">Jumlah Tabungan</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td>Rp. <?= number_format($value['jumlah_tabungan'], 0, '.', '.'); ?></td>
                            </tr>
                            <tr class="fw-bold text-danger">
                                <td width="20%">Jumlah Hutang</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <td>Rp <?= number_format($value['jumlah_hutang'], 0, '.', '.'); ?></td>
                            </tr>
                            <tr class="fw-bold text-danger">
                                <td width="20%"><strong>Nilai Nasabah</strong></td>
                                <td width="3%" style="text-align: right;"><strong>:</strong></td>
                                <td><strong><?= $value['nilai_nasabah']; ?> </strong></td>
                            </tr>

                            <tr class="fw-bold text-danger">
                                <td width="20%"><strong>Persentase Nilai</strong></td>
                                <td width="3%" style="text-align: right;"><strong>:</strong></td>
                                <td><strong><?= $value['persentase_nilai']; ?> %</strong></td>
                            </tr>
                            <tr class="fw-bold text-danger">
                                <td width="20%"><strong>Pendapatan Bersih</strong></td>
                                <td width="3%" style="text-align: right;"><strong>:</strong></td>
                                <td><strong>Rp. <?= number_format($value['pendapatan_bersih_per_bulan'], 0, '.', '.'); ?></strong></td>
                            </tr>
                            <tr class="fw-bold">
                                <td width="20%"><strong>Status</strong></td>
                                <td width="3%" style="text-align: right;"><strong>:</strong></td>
                                <td><strong><?= $value['status']; ?></strong></td>
                            </tr>
                            <tr class="fw-bold text-success">
                                <td width="35%" style="font-weight: bold;">Penerimaan Biaya</td>
                                <td width="3%" style="text-align: right;">:</td>
                                <?php if ($value['status'] == 'Diterima') : ?>
                                    <td class="text-success" style="font-weight: bold; color:blueviolet">Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></td>
                                <?php elseif ($value['status'] == 'Ditolak') : ?>
                                    <td class="text-danger" style="font-weight: bold; color:blueviolet">Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></td>
                                <?php endif; ?>
                            </tr>

                            <!-- <tr style="border-bottom:2px;">
                                        <td colspan="3" style="text-align:left; font-weight:bold">RINCIAN ANALISA PENDAPATAN : </td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Jumlah Tabungan</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['jumlah_tabungan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Jumlah Hutang</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['jumlah_hutang'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Penjualan</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['penjualan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Biaya Tenaga Kerja</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['biaya_tenaga_kerja'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Biaya Bahan Baku</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['biaya_bahan_baku'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="35%">Biaya Overhead</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['biaya_overhead'], 0, '.', '.'); ?></td>
                                    </tr> -->
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>
    <!-- disetujui -->
    <div class="row" style="text-align: right;">
        <div class="col-md-9 offset-md-0 text-center">
        </div>
        <div class="col-md-3  text-center">

            <h5 style="font-size:15px;" class="mb-5">Padang, <?= date('d-m-Y') ?><br>Hormat Kami,</h5>
            <p style="margin-top: -10px;">(............................)</p>
        </div>
    </div>

    <?php include "halaman_backend/components/script.php" ?>

</body>

</html>