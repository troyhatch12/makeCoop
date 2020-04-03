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
		<h3>Add Items to be Sold</h3>
");

if (isset($_POST['submit'])) {
	//we definitely still need to sanitize these data inputs.
	//We don't want a Little Bobby Tables situation.
	$name = $_POST['name'];
	$dept = $_POST['dept'];
	$price = $_POST['price'];
	//make sure that nothing is blank before creating the query
	if ($name && $dept && $price){
		//insert data into customer
		$addQry = "INSERT INTO item (Name, Dept, Price)
					VALUES ('$name', '$dept', '$price');";
		if (mysqli_query($conn, $addQry)){
			echo("
				<p>New Item created!<p>
				<p>Name: $name, Department: $dept, Price: $price</p>
			");
			print_redirect('iSelect.php');
			$_POST['submit'] = '';
		} else {
			echo("There was an error adding item: " . mysqli_error($conn));
		}
	} else {
		echo "Error: Values cannot be blank";
	}

} else {
	//Add person form
	echo( "
			<form action='iInsert.php' method='post'>
				<h3>Name: </h3><input type='text' name='name'>
				<h3>Department: </h3><input type='text' name='dept'>
				<h3>Price: </h3><input type='text' name='price'>
				<input type='submit' name='submit'>
			</form>
			");

}

echo "
		</div>
	</html>";
mysqli_close($conn);
?>
