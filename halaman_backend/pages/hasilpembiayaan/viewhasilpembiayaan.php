<?php
// Query menampilkan data hasil pembiayaan nasabah
$dataHasilPembiayaan = mysqli_query($koneksi, "SELECT *, n.nik_username as nik_username, ppn.id_pemberian_pembiayaan_nasabah as id_pemberian_pembiayaan_nasabah FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_bukti_survei bs ON bs.id_hasil=h.id_hasil LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah WHERE jn.status='Diterima' || status='Ditolak' ORDER BY h.id_hasil ASC");


// Query menampilkan data hasil pembiayaan nasabah pada Teller
$dataHasilPembiayaanTeller = mysqli_query($koneksi, "SELECT *, n.nik_username as nik_username, ppn.id_pemberian_pembiayaan_nasabah as id_pemberian_pembiayaan_nasabah FROM tb_hasil h LEFT JOIN tb_jaminan_nasabah jn ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_bukti_survei bs ON bs.id_hasil=h.id_hasil LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah WHERE status_validasi_hasil=1 AND jn.status='Diterima' || status='Ditolak' ORDER BY h.id_hasil ASC");


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

                <div class="card">
                    <h3 style="padding:10px;margin-left:10px">Data Hasil Pembiayaan</h3>
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
                                    <th>Tanggal</th>
                                    <!-- <th>Nilai Nasabah</th>
                                    <th>Persentase Nilai (%)</th> -->
                                    <th>Status</th>
                                    <th>Pembiayaan Yang Dapat Diberikan</th>
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <?php if ($_SESSION['status'] == 'Manajer') : ?>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataHasilPembiayaan as $key => $value) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['nama_lengkap']; ?></td>
                                            <td><?= $value['nik_username']; ?></td>
                                            <td><?= $value['tanggal']; ?></td>
                                            <!-- <td><?= $value['nilai_nasabah']; ?></td>
                                            <td><?= $value['persentase_nilai']; ?> %</td> -->
                                            <td><?= $value['status']; ?></td>
                                            <?php if ($value['status'] == 'Diterima') : ?>

                                                <td class="text-success">Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></td>
                                            <?php elseif ($value['status'] == 'Ditolak') : ?>
                                                <td class="text-danger">Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></td>
                                            <?php endif; ?>
                                            <td class="text-center">
                                                <a href="?page=pages/hasilpembiayaan/detailhasilpembiayaan&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" class="btn btn-success">Detail</i></a>

                                                <a href="cetak_hasil.php?&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" target="_blank" class="btn btn-danger mt-2 ml-1 my-2 mr-1">
                                                    Cetak</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php elseif ($_SESSION['status'] == 'Teller') : ?>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataHasilPembiayaanTeller as $key => $value) : ?>
                                        <tr>
                                            <td><?= $no++; ?></td>
                                            <td><?= $value['nama_lengkap']; ?></td>
                                            <td><?= $value['nik_username']; ?></td>
                                            <td><?= $value['tanggal']; ?></td>
                                            <td><?= $value['nilai_nasabah']; ?></td>
                                            <td><?= $value['persentase_nilai']; ?> %</td>
                                            <td><?= $value['status']; ?></td>
                                            <?php if ($value['status'] == 'Diterima') : ?>
                                                <?php
                                                // Query menampilkan data rasio angsuran
                                                $dataRasioAngsuran = mysqli_query($koneksi, "SELECT * FROM tb_rasio_angsuran")->fetch_array();
                                                $besar_rasio_angsuran = $dataRasioAngsuran['besar_rasio_angsuran'];
                                                $biaya_diterima = ($besar_rasio_angsuran * $value['pendapatan_bersih_per_bulan'] * $value['jangka_waktu']) / 100;
                                                ?>
                                                <td class="text-success">Rp. <?= number_format($biaya_diterima, 0, '.', '.'); ?></td>
                                            <?php elseif ($value['status'] == 'Ditolak') : ?>
                                                <td class="text-danger">Rp. <?= number_format(0, 0, '.', '.'); ?></td>
                                            <?php endif; ?>
                                            <td class="text-center">
                                                <a href="?page=pages/hasilpembiayaan/detailhasilpembiayaan&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" class="btn btn-success">Detail</i></a>

                                                <a href="cetak_hasil.php?&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" target="_blank" class="btn btn-danger mt-2 ml-1 my-2 mr-1">
                                                    Cetak</a>
                                            </td>
                                        </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            <?php endif; ?>
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