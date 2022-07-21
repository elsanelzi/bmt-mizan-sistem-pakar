<?php
// Query menampilkan data Peminjaman Nasabah
$dataPeminjamanNasabah = mysqli_query($koneksi, "SELECT * FROM tb_pemberian_pembiayaan_nasabah ppn LEFT JOIN tb_nasabah n ON ppn.nik_username=n.nik_username LEFT JOIN tb_jaminan_nasabah jn ON ppn.id_pemberian_pembiayaan_nasabah=jn.id_pemberian_pembiayaan_nasabah ORDER BY jn.id_pemberian_pembiayaan_nasabah DESC");
?>

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <!-- <h1>Data Nasabah</h1> -->
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="?page=pages/biaya/viewsurvei5c">Kelola Survei 5C</a></li>
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
                <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                            echo $_SESSION['info'];
                                                        }
                                                        unset($_SESSION['info']); ?>">
                    <div class="card">
                        <h3 style="padding:10px;margin-left:10px">Kelola Survei 5C</h3>
                    </div>
                    <div class="card">
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
                                        <th>Tanggal Peminjaman</th>
                                        <th>Status</th>
                                        <th colspan="2">Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    $no = 1;
                                    foreach ($dataPeminjamanNasabah as $key => $value) : ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><a href="?page=pages/biaya/detailsurvei5C&id=<?php echo $value['id_pemberian_pembiayaan_nasabah']; ?>"><?= $value['nama_lengkap']; ?></a></td>
                                            <td><?= $value['nik_username']; ?></td>
                                            <td><?= $value['nominal_pinjaman']; ?></td>
                                            <td><?= $value['jangka_waktu']; ?></td>
                                            <td><?= $value['tanggal_peminjaman']; ?></td>
                                            <td><?= $value['status']; ?></td>
                                            <td class="text-center">
                                                <!-- <a href="#" class="btn btn-success">Detail</i></a> -->
                                                <?php if ($value['status'] == 'pending') : ?>
                                                    <form action="" method="POST">
                                                        <input type="hidden" name="id_jaminan_nasabah" value="<?= $value['id_jaminan_nasabah'] ?>">
                                                        <button type="submit" name="proses" class="btn btn-danger">Proses</i></button>
                                                    </form>
                                                <?php elseif ($value['status'] == 'konfirmasi') : ?>
                                                    <a href="?page=pages/survei5c/kelolasurvei5C&id=<?php echo $value['id_jaminan_nasabah']; ?>" class="btn btn-danger text-white">5C</a>
                                                    <!-- <a type="submit" name="aksi_5C" class="btn btn-danger text-white" data-toggle="modal" data-target="#limaCModal<?= $value['id_jaminan_nasabah'] ?>">5C</i></a> -->
                                                <?php elseif ($value['status'] != 'pending' && $value['status'] != 'konfirmasi') : ?>
                                                    <a href="#" class="btn btn-success text-white">Lihat Hasil Survei</a>
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
    </section>
    <!-- /.content -->


    <!-- 5CModal-->
    <div class="modal fade" id="limaCModal<?= $value['id_jaminan_nasabah'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Daftar Pertanyaan </h5>
                </div>
                <div class="modal-body">
                    <?php $no = 1;

                    // Query menampilkan data 5c
                    $faktor5c = mysqli_query($koneksi, "SELECT * FROM tb_faktor_5c fc LEFT JOIN tb_rincian_5c rc ON fc.id_faktor_5c=rc.id_faktor_5c GROUP BY faktor_5c ORDER BY fc.id_faktor_5c ASC");

                    ?>
                    <form action="" method="POST">
                        <input type="hidden" name="id_jaminan_nasabah" id="id_jaminan_nasabah" value="<?= $value['id_jaminan_nasabah'] ?>">
                        <input type="hidden" name="nik_username" id="nik_username" value="<?= $value['nik_username'] ?>">
                        <?php foreach ($faktor5c as $key => $value) : ?>
                            <div class="row">
                                <p><strong><?= $no++ ?>. <?= $value['faktor_5c']; ?></strong></p>
                                <input type="hidden" name="id_rincian_5c[]" value="<?= $value['id_rincian_5c']; ?>">
                                <input type="hidden" name="bobot[]" value="<?= $value['bobot']; ?>">
                            </div>
                            <div class="row">
                                <p style="margin-left: 20px;"><?= $value['keterangan'];  ?></p>
                            </div>
                            <div class="row" style="margin-left: 20px; margin-bottom:25px;">
                                <input type="radio" name="<?= $value['faktor_5c']; ?>[]" class="mr-2" value="1"><span class="mr-3">Ya</span>
                                <input type="radio" name="<?= $value['faktor_5c']; ?>[]" class="mr-2" value="0"><span>Tidak</span>
                            </div>
                        <?php endforeach; ?>
                </div>
                <div class="modal-footer" style="justify-content: center;">
                    <button class="btn btn-secondary" type="button" data-dismiss="modal">Tutup</button>
                    <button type="submit" name="save" class="btn btn-primary">Simpan</button>
                </div>
                </form>


            </div>
        </div>
    </div>

    <?php

    if (isset($_POST['proses'])) {
        $id_jaminan_nasabah = $_POST['id_jaminan_nasabah'];
        $status = 'konfirmasi';

        // // Edit data tabel jaminan nasabah
        $edit = $koneksi->query("UPDATE tb_jaminan_nasabah SET status= '$status' WHERE id_jaminan_nasabah='$id_jaminan_nasabah'");

        if ($edit) {
            $_SESSION['info'] = 'Berhasil Diproses';
            echo "<script>
            window.location.href = '?page=pages/biaya/viewsurvei5c'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Diproses';
            echo "<script>window.location.href = '?page=pages/biaya/viewsurvei5c'
            </script>";
        }
    }

    ?>


    <?php

    if (isset($_POST['save'])) {
        $nilai_nasabah = 0;
        $persentase_nilai = 0;

        $dataFaktor5c = mysqli_query($koneksi, "SELECT * FROM tb_faktor_5c")->fetch_array();
        $jumlah = count($dataFaktor5c);
        $faktor5c = mysqli_query($koneksi, "SELECT * FROM tb_faktor_5c");
        for ($i = 0; $i <= $jumlah; $i++) {
            $id_jaminan_nasabah = $_POST['id_jaminan_nasabah'];
            $nik_username = $_POST['nik_username'];
            $tanggal = date('Y-m-d');
            $id_rincian_5c = $_POST['id_rincian_5c'][$i];
            $persentase_nilai = $_POST['bobot'][$i];
            $nilai_nasabah = $_POST['bobot'][$i];
            $persentase_nilai = $_POST['bobot'][$i];
            $nilai_nasabah = $_POST['bobot'][$i];

            // foreach ($faktor5c as $key => $value) {
            //     $fc = $_POST[($value['faktor_5c'])][$i];
            //     if ($fc == 1) {
            //         $persentase_nilai = $_POST['bobot'][$i];
            //         $nilai_nasabah = $_POST['bobot'][$i];
            //     } else {
            //         $persentase_nilai = 1;
            //         $nilai_nasabah = 1;
            //     }
            // }


            // Query mmenyimpan data kedalam tabel hasil
            $simpan = mysqli_query($koneksi, "INSERT INTO tb_hasil (`id_jaminan_nasabah`,`nik_username`, `id_rincian_5C`, `tanggal`, `nilai_nasabah`, `persentase_nilai`) VALUES ('$id_jaminan_nasabah','$nik_username', '$id_rincian_5c','$tanggal', '$nilai_nasabah','$persentase_nilai')");

            if ($simpan) {
                $_SESSION['info'] = 'Berhasil Disimpan';
                echo "<script>
                                                            window.location.href = '?page=pages/biaya/viewsurvei5C'</script>";
            } else {
                $_SESSION['info'] = 'Gagal Disimpan';
                echo "<script>window.location.href = '?page=pages/biaya/viewsurvei5C'
                                                            </script>";
            }
        }
    }

    ?>
</div>
</div>
</div>
<!-- /.content-wrapper -->