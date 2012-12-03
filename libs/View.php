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

	protected function highlight(&$arr, $needles){
		
		$needle1 = implode('|^', $needles);
		$needle2 = implode('|\s', $needles);

		foreach($arr as $key => $val){
			$arr[$key] = preg_replace('/^'.$needle1.'|\s'.$needle2.'/i', "<span class='highlight'>$0</span>", $val);
		}
	}
}