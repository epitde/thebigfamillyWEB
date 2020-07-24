<?php

ini_set('display_errors', 1);
error_reporting(E_ALL);

/*--------------------*/
$user_role = array(
    '0' => 'Personal',
    '1' => 'Orgnization',
    '2' => 'Employee',
    '10' => 'Admin'
);
$strRole = array("Personal", "Orgnization", "Employee");

function goURL($url) {
    echo "<script>window.location.href='".$url."';</script>";
}
function goBack() {
    echo "<script>window.history.back();</script>";
}

function sendCode($phone, $code) {
    
}
/*--------------------*/

function connect($database){
    try{
        $connect = new PDO('mysql:host='. $database['host'] .';dbname='. $database['db'], $database['user'], $database['pass'], array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES  \'UTF8\''));
        return $connect;
        
    }catch (PDOException $e){
        return false;
    }
}

function cleardata($data){
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars ($data);
    return $data;
}

function base64_to_jpeg($base64_string, $output_file) {
    // open the output file for writing
    $ifp = fopen( $output_file, 'wb' ); 

    // split the string on commas
    // $data[ 0 ] == "data:image/png;base64"
    // $data[ 1 ] == <actual base64 string>
    $data = explode( ',', $base64_string );

    // we could add validation here with ensuring count( $data ) > 1
    fwrite( $ifp, base64_decode( $data[ 1 ] ) );

    // clean up the file resource
    fclose( $ifp ); 

    return $output_file; 
}

function actual_page(){
    
    return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function number_pages($items_per_page, $connect){

    $total_places = $connect->prepare('SELECT FOUND_ROWS() AS total');
    $total_places->execute();
    $total_places = $total_places->fetch()['total'];

    $number_pages = ceil($total_places / $items_per_page);
    return $number_pages;
}

/////////////////////////////////////////////////////////////////////////////////// 

function getDateTime($datetime) {
  $date = new DateTime();
  $date->setTimestamp($datetime*1);
  return $date->format('Y-m-d H:i:s');
}

/////////////////////////////////////////////////////////////////////////////////// USERS

function get_all_requests($connect, $status="")
{    
    $sql = "SELECT u.*, (SELECT fullname FROM tbl_user WHERE id=u.request_by) as request_by_name FROM tbl_user as u WHERE u.role<>'10' AND (u.status='pending' or u.status='approved' or u.status='reject') ORDER BY id DESC";
    if ($status != "") {
        $sql = "SELECT u.*, (SELECT fullname FROM tbl_user WHERE id=u.request_by) as request_by_name FROM tbl_user as u WHERE u.role<>'10' AND u.status='".$status."' ORDER BY id DESC";
    }
    $sentence = $connect->prepare($sql); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_users($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM tbl_user WHERE role<>'10' and status<>'pending' ORDER BY id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_user($id_quote){
    return (int)cleardata($id_quote);
}

function get_user_per_id($connect, $id_user){
    $sentence = $connect->query("SELECT * FROM tbl_user WHERE id = $id_user LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_users($connect){

$total_numbers = $connect->prepare('SELECT * FROM tbl_user');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}
/////////////////////////////////////////////////////////////////////////////////// CATEGORIES

function get_parent_categories($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM tbl_category WHERE parent=0 ORDER BY id"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_categories($connect)
{
    
    $sentence = $connect->prepare("SELECT * FROM tbl_category ORDER BY id"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function id_category($id_category){
    return (int)cleardata($id_category);
}

function get_category_per_id($connect, $id_category){
    $sentence = $connect->query("SELECT * FROM tbl_category WHERE id = $id_category LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

function number_categories($connect){

$total_numbers = $connect->prepare('SELECT * FROM tbl_category');
$total_numbers->execute(array());
$total_numbers->fetchAll();
$total = $total_numbers->rowCount();
return $total;

}

///////////////////////////////////////////////////////////////////////////////////

function get_all_products($connect)
{    
    $sentence = $connect->prepare("SELECT p.*, u.fullname, u.username, u.profile_pic, u.role FROM tbl_product as p, tbl_user as u WHERE p.user_id=u.id ORDER BY p.id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_product_per_id($connect, $id){
    $sentence = $connect->query("SELECT * FROM tbl_product WHERE id = $id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

/////////////////////////////////////////////////////////////////////////////////// 

function get_all_banners($connect)
{    
    $sentence = $connect->prepare("SELECT * FROM tbl_banner ORDER BY id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_banner_per_id($connect, $id){
    $sentence = $connect->query("SELECT * FROM tbl_banner WHERE id = $id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

/////////////////////////////////////////////////////////////////////////////////// 

function get_all_adbanners($connect)
{    
    $sentence = $connect->prepare("SELECT * FROM tbl_adbanner ORDER BY id DESC"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_adbanner_per_id($connect, $id){
    $sentence = $connect->query("SELECT * FROM tbl_adbanner WHERE id = $id LIMIT 1");
    $sentence = $sentence->fetchAll();
    return ($sentence) ? $sentence : false;
}

/////////////////////////////////////////////////////////////////////////////////// 


function get_all_settings($connect)
{
    
    $sentence = $connect->query("SELECT * FROM settings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function get_all_strings($connect)
{
    
    $sentence = $connect->query("SELECT * FROM strings"); 
    $sentence->execute();
    return $sentence->fetchAll();
}

function fecha($fecha){

    $timestamp = strtotime($fecha);
    $meses = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
    $dia = date('d', $timestamp);
    $mes = date('m', $timestamp) - 1;
    $ano = date('Y', $timestamp);

    $fecha = "$dia " . $meses[$mes] . " $ano";
    return $fecha;
}

function time_ago($date) {
    if (empty($date)) {
        return "-";
    }
    $periods = array("second", "minute", "hour", "day", "week", "month", "year", "decade");
    $lengths = array("60", "60", "24", "7", "4.35", "12", "10");
    $now = time();
    $uni_date = strtotime($date);
    // check validity of date
    if (empty($uni_date)) {
        return "-";
    }
    // is it future date or past date
    if ($now > $uni_date) {
        $difference = $now - $uni_date;
        $tense = "ago";
    } else {
        $difference = $uni_date - $now;
        $tense = "from now";
    }
    for ($j = 0; $difference >= $lengths[$j] && $j < count($lengths) - 1; $j++) {
        $difference /= $lengths[$j];
    }
    $difference = round($difference);
    if ($difference != 1) {
        $periods[$j].= "s";
    }
    return "$difference $periods[$j] {$tense}";
}

?>