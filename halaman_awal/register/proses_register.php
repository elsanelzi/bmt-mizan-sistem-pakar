<?php
require '../../koneksi.php';
// Aksi jika menekan tombol register
if (isset($_POST['register'])) {
  $nik_username = $_POST['nik_username'];
  // if (strlen($nik_username) < 3) {
  //   $nik_username_pesan = "Nik Username Terlalu Pendek";
  // } elseif (strlen($nik_username) > 3) {
  //   $nik_username_pesan = "Nik Username Terlalu Panjang";
  // }
  $nama_lengkap = $_POST['nama_lengkap'];
  $no_telepon = $_POST['no_telepon'];
  $alamat = $_POST['alamat'];

  $status = 'nasabah';
  $password = $_POST['password'];

  $nama_foto_nasabah = $_FILES['foto_nasabah']['name'];
  $lokasi_foto_nasabah = $_FILES['foto_nasabah']['tmp_name'];
  $size_foto_nasabah = $_FILES['foto_nasabah']['size'];
  $max_size = 5120;

  $nama_foto_ktp_nasabah = $_FILES['foto_ktp_nasabah']['name'];
  $lokasi_foto_ktp_nasabah = $_FILES['foto_ktp_nasabah']['tmp_name'];
  $size_foto_ktp_nasabah = $_FILES['foto_ktp_nasabah']['size'];


  // Cek size foto
  if ($size_foto_nasabah > $max_size) {
    echo "<script>
                alert('Opss, Ukuran file Foto Nasabah Melebihi Ketentuan');
                window.location.href = '../register/register.php' </script>";
  } else if ($size_foto_ktp_nasabah > $max_size) {
    echo "<script>
                alert('Opss, Ukuran file Foto KTP Nasabah Melebihi Ketentuan');
                window.location.href = '../register/register.php' </script>";
  } else {
    // Query untuk menyimpan data ke dalam tabel user
    $simpanUser = mysqli_query($koneksi, "INSERT INTO tb_user (`nik_username`, `password`,`status` ) VALUES ('$nik_username', '$password', '$status')");

    if ($simpanUser == TRUE) {

      $foto_nasabah = uniqid(rand(), true) . '_' . $nama_foto_nasabah;
      while (true) {
        $foto_nasabah = uniqid(rand(), true) . '_' . $nama_foto_nasabah;

        if (!file_exists(sys_get_temp_dir() . $foto_nasabah))
          break;
      }

      $foto_ktp_nasabah = uniqid(rand(), true) . '_' . $nama_foto_ktp_nasabah;
      while (true) {
        $foto_ktp_nasabah = uniqid(rand(), true) . '_' . $nama_foto_ktp_nasabah;

        if (!file_exists(sys_get_temp_dir() . $foto_ktp_nasabah))
          break;
      }

      $status_validasi = 0;
      // $foto_nasabah = time() . '_' . $nama_foto_nasabah;
      $pindah = move_uploaded_file($lokasi_foto_nasabah, '../../assets/image/foto nasabah/' . $foto_nasabah);
      // $foto_ktp_nasabah = time() . '_' . $nama_foto_ktp_nasabah;
      $pindah = move_uploaded_file($lokasi_foto_ktp_nasabah, '../../assets/image/foto ktp nasabah/' . $foto_ktp_nasabah);
      // Query untuk menyimpan data ke table nasabah
      $simpanNasabah = mysqli_query($koneksi, "INSERT INTO tb_nasabah (`nik_username`,`nama_lengkap`, `password`, `alamat`,`no_telepon`, `foto_nasabah`,`foto_ktp_nasabah`,`status_validasi` ) VALUES ('$nik_username','$nama_lengkap', '$password','$alamat', '$no_telepon','$foto_nasabah', '$foto_ktp_nasabah','$status_validasi')");


      if ($simpanNasabah) {
        $_SESSION['info'] = 'Berhasil Register';
        echo "<script>
                window.location.href = '../login/login.php'
              </script>";
      } else {
        $_SESSION['info'] = 'Gagal Register';
        echo "<script>
                window.location.href = '../register/register.php'
              </script>";
      }
    } else {
      $_SESSION['info'] = 'Gagal Register';
      echo "<script>
                window.location.href = '../register/register.php'
              </script>";
    }
  }
}
