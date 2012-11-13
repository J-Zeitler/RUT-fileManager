<?php

/**
* 	Error page controller
*/
class Error extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		$this->view->render('404');
	}
}