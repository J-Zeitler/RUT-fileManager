<?php

/**
* 	Bootstrap for controller construction
*/
class Bootstrap
{
	
	function __construct()
	{
		$url = isset($_GET['url']) ? $_GET['url'] : null;
		$url = rtrim($url, '/'); //trim extra slashes
		$url = explode('/', $url);

		if(empty($url[0])){
			require 'controller/home.php';
			$controller = new Home();
			$controller->index();
			return false;
		}

		$file = 'controller/' . $url[0] . '.php';
		if(file_exists($file)){
			require $file;
		}
		else{
			$this->error();
			return false;
		}

		$controller = new $url[0];
		$controller->loadModel($url[0]);

		//method calls
		if(isset($url[2])){
		    if (method_exists($controller, $url[1])) {
				$controller->{$url[1]}($url[2]);
			}
			else{
				$this->error();
				return false;
			}
		}
		else{
		    if(isset($url[1])){
		    	if (method_exists($controller, $url[1])) {
					$controller->{$url[1]}();
				} else {
					$this->error();
					return false;
				}
		    }
		    else{
				$controller->index();
		    }
		}
	}

	private function error(){
		require 'controller/error.php';
		$controller = new Error();
	}
}