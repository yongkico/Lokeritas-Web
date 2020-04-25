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


if(isset($_POST["btn_rincian_disabilitas"])){
    if(edit_rincian_disabilitas($_POST) > 0){
        
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


if(isset($_POST["btn_pendidikan_terakhir"])){
    if(edit_pendidikan_terakhir($_POST) > 0){
        
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


