<?php

/**
*  Main View class
*/
class View
{

	function __construct()
	{
	}

	public function render($name, $passed_data = array()){
		$this->data = $passed_data;

		require 'view/header.php';
		require 'view/' . $name . '.php';
		require 'view/footer.php';
	}

	protected function highlight(&$arr, $needle){

		foreach($arr as $key => $val){
			$arr[$key] = preg_replace('/^'.$needle.'|\s'.$needle.'/i', "<span class='highlight'>$0</span>", $val);
		}
	}
}