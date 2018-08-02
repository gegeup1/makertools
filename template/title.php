<?php  
// Title Declaration
switch (@$_GET['module']) {

	case 'sgbquote':
	$title = "SGB Quote";
	break;

	case 'sgbquotelist':
	$title = "SGB Quote List";
	break;

	default:
	$title = $settings['title'];
	break;
}
?>
<title><?= $title ?></title>   