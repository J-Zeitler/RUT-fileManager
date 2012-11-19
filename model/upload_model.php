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

		$this->loadToServer();

	}

	private function loadToServer(){

		$uploaddir = REALPATH.'uploads/';

		$files = $_FILES['userfiles'];

		echo '<pre>';
		print_r($files);
		echo '</pre>';

		for($i = 0; $i < count($files['name']); ++$i) {
			$uploadfile = $uploaddir . basename($files['name'][$i]);
			move_uploaded_file($files['tmp_name'][$i], $uploadfile);
		}
		
		return true;
	}
}