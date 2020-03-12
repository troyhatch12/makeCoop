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
if (isset($_POST['submit'])) {
	$memId = $_POST['memId']
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$creditNum = $_POST['cc'];
echo( "
	<html>
		<h1>Update Customer Information</h1>
		<form method='post'>
			<h3>Name: </h3><input type='text' name='name' value='$name'>
			<h3>Phone: </h3><input type='text' name='phone' value='$phone'>
			<h3>CreditNum: </h3><input type='text' name='cc' value='$creditNum'>
			<h3>Address: </h3><input type='text'name='address' value='$address'>
			<input type='submit' name='update'>
		</form>
	</html>
		");
//get vals from above html
if (isset($_POST['update'])) {
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$creditNum = $_POST['cc'];

//insert data into customer
//need to fill with vals from html
$updtQry = 	"UPDATE customer SET name='$name', phone='$phone',
creditnum = '$creditNum', address = '$address' WHERE memberId='$";
if (mysqli_query($conn, $updtQry)){
	echo("Customer info updated!");
} else {
	echo("There was an error updating the customer: " . mysqli_error($conn));
}
mysqli_close($conn);
?>