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
    <script src="js/sweetalert2.all.min.js"></script>

    <!--Material Icon -->
    <link rel="stylesheet" type="text/css" href="css/materialdesignicons.min.css" />

    <link rel="stylesheet" type="text/css" href="css/selectize.css" />

    <link rel="stylesheet" type="text/css" href="css/nice-select.css" />

    <!-- Custom  Css -->
    <link rel="stylesheet" type="text/css" href="css/style.css" />

</head>

<body>

    <?php 

    if(isset($_POST['send'])){
        $nama_depan = $_POST['nama_depan'];
        $nama_belakang = $_POST['nama_belakang'];
        $email = $_POST['email'];


        $form_data = array(
            "nama_depan" => $nama_depan,
            "nama_belakang" => $nama_belakang,
            "email" => $email
        );

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/forgot.php');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        $pesan = json_decode($result, true);

        if($pesan['message'] == 'Berhasil'){
            echo '<script>
                    swal("Berhasil", "Silahkan cek email anda untuk mendapatkan password baru", "success");
                </script>';
            header('Refresh: 5; URL=login.php');
        }else if($pesan['message'] == 'Gagal'){
            echo '<script>
                    swal("Gagal", "Email atau akun belum terdaftar", "warning");
                </script>';
        }
    }
    

    
    ?>
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
                            <div class="login_page bg-white shadow rounded p-4">
                                <form class="login-form" method="POST">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <p class="text-dark">Silahkan isi form dibawah ini untuk mendapatkan password baru</p>
                                            <div class="form-group position-relative">
                                                <label class="text-muted">Nama Depan <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Nama depan terdaftar..." name="nama_depan" required="">
                                            </div>
                                            <div class="form-group position-relative">
                                                <label class="text-muted">Nama Belakang <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Nama belakang terdaftar..." name="nama_belakang" required="">
                                            </div>
                                            <div class="form-group position-relative">
                                                <label class="text-muted">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email terdaftar..." name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button type="submit" name="send" class="btn btn-primary w-100">Kirim</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
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