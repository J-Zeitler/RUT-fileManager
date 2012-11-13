<?php

/**
* 	Main controller class
*/
class Controller
{
	
	function __construct()
	{
		$this->view = new View();
	}

	public function loadModel($name){
		$full_path_name = 'model/' . $name . '_model.php';

		if(file_exists($full_path_name)){

			require $full_path_name;
			$modelName = $name . '_Model';
			$this->model = new $modelName();
			
		}
	}
}