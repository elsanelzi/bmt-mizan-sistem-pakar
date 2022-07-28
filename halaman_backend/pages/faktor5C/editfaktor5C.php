 <?php $id = $_GET['id'];
    $faktor5C = mysqli_query($koneksi, "SELECT * FROM tb_faktor_5c WHERE id_faktor_5c = '$id'")->fetch_array();
    ?>

 <!-- Content Wrapper. Contains page content -->
 <div class="content-wrapper">
     <!-- Content Header (Page header) -->
     <section class="content-header">
         <div class="container-fluid">
             <div class="row mb-2">
                 <div class="col-sm-6">
                     <!-- <h1>Data Faktor 5C</h1> -->
                 </div>
                 <div class="col-sm-6">
                     <ol class="breadcrumb float-sm-right">
                         <li class="breadcrumb-item"><a href="?page=pages/faktor5C/viewfaktor5C">Data Faktor 5C</a></li>
                         <li class="breadcrumb-item active">Edit Data</li>
                         <li class="breadcrumb-item"><?=
                                                        $faktor5C['id_faktor_5c'];

                                                        ?></li>
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
                             <h3 class="card-title">Ubah Data Faktor 5C</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <input type="hidden" class="form-control" name="id_faktor_5C" value="<?php echo $faktor5C['id_faktor_5c'] ?>">

                                 <div class="form-group">
                                     <label for="faktor_5C">Faktor 5C:</label>
                                     <input name="faktor_5C" id="faktor_5C" type="text" class="form-control" value="<?= $faktor5C['faktor_5c'] ?>" required />
                                 </div>
                                 <div class="form-group">
                                     <a href="index.php?page=pages/faktor5C/viewfaktor5C" class="btn btn-danger">Batal</a>
                                     <button type="submit" name="update" class="btn btn-primary">Update</button>
                                 </div>
                             </form>
                             <?php

                                if (isset($_POST['update'])) {
                                    $id_faktor_5C = $_POST['id_faktor_5C'];
                                    $faktor_5C = $_POST['faktor_5C'];

                                    // // Edit data tabel Faktor 5C
                                    $edit = $koneksi->query("UPDATE tb_faktor_5c SET faktor_5c= '$faktor_5C' WHERE id_faktor_5c='$id_faktor_5C'");
                                    if ($edit) {
                                        $_SESSION['info'] = 'Berhasil Diubah';
                                        echo "<script>
                                                        window.location.href = '?page=pages/faktor5C/viewfaktor5C'</script>";
                                    } else {
                                        $_SESSION['info'] = 'Gagal Diubah';
                                        echo "<script>window.location.href = '?page=pages/faktor5C/viewfaktor5C'
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