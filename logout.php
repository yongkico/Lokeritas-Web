<?php 
session_start();

session_unset();
$_SESSION["login"]=[];
$_SESSION["userdata"] =[];
session_destroy();


header("Location: login.php");


?>