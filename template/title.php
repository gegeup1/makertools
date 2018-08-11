<?php  
// Title Declaration
switch (@$_GET['module']) {

	case 'quotemaker':
	$title = "Quote Maker";
	break;

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