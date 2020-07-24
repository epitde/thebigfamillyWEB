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

$id_category = cleardata($_GET['id']);

if(!$id_category){
	goURL(SITE_URL . '/controller/home.php');
}

$statement = $connect->prepare('DELETE FROM tbl_category WHERE id = :id');
$statement->execute(array('id' => $id_category));

goBack();

}else {
		goURL(SITE_URL . '/controller/login.php');		
		}


?>