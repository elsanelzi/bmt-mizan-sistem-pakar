<?php

$datafaktor5c2 = mysqli_query($koneksi, "SELECT * FROM tb_faktor_5c ORDER BY id_faktor_5c ASC LIMIT 5");

foreach ($datafaktor5c2 as $key => $value) : ?>
    <?php
    $arrId[] = $value['id_faktor_5c'];
    $arr[] = $value['faktor_5c']; ?>
<?php endforeach; ?>


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
                        <li class="breadcrumb-item"><a href="?page=pages/surveifaktor5c/surveifc4">Data Survei <?= $arr[3]; ?></a></li>
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
                <div class="ml-10">

                    <div class="tab-content">
                        <div class="row">
                            <div class="col-12">
                                <form action="" method="post" enctype="multipart/form-data">
                                    <div class="card">
                                        <h3 style="padding:10px; text-align:center">
                                        </h3>
                                        <h3 style="padding:10px; text-align:center"><?= $arr[3]; ?></h3>
                                        <?php
                                        $faktor_5c = $arr[3];
                                        $rincian5c = mysqli_query($koneksi, "SELECT rf.*, f.faktor_5c as faktor_5c FROM tb_rincian_5c rf LEFT JOIN tb_faktor_5c f ON rf.id_faktor_5c=f.id_faktor_5c WHERE f.faktor_5c='$faktor_5c' ORDER BY f.id_faktor_5c ASC");
                                        ?>
                                    </div>
                                    <div class="card">
                                        <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                                    echo $_SESSION['info'];
                                                                                }
                                                                                unset($_SESSION['info']); ?>">
                                        </div>
                                        <!-- /.card-header -->
                                        <div class="card-body">

                                            <table class="table table-bordered table-striped table-hover">
                                                <thead style="background-color: aqua;">
                                                    <tr>
                                                        <th>No </th>
                                                        <th>Pertanyaan </th>
                                                        <th>Jawab </th>
                                                        <th>Persentase % </th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $nomor = 0;
                                                    $no = 1;
                                                    foreach ($rincian5c as $key => $value) : ?>
                                                        <tr>
                                                            <td><?= $no++ ?></td>
                                                            <td><input type="hidden" name="keterangan[]" id="keterangan" value="<?= $value['keterangan']; ?>">
                                                                <?= $value['keterangan']; ?>
                                                            </td>
                                                            <td>
                                                                <input type="hidden" name="id_faktor_5c" id="id_faktor_5c" value="<?= $value['id_faktor_5c']; ?>">
                                                                <input type="hidden" name="bobot[]" id="bobot" value="<?= $value['bobot']; ?>">
                                                                <div class="row">
                                                                    <input type="radio" class="form-check input" checked style="margin-left:10px;" value="1" name="response[<?php echo $nomor; ?>]" id="pilihan1"> Ya
                                                                    <input type="radio" class="form-check input" style="margin-left:10px;" value="2" name="response[<?php echo $nomor; ?>]" id="pilihan2"> Tidak
                                                                </div>
                                                            </td>
                                                            <td><?= $value['bobot']; ?> %</td>
                                                        </tr>
                                                        <?php $nomor++; ?>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>

                                            <div class="row" style="margin-top: 30px; justify-content:right">
                                                <button name="save" class="submit btn btn-danger">NEXT</button>
                                            </div>
                                        </div>
                                        <!-- /.card-body -->
                                    </div>
                                    <!-- /.card -->
                                </form>
                            </div>
                            <!-- /.col -->
                        </div>
                        <!-- /.row -->


                        <script>
                            let pilihan1 = Array.from(document.querySelectorAll("#pilihan1"))
                            let pilihan2 = Array.from(document.querySelectorAll("#pilihan2"))

                            pilihan1.forEach(p1 => {
                                p1.addEventListener("click", (e) => {
                                    console.log(e.target.value);
                                })
                            })
                        </script>

                        <?php

                        if (isset($_POST['save'])) {
                            $persentase = 0;
                            $keterangan = $_POST['keterangan'];
                            $bobot1 = $_POST['bobot'];
                            $response = $_POST['response'];

                            for ($i = 0; $i < sizeof($keterangan); $i++) {
                                if ($response[$i] == 1) {
                                    $bobot[$i] = intval($_POST['bobot'][$i]);
                                } elseif ($response[$i] == 2) {
                                    $bobot[$i] = 0;
                                }

                                $persentase += $bobot[$i];
                            }


                            $dataHasil = mysqli_query($koneksi, "SELECT * FROM tb_hasil ORDER BY id_hasil DESC LIMIT 1")->fetch_array();

                            $id_hasil = $dataHasil['id_hasil'];
                            $persentase_nilai = $dataHasil['persentase_nilai'];

                            $persentase = ($persentase_nilai + $persentase);

                            if ($persentase <= 25) {
                                $nilai_nasabah = 'Kurang Baik';
                            } else if ($persentase <= 50) {
                                $nilai_nasabah = 'Cukup Baik';
                            } else if ($persentase <= 75) {
                                $nilai_nasabah = 'Baik';
                            } else if ($persentase <= 100) {
                                $nilai_nasabah = 'Sangat Baik';
                            }


                            // // Edit data tabel Hasil
                            $edit = $koneksi->query("UPDATE tb_hasil SET persentase_nilai= '$persentase' WHERE id_hasil='$id_hasil'");
                            if ($edit) {
                                echo "<script>
                                                    window.location.href = '?page=pages/surveifaktor5c/surveifc5'</script>";
                            } else {
                                echo "<script>window.location.href = '?page=pages/surveifaktor5c/surveifc5'
                                                    </script>";
                            }
                        }

                        ?>


                    </div>
                </div>

            </div>
        </div>





    </section>
    <!-- /.content -->
</div>
</div>
<!-- /.content-wrapper -->