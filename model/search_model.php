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
	 * @return array    $result		returns an array of matched tuples
	 */
	public function run($terms, $filters = array()){

		// $terms = preg_split('/[\s,\+]+/', trim($term));

		if(!empty($terms)){

			$this->make_views($terms);

			$result = $this->query($this->search_query($terms));

			$this->drop_views();

			return $result;
		}
		return array(); //if no valid terms, return empty result
	}

	/**
	 * prepares a query searching for $term in db
	 * @param  string 	$term
	 * @return string   $query
	 */
	private function search_query($terms){

		$term = $terms[0]; //search for filenames only in first term

		$query = "	SELECT files.fileName, files.id,
					GROUP_CONCAT(DISTINCT matched_words.word SEPARATOR ', ') AS 'word',
					GROUP_CONCAT(DISTINCT matched_comments.comment_text SEPARATOR ', ') AS 'comment_text',
					files.upload_date, 
					users.name
					FROM files 
						LEFT OUTER JOIN comments_about_files 
						ON files.id = comments_about_files.comment_id
						LEFT OUTER JOIN matched_comments 
						ON comments_about_files.file_id = matched_comments.id
						LEFT OUTER JOIN words_in_files
						ON words_in_files.file_id = files.id
						LEFT OUTER JOIN matched_words
						ON matched_words.id = words_in_files.word_id
						INNER JOIN users
						ON files.user_id = users.id
					WHERE files.fileName LIKE '$term%'
						OR matched_words.word LIKE '%'
						OR matched_comments.comment_text LIKE '%'
					GROUP BY files.id
					ORDER BY files.upload_date DESC";

		return $query;
	}

	private function make_views($terms){

		$query = "	CREATE VIEW matched_words AS
					SELECT *
					FROM words JOIN words_in_files
						ON words.id = words_in_files.word_id
					WHERE words.word REGEXP '^";
		$query .= implode('|^', $terms)."' ORDER BY words_in_files.occurrences DESC";


		$this->query($query);

		$query = "	CREATE VIEW matched_comments AS
					SELECT *
					FROM file_comments JOIN comments_about_files
						ON file_comments.id = comments_about_files.comment_id
					WHERE file_comments.comment_text REGEXP '^";
		$query .= implode('|^', $terms)."'";

		$this->query($query);
	}

	private function drop_views(){
		$this->query("DROP VIEW matched_words");
		$this->query("DROP VIEW matched_comments");
	}
}