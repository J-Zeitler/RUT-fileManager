<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
	<title>RUTs filbibliotek</title>
	<link rel="stylesheet" href="<?php echo BASEPATH; ?>public\css\normalize.css">
	<link rel="stylesheet" href="<?php echo BASEPATH; ?>public\css\main.css">
	<?php
		if(isset($this->js)){
			foreach($this->js as $js){
				echo '<script type="text/javascript" src="'.BASEPATH.'public/js/'.$js.'"></script>';
			}
		}
	?>
</head>
<body>
	<div id="main-header">
		<div class="wrapper">
			
			<a href="<?php echo BASEPATH; ?>"><h1>RUTs filbibliotek</h1></a>
			
			<ul id="nav-bar" class="clearfix">
				<li><a href="<?php echo BASEPATH; ?>home">Hem</a></li>
				<li><a href="<?php echo BASEPATH; ?>search">Hitta filer</a></li>
				<li><a href="<?php echo BASEPATH; ?>upload">Ladda upp filer</a></li>
				<li><a href="<?php echo BASEPATH; ?>support">Support</a></li>
			</ul>
			
		</div>
	</div>
	<div id="page">
		<div class="wrapper">
			<div id="content">