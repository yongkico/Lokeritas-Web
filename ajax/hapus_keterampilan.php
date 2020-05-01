<?php
session_start();
require("../functions.php");

$id = $_GET['id'];
$isi_hapus = $_GET['isi_hapus'];

$query2 = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
$row = mysqli_fetch_assoc($query2);
$tmp = explode('<br>',$row['keterampilan']);
$is = count($tmp);
$hasil ='';

for($i = 0; $i<$is-1; $i++ ){
    if($tmp[$i] == $isi_hapus){
        unset($tmp[$i]);
    }
    $hasil .= $tmp[$i] . '<br>';
}


$query = mysqli_query($conn, "UPDATE user SET keterampilan = '$hasil' WHERE id_user = '$id'");
$hsl = mysqli_affected_rows($conn);


?>

<ul style="list-style-type: none" style="padding-left: 0px ! important" id="list_keterampilan">
    <?php for($i = 0; $i<$is-1; $i++ ) : ?>
        <li class="badge badge-secondary" style="padding:10px 15px 10px 15px;font-size:15px;margin:5px 5px 5px 5px" value="<?= $tmp[$i] ?>" id="hapus_keterampilan"><?= $tmp[$i] ?><i style="margin-left: 8px" class="mdi mdi-close text-white"></i></li>
    <?php endfor; ?>
</ul>