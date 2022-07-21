<?php
// Query menampilkan data validasi peminjaman
$data = mysqli_query($koneksi, "SELECT n.nik_username, n.nama_lengkap, ppn.id_pemberian_pembiayaan_nasabah, ppn.nominal_pinjaman, ppn.jangka_waktu, jn.id_jaminan_nasabah, jn.status, ap.pendapatan_bersih_per_bulan,h.nilai_nasabah FROM tb_pemberian_pembiayaan_nasabah ppn LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_jaminan_nasabah jn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_hasil h ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah WHERE jn.status!='pending' AND jn.status!='konfirmasi' AND jn.status!='selsai survei 5c' GROUP BY ppn.id_pemberian_pembiayaan_nasabah ORDER BY jn.id_jaminan_nasabah ASC");

// var_dump($data);
// die;

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
                        <li class="breadcrumb-item"><a href="?page=pages/peminjaman/viewvalidasipeminjaman">Data Validasi Peminjaman</a></li>
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
                    <h3 style="padding:10px;margin-left:10px">Data Validasi Peminjaman</h3>
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
                                    <th>Pendapatan Bersih</th>
                                    <th>Jangka Waktu</th>
                                    <th>Status</th>
                                    <th colspan="2">Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($data as $key => $value) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $value['nama_lengkap']; ?></td>
                                        <td><?= $value['nik_username']; ?></td>
                                        <td>Rp. <?= number_format($value['nominal_pinjaman'], 0, '.', '.'); ?></td>
                                        <td>Rp. <?= number_format($value['pendapatan_bersih_per_bulan'], 0, '.', '.'); ?></td>
                                        <td><?= $value['jangka_waktu']; ?></td>
                                        <td><?= $value['status']; ?></td>
                                        <form action="" method="POST">
                                            <td class="text-center">
                                                <a href="#" class="btn btn-success">Detail</i></a>
                                                <input type="hidden" name="id_pemberian_pembiayaan_nasabah" value="<?= $value['id_pemberian_pembiayaan_nasabah']; ?>">
                                                <input type="hidden" name="nominal_pinjaman" value="<?= $value['nominal_pinjaman'] ?>">
                                                <input type="hidden" name="pendapatan_bersih_per_bulan" value="<?= $value['pendapatan_bersih_per_bulan'] ?>">
                                                <input type="hidden" name="nilai_nasabah" value="<?= $value['nilai_nasabah'] ?>">
                                                <?php if ($value['status'] == 'analisa pendapatan') : ?>
                                                    <button name="validasi_peminjaman" class="btn btn-danger">Validasi</i></a>
                                                    <?php endif ?>
                                            </td>
                                        </form>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>

                        <?php

                        if (isset($_POST['validasi_peminjaman'])) {
                            $id_pemberian_pembiayaan_nasabah = $_POST['id_pemberian_pembiayaan_nasabah'];
                            $nominal_pinjaman = $_POST['nominal_pinjaman'];
                            $pendapatan_bersih = $_POST['pendapatan_bersih_per_bulan'];
                            $nilai_nasabah = $_POST['nilai_nasabah'];

                            $dataPendapatanMinimum = mysqli_query($koneksi, "SELECT nilai_pendapatan_minimum FROM tb_rentang_pendapatan")->fetch_array();
                            $pendapatan_minimum = $dataPendapatanMinimum['nilai_pendapatan_minimum'];

                            if ($nilai_nasabah == 'Sangat Baik' && $pendapatan_bersih > $pendapatan_minimum) {
                                $status = 'Diterima';
                            } elseif ($nilai_nasabah == 'Baik' && $pendapatan_bersih > $pendapatan_minimum) {
                                $status = 'Diterima';
                            } elseif ($nilai_nasabah == 'Cukup Baik' && $pendapatan_bersih > $pendapatan_minimum) {
                                $status = 'Ditolak';
                            } elseif ($nilai_nasabah == 'Kurang Baik' && $pendapatan_bersih > $pendapatan_minimum) {
                                $status = 'Ditolak';
                            } elseif ($nilai_nasabah == 'Sangat Baik' && $pendapatan_bersih < $pendapatan_minimum) {
                                $status = 'Ditolak';
                            } elseif ($nilai_nasabah == 'Baik' && $pendapatan_bersih < $pendapatan_minimum) {
                                $status = 'Ditolak';
                            }

                            // // Edit data tabel jaminan nasabah
                            $edit = $koneksi->query("UPDATE tb_jaminan_nasabah SET status= '$status' WHERE id_pemberian_pembiayaan_nasabah='$id_pemberian_pembiayaan_nasabah'");

                            if ($edit) {
                                $_SESSION['info'] = 'Berhasil Divalidasi';
                                echo "<script>
                                                        window.location.href = '?page=pages/peminjaman/viewvalidasipeminjaman'</script>";
                            } else {
                                $_SESSION['info'] = 'Gagal Divalidasi';
                                echo "<script>window.location.href = '?page=pages/peminjaman/viewvalidasipeminjaman'
                                                        </script>";
                            }
                        }

                        ?>
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