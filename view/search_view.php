<h4>Hello from the search view!</h4>
<form action="<?php echo BASEPATH ?>search/for_term" method="post">
	<label for="searchTerm">Sökord: </label><input type="text" name="searchTerm">
	<input type="submit" name="submit" value="Sök">
</form>
<?php
	if(!empty($this->data['search_match'])){
		$result = $this->data['search_match'];
		echo '<ul id="search-results">';
		foreach($result as $res){
			echo '<li>';
				echo '<a href="#">',$res['fileName'],'</a>';
				echo '<span>',$res['upload_date'],'</span>';
				echo '<span>',$res['user_id'],'</span>';
			echo '</li>';
		}
		echo '</ul>';
		
	}
	elseif(isset($_POST['submit'])){
		echo 'Sökningen gav inga resultat.';
	}
?>