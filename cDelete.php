<?php
require_once('printhtml.php');
$config = require_once('config.php');

//Create Connection and check
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}
if (isset($_POST['delete'])) {
	$memId = $_POST['memId'];
}
//vals coming from update/delete html page.
//delete a customer
$dltQry = "DELETE FROM customer WHERE memberId = '$memId'";
if (mysqli_query($conn, $dltQry)){
	echo("<h2>Customer info deleted!</h2>");
	print_redirect('cSelect.php');
} else {
	echo("There was an error deleting the customer: " . mysqli_error($conn));
}
mysqli_close($conn);
?>
