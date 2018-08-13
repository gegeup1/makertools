<?php  
switch (@$_GET['module']) {

	case 'quotemaker':
	include "module/quotemaker/index.php";
	break;

	case 'sgbquote':
	include "module/sgbquote/index.php";
	break;

	// remove
	// case 'fakektp':
	// include "module/fakektp/index.php";
	// break;
	
	default:
	include "module/dashboard/index.php";
	break;
	
}
?>