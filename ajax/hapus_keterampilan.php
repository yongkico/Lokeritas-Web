<?php
session_start();
require("../functions.php");

$email = $_GET['email'];
$keterampilan = $_GET['keterampilan'];


$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/getbyEmailUser.php?email=' . $email);
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl_get);
curl_close($curl_get);

$result_get = json_decode($result, true);
$data = $result_get[0];


// hoby : Catur,Bola,Renang
$dftKeterampilan = explode(',', $data['keterampilan']);

$tmp = '';

// dftKeterampilan : Catur,Bola,Renang
// keterampilan : Renang
foreach ($dftKeterampilan as $i) {
    //catur
    if ($i !== $keterampilan) {
        $tmp .= $i;
        $tmp .= ',';
    }
}
$tmp = substr($tmp, 0, -1);

$id_user = $data['id_user'];
$nama_depan = $data['nama_depan'];
$nama_belakang = $data['nama_belakang'];
$email = $data['email'];
$password = $data['password'];
$tgl_lahir = $data['tgl_lahir'];
$jk = $data['jenis_kelamin'];
$status = $data['status'];
$foto = $data['foto'];
$provinsi = $data['provinsi'];
$kota = $data['kota'];
$alamat = $data['alamat'];
$telepon = $data['telepon'];
$hash = $data['hash'];
$active = $data['active'];
$ringkasan_pribadi = $data['ringkasan_pribadi'];
$kariryangdimininati = $data['kariryangdimininati'];
$mencari_pekerjaan = $data['mencari_pekerjaan'];
$pengalaman_kerja = $data['pengalaman_kerja'];
$pendidikan_terakhir = $data['pendidikan_terakhir'];
$dok1 = $data['dok1'];
$dok2 = $data['dok2'];
$ketunaan = $data["ketunaan"];
$alat_bantu = $data["alat_bantu"];
$penjelasan = $data["detail_tambahan"];

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
    "keterampilan" => $tmp,
    "pengalaman_kerja" => $pengalaman_kerja,
    "dok1" => $dok1,
    "dok2" => $dok2,
    "param" => 'keterampilan'
);


$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);


$curl_get2 = curl_init();
curl_setopt($curl_get2, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/getbyEmailUser.php?email=' . $email);
curl_setopt($curl_get2, CURLOPT_RETURNTRANSFER, 1);
$result2 = curl_exec($curl_get2);
curl_close($curl_get2);
$result_get2 = json_decode($result2, true);
$data2 = $result_get2[0];

?>

<div class="col-12 mt-3" id="daftarKeterampilan">
    <?php if (empty($data2['keterampilan'])) : ?>
        <i>Keterampilan belum diisi !</i>
    <?php else : ?>
        <?php
        $b = explode(',', $data2['keterampilan']);
        ?>
        <?php foreach ($b as $t) : ?>
            <a class="badge badge-secondary text-white" onclick="remove(this)" id="<?= $t; ?>" style="font-size: 15px;padding:7px 15px 7px 15px"> <?= $t; ?> &nbsp; <i class="mdi mdi-close"></i></a>
        <?php endforeach; ?>
    <?php endif; ?>
</div>