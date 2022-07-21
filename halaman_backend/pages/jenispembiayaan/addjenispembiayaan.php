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
                         <li class="breadcrumb-item"><a href="?page=pages/jenispembiayaan/viewjenispembiayaan">Data Jenis Pembiayaan</a></li>
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
                             <h3 class="card-title">Tambah Data Jenis Pembiayaan</h3>
                         </div>
                         <div class="card-body">
                             <form action="" method="POST">
                                 <!-- <div class="form-group">
                                     <label for="jenis_pembiayaan">Jenis Pembiayaan:</label>
                                     <select name="jenis_pembiayaan" id="jenis_pembiayaan" class="form-control">
                                         <option value="">--Pilih Jenis Pembiayaan--</option>
                                         <option value="Pembiayaan 1">Pembiayaan 1</option>
                                         <option value="Pembiayaan 2">Pembiayaan 2</option>
                                     </select>
                                 </div> -->

                                 <div class="form-group">
                                     <label for="jenis_pembiayaan">Jenis Pembiayaan:</label>
                                     <input type="text" name="jenis_pembiayaan" id="jenis_pembiayaan" class="form-control" required>
                                 </div>

                                 <div class="form-group">
                                     <label for="keterangan">Keterangan:</label>
                                     <textarea rows="5" name="keterangan" id="keterangan" class="form-control" placeholder="Masukan Keterangan..." required></textarea>
                                 </div>

                                 <div class="form-group">
                                     <a href="index.php?page=pages/jenispembiayaan/viewjenispembiayaan" class="btn btn-success">Kembali</a>
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
        $jenis_pembiayaan = addslashes($_POST['jenis_pembiayaan']);
        $keterangan = addslashes($_POST['keterangan']);

        //// Query menyimpan data ke dalam tabel Jenis Pembiayaan
        $simpan = mysqli_query($koneksi, "INSERT INTO tb_jenis_pembiayaan (`jenis_pembiayaan`,`keterangan`) VALUES ('$jenis_pembiayaan','$keterangan')");

        if ($simpan) {
            $_SESSION['info'] = 'Berhasil Disimpan';
            echo "<script>
            window.location.href = '?page=pages/jenispembiayaan/viewjenispembiayaan'</script>";
        } else {
            $_SESSION['info'] = 'Gagal Disimpan';
            echo "<script>window.location.href = '?page=pages/jenispembiayaan/viewjenispembiayaan'
              </script>";
        }
    }

    ?>