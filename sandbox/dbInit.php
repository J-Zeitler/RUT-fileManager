<?php

	$con = mysql_connect("localhost","root", "");
	if (!$con)
	  {
	  	die('Could not connect: ' . mysql_error());
	  }

	else{
		mysql_select_db("rutfilemanager", $con);

		//are the dbs set up?
		$createQuery = "CREATE TABLE IF NOT EXISTS Images(
						id int(5) unsigned NOT NULL AUTO_INCREMENT,
						imageFileName varchar(50) NOT NULL,
						PRIMARY KEY (id)
						)";

		mysql_query($createQuery, $con);
	}

	function newWord($imageFileName){

		$insertQuery = "INSERT IGNORE INTO Images VALUES
						('".$imageFileName."')";

		mysql_query($insertQuery);			
	}

?>