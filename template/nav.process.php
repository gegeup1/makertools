<?php  
switch (@$_GET['module']) {

	case 'sgbquote':
	include "module/sgbquote/index.php";
	break;
	
	default:
	include "module/dashboard/index.php";
	break;
	
}
?>