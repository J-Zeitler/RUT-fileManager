<?php

/**
* 	Search page controller
*/
class Search extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->data = array();
	}

	public function index($term = null, $filters = array()){

		if(isset($_GET['submit'])) $term = $_GET['searchTerm'];
		if($term) $this->data['search_match'] = $this->model->run($term);
		$this->view->render('search_view', $this->data);
	}
}