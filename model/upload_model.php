<?php

/**
*	Upload model
*/
class Upload_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function run(){
		echo 'hej';
		$sth = $this->db->prepare("INSERT INTO users VALUES
			('', 'annananvändare')");
		$sth->execute();
	}

	
}