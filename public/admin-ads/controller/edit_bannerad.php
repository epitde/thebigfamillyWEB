<?php 

 ini_set('session.gc_maxlifetime', 3600*24);
session_start();
require '../admin/config.php';
require '../admin/functions.php';
if (isset($_SESSION['username'])){
    
    
require '../views/header.view.php';
require '../views/navbar.view.php'; 

$connect = connect($database);
if(!$connect){
	goURL(SITE_URL . '/controller/error.php');
	}

if ($_SERVER['REQUEST_METHOD'] == 'POST'){

	$name = cleardata($_POST['name']);
	$url = cleardata($_POST['url']);
	$image_save = $_POST['image_save'];
	$image = $_FILES['image'];
	$id = cleardata($_POST['id']);

	if (empty($image['name'])) {
		$image = $image_save;
	} else{
			$imagefile = explode(".", $_FILES["image"]["name"]);
			$renamefile = round(microtime(true)) . '.' . end($imagefile);
		$image_upload = '../' . $items_config['images_folder'];
		move_uploaded_file($_FILES['image']['tmp_name'], $image_upload . 'image_' . $renamefile);
		$image = 'image_' . $renamefile;
	}


$statment = $connect->prepare(
	'UPDATE tbl_adbanner SET name = :name, url = :url, image = :image WHERE id = :id'
	);

$statment->execute(array(

		':name' => $name,
		':url' => $url,
		':image' => $image,
		':id' => $id

		));

goURL(SITE_URL . '/controller/bannerad.php');

} else{

$id = cleardata($_GET['id']);
    
if(empty($id)){
	goURL(SITE_URL . '/controller/home.php');
}

$banner = get_adbanner_per_id($connect, $id);
    
if (!$banner){
    goURL(SITE_URL . '/controller/home.php');
}

$banner = $banner['0'];
$parent = get_parent_categories($connect);

}

$categories = get_all_categories($connect);

require '../views/edit.bannerad.view.php';
require '../views/footer.view.php';
    
} else {
	goURL(SITE_URL . '/controller/login.php');		
}


?>