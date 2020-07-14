<?php
session_start();
if (isset($_SESSION['login'])) {
    $nama_depan = $_SESSION['userdata']['nama_depan'];
}
$site_key = '6LcnNLEZAAAAANynkV3UH60dg7AgI_2Ccqrajvvk'; // Diisi dengan site_key API Google reCapthca yang sobat miliki
$secret_key = '6LcnNLEZAAAAALpYjEuQa8jrtpiOhvgFJuYMGrVD'; // Diisi dengan secret_key API Google reCapthca yang sobat miliki

if (isset($_POST['send'])) {

    if (isset($_POST['g-recaptcha-response'])) {
        $api_url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . $secret_key . '&response=' . $_POST['g-recaptcha-response'];
        $response = @file_get_contents($api_url);
        $data = json_decode($response, true);

        if ($data['success']) {
            $success = true;
            $nama = $_POST['name'];
            $email = $_POST['email'];
            $judul = $_POST['judul'];
            $pesan = $_POST['pesan'];

            //API Hubungi Kami
            $curl = curl_init();
            curl_setopt_array($curl, array(
                CURLOPT_URL => "http://lokeritas.xyz/api-v1/hubungi.php",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 0,
                CURLOPT_FOLLOWLOCATION => true,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => "nama=$nama&email=$email&judul=$judul&pesan=$pesan",
                CURLOPT_HTTPHEADER => array(
                    "Content-Type: application/x-www-form-urlencoded"
                ),
            ));

            $response_hubungi = curl_exec($curl);
            curl_close($curl);
        } else {
            $success = false;
        }
    } else {
        $success = false;
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
    <section class="bg-half page-next-level" style="padding: 120px 0px 50px 0px;background: url('images/bg-2.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h4 class="text-uppercase title mb-4">Hubungi Kami</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- CONTACT FORM START -->
    <section class="section" style="padding: 30px 0px 40px 0px">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h4 class="text-dark mb-0">Hubungi Kami :</h4>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-8 col-md-7 mt-4 pt-2">
                    <div class="custom-form rounded border p-4">
                        <div id="message"></div>
                        <?php if (isset($success)) {
                            if ($success == true) {
                                echo '<p class="text-center" style="color: red; font-weight: bold;">Pesan Anda berhasil dikirim, terimakasih telah menghubungi kami</p>
                                ';
                            } else {
                                echo '<p class="text-center" style="color: red; font-weight: bold;">Pesan Anda gagal dikirim, harap verifikasi captcha</p>
                                ';
                            }
                        } ?>
                        <form method="post" action="" name="contact-form" id="contact-form">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Nama</label>
                                        <input name="name" id="name2" type="text" class="form-control resume" placeholder="Masukan nama.." required="">
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Email</label>
                                        <input name="email" id="email1" type="email" class="form-control resume" placeholder="Masukan email.." required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Judul</label>
                                        <input type="text" class="form-control resume" name="judul" id="subject" placeholder="Judul.." required="">
                                    </div>
                                </div>
                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Pesan</label>
                                        <textarea name="pesan" id="comments" rows="5" class="form-control resume" placeholder="Pesan.." required=""></textarea>
                                    </div>
                                </div>
                            </div>
                            <div class="g-recaptcha" data-sitekey="<?php echo $site_key; ?>"></div><br>
                            <div class="row">
                                <div class="col-sm-12">
                                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Kirim">
                                    <div id="simple-msg"></div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-lg-4 col-md-5 mt-4 pt-2">
                    <div class="border rounded text-center p-4" style="box-shadow: 1px 4px 8px 1px #e1e0e0;">
                        <h5 class="text-dark pb-3">Informasi Kontak</h5>
                        <div class="contact-location rounded mt-5 p-4 job-box" style="box-shadow: 1px 4px 8px 1px #657efd;">
                            <div class="contact-location-icon bg-white text-dark rounded-pill">
                                <i class="mdi mdi-map-marker"></i>
                            </div>
                            <p class="text-primary pt-4 f-20 mb-0">Jl. Thamrin No. 124 Medan - 20212, Kec. Medan Area, Kota Medan, Sumatera Utara</p>
                        </div>

                        <div class="contact-location rounded mt-5 p-4 job-box" style="box-shadow: 1px 4px 8px 1px #657efd;">
                            <ul style="list-style-type: none;text-align:left">
                                <li><a href="#" class="text-primary"><i class="mdi mdi-email"></i> &nbsp;:&nbsp; info@lokeritas.xyz</a></li>
                                <li><a href="#" class="text-primary"><i class="mdi mdi-facebook"></i> &nbsp;:&nbsp; Lokeritas Indonesia</a></li>
                                <li><a href="#" class="text-primary"><i class="mdi mdi-whatsapp"></i> &nbsp;:&nbsp; lokeritasid </a></li>
                                <li><a href="#" class="text-primary"><i class="mdi mdi-instagram"></i> &nbsp;:&nbsp; +6281200129898</a></li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- CONTACT FORM END -->


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
    <script src="js/jquery.min.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/plugins.js"></script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>

    <script src='https://www.google.com/recaptcha/api.js'></script>

</body>

</html>