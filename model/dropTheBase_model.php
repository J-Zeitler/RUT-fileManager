<?php

/**
*	The model that does the actual dropping of the base
*/
class DropTheBase_Model extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	public function ddddddddDropTheBase(){

		require 'config/database.php';

		$dropQuery = "DROP DATABASE $dbName";
		$stm = $this->db->prepare($dropQuery);
		$stm->execute();

		$this->recreateDb($dbName);
	}

	private function recreateDb($dbName){

		$createQuery = "CREATE DATABASE $dbName COLLATE utf8_general_ci";
		$stm = $this->db->prepare($createQuery);
		$stm->execute();

	}
}