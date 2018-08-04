<?php  
// Title Declaration
switch (@$_GET['module']) {

	case 'sgbquote':
	$title = "SGB Quote";
	break;

	case 'fakektp':
	$title = "Fake KTP";
	break;

	default:
	$title = $settings['title'];
	break;
}
?>
<title><?= $title ?></title>   