<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

require '../admin/config.php';
require '../admin/functions.php';

function bb($opt) {
	if ($opt == 'true') return 'true';
	if ($opt == 'false') return 'false';
	if ($opt) return 'true';
	else return 'false';
}

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$data = json_decode($_POST['data'], true);
$image = $_POST['image'];
$id = $data['id'];
$sql = "UPDATE tbl_user SET mobile='".$data['mobile']."', email='".$data['email']."' WHERE id=$id";
mysqli_set_charset($connection, "utf8");
mysqli_query($connection, $sql);

$ary = explode("T", $data['birthday']);
$data['birthday'] = $ary[0];

$sql = "UPDATE tbl_user_info SET country='".$data['country']."', bio='".$data['bio']."', gender='".$data['gender']."', birthday='".$data['birthday']."', option1='".bb($data['option1'])."', option2='".bb($data['option2'])."', option3='".bb($data['option3'])."', option4='".bb($data['option4'])."', reg_number='".$data['reg_number']."' WHERE user_id=$id";
mysqli_query($connection, $sql);

$image_upload = '../' . $items_config['images_folder'];

if ($image && $image != 'undefined') {
	$imageFile = 'image_' . round(microtime(true)).".jpg";
	base64_to_jpeg($image, $image_upload . $imageFile);
	$sql = "UPDATE tbl_user SET profile_pic='". $imageFile."' WHERE id=$id";
	mysqli_query($connection, $sql);
}
if (isset($_FILES['video_blob']) && $_FILES['video_blob']) {
	$video = $_FILES['video_blob']['tmp_name'];
	$videofile = explode(".", $_FILES["video_blob"]["name"]);
	$renamefile = round(microtime(true)) . '.mp4';// . end($videofile);
	move_uploaded_file($video, $image_upload . 'video_' . $renamefile);
	$sql = "UPDATE tbl_user_info SET video='". 'video_' . $renamefile."' WHERE user_id=$id";
	mysqli_query($connection, $sql);

	if ($_POST['video_thumb'] && $_POST['video_thumb'] !='undefined') {
		$video_thumb = $_POST['video_thumb'];
		$renamefile = round(microtime(true));
		base64_to_jpeg($video_thumb, $image_upload . 'video_thumb_' . $renamefile.".jpg");
		$sql = "UPDATE tbl_user_info SET video_thumb='". 'video_thumb_' . $renamefile.".jpg"."' WHERE user_id=$id";
		mysqli_query($connection, $sql);
	}
}

$sql = "SELECT profile_pic, id, username, status, role, provider from tbl_user WHERE id=$id";
$result = mysqli_query($connection, $sql);
$ret = mysqli_fetch_array($result);
if (strpos($ret['profile_pic'], 'http') === false) {
	$ret['profile_pic'] = SITE_URL . '/images/' . $ret['profile_pic'];
}

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode(array('success'=>'1', 'ret'=>$ret));
print ($json_string)

?>
