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
                        <li class="breadcrumb-item"><a href="?page=pages/laporannasabah/viewlaporannasabahperjenispembiayaan">Laporan Nasabah Per Jenis Pembiayaan</a></li>
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
                    <h3 style="padding:10px;margin-left:10px">Laporan Nasabah Per Jenis Pembiayaan</h3>
                </div>
                <div class="card">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                    </div>
                    <!-- /.card-header -->
                    <div class="card-header">
                        <?php
                        date_default_timezone_set('Asia/Jakarta');
                        $tgl = date('m');
                        ?>
                        <form action="" method="POST">
                            <div class="row float-center">
                                <div class="col-md-6">
                                    <select class="form-control" name="per_jenis_pembiayaan" id="per_jenis_pembiayaan">
                                        <?php
                                        $jenis_pembiayaan = mysqli_query($koneksi, "SELECT * FROM tb_jenis_pembiayaan ORDER BY id_jenis_pembiayaan ASC"); ?>
                                        <option value="<?= $tgl; ?>">Pilih Jenis Pembiayaan</option>
                                        <?php foreach ($jenis_pembiayaan as $b => $value) : ?>
                                            <option value="<?= $value['id_jenis_pembiayaan']; ?>"><?= $value['jenis_pembiayaan']; ?></option>
                                        <?php endforeach;  ?>
                                    </select>
                                </div>

                                <div class="col-md-6 float-end" style="margin-top: -7px;">
                                    <button type="submit" class="btn btn-primary my-2" name="cari">Cari</button>

                                    <!-- <?php if (isset($_POST['cari'])) : ?>
                                        <a href="print.php?&periode=<?= $_POST['periode']; ?>" target="_blank" class="btn btn-danger mt-2 ml-1 my-2 mr-1">
                                            Print</a>
                                    <?php else : ?>
                                        <a href="print1.php" target="_blank" class="btn btn-danger mt-2 ml-1 my-2 mr-1">
                                            Print</a>
                                    <?php endif; ?> -->
                                    <button type="reset" class="btn btn-danger my-2">Reset</button>
                                </div>


                        </form>
                        <?php
                        // Query menampilkan data hasil pembiayaan nasabah
                        $dataHasilPembiayaan = mysqli_query($koneksi, "SELECT *, n.nik_username as nik_username, ppn.id_pemberian_pembiayaan_nasabah as id_pemberian_pembiayaan_nasabah FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_bukti_survei bs ON bs.id_hasil=h.id_hasil LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_jenis_pembiayaan jp ON jp.id_jenis_pembiayaan=ppn.id_jenis_pembiayaan WHERE jn.status='Diterima' || status='Ditolak' ORDER BY h.id_hasil ASC");
                        // tombol cari ditekan
                        if (isset($_POST['cari'])) {
                            $jenis_pembiayaan = $_POST['per_jenis_pembiayaan'];

                            // Mengambil data untuk laporan nasabah bmt dimana tanggal bayar sama dengan jenis_pembiayaan yang diinputkan

                            $dataHasilPembiayaan = mysqli_query($koneksi, "SELECT *, n.nik_username as nik_username, ppn.id_pemberian_pembiayaan_nasabah as id_pemberian_pembiayaan_nasabah FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_bukti_survei bs ON bs.id_hasil=h.id_hasil LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_jenis_pembiayaan jp ON jp.id_jenis_pembiayaan=ppn.id_jenis_pembiayaan WHERE jp.id_jenis_pembiayaan=$jenis_pembiayaan AND jn.status='Diterima' || status='Ditolak' ORDER BY h.id_hasil ASC");
                        }

                        ?>
                    </div>
                    <div class="card-body">

                        <table class="table table-bordered table-striped table-hover">
                            <thead style="background-color: aqua;">
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Username</th>
                                    <th>Tanggal</th>
                                    <th>Jenis Pembiayaan</th>
                                    <!-- <th>Nilai Nasabah</th>
                                    <th>Persentase Nilai (%)</th> -->
                                    <th>Status</th>
                                    <th>Pembiayaan Yang Dapat Diberikan</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($dataHasilPembiayaan as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++; ?></td>
                                        <td><?= $value['nama_lengkap']; ?></td>
                                        <td><?= $value['nik_username']; ?></td>
                                        <td><?= $value['tanggal']; ?></td>
                                        <td><?= $value['jenis_pembiayaan']; ?></td>
                                        <!-- <td><?= $value['nilai_nasabah']; ?></td>
                                            <td><?= $value['persentase_nilai']; ?> %</td> -->
                                        <td><?= $value['status']; ?></td>
                                        <?php if ($value['status'] == 'Diterima') : ?>

                                            <td class="text-success">Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></td>
                                        <?php elseif ($value['status'] == 'Ditolak') : ?>
                                            <td class="text-danger">Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></td>
                                        <?php endif; ?>
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
    </section>
    <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->