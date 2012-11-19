<h4>Ladda upp filer i denna view</h4>
<form enctype="multipart/form-data" action="upload" method="post">
	<label for="file">Filer</label>
	<div id="dropbox"></div>
	<input id="multiple" type="file" name="userfiles[]" multiple><br/>
	<input type="submit" name="submit" value="Ladda upp">
</form>

<script type="text/javascript">

	(function(){
		$("#dropbox, #multiple").html5Uploader({
	      name: "foo",
	      postUrl: "upload"
	  });
	})();
	    	
</script>