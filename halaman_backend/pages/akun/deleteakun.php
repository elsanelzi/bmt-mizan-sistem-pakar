<?php

$id = $_GET['id'];

// Query mmengambil data dari tabel user berdasarkan id
$ambil = $koneksi->query("SELECT * FROM tb_user WHERE id_user='$id'")->fetch_assoc();
$nik_username = $ambil['nik_username'];

// Query hapus data tabel user berdasarkan id
$hapus = $koneksi->query("DELETE FROM tb_user WHERE id_user='$id'");

// Query hapus data tabel admin berdasarkan id
$hapus = $koneksi->query("DELETE FROM tb_detail_user WHERE nik_username='$nik_username'");

if ($hapus == TRUE) {
    $_SESSION['info'] = 'Berhasil Dihapus';
    echo "<script>
        	window.location = '?page=pages/akun/viewakun'
       	</script>";
} else {
    $_SESSION['info'] = 'Gagal Dihapus';
    echo "<script>
        	window.location = '?page=pages/akun/viewakun'
       	</script>";
}
