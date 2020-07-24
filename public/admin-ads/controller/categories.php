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

$categories = get_all_categories($connect);
for ($i=0; $i<count($categories)-1; $i++) {
	for ($j=$i+1; $j<count($categories); $j++) {
		$a1 = $categories[$i]['parent'] ? $categories[$i]['parent'] : $categories[$i]['id'];
		$a2 = $categories[$j]['parent'] ? $categories[$j]['parent'] : $categories[$j]['id'];
		if ($a2 < $a1) {
			$temp = $categories[$i];
			$categories[$i] = $categories[$j];
			$categories[$j] = $temp;
		}
	}
}
if (empty($categories)){
     $errors .='<div style="padding: 0px 15px;">No data found</div>';
}

$categories_total = number_categories($connect);

require '../views/categories.view.php';
require '../views/footer.view.php';
    
}else {
		goURL(SITE_URL . '/controller/login.php');		
		}


?>