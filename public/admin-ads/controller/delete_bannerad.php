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

$id = cleardata($_GET['id']);

if(!$id){
	goURL(SITE_URL . '/controller/home.php');
}

$statement = $connect->prepare('DELETE FROM tbl_adbanner WHERE id = :id');
$statement->execute(array('id' => $id));

goBack();

}else {
		goURL(SITE_URL . '/controller/login.php');		
		}


?>