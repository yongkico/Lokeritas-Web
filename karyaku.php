<?php
session_start();

if (isset($_SESSION['login'])) {
    $user_id = $_SESSION['userdata']['user_id'];
    $nama_depan = $_SESSION['userdata']['nama_depan'];
}


$site_key = '6LdxdvUUAAAAAC787QRuDWo3hm4_i4DTYS10fQiS'; // Diisi dengan site_key API Google reCapthca yang sobat miliki
$secret_key = '6LdxdvUUAAAAALwXeTGq4GMZ_R8RRPZ2WlG21aRh'; // Diisi dengan secret_key API Google reCapthca yang sobat miliki


if (isset($_POST['send'])) {
    if (isset($_POST['g-recaptcha-response'])) {
        $api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'];
        $response = @file_get_contents($api_url);
        $data = json_decode($response, true);

        if ($data['success']) {
            $comment = $_POST['komentar'];
            $success = true;

            $id_karyaku = $_POST['id'];
            $id_user = $user_id;
            $komentar = $_POST['komentar'];

            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://lokeritas.xyz/api-v1/karyaku_comments.php",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "id_karyaku=$id_karyaku&id_user=$id_user&komentar=$komentar",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded"
                ),
            ));

            $formCom = curl_exec($curl);

            curl_close($curl);

            echo '<script>alert("Komentar Berhasil dikirim");</script>';
        } else {
            echo '<script>alert("Komentar Gagal dikirim");</script>';
        }
    } else {
        echo '<script>alert("Komentar Gagal dikirim");</script>';
    }
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
                            <a href="#"><i class="mdi mdi-account mr-2  text-success" style="color: gray; font-size:16px"></i><?= $_SESSION['userdata']['nama_depan']; ?></a><span class="menu-arrow"></span>
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

    <!-- Search -->
    <div class="container mt-3">
        <div class="home-form-position">
            <div class="row ">
                <div class="col-lg-12">
                    <div class="home-registration-form p-4 mb-3">
                        <form class="registration-form" action="">
                            <div class="row">
                                <div class="col-lg-9">
                                    <div class="registration-form-box">
                                        <i class="mdi mdi-magnify"></i>
                                        <input type="text" id="exampleInputName1" name="keyword" class="form-control rounded registration-input-box autocomplete-selected" placeholder="Kata kunci pencarian .." required="">
                                    </div>
                                </div>
                                <div class="col-lg-3">
                                    <div class="registration-form-box">
                                        <button type="submit" class="btn btn-primary mb-3" style="width: 100%">Cari </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- end Search -->

    <!-- blog start -->
    <section class="section" style="padding:0px 0px 50px 0px">
        <div class="container">

            <?php
            $page = (isset($_GET['page'])) ? $_GET['page'] : 1;
            $keyword = (isset($_GET['keyword'])) ? $_GET['keyword'] : "";

            $limit = 6;
            $limitStart = ($page - 1) * $limit;

            if ($keyword == "") {
                $curl_get_karyaku = curl_init();
                curl_setopt($curl_get_karyaku, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/semua_karyaku.php');
                curl_setopt($curl_get_karyaku, CURLOPT_RETURNTRANSFER, 1);
                $results_karyaku = curl_exec($curl_get_karyaku);
                curl_close($curl_get_karyaku);

                $result_karyaku = json_decode($results_karyaku, true);
            } else {
                $curl_search_karyaku = curl_init();
                curl_setopt($curl_search_karyaku, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/semua_karyaku.php');
                curl_setopt($curl_search_karyaku, CURLOPT_RETURNTRANSFER, 1);
                $results_search_karyaku = curl_exec($curl_search_karyaku);
                curl_close($curl_search_karyaku);

                $search = json_decode($results_search_karyaku, true);
                $result_karyaku = FILTER_ARRAY_VALUES_REGEXP("/$keyword/i", $search);
            }


            $jumlahData = count($result_karyaku);
            $jumlahHalaman = ceil($jumlahData / $limit);

            $karyaku = array_slice($result_karyaku, $limitStart, $limit);



            ?>

            <?php if ($keyword !== "") : ?>
                <div class="row">
                    <i class="ml-5">Pencarian dengan kata kunci <strong>"<?= $keyword; ?>"</strong></i>
                </div>
            <?php else : ?>
                <div class="row"></div>
            <?php endif; ?>

            <div class="row">
                <?php foreach ($karyaku as $row) : ?>
                    <div class="col-lg-4 col-md-6 mb-4 mt-4 pb-2">
                        <div class="view_data blog position-relative overflow-hidden shadow rounded" id="<?= $row['id_karyaku']; ?>" data-toggle="modal" data-target="#myModal">
                            <div class="position-relative overflow-hidden">
                                <img src="<?= $row['gambar']; ?>" class="img-fluid rounded-top" alt="">
                                <div class="overlay rounded-top bg-dark"></div>
                                <div class="likes">
                                    <p class="text-white" style="text-align: left;"><?= $row['judul']; ?> </p>
                                </div>
                            </div>
                            <div class="content p-4 bg-light" style="padding: 10px 24px 24px 24px ! important">
                                <div>
                                    <p class=" mb-0" style="float: left"><i class="mdi mdi-account text-secondary"></i> <?= $row['nama_depan'] . ' ' . $row['nama_belakang']; ?></p>
                                    <p class="text-secondary" style="text-align: right"><i class="mdi mdi-eye mr-1"></i><?= $row['hit']; ?> <i class="mdi mdi-comment mr-1"></i><?= $row['jlhkomen']; ?></p>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!--end col-->
                <?php endforeach; ?>
                <!--end col-->

                <!-- Pagination -->
                <div class="col-lg-12" style="margin-top: 30px ! important">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination job-pagination justify-content-center mb-0">
                            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                <?php if ($keyword == "") : ?>
                                    <?php
                                    if ((($i >= $page - 3) && ($i <= $page + 3)) || ($i == 1) || ($i == $jumlahHalaman)) {
                                        if (($limitStart == 1) && ($i != 2))  echo "...";
                                        if (($limitStart != ($jumlahHalaman - 1)) && ($i == $jumlahHalaman))  echo "...";
                                        if ($i == $page) echo "<li class='page-item active'> <a class='page-link' href='" . "?p=" . $i . "'>" . $i . "</a> </li>";
                                        else echo "<li class='page-item'> <a class='page-link' href='" . "?page=" . $i . "'>" . $i . "</a> </li>";
                                        $limitStart = $i;
                                    }
                                    ?>
                                <?php else : ?>
                                    <?php
                                    if ((($i >= $page - 3) && ($i <= $page + 3)) || ($i == 1) || ($i == $jumlahHalaman)) {
                                        if (($limitStart == 1) && ($i != 2))  echo "...";
                                        if (($limitStart != ($jumlahHalaman - 1)) && ($i == $jumlahHalaman))  echo "...";
                                        if ($i == $page) echo "<li class='page-item active'> <a class='page-link' href='" . "?p=" . $i . "'>" . $i . "</a> </li>";
                                        else echo "<li class='page-item'> <a class='page-link' href='" . "?keyword=$keyword" . "&" . "page=" . $i . "'>" . $i . "</a> </li>";
                                        $limitStart = $i;
                                    }
                                    ?>
                                <?php endif; ?>
                            <?php endfor; ?>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </section>
    <!-- blog end -->
    <!-- subscribe end -->

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

    <!-- The Modal Daftar -->
    <!-- memulai modal nya. pada id="$myModal" harus sama dengan data-target="#myModal" pada tombol di atas -->
    <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content" id="data_siswa">
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
                        <li><a href="http://www.lokeritas.xyz/company" class="text-foot"><i class="mdi mdi-chevron-right" ></i> Tambah Lowongan Pekerjaan</a></li>
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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/sweetalert2.all.min.js"></script>
    <script language="javascript">
        $('body').on('hidden.bs.modal', '.modal', function() {
            $(this).removeData('bs.modal');
        });
    </script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function comentEx() {
            swal("Perhatian!", "Anda harus login terlebih dahulu!", "warning");
        }
    </script>

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

    <script>
        // ini menyiapkan dokumen agar siap grak :)
        $(document).ready(function() {
            // yang bawah ini bekerja jika tombol lihat data (class="view_data") di klik
            $('.view_data').click(function() {
                // membuat variabel id, nilainya dari attribut id pada button
                // id="'.$row['id'].'" -> data id dari database ya sob, jadi dinamis nanti id nya
                var id = $(this).attr("id");

                // memulai ajax
                $.ajax({
                    url: 'ajax/detail-karyaku.php', // set url -> ini file yang menyimpan query tampil detail data siswa
                    method: 'post', // method -> metodenya pakai post. Tahu kan post? gak tahu? browsing aja :)
                    data: {
                        id: id
                    }, // nah ini datanya -> {id:id} = berarti menyimpan data post id yang nilainya dari = var id = $(this).attr("id");
                    success: function(data) { // kode dibawah ini jalan kalau sukses
                        $('#data_siswa').html(data); // mengisi konten dari -> <div class="modal-body" id="data_siswa">
                        $('#myModal').modal("show"); // menampilkan dialog modal nya
                    }
                });
            });
        });
    </script>

</body>

</html>