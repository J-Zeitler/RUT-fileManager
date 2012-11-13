<?php

/**
* 	Support page controller
*/
class Support extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){
		$this->view->render('support_view');
	}
}