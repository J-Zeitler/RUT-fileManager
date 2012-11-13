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
		$sth = $this->db->prepare("SELECT * FROM users WHERE id=$term");
		$sth;

	}
}