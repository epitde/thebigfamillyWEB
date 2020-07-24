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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = cleardata($_POST['name']);
	$url = cleardata($_POST['url']);
	$image = $_FILES['image']['tmp_name'];

	$imagefile = explode(".", $_FILES["image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($image, $image_upload . 'image_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO tbl_adbanner (id,name,url,image) VALUES (null, :name, :url, :image)'
		);
	$statment->execute(array(
		':name' => $name,
		':url' => $url,
		':image' => 'image_' . $renamefile
		));

	goURL(SITE_URL . '/controller/bannerad.php');

}


require '../views/new.bannerad.view.php';
require '../views/footer.view.php';
    
} else {
	goURL(SITE_URL . '/controller/login.php');		
}


?>