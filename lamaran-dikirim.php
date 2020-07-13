<?php
session_start();

if (isset($_SESSION['login'])) {
    $id = $_SESSION['userdata']['user_id'];
    $nama_depan = $_SESSION['userdata']['nama_depan'];
} else {
    header('location:login.php');
}

$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/lamaranUser.php?id_user=' . $id);
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl_get);
curl_close($curl_get);

$lamaran = json_decode($result, true);
$lamaranTerbaru = array_reverse($lamaran);



$limit = 6;
$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$limitStart = ($page - 1) * $limit;
$jumlahData = count($lamaranTerbaru);
$jumlahHalaman = ceil($jumlahData / $limit);


$dataLimit = array_slice($lamaranTerbaru, $limitStart, $limit);



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
                    <li class="has-submenu">
                        <a href="#"><i class="mdi mdi-account mr-2 text-success" style="font-size:16px"></i><?= $nama_depan ?></a><span class="menu-arrow"></span>
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




    <!-- Start home -->
    <section class="bg-half page-next-level" style="padding: 120px 0px 50px 0px;background: url('images/bg-2.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h4 class="text-uppercase title mb-4">Lamaran Dikirim</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- blog start -->
    <section class="section" style="padding: 20px 0px 40px 0px">
        <div class="container">
            <div class="row">
                <?php if (!empty($dataLimit)) : ?>
                    <div class="col-12">
                        <h5 class="text-primary">Daftar Lamaran Yang Sudah Dikirim</h5>
                    </div>
                <?php endif; ?>
                <!-- <div class="col-12"><span>Urutkan berdasarkan </span></div>
                <div class="col-12">
                    <input type="hidden" value="<?= $id; ?>" id="idnya">
                    <select class="form-control" id="waktu" style="width: 250px" onchange="urutkan(this)">
                        <option selected disabled>Urutkan Berdasarkan </option>
                        <option value="terbaru">Terbaru </option>
                        <option value="terlama">Terlama </option>
                    </select>
                </div> -->
            </div>
            <div class="row mt-5" id="daftarLamaran">
                <?php if (!empty($dataLimit)) : ?>
                    <?php foreach ($dataLimit as $data) : ?>
                        <div class="col-lg-4 col-md-6 mb-4 pb-2">
                            <div class="blog position-relative overflow-hidden shadow rounded" style="box-shadow: 1px 4px 8px 1px #e1e0e0 ! important">
                                <div class="position-relative overflow-hidden">
                                    <img src="<?= $data['logo']; ?>" style="height: 120px" alt="" class="img-fluid mx-auto d-block">
                                </div>
                                <div class="content p-4 bg-light">
                                    <h4><a href="#" class="title text-dark"><?= $data['nama_pekerjaan']; ?></a></h4>
                                    <p class="text-muted"><?= $data['email']; ?></p>
                                    <p class="text-info" style="margin-bottom: 0px"><i class="mdi mdi-send"></i> Dikirim Tanggal : <?= $data['tgl_submit']; ?></p>
                                    <?php if ($data['status'] == '0') : ?>
                                        <p class="text-primary"><i class="mdi mdi-file-restore"></i> Status : Menunggu</p>
                                    <?php elseif ($data['status'] == '1') : ?>
                                        <p class="text-info"><i class="mdi mdi-book-open"></i> Status : Review</p>
                                    <?php elseif ($data['status'] == '2') : ?>
                                        <p class="text-warning"><i class="mdi mdi-calendar-clock"></i> Status : Pending</p>
                                    <?php elseif ($data['status'] == '3') : ?>
                                        <p class="text-success"><i class="mdi mdi-checkbox-marked-circle"></i> Status : Diterima</p>
                                    <?php elseif ($data['status'] == '4') : ?>
                                        <p class="text-danger"><i class="mdi mdi-close-circle"></i> Status : Ditolak</p>
                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                        <!--end col-->
                    <?php endforeach; ?>
                <?php else : ?>
                    <div class="alert alert-primary mx-auto" role="alert"> Tidak ada lamaran kerja yang dikirim ! </div>
                <?php endif; ?>
                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination job-pagination justify-content-center mb-0">
                            <!-- <li class="page-item">
                                <?php if ($halamanAktif > 1) : ?>
                                    <a class="page-link" href="?hal=<?= $halamanAktif - 1; ?>">
                                        <i class="mdi mdi-chevron-double-left f-15"></i>
                                    </a>
                                <?php else : ?>
                                    <a class="page-link" href="?hal=<?= 1; ?>">
                                        <i class="mdi mdi-chevron-double-left f-15"></i>
                                    </a>
                                <?php endif; ?>
                            </li> -->

                            <?php for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                                <?php
                                if ((($i >= $page - 3) && ($i <= $page + 3)) || ($i == 1) || ($i == $jumlahHalaman)) {
                                    if (($limitStart == 1) && ($i != 2))  echo "...";
                                    if (($limitStart != ($jumlahHalaman - 1)) && ($i == $jumlahHalaman))  echo "...";
                                    if ($i == $page) echo "<li class='page-item active'> <a class='page-link' href='" . "?p=" . $i . "'>" . $i . "</a> </li>";
                                    else echo "<li class='page-item'> <a class='page-link' href='" . "?page=" . $i . "'>" . $i . "</a> </li>";
                                    $limitStart = $i;
                                }
                                ?>
                            <?php endfor; ?>

                            <!-- <li class="page-item">
                                <?php if ($halamanAktif < $jlhHalaman) : ?>
                                    <a class="page-link" href="?hal=<?= $halamanAktif + 1; ?>">
                                        <i class="mdi mdi-chevron-double-right f-15"></i>
                                    </a>
                                <?php else : ?>
                                    <a class="page-link" href="?hal=<?= $jlhHalaman; ?>">
                                        <i class="mdi mdi-chevron-double-right f-15"></i>
                                    </a>
                                <?php endif; ?>
                            </li> -->
                        </ul>
                    </nav>
                </div>
            </div>

        </div>
    </section>
    <!-- blog end -->



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

    <script>
        function urutkan(el) {
            var urutan = document.getElementById("waktu").value;
            var daftarLamaran = document.getElementById("daftarLamaran");
            var id = document.getElementById("idnya");

            //buat object ajax
            var xhr = new XMLHttpRequest();

            //cek kesiapan ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    daftarLamaran.innerHTML = xhr.responseText;
                }
            }

            //eksekusi ajax
            xhr.open('GET', 'ajax/onchangeLamaran.php?urutan=' + urutan + '&id=' + id.value, true);
            xhr.send();
        }
    </script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>

</body>

</html>