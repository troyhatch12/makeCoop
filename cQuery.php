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
	<div class='container'>");

if (isset($_POST['submit'])) {
	echo("
		<table>
			<tr>
				<th>Member Id</th>
				<th>Name</th>
				<th>Address</th>
				<th>Phone</th>
				<th>Credit Card</th>
			</tr>");
	$name = $_POST['name'];
	$selectQry = 	"SELECT * FROM customer WHERE
	Name = '$name'";
	if ($result = $conn->query($selectQry)){
	  while ($row = $result->fetch_assoc()) {
	    extract($row);

	    echo("
	      <form action='' method='post' enctype='multipart/form-data'>
	        <tr>
	          <td><input type='text' value=$MemberId name='memId' readonly></td>
	          <td><input type='text' value='$Name' name='name' readonly></td>
	          <td><input type='text' value='$Address' name='address' readonly></td>
	          <td><input type='text' value='$Phone' name='phone' readonly></td>
	          <td><input type='text' value='$CreditNum' name='cc' readonly></td>
	        </tr>
	      </form>
	    ");
	  }
		echo "
			</table>
			<button><a href=cQuery.php>Go Back</a></button>";
	} else {
	  echo("There was an error retrieving customers: " . mysqli_error($conn));
	}

} else {
	echo( "
			<h1>Search Customers</h1>
			<form method='post' action='cQuery.php'>
				<h3>Name</h3>
				<input type='text' name='name'>
				<input type='submit' value='Submit Query' name='submit'>
			</form>
		</html>
			");
}
echo("</div>");

//Query person form
//not sure what a form would look like

//select info from customer
//need to come up with some query, this should return the
//name and credit cards of people living in the same house with
//the same last name

mysqli_close($conn);
?>
