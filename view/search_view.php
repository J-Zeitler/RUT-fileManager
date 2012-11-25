<?php $term = $this->data['search_term']; ?>

<h4>Hello from the search view!</h4>
<form action="<?php echo BASEPATH ?>search" method="get" accept-charset="utf-8">
	<label for="searchTerm">Sökord: </label>
	<input type="text" name="searchTerm" value="<?php echo $term ?>" >
	<input type="submit" name="submit" value="Sök">
</form>
<?php
	if(!empty($this->data['search_match'])){
		$result = $this->data['search_match'];
		$this->highlight($result, $term);

		echo '<table id="search-results">
			<tr><th>Filnamn</th><th>Innehåll</th><th>Kommentarer</th><th>Uppladdad</th><th>Uppladdare</th></tr>';
		foreach($result as $res){
			echo '<tr>';
				echo "<td><a href='".BASEPATH."uploads/".$res['id'].".pdf'>".$res['fileName']."</a></td>";
				echo '<td>',$res['word'];
				echo '<td>',$res['comment_text'];
				echo '<td>',$res['upload_date'];
				echo '<td>',$res['name'];
			echo '</tr>';
		}
		echo '</table>';
		
	}
	elseif(isset($_GET['submit'])){
		echo 'Sökningen gav inga resultat.';
	}