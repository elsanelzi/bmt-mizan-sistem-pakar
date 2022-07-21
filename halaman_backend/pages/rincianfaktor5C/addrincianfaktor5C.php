  <?php
    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $faktor5C = mysqli_query($koneksi, "SELECT * FROM tb_faktor_5c WHERE id_faktor_5c = '$id'")->fetch_array();

        $fc = $faktor5C['faktor_5c'];
        $id_fc = $faktor5C['id_faktor_5c'];

        // Query menampilkan data rincian Rincian faktor 5C
        $rincian5C = mysqli_query($koneksi, "SELECT * FROM tb_rincian_5c rf LEFT JOIN tb_faktor_5c f ON f.id_faktor_5c=rf.id_faktor_5c WHERE faktor_5c='$fc' ORDER BY id_rincian_5c DESC");
    } else {

        $data = mysqli_query($koneksi, "SELECT * FROM tb_rincian_5c ORDER BY id_rincian_5c DESC LIMIT 1")->fetch_array();
        $id_faktor_5c = $data['id_faktor_5c'];

        $rincian5C = mysqli_query($koneksi, "SELECT * FROM tb_rincian_5c rf LEFT JOIN tb_faktor_5c f ON f.id_faktor_5c=rf.id_faktor_5c WHERE f.id_faktor_5c='$id_faktor_5c' ORDER BY id_rincian_5c DESC");

        $datarincian5C = mysqli_query($koneksi, "SELECT * FROM tb_rincian_5c rf LEFT JOIN tb_faktor_5c f ON f.id_faktor_5c=rf.id_faktor_5c WHERE f.id_faktor_5c='$id_faktor_5c' ORDER BY id_rincian_5c DESC")->fetch_array();

        $fc = $datarincian5C['faktor_5c'];
        $id_fc = $datarincian5C['id_faktor_5c'];
    }

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
                          <li class="breadcrumb-item"><a href="?page=pages/faktor5C/viewfaktor5C">Data Faktor 5C</a></li>
                          <li class="breadcrumb-item active">Tambah Data</li>
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
                      <h3 style="padding:10px; margin-left:10px">Data Rincian Faktor <?= $fc; ?></h3>
                  </div>
                  <div class="card">
                      <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>">
                      </div>
                      <div class="card-header">
                          <h3 class="card-title">
                              <a href="?page=pages/faktor5C/viewfaktor5C" class="btn btn-success">Kembali</a>
                              <a href="" data-toggle="modal" data-target="#tambah" class="btn btn-primary">Tambah Data</a>
                          </h3>
                      </div>
                      <!-- /.card-header -->
                      <div class="card-body">

                          <table id="dataTable" class="table table-bordered table-striped table-hover">
                              <thead style="background-color: aqua;">
                                  <tr>
                                      <th>No</th>
                                      <th>Faktor 5C</th>
                                      <th>Keterangan</th>
                                      <th>Bobot %</th>
                                      <th>Aksi</th>
                                  </tr>
                              </thead>
                              <tbody>
                                  <?php
                                    $no = 1;
                                    foreach ($rincian5C as $key => $value) : ?>
                                      <tr>
                                          <td><?= $no++ ?></td>
                                          <td><?= $value['faktor_5c']; ?></td>
                                          <td><?= $value['keterangan']; ?></td>
                                          <td><?= $value['bobot']; ?> %</td>
                                          <td class="text-center">
                                              <a href="?page=pages/rincianfaktor5C/editrincianfaktor5C&id=<?php echo $value['id_rincian_5c']; ?>" class="btn btn-warning"><i class="fas fa-edit"></i></a>
                                              <a href="?page=pages/rincianfaktor5C/deleterincianfaktor5C&id=<?php echo $value['id_rincian_5c']; ?>" class="btn btn-danger delete-data"><i class="fas fa-trash-alt"></i></a>
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
          <!-- Modal Konfirmasi Pembayaran -->
          <!-- MODAL -->

          <div class="modal fade" id="tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
              <div class="modal-dialog modal-lg">
                  <div class="modal-content">
                      <div class="modal-header bg-primary">
                          <h5 class="modal-title" id="exampleModalLabel">Tambah Rincian Faktor <?= $fc; ?></h5>
                          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                          </button>
                      </div>
                      <div class="modal-body">

                          <form action="" method="POST" class="bg-light" enctype="multipart/form-data">
                              <div class="form-group">
                                  <input type="hidden" name="id_faktor_5C" id="id_faktor_5C" class="form-control" value="<?= $id_fc; ?>">
                                  <label for="faktor_5C">Faktor 5C:</label>
                                  <input type="text" name="faktor_5C" id="faktor_5C" class="form-control" value="<?= $fc; ?>" readonly>
                              </div>
                              <div class="form-group">
                                  <label for="keterangan">Keterangan:</label>
                                  <textarea rows="5" name="keterangan" id="keterangan" class="form-control" placeholder="Masukan Keterangan..." required></textarea>
                              </div>
                              <div class="form-group">
                                  <label for="bobot">Bobot (%) :</label>
                                  <input type="number" name="bobot" id="bobot" class="form-control" placeholder="Masukan Bobot Faktor 5C..." required>
                              </div>

                              <div class="modal-footer">
                                  <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                                  <button type="submit" class="btn btn-primary" name="simpan">Simpan</button>
                              </div>

                          </form>
                          <?php

                            if (isset($_POST['simpan'])) {
                                $id_faktor_5C = $_POST['id_faktor_5C'];
                                $keterangan = $_POST['keterangan'];
                                $bobot = $_POST['bobot'];

                                //// Query menyimpan data ke dalam tabel Rincian Faktor 5C
                                $simpan = mysqli_query($koneksi, "INSERT INTO tb_rincian_5c (`id_faktor_5c`,`keterangan`,`bobot`) VALUES ('$id_faktor_5C','$keterangan','$bobot')");

                                if ($simpan) {
                                    $_SESSION['info'] = 'Berhasil Disimpan';
                                    echo "<script>
                            window.location.href = '?page=pages/rincianfaktor5C/addrincianfaktor5C'</script>";
                                } else {
                                    $_SESSION['info'] = 'Gagal Disimpan';
                                    echo "<script>window.location.href = '?page=pages/rincianfaktor5C/addrincianfaktor5C'
                            </script>";
                                }
                            }

                            ?>
                          <!-- Request Method -->
                      </div> <!-- /MODAL BODY -->
                  </div>
              </div>
          </div>
          <!--/MODAL -->
      </section>
      <!-- /.content -->
  </div>