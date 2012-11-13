<?php
require 'config/paths.php';
//require 'config/database.php';

require 'libs/Bootstrap.php';
require 'libs/Controller.php';
require 'libs/Model.php';
require 'libs/View.php';
require 'libs/Database.php';

$app = new Bootstrap();

//install db
require 'model/dbInit.php';
	$installer = new dbInit(); //installs db in dbInit constructor if needed