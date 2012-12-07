<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
	<title>RUTs filbibliotek</title>
	<link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/normalize.css">
	<link rel="stylesheet" href="<?php echo BASEPATH; ?>public/css/main.css">
	<script type="text/javascript" src="<?php echo BASEPATH; ?>public/js/vendor/jquery-1.8.2.min.js"></script>
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
			
			<div id="page-title" class="clearfix">
			<a href="<?php echo BASEPATH; ?>"><img src = "<?php echo BASEPATH; ?>public/img/R-jonas_version.png"/><h1>Rektorsutbildningens filbibliotek</h1></a>
			</div>
			
		</div>
	</div>
	
	<div id="nav-menu">		
	<ul id="nav-bar" class="wrapper clearfix">
		<li><a href="<?php echo BASEPATH; ?>home">Hem</a></li>
		<li><a href="<?php echo BASEPATH; ?>search">Hitta filer</a></li>
		<li><a href="<?php echo BASEPATH; ?>upload">Ladda upp filer</a></li>
		<li><a href="<?php echo BASEPATH; ?>support">Support</a></li>
	</ul>
	</div>
	
	<div id="page">
		<div class="wrapper clearfix">
			<div id="content" class="clearfix">