 <?php $id = $_GET['id'];
    $rincianfaktor5C = mysqli_query($koneksi, "SELECT * FROM tb_rincian_5c rf LEFT JOIN tb_faktor_5c f ON rf.id_faktor_5c=f.id_faktor_5c WHERE id_rincian_5c = '$id'")->fetch_array();
    ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <!-- <h1>Data Rincian Faktor 5C</h1> -->
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="?page=pages/faktor5C/viewfaktor5C">Data Rincian Faktor 5C</a></li>
                         <li class="breadcrumb-item active">Edit Data</li>
                         <li class="breadcrumb-item"><?= $rincianfaktor5C['id_faktor_5c']; ?></li>
                     </ol>
                 </div>
             </div>
         </div><!-- /.container-fluid -->
     </section>
     <!-- Main content -->
     <section class="content">
         <div class="container-fluid">
             <div class="row">
                 <div class="col-md-12">
                     <div class="card card-primary">
                         <div class="card-header">
                             <h3 class="card-title">Ubah Data Rincian Faktor 5C</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <input type="hidden" class="form-control" name="id_rincian_5C" value="<?php echo $rincianfaktor5C['id_rincian_5c'] ?>">

                                 <div class="form-group">
                                     <label for="faktor_5C">Faktor 5C:</label>
                                     <input type="text" name="faktor_5C" id="faktor_5C" class="form-control" value="<?php echo $rincianfaktor5C['faktor_5c'] ?>" readonly>
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan:</label>
                                     <textarea name="keterangan" id="keterangan" class="form-control" rows="4" required><?= $rincianfaktor5C['keterangan'] ?></textarea>
                                 </div>
                                 <div class="form-group">
                                     <label for="bobot">Bobot (%) :</label>
                                     <input name="bobot" id="bobot" type="number" class="form-control" value="<?= $rincianfaktor5C['bobot'] ?>" required />
                                 </div>
                                 <div class="form-group">
                                     <a href="index.php?page=pages/rincianfaktor5C/addrincianfaktor5C" class="btn btn-danger">Batal</a>
                                     <button type="submit" name="update" class="btn btn-primary">Update</button>
                                 </div>
                             </form>
                             <?php

                                if (isset($_POST['update'])) {
                                    $id_rincian_5C = $_POST['id_rincian_5C'];
                                    $keterangan = $_POST['keterangan'];
                                    $bobot = $_POST['bobot'];

                                    // // Edit data tabel Rincian Faktor 5C
                                    $edit = $koneksi->query("UPDATE tb_rincian_5c SET keterangan= '$keterangan', bobot= '$bobot' WHERE id_rincian_5c='$id_rincian_5C'");
                                    if ($edit) {
                                        $_SESSION['info'] = 'Berhasil Diubah';
                                        echo "<script>
                                                        window.location.href = '?page=pages/rincianfaktor5C/addrincianfaktor5C'</script>";
                                    } else {
                                        $_SESSION['info'] = 'Gagal Diubah';
                                        echo "<script>window.location.href = '?page=pages/rincianfaktor5C/addrincianfaktor5C'
                                                        </script>";
                                    }
                                }

                                ?>
                         </div>
                         <!-- /.card-body -->
                     </div>
                     <!-- /.card -->

                 </div>
                 <!-- /.col (right) -->
             </div>
             <!-- /.row -->
         </div><!-- /.container-fluid -->
     </section>
     <!-- /.content -->
 </div>
 <!-- /.content-wrapper -->