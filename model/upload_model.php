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

		$this->indexFiles();

	}

	private function indexFiles(){

		$files = $_FILES['userfiles'];
		$bToKb = 0.0009765625;

		for($i = 0; $i < count($files['name']); ++$i) {
			$insertQuery = 'INSERT INTO files VALUES (null,';
			$insertQuery .= "'".$files['name'][$i]."'".","."null,"."'0',"."'1','".round($files['size'][$i]*$bToKb)."')";
			
			$this->db->beginTransaction();

			$this->db->exec($insertQuery);

			$fileID = $this->db->lastInsertId();

			if($this->uploadFile($files, $i, $fileID)) $this->db->commit();
			else $this->db->rollBack();
		}
	}

	private function uploadFile(&$files, $fileNumber, $fileID){

		$uploaddir = REALPATH.'uploads/';
		
		$uploadfile = $uploaddir . basename($fileID.'.'.
			substr(strrchr($files['name'][$fileNumber], '.'), 1));
		if(move_uploaded_file($files['tmp_name'][$fileNumber], $uploadfile)) return true;
		return false;
	}

	private function indexContent($filename = ''){

		if (preg_match("/.pdf$/i",$filename)){

			$content = shell_exec(REALPATH.'bin/pdftotext '.$filename.' -');
			$content = utf8_encode(mb_strtolower($content));
			$content = preg_replace('/[^a-zåäöéá_ .+\/ \@\n]/s', '', $content);
			$content = preg_split('/[\s,\n]+/', $content);
			$content = array_count_values($content);
			echo "<pre>";
			print_r($content);
			echo "</pre>";

			//insert words
			$insertQuery = 'INSERT IGNORE INTO words VALUES ';
			foreach($content as $word => $count) $insertQuery .= '("","'.$word.'"),';
			$insertQuery = rtrim($insertQuery, ',');

			$stm = $this->db->prepare($insertQuery);
			$stm->execute();

		    return true;
		}
		return false;
	}

	private function linkWords(&$content){



	}

}