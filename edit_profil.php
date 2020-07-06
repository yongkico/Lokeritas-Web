<?php
session_start();
require("functions.php");

if (isset($_POST["btn_informasi_pribadi"])) {

    $id_user = $_POST['id_user'];
    $password_lama = $_POST['password_lama'];
    $ketunaan = $_POST['ketunaan'];
    $foto = $_POST['foto'];
    $detail_tambahan = $_POST['detail_tambahan'];
    $alat_bantu = $_POST['alat_bantu'];
    $hash = $_POST['hash'];
    $active = $_POST['active'];
    $kariryangdimininati = $_POST['kariryangdimininati'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $keterampilan = $_POST['keterampilan'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $dok1 = $_POST['dok1'];
    $dok2 = $_POST['dok2'];

    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $telepon = $_POST['telepon'];
    $jk = $_POST['jk'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $status = $_POST['status'];
    $ringkasan_pribadi = $_POST['ringkasan_pribadi'];
    $mencari_pekerjaan = $_POST['mencari_pekerjaan'];
    $alamat = $_POST['alamat'];
    $kota = $_POST['kota'];
    $provinsi = $_POST['provinsi'];
    $pw = '';
    $password = mysqli_real_escape_string($conn, $_POST["password"]);
    $password2 = mysqli_real_escape_string($conn, $_POST["password2"]);


    //set mencari pekerjaan
    if ($mencari_pekerjaan == 'Ya') {
        $mencari_pekerjaan = 1;
    } else {
        $mencari_pekerjaan = 0;
    }

    

    //cek apakah ganti passwor
    if (empty($password)) {
        $pw = $password_lama;
    } else {
        if ($password !== $password2) {
            echo "
                    <script>
                        alert('Password tidak sesuai !');
                        window.location.href = 'profile.php';
                    </script>
                ";
            // header("location:profile.php");

        }
        //enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);
        $pw = $password;
    }



    $form_data = array(
        "id_user" => $id_user,
        "nama_depan" => $nama_depan,
        "nama_belakang" => $nama_belakang,
        "email" => $email,
        "password" => $pw,
        "tgl_lahir" => $tgl_lahir,
        "jenis_kelamin" => $jk,
        "status" => $status,
        "ketunaan" => $ketunaan,
        "foto" => $foto,
        "provinsi" => $provinsi,
        "kota" => $kota,
        "alamat" => $alamat,
        "detail_tambahan" => $detail_tambahan,
        "telepon" => $telepon,
        "alat_bantu" => $alat_bantu,
        "hash" => $hash,
        "active" => $active,
        "ringkasan_pribadi" => $ringkasan_pribadi,
        "kariryangdimininati" => $kariryangdimininati,
        "mencari_pekerjaan" => $mencari_pekerjaan,
        "pendidikan_terakhir" => $pendidikan_terakhir,
        "keterampilan" => $keterampilan,
        "pengalaman_kerja" => $pengalaman_kerja,
        "dok1" => $dok1,
        "dok2" => $dok2,
        "param" => 'informasi_pribadi'
    );


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    $pesan = json_decode($result, true);

    if ($pesan['message'] == 'Berhasil') {
        header('location:profile.php');
    } else if ($pesan['message'] == 'unavailable') {
        echo '<script>
                alert("Terjadi Kesalahan !");
            </script>';
    }
}


if (isset($_POST["btn_rincian_disabilitas"])) {

    $id_user = $_POST['id_user'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $foto = $_POST['foto'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $hash = $_POST['hash'];
    $active = $_POST['active'];
    $ringkasan_pribadi = $_POST['ringkasan_pribadi'];
    $kariryangdimininati = $_POST['kariryangdimininati'];
    $mencari_pekerjaan = $_POST['mencari_pekerjaan'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $keterampilan = $_POST['keterampilan'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $dok1 = $_POST['dok1'];
    $dok2 = $_POST['dok2'];
    $tmp_ketunaan = $_POST["ketunaan"];
    $alat_bantu = $_POST["alat_bantu"];
    $penjelasan = $_POST["penjelasan"];
    $ketunaan = '';


    foreach ($tmp_ketunaan as $list) {
        $ketunaan .= $list . ',';
    }

    
    $form_data = array(
        "id_user" => $id_user,
        "nama_depan" => $nama_depan,
        "nama_belakang" => $nama_belakang,
        "email" => $email,
        "password" => $password,
        "tgl_lahir" => $tgl_lahir,
        "jenis_kelamin" => $jk,
        "status" => $status,
        "ketunaan" => substr_replace($ketunaan, "", -1),
        "foto" => $foto,
        "provinsi" => $provinsi,
        "kota" => $kota,
        "alamat" => $alamat,
        "detail_tambahan" => $penjelasan,
        "telepon" => $telepon,
        "alat_bantu" => $alat_bantu,
        "hash" => $hash,
        "active" => $active,
        "ringkasan_pribadi" => $ringkasan_pribadi,
        "kariryangdimininati" => $kariryangdimininati,
        "mencari_pekerjaan" => $mencari_pekerjaan,
        "pendidikan_terakhir" => $pendidikan_terakhir,
        "keterampilan" => $keterampilan,
        "pengalaman_kerja" => $pengalaman_kerja,
        "dok1" => $dok1,
        "dok2" => $dok2,
        "param" => 'rincian_disabilitas'
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    $pesan = json_decode($result, true);

    if ($pesan['message'] == 'Berhasil') {
        header('location:profile.php');
    } else if ($pesan['message'] == 'unavailable') {
        echo '<script>
                alert("Terjadi Kesalahan !");
            </script>';
    }
}


if (isset($_POST["btn_pendidikan_terakhir"])) {

    $id_user = $_POST['id_user'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $foto = $_POST['foto'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $hash = $_POST['hash'];
    $active = $_POST['active'];
    $ringkasan_pribadi = $_POST['ringkasan_pribadi'];
    $kariryangdimininati = $_POST['kariryangdimininati'];
    $mencari_pekerjaan = $_POST['mencari_pekerjaan'];
    $keterampilan = $_POST['keterampilan'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $dok1 = $_POST['dok1'];
    $dok2 = $_POST['dok2'];
    $ketunaan = $_POST["ketunaan"];
    $alat_bantu = $_POST["alat_bantu"];
    $penjelasan = $_POST["detail_tambahan"];

    if($_POST['nama_sekolah'] == ''){
        echo '<script>
                alert("Harap melengkapi formulir !");
                document.location.href ="profile.php";
            </script>'; exit;
    }
    

    $pendidikan = $_POST["pendidikan"];
    $nama_sekolah = $_POST["nama_sekolah"];
    $jurusan = $_POST["jurusan"];
    $tahun_mulai = $_POST["tahun_mulai"];
    $tahun_akhir = $_POST["tahun_akhir"];
    $pendidikan_terakhir = '';


    $nama_sekolah = str_replace(",", "", $nama_sekolah);
    $jurusan = str_replace(",", "",$jurusan);


    if ($pendidikan === "SD" || $pendidikan === "SMP" || $pendidikan === "SMA") {
        $jurusan = '';
        $pendidikan_terakhir = $tahun_mulai . '-' . $tahun_akhir . ',' . $pendidikan . '-' . $nama_sekolah;
    } else {
        $pendidikan_terakhir = $tahun_mulai . '-' . $tahun_akhir . ',' . $pendidikan . '-' . $jurusan . '-' . $nama_sekolah;
    }

    $form_data = array(
        "id_user" => $id_user,
        "nama_depan" => $nama_depan,
        "nama_belakang" => $nama_belakang,
        "email" => $email,
        "password" => $password,
        "tgl_lahir" => $tgl_lahir,
        "jenis_kelamin" => $jk,
        "status" => $status,
        "ketunaan" => $ketunaan,
        "foto" => $foto,
        "provinsi" => $provinsi,
        "kota" => $kota,
        "alamat" => $alamat,
        "detail_tambahan" => $penjelasan,
        "telepon" => $telepon,
        "alat_bantu" => $alat_bantu,
        "hash" => $hash,
        "active" => $active,
        "ringkasan_pribadi" => $ringkasan_pribadi,
        "kariryangdimininati" => $kariryangdimininati,
        "mencari_pekerjaan" => $mencari_pekerjaan,
        "pendidikan_terakhir" => $pendidikan_terakhir,
        "keterampilan" => $keterampilan,
        "pengalaman_kerja" => $pengalaman_kerja,
        "dok1" => $dok1,
        "dok2" => $dok2,
        "param" => 'pendidikan_terakhir'
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    $pesan = json_decode($result, true);

    if ($pesan['message'] == 'Berhasil') {
        header('location:profile.php');
    } else if ($pesan['message'] == 'unavailable') {
        echo '<script>
                alert("Terjadi Kesalahan !");
            </script>';
    }
}



if (isset($_POST["btn_pengalaman_kerja"])) {
    $id_user = $_POST['id_user'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $foto = $_POST['foto'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $hash = $_POST['hash'];
    $active = $_POST['active'];
    $ringkasan_pribadi = $_POST['ringkasan_pribadi'];
    $kariryangdimininati = $_POST['kariryangdimininati'];
    $mencari_pekerjaan = $_POST['mencari_pekerjaan'];
    $keterampilan = $_POST['keterampilan'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $dok1 = $_POST['dok1'];
    $dok2 = $_POST['dok2'];
    $ketunaan = $_POST["ketunaan"];
    $alat_bantu = $_POST["alat_bantu"];
    $penjelasan = $_POST["detail_tambahan"];
    $pengalaman_kerja = '';


    $nama_perusahaan1 = $_POST['nama_perusahaan1'];
    $nama_perusahaan1 = str_replace(",", "", $nama_perusahaan1);
    $jabatan1 = $_POST['jabatan1'];
    $jabatan1 = str_replace(",", "",$jabatan1);
    $tahun_mulai1 = $_POST['tahun_mulai1'];
    $tahun_akhir1 = $_POST['tahun_akhir1'];

    $nama_perusahaan2 = $_POST['nama_perusahaan2'];
    $nama_perusahaan2 = str_replace(",", "", $nama_perusahaan2);
    $jabatan2 = $_POST['jabatan2'];
   $jabatan2 = str_replace(",", "",$jabatan2);
    $tahun_mulai2 = $_POST['tahun_mulai2'];
    $tahun_akhir2 = $_POST['tahun_akhir2'];

    $nama_perusahaan3 = $_POST['nama_perusahaan3'];
    $nama_perusahaan3 = str_replace(",", "", $nama_perusahaan3);
    $jabatan3 = $_POST['jabatan3'];
    $jabatan3 = str_replace(",", "", $jabatan3);
    $tahun_mulai3 = $_POST['tahun_mulai3'];
    $tahun_akhir3 = $_POST['tahun_akhir3'];

    if (!empty($nama_perusahaan1) && empty($nama_perusahaan2) && empty($nama_perusahaan3)) {
        $pengalaman_kerja .= $nama_perusahaan1 . '-' . $jabatan1 . '-' . $tahun_mulai1 . '-' . $tahun_akhir1;
    } elseif (empty($nama_perusahaan1) && !empty($nama_perusahaan2) && empty($nama_perusahaan3)) {
        $pengalaman_kerja .= $nama_perusahaan2 . '-' . $jabatan2 . '-' . $tahun_mulai2 . '-' . $tahun_akhir2;
    } elseif (empty($nama_perusahaan1) && empty($nama_perusahaan2) && !empty($nama_perusahaan3)) {
        $pengalaman_kerja .= $nama_perusahaan3 . '-' . $jabatan3 . '-' . $tahun_mulai3 . '-' . $tahun_akhir3;
    } elseif (!empty($nama_perusahaan1) && !empty($nama_perusahaan2) && empty($nama_perusahaan3)) {
        $pengalaman_kerja .= $nama_perusahaan1 . '-' . $jabatan1 . '-' . $tahun_mulai1 . '-' . $tahun_akhir1 . ',' . $nama_perusahaan2 . '-' . $jabatan2 . '-' . $tahun_mulai2 . '-' . $tahun_akhir2;
    } elseif (!empty($nama_perusahaan1) && empty($nama_perusahaan2) && !empty($nama_perusahaan3)) {
        $pengalaman_kerja .= $nama_perusahaan1 . '-' . $jabatan1 . '-' . $tahun_mulai1 . '-' . $tahun_akhir1 . ',' . $nama_perusahaan3 . '-' . $jabatan3 . '-' . $tahun_mulai3 . '-' . $tahun_akhir3;
    } elseif (empty($nama_perusahaan1) && !empty($nama_perusahaan2) && !empty($nama_perusahaan3)) {
        $pengalaman_kerja .= $nama_perusahaan2 . '-' . $jabatan2 . '-' . $tahun_mulai2 . '-' . $tahun_akhir2 . ',' . $nama_perusahaan3 . '-' . $jabatan3 . '-' . $tahun_mulai3 . '-' . $tahun_akhir3;
    } elseif (!empty($nama_perusahaan1) && !empty($nama_perusahaan2) && !empty($nama_perusahaan3)) {
        $pengalaman_kerja .= $nama_perusahaan1 . '-' . $jabatan1 . '-' . $tahun_mulai1 . '-' . $tahun_akhir1 . ',' . $nama_perusahaan2 . '-' . $jabatan2 . '-' . $tahun_mulai2 . '-' . $tahun_akhir2 . ',' . $nama_perusahaan3 . '-' . $jabatan3 . '-' . $tahun_mulai3 . '-' . $tahun_akhir3;
    } else {
        $pengalaman_kerja = '-';
    }



    $form_data = array(
        "id_user" => $id_user,
        "nama_depan" => $nama_depan,
        "nama_belakang" => $nama_belakang,
        "email" => $email,
        "password" => $password,
        "tgl_lahir" => $tgl_lahir,
        "jenis_kelamin" => $jk,
        "status" => $status,
        "ketunaan" => $ketunaan,
        "foto" => $foto,
        "provinsi" => $provinsi,
        "kota" => $kota,
        "alamat" => $alamat,
        "detail_tambahan" => $penjelasan,
        "telepon" => $telepon,
        "alat_bantu" => $alat_bantu,
        "hash" => $hash,
        "active" => $active,
        "ringkasan_pribadi" => $ringkasan_pribadi,
        "kariryangdimininati" => $kariryangdimininati,
        "mencari_pekerjaan" => $mencari_pekerjaan,
        "pendidikan_terakhir" => $pendidikan_terakhir,
        "keterampilan" => $keterampilan,
        "pengalaman_kerja" => $pengalaman_kerja,
        "dok1" => $dok1,
        "dok2" => $dok2,
        "param" => 'pengalaman_kerja'
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    $pesan = json_decode($result, true);

    if ($pesan['message'] == 'Berhasil') {
        header('location:profile.php');
    } else if ($pesan['message'] == 'unavailable') {
        echo '<script>
                alert("Terjadi Kesalahan !");
            </script>';
    }
}

if (isset($_POST["btn_keterampilan"])) {
    header('location:profile.php');
}

if (isset($_POST['btn_karir'])) {
    $id_user = $_POST['id_user'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $foto = $_POST['foto'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $hash = $_POST['hash'];
    $active = $_POST['active'];
    $ringkasan_pribadi = $_POST['ringkasan_pribadi'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $mencari_pekerjaan = $_POST['mencari_pekerjaan'];
    $keterampilan = $_POST['keterampilan'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $dok1 = $_POST['dok1'];
    $dok2 = $_POST['dok2'];
    $ketunaan = $_POST["ketunaan"];
    $alat_bantu = $_POST["alat_bantu"];
    $penjelasan = $_POST["detail_tambahan"];

    $karir = $_POST['karir'];


    $form_data = array(
        "id_user" => $id_user,
        "nama_depan" => $nama_depan,
        "nama_belakang" => $nama_belakang,
        "email" => $email,
        "password" => $password,
        "tgl_lahir" => $tgl_lahir,
        "jenis_kelamin" => $jk,
        "status" => $status,
        "ketunaan" => $ketunaan,
        "foto" => $foto,
        "provinsi" => $provinsi,
        "kota" => $kota,
        "alamat" => $alamat,
        "detail_tambahan" => $penjelasan,
        "telepon" => $telepon,
        "alat_bantu" => $alat_bantu,
        "hash" => $hash,
        "active" => $active,
        "ringkasan_pribadi" => $ringkasan_pribadi,
        "kariryangdimininati" => $karir,
        "mencari_pekerjaan" => $mencari_pekerjaan,
        "pendidikan_terakhir" => $pendidikan_terakhir,
        "keterampilan" => $keterampilan,
        "pengalaman_kerja" => $pengalaman_kerja,
        "dok1" => $dok1,
        "dok2" => $dok2,
        "param" => 'karir'
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    $pesan = json_decode($result, true);

    if ($pesan['message'] == 'Berhasil') {
        header('location:profile.php');
    } else if ($pesan['message'] == 'unavailable') {
        echo '<script>
                alert("Terjadi Kesalahan !");
            </script>';
    }
}


if (isset($_POST['btn_berkas'])) {

    $id_user = $_POST['id_user'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $foto = $_POST['foto'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $hash = $_POST['hash'];
    $active = $_POST['active'];
    $ringkasan_pribadi = $_POST['ringkasan_pribadi'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $mencari_pekerjaan = $_POST['mencari_pekerjaan'];
    $keterampilan = $_POST['keterampilan'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $kariryangdimininati = $_POST['kariryangdimininati'];
    $ketunaan = $_POST["ketunaan"];
    $alat_bantu = $_POST["alat_bantu"];
    $penjelasan = $_POST["detail_tambahan"];
    $dok1 = $_POST["dok1"];
    $dok2 = $_POST["dok2"];
    $dokumen2 = '';

    if ($dok2 !== '') {
        $dokumen2 = $dok2;
    }

    $keterangan = $_POST['keterangan'];

    $namaBerkas = $_FILES['berkas']['name'];
    $ukuranBerkas = $_FILES['berkas']['size'];
    $tipeBerkas = $_FILES['berkas']['type'];
    // $error = $_FILES['berkas']['error'];
    $tmpBerkas = $_FILES['berkas']['tmp_name'];

    //cek ekstensi
    $ekstensiValid = ['pdf', 'jpg', 'jpeg', 'png'];
    $ekstensiBerkas = explode('.', $namaBerkas);
    $ekstensiBerkas = strtolower(end($ekstensiBerkas));
    if (!in_array($ekstensiBerkas, $ekstensiValid)) {
        echo "<script>
                alert('Format berkas tidak valid. Format berkas yang dapat diunggah adalah .pdf, .png, .jpg atau .jpeg !');
                document.location.href ='profile.php';
            </script>";
        exit;
    }

    //cek size
    if ($ukuranBerkas > 2000000) {
        echo "<script>
                alert('Ukuran berkas terlalu besar. Ukuran maksimal adalah 2MB !');
                document.location.href ='profile.php';
            </script>";
        exit;
    }



    //lolos pengecekan
    //generate nama file dengan hash
    $namaBerkasBaru = uniqid();
    $namaBerkasBaru .= '.';
    $namaBerkasBaru .= $ekstensiBerkas;

    if ($dok1 !== '') {
        //mengisi dok2 
        $dokumen = $namaBerkasBaru . ',' . $keterangan . ',' . 'dok2';

        $form_data = array(
            "id_user" => $id_user,
            "nama_depan" => $nama_depan,
            "nama_belakang" => $nama_belakang,
            "email" => $email,
            "password" => $password,
            "tgl_lahir" => $tgl_lahir,
            "jenis_kelamin" => $jk,
            "status" => $status,
            "ketunaan" => $ketunaan,
            "foto" => $foto,
            "provinsi" => $provinsi,
            "kota" => $kota,
            "alamat" => $alamat,
            "detail_tambahan" => $penjelasan,
            "telepon" => $telepon,
            "alat_bantu" => $alat_bantu,
            "hash" => $hash,
            "active" => $active,
            "ringkasan_pribadi" => $ringkasan_pribadi,
            "kariryangdimininati" => $kariryangdimininati,
            "mencari_pekerjaan" => $mencari_pekerjaan,
            "pendidikan_terakhir" => $pendidikan_terakhir,
            "keterampilan" => $keterampilan,
            "pengalaman_kerja" => $pengalaman_kerja,
            "dok1" => $dok1,
            "dok2" => $dokumen,
            "param" => 'berkas'
        );



        $chFile = new CURLFile($tmpBerkas, $tipeBerkas, $namaBerkasBaru);
        $datas = array("file" => $chFile);
        $chs = curl_init();
        curl_setopt($chs, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/uploadBerkas.php');
        curl_setopt($chs, CURLOPT_POST, 1);
        curl_setopt($chs, CURLOPT_POSTFIELDS, $datas);
        $response = curl_exec($chs);
        curl_close($chs);


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        $pesan = json_decode($result, true);

        if ($pesan['message'] == 'Berhasil') {
            header('location:profile.php');
        } else if ($pesan['message'] == 'unavailable') {
            echo '<script>
                    alert("Terjadi Kesalahan !");
                </script>';
        }
    } else {
        //mengisi dok 1
        $dokumen = $namaBerkasBaru . ',' . $keterangan . ',' . 'dok1';

        $form_data = array(
            "id_user" => $id_user,
            "nama_depan" => $nama_depan,
            "nama_belakang" => $nama_belakang,
            "email" => $email,
            "password" => $password,
            "tgl_lahir" => $tgl_lahir,
            "jenis_kelamin" => $jk,
            "status" => $status,
            "ketunaan" => $ketunaan,
            "foto" => $foto,
            "provinsi" => $provinsi,
            "kota" => $kota,
            "alamat" => $alamat,
            "detail_tambahan" => $penjelasan,
            "telepon" => $telepon,
            "alat_bantu" => $alat_bantu,
            "hash" => $hash,
            "active" => $active,
            "ringkasan_pribadi" => $ringkasan_pribadi,
            "kariryangdimininati" => $kariryangdimininati,
            "mencari_pekerjaan" => $mencari_pekerjaan,
            "pendidikan_terakhir" => $pendidikan_terakhir,
            "keterampilan" => $keterampilan,
            "pengalaman_kerja" => $pengalaman_kerja,
            "dok1" => $dokumen,
            "dok2" => $dokumen2,
            "param" => 'berkas'
        );

        $chFile = new CURLFile($tmpBerkas, $tipeBerkas, $namaBerkasBaru);
        $datas = array("file" => $chFile);
        $chs = curl_init();
        curl_setopt($chs, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/uploadBerkas.php');
        curl_setopt($chs, CURLOPT_POST, 1);
        curl_setopt($chs, CURLOPT_POSTFIELDS, $datas);
        $response = curl_exec($chs);
        curl_close($chs);


        $curl = curl_init();
        curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        $result = curl_exec($curl);
        curl_close($curl);

        $pesan = json_decode($result, true);

        if ($pesan['message'] == 'Berhasil') {
            header('location:profile.php');
        } else if ($pesan['message'] == 'unavailable') {
            echo '<script>
                    alert("Terjadi Kesalahan !");
                </script>';
        }
    }
}

if (isset($_POST['btn_foto'])) {
    $id_user = $_POST['id_user'];
    $nama_depan = $_POST['nama_depan'];
    $nama_belakang = $_POST['nama_belakang'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $tgl_lahir = $_POST['tgl_lahir'];
    $jk = $_POST['jenis_kelamin'];
    $status = $_POST['status'];
    $provinsi = $_POST['provinsi'];
    $kota = $_POST['kota'];
    $alamat = $_POST['alamat'];
    $telepon = $_POST['telepon'];
    $hash = $_POST['hash'];
    $active = $_POST['active'];
    $ringkasan_pribadi = $_POST['ringkasan_pribadi'];
    $pengalaman_kerja = $_POST['pengalaman_kerja'];
    $mencari_pekerjaan = $_POST['mencari_pekerjaan'];
    $keterampilan = $_POST['keterampilan'];
    $pendidikan_terakhir = $_POST['pendidikan_terakhir'];
    $kariryangdimininati = $_POST['kariryangdimininati'];
    $ketunaan = $_POST["ketunaan"];
    $alat_bantu = $_POST["alat_bantu"];
    $penjelasan = $_POST["detail_tambahan"];
    $dok1 = $_POST["dok1"];
    $dok2 = $_POST["dok2"];

    $namaBerkas = $_FILES['berkas_foto']['name'];
    $tmpBerkas = $_FILES['berkas_foto']['tmp_name'];
    $error = $_FILES['berkas_foto']['error'];
    $size = $_FILES['berkas_foto']['size'];
    $type = $_FILES['berkas_foto']['type'];


    //cek ekstensi
    $ekstensiValid = ['jpg', 'jpeg', 'png'];
    $ekstensiBerkas = explode('.', $namaBerkas);
    $ekstensiBerkas = strtolower(end($ekstensiBerkas));
    if (!in_array($ekstensiBerkas, $ekstensiValid)) {
        echo "<script>
                alert('Format berkas tidak valid. Format berkas yang dapat diunggah adalah .png, .jpg atau .jpeg !');
                document.location.href ='profile.php';
            </script>";
        exit;
    }

    //cek size
    if ($size > 1000000) {
        echo "<script>
                alert('Ukuran berkas terlalu besar. Ukuran maksimal adalah 1MB !');
                document.location.href ='profile.php';
            </script>";
        exit;
    }



    //lolos pengecekan
    //generate nama file dengan hash
    $namaBerkasBaru = uniqid();
    $namaBerkasBaru .= '.';
    $namaBerkasBaru .= $ekstensiBerkas;

    $form_data = array(
        "id_user" => $id_user,
        "nama_depan" => $nama_depan,
        "nama_belakang" => $nama_belakang,
        "email" => $email,
        "password" => $password,
        "tgl_lahir" => $tgl_lahir,
        "jenis_kelamin" => $jk,
        "status" => $status,
        "ketunaan" => $ketunaan,
        "foto" => $namaBerkasBaru,
        "provinsi" => $provinsi,
        "kota" => $kota,
        "alamat" => $alamat,
        "detail_tambahan" => $penjelasan,
        "telepon" => $telepon,
        "alat_bantu" => $alat_bantu,
        "hash" => $hash,
        "active" => $active,
        "ringkasan_pribadi" => $ringkasan_pribadi,
        "kariryangdimininati" => $kariryangdimininati,
        "mencari_pekerjaan" => $mencari_pekerjaan,
        "pendidikan_terakhir" => $pendidikan_terakhir,
        "keterampilan" => $keterampilan,
        "pengalaman_kerja" => $pengalaman_kerja,
        "dok1" => $dok1,
        "dok2" => $dok2,
        "param" => 'foto'
    );

    $chFile = new CURLFile($tmpBerkas, $type, $namaBerkasBaru);
    $datas = array("file" => $chFile);
    $chs = curl_init();
    curl_setopt($chs, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/uploadFoto.php');
    curl_setopt($chs, CURLOPT_POST, 1);
    curl_setopt($chs, CURLOPT_POSTFIELDS, $datas);
    $response = curl_exec($chs);
    curl_close($chs);


    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    $pesan = json_decode($result, true);

    if ($pesan['message'] == 'Berhasil') {
        header('location:profile.php');
    } else if ($pesan['message'] == 'unavailable') {
        echo '<script>
                    alert("Terjadi Kesalahan !");
                </script>';
    }
}
