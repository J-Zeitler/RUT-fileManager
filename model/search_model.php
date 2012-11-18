<?php

/**
*	Search model
*/
class Search_Model extends Model
{
	function __construct()
	{
		parent::__construct();
	}

	/**
	 * this function is called from the controller 
	 * and executes the search query.
	 * @param  string 	$term    	searchterm
	 * @param  array 	$filters
	 * @return array    $data 		returns an array of matched tuples
	 */
	public function run($term, $filters = array()){

		$this->make_views($term);

		$stm = $this->db->prepare($this->search_query($term));
		$stm->execute();

		$result = $stm->fetchAll();

		$this->drop_views();

		// echo '<pre>';
		// print_r($result);
		// echo '</pre>';

		return $result;
	}

	/**
	 * prepares a query searching for $term in file names
	 * @param  string 	$term	searchterm
	 * @return string   $query
	 */
	private function search_query($term){

		$query = "	SELECT files.fileName, 
					GROUP_CONCAT(DISTINCT matched_words.word SEPARATOR ', ') AS 'word', 
					GROUP_CONCAT(DISTINCT matched_comments.comment_text SEPARATOR ', ') AS 'comment_text', 
					files.upload_date, 
					files.user_id
					FROM files 
						LEFT OUTER JOIN comments_about_files 
						ON files.id = comments_about_files.comment_id
						LEFT OUTER JOIN matched_comments 
						ON comments_about_files.file_id = matched_comments.id
						LEFT OUTER JOIN words_in_files
						ON words_in_files.file_id = files.id
						LEFT OUTER JOIN matched_words
						ON matched_words.id = words_in_files.word_id
					WHERE files.fileName LIKE '$term%'
						OR matched_words.word LIKE '$term%'
						OR matched_comments.comment_text LIKE '$term%'
					GROUP BY files.fileName";

		return $query;
	}

	/**
	 * prepares a query searching for $term in file comments
	 * @param  string 	$term	searchterm
	 * @return string   $query
	 */
	private function make_views($term){
		$query = "	CREATE VIEW matched_words AS
					SELECT *
					FROM words JOIN words_in_files
						ON words.id = words_in_files.word_id
					WHERE words.word LIKE '$term%'";
		$stm = $this->db->prepare($query);
		$stm->execute();

		$query = "	CREATE VIEW matched_comments AS
					SELECT *
					FROM file_comments JOIN comments_about_files
						ON file_comments.id = comments_about_files.comment_id
					WHERE file_comments.comment_text LIKE '$term%'";
		$stm = $this->db->prepare($query);
		$stm->execute();
	}

	private function drop_views(){
		$stm = $this->db->prepare("DROP VIEW matched_words");
		$stm->execute();

		$stm = $this->db->prepare("DROP VIEW matched_comments");
		$stm->execute();
	}
}