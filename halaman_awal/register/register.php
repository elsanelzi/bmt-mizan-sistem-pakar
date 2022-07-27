<?php require '../../koneksi.php';

session_start(); ?>

<?php
$error_latitude = "";
$error_longitude = "";
$error_denah_lokasi = "";
$latitude = "";
$longitude = "";
$denah_lokasi = "";


$error_nik_username = "";
$error_nama_lengkap = "";
$error_no_telepon = "";
$error_alamat = "";
$error_foto_nasabah = "";
$error_foto_ktp_nasabah = "";
$error_password = "";



$nik_username = "";
$nama_lengkap = "";
$no_telepon = "";
$alamat = "";
$foto_nasabah = "";
$foto_ktp_nasabah = "";
$password = "";

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Cek Validation NIK username
    if (empty($_POST['nik_username'])) {
        $error_nik_username = "NIK tidak boleh kosong";
    } else if (!is_numeric($_POST['nik_username'])) {
        $error_nik_username = "NIK hanya boleh angka";
    } else if (strlen($_POST['nik_username']) < 16) {
        $error_nik_username = "Inputan NIK minimal 16 karakter";
    } else if (strlen($_POST['nik_username']) > 16) {
        $error_nik_username = "Inputan NIK maksimal 16 karakter";
    } else {
        $nik_username = cek_input($_POST['nik_username']);
        $nik_username = mysqli_escape_string($koneksi, $nik_username);
    }

    // Cek Validation Nama Lengkap
    if (empty($_POST['nama_lengkap'])) {
        $error_nama_lengkap = "Nama Lengkap tidak boleh kosong";
    } else if (!preg_match("/^[a-zA-Z ]*$/", $_POST['nama_lengkap'])) {
        $error_nama_lengkap = "Inputan hanya boleh huruf dan spasi";
    } else {
        $nama_lengkap = cek_input($_POST['nama_lengkap']);
        $nama_lengkap = mysqli_escape_string($koneksi, $nama_lengkap);
    }
    // Cek Validation No. Telepon
    if (empty($_POST['no_telepon'])) {
        $error_no_telepon = "No. Telepon tidak boleh kosong";
    } else if (!is_numeric($_POST['no_telepon'])) {
        $error_no_telepon = "No. Telepon hanya boleh angka";
    } else if (strlen($_POST['no_telepon']) < 12) {
        $error_no_telepon = "Inputan No. Telepon minimal 12 karakter";
    } else if (strlen($_POST['no_telepon']) > 15) {
        $error_no_telepon = "Inputan No. Telepon maksimal 12 karakter";
    } else {
        $no_telepon = cek_input($_POST['no_telepon']);
        $no_telepon = mysqli_escape_string($koneksi, $no_telepon);
    }

    // Cek Validation Alamat
    if (empty($_POST['alamat'])) {
        $error_alamat = "Alamat tidak boleh kosong";
    } else {
        $alamat = cek_input($_POST['alamat']);
        $alamat = mysqli_escape_string($koneksi, $alamat);
    }

    // Cek Validation Password
    if (empty($_POST['password'])) {
        $error_password = "Password tidak boleh kosong";
    } else {
        $password = cek_input($_POST['password']);
        $password = mysqli_escape_string($koneksi, $password);
    }

    // Cek Validation Denah Lokasi
    if (empty($_POST['denah_lokasi'])) {
        $error_denah_lokasi = "Denah Lokasi tidak boleh kosong";
    } else {
        $denah_lokasi = cek_input($_POST['denah_lokasi']);
        $denah_lokasi = mysqli_escape_string($koneksi, $denah_lokasi);
    }

    $status = 'nasabah';
    $status_validasi = 0;

    // Cek Validation Foto Nasabah 
    $nama_foto_nasabah = $_FILES['foto_nasabah']['name'];
    $lokasi_foto_nasabah = $_FILES['foto_nasabah']['tmp_name'];
    $size_foto_nasabah = $_FILES['foto_nasabah']['size'];

    // Max Ukuran foto 10 MB(10240000 KB)
    $max_size = 10240000;

    if (empty($nama_foto_nasabah)) {
        $error_foto_nasabah = "Foto Nasabah tidak boleh kosong";
    } else if ($size_foto_nasabah > $max_size) {
        $error_foto_nasabah = "Ukuran Foto Maksimal 10 MB";
    } else {
        $foto_nasabah = cek_input($nama_foto_nasabah);
        $foto_nasabah = mysqli_escape_string($koneksi, $foto_nasabah);
    }


    // Cek Validation Foto KTP Nasabah
    $nama_foto_ktp_nasabah = $_FILES['foto_ktp_nasabah']['name'];
    $lokasi_foto_ktp_nasabah = $_FILES['foto_ktp_nasabah']['tmp_name'];
    $size_foto_ktp_nasabah = $_FILES['foto_ktp_nasabah']['size'];

    if (empty($nama_foto_ktp_nasabah)) {
        $error_foto_ktp_nasabah = "Foto KTP Nasabah tidak boleh kosong";
    } else if ($size_foto_ktp_nasabah > $max_size) {
        $error_foto_ktp_nasabah = "Ukuran Foto Maksimal 10 MB";
    } else {
        $foto_ktp_nasabah = cek_input($nama_foto_ktp_nasabah);
        $foto_ktp_nasabah = mysqli_escape_string($koneksi, $foto_ktp_nasabah);
    }

    if (!empty($nik_username) && !empty($nama_lengkap) && !empty($no_telepon) && !empty($alamat) && !empty($foto_nasabah) && !empty($foto_ktp_nasabah) && !empty($password) && !empty($denah_lokasi)) {
        // Query untuk menyimpan data ke dalam tabel user
        $simpanUser = mysqli_query($koneksi, "INSERT INTO tb_user (`nik_username`, `password`,`status` ) VALUES ('$nik_username', '$password', '$status')");

        if ($simpanUser == TRUE) {

            $foto_nasabah = uniqid(rand(), true) . '_' . $nama_foto_nasabah;
            while (true) {
                $foto_nasabah = uniqid(rand(), true) . '_' . $nama_foto_nasabah;

                if (!file_exists(sys_get_temp_dir() . $foto_nasabah))
                    break;
            }

            $foto_ktp_nasabah = uniqid(
                rand(),
                true
            ) . '_' . $nama_foto_ktp_nasabah;
            while (true) {
                $foto_ktp_nasabah = uniqid(rand(), true) . '_' . $nama_foto_ktp_nasabah;

                if (!file_exists(sys_get_temp_dir() . $foto_ktp_nasabah))
                    break;
            }


            // Query untuk menyimpan data ke table nasabah
            $simpanNasabah = mysqli_query($koneksi, "INSERT INTO tb_nasabah (`nik_username`,`nama_lengkap`, `password`, `alamat`,`denah_lokasi`,`no_telepon`, `foto_nasabah`,`foto_ktp_nasabah`,`status_validasi` ) VALUES ('$nik_username','$nama_lengkap', '$password','$alamat','$denah_lokasi', '$no_telepon','$foto_nasabah', '$foto_ktp_nasabah','$status_validasi')");


            // Move foto nasabah
            $pindah = move_uploaded_file($lokasi_foto_nasabah, '../../assets/image/foto nasabah/' . $foto_nasabah);
            // Move Foto KTP Nasabah
            $pindah = move_uploaded_file($lokasi_foto_ktp_nasabah, '../../assets/image/foto ktp nasabah/' . $foto_ktp_nasabah);

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
        }
    } else {
    }
}

function cek_input($data)
{
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

?>



<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Daftar</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/assets_login/css/tailwind.output.css" />
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="../../assets/sweet alert2/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../../assets/assets_login/js/init-alpine.js"></script>
    <!-- Sweet Alert 2 -->
    <script src="../../assets/sweet alert2/sweetalert2.min.js"></script>

    <!-- MAPS -->
    <script src="https://code.jquery.com/jquery-3.6.0.slim.js" integrity="sha256-HwWONEZrpuoh951cQD1ov2HUK5zA5DwJ1DNUXaM6FsY=" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.8.0/dist/leaflet.css" integrity="sha512-hoalWLoI8r4UszCkZ5kL8vayOGVae1oxXe/2A4AO6J9+580uKHDO3JdHb7NzwwzK5xr/Fs0W40kiNHxM9vyTtQ==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.8.0/dist/leaflet.js" integrity="sha512-BB3hKbKWOc9Ez/TAwyWxNXeoV9c1v6FIeYiBieIWkpLjauysF18NzgR1MBNBXf8/KABdlkX68nAhlwcDFLGPCQ==" crossorigin=""></script>



    <!-- Sweet Alert 2 -->
    <script>
        const notification = $('.info-data').data('infodata');

        if (notification == "Gagal Register") {
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: 'Maaf, Anda ' + notification + '!',
            })
        }
    </script>
</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">


        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../../assets/assets_login/img/create-account-office.jpeg" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../../assets/assets_login/img/create-account-office-dark.jpeg" alt="Office" />
                </div>

                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                                echo $_SESSION['info'];
                                                            }
                                                            unset($_SESSION['info']); ?>"></div>
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Buat Akun
                        </h1>
                        <form method="POST" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>" enctype="multipart/form-data">
                            <label class="block text-sm">
                                <span for="nik_username" class="text-gray-700 dark:text-gray-400">NIK</span>
                                <input name="nik_username" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_nik_username != "" ? "is-invalid" : ""); ?>" id="nik_username" placeholder="Masukan NIK" value="<?php echo $nik_username; ?>" autofocus onkeypress="return event.charCode>=48 && event.charCode<=57" />
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_nik_username; ?></span>
                            </label>
                            <label class="block text-sm">
                                <span for="nama_lengkap" class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                                <input name="nama_lengkap" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_nama_lengkap != "" ? "is-invalid" : ""); ?>" id="nama_lengkap" placeholder="Masukan Nama Lengkap" value="<?php echo $nama_lengkap; ?>" />
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_nama_lengkap; ?></span>
                            </label>
                            <label class="block text-sm">
                                <span for="no_telepon" class="text-gray-700 dark:text-gray-400">No. Telepon</span>
                                <input name="no_telepon" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_no_telepon != "" ? "is-invalid" : ""); ?>" id="no_telepon" placeholder="Masukan No. Telepon" value="<?php echo $no_telepon; ?>" />
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_no_telepon; ?></span>
                            </label>
                            <label class="block text-sm">
                                <span for="alamat" class="text-gray-700 dark:text-gray-400">Alamat</span>
                                <textarea name="alamat" rows="3" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_alamat != "" ? "is-invalid" : ""); ?>" id="alamat" placeholder="Masukan Alamat" value="<?php echo $alamat; ?>"></textarea>
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_alamat; ?></span>
                            </label>
                            <!-- <label class="block text-sm">
                                <span for="latitude" class="text-gray-700 dark:text-gray-400">Latitude</span>
                                <input name="latitude" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_latitude != "" ? "is-invalid" : ""); ?>" id="latitude" placeholder="Masukan Latitude" value="<?php echo $latitude; ?>" />
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_latitude; ?></span>
                            </label> <label class="block text-sm">
                                <span for="longitude" class="text-gray-700 dark:text-gray-400">Longitude</span>
                                <input name="longitude" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_longitude != "" ? "is-invalid" : ""); ?>" id="longitude" placeholder="Masukan Longitude" value="<?php echo $longitude; ?>" />
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_longitude; ?></span>
                            </label> -->
                            <label class="block text-sm">
                                <input name="latitude" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_latitude != "" ? "is-invalid" : ""); ?>" id="latitude" placeholder="Masukan Latitude" value="<?php echo $latitude; ?>" type="hidden" />
                                <input name="longitude" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_longitude != "" ? "is-invalid" : ""); ?>" id="longitude" placeholder="Masukan Longitude" value="<?php echo $longitude; ?>" type="hidden" />
                                <span for="denah_lokasi" class="text-gray-700 dark:text-gray-400">Denah Lokasi</span>
                                <input name="denah_lokasi" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_denah_lokasi != "" ? "is-invalid" : ""); ?>" id="denah_lokasi" placeholder="Masukan Denah Lokasi" value="<?php echo $denah_lokasi; ?>" type="hidden" />
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_denah_lokasi; ?></span>
                            </label>
                            <label class="block text-sm">
                                <div id="map" style="width: 100%; height: 200px; margin-top:10px; margin-bottom:10px;"></div>
                            </label>
                            <label class="block text-sm">
                                <span for="foto_nasabah" class="text-gray-700 dark:text-gray-400">Foto Nasabah</span>
                                <input name="foto_nasabah" type="file" id="foto_nasabah" class="block w-full py-2 mt-1 text-sm font-medium text-dark bg-gray border border-transparent rounded-lg <?php echo ($error_foto_nasabah != "" ? "is-invalid" : ""); ?>" value="<?php echo $foto_nasabah; ?>" />
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_foto_nasabah; ?></span>
                            </label>

                            <label class="block text-sm">
                                <span for="foto_ktp_nasabah" class="text-gray-700 dark:text-gray-400">Foto KTP Nasabah</span>
                                <input name="foto_ktp_nasabah" type="file" id="foto_ktp_nasabah" class="block w-full py-2 mt-1 text-sm font-medium text-dark bg-gray border border-transparent rounded-lg <?php echo ($error_foto_ktp_nasabah != "" ? "is-invalid" : ""); ?>" value="<?php echo $foto_ktp_nasabah; ?>" />
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_foto_ktp_nasabah; ?></span>
                            </label>

                            <label class="block text-sm">
                                <span for="password" class="text-gray-700 dark:text-gray-400">Password</span>
                                <input name="password" type="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input <?php echo ($error_password != "" ? "is-invalid" : ""); ?>" id="password" placeholder="***************" value="<?php echo $password; ?>" />
                                <span class="text-danger" style="color:red; margin-bottom:5px;"><?php echo $error_password; ?></span>
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple">Buat Akun</button>
                        </form>

                        <p class="mt-4">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="../login/login.php">
                                Belum Punya Akun? Masuk
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>

        <script>
            var map = L.map('map').setView([-0.9578390368896975, 100.40169742995735], 16);

            var tiles = L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            // get coordinat location
            var latInput = document.querySelector("[name=latitude]");
            var lngInput = document.querySelector("[name=longitude]");
            var denahInput = document.querySelector("[name=denah_lokasi]");

            var curLocation = [-0.9578390368896975, 100.40169742995735];
            map.attributionControl.setPrefix(false);

            var marker = new L.marker(curLocation, {
                draggable: 'true',
            });

            marker.on('dragend', function(event) {
                var position = marker.getLatLng();
                marker.setLatLng(position, {
                    draggable: 'true',
                }).bindPopup(position).update();
                $("#latitude").val(position.lat);
                $("#longitude").val(position.lng);
                $("#denah_lokasi").val(position.lat + "," + position.lng);
            });

            map.addLayer(marker);
            map.on("click", function(e) {
                var lat = e.latlng.lat;
                var lng = e.latlng.lng;
                if (!marker) {
                    marker = L.marker(e.latlng).addTo(map);
                } else {
                    marker.setLatLng(e.latlng);
                }
                latInput.value = lat;
                lngInput.value = lng;
                denahInput.value = lat + "," + lng;

            });
        </script>


    </div>
</body>

</html>