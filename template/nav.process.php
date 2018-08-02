<?php  
switch (@$_GET['module']) {

	case 'sgbquote':
	include "module/sgbquote/index.php";
	break;

	case 'sgbquotelist':
	include "module/sgbquote/list.php";
	break;

	default:
	include "module/dashboard/index.php";
	break;
	
}
?>