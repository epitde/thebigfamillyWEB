<?php



/* URL PROJECT */
// define ('SITE_URL', 'http://localhost/admin-ads');
define ('SITE_URL', 'http://betweenapp.com/admin-ads');

/* DATABASE CONFIGURATION */
$user_role = array(
	'0' => 'Personal',
	'1' => 'Orgnization'
);
$database = array(
	'host' => 'mysql.betweenapp.com',
	// 'db' => 'db_ads',
	// 'user' => 'root',
	// 'pass' => ''
	'db' => 'db_ads',
	'user' => 'bigfamily',
	'pass' => 'ads123456'
);

$email_config = array(
	'email_address' => 'EMAIL_ADDRESS_HERE',
	'email_password' => 'PASSWORD_HERE',
	'email_subject' => 'EMAIL_SUBJECT_HERE',
	'email_name' => 'EMAIL_NAME_HERE',
	'smtp_host' => 'EMAIL_HOST_HERE',
	'smtp_port' => 'EMAIL_PORT_HERE',
	'smtp_encrypt' => 'tls'
);

$items_config = array(    
    'items_per_page' => '10',
    'images_folder' => 'images/'
);

$sql = "";
?>