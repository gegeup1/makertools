<?php

if(isset($_POST['execute'])) {

	$files = glob('files/sgbquote/random/*');
	$bg_array = array();
	foreach($files as $file) {
		$bg_array[] = $file;
	}

	$folder = "files/sgbquote/";
	$bg = $bg_array[array_rand($bg_array)];
	$overlay = $folder."source/overlay.png";
	$font = $folder."source/Ubuntu-Medium.ttf";
	$filename = $folder.rand(000,999).".png";
	$quote = @$_POST['quote'] ? $_POST['quote'] : 'ISI DULU KONTOL';
	$copyright = @$_POST['copyright'] ? $_POST['copyright'] : 'SGB TEAM';
	$background = ($_POST['background'] == 'random' ? $bg : $_POST['background']);

	$image = new PHPImage();
	$image->setDimensionsFromImage($overlay);
	$image->draw($background);
	$image->draw($overlay, '50%', '75%');
	$image->setFont($font);
	$image->setTextColor(array(255, 255, 255));
	$image->setAlignVertical('center');
	$image->setAlignHorizontal('center');
	$image->textBox($quote, array(
		'fontSize' => 28, 
		'x' => 130,
		'y' => 240,
		'width' => 380,
		'height' => 200,
		'debug' => false
		));

	$image->setTextColor(array(230, 209, 65));	
	$image->text('© '.$copyright, array(
		'fontSize' => 15, 
		'x' => 0,
		'y' => 535,
		'width' => 640,
		'height' => 20,
		'debug' => false
		));
	$image->save($filename);
	echo "<a href='".$filename."' target='_blank'><img src='".$filename."'/></a>";
}

?>