<?php

/**
* 	Upload page controller
*/
class Upload extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		// $this->view->js = array('vendor/jquery-1.8.2.min.js',
		//	'vendor/jquery.html5uploader.min.js');
	}

	public function index(){

		if(isset($_POST['submit']))	$this->model->run();

		$this->view->render('upload_view');
	}
}