<?php

 ini_set('session.gc_maxlifetime', 3600*24);
 session_start();
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

$users = get_all_requests($connect);
 if (empty($users)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}


require '../views/org_requests.view.php';
require '../views/footer.view.php';
    
}else {
		goURL(SITE_URL . '/controller/login.php');		
		}


?>