<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

require '../admin/config.php';
require '../admin/functions.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$data = json_decode($_POST['data'], true);
$image = $_POST['image'];
$user_id = $_POST['user_id'];
$video_thumb = $_POST['video_thumb'];

$image_upload = '../' . $items_config['images_folder'];
$imageFile = "";
$video_thumbFile = "";
$videoFile = "";

if ($image && $image != 'undefined') {
	$imageFile = 'image_' . round(microtime(true)).".jpg";
	base64_to_jpeg($image, $image_upload . $imageFile);
}
if ($video_thumb && $video_thumb != 'undefined') {
	$video_thumbFile = 'video_thumb_' . round(microtime(true)).".jpg";
	base64_to_jpeg($video_thumb, $image_upload . $video_thumbFile);
}
if (isset($_FILES['video_blob']) && $_FILES['video_blob']) {
	$video = $_FILES['video_blob']['tmp_name'];
	$videoFile = explode(".", $_FILES["video_blob"]["name"]);
	$renamefile = round(microtime(true)) . '.mp4';// . end($videoFile);
	$videoFile = 'video_' . $renamefile;
	move_uploaded_file($video, $image_upload . $videoFile);
}

if (isset($_POST['id']) && $_POST['id'] != 'undefined') {
	$id = $_POST['id'];
	$sql = "UPDATE tbl_product SET category='".$data['category']."', name='".$data['name']."', price='".$data['price']."', description='".$data['description']."' WHERE id=$id";
	mysqli_query($connection, $sql);
	if ($imageFile != '') {
		$sql = "UPDATE tbl_product SET image='".$imageFile."' WHERE id=$id";
		mysqli_query($connection, $sql);
	}
	if ($video_thumbFile != '') {
		$sql = "UPDATE tbl_product SET video_thumb='".$video_thumbFile."', video='".$videoFile."' WHERE id=$id";
		mysqli_query($connection, $sql);
	}
} else {
	$sql = 'INSERT INTO tbl_product (id,category,name,user_id,image,description, price, video, video_thumb, created_at) VALUES (null, "'.$data['category'].'", "'.$data['name'].'", "'.$user_id.'", "'.$imageFile.'", "'.$data['description'].'", "'.$data['price'].'", "'.$videoFile.'", "'.$video_thumbFile.'", "'.time().'")';
	$result = mysqli_query($connection, $sql);
}
 
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(array('success'=>'1'));
print ($json_string)

?>
