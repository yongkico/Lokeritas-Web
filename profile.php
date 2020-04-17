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
    <section class="bg-half page-next-level" style="padding:140px 0px 30px 0px;background: url('https://www.expatica.com/app/uploads/2018/11/Networking-1-1920x1080.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="candidates-profile-details text-center">
                        <div class="blog">
                            <img src="https://s2.bukalapak.com/img/7620068213/w-1000/CETAK_FOTO_dan_PAS_FOTO_.png" height="150" alt="" class="d-block mx-auto shadow rounded-pill mb-4">

                            <div class="author" style="margin:50px 0px 0px 169px">
                                <p class="btn btn-primary btn-sm" data-toggle="modal" data-target="#ubahFotoProfil"><i class="mdi mdi-pencil text-light"></i> <a href="javascript:void(0)" class="text-light user">Ubah Foto Profil</a></p>
                            </div>
                        </div>
                        <h3 class="text-white mb-2">Samsul Sinaga</h3>
                        <span class="badge badge-light" style="font-size: 15px;padding:10px 15px 10px 15px"> samsul@gmail.com &nbsp;|&nbsp; 081212120098 </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- CANDIDATES PROFILE START -->
    <section class="section" style="padding:30px 0px 40px 0px">
        <div class="container">

            <!-- Profile Box -->

            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <div class="row" style="margin:20px 0px 20px 0px">
                                <div class="col-lg-10">
                                    <h4 class="text-info">Informasi Pribadi :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#informasiPribadi"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table border-top" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">Nama</td>
                                        <td>Samsul Sinaga</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Ringkasan Pribadi</td>
                                        <td>"Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami"</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Email</td>
                                        <td>samsulsin@gmail.com</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Nomor HP</td>
                                        <td>081244169912</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Jenis Kelamin</td>
                                        <td>Pria</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Tanggal Lahir</td>
                                        <td>22 Jan 1999</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Status</td>
                                        <td>Belum Menikah</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Alamat</td>
                                        <td>Jl. Sehati, Gg. Dame, No.12, Kec. Medan Timur, Kota Medan, Sumatera Utara</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Mencari Pekerjaan</td>
                                        <td><span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> Ya </span></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <div class="row" style="margin:20px 0px 20px 0px">
                                <div class="col-lg-10">
                                    <h4 class="text-info">Rincian Disabilitas :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#rincianDisabilitas"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">Jenis Disabilitas</td>
                                        <td>Tuna Daksa</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Alat Bantu</td>
                                        <td>Kursi Roda</td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Penjelasan</td>
                                        <td>Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami. Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <div class="row" style="margin:20px 0px 20px 0px">
                                <div class="col-lg-10">
                                    <h4 class="text-info">Pendidikan Terakhir :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#pendidikanTerakhir"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">2012 - 2016</td>
                                        <td>S1 Jurusan DKV - USU</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <div class="row" style="margin:20px 0px 20px 0px">
                                <div class="col-lg-10">
                                    <h4 class="text-info">Pengalaman Bekerja :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#pengalamanBekerja"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">2016 - 2017</td>
                                        <td>PT. Doorjek Indonesia - User Interface Design</td>
                                    </tr>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">2017</td>
                                        <td>UD. Sempurna Printing - Desain Grafis</td>
                                    </tr>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">2017 - 2020</td>
                                        <td>Unitech Garuda - UI/UX Design</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <div class="row" style="margin:20px 0px 20px 0px">
                                <div class="col-lg-10">
                                    <h4 class="text-info">Keterampilan :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#keterampilan"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table" style="border:none;">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold;padding-top:20px">
                                            <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> Desain Grafis </span>
                                            <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> UI/UX Design </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <div class="row" style="margin:20px 0px 20px 0px">
                                <div class="col-lg-10">
                                    <h4 class="text-info">Karir yang diminati :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#karirYangDiminati"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold;padding-top:20px">
                                            <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> Desain dan Arsitektur </span>
                                            <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"> Editing, Media dan Informasi </span>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->

            <!-- Profile Box -->
            <div class="row">
                <div class="col-lg-12 mt-3" style="margin-top: 0px !important">
                    <div style="box-shadow: 1px 4px 8px 1px #e1e0e0;" class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                        <div class="container">
                            <div class="row" style="margin:20px 0px 20px 0px">
                                <div class="col-lg-10">
                                    <h4 class="text-info">Unggah Berkas :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#unggahBerkas"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <div style="padding:20px 10px 10px 10px" class="border-top">
                                <p style="margin-top:10px" class="text-info">Daftar dokumen yang telah di upload :</p>
                            </div>
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <th>Keterangan</th>
                                        <th>Nama Dokumen</th>
                                    </tr>
                                    <tr>
                                        <td>CV</td>
                                        <td><a href="#">CV - Samsul Sinaga.pdf</a></td>
                                    </tr>
                                    <tr>
                                        <td>Sertifikat Pelatihan</td>
                                        <td><a href="#">Samsul Sinaga.pdf</a></td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Profile Box -->
        </div>
    </section>
    <!-- CANDIDATES PROFILE END -->

    <!-- The Modal Informasi Pribadi -->
    <div class="modal" id="informasiPribadi">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Informasi Pribadi</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3" style="margin-top:0px ! important">
                                <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                    <form>
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Nama Lengkap :</label>
                                                    <input id="first-name" type="text" name="name" class="form-control resume" autocomplete="off" placeholder="Samsul Sinaga">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Email :</label>
                                                    <input id="middle-name" style="pointer-events:none;" type="text" class="form-control resume bg-light" placeholder="samsulku@gmail.com">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Nomor HP :</label>
                                                    <input id="surname-name" type="text" class="form-control resume" autocomplete="off" placeholder="0812 7870 0012">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Jenis Kelamin :</label>
                                                    <div class="form-button">
                                                        <select class="nice-select rounded">
                                                            <option data-display="Pria">Jenis Kelamin</option>
                                                            <option value="1">Pria</option>
                                                            <option value="2">Wanita</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Tanggal Lahir :</label>
                                                    <input id="date-of-birth" type="date" class="form-control resume" placeholder="13/02/1999">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Status</label>
                                                    <div class="form-button">
                                                        <select class="nice-select rounded">
                                                            <option data-display="Belum Menikah">Status</option>
                                                            <option value="1">Sudah Menikah</option>
                                                            <option value="2">Belum Menikah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Mencari Pekerjaan</label>
                                                    <div class="form-button">
                                                        <select class="nice-select rounded">
                                                            <option value="1">Ya</option>
                                                            <option value="2">Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Ringkasan Pribadi</label>
                                                    <textarea id="surname-name" class="form-control" rows="3" placeholder="Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami Hambatan yang saya alami adalah saya susah berjalan atas musibah yang saya alami"></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Alamat</label>
                                                    <input id="surname-name" type="text" class="form-control resume" placeholder="Jl. Hariaman Purba, No. 12">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Kabupaten/Kota</label>
                                                    <input id="surname-name" type="text" class="form-control resume" placeholder="Kab. Simalungun">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Provinsi</label>
                                                    <input id="surname-name" type="text" class="form-control resume" placeholder="Sumatera Utara">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Ganti Password</label>
                                                    <input id="surname-name" type="password" autocomplete="off" class="form-control resume" placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-white">Ganti Password</label>
                                                    <input id="surname-name" type="password" autocomplete="off" class="form-control resume" placeholder="Konfirmasi Password">
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Informasi Pribadi -->

    <!-- The Modal Rincian Disabilitas -->
    <div class="modal" id="rincianDisabilitas">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Rincian Disabilitas</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3" style="margin-top:0px ! important">
                                <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                    <form>
                                        <div class="row mt-4">
                                            <div class="col-md-12 ">
                                                <label class="text-muted" style="font-weight: 600">Jenis Ketunaan </label><br>

                                                <div class="p-4" style="padding:0px 0px 0px 0px !important">
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="ketunaan[]" value="Tuna Daksa">
                                                                <label class="custom-control-label" for="customCheck1">Tuna Daksa</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 10px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="ketunaan[]" value="Tuna Netra">
                                                                <label class="custom-control-label" for="customCheck2">Tuna Netra</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 10px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck3" name="ketunaan[]" value="Tuna Runggu">
                                                                <label class="custom-control-label" for="customCheck3">Tuna Runggu</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline" style="margin:0px 0px 0px 0px">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck4" name="ketunaan[]" value="Tuna Wicara">
                                                                <label class="custom-control-label" for="customCheck4">Tuna Wicara</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:11px 20px 11px 5px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck5" name="ketunaan[]" value="Tuna Grahita">
                                                                <label class="custom-control-label" for="customCheck5">Tuna Grahita</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Alat Bantu :</label>
                                                    <input id="middle-name" type="text" class="form-control resume" placeholder="-">
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Penjelasan Singkat :</label>
                                                    <textarea id="surname-name" type="text" class="form-control resume" autocomplete="off" placeholder="Saya kesulitan dalam menemukan kesulitan yang sulit saya miliki"></textarea>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Rincian Disabilitas -->

    <!-- The Modal Pendidikan Terakhir -->
    <div class="modal" id="pendidikanTerakhir">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pendidikan Terakhir</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3" style="margin-top:0px ! important">
                                <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                    <form>
                                        <div class="row mt-4">

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Pendidikan Terakhir :</label>
                                                    <div class="form-button">
                                                        <select class="nice-select rounded">
                                                            <option data-display="SD">Pendidikan Terakhir</option>
                                                            <option value="SD">SD</option>
                                                            <option value="SMP">SMP</option>
                                                            <option value="SMA">SMA</option>
                                                            <option value="D1">D1</option>
                                                            <option value="D2">D2</option>
                                                            <option value="D3">D3</option>
                                                            <option value="D4">D4</option>
                                                            <option value="S1">S1</option>
                                                            <option value="S2">S2</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Jurusan :</label>
                                                    <input id="middle-name" type="text" class="form-control resume" placeholder="Kosongkan jika tidak perlu">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Nama Sekolah :</label>
                                                    <input id="middle-name" type="text" class="form-control resume" value="SMA KARTIKA">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Periode :</label>
                                                    <div class="form-button">
                                                        <select class="rounded" style="width:100px;padding-left:10px; height: 40px ! important">
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2000">2000</option>
                                                            <option value="1999">1999</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1989">1989</option>
                                                            <option value="1988">1988</option>
                                                            <option value="1987">1987</option>
                                                            <option value="1986">1986</option>
                                                            <option value="1985">1985</option>
                                                            <option value="1984">1984</option>
                                                            <option value="1983">1983</option>
                                                            <option value="1982">1982</option>
                                                            <option value="1981">1981</option>
                                                            <option value="1980">1980</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-1" style="padding: 38px 15px 0px 30px ! important">
                                                <div class="form-group app-label">
                                                    <label class="text-muted" style="font-weight: bolder"> - </label>
                                                </div>
                                            </div>

                                            <div class="col-md-9">
                                                <div class="form-group app-label">
                                                    <label class="text-white">.</label>
                                                    <div class="form-button">
                                                        <select class="rounded" style="width:100px;padding-left:10px; height: 40px ! important">
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2000">2000</option>
                                                            <option value="1999">1999</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1990">1990</option>
                                                            <option value="1989">1989</option>
                                                            <option value="1988">1988</option>
                                                            <option value="1987">1987</option>
                                                            <option value="1986">1986</option>
                                                            <option value="1985">1985</option>
                                                            <option value="1984">1984</option>
                                                            <option value="1983">1983</option>
                                                            <option value="1982">1982</option>
                                                            <option value="1981">1981</option>
                                                            <option value="1980">1980</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Pendidikan Terakhir -->


    <!-- The Modal Pengalaman Bekerja -->
    <div class="modal" id="pengalamanBekerja">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Pengalaman Bekerja</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3" style="margin-top:0px ! important">
                                <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                    <form>
                                        <div class="row mt-4">

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Nama Perusahaan :</label>
                                                    <input id="middle-name" type="text" class="form-control resume" placeholder="Kosongkan jika tidak perlu">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Nama Pekerjaan :</label>
                                                    <input id="middle-name" type="text" class="form-control resume" value="SMA KARTIKA">
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Periode :</label>
                                                    <div class="form-button">
                                                        <select class="rounded" style="width:100px;padding-left:10px; height: 40px ! important">
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2000">2000</option>
                                                            <option value="1999">1999</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1990">1990</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-1" style="padding:40px 15px 0px 35px">
                                                <div class="form-group app-label">
                                                    <label class="text-muted" style="font-weight: bolder"> - </label>
                                                </div>
                                            </div>

                                            <div class="col-md-9">
                                                <div class="form-group app-label">
                                                    <label class="text-white">.</label>
                                                    <div class="form-button">
                                                        <select class="rounded" style="width:100px;padding-left:10px; height: 40px ! important">
                                                            <option value="2020">2020</option>
                                                            <option value="2019">2019</option>
                                                            <option value="2018">2018</option>
                                                            <option value="2017">2017</option>
                                                            <option value="2016">2016</option>
                                                            <option value="2015">2015</option>
                                                            <option value="2014">2014</option>
                                                            <option value="2013">2013</option>
                                                            <option value="2012">2012</option>
                                                            <option value="2011">2011</option>
                                                            <option value="2010">2010</option>
                                                            <option value="2009">2009</option>
                                                            <option value="2008">2008</option>
                                                            <option value="2007">2007</option>
                                                            <option value="2006">2006</option>
                                                            <option value="2005">2005</option>
                                                            <option value="2004">2004</option>
                                                            <option value="2003">2003</option>
                                                            <option value="2002">2002</option>
                                                            <option value="2001">2001</option>
                                                            <option value="2000">2000</option>
                                                            <option value="1999">1999</option>
                                                            <option value="1998">1998</option>
                                                            <option value="1997">1997</option>
                                                            <option value="1996">1996</option>
                                                            <option value="1995">1995</option>
                                                            <option value="1994">1994</option>
                                                            <option value="1993">1993</option>
                                                            <option value="1992">1992</option>
                                                            <option value="1991">1991</option>
                                                            <option value="1990">1990</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-3">
                                                <div class="form-group app-label">
                                                    <button type="button" class="btn btn-primary" style="width: 100%"><i class="mdi mdi-plus"></i> Tambah</button>
                                                </div>
                                            </div>
                                            <div class="col-md-9"></div>
                                            <div class="col-md-12">
                                                <table class="table" style="border:none">
                                                    <tbody>
                                                        <tr>
                                                            <th>Tahun</th>
                                                            <th>Nama Perusahaan</th>
                                                            <th>#</th>
                                                        </tr>
                                                        <tr>
                                                            <td>2016 - 2017</td>
                                                            <td>PT. Doorjek Indonesia</td>
                                                            <td><a href="#"><i class="mdi mdi-delete text-danger"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>2017 - 2020</td>
                                                            <td>PT. Doorjek Indonesia</td>
                                                            <td><a href="#"><i class="mdi mdi-delete text-danger"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Pengalaman Bekerja -->

    <!-- The Modal Keterampilan -->
    <div class="modal" id="keterampilan">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Keterampilan</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3" style="margin-top:0px ! important">
                                <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                    <form>
                                        <div class="row mt-4">

                                            <div class="col-md-7">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Nama Keterampilan :</label>
                                                    <input id="middle-name" type="text" class="form-control resume" placeholder="Keterampilan yang kamu miliki...">
                                                </div>
                                            </div>

                                            <div class="col-md-5" style="padding-top:30px">
                                                <div class="form-group app-label">
                                                    <button type="button" class="btn btn-primary" style="width: 50%"><i class="mdi mdi-plus"></i> Tambah</button>
                                                </div>
                                            </div>

                                            <div class="col-md-7 bordered">
                                                <table class="table rounded" style="border: 1px solid #e1e0e0;width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nama Keterampilan</th>
                                                            <th>#</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Menjahit</td>
                                                            <td><a href="#"><i class="mdi mdi-delete text-danger"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Martole</td>
                                                            <td><a href="#"><i class="mdi mdi-delete text-danger"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-5 bordered"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Keterampilan -->

    <!-- The Modal Karir Yang Diminati -->
    <div class="modal" id="karirYangDiminati">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Keterampilan</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3" style="margin-top:0px ! important">
                                <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                    <form>
                                        <div class="row mt-4">

                                            <div class="col-md-8">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Pilih Karir Yang Diminati:</label>
                                                    <div class="form-button">
                                                        <select class="rounded" style="width:100%;padding-left:10px; height: 40px ! important">
                                                            <option value="">Karir Yang Diminati</option>
                                                            <option value="Administrasi">Administrasi</option>
                                                            <option value="Desain dan Arsitektur">Desain dan Arsitektur</option>
                                                            <option value="Editing, Media dan Informasi">Editing, Media dan Informasi</option>
                                                            <option value="Elektronik">Elektronik</option>
                                                            <option value="Hotel dan Katering">Hotel dan Katering</option>
                                                            <option value="House Keeping">House Keeping</option>
                                                            <option value="IT dan Telekomunikasi">IT dan Telekomunikasi</option>
                                                            <option value="Keamanan dan Perlindungan Sipil">Keamanan dan Perlindungan Sipil</option>
                                                            <option value="Kesehatan dan Kecantikan">Kesehatan dan Kecantikan</option>
                                                            <option value="Keuangan dan Akuntansi">Keuangan dan Akuntansi</option>
                                                            <option value="Layanan Sipil / Asosiasi">Layanan Sipil / Asosiasi</option>
                                                            <option value="Legal">Legal</option>
                                                            <option value="Manajemen, Manajemen Eksekutif dan Strategis">Manajemen, Manajemen Eksekutif dan Strategis</option>
                                                            <option value="Pelatihan / Instruksi">Pelatihan / Instruksi</option>
                                                            <option value="Pelayanan Pelanggan">Pelayanan Pelanggan</option>
                                                            <option value="Pemasaran dan Periklanan">Pemasaran dan Periklanan</option>
                                                            <option value="Pemeliharaan">Pemeliharaan</option>
                                                            <option value="Penelitian, Pengembangan dan Ilmu Pengetahuan">Penelitian, Pengembangan dan Ilmu Pengetahuan</option>
                                                            <option value="Penjualan dan Perdagangan">Penjualan dan Perdagangan</option>
                                                            <option value="Perbankan, Asuransi dan Keuangan">Perbankan, Asuransi dan Keuangan</option>
                                                            <option value="Pertanian, Kehutanan, Laut dan Lingkungan">Pertanian, Kehutanan, Laut dan Lingkungan</option>
                                                            <option value="Produksi, Konstruksi dan Perdagangan">Produksi, Konstruksi dan Perdagangan</option>
                                                            <option value="Quality Control">Quality Control</option>
                                                            <option value="Seni, Budaya dan Hiburan">Seni, Budaya dan Hiburan</option>
                                                            <option value="Sosial">Sosial</option>
                                                            <option value="Sumber Daya Manusia">Sumber Daya Manusia</option>
                                                            <option value="Teknik">Teknik</option>
                                                            <option value="Transportasi dan Logistik">Transportasi dan Logistik</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-4" style="padding-top:30px">
                                                <div class="form-group app-label">
                                                    <button type="button" class="btn btn-primary" style="width: 60%"><i class="mdi mdi-plus"></i> Tambah</button>
                                                </div>
                                            </div>

                                            <div class="col-md-8 bordered rounded">
                                                <table class="table rounded" style="border: 1px solid #e1e0e0;width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <th>Nama Keterampilan</th>
                                                            <th>#</th>
                                                        </tr>
                                                        <tr>
                                                            <td>Desain & Arsitektur</td>
                                                            <td><a href="#"><i class="mdi mdi-delete text-danger"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Administrasi</td>
                                                            <td><a href="#"><i class="mdi mdi-delete text-danger"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <div class="col-md-4"></div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Karir Yang Diminati -->


    <!-- The Modal Unggah Berkas -->
    <div class="modal" id="unggahBerkas">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Daftar Berkas</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3" style="margin-top:0px ! important">
                                <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                    <form>
                                        <div class="row mt-4" style="margin:0px 0px 0px 0px ! important">
                                            <div class="col-md-12" style="margin-bottom: 10px;"><i class="text-danger">* Berkas harus berupa format .pdf atau .jpeg dan ukuran berkas tidak lebih dari 2MB </i></div>
                                            <div class="col-md-5">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Pilih Berkas:</label>
                                                    <input type="file" name="" id="">
                                                </div>
                                            </div>

                                            <div class="col-md-4">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Keterangan :</label>
                                                    <input id="middle-name" type="text" class="form-control resume" placeholder="Mis : Sertifikat Pelatihan">
                                                </div>
                                            </div>

                                            <div class="col-md-3" style="padding-top:30px">
                                                <div class="form-group app-label">
                                                    <button type="button" class="btn btn-primary" style="width: 100%"><i class="mdi mdi-plus"></i> Tambah</button>
                                                </div>
                                            </div>

                                            <div class="col-md-12 bordered rounded">
                                                <table class="table rounded" style="border: 1px solid #e1e0e0;width:100%">
                                                    <tbody>
                                                        <tr>
                                                            <th>Keterangan</th>
                                                            <th>Nama Berkas</th>
                                                            <th>#</th>
                                                        </tr>
                                                        <tr>
                                                            <td>CV</td>
                                                            <td><a href="#">CV - Samsul Sinaga.pdf</a></td>
                                                            <td><a href="#"><i class="mdi mdi-delete text-danger"></i></a></td>
                                                        </tr>
                                                        <tr>
                                                            <td>Sertifikat Keahlian</td>
                                                            <td><a href="#">Samsul Sinaga.pdf</a></td>
                                                            <td><a href="#"><i class="mdi mdi-delete text-danger"></i></a></td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Unggah Berkas -->


    <!-- The Modal Ubah Foto Profil -->
    <div class="modal" id="ubahFotoProfil">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Foto Profil</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>

                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12 mt-3" style="margin-top:0px ! important">
                                <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                    <form>
                                        <div class="row mt-4" style="margin:0px 0px 0px 0px ! important">
                                            <div class="col-md-12" style="margin-bottom: 10px;">
                                                <div class="position-relative overflow-hidden">
                                                    <img style="width: 300px" src="https://v-images2.antarafoto.com/penyandang-disabilitas-mf7nx1-prv.jpg" alt="" class="img-fluid mx-auto d-block rounded">
                                                </div>                                                
                                            </div>
                                            <div class="col-md-5">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Pilih Foto:</label>
                                                    <input type="file" name="" id="">
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Simpan</button>
                    <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                </div>

            </div>
        </div>
    </div>
    <!-- End Modal Ubah Foto Profil -->

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
    <script src="js/plugins.js"></script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="assets/ckeditor/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('lamaran');
    </script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>
</body>

</html>