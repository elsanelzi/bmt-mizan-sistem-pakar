<div class="row">
    <div class="col-12">
        <form action="" id="formnya" method="post" enctype="multipart/form-data" class="divs">
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
                                            <input type="radio" class="form-check input" style="margin-left:10px;" value="1" name="response[<?php echo $nomor; ?>]" id="pilihan1"> Ya
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
                        <button type="submit" class="d-flex btn btn-outline-primary mr-1" name="save"></i>Submit</button>
                        <!-- <a href="" class="btn btn-danger mt-10 mr-1">Lanjut</a> -->
                        <!-- <a class="btn btn-danger mt-10 mr-1" id="v-pills-profile-tab" data-toggle="pill" href="#v-pills-profile" role="tab" aria-controls="v-pills-profile" aria-selected="false">Next</a> -->
                        <!-- <a href="#<?= $arr[1]; ?>" class="btn btn-danger mt-10 mr-1" data-toggle="tab">Next</a> -->
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

    // if ($persentase <= 25) {
    //     $nilai_nasabah = 'Kurang Baik';
    // } else if ($persentase <= 50) {
    //     $nilai_nasabah = 'Cukup Baik';
    // } else if ($persentase <= 75) {
    //     $nilai_nasabah = 'Baik';
    // } else if ($persentase <= 100) {
    //     $nilai_nasabah = 'Sangat Baik';
    // }

    // var_dump($persentase, $nilai_nasabah);
    // die;

    // $simpan = mysqli_query($koneksi, "INSERT INTO tb_hasil (`id_jaminan_nasabah`,`nik_username`, `tanggal`, `nilai_nasabah`, `persentase_nilai`) VALUES ('$id_jaminan_nasabah','$nik_username', '$tanggal', '$nilai_nasabah','$persentase')");

    // if ($simpan) {
    //     $_SESSION['info'] = 'Berhasil Disimpan';
    //     echo "<script>
    //             window.location.href = '?page=pages/survei5c/kelolasurvei5C'</script>";
    // } else {
    //     $_SESSION['info'] = 'Gagal Disimpan';
    //     echo "<script>window.location.href = '?page=pages/survei5c/kelolasurvei5C'
    //                                             </script>";
    // }
}

?>