<?php
require("functions.php");

if (isset($_POST["daftar"])) {
    if (daftar($_POST) > 0) {
        echo "
        <script>
            alert('User baru berhasil didaftar');
        </script>
        ";
        header("Location:login.php");
    } else {
        echo "
        <script>
            alert('User baru gagal didaftar');
        </script>
        ";
    }
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Lokeritas - Lowongan Kerja Penyandang Disabilitas</title>
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

    <!-- Hero Start -->
    <section class="vh-200" style="background: url('https://www.expatica.com/app/uploads/2018/11/Networking-1-1920x1080.jpg') center no-repeat;">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container"><br>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="login_page bg-white shadow rounded p-4">
                                <div class="text-center">
                                    <h4 class="mb">Daftar</h4>
                                </div>
                                <form class="login-form" action="" method="POST">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Nama Lengkap <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Nama Lengkap" name="nama_depan" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" placeholder="Password" name="password" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Konfirmasi Password <span class="text-danger">*</span></label>
                                                <input type="password" class="form-control" placeholder="Konfirmasi Password" name="password2" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative" style="margin-bottom: 0">
                                                <label>Jenis Kelamin <span class="text-danger">*</span></label>
                                                <div class="p-4" style="padding: 0.1rem!important">
                                                    <div class="custom-control custom-radio custom-control-inline" style="margin:1px 30px 0px 30px">
                                                        <div class="form-group" style="margin-bottom: 5px!">
                                                            <input type="radio" id="customRadio1" name="jk" value="Pria" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio1">Pria</label>
                                                        </div>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline" style="margin:1px 20px 0px 10px">
                                                        <div class="form-group">
                                                            <input type="radio" id="customRadio2" name="jk" value="Wanita" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio2">Wanita</label>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Tanggal Lahir <span class="text-danger">*</span></label>
                                                <input type="date" class="form-control" placeholder="dd/mm/yyyy" name="tgl_lahir" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Jenis Ketunaan <span class="text-danger">*</span></label><br>

                                                <div class="p-4" style="padding:1px 0px 0px 10px !important">
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 20px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="ketunaan[]" value="Tuna Daksa">
                                                                <label class="custom-control-label" for="customCheck1">Tuna Daksa</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 20px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="ketunaan[]" value="Tuna Netra">
                                                                <label class="custom-control-label" for="customCheck2">Tuna Netra</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 20px">
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
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-control m-0 custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" id="customCheck7">
                                                    <label class="custom-control-label" for="customCheck7">Saya Setuju dengan <a href="#" class="text-primary">Syarat dan Ketentuan</a></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary w-100" name="daftar">Daftar</button> 
                                        </div>
                                        <div class="mx-auto">
                                            <p class="mb-0 mt-3"><small class="text-dark mr-2">Sudah mempunyai akun ?</small> <a href="login.php" class="text-dark font-weight-bold">Masuk</a></p>
                                        </div>
                                    </div>
                                </form>
                            </div><br>
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