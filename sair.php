<?php
@session_start();
@session_unset();
$_SESSION = array();
@session_destroy();
//include "verifica.php"; 
header("location:home.php");
?>


 