<?php
session_start();
if (isset($_SESSION['login'])) {
    $id_user = $_SESSION['userdata']['user_id'];
} else {
    header('location:login.php');
}

$id_karyaku = $_POST['id_karyaku'];
$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, "http://lokeritas.xyz/api-v1/karyakuDetail.php?id_karyaku=$id_karyaku");
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$results = curl_exec($curl_get);
curl_close($curl_get);

$result = json_decode($results, true)[0];

if($result['id_user'] == $id_user){
    $form_data = array(
        "id_karyaku" => $id_karyaku,
        "param" => 'remove'
    );

    $curl = curl_init();
    curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/editKaryaku.php');
    curl_setopt($curl, CURLOPT_POST, 1);
    curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    $result = curl_exec($curl);
    curl_close($curl);

    $pesan = json_decode($result, true);

    if ($pesan['message'] == 'Berhasil') {
        echo '<script>
                alert("Karyaku Berhasil di Hapus !");
                window.location.href = "history-karyaku.php";
            </script>';
    } else {
        echo '<script>
            alert("Terjadi Kesalahan !");
            window.location.href = "history-karyaku.php";
            </script>';
    }
}else{
    header('location:history-karyaku.php');
}



?>