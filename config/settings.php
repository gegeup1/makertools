<?php  
include "limit.php";
include "session.php";
include "function.php";
include "timezone.php";

$settings['title'] = 'Maker Tools';
$settings['desc'] = 'Combine Image with Text';
$settings['author'] = 'Irfaan Programmer';
$settings['version'] = 'v1.0';
$baseurl = home_base_url();

ob_start("sanitize_output");
?>