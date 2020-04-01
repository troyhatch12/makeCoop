<?php
$config = require('config.php');

function connect() {
		$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
	if ($conn->connect_error){
		die("connection failed: " . $conn->connect_error);
	}
}
?>
