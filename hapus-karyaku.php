<?php 

$id = $_GET['id'];

$form_data = array(
    "id_karyaku" => $id,
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
} else{
    echo '<script>
            alert("Terjadi Kesalahan !");
            </script>';
}

?>