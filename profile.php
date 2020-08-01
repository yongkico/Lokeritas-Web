<?php
session_start();

if (isset($_SESSION['login'])) {
    $email = $_SESSION['userdata']['email'];
} else {
    header('location:login.php');
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

    <link rel="stylesheet" type="text/css" href="css/fSelect.css">


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

    <?php if (isset($_SESSION["userdata"]['email'])) : ?>
        <?php


        $curl_get = curl_init();
        curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/getbyEmailUser.php?email=' . $email);
        curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
        $result = curl_exec($curl_get);
        curl_close($curl_get);

        $result_get = json_decode($result, true);


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
                            <a href="#"><i class="mdi mdi-account mr-2 text-success" style="font-size:16px"></i><?= $result_get[0]['nama_depan']; ?></a>
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
    <section class="bg-half page-next-level" style="padding:90px 0px 0px 0px;background: url('images/bg-2.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="candidates-profile-details text-center">
                        <div class="blog">
                            <img src="<?= $result_get[0]['foto'] == 'default.png' ? 'images/profil/default.png' : 'http://lokeritas.xyz/api-v1/uploads/Foto/' . $result_get[0]['foto']  ?>" height="150" style="width:150px;border:7px solid white" alt="" class="d-block mx-auto shadow rounded-pill mb-4">

                            <div class="author" style="margin:50px 0px 0px 169px">
                                <p class="btn btn-success btn-sm" data-toggle="modal" data-target="#ubahFotoProfil"><i class="mdi mdi-account-edit text-light"></i> Ubah</p>
                            </div>
                        </div>
                        <h4 class="text-white mb-2"><?= $result_get[0]['nama_depan']; ?>&nbsp;<?= $result_get[0]['nama_belakang']; ?></h4>
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
                                    <h4 class="text-info"> <i class="text-danger">*</i> Informasi Pribadi :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#informasiPribadi"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table border-top" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">Nama Lengkap</td>
                                        <td><?= $result_get[0]['nama_depan']; ?>&nbsp;<?= $result_get[0]['nama_belakang']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Ringkasan Pribadi</td>
                                        <td>
                                            <?php
                                            if (empty($result_get[0]['ringkasan_pribadi'])) {
                                                echo '-';
                                            } else {
                                                echo $result_get[0]['ringkasan_pribadi'];
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Email</td>
                                        <td><?= $result_get[0]['email']; ?></td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Nomor HP</td>
                                        <td>
                                            <?php
                                            if (empty($result_get[0]['telepon'])) {
                                                echo '-';
                                            } else {
                                                echo '+62 ' . $result_get[0]['telepon'];
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Jenis Kelamin</td>
                                        <td>
                                            <?php
                                            if ($result_get[0]['jenis_kelamin'] === 'L') {
                                                echo 'Laki-Laki';
                                            } elseif ($result_get[0]['jenis_kelamin'] === 'P') {
                                                echo 'Perempuan';
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Tanggal Lahir</td>
                                        <td>
                                            <?php
                                            if (!empty($result_get[0]['tgl_lahir'])) {
                                                echo $result_get[0]['tgl_lahir'];
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Status</td>
                                        <td>
                                            <?php
                                            if ($result_get[0]['status'] === 'B') {
                                                echo 'Belum Menikah';
                                            } elseif ($result_get[0]['status'] === 'M') {
                                                echo 'Menikah';
                                            } else {
                                                echo '-';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Alamat</td>
                                        <td>
                                            <?php
                                            if (empty($result_get[0]['alamat']) || $result_get[0]['alamat'] == '-') {
                                                echo '-';
                                            } else {
                                                echo $result_get[0]['alamat'];
                                            }

                                            if ($result_get[0]['kota'] !== '-' && !empty($result_get[0]['kota'])) {
                                                echo ', ' . $result_get[0]['kota'];
                                            }

                                            if ($result_get[0]['provinsi'] !== '-' && !empty($result_get[0]['provinsi'])) {
                                                echo ', ' . $result_get[0]['provinsi'];
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Mencari Pekerjaan</td>
                                        <td><span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px">
                                                <?php
                                                if ($result_get[0]['mencari_pekerjaan'] === '0') {
                                                    echo 'Tidak';
                                                } elseif ($result_get[0]['mencari_pekerjaan'] === '1') {
                                                    echo 'Ya';
                                                } else {
                                                    echo '-';
                                                }
                                                ?>
                                            </span></td>
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
                                    <h4 class="text-info"> <i class="text-danger">*</i> Rincian Disabilitas :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#rincianDisabilitas"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                        <td style="width:180px;font-weight:bold">Jenis Disabilitas</td>
                                        <td>
                                            <?php
                                            $tmp_disabilitas = explode(',', $result_get[0]['ketunaan']);
                                            foreach ($tmp_disabilitas as $a) {
                                                echo $a;
                                                echo '<br>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Alat Bantu</td>
                                        <td>
                                            <?php
                                            $tmp_alatbantu = explode(',', $result_get[0]['alat_bantu']);
                                            foreach ($tmp_alatbantu as $ab) {
                                                echo $ab;
                                                echo '<br>';
                                            }
                                            ?>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td style="font-weight:bold">Penjelasan</td>
                                        <td>
                                            <?php
                                            if (empty($result_get[0]['detail_tambahan'])) {
                                                echo '-';
                                            } else {
                                                echo $result_get[0]['detail_tambahan'];
                                            }
                                            ?>
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
                                    <h4 class="text-info"> <i class="text-danger">*</i> Pendidikan Terakhir :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#pendidikanTerakhir"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table" style="border:none">
                                <?php
                                $pnd = explode(',', $result_get[0]['pendidikan_terakhir']);
                                $thn = explode('-', $pnd[0]);
                                $thn[0] .= ' - ';
                                ?>
                                <tbody>
                                    <tr>
                                        <?php if (empty($result_get[0]['pendidikan_terakhir'])) : ?>
                                            <td>-</td>
                                        <?php else : ?>
                                            <td style="font-weight: bold;width:180px"><?php foreach ($thn as $ab) {
                                                                                            echo $ab;
                                                                                        } ?></td>
                                            <td><?= $pnd[1]; ?></td>
                                        <?php endif; ?>
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
                                    <h4 class="text-info"> Riwayat Pekerjaan :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#pengalamanBekerja"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <?php if ($result_get[0]['pengalaman_kerja'] == "") : ?>
                                <table class="table" style="border:none">
                                    <tbody>
                                        <tr>
                                            <td>-</td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php else : ?>
                                <table class="table" style="border:none">
                                    <?php

                                    $pengalamanKerja = explode('|', $result_get[0]['pengalaman_kerja']);
                                    $pengalamanPop = array_pop($pengalamanKerja);
                                    ?>
                                    <tbody>
                                        <?php foreach ($pengalamanKerja as $row) : ?>
                                            <tr>
                                                <?php
                                                $pk = explode(',', $row);
                                                ?>
                                                <td><strong><?= $pk[0]; ?></strong></td>
                                                <td><?= $pk[1]; ?></td>
                                                <td><?= $pk[2]; ?></td>
                                                <td></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            <?php endif; ?>
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
                                    <h4 class="text-info"> <i class="text-danger">*</i> Keterampilan :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#keterampilan"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table" style="border:none;">
                                <tbody>
                                    <tr>
                                        <?php if (empty($result_get[0]['keterampilan'])) : ?>
                                            <td>-</td>
                                        <?php else : ?>
                                            <?php
                                            $ktrm = explode(',', $result_get[0]['keterampilan']);
                                            ?>
                                            <td>
                                                <?php foreach ($ktrm as $list) : ?>
                                                    <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"><?= $list; ?></span>
                                                <?php endforeach; ?>
                                            </td>
                                        <?php endif; ?>
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
                                    <h4 class="text-info"> <i class="text-danger">*</i> Karir yang diminati :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" id="karir_klik" class="btn btn-success-outline" data-toggle="modal" data-target="#karirYangDiminati"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <table class="table" style="border:none">
                                <tbody>
                                    <tr>
                                    <tr>
                                        <?php if (empty($result_get[0]['kariryangdimininati'])) : ?>
                                            <td>-</td>
                                        <?php else : ?>

                                            <?php
                                            $karirr = explode('-', $result_get[0]['kariryangdimininati']);
                                            ?>
                                            <td>
                                                <?php foreach ($karirr as $list) : ?>
                                                    <span class="badge badge-secondary" style="font-size: 15px;padding:7px 15px 7px 15px"><?= $list; ?></span>
                                                <?php endforeach; ?>
                                            </td>
                                        <?php endif; ?>
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
                                    <h4 class="text-info"> <i class="text-danger">*</i> Unggah Berkas :</h4>
                                </div>
                                <div class="col-lg-2">
                                    <a href="#" class="btn btn-success-outline" data-toggle="modal" data-target="#unggahBerkas"><i class="mdi mdi-account-edit mr-2" style="font-size:16px"></i> Edit</a>
                                </div>
                            </div>
                            <div style="padding:20px 10px 10px 10px" class="border-top">
                                <p style="margin-top:10px" class="text-info justify-content-center">Daftar berkas yang telah di unggah :</p>
                            </div>
                            <div>
                                <?php if ($result_get[0]['dok1'] == '' && $result_get[0]['dok2'] == '') : ?>
                                    <div style="margin:0px 0px 20px 10px ! important">
                                        <i class="text-muted">Belum ada berkas yang di unggah !</i>
                                    </div>
                                <?php else : ?>
                                    <?php
                                    $berkas1 = $result_get[0]['dok1'];
                                    $berkas2 = $result_get[0]['dok2'];

                                    $tmp_berkas = [];
                                    if ($berkas1 !== '') {
                                        $tmp_berkas[] = $berkas1;
                                    }

                                    if ($berkas2 !== '') {
                                        $tmp_berkas[] = $berkas2;
                                    }

                                    ?>


                                    <table class="table" style="border:none">
                                        <tbody>
                                            <tr>
                                                <th>Keterangan</th>
                                                <th>Berkas</th>
                                            </tr>
                                            <?php foreach ($tmp_berkas as $b) : ?>
                                                <?php
                                                $tmp_b = explode(',', $b);
                                                ?>
                                                <tr>
                                                    <td><?= $tmp_b[1]; ?></td>
                                                    <td><a href="<?= '/api-v1/uploads/Berkas/' . $tmp_b[0]; ?>" download target="_blank"><?= $tmp_b[0]; ?></a></td>
                                                </tr>
                                            <?php endforeach; ?>
                                        </tbody>
                                    </table>
                                <?php endif; ?>
                            </div>
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
                <form action="edit_profil.php" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mt-3" style="margin-top:0px ! important">
                                    <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                        <div class="row mt-4">
                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Nama Depan :</label>
                                                    <input id="first-name" type="text" name="nama_depan" class="form-control resume" autocomplete="off" value="<?= $result_get[0]["nama_depan"]; ?>">
                                                    <input type="hidden" name="id_user" value="<?= $result_get[0]["id_user"]; ?>">
                                                    <input type="hidden" name="password_lama" value="<?= $result_get[0]["password"]; ?>">
                                                    <input type="hidden" name="ketunaan" value="<?= $result_get[0]["ketunaan"]; ?>">
                                                    <input type="hidden" name="foto" value="<?= $result_get[0]["foto"]; ?>">
                                                    <input type="hidden" name="detail_tambahan" value="<?= $result_get[0]["detail_tambahan"]; ?>">
                                                    <input type="hidden" name="alat_bantu" value="<?= $result_get[0]["alat_bantu"]; ?>">
                                                    <input type="hidden" name="hash" value="<?= $result_get[0]["hash"]; ?>">
                                                    <input type="hidden" name="active" value="<?= $result_get[0]["active"]; ?>">
                                                    <input type="hidden" name="kariryangdimininati" value="<?= $result_get[0]["kariryangdimininati"]; ?>">
                                                    <input type="hidden" name="pendidikan_terakhir" value="<?= $result_get[0]["pendidikan_terakhir"]; ?>">
                                                    <input type="hidden" name="keterampilan" value="<?= $result_get[0]["keterampilan"]; ?>">
                                                    <input type="hidden" name="pengalaman_kerja" value="<?= $result_get[0]["pengalaman_kerja"]; ?>">
                                                    <input type="hidden" name="dok1" value="<?= $result_get[0]["dok1"]; ?>">
                                                    <input type="hidden" name="dok2" value="<?= $result_get[0]["dok2"]; ?>">

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Nama Belakang :</label>
                                                    <input type="hidden" name="id">
                                                    <input id="first-name" type="text" name="nama_belakang" class="form-control resume" autocomplete="off" value="<?= $result_get[0]["nama_belakang"]; ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Email :</label>
                                                    <input id="middle-name" name="email" style="pointer-events:none;" type="text" class="form-control resume bg-light" value="<?= $result_get[0]["email"]; ?>" readonly>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Nomor HP :</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend">
                                                            <span class="input-group-text" id="basic-addon1">+62</span>
                                                        </div>
                                                        <input type="text" class="form-control" name="telepon" maxlength="12" value="<?php if ($result_get[0]["telepon"] == '0') {
                                                                                                                                            echo '+62';
                                                                                                                                        } else {
                                                                                                                                            echo $result_get[0]["telepon"];
                                                                                                                                        } ?>" required onkeypress="return (event.charCode !=8 && event.charCode ==0 || ( event.charCode == 46 || (event.charCode >= 48 && event.charCode <= 57)))" />

                                                    </div>

                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Jenis Kelamin :</label>
                                                    <div class="form-button">
                                                        <select class="nice-select rounded" name="jk">
                                                            <option value="<?php if ($result_get[0]['jenis_kelamin'] == 'L') {
                                                                                echo 'L';
                                                                            } else {
                                                                                echo 'P';
                                                                            } ?>"><?php if ($result_get[0]['jenis_kelamin'] == 'L') {
                                                                                        echo 'Laki-Laki';
                                                                                    } else {
                                                                                        echo 'Perempuan';
                                                                                    } ?></option>
                                                            <option value="L">Laki-Laki</option>
                                                            <option value="P">Perempuan</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Tanggal Lahir :</label>
                                                    <input id="date-of-birth" name="tgl_lahir" type="date" class="form-control resume" value="<?= $result_get[0]["tgl_lahir"]; ?>">
                                                </div>
                                            </div>

                                            <div class=" col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Status</label>
                                                    <div class="form-button">
                                                        <select class="nice-select rounded" name="status">
                                                            <option value="<?php if ($result_get[0]['status'] == 'B') {
                                                                                echo 'B';
                                                                            } else {
                                                                                echo 'M';
                                                                            } ?>"><?php if ($result_get[0]['status'] == 'B') {
                                                                                        echo 'Belum Menikah';
                                                                                    } else {
                                                                                        echo 'Menikah';
                                                                                    } ?></option>
                                                            <option value="M">Menikah</option>
                                                            <option value="B">Belum Menikah</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Mencari Pekerjaan</label>
                                                    <div class="form-button">
                                                        <select class="nice-select rounded" name="mencari_pekerjaan">
                                                            <option value="<?php if ($result_get[0]['mencari_pekerjaan'] == '0') {
                                                                                echo 'Tidak';
                                                                            } else {
                                                                                echo 'Ya';
                                                                            } ?>"><?php if ($result_get[0]['mencari_pekerjaan'] == '0') {
                                                                                        echo 'Tidak';
                                                                                    } else {
                                                                                        echo 'Ya';
                                                                                    } ?></option>
                                                            <option value="Ya">Ya</option>
                                                            <option value="Tidak">Tidak</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-6">

                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Ringkasan Pribadi</label>
                                                    <textarea id="surname-name" maxlength="375" name="ringkasan_pribadi" class="form-control" rows="3"><?php if (empty($result_get[0]["ringkasan_pribadi"])) {
                                                                                                                                                            echo '-';
                                                                                                                                                        } else {
                                                                                                                                                            echo $result_get[0]["ringkasan_pribadi"];
                                                                                                                                                        } ?></textarea>
                                                </div>
                                            </div>

                                            <div class="col-md-12">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Alamat</label>
                                                    <input id="surname-name" name="alamat" type="text" class="form-control resume" value="<?php if (empty($result_get[0]["alamat"])) {
                                                                                                                                                echo '-';
                                                                                                                                            } else {
                                                                                                                                                echo $result_get[0]["alamat"];
                                                                                                                                            } ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Kabupaten/Kota</label>
                                                    <input id="surname-name" name="kota" type="text" class="form-control resume" value="<?php if (empty($result_get[0]["kota"])) {
                                                                                                                                            echo '-';
                                                                                                                                        } else {
                                                                                                                                            echo $result_get[0]["kota"];
                                                                                                                                        } ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Provinsi</label>
                                                    <input id="surname-name" name="provinsi" type="text" class="form-control resume" value="<?php if (empty($result_get[0]["provinsi"])) {
                                                                                                                                                echo '-';
                                                                                                                                            } else {
                                                                                                                                                echo $result_get[0]["provinsi"];
                                                                                                                                            } ?>">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Ganti Password</label>
                                                    <input id="surname-name" name="password" type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus terdiri dari 8 karakter dan mengandung huruf besar, huruf kecil dan angka" autocomplete="off" class="form-control resume" placeholder="Password">
                                                </div>
                                            </div>

                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-white">.</label>
                                                    <input id="surname-name" name="password2" type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus terdiri dari 8 karakter dan mengandung huruf besar, huruf kecil dan angka" autocomplete="off" class="form-control resume" placeholder="Konfirmasi Password">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="submit" name="btn_informasi_pribadi" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
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
                <form action="edit_profil.php" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mt-3" style="margin-top:0px ! important">
                                    <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">

                                        <div class="row mt-4">
                                            <div class="col-md-12 ">
                                                <input type="hidden" name="id_user" value="<?= $result_get[0]["id_user"]; ?>">
                                                <input type="hidden" name="nama_depan" value="<?= $result_get[0]["nama_depan"]; ?>">
                                                <input type="hidden" name="nama_belakang" value="<?= $result_get[0]["nama_belakang"]; ?>">
                                                <input type="hidden" name="email" value="<?= $result_get[0]["email"]; ?>">
                                                <input type="hidden" name="password" value="<?= $result_get[0]["password"]; ?>">
                                                <input type="hidden" name="tgl_lahir" value="<?= $result_get[0]["tgl_lahir"]; ?>">
                                                <input type="hidden" name="jenis_kelamin" value="<?= $result_get[0]["jenis_kelamin"]; ?>">
                                                <input type="hidden" name="status" value="<?= $result_get[0]["status"]; ?>">
                                                <input type="hidden" name="foto" value="<?= $result_get[0]["foto"]; ?>">
                                                <input type="hidden" name="provinsi" value="<?= $result_get[0]["provinsi"]; ?>">
                                                <input type="hidden" name="kota" value="<?= $result_get[0]["kota"]; ?>">
                                                <input type="hidden" name="alamat" value="<?= $result_get[0]["alamat"]; ?>">
                                                <input type="hidden" name="telepon" value="<?= $result_get[0]["telepon"]; ?>">
                                                <input type="hidden" name="hash" value="<?= $result_get[0]["hash"]; ?>">
                                                <input type="hidden" name="active" value="<?= $result_get[0]["active"]; ?>">
                                                <input type="hidden" name="ringkasan_pribadi" value="<?= $result_get[0]["ringkasan_pribadi"]; ?>">
                                                <input type="hidden" name="kariryangdimininati" value="<?= $result_get[0]["kariryangdimininati"]; ?>">
                                                <input type="hidden" name="mencari_pekerjaan" value="<?= $result_get[0]["mencari_pekerjaan"]; ?>">
                                                <input type="hidden" name="pendidikan_terakhir" value="<?= $result_get[0]["pendidikan_terakhir"]; ?>">
                                                <input type="hidden" name="keterampilan" value="<?= $result_get[0]["keterampilan"]; ?>">
                                                <input type="hidden" name="pengalaman_kerja" value="<?= $result_get[0]["pengalaman_kerja"]; ?>">
                                                <input type="hidden" name="dok1" value="<?= $result_get[0]["dok1"]; ?>">
                                                <input type="hidden" name="dok2" value="<?= $result_get[0]["dok2"]; ?>">

                                                <label class="text-muted" style="font-weight: 600">Jenis Disabilitas/Ketunaan </label><br>
                                                <?php
                                                $tmp_disabilitas = explode(',', $result_get[0]["ketunaan"]);
                                                ?>
                                                <div class="p-4" style="padding:0px 0px 0px 0px !important">
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="ketunaan[]" value="Disabilitas Daksa" <?php if (in_array("Disabilitas Daksa", $tmp_disabilitas)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck1">Disabilitas Daksa</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 10px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="ketunaan[]" value="Disabilitas Netra" <?php if (in_array("Disabilitas Netra", $tmp_disabilitas)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck2">Disabilitas Netra</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 10px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck3" name="ketunaan[]" value="Disabilitas Rungu" <?php if (in_array("Disabilitas Rungu", $tmp_disabilitas)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck3">Disabilitas Rungu</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline" style="margin:0px 0px 0px 0px">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck4" name="ketunaan[]" value="Disabilitas Wicara" <?php if (in_array("Disabilitas Wicara", $tmp_disabilitas)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck4">Disabilitas Wicara</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 2px 20px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck5" name="ketunaan[]" value="Disabilitas Grahita" <?php if (in_array("Disabilitas Grahita", $tmp_disabilitas)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck5">Disabilitas Grahita</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 12px 20px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck6" name="ketunaan[]" value="Disabilitas Mental" <?php if (in_array("Disabilitas Mental", $tmp_disabilitas)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck6">Disabilitas Mental</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                                <label class="text-muted" style="font-weight: 600">Alat Bantu :</label>
                                                <?php
                                                $tmp_alatbantu = explode(',', $result_get[0]["alat_bantu"]);
                                                ?>
                                                <div class="p-4" style="padding:0px 0px 0px 0px !important">
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:10px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck7" name="alat_bantu[]" value="Tongkat" <?php if (in_array("Tongkat", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck7">Tongkat</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 20px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck8" name="alat_bantu[]" value="Globe Timbul" <?php if (in_array("Globe Timbul", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck8">Globe Timbul</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 20px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck9" name="alat_bantu[]" value="Abacus" <?php if (in_array("Abacus", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck9">Abacus</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 20px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck10" name="alat_bantu[]" value="Reglet" <?php if (in_array("Reglet", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck10">Reglet</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 29px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck11" name="alat_bantu[]" value="Jam Tangan Bicara" <?php if (in_array("Jam Tangan Bicara", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck11">Jam Tangan Bicara</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck12" name="alat_bantu[]" value="Spatel" <?php if (in_array("Spatel", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck12">Spatel</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 31px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck13" name="alat_bantu[]" value="Kruk" <?php if (in_array("Kruk", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck13">Kruk</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 77px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck14" name="alat_bantu[]" value="Kaki Palsu" <?php if (in_array("Kaki Palsu", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck14">Kaki Palsu</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 1.5px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck15" name="alat_bantu[]" value="Kursi Roda" <?php if (in_array("Kursi Roda", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck15">Kursi Roda</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck20" name="alat_bantu[]" value="Alat Bantu Dengar" <?php if (in_array("Alat Bantu Dengar", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck20">Alat Bantu Dengar</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck21" name="alat_bantu[]" value="Protesa" <?php if (in_array("Protesa", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck21">Protesa</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 20px 23px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck16" name="alat_bantu[]" value="Audio Meter" <?php if (in_array("Audio Meter", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck16">Audio Meter</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 28px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck22" name="alat_bantu[]" value="Orthesa" <?php if (in_array("Orthesa", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck22">Orthesa</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 16.4px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck24" name="alat_bantu[]" value="Kaca Mata Low Vision" <?php if (in_array("Kaca Mata Low Vision", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="customCheck24">Kaca Mata Low Vision</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-md-12">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Penjelasan Singkat :</label>
                                                    <textarea id="surname-name" maxlength="400" name="penjelasan" type="text" class="form-control resume" autocomplete="off"><?php if (empty($result_get[0]['detail_tambahan'])) {
                                                                                                                                                                                    echo '-';
                                                                                                                                                                                } else {
                                                                                                                                                                                    echo $result_get[0]['detail_tambahan'];
                                                                                                                                                                                } ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn_rincian_disabilitas">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
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
                <form action="edit_profil.php" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mt-3" style="margin-top:0px ! important">
                                    <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                        <div class="row mt-4">
                                            <?php if (empty($result_get[0]['pendidikan_terakhir'])) : ?>
                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <input type="hidden" name="id_user" value="<?= $result_get[0]["id_user"]; ?>">
                                                        <input type="hidden" name="nama_depan" value="<?= $result_get[0]["nama_depan"]; ?>">
                                                        <input type="hidden" name="nama_belakang" value="<?= $result_get[0]["nama_belakang"]; ?>">
                                                        <input type="hidden" name="email" value="<?= $result_get[0]["email"]; ?>">
                                                        <input type="hidden" name="password" value="<?= $result_get[0]["password"]; ?>">
                                                        <input type="hidden" name="tgl_lahir" value="<?= $result_get[0]["tgl_lahir"]; ?>">
                                                        <input type="hidden" name="jenis_kelamin" value="<?= $result_get[0]["jenis_kelamin"]; ?>">
                                                        <input type="hidden" name="status" value="<?= $result_get[0]["status"]; ?>">
                                                        <input type="hidden" name="foto" value="<?= $result_get[0]["foto"]; ?>">
                                                        <input type="hidden" name="provinsi" value="<?= $result_get[0]["provinsi"]; ?>">
                                                        <input type="hidden" name="kota" value="<?= $result_get[0]["kota"]; ?>">
                                                        <input type="hidden" name="alamat" value="<?= $result_get[0]["alamat"]; ?>">
                                                        <input type="hidden" name="telepon" value="<?= $result_get[0]["telepon"]; ?>">
                                                        <input type="hidden" name="hash" value="<?= $result_get[0]["hash"]; ?>">
                                                        <input type="hidden" name="active" value="<?= $result_get[0]["active"]; ?>">
                                                        <input type="hidden" name="ringkasan_pribadi" value="<?= $result_get[0]["ringkasan_pribadi"]; ?>">
                                                        <input type="hidden" name="kariryangdimininati" value="<?= $result_get[0]["kariryangdimininati"]; ?>">
                                                        <input type="hidden" name="mencari_pekerjaan" value="<?= $result_get[0]["mencari_pekerjaan"]; ?>">
                                                        <input type="hidden" name="keterampilan" value="<?= $result_get[0]["keterampilan"]; ?>">
                                                        <input type="hidden" name="pengalaman_kerja" value="<?= $result_get[0]["pengalaman_kerja"]; ?>">
                                                        <input type="hidden" name="dok1" value="<?= $result_get[0]["dok1"]; ?>">
                                                        <input type="hidden" name="dok2" value="<?= $result_get[0]["dok2"]; ?>">
                                                        <input type="hidden" name="ketunaan" value="<?= $result_get[0]["ketunaan"]; ?>">
                                                        <input type="hidden" name="alat_bantu" value="<?= $result_get[0]["alat_bantu"]; ?>">
                                                        <input type="hidden" name="detail_tambahan" value="<?= $result_get[0]["detail_tambahan"]; ?>">

                                                        <label class="text-muted">Pendidikan Terakhir :</label>
                                                        <div class="form-button">
                                                            <select class="nice-select rounded" id="pendidikan" onchange="ShowHide()" name="pendidikan">
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
                                                        <label class="text-muted">Nama Sekolah :</label>
                                                        <input id="middle-name" name="nama_sekolah" type="text" class="form-control resume">
                                                    </div>
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="jurusan form-group app-label" id="jurusan" style="display: none;">
                                                        <label class="text-muted">Jurusan :</label>
                                                        <input id="middle-name" name="jurusan" type="text" class="form-control resume">
                                                    </div>
                                                </div>



                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Tahun Masuk :</label>
                                                        <div class="form-button">
                                                            <select class="rounded" name="tahun_mulai" style="width:100px;padding-left:10px; height: 40px ! important">

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


                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Tahun Keluar :</label>
                                                        <div class="form-button">
                                                            <select class="rounded" name="tahun_akhir" style="width:100px;padding-left:10px; height: 40px ! important">

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
                                            <?php else : ?>
                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <input type="hidden" name="id_user" value="<?= $result_get[0]["id_user"]; ?>">
                                                        <input type="hidden" name="nama_depan" value="<?= $result_get[0]["nama_depan"]; ?>">
                                                        <input type="hidden" name="nama_belakang" value="<?= $result_get[0]["nama_belakang"]; ?>">
                                                        <input type="hidden" name="email" value="<?= $result_get[0]["email"]; ?>">
                                                        <input type="hidden" name="password" value="<?= $result_get[0]["password"]; ?>">
                                                        <input type="hidden" name="tgl_lahir" value="<?= $result_get[0]["tgl_lahir"]; ?>">
                                                        <input type="hidden" name="jenis_kelamin" value="<?= $result_get[0]["jenis_kelamin"]; ?>">
                                                        <input type="hidden" name="status" value="<?= $result_get[0]["status"]; ?>">
                                                        <input type="hidden" name="foto" value="<?= $result_get[0]["foto"]; ?>">
                                                        <input type="hidden" name="provinsi" value="<?= $result_get[0]["provinsi"]; ?>">
                                                        <input type="hidden" name="kota" value="<?= $result_get[0]["kota"]; ?>">
                                                        <input type="hidden" name="alamat" value="<?= $result_get[0]["alamat"]; ?>">
                                                        <input type="hidden" name="telepon" value="<?= $result_get[0]["telepon"]; ?>">
                                                        <input type="hidden" name="hash" value="<?= $result_get[0]["hash"]; ?>">
                                                        <input type="hidden" name="active" value="<?= $result_get[0]["active"]; ?>">
                                                        <input type="hidden" name="ringkasan_pribadi" value="<?= $result_get[0]["ringkasan_pribadi"]; ?>">
                                                        <input type="hidden" name="kariryangdimininati" value="<?= $result_get[0]["kariryangdimininati"]; ?>">
                                                        <input type="hidden" name="mencari_pekerjaan" value="<?= $result_get[0]["mencari_pekerjaan"]; ?>">
                                                        <input type="hidden" name="keterampilan" value="<?= $result_get[0]["keterampilan"]; ?>">
                                                        <input type="hidden" name="pengalaman_kerja" value="<?= $result_get[0]["pengalaman_kerja"]; ?>">
                                                        <input type="hidden" name="dok1" value="<?= $result_get[0]["dok1"]; ?>">
                                                        <input type="hidden" name="dok2" value="<?= $result_get[0]["dok2"]; ?>">
                                                        <input type="hidden" name="ketunaan" value="<?= $result_get[0]["ketunaan"]; ?>">
                                                        <input type="hidden" name="alat_bantu" value="<?= $result_get[0]["alat_bantu"]; ?>">
                                                        <input type="hidden" name="detail_tambahan" value="<?= $result_get[0]["detail_tambahan"]; ?>">

                                                        <?php
                                                        $t = explode('-', $pnd[0]);
                                                        $sklh = explode('-', $pnd[1]);
                                                        $jlh_sklh = count($sklh);
                                                        ?>
                                                        <label class="text-muted">Pendidikan Terakhir :</label>
                                                        <div class="form-button">
                                                            <select class="nice-select rounded" id="pendidikan" onchange="ShowHide()" name="pendidikan">
                                                                <option value="<?= $sklh[0]; ?>"><?= $sklh[0]; ?></option>
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
                                                        <label class="text-muted">Nama Sekolah :</label>
                                                        <input id="middle-name" name="nama_sekolah" type="text" class="form-control resume" value="<?= end($sklh); ?>">
                                                    </div>
                                                </div>

                                                <?php if ($jlh_sklh == 3) : ?>
                                                    <div class="col-md-6">
                                                        <?php if ($sklh[0] == "SD" || $sklh[0] == "SMP" || $sklh[0] == "SMA") : ?>
                                                            <div class="jurusan form-group app-label" id="jurusan" style="display: none;">
                                                                <label class="text-muted">Jurusan :</label>
                                                                <input id="middle-name" name="jurusan" type="text" class="form-control resume" value="<?= $sklh[1]; ?>">
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="jurusan form-group app-label" id="jurusan">
                                                                <label class="text-muted">Jurusan :</label>
                                                                <input id="middle-name" name="jurusan" type="text" class="form-control resume" value="<?= $sklh[1]; ?>">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php else : ?>
                                                    <div class="col-md-6">
                                                        <?php if ($sklh[0] == "SD" || $sklh[0] == "SMP" || $sklh[0] == "SMA") : ?>
                                                            <div class="jurusan form-group app-label" id="jurusan" style="display: none;">
                                                                <label class="text-muted">Jurusan :</label>
                                                                <input id="middle-name" name="jurusan" type="text" class="form-control resume">
                                                            </div>
                                                        <?php else : ?>
                                                            <div class="jurusan form-group app-label" id="jurusan">
                                                                <label class="text-muted">Jurusan :</label>
                                                                <input id="middle-name" name="jurusan" type="text" class="form-control resume">
                                                            </div>
                                                        <?php endif; ?>
                                                    </div>
                                                <?php endif; ?>

                                                <div class="col-md-6">
                                                </div>

                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Tahun Masuk :</label>
                                                        <div class="form-button">
                                                            <select class="rounded" name="tahun_mulai" style="width:100px;padding-left:10px; height: 40px ! important">
                                                                <option value="<?= $t[0]; ?>"><?= $t[0]; ?></option>
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
                                                <!-- 
                                                <div class="col-md-4" style="padding: 38px 15px 0px 30px ! important">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted" style="font-weight: bolder"> - </label>
                                                    </div>
                                                </div> -->

                                                <div class="col-md-6">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Tahun Keluar :</label>
                                                        <div class="form-button">
                                                            <select class="rounded" name="tahun_akhir" style="width:100px;padding-left:10px; height: 40px ! important">
                                                                <option value="<?= $t[1]; ?>"><?= $t[1]; ?></option>
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
                                            <?php endif; ?>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn_pendidikan_terakhir">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- End Modal Pendidikan Terakhir -->


    <!-- The Modal Pengalaman Bekerja -->
    <div class="modal" id="pengalamanBekerja">
        <div class="modal-dialog modal-lg">
            <div class="modal-content" style="width:105%">

                <!-- Modal Header -->
                <div class="modal-header">
                    <h4 class="modal-title">Edit Riwayat Pekerjaan</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>
                <!-- Modal body -->
                <div class="modal-body">
                    <div class="container">
                        <div class="row">
                            <div class="col-12">
                                <div class="row">
                                    <div class="col-12 md">
                                        <button class="btn btn-primary" id="btnShowForm" onclick="showForm(this)"> <i class="mdi mdi-plus" style="font-weight: bolder;font-size:20px"></i></button>
                                    </div>
                                </div>
                                <div class="row" id="formPengalaman" style="display: none;">
                                    <form action="edit_profil.php" method="POST">
                                        <div class="container">
                                            <div class="row">
                                                <div class="col-6 md">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Nama Perusahaan :</label>
                                                        <input id="middle-name" maxlength="38" required name="perusahaan" type="text" class="form-control" placeholder="Nama Perusahaan">

                                                        <input type="hidden" name="id_user" value="<?= $result_get[0]["id_user"]; ?>">
                                                        <input type="hidden" name="nama_depan" value="<?= $result_get[0]["nama_depan"]; ?>">
                                                        <input type="hidden" name="nama_belakang" value="<?= $result_get[0]["nama_belakang"]; ?>">
                                                        <input type="hidden" name="email" value="<?= $result_get[0]["email"]; ?>">
                                                        <input type="hidden" name="password" value="<?= $result_get[0]["password"]; ?>">
                                                        <input type="hidden" name="tgl_lahir" value="<?= $result_get[0]["tgl_lahir"]; ?>">
                                                        <input type="hidden" name="jenis_kelamin" value="<?= $result_get[0]["jenis_kelamin"]; ?>">
                                                        <input type="hidden" name="status" value="<?= $result_get[0]["status"]; ?>">
                                                        <input type="hidden" name="foto" value="<?= $result_get[0]["foto"]; ?>">
                                                        <input type="hidden" name="provinsi" value="<?= $result_get[0]["provinsi"]; ?>">
                                                        <input type="hidden" name="kota" value="<?= $result_get[0]["kota"]; ?>">
                                                        <input type="hidden" name="alamat" value="<?= $result_get[0]["alamat"]; ?>">
                                                        <input type="hidden" name="telepon" value="<?= $result_get[0]["telepon"]; ?>">
                                                        <input type="hidden" name="hash" value="<?= $result_get[0]["hash"]; ?>">
                                                        <input type="hidden" name="active" value="<?= $result_get[0]["active"]; ?>">
                                                        <input type="hidden" name="ringkasan_pribadi" value="<?= $result_get[0]["ringkasan_pribadi"]; ?>">
                                                        <input type="hidden" name="kariryangdimininati" value="<?= $result_get[0]["kariryangdimininati"]; ?>">
                                                        <input type="hidden" name="mencari_pekerjaan" value="<?= $result_get[0]["mencari_pekerjaan"]; ?>">
                                                        <input type="hidden" name="keterampilan" value="<?= $result_get[0]["keterampilan"]; ?>">
                                                        <input type="hidden" name="pendidikan_terakhir" value="<?= $result_get[0]["pendidikan_terakhir"]; ?>">
                                                        <input type="hidden" name="dok1" value="<?= $result_get[0]["dok1"]; ?>">
                                                        <input type="hidden" name="dok2" value="<?= $result_get[0]["dok2"]; ?>">
                                                        <input type="hidden" name="ketunaan" value="<?= $result_get[0]["ketunaan"]; ?>">
                                                        <input type="hidden" name="alat_bantu" value="<?= $result_get[0]["alat_bantu"]; ?>">
                                                        <input type="hidden" name="detail_tambahan" value="<?= $result_get[0]["detail_tambahan"]; ?>">
                                                        <input type="hidden" name="pengalaman_kerja" value="<?= $result_get[0]["pengalaman_kerja"]; ?>">
                                                    </div>
                                                </div>
                                                <div class="col-6 md">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Jabatan/Posisi :</label>
                                                        <input id="middle-name" maxlength="30" required name="jabatan" type="text" class="form-control" placeholder="Jabatan/Posisi">
                                                    </div>
                                                </div>
                                                <div class="col-12 md">
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 10px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 0px">
                                                                <input type="checkbox" onclick="hideTanggal()" class="custom-control-input" id="masih_bekerja" checked name="masih_bekerja" value="Protesa" <?php if (in_array("Protesa", $tmp_alatbantu)) : ?> checked <?php endif; ?>>
                                                                <label class="custom-control-label" for="masih_bekerja">Saya masih bekerja disini.</label>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 md">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted">Tanggal Mulai :</label>
                                                        <div class="form-button">
                                                            <select class="rounded" required name="bulan_mulai" style="width:130px;padding-left:10px; height: 40px ! important">
                                                                <option selected value="" disabled>Bulan</option>
                                                                <option value="Jan">Januari</option>
                                                                <option value="Feb">Februari</option>
                                                                <option value="Mar">Maret</option>
                                                                <option value="Apr">April</option>
                                                                <option value="Mei">Mei</option>
                                                                <option value="Jun">Juni</option>
                                                                <option value="Jul">Juli</option>
                                                                <option value="Agu">Agustus</option>
                                                                <option value="Sep">September</option>
                                                                <option value="Okt">Oktober</option>
                                                                <option value="Nov">November</option>
                                                                <option value="Des">Desember</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 md">
                                                    <div class="form-group app-label">
                                                        <label class="text-white">.</label>
                                                        <div class="form-button">
                                                            <select class="rounded" required name="tahun_mulai" style="width:100px;padding-left:10px; height: 40px ! important">
                                                                <option selected value="" disabled>Tahun</option>
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
                                                <div class="col-3 md" id="bulan_selesai" style="display: none;">
                                                    <div class="form-group app-label">
                                                        <label class="text-muted" id="bulan">Tanggal Selesai :</label>
                                                        <div class="form-button">
                                                            <select class="rounded" name="bulan_selesai" id="bulan_selesai" style="width:130px;padding-left:10px; height: 40px ! important">
                                                                <option selected value="" disabled>Bulan</option>
                                                                <option value="Jan">Januari</option>
                                                                <option value="Feb">Februari</option>
                                                                <option value="Mar">Maret</option>
                                                                <option value="Apr">April</option>
                                                                <option value="Mei">Mei</option>
                                                                <option value="Jun">Juni</option>
                                                                <option value="Jul">Juli</option>
                                                                <option value="Agu">Agustus</option>
                                                                <option value="Sep">September</option>
                                                                <option value="Okt">Oktober</option>
                                                                <option value="Nov">November</option>
                                                                <option value="Des">Desember</option>
                                                            </select>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-3 md" id="tahun_selesai" style="display : none">
                                                    <div class="form-group app-label">
                                                        <label class="text-white">.</label>
                                                        <div class="form-button">
                                                            <select class="rounded" name="tahun_selesai" id="tahun_selesai" style="width:100px;padding-left:10px; height: 40px ! important">
                                                                <option selected value="" disabled>Tahun</option>
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
                                                <div class="col-12 md">
                                                    <button type="submit" name="btnRiwayatPekerjaan" class="btn btn-primary"><i class="mdi mdi-plus"></i> Tambah</button>
                                                </div>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-12" id="tblPengalaman">
                                        <?php if ($result_get[0]['pengalaman_kerja'] == "" || empty($result_get[0]['pengalaman_kerja'])) : ?>
                                            <p class="alert alert-warning">Ups ! Riwayat Pekerjaan kamu belum ada ... <i class="mdi mdi-emoticon-sad"></i></p>
                                        <?php else : ?>
                                            <table class="table rounded" style="border: 1px solid #e1e0e0;width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>Nama Perusahaan</th>
                                                        <th>Jabatan</th>
                                                        <th>Tanggal Mulai/Selesai</th>
                                                        <th>#</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php foreach ($pengalamanKerja as $row) : ?>
                                                        <tr>
                                                            <?php
                                                            $pk2 = explode(',', $row);
                                                            ?>
                                                            <td><?= $pk2[0]; ?></td>
                                                            <td><?= $pk2[1]; ?></td>
                                                            <td><?= $pk2[2]; ?></td>
                                                            <td><button type="button" onclick="hapusPengalaman(this)" class="btn btn-danger-outline" id="<?= $row; ?>" data-toggle="tooltip" title="Hapus"><i class="mdi mdi-delete"></i></button></td>

                                                        </tr>
                                                    <?php endforeach; ?>
                                                </tbody>
                                            </table>
                                        <?php endif; ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <form action="edit_profil.php" method="POST">
                        <button type="submit" class="btn btn-primary" name="btnSimpanPengalaman">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </form>
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
                    <div class="container" id="container_keterampilan">
                        <div class="row">
                            <div class="col-12 mt-3" style="margin-top:0px ! important">
                                <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                    <div class="row mt-1">
                                        <div class="col-md-12">
                                            <p>Silahkan masukan keterampilan yang anda miliki !</p>
                                        </div>
                                        <div class="col-md-8 mt-1">
                                            <div class="form-group app-label">
                                                <input type="hidden" id="emailku" value="<?= $result_get[0]['email']; ?>">
                                                <input id="keterampilanku" type="text" class="form-control resume" placeholder="Nama keterampilan ...">
                                            </div>
                                        </div>
                                        <div class="col-md-4 mt-1">
                                            <div class="form-group app-label">
                                                <button type="button" id="btnKeterampilan" class="btn btn-primary">Tambah</button>
                                            </div>
                                        </div>

                                        <div class="col-12 mt-3" id="daftarKeterampilan">
                                            <?php if (empty($result_get[0]['keterampilan'])) : ?>
                                                <p class="alert alert-warning" role="alert">Ups ! Keterampilan kamu belum ada ... <i class="mdi mdi-emoticon-sad"></i> </p>
                                            <?php else : ?>
                                                <?php
                                                $b = explode(',', $result_get[0]['keterampilan']);
                                                ?>
                                                <?php foreach ($b as $t) : ?>
                                                    <a class="badge badge-secondary text-white" onclick="remove(this)" id="<?= $t; ?>" style="font-size: 15px;padding:7px 15px 7px 15px"> <?= $t; ?> &nbsp; <i class="mdi mdi-close"></i></a>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <form action="edit_profil.php" method="POST">
                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn_keterampilan">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
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
                    <h4 class="modal-title">Edit Karir Yang Diminati</h4>
                    <button type="button" class="close btnClose" data-dismiss="modal">&times;</button>
                </div>
                <form action="edit_profil.php" method="POST">
                    <!-- Modal body -->
                    <div class="modal-body">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mt-3" style="margin-top:0px ! important">
                                    <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                        <div class="row mt-4">
                                            <div class="col-md-10">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Pilih Karir Yang Diminati:</label>
                                                    <input type="hidden" name="id_user" value="<?= $result_get[0]["id_user"]; ?>">
                                                    <input type="hidden" name="nama_depan" value="<?= $result_get[0]["nama_depan"]; ?>">
                                                    <input type="hidden" name="nama_belakang" value="<?= $result_get[0]["nama_belakang"]; ?>">
                                                    <input type="hidden" name="email" value="<?= $result_get[0]["email"]; ?>">
                                                    <input type="hidden" name="password" value="<?= $result_get[0]["password"]; ?>">
                                                    <input type="hidden" name="tgl_lahir" value="<?= $result_get[0]["tgl_lahir"]; ?>">
                                                    <input type="hidden" name="jenis_kelamin" value="<?= $result_get[0]["jenis_kelamin"]; ?>">
                                                    <input type="hidden" name="status" value="<?= $result_get[0]["status"]; ?>">
                                                    <input type="hidden" name="foto" value="<?= $result_get[0]["foto"]; ?>">
                                                    <input type="hidden" name="provinsi" value="<?= $result_get[0]["provinsi"]; ?>">
                                                    <input type="hidden" name="kota" value="<?= $result_get[0]["kota"]; ?>">
                                                    <input type="hidden" name="alamat" value="<?= $result_get[0]["alamat"]; ?>">
                                                    <input type="hidden" name="telepon" value="<?= $result_get[0]["telepon"]; ?>">
                                                    <input type="hidden" name="hash" value="<?= $result_get[0]["hash"]; ?>">
                                                    <input type="hidden" name="active" value="<?= $result_get[0]["active"]; ?>">
                                                    <input type="hidden" name="ringkasan_pribadi" value="<?= $result_get[0]["ringkasan_pribadi"]; ?>">
                                                    <input type="hidden" name="pengalaman_kerja" value="<?= $result_get[0]["pengalaman_kerja"]; ?>">
                                                    <input type="hidden" name="mencari_pekerjaan" value="<?= $result_get[0]["mencari_pekerjaan"]; ?>">
                                                    <input type="hidden" name="keterampilan" value="<?= $result_get[0]["keterampilan"]; ?>">
                                                    <input type="hidden" name="pendidikan_terakhir" value="<?= $result_get[0]["pendidikan_terakhir"]; ?>">
                                                    <input type="hidden" name="dok1" value="<?= $result_get[0]["dok1"]; ?>">
                                                    <input type="hidden" name="dok2" value="<?= $result_get[0]["dok2"]; ?>">
                                                    <input type="hidden" name="ketunaan" value="<?= $result_get[0]["ketunaan"]; ?>">
                                                    <input type="hidden" name="alat_bantu" value="<?= $result_get[0]["alat_bantu"]; ?>">
                                                    <input type="hidden" name="detail_tambahan" value="<?= $result_get[0]["detail_tambahan"]; ?>">


                                                    <input type="hidden" id="tmp_karir" name="tmp_karir" value="<?= $result_get[0]['kariryangdimininati'] ?>">
                                                    <div class="form-button">
                                                        <select class="rounded" style="width:100%;padding-left:10px; height: 40px ! important" id="cboStudent"></select>
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="col-md-2">
                                                <div class="form-group app-label">
                                                    <!-- <label class="text-muted">Lokasi :</label>
                                                    <input id="middle-name" name="kota" type="text" class="form-control resume" placeholder="Lokasi.."> -->
                                                    <input type="hidden" name="karir" id="karir">
                                                </div>
                                            </div>
                                        </div>

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="submit" id="btnGetStudent" name="btn_karir" class="btn btn-primary">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
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
                                    <?php if ($result_get[0]['dok1'] !== '' && $result_get[0]['dok2'] !== '') : ?>
                                        <div class="row mt-4" style="margin:0px 0px 0px 0px ! important">
                                            <div class="col-md-12" style="margin-bottom: 40px;"><i class="text-danger">* Berkas harus berupa format .pdf atau .jpeg dan ukuran berkas tidak lebih dari 2MB </i></div>
                                            <div class="col-md-12">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Pilih Berkas:</label>
                                                    <input type="file" name="berkas">
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="form-group app-label">
                                                    <label class="text-muted">Keterangan :</label>
                                                    <div class="form-button">
                                                        <select class="form-control keterangan rounded" name="keterangan">
                                                            <option value="CV">Curriculum Vitae</option>
                                                            <option value="Ijazah">Ijazah</option>
                                                            <option value="TranskripNilai">Transkrip Nilai</option>
                                                            <option value="Kartu Tanda Penduduk">Kartu Tanda Penduduk</option>
                                                            <option value="Sertifikat">Sertifikat Pelatihan</option>
                                                            <option value="Sertifikat Kejuaraan/Lomba">Sertifikat Kejuaraan/Lomba</option>
                                                            <option value="Lainnya">Lainnya</option>
                                                        </select>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-md-3" style="padding-top:30px">
                                                <div class="form-group app-label">
                                                    <button onclick="loginEx()" class="btn btn-primary" style="width: 100%">Tambah</button>
                                                </div>
                                            </div>
                                            <div class="col-md-12 mt-3 bordered rounded">
                                                <input type="hidden" id="emailnya" value="<?= $result_get[0]["email"]; ?>">
                                                <div id="area_berkas">
                                                    <?php if ($result_get[0]['dok1'] == '' && $result_get[0]['dok2'] == '') : ?>
                                                        <div class="alert alert-warning" role="alert"> Belum ada berkas yang diunggah! </div>
                                                    <?php else : ?>
                                                        <?php
                                                        $berkas1 = $result_get[0]['dok1'];
                                                        $berkas2 = $result_get[0]['dok2'];

                                                        $tmp_berkas = [$berkas1];
                                                        if ($berkas2 !== '') {
                                                            $tmp_berkas[] = $berkas2;
                                                        }

                                                        ?>
                                                        <table class="table rounded" style="border: 1px solid #e1e0e0;width:100%">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Keterangan</th>
                                                                    <th>Berkas</th>
                                                                    <th>#</th>
                                                                </tr>
                                                                <?php foreach ($tmp_berkas as $b) : ?>
                                                                    <?php
                                                                    $tmp_b = explode(',', $b);
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= $tmp_b[1]; ?></td>
                                                                        <td><?= $tmp_b[0]; ?></td>
                                                                        <td><button type="button" class="btn btn-danger-outline" id="<?= $tmp_b[2]; ?>" data-toggle="tooltip" title="Hapus"><i class="mdi mdi-delete"></i></button></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>
                                    <?php else : ?>

                                        <div class="row mt-4" style="margin:0px 0px 0px 0px ! important">
                                            <form action="edit_profil.php" method="POST" enctype="multipart/form-data">
                                                <div class="container">
                                                    <div class="row">
                                                        <div class="col-md-12" style="margin-bottom: 40px;"><i class="text-danger">* Format berkas yang dapat diunggah adalah .pdf, .png, .jpg atau .jpeg dan ukuran berkas tidak lebih dari 2MB </i></div>
                                                        <div class="col-md-12">
                                                            <div class="form-group app-label">
                                                                <label class="text-muted">Pilih Berkas:</label>
                                                                <input type="file" name="berkas" required>

                                                                <input type="hidden" name="id_user" value="<?= $result_get[0]["id_user"]; ?>">
                                                                <input type="hidden" name="nama_depan" value="<?= $result_get[0]["nama_depan"]; ?>">
                                                                <input type="hidden" name="nama_belakang" value="<?= $result_get[0]["nama_belakang"]; ?>">
                                                                <input type="hidden" name="email" value="<?= $result_get[0]["email"]; ?>">
                                                                <input type="hidden" name="password" value="<?= $result_get[0]["password"]; ?>">
                                                                <input type="hidden" name="tgl_lahir" value="<?= $result_get[0]["tgl_lahir"]; ?>">
                                                                <input type="hidden" name="jenis_kelamin" value="<?= $result_get[0]["jenis_kelamin"]; ?>">
                                                                <input type="hidden" name="status" value="<?= $result_get[0]["status"]; ?>">
                                                                <input type="hidden" name="foto" value="<?= $result_get[0]["foto"]; ?>">
                                                                <input type="hidden" name="provinsi" value="<?= $result_get[0]["provinsi"]; ?>">
                                                                <input type="hidden" name="kota" value="<?= $result_get[0]["kota"]; ?>">
                                                                <input type="hidden" name="alamat" value="<?= $result_get[0]["alamat"]; ?>">
                                                                <input type="hidden" name="telepon" value="<?= $result_get[0]["telepon"]; ?>">
                                                                <input type="hidden" name="hash" value="<?= $result_get[0]["hash"]; ?>">
                                                                <input type="hidden" name="active" value="<?= $result_get[0]["active"]; ?>">
                                                                <input type="hidden" name="ringkasan_pribadi" value="<?= $result_get[0]["ringkasan_pribadi"]; ?>">
                                                                <input type="hidden" name="pengalaman_kerja" value="<?= $result_get[0]["pengalaman_kerja"]; ?>">
                                                                <input type="hidden" name="mencari_pekerjaan" value="<?= $result_get[0]["mencari_pekerjaan"]; ?>">
                                                                <input type="hidden" name="keterampilan" value="<?= $result_get[0]["keterampilan"]; ?>">
                                                                <input type="hidden" name="pendidikan_terakhir" value="<?= $result_get[0]["pendidikan_terakhir"]; ?>">
                                                                <input type="hidden" name="kariryangdimininati" value="<?= $result_get[0]["kariryangdimininati"]; ?>">
                                                                <input type="hidden" name="ketunaan" value="<?= $result_get[0]["ketunaan"]; ?>">
                                                                <input type="hidden" name="alat_bantu" value="<?= $result_get[0]["alat_bantu"]; ?>">
                                                                <input type="hidden" name="detail_tambahan" value="<?= $result_get[0]["detail_tambahan"]; ?>">
                                                                <input type="hidden" name="dok1" value="<?= $result_get[0]["dok1"]; ?>">
                                                                <input type="hidden" name="dok2" value="<?= $result_get[0]["dok2"]; ?>">
                                                            </div>
                                                        </div>

                                                        <!-- //DISINI -->
                                                        <div class="col-md-6">
                                                            <div class="form-group app-label">
                                                                <label class="text-muted">Keterangan</label>
                                                                <div class="form-button">
                                                                    <select class="form-control keterangan rounded" name="keterangan">
                                                                        <option value="CV">Curriculum Vitae</option>
                                                                        <option value="Ijazah">Ijazah</option>
                                                                        <option value="TranskripNilai">Transkrip Nilai</option>
                                                                        <option value="Kartu Tanda Penduduk">Kartu Tanda Penduduk</option>
                                                                        <option value="Sertifikat">Sertifikat Pelatihan</option>
                                                                        <option value="Sertifikat Kejuaraan/Lomba">Sertifikat Kejuaraan/Lomba</option>
                                                                        <option value="Lainnya">Lainnya</option>
                                                                    </select>
                                                                </div>
                                                            </div>
                                                        </div>
                                                        <div class="col-md-3" style="padding-top:30px">
                                                            <div class="form-group app-label">
                                                                <button type="submit" name="btn_berkas" class="btn btn-primary" style="width: 100%">Tambah</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="pilihanLain">
                                                    </div>
                                                </div>
                                            </form>


                                            <div class="col-md-12 mt-3 bordered rounded" id="area_berkas">
                                                <input type="hidden" id="emailnya" value="<?= $result_get[0]["email"]; ?>">
                                                <div>
                                                    <?php if ($result_get[0]['dok1'] == '' && $result_get[0]['dok2'] == '') : ?>
                                                        <div class="alert alert-warning" role="alert"> Belum ada berkas yang diunggah! </div>
                                                    <?php else : ?>
                                                        <?php
                                                        $berkas1 = $result_get[0]['dok1'];
                                                        $berkas2 = $result_get[0]['dok2'];

                                                        $tmp_berkas = [];

                                                        if ($berkas1 !== '') {
                                                            $tmp_berkas[] = $berkas1;
                                                        }
                                                        if ($berkas2 !== '') {
                                                            $tmp_berkas[] = $berkas2;
                                                        }

                                                        ?>
                                                        <table class="table rounded" style="border: 1px solid #e1e0e0;width:100%">
                                                            <tbody>
                                                                <tr>
                                                                    <th>Keterangan</th>
                                                                    <th>Berkas</th>
                                                                    <th>#</th>
                                                                </tr>
                                                                <?php foreach ($tmp_berkas as $b) : ?>
                                                                    <?php
                                                                    $tmp_b = explode(',', $b);
                                                                    ?>
                                                                    <tr>
                                                                        <td><?= $tmp_b[1]; ?></td>
                                                                        <td><?= $tmp_b[0]; ?></td>
                                                                        <td><button type="button" class="btn btn-danger-outline" id="<?= $tmp_b[2]; ?>" data-toggle="tooltip" title="Hapus"><i class="mdi mdi-delete"></i></button></td>
                                                                    </tr>
                                                                <?php endforeach; ?>
                                                            </tbody>
                                                        </table>
                                                    <?php endif; ?>
                                                </div>
                                            </div>
                                        </div>

                                    <?php endif; ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Ini adalah Bagian Footer Modal -->
                <div class="modal-footer">
                    <a href="profile.php" class="btn btn-primary">Simpan</a>
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
                <form action="edit_profil.php" method="POST" enctype="multipart/form-data">
                    <!-- Modal body -->
                    <div class="modal-body text-center">
                        <div class="container">
                            <div class="row">
                                <div class="col-12 mt-3" style="margin-top:0px ! important">
                                    <div class="custom-form p-4" style="padding: 0px 24px 0px 24px ! important">
                                        <div class="row mt-4" style="margin:0px 0px 0px 0px ! important">
                                            <div class="col-md-12" style="margin-bottom: 10px;">
                                                <div class="position-relative overflow-hidden">
                                                    <img id="foto_display" src="<?= $result_get[0]['foto'] == 'default.png' ? 'images/profil/default.png' : 'http://lokeritas.xyz/api-v1/uploads/Foto/' . $result_get[0]['foto']  ?>" height="150" style="width:150px;border:7px solid white" alt="" class="d-block mx-auto shadow rounded-pill mb-4">

                                                </div>
                                            </div>
                                            <div class="col-md-12">
                                                <div class="form-group app-label">
                                                    <button type="button" id="btn_pilih" onclick="triggerClick()" class="btn btn-success">Pilih Foto</button>
                                                    <input type="file" name="berkas_foto" id="berkas_foto" onchange="displayImage(this)" style="display: none">

                                                    <input type="hidden" name="id_user" value="<?= $result_get[0]["id_user"]; ?>">
                                                    <input type="hidden" name="nama_depan" value="<?= $result_get[0]["nama_depan"]; ?>">
                                                    <input type="hidden" name="nama_belakang" value="<?= $result_get[0]["nama_belakang"]; ?>">
                                                    <input type="hidden" name="email" value="<?= $result_get[0]["email"]; ?>">
                                                    <input type="hidden" name="password" value="<?= $result_get[0]["password"]; ?>">
                                                    <input type="hidden" name="tgl_lahir" value="<?= $result_get[0]["tgl_lahir"]; ?>">
                                                    <input type="hidden" name="jenis_kelamin" value="<?= $result_get[0]["jenis_kelamin"]; ?>">
                                                    <input type="hidden" name="status" value="<?= $result_get[0]["status"]; ?>">
                                                    <input type="hidden" name="provinsi" value="<?= $result_get[0]["provinsi"]; ?>">
                                                    <input type="hidden" name="kota" value="<?= $result_get[0]["kota"]; ?>">
                                                    <input type="hidden" name="alamat" value="<?= $result_get[0]["alamat"]; ?>">
                                                    <input type="hidden" name="telepon" value="<?= $result_get[0]["telepon"]; ?>">
                                                    <input type="hidden" name="hash" value="<?= $result_get[0]["hash"]; ?>">
                                                    <input type="hidden" name="active" value="<?= $result_get[0]["active"]; ?>">
                                                    <input type="hidden" name="ringkasan_pribadi" value="<?= $result_get[0]["ringkasan_pribadi"]; ?>">
                                                    <input type="hidden" name="pengalaman_kerja" value="<?= $result_get[0]["pengalaman_kerja"]; ?>">
                                                    <input type="hidden" name="mencari_pekerjaan" value="<?= $result_get[0]["mencari_pekerjaan"]; ?>">
                                                    <input type="hidden" name="keterampilan" value="<?= $result_get[0]["keterampilan"]; ?>">
                                                    <input type="hidden" name="pendidikan_terakhir" value="<?= $result_get[0]["pendidikan_terakhir"]; ?>">
                                                    <input type="hidden" name="kariryangdimininati" value="<?= $result_get[0]["kariryangdimininati"]; ?>">
                                                    <input type="hidden" name="ketunaan" value="<?= $result_get[0]["ketunaan"]; ?>">
                                                    <input type="hidden" name="alat_bantu" value="<?= $result_get[0]["alat_bantu"]; ?>">
                                                    <input type="hidden" name="detail_tambahan" value="<?= $result_get[0]["detail_tambahan"]; ?>">
                                                    <input type="hidden" name="dok1" value="<?= $result_get[0]["dok1"]; ?>">
                                                    <input type="hidden" name="dok2" value="<?= $result_get[0]["dok2"]; ?>">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Ini adalah Bagian Footer Modal -->
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary" name="btn_foto">Simpan</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Batal</button>
                    </div>
                </form>
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
    <script src="js/plugins.js"></script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>


    <script>
        function triggerClick() {
            document.querySelector('#berkas_foto').click();
        }

        function displayImage(e) {
            if (e.files[0]) {
                var reader = new FileReader();

                reader.onload = function(e) {
                    document.querySelector('#foto_display').setAttribute('src', e.target.result);
                }

                reader.readAsDataURL(e.files[0]);
            }
        }
    </script>

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function loginEx() {
            swal("Perhatian!", "Berkas yang diunggah maksimal 2 !", "warning");
        }
    </script>

    <script src="assets/ckeditor/ckeditor.js"></script>

    <script>
        CKEDITOR.replace('lamaran');
    </script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>
    <script src="js/script.js"></script>
    <script src="js/script-dok1.js"></script>
    <script src="js/script-dok2.js"></script>
    <script src="js/script-keterampilan.js"></script>

    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>

    <script>
        function ShowHide() {
            var pendidikan = document.getElementById("pendidikan");
            var jurusan = document.getElementById("jurusan");
            if (pendidikan.value === "SD" || pendidikan.value === "SMP" || pendidikan.value === "SMA") {
                jurusan.style.display = "none";
            } else {
                jurusan.style.display = "block";
            }
        }
    </script>

    <script>
        function showForm(el) {
            var form_pendaftaram = document.getElementById("formPengalaman");
            var element = el;

            form_pendaftaram.style.display = "block";

            element.remove();
        }
    </script>

    <script>
        function hideTanggal() {
            var masihBekerja = document.getElementById("masih_bekerja");
            var bulanSelesai = document.getElementById("bulan_selesai");
            var tahunSelesai = document.getElementById("tahun_selesai");

            if (masihBekerja.checked == true) {
                bulanSelesai.style.display = "none";
                tahunSelesai.style.display = "none";
            } else {
                bulanSelesai.style.display = "block";
                tahunSelesai.style.display = "block";
            }
        }
    </script>


    <!-- for karir yang diminati-->
    <script src="js/jquery-2.2.3.min.js"></script>
    <script src="js/fSelect.js"></script>
    <script src="js/ikrPluginsForfSelect.js"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            var oAllStudent = [];

            oAllStudent.push({
                StudentId: 1,
                Name: "Advertising, Printing & Media"
            }, {
                StudentId: 2,
                Name: "Asuransi"
            }, {
                StudentId: 3,
                Name: "Badan Usaha Milik Negara (BUMN)"
            }, {
                StudentId: 4,
                Name: "Bank"
            }, {
                StudentId: 5,
                Name: "Design & Productions"
            }, {
                StudentId: 6,
                Name: "Event Organizer"
            }, {
                StudentId: 7,
                Name: "Farmasi"
            }, {
                StudentId: 8,
                Name: "Hotel & Pariwisata"
            }, {
                StudentId: 9,
                Name: "Jasa Komputer & Perangkatnya"
            }, {
                StudentId: 10,
                Name: "Kabel"
            }, {
                StudentId: 11,
                Name: "Kayu & Pengolahannya"
            }, {
                StudentId: 12,
                Name: "Keramik , Porselen dan Kaca"
            }, {
                StudentId: 13,
                Name: "Kesehatan dan Kecantikan"
            }, {
                StudentId: 14,
                Name: "Kimia"
            }, {
                StudentId: 15,
                Name: "Konstruksi Bangunan"
            }, {
                StudentId: 16,
                Name: "Kosmetik & Barang Keperluan Rumah Tangga"
            }, {
                StudentId: 17,
                Name: "Lembaga Pelatihan atau Kursus"
            }, {
                StudentId: 18,
                Name: "Lembaga Pembiayaan"
            }, {
                StudentId: 19,
                Name: "Lembaga Pendidikan"
            }, {
                StudentId: 20,
                Name: "Logam dan Sejenisnya"
            }, {
                StudentId: 21,
                Name: "Makanan & Minuman"
            }, {
                StudentId: 22,
                Name: "Non Profit"
            }, {
                StudentId: 23,
                Name: "Otomotif & Komponennya"
            }, {
                StudentId: 24,
                Name: "Pakaian & Alas Kaki"
            }, {
                StudentId: 25,
                Name: "Pakan Ternak"
            }, {
                StudentId: 26,
                Name: "Pelayanan Pelanggan"
            }, {
                StudentId: 27,
                Name: "Peralatan Rumah Tangga"
            }, {
                StudentId: 28,
                Name: "Perdagangan Besar Barang Produksi"
            }, {
                StudentId: 29,
                Name: "Perdagangan Eceran"
            }, {
                StudentId: 30,
                Name: "Perikanan"
            }, {
                StudentId: 31,
                Name: "Perkebunan"
            }, {
                StudentId: 32,
                Name: "Pertambangan"
            }, {
                StudentId: 33,
                Name: "Perusahaan Efek"
            }, {
                StudentId: 34,
                Name: "Peternakan"
            }, {
                StudentId: 35,
                Name: "Plastik & Kemasan"
            }, {
                StudentId: 36,
                Name: "Pulp & Kertas"
            }, {
                StudentId: 37,
                Name: "Real Estate & Properti"
            }, {
                StudentId: 38,
                Name: "Restoran"
            }, {
                StudentId: 39,
                Name: "Retail"
            }, {
                StudentId: 40,
                Name: "Rokok"
            }, {
                StudentId: 41,
                Name: "SDM (Sumber Daya Manusia)"
            }, {
                StudentId: 42,
                Name: "Semen"
            }, {
                StudentId: 43,
                Name: "Software House"
            }, {
                StudentId: 44,
                Name: "Sosial"
            }, {
                StudentId: 45,
                Name: "Teknologi Informasi"
            }, {
                StudentId: 46,
                Name: "Tekstil & Garmen"
            }, {
                StudentId: 47,
                Name: "Telekomunikasi"
            }, {
                StudentId: 48,
                Name: "Transportasi"
            });

            $("#cboStudent").ikrLoadfSelectCombo({
                List: oAllStudent,
                DisplayText: "Name", //Display Property name
                OtherProperties: "StudentId,Name", //OtherProperties means those properties of object that we need for use
                PrimaryKey: "StudentId", //PrimaryKey
            });

            $("#btnGetStudent").click(function() {
                $("#cboStudent").ikrGetValuefSelectCombo({
                    PrimaryKey: "StudentId",
                    DataValue: "Name", //Display Property name
                    ReturnProperties: "StudentId,Name",
                    IsReturnSingleValue: false
                }, function(response) {
                    if (response.status && response.obj != null) {
                        var selectedItemList = response.obj;
                        var dft_karir = '';

                        // for (var i = 0; i < selectedItemList.length; i++) {
                        //     dft_karir += selectedItemList[i].Name + '-';
                        // }
                        // dft_karir = dft_karir.substring(0, dft_karir.length - 1);
                        // document.getElementById('karir').value = dft_karir;
                        // console.log(dft_karir);

                        if (selectedItemList.length > 3) {
                            alert('Karir yang diminati yang dipilih maksimal 3 !');
                            event.preventDefault();
                            return false;

                        } else {
                            for (var i = 0; i < selectedItemList.length; i++) {
                                dft_karir += selectedItemList[i].Name + '-';
                            }
                            dft_karir = dft_karir.substring(0, dft_karir.length - 1);
                            document.getElementById('karir').value = dft_karir;
                            console.log(dft_karir);
                        }
                    }
                });
            });

            var x = document.getElementById("tmp_karir").value;
            if (x !== '') {
                var oStudents = GetStudent();
                $("#cboStudent").ikrSetValuefSelectCombo({
                    List: oStudents,
                    MatchField: "Name" // MatchField means that property which is used as option's text in DropDownList
                });
            }
        });

        function GetStudent() {

            var karir = document.getElementById("tmp_karir").value;
            var dft_karir = karir.split("-");
            var oStudents = [];

            for (var i = 0; i < dft_karir.length; i++) {
                oStudents.push({
                    StudentId: 0,
                    Name: dft_karir[i]
                })
            }
            return oStudents;
        }

        console.log(GetStudent());
    </script>

    <script>
        function remove(el) {
            var email = document.getElementById("emailku");
            var daftarKeterampilan = document.getElementById("daftarKeterampilan");
            var element = el;

            //buat object ajax
            var xhr = new XMLHttpRequest();

            //cek kesiapan ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    daftarKeterampilan.innerHTML = xhr.responseText;
                }
            }

            //eksekusi ajax
            xhr.open('GET', 'ajax/hapus_keterampilan.php?email=' + email.value + '&keterampilan=' + element.id, true);
            xhr.send();

            element.remove();


        }
    </script>

    <script>
        function hapusPengalaman(el) {
            var email = document.getElementById("emailku");
            var tabelPengalaman = document.getElementById("tblPengalaman");
            var element = el;

            //buat object ajax
            var xhr = new XMLHttpRequest();

            //cek kesiapan ajax
            xhr.onreadystatechange = function() {
                if (xhr.readyState == 4 && xhr.status == 200) {
                    tabelPengalaman.innerHTML = xhr.responseText;
                }
            }

            //eksekusi ajax
            xhr.open('GET', 'ajax/hapus_pengalaman.php?email=' + email.value + '&pengalaman=' + element.id, true);
            xhr.send();

        }
    </script>
    <!-- Keterangan Lainnya -->
    <script>
        $(".keterangan").on("change", function() {
            if ($(this).val() == "Lainnya") {
                $(this).attr("name", "");
                $(".pilihanLain").append(`
                    <div class="form-group app-label">
                        <label class="text-muted">Lainnya</label>
                        <div class="form-button">
                            <input id="middle-name" name="keterangan" type="text" class="form-control resume">
                        </div>
                    </div>
                `);
            } else(
                $(".pilihanLain .form-group").remove()
            );
        });
    </script>

    <script type="text/javascript" src="js/bootstrap-filestyle.min.js"> </script>
    <script>
        $(":file").filestyle();
    </script>
</body>

</html>