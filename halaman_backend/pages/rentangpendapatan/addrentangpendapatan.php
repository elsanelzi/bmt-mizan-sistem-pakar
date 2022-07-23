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
                         <li class="breadcrumb-item"><a href="?page=pages/akun/viewakun">Data Rentang Pendapatan</a></li>
                         <li class="breadcrumb-item active">Tambah Data</li>
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
                             <h3 class="card-title">Tambah Data Rentang Pendapatan</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <div class="form-group">
                                     <label for="nilai_pendapatan_minimum">Nilai Pendapatan Minimum:</label>
                                     <input name="nilai_pendapatan_minimum" id="nilai_pendapatan_minimum" type="float" class="form-control" placeholder="Masukan Nilai Pendapatan Minimum" required onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                 </div>
                                 <div class="form-group">
                                     <label for="keterangan">Keterangan:</label>
                                     <textarea name="keterangan" id="keterangan" cols="30" rows="4" class="form-control" placeholder="Masukan Keterangan" required></textarea>
                                 </div>

                                 <div class="form-group">
                                     <a href="index.php?page=pages/rentangpendapatan/viewrentangpendapatan" class="btn btn-success">Kembali</a>
                                     <button type="reset" class="btn btn-danger">Reset</button>
                                     <button type="submit" name="tambah" class="btn btn-primary">Tambah</button>
                                 </div>
                             </form>
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

 <?php

    if (isset($_POST['tambah'])) {
        $nilai_pendapatan_minimum = $_POST['nilai_pendapatan_minimum'];
        $keterangan = $_POST['keterangan'];


        // Query mmenyimpan data kedalam tabel rentang pendapatan
        $simpan = mysqli_query($koneksi, "INSERT INTO tb_rentang_pendapatan (`nilai_pendapatan_minimum`,`keterangan`) VALUES ('$nilai_pendapatan_minimum','$keterangan')");

        if ($simpan) {
            $_SESSION['info'] = 'Berhasil Disimpan';
            echo "<script>
            window.location.href = '?page=pages/rentangpendapatan/viewrentangpendapatan'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>window.location.href = '?page=pages/rentangpendapatan/viewrentangpendapatan'
              </script>";
        }
    }

    ?>