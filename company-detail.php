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
        <div class="row">
                <div class="col-lg-12">
                    <div class="text-sm-center">
                        <img src="images/featured-job/img-3.png" alt="" class="img-fluid mx-md-auto d-block">
                        <h4 class="mt-3"><a href="#" class="text-white">CV. Pradipta Paramita</a></h4>
                        <ul class="list-inline mb-0">
                            <li class="list-inline-item mr-3">
                                <p class="text-white"><i class="mdi mdi-map-marker mr-2"></i>4102 Aviation Way Los Angeles, CA 90017</p>
                            </li>
                        </ul>

                        <ul class="list-inline mb-2">
                            <li class="list-inline-item mr-3 ">
                                <p class="text-white"><i class="mdi mdi-earth mr-2"></i>Themescodeltd.co.in</p>
                            </li>

                            <li class="list-inline-item mr-3">
                                <p class="text-white"><i class="mdi mdi-email mr-2"></i>Themescodeltd2018@gmail.com</p>
                            </li>

                            <li class="list-inline-item">
                                <p class="text-white"><i class="mdi mdi-cellphone-iphone mr-2"></i>123 456 7890</p>
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- end home -->

    <!-- EMPLOYERS DETAILS START -->
    <section class="section">
        <div class="container">          
            <div class="row">
                <div class="col-lg-12 mt-4 pt-2">
                    <h4>Deskripsi Perusahaan :</h4>
                    <div class="rounded border p-4 mt-3">
                        <p class="text-muted">At vero eos accusamus iusto odio dignissimos ducimus blanditiis praesentium voluptatum deleniti that is atque corrupti dolores et quas molestias excepturi sint occaecati cupiditate non at provident similique sunt in culpa qui officia deserunt mollitia animi id est laboru at dolorum fuga Nam libero tempore cum soluta nobis est eligendi optio cumque nihil impedit quo minus quod maxime placeat facere possimus omnis voluptas assumenda est omnis dolor repellendus at enim ipsam voluptatem quia voluptas aut odit aut fugit Cum sociis natoque penatibus magnis dis parturient montes nascetur ridiculus mus donec quam felis ultricies nec pellentesque eu pretium quis sem that phasellus viverra nulla ut metus varius laoreet.</p>
                        <p class="text-muted">Nobis est eligendi optio cumque nihil impedit quo minus quod maxime at placeat facere possimus omnis voluptas assumenda est omnis dolor repellendus at enim ipsam eligendi optio cumque nihil impedit quo minus quod maxime placeat voluptatem quia that voluptas aut odit aut fugit Cum sociis natoque penatibus magnis dis parturient montes, nascetur ridiculus mus. Donec quam felis, ultricies nec this pellentesque eu pretium quis sem hasellus viverra nulla ut metus varius laoreet uisque rutrum enean imperdie tiam ultricies nisi vel augue.</p>
                        <p class="text-muted mb-0">Optio cumque nihil impedit quo minus quod maxime at placeate facere possimuse omnis voluptas assumenda est omnis dolor repellendus at enim ipsam voluptatem quia voluptas aut odit aut fugit um sociis natoque penatibus magnis dis parturient montes nascetur at ridiculus mus onec quam felis ultricies nec nihil impedit quo minus quod maxime at placeat facere possimuse omnis voluptas assumenda est omnis dolor repellendus at enime pellentesque eu pretium quis sem Phasellus viverra nulla ut metus varius laoreet uisque rutrum enean imperdiet tiam ultricies nisi vel augue Donec elit libero sodales nec volutpat a suscipit non turpis ullam sagittis Suspendisse pulvinar at augue ac venenatis condimentum sem libero volutpat nibh nec pellentesque velit pede quis nunc estibulum ante ipsum primis in faucibus orci luctus et ultrices as cubilia Curae usce id purus varius tincidunt libero Phasellus dolor.</p>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-lg-12 mt-4 pt-2">
                    <h4>Hari Kerja :</h4>
                    <div class="rounded border p-4 mt-3">
                        <p class="text-muted">Aenean tellus metus bibendum sed posuere ac mattis non nunc estibulum fringilla pede sit amet augue n turpis Pellentesque posuere raesent turpis enean posuere tortor sed cursus feugiat nunc augue blandit nunc sollicitudin at dolor sagittis lacus estibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae Sed aliquam nisi quis porttitor congue elit erat euismod orci ac placerat dolor lectus quis orci repellendus at enime pellentesque eu pretium quis sem Phasellus viverra nulla hasellus consectetuer vestibulum elit.</p>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-lg-12 mt-4 pt-2">
                    <h4>Benefit :</h4>
                    <div class="rounded border p-4 mt-3">
                        <p class="text-muted">Aenean tellus metus bibendum sed posuere ac mattis non nunc estibulum fringilla pede sit amet augue n turpis Pellentesque posuere raesent turpis enean posuere tortor sed cursus feugiat nunc augue blandit nunc sollicitudin at dolor sagittis lacus estibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae Sed aliquam nisi quis porttitor congue elit erat euismod orci ac placerat dolor lectus quis orci repellendus at enime pellentesque eu pretium quis sem Phasellus viverra nulla hasellus consectetuer vestibulum elit.</p>
                    </div>
                </div>
            </div>

            
        </div>
    </section>
    <!-- EMPLOYERS DETAILS END -->

   

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
                    <p class="text-white mb-4 footer-list-title f-17">Business Hours</p>
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
    <hr>
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