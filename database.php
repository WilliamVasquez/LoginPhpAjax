<?php
	$server = 'localhost';
	$username = 'root';
	$password = 's3rv1c31';
	$database = 'bdarchivos';

	try {
		$conn = new PDO("mysql:host=$server;dbname=$database;", $username, $password);
	} catch (PDOException $e) {
		die('Connection Failed: ' . $e->getMessage());
	}
?>
