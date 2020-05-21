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
                            <a href="#"><i class="mdi mdi-account mr-2 " style="color: gray; font-size:16px"></i><?= $row["nama"]; ?></a><span class="menu-arrow"></span>
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
    <section class="bg-half page-next-level" style="padding: 120px 0px 10px 0px;background: url('images/bg-2.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h3 class="text-uppercase title mb-4">karyaku</h3>
                        <p>Kami ingin buktikan, bahwa kami memiliki keahlian dan kami mampu bekerja layaknya orang normal </p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- Section Search -->
    <section style="padding:40px 0px 0px 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-10">
                    <input id="middle-name" type="text" class="form-control resume" placeholder="Kata kunci pencarian...">
                </div>
                <div class="col-lg-2">
                    <button type="button" class="btn btn-primary" style="width: 100%">Cari</button>
                </div>
            </div>
        </div>
    </section>
    <!-- Section Search -->

    <!-- blog start -->
    <section class="section" style="padding:0px 0px 50px 0px">
        <div class="container">
            <div class="row">

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://v-images2.antarafoto.com/penyandang-disabilitas-mf7nx1-prv.jpg" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>

                        </div>
                        <div class="content p-4 bg-light" style="padding: 10px 24px 24px 24px ! important">
                            <div>
                                <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <a href="javascript:void(0)" class="text-secondary user">Samsul Sinaga</a></p>
                                <p class="text-secondary" style="text-align: right"><i class="mdi mdi-heart mr-1"></i>33</p>
                            </div>
                            <h5><a href="#" data-toggle="modal" data-target="#detailKaryaku" class="text-dark">Mengukir sudah menjadi keahlianku</a></h5>
                        </div>
                        <div class="author">
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://v-images2.antarafoto.com/penyandang-disabilitas-mf7nx1-prv.jpg" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>

                        </div>
                        <div class="content p-4 bg-light" style="padding: 10px 24px 24px 24px ! important">
                            <div>
                                <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <a href="javascript:void(0)" class="text-secondary user">Samsul Sinaga</a></p>
                                <p class="text-secondary" style="text-align: right"><i class="mdi mdi-heart mr-1"></i>33</p>
                            </div>
                            <h5><a href="javascript:void(0)" class="text-dark">Mengukir sudah menjadi keahlianku</a></h5>
                        </div>
                        <div class="author">
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://v-images2.antarafoto.com/penyandang-disabilitas-mf7nx1-prv.jpg" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>

                        </div>
                        <div class="content p-4 bg-light" style="padding: 10px 24px 24px 24px ! important">
                            <div>
                                <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <a href="javascript:void(0)" class="text-secondary user">Samsul Sinaga</a></p>
                                <p class="text-secondary" style="text-align: right"><i class="mdi mdi-heart mr-1"></i>33</p>
                            </div>
                            <h5><a href="javascript:void(0)" class="text-dark">Mengukir sudah menjadi keahlianku</a></h5>
                        </div>
                        <div class="author">
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://v-images2.antarafoto.com/penyandang-disabilitas-mf7nx1-prv.jpg" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>

                        </div>
                        <div class="content p-4 bg-light" style="padding: 10px 24px 24px 24px ! important">
                            <div>
                                <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <a href="javascript:void(0)" class="text-secondary user">Samsul Sinaga</a></p>
                                <p class="text-secondary" style="text-align: right"><i class="mdi mdi-heart mr-1"></i>33</p>
                            </div>
                            <h5><a href="javascript:void(0)" class="text-dark">Mengukir sudah menjadi keahlianku</a></h5>
                        </div>
                        <div class="author">
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://v-images2.antarafoto.com/penyandang-disabilitas-mf7nx1-prv.jpg" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>

                        </div>
                        <div class="content p-4 bg-light" style="padding: 10px 24px 24px 24px ! important">
                            <div>
                                <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <a href="javascript:void(0)" class="text-secondary user">Samsul Sinaga</a></p>
                                <p class="text-secondary" style="text-align: right"><i class="mdi mdi-heart mr-1"></i>33</p>
                            </div>
                            <h5><a href="javascript:void(0)" class="text-dark">Mengukir sudah menjadi keahlianku</a></h5>
                        </div>
                        <div class="author">
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-4 col-md-6 mt-4 pt-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://v-images2.antarafoto.com/penyandang-disabilitas-mf7nx1-prv.jpg" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>

                        </div>
                        <div class="content p-4 bg-light" style="padding: 10px 24px 24px 24px ! important">
                            <div>
                                <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <a href="javascript:void(0)" class="text-secondary user">Samsul Sinaga</a></p>
                                <p class="text-secondary" style="text-align: right"><i class="mdi mdi-heart mr-1"></i>33</p>
                            </div>
                            <h5><a href="javascript:void(0)" class="text-dark">Mengukir sudah menjadi keahlianku</a></h5>
                        </div>
                        <div class="author">
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div>
                <!--end col-->

                <div class="col-lg-12" style="margin-top: 30px ! important">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination job-pagination justify-content-center mb-0">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="mdi mdi-chevron-double-left f-15"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="mdi mdi-chevron-double-right f-15"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- blog end -->
    <!-- subscribe end -->

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

    <!-- The Modal Daftar -->
    <div class="modal" id="detailKaryaku">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-1">
                                <img src="images/profil/default.png" width="60px">
                            </div>
                            <div class="col-8" style="padding-left: 30px">
                                <h5 style="margin-bottom:0px">Mengukir sudah menjadi keahlianku</h5>
                                <p>oleh <a href="#" class="text-danger">Hengky Sulaiman</a></p>
                            </div>
                            <div class="col-2">
                                <a href="#" class="btn btn-light" style="padding: 8px 18px 8px 18px ! important"><i class="mdi mdi-heart"></i> Suka</a>
                            </div>
                            <div class="col-1">
                                <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <img src="images/profil/default.png" width="100%">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12 mt-4 pt-2" style="margin:0px 0px 0px 0px !important">
                                <div>
                                    <!--end row-->
                                    <div class="row pt-2">
                                        <div class="col-12">
                                            <div class="tab-content" id="pills-tabContent">
                                                <div class="tab-pane fade show active" id="pills-cloud" role="tabpanel" aria-labelledby="pills-cloud-tab">
                                                    <div class="container" style="padding: 0px 0px 0px 0px ! important">
                                                        <div class="row">
                                                            <div class="col-lg-8 col-md-7">
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="job-detail">
                                                                            <div class="job-detail-desc">
                                                                                <p class="text-dark mb-3">Lorem ipsum dolor sit amet consectetur adipisicing elit. Rerum consequatur ea at quas odio labore fugiat perferendis quo, inventore, animi voluptate beatae esse sit id? Iusto sit nobis odit eius.</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="job-detail">
                                                                            <div class="job-detail-desc">
                                                                                <p style="font-weight: bold;margin-bottom: 0px ! important"><i class="mdi mdi-comment-text"></i> 3 Komentar</p>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="row">
                                                                    <div class="col-lg-12">
                                                                        <div class="job-detail">
                                                                            <div class="job-detail-desc">
                                                                                <hr id="hr">
                                                                                <div class="media mt-4">
                                                                                    <div class="blog-comment-img">
                                                                                        <img class="d-block mx-auto rounded-pill" height="60" alt="" src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/">
                                                                                    </div>
                                                                                    <div class="media-body ml-3">
                                                                                        <h6 class="mb-0"><a href="#" class="text-dark" style="font-weight: bold">Ruby Poe</a></h6>
                                                                                        <p class="text-dark mb-2">Similique sunt in culpa qui officia deserunt mollitia animi id est laborum et dolorum fuga et harum quidem rerum.</p>
                                                                                        <p class="text-muted mb-0">4 Desember 2020</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="job-detail">
                                                                            <div class="job-detail-desc">
                                                                                <hr id="hr">
                                                                                <div class="media mt-4">
                                                                                    <div class="blog-comment-img">
                                                                                        <img class="d-block mx-auto rounded-pill" height="60" alt="" src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/">
                                                                                    </div>
                                                                                    <div class="media-body ml-3">
                                                                                        <h6 class="mb-0"><a href="#" class="text-dark" style="font-weight: bold">Ruby Poe</a></h6>
                                                                                        <p class="text-dark mb-2">Similique sunt in culpa qui officia deserunt mollitia animi id est laborum et dolorum fuga et harum quidem rerum.</p>
                                                                                        <p class="text-muted mb-0">4 Desember 2020</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="job-detail">
                                                                            <div class="job-detail-desc">
                                                                                <hr id="hr">
                                                                                <div class="media mt-4">
                                                                                    <div class="blog-comment-img">
                                                                                        <img class="d-block mx-auto rounded-pill" height="60" alt="" src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/">
                                                                                    </div>
                                                                                    <div class="media-body ml-3">
                                                                                        <h6 class="mb-0"><a href="#" class="text-dark" style="font-weight: bold">Ruby Poe</a></h6>
                                                                                        <p class="text-dark mb-2">Similique sunt in culpa qui officia deserunt mollitia animi id est laborum et dolorum fuga et harum quidem rerum.</p>
                                                                                        <p class="text-muted mb-0">4 Desember 2020</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="col-lg-4 col-md-5 mt-4 mt-sm-0">
                                                                <div class="job-detail">
                                                                    <div class="row">
                                                                        <div class="col-12">
                                                                            <p class="text-dark">Pengguna ini siap untuk bekerja !</p>
                                                                            <a href="#" class="btn btn-info" data-toggle="modal" data-target="#hireSaya"><i class="mdi mdi-email"></i> Hire Saya</a>
                                                                        </div>
                                                                    </div>
                                                                    <div class="row mt-3">
                                                                        <div class="col-12">
                                                                            <div class="single-post-item mb-2">
                                                                                <div class="float-left mr-3">
                                                                                    <i class="mdi mdi-tag text-muted mdi-24px"></i>
                                                                                </div>
                                                                                <div class="overview-details">
                                                                                    <h6 class="text-muted mb-0">app app design calendar courier delivery app delivery service kajal kashyap location tracker logistics map</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="single-post-item mb-2">
                                                                                <div class="float-left mr-3">
                                                                                    <i class="mdi mdi-heart text-muted mdi-24px"></i>
                                                                                </div>
                                                                                <div class="overview-details">
                                                                                    <h6 class="text-muted mt-1">33 Suka</h6>
                                                                                </div>
                                                                            </div>
                                                                            <div class="single-post-item mb-4">
                                                                                <div class="float-left mr-3">
                                                                                    <i class="mdi mdi-calendar-today text-muted mdi-24px"></i>
                                                                                </div>
                                                                                <div class="overview-details">
                                                                                    <h6 class="text-muted mt-1">33 Januari 2014</h6>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <!--end teb pane-->
                                            </div>
                                            <!--end tab content-->
                                        </div>
                                        <!--end col-->
                                    </div>
                                    <!--end row-->
                                </div>
                            </div>
                            <!--end col-->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End Modal Ubah Foto Profil -->

    <!-- The Modal Daftar -->
    <div class="modal" id="hireSaya">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <div class="container">
                        <div class="row">
                            <div class="col-2">
                                <img src="images/profil/default.png" height="70" style="width:70px;" alt="" class="d-block mx-auto shadow rounded-pill mb-4">
                            </div>
                            <div class="col-9">
                                <h5 class="mt-3">Kirim Hengky Sulaiman Pengajuan Pekerjaan</h5>
                            </div>
                            <div class="col-1">
                                <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12">
                                <p style="margin-bottom: 0px;font-weight:700">Tipe Pekerjaan <i class="text-danger">*</i></p>

                                <div class="p-4" style="padding: 0px 0px 0px 0px ! important">
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="form-group">
                                            <input type="radio" onchange="myFunction()" id="myCheck1" name="customRadio" class="custom-control-input">
                                            <label class="custom-control-label" for="myCheck1">Full Time</label>
                                        </div>
                                    </div>
                                    <div class="custom-control custom-radio custom-control-inline">
                                        <div class="form-group">
                                            <input type="radio" onchange="myFunction()" id="myCheck2" name="customRadio" class="custom-control-input">
                                            <label class="custom-control-label" for="myCheck2">Half Time</label>
                                        </div>
                                    </div>
                                    <div id="ketGaji1" style="display:none">
                                        <p style="font: 700">Keterangan Gaji</p>
                                        <p class="text-muted">Rp. 3.000.000 - Rp. 4.000.000</p>
                                    </div>
                                    <div id="ketGaji2" style="display:none">
                                        <p style="font: 700">Keterangan Gaji</p>
                                        <p class="text-muted">Rp. 1.500.000 - Rp. 2.000.000</p>
                                    </div>

                                </div>
                            </div>
                            <div class="col-12">
                                <p style="margin-bottom: 0px;font-weight:700">Deskripsi Pekerjaan <i class="text-danger">*</i></p>
                                <textarea name="" id="" cols="30" rows="5" class="form-control"></textarea>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Modal body -->
                <!-- <div class="modal-body">
                    <div class="container">
                        <div class="row">
                        </div>
                    </div>
                </div> -->

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="submit" id="btnGetStudent" name="btn_karir" class="btn btn-primary">Kirim</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
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

    <script>
        function myFunction() {
            // Get the checkbox
            var checkBox1 = document.getElementById("myCheck1");
            var checkBox2 = document.getElementById("myCheck2");
            // Get the output text
            var text1 = document.getElementById("ketGaji1");
            var text2 = document.getElementById("ketGaji2");

            // If the checkbox is checked, display the output text
            if (checkBox1.checked == true) {
                text1.style.display = "block";
            } else {
                text1.style.display = "none";
            }

            // If the checkbox is checked, display the output text
            if (checkBox2.checked == true) {
                text2.style.display = "block";
            } else {
                text2.style.display = "none";
            }
        }
    </script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>

</body>

</html>