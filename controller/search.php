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

	/**
	 * instanciates the search model passing the searchterm to it.
	 * passes mathcing tuples to the search view
	 * @param  string $term searchterm
	 * @return none
	 */
	public function for_term($term = null){
		if($term === null) $term = $_POST['searchTerm'];
		$data['search_match'] = $this->model->run($term);

		$this->view->render('search_view', $data);
	}
}