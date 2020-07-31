<?php
session_start();

$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/semua_lowongan.php');
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$result_get = curl_exec($curl_get);
curl_close($curl_get);

$daftar_tipskarir = json_decode($result_get, true);

$page = (isset($_GET['page'])) ? $_GET['page'] : 1;
$search = (isset($_GET['search'])) ? $_GET['search'] : "";

if (isset($_POST['q'])) {
    $limit = 100;
} else if (isset($_POST['cari'])) {
    $limit = 100;
} else {
    $limit = 4;
}
$limitStart = ($page - 1) * $limit;
$jumlahData = count($daftar_tipskarir);
$jumlahHalaman = ceil($jumlahData / $limit);
$daftar_tipskarir = array_slice($daftar_tipskarir, $limitStart, $limit);

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
                        <h4 class="text-uppercase title mb-4">Pencarian Lowongan Pekerjaan</h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <div class="container mt-3">
        <div class="home-form-position">
            <div class="row">
                <div class="col-lg-12">
                    <div class="home-registration-form p-4 mb-3">

                        <form class="registration-form" action="lowongan.php" method="post">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="registration-form-box">
                                        <i class="fa fa-briefcase"></i>
                                        <input type="text" id="exampleInputName1" name="search" class="form-control rounded registration-input-box" placeholder="Nama Pekerjaan / Perusahaan" required="">
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="registration-form-box">
                                        <i class="fa fa-list-alt"></i>
                                        <select id="select-category" class="demo-default" name="bidang" required="">
                                            <option value=" ">Semua Bidang</option>
                                            <option value="Advertising, Printing & Media">Advertising, Printing & Media</option>
                                            <option value="Asuransi">Asuransi</option>
                                            <option value="Badan Usaha">Badan Usaha Milik Negara (BUMN)</option>
                                            <option value="Bank">Bank</option>
                                            <option value="Design & Productions">Design & Productions</option>
                                            <option value="Event Organizer">Event Organizer</option>
                                            <option value="Farmasi">Farmasi</option>
                                            <option value="Hotel & Pariwisata">Hotel & Pariwisata</option>
                                            <option value="Jasa Komputer & Perangkatnya">Jasa Komputer & Perangkatnya</option>
                                            <option value="Kabel">Kabel</option>
                                            <option value="Kayu & Pengolahannya">Kayu & Pengolahannya</option>
                                            <option value="Keramik, Porselen dan Kaca">Keramik, Porselen dan Kaca</option>
                                            <option value="Kesehatan dan Kecantikan">Kesehatan dan Kecantikan</option>
                                            <option value="Kimia">Kimia</option>
                                            <option value="Konstruksi Bangunan">Konstruksi Bangunan</option>
                                            <option value="Kosmetik & Barang Keperluan Rumah Tangga">Kosmetik & Barang Keperluan Rumah Tangga</option>
                                            <option value="Lembaga Pelatihan atau Kursus">Lembaga Pelatihan atau Kursus</option>
                                            <option value="Lembaga Pembiayaan">Lembaga Pembiayaan</option>
                                            <option value="Lembaga Pendidikan">Lembaga Pendidikan</option>
                                            <option value="Logam dan Sejenisnya">Logam dan Sejenisnya</option>
                                            <option value="Makanan & Minuman">Makanan & Minuman</option>
                                            <option value="Non Profit">Non Profit</option>
                                            <option value="Otomotif & Komponennya">Otomotif & Komponennya</option>
                                            <option value="Seni, Budaya dan Hiburan">Pakaian & Alas Kaki</option>
                                            <option value="Pakan Ternak">Pakan Ternak</option>
                                            <option value="Pelayanan Pelanggan">Pelayanan Pelanggan</option>
                                            <option value="Peralatan Rumah Tangga">Peralatan Rumah Tangga</option>
                                            <option value="Perdagangan Besar Barang Produksi">Perdagangan Besar Barang Produksi</option>
                                            <option value="Perdagangan Eceran">Perdagangan Eceran</option>
                                            <option value="Perikanan">Perikanan</option>
                                            <option value="Perkebunan">Perkebunan</option>
                                            <option value="Pertambangan">Pertambangan</option>
                                            <option value="Perusahaan Efek">Perusahaan Efek</option>
                                            <option value="Peternakan">Peternakan</option>
                                            <option value="Plastik & Kemasan">Plastik & Kemasan</option>
                                            <option value="Pulp & Kertas">Pulp & Kertas</option>
                                            <option value="Real Estate & Properti">Real Estate & Properti</option>
                                            <option value="Restoran">Restoran</option>
                                            <option value="Retail">Retail</option>
                                            <option value="Rokok">Rokok</option>
                                            <option value="SDM">SDM (Sumber Daya Manusia)</option>
                                            <option value="Semen">Semen</option>
                                            <option value="Software House">Software House</option>
                                            <option value="Sosial">Sosial</option>
                                            <option value="Teknologi Informasi">Teknologi Informasi</option>
                                            <option value="Tekstil & Garmen">Tekstil & Garmen</option>
                                            <option value="Telekomunikasi">Telekomunikasi</option>
                                            <option value="Transportasi">Transportasi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="registration-form-box">
                                        <i class="fa fa-location-arrow"></i>
                                        <select id="select-country" class="demo-default" name="lokasi" required="">
                                            <option value=" ">Semua Lokasi</option>
                                            <option value="Kab. Asahan">Kab. Asahan</option>
                                            <option value="Kab. Batu Bara">Kab. Batu Bara</option>
                                            <option value="Kab. Dairi">Kab. Dairi</option>
                                            <option value="Kab. Deli Serdang">Kab. Deli Serdang</option>
                                            <option value="Kab. Humbang Hasundutan">Kab. Humbang Hasundutan</option>
                                            <option value="Kab. Karo">Kab. Karo</option>
                                            <option value="Kab. Labuhan Batu">Kab. Labuhan Batu</option>
                                            <option value="Kab. Labuhan Batu Selatan">Kab. Labuhan Batu Selatan</option>
                                            <option value="Kab. Labuhan Batu Utara">Kab. Labuhan Batu Utara</option>
                                            <option value="Kab. Langkat">Kab. Langkat</option>
                                            <option value="Kab. Mandailing Natal">Kab. Mandailing Natal</option>
                                            <option value="Kab. Nias">Kab. Nias</option>
                                            <option value="Kab. Nias Barat">Kab. Nias Barat</option>
                                            <option value="Kab. Nias Selatan">Kab. Nias Selatan</option>
                                            <option value="Kab. Nias Utara">Kab. Nias Utara</option>
                                            <option value="Kab. Padang Lawas">Kab. Padang Lawas</option>
                                            <option value="Kab. Padang Lawas Utara">Kab. Padang Lawas Utara</option>
                                            <option value="Kab. Pakpak Bharat">Kab. Pakpak Bharat</option>
                                            <option value="Kab. Samosir">Kab. Samosir</option>
                                            <option value="Kab. Serdang Bedagai">Kab. Serdang Bedagai</option>
                                            <option value="Kab. Simalungun">Kab. Simalungun</option>
                                            <option value="Kab. Tapanuli Selatan">Kab. Tapanuli Selatan</option>
                                            <option value="Kab. Tapanuli Tengah">Kab. Tapanuli Tengah</option>
                                            <option value="Kab. Tapanuli Utara">Kab. Tapanuli Utara</option>
                                            <option value="Kab. Toba Samosir">Kab. Toba Samosir</option>
                                            <option value="Kab. Binjai">Kota Binjai</option>
                                            <option value="Kab. Gunung Sitoli">Kota Gunung Sitoli</option>
                                            <option value="Kota Medan">Kota Medan</option>
                                            <option value="Kota Padang Sidempuan">Kota Padang Sidempuan</option>
                                            <option value="Kota Pematang Siantar">Kota Pematang Siantar</option>
                                            <option value="Kota Siantar">Kota Siantar</option>
                                            <option value="Kota Sibolga">Kota Sibolga</option>
                                            <option value="Kota Tanjung Balai">Kota Tanjung Balai</option>
                                            <option value="Kota Tebing Tinggi">Kota Tebing Tinggi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="registration-form-box">
                                        <button type="submit" name="cari" class="btn btn-primary" style="width: 100%">Cari </button>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- all jobs start -->
    <section class="section" style="padding:0px 0px 50px 0px">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="tab-content mt-2" id="pills-tabContent">
                        <div class="tab-pane fade show active" id="recent-job" role="tabpanel" aria-labelledby="recent-job-tab">
                            <div class="row">

                                <div class="col-lg-12">
                                    <?php if (isset($_POST['cari'])) : ?>
                                        <?php $counter = 0; ?>
                                        <?php foreach ($daftar_tipskarir as $row) : ?>
                                            <?php

                                            $start_date = $row['tutup'];
                                            $expired = date('Y-m-d', strtotime($start_date));
                                            $currentdate = date('Y-m-d');
                                            $cari = strtolower($_POST['search']);
                                            $bidang = strtolower($_POST['bidang']);
                                            $lokasi = $_POST['lokasi'];
                                            $nama_pekerjaan = strtolower($row['nama_pekerjaan']);
                                            $nama_perusahaan = strtolower($row['nama_perusahaan']);
                                            $api_bidang = strtolower($row['sektor_perusahaan']);
                                            $api_lokasi = strtolower($row['kota']);

                                            if ($expired <= $currentdate) {
                                                $tutup = 'Sudah Tutup';
                                            } else {
                                                $tutup =  date("d F Y", strtotime($row['tutup']));
                                            }

                                            if (preg_match("/$cari/i", $nama_pekerjaan) || preg_match("/$cari/i", $nama_perusahaan)) {
                                                if (preg_match("/$bidang/i", $api_bidang) && preg_match("/$lokasi/i", $api_lokasi)) {
                                                    $counter++;
                                                    echo ' <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
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
                                                                    <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>' . $row['kota'] . '
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-3 bg-light">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div>
                                                                    <p class="text-muted mb-0 mo-mb-2">Jenis Disabilitas : <span class="text-dark">' . $row['ketunaan'] . '</span></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-4">
                                                                <div>
                                                                    <p class="text-muted mb-0 mo-mb-2">Tutup : ' . $tutup . '<span class="text-dark">
                                                                        </span></p>
                                                                </div>
                                                            </div>
                                                            <div class="col-md-3">
                                                                <a href="lowongan-detail.php?id=' . $row['id_lowongan'] . '" class="btn btn-primary">Selengkapnya</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                ';
                                                }
                                            }



                                            ?>
                                        <?php endforeach; ?>
                                        <?php if (!$counter) : ?>
                                            <div class="row">
                                                <i class="mx-auto mt-5 alert alert-warning">Pencarian tidak ditemukan</i>
                                            </div>
                                        <?php endif; ?>

                                    <?php elseif (isset($_POST['q'])) : ?>
                                        <?php $counter = 0; ?>
                                        <?php foreach ($daftar_tipskarir as $row) : ?>
                                            <?php
                                            $start_date = $row['tutup'];
                                            $expired = date('Y-m-d', strtotime($start_date));
                                            $currentdate = date('Y-m-d');
                                            $q = strtolower($_POST['q']);
                                            $nama_pekerjaan = strtolower($row['nama_pekerjaan']);
                                            $nama_perusahaan = strtolower($row['nama_perusahaan']);

                                            if ($expired <= $currentdate) {
                                                $tutup = 'Sudah Tutup';
                                            } else {
                                                $tutup =  date("d F Y", strtotime($row['tutup']));
                                            }

                                            if (preg_match("/$q/i", $nama_pekerjaan) || preg_match("/$q/i", $nama_perusahaan)) {
                                                $counter++;
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
                                                            <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>' . $row['kota'] . '
                                                            </p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="p-3 bg-light">
                                                <div class="row">
                                                    <div class="col-md-5">
                                                        <div>
                                                            <p class="text-muted mb-0 mo-mb-2">Jenis Disabilitas : <span class="text-dark">' . $row['ketunaan'] . '</span></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-4">
                                                        <div>
                                                            <p class="text-muted mb-0 mo-mb-2">Tutup : ' . $tutup . '<span class="text-dark">
                                                                </span></p>
                                                        </div>
                                                    </div>
                                                    <div class="col-md-3">
                                                        <a href="lowongan-detail.php?id=' . $row['id_lowongan'] . '" class="btn btn-primary">Selengkapnya</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>';
                                            }
                                            ?>
                                        <?php endforeach; ?>
                                        <?php if (!$counter) : ?>
                                            <div class="row">
                                                <i class="mx-auto mt-5 alert alert-warning">Pencarian tidak ditemukan</i>
                                            </div>
                                        <?php endif; ?>
                                    <?php else : ?>
                                        <?php foreach ($daftar_tipskarir as $row) : ?>
                                            <?php

                                            $start_date = $row['tutup'];
                                            $expired = date('Y-m-d', strtotime($start_date));
                                            $currentdate = date('Y-m-d');

                                            if ($expired >= $currentdate) {
                                                echo ' <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
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
                                                                    <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i>' . $row['kota'] . '
                                                                    </p>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="p-3 bg-light">
                                                        <div class="row">
                                                            <div class="col-md-5">
                                                                <div>
                                                                    <p class="text-muted mb-0 mo-mb-2">Jenis Disabilitas : <span class="text-dark">' . $row['ketunaan'] . '</span></p>
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
                                                </div>
                                                ';
                                            }

                                            ?>
                                        <?php endforeach; ?>
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
                                    <?php endif; ?>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- end row -->
        </div>
        <!-- end containar -->
    </section>
    <!-- all jobs end -->


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

    <!-- Memanggil jQuery.js -->
    <script src="jquery-3.2.1.min.js"></script>

    <!-- Memanggil Autocomplete.js -->
    <script src="jquery.autocomplete.min.js"></script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>
</body>

</html>