<?php
//Database Credentials

define('DB_SERVER', 'localhost');
define('DB_USERNAME', 'root');
define('DB_PASSWORD', '');
define('DB_NAME', 'it_surgeons');
//attempt to connect to mysql db

try {
	$pdo = new PDO("mysql:host=" .DB_SERVER.";dbname=".DB_NAME, DB_USERNAME,DB_PASSWORD);

//SET THE PDO ERROR MODE TO EXCEPTION
	$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	
} catch (Exception $e) {
	die("	ERROR:Could not connect." . $e->getMessage());
	
}
?>