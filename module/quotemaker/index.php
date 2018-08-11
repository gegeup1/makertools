<form method="POST" enctype="multipart/form-data">
	<div class="form-row">
		<div class="col-md-12">
			<div class="form-group">
				<label>
					Select Overlay : 
					<a class="btn btn-primary" data-toggle="collapse" href="#collapseExample" role="button" aria-expanded="false" aria-controls="collapseExample">
						Click to Show List
					</a> 
				</label>
				<style>
					label > input{ 
						visibility: hidden; 
						position: absolute; 
					}
					label > input + img{ 
						cursor:pointer;
						border:2px solid transparent;
					}
					label > input:checked + img{ 
						border:2px solid #f00;
					}
				</style>
				<div class="collapse show" id="collapseExample">
					<div class="card card-body">
						<div class="row">
							<?php 
							$files = glob('files/quotemaker/overlay/*');
							$no = 1;
							foreach($files as $file) {
								$filename =  basename($file);
								?>
								<?php if ($no == 1): ?>									
									<div class="col-md-4 col-sm-6 col-xs-12">						
										<label>
											<input checked="" type="radio" name="overlay" value="<?= $filename ?>" />
											<img src="<?= $file ?>">
										</label>
									</div>
								<?php else: ?>
									<div class="col-md-4 col-sm-6 col-xs-12">						
										<label>
											<input type="radio" name="overlay" value="<?= $filename ?>" />
											<img src="<?= $file ?>">
										</label>
									</div>
								<?php endif ?>
								<?php
								$no++;
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div>
		<div class="col-md-6">
			<div class="form-group">
				<label>Quote :</label>
				<textarea rows="5" class="form-control" required="" name="quote"></textarea>
			</div>
			<div class="form-group">
				<label>Font Type :</label>
				<input required="" placeholder="Click to Select" type="text" name="font" data-toggle="modal" data-target="#modalfont" class="form-control"> 
				<!-- Modal -->
				<div class="modal" id="modalfont" tabindex="-1" role="dialog">
					<div class="modal-dialog modal-dialog-centered modal-lg" role="document">
						<div class="modal-content">
							<div class="modal-header">
								<h5 class="modal-title" id="exampleModalLabel"><i class="icon icon-lg icon-question-circle"></i> Select Font</h5>
								<button type="button" class="close" data-dismiss="modal" aria-label="Close">
									<span aria-hidden="true">&times;</span>
								</button>
							</div>
							<div class="modal-body">
								<div class="row">
									<?php 
									$files = glob('files/_font/*');
									foreach($files as $file) {
										$filename =  basename($file);
										$filenoext = str_replace('.ttf', '', $filename);
										?>
										<div class="col-md-4 col-sm-6 col-xs-12">						
											<style type="text/css">
												@font-face {
													font-family: <?= $filenoext ?>;
													src: url(<?= $file ?>);
												}
											</style>
											<p onclick="SelectFont('<?= $filename ?>')" style="text-align:center;border:1px solid #ddd;font-size: xx-large;font-family: <?= $filenoext ?>">
												Example Font
											</p>
										</div>
										<?php
									}
									?>
									<script type="text/javascript">
										function SelectFont(font){
											$("input[name='font']").val(font);
											$('#modalfont').modal('hide');
										}
									</script>
								</div>			
							</div>
						</div>
					</div>
				</div>
			</div>
			<div class="form-group">
				<label>Font Size : <span id="fontsize"></span></label>
				<input id="range" min="0" max="100" value="24" class="form-control-range" type="range" name="size">
				<script type="text/javascript">
					var range = document.getElementById('range');
					var fontsize = document.getElementById('fontsize');
					range.addEventListener('input', function() {
						var size = range.value;
						fontsize.innerHTML = size + "px";
					});
				</script>
			</div>
			<div class="form-group">
				<label>Select Color :	</label>
				<div id="cp3" class="input-group colorpicker-component mb-2">
					<input type="text" name="color" value="rgb(255,255,255)" class="form-control" />
					<div class="input-group-prepend">
						<div class="input-group-text"><span class="input-group-addon"><i></i></span></div>
					</div>
				</div>
				<script>
					$(function() {
						$('#cp3').colorpicker({
							color: 'rgb(255,255,255)',
							format: 'rgb'
						});
					});
				</script>
			</div>
			<div class="form-group">
				<label>Background : (insert keyword or URL)</label>
				<input onClick="this.select();" class="form-control" type="text" value="random" name="background">
			</div>
			<div class="form-group">
				<input class="waves-effect btn btn-primary" type="submit" value="Create" name="execute">
			</div>
		</div>
		<div class="form-group col-md-6">		
			<?php if (empty($_POST)): ?>
				<label>Preview :</label>
				<img src="files/quotemaker/preview.png"/>
			<?php endif ?>
			<?php  
			if (@$_POST['execute']) {
				echo "<label>Result :</label>";

				$folder = "files/quotemaker/";
				$folderoverlay = $folder."overlay/";
				$overlay =  @$_POST['overlay'] ?  $folderoverlay.$_POST['overlay'] : $folderoverlay."overlay1.png";
				$font = "files/_font/".@$_POST['font'];
				$filename = $folder.md5(rand(000,999)).".png";
				$color = @$_POST['color'] ? sscanf($_POST['color'], "rgb(%d, %d, %d)") : array('255, 255, 255');
				$quote = @$_POST['quote'] ? $_POST['quote'] : 'Empty Text';
				$backgrond = @$_POST['background'];

				if (!filter_var($backgrond, FILTER_VALIDATE_URL) === false) {
					$bg = $backgrond;
				}else {		
					$bg = get_redirect_target('https://source.unsplash.com/640x640/?'.urlencode($backgrond));
				}

				$image = new PHPImage();
				$image->setQuality(10);
				$image->setDimensionsFromImage($overlay);
				$image->draw($bg);
				$image->draw($overlay, '50%', '75%');
				$image->setTextColor($color);
				$image->setAlignVertical('center');
				$image->setAlignHorizontal('center');
				$fontsize = @$_POST['size'] ? $_POST['size'] : 28;;
				$debug = false;

				// disini nanti dikasih switch
				switch (@$_POST['overlay']) {

					case 'overlay1.png':
					$image->setFont($font);
					$image->textBox($quote, array(
						'fontSize' => $fontsize, 
						'x' => 60,
						'y' => 215,
						'width' => 520,
						'height' => 210,
						'debug' => $debug
						));
					break;

					case 'overlay2.png':
					$image->setFont($font);
					$image->textBox($quote, array(
						'fontSize' => $fontsize, 
						'x' => 140,
						'y' => 58,
						'width' => 360,
						'height' => 500,
						'debug' => $debug
						));
					break;

					case 'overlay3.png':
					$image->setFont($font);
					$image->textBox($quote, array(
						'fontSize' => $fontsize, 
						'x' => 130,
						'y' => 60,
						'width' => 380,
						'height' => 300,
						'debug' => $debug
						));
					break;

					default:
					$image->setFont($font);
					$image->textBox($quote, array(
						'fontSize' => $fontsize, 
						'x' => 130,
						'y' => 200,
						'width' => 380,
						'height' => 200,
						'debug' => $debug
						));
					break;
				}

				$image->save($filename);

				$imagebase64 = "data:image/png;base64,".base64_encode(file_get_contents($filename));
				echo "<a href='".$imagebase64."' target='_blank' download='$filename'><img src='".$imagebase64."'/></a>";
				unlink($filename);
			}
			?>
		</div>
	</div>
</form>
