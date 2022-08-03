<?php
// Query menampilkan data peminjaman nasabah Diterima
$data = mysqli_query($koneksi, "SELECT n.nik_username, n.nama_lengkap,n.no_telepon, ppn.id_pemberian_pembiayaan_nasabah, ppn.nominal_pinjaman, ppn.jangka_waktu, jn.id_jaminan_nasabah, jn.status, ap.pendapatan_bersih_per_bulan,ap.taksiran_kendaraan,h.nilai_nasabah,bs.*, pd.biaya_diterima, pd.id_pembiayaan_diterima FROM tb_pemberian_pembiayaan_nasabah ppn LEFT JOIN tb_nasabah n ON n.nik_username=ppn.nik_username LEFT JOIN tb_analisa_pendapatan ap ON ap.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_jaminan_nasabah jn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah LEFT JOIN tb_hasil h ON h.id_jaminan_nasabah=jn.id_jaminan_nasabah LEFT JOIN tb_bukti_survei bs ON bs.id_hasil=h.id_hasil LEFT JOIN tb_pembiayaan_diterima pd ON pd.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah WHERE jn.status='Diterima' GROUP BY ppn.id_pemberian_pembiayaan_nasabah ORDER BY jn.id_jaminan_nasabah ASC");


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
                        <li class="breadcrumb-item"><a href="?page=pages/peminjaman/viewnasabahditerima">Data Peminjaman Nasabah Diterima</a></li>
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
                    <h3 style="padding:10px;margin-left:10px">Data Peminjaman Nasabah Diterima</h3>
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
                                    <th>Pembiayaan Yang Diterima</th>
                                    <th>Taksiran Kendaraan</th>
                                    <th>No. Telepon</th>
                                    <th>Aksi</th>
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
                                        <td><?= $value['jangka_waktu']; ?> bulan</td>
                                        <td><?= $value['status']; ?></td>
                                        <td>Rp. <?= number_format($value['biaya_diterima'], 0, '.', '.'); ?></td>
                                        <td>Rp. <?= number_format($value['taksiran_kendaraan'], 0, '.', '.'); ?></td>
                                        <td> <a href="https://api.whatsapp.com/send?phone=.<?= $value['no_telepon']; ?> ?>.&text=Halo." target="blank" class="text-center"><?= $value['no_telepon']; ?></a></td>

                                        <td class="text-center">
                                            <form action="" method="POST">
                                                <input type="hidden" name="id_bukti_survei" value="<?= $value['id_bukti_survei']; ?>">
                                                <?php if ($value['status_validasi_hasil'] == 0) : ?>
                                                    <button type="submit" name="validasi_peminjaman" class="btn btn-danger mb-2">Validasi</button>
                                                <?php endif; ?>
                                            </form>
                                            <?php if ($value['status_validasi_hasil'] == 0) : ?>
                                                <a href="" data-toggle="modal" data-target="#edit_biaya_diterima<?= $value['id_pembiayaan_diterima'] ?>" class="btn btn-warning mb-2">Edit</a>
                                            <?php endif; ?>
                                            <a href="?page=pages/hasilpembiayaan/detailhasilpembiayaan&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>" class="btn btn-success mb-2">Detail</i></a>
                                        </td>

                                    </tr>
                                <?php endforeach; ?>

                                <?php

                                if (isset($_POST['validasi_peminjaman'])) {
                                    $id_bukti_survei = $_POST['id_bukti_survei'];
                                    $status_validasi_hasil = 1;

                                    // // Edit data tabel jaminan nasabah
                                    $edit = $koneksi->query("UPDATE tb_bukti_survei SET status_validasi_hasil= '$status_validasi_hasil' WHERE id_bukti_survei='$id_bukti_survei'");

                                    if ($edit) {
                                        $_SESSION['info'] = 'Berhasil Divalidasi';
                                        echo "<script>
                                                        window.location.href = '?page=pages/peminjaman/viewnasabahditerima'</script>";
                                    } else {
                                        $_SESSION['info'] = 'Gagal Divalidasi';
                                        echo "<script>window.location.href = '?page=pages/peminjaman/viewnasabahditerima'
                                                        </script>";
                                    }
                                }

                                ?>
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

        <?php foreach ($data as $key => $value) : ?>
            <div class="modal fade" id="edit_biaya_diterima<?= $value['id_pembiayaan_diterima'] ?>" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog modal-lg">
                    <div class="modal-content">
                        <div class="modal-header bg-primary">
                            <h5 class="modal-title" id="exampleModalLabel" style="text-align: centers;">EDIT PEMBIAYAAN DITERIMA</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                <span aria-hidden="true">&times;</span>
                            </button>
                        </div>
                        <div class="modal-body">
                            <form action="" method="POST">
                                <div class="form-group">
                                    <input type="hidden" name="id_pembiayaan_diterima" id="id_pembiayaan_diterima" value="<?= $value['id_pembiayaan_diterima']; ?>" class="form-control" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="biaya_diterima">Pembiayaan Yang Diterima</label>
                                    <input type="text" name="biaya_diterima" id="biaya_diterima" value="<?= $value['biaya_diterima']; ?>" class="form-control" required onkeypress="return event.charCode>=48 && event.charCode<=57">
                                </div>

                                <div class="modal-footer">
                                    <button type="button" class="btn btn-danger" data-dismiss="modal">Tutup</button>
                                    <button type="submit" class="btn btn-success" name="update">Update</button>
                                </div>
                            </form>
                        </div> <!-- /MODAL BODY -->

                        <?php

                        if (isset($_POST['update'])) {
                            $id_pembiayaan_diterima = $_POST['id_pembiayaan_diterima'];
                            $biaya_diterima = $_POST['biaya_diterima'];
                            // Edit data tabel pembiayaan Diterima
                            $edit = $koneksi->query("UPDATE tb_pembiayaan_diterima SET biaya_diterima= '$biaya_diterima' WHERE id_pembiayaan_diterima='$id_pembiayaan_diterima'");

                            if ($edit) {
                                $_SESSION['info'] = 'Berhasil Diubah';
                                echo "<script>
                                                        window.location.href = '?page=pages/peminjaman/viewnasabahditerima'</script>";
                            } else {
                                $_SESSION['info'] = 'Gagal Diubah';
                                echo "<script>window.location.href = '?page=pages/peminjaman/viewnasabahditerima'
                                                        </script>";
                            }
                        }

                        ?>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
    <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->