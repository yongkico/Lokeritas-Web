<?php
session_start();
require("functions.php");

//API Pencarian Lowongan Kerja
$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/semua_lowongan.php');
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$result_get_lowongan = curl_exec($curl_get);
curl_close($curl_get);

$result_get_lowongan = json_decode($result_get_lowongan, true);

$pekerjaan = $result_get_lowongan[0]['nama_pekerjaan'];
$lowongan_tutup = $result_get_lowongan[0]['tutup'];
$nama_perusahaan = $result_get_lowongan[0]['nama_perusahaan'];
$sektor_perusahaan = $result_get_lowongan[0]['sektor_perusahaan'];
$alamat_lowongan = $result_get_lowongan[0]['alamat'];

//AutoCompleteSearch

$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/index/autoSearch.php');
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$result_get = curl_exec($curl_get);
curl_close($curl_get);

$result_get = json_decode($result_get, true);

$nama_pekerjaan = $result_get['data'][0]['nama_pekerjaan'];
$nama_perusahaan = $result_get['data'][0]['nama_perusahaan'];

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
        <?php
        $id = $_SESSION["id"];
        $result = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
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
                        <li><a href="lowongan.php">Cari Lowongan</a></li>
                        <li><a href="tips-karir.php">Tips Karir</a></li>
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
    <?php endif; ?>

    <!-- Start home -->
    <section class="bg-half page-next-level" style="padding: 120px 0px 50px 0px;background: url('images/bg-2.jpg') center center;">
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h4 class="text-uppercase title mb-4">Pencarian Lowongan Pekerjaan <?= $nama_pekerjaan;?></h4>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <div class="container" style="height: 53px">
        <div class="home-form-position">
            <div class="row justify-content-center">
                <div class="col-lg-12">
                    <div class="home-registration-form job-list-reg-form bg-light shadow p-4 mb-3">
                        <form class="registration-form">
                            <div class="row">
                                <div class="col-lg-3 col-md-6">
                                    <div class="registration-form-box">
                                        <i class="fa fa-briefcase"></i>
                                        <input type="text" id="autocomplete" name ="autocomplete "class="form-control rounded registration-input-box" placeholder="Nama Pekerjaan">
                                    </div>
                                </div>
                                <script type="text/javascript">
                                                    $(document).ready(function () {
                                                        // Data yang ditamilkan pada autocomplete.                
                                                        var autocomplete = [
                                                            { value: '<?= $nama_pekerjaan;?>', data: '<?= $nama_pekerjaan;?>' },
                                                            { value: '<?= $nama_perusahaan;?>', data: '<?= $nama_perusahaan;?>' },
                                                        ];

                                                        // Selector input yang akan menampilkan autocomplete.
                                                        $("#autocomplete").autocomplete({
                                                            lookup: autocomplete
                                                        });
                                                    })
                                                </script>
                                <div class="col-lg-3 col-md-6">
                                    <div class="registration-form-box">
                                        <i class="fa fa-list-alt"></i>
                                        <select id="select-category" class="demo-default">
                                            <option value="">Bidang</option>
                                            <option value="ABC">Semua Bidang</option>
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
                                <div class="col-lg-3 col-md-6">
                                    <div class="registration-form-box">
                                        <i class="fa fa-location-arrow"></i>
                                        <select id="select-country" class="demo-default">
                                            <option value="">Lokasi</option>
                                            <option value="Semua Wilayah Sumut">Semua Wilayah Sumut</option>
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
                                            <option value="Kota PadangSidempuan">Kota Padangsidempuan</option>
                                            <option value="Kota Pematang Siantar">Kota Pematang Siantar</option>
                                            <option value="Kota Sibolga">Kota Sibolga</option>
                                            <option value="Kota Tanjung Balai">Kota Tanjung Balai</option>
                                            <option value="Kota Tebing Tinggi">Kota Tebing Tinggi</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-md-6">
                                    <div class="registration-form-box">
                                        <a href="lowongan.php">
                                            <button type="button" class="btn btn-primary" style="width: 100%">Cari</button>
                                        </a>
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

                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                        <div class="p-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <div class="mo-mb-2">
                                                        <img src="images/featured-job/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <h5 class="f-18"><a href="lowongan-detail.php" class="text-dark"><?php echo $pekerjaan;?></a></h5>
                                                        <p class="text-muted mb-0"><?php echo $nama_perusahaan;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i><?php echo $sektor_perusahaan;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i><?php echo $alamat_lowongan;?></p>
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
                                                        <p class="text-muted mb-0 mo-mb-2">Tutup :<span class="text-dark"> <?php echo $lowongan_tutup;?> </span></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="lowongan-detail.php" class="btn btn-info">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                        <div class="p-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <div class="mo-mb-2">
                                                        <img src="images/featured-job/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                    <h5 class="f-18"><a href="lowongan-detail.php" class="text-dark"><?php echo $pekerjaan;?></a></h5>
                                                        <p class="text-muted mb-0"><?php echo $nama_perusahaan;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i><?php echo $sektor_perusahaan;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i><?php echo $alamat_lowongan;?></p>
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
                                                        <p class="text-muted mb-0 mo-mb-2">Tutup :<span class="text-dark"> <?php echo $lowongan_tutup;?> </span></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="lowongan-detail.php" class="btn btn-info">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                        <div class="p-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <div class="mo-mb-2">
                                                        <img src="images/featured-job/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                    <h5 class="f-18"><a href="lowongan-detail.php" class="text-dark"><?php echo $pekerjaan;?></a></h5>
                                                        <p class="text-muted mb-0"><?php echo $nama_perusahaan;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i><?php echo $sektor_perusahaan;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i><?php echo $alamat_lowongan;?></p>
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
                                                        <p class="text-muted mb-0 mo-mb-2">Tutup :<span class="text-dark"> <?php echo $lowongan_tutup;?> </span></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="lowongan-detail.php" class="btn btn-info">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                    <div class="job-box bg-white overflow-hidden border rounded mt-4 position-relative overflow-hidden">
                                        <div class="p-4">
                                            <div class="row align-items-center">
                                                <div class="col-md-2">
                                                    <div class="mo-mb-2">
                                                        <img src="images/featured-job/img-1.png" alt="" class="img-fluid mx-auto d-block">
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                    <h5 class="f-18"><a href="lowongan-detail.php" class="text-dark"><?php echo $pekerjaan;?></a></h5>
                                                        <p class="text-muted mb-0"><?php echo $nama_perusahaan;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-apps text-primary mr-2"></i><?php echo $sektor_perusahaan;?></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <div>
                                                        <p class="text-muted mb-0"><i class="mdi mdi-map-marker text-primary mr-2"></i><?php echo $alamat_lowongan;?></p>
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
                                                        <p class="text-muted mb-0 mo-mb-2">Tutup :<span class="text-dark"> <?php echo $lowongan_tutup;?> </span></p>
                                                    </div>
                                                </div>
                                                <div class="col-md-3">
                                                    <a href="lowongan-detail.php" class="btn btn-info">Selengkapnya</a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
            <!-- end row -->

            <!-- end row -->
            <div class="row">
                <div class="col-lg-12 mt-4 pt-2">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination job-pagination mb-0 justify-content-center">
                            <li class="page-item disabled">
                                <a class="page-link" href="#" tabindex="-1" aria-disabled="true">
                                    <i class="mdi mdi-chevron-double-left f-15"></i>
                                </a>
                            </li>
                            <li class="page-item active"><a class="page-link" href="#">1</a></li>
                            <li class="page-item"><a class="page-link" href="#">2</a></li>
                            <li class="page-item"><a class="page-link" href="#">3</a></li>
                            <li class="page-item"><a class="page-link" href="#">4</a></li>
                            <li class="page-item">
                                <a class="page-link" href="#">
                                    <i class="mdi mdi-chevron-double-right f-15"></i>
                                </a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
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