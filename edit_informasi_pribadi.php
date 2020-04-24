<?php
session_start();
require("functions.php");

if(isset($_POST["btn_informasi_pribadi"])){
    if(edit_informasi_pribadi($_POST) > 0){
        
        echo "
            <script>  
                alert('Profil berhasil di edit');
                document.location.href = 'profile.php';
            </script>
        ";
    } else{
        echo "
            <script>
                alert('Profil gagal di edit');
                document.location.href = 'profile.php';
            </script>
        ";
    }
}


?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script>
        function loginEx() {
            swal("Perhatian!", "Anda harus masuk terlebih dahulu!", "warning");
        }
</script>
</body>
</html>


