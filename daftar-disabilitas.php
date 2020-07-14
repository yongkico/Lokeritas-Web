<?php
require("functions.php");

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

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/limonte-sweetalert2/7.33.1/sweetalert2.min.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">

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



    if (isset($_POST['daftar'])) {
        $namaDepan = $_POST["nama_depan"];
        $namaBelakang = $_POST["nama_belakang"];
        $email = strtolower($_POST["email"]);
        $password = $_POST["password"];
        $password2 = $_POST["password2"];
        $jk = $_POST["jk"];
        $tgl_lahir = $_POST["tgl_lahir"];
        $tmp_ketunaan = $_POST["ketunaan"];
        $ketunaan = "";

        foreach ($tmp_ketunaan as $list) {
            $ketunaan .= $list . ',';
        }

        if ($password !== $password2) {
            echo '
                <script>
                    swal("Perhatian", "Password tidak sesuai!", "warning")
                </script>
            ';
            header("Refresh:5");
            exit;
        }


        // //enkripsi password
        // $password = password_hash
        // $password = sha1($password);


        $form_data = array(
            "nama_depan" => $namaDepan,
            "nama_belakang" => $namaBelakang,
            "email" => $email,
            "password" => $password,
            "jenis_kelamin" => $jk,
            "tgl_lahir" => $tgl_lahir,
            "ketunaan" => substr_replace($ketunaan, "", -1)
        );

        $data = json_encode($form_data);

        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/register_user.php');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        $pesan = json_decode($result, true);


        if ($pesan['message'] == 'Berhasil') {
            echo '<script>
                swal("Pendaftaran berhasil", "Silahkan lihat email anda untuk melakukan konfirmasi email!", "success")
            </script>';
            header('Refresh: 5; URL=login.php');
        } else if ($pesan['message'] == 'unavailable') {
            echo '<script>
                swal("Perhatian", "Email sudah terdaftar!", "warning")
            </script>';
            header("Refresh:4");
            exit;
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
    <section class="bg-info">
        <div class="home-center">
            <div class="home-desc-center">
                <div class="container"><br>
                    <div class="row justify-content-center">
                        <div class="col-md-6">
                            <div class="login_page bg-white shadow rounded p-4">
                                <div class="text-center">
                                    <h4 class="mb">Daftar</h4>
                                </div>
                                <form class="login-form" id="form-daftar" action="" method="POST" onsubmit="if(document.getElementById('setuju').checked) { return true; } else { swal('Perhatian!', 'Pastikan anda setuju dengan syarat dan ketentuan Lokeritas !', 'warning'); return false; }">
                                    <div class="row">
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label class="text-secondary">Nama Depan <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Nama Depan" name="nama_depan" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label class="text-secondary">Nama Belakang <span class="text-danger">*</span></label>
                                                <input type="text" class="form-control" placeholder="Nama Belakang" name="nama_belakang" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label class="text-secondary">Email <span class="text-danger">*</span></label>
                                                <input type="email" class="form-control" placeholder="Email" name="email" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label class="text-secondary">Password <span class="text-danger">*</span></label>
                                                <input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus terdiri dari 8 karakter dan mengandung huruf besar, huruf kecil dan angka" class="form-control" placeholder="Password" name="password" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label class="text-secondary">Konfirmasi Password <span class="text-danger">*</span></label>
                                                <input type="password" pattern="(?=^.{8,}$)((?=.*\d)|(?=.*\W+))(?![.\n])(?=.*[A-Z])(?=.*[a-z]).*$" title="Password harus terdiri dari 8 karakter dan mengandung huruf besar, huruf kecil dan angka" class="form-control" placeholder="Konfirmasi Password" name="password2" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative" style="margin:0px 0px 0px 0px !important;">
                                                <label style="margin-bottom:10px ! important" class="text-secondary">Jenis Disabilitas/Ketunaan <span class="text-danger">*</span></label>

                                                <div style="padding:1px 0px 0px 3px !important;margin:0px 0px 10px 0px !important;">
                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck1" name="ketunaan[]" value="Disabilitas Daksa">
                                                                <label class="custom-control-label" for="customCheck1">Disabilitas Daksa</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck2" name="ketunaan[]" value="Disabilitas Netra">
                                                                <label class="custom-control-label" for="customCheck2">Disabilitas Netra</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:0px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck6" name="ketunaan[]" value="Disabilitas Mental">
                                                                <label class="custom-control-label" for="customCheck6">Disabilitas Mental</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline" style="margin-right: 10px ! important">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:4px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck3" name="ketunaan[]" value="Disabilitas Rungu">
                                                                <label class="custom-control-label" for="customCheck3">Disabilitas Rungu</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline" style="margin:0px 0px 10px 0px">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:4px 1px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck4" name="ketunaan[]" value="Disabilitas Wicara">
                                                                <label class="custom-control-label" for="customCheck4">Disabilitas Wicara</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                    <div class="form-check form-check-inline">
                                                        <div class="form-group" style="margin:0px 0px 0px 0px">
                                                            <div class="custom-control custom-checkbox" style="margin:4px 0px 0px 0px">
                                                                <input type="checkbox" class="custom-control-input" id="customCheck5" name="ketunaan[]" value="Disabilitas Grahita">
                                                                <label class="custom-control-label" for="customCheck5">Disabilitas Grahita</label>
                                                            </div>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative" style="margin-bottom: 0">
                                                <label style="margin-bottom:0px ! important" class="text-secondary">Jenis Kelamin <span class="text-danger">*</span></label>
                                                <div class="form-button" style="width: 50%">
                                                    <select class="nice-select rounded" name="jk" required>
                                                        <option value="L">Laki-Laki</option>
                                                        <option value="P">Perempuan</option>
                                                    </select>
                                                </div>
                                                <!-- <div class="p-4" style="padding: 0.1rem!important">
                                                    <div class="custom-control custom-radio custom-control-inline" style="margin:1px 30px 0px 30px">
                                                        <div class="form-group" style="margin-bottom: 5px!">
                                                            <input type="radio" id="customRadio1" name="jk" value="L" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio1">Laki-Laki</label>
                                                        </div>
                                                    </div>
                                                    <div class="custom-control custom-radio custom-control-inline" style="margin:1px 20px 0px 10px">
                                                        <div class="form-group">
                                                            <input type="radio" id="customRadio2" name="jk" value="P" class="custom-control-input">
                                                            <label class="custom-control-label" for="customRadio2">Perempuan</label>
                                                        </div>
                                                    </div>
                                                </div> -->
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label class="text-secondary">Tanggal Lahir <span class="text-danger">*</span></label>
                                                <input type="date" onfocus="(this.type='date')" class="form-control" value="Tanggal Lahir" name="tgl_lahir" required="">
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <div class="form-group">
                                                <div class="custom-control m-0 custom-checkbox">
                                                    <input type="checkbox" class="custom-control-input" name="setuju" id="setuju">
                                                    <label class="custom-control-label" for="setuju">Saya Setuju dengan <a href="#" class="text-primary">Syarat dan Ketentuan</a></label>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-md-12">
                                            <button class="btn btn-primary w-100" id="daftar" name="daftar">Daftar</button>
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

    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function loginEx() {
            swal('Perhatian!', 'Berkas yang diunggah maksimal 2 !', 'warning');
        }
    </script>

    <!-- selectize js -->
    <script src="js/selectize.min.js"></script>

    <script src="js/jquery.nice-select.min.js"></script>

    <script src="js/app.js"></script>
    <script src="js/jquery-3.5.0.min.js"></script>
    <script src="js/script.js"></script>

</body>

</html>