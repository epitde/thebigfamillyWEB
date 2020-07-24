<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$user_id = $_POST['user_id'];
$sql = "SELECT * FROM tbl_follow_product WHERE user_id=$user_id ORDER BY id";
$result = mysqli_query($connection, $sql));
$list = array();
while($row = mysqli_fetch_array($result)) 
{	
	$id = $row['pid'];
	$sql = "SELECT p.*, u.fullname, u.id as user_id, u.profile_pic FROM tbl_product as p, tbl_user as u WHERE p.user_id=u.id and p.id=$id";
	$result1 = mysqli_query($connection, $sql));
	$ret = mysqli_fetch_array($result1);
	$ret['name'] = str_replace("&amp;", "&", $ret['name']);
	$sql = "SELECT * from tbl_category WHERE id=".$ret['category'];
	$result1 = mysqli_query($connection, $sql);
	$row1 = mysqli_fetch_array($result1);
	$ret['category_name'] = $row1['name'];
	$ret['image'] = SITE_URL . '/images/' . $ret['image'];
	$ret['video'] = $ret['video'] != '' ? SITE_URL . '/images/' . $ret['video'] : '';
	$ret['video_thumb'] = $ret['video_thumb'] != '' ? SITE_URL . '/images/' . $ret['video_thumb'] : '';
    $list[] = $ret;
}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($list);
print ($json_string)

?>
