<?php

if(isset($_POST['execute'])) {

	echo "<label>Result :</label>";

	$folder = "files/sgbquote/";
	$overlay = $folder."overlay.png";
	$font = "files/_font/"."Ubuntu-Medium.ttf";
	$filename = $folder.md5(rand(000,999)).".png";
	$quote = @$_POST['quote'] ? $_POST['quote'] : 'YOUR QUOTE';
	$copyright = @$_POST['copyright'] ? $_POST['copyright'] : 'SGB TEAM';
	$backgrond = @$_POST['background'];

	if (!filter_var($backgrond, FILTER_VALIDATE_URL) === false) {
		$bg = $backgrond;
	}else {		
		$bg = get_redirect_target('https://source.unsplash.com/640x640/?'.$backgrond);
	}

	$image = new PHPImage();
	$image->setQuality(10);
	$image->setDimensionsFromImage($overlay);
	$image->draw($bg);
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


	$imagebase64 = "data:image/png;base64,".base64_encode(file_get_contents($filename));
	echo "<a href='".$imagebase64."' target='_blank' download='$filename'><img src='".$imagebase64."'/></a>";
	unlink($filename);
}

?>