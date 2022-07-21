<?php require '../../koneksi.php';

session_start(); ?>
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
                        <form action="proses_register.php" method="POST" enctype="multipart/form-data">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">NIK</span>
                                <input name="nik_username" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Masukan NIK" required autofocus onkeypress="return event.charCode>=48 && event.charCode<=57" />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Nama Lengkap</span>
                                <input name="nama_lengkap" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Masukan Nama Lengkap" required />
                            </label> <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">No. Telepon</span>
                                <input name="no_telepon" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Masukan No. Telepon" required />
                            </label>
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Alamat</span>
                                <textarea name="alamat" rows="3" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Masukan Alamat" required></textarea>
                            </label>


                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Foto Nasabah</span>
                                <input name="foto_nasabah" type="file" class="block w-full py-2 mt-1 text-sm font-medium text-dark bg-gray border border-transparent rounded-lg" required />
                            </label>

                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Foto KTP</span>
                                <input name="foto_ktp_nasabah" type="file" class="block w-full py-2 mt-1 text-sm font-medium text-dark bg-gray border border-transparent rounded-lg" required />
                            </label>

                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input name="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" required />
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" name="register">Buat Akun</button>
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
    </div>
</body>

</html>