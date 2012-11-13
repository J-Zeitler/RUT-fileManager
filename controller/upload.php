<?php

/**
* 	Upload page controller
*/
class Upload extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->view->render('upload_view');
	}

	public function upload_files($term = false){
		require 'model/upload_model.php';
		$model = new Upload_Model();
		$model->run();
		
		$this->view->render('upload_view');
	}
}