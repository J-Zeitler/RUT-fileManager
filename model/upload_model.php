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
		$fileName = '';
		$uploaddir = REALPATH.'uploads/';

		for($i = 0; $i < count($files['name']); ++$i) {
			$filename = $files['name'][$i];
			$insertQuery = 'INSERT INTO files VALUES (null,';
			$insertQuery .= "'".$filename."'".","."null,"."'0',"."'1','".round($files['size'][$i]*$bToKb)."')";
			
			$this->db->beginTransaction();

			$this->db->exec($insertQuery);

			$fileID = $this->db->lastInsertId();

			if($this->uploadFile($files, $i, $fileID, $uploaddir)){
				$this->db->commit();
				if (preg_match("/.pdf$/i",$filename)) $this->indexContent($uploaddir, $fileID);
			}
			else $this->db->rollBack();
		}
	}

	private function uploadFile(&$files, $fileNumber, $fileID, $uploaddir){
		
		$uploadfile = $uploaddir . basename($fileID.'.'.
			substr(strrchr($files['name'][$fileNumber], '.'), 1));
		if(move_uploaded_file($files['tmp_name'][$fileNumber], $uploadfile)) return true;
		return false;
	}

	private function indexContent($uploaddir, $fileID){
		$filename = $uploaddir.$fileID.'.pdf';

		//prepare content
		$content = shell_exec(REALPATH.'bin/pdftotext '.$filename.' -');
		$content = utf8_encode(mb_strtolower($content));
	    $content = preg_replace('/[^a-zåäöéá_ .\+\/\@\n]/s', '', $content);
	    $content = preg_replace('/\.+/s', '', $content);
	    $content = preg_split('/[\s,\n\/]+/', $content);

		$uniqueWords = array_unique($content);
		$occurrences = array_count_values($content);

		//insert words
		$insertQuery = 'INSERT IGNORE INTO words VALUES ';
		foreach($uniqueWords as $word) $insertQuery .= "(null,'".mysql_real_escape_string($word)."'),";
		$insertQuery = rtrim($insertQuery, ',');

		$stm = $this->db->prepare($insertQuery);
		$stm->execute();

		//select inserted rows
		$selectQuery = "SELECT * FROM words WHERE word IN ('".implode("','", $uniqueWords)."')";

		$result = $this->query($selectQuery);
		
		//link to file
		$insertQuery = 'INSERT IGNORE INTO words_in_files VALUES ';
		foreach($result as $r){
			$insertQuery .= "('".$r['id']."','".$fileID."','".$occurrences[$r['word']]."'),";
		}
		$insertQuery = rtrim($insertQuery, ',');

		$stm = $this->db->prepare($insertQuery);
		$stm->execute();

	}

}