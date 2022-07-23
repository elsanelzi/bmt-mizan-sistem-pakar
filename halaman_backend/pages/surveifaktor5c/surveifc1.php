<?php

$datafaktor5c2 = mysqli_query($koneksi, "SELECT * FROM tb_faktor_5c ORDER BY id_faktor_5c ASC LIMIT 5");

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $jaminanNasabah = mysqli_query($koneksi, "SELECT * from tb_jaminan_nasabah jn LEFT JOIN tb_pemberian_pembiayaan_nasabah ppn ON jn.id_pemberian_pembiayaan_nasabah=ppn.id_pemberian_pembiayaan_nasabah WHERE jn.id_jaminan_nasabah='$id'")->fetch_array();
}

foreach ($datafaktor5c2 as $key => $value) : ?>
    <?php
    $arrId[] = $value['id_faktor_5c'];
    $arr[] = $value['faktor_5c']; ?>
<?php endforeach; ?>


<script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>

<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>



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
                        <li class="breadcrumb-item"><a href="?page=pages/surveifaktor5c/surveifc1">Data Survei <?= $arr[0]; ?></a></li>
                        <li class="breadcrumb-item active">Overview</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- <script>
        $(document).ready(function() {
            $("#next1").click(function() {
                $("#btn_simpan").click();
            });

          

        })
    </script> -->


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
                                        <h3 style="padding:10px; text-align:center"><?= $arr[0]; ?></h3>
                                        <?php
                                        $faktor_5c = $arr[0];
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
                                                                <input type="hidden" name="id_jaminan_nasabah" id="id_jaminan_nasabah" value="<?= $jaminanNasabah['id_jaminan_nasabah']; ?>">
                                                                <input type="hidden" name="nik_username" id="nik_username" value="<?= $jaminanNasabah['nik_username']; ?>">
                                                                <input type="hidden" name="id_faktor_5c" id="id_faktor_5c" value="<?= $value['id_faktor_5c']; ?>">
                                                                <input type="hidden" name="bobot[]" id="bobot" value="<?= $value['bobot']; ?>">
                                                                <!-- <select name="jawab" id="jawaban" class="form_control">
                                                    <option value="1">Ya</option>
                                                    <option value="0">Tidak</option>
                                                </select> -->
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
                                            <div id="hasil"></div>

                                            <div class="row" style="margin-top: 30px; justify-content:right">
                                                <!-- <input type="submit" name="save" value="simpan" class="btn btn-danger mr-1" hidden id="btnsimpan"> -->
                                                <!-- <button type="submit" class="d-flex btn btn-outline-primary mr-1" name="save1">Submit</button> -->
                                                <!-- <a href="?page=pages/surveifaktor5c/surveifc2&id=<?= $arrId[1]; ?>"><button name="save" type="submit">NEXT</button></a> -->

                                                <!-- <button name="save" onclick="window.location.href='?page=pages/surveifaktor5c/surveifc2&id=<?= $arrId[1]; ?>'">NEXT</button> -->
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
                        <!-- <script>
                            $('.submit').click(function() {
                                Swal.fire({
                                    title: 'Lanjut?',
                                    text: "Isi Data",
                                    icon: 'warning',
                                    showCancelButton: true,
                                    confirmButtonColor: '#3085d6',
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Yes, delete it!'
                                }).then((result) => {
                                    if (result.isConfirmed) {
                                        var url = "?page=pages/surveifaktor5c/surveifc2&id=<?= $arrId[1]; ?>";
                                        window.location = url;
                                    }
                                })

                            })
                        </script> -->
                        <!-- <script>
                            function tampilkan_nama() {
                                document.getElementById("btnsimpan").innerHTML = "<h3>HA HAH HAHA</h3>";
                            }
                        </script> -->

                        <?php

                        if (isset($_POST['save'])) {
                            $persentase = 0;
                            $id_jaminan_nasabah = $_POST['id_jaminan_nasabah'];
                            $nik_username = $_POST['nik_username'];
                            $tanggal = date('Y-m-d');
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


                            if ($persentase <= 25) {
                                $nilai_nasabah = 'Kurang Baik';
                            } else if ($persentase <= 50) {
                                $nilai_nasabah = 'Cukup Baik';
                            } else if ($persentase <= 75) {
                                $nilai_nasabah = 'Baik';
                            } else if ($persentase <= 100) {
                                $nilai_nasabah = 'Sangat Baik';
                            }

                            $simpan = mysqli_query($koneksi, "INSERT INTO tb_hasil (`id_jaminan_nasabah`,`nik_username`, `tanggal`, `nilai_nasabah`, `persentase_nilai`) VALUES ('$id_jaminan_nasabah','$nik_username', '$tanggal', '$nilai_nasabah','$persentase')");

                            // $status = "selesai survei 5c";
                            // $update = $koneksi->query("UPDATE tb_jaminan_nasabah SET status= '$status' WHERE id_jaminan_nasabah='$id_jaminan_nasabah'");
                            if ($simpan) {

                                echo "<script>
                                        window.location.href = '?page=pages/surveifaktor5c/surveifc2'</script>";
                            } else {
                                echo "<script>window.location.href = '?page=pages/surveifaktor5c/surveifc2'
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