<?php
require_once('printhtml.php');
$servername="localhost";
$username="dev";
$password="develop";
$dbname="makeCoop";

//Create Connection and check
$conn = new mysqli($servername, $username, $password, $dbname);
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
	print_redirect();
} else {
	echo("There was an error deleting the customer: " . mysqli_error($conn));
}
mysqli_close($conn);
?>
