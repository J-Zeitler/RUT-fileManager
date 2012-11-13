<?php

/**
* 	Error page controller
*/
class Error extends Controller
{
	
	function __construct()
	{
		parent::__construct();
		echo 'Hello from Error-controller.<br/>';

		$this->view->render('404');

	}
}