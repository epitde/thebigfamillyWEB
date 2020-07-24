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
	$parent = cleardata($_POST['parent']);
	$id = cleardata($_POST['id']);
	$image_save = $_POST['image_save'];
	$image = $_FILES['image'];

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
	'UPDATE tbl_category SET name = :name, image = :image, parent = :parent WHERE id = :id'
	);

$statment->execute(array(

		':name' => $name,
		':image' => $image,
		':parent' => $parent,
		':id' => $id

		));

goURL(SITE_URL . '/controller/categories.php');

} else{

$id_category = id_category($_GET['id']);
    
if(empty($id_category)){
	goURL(SITE_URL . '/controller/home.php');
	}

$category = get_category_per_id($connect, $id_category);
    
    if (!$category){
    goURL(SITE_URL . '/controller/home.php');
}

$category = $category['0'];
$parent = get_parent_categories($connect);

}

require '../views/edit.category.view.php';
require '../views/footer.view.php';
    
} else {
		goURL(SITE_URL . '/controller/login.php');		
		}


?>