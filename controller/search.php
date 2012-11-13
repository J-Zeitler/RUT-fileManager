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

	public function search_for($term = 1){
		$this->model->run($term);

		$this->view->render('search_view');
	}
}