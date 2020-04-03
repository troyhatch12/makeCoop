<?php
require_once('printhtml.php');
$config = require_once('config.php');

//Create Connection and check
$conn = new mysqli($config['servername'], $config['username'], $config['password'], $config['dbname']);
if ($conn->connect_error){
	die("connection failed: " . $conn->connect_error);
}

print_head();
print_nav();
echo("
	<div class='container'>
	<h1>Welcome To MakeCoop!</h1>
	<h3>Create Customer</h3>
");

if (isset($_POST['submit'])) {
	//we definitely still need to sanitize these data inputs.
	//We don't want a Little Bobby Tables situation.
	$name = $_POST['name'];
	$address = $_POST['address'];
	$phone = $_POST['phone'];
	$creditNum = $_POST['cc'];
	//make sure that nothing is blank before creating the query
	if ($name && $address && $phone && $creditNum){
		//insert data into customer
		$addQry = "INSERT INTO customer (Name, Address, Phone, CreditNum)
					VALUES ('$name', '$address', '$phone', '$creditNum');";
		if (mysqli_query($conn, $addQry)){
			echo("
				<p>New Customer created!<p>
				<p>Name: $name, Address: $address, Phone: $phone</p>
				<button onclick='redirect()'>Go Back</button>
				<script>
					const redirect = () => {
						window.location = 'cInsert.php';
					}
				</script>
			");
			$_POST['submit'] = '';
		} else {
			echo("There was an error adding customer: " . mysqli_error($conn));
		}
	} else {
		echo "Error: Values cannot be blank";
	}

} else {
	//Add person form
	echo( "
	<h1>Insert Customer Information</h1>
	<table>
		<form action='cInsert.php' method='post'>
			<th>Name</th>
			<th>Phone</th>
			<th>CreditNum</th>
			<th>Address</th>
			<th></th>
			<tr>
				<td><input type='text' name='name'></td>
				<td><input type='text' name='phone'></td>
				<td><input type='text' name='cc'></td>
				<td><input type='text'name='address'></td>
				<td><input type='submit' name='submit'></td>
			</tr>
		</form>
	</table>
			");

}

echo "</div>
		</html>";
mysqli_close($conn);
?>
