<?php

$id = $_GET['id'];

// Query hapus data tabel Faktor 5C berdasarkan id
$hapus = $koneksi->query("DELETE FROM tb_faktor_5c WHERE id_faktor_5c='$id'");


if ($hapus == TRUE) {
    $_SESSION['info'] = 'Berhasil Dihapus';
    echo "<script>
        	window.location = '?page=pages/faktor5C/viewfaktor5C'
       	</script>";
} else {
    $_SESSION['info'] = 'Gagal Dihapus';
    echo "<script>
        	window.location = '?page=pages/faktor5C/viewfaktor5C'
       	</script>";
}
