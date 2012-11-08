<!DOCTYPE html>
<html>
<head>
	<title>image fetch</title>
	<link rel="stylesheet" href="style.css">
</head>
<body>
	<?php include('dbInit.php') ?>
	<?php 
		if(isset($_POST["submit"]))
		{
			if ($_FILES["file"]["error"] > 0)
				echo "Error: " . $_FILES["file"]["error"] . "<br />";
			else
			{
				echo "Upload: " . $_FILES["file"]["name"] . "<br />";
				echo "Type: " . $_FILES["file"]["type"] . "<br />";
				echo "Size: " . ($_FILES["file"]["size"] / 1024) . " Kb<br />";
				echo "Stored in: " . $_FILES["file"]["tmp_name"];
			}
		}
	?>

	<div id="page">
		<header><h1>Image from db</h1></header>
		<article>
			<form action="imageFetcher.php" method="post">
				<select>
					<?php 

						//query db for images

					?>
				</select><br/>
				<label for="file">Filename:</label>
				<input type="file" name="file" id="file" /><br />
				<input type="submit" name="submit" value="Submit" />
			</form>
		</article>
		<footer></footer>
	</div>

</body>
</html>