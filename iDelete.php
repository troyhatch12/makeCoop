<?php
require_once('printhtml.php');
$config = require_once('config.php');
//Create Connection and check
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}


//Update person form
if (isset($_POST['update'])) {
	$memId = $_POST['memId'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$creditNum = $_POST['cc'];
print_head();
print_nav();
echo("
	<h1>Update Customer Information</h1>
	<table>
		<form method='post'>
			<th>Name</th>
			<th>Phone</th>
			<th>CreditNum</th>
			<th>Address</th>
			<th></th>
			<tr>
				<input type='text' name='memId' value=$memId hidden readonly>
				<td><input type='text' name='name' value='$name'></td>
				<td><input type='text' name='phone' value='$phone'></td>
				<td><input type='text' name='cc' value='$creditNum'></td>
				<td><input type='text'name='address' value='$address'></td>
				<td><input type='submit' name='submit'></td>
			</tr>
		</form>
	</table>
	</html>
		");
}
//get vals from above html
if (isset($_POST['submit'])) {
	$memId = $_POST['memId'];
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$creditNum = $_POST['cc'];

//insert data into customer
//need to fill with vals from html
	$updtQry = 	"UPDATE customer SET name='$name', phone='$phone',
	creditnum = '$creditNum', address = '$address' WHERE memberId='$memId'";
	if (mysqli_query($conn, $updtQry)){
		echo("<h2>Customer info updated!</h2>");
		print_redirect();
	} else {
		echo("There was an error updating the customer: " . mysqli_error($conn));
	}
}
mysqli_close($conn);
?>
