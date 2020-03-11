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


//Update person form
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
//insert data into customer
//need to fill with vals from html
$updtQry = 	"UPDATE customer SET name='neil', phone='9089983',
creditnum = '1233323332332322', address = 'big ol house in dem hills'
WHERE name=''";
if (mysqli_query($conn, $updtQry)){
	echo("Customer info updated!");
} else {
	echo("There was an error updating the customer: " . mysqli_error($conn));
}
mysqli_close($conn);
?>