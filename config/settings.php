<?php  
include "limit.php";
include "session.php";
include "function.php";
include "timezone.php";

$urlname = 'makertools';
$settings['title'] = 'Maker Tools';
$settings['desc'] = 'Combine Image with Text';
$settings['author'] = 'Irfaan Programmer';
$settings['version'] = 'v1.0';
$baseurl = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on' ? "https" : "http") . "://$_SERVER[HTTP_HOST]/$urlname/";
?>