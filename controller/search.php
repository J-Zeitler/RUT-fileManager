<?php

/**
* 	Search page controller
*/
class Search extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->view->render('search_view');
	}

	public function for_term($term = 1){
		$term = $_POST['searchTerm'];
		$this->model->run($term);

		$this->view->render('search_view');
	}
}