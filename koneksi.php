<?php

$server = "localhost"; //nama host
$user = "root"; //nama user
$password = ""; //password
$database = "db_sistem_pakar"; //nama database

$koneksi = mysqli_connect($server, $user, $password, $database);

// Koneksi gagal
if (!$koneksi) {
    die("Gagal terhubung dengan database: " . mysqli_connect_error());
}
