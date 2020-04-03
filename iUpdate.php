<?php
require_once('printhtml.php');
$config = require_once('config.php');

//Create Connection and check
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}

if (isset($_POST['update'])) {
	$itemId = $_POST['itemId'];
	$name = $_POST['name'];
	$dept = $_POST['dept'];
	$price = $_POST['price'];

print_head();
print_nav();
echo("
	<div class='container'>
	<h1>Update Customer Information</h1>
	<table>
		<form method='post'>
			<th>Item ID</th>
			<th>Name</th>
			<th>Department</th>
			<th>Price</th>
			<th></th>
			<tr>
				<td><input type='text' name='itemId' value='$itemId' readonly></td>
				<td><input type='text' name='name' value='$name'></td>
				<td><input type='text' name='dept' value='$dept'></td>
				<td><input type='text' name='price' value='$price'></td>
				<td><input type='submit' name='submit'></td>
			</tr>
		</form>
	</table>
		");
}
//get vals from above html
if (isset($_POST['submit'])) {
	$itemId = $_POST['itemId'];
	$name = $_POST['name'];
	$dept = $_POST['dept'];
	$price = $_POST['price'];

	$updtQry = 	"UPDATE item SET Name='$name', dept='$dept',
	price = '$price' WHERE ItemId=$itemId;";
	if (mysqli_query($conn, $updtQry)){
		echo("<h2>Item info updated!</h2>");
		print_redirect('iSelect.php');
	} else {
		echo("There was an error updating the customer: " . mysqli_error($conn));
	}
}

echo("
		</div>
	</html>
	");
mysqli_close($conn);
?>
