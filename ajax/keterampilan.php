<?php
session_start();
require("../functions.php");

$nama_keterampilan = $_GET['keterampilan'];
$id = $_GET['id'];

$tmp_query = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
$tmp_row = mysqli_fetch_assoc($tmp_query);
$tmp_keterampilan = $tmp_row['keterampilan'];

$keterampilan = $tmp_keterampilan . $nama_keterampilan . '<br>';

$query = mysqli_query($conn, "UPDATE user SET keterampilan = '$keterampilan' WHERE id_user = '$id'");
$hsl = mysqli_affected_rows($conn);

$query2 = mysqli_query($conn, "SELECT * FROM user WHERE id_user = '$id'");
$row = mysqli_fetch_assoc($query2);

$tmp = explode('<br>',$row['keterampilan']);

$is = count($tmp);
?>

<ul style="list-style-type: none" style="padding-left: 0px ! important" id="list_keterampilan">
    <?php for($i = 0; $i<$is-1; $i++ ) : ?>
        <?php 
            $id_isi ='';
            $potong =explode(' ', $tmp[$i]);
            foreach($potong as $iss){
                $id_isi .=$iss;
            }
        ?>
        <li class="badge badge-secondary" style="padding:10px 15px 10px 15px;font-size:15px;margin:5px 5px 5px 5px" value="<?= $tmp[$i] ?>" id="<?= $id_isi ?>"><?= $tmp[$i] ?><i style="margin-left: 8px" class="mdi mdi-close text-white"></i></li>
    <?php endfor; ?>
</ul>