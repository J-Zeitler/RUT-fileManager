<?php

class dbInit{

	function __construct(){

		require 'config/database.php';

		$con = mysql_connect($dbHost, $dbUser, $dbPassword);
		if (!$con)
		  {
		  	die('Could not connect: ' . mysql_error());
		  }

		else{

			$db = $dbName;
			mysql_select_db($db, $con);

			//install db
			$tablesSQL = file_get_contents('model/dbCreateTables.sql');
			if(!$this->dbIsInstalled($tablesSQL)){

				$fileLength = strlen($tablesSQL);
				$pos = 0;
				while ($pos < $fileLength){
					$newPos = strpos($tablesSQL, ';', $pos)+1;
					$query = substr($tablesSQL, $pos, ($newPos-$pos));

					//create table
					mysql_query($query);

					$pos = $newPos;
				}

			}
		}

		mysql_close();
	}

	private function dbIsInstalled($create_query){

		$table_list = mysql_query('SHOW TABLES');
		$actual_table_count = mysql_num_rows( $table_list );

		$desired_table_count = substr_count($create_query, 'CREATE TABLE');

		return ($desired_table_count <= $actual_table_count);
	}
}