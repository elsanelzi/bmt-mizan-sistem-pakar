<?php
$id = $_GET['id'];
// Query menampilkan data hasil pembiayaan nasabah
$dataHasilPembiayaan = mysqli_query($koneksi, "SELECT *, n.nik_username as nik_username FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_jenis_pembiayaan jp ON jp.id_jenis_pembiayaan=ppn.id_jenis_pembiayaan LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_bukti_survei bs ON bs.id_hasil=h.id_hasil LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah WHERE ppn.id_pemberian_pembiayaan_nasabah=$id AND jn.status='Diterima' || status='Ditolak' ORDER BY h.id_hasil ASC");

$dataRasioAngsuran = mysqli_query($koneksi, "SELECT * FROM tb_rasio_angsuran")->fetch_array();
$dataRentangPendapatan = mysqli_query($koneksi, "SELECT * FROM tb_rentang_pendapatan")->fetch_array();

?>
<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Data Pengguna</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=pages/hasilpembiayaan/viewhasilpembiayaan">Data Hasil Pembiayaan</a></li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="row">
            <div class="col-12">

                <!-- <div class="card">
                    <h3 style="padding:10px;margin-left:10px">Detail Data Hasil Pembiayaan</h3>
                </div> -->
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table class="table table-striped table-hover">
                            <thead style="background-color:aquamarine;">
                                <tr>
                                    <th colspan="3" style="text-align:center; color:darkgoldenrod">HASIL PEMBERIAN PEMBIAYAAN NASABAH</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataHasilPembiayaan as $key => $value) : ?>
                                    <tr style="border-bottom:2px;">
                                        <td colspan="3" style="text-align:left; font-weight:bold">DATA NASABAH : </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nama</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td><?= $value['nama_lengkap']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">NIK</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td><?= $value['nik_username']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Alamat</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td><?= $value['alamat']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">No. Telepon</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td><?= $value['no_telepon']; ?></td>
                                    </tr>
                                    <tr style="border-bottom:2px;">
                                        <td colspan="3" style="text-align:left; font-weight:bold">DATA PEMINJAMAN NASABAH : </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Jenis Pembiayaan</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td><?= $value['jenis_pembiayaan']; ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Nominal Pinjaman</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td class="text-danger">Rp. <?= number_format($value['nominal_pinjaman'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Jangka Waktu</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td><?= $value['jangka_waktu']; ?> bulan</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Tanggal Peminjaman</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td><?= $value['tanggal_peminjaman']; ?></td>
                                    </tr>
                                    <tr style="border-bottom:2px;">
                                        <td colspan="3" style="text-align:left; font-weight:bold">RASIO ANGSURAN DAN RENTANG PENDAPATAN : </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Rasio Angsuran</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td class="text-success"><?= $dataRasioAngsuran['besar_rasio_angsuran']; ?> %</td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Pendapatan Minimum</td>
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
                                        <td width="20%" style="font-weight: bold;">Penerimaan Biaya</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <!-- <?php if ($value['status'] == 'Diterima') : ?>
                                            <?php
                                                    // Query menampilkan data rasio angsuran
                                                    $dataRasioAngsuran = mysqli_query($koneksi, "SELECT * FROM tb_rasio_angsuran")->fetch_array();
                                                    $besar_rasio_angsuran = $dataRasioAngsuran['besar_rasio_angsuran'];
                                                    $biaya_diterima = ($besar_rasio_angsuran * $value['pendapatan_bersih_per_bulan'] * $value['jangka_waktu']) / 100;
                                            ?>
                                            <td class="text-success" style="font-weight: bold; color:blueviolet">Rp. <?= number_format($biaya_diterima, 0, '.', '.'); ?></td>
                                        <?php elseif ($value['status'] == 'Ditolak') : ?>
                                            <td class="text-danger" style="font-weight: bold; color:blueviolet">Rp. <?= number_format(0, 0, '.', '.'); ?></td>
                                        <?php endif; ?> -->
                                        <td><strong>Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></strong></td>
                                    </tr>
                                    <tr class="fw-bold">
                                        <td width="20%"><strong>Bukti Lampiran Survei</strong></td>
                                        <td width="3%" style="text-align: right;"><strong>:</strong></td>
                                        <td><a href="../assets/image/foto lampiran survei/<?= $value['bukti_lampiran_survei'] ?>" target="_blank"><img src="../assets/image/foto lampiran survei/<?= $value['bukti_lampiran_survei'] ?>" alt="" width="200px" height="300px"></a></td>
                                    </tr>

                                    <!-- <tr style="border-bottom:2px;">
                                        <td colspan="3" style="text-align:left; font-weight:bold">RINCIAN ANALISA PENDAPATAN : </td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Jumlah Tabungan</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['jumlah_tabungan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Jumlah Hutang</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['jumlah_hutang'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Penjualan</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['penjualan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Biaya Tenaga Kerja</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['biaya_tenaga_kerja'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Biaya Bahan Baku</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['biaya_bahan_baku'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="20%">Biaya Overhead</td>
                                        <td width="3%" style="text-align: right;">:</td>
                                        <td>Rp. <?= number_format($value['biaya_overhead'], 0, '.', '.'); ?></td>
                                    </tr> -->
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                        <a href="?page=pages/hasilpembiayaan/viewhasilpembiayaan" class="btn btn-success" style="justify-content: left; margin-top:40px;">Kembali</a>
                    </div>
                    <!-- /.card-body -->

                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
    </section>
    <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->