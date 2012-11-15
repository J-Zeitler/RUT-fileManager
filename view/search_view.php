<h4>Hello from the search view!</h4>
<form action="<?php echo BASEPATH ?>search/for_term" method="post">
	<label for="searchTerm">Sökord: </label><input type="text" name="searchTerm">
	<input type="submit" name="submit" value="Sök">
</form>
<?php
	if(!empty($this->data['search_match'])){
		$result = $this->data['search_match'];

		echo '<table id="search-results">
			<tr><th>Filnamn</th><th>Innehåll</th><th>Kommentarer</th><th>Uppladdad</th><th>Uppladdare</th></tr>';
		foreach($result as $res){
			echo '<tr>';
				echo '<td>',$res['fileName'];
				echo '<td>',$res['word'];
				echo '<td>',$res['comment_text'];
				echo '<td>',$res['upload_date'];
				echo '<td>',$res['user_id'];
			echo '</tr>';
		}
		echo '</table>';
		
	}
	elseif(isset($_POST['submit'])){
		echo 'Sökningen gav inga resultat.';
	}
?>