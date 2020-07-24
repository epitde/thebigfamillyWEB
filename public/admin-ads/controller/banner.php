<?php

 ini_set('session.gc_maxlifetime', 3600*24);
 session_start();
ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../admin/config.php';
require '../admin/functions.php';	
if (isset($_SESSION['username'])){
    
    
require '../views/header.view.php';
require '../views/navbar.view.php';    

$errors = '';   

$connect = connect($database);
if(!$connect){
	goURL(SITE_URL . '/controller/error.php');
	}

$banners = get_all_banners($connect);
if (empty($banners)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}


require '../views/banner.view.php';
require '../views/footer.view.php';
    
}else {
		goURL(SITE_URL . '/controller/login.php');		
		}


?>