<?php

/**
*  Main View
*/
class View
{
	
	function __construct()
	{
		echo 'Main view was constructed<br/>';
	}

	public function render($name){
		require 'view/' . $name . '.php';
	}
}