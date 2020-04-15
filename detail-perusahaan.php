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
    <section class="bg-half page-next-level" style="padding: 170px 0px 50px 0px;background: url('https://www.expatica.com/app/uploads/2018/11/Networking-1-1920x1080.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-sm-center">
                        <img src="images/featured-job/img-3.png" alt="" class="img-fluid mx-md-auto d-block">
                        <h4 class="mt-3"><a href="#" class="text-white">CV. Rumah Siap Kerja</a></h4>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-3">
                                <p class="text-white"><i class="mdi mdi-map-marker mr-2"></i>Jl. Cokroaminoto, Kota Pematang Siantar</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- tab -->
    <div class="section " style="padding:10px 0px 40px 0px">
        <div class="container">
            <div class="row">

                <div class="col-lg-12 mt-4 pt-2" style="margin:0px 0px 0px 0px !important">
                    <div class="p-4">
                        <div class="row">
                            <div class="col-lg-12">
                                <ul style="box-shadow: 1px 2px 4px 1px #e1e0e0;" class="nav nav-pills nav nav-pills bg-light rounded nav-justified flex-column flex-sm-row" id="pills-tab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link rounded active" id="pills-cloud-tab" data-toggle="pill" href="#pills-cloud" role="tab" aria-controls="pills-cloud" aria-selected="true">Profil</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link rounded" id="pills-smart-tab" data-toggle="pill" href="#pills-smart" role="tab" aria-controls="pills-smart" aria-selected="false">Daftar Lowongan</a>
                                    </li>
                                </ul>
                            </div>
                            <!--end col-->
                        </div>
                        <!--end row-->

                        <div class="row mt-4 pt-2">
                            <div class="col-12">
                                <div class="tab-content" id="pills-tabContent">
                                    <div class="tab-pane fade show active" id="pills-cloud" role="tabpanel" aria-labelledby="pills-cloud-tab">

                                        <div class="container">

                                            <div class="row">
                                                <div class="col-lg-8 col-md-7">
                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h5 class="text-muted mt-4">Deskripsi Pekerjaan :</h5>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="job-detail border rounded mt-2 p-4" style="box-shadow: 1px 2px 4px 1px #e1e0e0;">
                                                                <div class="job-detail-desc">
                                                                    <p class="text-dark mb-3">PT. Bisi International, Tbk merupakan perusahaan multinasional yang memproduksi pertanian dan bermarkas di Surabaya, Indonesia. Perusahaan ini didirikan pada 22 Juni 1983 dan memiliki pabrik pengolahan benih di Plosoklaten dan Pare Kabupaten Kediri. Perusahaan ini menghasilkan berbagai macam-macam benih pertanian serta melakukan kegiatan usaha lain di sektor perdagangan, industri, dan distribusi.</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h5 class="text-muted mt-4">Hari/Waktu Bekerja :</h5>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="job-detail border rounded mt-2 p-4" style="box-shadow: 1px 2px 4px 1px #e1e0e0;">
                                                                <div class="job-detail-desc">
                                                                    <p class="text-dark mb-3">Senin - Jumat / 08.00 WIB - 17.00 WIB</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h5 class="text-muted mt-4">Tunjangan :</h5>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="job-detail border rounded mt-2 p-4" style="box-shadow: 1px 2px 4px 1px #e1e0e0;">
                                                                <div class="job-detail-desc">
                                                                    <ul style="list-style-type: none; padding:0px 0px 0px 0px">
                                                                        <li class="mdi mdi-chevron-right text-dark"> BPJS</li>
                                                                        <li class="mdi mdi-chevron-right text-dark"> THR</li>
                                                                        <li class="mdi mdi-chevron-right text-dark"> Tunjangan Kesehatan</li>
                                                                    </ul>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <h5 class="text-muted mt-4">Bahasa :</h5>
                                                        </div>
                                                    </div>

                                                    <div class="row">
                                                        <div class="col-lg-12">
                                                            <div class="job-detail border rounded mt-2 p-4" style="box-shadow: 1px 2px 4px 1px #e1e0e0;">
                                                                <div class="job-detail-desc">
                                                                    <p class="text-dark mb-3">Bahasa Indonesia & Bahasa Tionghoa</p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <div class="col-lg-4 col-md-5 mt-4 mt-sm-0" style="margin:70px 0px 0px 0px !important">
                                                    <div class="job-detail border rounded p-4" style="box-shadow: 1px 2px 4px 1px #e1e0e0;">
                                                        <h5 class="text-muted text-center pb-2"><i class="mdi mdi-phone-classic mr-2"></i>Informasi Kontak</h5>

                                                        <div class="job-detail-location pt-4 border-top">


                                                            <div class="job-details-desc-item" style="margin:10px 0px 0px 0px;">
                                                                <div class="float-left mr-2">
                                                                    <i class="mdi mdi-web text-dark"></i>
                                                                </div>
                                                                <p class="text-dark mb-2">: https://www.rumahkerja.com</p>
                                                            </div>

                                                            <div class="job-details-desc-item">
                                                                <div class="float-left mr-2">
                                                                    <i class="mdi mdi-cellphone-iphone text-dark"></i>
                                                                </div>
                                                                <p class="text-dark mb-2">: 082277678890</p>
                                                            </div>

                                                            <div class="job-details-desc-item">
                                                                <div class="float-left mr-2">
                                                                    <i class="mdi mdi-email-variant text-dark"></i>
                                                                </div>
                                                                <p class="text-dark mb-2">: karyajaya@gmail.com</p>
                                                            </div>


                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                        </div>

                                    </div>
                                    <!--end teb pane-->

                                    <div class="tab-pane fade" id="pills-smart" role="tabpanel" aria-labelledby="pills-smart-tab">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-12">
                                                    <div class="tab-content mt-2" id="pills-tabContent">
                                                        <div class="tab-pane fade show active" id="recent-job" role="tabpanel" aria-labelledby="recent-job-tab">
                                                            <div class="row">

                                                                <div class="col-lg-12">

                                                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                                                        <div class="p-4">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-2">
                                                                                    <div class="mo-mb-2">
                                                                                        <img src="images/featured-job/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <h5 class="f-18"><a href="lowongan-detail.php" class="text-dark">Penjahit</a></h5>
                                                                                        <p class="text-muted mb-0">PT. Rumah Kerja</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i>Konveksi dan Produksi</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>Kota Pematang Siantar</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="p-3 bg-light">
                                                                            <div class="row">
                                                                                <div class="col-md-5">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0 mo-mb-2">Jenis Disabilitas : <span class="text-dark">Semua Jenis Disabilitas</span></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0 mo-mb-2">Tutup :<span class="text-dark"> 04 Apr 2020 </span></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="lowongan-detail.php" class="btn btn-info">Selengkapnya</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                                                        <div class="p-4">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-2">
                                                                                    <div class="mo-mb-2">
                                                                                        <img src="images/featured-job/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <h5 class="f-18"><a href="lowongan-detail.php" class="text-dark">Penjahit</a></h5>
                                                                                        <p class="text-muted mb-0">PT. Rumah Kerja</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i>Konveksi dan Produksi</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>Kota Pematang Siantar</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="p-3 bg-light">
                                                                            <div class="row">
                                                                                <div class="col-md-5">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0 mo-mb-2">Jenis Disabilitas : <span class="text-dark">Semua Jenis Disabilitas</span></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0 mo-mb-2">Tutup :<span class="text-dark"> 04 Apr 2020 </span></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="lowongan-detail.php" class="btn btn-info">Selengkapnya</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                                                        <div class="p-4">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-2">
                                                                                    <div class="mo-mb-2">
                                                                                        <img src="images/featured-job/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <h5 class="f-18"><a href="lowongan-detail.php" class="text-dark">Penjahit</a></h5>
                                                                                        <p class="text-muted mb-0">PT. Rumah Kerja</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i>Konveksi dan Produksi</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>Kota Pematang Siantar</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="p-3 bg-light">
                                                                            <div class="row">
                                                                                <div class="col-md-5">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0 mo-mb-2">Jenis Disabilitas : <span class="text-dark">Semua Jenis Disabilitas</span></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0 mo-mb-2">Tutup :<span class="text-dark"> 04 Apr 2020 </span></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="lowongan-detail.php" class="btn btn-info">Selengkapnya</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                                                        <div class="p-4">
                                                                            <div class="row align-items-center">
                                                                                <div class="col-md-2">
                                                                                    <div class="mo-mb-2">
                                                                                        <img src="images/featured-job/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <h5 class="f-18"><a href="lowongan-detail.php" class="text-dark">Penjahit</a></h5>
                                                                                        <p class="text-muted mb-0">PT. Rumah Kerja</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i>Konveksi dan Produksi</p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>Kota Pematang Siantar</p>
                                                                                    </div>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="p-3 bg-light">
                                                                            <div class="row">
                                                                                <div class="col-md-5">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0 mo-mb-2">Jenis Disabilitas : <span class="text-dark">Semua Jenis Disabilitas</span></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-4">
                                                                                    <div>
                                                                                        <p class="text-muted mb-0 mo-mb-2">Tutup :<span class="text-dark"> 04 Apr 2020 </span></p>
                                                                                    </div>
                                                                                </div>
                                                                                <div class="col-md-3">
                                                                                    <a href="lowongan-detail.php" class="btn btn-info">Selengkapnya</a>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>

                                                                </div>
                                                            </div>
                                                        </div>

                                                    </div>
                                                </div>
                                            </div>
                                            <!-- end row -->

                                            <!-- end row -->
                                            <div class="row">
                                                <div class="col-lg-12 mt-4 pt-2">
                                                    <nav aria-label="Page navigation example">
                                                        <ul class="pagination job-pagination mb-0 justify-content-center">
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
                                        <!-- end containar -->
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
    <!--end tab -->



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
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/plugins.js"></script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>

</body>

</html>