<?php
session_start();

//API Tips Karir
$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/semua_tips.php');
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$result_get_tipsKarir = curl_exec($curl_get);
curl_close($curl_get);

$result_get_tipsKarir = json_decode($result_get_tipsKarir, true);

//API Pencarian Lowongan Kerja
$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/semua_lowongan.php');
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$result_get_lowongan = curl_exec($curl_get);
curl_close($curl_get);

$result_get_lowongan = json_decode($result_get_lowongan, true);
?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <script>
        $(document).ready(function() {
            // Add smooth scrolling to all links
            $("a").on('click', function(event) {

                // Make sure this.hash has a value before overriding default behavior
                if (this.hash !== "") {
                    // Prevent default anchor click behavior
                    event.preventDefault();

                    // Store hash
                    var hash = this.hash;

                    // Using jQuery's animate() method to add smooth page scroll
                    // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                    $('html, body').animate({
                        scrollTop: $(hash).offset().top
                    }, 2000, function() {

                        // Add hash (#) to URL when done scrolling (default click behavior)
                        window.location.hash = hash;
                    });
                } // End if
            });
        });
    </script>
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

    <!--Slider-->
    <link rel="stylesheet" href="css/owl.carousel.css" />
    <link rel="stylesheet" href="css/owl.theme.css" />
    <link rel="stylesheet" href="css/owl.transitions.css" />

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
                        <li><a href="#">Beranda</a></li>
                        <li><a href="lowongan.php">Lowongan</a></li>
                        <li><a href="#tipskarir">Tips Karir</a></li>
                        <li><a href="daftar-perusahaan.php">Daftar Perusahaan</a></li>
                        <li><a href="karyaku.php">Karyaku</a></li>
                        <li><a href="#" style="font-size: 30px">|</a></li>
                        <li class="has-submenu">
                            <a href="#"><i class="mdi mdi-account mr-2" style="color: gray; font-size:16px"></i><?= $_SESSION['nama_depan']; ?></a><span class="menu-arrow"></span>
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

        <!-- Start Home -->
        <section class="bg-home" style="background: url('images/bg-1.jpg') center center;">
            <div class="bg-overlay"></div>
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="title-heading text-center text-white">
                                    <h6 class="small-title text-uppercase text-light mb-3">Bangun Kemampuanmu dan Tunjukan
                                        Keahlianmu</h6>
                                    <h1 class="heading font-weight-bold mb-4">Satu langkah mudah menemukan pekerjaanmu</h1>
                                </div>
                            </div>
                        </div>
                        <div class="home-form-position">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="home-registration-form p-4 mb-3">
                                        <form class="registration-form" action="lowongan.php" method="post">
                                            <div class="row">
                                                <div class="col-lg-9 col-md-6">
                                                    <div class="registration-form-box">
                                                        <i class="fa fa-briefcase"></i>
                                                        <input type="text" id="exampleInputName1" name="keyword" class="form-control rounded registration-input-box autocomplete-selected" placeholder="Nama Pekerjaan, Perusahaan..." required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="registration-form-box">
                                                        <button type="submit" class="btn btn-primary" style="width: 100%">Cari </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end home -->


        <!-- all jobs start -->
        <section class="section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2" style="margin: 0px 0px 0px 0px ! important">
                            <h4 class="title title-line pb-5">Lowongan Pekerjaan</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content mt-2" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="satu-job" role="tabpanel" aria-labelledby="satu-job-tab">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <?php

                                        $total = count($result_get_lowongan);
                                        $page = (isset($_GET['page'])) ? $_GET['page'] : 0;
                                        $content = range(1, $total);
                                        $pages = array_chunk($content, 3);
                                        $a = array_slice($result_get_lowongan, $page, 1);
                                        $totalpag = count($result_get_lowongan);

                                        ?>

                                        <?php foreach ($a as $row) : ?>
                                            <?php
                                            $start_date = $row['tutup'];
                                            $expired = date('Y-m-d', strtotime($start_date . ' + 2 days'));
                                            $currentdate = date('Y-m-d');

                                            if ($expired >= $currentdate) {
                                                echo '<div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                                <div class="p-4">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-2">
                                                            <div class="mo-mb-2">
                                                                <img src="' . $row['logo'] . '" alt="" class="img-fluid mx-auto d-block" width="50%">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div>
                                                                <a href="lowongan-detail.php?id=' . $row['id_lowongan'] . '" class="text-dark">
                                                                    <h5 class="f-18">
                                                                        ' . strtolower($row['nama_pekerjaan']) . '
                                                                    </h5>
                                                                </a>
                                                                <p class="text-muted mb-0">' . $row['nama_perusahaan'] . '
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div>
                                                                <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i>' . $row['sektor_perusahaan'] . '
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div>
                                                                <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>' . $row['alamat'] . '
                                                                </p>
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
                                                                <p class="text-muted mb-0 mo-mb-2">Tutup : ' . date("d F Y", strtotime($row['tutup'])) . '<span class="text-dark">
                                                                    </span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a href="lowongan-detail.php?id=' . $row['id_lowongan'] . '" class="btn btn-primary">Selengkapnya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                            } else {
                                                echo '<h4 class="text-center">Tidak ada lowongan pekerjaan saat ini</h4>';
                                            }
                                            ?>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row">
                                <div class="col-lg-12 mt-4 pt-2">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination job-pagination mb-0 justify-content-center">

                                            <?php
                                            $start_date = $row['tutup'];
                                            $expired = date('Y-m-d', strtotime($start_date . ' + 2 days'));
                                            $currentdate = date('Y-m-d');

                                            if ($expired >= $currentdate) {

                                                $total_pages = count($pages);
                                                $prevpage = $page - 1;
                                                $nextpage = $page + 1;

                                                if ($page == 0) {
                                                    echo '
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="?page=' . $prevpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-left f-15"></i>
                                                        </a>
                                                    </li>
                                                    ';

                                                    $j = 1;
                                                    for ($i = 0; $i < $total; $i++) {
                                                        echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $i . '" tabindex="-1" aria-disabled="true">
                                                            ' . $j . '
                                                        </a>
                                                    </li>
                                                    ';
                                                        $j++;
                                                    }
                                                    echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $nextpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-right f-15"></i>
                                                        </a>
                                                    </li>';
                                                }

                                                if ($page > 0) {
                                                    echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $prevpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-left f-15"></i>
                                                        </a>
                                                    </li>
                                                    ';

                                                    $j = 1;
                                                    for ($i = 0; $i < $total; $i++) {
                                                        echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $i . '" tabindex="-1" aria-disabled="true">
                                                            ' . $j . '
                                                        </a>
                                                    </li>
                                                    ';
                                                        $j++;
                                                    }

                                                    if ($page == $totalpag - 1) {
                                                        echo '
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="?page=' . $nextpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-right f-15"></i>
                                                        </a>
                                                    </li>';
                                                    } else {
                                                        echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $nextpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-right f-15"></i>
                                                        </a>
                                                    </li>';
                                                    }
                                                }
                                            } ?>




                                            <!-- <li class="page-item"><a class="page-link" id="dua-job-tab" data-toggle="pill"
                                                href="#dua-job" role="tab" aria-controls="dua-job"
                                                aria-selected="false">2</a></li>
                                        <li class="page-item"><a class="page-link" id="tiga-job-tab" data-toggle="pill"
                                                href="#tiga-job" role="tab" aria-controls="tiga-job"
                                                aria-selected="false">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="mdi mdi-chevron-double-right f-15"></i>
                                            </a>
                                        </li> -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- end containar -->
        </section>
        <!-- all jobs end -->

        <!-- blog start -->
        <section class="section bg-light" id="tipskarir">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-12 pb-2">
                            <h4 class="title title-line pb-5">Tips Karir</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $i = 0;
                    foreach ($result_get_tipsKarir as $row) :
                        if ($i == 3) {
                            break;
                        } ?>
                        <div class="col-lg-4 col-md-6 mt-4 pt-2">
                            <div class="blog position-relative overflow-hidden shadow rounded">
                                <div class="position-relative overflow-hidden">
                                    <img src="<?= $row['foto']; ?>" class="img-fluid rounded-top" alt="" width="100%">
                                    <div class="overlay rounded-top bg-dark"></div>
                                </div>
                                <div class="content p-4 bg-white">
                                    <h4 class="title text-dark"><?php echo strtolower(substr($row['judul'], 0, 26)); ?></a>
                                    </h4>
                                    <p class="text-muted"><?php echo substr($row['kontent'], 0, 96); ?></p>
                                    <a href="tips-karir-detail.php?id=<?php echo $row['id_tips']; ?>" class="btn btn-info">Selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                    endforeach; ?>
                    <!--end col-->
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <a href="tips-karir.php" class="btn btn-info-outline">Lihat Semuanya</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog end -->
        <!-- blog start -->
        <section class="section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title title-line pb-5">Karyaku</h4>
                            <p class="text-muted para-desc mx-auto mb-1">Kami ingin buktikan, bahwa kami memiliki keahlian
                                dan kami mampu bekerja layaknya orang normal</p>
                        </div>
                    </div>
                </div>
                <div class="row">

                    <div class="col-lg-4 col-md-6 mt-4 pt-2">
                        <div class="blog position-relative overflow-hidden shadow rounded">
                            <div class="position-relative overflow-hidden">
                                <img src="https://v-images2.antarafoto.com/penyandang-disabilitas-mf7nx1-prv.jpg" class="img-fluid rounded-top" alt="">
                                <div class="overlay rounded-top bg-dark"></div>

                            </div>
                            <div class="content p-4 bg-white" style="padding: 10px 24px 24px 24px ! important">
                                <div>
                                    <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <a href="javascript:void(0)" class="text-secondary user">Samsul Sinaga</a></p>
                                    <p class="text-secondary" style="text-align: right"><i class="mdi mdi-heart mr-1"></i>33
                                    </p>
                                </div>
                                <h5><a href="javascript:void(0)" class="text-dark">Mengukir sudah menjadi keahlianku</a>
                                </h5>
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
                            <div class="content p-4 bg-white" style="padding: 10px 24px 24px 24px ! important">
                                <div>
                                    <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <a href="javascript:void(0)" class="text-secondary user">Samsul Sinaga</a></p>
                                    <p class="text-secondary" style="text-align: right"><i class="mdi mdi-heart mr-1"></i>33
                                    </p>
                                </div>
                                <h5><a href="javascript:void(0)" class="text-dark">Mengukir sudah menjadi keahlianku</a>
                                </h5>
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
                            <div class="content p-4 bg-white" style="padding: 10px 24px 24px 24px ! important">
                                <div>
                                    <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <a href="javascript:void(0)" class="text-secondary user">Samsul Sinaga</a></p>
                                    <p class="text-secondary" style="text-align: right"><i class="mdi mdi-heart mr-1"></i>33
                                    </p>
                                </div>
                                <h5><a href="javascript:void(0)" class="text-dark">Mengukir sudah menjadi keahlianku</a>
                                </h5>
                            </div>
                            <div class="author">
                                <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                </div>
            </div>
        </section>
        <!-- blog end -->

    <?php
    else : ?>
        <!-- Navigation Bar-->
        <header id="topnav" class="defaultscroll scroll-active">

            <!-- Menu Start -->
            <div class="container">
                <!-- Logo container-->
                <div>
                    <a href="index.html" class="logo">
                        <img src="images/logo-lokeritas2.png" alt="" class="logo-light" height="24" />
                        <img src="images/logo-lokeritas1.png" alt="" class="logo-dark" height="24" />
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
                        <li><a href="#tipskarir">Tips Karir</a></li>
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

        <!-- Start Home -->
        <section class="bg-home" style="background: url('images/bg-1.jpg') center center;">
            <div class="bg-overlay"></div>
            <div class="home-center">
                <div class="home-desc-center">
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-12">
                                <div class="title-heading text-center text-white">
                                    <h6 class="small-title text-uppercase text-light mb-3">Bangun Kemampuanmu dan Tunjukan
                                        Keahlianmu</h6>
                                    <h1 class="heading font-weight-bold mb-4">Satu langkah mudah menemukan pekerjaanmu</h1>
                                </div>
                            </div>
                        </div>
                        <div class="home-form-position">
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="home-registration-form p-4 mb-3">
                                        <form class="registration-form" action="lowongan.php" method="post">
                                            <div class="row">
                                                <div class="col-lg-9 col-md-6">
                                                    <div class="registration-form-box">
                                                        <i class="fa fa-briefcase"></i>
                                                        <input type="text" id="exampleInputName1" name="keyword" class="form-control rounded registration-input-box autocomplete-selected" placeholder="Nama Pekerjaan, Perusahaan..." required="">
                                                    </div>
                                                </div>
                                                <div class="col-lg-3 col-md-6">
                                                    <div class="registration-form-box">
                                                        <button type="submit" class="btn btn-primary" style="width: 100%">Cari </button>
                                                    </div>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end home -->


        <!-- all jobs start -->
        <section class="section bg-light">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2" style="margin: 0px 0px 0px 0px ! important">
                            <h4 class="title title-line pb-5">Lowongan Pekerjaan</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-12">
                        <div class="tab-content mt-2" id="pills-tabContent">
                            <div class="tab-pane fade show active" id="satu-job" role="tabpanel" aria-labelledby="satu-job-tab">
                                <div class="row">
                                    <div class="col-lg-12">

                                        <?php

                                        $total = count($result_get_lowongan);
                                        $page = (isset($_GET['page'])) ? $_GET['page'] : 0;
                                        $content = range(1, $total);
                                        $pages = array_chunk($content, 3);
                                        $a = array_slice($result_get_lowongan, $page, 1);
                                        $totalpag = count($result_get_lowongan);

                                        ?>

                                        <?php foreach ($a as $row) : ?>
                                            <?php
                                            $start_date = $row['tutup'];
                                            $expired = date('Y-m-d', strtotime($start_date . ' + 2 days'));
                                            $currentdate = date('Y-m-d');

                                            if ($expired >= $currentdate) {
                                                echo '<div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                                <div class="p-4">
                                                    <div class="row align-items-center">
                                                        <div class="col-md-2">
                                                            <div class="mo-mb-2">
                                                                <img src="' . $row['logo'] . '" alt="" class="img-fluid mx-auto d-block" width="50%">
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div>
                                                                <a href="lowongan-detail.php?id=' . $row['id_lowongan'] . '" class="text-dark">
                                                                    <h5 class="f-18">
                                                                        ' . strtolower($row['nama_pekerjaan']) . '
                                                                    </h5>
                                                                </a>
                                                                <p class="text-muted mb-0">' . $row['nama_perusahaan'] . '
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div>
                                                                <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i>' . $row['sektor_perusahaan'] . '
                                                                </p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <div>
                                                                <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>' . $row['alamat'] . '
                                                                </p>
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
                                                                <p class="text-muted mb-0 mo-mb-2">Tutup : ' . date("d F Y", strtotime($row['tutup'])) . '<span class="text-dark">
                                                                    </span></p>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3">
                                                            <a href="lowongan-detail.php?id=' . $row['id_lowongan'] . '" class="btn btn-primary">Selengkapnya</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>';
                                            } else {
                                                echo '<h4 class="text-center">Tidak ada lowongan pekerjaan saat ini</h4>';
                                            }
                                            ?>
                                        <?php endforeach; ?>

                                    </div>
                                </div>
                            </div>
                            <!-- end row -->

                            <!-- end row -->
                            <div class="row">
                                <div class="col-lg-12 mt-4 pt-2">
                                    <nav aria-label="Page navigation example">
                                        <ul class="pagination job-pagination mb-0 justify-content-center">

                                            <?php
                                            $start_date = $row['tutup'];
                                            $expired = date('Y-m-d', strtotime($start_date . ' + 2 days'));
                                            $currentdate = date('Y-m-d');

                                            if ($expired >= $currentdate) {

                                                $total_pages = count($pages);
                                                $prevpage = $page - 1;
                                                $nextpage = $page + 1;

                                                if ($page == 0) {
                                                    echo '
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="?page=' . $prevpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-left f-15"></i>
                                                        </a>
                                                    </li>
                                                    ';

                                                    $j = 1;
                                                    for ($i = 0; $i < $total; $i++) {
                                                        echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $i . '" tabindex="-1" aria-disabled="true">
                                                            ' . $j . '
                                                        </a>
                                                    </li>
                                                    ';
                                                        $j++;
                                                    }
                                                    echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $nextpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-right f-15"></i>
                                                        </a>
                                                    </li>';
                                                }

                                                if ($page > 0) {
                                                    echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $prevpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-left f-15"></i>
                                                        </a>
                                                    </li>
                                                    ';

                                                    $j = 1;
                                                    for ($i = 0; $i < $total; $i++) {
                                                        echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $i . '" tabindex="-1" aria-disabled="true">
                                                            ' . $j . '
                                                        </a>
                                                    </li>
                                                    ';
                                                        $j++;
                                                    }

                                                    if ($page == $totalpag - 1) {
                                                        echo '
                                                    <li class="page-item disabled">
                                                        <a class="page-link" href="?page=' . $nextpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-right f-15"></i>
                                                        </a>
                                                    </li>';
                                                    } else {
                                                        echo '
                                                    <li class="page-item">
                                                        <a class="page-link" href="?page=' . $nextpage . '" tabindex="-1" aria-disabled="true">
                                                            <i class="mdi mdi-chevron-double-right f-15"></i>
                                                        </a>
                                                    </li>';
                                                    }
                                                }
                                            } ?>




                                            <!-- <li class="page-item"><a class="page-link" id="dua-job-tab" data-toggle="pill"
                                                href="#dua-job" role="tab" aria-controls="dua-job"
                                                aria-selected="false">2</a></li>
                                        <li class="page-item"><a class="page-link" id="tiga-job-tab" data-toggle="pill"
                                                href="#tiga-job" role="tab" aria-controls="tiga-job"
                                                aria-selected="false">3</a>
                                        </li>
                                        <li class="page-item">
                                            <a class="page-link" href="#">
                                                <i class="mdi mdi-chevron-double-right f-15"></i>
                                            </a>
                                        </li> -->
                                        </ul>
                                    </nav>
                                </div>
                            </div>
                        </div>
                        <!-- end containar -->
        </section>
        <!-- all jobs end -->

        <!-- How it Work start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title title-line pb-5">Bagaimana Cara Mendapat Pekerjaan?</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-4 mt-4 pt-2">
                        <div class="how-it-work-box bg-light p-4 text-center rounded shadow">
                            <div class="how-it-work-img position-relative rounded-pill mb-3">
                                <img src="images/how-it-work/img-1.png" alt="" class="mx-auto d-block" height="50">
                            </div>
                            <div>
                                <h5>Mendaftar Sebagai Member</h5>
                                <p class="text-muted">Silahkan melakukan pendaftaran akun untuk menjadi member lokeritas dan
                                    segera lengkapi profil kamu.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 pt-2">
                        <div class="how-it-work-box bg-light p-4 text-center rounded shadow">
                            <div class="how-it-work-img position-relative rounded-pill mb-3">
                                <img src="images/how-it-work/img-2.png" alt="" class="mx-auto d-block" height="50">
                            </div>
                            <div>
                                <h5>Cari Pekerjaan Kamu</h5>
                                <p class="text-muted">Lakukan pencarian lowongan pekerjaan sesuai keahlian yang kamu miliki
                                    pada menu yang sudah tersedia.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4 mt-4 pt-2">
                        <div class="how-it-work-box bg-light p-4 text-center rounded shadow">
                            <div class="how-it-work-img position-relative rounded-pill mb-3">
                                <img src="images/how-it-work/img-3.png" alt="" class="mx-auto d-block" height="50">
                            </div>
                            <div>
                                <h5>Lamar Pekerjaan</h5>
                                <p class="text-muted">Setelah menemukan lowongan pekerjaan, kamu bisa langsung melamar
                                    pekerjaan secara online pada menu yang tersedia.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- How it Work end -->



        <!-- blog start -->
        <section class="section bg-light" id="tipskarir">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-12 pb-2">
                            <h4 class="title title-line pb-5">Tips Karir</h4>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <?php $i = 0;
                    foreach ($result_get_tipsKarir as $row) :
                        if ($i == 3) {
                            break;
                        } ?>
                        <div class="col-lg-4 col-md-6 mt-4 pt-2">
                            <div class="blog position-relative overflow-hidden shadow rounded">
                                <div class="position-relative overflow-hidden">
                                    <img src="<?= $row['foto']; ?>" class="img-fluid rounded-top" alt="" width="100%">
                                    <div class="overlay rounded-top bg-dark"></div>
                                </div>
                                <div class="content p-4 bg-white">
                                    <h4 class="title text-dark"><?php echo strtolower(substr($row['judul'], 0, 26)); ?></a>
                                    </h4>
                                    <p class="text-muted"><?php echo substr($row['kontent'], 0, 96); ?></p>
                                    <a href="tips-karir-detail.php?id=<?php echo $row['id_tips']; ?>" class="btn btn-info">Selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php $i++;
                    endforeach; ?>
                    <!--end col-->
                </div><br>
                <div class="container">
                    <div class="row">
                        <div class="col text-center">
                            <a href="tips-karir.php" class="btn btn-info-outline">Lihat Semuanya</a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- blog end -->

        <!-- testimonial start -->
        <section class="section">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-12">
                        <div class="section-title text-center mb-4 pb-2">
                            <h4 class="title title-line pb-5">Testimonial Pengguna</h4>
                        </div>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col-lg-12">
                        <div id="owl-testi" class="owl-carousel owl-theme">
                            <div class="item testi-box rounded p-4 mr-3 ml-2 mb-4 bg-light position-relative">
                                <p class="text-muted mb-5">Berkat lokeritas, saya telah menemukan pekerjaan yang tepat
                                    sesuai dengan keahlian yang saya miliki.</p>
                                <div class="clearfix">
                                    <div class="testi-img float-left mr-3">
                                        <img src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/" height="64" alt="" class="rounded-circle shadow">
                                    </div>
                                    <h5 class="f-18 pt-1">Budi Purba</h5>
                                    <p class="text-muted mb-0">Penjahit</p>
                                    <div class="testi-icon">
                                        <i class="mdi mdi-format-quote-open display-2"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="item testi-box rounded p-4 mr-3 ml-2 bg-light position-relative">
                                <p class="text-muted mb-5">Lokeritas menawarkan mekanisme sistem yang tepat, membuat saya
                                    dapat langsung melamar pekerjaan secara online </p>
                                <div class="clearfix">
                                    <div class="testi-img float-left mr-3">
                                        <img src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/" height="64" alt="" class="rounded-circle shadow">
                                    </div>
                                    <h5 class="f-18 pt-1">Silvana Syafitri</h5>
                                    <p class="text-muted mb-0">Customer Service</p>
                                    <div class="testi-icon">
                                        <i class="mdi mdi-format-quote-open display-2"></i>
                                    </div>
                                </div>
                            </div>

                            <div class="item testi-box rounded p-4 mr-3 ml-2 bg-light position-relative">
                                <p class="text-muted mb-5">Menurut saya lokeritas adalah suatu pilihan yang tepat jika ingin
                                    mendapatkan pekerjaan secara cepat</p>
                                <div class="clearfix">
                                    <div class="testi-img float-left mr-3">
                                        <img src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/" height="64" alt="" class="rounded-circle shadow">
                                    </div>
                                    <h5 class="f-18 pt-1">Perry Suhendra</h5>
                                    <p class="text-muted mb-0">Desain Grafis</p>
                                    <div class="testi-icon">
                                        <i class="mdi mdi-format-quote-open display-2"></i>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </section>
        <!-- testimonial end -->

        <!-- klien-->
        <section class="section bg-light">
            <div class="container">
                <div class="row">
                    <div class="container mt-100 mt-60 bg" style="margin-top: 0px ! important">
                        <div class="row justify-content-center">
                            <div class="col-12">
                                <div class="section-title text-center mb-4 pb-2">
                                    <h4 class="title title-line pb-5">Klien Kami</h4>
                                </div>
                            </div>
                        </div>

                        <div class="row align-items-center">
                            <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2 text-center">
                                <img src="images/clients/1.png" height="50" alt="">
                            </div>
                            <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2 text-center">
                                <img src="images/clients/2.png" height="50" alt="">
                            </div>
                            <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2 text-center">
                                <img src="images/clients/3.png" height="50" alt="">
                            </div>
                            <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2 text-center">
                                <img src="images/clients/4.png" height="50" alt="">
                            </div>
                            <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2 text-center">
                                <img src="images/clients/1.png" height="50" alt="">
                            </div>
                            <div class="col-lg-2 col-md-4 col-6 mt-4 pt-2 text-center">
                                <img src="images/clients/2.png" height="50" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>

        <!-- DOWNLOAD APP START -->
        <section class="section pb-0" style="background: url('https://www.expatica.com/app/uploads/2018/11/Networking-1-1920x1080.jpg') center center;">
            <div class="bg-overlay"></div>
            <div class="container">
                <div class="row align-items-center">
                    <div class="col-md-6 order-md-1 order-2">
                        <div class="job-about-app-img mt-40">
                            <img src="images/app-download.png" alt="" class="img-fluid mx-auto d-block">
                        </div>
                    </div>

                    <div class="col-md-6 order-md-2 order-1">
                        <div class="app-about-content">
                            <div class="app-about-desc text-white">
                                <h4 class="text-white mb-3">Unduh Aplikas Mobile Lokeritas</h4>
                                <p class="font-weight text-white-80">Unduh aplikasi mobile lokeritas dan nikmati berbagai
                                    kemudahan yang sama. Dengan menggunakan aplikasi versi mobile, sangat membantu
                                    penyandang disabilitas tuna netra dalam mencari dan melamar pekerjaan. Aplikasi
                                    menyediakan fitur voice command, dimana pengguna menggunakan media suara untuk
                                    berinteraksi dengan aplikasi .</p>
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item"><a href="javascript:void(0)"><img src="images/google.png" class="mt-2" height="60" alt=""></a></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- DOWNLOAD APP END -->


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
                                    <p class="text-white" style="font-size: 24px;text-align:center">Sebagai Penyandang
                                        Disabilitas Pencari Kerja</p>
                                    <p style="text-align: center;margin-top:30px"><a href="daftar-disabilitas.php" class="btn btn-light btn-lg" style="margin-right: 10px ! important">Daftar</a>
                                    </p>
                                </div>
                                <div class="col-lg-6 bg-warning rounded" style="padding:50px 50px 50px 50px;border:7px solid white">
                                    <p class="text-white" style="font-size: 24px;text-align:center">Sebagai Penyedia Kerja
                                        Penyandang Disabilitas</p>
                                    <p style="text-align: center;margin-top:30px"><a href="daftar-penyedia-kerja.php" class="btn btn-light btn-lg" style="margin-right: 10px ! important">Daftar</a>
                                    </p>
                                </div>

                            </div>
                        </div>
                    </div>

                </div>
            </div>
        </div>
        <!-- End Modal Ubah Foto Profil -->

    <?php
    endif; ?>


    <!-- footer start -->
    <footer class="footer" style="padding: 40px 0px 10px 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                    <a href="#" class="logo">
                        <img src="images/logo-lokeritas2.png" alt="" class="logo-light" height="38" />
                    </a>
                    <p class="mt-4">Lokeritas adalah media penyedia lowongan kerja khusus penyandang disabilitas di
                        Sumatera Utara</p>
                    <ul class="social-icon social list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-facebook"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-twitter"></i></a>
                        </li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-instagram"></i></a>
                        </li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Lokeritas</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="tentang.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Tentang</a>
                        </li>
                        <li><a href="mitra.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Mitra</a></li>
                        <li><a href="hubungi-kami.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Hubungi
                                Kami</a></li>
                        <li><a href="kebijakan-privasi.php" class="text-foot"><i class="mdi mdi-chevron-right"></i>
                                Kebijakan Privasi</a></li>
                        <li><a href="faq.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> F.A.Q.</a></li>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title f-17">Penyedia Kerja</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="daftar-penyedia-kerja.php" class="text-foot"><i class="mdi mdi-chevron-right"></i>
                                Mendaftar</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right" disabled></i> Lihat Daftar
                                Kandidat</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Pasang Iklan
                                Lowongan</a></li>
                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Lainnya</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="tips-karir.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Tips
                                Karir</a></li>
                        <li><a href="karyaku.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Karyaku</a>
                        </li>
                        <li><a href="lowongan.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Lowongan
                                Terbaru</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Unduh Aplikasi Mobile
                                Lokeritas</a></li>
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
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function loginEx() {
            swal("Perhatian!", "Anda harus login terlebih dahulu!", "warning");
        }
    </script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/owl.carousel.min.js"></script>
    <script src="js/counter.int.js"></script>

    <script src="js/app.js"></script>
    <script src="js/home.js"></script>

</body>

</html>