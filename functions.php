<?php 

//koneksi ke database
$conn = mysqli_connect("localhost","root","","lokeritas_web"); 

function query($query){
    global $conn;
    $result = mysqli_query($conn, $query);
    $rows = [];
    while($row = mysqli_fetch_assoc($result)){
        $rows[] = $row;
    }
    return $rows;
}

function daftar($data){
    global $conn;

    $namaDepan = $data["nama_depan"];
    $namaBelakang = $data["nama_belakang"];
    $nama = $namaDepan . ' ' . $namaBelakang;

    $email = strtolower($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $password2 = mysqli_real_escape_string($conn, $data["password2"]);
    $jk = $data["jk"];
    $tgl_lahir = $data["tgl_lahir"];
    $tmp_ketunaan = $data["ketunaan"];
    $ketunaan ="";

    foreach ($tmp_ketunaan as $list){
        $ketunaan .= $list . '<br>';
    }

    

    $result = mysqli_query($conn,"SELECT email FROM user
    WHERE email = '$email' ");

    if(mysqli_fetch_assoc($result)){
        echo "
            <script>
                alert('Email telah terdaftar telah terdaftar !');
            </script>
        ";
        return false;
    }

    if($password !== $password2){
        echo "
            <script>
                alert('Password tidak sesuai !');
            </script>
        ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = ("INSERT INTO user
                    VALUES
                ('','$nama','$email','$password','-','$jk','$tgl_lahir','-','-','-','-','-','-','-','-','-','-','$ketunaan','-','-','-')
             ");

    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);


}

function edit_rincian_disabilitas($data){
    global $conn;

    $id = $data["id"];
    $alat_bantu = $data["alat_bantu"];
    $penjelasan_disabilitas = $data["penjelasan_disabilitas"];
    $tmp_ketunaan = $data["ketunaan"];
    $ketunaan ="";

    foreach ($tmp_ketunaan as $list){
        $ketunaan .= $list . '<br>';
    }

    $query = "UPDATE user SET
                jenis_disabilitas = '$ketunaan',
                alat_bantu = '$alat_bantu',
                penjelasan_disabilitas = '$penjelasan_disabilitas'
                WHERE id = '$id'
            ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function edit_informasi_pribadi($data){
    global $conn;

    $id = $data["id"];
    $nama = $data["nama"];
    $no_hp = $data["no_hp"];
    $jk = $data["jk"];
    $tgl_lahir = $data["tgl_lahir"];
    $status = $data["status"];
    $mencari_pekerjaan = $data["mencari_pekerjaan"];
    $ringkasan_pribadi = $data["ringkasan_pribadi"];
    $alamat = $data["alamat"];
    $kab_kota = $data["kab_kota"];
    $provinsi = $data["provinsi"];
    $password = $data["password"];
    $password2 = $data["password2"];


    $alamat = $alamat . ', ' . $kab_kota . ', ' . $provinsi;
    if($password !== $password2){
        echo "
            <script>
                alert('Password tidak sesuai !');
            </script>
        ";
        return false;
    }

    //enkripsi password
    $password = password_hash($password, PASSWORD_DEFAULT);

    $query = "UPDATE user SET
                nama = '$nama',
                no_hp = '$no_hp',
                jk = '$jk',
                tgl_lahir = '$tgl_lahir',
                status = '$status',
                mencari_pekerjaan = '$mencari_pekerjaan',
                ringkasan_pribadi = '$ringkasan_pribadi',
                alamat = '$alamat',
                kab_kota = '$kab_kota',
                provinsi = '$provinsi',
                password = '$password'
                WHERE id = '$id'
            ";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}


function edit_pendidikan_terakhir($data){
    global $conn;

    $id = $data["id"];
    $pendidikan = $data["pendidikan"];
    $nama_sekolah = $data["nama_sekolah"];
    $jurusan = $data["jurusan"];
    $tahun_mulai = $data["tahun_mulai"];
    $tahun_akhir = $data["tahun_akhir"];
    $pendidikan_terakhir = '';

    if($pendidikan === "SD" || $pendidikan === "SMP" || $pendidikan === "SMA" ){
        $jurusan = '-';
        $pendidikan_terakhir = $tahun_mulai . '-' . $tahun_akhir . '<br>' . $pendidikan . '-' . $nama_sekolah;
    }

    $pendidikan_terakhir = $tahun_mulai . '-' . $tahun_akhir . '<br>' . $pendidikan . '-' . $jurusan . '-' . $nama_sekolah;
    $query = "UPDATE user SET pendidikan_terakhir = '$pendidikan_terakhir' WHERE id = '$id'";
    
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}