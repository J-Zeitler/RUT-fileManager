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
		if($this->checkFiles()){
			if($this->loadToServer()){
				$this->updateDB();
			}
		}
	}

	private function checkFiles(){
		echo 'files checked<br/>';
		return true;
	}

	private function loadToServer(){
		echo 'files transfered to server<br/>';
		return true;
	}

	private function updateDB($values = null){
		echo 'database updated';
		return true;

		// $query = 'INSERT INTO FILES VALUES';

		// $stm = $this->db->prepare($query);
		// $stm->execute();
	}
}