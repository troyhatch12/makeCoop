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


//Delete person form
echo( "
	<html>
		<form method='post'>
			<h3> Customer to Delete: </h3><input type='text' name='name'>
			<input type='submit'>
		</form>
	</html>
		");
//delete a customer
//need to take val from html
$dltQry = "DELETE FROM customer WHERE name = 'neil'";
if (mysqli_query($conn, $dltQry)){
	echo("Customer info deleted!");
} else {
	echo("There was an error deleting the customer: " . mysqli_error($conn));
}
mysqli_close($conn);
?>