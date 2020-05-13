<?php

$emailnya = $_GET['email'];

$curl_get = curl_init();
curl_setopt($curl_get, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/getbyEmailUser.php?email=' . $emailnya);
curl_setopt($curl_get, CURLOPT_RETURNTRANSFER, 1);
$result = curl_exec($curl_get);
curl_close($curl_get);

$result_get = json_decode($result, true);
$data = $result_get[0];


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
$keterampilan = $data["keterampilan"];

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
    "dok1" => '',
    "dok2" => $dok2,
    "param" => 'berkas'
);

$curl = curl_init();
curl_setopt($curl, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/profile.php');
curl_setopt($curl, CURLOPT_POST, 1);
curl_setopt($curl, CURLOPT_POSTFIELDS, $form_data);
curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
$result = curl_exec($curl);
curl_close($curl);



$curl_get2 = curl_init();
curl_setopt($curl_get2, CURLOPT_URL, 'http://lokeritas.xyz/api-v1/getbyEmailUser.php?email=' . $emailnya);
curl_setopt($curl_get2, CURLOPT_RETURNTRANSFER, 1);
$result2 = curl_exec($curl_get2);
curl_close($curl_get2);

$result_get2 = json_decode($result2, true);

?>

<div id="area_berkas">
    <?php if($result_get2[0]['dok2'] !== '') : ?>
        <?php
            $tmp = explode(',', $result_get2[0]['dok2'])
        ?>
        <table class="table rounded" style="border: 1px solid #e1e0e0;width:100%">
            <tbody>
                <tr>
                    <th>Keterangan</th>
                    <th>Berkas</th>
                    <th>#</th>
                </tr>
                <tr>
                    <td><?= $tmp[1]; ?></td>
                    <td><?= $tmp[0]; ?></a></td>
                    <td><button class="btn btn-danger-outline" id="dok2" data-toggle="tooltip" title="Hapus"><i class="mdi mdi-delete"></i></button></td>
                </tr>
            </tbody>
        </table>
    <?php else: ?>
        <i class="text-muted">Belum ada berkas yang di unggah !</i>
    <?php endif; ?>
</div>