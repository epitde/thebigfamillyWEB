<?php 



 ini_set('session.gc_maxlifetime', 3600*24);
session_start();

session_destroy();
$_SESSION = array ();

header('Location: ./login.php');


?>