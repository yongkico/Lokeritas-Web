<?php
session_start();
require("functions.php");

// if(isset($_COOKIE['id']) && isset($_COOKIE['key'])){
    
//     $id = $_COOKIE['id'];
//     $key = $_COOKIE['key'];

//     $result = mysqli_query($conn, "SELECT email FROM user WHERE id=$id");
//     $row = mysqli_fetch_assoc($result);

//     if($key == hash('sha256', $row["email"])){
//         $_SESSION['login'] = true;
//     }

// }

// if(isset($_SESSION["login"])){
//     header("Location: index.php");
//     exit;
// }

if (isset($_POST["masuk"])) {

    $email = strtolower($_POST["email"]);
    $password = mysqli_real_escape_string($conn,$_POST["password"]); 
    //cek akun
    $result = mysqli_query($conn, "SELECT * FROM user WHERE email = '$email'");
    
    if (mysqli_num_rows($result) == 1) {

        //cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {
            
            // set session
            $_SESSION["login"] = true;
            $_SESSION["id"] = $row["id"];

            header("Location: index.php");
            exit;
        }

        
    }

    $error = true;

}

?>


<!DOCTYPE html>
<html lang="en">

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

    <div class="back-to-home rounded d-none d-sm-block">
        <a href="index.html" class="text-white rounded d-inline-block text-center"><i class="mdi mdi-home"></i></a>
    </div>

    <!-- Hero Start -->
    <section class="vh-100" style="background: url('images/register.jpg') center center;">

        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-4 col-md-6">
                            <div class="login-page bg-white shadow rounded p-4">
                                <div class="text-center">
                                    <h4 class="mb-4">Masuk</h4>
                                </div>
                                <div class="text-center">
                                    <?php if (isset($error)) : ?>
                                        <p style="color: red; font-style:italic">username/password salah</p>
                                    <?php endif; ?>
                                </div>
                                <form class="login-form" action="" method="POST">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" required="" autocomplete="off">
                                                
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <div class="form-group position-relative">
                                                <label>Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                            </div>
                                        </div>

                                        <div class="col-lg-12">
                                            <p class="float-right forgot-pass"><a href="recovery_passward.html" class="text-dark font-weight-bold">Lupa password ?</a></p>
                                            <div class="form-group">
                                                <div class="custom-control m-0 custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck1" name="remember">
                                                    <label class="custom-control-label" for="customCheck1">Ingat saya</label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12 mb-0">
                                            <button class="btn btn-primary w-100" name="masuk">Masuk</button>
                                        </div>
                                        <div class="col-lg-12 mt-4 text-center">
                                            <h6>Or Login With</h6>
                                            <ul class="list-unstyled social-icon mb-0 mt-3">
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-facebook" title="Facebook"></i></a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-google-plus" title="Google"></i></a></li>
                                                <li class="list-inline-item"><a href="javascript:void(0)" class="rounded"><i class="mdi mdi-github-circle" title="Github"></i></a></li>
                                            </ul>
                                            <!--end icon-->
                                        </div>
                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark mr-2">Tidak mempunyai akun ?</small> <a href="register.php" class="text-dark font-weight-bold">Daftar</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div>
                            <!---->
                        </div>
                        <!--end col-->
                    </div>
                    <!--end row-->
                </div>
                <!--end container-->
            </div>
        </div>
    </section>
    <!--end section-->
    <!-- Hero End -->

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