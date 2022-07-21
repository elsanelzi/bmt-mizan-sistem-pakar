 <?php $id = $_GET['id'];
    $rasioangsuran = mysqli_query($koneksi, "SELECT * FROM tb_rasio_angsuran WHERE id_rasio_angsuran = '$id'")->fetch_array();
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
                         <li class="breadcrumb-item"><a href="?page=pages/rasioangsuran/viewrasioangsuran">Data Rasio Angsuran</a></li>
                         <li class="breadcrumb-item active">Edit Data</li>
                         <li class="breadcrumb-item"><?= $rasioangsuran['id_rasio_angsuran']; ?></li>
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
                             <h3 class="card-title">Ubah Data Rasio Angsuran</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <input type="hidden" class="form-control" name="id_rasio_angsuran" value="<?php echo $rasioangsuran['id_rasio_angsuran'] ?>">
                                 <div class="form-group">
                                     <label for="besar_rasio_angsuran">Besar Rasio ANgsuran (%):</label>
                                     <input name="besar_rasio_angsuran" id="besar_rasio_angsuran" type="text" class="form-control" value="<?= $rasioangsuran['besar_rasio_angsuran'] ?>" required autofocus onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">keterangan:</label>
                                     <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="4" placeholder="Masukan Keterangan" required><?= $rasioangsuran['keterangan'] ?></textarea>
                                 </div>

                                 <div class="form-group">
                                     <a href="index.php?page=pages/rasioangsuran/viewrasioangsuran" class="btn btn-danger">Batal</a>
                                     <button type="submit" name="update" class="btn btn-primary">Update</button>
                                 </div>
                             </form>
                             <?php

                                if (isset($_POST['update'])) {
                                    $id_rasio_angsuran = $_POST['id_rasio_angsuran'];
                                    $besar_rasio_angsuran = $_POST['besar_rasio_angsuran'];
                                    $keterangan = $_POST['keterangan'];
                                    // Edit data tabel rentang pendapatan
                                    $edit = $koneksi->query("UPDATE tb_rasio_angsuran SET besar_rasio_angsuran= '$besar_rasio_angsuran',keterangan= '$keterangan' WHERE id_rasio_angsuran='$id_rasio_angsuran'");

                                    if ($edit) {
                                        $_SESSION['info'] = 'Berhasil Diubah';
                                        echo "<script>
                                                        window.location.href = '?page=pages/rasioangsuran/viewrasioangsuran'</script>";
                                    } else {
                                        $_SESSION['info'] = 'Gagal Diubah';
                                        echo "<script>window.location.href = '?page=pages/rasioangsuran/viewrasioangsuran'
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