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
        $ketunaan .= $list . ',';
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