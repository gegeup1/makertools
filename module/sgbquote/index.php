<form method="POST" enctype="multipart/form-data">
	<div class="form-row">
		<div class="col-md-6">
			<div class="form-group">
				<label>Quote :</label>
				<textarea rows="5" class="form-control" required="" name="quote"></textarea>
			</div>
			<div class="form-group">
				<label>Copyright : (default is SGB TEAM)</label>
				<input class="form-control" type="text" name="copyright">
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
				<img src="files/sgbquote/preview.png"/>
			<?php endif ?>
			<?php  include "execute.php";?>
		</div>
	</div>
</form>
