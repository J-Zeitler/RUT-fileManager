<?php

/**
* 	The controller that controlls when and where the base needs to be dropped
*/
class DropTheBase extends Controller
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function index(){

		$this->model->ddddddddDropTheBase();
		header('Location: '.BASEPATH);		
	}
}