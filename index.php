<?php
$servername="localhost";
$username="dev";
$password="develop";
$dbname="makeCoop";

//Create Connection and check
$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}


//Add person form
echo( "
	<html>
		<form action='index.php' method='post'>
			<h3>Name: </h3><input type='text' name='name'>
			<h3>Phone: </h3><input type='text' name='phone'>
			<h3>CreditNum: </h3><input type='text' name='cc'>
			<h3>Address: </h3><input type='text'name='address'>
			<input type='submit'>
		</form>
	</html>
		");
//insert data into customer
//need to fill with vals from html
$addQry = "INSERT INTO customer (Name, Address, Phone, CreditNum)
			VALUES ('troy', '69 ayy lmao', '1010101010', '5253546235768798' )";
if (mysqli_query($conn, $addQry)){
	echo("New Customer created!");
} else {
	echo("There was an error adding customer: " . mysqli_error($conn));
}
mysqli_close($conn);
?>
