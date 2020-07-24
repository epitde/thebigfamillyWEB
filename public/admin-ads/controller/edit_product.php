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
	$category = cleardata($_POST['category']);
	$id = cleardata($_POST['id']);
	$image_save = $_POST['image_save'];
	$status = $_POST['status'];
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
	'UPDATE tbl_product SET name = :name, image = :image, category = :category, status = :status WHERE id = :id'
	);

$statment->execute(array(

		':name' => $name,
		':category' => $category,
		':image' => $image,
		':status' => $status,
		':id' => $id

		));

goURL(SITE_URL . '/controller/products.php');

} else{

$id = cleardata($_GET['id']);
    
if(empty($id)){
	goURL(SITE_URL . '/controller/home.php');
}

$product = get_product_per_id($connect, $id);
    
if (!$product){
    goURL(SITE_URL . '/controller/home.php');
}

$product = $product['0'];
$parent = get_parent_categories($connect);

}

$categories = get_all_categories($connect);

require '../views/edit.product.view.php';
require '../views/footer.view.php';
    
} else {
	goURL(SITE_URL . '/controller/login.php');		
}


?>