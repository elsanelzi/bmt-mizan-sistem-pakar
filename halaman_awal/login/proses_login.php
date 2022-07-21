<?php
// Mengaktifkan atau memulai session
session_start();

// Koneksi ke database
include '../../koneksi.php';

if (isset($_POST['login'])) {
    $username = $_POST['nik_username'];
    $password = $_POST['password'];

    $query = mysqli_query($koneksi, "SELECT * FROM tb_user WHERE nik_username = '$username' and password = '$password'") or die(mysqli_error($koneksi));

    if (mysqli_num_rows($query) == 1) {
        $sql = mysqli_fetch_array($query);
        if ($sql['status'] == 'Admin') {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $sql['status'];
            $_SESSION['id_user'] = $sql['id_user'];
            header('location:../../halaman_backend');
        } elseif ($sql['status'] == 'Manajer') {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $sql['status'];
            $_SESSION['id_user'] = $sql['id_user'];
            header('location:../../halaman_backend');
        } elseif ($sql['status'] == 'Petugas Lapangan') {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $sql['status'];
            $_SESSION['id_user'] = $sql['id_user'];
            header('location:../../halaman_backend');
        } elseif ($sql['status'] == 'Teller') {
            $_SESSION['username'] = $username;
            $_SESSION['status'] = $sql['status'];
            $_SESSION['id_user'] = $sql['id_user'];
            header('location:../../halaman_backend');
        } elseif ($sql['status'] == 'nasabah') {
            $nasabah = mysqli_query($koneksi, "SELECT * FROM tb_nasabah WHERE nik_username = '$username' and password = '$password'")->fetch_array();
            if ($nasabah['status_validasi'] == 1) {
                $_SESSION['info'] = 'Berhasil Login';
                $_SESSION['username'] = $username;
                $_SESSION['status'] = $sql['status'];
                $_SESSION['id_user'] = $sql['id_user'];
                header('location:../../index.php');
            } else {
                echo "<script>
                alert('Maaf, Akun Anda Belum Divalidasi');
                window.location='login.php' </script>";
            }
        }
    } else {
        echo "<script>
        alert('Username atau Password salah');
         window.location='login.php' </script>";
    }
}
