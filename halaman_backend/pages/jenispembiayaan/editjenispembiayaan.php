 <?php $id = $_GET['id'];
    $jenisPembiayaan = mysqli_query($koneksi, "SELECT * FROM tb_jenis_pembiayaan WHERE id_jenis_pembiayaan = '$id'")->fetch_array();
    ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <!-- <h1>Data Jenis Pembiayaan</h1> -->
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="?page=pages/jenispembiayaan/viewjenispembiayaan">Data Jenis Pembiayaan</a></li>
                         <li class="breadcrumb-item active">Edit Data</li>
                         <li class="breadcrumb-item"><?= $jenisPembiayaan['id_jenis_pembiayaan']; ?></li>
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
                             <h3 class="card-title">Ubah Data Jenis Pembiayaan</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <input type="hidden" class="form-control" name="id_jenis_pembiayaan" value="<?php echo $jenisPembiayaan['id_jenis_pembiayaan'] ?>">


                                 <div class="form-group">
                                     <label for="jenis_pembiayaan">Jenis Pembiayaan:</label>
                                     <input type="text" name="jenis_pembiayaan" id="jenis_pembiayaan" class="form-control" value="<?= $jenisPembiayaan['jenis_pembiayaan']; ?>" required>
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan:</label>
                                     <textarea name="keterangan" id="keterangan" class="form-control" rows="4" required><?= $jenisPembiayaan['keterangan'] ?></textarea>
                                 </div>
                                 <div class="form-group">
                                     <a href="index.php?page=pages/jenispembiayaan/viewjenispembiayaan" class="btn btn-danger">Batal</a>
                                     <button type="submit" name="update" class="btn btn-primary">Update</button>
                                 </div>
                             </form>
                             <?php

                                if (isset($_POST['update'])) {
                                    $id_jenis_pembiayaan = $_POST['id_jenis_pembiayaan'];
                                    $jenis_pembiayaan = addslashes($_POST['jenis_pembiayaan']);
                                    $keterangan = addslashes($_POST['keterangan']);
                                    // // Edit data tabel Jenis Pembiayaan
                                    $edit = $koneksi->query("UPDATE tb_jenis_pembiayaan SET jenis_pembiayaan= '$jenis_pembiayaan',keterangan= '$keterangan' WHERE id_jenis_pembiayaan='$id_jenis_pembiayaan'");
                                    if ($edit) {
                                        $_SESSION['info'] = 'Berhasil Diubah';
                                        echo "<script>
                                                        window.location.href = '?page=pages/jenispembiayaan/viewjenispembiayaan'</script>";
                                    } else {
                                        $_SESSION['info'] = 'Gagal Diubah';
                                        echo "<script>window.location.href = '?page=pages/jenispembiayaan/viewjenispembiayaan'
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