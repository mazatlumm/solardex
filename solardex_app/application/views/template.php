<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Solardex Energy App">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="theme-color" content="#2ecc4a">
    <meta name="apple-mobile-web-app-capable" content="yes">
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <!-- <meta http-equiv="Content-Security-Policy" content="upgrade-insecure-requests"> -->
    <!-- The above 4 meta tags *must* come first in the head; any other head content must come *after* these tags-->
    <!-- Title-->
    <title>Solardex Energy App</title>
    <!-- Fonts-->
    <link rel="preconnect" href="https://fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css2?family=Public+Sans:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&amp;display=swap" rel="stylesheet">
    <!-- Favicon-->
    <link rel="icon" href="<?= base_url() ?>assets/img/core-img/favicona.ico">
    <!-- CSS Libraries-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/animate.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/owl.carousel.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/font-awesome.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/bootstrap-icons.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/magnific-popup.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/ion.rangeSlider.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/dataTables.bootstrap4.min.css">
    <link rel="stylesheet" href="<?= base_url() ?>assets/css/apexcharts.css">

    <!-- leaflet -->
    <!-- <link rel="stylesheet" href="<?= base_url() ?>assets/leaflet/leaflet.css" />
    <script src="<?= base_url() ?>assets/leaflet/leaflet.js"></script> -->
    <link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" integrity="sha512-xodZBNTC5n17Xt2atTPuE1HxjVMSvLVW9ocqUKLsCC5CXdbqCmblAshOMAS6/keqq/sMZMZ19scR4PsZChSR7A==" crossorigin="" />
    <script src="https://unpkg.com/leaflet@1.7.1/dist/leaflet.js" integrity="sha512-XQoYMqMTK8LvdxXYG3nZ448hOEQiglfqkJs1NOQV44cWnUrBc8PkAOcXy20w0vlaXaVUearIOBhiXZ5V3ynxwA==" crossorigin=""></script>
    <!-- Leaflet Search -->
    <link rel="stylesheet" href="<?= base_url() ?>assets/leaflet-search/src/leaflet-search.css" />
    <script src="<?= base_url() ?>assets/leaflet-search/src/leaflet-search.js"></script>

    <!-- Core Stylesheet-->
    <link rel="stylesheet" href="<?= base_url() ?>assets/style.css">
    <!-- Web App Manifest-->
    <!-- <link rel="manifest" href="<?= base_url() ?>assets/manifest.json"> -->
</head>

<body>
    <!-- Preloader-->
    <!-- <div class="preloader d-flex align-items-center justify-content-center" id="preloader">
        <div class="spinner-grow text-success" role="status">
            <div class="sr-only">Loading...</div>
        </div>
    </div> -->
    <!-- Internet Connection Status-->
    <div class="internet-connection-status" id="internetStatus"></div>

    <!-- Dark mode switching-->
    <div class="dark-mode-switching">
        <div class="d-flex w-100 h-100 align-items-center justify-content-center">
            <div class="dark-mode-text text-center"><svg xmlns="https://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-moon" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z" />
                </svg>
                <p class="mb-0">Pindah ke Mode Gelap</p>
            </div>
            <div class="light-mode-text text-center"><svg xmlns="https://www.w3.org/2000/svg" width="30" height="30" fill="currentColor" class="bi bi-brightness-high" viewBox="0 0 16 16">
                    <path d="M8 11a3 3 0 1 1 0-6 3 3 0 0 1 0 6zm0 1a4 4 0 1 0 0-8 4 4 0 0 0 0 8zM8 0a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 0zm0 13a.5.5 0 0 1 .5.5v2a.5.5 0 0 1-1 0v-2A.5.5 0 0 1 8 13zm8-5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2a.5.5 0 0 1 .5.5zM3 8a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1 0-1h2A.5.5 0 0 1 3 8zm10.657-5.657a.5.5 0 0 1 0 .707l-1.414 1.415a.5.5 0 1 1-.707-.708l1.414-1.414a.5.5 0 0 1 .707 0zm-9.193 9.193a.5.5 0 0 1 0 .707L3.05 13.657a.5.5 0 0 1-.707-.707l1.414-1.414a.5.5 0 0 1 .707 0zm9.193 2.121a.5.5 0 0 1-.707 0l-1.414-1.414a.5.5 0 0 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .707zM4.464 4.465a.5.5 0 0 1-.707 0L2.343 3.05a.5.5 0 1 1 .707-.707l1.414 1.414a.5.5 0 0 1 0 .708z" />
                </svg>
                <p class="mb-0">Pindah ke Mode Terang</p>
            </div>
        </div>
    </div>
    <!-- Sidenav Black Overlay-->
    <div class="sidenav-black-overlay"></div>
    <!-- Side Nav Wrapper-->
    <div class="sidenav-wrapper" id="sidenavWrapper">
        <!-- Go Back Button-->
        <div class="go-back-btn" id="goBack">
            <svg class="bi bi-x" width="24" height="24" viewBox="0 0 16 16" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
                <path fill-rule="evenodd" d="M11.854 4.146a.5.5 0 0 1 0 .708l-7 7a.5.5 0 0 1-.708-.708l7-7a.5.5 0 0 1 .708 0z"></path>
                <path fill-rule="evenodd" d="M4.146 4.146a.5.5 0 0 0 0 .708l7 7a.5.5 0 0 0 .708-.708l-7-7a.5.5 0 0 0-.708 0z"></path>
            </svg>
        </div>
        <!-- Sidenav Profile-->
        <div class="sidenav-profile">
            <div class="sidenav-style1"></div>
            <!-- User Thumbnail-->
            <div class="user-profile"><img src="<?= base_url() ?>assets/img/icons/user.png" alt=""></div>
            <!-- User Info-->
            <div class="user-info">
                <h6 class="user-name mb-0">Solardex</h6><span>Solar Energy</span>
            </div>
        </div>
        <!-- Sidenav Nav-->
        <ul class="sidenav-nav ps-0">
            <li><a href="<?= base_url() ?>">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-house-door" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M7.646 1.146a.5.5 0 0 1 .708 0l6 6a.5.5 0 0 1 .146.354v7a.5.5 0 0 1-.5.5H9.5a.5.5 0 0 1-.5-.5v-4H7v4a.5.5 0 0 1-.5.5H2a.5.5 0 0 1-.5-.5v-7a.5.5 0 0 1 .146-.354l6-6zM2.5 7.707V14H6v-4a.5.5 0 0 1 .5-.5h3a.5.5 0 0 1 .5.5v4h3.5V7.707L8 2.207l-5.5 5.5z" />
                        <path fill-rule="evenodd" d="M13 2.5V6l-2-2V2.5a.5.5 0 0 1 .5-.5h1a.5.5 0 0 1 .5.5z" />
                    </svg>Beranda</a></li>
            <li><a href="<?= base_url() ?>setting">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-gear" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M8.837 1.626c-.246-.835-1.428-.835-1.674 0l-.094.319A1.873 1.873 0 0 1 4.377 3.06l-.292-.16c-.764-.415-1.6.42-1.184 1.185l.159.292a1.873 1.873 0 0 1-1.115 2.692l-.319.094c-.835.246-.835 1.428 0 1.674l.319.094a1.873 1.873 0 0 1 1.115 2.693l-.16.291c-.415.764.42 1.6 1.185 1.184l.292-.159a1.873 1.873 0 0 1 2.692 1.116l.094.318c.246.835 1.428.835 1.674 0l.094-.319a1.873 1.873 0 0 1 2.693-1.115l.291.16c.764.415 1.6-.42 1.184-1.185l-.159-.291a1.873 1.873 0 0 1 1.116-2.693l.318-.094c.835-.246.835-1.428 0-1.674l-.319-.094a1.873 1.873 0 0 1-1.115-2.692l.16-.292c.415-.764-.42-1.6-1.185-1.184l-.291.159A1.873 1.873 0 0 1 8.93 1.945l-.094-.319zm-2.633-.283c.527-1.79 3.065-1.79 3.592 0l.094.319a.873.873 0 0 0 1.255.52l.292-.16c1.64-.892 3.434.901 2.54 2.541l-.159.292a.873.873 0 0 0 .52 1.255l.319.094c1.79.527 1.79 3.065 0 3.592l-.319.094a.873.873 0 0 0-.52 1.255l.16.292c.893 1.64-.902 3.434-2.541 2.54l-.292-.159a.873.873 0 0 0-1.255.52l-.094.319c-.527 1.79-3.065 1.79-3.592 0l-.094-.319a.873.873 0 0 0-1.255-.52l-.292.16c-1.64.893-3.433-.902-2.54-2.541l.159-.292a.873.873 0 0 0-.52-1.255l-.319-.094c-1.79-.527-1.79-3.065 0-3.592l.319-.094a.873.873 0 0 0 .52-1.255l-.16-.292c-.892-1.64.902-3.433 2.541-2.54l.292.159a.873.873 0 0 0 1.255-.52l.094-.319z" />
                        <path fill-rule="evenodd" d="M8 5.754a2.246 2.246 0 1 0 0 4.492 2.246 2.246 0 0 0 0-4.492zM4.754 8a3.246 3.246 0 1 1 6.492 0 3.246 3.246 0 0 1-6.492 0z" />
                    </svg>Pengaturan</a></li>
            <li>
                <div class="night-mode-nav">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-moon" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M14.53 10.53a7 7 0 0 1-9.058-9.058A7.003 7.003 0 0 0 8 15a7.002 7.002 0 0 0 6.53-4.47z" />
                    </svg>Mode Malam<div class="form-check form-switch">
                        <input class="form-check-input form-check-success" type="checkbox" id="darkSwitch">
                    </div>
                </div>
            </li>

            <li>
                <a href="<?= base_url() ?>auth/logout">
                    <svg width="18" height="18" viewBox="0 0 16 16" class="bi bi-box-arrow-right" fill="currentColor" xmlns="https://www.w3.org/2000/svg">
                        <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z" />
                        <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z" />
                    </svg>Keluar
                </a>
            </li>
        </ul>
        <hr>
        <!-- Social Info-->
        <!-- <div class="social-info-wrap"><a href="#"><i class="fa fa-twitter"></i></a><a href="#"><i class="fa fa-facebook"></i></a><a href="#"><i class="fa fa-dribbble"></i></a></div> -->
        <!-- Copyright Info-->
        <div class="copyright-info">
            <p>&copy; <?= date('Y') ?> All rights reserved by<a href="#">Alices Technology</a></p>
        </div>
    </div>
    <script src="<?= base_url() ?>assets/js/jquery.min.js"></script>
    <!-- Content Disini -->
    <?php echo $contents ?>

    <div class="footer-nav-area" id="footerNav">
        <div class="container px-0">
            <!-- Paste your Footer Content from here-->
            <!-- Footer Content-->
            <div class="footer-nav position-relative shadow-sm footer-style-two">
                <ul class="h-100 d-flex align-items-center justify-content-between ps-0">
                    <li <?= $this->uri->segment(2) == 'iot_device' ? 'class="active"' : 'class=""' ?>>
                        <a href="<?= base_url() ?>page/iot_device">
                            <svg id="Capa_1" enable-background="new 0 0 512 512" height="32" viewBox="0 0 512 512" width="32" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="74.98" x2="437.019" y1="437.019" y2="74.98">
                                    <stop offset="0" stop-color="#00aa45" />
                                    <stop offset="1" stop-color="#d3ff33" />
                                </linearGradient>
                                <radialGradient id="SVGID_2_" cx="256" cy="255.999" gradientUnits="userSpaceOnUse" r="256">
                                    <stop offset="0" stop-color="#00aa45" />
                                    <stop offset="1" stop-color="#e6fe7f" stop-opacity="0" />
                                </radialGradient>
                                <linearGradient id="lg1">
                                    <stop offset="0" stop-color="#007842" />
                                    <stop offset=".1212" stop-color="#128341" />
                                    <stop offset=".3647" stop-color="#41a23d" />
                                    <stop offset=".7046" stop-color="#8cd238" />
                                    <stop offset="1" stop-color="#d3ff33" />
                                </linearGradient>
                                <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="-39.472" x2="631.876" xlink:href="#lg1" y1="480.757" y2="-190.59" />
                                <linearGradient id="SVGID_4_" gradientUnits="userSpaceOnUse" x1="-77.562" x2="590.901" xlink:href="#lg1" y1="690.735" y2="22.273" />
                                <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="-57.28" x2="614.222" xlink:href="#lg1" y1="598.296" y2="-73.206" />
                                <linearGradient id="lg2">
                                    <stop offset="0" stop-color="#ddff59" />
                                    <stop offset="1" stop-color="#fff" />
                                </linearGradient>
                                <linearGradient id="SVGID_6_" gradientUnits="userSpaceOnUse" x1="61.313" x2="206.846" xlink:href="#lg2" y1="184.847" y2="39.314" />
                                <linearGradient id="SVGID_7_" gradientUnits="userSpaceOnUse" x1="248.086" x2="383.546" xlink:href="#lg2" y1="225.046" y2="89.586" />
                                <linearGradient id="lg3">
                                    <stop offset="0" stop-color="#95e12e" />
                                    <stop offset=".8" stop-color="#ddff59" />
                                    <stop offset="1" stop-color="#e6fe7f" />
                                </linearGradient>
                                <linearGradient id="SVGID_8_" gradientUnits="userSpaceOnUse" x1="-77.985" x2="210.679" xlink:href="#lg3" y1="391.842" y2="103.177" />
                                <linearGradient id="SVGID_9_" gradientUnits="userSpaceOnUse" x1="-33.999" x2="160.703" xlink:href="#lg3" y1="320.558" y2="125.856" />
                                <linearGradient id="SVGID_10_" gradientUnits="userSpaceOnUse" x1="66.32" x2="329.734" xlink:href="#lg3" y1="230.87" y2="-32.544" />
                                <linearGradient id="SVGID_11_" gradientUnits="userSpaceOnUse" x1="-32.405" x2="159.256" xlink:href="#lg3" y1="393.506" y2="201.845" />
                                <linearGradient id="SVGID_12_" gradientUnits="userSpaceOnUse" x1="66.485" x2="326.251" xlink:href="#lg3" y1="305.562" y2="45.796" />
                                <linearGradient id="SVGID_13_" gradientUnits="userSpaceOnUse" x1="-77.822" x2="210.11" xlink:href="#lg3" y1="437.044" y2="149.113" />
                                <linearGradient id="SVGID_14_" gradientUnits="userSpaceOnUse" x1="-77.012" x2="209.717" xlink:href="#lg3" y1="481.828" y2="195.098" />
                                <linearGradient id="SVGID_15_" gradientUnits="userSpaceOnUse" x1="77.649" x2="214.05" xlink:href="#lg2" y1="473.938" y2="337.536" />
                                <linearGradient id="SVGID_16_" gradientUnits="userSpaceOnUse" x1="238.748" x2="384.65" xlink:href="#lg2" y1="538.555" y2="392.653" />
                                <linearGradient id="SVGID_17_" gradientUnits="userSpaceOnUse" x1="-1398.949" x2="485.55" xlink:href="#lg2" y1="1880.628" y2="-3.871" />
                                <linearGradient id="SVGID_18_" gradientUnits="userSpaceOnUse" x1="-100.776" x2="490.432" xlink:href="#lg1" y1="594.289" y2="3.081" />
                                <linearGradient id="SVGID_19_" gradientUnits="userSpaceOnUse" x1="-108.183" x2="489.408" xlink:href="#lg1" y1="696.489" y2="98.897" />
                                <linearGradient id="SVGID_20_" gradientUnits="userSpaceOnUse" x1="178.545" x2="823.665" xlink:href="#lg1" y1="314.303" y2="-330.818" />
                                <linearGradient id="SVGID_21_" gradientUnits="userSpaceOnUse" x1="148.993" x2="707.908" xlink:href="#lg1" y1="431.853" y2="-127.062" />
                                <linearGradient id="SVGID_22_" gradientUnits="userSpaceOnUse" x1="-96.604" x2="487.058" xlink:href="#lg1" y1="651.739" y2="68.078" />
                                <linearGradient id="SVGID_23_" gradientUnits="userSpaceOnUse" x1="-107.479" x2="488.646" xlink:href="#lg1" y1="756.381" y2="160.256" />
                                <linearGradient id="SVGID_24_" gradientUnits="userSpaceOnUse" x1="179.113" x2="814.17" xlink:href="#lg1" y1="375.394" y2="-259.663" />
                                <linearGradient id="SVGID_25_" gradientUnits="userSpaceOnUse" x1="149.316" x2="705.914" xlink:href="#lg1" y1="492.336" y2="-64.262" />
                                <linearGradient id="SVGID_26_" gradientUnits="userSpaceOnUse" x1="-110.18" x2="499.494" xlink:href="#lg1" y1="591.736" y2="-17.938" />
                                <linearGradient id="SVGID_27_" gradientUnits="userSpaceOnUse" x1="132.719" x2="590.796" xlink:href="#lg1" y1="348.781" y2="-109.296" />
                                <linearGradient id="SVGID_28_" gradientUnits="userSpaceOnUse" x1="105.628" x2="558.556" xlink:href="#lg1" y1="375.85" y2="-77.078" />
                                <g>
                                    <circle cx="256" cy="256" fill="url(#SVGID_1_)" r="256" />
                                    <circle cx="256" cy="256" fill="url(#SVGID_2_)" r="256" />
                                    <path d="m143.5 80.518c-12.41.571-22.862 11.26-23.273 23.73-.33 10.385-.627 20.77-.89 31.155 4.811 9.862 9.684 19.781 14.607 29.751-5.26 10.219-10.513 20.404-15.751 30.548-.064 5.025-.119 10.05-.167 15.075 5.021 9.979 10.086 20.01 15.182 30.083-5.152 10.115-10.28 20.19-15.372 30.216.144 45.559.941 91.119 2.391 136.678.411 12.469 10.863 23.159 23.273 23.73 30 1.346 60 2.115 90 2.307-.5-118.526-.5-237.053 0-355.579-30 .191-60 .96-90 2.306z" fill="url(#SVGID_3_)" />
                                    <path d="m368.5 81.239c-10-.513-20-.961-30-1.346 3 117.405 3 234.81 0 352.215 10-.384 20-.833 30-1.346 12.41-.653 22.907-11.355 23.364-23.762 3.598-100.667 3.598-201.333 0-302-.457-12.406-10.954-23.109-23.364-23.761z" fill="url(#SVGID_4_)" />
                                    <path d="m361.682 408.422c.292-10.431.553-20.861.785-31.292-5.009-2.357-10.028-4.736-15.055-7.134 5.118-2.668 10.242-5.338 15.37-8.007.294-15.141.526-30.283.694-45.424-5.082-2.44-10.169-4.897-15.262-7.367 5.135-2.596 10.271-5.188 15.409-7.774.126-15.141.189-30.283.189-45.424-10.25-20.188-20.612-40.543-30.997-60.997 10.056-20.211 19.969-40.277 29.651-60.133-.232-10.431-.493-20.861-.785-31.292-.364-12.526-10.772-23.196-23.182-23.685-35-1.346-70-1.906-105-1.682-12.411.081-22.596 10.567-22.727 23.276-.097 10.574-.184 21.148-.262 31.721 15.046 20.299 30.309 40.781 45.654 61.296-15.315 20.482-30.728 41.031-46.103 61.496 0 51.505.237 103.009.71 154.514.131 12.709 10.317 23.194 22.727 23.276 35 .224 70-.336 105-1.682 12.413-.49 22.82-11.159 23.184-23.686z" fill="url(#SVGID_5_)" />
                                    <path d="m150.409 102.992c-.1 4.199-3.561 7.716-7.738 7.868-4.176.152-7.471-3.103-7.353-7.282s3.591-7.718 7.748-7.889 7.442 3.105 7.343 7.303z" fill="url(#SVGID_6_)" />
                                    <path d="m376.773 104.247c.135 4.161-3.149 7.384-7.325 7.209-4.176-.174-7.649-3.696-7.766-7.879-.115-4.182 3.156-7.426 7.314-7.23 4.159.196 7.643 3.74 7.777 7.9z" fill="url(#SVGID_7_)" />
                                    <path d="m195.315 133.407c-.083 8.467-6.965 15.415-15.385 15.557-8.419.14-15.147-6.54-15.006-14.958.141-8.416 7.049-15.434 15.41-15.623 8.361-.19 15.063 6.559 14.981 15.024z" fill="url(#SVGID_8_)" />
                                    <path d="m103.171 177.25c.14-7.5.3-15 .479-22.5.1-4.14 3.597-7.627 7.8-7.779 7.614-.271 15.228-.52 22.841-.746-.254 12.618-.464 25.235-.631 37.853-7.656.148-15.312.311-22.968.488-4.227.098-7.599-3.176-7.521-7.316z" fill="url(#SVGID_9_)" />
                                    <path d="m118.194 195.701c.254-20.1.635-40.199 1.144-60.299 7.598-.283 15.196-.54 22.793-.773 4.195-.13 7.531 3.177 7.457 7.375-.273 15.199-.492 30.399-.656 45.598-.045 4.199-3.509 7.649-7.743 7.712-7.665.117-15.33.246-22.995.387z" fill="url(#SVGID_10_)" />
                                    <path d="m102.439 252.25c.007-7.5.033-15 .08-22.5.026-4.14 3.492-7.538 7.734-7.586 7.68-.084 15.361-.161 23.041-.231-.079 12.618-.114 25.236-.105 37.853-7.687-.008-15.375-.016-23.062-.026-4.246-.007-7.691-3.369-7.688-7.51z" fill="url(#SVGID_11_)" />
                                    <path d="m117.836 271.075c-.063-20.1 0-40.199.191-60.299 7.675-.106 15.35-.203 23.025-.29 4.238-.05 7.649 3.317 7.625 7.516-.091 15.199-.128 30.399-.109 45.598.004 4.199-3.428 7.59-7.672 7.572-7.687-.029-15.374-.062-23.06-.097z" fill="url(#SVGID_12_)" />
                                    <path d="m194.933 179.38c-.052 8.467-6.949 15.377-15.418 15.457-8.468.077-15.279-6.665-15.191-15.083.088-8.417 7.012-15.371 15.444-15.499 8.431-.128 15.215 6.659 15.165 15.125z" fill="url(#SVGID_13_)" />
                                    <path d="m194.727 225.352c-.021 8.466-6.911 15.34-15.402 15.357-8.49.016-15.362-6.79-15.326-15.208.035-8.417 6.951-15.308 15.427-15.374 8.476-.065 15.32 6.759 15.301 15.225z" fill="url(#SVGID_14_)" />
                                    <path d="m150.409 409.008c.099 4.198-3.186 7.475-7.343 7.303-4.157-.171-7.63-3.71-7.748-7.889-.118-4.18 3.177-7.434 7.353-7.282 4.176.153 7.637 3.669 7.738 7.868z" fill="url(#SVGID_15_)" />
                                    <path d="m376.773 407.753c-.133 4.161-3.619 7.705-7.777 7.9-4.158.196-7.43-3.048-7.314-7.23.116-4.184 3.589-7.704 7.766-7.879 4.176-.174 7.46 3.048 7.325 7.209z" fill="url(#SVGID_16_)" />
                                    <path d="m348.419 271.2c-40.993.144-81.985.199-122.978.166-8.489-.008-15.379-6.891-15.379-15.366 0-40.931.15-81.862.449-122.792.067-8.474 6.906-15.435 15.267-15.499 40.395-.299 80.789.2 121.184 1.496 8.36.274 15.314 7.309 15.505 15.665.897 40.377 1.345 80.753 1.345 121.13 0 8.356-6.904 15.164-15.393 15.2z" fill="url(#SVGID_17_)" />
                                    <path d="m163.999 286.499c-8.486-.045-15.335 6.711-15.273 15.1.036 5.066.079 10.133.128 15.199.083 8.388 7.019 15.318 15.469 15.449 15.305.229 30.61.395 45.915.499-.07-15.349-.119-30.698-.147-46.047-15.364-.042-30.728-.109-46.092-.2z" fill="url(#SVGID_18_)" />
                                    <path d="m348.365 286.399c-46.091.324-92.183.424-138.274.299-8.486-.02-15.349 6.814-15.315 15.274.02 5.108.043 10.216.069 15.324.046 8.46 6.944 15.389 15.393 15.449 45.915.312 91.83.062 137.744-.748 8.449-.155 15.399-7.077 15.494-15.432.056-5.047.105-10.094.147-15.141.072-8.356-6.772-15.078-15.258-15.025z" fill="url(#SVGID_19_)" />
                                    <path d="m164.076 301.748c.031 5.083.067 10.166.108 15.249 10.22.122 20.44.222 30.66.299 5.097-2.515 10.198-5.041 15.304-7.575-5.122-2.582-10.246-5.166-15.373-7.749-10.232-.058-20.466-.132-30.699-.224z" fill="url(#SVGID_20_)" />
                                    <path d="m348.274 301.598c-51.166.54-102.332.665-153.498.374.02 5.108.043 10.216.069 15.324 51.101.388 102.201.222 153.301-.499.049-5.066.091-10.132.128-15.199z" fill="url(#SVGID_21_)" />
                                    <path d="m164.493 347.496c-8.439-.146-15.182 6.511-15.037 14.9.085 5.067.176 10.133.273 15.199.166 8.389 7.097 15.416 15.458 15.648 15.148.411 30.296.71 45.444.897-.126-15.349-.231-30.698-.315-46.047-15.275-.123-30.549-.323-45.823-.597z" fill="url(#SVGID_22_)" />
                                    <path d="m347.782 347.197c-45.822.972-91.644 1.271-137.467.898-8.439-.066-15.226 6.714-15.147 15.174.046 5.108.095 10.216.147 15.324.092 8.459 6.954 15.444 15.315 15.548 45.444.561 90.888.112 136.332-1.346 8.36-.274 15.314-7.31 15.505-15.665.112-5.047.217-10.094.315-15.141.167-8.356-6.562-14.964-15-14.792z" fill="url(#SVGID_23_)" />
                                    <path d="m164.693 362.745c.072 5.083.149 10.166.231 15.249 10.13.244 20.261.443 30.391.598 5.039-2.477 10.086-4.969 15.141-7.475-5.09-2.61-10.186-5.227-15.288-7.849-10.158-.135-20.317-.309-30.475-.523z" fill="url(#SVGID_24_)" />
                                    <path d="m347.545 362.396c-50.792 1.26-101.585 1.551-152.377.872.046 5.108.095 10.216.147 15.324 50.652.776 101.304.443 151.956-.997.098-5.066.189-10.132.274-15.199z" fill="url(#SVGID_25_)" />
                                    <path d="m345.618 170.133c-1.825-1.827-3.65-3.656-5.474-5.486-.067-5.075-.14-10.15-.219-15.225-.066-4.203-3.53-7.697-7.731-7.792-30.435-.686-60.869-.997-91.304-.935-4.201.009-7.617 3.465-7.629 7.709-.013 5.124-.025 10.247-.036 15.371-1.804 1.817-3.609 3.635-5.416 5.454-1.437 1.447-2.249 3.405-2.255 5.442-.038 13.244-.067 26.488-.087 39.732-.003 2.037.803 3.99 2.242 5.428l5.426 5.426c-.004 5.124-.006 10.247-.008 15.371-.001 4.244 3.439 7.684 7.685 7.684 30.749-.004 61.497.017 92.246.062 4.245.005 7.684-3.398 7.675-7.601-.011-5.075-.028-10.15-.05-15.225 1.803-1.782 3.604-3.563 5.404-5.34 1.432-1.415 2.231-3.34 2.217-5.356-.085-13.101-.211-26.202-.377-39.302-.026-2.015-.857-3.962-2.309-5.417z" fill="url(#SVGID_26_)" />
                                    <path d="m263.757 156.09c-5.086-.018-10.171-.027-15.257-.027v76.875c25.615 0 51.229.052 76.843.156-.014-5.09-.033-10.181-.056-15.271-20.57-20.501-41.14-41.167-61.53-61.733z" fill="url(#SVGID_27_)" />
                                    <path d="m324.783 156.738c.243 20.362.411 40.723.505 61.084-16.965-.11-32.351-7.039-43.485-18.197-11.129-11.165-18.01-26.555-18.046-43.536 20.342.073 40.684.289 61.026.649z" fill="url(#SVGID_28_)" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(2) == 'master_control' ? 'class="active"' : 'class=""' ?>>
                        <a href="<?= base_url() ?>page/master_control">
                            <svg id="Capa_1" enable-background="new 0 0 512 512" height="32" viewBox="0 0 512 512" width="32" xmlns="https://www.w3.org/2000/svg">
                                <g>
                                    <g>
                                        <g>
                                            <path d="m24.701 198.789-22.725 39.769c-1.295 2.266-1.976 4.832-1.976 7.442v210c0 8.284 6.716 15 15 15h110v-295c0-8.284-6.716-15-15-15h-20.181c-26.846 0-51.798 14.48-65.118 37.789z" fill="#ffc89a" />
                                        </g>
                                        <g>
                                            <g>
                                                <path d="m385 512h-230c-24.853 0-45-20.147-45-45v-422c0-24.853 20.147-45 45-45h230c24.853 0 45 20.147 45 45v422c0 24.853-20.147 45-45 45z" fill="#0a617d" />
                                            </g>
                                        </g>
                                        <path d="m385 0h-115v512h115c24.853 0 45-20.147 45-45v-422c0-24.853-20.147-45-45-45z" fill="#08475e" />
                                        <g fill="#fab68c">
                                            <path d="m473.25 238.5h-64.5c-21.401 0-38.75-17.349-38.75-38.75 0-21.401 17.349-38.75 38.75-38.75h64.5c21.401 0 38.75 17.349 38.75 38.75 0 21.401-17.349 38.75-38.75 38.75z" />
                                            <path d="m473.25 316h-64.5c-21.401 0-38.75-17.349-38.75-38.75 0-21.401 17.349-38.75 38.75-38.75h64.5c21.401 0 38.75 17.349 38.75 38.75 0 21.401-17.349 38.75-38.75 38.75z" />
                                            <path d="m473.25 393.5h-64.5c-21.401 0-38.75-17.349-38.75-38.75 0-21.401 17.349-38.75 38.75-38.75h64.5c21.401 0 38.75 17.349 38.75 38.75 0 21.401-17.349 38.75-38.75 38.75z" />
                                            <path d="m473.25 471h-64.5c-21.401 0-38.75-17.349-38.75-38.75 0-21.401 17.349-38.75 38.75-38.75h64.5c21.401 0 38.75 17.349 38.75 38.75 0 21.401-17.349 38.75-38.75 38.75z" />
                                        </g>
                                        <g>
                                            <g>
                                                <path d="m270 266.5c-35.841 0-65-29.159-65-65s29.159-65 65-65 65 29.159 65 65-29.159 65-65 65z" fill="#ff6378" />
                                            </g>
                                            <circle cx="210" cy="80.5" fill="#ffe278" r="15" />
                                            <circle cx="270" cy="80.5" fill="#ff6378" r="15" />
                                            <circle cx="330" cy="80.5" fill="#00a763" r="15" />
                                            <g>
                                                <path d="m270 446.5c-35.841 0-65-29.159-65-65s29.159-65 65-65 65 29.159 65 65-29.159 65-65 65z" fill="#85dc1e" />
                                            </g>
                                        </g>
                                        <path d="m270 136.5v130c35.841 0 65-29.159 65-65s-29.159-65-65-65z" fill="#e20059" />
                                        <path d="m270 316.5v130c35.841 0 65-29.159 65-65s-29.159-65-65-65z" fill="#00a763" />
                                        <path d="m270 65.5v30c8.284 0 15-6.716 15-15s-6.716-15-15-15z" fill="#e20059" />
                                    </g>
                                    <path d="m110 331c29.677-8.903 50-36.218 50-67.201v-25.299h71.25c21.401 0 38.75-17.349 38.75-38.75 0-21.401-17.349-38.75-38.75-38.75h-141.431c-26.847 0-51.798 14.48-65.118 37.789l-22.725 39.769" fill="#ffc89a" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(1) == '' || $this->uri->segment(1) == 'dashboard' ? 'class="active"' : 'class=""' ?>>
                        <a href="<?= base_url() ?>dashboard">
                            <svg id="Capa_1" enable-background="new 0 0 510 510" height="32" viewBox="0 0 510 510" width="32" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                <linearGradient id="lg1">
                                    <stop offset="0" stop-color="#fee97d" />
                                    <stop offset="1" stop-color="#fac600" />
                                </linearGradient>
                                <linearGradient id="SVGID_1_" gradientUnits="userSpaceOnUse" x1="87.762" x2="451.413" xlink:href="#lg1" y1="87.762" y2="451.413" />
                                <linearGradient id="SVGID_2_" gradientUnits="userSpaceOnUse" x1="167.744" x2="297.383" xlink:href="#lg1" y1="167.747" y2="297.386" />
                                <linearGradient id="SVGID_3_" gradientUnits="userSpaceOnUse" x1="254.999" x2="254.999" y1="278.43" y2="435.373">
                                    <stop offset="0" stop-color="#fac600" stop-opacity="0" />
                                    <stop offset=".6899" stop-color="#d68c3d" stop-opacity=".69" />
                                    <stop offset="1" stop-color="#c5715a" />
                                </linearGradient>
                                <linearGradient id="SVGID_4_" gradientTransform="matrix(1 0 0 -1 -2915.099 -1821.068)" gradientUnits="userSpaceOnUse" x1="3156.286" x2="3199.1" xlink:href="#lg1" y1="-1852.51" y2="-1852.51" />
                                <linearGradient id="SVGID_5_" gradientUnits="userSpaceOnUse" x1="241.187" x2="284.001" xlink:href="#lg1" y1="478.558" y2="478.558" />
                                <linearGradient id="SVGID_6_" gradientTransform="matrix(.812 .584 .584 -.812 -695.716 -3491.914)" gradientUnits="userSpaceOnUse" x1="2945.763" x2="2988.577" xlink:href="#lg1" y1="-2263.235" y2="-2263.235" />
                                <linearGradient id="SVGID_7_" gradientTransform="matrix(.812 .584 -.584 .812 -3364.193 219.674)" gradientUnits="userSpaceOnUse" x1="2945.019" x2="2987.834" xlink:href="#lg1" y1="-1860.936" y2="-1860.936" />
                                <linearGradient id="SVGID_8_" gradientTransform="matrix(.318 .948 .948 -.318 2081.642 -3552.523)" gradientUnits="userSpaceOnUse" x1="3014.666" x2="3057.48" xlink:href="#lg1" y1="-2719.598" y2="-2719.598" />
                                <linearGradient id="SVGID_9_" gradientTransform="matrix(.318 .948 -.948 .318 -2251.856 -2097.374)" gradientUnits="userSpaceOnUse" x1="3013.922" x2="3056.736" xlink:href="#lg1" y1="-1404.573" y2="-1404.573" />
                                <linearGradient id="SVGID_10_" gradientTransform="matrix(-.812 .584 -.584 -.812 2269.716 -3491.914)" gradientUnits="userSpaceOnUse" x1="3809.561" x2="3852.375" xlink:href="#lg1" y1="-1641.987" y2="-1641.987" />
                                <linearGradient id="SVGID_11_" gradientTransform="matrix(-.812 .584 .584 .812 4938.192 219.674)" gradientUnits="userSpaceOnUse" x1="3808.817" x2="3851.631" xlink:href="#lg1" y1="-2482.184" y2="-2482.184" />
                                <linearGradient id="SVGID_12_" gradientTransform="matrix(-.318 .948 -.948 -.318 -507.642 -3552.523)" gradientUnits="userSpaceOnUse" x1="3353.198" x2="3396.012" xlink:href="#lg1" y1="-1710.89" y2="-1710.89" />
                                <linearGradient id="SVGID_13_" gradientTransform="matrix(-.318 .948 .948 .318 3825.856 -2097.374)" gradientUnits="userSpaceOnUse" x1="3352.454" x2="3395.268" xlink:href="#lg1" y1="-2413.282" y2="-2413.282" />
                                <linearGradient id="SVGID_14_" gradientUnits="userSpaceOnUse" x1="386.089" x2="170.089" y1="356.409" y2="213.075">
                                    <stop offset="0" stop-color="#f6a96c" stop-opacity="0" />
                                    <stop offset="1" stop-color="#c5715a" />
                                </linearGradient>
                                <linearGradient id="SVGID_15_" gradientUnits="userSpaceOnUse" x1="214.391" x2="313.617" y1="214.391" y2="313.617">
                                    <stop offset="0" stop-color="#eaf6ff" />
                                    <stop offset="1" stop-color="#b3dafe" />
                                </linearGradient>
                                <linearGradient id="lg2">
                                    <stop offset="0" stop-color="#d8ecfe" stop-opacity="0" />
                                    <stop offset=".7867" stop-color="#9bd1fe" stop-opacity=".787" />
                                    <stop offset="1" stop-color="#8ac9fe" />
                                </linearGradient>
                                <linearGradient id="SVGID_16_" gradientUnits="userSpaceOnUse" x1="328.35" x2="216.35" xlink:href="#lg2" y1="263.386" y2="250.886" />
                                <linearGradient id="SVGID_17_" gradientUnits="userSpaceOnUse" x1="262.829" x2="262.829" xlink:href="#lg2" y1="306.5" y2="353.268" />
                                <g>
                                    <g>
                                        <path d="m449.6 283.639-11.43 12.056c-8.632 9.104-12.697 21.616-11.064 34.056l2.16 16.456c2.881 21.951-11.924 42.316-33.693 46.346l-16.297 3.017c-12.36 2.288-23.025 10.04-29.015 21.091l-7.87 14.517c-10.564 19.486-34.544 27.276-54.542 17.718l-14.9-7.121c-11.351-5.425-24.547-5.425-35.897 0l-14.899 7.121c-19.998 9.558-43.978 1.768-54.542-17.718l-7.87-14.517c-5.991-11.051-16.655-18.803-29.015-21.091l-16.297-3.017c-21.769-4.03-36.574-24.395-33.693-46.346l2.16-16.455c1.633-12.439-2.432-24.951-11.064-34.056l-11.432-12.057c-15.224-16.058-15.224-41.22 0-57.278l11.43-12.056c8.632-9.104 12.697-21.616 11.064-34.056l-2.16-16.456c-2.881-21.95 11.924-42.316 33.693-46.346l16.297-3.017c12.36-2.288 23.025-10.04 29.015-21.091l7.87-14.517c10.564-19.486 34.544-27.276 54.542-17.718l14.9 7.121c11.351 5.425 24.547 5.425 35.897 0l14.899-7.121c19.998-9.558 43.978-1.768 54.542 17.718l7.87 14.517c5.991 11.051 16.655 18.803 29.015 21.091l16.297 3.017c21.769 4.03 36.574 24.395 33.693 46.346l-2.16 16.455c-1.633 12.439 2.432 24.951 11.064 34.056l11.43 12.056c15.226 16.059 15.226 41.221.002 57.279z" fill="url(#SVGID_1_)" />
                                        <circle cx="254.999" cy="255.002" fill="url(#SVGID_2_)" r="157.803" />
                                    </g>
                                    <path d="m97.196 255.002c0 87.152 70.651 157.803 157.803 157.803s157.803-70.651 157.803-157.803c0-.811-.019-1.618-.031-2.426h-315.544c-.012.808-.031 1.615-.031 2.426z" fill="url(#SVGID_3_)" />
                                    <g>
                                        <g>
                                            <g>
                                                <path d="m255 0c-8.514 0-15.415 6.902-15.415 15.415v32.055c0 8.514 6.902 15.415 15.415 15.415 8.514 0 15.415-6.902 15.415-15.415v-32.055c0-8.513-6.901-15.415-15.415-15.415z" fill="url(#SVGID_4_)" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="m255 510c-8.514 0-15.415-6.902-15.415-15.415v-32.055c0-8.514 6.902-15.415 15.415-15.415 8.514 0 15.415 6.902 15.415 15.415v32.055c0 8.513-6.901 15.415-15.415 15.415z" fill="url(#SVGID_5_)" />
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <g>
                                                <path d="m403.889 47.981c-6.912-4.971-16.544-3.398-21.515 3.514l-18.716 26.024c-4.971 6.912-3.398 16.544 3.514 21.515 6.912 4.971 16.544 3.398 21.515-3.514l18.716-26.024c4.971-6.912 3.398-16.544-3.514-21.515z" fill="url(#SVGID_6_)" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="m106.111 462.019c-6.912-4.971-8.485-14.604-3.514-21.515l18.716-26.024c4.971-6.912 14.604-8.485 21.515-3.514 6.912 4.971 8.485 14.604 3.514 21.515l-18.716 26.024c-4.971 6.912-14.604 8.485-21.515 3.514z" fill="url(#SVGID_7_)" />
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <g>
                                                <path d="m496.749 173.867c-2.709-8.071-11.448-12.418-19.519-9.71l-30.389 10.199c-8.071 2.709-12.418 11.448-9.71 19.519 2.709 8.071 11.448 12.418 19.519 9.709l30.389-10.199c8.071-2.708 12.418-11.447 9.71-19.518z" fill="url(#SVGID_8_)" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="m13.251 336.133c-2.709-8.071 1.638-16.81 9.709-19.519l30.389-10.199c8.071-2.709 16.81 1.638 19.519 9.709 2.709 8.071-1.638 16.81-9.709 19.519l-30.389 10.2c-8.071 2.708-16.81-1.639-19.519-9.71z" fill="url(#SVGID_9_)" />
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <g>
                                                <path d="m106.111 47.981c6.912-4.971 16.544-3.398 21.515 3.514l18.716 26.024c4.971 6.912 3.398 16.544-3.514 21.515-6.912 4.971-16.544 3.398-21.515-3.514l-18.716-26.024c-4.971-6.912-3.398-16.544 3.514-21.515z" fill="url(#SVGID_10_)" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="m403.889 462.019c6.912-4.971 8.485-14.604 3.514-21.515l-18.716-26.024c-4.971-6.912-14.604-8.485-21.515-3.514-6.912 4.971-8.485 14.604-3.514 21.515l18.716 26.024c4.971 6.912 14.604 8.485 21.515 3.514z" fill="url(#SVGID_11_)" />
                                            </g>
                                        </g>
                                    </g>
                                    <g>
                                        <g>
                                            <g>
                                                <path d="m13.251 173.867c2.709-8.071 11.448-12.418 19.519-9.71l30.389 10.199c8.071 2.709 12.418 11.448 9.709 19.519-2.709 8.071-11.448 12.418-19.519 9.709l-30.389-10.199c-8.07-2.708-12.417-11.447-9.709-19.518z" fill="url(#SVGID_12_)" />
                                            </g>
                                        </g>
                                        <g>
                                            <g>
                                                <path d="m496.749 336.133c2.709-8.071-1.638-16.81-9.709-19.519l-30.389-10.199c-8.071-2.709-16.81 1.638-19.519 9.709-2.709 8.071 1.638 16.81 9.71 19.519l30.389 10.199c8.07 2.709 16.809-1.638 19.518-9.709z" fill="url(#SVGID_13_)" />
                                            </g>
                                        </g>
                                    </g>
                                    <path d="m379.275 395.569 16.297-3.017c21.769-4.031 36.574-24.396 33.693-46.346l-2.16-16.456c-1.051-8.005.271-16.035 3.638-23.174l-157.16-157.16-84.25 118.167 47.25 47.25 4.232 49.174 84.229 84.229c7.123-3.709 13.246-9.499 17.345-17.06l7.87-14.517c5.992-11.05 16.656-18.801 29.016-21.09z" fill="url(#SVGID_14_)" />
                                    <g>
                                        <path d="m314.182 239.75h-29.613c-5.156 0-9.335-4.18-9.335-9.335v-75.682c0-9.259-12.027-12.87-17.127-5.142l-70.081 106.183c-4.096 6.207.355 14.478 7.791 14.478h29.613c5.156 0 9.335 4.18 9.335 9.335v75.682c0 9.259 12.027 12.87 17.127 5.142l70.081-106.183c4.097-6.207-.354-14.478-7.791-14.478z" fill="url(#SVGID_15_)" />
                                        <path d="m321.975 254.225-70.082 106.184c-2.69 4.078-7.312 4.998-11.078 3.598l29.392-90.862c2.483-7.676-3.24-15.542-11.307-15.542h-7.979c-8.015 0-13.732-7.772-11.345-15.423l29.961-96.043c3.199 1.33 5.698 4.379 5.698 8.596v75.682c0 5.154 4.177 9.337 9.337 9.337h29.612c7.433-.001 11.887 8.266 7.791 14.473z" fill="url(#SVGID_16_)" />
                                        <path d="m234.766 301.322v53.946c0 9.259 12.027 12.87 17.127 5.142l38.998-59.088z" fill="url(#SVGID_17_)" />
                                    </g>
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(2) == 'battery_scanner' ? 'class="active"' : 'class=""' ?>>
                        <a href="<?= base_url() ?>page/battery_scanner">
                            <svg height="32" viewBox="0 0 512 512" width="32" xmlns="https://www.w3.org/2000/svg" xmlns:xlink="https://www.w3.org/1999/xlink">
                                <linearGradient id="a" gradientTransform="matrix(1 0 0 -1 0 -18006)" gradientUnits="userSpaceOnUse" x1="0" x2="512" y1="-18262" y2="-18262">
                                    <stop offset="0" stop-color="#00f38d" />
                                    <stop offset="1" stop-color="#009eff" />
                                </linearGradient>
                                <path d="m512 256c0 141.386719-114.613281 256-256 256s-256-114.613281-256-256 114.613281-256 256-256 256 114.613281 256 256zm0 0" fill="url(#a)" />
                                <g fill="#fff">
                                    <path d="m207.855469 100.414062h-107.441407v107.441407h107.441407zm-30 77.441407h-47.441407v-47.441407h47.441407zm0 0" />
                                    <path d="m142.222656 142.222656h23.828125v23.828125h-23.828125zm0 0" />
                                    <path d="m304.144531 100.414062v107.441407h107.441407v-107.441407zm77.441407 77.441407h-47.441407v-47.441407h47.441407zm0 0" />
                                    <path d="m345.949219 142.222656h23.828125v23.828125h-23.828125zm0 0" />
                                    <path d="m100.414062 411.585938h107.441407v-107.441407h-107.441407zm30-77.441407h47.441407v47.441407h-47.441407zm0 0" />
                                    <path d="m142.222656 345.949219h23.828125v23.828125h-23.828125zm0 0" />
                                    <path d="m127.328125 220.855469h23.828125v23.828125h-23.828125zm0 0" />
                                    <path d="m151.15625 268.511719h23.234375v23.828125h23.828125v-23.828125h-23.234375v-23.828125h-23.828125zm0 0" />
                                    <path d="m270.296875 149.367188h23.828125v23.828124h-23.828125zm0 0" />
                                    <path d="m222.640625 127.328125h23.828125v45.867187h-23.828125zm0 0" />
                                    <path d="m246.46875 103.5h23.828125v23.828125h-23.828125zm0 0" />
                                    <path d="m246.46875 173.195312v23.828126h-23.828125v23.832031h47.65625v-47.660157zm0 0" />
                                    <path d="m246.46875 292.339844v23.230468h23.828125v23.234376h47.65625v-23.828126h-47.65625v-23.234374h-23.828125v-47.058594h-23.828125v47.65625zm0 0" />
                                    <path d="m270.296875 220.855469h23.828125v47.65625h-23.828125zm0 0" />
                                    <path d="m384.671875 220.855469h-43.484375v23.828125h-23.234375v23.828125h23.828125v23.230469h66.71875v-47.65625h-23.828125zm0 47.058593h-42.890625v-23.230468h42.890625zm0 0" />
                                    <path d="m384.671875 314.976562h23.828125v47.65625h-23.828125zm0 0" />
                                    <path d="m294.125 268.511719h23.828125v23.828125h-23.828125zm0 0" />
                                    <path d="m317.953125 338.804688h23.828125v23.828124h-23.828125zm0 0" />
                                    <path d="m341.78125 314.976562h23.828125v23.828126h-23.828125zm0 0" />
                                    <path d="m365.609375 408.5v-22.039062h19.0625v-23.828126h-42.890625v45.867188zm0 0" />
                                    <path d="m222.640625 315.570312h23.828125v45.273438h-23.828125zm0 0" />
                                    <path d="m270.296875 408.5v-23.828125h23.230469v23.828125h23.828125v-23.828125h-23.230469v-23.828125h-47.65625v47.65625zm0 0" />
                                    <path d="m174.984375 220.855469h47.65625v23.828125h-47.65625zm0 0" />
                                    <path d="m103.5 244.683594h23.828125v47.65625h-23.828125zm0 0" />
                                </g>
                            </svg>
                        </a>
                    </li>
                    <li <?= $this->uri->segment(1) == 'setting' ? 'class="active"' : 'class=""' ?>>
                        <a href="<?= base_url() ?>setting">
                            <svg id="Capa_1" enable-background="new 0 0 512 512" height="32" viewBox="0 0 512 512" width="32" xmlns="https://www.w3.org/2000/svg">
                                <path d="m512 255.63v.37c0 8.6-.43 17.11-1.26 25.5-1.88 19.03-5.84 37.44-11.66 55.01-29.69 89.69-107.63 157.41-203.08 172.38-12.71 1.99-25.74 3.05-39 3.1-.33.01-.67.01-1 .01-2.34 0-4.67-.03-7-.09-12.18-.33-24.14-1.5-35.84-3.48-120.98-20.38-213.16-125.65-213.16-252.43 0-141.38 114.62-256 256-256 131.21 0 239.37 98.72 254.25 225.93 1.14 9.74 1.74 19.65 1.75 29.7z" fill="#fd9e27" />
                                <path d="m512 255.63v.37c0 8.6-.43 17.11-1.26 25.5-1.88 19.03-5.84 37.44-11.66 55.01-29.69 89.69-107.63 157.41-203.08 172.38-12.71 1.99-25.74 3.05-39 3.1-.33.01-.67.01-1 .01-2.34 0-4.67-.03-7-.09-12.18-.33-24.14-1.5-35.84-3.48-.15-.15-141.45-141.45-141.45-141.45l13.16-62.03 26.49-52.38h34.8l47.98-29.27-38.7-38.72 202.36-102.44s74.33 74.32 74.5 74.48l10.26 1.62 67.69 67.69c1.14 9.74 1.74 19.65 1.75 29.7z" fill="#da7d00" />
                                <path d="m226.143 174.795v72.159 6.275 150h60v-150-6.275-72.159z" fill="#06465e" />
                                <path d="m256 174.795v228.434h30.143v-150-6.275-72.159z" fill="#022b3a" />
                                <path d="m403.037 202.476v43.805h-39.967v25.368h39.967 24.949.419v-69.173z" fill="#06465e" />
                                <path d="m434.377 151.817-6.821 15.752-2.619 6.049c2.934 2.568 4.799 6.33 4.799 10.526 0 7.72-6.28 14-14 14s-14-6.281-14-14c0-4.196 1.865-7.958 4.799-10.526l-2.619-6.049-6.821-15.752c-11.162 6.462-18.693 18.527-18.693 32.326 0 20.586 16.748 37.334 37.334 37.334s37.334-16.748 37.334-37.334c0-13.798-7.531-25.864-18.693-32.326z" fill="#eaeaea" />
                                <path d="m110.238 321.74v-43.805h39.968v-25.368h-39.968-24.948-.419v69.173z" fill="#06465e" />
                                <g fill="#fff">
                                    <circle cx="97.54" cy="265.086" r="18.667" />
                                    <path d="m78.899 372.399 6.821-15.751 2.619-6.049c-2.934-2.568-4.799-6.33-4.799-10.526 0-7.72 6.28-14 14-14s14 6.281 14 14c0 4.196-1.865 7.958-4.799 10.526l2.619 6.049 6.821 15.751c11.162-6.462 18.693-18.527 18.693-32.326 0-20.586-16.748-37.334-37.334-37.334s-37.334 16.748-37.334 37.334c0 13.798 7.531 25.864 18.693 32.326z" />
                                    <path d="m336.143 192.881h-160c-16.569 0-30-13.431-30-30v-60c0-16.569 13.431-30 30-30h160c16.569 0 30 13.431 30 30v60c0 16.569-13.431 30-30 30z" />
                                </g>
                                <path d="m336.143 72.881h-80.143v120h80.143c16.568 0 30-13.431 30-30v-60c0-16.568-13.431-30-30-30z" fill="#eaeaea" />
                                <path d="m336.143 353.295h-160c-16.569 0-30-13.431-30-30v-70c0-16.569 13.431-30 30-30h160c16.569 0 30 13.431 30 30v70c0 16.569-13.431 30-30 30z" fill="#fff" />
                                <path d="m336.143 223.295h-80.143v130h80.143c16.568 0 30-13.432 30-30v-70c0-16.568-13.431-30-30-30z" fill="#eaeaea" />
                                <path d="m333.748 429.119h-154.11c-12.672 0-22.945-10.273-22.945-22.945 0-12.672 10.273-22.945 22.945-22.945h154.11c12.672 0 22.945 10.273 22.945 22.945-.001 12.672-10.273 22.945-22.945 22.945z" fill="#fff" />
                                <path d="m333.748 383.229h-77.748v45.89h77.748c12.672 0 22.945-10.273 22.945-22.945-.001-12.672-10.273-22.945-22.945-22.945z" fill="#eaeaea" />
                                <circle cx="306.143" cy="132.881" fill="#06465e" r="27.5" />
                                <path d="m306.144 172.881c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.945 40-40 40zm0-55c-8.271 0-15 6.729-15 15s6.729 15 15 15 15-6.729 15-15-6.729-15-15-15z" fill="#2284ec" />
                                <circle cx="206.143" cy="132.881" fill="#06465e" r="27.5" />
                                <path d="m206.144 172.881c-22.056 0-40-17.944-40-40s17.944-40 40-40 40 17.944 40 40-17.945 40-40 40zm0-55c-8.271 0-15 6.729-15 15s6.729 15 15 15 15-6.729 15-15-6.729-15-15-15z" fill="#27ade5" />
                            </svg>
                        </a>
                    </li>
                </ul>
                <!-- # Footer Two Layout End-->
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
    <script src="<?= base_url() ?>assets/js/jquery.counterup.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.countdown.min.js"></script>
    <script src="<?= base_url() ?>assets/js/imagesloaded.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/js/isotope.pkgd.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.magnific-popup.min.js"></script>
    <script src="<?= base_url() ?>assets/js/default/dark-mode-switch.js"></script>
    <script src="<?= base_url() ?>assets/js/ion.rangeSlider.min.js"></script>
    <script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js"></script>
    <script src="<?= base_url() ?>assets/js/default/active.js"></script>
    <script src="<?= base_url() ?>assets/js/default/clipboard.js"></script>

    <?php
    $data_user = [
        'status' => true,
        'message' => 'success',
        'id_user' => $this->fungsi->user_login()->id_user,
        'nama' => $this->fungsi->user_login()->nama,
        'email' => $this->fungsi->user_login()->email,
        'shared_key' => $this->fungsi->user_login()->shared_key,
    ];


    ?>
    <script>
        $(document).ready(function() {
            if (window.ReactNativeWebView) {
                window.ReactNativeWebView.postMessage('<?= json_encode($data_user) ?>')
            }
        });
    </script>
    <!-- PWA-->
    <!-- <script src="<?= base_url() ?>assets/js/pwa.js"></script> -->

</body>

</html>