<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$id = $_POST['id'];
$sql = "SELECT p.*, u.fullname, u.id as user_id, u.profile_pic FROM tbl_product as p, tbl_user as u WHERE p.user_id=u.id and p.id=$id";
mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();
$ret = mysqli_fetch_array($result);
$ret['name'] = str_replace("&amp;", "&", $ret['name']);
$sql = "SELECT * from tbl_category WHERE id=".$ret['category'];
$result1 = mysqli_query($connection, $sql);
$row1 = mysqli_fetch_array($result1);
$ret['category_name'] = $row1['name'];

$where = " AND category='".$ret['category']."' AND p.id<>".$id;
$sql = "SELECT p.*, u.fullname, u.id as uid FROM tbl_product as p, tbl_user as u WHERE p.user_id=u.id AND p.status='active' $where ORDER BY p.id DESC LIMIT 4";

if(!$result = mysqli_query($connection, $sql)) die();
$list = array();
while($row = mysqli_fetch_array($result)) 
{	
	$row['name'] = str_replace("&amp;", "&", $row['name']);
	$sql = "SELECT * from tbl_category WHERE id=".$row['category'];
	$result1 = mysqli_query($connection, $sql);
	$row1 = mysqli_fetch_array($result1);
	$row['category_name'] = $row1['name'];
	$row['image'] = SITE_URL . '/images/' . $row['image'];
	$row['video'] = $row['video'] != '' ? SITE_URL . '/images/' . $row['video'] : '';
	$row['video_thumb'] = $row['video_thumb'] != '' ? SITE_URL . '/images/' . $row['video_thumb'] : '';
    $list[] = $row;
}
$ret['similar'] = $list;

$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($ret);
print ($json_string)

?>
