<?php

/**
*	Search model
*/
class Search_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function run($term){
		$stm = $this->db->prepare("SELECT * FROM users WHERE id=$term");
		$stm->execute();

		$data = $stm->fetchAll();
		print_r($data);
	}
}