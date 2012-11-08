<?php

	function dbIsInstalled(){
		return !!mysql_query("select * from `Files`");
	}

	$con = mysql_connect("localhost","root", "");
	if (!$con)
	  {
	  	die('Could not connect: ' . mysql_error());
	  }

	else{
		mysql_select_db("rutfilemanager", $con);

		//install db
		if(!dbIsInstalled()){

			$tablesSQL = file_get_contents('dbCreateTables.sql');
			$fileLength = strlen($tablesSQL);
			$pos = 0;
			while ($pos < $fileLength){
				$newPos = strpos($tablesSQL, ';', $pos)+1;
				$query = substr($tablesSQL, $pos, ($newPos-$pos));

				mysql_query($query);

				$pos = $newPos;
			}

		}

		//mysql_query($createQuery, $con);
	}

?>