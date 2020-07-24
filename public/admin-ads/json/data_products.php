<?php

header('Content-Type: application/json');
header("access-control-allow-origin: *");
header("Access-Control-Allow-Headers: *");

ini_set('display_errors', 1);
error_reporting(E_ALL);

require '../admin/config.php';

$connection = mysqli_connect($database['host'],$database['user'], $database['pass'], $database['db']) 
or die("An unexpected error has occurred in the database connection");

$where = "";
$limit = "";

if (isset($_POST['check_status'])) {
	$where .= " AND p.check_status='".$_POST['check_status']."'";
}

if (isset($_POST['limit'])) {
	$limit .= " LIMIT " . $_POST['limit'];
}

if (isset($_POST['pstart'])) {
	$limit .= " OFFSET " . $_POST['pstart'];
}

if (isset($_POST['category'])) {
	$where .= " AND category=".$_POST['category'];
}
if (isset($_POST['search'])) {
	$where .= " AND p.name like '%".$_POST['search']."%'";
}
$sql = "SELECT p.*, u.fullname, u.id as uid FROM tbl_product as p, tbl_user as u WHERE p.user_id=u.id AND p.status='active' $where ORDER BY p.id DESC" . $limit;

mysqli_set_charset($connection, "utf8");

if(!$result = mysqli_query($connection, $sql)) die();

$list = array();
$id = 0;

while($row = mysqli_fetch_array($result)) 
{	
	$row['name'] = str_replace("&amp;", "&", $row['name']);
	$sql = "SELECT * from tbl_category WHERE id=".$row['category'];
	$result1 = mysqli_query($connection, $sql);
	$row1 = mysqli_fetch_array($result1);
	$row['category_name'] = $row1['name'];
    $list[] = $row;
}
    
$close = mysqli_close($connection) 
or die("An unexpected error has occurred in the disconnection of the database");
  

$json_string = json_encode($list);
print ($json_string)

?>
