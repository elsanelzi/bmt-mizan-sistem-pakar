 <?php $id = $_GET['id'];
    $rentangpendapatan = mysqli_query($koneksi, "SELECT * FROM tb_rentang_pendapatan WHERE id_rentang_pendapatan = '$id'")->fetch_array();
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
                         <li class="breadcrumb-item"><a href="?page=pages/rentangpendapatan/viewrentangpendapatan">Data Rentang Pendapatan</a></li>
                         <li class="breadcrumb-item active">Edit Data</li>
                         <li class="breadcrumb-item"><?= $rentangpendapatan['id_rentang_pendapatan']; ?></li>
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
                             <h3 class="card-title">Ubah Data Rentang Pendapatan</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <input type="hidden" class="form-control" name="id_rentang_pendapatan" value="<?php echo $rentangpendapatan['id_rentang_pendapatan'] ?>">
                                 <div class="form-group">
                                     <label for="nilai_pendapatan_minimum">Nilai Pendapatan Minimum:</label>
                                     <input name="nilai_pendapatan_minimum" id="nilai_pendapatan_minimum" type="text" class="form-control" value="<?= $rentangpendapatan['nilai_pendapatan_minimum'] ?>" required autofocus />
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">keterangan:</label>
                                     <textarea name="keterangan" id="keterangan" class="form-control" cols="30" rows="4" placeholder="Masukan Keterangan" required><?= $rentangpendapatan['keterangan'] ?></textarea>
                                 </div>

                                 <div class="form-group">
                                     <a href="index.php?page=pages/rentangpendapatan/viewrentangpendapatan" class="btn btn-danger">Batal</a>
                                     <button type="submit" name="update" class="btn btn-primary">Update</button>
                                 </div>
                             </form>
                             <?php

                                if (isset($_POST['update'])) {
                                    $id_rentang_pendapatan = $_POST['id_rentang_pendapatan'];
                                    $nilai_pendapatan_minimum = $_POST['nilai_pendapatan_minimum'];
                                    $keterangan = $_POST['keterangan'];

                                    // Edit data tabel rentang pendapatan
                                    $edit = $koneksi->query("UPDATE tb_rentang_pendapatan SET nilai_pendapatan_minimum= '$nilai_pendapatan_minimum',keterangan= '$keterangan' WHERE id_rentang_pendapatan='$id_rentang_pendapatan'");

                                    if ($edit) {
                                        $_SESSION['info'] = 'Berhasil Diubah';
                                        echo "<script>
                                                        window.location.href = '?page=pages/rentangpendapatan/viewrentangpendapatan'</script>";
                                    } else {
                                        $_SESSION['info'] = 'Gagal Diubah';
                                        echo "<script>window.location.href = '?page=pages/rentangpendapatan/viewrentangpendapatan'
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