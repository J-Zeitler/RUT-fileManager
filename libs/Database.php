<?php

/**
* 	Main Database class
*/
class Database extends PDO
{
	
	function __construct()
	{
		require 'config/database.php';
		parent::__construct('mysql:host='.$dbHost.';dbname='.$dbName.';charset='.$dbCharset, $dbUser, $dbPassword);
		$this->exec("SET CHARACTER SET utf8"); //important! charset above not enough ^
	}
}