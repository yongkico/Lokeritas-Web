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
                        <img src="https://s2.bukalapak.com/img/7620068213/w-1000/CETAK_FOTO_dan_PAS_FOTO_.png" height="150" alt="" class="d-block mx-auto shadow rounded-pill mb-4">
                        <h5 class="text-white mb-2">Samsul Sinaga</h5>
                        <span class="badge badge-secondary" style="font-size: 15px;padding:10px 15px 10px 15px"> samsul@gmail.com &nbsp;|&nbsp; 081212120098 </span>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->


    <!-- CREATE RESUME START -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-dark">Informasi Pribadi :</h5>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <img src="https://s2.bukalapak.com/img/7620068213/w-1000/CETAK_FOTO_dan_PAS_FOTO_.png" class="img-fluid avatar avatar-medium d-block mx-auto rounded-pill" alt="">
                        <form>
                            <div class="row mt-4">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">First Name<span class="text-danger">*</span> :</label>
                                        <input id="first-name" type="text" name="name" class="form-control resume" placeholder="First Name :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Middle Name<span class="text-danger">*</span> :</label>
                                        <input id="middle-name" type="text" class="form-control resume" placeholder="Middle Name :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Surname<span class="text-danger">*</span> :</label>
                                        <input id="surname-name" type="text" class="form-control resume" placeholder="Surname :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Date Of Birth<span class="text-danger">*</span> :</label>
                                        <input id="date-of-birth" type="text" class="form-control resume" placeholder="13-02-1999">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Sex<span class="text-danger">*</span> :</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="sex">Sex</option>
                                                <option value="1">Male</option>
                                                <option value="2">Female</option>
                                                <option value="3">Other</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Marital Status</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="Status">Status</option>
                                                <option value="1">Unmarried</option>
                                                <option value="2">Married</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row mt-5">
                <div class="col-12">
                    <h5 class="text-dark">Contact Information :</h5>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form>
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">City</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="City">City</option>
                                                <option value="1">Abilene</option>
                                                <option value="2">Babbitt</option>
                                                <option value="3">Cape Coral</option>
                                                <option value="4">Dallas</option>
                                                <option value="5">Eloy</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">State</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="State">State</option>
                                                <option value="1">Alabama</option>
                                                <option value="3">Hawaii</option>
                                                <option value="4">Maine</option>
                                                <option value="5">Oregon</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Country</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="Country">Country</option>
                                                <option value="1">Alabama</option>
                                                <option value="2">Delaware</option>
                                                <option value="3">Iowa</option>
                                                <option value="4">Missouri</option>
                                                <option value="5">New York</option>
                                                <option value="6">Utah</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Phone</label>
                                        <input id="phone" type="number" class="form-control resume" placeholder="Phone No. :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">E-mail</label>
                                        <input id="e-mail" type="email" name="email" class="form-control resume" placeholder="Email ID :">
                                    </div>
                                </div>

                                <div class="col-md-4">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Website</label>
                                        <input id="website" type="url" name="url" class="form-control resume" placeholder="www.example.com">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Address :</label>
                                        <textarea id="address" rows="4" class="form-control resume" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12">
                    <h5 class="text-dark mt-5">Education Details :</h5>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Graduation</label>
                                        <input id="graduation" type="text" class="form-control resume" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">University/College</label>
                                        <input id="university/college" type="text" class="form-control resume" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Degree/Certification</label>
                                        <input id="degree/certification" type="text" class="form-control resume" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label class="text-muted">Level</label>
                                                <div class="form-button">
                                                    <select class="nice-select rounded">
                                                        <option data-display="Select">Select</option>
                                                        <option value="1">Level-1</option>
                                                        <option value="2">Level-2</option>
                                                        <option value="3">Level-3</option>
                                                        <option value="4">Level-4</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label class="text-muted">Course Title</label>
                                                <input id="course-title" type="text" class="form-control resume" placeholder="">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Additional Information :</label>
                                        <textarea id="addition-information" rows="4" class="form-control resume" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12 mt-5">
                    <h5 class="text-dark">Work Experience :</h5>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Company Name</label>
                                        <input id="company-name" type="text" class="form-control resume" placeholder="">
                                    </div>
                                </div>

                                <div class="col-md-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Job Position</label>
                                        <input id="job-position" type="text" class="form-control resume" placeholder="">
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Location</label>
                                        <div class="form-button">
                                            <select class="nice-select rounded">
                                                <option data-display="Search">Search</option>
                                                <option value="1">New York</option>
                                                <option value="2">Los Angeles</option>
                                                <option value="3">Chicago</option>
                                                <option value="4">Houston</option>
                                                <option value="5">Indiana</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label class="text-muted">Date From</label>
                                                <input id="date-from" type="text" class="form-control resume" placeholder="01-Jan-2018">
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-group app-label">
                                                <label class="text-muted">Date To</label>
                                                <input id="date-to" type="text" class="form-control resume" placeholder="31-March-2019">
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label>Additional Information :</label>
                                        <textarea id="addition-information-1" rows="4" class="form-control resume" placeholder=""></textarea>
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>


            <div class="row">
                <div class="col-12 mt-5">
                    <h5 class="text-dark">Skills :</h5>
                </div>

                <div class="col-12 mt-3">
                    <div class="custom-form p-4 border rounded">
                        <form>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Skills</label>
                                        <input id="skills" type="text" class="form-control resume" placeholder="HTML, CSS, PHP, javascript, ...">
                                    </div>
                                </div>

                                <div class="col-lg-12">
                                    <div class="form-group app-label">
                                        <label class="text-muted">Skill proficiency</label>
                                        <input id="skill_proficiency" type="text" class="form-control resume" placeholder="75%">
                                    </div>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>

                <div class="col-12 mt-4">
                    <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Submit Resume">
                </div>
            </div>
        </div>
    </section>
    <!-- CREATE RESUME END -->

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

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>
</body>

</html>