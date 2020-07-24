<?php 



ini_set('session.gc_maxlifetime', 3600*24);
session_start();

if (isset($_SESSION['username'])){
    
    header('Location: ./controller/home.php');
} else {
    
    header('Location: ./controller/login.php');
}



?>