<?php 
session_start();

if(isset($_SESSION['trainerid'])){
    unset($_SESSION['trainerid']);
    header('Location: trainerlogin.php');
}


?>