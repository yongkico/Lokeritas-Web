<?php

session_start();

$site_key = '6LcnNLEZAAAAANynkV3UH60dg7AgI_2Ccqrajvvk'; // Diisi dengan site_key API Google reCapthca yang sobat miliki
$secret_key = '6LcnNLEZAAAAALpYjEuQa8jrtpiOhvgFJuYMGrVD'; // Diisi dengan secret_key API Google reCapthca yang sobat miliki

//Tips Detail
if (isset($_GET['id'])) {
    $id_tips = $_GET['id'];
    $curl_get = curl_init();
    curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/tips_detail.php?id_tips=' . $id_tips . '');
    curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
    $result_get = curl_exec($curl_get);
    curl_close($curl_get);

    $result_get = json_decode($result_get, true);
    //Semua Tips
    $curl_get = curl_init();
    curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/semua_tips.php');
    curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
    $result_get_TK = curl_exec($curl_get);
    curl_close($curl_get);

    $result_get_TK = json_decode($result_get_TK, true);

    //API Counter Visitor
    $curl = curl_init();
    curl_setopt_array($curl, array(
        CURLOPT_URL => "http://lokeritas.xyz/api-v1/updateView.php",
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_ENCODING => "",
        CURLOPT_MAXREDIRS => 10,
        CURLOPT_TIMEOUT => 0,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
        CURLOPT_CUSTOMREQUEST => "POST",
        CURLOPT_POSTFIELDS => "id_tips=" . $id_tips . "",
        CURLOPT_HTTPHEADER => array(
            "Content-Type: application/x-www-form-urlencoded"
        ),
    ));

    $response = curl_exec($curl);

    curl_close($curl);
    /////////////////////////////

    if (isset($_POST['send'])) {

        if (isset($_POST['g-recaptcha-response'])) {
            $api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'];
            $response = @file_get_contents($api_url);
            $data = json_decode($response, true);

            if ($data['success']) {
                $comment = $_POST['komentar'];
                $success = true;

                $id_tips = $_GET['id'];
                $id_komentar = '';
                $nama = $_POST['nama'];
                $email = $_POST['email'];
                $website = $_POST['website'];
                $komentar = $_POST['komentar'];

                $curl = curl_init();
                curl_setopt_array($curl, array(
                    CURLOPT_URL => "http://lokeritas.xyz/api-v1/comments.php",
                    CURLOPT_RETURNTRANSFER => true,
                    CURLOPT_ENCODING => "",
                    CURLOPT_MAXREDIRS => 10,
                    CURLOPT_TIMEOUT => 0,
                    CURLOPT_FOLLOWLOCATION => true,
                    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                    CURLOPT_CUSTOMREQUEST => "POST",
                    CURLOPT_POSTFIELDS => "id_tips=$id_tips&id_komentar=$id_komentar&nama=$nama&email=$email&website=$website&komentar=$komentar",
                    CURLOPT_HTTPHEADER => array(
                        "Content-Type: application/x-www-form-urlencoded"
                    ),
                ));

                $formCom = curl_exec($curl);

                curl_close($curl);
            } else {
                $success = false;
            }
        } else {
            $success = false;
        }
    }

    /////////////////////////



    //Semua Tips
    $curl_get = curl_init();
    curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/comments.php?id_tips=' . $id_tips . '');
    curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
    $result_get_comment = curl_exec($curl_get);
    curl_close($curl_get);

    $result_get_comment = json_decode($result_get_comment, true);

    // echo $result_get_comment['2']['nama'];
} else {
    header('location: 404.html');
}

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
    <script src="js/jquery-1.12.4.min.js"></script>
    <script src="js/initial.js"></script>
    <script src='https://www.google.com/recaptcha/api.js'></script>


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
                    <a href="index.php" class="logo">
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
                            <a href="#"><i class="mdi mdi-account mr-2 text-success" style="color: gray; font-size:16px"></i><?= $_SESSION['userdata']['nama_depan']; ?></a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="profile.php">Profil</a></li>
                                <li><a href="lamaran-dikirim.php">Lamaran dikirim</a></li>
                                <li><a href="history-karyaku.php">History Karyaku</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                        <li class="has-submenu">
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
                    <a href="index.php" class="logo">
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
                        <li><a href="lowongan.php">Lowongan</a></li>
                        <li><a href="tips-karir.php">Tips Karir</a></li>
                        <li><a href="daftar-perusahaan.php">Daftar Perusahaan</a></li>
                        <li><a href="karyaku.php">Karyaku</a></li>
                        <div class="buy-button">
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pilihanMasuk">Masuk</a>
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
                        <h4 class="text-uppercase title mb-4"><?php echo strtolower($result_get['0']['judul']); ?></h4>
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
                                <form role="search" method="get" id="searchform" class="searchform" action="tips-karir.php">
                                    <div>
                                        <input type="text" class="border rounded" name="search" id="s" placeholder="Cari Keywords..." required="">
                                        <input type="submit" id="searchsubmit" value="Search">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- SEARCH -->



                        <!-- RECENT POST -->
                        <div class="widget mb-4 pb-2">
                            <h4 class="widget-title">Artikel Terbaru</h4>
                            <?php $i = 0;
                            foreach ($result_get_TK as $row) : if ($i == 3) {
                                    break;
                                } ?>
                                <div class="mt-4">
                                    <div class="clearfix post-recent">
                                        <div class="post-recent-thumb float-left"> <a href="tips-karir-detail.php?id=<?php echo $row['id_tips']; ?>"> <img alt="img" src="<?= $row['gambar']; ?>" class="img-fluid rounded"></a></div>
                                        <div class="post-recent-content float-left"><a href="tips-karir-detail.php?id=<?php echo $row['id_tips']; ?>" class="text-dark"><?php echo strtolower($row['judul']); ?></a><span class="text-muted mt-2"><?php echo date("d F Y", strtotime($row['terbit'])); ?></span></div>
                                    </div>
                                </div>
                            <?php $i++;
                            endforeach; ?>
                        </div>
                        <!-- RECENT POST -->
                    </div>
                </div>
                <!--end col-->
                <div class="col-lg-8 col-md-6 col-12 order-1 order-md-2">
                    <div class="shadow rounded p-4">
                        <div class="blog-details-img">
                            <img src=" <?php echo $result_get['0']['gambar']; ?>" style="width: 680px" alt="" class="img-fluid mx-auto rounded d-block">
                        </div>
                        <div class="blog-details meta mt-3">
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item mr-4">
                                    <p class="text-muted mb-0 mdi mdi-calendar-range mr-1">
                                        <?php echo date("d F Y", strtotime($result_get['0']['terbit'])); ?>
                                    </p>
                                </li>

                                <li class="list-inline-item mr-4">
                                    <p class="text-muted mb-0 mdi mdi-pencil mr-1">
                                        <?php echo $result_get['0']['nama']; ?>
                                    </p>
                                </li>
                                <li class="list-inline-item mr-4">
                                    <p class="text-muted mb-0 mdi mdi-eye mr-1">
                                        <?php echo $result_get['0']['hit']; ?>
                                    </p>
                                </li>

                            </ul>
                        </div>

                        <div class="blog-details-desc p-2">
                            <h5 class="mb-3"><a href="#" class="text-dark"><?php echo strtolower($result_get['0']['judul']); ?></a></h5>

                            <p class="text-muted mb-3 f-13" style="text-align: justify"><?php echo $result_get['0']['kontent']; ?></p>
                        </div>
                    </div>

                    <div class="rounded border mt-4 p-4">
                        <h5 class="text-dark">Komentar</h5>
                        <?php
                        foreach ($result_get_comment as $row) : ?>

                            <hr id="hr">
                            <img data-name="<?php echo $row['nama']; ?>" class="initial" style="border-radius: 5px;" width="30px">
                            <a href="http://<?php echo $row['website']; ?>"><?php echo $row['nama']; ?></a><span style="color: #a3a4a4;"> (<?php echo $row['email']; ?>)</span><br><span style="font-size: 30px;">&ldquo;</span> <?php echo $row['komentar']; ?>
                            <br>
                            <script>
                                $('.initial').initial();
                            </script>
                        <?php
                        endforeach; ?>


                    </div>


                    <?php if (isset($_SESSION["login"])) : ?>

                        <div class="rounded border mt-4 p-4">
                            <?php if (isset($success)) {
                                if ($success == true) {
                                    echo '<p class="text-center" style="color: red; font-weight: bold;">Komentar anda berhasil dikirim</p>
                                ';
                                } else {
                                    echo '<p class="text-center" style="color: red; font-weight: bold;">Komentar anda gagal dikirim, harap verifikasi captcha</p>
                                ';
                                }
                            } ?>

                            <form name="contact-form" method="post" action="tips-karir-detail.php?id=<?php echo $_GET['id']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-account text-muted f-17"></i>
                                            <?php
                                            $first = $_SESSION['userdata']['nama_depan'];
                                            $last = $_SESSION['userdata']['nama_belakang'];
                                            $email = $_SESSION['userdata']['email'];
                                            ?>
                                            <input name="nama" id="name" type="text" class="form-control blog-details" value="<?php echo '' . $first . ' ' . $last . '
                                                                                                                                 ' ?>" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-email text-muted f-17"></i>
                                            <input name="email" id="email" type="email" class="form-control blog-details" value="<?php echo $email;
                                                                                                                                    ?>" readonly>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-web text-muted f-17"></i>
                                            <input name="website" id="url" type="url" class="form-control blog-details" placeholder="Website" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-comment-processing text-muted f-17"></i>
                                            <textarea name="komentar" id="comments" rows="4" class="form-control blog-details" placeholder="Komentar" required=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div><br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Kirim Komentar">
                                    </div>
                                </div>
                            </form>
                            <!-- /form -->

                        </div>
                    <?php else : ?>
                        <div class="rounded border mt-4 p-4">
                            <?php if (isset($success)) {
                                if ($success == true) {
                                    echo '<p class="text-center" style="color: red; font-weight: bold;">Komentar anda berhasil dikirim</p>
                                ';
                                } else {
                                    echo '<p class="text-center" style="color: red; font-weight: bold;">Komentar anda gagal dikirim, harap verifikasi captcha</p>
                                ';
                                }
                            } ?>

                            <form name="contact-form" method="post" action="tips-karir-detail.php?id=<?php echo $_GET['id']; ?>">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-account text-muted f-17"></i>
                                            <input name="nama" id="name" type="text" class="form-control blog-details" placeholder="Nama" required="">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-email text-muted f-17"></i>
                                            <input name="email" id="email" type="email" class="form-control blog-details" placeholder="Email" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-web text-muted f-17"></i>
                                            <input name="website" id="url" type="url" class="form-control blog-details" placeholder="Website" required="">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-comment-processing text-muted f-17"></i>
                                            <textarea name="komentar" id="comments" rows="4" class="form-control blog-details" placeholder="Komentar" required=""></textarea>
                                        </div>
                                    </div>
                                </div>

                                <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div><br>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Kirim Komentar">
                                    </div>
                                </div>
                            </form>
                            <!-- /form -->

                        </div>
                    <?php endif ?>


                </div>
            </div>
        </div>
    </section>
    <!-- BLOG LIST END -->

    <!-- The Modal Login -->
    <div class="modal" id="pilihanMasuk">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Masuk</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-6 bg-info rounded" style="padding:50px 50px 50px 50px;border:7px solid white">
                                <p class="text-white" style="font-size: 24px;text-align:center">Sebagai Penyandang
                                    Disabilitas Pencari Kerja</p>
                                <p style="text-align: center;margin-top:30px"><a href="login.php" class="btn btn-light btn-lg" style="margin-right: 10px ! important" target="_blank">Masuk</a>
                                </p>
                            </div>
                            <div class="col-lg-6 bg-warning rounded" style="padding:50px 50px 50px 50px;border:7px solid white">
                                <p class="text-white" style="font-size: 24px;text-align:center">Sebagai Penyedia Kerja
                                    Penyandang Disabilitas</p>
                                <p style="text-align: center;margin-top:30px"><a href="http://lokeritas.xyz/company" class="btn btn-light btn-lg" style="margin-right: 10px ! important" target="_blank">Masuk</a>
                                </p>
                            </div>

                        </div>
                    </div>
                </div>

            </div>
        </div>
    </div>
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
                        <!-- <li><a href="mitra.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Mitra</a></li> -->
                        <li><a href="hubungi-kami.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Hubungi Kami</a></li>
                        <li><a href="kebijakan-privasi.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Kebijakan Privasi</a></li>
                        <li><a href="faq.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> F.A.Q.</a></li>

                    </ul>
                </div>

                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title f-17">Penyedia Kerja</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="daftar-penyedia-kerja.php" class="text-foot"><i class="mdi mdi-chevron-right"></i> Mendaftar</a></li>
                        <li><a href="http://www.lokeritas.xyz/company" class="text-foot"><i class="mdi mdi-chevron-right"></i> Tambah Lowongan Pekerjaan</a></li>
                        <li><a href="http://www.lokeritas.xyz/company" class="text-foot"><i class="mdi mdi-chevron-right"></i> Lihat Lamaran Masuk</a></li>
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
    <script data-account="IAsDntwcno" src="https://cdn.userway.org/widget.js"></script>
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/plugins.js"></script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>

    <!-- initial js -->

</body>

</html>