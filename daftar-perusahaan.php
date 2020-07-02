<?php
session_start();
if (isset($_SESSION['login'])) {
    $nama_depan = $_SESSION['userdata']['nama_depan'];
} 

$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$search = (isset($_GET['search'])) ? $_GET['search'] : "";

$limit = 6;
$limitStart = ($page - 1) * $limit;



if ($search == "") {
    $curl_get = curl_init();
    curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/semua_perusahaan.php');
    curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
    $result_get = curl_exec($curl_get);
    curl_close($curl_get);

    $result_perusahaan = json_decode($result_get, true);
} else {
    $curl_get = curl_init();
    curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/semua_perusahaan.php');
    curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
    $result_get = curl_exec($curl_get);
    curl_close($curl_get);

    $search_result = json_decode($result_get, true);

    $result_perusahaan = FILTER_ARRAY_VALUES_REGEXP_P("/$search/i", $search_result);
}


$jumlahData = count($result_perusahaan);
$jumlahHalaman = ceil($jumlahData / $limit);
$daftar_perusahaan = array_slice($result_perusahaan, $limitStart, $limit);

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
                    <?php if (isset($_SESSION['login'])) : ?>
                        <li class="has-submenu">
                            <a href="#"><i class="mdi mdi-account mr-2 text-success" style="color: gray; font-size:16px"></i><?= $nama_depan; ?></a><span class="menu-arrow"></span>
                            <ul class="submenu">
                                <li><a href="profile.php">Profil</a></li>
                                <li><a href="lamaran-dikirim.php">Lamaran dikirim</a></li>
                                <li><a href="history-karyaku.php">History Karyaku</a></li>
                                <li><a href="logout.php">Logout</a></li>
                            </ul>
                        </li>
                    <?php else : ?>
                        <div class="buy-button">
                            <a href="login.php" class="btn btn-primary" style="margin-right: 10px ! important">Masuk</a>
                            <a href="#" class="btn btn-primary" data-toggle="modal" data-target="#pilihanDaftar">Daftar</a>
                        </div>
                    <?php endif; ?>
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

    <!-- Start home -->
    <section class="bg-half page-next-level" style="padding: 120px 0px 10px 0px;background: url('images/bg-2.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h4 class="text-uppercase title mb-4">SEMUA PERUSAHAAN</h4>
                    </div>
                </div>
            </div>
            <div class="home-form-position">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="home-registration-form p-4 mb-3">
                            <form class="registration-form">
                                <div class="row">
                                    <div class="col-lg-9 col-md-6">
                                        <div class="registration-form-box">
                                            <i class="fa fa-briefcase"></i>
                                            <input type="text" id="exampleInputName1" name="search" class="form-control rounded registration-input-box" placeholder="Cari Nama Perusahaan..." required="asa">
                                        </div>
                                    </div>
                                    <div class="col-lg-3 col-md-6">
                                        <div class="registration-form-box">

                                            <button type="submit" class="btn btn-primary" style="width: 100%">Cari</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->


    <!-- blog start -->
    <section class="section" style="padding: 30px 0px 40px 0px">
        <div class="container">
            <?php if ($search !== "") : ?>
                <div class="row mt-3 mb-3">
                    <i class="ml-5">Pencarian dengan kata kunci <strong>"<?= $search; ?>"</strong></i>
                </div>
            <?php else : ?>
                <div class="row mt-3 mb-3"></div>
            <?php endif; ?>
            <div class="row">
                <?php if (!empty($daftar_perusahaan)) : ?>
                    <?php foreach ($daftar_perusahaan as $row) : ?>
                        <div class="col-lg-4 col-md-6 mb-4 pb-2">
                            <div class="blog position-relative overflow-hidden shadow rounded">
                                <div class="position-relative overflow-hidden">
                                    <img src="<?= $row['logo']; ?>" style="width: 30%; padding-top:20px;" alt="" class="img-fluid mx-auto d-block">
                                </div>
                                <div class="content p-4 bg-light">
                                    <h5><?= $row['nama_perusahaan']; ?></h5>
                                    <p class="text-muted" style="text-transform: capitalize"><?= $row['sektor_perusahaan']; ?> | <?= $row['alamat']; ?></p>
                                    <a href="detail-perusahaan.php?id_perusahaan=<?= $row['id_perusahaan']; ?>" class="btn btn-info">Selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="alert alert-warning mx-auto" role="alert">
                        Perusahaan tidak ada/belum terdaftar !
                    </div>
                <?php endif; ?>
            </div>
            <!-- Pagination -->
            <div class="col-lg-12" style="margin-top: 30px ! important">
                <nav aria-label="Page navigation example">
                    <ul class="pagination job-pagination justify-content-center mb-0">
                        <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                            <?php if ($search == "") : ?>
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
                                    else echo "<li class='page-item'> <a class='page-link' href='" . "?search=$search" . "&" . "page=" . $i . "'>" . $i . "</a> </li>";
                                    $limitStart = $i;
                                }
                                ?>
                            <?php endif; ?>
                        <?php endfor; ?>
                    </ul>
                </nav>
            </div>
        </div>
    </section>
    <!-- blog end -->




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


    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function loginEx() {
            swal("Perhatian!", "Anda harus masuk terlebih dahulu!", "warning");
        }
    </script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>

</body>

</html>