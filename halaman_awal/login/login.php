<?php
session_start();
if (isset($_SESSION['status'])) {
    if ($_SESSION['status'] !== 'nasabah') {
        header("location:halaman_backend");
        die();
    } else {
        header("location:index.php");
        die();
    }
}

?>
<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Masuk</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/assets_login/css/tailwind.output.css" />
    <!-- Sweet Alert 2 -->
    <link rel="stylesheet" href="../../assets/assets_user/sweet alert2/sweetalert2.min.css">
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="../../assets/assets_login/js/init-alpine.js"></script>

</head>

<body>
    <div class="flex items-center min-h-screen p-6 bg-gray-50 dark:bg-gray-900">
        <div class="info-data" data-infodata="<?php if (isset($_SESSION['info'])) {
                                                    echo $_SESSION['info'];
                                                }
                                                unset($_SESSION['info']); ?>"></div>
        <div class="flex-1 h-full max-w-4xl mx-auto overflow-hidden bg-white rounded-lg shadow-xl dark:bg-gray-800">
            <div class="flex flex-col overflow-y-auto md:flex-row">
                <div class="h-32 md:h-auto md:w-1/2">
                    <img aria-hidden="true" class="object-cover w-full h-full dark:hidden" src="../../assets/assets_login/img/login-office.jpeg" alt="Office" />
                    <img aria-hidden="true" class="hidden object-cover w-full h-full dark:block" src="../../assets/assets_login/img/login-office-dark.jpeg" alt="Office" />
                </div>
                <div class="flex items-center justify-center p-6 sm:p-12 md:w-1/2">
                    <div class="w-full">
                        <h1 class="mb-4 text-xl font-semibold text-gray-700 dark:text-gray-200">
                            Masuk
                        </h1>
                        <form action="proses_login.php" method="POST">
                            <label class="block text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Username</span>
                                <input name="nik_username" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="Jane Doe" />
                            </label>
                            <label class="block mt-4 text-sm">
                                <span class="text-gray-700 dark:text-gray-400">Password</span>
                                <input name="password" class="block w-full mt-1 text-sm dark:border-gray-600 dark:bg-gray-700 focus:border-purple-400 focus:outline-none focus:shadow-outline-purple dark:text-gray-300 dark:focus:shadow-outline-gray form-input" placeholder="***************" type="password" />
                            </label>

                            <!-- You should use a button here, as the anchor is only used for the example  -->
                            <button type="submit" class="block w-full px-4 py-2 mt-4 text-sm font-medium leading-5 text-center text-white transition-colors duration-150 bg-purple-600 border border-transparent rounded-lg active:bg-purple-600 hover:bg-purple-700 focus:outline-none focus:shadow-outline-purple" name="login">Masuk</button>

                        </form>
                        <p class="mt-1">
                            <a class="text-sm font-medium text-purple-600 dark:text-purple-400 hover:underline" href="../register/register.php">
                                Buat Akun
                            </a>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Sweet Alert 2 -->
    <script src="../../assets/assets_user/sweet alert2/sweetalert2.min.js"></script>


    <!-- Sweet Alert 2 -->
    <script>
        const notification = $('.info-data').data('infodata');

        if (notification == "Berhasil Register") {
            Swal.fire({
                icon: 'success',
                title: 'Sukses',
                text: 'Selamat, Anda ' + notification + '!',
            })
        }
    </script>
</body>

</html>