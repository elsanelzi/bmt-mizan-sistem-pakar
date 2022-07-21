<?php

$id = $_GET['id'];

// Query hapus data tabel Jenis Pembiayaan berdasarkan id
$hapus = $koneksi->query("DELETE FROM tb_jenis_pembiayaan WHERE id_jenis_pembiayaan='$id'");


if ($hapus == TRUE) {
    $_SESSION['info'] = 'Berhasil Dihapus';
    echo "<script>
        	window.location = '?page=pages/jenispembiayaan/viewjenispembiayaan'
       	</script>";
} else {
    $_SESSION['info'] = 'Gagal Dihapus';
    echo "<script>
        	window.location = '?page=pages/jenispembiayaan/viewjenispembiayaan'
       	</script>";
}
