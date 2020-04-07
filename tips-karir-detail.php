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
                <a href="index.php" class="logo">
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
    
   

    <!-- BLOG LIST START -->
    <section class="section">
        <div class="container">
            <div class="row">
                <div class="col-lg-4 col-md-6 col-12 order-2 order-md-1 mt-4 mt-sm-0 pt-2 pt-sm-0">
                    <div class="sidebar mt-sm-30 p-4 rounded shadow">
                        <!-- SEARCH -->
                        <div class="widget mb-4 pb-2">
                            <div id="search2" class="widget-search mb-0">
                                <form role="search" method="get" id="searchform" class="searchform">
                                    <div>
                                        <input type="text" class="border rounded" name="s" id="s" placeholder="Judul...">
                                        <input type="submit" id="searchsubmit" value="Search">
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- SEARCH -->
                        <!-- RECENT POST -->
                        <div class="widget mb-4 pb-2">
                            <h4 class="widget-title">Tips Terbaru</h4>
                            <div class="mt-4">
                                <div class="clearfix post-recent">
                                    <div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="https://via.placeholder.com/800X800//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded"></a></div>
                                    <div class="post-recent-content float-left"><a href="jvascript:void(0)">Consultant Business</a><span class="text-muted mt-2">15th June, 2019</span></div>
                                </div>
                                <div class="clearfix post-recent">
                                    <div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="https://via.placeholder.com/800X800//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded"></a></div>
                                    <div class="post-recent-content float-left"><a href="jvascript:void(0)">Look On The Glorious Balance</a> <span class="text-muted mt-2">15th June, 2019</span></div>
                                </div>
                                <div class="clearfix post-recent">
                                    <div class="post-recent-thumb float-left"> <a href="jvascript:void(0)"> <img alt="img" src="https://via.placeholder.com/800X800//88929f/5a6270C/O https://placeholder.com/" class="img-fluid rounded"></a></div>
                                    <div class="post-recent-content float-left"><a href="jvascript:void(0)">Research Financial.</a> <span class="text-muted mt-2">15th June, 2019</span></div>
                                </div>
                            </div>
                        </div>
                        <!-- RECENT POST -->
                    </div>
                </div><!--end col-->

                <div class="col-lg-8 col-md-6 col-12 order-1 order-md-2">
                    <div class="shadow rounded p-4">
                        <div class="blog-details-img">
                            <img src="https://via.placeholder.com/800X450//88929f/5a6270C/O https://placeholder.com/" alt="" class="img-fluid mx-auto rounded d-block">
                        </div>
                        <div class="blog-details meta mt-3">
                            <ul class="list-inline mb-1">
                                <li class="list-inline-item mr-4">
                                    <p class="text-muted mb-0"><i class="mdi mdi-calendar-range mr-1"></i>01-January-2018</p>
                                </li>

                                <li class="list-inline-item mr-4">
                                    <p class="text-muted mb-0"><i class="mdi mdi-message-reply-text mr-1"></i>4 Comments</p>
                                </li>

                                <li class="list-inline-item">
                                    <p class="text-muted mb-0"><i class="mdi mdi-layers mr-1"></i>IT Jobs</p>
                                </li>
                            </ul>
                        </div>

                        <div class="blog-details-desc p-2">
                            <h5 class="mb-3"><a href="#" class="text-dark">A small river named Duden flows by their place and supplies regelialia.</a></h5>

                            <p class="text-muted mb-3 f-13">The Big Oxmox advised her not to do so because there were thousands of bad Commas as wild Question Marks and devious Semikoli, but the Little Blind Text didn’t listen. She packed her seven versalia, put her initial into the belt and made herself on the way But nothing the copy said could convince her and s didn’t take long until a few insidious Copy Writers ambushed made her drunk with Longe and Parole and dragged a into their agency where they abused her for their projects again and again. And if hasn’t been rewritten.</p>

                            <p class="text-muted f-13">The copy warned the Little Blind Text that where it came from would have rewritten thousand times and everything that was left from its origin would be the word and the Little Blind Text should turn around and return its own, safe country But nothing the copy said could convince.</p>

                            <blockquote class="blockquote p-4 position-relative">
                                <i class="fas fa-quote-left text-primary"></i>
                                <p class="mb-2 font-italic f-14 text-dark">It is a paradisematic country in which roasted parts of sentences fly into your mouth Even the all-powerful Pointing has control about the blind texts it is an almost unorthographic life One day however a small line of blind text by the name as of Lorem Ipsum decided to leave.</p>
                                <h6 class="mb-0"><a href="#" class="text-dark">By : Maude J. McDowell</a></h6>
                            </blockquote>
                            
                            <ul class="list-inline mb-0">
                                <li class="list-inline-item mt-1">
                                    <a href="" class="text-dark">
                                        <p class="mb-0 f-17"><i class="mdi mdi-heart-outline mr-1 text-danger"></i>Like</p>
                                    </a>
                                </li>
                            </ul>
                        </div>
                    </div>

                    <div class="rounded border mt-4 p-4">
                        <h5 class="text-dark"><i class="mdi mdi-comment-multiple mr-2"></i>4 Comments</h5>
                        <div class="media mt-4 pt-2">
                            <div class="blog-comment-img">
                                <img class="d-block mx-auto rounded-pill" height="60" alt="" src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/">
                            </div>
                            <div class="media-body ml-3">
                                <h6 class="mb-0"><a href="#" class="text-dark">Kathleen Manuel</a></h6>
                                <p class="text-muted mb-0">08-Sep-2018 at 02:15 pm</p>
                                <p class="text-muted f-14 mb-2">The Big Oxmox advised her not to do so, because there were thousands of bad a Commas wild Question Marks and devious Semikoli.</p>
                                <p class="mb-0"><a href="" class="text-muted"><i class="mdi mdi-reply-all mr-2"></i>Reply</a></p>
                                

                                <div class="media mt-4">
                                    <div class="blog-comment-img">
                                        <img class="d-block mx-auto rounded-pill" height="60" alt="" src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/">
                                    </div>
                                    <div class="media-body ml-3">
                                        <h6 class="mb-0"><a href="#" class="text-dark">John Newton</a></h6>
                                        <p class="text-muted mb-0">03, Oct, 2018 At 06.05pm</p>
                                        <p class="text-muted f-14 mb-2">Nam libero tempore, cum soluta nobis est at eligendi optio cumque nihil impedit quo minus id quod maxime placeat.</p>
                                        <p class="mb-0"><a href="" class="text-muted"><i class="mdi mdi-reply-all mr-2"></i>Reply</a></p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        
                        <div class="media mt-4">
                            <div class="blog-comment-img">
                                <img class="d-block mx-auto rounded-pill" height="60" alt="" src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/">
                            </div>
                            <div class="media-body ml-3">
                                <h6 class="mb-0"><a href="#" class="text-dark">Ruby Poe</a></h6>
                                <p class="text-muted mb-0">04, Oct, 2018 At 09:35am</p>
                                <p class="text-muted mb-2">Similique sunt in culpa qui officia deserunt mollitia animi id est laborum et dolorum fuga et harum quidem rerum.</p>
                                <p class="mb-0"><a href="" class="text-muted"><i class="mdi mdi-reply-all mr-2"></i>Reply</a></p>
                            </div>
                        </div>

                        
                        <div class="media mt-4">
                            <div class="blog-comment-img">
                                <img class="d-block mx-auto rounded-pill" height="60" alt="" src="https://via.placeholder.com/400X400//88929f/5a6270C/O https://placeholder.com/">
                            </div>
                            <div class="media-body ml-3">
                                <h6 class="mb-0"><a href="#" class="text-dark">Robert Booker</a></h6>
                                <p class="text-muted mb-0">04, Oct, 2018 at 04:16 pm</p>
                                <p class="text-muted mb-2">When she reached the first hills of the Italic Mountains, she had a last view on the skyline her hometown the headline.</p>
                                <p class="mb-0"><a href="" class="text-muted"><i class="mdi mdi-reply-all mr-2"></i>Reply</a></p>
                            </div>
                        </div>
                    </div>

                    <div class="rounded border mt-4 p-4">
                        <h5 class="text-dark"><i class="mdi mdi-pencil mr-2"></i>Leave Your Comments</h5>
                        <div class="custom-form mt-4 pt-2">
                            <form name="contact-form">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-account text-muted f-17"></i>
                                            <input name="name" id="name" type="text" class="form-control blog-details" placeholder="Name">
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-email text-muted f-17"></i>
                                            <input name="email" id="email" type="email" class="form-control blog-details" placeholder="Email">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                    <div class="form-group blog-details-form">
                                        <i class="mdi mdi-web text-muted f-17"></i>
                                        <input name="url" id="url" type="url" class="form-control blog-details" placeholder="url">
                                    </div>
                                </div>
                                </div>
                                
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group blog-details-form">
                                            <i class="mdi mdi-comment-processing text-muted f-17"></i>
                                            <textarea name="comments" id="comments" rows="4" class="form-control blog-details" placeholder="Comment"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <input type="submit" id="submit" name="send" class="submitBnt btn btn-primary" value="Post comment">
                                    </div>
                                </div>
                            </form>
                            <!-- /form -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <!-- BLOG LIST END -->
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