<?php

/**
* 	Main controller
*/
class Controller
{
	
	function __construct()
	{
		echo 'Main controller was constructed<br/>';
		$this->view = new View();
	}
}