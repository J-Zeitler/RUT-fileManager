<?php

/**
* 	Search page controller
*/
class Search extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		echo 'Hello from Search-controller<br/>';
		$this->view->render('search_view');
	}

	public function searchterm($term = false){
		echo 'Searchterm-function is running<br/>';
		if($term) echo "with the term $term.<br/>";

		require 'model/search_model.php';
		$model = new Search_Model();
	}
}