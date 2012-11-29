<?php

/**
*  Main Model class
*/
class Model
{
	
	function __construct()
	{
		$this->db = new Database();
	}

	/**
	 * abstraction function for querying the db
	 * @param  string 	$query
	 * @return array 	$result
	 */
	protected function query($query){

		$stm = $this->db->prepare($query);
		$stm->execute();
		$result = $stm->fetchAll();
		return $result;
	}
}