<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Pendaftaran - BKK">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#ffffff">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Pendaftaran - BKK</title>
    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Commissioner:wght@100;200;300;400;500;600;700;800;900&amp;display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url() ?>assets/img/core-img/favicon.ico">
    <link rel="apple-touch-icon" href="<?= base_url() ?>assets/img/icons/icon-96x96.png">
    <link rel="apple-touch-icon" sizes="152x152" href="<?= base_url() ?>assets/img/icons/icon-152x152.png">
    <link rel="apple-touch-icon" sizes="167x167" href="<?= base_url() ?>assets/img/icons/icon-167x167.png">
    <link rel="apple-touch-icon" sizes="180x180" href="<?= base_url() ?>assets/img/icons/icon-180x180.png">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/apexcharts.css">
    <!-- Core Stylesheet-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
    <!-- Web App Manifest-->
    <!-- <link rel="manifest" href="<?= base_url() ?>assets/manifest.json"> -->
</head>

<body>
    <!-- Preloader-->
    <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
        <div class="spinner-grow text-primary" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div>
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>
    <!-- Back Button-->
    <!-- Login Wrapper Area-->
    <div class="login-wrapper d-flex align-items-center justify-content-center">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-12 col-sm-9 col-md-7 col-lg-6 col-xl-5">
                    <div class="text-center px-4"><img class="login-intro-img" style="max-width: 200px;" src="<?= base_url() ?>assets/img/icons/icon-512x512_1.png" alt=""></div>
                    <!-- Register Form-->
                    <?php $this->view('messages') ?>
                    <div class="register-form mt-4 px-4">
                        <form action="<?= base_url() ?>user/register" method="post">
                            <div class="form-group text-start mb-3">
                                <input class="form-control" type="text" name="nama" placeholder="Ketik Nama Anda" required autofocus>
                            </div>
                            <div class="form-group text-start mb-3">
                                <input class="form-control" type="email" name="email" placeholder="Ketik Alamat Email Anda" required autofocus>
                            </div>
                            <div class="form-group text-start mb-3">
                                <input class="form-control input-psswd" name="password" id="password" type="password" placeholder="Password" required autofocus>
                            </div>
                            <div class="form-group text-start mb-3">
                                <small id='message'></small>
                                <input class="form-control input-psswd" id="password_cek" type="password" placeholder="Ketik Ulang Password Anda" required autofocus>
                            </div>
                            <div class="form-group text-start mb-3">
                                <select class="form-control" id="role" name="role" required autofocus>
                                    <option value="">- Pilih Jenis Akun -</option>
                                    <option value="Pelajar">Pelajar</option>
                                    <option value="Dudi">Perusahaan</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary w-100">Daftar</button>
                        </form>
                    </div>
                    <!-- Login Meta-->
                    <div class="login-meta-data text-center">
                        <p class="mt-3 mb-0">Sudah Memiliki Akun?<a class="ms-1 stretched-link" href="<?= base_url() ?>auth/login">Login</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- All JavaScript Files-->
    <script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <script src="<?= base_url() ?>assets/js/default/internet-status.js"></script>
    <script src="<?= base_url() ?>assets/js/waypoints.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.easing.min.js"></script>
    <script src="<?= base_url() ?>assets/js/wow.min.js"></script>
    <script src="<?= base_url() ?>assets/js/owl.carousel.min.js"></script>
    <script src="<?= base_url() ?>assets/js/default/dark-mode-switch.js"></script>
    <!-- Password Strenght-->
    <script src="<?= base_url() ?>assets/js/default/jquery.passwordstrength.js"></script>
    <script src="<?= base_url() ?>assets/js/default/active.js"></script>
    <!-- PWA-->
    <!-- <script src="<?= base_url() ?>assets/js/pwa.js"></script> -->

    <script>
        $('#password_cek').on('keyup', function() {
            if ($('#password').val() == $('#password_cek').val()) {
                $("#message").hide();
                $(':button[type="submit"]').prop('disabled', false);
            } else {
                $('#message').html('Password Anda Tidak Sesuai').css('color', 'red');
                $(':button[type="submit"]').prop('disabled', true);
            }
        });
    </script>
</body>

</html>