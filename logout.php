<?php 
session_start();

session_unset();
$_SESSION["login"]=[];
session_destroy();

setcookie('id','',time()-3600);
setcookie('key','',time()-3600);

header("Location: login.php");


?>