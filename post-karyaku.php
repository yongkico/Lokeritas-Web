<?php
session_start();

if (isset($_FILES['file-img']['tmp_name'])) {

    function generateRandomString($length = 20)
    {
        $characters = 'abcdefghijklmnopqrstuvwxyz';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString . ' - ';
    }

    $ch = curl_init();

    $cFile = new CURLFile($_FILES['file-img']['tmp_name'], $_FILES['file-img']['type'], $fname = generateRandomString(20) . $_FILES['file-img']['name']);
    $data = array("file" => $cFile);
    $cFile = $_FILES['file-img']['name'];
    $size = $_FILES['file-img']['size'];

    if ($size <= 2000000) {
        curl_setopt($ch, CURLOPT_URL, "http://lokeritas.xyz/api-v1/uploadKaryaku.php");
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

        $response = curl_exec($ch);
        curl_close($ch);

        $email = $_SESSION['userdata']["email"];
        $curl_get = curl_init();
        curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/getbyEmailUser.php?email=' . $email);
        curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl_get);
        curl_close($curl_get);

        $result_get = json_decode($result, true);

        $id_user = $result_get['0']['id_user'];

        $judul = $_POST['judul'];
        $tag = $_POST['tag'];
        $deskripsi = $_POST['deskripsi'];
        $gambar = $fname;
        $status = '0';
        $komen = $_POST['komen'];

        $curl = curl_init();
        curl_setopt_array($curl, array(
            CURLOPT_URL => "http://lokeritas.xyz/api-v1/createKaryaku.php",
            CURLOPT_RETURNTRANSFER => true,
            CURLOPT_ENCODING => "",
            CURLOPT_MAXREDIRS => 10,
            CURLOPT_TIMEOUT => 0,
            CURLOPT_FOLLOWLOCATION => true,
            CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
            CURLOPT_CUSTOMREQUEST => "POST",
            CURLOPT_POSTFIELDS => "id_user=$id_user&judul=$judul&tag=$tag&deskripsi=$deskripsi&komen=$komen&gambar=$gambar&statuskaryaku=$status",
            CURLOPT_HTTPHEADER => array(
                "Content-Type: application/x-www-form-urlencoded"
            ),
        ));

        $result = curl_exec($curl);
        curl_close($curl);
        header('Refresh: 0; URL=post-karyaku-success.php');
    }
}


?>

<!DOCTYPE html>
<html lang="en" class="no-js">

<head>

    <style>
        .box {
            position: relative;
            background: #ffffff;
            width: 100%;
        }

        .box-header {
            color: #444;
            display: block;
            padding: 10px;
            position: relative;
            border-bottom: 1px solid #f4f4f4;
            margin-bottom: 10px;
        }

        .box-tools {
            position: absolute;
            right: 10px;
            top: 5px;
        }

        .dropzone-wrapper {
            border: 2px dashed #91b0b3;
            color: #92b0b3;
            position: relative;
            height: 150px;
        }

        .dropzone-desc {
            position: absolute;
            margin: 0 auto;
            left: 0;
            right: 0;
            text-align: center;
            width: 40%;
            top: 50px;
            font-size: 16px;
        }

        .dropzone,
        .dropzone:focus {
            position: absolute;
            outline: none !important;
            width: 100%;
            height: 150px;
            cursor: pointer;
            opacity: 0;
        }

        .dropzone-wrapper:hover,
        .dropzone-wrapper.dragover {
            background: #ecf0f5;
        }

        .preview-zone {
            text-align: center;
        }

        .preview-zone .box {
            box-shadow: none;
            border-radius: 0;
            margin-bottom: 0;
        }
    </style>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lokeritas - Lowongan Kerja Disabilitas Sumatera Utara</title>
    <meta name="description" content="" />
    <meta name="keywords" content="" />
    <meta name="author" content="Themesdesign" />

    <link rel="shortcut icon" href="images/favicon.ico">

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="css/bootstrap.min.css" type="text/css">
    <script src="js/sweetalert2.all.min.js"></script>
    <link rel='stylesheet' href="css/sweetalert2.min.css">

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
                        <li class="has-submenu"></li>
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
                            <h4 class="text-uppercase title mb-4">KARYAKU</h4>
                            <p>Kami ingin buktikan, bahwa kami memiliki keahlian dan kami mampu bekerja layaknya orang normal </p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- end home -->

        <?php if (isset($_POST['send'])) {

            if ($size > 2000000) {
                echo '<script>
        swal("Terjadi Kesalahan!", "Ukuran file tidak boleh melebihi 2 MB", "error")
    </script>';
            }
        }
        ?>
        <section>
            <form action="" method="POST" enctype="multipart/form-data">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="preview-zone hidden">
                                    <div class="box box-solid">
                                        <div class="box-header with-border">
                                            <div><b></b></div>
                                        </div>
                                        <div class="box-body"></div>
                                    </div>
                                </div>
                                <br>
                                <div class="dropzone-wrapper">
                                    <div class="dropzone-desc">
                                        <i class="glyphicon glyphicon-download-alt"></i>
                                        <p>Pilih gambar yang diinginkan atau tarik kesini. (Max: 2 MB)</p>
                                    </div>
                                    <input type="file" name="file-img" class="dropzone" accept="image/*" required="">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label class="text-secondary">Judul <span class="text-danger">*</span></label>
                                <input type="text" maxlength="55" class="form-control" placeholder="judul" name="judul" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label class="text-secondary">Tags <span class="text-danger">*</span></label>
                                <input type="text" maxlength="70" class="form-control" placeholder="seni" name="tag" required="">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label class="text-secondary">Deskripsi <span class="text-danger">*</span></label>
                                <textarea class="ckeditor" id="ckedtor" name="deskripsi"></textarea>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">
                                <label class="text-dark font-weight-bold"><input class="text-secondary" type="checkbox" name="komen" value="1" id="inlineCheckbox1" /> Aktifkan Komentar</label>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group position-relative">

                                <button type="submit" name="send" class="btn btn-primary pull-right">Terbitkan</button>
                                <button type="reset" class="btn btn-danger btn-xs remove-preview">
                                    <i class="fa fa-times"></i> Reset
                                </button>
                            </div>
                        </div>

                    </div>
                </div>
            </form>
        </section>

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

    <?php else : ?>
        <?php header('location: login.php'); ?>
    <?php endif; ?>

    <!-- javascript -->
    <script src="js/jquery.min.js"></script>
    <script type="text/javascript" src="ckeditor/ckeditor.js"></script>
    <script src="js/bootstrap.bundle.min.js"></script>
    <script src="js/jquery.easing.min.js"></script>
    <script src="js/plugins.js"></script>
    <script src="js/drop.js"></script>


    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>
    <script src="js/jquery.nice-select.min.js"></script>
    <script src="js/app.js"></script>
</body>

</html>