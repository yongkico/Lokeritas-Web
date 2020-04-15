<?php
session_start();
require("functions.php");


?>
<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Jobya - Responsive Job Board HTML Template</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Themesdesign" />

    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />

    <link rel="stylesheet" type="text/css" href="css/fontawesome.css" />

    <!-- selectize css -->
    <link rel="stylesheet" type="text/css" href="css/selectize.css" />

    <link rel="stylesheet" type="text/css" href="css/nice-select.css" />

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />

</head>

<body>
    <!-- Loader -->
    <div id="preloader">
        <div id="status">
            <div class="spinner">
                <div class="double-bounce1"></div>
                <div class="double-bounce2"></div>
            </div>
        </div>
    </div>
    <!-- Loader -->

    <?php if (isset($_SESSION["login"])) : ?>
        <?php
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
        $row = mysqli_fetch_assoc($result);
        ?>
        <!-- Navigation Bar-->
        <header id="topnav" class="defaultscroll scroll-active">

            <!-- Menu Start -->
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a href="#" class="logo">
                        <img src="images/logo-lokeritas2.png" alt="" class="logo-light" height="24" />
                        <img src="images/logo-lokeritas1.png" alt="" class="logo-dark" height="24" />
                    </a>
                </div>
                <!--end login button-->
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li><a href="index.php">Beranda</a></li>
                        <li><a href="lowongan.php">Lowongan</a></li>
                        <li><a href="tips-karir.php">Tips Karir</a></li>
                        <li><a href="daftar-perusahaan.php">Daftar Perusahaan</a></li>
                        <li><a href="karyaku.php">Karyaku</a></li>
                        <li><a href="#" style="font-size: 30px">|</a></li>
                        <li class="has-submenu">
                            <a href="#"><i class="mdi mdi-account mr-2" style="color: gray; font-size:16px"></i><?= $row["nama"]; ?></a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="profile.php">Profil</a></li>
                                <li><a href="lamaran-dikirim.php">Lamaran dikirim</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                    <!--end navigation menu-->
                </div>
                <!--end navigation-->
            </div>
            <!--end container-->
            <!--end end-->
        </header>
        <!--end header-->
        <!-- Navbar End -->
    <?php else : ?>
        <!-- Navigation Bar-->
        <header id="topnav" class="defaultscroll scroll-active">

            <!-- Menu Start -->
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a href="index.html" class="logo">
                        <img src="images/logo-light.png" alt="" class="logo-light" height="18" />
                        <img src="images/logo-dark.png" alt="" class="logo-dark" height="18" />
                    </a>
                </div>
                <!-- <div class="buy-button">
                <a href="post-a-job.html" class="btn btn-primary"><i class="mdi mdi-cloud-upload"></i> Post a Job</a>
            </div> -->
                <!--end login button-->
                <!-- End Logo container-->
                <div class="menu-extras">
                    <div class="menu-item">
                        <!-- Mobile menu toggle-->
                        <a class="navbar-toggle">
                            <div class="lines">
                                <span></span>
                                <span></span>
                                <span></span>
                            </div>
                        </a>
                        <!-- End mobile menu toggle-->
                    </div>
                </div>

                <div id="navigation">
                    <!-- Navigation Menu-->
                    <ul class="navigation-menu">
                        <li><a href="contact.html">Cari Lowongan</a></li>
                        <li><a href="index.html">Tips Karir</a></li>
                        <li><a href="contact.html">Daftar Perusahaan</a></li>
                        <li><a href="index.html">Karyaku</a></li>
                        <div class="buy-button">
                            <a href="login.php" class="btn btn-primary">Masuk</a>
                            <a href="register.php" class="btn btn-primary">Daftar</a>
                        </div>
                    </ul>
                    <!--end navigation menu-->
                </div>
                <!--end navigation-->
            </div>
            <!--end container-->
            <!--end end-->
        </header>
        <!--end header-->
        <!-- Navbar End -->
    <?php endif; ?>

    <!-- Start home -->
    <section class="bg-half page-next-level" style="padding:140px 0px 30px 0px;background: url('https://www.expatica.com/app/uploads/2018/11/Networking-1-1920x1080.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="candidates-profile-details text-center">
                        <img src="https://s2.bukalapak.com/img/7620068213/w-1000/CETAK_FOTO_dan_PAS_FOTO_.png" height="150" alt="" class="d-block mx-auto shadow rounded-pill mb-4">
                        <h5 class="text-white mb-2">Samsul Sinaga</h5>
                        <span class="badge badge-secondary" style="font-size: 15px;padding:10px 15px 10px 15px"> samsul@gmail.com &nbsp;|&nbsp; 081212120098 </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- CANDIDATES PROFILE START -->
    <section class="section" style="padding:30px 0px 40px 0px">
        <div class="container">

            <!-- Profile Box -->

            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <div class="row" style="margin:20px 0px 20px 0px">
                                <div class="col-lg-10">
                                    <h4 class="text-info">Informasi Pribadi :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table border-top" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">Nama</td>
                                        <td>Samsul Sinaga</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Ringkasan Pribadi</td>
                                        <td>"Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami"</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Email</td>
                                        <td>samsulsin@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Nomor HP</td>
                                        <td>081244169912</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Jenis Kelamin</td>
                                        <td>Pria</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Tanggal Lahir</td>
                                        <td>22 Jan 1999</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Status</td>
                                        <td>Belum Menikah</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Alamat</td>
                                        <td>Jl. Sehati, Gg. Dame, No.12, Kec. Medan Timur, Kota Medan, Sumatera Utara</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Mencari Pekerjaan</td>
                                        <td><span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> Ya </span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12" style="padding-bottom:0px;margin-top:30px">
                    <h4 class="text-dark">Rincian Disabilitas :</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">Jenis Disabilitas</td>
                                        <td>Tuna Daksa</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Alat Bantu</td>
                                        <td>Kursi Roda</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Penjelasan</td>
                                        <td>Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami. Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12" style="padding-bottom:0px;margin-top:30px">
                    <h4 class="text-dark">Pendidikan Terakhir :</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">2012 - 2016</td>
                                        <td>S1 Jurusan DKV - USU</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12" style="padding-bottom:0px;margin-top:30px">
                    <h4 class="text-dark">Pengalaman Bekerja :</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">2016 - 2017</td>
                                        <td>PT. Doorjek Indonesia - User Interface Design</td>
                                    </tr>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">2017</td>
                                        <td>UD. Sempurna Printing - Desain Grafis</td>
                                    </tr>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">2017 - 2020</td>
                                        <td>Unitech Garuda - UI/UX Design</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12" style="padding-bottom:0px;margin-top:30px">
                    <h4 class="text-dark">Keterampilan :</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <table class="table" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold;padding-top:20px">
                                            <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> Desain Grafis </span>
                                            <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> UI/UX Design </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12" style="padding-bottom:0px;margin-top:30px">
                    <h4 class="text-dark">Karir yang Diminati :</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold;padding-top:20px">
                                            <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> Desain dan Arsitektur </span>
                                            <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> Editing, Media dan Informasi </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12" style="padding-bottom:0px;margin-top:30px">
                    <h4 class="text-dark">CV/Resume :</h4>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold;padding-top:20px">
                                            <a href="#" class="btn btn-info"> Resume </a> &nbsp; &nbsp; <a href="#" class="btn btn-primary"> Upload CV </a>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->


        </div>
    </section>
    <!-- CANDIDATES PROFILE END -->

    <!-- footer start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                    <a href="javascript:void(0)"><img src="images/logo-light.png" height="20" alt=""></a>
                    <p class="mt-4">Lokeritas adalah media penyedia lowongan kerja khusus penyandang disabilitas di Sumatera Utara</p>
                    <a href="#" class="logo">
                        <img src="images/logo-lokeritas2.png" alt="" class="logo-light" height="38" />
                    </a>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Lokeritas</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="about.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Tentang</a></li>
                        <li><a href="mitra.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Mitra</a></li>
                        <li><a href="hubungi-kami.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Hubungi Kami</a></li>
                        <li><a href="kebijakan-privasi.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Kebijakan Privasi</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Unduh Aplikasi Lokeritas</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Lainnya</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="tips-karir.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Tips Karir</a></li>
                        <li><a href="karyaku.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Karyaku</a></li>
                        <li><a href="lamaran-dikirim.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Lamaran Dikirim</a></li>
                        <li><a href="lowongan.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Lowongan Terbaru</a></li>
                        <li><a href="faq.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> F.A.Q.</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title f-17">Lihat Kami di</p>
                    <ul class="social-icon social list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-instagram"></i></a></li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <hr>
    <footer class="footer footer-bar">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="">
                        <p class="mb-0">©2020 Design with <i class="mdi mdi-heart text-danger"></i> by Stucklabs.</p>
                    </div>
                </div>
            </div>
        </div>
        <!--end container-->
    </footer>
    <!--end footer-->
    <!-- Footer End -->

    <!-- Back to top -->
    <a href="#" class="back-to-top rounded text-center" id="back-to-top">
        <i class="mdi mdi-chevron-up d-block"> </i>
    </a>
    <!-- Back to top -->

    <!-- javascript -->
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/plugins.js"></script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="assets/ckeditor/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('lamaran');
    </script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>
</body>

</html>