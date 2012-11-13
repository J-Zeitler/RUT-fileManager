<?php

/**
* 	Main Database class
*/
class Database extends PDO
{
	
	function __construct()
	{
		require 'config/database.php';
		parent::__construct('mysql:host='.$dbHost.';dbname='.$dbName, $dbUser, $dbPassword);
	}
}