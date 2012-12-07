<?php

/**
* 	Upload page controller
*/
class Upload extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		// $this->view->js = array('vendor/axuploader.js');
	}

	public function index(){
		
		if(isset($_POST['submit']))	$this->model->run();

		$this->view->render('upload_view');
	}
}