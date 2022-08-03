 <?php $id = $_GET['id'];
    $taksirankendaraan = mysqli_query($koneksi, "SELECT * FROM tb_taksiran_kendaraan WHERE id_taksiran_kendaraan = '$id'")->fetch_array();
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
                         <li class="breadcrumb-item"><a href="?page=pages/taksirankendaraan/viewtaksirankendaraan">Data Taksiran Kendaraan</a></li>
                         <li class="breadcrumb-item active">Edit Data</li>
                         <li class="breadcrumb-item"><?= $taksirankendaraan['id_taksiran_kendaraan']; ?></li>
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
                             <h3 class="card-title">Ubah Data Taksiran Kendaraan</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <input type="hidden" class="form-control" name="id_taksiran_kendaraan" value="<?php echo $taksirankendaraan['id_taksiran_kendaraan'] ?>">
                                 <div class="form-group">
                                     <label for="besar_taksiran_kendaraan">Besar Taksiran Kendaraan (%):</label>
                                     <input name="besar_taksiran_kendaraan" id="besar_taksiran_kendaraan" type="text" class="form-control" value="<?= $taksirankendaraan['besar_taksiran_kendaraan'] ?>" required autofocus onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan:</label>
                                     <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="4" placeholder="Masukan Keterangan" required><?= $taksirankendaraan['keterangan'] ?></textarea>
                                 </div>

                                 <div class="form-group">
                                     <a href="index.php?page=pages/taksirankendaraan/viewtaksirankendaraan" class="btn btn-danger">Batal</a>
                                     <button type="submit" name="update" class="btn btn-primary">Update</button>
                                 </div>
                             </form>
                             <?php

                                if (isset($_POST['update'])) {
                                    $id_taksiran_kendaraan = $_POST['id_taksiran_kendaraan'];
                                    $besar_taksiran_kendaraan = $_POST['besar_taksiran_kendaraan'];
                                    $keterangan = $_POST['keterangan'];
                                    // Edit data tabel Taksiran Kendaraan
                                    $edit = $koneksi->query("UPDATE tb_taksiran_kendaraan SET besar_taksiran_kendaraan= '$besar_taksiran_kendaraan',keterangan= '$keterangan' WHERE id_taksiran_kendaraan='$id_taksiran_kendaraan'");

                                    if ($edit) {
                                        $_SESSION['info'] = 'Berhasil Diubah';
                                        echo "<script>
                                                        window.location.href = '?page=pages/taksirankendaraan/viewtaksirankendaraan'</script>";
                                    } else {
                                        $_SESSION['info'] = 'Gagal Diubah';
                                        echo "<script>window.location.href = '?page=pages/taksirankendaraan/viewtaksirankendaraan'
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