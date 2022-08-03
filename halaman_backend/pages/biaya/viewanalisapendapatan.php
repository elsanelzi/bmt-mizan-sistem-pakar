<?php $dataPemberianPembiayaanNasabah = mysqli_query($koneksi, "SELECT * FROM tb_pemberian_pembiayaan_nasabah ppn LEFT JOIN tb_nasabah n ON ppn.nik_username=n.nik_username LEFT JOIN tb_jaminan_nasabah jn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah WHERE status='selesai survei 5c' || status='analisa pendapatan' || status='Diterima' || status='Ditolak' ORDER BY ppn.id_pemberian_pembiayaan_nasabah ASC");
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
                        <li class="breadcrumb-item"><a href="?page=pages/biaya/viewanalisapendapatan">Data Analisa Pendapatan</a></li>
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

                <div class="card">
                    <h3 style="padding:10px;margin-left:10px">Data Analisa Pendapatan</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body">

                        <table id="dataTable" class="table table-bordered table-striped table-hover">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Nominal Pinjaman</th>
                                    <th>Jangka Waktu</th>
                                    <th>Status</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataPemberianPembiayaanNasabah as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['nama_lengkap']; ?></td>
                                        <td><?= $value['nik_username']; ?></td>
                                        <td>Rp. <?= number_format($value['nominal_pinjaman'], 0, '.', '.'); ?></td>
                                        <td><?= $value['jangka_waktu']; ?> bulan</td>
                                        <td><?= $value['status']; ?></td>
                                        <td class="text-center">
                                            <?php if ($value['status'] == 'selesai survei 5c') : ?>
                                                <a href="?page=pages/biaya/formanalisapendapatan&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" class="btn btn-danger">Analisa</i></a>
                                            <?php elseif ($value['status'] == 'analisa pendapatan' || $value['status'] == 'Ditolak' || $value['status'] == 'Diterima') : ?>
                                                <a href="" data-toggle="modal" data-target="#lihat_hasil_analisa<?= $value['id_pemberian_pembiayaan_nasabah'] ?>" class="btn btn-danger btn-md float-right">Lihat Hasil Analisa</a>
                                            <?php endif; ?>

                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                    <!-- /.card-body -->
                </div>
                <!-- /.card -->
            </div>
            <!-- /.col -->
        </div>
        <!-- /.row -->
        <?php foreach ($dataPemberianPembiayaanNasabah as $key => $value) : ?>
            <div class="modal fade" id="lihat_hasil_analisa<?= $value['id_pemberian_pembiayaan_nasabah'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: centers;">HASIL SURVEI ANALISA PENDAPATAN NASABAH</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <?php $id_pemberian_pembiayaan_nasabah = $value['id_pemberian_pembiayaan_nasabah']; ?>
                            <?php
                            // 
                            $data_analisa_pendapatan = mysqli_query($koneksi, "SELECT * FROM tb_analisa_pendapatan WHERE id_pemberian_pembiayaan_nasabah=$id_pemberian_pembiayaan_nasabah"); ?>
                            <?php foreach ($data_analisa_pendapatan as $key => $value) : ?>
                                <table class="table table-bordered table-striped table-hover">
                                    <tr>
                                        <td width="30%">Jumlah Tabungan</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['jumlah_tabungan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Jumlah Hutang</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['jumlah_hutang'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Taksiran Kendaraan</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['taksiran_kendaraan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Penjualan</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['penjualan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Tenaga Kerja</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_tenaga_kerja'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Bahan Baku</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_bahan_baku'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Overhead</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_overhead'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Harga Pokok Produksi</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['harga_pokok_produksi'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Umum dan ADM</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_umum_dan_adm'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Pemasaran</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_pemasaran'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Pendapatan / Bulan</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['pendapatan_per_bulan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Pendapatan Lain-Lain</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['pendapatan_lain_lain'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Total Pendapatan / Bulan</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['total_pendapatan_per_bulan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Makan</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_makan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Transportasi</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_transportasi'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Sewa</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_sewa'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Air</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_air'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Listrik</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_listrik'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Telepon</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_telepon'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Pendidikan</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_pendidikan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Biaya Lain-Lain</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['biaya_lain_lain'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr>
                                        <td width="30%">Total Biaya Hidup / Bulan</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['total_biaya_hidup_per_bulan'], 0, '.', '.'); ?></td>
                                    </tr>
                                    <tr class="text-danger fw-bold">
                                        <td width="30%">Pendapatan Bersih</td>
                                        <td width="5%" style="text-align: right;">:</td>
                                        <td> Rp. <?= number_format($value['pendapatan_bersih_per_bulan'], 0, '.', '.'); ?></td>
                                    </tr>
                                </table>
                            <?php endforeach; ?>

                            <div class="modal-footer">
                                <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                            </div>
                        </div> <!-- /MODAL BODY -->
                    </div>
                </div>
            </div>

        <?php endforeach; ?>
    </section>
    <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->