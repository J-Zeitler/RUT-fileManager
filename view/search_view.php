<?php 
	$terms = $this->data['search_term']; 
	$term = implode(' ', $terms); 
?>
<div class="box-100">
<h4 class="box-header">Sök efter filer i biblioteket</h4>
<div class="box-content">
<form action="<?php echo BASEPATH ?>search" method="get" accept-charset="utf-8">
	<input type="text" name="searchTerm" value="<?php echo $term; ?>" >
	<input type="submit" name="submit" value="Sök">
</form>
<p>Sök på filnamn, filinnehåll eller taggar</p>
<?php
	if(!empty($this->data['search_match'])){
		$result = $this->data['search_match'];
		$this->highlight($result, $terms);

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
		echo '<p>Sökningen gav inga resultat.<p>';
	}
?>
</div><!--end of box content -->
</div><!--end of box -->