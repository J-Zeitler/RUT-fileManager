<h4>Ladda upp filer i denna view</h4>
<form enctype="multipart/form-data" action="upload" method="post">
 	<!-- <input type="hidden" name="<?php //echo ini_get("session.upload_progress.name"); ?>" value="1" /> -->
	<label for="file">Filer</label>
	<input id="multiple" type="file" name="userfiles[]" multiple><br/>
	<input type="submit" name="submit" value="Ladda upp">
</form>