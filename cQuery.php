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


//Query person form
//not sure what a form would look like
echo( "
	<html>
		<form method='post'>
			<h3> New Name: </h3><input type='text' name='name'>
			<h3>New Phone: </h3><input type='text' name='phone'>
			<h3>New CreditNum: </h3><input type='text' name='cc'>
			<h3>NewAddress: </h3><input type='text'name='address'>
			<input type='submit'>
		</form>
	</html>
		");
//select info from customer
//need to come up with some query, this should return the
//name and credit cards of people living in the same house with 
//the same last name
$updtQry = 	"SELECT name, creditnum FROM customer WHERE
address = 'anAddress' AND name = '%lastname'";
if (mysqli_query($conn, $updtQry)){
	echo("Customer info updated!");
} else {
	echo("There was an error updating the customer: " . mysqli_error($conn));
}
mysqli_close($conn);
?>