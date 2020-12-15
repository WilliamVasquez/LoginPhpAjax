<?php
	$server = 'localhost';
	$username = 'root';
	$password = '';
	$database = 'bdarchivos';

	try {
		$con = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	} catch (PDOException $e) {
		die('Connection Failed: ' . $e->getMessage());
	}
	if (!function_exists('sano'))   {
		function sano($campo) {
			$campo = str_replace('/','',$campo);
			$campo = preg_replace("/[^a-zA-Z0-9\s]/",'',$campo);
			$campo = htmlentities($campo);
			$campo = addslashes($campo);
			$campo = strip_tags($campo);
			$campo = filter_var($campo,FILTER_SANITIZE_STRING);
			$campo = trim($campo);
			return $campo;
		}
	}
	
?>
