<?php

/**
*	Upload model
*/
class Upload_Model extends Model
{
	
	function __construct()
	{
		parent::__construct();
	}

	public function run(){

		$this->loadToServer();

	}

	private function loadToServer(){

		$uploaddir = REALPATH.'uploads/';

		$files = $_FILES['userfiles'];

		echo '<pre>';
		print_r($files);
		echo '</pre>';

		for($i = 0; $i < count($files['name']); ++$i) {
			$uploadfile = $uploaddir . basename($files['name'][$i]);
			move_uploaded_file($files['tmp_name'][$i], $uploadfile);
		}
		
		return true;
	}

	private function indexContent($filename){

		// $filename = 'uploads/annan.pdf';

		if (preg_match("/.pdf$/i",$filename)){
		    $content  = shell_exec('C:/wamp/www/sandbox/pdfReader/bin64/pdftotext '.$filename.' -');
		    $content = utf8_encode(mb_strtolower($content));
		    $content = preg_replace('/[^a-zåäöéá_ .+\/ \@\n]/s', '', $content);
		    $content = preg_split('/[\s,\n]+/', $content);
		    echo "<pre>";
		    print_r($content);
		    echo "</pre>";

		    return $content;
		}
		else return false;
	}

}