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

echo("<html>");

if (isset($_POST['submit'])) {
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$creditNum = $_POST['cc'];

	//insert data into customer
	$addQry = "INSERT INTO customer (Name, Address, Phone, CreditNum)
				VALUES ('$name', '$address', '$phone', '$creditNum');";
	if (mysqli_query($conn, $addQry)){
		echo("
			<h1>New Customer created!</h1>
			<button href = 'index.php'>Go Back</button>
		");
	} else {
		echo("There was an error adding customer: " . mysqli_error($conn));
	}
} else {
	//Add person form
	echo( "
			<form action='index.php' method='post'>
				<h3>Name: </h3><input type='text' name='name'>
				<h3>Phone: </h3><input type='text' name='phone'>
				<h3>CreditNum: </h3><input type='text' name='cc'>
				<h3>Address: </h3><input type='text'name='address'>
				<input type='submit' name='submit'>
			</form>
		</html>
			");

}

echo "</html>";
mysqli_close($conn);
?>
