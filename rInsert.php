<?php
require_once('printhtml.php');
$config = require_once('config.php');

//Create Connection and check
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}

echo("
	<html>
	");
print_nav();
echo("
	<h1>Welcome To MakeCoop!</h1>
	<h3>Create a Receipt!</h3>
");