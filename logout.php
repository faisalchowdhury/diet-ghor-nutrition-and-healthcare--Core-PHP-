<?php 
session_start();

if(isset($_SESSION['cmrid'])){
    unset($_SESSION['cmrid']);
    header('Location: customerlogin.php');
}


?>