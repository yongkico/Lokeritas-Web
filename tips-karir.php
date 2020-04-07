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

    <!-- Navigation Bar-->
    <header id="topnav" class="defaultscroll scroll-active">
        <!-- Tagline STart -->
        <!-- <div class="tagline">
            <div class="container">
                <div class="float-left">
                    <div class="phone">
                        <i class="mdi mdi-phone-classic"></i> +1 800 123 45 67
                    </div>
                    <div class="email">
                        <a href="#">
                            <i class="mdi mdi-email"></i> Support@mail.com
                        </a>
                    </div>
                </div>
                <div class="float-right">
                    <ul class="topbar-list list-unstyled d-flex" style="margin: 11px 0px;">
                        <li class="list-inline-item"><a href="javascript:void(0);"><i class="mdi mdi-account mr-2"></i>Benny Simpson</a></li>
                        <li class="list-inline-item">
                            <select id="select-lang" class="demo-default">
                                <option value="">Language</option>
                                <option value="4">English</option>
                                <option value="1">Spanish</option>
                                <option value="3">French</option>
                                <option value="5">Hindi</option>
                            </select>
                        </li>
                    </ul>
                </div>
                <div class="clearfix"></div>
            </div>
        </div> -->
        <!-- Tagline End -->

        <!-- Menu Start -->
        <div class="container">
            <!-- Logo container-->
            <div>
                <a href="index.html" class="logo">
                    <img src="images/logo-light.png" alt="" class="logo-light" height="18" />
                    <img src="images/logo-dark.png" alt="" class="logo-dark" height="18" />
                </a>
            </div>                 
            <div class="buy-button">
                    <?php if(!isset($_SESSION["login"])) : ?>
                        <a href="login.php" class="btn btn-primary">Masuk</a>
                        <a href="register.php" class="btn btn-primary">Daftar</a>
                    <?php endif; ?> 

                    <?php if(isset($_SESSION["login"])) : ?>
                        <?php 
                            $id = $_SESSION["id"];
                            $result = mysqli_query($conn, "SELECT * FROM user WHERE id = '$id'");
                            $row = mysqli_fetch_assoc($result);    
                        ?>
                        <div class="dropdown">
                                <a class="dropdown-toggle" data-toggle="dropdown" style="color: white; font-size:15px"><?= $row["nama"] ?></a>
                                <ul class="dropdown-menu" style="color:black; font-size:15px; min-width: 180px;">
                                    
                                    <li style="line-height:30px;padding-left:20px;padding-bottom:5px"><a href="profile.php" style="color:black; font-size:13px;"><i class="mdi mdi-account mr-2" style="color: black; font-size:16px"></i>Profile</a></li>
                                    <li style="line-height:30px;padding-left:20px;padding-bottom:5px"><a href="#" style="color:black; font-size:13px;"><i class="mdi mdi-send mr-2" style="color: black; font-size:16px"></i>Lamaran dikirim</a></li>
                                    <li style="line-height:30px;padding-left:20px;"><a href="logout.php" style="color:black; font-size:13px;"><i class="mdi mdi-logout mr-2" style="color: black; font-size:16px"></i>Logout</a></li>  
                                </ul>
                            </div>

                        <!-- <a href="profile.php" style="color: white; font-size:15px"><i class="mdi mdi-account mr-2" style="color: white; font-size:16px"></i><?= $row["nama"] ?></a>
                         <span style="margin-left:4px;margin-right:4px; color: white; font-size:15px">|</span>
                        <a href="logout.php" style="color: white; font-size:15px">Logout</a> -->
                    <?php endif; ?>                                                       
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
                    <li class="has-submenu">
                        <a href="job-list.php">CARI LOWONGAN</a>
                    </li>
    
                    <li>
                        <a href="#">DAFTAR PERUSAHAAN</a>
                    </li>
                    <li>
                        <a href="tips-karir.php">TIPS KARIR</a>
                    </li>
                </ul><!--end navigation menu-->
            </div><!--end navigation-->
        </div><!--end container-->
        <!--end end-->
    </header><!--end header-->
    <!-- Navbar End -->
    
    <!-- Start home -->
    <section class="bg-half page-next-level"> 
        <div class="bg-overlay"></div>
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="text-center text-white">
                        <h4 class="text-uppercase title mb-4">TIPS KARIR</h4>
                        <p>Seputar tips untuk karir yang lebih baik</p>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- blog start -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->
                
                <div class="col-lg-4 col-md-6 mb-4 pb-2">
                    <div class="blog position-relative overflow-hidden shadow rounded">
                        <div class="position-relative overflow-hidden">
                            <img src="https://via.placeholder.com/800X533//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded-top" alt="">
                            <div class="overlay rounded-top bg-dark"></div>
                            <div class="likes">
                                <ul class="list-unstyled mb-0">
                                    <li class="list-inline-item mr-2"><a href="javascript:void(0)" class="text-white like"><i class="mdi mdi-heart-outline mr-1"></i>33</a></li>
                                    <li class="list-inline-item"><a href="javascript:void(0)" class="text-white comments"><i class="mdi mdi-comment-outline mr-1"></i>08</a></li>
                                </ul>
                            </div>
                        </div>
                        <div class="content p-4">
                            <h4><a href="javascript:void(0)" class="title text-dark">Bekal yang Harus Dibawa Sebelum ke Job Fair</a></h4>
                            <p class="text-muted">Banyak sekali informasi mengenai lowongan pekerjaan dapat kita peroleh darimana saja, bisa dalam bentuk media masa baik cetak…</p>
                            <a href="tips-karir-details.php" class="text-dark readmore">Baca selengkapnya <i class="mdi mdi-chevron-right"></i></a>
                        </div>
                        <div class="author">
                            <p class=" mb-0"><i class="mdi mdi-account text-light"></i> <a href="javascript:void(0)" class="text-light user">Dirio Walls</a></p>
                            <p class="text-light mb-0 date"><i class="mdi mdi-calendar-check"></i> 25 Sep, 2019</p>
                        </div>
                    </div>
                </div><!--end col-->

                <div class="col-lg-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination job-pagination justify-content-center mb-0">
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
    </section>
    <!-- blog end -->
    <!-- footer start -->
    <footer class="footer">
        <div class="container">
            <div class="row">
                <div class="col-lg-3 col-12 mb-0 mb-md-4 pb-0 pb-md-2">
                    <a href="javascript:void(0)"><img src="images/logo-light.png" height="20" alt=""></a>
                    <p class="mt-4">At vero eos et accusamus et iusto odio dignissim os ducimus qui blanditiis praesentium</p>
                    <ul class="social-icon social list-inline mb-0">
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-facebook"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-twitter"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-instagram"></i></a></li>
                        <li class="list-inline-item"><a href="#" class="rounded"><i class="mdi mdi-google"></i></a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Company</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> About Us</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Media & Press</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Career</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Blog</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Pricing</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Marketing</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> CEOs </a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Agencies</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Our Apps</a></li>
                    </ul>
                </div>
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Resources</p>
                    <ul class="list-unstyled footer-list">
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Support</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Privacy Policy</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Terms</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Accounting </a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> Billing</a></li>
                        <li><a href="#" class="text-foot"><i class="mdi mdi-chevron-right"></i> F.A.Q.</a></li>
                    </ul>
                </div>
            
                <div class="col-lg-3 col-md-4 col-12 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <p class="text-white mb-4 footer-list-title">Business Hours</p>
                    <ul class="list-unstyled text-foot mt-4 mb-0">
                        <li>Monday - Friday : 9:00 to 17:00</li>
                        <li class="mt-2">Saturday : 10:00 to 15:00</li>
                        <li class="mt-2">Sunday : Day Off (Holiday)</li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>
    <!-- footer end -->
    <footer class="footer footer-bar">
        <div class="container text-center">
            <div class="row justify-content-center">
                <div class="col-12">
                    <div class="">
                        <p class="mb-0">© 2019 -2020 Jobya. Design with <i class="mdi mdi-heart text-danger"></i> by Themesdesign.</p>
                    </div>
                </div>
            </div>
        </div><!--end container-->
    </footer><!--end footer-->
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

</body>
</html>