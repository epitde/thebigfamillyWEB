<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$id = $_POST['id'];
$sql = "SELECT `id`, `fullname`, `mobile`, `email`, `postal_code`, `username`, `profile_pic`, `address`, `role`, `person_in_charge`, `reg_number`, `provider`, `status`, `created_at` FROM tbl_user WHERE id=$id";
mysqli_set_charset($connection, "utf8");
if(!$result = mysqli_query($connection, $sql)) die();

$row = mysqli_fetch_array($result);   

$sql = "SELECT * FROM tbl_user_info WHERE user_id=$id";
$result = mysqli_query($connection, $sql);
if ($row1 = mysqli_fetch_array($result)) {
	$row['video'] = $row1['video'];
	$row['video_thumb'] = $row1['video_thumb'];
	$row['country'] = $row1['country'];
	$row['bio'] = $row1['bio'];
	$row['gender'] = $row1['gender'];
	$row['birthday'] = $row1['birthday'];
	$row['option1'] = $row1['option1'];
	$row['option2'] = $row1['option2'];
	$row['option3'] = $row1['option3'];
	$row['option4'] = $row1['option4'];
	$row['reg_number1'] = $row1['reg_number'];
}


$sql = "SELECT * FROM tbl_product WHERE user_id=$id ORDER BY check_status ASC, id DESC";
mysqli_set_charset($connection, "utf8");
if(!$result = mysqli_query($connection, $sql)) die();
$list = array();
while($row1 = mysqli_fetch_array($result)) 
{
	$row1['name'] = str_replace("&amp;", "&", $row1['name']);
	$sql = "SELECT * from tbl_category WHERE id=".$row1['category'];
	$result2 = mysqli_query($connection, $sql);
	$row2 = mysqli_fetch_array($result2);
	$row1['category_name'] = $row2['name'];
    $list[] = $row1;
}
$row['products'] = $list;

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($row);
print ($json_string)

?>
