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

		$stm = $this->db->prepare($this->search_filenames($term));
		$stm->execute();

		$result = $stm->fetchAll();

		return $result;
	}

	/**
	 * prepares a query searching for $term in file names
	 * @param  string 	$term	searchterm
	 * @return string   $query
	 */
	private function search_filenames($term){
		$query = "	SELECT fileName, upload_date, user_id
					FROM files 
					WHERE fileName LIKE '$term%'";
		return $query;
	}

	/**
	 * prepares a query searching for $term in file comments
	 * @param  string 	$term	searchterm
	 * @return string   $query
	 */
	private function search_comments($term){
		$query = "	SELECT files.fileName, files.upload_date, files.user_id, file_comments.comment_text
					FROM file_comments JOIN comments_about_files 
						ON file_comments.id = comments_about_files.comment_id
						JOIN files 
						ON comments_about_files.file_id = files.id
					WHERE file_comments.comment_text LIKE $term%";
		return $query;
	}

	/**
	 * prepares a query searching for $term in the words of all files
	 * @param  string 	$term	searchterm
	 * @return string   $query
	 */
	private function search_words($term){
		$query = "	SELECT fileName, upload_date, user_id
					FROM files 
					WHERE fileName=$term";
		return $query;
	}
	
}