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
		$this->model->run();
		
		$this->view->render('upload_view');
	}
}