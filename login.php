<?php
session_start();

if (isset($_POST["masuk"])) {

    $email = $_POST["email"];
    $password = $_POST["password"];

    $curl_get = curl_init();
    curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/getbyEmailUser.php?email=' . $email);
    curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
    $result_get = curl_exec($curl_get);
    curl_close($curl_get);

    $result_get = json_decode($result_get, true);

    if (empty($result_get)) {
        echo    ' <div style="position: absolute;width:100%">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert-wrap justify-content-center" >
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p class="text-dark justify-content-center" style="margin:0px 0px 0px 0px"> Kamu belum terdaftar ! </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
    } else {
        $pw = ($result_get[0]['password']);

        if (password_verify($password, $pw)) {
            $form_data = array(
                "email" => $email,
                "password" => $pw
            );

            $curl = curl_init();
            curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/login_user.php');
            curl_setopt($curl, CURLOPT_POST, 1);
            curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            $result = curl_exec($curl);
            curl_close($curl);

            $pesan = json_decode($result, true);
        
            $_SESSION['login'] = true;
            // $_SESSION['data'] = array(
            //     "email" => $result['email'],
            //     "password" => $result['password'],
            //     "nama_depan" => $result['nama_depan'],
            //     "nama_belakang" => $result['nama_belakang'],
            // );
            $_SESSION['email'] = $email;
            $_SESSION['nama_depan'] = $pesan['data']['nama_depan'];
            header('location: index.php');
            exit;
        } else {
            echo    ' <div style="position: absolute;width:100%">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="alert-wrap justify-content-center" >
                                <div class="alert alert-danger">
                                    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
                                    <p class="text-dark justify-content-center" style="margin:0px 0px 0px 0px"> Password kamu salah ! </p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                ';
        }
    }
}

?>




<!DOCTYPE html>
<html lang="en">

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

    <link rel="stylesheet" type="text/css" href="css/selectize.css" />

    <link rel="stylesheet" type="text/css" href="css/nice-select.css" />

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <link rel="stylesheet" type="text/css" href="css/alert.css" />

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
    <!-- Hero Start -->
    <section class="vh-100 bg-dark">

        <div class="home-center">
            <div class="home-desc-center">
                <div class="container">
                    <div class="row justify-content-center" style="margin-bottom: 20px ! important">
                        <img src="images/logo-lokeritas2.png" alt="" class="logo-light" height="35" />
                    </div>
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
                                            <p class="float-right forgot-pass"><a href="lupa-password.php" class="text-dark font-weight-bold">Lupa password ?</a></p>
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
                                        <div class="col-12 text-center">
                                            <p class="mb-0 mt-3"><small class="text-dark mr-2">Tidak mempunyai akun ?</small> <a href="#" class="text-dark font-weight-bold" data-toggle="modal" data-target="#pilihanDaftar">Daftar</a>
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