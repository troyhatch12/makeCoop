<?php
$servername="localhost:3308";
$username="dev";
$password="develop";
$dbname="makecoop";

//Create Connection and check
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}
if (isset($_POST['submit'])) {
	$memId = $_POST[memberId];
}
//vals coming from update/delete html page.
//delete a customer
$dltQry = "DELETE FROM customer WHERE memberId = '$memId'";
if (mysqli_query($conn, $dltQry)){
	echo("Customer info deleted!");
} else {
	echo("There was an error deleting the customer: " . mysqli_error($conn));
}
mysqli_close($conn);
?>