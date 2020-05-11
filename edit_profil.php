<?php
session_start();
require("functions.php");

if(isset($_POST["btn_informasi_pribadi"])){

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

    

    if($mencari_pekerjaan == 'Ya'){
        $mencari_pekerjaan = 1;
    }else{
        $mencari_pekerjaan = 0;
    }

    if(empty($password)){
        $pw = $password_lama;
        
    }else{
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


if(isset($_POST["btn_rincian_disabilitas"])){

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

    var_dump($ketunaan);
    $form_data = array(
        "id_user" => $id_user,
        "nama_depan" => $nama_depan,
        "nama_belakang" => $nama_belakang,
        "email" => $email,
        "password" => $password,
        "tgl_lahir" => $tgl_lahir,
        "jenis_kelamin" => $jk,
        "status" => $status,
        "ketunaan" => substr_replace($ketunaan ,"",-1),
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


if(isset($_POST["btn_pendidikan_terakhir"])){
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


    $pendidikan = $_POST["pendidikan"];
    $nama_sekolah = $_POST["nama_sekolah"];
    $jurusan = $_POST["jurusan"];
    $tahun_mulai = $_POST["tahun_mulai"];
    $tahun_akhir = $_POST["tahun_akhir"];
    $pendidikan_terakhir = '';

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



if(isset($_POST["btn_pengalaman_kerja"])){
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
    $jabatan1 = $_POST['jabatan1'];
    $tahun_mulai1 = $_POST['tahun_mulai1'];
    $tahun_akhir1 = $_POST['tahun_akhir1'];

    $nama_perusahaan2 = $_POST['nama_perusahaan2'];
    $jabatan2 = $_POST['jabatan2'];
    $tahun_mulai2 = $_POST['tahun_mulai2'];
    $tahun_akhir2 = $_POST['tahun_akhir2'];

    $nama_perusahaan3 = $_POST['nama_perusahaan3'];
    $jabatan3 = $_POST['jabatan3'];
    $tahun_mulai3 = $_POST['tahun_mulai3'];
    $tahun_akhir3 = $_POST['tahun_akhir3'];

    if(!empty($nama_perusahaan1) && empty($nama_perusahaan2) && empty($nama_perusahaan3)){
        $pengalaman_kerja .= $nama_perusahaan1 . '-' . $jabatan1 . '-' . $tahun_mulai1 . '-' . $tahun_akhir1;
    }
    elseif(empty($nama_perusahaan1) && !empty($nama_perusahaan2) && empty($nama_perusahaan3)){
        $pengalaman_kerja .= $nama_perusahaan2 . '-' . $jabatan2 . '-' . $tahun_mulai2 . '-' . $tahun_akhir2;
    }
    elseif(empty($nama_perusahaan1) && empty($nama_perusahaan2) && !empty($nama_perusahaan3)){
        $pengalaman_kerja .= $nama_perusahaan3 . '-' . $jabatan3 . '-' . $tahun_mulai3 . '-' . $tahun_akhir3;
    }
    elseif(!empty($nama_perusahaan1) && !empty($nama_perusahaan2) && empty($nama_perusahaan3)){
        $pengalaman_kerja .= $nama_perusahaan1 . '-' . $jabatan1 . '-' . $tahun_mulai1 . '-' . $tahun_akhir1 . ',' . $nama_perusahaan2 . '-' . $jabatan2 . '-' . $tahun_mulai2 . '-' . $tahun_akhir2 ;
    }
    elseif(!empty($nama_perusahaan1) && empty($nama_perusahaan2) && !empty($nama_perusahaan3)){
        $pengalaman_kerja .= $nama_perusahaan1 . '-' . $jabatan1 . '-' . $tahun_mulai1 . '-' . $tahun_akhir1 . ',' . $nama_perusahaan3 . '-' . $jabatan3 . '-' . $tahun_mulai3 . '-' . $tahun_akhir3 ;
    }
    elseif(empty($nama_perusahaan1) && !empty($nama_perusahaan2) && !empty($nama_perusahaan3)){
        $pengalaman_kerja .= $nama_perusahaan2 . '-' . $jabatan2 . '-' . $tahun_mulai2 . '-' . $tahun_akhir2 . ',' . $nama_perusahaan3 . '-' . $jabatan3 . '-' . $tahun_mulai3 . '-' . $tahun_akhir3 ;
    }
    elseif(!empty($nama_perusahaan1) && !empty($nama_perusahaan2) && !empty($nama_perusahaan3)){
        $pengalaman_kerja .= $nama_perusahaan1 . '-' . $jabatan1 . '-' . $tahun_mulai1 . '-' . $tahun_akhir1 . ',' . $nama_perusahaan2 . '-' . $jabatan2 . '-' . $tahun_mulai2 . '-' . $tahun_akhir2 . ',' . $nama_perusahaan3 . '-' . $jabatan3 . '-' . $tahun_mulai3 . '-' . $tahun_akhir3 ;
    }else{
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

if(isset($_POST["simpan_keterampilan"])){
    header('location:profile.php');
}

if(isset($_POST['btn_karir'])){
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