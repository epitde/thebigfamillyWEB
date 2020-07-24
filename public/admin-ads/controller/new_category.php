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

if ($_SERVER['REQUEST_METHOD'] == 'POST'){
	$name = cleardata($_POST['name']);
	$parent = cleardata($_POST['parent']);

	$image = $_FILES['image']['tmp_name'];

	$imagefile = explode(".", $_FILES["image"]["name"]);
	$renamefile = round(microtime(true)) . '.' . end($imagefile);

	$image_upload = '../' . $items_config['images_folder'];

	move_uploaded_file($image, $image_upload . 'image_' . $renamefile);

	$statment = $connect->prepare(
		'INSERT INTO tbl_category (id,name,image,parent,created_at) VALUES (null, :name, :image, :parent, "")'
		);

	$statment->execute(array(
		':name' => $name,
		':image' => 'image_' . $renamefile,
		':parent' => $parent
		));

	goURL(SITE_URL . '/controller/categories.php');

}

$parent = get_parent_categories($connect);

require '../views/new.category.view.php';
require '../views/footer.view.php';
    
}else {
		goURL(SITE_URL . '/controller/login.php');		
		}


?>