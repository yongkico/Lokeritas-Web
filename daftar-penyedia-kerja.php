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
    <section class="bg-warning">
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
                                                <label>Nama Perusahaan <span class="text-danger">*</span></label>
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
                                            <div class="form-group position-relative">
                                                <label>Sektor Perusahaan <span class="text-danger">*</span></label>
                                                <div class="form-button">
                                                    <select class="rounded" style="width:100%;padding-left:10px; height: 40px ! important">
                                                        <option selected value="" disabled>Sektor Perusahaan</option>
                                                        <option value="Advertising, Printing & Media">Advertising, Printing & Media</option>
                                                        <option value="Asuransi">Asuransi</option>
                                                        <option value="Badan Usaha Milik Negara (BUMN)">Badan Usaha Milik Negara (BUMN)</option>
                                                        <option value="Bank">Bank</option>
                                                        <option value="Design & Productions">Design & Productions</option>
                                                        <option value="Event Organizer">Event Organizer</option>
                                                        <option value="Farmasi">Farmasi</option>
                                                        <option value="Hotel & Pariwisata">Hotel & Pariwisata</option>
                                                        <option value="Jasa Komputer & Perangkatnya">Jasa Komputer & Perangkatnya</option>
                                                        <option value="Kabel">Kabel</option>
                                                        <option value="Kayu & Pengolahannya">Kayu & Pengolahannya</option>
                                                        <option value="Keramik , Porselen dan Kaca">Keramik , Porselen dan Kaca</option>
                                                        <option value="Kesehatan dan Kecantikan">Kesehatan dan Kecantikan</option>
                                                        <option value="Kimia">Kimia</option>
                                                        <option value="Konstruksi Bangunan">Konstruksi Bangunan</option>
                                                        <option value="Kosmetik & Barang Keperluan Rumah Tangga">Kosmetik & Barang Keperluan Rumah Tangga</option>
                                                        <option value="Lembaga Pelatihan atau Kursus">Lembaga Pelatihan atau Kursus</option>
                                                        <option value="Lembaga Pembiayaan">Lembaga Pembiayaan</option>
                                                        <option value="Lembaga Pendidikan">Lembaga Pendidikan</option>
                                                        <option value="Logam dan Sejenisnya">Logam dan Sejenisnya</option>
                                                        <option value="Makanan & Minuman">Makanan & Minuman</option>
                                                        <option value="Non Profit">Non Profit</option>
                                                        <option value="Otomotif & Komponennya">Otomotif & Komponennya</option>
                                                        <option value="Pakaian & Alas Kaki">Pakaian & Alas Kaki</option>
                                                        <option value="Pakan Ternak">Pakan Ternak</option>
                                                        <option value="Pelayanan Pelanggan">Pelayanan Pelanggan</option>
                                                        <option value="Peralatan Rumah Tangga">Peralatan Rumah Tangga</option>
                                                        <option value="Perdagangan Besar Barang Produksi">Perdagangan Besar Barang Produksi</option>
                                                        <option value="Perdagangan Eceran">Perdagangan Eceran</option>
                                                        <option value="Perikanan">Perikanan</option>
                                                        <option value="Perkebunan">Perkebunan</option>
                                                        <option value="Pertambangan">Pertambangan</option>
                                                        <option value="Perusahaan Efek">Perusahaan Efek</option>
                                                        <option value="Peternakan">Peternakan</option>
                                                        <option value="Plastik & Kemasan">Plastik & Kemasan</option>
                                                        <option value="Pulp & Kertas">Pulp & Kertas</option>
                                                        <option value="Real Estate & Properti">Real Estate & Properti</option>
                                                        <option value="Restoran">Restoran</option>
                                                        <option value="Retail">Retail</option>
                                                        <option value="Rokok">Rokok</option>
                                                        <option value="SDM (Sumber Daya Manusia)">SDM (Sumber Daya Manusia)</option>
                                                        <option value="Semen">Semen</option>
                                                        <option value="Software House">Software House</option>
                                                        <option value="Sosial">Sosial</option>
                                                        <option value="Teknologi Informasi">Teknologi Informasi</option>
                                                        <option value="Tekstil & Garmen">Tekstil & Garmen</option>
                                                        <option value="Telekomunikasi">Telekomunikasi</option>
                                                        <option value="Transportasi">Transportasi</option>
                                                    </select>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="col-md-12">
                                            <div class="form-group position-relative">
                                                <label>Alamat <span class="text-danger">*</span></label>
                                                <textarea name="alamat" class="form-control" id="" cols="30" rows="10" placeholder="Masukan alamat"></textarea>
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