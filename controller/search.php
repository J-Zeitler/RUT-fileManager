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

	public function search_for($term = false){
		require 'model/search_model.php';
		$model = new Search_Model();
		
		$this->view->render('search_view');
	}
}