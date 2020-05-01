<?php
session_start();
require("functions.php");


?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lokeritas - Lowongan Kerja Disabilitas Sumatera Utara</title>
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
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
        $row = mysqli_fetch_assoc($result);
        ?>
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
                        <li><a href="#">Beranda</a></li>
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
                        <li><a href="lowongan.php">Cari Lowongan</a></li>
                        <li><a href="tips-karir.php">Tips Karir</a></li>
                        <li><a href="daftar-perusahaan.php">Daftar Perusahaan</a></li>
                        <li><a href="karyaku.php">Karyaku</a></li>
                        <div class="buy-button">
                            <a href="login.php" class="btn btn-primary" style="margin-right: 10px ! important">Masuk</a>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pilihanDaftar">Daftar</a>
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
    <section class="bg-half page-next-level" style="padding: 120px 0px 50px 0px;background: url('images/bg-2.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h4 class="text-uppercase title mb-4">Tips Karir</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- BLOG LIST START -->
    <section class="section" style="padding:30px 0px 40px 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 order-2 order-md-1 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="sidebar mt-sm-30 p-4 rounded shadow">
                        <!-- SEARCH -->
                        <div class="widget mb-4 pb-2">
                            <div id="search2" class="widget-search mb-0">
                                <form role="search" method="get" id="searchform" class="searchform">
                                    <div>
                                        <input type="text" class="border rounded" name="s" id="s" placeholder="Cari Keywords...">
                                        <input type="submit" id="searchsubmit" value="Search">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- SEARCH -->

                        <!-- CATAGORIES -->
                        <div class="widget mb-4 pb-2">
                            <h4 class="widget-title">Kategori</h4>
                            <ul class="list-unstyled mt-4 mb-0 catagories">
                                <li><a href="jvascript:void(0)">Keuangan</a> <span class="float-right">13</span></li>
                                <li><a href="jvascript:void(0)">Bisnis</a> <span class="float-right">09</span></li>
                                <li><a href="jvascript:void(0)">Blog</a> <span class="float-right">18</span></li>
                                <li><a href="jvascript:void(0)">Investasi</a> <span class="float-right">20</span></li>
                                <li><a href="jvascript:void(0)">Prestasi</a> <span class="float-right">22</span></li>
                            </ul>
                        </div>
                        <!-- CATAGORIES -->

                        <!-- RECENT POST -->
                        <div class="widget mb-4 pb-2">
                            <h4 class="widget-title">Post Terbaru</h4>
                            <div class="mt-4">
                                <div class="clearfix post-recent">
                                    <div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="https://3.bp.blogspot.com/-bwglrylRsGE/VFw2u5RigDI/AAAAAAAAAEM/nHzodiYd5kU/s1600/02.jpg" class="img-fluid rounded"></a></div>
                                    <div class="post-recent-content float-left"><a href="jvascript:void(0)">Consultant Business</a><span class="text-muted mt-2">15th June, 2019</span></div>
                                </div>
                                <div class="clearfix post-recent">
                                    <div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="https://3.bp.blogspot.com/-bwglrylRsGE/VFw2u5RigDI/AAAAAAAAAEM/nHzodiYd5kU/s1600/02.jpg" class="img-fluid rounded"></a></div>
                                    <div class="post-recent-content float-left"><a href="jvascript:void(0)">Look On The Glorious Balance</a> <span class="text-muted mt-2">15th June, 2019</span></div>
                                </div>
                                <div class="clearfix post-recent">
                                    <div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="https://3.bp.blogspot.com/-bwglrylRsGE/VFw2u5RigDI/AAAAAAAAAEM/nHzodiYd5kU/s1600/02.jpg" class="img-fluid rounded"></a></div>
                                    <div class="post-recent-content float-left"><a href="jvascript:void(0)">Research Financial.</a> <span class="text-muted mt-2">15th June, 2019</span></div>
                                </div>
                            </div>
                        </div>
                        <!-- RECENT POST -->
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-8 col-md-6 col-12 order-1 order-md-2">
                    <div class="shadow rounded p-4">
                        <div class="blog-details-img">
                            <img src="https://3.bp.blogspot.com/-bwglrylRsGE/VFw2u5RigDI/AAAAAAAAAEM/nHzodiYd5kU/s1600/02.jpg" style="width: 680px" alt="" class="img-fluid mx-auto rounded d-block">
                        </div>
                        <div class="blog-details meta mt-3">
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item mr-4">
                                    <p class="text-muted mb-0"><i class="mdi mdi-calendar-range mr-1"></i>22 Maret 2020</p>
                                </li>

                                <li class="list-inline-item mr-4">
                                    <p class="text-muted mb-0"><i class="mdi mdi-pencil mr-1"></i>Bagus Saragih</p>
                                </li>

                            </ul>
                        </div>

                        <div class="blog-details-desc p-2">
                            <h5 class="mb-3"><a href="#" class="text-dark">Desain : Hobi dan Pekerjaanku</a></h5>

                            <p class="text-muted mb-3 f-13" style="text-align: justify">Selama ini banyak yang menganggap bahwa weekend atau akhir pekan adalah saat yang tepat untuk “melupakan “ sejenak rutinitas kerja sehari-hari selama satu minggu penuh, bersenang-senang, mungkin ini cara yang tepat bagi kalian yang tidak sepenuhnya mencintai dan menyukai pekerjaan mereka, lalu bagaimana dengan kalian yang menyukai pekerjaan anda dan siapa tahu weekend dapat memberikan pandangan lain untuk memaksimalkan karir kalian. Pertimbangkan ini, akhir pekan adalah waktu yang menyenangkan pula untuk meningkatkan karir kalian. Sebelum kalian berpikir bahwa akan sangat merepotkan dan tidak menyenangkannya memikirkan pekerjaan pada saat akhir pekan, berikut ada hal-hal yang bisa dilakukan untuk fokus pada hal yang penting pada karir atau impian yang sedang kalian wujudkan.</p>
                            <p class="text-muted mb-3 f-13" style="text-align: justify">Selama ini banyak yang menganggap bahwa weekend atau akhir pekan adalah saat yang tepat untuk “melupakan “ sejenak rutinitas kerja sehari-hari selama satu minggu penuh, bersenang-senang, mungkin ini cara yang tepat bagi kalian yang tidak sepenuhnya mencintai dan menyukai pekerjaan mereka, lalu bagaimana dengan kalian yang menyukai pekerjaan anda dan siapa tahu weekend dapat memberikan pandangan lain untuk memaksimalkan karir kalian. Pertimbangkan ini, akhir pekan adalah waktu yang menyenangkan pula untuk meningkatkan karir kalian. Sebelum kalian berpikir bahwa akan sangat merepotkan dan tidak menyenangkannya memikirkan pekerjaan pada saat akhir pekan, berikut ada hal-hal yang bisa dilakukan untuk fokus pada hal yang penting pada karir atau impian yang sedang kalian wujudkan.</p>
                            <p class="text-muted mb-3 f-13" style="text-align: justify">Selama ini banyak yang menganggap bahwa weekend atau akhir pekan adalah saat yang tepat untuk “melupakan “ sejenak rutinitas kerja sehari-hari selama satu minggu penuh, bersenang-senang, mungkin ini cara yang tepat bagi kalian yang tidak sepenuhnya mencintai dan menyukai pekerjaan mereka, lalu bagaimana dengan kalian yang menyukai pekerjaan anda dan siapa tahu weekend dapat memberikan pandangan lain untuk memaksimalkan karir kalian. Pertimbangkan ini, akhir pekan adalah waktu yang menyenangkan pula untuk meningkatkan karir kalian. Sebelum kalian berpikir bahwa akan sangat merepotkan dan tidak menyenangkannya memikirkan pekerjaan pada saat akhir pekan, berikut ada hal-hal yang bisa dilakukan untuk fokus pada hal yang penting pada karir atau impian yang sedang kalian wujudkan.</p>
                        </div>
                    </div>



                    <div class="rounded border mt-4 p-4">
                        <h5 class="text-dark"><i class="mdi mdi-pencil mr-2"></i>Komentar</h5>
                        <div class="custom-form mt-4 pt-2">
                            <form name="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-account text-muted f-17"></i>
                                            <input name="name" id="name" type="text" class="form-control blog-details" placeholder="Nama">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-email text-muted f-17"></i>
                                            <input name="email" id="email" type="email" class="form-control blog-details" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-web text-muted f-17"></i>
                                            <input name="url" id="url" type="url" class="form-control blog-details" placeholder="Website">
                                        </div>
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-comment-processing text-muted f-17"></i>
                                            <textarea name="comments" id="comments" rows="4" class="form-control blog-details" placeholder="Komentar"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Kirim Komentar">
                                    </div>
                                </div>
                            </form>
                            <!-- /form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG LIST END -->

    <!-- The Modal Daftar -->
    <div class="modal" id="pilihanDaftar">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Daftar</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 bg-info rounded" style="padding:50px 50px 50px 50px;border:7px solid white">
                                <p class="text-white" style="font-size: 24px;text-align:center">Sebagai Penyandang Disabilitas Pencari Kerja</p>
                                <p style="text-align: center;margin-top:30px"><a href="daftar-disabilitas.php" class="btn btn-light btn-lg" style="margin-right: 10px ! important">Daftar</a></p>
                            </div>
                            <div class="col-lg-6 bg-warning rounded" style="padding:50px 50px 50px 50px;border:7px solid white">
                                <p class="text-white" style="font-size: 24px;text-align:center">Sebagai Penyedia Kerja Penyandang Disabilitas</p>
                                <p style="text-align: center;margin-top:30px"><a href="daftar-penyedia-kerja.php" class="btn btn-light btn-lg" style="margin-right: 10px ! important">Daftar</a></p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Ubah Foto Profil -->

    <!-- footer start -->
    <footer class="footer" style="padding: 40px 0px 10px 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                    <a href="#" class="logo">
                        <img src="images/logo-lokeritas2.png" alt="" class="logo-light" height="38" />
                    </a>
                    <p class="mt-4">Lokeritas adalah media penyedia lowongan kerja khusus penyandang disabilitas di Sumatera Utara</p>
                    <ul class="social-icon social list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-instagram"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Lokeritas</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="tentang.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Tentang</a></li>
                        <li><a href="mitra.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Mitra</a></li>
                        <li><a href="hubungi-kami.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Hubungi Kami</a></li>
                        <li><a href="kebijakan-privasi.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Kebijakan Privasi</a></li>
                        <li><a href="faq.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> F.A.Q.</a></li>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title f-17">Penyedia Kerja</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="daftar-penyedia-kerja.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Mendaftar</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right" disabled></i> Lihat Daftar Kandidat</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Pasang Iklan Lowongan</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Lainnya</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="tips-karir.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Tips Karir</a></li>
                        <li><a href="karyaku.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Karyaku</a></li>
                        <li><a href="lowongan.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Lowongan Terbaru</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Unduh Aplikasi Mobile Lokeritas</a></li>
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
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/plugins.js"></script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>

</body>

</html>