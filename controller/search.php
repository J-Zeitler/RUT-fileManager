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

		if($term){
			$term = preg_replace('/\s+/i',' ',trim($term));
			$this->data['search_match'] = $this->model->run($term);
			$this->data['search_term'] = $term;
		}
		else $this->data['search_term'] = null;

		$this->view->render('search_view', $this->data);
	}
}