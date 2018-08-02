<div class="row">
	<?php  
	$files = glob('files/sgbquote/*png');
	$bg_array = array();
	foreach($files as $file) {
		echo "<div class='col-md-4 col-sm-6 col-xs-12' style='margin-bottom:15px;'><a href='".$file."' target='_blank'><img class='rounded' src='".$file."'/></a></div>";
	}
	?>
</div>